<?php
session_start();
require '../../Databsase/connection.php';
$teacherId = $_SESSION["id"];

if (!isset($_SESSION["id"])) {
    header("location:../../Student_Signin.php");
}

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Create Course - Student</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="images/v3_66.png" />
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
        .footer{
        background-color: black;
        }
        .container-scroller{
            min-height:68.5ch !important;
        }

        .modal-content {
            background-color: #e7f4f9;
         }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; 
        }


        @media (max-width: 768px) {
            .card {
                padding: 0 !important;
            }
            .table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table-wrapper {
                margin-left:-10px  !important;
                margin-right:-10px  !important;
                padding: 0px !important;
            }

            .table th,
            .table td {
                white-space: nowrap; 
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
        <div class="main-panel" style="background-color: white;">
            <div class="row">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; padding: 15px; ">
                    <h1 style="font-size: 32px; color: #002B45; font-family: Georgia, 'Times New Roman', Times, serif;">My Class Assignment</h1>
                </div>
            </div>
            <div class="content-wrapper" style="background-color: white;">

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10">
                                                    <h4 class="card-title mb-1">Your Assignments</h4>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Assignment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="./upload_assignment.php" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="courseSelect">Select Course</label>
                                                                    <select class="form-control" id="courseSelect" name="course_id">
                                                                        <?php
                                                                        // Query to fetch courses
                                                                        $query = "SELECT id, course_title FROM courses WHERE instructor_id = ?";
                                                                        if ($stmt = mysqli_prepare($connection, $query)) {
                                                                            mysqli_stmt_bind_param($stmt, "i", $teacherId);
                                                                            mysqli_stmt_execute($stmt);
                                                                            $result = mysqli_stmt_get_result($stmt);

                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                echo "<option value='{$row['id']}'>{$row['course_title']}</option>";
                                                                            }
                                                                            mysqli_stmt_close($stmt);
                                                                        } else {
                                                                            echo "Prepare failed: " . mysqli_error($connection);
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="assignmentName">Assignment Name</label>
                                                                    <input type="text" class="form-control" id="assignmentName" name="assignment_name" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="assignmentTitle">Assignment Name</label>
                                                                    <input type="text" class="form-control" id="assignmentTitle" name="assignment_title" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fileUpload">Upload PDF</label>
                                                                    <input type="file" class="form-control-file" id="fileUpload" name="assignment_file" accept=".pdf">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div class="table-wrapper">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Assignment</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Passed</th>
                                                    <th scope="col">Pending</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>JavaScript Assignment</td>
                                                    <td class="text-muted">JavaScript</td>
                                                    <td>Total: 10</td>
                                                    <td>Passed: 2</td>
                                                    <td>Non-Passed: 2</td>
                                                    <td><button class="btn btn-secondary text-bolder">More</button></td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                                </tbody>
                                            </table>
                                         
                                        </div>
                                    </div>
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