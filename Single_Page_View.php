<?php
session_start();
include('./Databsase/connection.php');

if (mysqli_connect_errno()) {
    die('Connection failed: ' . mysqli_connect_error());
}

$id = $_GET['id'] ?? null;
if ($id === null) {
    die("Course ID not provided.");
}


// Fetch course details
$query = "SELECT * FROM courses WHERE id = ?";
$stmt = $connection->prepare($query);
if (!$stmt) {
    die("Error preparing query: " . $connection->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("No course found with the given ID.");
}
$course = $result->fetch_assoc();

// Fetch package details
$query = "SELECT co.*, pt.name as package_type_name FROM course_options co JOIN package_type pt ON co.package_type = pt.id WHERE co.cou_id = ?";
$stmt = $connection->prepare($query);
if (!$stmt) {
    die("Error preparing query: " . $connection->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$packages = [];
while ($row = $result->fetch_assoc()) {
    $packages[] = $row;
}

// Fetch package options
$query = "SELECT * FROM package_options";
$result = $connection->query($query);
$package_options = [];
while ($row = $result->fetch_assoc()) {
    $package_options[$row['id']] = $row['name'];
}

$InstructorID = htmlspecialchars($course['instructor_id']);
$SQLI = "SELECT * FROM `instructors` WHERE `id` = $InstructorID";
$ResultI = mysqli_query($connection, $SQLI);
$RowI = mysqli_fetch_array($ResultI);



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="./css/main.css" rel="stylesheet" />
    <link href="Single_Page.css" rel="stylesheet" type="text/css">
    <link href="./css/single_Page_View.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



    <title><?php echo htmlspecialchars($course['course_title']); ?></title>
    <style>
        /* General styles */
        /* .img {
            max-width: 100%;
            height: auto;
        }

        .custom-container {
            margin-top: 20px;
        } */

        body {
            font-family: var(--bs-font-sans-serif);
        }

        .tab-content>div {
            background-color: white !important;
            box-sizing: content-box;
        }

        .nav-tabs .nav-link.active {
            background-color: #036fc1 !important;
            color: white !important;
            border-color: none !important;

        }

        .border-end {
            margin-left: -1px !important;

        }

        .custom-h1 {
            font-weight: 700;
            color: #273044;
            font-size: 32px;
            letter-spacing: -0.7px;
        }

        .custom-h2 {
            font-weight: 700;
            font-size: 20px;
            color: #62646a;
            font-size: 24px;
            letter-spacing: -0.7px;
        }

        .custom-h3 {
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
        }

        .course-detail-span {
            color: #62646a;
            font-weight: 400;
            font-size: 16px;
            margin-left: 10px;
        }

        .btn-class-type {
            font-weight: 600;
            box-shadow: none;
            padding: 14px 20px;
        }

        /* .custom-tab-style {
            font: 400 16px / 24px Macan, Helvetica Neue, Helvetica, Arial, sans-serif;
        } */


        /* /////PROFILE CARD////// */

        .profile-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f8f9fa;
            border: 1px solid #ffffff40;
            padding: 30px 0px 30px !important;
            margin: 16px 0px 0px;
        }

        .image {
            position: relative;
            height: 150px;
            width: 150px;
        }

        .image .profile-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
        }

        .data {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
            color: #273044;
        }

        .data h2 {
            font-size: 33px;
            font-weight: 600;
        }

        /* /////PROFILE CARD END////// */

        /* /////MEDIA QUERIES////// */
        @media only screen and (max-width: 768px) {
            .custom-h1 {
                margin-top: 20px !important;
            }
        }

        /* feedback section */
        .section-title {
            padding-top: 70px;
            width: 100%;
            padding-bottom: 40px;
        }

        .section-title p {
            color: black;
            font-size: 13px;
        }

        .section-separator {
            float: left;
            width: 100%;
            position: relative;
            margin: 10px 0;
        }

        .section-separator:before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            height: 3px;
            width: 60px;
            border-radius: 3px;
            background-color: #deebf8;
            margin-left: -25px;
        }

        .listing-carousel-button {
            position: absolute;
            top: 50%;
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-top: -25px;
            z-index: 100;
            cursor: pointer;
            background: black;
            box-shadow: 0 9px 26px rgba(58, 87, 135, 0.45);
            transition: all 200ms linear;
            outline: none;
        }

        .listing-carousel-button.listing-carousel-button-next {
            right: 0;
            padding-right: 20px;
            border-radius: 60px 0 0 60px;
        }

        .listing-carousel-button.listing-carousel-button-prev {
            left: 0;
            padding-left: 20px;
            border-radius: 0 60px 60px 0;
        }

        .listing-carousel-button.listing-carousel-button-next:hover {
            right: 15px;
            background: rgba(6, 27, 65, 0.4);
        }

        .listing-carousel-button.listing-carousel-button-prev:hover {
            left: 15px;
            background: rgba(6, 27, 65, 0.4);
        }

        .testi-item {
            transition: all .3s ease-in-out;
            transform: scale(0.9);
            opacity: 0.9;
        }

        .testimonials-text {
            padding: 77px 50px 75px;
            background: #f5f6fa;
            border-radius: 10px;
            transition: all .3s ease-in-out;
        }

        .testimonials-text-after {
            position: absolute;
            color: #108cee;
            opacity: .3;
            font-size: 35px;
            bottom: 25px;
            right: 30px;
        }

        .testimonials-text-before {
            position: absolute;
            color: #108cee;
            opacity: .3;
            font-size: 35px;
            top: 25px;
            left: 30px;
        }

        .testimonials-text .listing-rating {
            margin-bottom: 12px;
        }

        .listing-rating i {
            color: gold;
        }

        .testimonials-avatar h3 {
            color: #7d93b2;
            font-size: 18px;
        }

        .testimonials-avatar h43 {
            color: #007aff;
            font-size: 12px;
            padding-top: 6px;
        }

        .testimonials-carousel .swiper-slide {
            padding: 30px 0;
        }

        .testi-avatar {
            position: absolute;
            left: 50%;
            top: -30px;
            width: 90px;
            height: 90px;
            margin-left: -45px;
        }

        .testi-avatar img {
            width: 90px;
            height: 90px;
            border-radius: 100%;
            border: 6px solid #fff;
            box-shadow: 0 9px 26px rgba(58, 87, 135, 0.1);
        }

        .testimonials-text p {
            color: black;
            font-size: 14px;
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: italic;
            line-height: 24px;
            padding-bottom: 10px;
            font-weight: 500;
        }

        .swiper-slide-active .testi-item {
            opacity: 1;
            transform: scale(1.0);
        }

        .tc-pagination {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            width: 100% !important;
        }



        .tc-pagination2 {
            display: inline-block;
            padding: 14px 0;
            background-color: white;
            border-radius: 30px;
            min-width: 250px;
            border-bottom: 0;
        }


        .write-review-button button {
            padding: 5px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .star {
            color: #ccc;
            cursor: pointer;
            font-size: 1.5em;
        }

        .star.selected {
            color: gold;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <?php require "header.php"; ?>
        <?php require "header2.php"; ?>
        <div class="container" style="padding-left: 0; padding-right: 0;">


            <!-- first row -->
            <div class="row" style="display: flex; justify-content: center; margin-left: 0; margin-right: 0;">
                <div class="col-8" style="width: 100% !important">
                    <!-- second row -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="row mb-5">
                                <!-- Image Column -->
                                <div class="col-md-6 col-12">
                                    <img src="<?php echo htmlspecialchars("uploads/" . $course['imagePath']); ?>" alt="<?php echo htmlspecialchars($course['course_title']); ?>" style="width: 100%; height: 100%;object-fit: cover" />
                                </div>
                                <!-- Title Content Column -->
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <h1 class="custom-h1">
                                                    <?php echo htmlspecialchars($course['course_title']); ?>
                                                </h1>
                                                <h4 class="custom-h3">
                                                    <?php echo htmlspecialchars($course['category']); ?> |
                                                    <?php echo htmlspecialchars($course['language']); ?>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3" style="color: #555555;">
                                            <div class="card">
                                                <div class="card d-grid">
                                                    <!-- <h3>Rs. <?php echo htmlspecialchars($course['price']); ?>
                                                    </h3> -->
                                                    <form action="cart.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                                        <input type="hidden" name="title" value="<?php echo htmlspecialchars($course['course_title']); ?>">
                                                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($course['instructor_name']); ?>">
                                                        <input type="hidden" name="imagePath" value="<?php echo htmlspecialchars($course['imagePath']); ?>">
                                                        <input type="hidden" name="s_description" value="<?php echo htmlspecialchars($course['s_description']); ?>">
                                                        <!-- <button type="submit" class="btn btn-dark mb-2"
                                                            style="width:-webkit-fill-available;">Add to
                                                            Cart <h3>Rs.
                                                                <?php echo htmlspecialchars($course['price']); ?>
                                                            </h3></button> -->
                                                    </form>
                                                </div>
                                                <div class="card-header text-center fs-5">
                                                    <h3 class="custom-h3" style="font-weight: 700;">
                                                        Course Details
                                                    </h3>
                                                </div>

                                                <div class="list-group border" style="background-color: #f8f9fa;">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item p-4" style="background-color:#f8f9fa;">
                                                            <i class="fa fa-users" style="color: #036fc1" aria-hidden="true"></i>
                                                            <span class="course-detail-span">
                                                                <?php
                                                                    $SqlP = "SELECT COUNT(*) AS Students FROM `payedstudent` WHERE course_id = $id";
                                                                    $ResultP = mysqli_query($connection, $SqlP);
                                                                    $RowP = mysqli_fetch_assoc($ResultP);
                                                                ?>
                                                                Enrolled : <?php echo $RowP['Students'] ?>
                                                            </span>
                                                        </li>
                                                        <li class="list-group-item p-4" style="background-color:#f8f9fa;">
                                                            <i class="fas fa-clock" style="color: #036fc1"></i>
                                                            <span class="course-detail-span">
                                                                Duration : <?php echo 0 ?>
                                                                <span>
                                                        </li>
                                                        <li class="list-group-item p-4" style="background-color:#f8f9fa;">
                                                            <i class="fas fa-chalkboard-teacher" style="color: #036fc1"></i>
                                                            <span class="course-detail-span">
                                                                Lectures : <?php echo $RowI['FirstName'] . " " . $RowI['LastName'] ?>
                                                                <span>
                                                        </li>
                                                        <li class="list-group-item p-4" style="background-color:#f8f9fa;">
                                                            <i class="fas fa-video" style="color: #036fc1"></i>
                                                            <span class="course-detail-span">
                                                                Videos : <?php echo 0 ?>
                                                                <span>
                                                        </li>
                                                        <li class="list-group-item p-4" style="background-color:#f8f9fa;">
                                                            <i class="fas fa-signal" style="color: #036fc1"></i>
                                                            <span class="course-detail-span">
                                                                Level : <?php echo htmlspecialchars($course['level']); ?>
                                                                <span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-5">
                        <!-- course Details 2nd col -->
                        <div class="col-md-6 col-12">
                            <div class="col">
                                <div class="row" style="margin: 0px;">
                                    <div style="height: 250px;padding: 0px;margin: 16px 0px 0px;border: 1px solid #ddd;">
                                        <nav>
                                            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="margin: 0px;border-radius: 0px;font-weight: 700;">Description</button>
                                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="margin: 0px;border-radius: 0px;font-weight: 700;">FAQ</button>
                                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" style="margin: 0px;border-radius: 0px;font-weight: 700;">Announcements</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content p-4 bg-white" id="nav-tabContent" style="max-height: 200px;overflow-y: auto;width: 100%;scrollbar-gutter: stable;">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <p style="color: #555555;">
                                                    <?php echo nl2br(htmlspecialchars($course['s_description'])); ?>
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="color: #555555;">
                                                <div class="row" onclick="OpenFAQDetails()" style="padding-right: 0px !important;margin: 0px 0px 10px !important;margin-left: 15px !important;background-color: #f8f9fa;color: #273044;border: 1px solid #ddd;display: flex; align-items: center; justify-content: space-between;">
                                                    <div class='col-8 '>
                                                        <p style="margin-bottom: 0px;padding: 3px 0px;cursor: pointer;font-weight: 500;">
                                                            Why should I chose You ?</p>
                                                    </div>
                                                    <div class='col-1' style="margin-right: 10px;cursor: pointer;">
                                                        <i id="arrow-icon" style="color: #273044" class="fa-solid fa-circle-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div id="hide-faq" class="row" style="padding-right: 0px !important;margin:8px 0px 8px !important;border-bottom: 1px solid white; display: none;">
                                                    <div class='col-6 w-100'>
                                                        <p id="hide-faq-item">
                                                            I offer vast knowledge, personalized learning, and 24/7
                                                            availability for your studies.
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Fuga quisquam quidem sint vel alias quam tenetur aperiam
                                                            reiciendis aut suscipit, ipsam perspiciatis? Totam
                                                            voluptatibus aut fugiat inventore blanditiis ratione
                                                            laudantium minus nemo, officiis ea nobis accusantium
                                                            deserunt dicta enim fugit ab repellat. Distinctio aut,
                                                            aliquam explicabo illum perferendis iusto dolor, tenetur
                                                            mollitia inventore laudantium iure quam amet quibusdam
                                                            incidunt, doloribus dolores dignissimos corrupti voluptates
                                                            temporibus assumenda architecto! Rem atque facere quas
                                                            aliquam veniam quae consectetur ab perspiciatis ex vel nemo
                                                            tempora quos ea error totam, exercitationem aliquid quo hic
                                                            nisi culpa possimus! Officia reprehenderit veniam accusamus.
                                                            Vitae, praesentium necessitatibus. Aspernatur iusto atque
                                                            quam obcaecati odio nobis facere hic sequi officiis,
                                                            doloremque totam aliquid voluptatum? Impedit non mollitia,
                                                            sint similique aut itaque quibusdam qui! Facere dicta optio
                                                            earum, voluptatum at, cumque minima soluta, provident modi
                                                            assumenda laborum. Laudantium porro aliquid incidunt
                                                            consequuntur vero sequi, reprehenderit et atque tempore ad
                                                            in saepe odio! Soluta architecto provident sint aliquam
                                                            ducimus. Iusto eligendi maxime ipsam hic vero natus eveniet,
                                                            quod sequi numquam nemo itaque accusamus unde perferendis
                                                            voluptatem omnis eum molestias culpa commodi libero
                                                            quibusdam consequuntur deserunt suscipit repellendus. Esse
                                                            unde pariatur repellat a dicta. Provident consequatur
                                                            assumenda ad nam illum, reiciendis aspernatur unde in a,
                                                            harum odit pariatur eius enim, voluptatum officiis ut sed!
                                                            Ea quidem mollitia fugit veniam hic ipsam incidunt, atque
                                                            nam eius neque. Suscipit illo quasi nihil repellat natus ab,
                                                            ea ipsam. Laborum facilis sunt ipsa a nihil ex perferendis
                                                            maiores delectus quasi esse tenetur voluptatem, officia
                                                            asperiores velit cupiditate laboriosam neque aliquid
                                                            obcaecati laudantium eius placeat totam. Facilis facere
                                                            ratione rem qui illo itaque illum mollitia at, commodi,
                                                            magni asperiores animi rerum sunt amet quaerat provident
                                                            ducimus officiis inventore deserunt culpa. Dolorem unde
                                                            mollitia est. Labore, eos aliquam perspiciatis culpa rerum
                                                            dolor eveniet dignissimos consequatur aperiam hic quis iure
                                                            ea! Commodi harum dolore magnam facere, nemo sint? Culpa eum
                                                            hic fugit nostrum quae excepturi itaque, harum, eos
                                                            cupiditate earum, quaerat eligendi veritatis sunt aliquid
                                                            ratione unde aspernatur corporis ducimus! Debitis, dolore
                                                            impedit! Optio enim qui quis libero hic, odio fugit minima,
                                                            consequatur animi ex facere mollitia. Laboriosam animi
                                                            quisquam delectus facilis cupiditate unde ducimus reiciendis
                                                            ea sunt corporis. Dolor vel, alias minima facere excepturi
                                                            suscipit similique, adipisci qui consequatur, corporis
                                                            praesentium dolores quis accusamus iure doloremque iste eum.
                                                            Eum earum quas atque nostrum aspernatur ad sed voluptatum
                                                            quae quaerat saepe, totam rem tempore alias, ipsa quis
                                                            facere quidem, ipsum harum nisi provident fuga? Provident
                                                            quod atque, ratione suscipit, unde voluptatum adipisci ut
                                                            aut veniam minima fuga itaque culpa ullam aliquid. Aperiam
                                                            placeat cum tempore illum magni fugit expedita, ut
                                                            perspiciatis necessitatibus inventore deleniti nisi beatae
                                                            quo assumenda quisquam nulla quas earum excepturi! Quos
                                                            mollitia neque ducimus illum quo doloribus laborum
                                                            consectetur cupiditate itaque ab ut, eius hic iste
                                                            laudantium ullam dolorum a facere quam aliquam quaerat
                                                            dolorem esse voluptas. Qui, dolore. Ipsa perspiciatis totam
                                                            repudiandae reiciendis dolor tempore accusamus ex dolorum
                                                            atque ea, optio dolores blanditiis nemo cum expedita minus
                                                            velit excepturi consectetur dolorem beatae perferendis
                                                            voluptates in corrupti!
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row" onclick="OpenFAQDetails()" style="padding-right: 0px !important;margin: 0px 0px 10px !important;margin-left: 15px !important;background-color: #f8f9fa;color: #273044;border: 1px solid #ddd;display: flex; align-items: center; justify-content: space-between;">
                                                    <div class='col-8 '>
                                                        <p style="margin-bottom: 0px;padding: 3px 0px;cursor: pointer;font-weight: 500;">
                                                            What makes you different ?</p>
                                                    </div>
                                                    <div class='col-1' style="margin-right: 10px;cursor: pointer;">
                                                        <i id="arrow-icon" style="color: #273044" class="fa-solid fa-circle-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <!-- <div id="hide-faq" class="row"
                                                    style="padding-right: 0px !important;margin-right: 0px !important;border-bottom: 1px solid white">
                                                    <div class='col-6 w-100'>
                                                        <p id="hide-faq-item" onclick="OpenFAQDetails()">
                                                        Unlike traditional teachers, I can adapt to your learning style and offer endless resources for exploration.
                                                        </p>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" style="color: #555555;">
                                                <?php if (!empty($announcements)) : ?>
                                                    <ul>
                                                        <?php foreach ($announcements as $announcement) : ?>
                                                            <li><b><?php echo htmlspecialchars($announcement['announcement']); ?>
                                                                    -</b>
                                                                <small><?php echo htmlspecialchars($announcement['course']); ?></small>-
                                                                <small><?php echo htmlspecialchars($announcement['message']); ?></small>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <p style="color: #555555;">No announcements available.</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="background-color: #f8f9fa;margin: 50px 0px 0px;">
                                    <div class="profile-card">
                                        <div class="image">
                                            <?php
                                            if (empty($RowI['profile_image'])) {
                                                echo '<center><img  style="width: 150px; Height: 150px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="./teacher_dashboard/template/assets/images/faces/face16.jpg" alt="default image" /></center>';
                                            } else {
                                                $decoded_image = base64_decode($RowI['profile_image']);
                                                if ($decoded_image !== false) {
                                                    echo '<center><img  style="width: 150px; Height: 150px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" /></center>';
                                                } else {
                                                    echo '<center><img  style="width: 150px; Height: 150px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="./teacher_dashboard/template/assets/images/faces/face16.jpg" alt="default image" /></center>';
                                                }
                                            }
                                            ?>
                                            </label>
                                        </div>

                                        <div class="data">
                                            <h2><?php echo $RowI['FirstName'] . " " . $RowI['LastName'] ?></h2>
                                            <span><?php echo $RowI['Email'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Packeges Details -->
                        <div class="col-md-6 col-12 mt-3">
                            <div class="border border-3" style="min-height: 600px;position: relative;">
                                <nav>
                                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                        <?php foreach ($packages as $index => $package) : ?>
                                            <button class="nav-link <?php echo $index === 0 ? 'active' : ''; ?> rounded-0 btn-class-type" id="nav-<?php echo strtolower($package['package_type_name']); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo strtolower($package['package_type_name']); ?>" type="button" role="tab" aria-controls="nav-<?php echo strtolower($package['package_type_name']); ?>" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>" style="margin: 0px !important;"><?php echo $package['package_type_name']; ?></button>
                                        <?php endforeach; ?>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent" style="padding: 24px;">
                                    <?php foreach ($packages as $index => $package) : ?>
                                        <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?> custom-tab-style" id="nav-<?php echo strtolower($package['package_type_name']); ?>" role="tabpanel" aria-labelledby="nav-<?php echo strtolower($package['package_type_name']); ?>-tab">

                                            <span class="fs-1" style="font-weight: 500;color: #273044">RS </span>
                                            <span class="fs-1" style="font-weight: 700;color: #273044"><?php echo $package['price']; ?></span>
                                            <p style="font-weight: 500;color: red;padding: 10px 0px;">Save up to 5% with Subscribe to Save Basic</p>
                                            <ul style="color: #555555;font-size: 14px; padding-left: 0px; opacity: 0.6;">
                                                <?php foreach (json_decode($package['pack_op_id']) as $option_id) : ?>
                                                    <p><i class="fa-regular fa-hand-point-right" style="color: #eab830;margin-right: 15px"></i>
                                                        <?php echo $package_options[$option_id]; ?></p>
                                                <?php endforeach; ?>
                                            </ul>

                                            <!-- Add to Cart Form -->
                                            <form action="handlers/cartHandler.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($course['id']); ?>">
                                                <input type="hidden" name="title" value="<?php echo htmlspecialchars($course['course_title']); ?>">
                                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($package['price']); ?>"> <!-- Package price -->
                                                <input type="hidden" name="imagePath" value="<?php echo htmlspecialchars($course['imagePath']); ?>">
                                                <input type="hidden" name="s_description" value="<?php echo htmlspecialchars($course['s_description']); ?>">
                                                <input type="hidden" name="package_type" value="<?php echo htmlspecialchars($package['package_type_name']); ?>"> <!-- Package type name -->
                                                <button type="submit" name="cartSub" class="btn btn-dark mb-2" style="width:-webkit-fill-available;">Add to Cart</button>
                                            </form>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div style="position: absolute; bottom: 0px;width: 100%;padding: 10px 10px;">
                                    <p id="compareBtn" class="text-center mt-10" style="font-weight: 500;color: #457992;padding-top: 20px;cursor: pointer;">
                                        Compare Packages
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="comparisonTable" class="row mt-5 mb-5" style="display: none;">
                        <div class="col-12" style="margin-bottom: 12px;">
                            <h2 class="custom-h2">Compare packages</h2>
                        </div>
                        <table class="comparison-table">
                            <thead>
                                <th>&nbsp;</th>
                                <?php foreach ($packages as $package) : ?>
                                    <th style="text-align: center"><?php echo $package['package_type_name']; ?></th>
                                <?php endforeach; ?>
                            </thead>
                            <tbody>
                                <?php
                                $options = [];
                                foreach ($packages as $package) {
                                    $package_option_ids = json_decode($package['pack_op_id'], true);
                                    if ($package_option_ids && is_array($package_option_ids)) {
                                        foreach ($package_option_ids as $option_id) {
                                            $options[$option_id] = $package_options[$option_id];
                                        }
                                    }
                                }
                                foreach ($options as $option_id => $option_name) : ?>
                                    <tr>
                                        <td class="td-title"><?php echo $option_name; ?></td>
                                        <?php foreach ($packages as $package) : ?>
                                            <td><?php echo in_array($option_id, json_decode($package['pack_op_id'], true)) ? '✅' : '❌'; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="col-12">
                        <hr>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
    </div>


    <!--feedback-->
    <?php
    $SQLREVIEW = "SELECT * FROM `reviews` WHERE course_id = $id";
    $RESULT = mysqli_query($connection, $SQLREVIEW);
    $review_count = mysqli_num_rows($RESULT);
    ?>
    <section>
        <div class="container mt-4 mb-5" style="text-align:center;">
            <div class="section-title">
                <div class="row">
                    <h2>Learner Reviews</h2>
                    <div class="write-review-button">
                        <a href="#" class="btn mt-1" style="background-color: #007bff; color: white; text-align: center; width: 170px;" data-toggle="modal" data-target="#feedbackModal">
                            <i class="fa-regular fa-pen-to-square"></i>
                            <span style="margin-left: 5px;"> Write a Review</span>
                        </a>
                    </div>
                </div>
                <span class="section-separator"></span>
                <div class="review-info">
                    <div class="rating-info" style="display: inline-block;">
                        <div class="listing-rating" style="display: inline-block; font-size: 24px;">
                            <i class="fa fa-star"></i>
                        </div>
                        <h4 style="display: inline-block; margin-right: 5px; font-weight: bold;" id="averageRating"></h4>
                    </div>
                    <h5 style="display: inline-block; margin-bottom: 0; margin-top: 0; margin-left: 17px;">
                        <?php echo $review_count; ?> reviews
                    </h5>
                </div>
            </div>

            <!-- display reviews -->
            <div class="testimonials-carousel-wrap" style="position: relative; text-align:center;">
                <div class="listing-carousel-button listing-carousel-button-next">
                    <i class="fa fa-caret-right" style="color:white;"></i>
                </div>
                <div class="listing-carousel-button listing-carousel-button-prev">
                    <i class="fa fa-caret-left" style="color:white;"></i>
                </div>
                <div class="testimonials-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php if ($review_count > 0) {
                                while ($review = mysqli_fetch_array($RESULT)) {
                            ?>
                                    <div class="swiper-slide">
                                        <div class="testi-item">
                                            <div class="testi-avatar">
                                                <?php
                                                $studentID = $review['student_id'];
                                                $SQLSTUDENT = "SELECT * FROM `student` WHERE id = $studentID";
                                                $resultSTUDENT = mysqli_query($connection, $SQLSTUDENT);

                                                $RowStudent = mysqli_fetch_array($resultSTUDENT);

                                                $profile_image_data = $RowStudent['profile_image'];
                                                if ($profile_image_data == null || $profile_image_data == '') {
                                                    echo '<img class="img-fluid rounded-circle profile_image" src="./images/man3.png" alt="profile image" />';
                                                } else {
                                                    echo '<img class="img-fluid rounded-circle profile_image" src="' . $profile_image_data . '" alt="default image" />';
                                                }
                                                ?>

                                            </div>
                                            <div class="testimonials-text-before">
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                            <div class="testimonials-text">
                                                <div class="listing-rating">
                                                    <?php for ($i = 0; $i < $review['rating']; $i++) : ?>
                                                        <i class="fa fa-star"></i>
                                                    <?php endfor; ?>
                                                    <?php for ($i = $review['rating']; $i < 5; $i++) : ?>
                                                        <i class="fa fa-star-o"></i> <!-- For empty stars -->
                                                    <?php endfor; ?>
                                                </div>
                                                <p><?php echo $review['comment'] ?></p>
                                                <div class="testimonials-avatar">
                                                    <h3><?php echo $RowStudent['firstName'] . ' ' . $RowStudent['lastName'] ?></h3>
                                                </div>
                                            </div>
                                            <div class="testimonials-text-after">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="tc-pagination"></div>
            </div>
    </section>


    <!-- Review Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Write a Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="submit_review.php" method="post">
                        <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course['id']); ?>">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" placeholder="Write your review here..." required></textarea>
                        </div>
                        <input type="hidden" id="rating" name="rating" value="">
                        <div class="listing-rating2 mb-4" id="starRating">
                            <i class="fa fa-star star" data-value="1"></i>
                            <i class="fa fa-star star" data-value="2"></i>
                            <i class="fa fa-star star" data-value="3"></i>
                            <i class="fa fa-star star" data-value="4"></i>
                            <i class="fa fa-star star" data-value="5"></i>
                        </div>
                        <div class="button-container">
                            <input type="submit" class="btn btn-primary" value="Post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>










    <?php
    require "footer.php";
    ?>
    <script src="./js/single_Page_View.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap.js"></script> -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const compareBtn = document.getElementById('compareBtn');
            const comparisonTable = document.getElementById('comparisonTable');

            compareBtn.addEventListener('click', function() {
                if (comparisonTable.style.display === 'none' || comparisonTable.style.display === '') {
                    comparisonTable.style.display = 'block';
                } else {
                    comparisonTable.style.display = 'none';
                }
            });
        });
    </script>

    <!-- Star Rating -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-value');
                    ratingInput.value = rating;

                    stars.forEach(s => {
                        s.classList.remove('selected');
                        if (s.getAttribute('data-value') <= rating) {
                            s.classList.add('selected');
                        }
                    });
                });
            });
        });
    </script>

    <script>
        function initParadoxWay() {
            "use strict";
            if ($(".testimonials-carousel").length > 0) {
                var j2 = new Swiper(".testimonials-carousel .swiper-container", {
                    preloadImages: false,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: true,
                    grabCursor: true,
                    mousewheel: false,
                    centeredSlides: true,
                    pagination: {
                        el: '.tc-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.listing-carousel-button-next',
                        prevEl: '.listing-carousel-button-prev',
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 3,
                        }
                    }
                });
            }
        }

        $(document).ready(function() {
            initParadoxWay();
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const courseId = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;

            // Function to fetch ratings and calculate average
            function fetchAndCalculateAverage(courseId) {
                fetch(`fetch_ratings.php?id=${courseId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Received ratings data:', data);
                        const ratings = data.ratings;
                        if (ratings.length === 0) {
                            console.error('No ratings found for the course.');
                            return;
                        }

                        // Calculate average rating
                        const totalRatings = ratings.reduce((sum, rating) => sum + parseInt(rating.rating), 0);
                        const averageRating = totalRatings / ratings.length;

                        // Round to one decimal place
                        const formattedAverage = averageRating.toFixed(1);

                        // Display average rating in the HTML element
                        const averageRatingElement = document.getElementById('averageRating');
                        if (averageRatingElement) {
                            averageRatingElement.innerHTML = `<span style="font-weight:bold">${formattedAverage}</span>`;
                        } else {
                            console.error('Average rating element not found.');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching ratings:', error);
                    });
            }


            fetchAndCalculateAverage(courseId);
        });
    </script>



</body>


</html>