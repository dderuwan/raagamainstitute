<?php
include('../../Databsase/connection.php');
if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>profile - Instructor</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="images/v3_66.png" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <script>
        function EditCourse(id) {
            window.location.href = 'editcourse.php?id=' + id;
        }

        function holdCourse(id){
            window.location.href = '../../handlers/holdcourse.php?id=' + id;
        }

        function deleteCourse(id) {
            window.location.href = '../../handlers/deleteCourse.php?id=' + id;
        }

        function activateCourse(id) {
            window.location.href = '../../handlers/activateCourse.php?id=' + id;
        }

        function deactivateCourse(id) {
            window.location.href = '../../handlers/deactivateCourse.php?id=' + id;
        }
    </script>
</head>

<body>
    <div class="container-scroller">
        <!-- Left Side Navbar -->
        <nav>
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


                    <div class="col-md-12 grid-margin stretch-card card">
                        <div class="row">
                            <!-- my cources -->
                            <div class="col-12">
                                <div class="card-body" style="background-color: #97ff9f; margin: 12px; border-radius: 15px;">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Active Courses</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">


                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Cource Name</th>
                                                    <th scope="col" class="text-center">Price</th>
                                                    <th scope="col" class="text-center">No of Students</th>
                                                    <th scope="col" class="text-center">Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $email = $_SESSION['email'];
                                                $id = $_SESSION['id'];
                                                $sql = "SELECT * FROM courses WHERE status = 'Approved' AND instructor_email = '" . $email . "' AND instructor_id = '" . $id . "'";

                                                $result = mysqli_query($connection, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr>
                                                            <td class="text-left"><?php echo $row['course_title'] ?></td>
                                                            <td class="text-center">Rs <?php echo $row['price'] ?></td>
                                                            <td class="text-center">0</td>
                                                            <td class="text-center">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary" onclick="EditCourse(<?php echo $row['id'] ?>)">Edit</button>
                                                                    <button type="button" class="btn btn-danger" onclick="deactivateCourse(<?php echo $row['id'] ?>)">Deactive</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                                <div class="card-body" style="background-color: #ffeb6d; margin: 12px; border-radius: 15px;">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Pending Courses</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Cource Name</th>
                                                    <th scope="col" class="text-center">Price</th>
                                                    <th scope="col" class="text-center">No of Students</th>
                                                    <th scope="col" class="text-center">Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $email = $_SESSION['email'];
                                                $id = $_SESSION['id'];
                                                $sql = "SELECT * FROM courses WHERE status = 'Pending' AND instructor_email = '" . $email . "' AND instructor_id = '" . $id . "'";

                                                $result = mysqli_query($connection, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr>
                                                            <td class="text-left"><?php echo $row['course_title'] ?></td>
                                                            <td class="text-center">Rs <?php echo $row['price'] ?></td>
                                                            <td class="text-center">0</td>
                                                            <td class="text-center">
                                                                <div>
                                                                    <button class="btn btn-primary" onclick="EditCourse(<?php echo $row['id'] ?>)">Edit</button>
                                                                    <button class="btn btn-danger" onclick="deleteCourse(<?php echo $row['id'] ?>)">Delete</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                                <div class="card-body" style="background-color: #ffb4b4; margin: 12px; border-radius: 15px;">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Deactive Courses</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Cource Name</th>
                                                    <th scope="col" class="text-center">Price</th>
                                                    <th scope="col" class="text-center">No of Students</th>
                                                    <th scope="col" class="text-center">Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $email = $_SESSION['email'];
                                                $id = $_SESSION['id'];
                                                $sql = "SELECT * FROM courses WHERE status = 'Deactivate' AND instructor_email = '" . $email . "' AND instructor_id = '" . $id . "'";

                                                $result = mysqli_query($connection, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr>
                                                            <td class="text-left"><?php echo $row['course_title'] ?></td>
                                                            <td class="text-center">Rs <?php echo $row['price'] ?></td>
                                                            <td class="text-center">0</td>
                                                            <td class="text-center">
                                                                <div>
                                                                    <button class="btn btn-success" onclick="activateCourse(<?php echo $row['id'] ?>)">Activate</button>
                                                                    <button class="btn btn-danger" onclick="deleteCourse(<?php echo $row['id'] ?>)">Delete</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                                <div class="card-body" style="background-color: #88cfff; margin: 12px; border-radius: 15px;">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Hold Courses</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Cource Name</th>
                                                    <th scope="col" class="text-center">Price</th>
                                                    <th scope="col" class="text-center">No of Students</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $email = $_SESSION['email'];
                                                $id = $_SESSION['id'];
                                                $sql = "SELECT * FROM courses WHERE status = 'Hold' AND instructor_email = '" . $email . "' AND instructor_id = '" . $id . "'";

                                                $result = mysqli_query($connection, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr>
                                                            <td class="text-left"><?php echo $row['course_title'] ?></td>
                                                            <td class="text-center">Rs <?php echo $row['price'] ?></td>
                                                            <td class="text-center">0</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-warning">Contact Admin</button>
                                                            </td>
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

                </div>



            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <?php
                require "teacherfooter.php";
                ?>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
