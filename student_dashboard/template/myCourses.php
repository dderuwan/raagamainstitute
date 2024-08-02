<?php
session_start();
include('../../Databsase/connection.php');

if (!isset($_SESSION["id"])) {
    header("location:../../Student_Signin.php");
}

$studentID = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>My Courses</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="../images/v3_66.png" />

    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" href="../images/v3_66.png" />

    <script>
        function checkCourse(id) {
            window.location.href = '../../insideCourse.php?id=' + id;
        }
    </script>

    <style>
        .footer {
            background-color: black;
        }

        body {
            background-color: #FFFFFF;
        }

        .custom-card {
            background-color: #ffffff;
            border: none;
            border-radius: 0px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .custom-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.01);
            transition: 300ms;
        }

        .custom-cardstd:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.01);
            transition: 300ms;
        }

        .custom-card .card-body {
            padding: 20px;
        }

        .custom-card h3 {
            font-size: 24px;
            color: #002B45;
            margin-bottom: 5px;
        }

        .custom-card p {
            font-size: 14px;
            color: #6c757d;
        }

        .custom-card h6 {
            font-size: 14px;
            color: #6c757d;
            margin-top: 10px;
        }

        .icon-box-success {
            background-color: #55c16d;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-item {
            color: #ffffff;
            font-size: 20px;
        }


        .custom-cardstd {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }


        .custom-cardstd .card-body {
            padding: 20px;
        }

        .custom-cardstd h3 {
            font-size: 24px;
            color: #002B45;
            margin-bottom: 5px;
        }

        .custom-cardstd p {
            font-size: 14px;
            color: #6c757d;
        }

        .custom-cardstd h6 {
            font-size: 14px;
            color: #6c757d;
            margin-top: 10px;
        }

        .icon-box-success {
            background-color: #55c16d;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-item {
            color: #ffffff;
            font-size: 20px;
        }

        .teacherBtn:hover {
            transform: scale(1.09);
            transition: 300ms;
        }

        @media screen and (max-width:1200px) {
            .content-wrapper {
                padding-left: 0px;
            }

            .row.d-flex {
                gap: 75px;
                width: 94%;
            }
        }

        @media screen and (max-width: 800px) {

            .content-wrapper {
                padding-left: 20px;
            }

            .row.d-flex {
                margin-left: calc(23% - 40px);
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav style="background-color: #002B45;">
            <?php
            require "sidenav.php";
            ?>
        </nav>
        <div class="main-panel">
            <div class="row">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; padding: 15px;">
                    <h1 style="font-size: 32px; color: #002B45; font-family: Georgia, 'Times New Roman', Times, serif;">My Courses</h1>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card  custom-card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Course Details</h4>
                            <p class="text-muted mb-1">Course data status</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    <?php
                                    $SQL = "SELECT * FROM `payedstudent` WHERE `studentID` = $studentID";
                                    $result = mysqli_query($connection, $SQL);
                                    while ($row = mysqli_fetch_array($result)) {

                                        $courseOptionID = $row['course_optionsID'];

                                        $courseOptionSQL = "SELECT * FROM `course_options` WHERE `id` = $courseOptionID";
                                        $courseOptionResult = mysqli_query($connection, $courseOptionSQL);

                                        $courseOptionRow = mysqli_fetch_array($courseOptionResult);
                                        $courseID = $courseOptionRow['cou_id'];

                                        $coursSQL = "SELECT * FROM `courses` WHERE id = $courseID";
                                        $courseResult = mysqli_query($connection, $coursSQL);
                                        $courseRow = mysqli_fetch_array($courseResult);

                                        $image_path = $courseRow["imagePath"];
                                        $image_path = str_replace('../course', '../../course', $image_path);
                                    ?>
                                        <div class="preview-item border-bottom" style="cursor: pointer;" onclick="checkCourse(<?php echo $courseRow['id'] ?>)">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-primary">
                                                    <img src="<?php echo $image_path ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">
                                                        <?php echo $courseRow['course_title'] ?>
                                                    </h6>
                                                    <p class="text-muted mb-0">
                                                        <?php echo $courseRow['category'] . " | " . $courseRow['language'] ?>
                                                    </p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">Published | 02 Jul 2024</p>
                                                    <p class="text-muted mb-0">
                                                        5 Sessions
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <?php
        require "studentfooter.php";
        ?>
    </footer>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>

    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>