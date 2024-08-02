<?php
include ('../../Databsase/connection.php');
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
    <title>Create Cource - Instructor</title>
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
    <script>
        function reload() {
            window.location.reload();
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
            <div class="content-wrapper" style="background-color: #F9F6F1;">
                <div class="page-header">
                    <h3 class="page-title" style="color: black;"> Create your own course </h3>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <form action="../../handlers/courseHandler.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="basic-topic" style="background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Basic information
                                        </h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Instructor</label>
                                        <input name="instructor_name" type="text"
                                            value="<?php echo $_SESSION['firstname'] ?>" class="form-control"
                                            style="background-color: white; color:black;" id="exampleFormControlInput1"
                                            readonly>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Course Title</label>
                                        <input name="course_title" type="text" class="form-control"
                                            style="background-color: white;  color:black;"
                                            id="exampleFormControlInput1">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Short Description</label>
                                        <textarea name="s_description" class="form-control"
                                            style="background-color: white;  color:black;"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control"
                                            style="background-color: white; color:black;"></textarea>
                                        <script>
                                            let editorInstance;
                                            ClassicEditor
                                                .create(document.querySelector('#description'))
                                                .then(editor => {
                                                    editorInstance = editor; // Now the editor instance is globally accessible
                                                })
                                                .catch(error => {
                                                    console.error(error);
                                                });

                                            document.querySelector('form').addEventListener('submit', function (event) {
                                                const editorContent = editorInstance.getData(); // Get CKEditor content
                                                document.getElementById('description').value = editorContent; // Ensure the textarea is updated
                                            });
                                        </script>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Category</label>
                                        <select name="category" class="form-control"
                                            style="border: 1px solid black; background-color:white;"
                                            id="exampleFormControlSelect1">
                                            <option value="">--Select category of the course--</option>
                                            <?php
                                            $sql = "SELECT * FROM category ORDER BY id ASC";

                                            $result = mysqli_query($connection, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-success mb-4" data-toggle="modal"
                                        data-target="#myModal">Create Your Course Category</button>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Level</label>
                                        <select name="level" class="form-control"
                                            style="border: 1px solid black; background-color:white;"
                                            id="exampleFormControlSelect1">
                                            <option value="">--Select course level--</option>
                                            <option value="Development">Beginner</option>
                                            <option value="1">Advanced</option>
                                            <option value="12">Intermediate</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Language</label>
                                        <select name="language" class="form-control"
                                            style="border: 1px solid black; background-color:white;"
                                            id="exampleFormControlSelect1">
                                            <option value="">--Select category of the course--</option>
                                            <?php
                                            $sql = "SELECT * FROM languages ORDER BY id ASC";

                                            $result = mysqli_query($connection, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-success mb-4" data-toggle="modal"
                                        data-target="#myModal2">Add Another language</button>

                                    <div class="basic-topic" style="margin-top: 20px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Pricing</h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Course Price (RS)</label>
                                        <input name="price" type="text" class="form-control"
                                            style="background-color: white;  color:black;"
                                            id="exampleFormControlInput1">
                                    </div>

                                    <div class="basic-topic" style="margin-top: 50px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Keywords</h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Create Keywords</label>
                                        <input name="keywords" type="text" class="form-control"
                                            style="background-color: white;  color:black;" id="exampleFormControlInput1"
                                            placeholder="Example - webdevelopment, python, java">
                                    </div>

                                    <div class="basic-topic" style="margin-top: 50px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Media</h1>
                                    </div>

                                    <div class="mt-3">
                                        <label for="image" style="font-size: small;">Upload Thumbnail for
                                            course</label><br>
                                        <input type="file" name="imagePath" id="thumbnail" class="form-control-file"
                                            style="font-size: small;">
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" name="addcourse" class="btn btn-primary"
                                            style="margin-top: 20px;">Create Course</button>
                                    </div>
                                </form>

                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content" style="background-color: white;">
                                            <form action="../../handlers/categoryHandler.php" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-header"
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <h1 style="font-size: 24px;">Create Category</h1>
                                                </div>

                                                <div class="modal-body">
                                                    <input name="categoryName" type="text" class="form-control"
                                                        style="background-color: white;" id="exampleFormControlInput1"
                                                        placeholder="Type Here" require>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="addCategory" class="btn btn-success">Add
                                                        Category</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <div id="myModal2" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content" style="background-color: white;">
                                            <form action="../../handlers/languageHandler.php" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-header"
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <h1 style="font-size: 24px;">Add Language</h1>
                                                </div>

                                                <div class="modal-body">
                                                    <input name="languageName" type="text" class="form-control"
                                                        style="background-color: white;" id="exampleFormControlInput1"
                                                        placeholder="Type Here" require>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="addlanguage" class="btn btn-success"
                                                        onclick="reload()">Add Language</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
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