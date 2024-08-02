<?php
include('./Databsase/connection.php');

//variables
$search = "";
$levelCondition = "";
$displayMessage = "";

//  search term (search box)
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $terms = explode(" ", $search);
    $conditions = array();
    foreach ($terms as $term) {
        $conditions[] = "course_title LIKE '%$term%' OR instructor_name LIKE '%$term%'";
    }
    $where = implode(" AND ", $conditions);
    $query = "SELECT * FROM courses WHERE status = 'Approved' AND ($where) ORDER BY id DESC";
    $displayMessage = "Search Results for \"$search\"";
}

// grade level filter (explore courses)
elseif (isset($_GET['level'])) {
    $level = $_GET['level'];
    $gradeConditions = array();
    if (strpos($level, '-') !== false) {
        list($start, $end) = explode('-', $level);
        for ($i = $start; $i <= $end; $i++) {
            $gradeConditions[] = "level = 'grade$i'";
        }
        $levelCondition = implode(' OR ', $gradeConditions);
        $displayMessage = "Courses for Grades $start to $end";
    } else {
        $levelCondition = "level = 'grade$level'";
        $displayMessage = "Courses for Grade $level";
    }
    $query = "SELECT * FROM courses WHERE status = 'Approved' AND ($levelCondition) ORDER BY id DESC";
}

//  no search or grade level
else {
    $query = "SELECT * FROM courses WHERE status = 'Approved'";
    $displayMessage = "All Approved Courses";
}

$result = $connection->query($query);
$count = $result->num_rows;

$courses = [];
$query1 = "SELECT * FROM courses WHERE status = 'Approved' ORDER BY id DESC";
$result1 = $connection->query($query1);

if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $courses[] = $row;
    }
}

$connection->close();
?>




<!DOCTYPE html>
<html>

