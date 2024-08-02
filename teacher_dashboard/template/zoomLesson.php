<?php
session_start();
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
    <title>Create Lesson - Instructor</title>
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
    <link rel="stylesheet" href="assets/css/style.css" />


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
                    <h3 class="page-title" style="color: black;"> Create Zoom Meeting </h3>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <form action="../../handlers/zoomLessonAdder.php" method="post" enctype="multipart/form-data">

                                    <?php
                                    $sId = $_GET['id'];
                                    $sqlQ = "SELECT * FROM sections WHERE id = " . $sId . "";

                                    $resultQ = mysqli_query($connection, $sqlQ);

                                    if (mysqli_num_rows($resultQ)) {

                                        $rowQ = mysqli_fetch_assoc($resultQ);
                                    ?>
                                        <input type="hidden" name="sectionName" id="sectionID" value="<?php echo $sId ?>">
                                        <input type="hidden" name="sectionName" id="sectionName" value="<?php echo $rowQ["sectionName"] ?>">
                                        <input type="hidden" name="courseID" id="courseID" value="<?php echo $rowQ["courseID"] ?>">
                                        <input type="hidden" name="courseName" id="courseName" value="<?php echo $rowQ["courseName"] ?>">
                                        <input type="hidden" name="InstructorName" id="InstructorName" value="<?php echo $rowQ["InstructorName"] ?>">
                                        <input type="hidden" name="InstructorID" id="InstructorID" value="<?php echo $rowQ["InstructorID"] ?>">

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson Name</label>
                                            <input name="lesson_name" type="text" class="form-control" style="background-color: white; color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Zoom Meeting Link</label>
                                            <input name="lesson_link" type="text" class="form-control" style="background-color: white; color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Zoom Meeting ID</label>
                                            <input name="zoom_id" type="text" class="form-control" style="background-color: white; color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Meeting Password</label>
                                            <input name="meetingPassword" type="text" class="form-control" style="background-color: white; color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson duration</label>
                                            <input name="lesson_duration" type="text" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Allow participants to join anytime</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Participants video</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Require authentication to join: Sign in to Zoom</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Lesson preview (Everyone can see this lesson)</label>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Unlock the lesson after a certain time after the purchase</label>
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="exampleFormControlSelect1">Select Time Zone</label>
                                            <select name="timeLine" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1" Required>
                                                <option value="">--Select Time Zone--</option>
                                                <option value="Alfa Time Zone Military UTC +1"> Alfa Time Zone Military UTC +1</option>
                                                <option value="Australia UTC +10:30">Australia UTC +10:30</option>
                                                <option value="Australia UTC +9:30">Australia UTC +9:30</option>
                                                <option value="South America UTC -5">South America UTC -5</option>
                                                <option value="Australia UTC +9:30 / +10:30">Australia UTC +9:30 / +10:30</option>
                                                <option value="Australia UTC +9:30 / +10:30">Australia UTC +9:30 / +10:30</option>
                                            </select>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson Start Date</label>
                                            <input name="start_date" type="date" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson Start Time</label>
                                            <input name="start_time" type="time" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson End Date</label>
                                            <input name="end_date" type="date" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson End Time</label>
                                            <input name="end_time" type="time" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" Required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Short Description of the lesson</label>
                                            <textarea name="s_description" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>

                                        <!-- <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Lesson content</label>
                                            <div id="editor"></div>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#editor'))
                                                    .then(editor => {
                                                        console.log(editor);
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>

                                            <script>
                                                document.querySelector('form').addEventListener('submit', function(event) {
                                                    const editorContent = editor.getData(); // Get CKEditor content
                                                    document.getElementById('descriptionInput').value = editorContent; // Set it as the value of the hidden input
                                                });
                                            </script>

                                        </div>

                                        <input type="hidden" name="description" id="descriptionInput"> -->

                                        <!-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Category</label>
                                        <select name="category" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="">--Select category of the course--</option>
                                            <?php
                                            $sql = "SELECT * FROM category ORDER BY id ASC";

                                            $result = mysqli_query($connection, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                    <option value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div> -->

                                        <!-- <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#myModal">Create Your Course Category</button>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Level</label>
                                        <select name="level" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="">--Select course level--</option>
                                            <option value="Development">Beginner</option>
                                            <option value="1">Advanced</option>
                                            <option value="12">Intermediate</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Language</label>
                                        <select name="language" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="">--Select language--</option>
                                            <option value="Development">English</option>
                                            <option value="1">Sinhala</option>
                                            <option value="12">Tamil</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select name="status" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="1">Active</option>
                                            <option value="12">Pending</option>
                                        </select>
                                    </div>

                                    <div class="basic-topic" style="margin-top: 50px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Pricing</h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Course Price (RS)</label>
                                        <input name="price" type="text" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1">
                                    </div>

                                    <div class="basic-topic" style="margin-top: 50px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Keywords</h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Create Keywords</label>
                                        <input name="keywords" type="text" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" placeholder="Example - webdevelopment, python, java">
                                    </div>

                                    <div class="basic-topic" style="margin-top: 50px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Media</h1>
                                    </div>

                                    <div class="mt-3">
                                        <label for="image" style="font-size: small;">Upload Thumbnail for course</label><br>
                                        <input type="file" name="imagePath" id="thumbnail" class="form-control-file" style="font-size: small;">
                                    </div> -->

                                        <div class="mt-4">
                                            <button type="submit" name="addlesson" class="btn btn-primary" style="margin-top: 20px;">Create Zoom Meeting</button>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </form>

                                <!-- <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content" style="background-color: white;">
                                            <form action="../../handlers/categoryHandler.php" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <input name="categoryName" type="text" class="form-control" style="background-color: white;" id="exampleFormControlInput1" placeholder="Create category">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="addCategory" class="btn btn-success">Add Category</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>

            <!-- page-body-wrapper ends -->
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