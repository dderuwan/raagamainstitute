<?php
session_start();
include ('./Databsase/connection.php');

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

$id = $_GET['id'] ?? null;
if ($id === null) {
    die("Course ID not provided.");
}

// First query: Fetch course details
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
$instructor_id = $course['instructor_id'];


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
            background-color: #457992 !important;
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

                                    <?php
                                    // default image is displayed when the image path in the database is either missing or incorrect
                                    $imagePath = isset($course['imagePath']) ? $course['imagePath'] : "";
                                    $defaultImage = "https://img.freepik.com/free-vector/interior-computer-lab-with-copyspace_1308-28026.jpg?t=st=1717826470~exp=1717830070~hmac=87a60e3e6adb6a2b68ceff2c3f96cd7500c2703d783131fa2faed546cbf52126&w=900";

                                    if ($imagePath && file_exists("uploads/" . $imagePath)) {
                                        $imageSrc = "uploads/" . $imagePath;
                                    } else {
                                        $imageSrc = $defaultImage;
                                    }
                                    ?>

                                    <img src="<?php echo htmlspecialchars($imageSrc); ?>"
                                        alt="<?php echo htmlspecialchars($course['course_title']); ?>"
                                        style="width: 100%; height: 100%; object-fit: cover" />

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
                                                        <input type="hidden" name="id"
                                                            value="<?php echo htmlspecialchars($id); ?>">
                                                        <input type="hidden" name="title"
                                                            value="<?php echo htmlspecialchars($course['course_title']); ?>">
                                                        <input type="hidden" name="price"
                                                            value="<?php echo htmlspecialchars($course['price']); ?>">
                                                        <input type="hidden" name="imagePath"
                                                            value="<?php echo htmlspecialchars($course['imagePath']); ?>">
                                                        <input type="hidden" name="s_description"
                                                            value="<?php echo htmlspecialchars($course['s_description']); ?>">
                                                        <!-- <button type="submit" class="btn btn-dark mb-2"
                                                            style="width:-webkit-fill-available;">Add to
                                                            Cart <h3>Rs.
                                                                <?php echo htmlspecialchars($course['price']); ?>
                                                            </h3></button> -->
                                                    </form>
                                                </div>
                                                <div class="card-header text-center fs-5">
                                                    <h3 class="custom-h3" style="font-weight: 500;">
                                                        Course Details
                                                    </h3>
                                                </div>

                                                <div class="list-group border" style="background-color: #f8f9fa;">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item p-4"
                                                            style="background-color:#f8f9fa;">
                                                            <i class="fa fa-users" style="color: #457992"
                                                                aria-hidden="true"></i>
                                                            <span class="course-detail-span">
                                                                Enrolled :
                                                            </span>
                                                        </li>
                                                        <li class="list-group-item p-4"
                                                            style="background-color:#f8f9fa;">
                                                            <i class="fas fa-clock" style="color: #457992"></i>
                                                            <span class="course-detail-span">
                                                                Duration :
                                                                <span>
                                                        </li>
                                                        <li class="list-group-item p-4"
                                                            style="background-color:#f8f9fa;">
                                                            <i class="fas fa-chalkboard-teacher"
                                                                style="color: #457992"></i>
                                                            <span class="course-detail-span">
                                                                Lectures :
                                                                <span>
                                                        </li>
                                                        <li class="list-group-item p-4"
                                                            style="background-color:#f8f9fa;">
                                                            <i class="fas fa-video" style="color: #457992"></i>
                                                            <span class="course-detail-span">
                                                                Videos :
                                                                <span>
                                                        </li>
                                                        <li class="list-group-item p-4"
                                                            style="background-color:#f8f9fa;">
                                                            <i class="fas fa-signal" style="color: #457992"></i>
                                                            <span class="course-detail-span">
                                                                Level :
                                                                <?php echo nl2br(htmlspecialchars($course['level'])); ?>
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
                                    <div
                                        style="height: 250px;padding: 0px;margin: 16px 0px 0px;border: 1px solid #ddd;">
                                        <nav>
                                            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-home" type="button" role="tab"
                                                    aria-controls="nav-home" aria-selected="true"
                                                    style="margin: 0px;border-radius: 0px;">Description</button>
                                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-profile" type="button" role="tab"
                                                    aria-controls="nav-profile" aria-selected="false"
                                                    style="margin: 0px;border-radius: 0px;">FAQ</button>
                                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-contact" type="button" role="tab"
                                                    aria-controls="nav-contact" aria-selected="false"
                                                    style="margin: 0px;border-radius: 0px;">Announcements</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content p-4 bg-white" id="nav-tabContent"
                                            style="max-height: 200px;overflow-y: auto;width: 100%;scrollbar-gutter: stable;">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <p style="color: #555555;">
                                                    <?php echo nl2br(htmlspecialchars($course['s_description'])); ?>
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                aria-labelledby="nav-profile-tab" style="color: #555555;">
                                                <div class="row" onclick="OpenFAQDetails()"
                                                    style="padding-right: 0px !important;margin: 0px 0px 10px !important;margin-left: 15px !important;background-color: #f8f9fa;color: #273044;border: 1px solid #ddd;display: flex; align-items: center; justify-content: space-between;">
                                                    <div class='col-8 '>
                                                        <p
                                                            style="margin-bottom: 0px;padding: 3px 0px;cursor: pointer;font-weight: 500;">
                                                            Why should I chose You ?</p>
                                                    </div>
                                                    <div class='col-1' style="margin-right: 10px;cursor: pointer;">
                                                        <i id="arrow-icon" style="color: #273044"
                                                            class="fa-solid fa-circle-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div id="hide-faq" class="row"
                                                    style="padding-right: 0px !important;margin:8px 0px 8px !important;border-bottom: 1px solid white; display: none;">
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
                                                <div class="row" onclick="OpenFAQDetails()"
                                                    style="padding-right: 0px !important;margin: 0px 0px 10px !important;margin-left: 15px !important;background-color: #f8f9fa;color: #273044;border: 1px solid #ddd;display: flex; align-items: center; justify-content: space-between;">
                                                    <div class='col-8 '>
                                                        <p
                                                            style="margin-bottom: 0px;padding: 3px 0px;cursor: pointer;font-weight: 500;">
                                                            What makes you different ?</p>
                                                    </div>
                                                    <div class='col-1' style="margin-right: 10px;cursor: pointer;">
                                                        <i id="arrow-icon" style="color: #273044"
                                                            class="fa-solid fa-circle-chevron-down"></i>
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
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                                aria-labelledby="nav-contact-tab" style="color: #555555;">
                                                <?php if (!empty($announcements)): ?>
                                                    <ul>
                                                        <?php foreach ($announcements as $announcement): ?>
                                                            <li><b><?php echo htmlspecialchars($announcement['announcement']); ?>
                                                                    -</b>
                                                                <small><?php echo htmlspecialchars($announcement['course']); ?></small>-
                                                                <small><?php echo htmlspecialchars($announcement['message']); ?></small>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
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
                                            // Database query
                                            $query = "SELECT imagePath, FirstName, LastName FROM instructors WHERE id = $instructor_id";
                                            $result = mysqli_query($connection, $query);
                                            $row = mysqli_fetch_array($result);

                                            $image = isset($row['imagePath']) ? $row['imagePath'] : "";
                                            $firstName = isset($row['FirstName']) ? $row['FirstName'] : "";
                                            $lastName = isset($row['LastName']) ? $row['LastName'] : "";
                                            $title = trim("$firstName $lastName");

                                            $defaultImage = "https://img.freepik.com/premium-vector/vector-professional-icon-business-illustration-line-symbol-people-management-career-set-c_1013341-73281.jpg?w=740";
                                            // default image is displayed when the image path in the database is either missing or incorrect,
                                            if ($image && file_exists($image)) {
                                                $imageSrc = $image;
                                            } else {
                                                $imageSrc = $defaultImage;
                                            }
                                            ?>
                                            <img src="<?php echo htmlspecialchars($imageSrc); ?>"
                                                title="<?php echo htmlspecialchars($title); ?>" class="profile-pic" />

                                        </div>
                                        <div class="data">
                                            <h2><?php echo htmlspecialchars($course['instructor_name']); ?></h2>
                                            <span><?php echo htmlspecialchars($course['instructor_email']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Packeges Details -->
                        <div class="col-md-6 col-12 mt-3">

                            <div class="border border-3" style="min-height: 600px;position: relative;">
                                <nav>
                                    <div class=" nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                        <button class="nav-link active rounded-0 btn-class-type" id="nav-master-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-master" type="button" role="tab"
                                            aria-controls="nav-master" aria-selected="true"
                                            style="margin: 0px !important;">Mas</button>
                                        <button class="nav-link rounded-0 btn-class-type" id="nav-group-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-group" type="button" role="tab"
                                            aria-controls="nav-group" aria-selected="false"
                                            style="margin: 0px !important;">Group</button>
                                        <button class="nav-link rounded-0 btn-class-type" id="nav-individual-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-individual" type="button"
                                            role="tab" aria-controls="nav-individual" aria-selected="false"
                                            style="margin: 0px !important;">Individual</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent" style="padding: 24px;">
                                    <div class="tab-pane fade show active custom-tab-style" id="nav-master"
                                        role="tabpanel" aria-labelledby="nav-home-tab">

                                        <span class="fs-1" style="font-weight: 500;color: #273044">RS </span> <span
                                            class="fs-1" style="font-weight: 700;color: #273044">1500</span>
                                        <p style="font-weight: 500;color: red;padding: 10px 0px;">Save up to 5% with
                                            Subscribe to Save
                                            Basic</p>
                                        <p>
                                        <ul style="color: #555555;font-size: 14px; padding-left: 0px; opacity: 0.6;">
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Video Lessons</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Text Lessons</p>
                                        </ul>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade custom-tab-style" id="nav-group" role="tabpanel"
                                        aria-labelledby="nav-group-tab">
                                        <span class="fs-1" style="font-weight: 500;color: #273044">RS </span> <span
                                            class="fs-1" style="font-weight: 700;color: #273044">3500</span>
                                        <p style="font-weight: 500;color: red;padding: 10px 0px;">Save up to 5% with
                                            Subscribe to Save
                                            Basic</p>
                                        <p>
                                        <ul style="color: #555555;font-size: 14px; padding-left: 0px; opacity: 0.6;">
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Video Lessons</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Text Lessons</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Individual
                                                Monitoring
                                            </p>
                                        </ul>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade custom-tab-style" id="nav-individual" role="tabpanel"
                                        aria-labelledby="nav-individual-tab">
                                        <span class="fs-1" style="font-weight: 500;color: #273044">RS </span> <span
                                            class="fs-1" style="font-weight: 700;color: #273044">5000</span>
                                        <p style="font-weight: 500;color: red;padding: 10px 0px;">Save up to 5% with
                                            Subscribe to Save
                                            Basic</p>
                                        <p>
                                        <ul style="color: #555555;font-size: 14px; padding-left: 0px; opacity: 0.6;">
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Video Lessons</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Text Lessons</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Zoom Lessons</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Assignments</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Exams</p>
                                            <p><i class="fa-regular fa-hand-point-right"
                                                    style="color: #eab830;margin-right: 15px"></i>Individual
                                                Monitoring
                                            </p>
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                                <div style="position: absolute; bottom: 0px;width: 100%;padding: 10px 24px;">
                                    <button type="submit" class="btn"
                                        style="margin-top: 40px;width:-webkit-fill-available;background-color: #457992; color: white; font-weight: 500">Continue
                                        <!-- <i class="fas fa-arrow-right ml-3" style="font-weight: 500;"></i> -->
                                        <i class="fa-solid fa-arrow-right" style="padding-left: 10px;"></i>
                                    </button>

                                    <p id="compareBtn" class="text-center mt-10"
                                        style="font-weight: 500;color: #457992;padding-top: 20px;cursor: pointer;">
                                        Compare Packages</p>

                                    <!-- <p><?php echo nl2br(htmlspecialchars($option_course['price'])); ?>
                                        </p>
                                        <p><?php echo nl2br(htmlspecialchars($option_course['package_type'])); ?>
                                        </p> -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="comparisaonTable" class="row mt-5 mb-5" style="display: none;">
                        <div class="col-12" style="margin-bottom: 12px;">
                            <h2 class="custom-h2">Compare packages</h2>
                        </div>
                        <table class="comparison-table">
                            <thead>
                                <th>&nbsp;</th>
                                <th style="text-align: center">Mas</th>
                                <th style="text-align: center">Group</th>
                                <th style="text-align: center">Individual</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="td-title">Video Lessons</td>
                                    <td>✅</td>
                                    <td>✅</td>
                                    <td>✅</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Text Lessons</td>
                                    <td>✅</td>
                                    <td>✅</td>
                                    <td>✅</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Individual Monitoring</td>
                                    <td>❌</td>
                                    <td>✅</td>
                                    <td>✅</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Zoom Lessons</td>
                                    <td>❌</td>
                                    <td>❌</td>
                                    <td>✅</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Assignments</td>
                                    <td>❌</td>
                                    <td>❌</td>
                                    <td>✅</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Exams</td>
                                    <td>❌</td>
                                    <td>❌</td>
                                    <td>✅</td>
                                </tr>
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



   





   
    <?php
    require "footer.php";
    ?>
    <script src="./js/single_Page_View.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" </script>

</body>


</html>

<?php
$connection->close();
?>