<?php
session_start();
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

        function addVideoLesson(id) {
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
    <style>
        @media screen and (max-width: 470px) {
            .lesson {
                display: block !important;
                align-self: center;
                padding: 0px 80px 10px 80px !important;
            }

            .btn {
                margin-top: 15px;
            }
        }
    </style>

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

                        <?php
                        $sql5 = "SELECT * FROM sections WHERE courseID = " . $row["id"] . " AND courseName = '" . $row["course_title"] . "' AND InstructorName = '" . $row["instructor_name"] . "' AND instructorID = " . $row["instructor_id"] . " ORDER BY id ASC";

                        $result5 = mysqli_query($connection, $sql5);

                        if (mysqli_num_rows($result5) > 0) {
                            while ($row5 = mysqli_fetch_array($result5)) {
                        ?>
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card" style="background-color: #EEEEEE; ">
                                        <div class="topic">
                                            <h1 style="font-size: 24px; padding:15px;"><?php echo $row5['sectionName'] ?></h1>
                                        </div>

                                        <div class="lesson" style=" gap: 8px; margin: 15px; padding: 15px; display: flex; justify-content:center; align-items: center; flex-direction:row; background-color:white; overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                            <div>
                                                <button type="button" class="btn btn-primary" onclick="addTextLesson(<?php echo $row5['id'] ?>)">Text lesson</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-success" onclick="addVideoLesson(<?php echo $row5['id'] ?>)">Video lesson</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-danger" onclick="addZoomLesson(<?php echo $row5['id'] ?>)">Zoom Meeting</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-warning">Assignment</button>
                                            </div>
                                        </div>

                                        <?php
                                        $SQLC = "SELECT * FROM lessons WHERE sectionName = '" . $row5['sectionName'] . "' AND courseName = '" . $row5['courseName'] . "' AND InstructorID = " . $row5['InstructorID'] . "";

                                        $resultC = mysqli_query($connection, $SQLC);

                                        if (mysqli_num_rows($resultC) > 0) {

                                            while ($rowC = mysqli_fetch_assoc($resultC)) {

                                        ?>
                                                <div class="lessonTypes" style="display: flex; justify-content:center; align-items:center; flex-direction: row; padding: 15px;">
                                                    <div style="display: flex; justify-content: center; align-items:center; flex:1; background-color:#DBE0E9; padding:5px">
                                                        <h6><?php echo $rowC['type'] ?></h6>
                                                    </div>

                                                    <div style="display: flex; justify-content: space-between; align-items:center; flex:4; background-color:white; padding:5px">
                                                        <h6><?php echo $rowC['lesson_name'] ?></h6>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="button" class="btn btn-success">Edit</button>
                                                                <button type="button" class="btn btn-danger">Delete</button>
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
                        <?php
                            }
                        }
                        ?>

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="basic-topic" style="background-color: #F5F5F5;">
                                            <h1 style="font-size: small; padding: 15px; color:#6777EF;">Basic information</h1>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Instructor</label>
                                            <input type="texta" value="<?php echo $row["instructor_name"] ?>" class="form-control" style="background-color: white; color:#002B45;" id="exampleFormControlInput1">
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Course Title</label>
                                            <input type="text" value="<?php echo $row["course_title"] ?>" class="form-control" style="background-color: white; color:#002B45;" id="exampleFormControlInput1">
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Short Description</label>
                                            <textarea class="form-control" style="background-color: white; color:#002B45;" id="exampleFormControlTextarea1" rows="3"><?php echo $row["s_description"] ?></textarea>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Description</label>
                                            <div id="editor"></div>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#editor'))
                                                    .then(editor => {
                                                        editor.setData(<?php echo json_encode($row['description']); ?>);
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>
                                        </div>

                                        <input type="hidden" name="description" id="description">

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Select Category</label>
                                            <select name="category" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                                <option value="">--Select category of the course--</option>
                                                <?php
                                                $sql = "SELECT * FROM category ORDER BY id ASC";

                                                $result = mysqli_query($connection, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row1 = mysqli_fetch_array($result)) {
                                                ?>
                                                        <option value="<?php echo $row1["name"] ?>"><?php echo $row1["name"] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#myModal">Create Your Course Category</button>

                                        <div class="form-group">
                                            <?php
                                            $selectedLevel = $row['level'];
                                            ?>
                                            <label for="exampleFormControlSelect1">Grade</label>
                                            <select class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1" name="level">
                                                <option value="">--Select grade for the class--</option>
                                                <option value="grade1">Grade 1</option>
                                                <option value="grade2">Grade 2</option>
                                                <option value="grade3">Grade 3</option>
                                                <option value="grade4">Grade 4</option>
                                                <option value="grade5">Grade 5</option>
                                                <option value="grade6">Grade 6</option>
                                                <option value="grade7">Grade 7</option>
                                                <option value="grade8">Grade 8</option>
                                                <option value="grade9">Grade 9</option>
                                                <option value="grade10">Grade 10</option>
                                                <option value="grade11">Grade 11</option>
                                                <option value="grade12">Grade 12</option>
                                                <option value="grade13">Grade 13</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="exampleFormControlSelect1">Language</label>
                                            <select class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                                <option value="">--Select language--</option>
                                                <option value="Development">English</option>
                                                <option value="1">Sinhala</option>
                                                <option value="12">Tamil</option>
                                            </select>
                                        </div> -->

                                        <div class="form-group">
                                            <?php
                                            $selectedLanguage = $row['language'];
                                            ?>
                                            <label for="exampleFormControlSelect1">Language</label>
                                            <select class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1" name="language">
                                                <option value="">--Select language for the class--</option>
                                                <?php
                                                $sqlK = "SELECT * FROM languages ORDER BY id ASC";

                                                $resultK = mysqli_query($connection, $sqlK);

                                                if (mysqli_num_rows($resultK) > 0) {
                                                    while ($rowK = mysqli_fetch_array($resultK)) {
                                                ?>
                                                        <option value="<?php echo $rowK["name"] ?>"><?php echo $rowK["name"] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="exampleFormControlInput1">Create Keywords</label>
                                            <input name="keywords" value="<?php echo $row["keywords"] ?>" type="text" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" placeholder="Example - webdevelopment, python, java">
                                        </div>

                                        <div class="basic-topic" style="margin-top: 20px; background-color: #F5F5F5;">
                                            <h1 style="font-size: small; padding: 15px; color:#6777EF;">Media</h1>
                                        </div>

                                        <div class="mt-3">
                                            <label for="image" style="font-size: small;">Upload Thumbnail for course</label><br>
                                            <input style="font-size: small;" type="file" name="Thumbnail" id="resumeFile" class="form-control-file">
                                        </div>

                                        <div class="mt-4">
                                            <button type="button" class="btn btn-primary" style="margin-top: 20px;">Done</button>
                                        </div>
                                    </form>

                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
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
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>


    <!-- page-body-wrapper ends -->
    </div>
    <footer class="footer">
        <?php
        require "teacherfooter.php";
        ?>
    </footer>
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