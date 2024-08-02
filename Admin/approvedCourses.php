<?php
session_start();
include ('../Databsase/connection.php');
if (!isset($_SESSION['idAdmin'])) {
    header('location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_course_id'])) {
    $course_id_to_delete = $_POST['delete_course_id'];

    // Delete from course_options table
    $sql_delete_options = "DELETE FROM `course_options` WHERE cou_id = $course_id_to_delete";
    mysqli_query($connection, $sql_delete_options);

    // Delete from courses table
    $sql_delete_course = "DELETE FROM `courses` WHERE id = $course_id_to_delete";
    mysqli_query($connection, $sql_delete_course);

    $_SESSION['success_message'] = "Course deleted successfully.";

    // Redirect to the same page to see the changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cards</title>

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    

    <style>
        select {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            outline: 3px solid #f2f2f2;
        }

        select:focus {
            outline: none;
        }

        .btn-scaled {
            transform: scale(0.8);
            /* Scale down to 80% of the original size */
        }

        .trash-icon {
            transition: transform 0.2s, color 0.2s;
        }

        .trash-icon:hover {
            transform: scale(1.2);
            color: red; /* Change to your desired hover color */
        }

        .icon-preview {
            color: #000; /* Initial color */
            transition: color 0.3s ease;
        }

        .icon-preview:hover {
            color: #2DB089; /* Color on hover */
        }

        .icon-share {
            color: #2DB089; /* Initial color */
            transition: color 0.3s ease;
        }

        .icon-share:hover {
            color: #000; /* Color on hover */
        }
    </style>

</head>
<!-- alert for course deleted successful  -->
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['success_message'])) {
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>';
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal({
                        title: "Success!",
                        text: "' . $_SESSION['success_message'] . '",
                        icon: "success",
                        button: "OK",
                    });
                });
              </script>';
        unset($_SESSION['success_message']);
    }
    ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'header.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Approved Courses</h1>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">

                            <div class="col-3">
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="row">
                                        <div class="col-9"> <input class="form-control mr-sm-2" type="search"
                                                placeholder="Search" aria-label="Search">
                                        </div>
                                        <div class="col-3"> <button class="btn btn-outline-primary my-2 my-sm-0"
                                                type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

                <form action="" method="POST" id="deleteCourseForm">
    <div class="col-12 ">
        <div class="card shadow mb-4">
            <table class="table" style="align-items: center;">
                <thead class="bg-gradient-primary">
                    <tr style="color: white;">
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Instructor</th>
                        <th scope="col">Category</th>
                        <th scope="col">Individual</th>
                        <th scope="col">Group</th>
                        <th scope="col">Master</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM `courses` WHERE status = 'Approved'";
                        $result = mysqli_query($connection, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $row['imagePath'] ?>" style="width: 50px;height: 50px;">
                                    </td>
                                    <td>
                                        <?php echo $row['course_title'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['instructor_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['category'] ?>
                                    </td>
                                    <td style="width: 120px;">
                                        <?php
                                        $course_id = $row['id'];
                                        $sql_options = "SELECT * FROM `course_options` WHERE cou_id = $course_id";
                                        $result_options = mysqli_query($connection, $sql_options);

                                        $individual_price = '-';
                                        $group_price = '-';
                                        $master_price = '-';

                                        if (mysqli_num_rows($result_options) > 0) {
                                            while ($option_row = mysqli_fetch_assoc($result_options)) {
                                                $package_type_id = $option_row['package_type'];
                                                $price = '<b>Rs.</b> ' . $option_row['price'];

                                                // Fetch the package name from the package_type table
                                                $sql_package = "SELECT name FROM `package_type` WHERE id = $package_type_id";
                                                $result_package = mysqli_query($connection, $sql_package);

                                                if ($package_row = mysqli_fetch_assoc($result_package)) {
                                                    $package_name = $package_row['name'];
                                                }

                                                if ($package_type_id == 1) {
                                                    $individual_price = "$price";
                                                } elseif ($package_type_id == 2) {
                                                    $group_price = "$price";
                                                } elseif ($package_type_id == 3) {
                                                    $master_price = "$price";
                                                }
                                            }
                                        }

                                        if ($individual_price == '-') {
                                            echo '<p align = "center">' . $individual_price . '</p>';
                                        } else {
                                            echo $individual_price;
                                        }

                                        ?>
                                    </td>
                                    <td style="width: 120px;">
                                        <?php
                                        if ($group_price == '-') {
                                            echo '<p align = "center">' . $group_price . '</p>';
                                        } else {
                                            echo $group_price;
                                        }
                                        ?>
                                    </td>
                                    <td style="width: 120px;">
                                        <?php
                                        if ($master_price == '-') {
                                            echo '<p align = "center">' . $master_price . '</p>';
                                        } else {
                                            echo $master_price;
                                        }
                                        ?>
                                    </td>
                                    <td><span class="btn btn-success" style="width: 102px;"><?php echo $row['status'] ?></span></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                            <i class="bi bi-eye-fill icon-preview" onclick="previewCourse('<?php echo htmlspecialchars($row['id']); ?>')" style="cursor: pointer;"></i>
                                            </div>
                                            <div class="col-2">
                                            <i class="bi bi-trash-fill trash-icon" onclick="deleteCourse(<?php echo $row['id']; ?>)" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='8'><b>No approved courses found.</b></td></tr>";
                        }
                        ?>
                    </div>
                </tbody>
            </table>
            <tfooter class="mb-4" style="margin-right: 2%;">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2 mx-2" type="button"><i class="bi bi-arrow-left-short"></i></button>
                    <button class="btn btn-primary" type="button"><i class="bi bi-arrow-right-short"></i></button>
                </div>
            </tfooter>
        </div>
    </div>
    <input type="hidden" name="delete_course_id" id="delete_course_id">
</form>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        document.getElementById('statusSelect').addEventListener('change', function () {
            var selectedOption = this.value; // Simplified access to the selected option value
            if (selectedOption === 'Approved') {
                Swal.fire({
                    title: "Are you sure to change status?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, change it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Approved!",
                            text: "The status has been changed to Approved.",
                            icon: "success"
                        });
                    }
                });
            } else if (selectedOption === 'Blocked') {
                Swal.fire({
                    title: "Are you sure to change status?",
                    text: "This will restrict access!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, block it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Blocked!",
                            text: "The status has been changed to Blocked.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        function deleteCourse(courseId) {
            swal({
                title: "Are you sure you want to delete this course?",
                text: "Once deleted, you will not be able to recover this course!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete_course_id').value = courseId;
                    document.getElementById('deleteCourseForm').submit();
                } else {
                    swal("Your course is safe!");
                }
            });
        }
    </script>
    <script>
        function previewCourse(courseId) {
            window.location.href = '../Single_Page_View.php?id=' + courseId;
        }

        function shareCourse(courseId) {
            // Implement your share functionality here
            alert('Share course with ID: ' + courseId);
        }
    </script>

    

    


</body>

</html>