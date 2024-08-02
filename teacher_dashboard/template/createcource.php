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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .hidden {
            display: none;
        }
    </style>
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

                                <form action="../../handlers/courseHandler.php" method="post" enctype="multipart/form-data">
                                    <div class="basic-topic" style="background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Basic information
                                        </h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Instructor</label>
                                        <input type="hidden" id="inid" value="<?php echo $_SESSION['id'] ?>" />
                                        <input name="instructor_name" type="text" value="<?php echo $_SESSION['firstname'] ?>" class="form-control" style="background-color: white; color:black;" id="exampleFormControlInput1" readonly>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Course Title</label>
                                        <input name="course_title" type="text" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Short Description</label>
                                        <textarea name="s_description" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" style="background-color: white; color:black;"></textarea>
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

                                            document.querySelector('form').addEventListener('submit', function(event) {
                                                const editorContent = editorInstance.getData(); // Get CKEditor content
                                                document.getElementById('description').value = editorContent; // Ensure the textarea is updated
                                            });
                                        </script>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Subject</label>
                                        <select name="category" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="">--Select subject for the classes--</option>
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

                                    <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#myModal">Add Your Subject</button>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Grade</label>
                                        <select name="level" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
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

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Syllabus</label>
                                        <select name="syllabus" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="">--Select Syllabus--</option>
                                            <option value="Local Syllabus">Local Syllabus</option>
                                            <option value="Cambridge Syllabus">Cambridge Syllabus</option>
                                            <option value="Other Syllabus">Other Syllabus</option>
                                            <option value="Professional Courses">Professional Courses</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Language</label>
                                        <select name="language" class="form-control" style="border: 1px solid black; background-color:white;" id="exampleFormControlSelect1">
                                            <option value="">--Select language for the class--</option>
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

                                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#myModal2">Add Another Language</button>

                                    <div class="basic-topic" style="margin-top: 5px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Keywords</h1>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Create Keywords</label>
                                        <input name="keywords" type="text" class="form-control" style="background-color: white;  color:black;" id="exampleFormControlInput1" placeholder="Example - webdevelopment, python, java">
                                    </div>

                                    <div class="basic-topic" style="margin-top: 5px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Media</h1>
                                    </div>

                                    <div class="mt-2">
                                        <label for="image" style="font-size: small;">Upload Thumbnail for
                                            course</label><br>
                                        <input type="file" name="imagePath" id="thumbnail" class="form-control-file" style="font-size: small;">
                                    </div>
                                    <div class="basic-topic d-flex flex-row justify-content-between" style="margin-top: 15px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Promoted Listing
                                        </h1>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2 border p-2 rounded hidden" id="promotedListingTable">
                                        <div class="row">
                                            <div class="col">
                                                <p>Promoted Listing Standard</p>
                                                <h5>Reach More Buyers</h5>
                                                <p>Only pay when your item sells through a click on your ad</p>
                                            </div>
                                            <div class="col border-left">
                                                <div class="d-flex flex-row mb-2">
                                                    <a href="#" class="link-info"><i class="mdi mdi-chart-line"></i></a>
                                                    <h5 class="ml-3">25% More Clicks</h5>
                                                </div>
                                                <p>When using Promoted Listing Standard, on average (data from Sept
                                                    2022-Feb 2023).</p>
                                            </div>
                                            <div class="col border-left">
                                                <div class="d-flex flex-row justify-content-between">
                                                    <p>Listing ad rate <i class="mdi mdi-alert-circle"></i></p>
                                                    <!-- <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2"></label>
                                                    </div> -->
                                                </div>
                                                <h5>
                                                    <span id="editableText" onclick="showEditInput()">50%</span>
                                                    <input type="text" id="editInput" class="hidden" onblur="saveEditInput()" value="50%">
                                                    <a href="#" class="link-info"><i class="mdi mdi-pencil"></i></a>
                                                </h5>
                                                <p>Suggested: 11.2%</p>
                                                <p><a href="#" class="link-info">Edit campaign: Campaign
                                                        11/27/2023...</a></p>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- course option create -->
                                    <div class="basic-topic" style="margin-top: 5px; background-color: #F5F5F5;">
                                        <h1 style="font-size: small; padding: 15px; color:#6777EF;">Course Package</h1>
                                    </div>
                                    <table class="table" id="QuesTable">
                                        <tbody class="tablebody">
                                        </tbody>
                                    </table>
                                    <input type="hidden" id="combinedarray" name="combinedarray" value="" />
                                    <!-- end course option create -->
                                    <div class="mt-4">
                                        <button type="submit" name="addcourse" id="addbtn" class="btn btn-primary" style="margin-top: 20px;">Create Course</button>
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

                                                <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                                                    <h1 style="font-size: 24px;">Create Category</h1>
                                                </div>

                                                <div class="modal-body">
                                                    <input name="categoryName" type="text" class="form-control" style="background-color: white;" id="exampleFormControlInput1" placeholder="Type Here" require>
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
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                                                    <h1 style="font-size: 24px;">Add Language</h1>
                                                </div>

                                                <div class="modal-body">
                                                    <input name="languageName" type="text" class="form-control" style="background-color: white;" id="exampleFormControlInput1" placeholder="Type Here" require>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="addlanguage" class="btn btn-success" onclick="reload()">Add Language</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <script>
        document.getElementById('customSwitch1').addEventListener('change', function() {
            var table = document.getElementById('promotedListingTable');
            if (this.checked) {
                table.classList.remove('hidden');
            } else {
                table.classList.add('hidden');
            }

        });

        function showEditInput(id) {
            var editableText = document.getElementById('editableText');
            var editInput = document.getElementById('editInput');
            editableText.classList.add('hidden');
            editInput.classList.remove('hidden');
            editInput.focus = id;
        }

        function saveEditInput() {
            var editableText = document.getElementById('editableText');
            var editInput = document.getElementById('editInput');
            editableText.textContent = editInput.value;
            editableText.classList.remove('hidden');
            editInput.classList.add('hidden');
        }

        document.getElementById('editInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                saveEditInput();
            }
        });
    </script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() { //change question type
            var inid = $('#inid').val();
            $.ajax({
                type: "get",
                url: "../../handlers/getpackagetype.php",
                dataType: "JSON",
                success: function(data) {
                    var packType = '';
                    $.each(data, function(index, item) {

                        packType += '<tr class="tablerow">' +
                            '<td>' +
                            '<input type="hidden" value="' + inid + '" id="inid" >' +
                            '<input type="hidden" id="count" name="count[]" value="' + item.id + '">' +
                            '<lable for="' + item.name + '" style="font-weight: bold;font-size:18px;margin-left:15px; display: flex; align-items: center;" >' +
                            '<input class="package_typeid" type="checkbox" name="package_type" id="package_type" value="' + item.id + '" style="height: 20px;width:15px;margin-right: 10px;" />' +
                            item.name +
                            '</lable>' +
                            '<div id="options">' +
                            '</div>' +
                            '</td>' +
                            '</tr>';
                    });
                    $('.tablebody').append(packType);
                }
            });
            var count = 0;
            var countArray = [];
            $("body").on("click", ".package_typeid", function() {

                var row = $(this).closest('tr');
                var rowcount = row.find("#options");
                var oprowcount = row.find("#count").val();

                countArray.push(oprowcount);
                var packcount = row.find("#count").val();

                count++;
                $.ajax({
                    type: "get",
                    url: "../../handlers/getoptions.php",
                    dataType: "JSON",
                    success: function(data) {
                        var options = '<div class="row" style="margin-left:25px">' +
                            '<div class="col-2" style="margin-top:10px">' +
                            '<label style="font-size:18px;color:#000">price</label>' +
                            '</div>' +
                            '<div class="col-3">' +
                            '<input type="text" name="packageprice[]" id="packageprice" class="form-control-file" style="padding:5px 5px 5px 5px; border: 2px solid #e0e0d1;border-radius: 8px;">' +
                            '</div>' +
                            '</div>' +
                            '<div class="row" style="margin-left:13px">';
                        $.each(data, function(index, item) {

                            options += '<div class="col-3">' +
                                '<label style="font-size:15px;margin-left:15px;display: flex; align-items: center;">' +
                                '<input type="checkbox" class="isitemAvail" id="option" name="option' + packcount + '[]" value="' + item.id + '" style="height: 20px;width:15px;margin-right: 10px"  />' +
                                item.name +
                                '</label>' +
                                '</div>';
                        });
                        options += '</div>';

                        rowcount.empty();
                        rowcount.append(options);


                    }

                });
            });
            $("#addbtn").on("click", function() {
                // var combinedArray =[];
                var inidArray = [];
                var priceArray = [];
                var typeArray = [];
                var countArray = [];
                var optionArray = [];
                var combinedArray = [];

                $(".tablerow").each(function(index) {
                    var row = $(this);
                    var cid = row.find("#count").val();
                    var inid = row.find("#inid").val();
                    var price = parseFloat(row.find("#packageprice").val());
                    var typid = row.find('input[name^="package_type"]:checked').val();
                    // console.log(price);

                    // var typid = row.find('input[name^="package_type"]:checked').map(function() {
                    //     return $(this).val();
                    // }).get();              
                    if (price && typid) {
                        var check = row.find('input[name^="option' + cid + '"]:checked').map(function() {
                            return $(this).val();
                        }).get();

                        inidArray.push(inid);
                        priceArray.push(price);
                        typeArray.push(typid);
                        countArray.push(cid);
                        optionArray.push(check);
                    }

                })
                var combinedArray = priceArray.map((price, index) => ({

                    inid: inidArray[index],
                    price: price,
                    typid: typeArray[index],
                    check: optionArray[index],

                }));
                $("#combinedarray").val(JSON.stringify(combinedArray));
                // console.log(combinedArray);

            });
        });
    </script>
</body>

</html>