<head>
    <title>Courses</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="bootstrap.css">

    <link rel="icon" href="images/v3_66.png" />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
        .card-title {
            color: rgb(10, 10, 10);
        }

        .rating {
            display: inline-block;
        }

        .rating i {
            color: gold;
            margin-right: 2px;
            margin-top: 5px;
            line-height: 1;
            color: gold;

            line-height: 1;
            font-size: 11px;
        }

        .price {

            bottom: 0;
            right: 0;
            margin: 0.5rem;
            font-weight: bold;
            margin-top: 5px;
            line-height: 1;
            text-align: left;
        }

        .card-img-top {
            width: 100%;
            height: 150px;
            /* Set the desired height */
            object-fit: cover;
            /* Maintain aspect ratio and fill the container */
        }





        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: black;
            border: none;
            color: white;
            font-size: 50px;
            /* Adjust as needed */

        }



        .carousel-control-prev {
            left: -90px;
            margin-top: 100px;
        }

        .carousel-control-next {
            right: -90px;
            margin-top: 100px;
        }




        .card {
            position: relative;
            overflow: hidden;
            transition: opacity 0.3s;
        }

        .card-title {
            margin-bottom: 5px;
            line-height: 1;
            font-weight: bold;
        }


        .card-text {
            margin-bottom: 5px;
            line-height: 1;
            font-size: 11px;
            color: rgb(83, 82, 82);
        }




        .card:hover {
            opacity: 0.7
        }



        .add-to-cart-btn {
            position: absolute;
            bottom: 10px;
            left: 10px;
            padding: 5px 15px;
            background-color: #44034d;
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
            font-weight: bold;

        }

        .wishlist-btn {
            position: absolute;
            bottom: 10px;
            right: 20px;
            padding: 0;

            color: rgb(19, 18, 18);
            border: 2px solid black;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }




        .card:hover .wishlist-btn,
        .card:hover .add-to-cart-btn {
            opacity: 5;
        }

        .carousel-item {
            width: 100%;
            height: 400px;
        }

        .carousel-inner {
            width: 100%;

            justify-content: center;
            align-items: center;

        }


        .carousel-item .col-md-3 {
            flex: 0 0 20%;
        }


        /* section 2 */


        .card-title-2 {
            color: rgb(14, 13, 13);
            line-height: 0;
            margin-bottom: 0;
            left: 100px;
            font-size: 18px;
            font-weight: bold;


        }

        .rating-2 {
            display: inline-block;


        }

        .rating i {
            color: rgb(184, 136, 4);


            font-size: 11px;
        }

        .price-2 {
            position: absolute;
            top: 0;
            right: 0;

            font-weight: bold;
            padding: 0.5rem;
            background-color: rgba(255, 255, 255, 0.8);
            border-bottom-left-radius: 5px;
        }

        .card-body-2 {

            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 1rem;
        }

        .card-text-1 {
            flex-grow: 1;
            line-height: 1;
            margin-bottom: 0;
            margin-right: 40px;
            font-size: 14px;
            margin-top: 20px;
            color: rgb(39, 39, 38);

        }

        .card-text-2 {
            color: rgb(129, 129, 127);
            margin-top: 10px;

            font-size: 13px;
        }

        .card-text-3 {
            color: rgb(129, 129, 127);

            line-height: 1;
            font-size: 13px;
        }

        .card-text-4 {
            color: rgb(156, 156, 154);

            line-height: 1;
            font-size: 11px;
        }

        .card-2 {
            height: 150px;
            width: 990px;
            position: relative;
            overflow: hidden;
            transition: opacity 0.3s;
            display: flex;
            left: 90%;
            border: none;
            box-shadow: none;

        }

        .card-img-2 {
            flex-shrink: 0;
            width: 240px;
            height: 145px;
            object-fit: cover;
            border: 1px solid #b4b2b2;
            box-sizing: border-box;


        }

        .rating-container {
            display: flex;
            align-items: center;
            margin-top: -15px;

        }

        .rating-text {
            margin-left: 8px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .rating-text-2 {

            margin-bottom: 7px;
            font-size: 13px;
            color: rgb(156, 156, 154);

        }

        .row-1 {
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 20px;
        }

        .row-1::after {
            content: "";
            position: absolute;
            left: 65%;
            transform: translateX(-50%);
            bottom: 0;
            width: 990px;
            border-bottom: 2px solid rgba(3, 3, 3, 0.1);
        }

        .add-to-cart-btn-2 {
            position: absolute;
            bottom: 50px;
            left: 50%;
            padding: 5px 15px;
            background-color: #44034d;
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
            font-weight: bold;

        }

        .wishlist-btn-2 {
            position: absolute;
            bottom: 50px;
            right: 30%;
            padding: 0;

            color: rgb(19, 18, 18);
            border: 2px solid black;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-2:hover {
            opacity: 0.7
        }

        .card-2:hover .wishlist-btn-2,
        .card-2:hover .add-to-cart-btn-2 {
            opacity: 5;
        }

        .rating-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin: 10px 0;
        }

        .rating-title {
            font-size: 1.2em;
            margin-bottom: 5px;
            text-align: left;
            font-weight: bold;
        }

        .rating-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .rating-stars {
            font-size: 1.5em;
            color: #f0ad4e;
            font-size: 11px;
        }

        .rating-text {
            margin-left: 10px;
        }

        .rating-section {
            position: absolute;
            top: 35%;
            left: 0;
            transform: translateY(-50%);
            left: 4%;
            display: fixed;
        }

        input[type="radio"] {

            width: 17px;
            height: 17px;
            margin-right: 10px;

        }

        .language-selection {
            position: absolute;
            left: 0;
            transform: translateY(-50%);
            left: 2%;
            margin-top: 325px;
            display: fixed;
        }


        .language-option {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            line-height: 0.5;
        }

        .language-option input[type="radio"] {
            margin-right: 1rem;
        }

        .language-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .video-duration {
            position: absolute;
            left: 0;
            transform: translateY(-50%);
            left: 4.5%;
            margin-top: 550px;
            display: fixed;

        }

        .video-duration h3 {
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .video-duration-list {
            list-style: none;
            margin: 0;
            padding: 0;
            line-height: 0.5;
        }

        .video-duration-item {
            margin-bottom: 0.5rem;
        }


        .container {
            width: 1500px;

            margin: 0 auto;
        }

        .container-2 {
            max-width: 1200px;
            min-height: 700px;
            margin: 0 auto;
        }

        .col-md-3 {
            margin-bottom: 20px;
            /* Add margin to create space between cards */
        }

        p.card-text-2 {
            font-weight: bold;
        }

        /* Hide rating and language sections on screens smaller than 768px */
        @media (max-width: 1226px) {

            .rating-section,
            .language-selection,
            .video-duration {
                display: none;
            }
        }

        @media (max-width: 767.98px) {
            .card-2 {
                left: 0;
                width: 100%;
                height: auto;
                display: block;
            }

            .rating-section,
            .language-selection,
            .video-duration {
                display: none;
            }

            .add-to-cart-btn-2 {

                position: absolute;

                bottom: 50px;

                left: 30%;

                padding: 5px 15px;

                background-color: #44034d;

                color: white;

                border: none;

                cursor: pointer;

                opacity: 0;

                transition: opacity 0.3s;

                font-weight: bold;

            }

            .wishlist-btn-2 {

                position: absolute;

                bottom: 50px;

                right: 30%;

                padding: 0;

                color: rgb(19, 18, 18);

                border: 2px solid black;

                cursor: pointer;

                opacity: 0;

                transition: opacity 0.3s;

                width: 40px;

                height: 40px;

                border-radius: 50%;

                font-size: 20px;

                display: flex;

                align-items: center;

                justify-content: center;

            }

            .card-title-2 {

                margin-bottom: 10px;

                max-width: 200px;
                /* Set a max-width to prevent splitting */

            }
        }

        /* Small screens (phones, 600px and down) */
        @media only screen and (max-width: 468px) {
            .cards-2 {
                flex-direction: column;
                margin-bottom: 10px;
            }

            .card-2 {
                height: auto;
                width: 100%;
                flex-direction: column;
                left: 0;
                transform: scale(0.9);
                /* Scale down the card */
            }

            .card-img-2 {

                width: 100%;
                /* Set the image width to 100% of its parent container */

                height: auto;
                /* Set the image height to auto, so it scales proportionally */

                max-width: 200px;
                /* Set a maximum width for the image */

                max-height: 150px;
                /* Set a maximum height for the image */

            }

            .card-body-2 {
                padding: 1rem;
                flex-direction: column;
                justify-content: space-between;
            }

            .card-title-2 {
                margin-bottom: 10px;
                max-width: 200px;
            }

            .card-text-1 {
                display: none;
                /* Remove .card-text-1 */
            }

            .card-text-2,
            .card-text-3,
            .card-text-4 {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .price-2 {
                position: static;
                margin-top: 10px;
                font-weight: bold;
                padding: 0.5rem;
                background-color: rgba(255, 255, 255, 0.8);
                border-radius: 5px;
            }

            .row-1::after {
                content: "";
                position: static;
                width: 100%;
                border-bottom: 2px solid rgba(3, 3, 3, 0.1);
                margin-top: 20px;
            }

            .price-container {
                display: flex;
                justify-content: flex-end;
                margin-top: 10px;
            }

            .card-text-2,
            .card-text-3,
            .card-text-4,
            .price-2 {
                display: block;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .carousel-item .col-md-3 {
                flex: 0 0 100%;
                /* Show one card per row on small screens */
                max-width: 100%;
                /* Ensure the card takes up the full width */
            }
        }
    </style>

</head>

<body>
    <section id="header">
        <?php
        require "header.php";
        ?>
    </section>



    <!--section 1-->

    <!--section 2-->

    <section>
    <h2 class="text-center my-4"><?php echo $count; ?> <?php echo $displayMessage; ?></h2>

        <div class="container-2">

            <div class="rating-section">
                <span class="rating-title">Ratings</span>
                <div class="rating-item">
                    <input type="radio" name="rating" id="rating5" class="rating-radio">
                    <label for="rating5">
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </label>
                    <span class="rating-text">4.5 & up (1,114)</span>
                </div>
                <div class="rating-item">
                    <input type="radio" name="rating" id="rating4" class="rating-radio">
                    <label for="rating5">
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </label>
                    <span class="rating-text">4.0 & up (2,035)</span>
                </div>
                <div class="rating-item">
                    <input type="radio" name="rating" id="rating3" class="rating-radio">
                    <label for="rating5">
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </label>
                    <span class="rating-text">3.5 & up (2,461)</span>
                </div>
                <div class="rating-item">
                    <input type="radio" name="rating" id="rating2" class="rating-radio">
                    <label for="rating5">
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </label>
                    <span class="rating-text">3.0 & up (2,602)</span>
                </div>
                <div class="language-selection">
                    <h4 class="language-title">Language</h4>


                    <form id="languageForm" method="GET" action="">

                        <div class="language-option">
                            <input type="radio" id="all" name="language" value="all" onchange="document.getElementById('languageForm').submit();">
                            <label for="all">All</label>
                        </div>

                        <div class="language-option">
                            <input type="radio" id="english" name="language" value="English" onchange="document.getElementById('languageForm').submit();">
                            <label for="english">English</label>
                        </div>
                        <div class="language-option">
                            <input type="radio" id="Sinhala" name="language" value="Sinhala" onchange="document.getElementById('languageForm').submit();">
                            <label for="Sinhala">Sinhala</label>
                        </div>

                        <div class="language-option">
                            <input type="radio" id="portuguese" name="language" value="Portuguese" onchange="document.getElementById('languageForm').submit();">
                            <label for="portuguese">Portuguese</label>
                        </div>
                        <div class="language-option">
                            <input type="radio" id="french" name="language" value="French" onchange="document.getElementById('languageForm').submit();">
                            <label for="french">French</label>
                        </div>
                    </form>


                </div>
            </div>

            <div class="video-duration">
                <h3>Grades</h3>
                <ul class="video-duration-list">
                    <li class="video-duration-item">
                        <input type="radio" id="duration-0-1" name="duration" value="0-1">
                        <label for="duration-0-1">Grade 1</label>
                    </li>
                    <li class="duration-video-item">
                        <input type="radio" id="duration-1-3" name="duration" value="1-3">
                        <label for="duration-1-3">Grade 2</label>
                    </li>
                    <li class="video-duration-item">
                        <input type="radio" id="duration-3-6" name="duration" value="3-6">
                        <label for="duration-3-6">Grade 3</label>
                    </li>
                    <li class="video-duration-item">
                        <input type="radio" id="duration-6-17" name="duration" value="6-17">
                        <label for="duration-6-17">Grade 4</label>
                    </li>
                    <li class="video-duration-item">
                        <input type="radio" id="duration-17+" name="duration" value="17+">
                        <label for="duration-17+">Grade 5</label>
                    </li>
                </ul>
            </div>




            <div class="row-1 mb-4">
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-md-3">
                            <div class="card-2">
                                <div class="d-flex">
                                    <div>
                                        <img src="<?php echo "./uploads/" . htmlspecialchars($row['imagePath']); ?>" class="card-img-2" alt="...">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="card-body-2">
                                            <h8 class="card-title-2"><?php echo htmlspecialchars($row['course_title']); ?></h8>
                                            <p class="card-text-1"><?php echo htmlspecialchars($row['s_description']); ?></p>
                                            <p class="card-text-2">Instructor: <?php echo htmlspecialchars($row['instructor_name']); ?></p>
                                            <div class="rating-container">
                                                <span class="rating-text">4.0</span>
                                                <div class="rating ml-2 mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span class="rating-text-2">(1526)</span>
                                            </div>
                                            <p class="card-text-3"><?php echo htmlspecialchars($row['language']); ?></p>
                                            <div class="text-left">

                                            </div>
                                            <button class="wishlist-btn-2"><i class="fas fa-heart"></i> </button>
                                            <button class="add-to-cart-btn-2"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="text-center w-100">No courses available.</p>
                <?php endif; ?>
            </div>




        </div>
        </div>

        <h1 class="text-center mb-4">Recent Courses</h1>
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <?php
                    $chunked_courses = array_chunk($courses, 5); // Change to the number of items you want per slide
                    $active = 'active';
                    foreach ($chunked_courses as $course_set) {
                        echo '<div class="carousel-item ' . $active . '">';
                        echo '<div class="row">';
                        foreach ($course_set as $course) {
                            echo '<div class="col-md-3">
                            <div class="card">
                                <img src="./uploads/' . htmlspecialchars($course['imagePath']) . '" class="card-img-top" alt="' . htmlspecialchars($course['course_title']) . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($course['course_title']) . '</h5>
                                    <p class="card-text">' . htmlspecialchars($course['s_description']) . '</p>
                                    <div class="rating ml-2">';
                            for ($i = 1; $i <= 5; $i++) {
                                echo ($i <= 4) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                            }
                            echo '</div>
                                    <button class="wishlist-btn"><i class="fas fa-heart"></i></button>
                                    <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>';
                        }
                        echo '</div>';
                        echo '</div>';
                        $active = ''; // Only the first item should be active
                    }
                    ?>
                </div>
                <div class="carousel-control-container">
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>


        <script>
            // Previous button
            $('#carouselExampleControls').on('click', '.carousel-control-prev', function() {
                $('#carouselExampleControls').carousel('prev');
                if ($('.carousel-inner .carousel-item.active').index() == 0) {
                    $('#carouselExampleControls').carousel('pause');
                }
            });

            // Next button
            $('#carouselExampleControls').on('click', '.carousel-control-next', function() {
                $('#carouselExampleControls').carousel('next');
                if ($('.carousel-inner .carousel-item.active').index() + 1 >= $('.carousel-inner .carousel-item').length) {
                    $('#carouselExampleControls').carousel('pause');
                }
            });

            $('#carouselExampleControls').on('slide.bs.carousel', function(e) {
                if (e.direction === 'next' && $('.carousel-inner .carousel-item.active').index() + 1 >= $('.carousel-inner .carousel-item').length - 1) {
                    $('#carouselExampleControls').carousel('pause');
                } else {
                    $('#carouselExampleControls').carousel('cycle');
                }
            });
        </script>


        <section id="footer">
            <?php
            require "footer.php";
            ?>
        </section>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>