<?php
include('../../Databsase/connection.php');
if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
    exit(); // Exit to prevent further execution
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Course - Instructor</title>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <script>
        function addTextLesson(id) {
            window.location.href = 'textLesson.php?id=' + id;
        }

        function addVideoLesson(id){
            window.location.href = 'videoLesson.php?id=' + id;
        }

        function addZoomLesson(id) {
            window.location.href = 'zoomLesson.php?id=' + id;
        }

        function validateInput() {
            var name = document.getElementById("sectionName").value.trim();
            if (name === "") {
                alert("Please enter section name");
                return false; // Prevent form submission if validation fails
            }

            return true;
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
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title" style="color: black;">Edit and update course</h3>
                </div>
                <div class="row">
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM courses WHERE id = " . $id . "";

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_array($result);
                    ?>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card" style="background-color: #EEEEEE;">
                                <form action="../../handlers/sectionHandler.php" method="post">
                                    <div style="display: flex; flex-direction: column; padding:12px">
                                        <label for="section">Enter Section Name :</label>
                                        <input type="text" name="sectionName" id="sectionName" placeholder="Type here" required>
                                    </div>

                                    <input type="hidden" name="courseID" id="courseID" value="<?php echo $row["id"] ?>">
                                    <input type="hidden" name="courseName" id="courseName" value="<?php echo $row["course_title"] ?>">
                                    <input type="hidden" name="InstructorName" id="InstructorName" value="<?php echo $row["instructor_name"] ?>">
                                    <input type="hidden" name="InstructorID" id="InstructorID" value="<?php echo $row["instructor_id"] ?>">
                                    <div style="display: flex; justify-content: end; padding:12px">
                                    <button type="submit" name="addSection" class="btn btn-success" onclick="return validateInput()">Add Section</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Additional code for displaying and editing sections and lessons continues here -->

                <?php
                } else {
                    echo "No course found with the provided ID.";
                }
                ?>
            </div>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
