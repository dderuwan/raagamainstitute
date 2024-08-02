<?php
session_start();
include ('./Databsase/connection.php')
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Vaathi Home</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="search_script.js"></script>
    <script defer src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSweetAlert() {
            Swal.fire({
                title: 'Become RaagamaInstitute Instructor?',
                text: 'Do you have Strong educational background?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, I have!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'emailverify.php';
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.btn-preview');
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const courseId = this.getAttribute('data-course-id');
                    window.location.href = 'Single_Page_View.php?id=' + encodeURIComponent(courseId);
                });
            });
        });
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif, poppins;
        }

        .swiper-container {
            width: 100%;
            height: 50%;
            overflow: hidden;

        }

        .swiper-wrapper {
            align-items: center;
        }

        .mobilecontainer {
            display: none;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: rgba(44, 43, 103, 255);
        }

        .card {
            margin: 0 auto;
            width: 100%;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            overflow: hidden;
        }

        .card-body p {
            font-size: 0.9rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: auto;
            object-fit: cover;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .card-text {
            color: #666;
            font-size: 16px !important;
        }

        .loginSignupBtn {
            width: 150px;
            color: #036fc1 !important;
            border: 1px solid #036fc1;
            background-color: white !important;
            font-size: 20px !important;
        }

        .loginSignupBtn:hover {
            font-weight: 600 !important;
        }

        .btn-primary {
            background-color: #036fc1 !important;
            border: 1px solid #036fc1 !important;
        }

        .btn-primary:hover {
            background-color: white !important;
            color: #036fc1 !important;
            border: 1px solid #036fc1 !important;
            font-weight: 600 !important;
        }

        .sliderBtn {
            width: 95% !important;
            border-radius: 12px !important;
            padding: 10px 0px !important;
            font-size: 20px !important;
            line-height: 140% !important;
            margin-top: 20px;
        }

        /* ------ explore courses start ------- */
        .explore-card-img-container {
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0px;
        }

        .explore-card-img-top {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .custom-explore-cource-btn {
            width: 80% !important;
            position: absolute;
            bottom: 20px;
            border-radius: 12px !important;
            padding: 10px 0px !important;
            font-weight: 600 !important;
            font-size: 20px !important;
            line-height: 140% !important;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .tags {
            text-align: center;
            color: #036fc1;
            background-color: #fff;
            border: 1px solid #eceaea;
            border-radius: 6px;
            padding: 7px 15px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
        }

        .tags:hover {
            color: #fff;
            background-color: #036fc1;
        }

        .pClassTitle {
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 140%;
            color: #036fc1;
        }

        /* ----- explore courses end ------ */

        .custom-row {
            display: flex;
            flex-wrap: wrap;
        }

        /* .custom-col {
            flex: 1;
            padding: 10px;
        } */

        /*  */
        .fixed-buttons {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .fixed-buttons .carousel-caption {
            position: static;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }


        /*  */
        .testimonials img {
            width: 100px;
            height: 100px;
        }

        .testimonials p {
            padding: 0 10px;
            font-size: 0.8rem;
        }

        .become-instructor {
            background-color: white;
            padding: 50px 0;
            color: #333;
        }

        .become-instructor h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .become-instructor p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .become-instructor .btn-primary {
            background-color: #0056b3;
            border-color: #004080;
        }

        .become-instructor img {
            max-width: 100%;
            height: auto;
        }

        .popular {
            background-color: #EEEFF3;
        }

        .book-demo {
            font-weight: 600;
            font-size: 48px;
            line-height: 48px;
            color: #01202b;
            margin-bottom: 16px;
        }

        .book-demo-Btn {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 40px;
            --tw-text-opacity: 1;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
            background: #036fc1;
            box-shadow: 0 3px 0 #2c2c6a;
            border: 1px solid transparent;
            line-height: 1.6;
            letter-spacing: .2px;
            cursor: pointer;
            transition: .3s ease;
            min-width: 195px;
            padding: 12px 15px;
            border-radius: 8px;
            display: inline-block;
            text-align: center;
            font-weight: 600;
            font-size: 25px;
            --webkit-appearance: button;
        }

        /* ----- Our students and parents love us ------ */

        .count {
            font-size: 30px;
            font-weight: 600;
            color: #2c2b67;
            align-items: center;
            margin-bottom: -10px;
        }

        .name {
            font-size: 18px;
        }


        .Pop-container {
            display: flex;
            flex-direction: row;
        }

        .featured-course {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .bookingform {
            width: 30%;
            order: 2;
        }

        /******************/
        /*  MEDIA QUERIES */
        /******************/


        @media (max-width: 1025px) {
            .Pop-container {
                flex-direction: column;

            }

            .card.featured-card.mt-4 {
                width: 100% !important;
            }

            .featured-course {
                flex-direction: column;
            }

            .bookingform {
                width: 100% !important;
                margin: 0 auto;
            }
        }

        @media (max-width: 1920px) and (min-width: 769px) {
            .custom-col.img-container {
                display: flex;
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .custom-col.img-container {
                display: none;
            }

            .custom-row .custom-col:not(.img-container) {
                width: 100%;
            }

            .font-size-after-768 {
                font-size: 35px !important;
            }

            .book-demo-Btn {
                width: 100%;
                margin-bottom: 40px;
            }

            .card.featured-card.mt-4 {
                width: 100% !important;

            }

        }

        @media (max-width: 1048px) {
            .hide {
                display: none !important;
            }
        }

        /* Mobile Styles (320px — 480px) */
        @media (max-width: 480px) {
            .static-slider10 {
                height: 100px !important;
            }

            .container-static-slider10 {
                padding: 20px;
            }

            .custom-free-demo {
                padding-top: 40px;
            }
        }

        /* Tablet Styles (481px — 768px) */
        @media (min-width: 481px) and (max-width: 768px) {
            .static-slider10 {
                height: 200px !important;
            }

            .custom-free-demo {
                padding-top: 40px;
            }

            .custom-become-an-instructor {
                margin-top: 20px !important;
            }
        }

        /* Laptop Styles (769px — 1024px) */
        @media (min-width: 769px) and (max-width: 1024px) {
            .static-slider10 {
                height: 300px !important;
            }

            .custom-free-demo {
                padding-top: 40px;
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

    <!-- CAROUSEL -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/web-01.svg" class="d-block w-100" alt="..." style="">
                </div>
                <div class="carousel-item">
                    <img src="./images/web-02.svg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <?php
        if (!isset($_SESSION['id'])) {
            ?>
            <div class="fixed-buttons">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="hide">Login or Signup</h5>
                    <p class="hide">Click below to login or signup to access more features.</p>
                    <a href="Student_Signin.php" class="btn loginSignupBtn" role="button">Login</a>
                    <a href="Student_Register.php" class="btn loginSignupBtn" role="button">Signup</a>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
        if (isset($_SESSION['id'])) {
            ?>
            <div class="fixed-buttons">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="hide">Welcome to RaagamaInstitute</h5>
                    <p class="hide">Start new valuable courses with us.</p>
                    <a href="allCourses.php" class="btn loginSignupBtn" role="button">Courses</a>
                    <!-- <a href="Student_Register.php" class="btn loginSignupBtn" role="button">Signup</a> -->
                </div>
            </div>
            <?php
        }
        ?>

        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- POPULAR COURSES -->
    <div class="container-fluid" style="background-color: #EEEFF3;">
        <div class=" container" id="Pop-container">
            <div class="main-content">
                <div class="col-12 popular" style="margin-top: 90px;">
                    <div class="row popular-topic">
                        <h1 class="text-center mt-2 font-size-after-768"
                            style="font-family: serif; font-weight: 550; font-size: 40px;margin: 0px; padding-top: 0px;">
                            Popular
                            Courses</h1>
                    </div>

                    <div class="swiper-container mt-5">
                        <div class="swiper-slide featured-course mb-4" style="gap: 12px; border-radius:15px;">

                            <div class="card featured-card mt-4" style="width: 70%; margin-bottom: 20px;">
                                <div class="col-12">
                                    <div class="row custom-row">
                                        <?php
                                        $sql = "SELECT * FROM courses WHERE `status` = 'Approved' ORDER BY RAND()";
                                        $result = mysqli_query($connection, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $image_path = $row["imagePath"];
                                            $image_path = str_replace('../course', './course', $image_path);
                                            // Define the default image path
                                            $default_image_path = 'https://img.freepik.com/free-vector/interior-computer-lab-with-copyspace_1308-28026.jpg?t=st=1717826470~exp=1717830070~hmac=87a60e3e6adb6a2b68ceff2c3f96cd7500c2703d783131fa2faed546cbf52126&w=900';
                                            // Check if the image path is empty or the image file does not exist
                                            if (empty($image_path) || !file_exists($image_path)) {
                                                $image_path = $default_image_path;
                                            }
                                            ?>
                                            <div class="col-6 custom-col">
                                                <img src="<?php echo $image_path ?>" class="card-img-top" alt="..."
                                                    style="width: 100%; height: 380px; object-fit: cover; border-radius: 0px;">
                                            </div>
                                            <div class="col-6 custom-col">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="font-size: 26px !important;">
                                                        <?php echo $row['course_title'] ?>
                                                    </h5>
                                                    <p class="card-text" style="font-size: 20px !important; color: black;">
                                                        <?php echo $row['description'] ?>
                                                    </p>
                                                    <span class="card-text"
                                                        style="font-size: 20px; color:black;">Instructor:
                                                    </span>
                                                    <span class="card-text"
                                                        style="font-size: 18px !important; color:#666;font-weight: 400;padding-left: 0px;"><?php echo $row['instructor_name'] ?></span>
                                                    <p class="card-text" style="font-size: 18px; color:#666;">Language :
                                                        <?php echo $row['language'] ?>
                                                    </p>
                                                    <button
                                                        class="btn btn-preview btn-primary d-flex align-items-center justify-content-center"
                                                        style="width: 100% !important; border-radius: 12px !important; padding: 10px 0px !important; font-size: 20px; line-height: 140% !important; margin-top: 20px;"
                                                        data-course-id="<?php echo $row['id']; ?>">
                                                        Learn More
                                                    </button>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="bookingform" id="bookingFormID"
                                style="background-color: white; width: 30%; border-radius: 15px;">
                                <div class="col-12">
                                    <div class="topBooking"
                                        style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                                        <h2 style="margin-top: 20px; font-size: 24px; font-weight:600;">Book your Free
                                            Session</h2>
                                        <h6
                                            style="color: #273276; background-color: #87CFF1; padding: 5px; border-radius: 10px;">
                                            RaagamaInstitute Education</h6>

                                        <h4 style="font-size: 18px; font-weight: 600; color: #333;">Enter Your Details
                                        </h4>

                                    </div>
                                </div>

                                <form method="POST" action="./handlers/freebookings.php">
                                    <div class="bookingfeilds"
                                        style="display: flex; align-items:center; justify-content:center; flex-direction:column; gap: 15px; margin: 12px;">
                                        <div class="form-group" style="width: 90%;">
                                            <input type="text" class="form-control" name="name"
                                                id="exampleFormControlInput1" placeholder="Enter Full Name">
                                        </div>

                                        <div class="form-group" style="width: 90%;">
                                            <input type="text" class="form-control" name="Cnumber"
                                                id="exampleFormControlInput1" placeholder="Enter Contact Number">
                                        </div>

                                        <div class="form-group" style="width: 90%;">
                                            <input type="email" class="form-control" name="address"
                                                id="exampleFormControlInput1" placeholder="Enter Email Address">
                                        </div>

                                        <div class="form-group" style="width: 90%;">
                                            <input type="text" class="form-control" name="country"
                                                id="exampleFormControlInput1" placeholder="Enter Country">
                                        </div>

                                        <div class="form-group" style="width: 90%; margin-bottom:20px;">
                                            <button type="submit" name="btnSubmit" class="btn  mb-2"
                                                style="font-size: 18px;color: white; font-weight: 600;  width: 100%; background: #ee0979; background: -webkit-linear-gradient(to right, #ff6a00, #ee0979); background: linear-gradient(to right, #ff6a00, #ee0979); ">Confirm
                                                identity</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="swiper-wrapper" style="display: none;">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <?php
                            $sql = "SELECT * FROM courses ORDER BY RAND()";
                            $result = mysqli_query($connection, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $image_path = $row["imagePath"];
                                    $image_path = str_replace('../course', './course', $image_path);

                                    // Define the default image path
                                    $default_image_path = 'https://img.freepik.com/free-vector/interior-computer-lab-with-copyspace_1308-28026.jpg?t=st=1717826470~exp=1717830070~hmac=87a60e3e6adb6a2b68ceff2c3f96cd7500c2703d783131fa2faed546cbf52126&w=900';

                                    // Check if the image path is empty or the image file does not exist
                                    if (empty($image_path) || !file_exists($image_path)) {
                                        $image_path = $default_image_path;
                                    }
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="card"
                                            style="width: 18rem; display: flex; flex-direction: column; justify-content: start;border-radius: 24px;">
                                            <div>
                                                <img src="<?php echo $image_path ?>" class="card-img-top" alt="..."
                                                    style="width: 300px; height: 140px; object-fit: cover">
                                            </div>
                                            <div class="card-body">
                                                <div class="row" style="height: 100px">
                                                    <h5 class="card-title" title='<?php echo $row['course_title']; ?>'>
                                                        <?php
                                                        if (strlen($row['course_title']) > 50) {
                                                            echo substr($row['course_title'], 0, 50) . '...';
                                                        } else {
                                                            echo $row['course_title'];
                                                        }
                                                        ?>
                                                    </h5>
                                                </div>
                                                <div class="row pb-2" style="display: block;">
                                                    <span class="card-text" style="padding-right: 0px;">Instructor: RS </span>
                                                    <span class="card-text"
                                                        style="font-weight: 600;padding-left: 0px;"><?php echo $row['price'] ?><span>
                                                </div>
                                                <div class="row pb-2">
                                                    <p class="card-text">Language: <?php echo $row['language'] ?></p>
                                                </div>
                                                <div class="row pb-2 mt-2 d-flex justify-content-center">
                                                    <a href="#" class="btn btn-primary sliderBtn">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- notice board -->

                <div class="col-12 my-4">
                    <div class="row">
                    </div>
                </div>

            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <hr style="widtH: 150px;">
        </div>
    </div>

    <!-- Explore courses -->
    <div class="container-fluid" style="background-color: white;">
        <div class="container mt-5">
            <div class="main-content p-0 m-0">
                <div class="col-12 popular" style="padding-bottom: 50px;background-color: white;">
                    <div class="row popular-topic" id="Explore" style="display: inline;padding: 0px;margin: 0px;">
                        <span style="font-family:  serif; font-weight: 550; font-size: 40px;padding: 0px !important;"
                            class="font-size-after-768">
                            Explore Courses
                        </span>
                        <span style="padding-left: 0px !important;font-size: 16px;color: rgba(44,43,103,255);">(Class 1
                            -
                            13)</span>
                    </div>

                    <div class="swiper-container explore-swiper">
                        <div class="swiper-wrapper" style="margin-top: 20px">
                            <div class="swiper-slide">
                                <div class="card" style="width: 18rem;height: 360px;border-radius: 24px;">
                                    <div class="row m-0" style="position: relative;">
                                        <div class="" style="position: absolute; bottom: -350px; right: -80px;">
                                            <img src="./images/banner/teacher.png" class="" alt="...">
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <div
                                            style="margin-bottom: 12px;width: 80% !important;position: absolute;top: 20px;">
                                            <p class="pClassTitle">
                                                Class 1 - 5</p>
                                            <div style="background-color: rgb(255, 255, 255, 0.6);">
                                                <h3
                                                    style="font-weight: 600;font-size: 18px;line-height: 30px;color: #01202b;margin-bottom: 15px;">
                                                    Classes for kids</h3>
                                            </div>
                                            <div class="tags-container">
                                                <a href="allcourses.php?syllabus=Local Syllabus" class="tags">Local
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Cambridge Syllabus"
                                                    class="tags">Cambridge Syllabus</a>
                                                <a href="allcourses.php?syllabus=Other Syllabus" class="tags">Other
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Professional Courses"
                                                    class="tags">Professional Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <a href="allcourses.php?level=1-5"
                                            class="btn btn-primary custom-explore-cource-btn">Explore Courses</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card" style="width: 18rem;height: 360px;border-radius: 24px;">
                                    <div class="row m-0" style="position: relative;">
                                        <div class="" style="position: absolute; bottom: -350px; right: -80px;">
                                            <img src="./images/banner/92ca55f2-ef3f.png" class="" alt="...">
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <div
                                            style="margin-bottom: 12px;width: 80% !important;position: absolute;top: 20px;">
                                            <p class="pClassTitle">
                                                Class 6 - 9</p>
                                            <div style="background-color: rgb(255, 255, 255, 0.6);">
                                                <h3
                                                    style="font-weight: 600;font-size: 18px;line-height: 30px;color: #01202b;margin-bottom: 15px;">
                                                    School Tuition</h3>
                                            </div>
                                            <div class="tags-container">
                                                <a href="allcourses.php?syllabus=Local Syllabus" class="tags">Local
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Cambridge Syllabus"
                                                    class="tags">Cambridge Syllabus</a>
                                                <a href="allcourses.php?syllabus=Other Syllabus" class="tags">Other
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Professional Courses"
                                                    class="tags">Professional Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <a href="allcourses.php?level=6-9"
                                            class="btn btn-primary custom-explore-cource-btn">Explore
                                            Courses</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card" style="width: 18rem;height: 360px;border-radius: 24px;">
                                    <div class="row m-0" style="position: relative;">
                                        <div class="" style="position: absolute; bottom: -350px; right: -80px;">
                                            <img src="./images/banner/men.png" class="" alt="...">
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <div
                                            style="margin-bottom: 12px;width: 80% !important;position: absolute;top: 20px;">
                                            <p class="pClassTitle">
                                                Class 10 - 11</p>
                                            <div style="background-color: rgb(255, 255, 255, 0.6);">
                                                <h3
                                                    style="font-weight: 600;font-size: 18px;line-height: 30px;color: #01202b;margin-bottom: 15px;">
                                                    Ordinary Level</h3>
                                            </div>
                                            <div class="tags-container">
                                                <a href="allcourses.php?syllabus=Local Syllabus" class="tags">Local
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Cambridge Syllabus"
                                                    class="tags">Cambridge Syllabus</a>
                                                <a href="allcourses.php?syllabus=Other Syllabus" class="tags">Other
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Professional Courses"
                                                    class="tags">Professional Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <a href="allcourses.php?level=9-11"
                                            class="btn btn-primary custom-explore-cource-btn">Explore
                                            Courses</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card" style="width: 18rem;height: 360px;border-radius: 24px;">
                                    <div class="row m-0" style="position: relative;">
                                        <div class="" style="position: absolute; bottom: -350px; right: -80px;">
                                            <img src="./images/banner/newpink.png" class="" alt="...">
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <div
                                            style="margin-bottom: 12px;width: 80% !important;position: absolute;top: 20px;">
                                            <p class="pClassTitle">
                                                Class 12 - 13</p>
                                            <div style="background-color: rgb(255, 255, 255, 0.6);">
                                                <h3
                                                    style="font-weight: 600;font-size: 18px;line-height: 30px;color: #01202b;margin-bottom: 15px;">
                                                    Advanced Level</h3>
                                            </div>
                                            <div class="tags-container">
                                                <a href="allcourses.php?syllabus=Local Syllabus" class="tags">Local
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Cambridge Syllabus"
                                                    class="tags">Cambridge Syllabus</a>
                                                <a href="allcourses.php?syllabus=Other Syllabus" class="tags">Other
                                                    Syllabus</a>
                                                <a href="allcourses.php?syllabus=Professional Courses"
                                                    class="tags">Professional Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-2 d-flex justify-content-center" style="z-index: 1;">
                                        <a href="allcourses.php?level=12-13"
                                            class="btn btn-primary custom-explore-cource-btn">Explore
                                            Courses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ONE BILLION
    <div class="container-fluid" class="container-static-slider10" style="margin: 0px;padding: 10px;background-color: #EEEFF3;">
        <div class="static-slider10" style="background-image:url(images/banner.jpg); height:400px; display:flex; align-items: center; justify-content:center; background-size: contain; background-repeat: no-repeat; background-position: right; background-color: #EEEFF3; margin-top: 50px; margin-bottom: 90px;">
            <div class="container mobilecontainer2">
                Row  
                <div class="row justify-content-left">
                    Column 
                    <div class="hidden col-md-8 align-self-left text-left" id="Brands">
                        <span class="badge rounded-pill badge-inverse  font-weight-light " style="color: #333;">Creating
                            Brands</span>
                        <h1 class="my-3 title text-uppercase" style="color: black;">ONE MILLON People Use RaagamaInstitute</h1>
                        <h6 class=" font-weight-normal op-8">RaagamaInstitute, now serving over one million users, revolutionizes education with cutting-edge
                            features for an engaging and accessible learning experience.
                        </h6>
                        <a class="btn btn-outline-light rounded-pill btn-md mt-3" href="ContactUs.php"><span style="color: #333;">Do you Need Help?</span></a>
                    </div>
                   Column 

                </div>
            </div>
        </div>
    </div> -->
    <style>

    </style>

    <!-- ONE BILLION -->
    <div class="container-fluid" style="margin: 0px; padding:50px; background-color: #EEEFF3;">
        <h2 class="section-header font-size-after-768"
            style="display:flex; justify-content:center; font-family: serif; font-weight: 550; font-size: 40px; margin-bottom: 50px !important;">
            Our Students and Parents Love Us</h2>
        <div class="d-flex justify-content-center">
            <div class="row stats-block-row no-gutters" style="width: 100%; justify-content: center;">
                <div class="col-xs-6 col-sm-6 col-md-3 d-flex justify-content-center">
                    <div class="stats-block text-center">
                        <img src="images/user.png" alt="RaagamaInstitute" height="42" loading="lazy">
                        <div class="count">150+ Million</div>
                        <div class="name">Users</div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 d-flex justify-content-center">
                    <div class="stats-block text-center">
                        <img src="images/stars.png" alt="RaagamaInstitute" height="42" loading="lazy">
                        <div class="count">4.7+ Star</div>
                        <div class="name">Course rating</div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 d-flex justify-content-center">
                    <div class="stats-block text-center">
                        <img src="images/location.png" alt="RaagamaInstitute" height="42" loading="lazy">
                        <div class="count">1701+ Cities</div>
                        <div class="name">worldwide</div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 d-flex justify-content-center">
                    <div class="stats-block text-center">
                        <img src="images/timer.png" alt="RaagamaInstitute" height="42" loading="lazy">
                        <div class="count">71 mins avg.</div>
                        <div class="name">time spent daily</div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="container mobilecontainer">
        <!-- Row  -->
        <div class="row justify-content-left ">
            <!-- Column -->
            <div class="hidden col-md-8 align-self-left text-left">
                <span class="badge rounded-pill badge-inverse  font-weight-light " style="color: #333;">Creating
                    Brands</span>
                <h1 class="my-3 title text-uppercase" style="color: black;">ONE BILLON People Use Facebook</h1>
                <h6 class=" font-weight-normal op-8">Pellentesque vehicula eros a dui pretium ornare. Phasellus congue
                    vel quam nec luctus.In accumsan at eros in dignissim. Cras sodales nisi nonn accumsan.</h6>
                <a class="btn btn-outline-light rounded-pill btn-md mt-3" href=""><span style="color: #333;">Do you Need
                        Help?</span></a>
            </div>
            <!-- Column -->

        </div>
    </div>

    <!-- RECENT COURSES -->
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="main-content p-0 m-0">
                <div class="col-12 popular" style="padding-bottom: 50px;background-color: white;">
                    <div class="row popular-topic" style="display: inline;padding: 0px;margin: 0px;">
                        <span style="font-family: serif; font-weight: 550; font-size: 40px;padding: 0px !important;"
                            class="font-size-after-768">
                            Recent Courses
                        </span>
                    </div>

                    <div class="swiper-container recent-swiper">
                        <div class="swiper-wrapper" style="margin-top: 20px">
                            <!-- Add Swiper slides here -->
                            <?php
                            $sql = "SELECT * FROM courses WHERE `status` = 'Approved' ORDER BY RAND()";
                            $result = mysqli_query($connection, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $image_path = $row["imagePath"];
                                    $image_path = str_replace('../course', './course', $image_path);

                                    // Define the default image path
                                    $default_image_path = 'https://img.freepik.com/free-vector/interior-computer-lab-with-copyspace_1308-28026.jpg?t=st=1717826470~exp=1717830070~hmac=87a60e3e6adb6a2b68ceff2c3f96cd7500c2703d783131fa2faed546cbf52126&w=900';

                                    // Check if the image path is empty or the image file does not exist
                                    if (empty($image_path) || !file_exists($image_path)) {
                                        $image_path = $default_image_path;
                                    }
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="card"
                                            style="width: 18rem; display: flex; flex-direction: column; justify-content: start;border-radius: 24px;">
                                            <div>
                                                <img src="<?php echo $image_path ?>" class="card-img-top" alt="..."
                                                    style="width: 300px; height: 140px; object-fit: cover">
                                            </div>
                                            <div class="card-body">
                                                <div class="row" style="height: 60px">
                                                    <h5 class="card-title" title='<?php echo $row['course_title']; ?>'>
                                                        <?php
                                                        if (strlen($row['course_title']) > 50) {
                                                            echo substr($row['course_title'], 0, 50) . '...';
                                                        } else {
                                                            echo $row['course_title'];
                                                        }
                                                        ?>
                                                    </h5>
                                                </div>
                                                <div class="row pb-2" style="display: block;">
                                                    <span class="card-text" style="padding-right: 0px;">Instructor: </span>
                                                    <span class="card-text"
                                                        style="font-weight: 600;padding-left: 0px;"><?php echo $row['instructor_name'] ?><span>
                                                </div>
                                                <div class="row pb-2">
                                                    <p class="card-text">Language: <?php echo $row['language'] ?></p>
                                                </div>
                                                <div class="row pb-2 mt-2 d-flex justify-content-center">
                                                    <button class="btn btn-primary sliderBtn btn-preview"
                                                        data-course-id="<?php echo $row['id']; ?>">Learn More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- TESTIMONIALS -->
    <div class="container-fluid" style="background-color: rgba(44,43,103,255);">
        <div class="container">
            <div class=" card featured-card my-5"
                style="width: 100%;background-color: rgba(44,43,103,255);color: white;border-radius: 0px;box-shadow: none;border: none">
                <div class="col-12 testimonials">
                    <h2 class="text-center mt-3 mb-5">Join thousands of RaagamaInstitute learners
                        achieving their goals</h2>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="./images/man.png" alt="Learner One" class="img-fluid rounded-circle mb-3"
                                style="width: 150px; height: 150px;">
                            <p style="font-size: 16px; font-style: italic; margin-top: 15px;">
                                "RaagamaInstitute has been a
                                game-changer for me. As a working professional, I needed a
                                platform that could fit into my busy
                                schedule.
                                RaagamaInstitute not only offers a wide range of courses but also
                                allows me to learn at my own pace.
                                Highly recommended!"</p>
                            <p style="font-size: 15px; font-weight: bold;">- Dinesh Kumara -
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/man2.png" alt="Learner Two" class="img-fluid rounded-circle mb-3"
                                style="width: 150px; height: 150px;">
                            <p style="font-size: 16px; font-style: italic; margin-top: 15px;">
                                "I've tried a few online learning
                                platforms, but RaagamaInstitute stands out. The courses are
                                well-structured, the instructors are
                                knowledgeable, and the interactive learning tools make the
                                experience enjoyable.
                                I've gained valuable skills that have helped me in my
                                career."</p>
                            <p style="font-size: 15px; font-weight: bold;">- Amila
                                Gunasingha -</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./images/man3.png" alt="Learner Three" class="img-fluid rounded-circle mb-3"
                                style="width: 150px; height: 150px;">
                            <p style="font-size: 16px; font-style: italic; margin-top: 15px;">
                                "RaagamaInstitute has exceeded my
                                expectations. The platform is user-friendly, and the support
                                team is responsive and helpful.
                                I love the variety of courses available, and the
                                certification process adds credibility to my
                                resume. Thank you, RaagamaInstitute."</p>
                            <p style="font-size: 15px; font-weight: bold;">- Sunil Gopal -
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BECOME AN INSTRUCTOR -->
    <div class="static-slider10 my-5"
        style="background-image:url(images/banner2.jpg); height:400px; display:flex; align-items: center; justify-content:center; background-size: contain; background-repeat: no-repeat; background-position: right; background-color: #FFFFFF;">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-left" id="Instructor">
                <!-- Column -->
                <div class="hidden col-md-8 align-self-left text-left" style="background-color: rgb(255,255,255,0.5);">
                    <span style="font-family:  serif; font-weight: 550; font-size: 40px;padding: 0px !important;"
                        class="font-size-after-768">
                        Become
                        An Instructor
                    </span>
                    <h6 class=" font-weight-normal op-8" style="font-size: 18px;">Instructors from around the
                        world teach millions of learners on
                        RaagamaInstitute. We provide the tools and skills to teach what you
                        love.</h6>
                    <a onclick="showSweetAlert()" class="btn btn-primary book-demo-Btn" role="button"
                        style="padding: 10px 50px;border-radius: 12px; width: 50%;font-size: 20px;">Start teaching
                        today</a>
                </div>
                <!-- Column -->
            </div>
        </div>
    </div>

    <section id="footer">
        <?php
        require "footer.php";
        ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var exploreSwiper = new Swiper('.explore-swiper', {
            slidesPerView: 1, // Default to 1 slide per view in mobile view
            spaceBetween: 10, // Space between slides
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                }
            }
        });

        var recentSwiper = new Swiper('.recent-swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.recent-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.recent-swiper-button-next',
                prevEl: '.recent-swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                }
            }
        });

        // Pause autoplay on mouse enter and resume on mouse leave for recent courses
        document.querySelectorAll('.recent-swiper .swiper-slide').forEach(function (slide) {
            slide.addEventListener('mouseenter', function () {
                recentSwiper.autoplay.stop();
            });

            slide.addEventListener('mouseleave', function () {
                recentSwiper.autoplay.start();
            });
        });

        // Pause autoplay on mouse enter and resume on mouse leave for explore courses
        document.querySelectorAll('.explore-swiper .swiper-slide').forEach(function (slide) {
            slide.addEventListener('mouseenter', function () {
                exploreSwiper.autoplay.stop();
            });

            slide.addEventListener('mouseleave', function () {
                exploreSwiper.autoplay.start();
            });
        });
    </script>
</body>

</html>