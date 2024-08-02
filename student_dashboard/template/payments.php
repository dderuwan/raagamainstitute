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
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>profile - Student</title>
    <!-- plugins:css -->
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
    <!-- End layout styles -->
    <link rel="icon" href="../images/v3_66.png" />

    <style>
        .footer {
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- Left Side Navbar -->
        <nav style="background-color: #002B45;">
            <?php
            require "sidenav.php";
            ?>
        </nav>
        <!-- Inside The Dashboard -->
        <div class="main-panel">
            <div class="content-wrapper" style="background-color: #F9F6F1;">
                <!-- Pink Background -->
                <!-- Transactions and Project -->
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card custom-cardstd">
                            <div class="card-body">
                                <h4 class="card-title">Course Details</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>
                          <div class="form-check form-check-muted m-0">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" />
                            </label>
                          </div>
                        </th> -->
                                                <th>Cource Name</th>
                                                <th>Instructor</th>
                                                <th>Instructor Email</th>
                                                <th>Cource fee</th>
                                                <th>Payment Mode</th>
                                                <th>Date</th>
                                                <th>Payment Status</th>
                                                <th>Receipt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $NewSQL = "SELECT * FROM `payedstudent` WHERE studentID = $studentID";
                                            $NewResult = mysqli_query($connection, $NewSQL);
                                            if (mysqli_num_rows($NewResult) > 0) {
                                                while ($NewRow = mysqli_fetch_array($NewResult)) {

                                                    $CourseOpID = $NewRow['course_optionsID'];

                                                    $NewCourseOpSQL = "SELECT * FROM `course_options` WHERE id = $CourseOpID";
                                                    $NewCourseOpResult = mysqli_query($connection, $NewCourseOpSQL);
                                                    $NewCourseOpRow = mysqli_fetch_array($NewCourseOpResult);

                                                    $courseID = $NewCourseOpRow['cou_id'];

                                                    $NewCourseSQL = "SELECT * FROM `courses` WHERE id = $courseID";
                                                    $NewCourseResult = mysqli_query($connection, $NewCourseSQL);
                                                    $NewCourseRow = mysqli_fetch_array($NewCourseResult);
                                            ?>
                                                    <tr>
                                                        <!-- <td>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                                </label>
                                                            </div>
                                                            </td> -->
                                                        <td>
                                                            <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                                                            <span class="pl-2"><?php echo $NewCourseRow['course_title']  ?></span>
                                                        </td>
                                                        <td><?php echo $NewCourseRow['instructor_name']  ?></td>
                                                        <td><button style="padding: 10px; border-radius: 15px;" class="teacherBtn" data-toggle="modal" data-target="#myModal"><?php echo $NewCourseRow['instructor_email']  ?></button></td>
                                                        <td><?php echo $NewCourseOpRow['price'] ?></td>
                                                        <td>Credit card</td>
                                                        <td>06 Jun 2024</td>

                                                        <td>
                                                            <div class="badge badge-outline-success">Done</div>
                                                        </td>
                                                        <td><button class="btn"><a style="text-decoration: none; background-color:#00D25B; color: black; padding:8px; border-radius: 7px;" href="../../Bills/bill-1.pdf">Download</a></button></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                </div>
            </div>

        </div>

    </div>
    <footer class="footer">
        <?php include './studentfooter.php'; ?>
    </footer>

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