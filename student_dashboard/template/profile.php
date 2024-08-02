<?php
session_start();
include('../../Databsase/connection.php');

if (!isset($_SESSION["id"])) {
    header("location:../../Student_Signin.php");
    exit;
}

$student_id = $_SESSION['id'];

$query = "SELECT * FROM student WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();


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

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 500px) {

            .table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table-wrapper {
                margin-left: -10px !important;
                margin-right: -10px !important;
                padding: 0px !important;
            }

            .table th,
            .table td {
                white-space: nowrap;
            }
        }

        .profile-pic {
            width: 120px;
        }

        .profile_image {
            width: 100%;
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
            <div class="content-wrapper" style="background-color: white;">
                <!-- Pink Background -->

                <!-- Transactions and Project -->
                <div class="row">
                    <!-- Transaction History -->
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="profile-pic">

                                                        <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                                                            <?php
                                                            if (empty($row['profile_image'])) {
                                                                echo '<center><img  style="width: 120px; Height: 120px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                                            } else {
                                                                $decoded_image = base64_decode($row['profile_image']);
                                                                if ($decoded_image !== false) {
                                                                    echo '<center><img  style="width: 120px; Height: 120px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" /></center>';
                                                                } else {
                                                                    echo '<center><img  style="width: 120px; Height: 120px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                                                }
                                                            }
                                                            ?>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">

                                                    <h3>
                                                        <?php echo ($row['firstName'] ?? 'Default') . ' ' . ($row['lastName'] ?? 'Name'); ?>
                                                    </h3>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mx-1">
                                                        <a href="#" class="btn mt-2" style="background-color: #002B45;text-align: center;width: 150px;" data-toggle="modal" data-target="#editProfileModal">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                            <span style="margin-left: 5px;">Edit Profile</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>


                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <!-- <u>
                                                                <h3>My Details</h3>
                                                            </u> -->
                                                        </div>
                                                        <div class="col-12 ">
                                                            <div class="row">
                                                                <div class="col-12 ">
                                                                    <h5 class="mb-3">Personal Details</h5>
                                                                </div>
                                                                <div class="col-12 mx-1">
                                                                    <p>
                                                                        <strong><i class="fas fa-map-marker-alt"></i>
                                                                            Address:</strong><br>
                                                                        <?php echo $row['address']; ?><br>
                                                                        <?php echo $row['city']; ?><br>
                                                                        <?php echo $row['zipcode']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>
                                                                        <strong><i class="fas fa-phone"></i> Contact
                                                                            Number:</strong>
                                                                        <?php echo $row['Pphone']; ?>
                                                                    </p>
                                                                    <p>
                                                                        <strong><i class="fas fa-envelope"></i>
                                                                            Email:</strong><br>
                                                                        <?php echo $row['email']; ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 mx-1">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <h5 class="mb-3">Education Qualification</h5>
                                                        </div>
                                                        <div class="col-12 mx-1">

                                                            <p>
                                                                <strong><i class="fas fa-graduation-cap"></i>
                                                                    Education:</strong><br>
                                                                <?php echo $row['education']; ?>
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <!-- <div class="col-12 mt-3">
                                                            <h5 class="mb-3">Download My CV</h5>
                                                        </div> -->
                                                        <!-- <div class="col-12 mx-1">
                                                            <a href="<?php echo $row['pdfPath']; ?>" download
                                                                class="btn mt-2"
                                                                style="background-color: #002B45;">Download PDF</a>
                                                        </div> -->
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 grid-margin stretch-card card">
                        <div class="row">
                            <!-- my cources -->
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Courses</h4>
                                        <p class="text-muted mb-1">Explore More</p>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div class="table-wrapper">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Cource</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Language</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $StudentID = $_SESSION['id'];
                                                    $SQLPAY = "SELECT * FROM `payedstudent` WHERE studentID = $StudentID";
                                                    $RESULTPAY = mysqli_query($connection, $SQLPAY);
                                                    $count = 1;

                                                    if (mysqli_num_rows($RESULTPAY) > 0) {
                                                        while ($RowPay = mysqli_fetch_array($RESULTPAY)) {
                                                            $courseID = $RowPay['course_id'];
                                                            $COURSE_SQL = "SELECT * FROM `courses` WHERE id = $courseID";
                                                            $COURSE_RESULT = mysqli_query($connection, $COURSE_SQL);
                                                            $COURSE_ROW = mysqli_fetch_array($COURSE_RESULT);
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $count ?></th>
                                                                <td><?php echo $COURSE_ROW['course_title'] ?></td>
                                                                <td><?php echo "RS ". $RowPay['price'] ?></td>
                                                                <td><?php echo $COURSE_ROW['language'] ?></td>
                                                            </tr>
                                                    <?php
                                                        $count++;
                                                        }
                                                    }else{
                                                        echo "No courses found";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- add work Experience -->

                            <!-- <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Work Experience</h4>
                                        <p class="text-muted mb-1">Explore More</p>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div>

                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <div>
                                            <a href="#" class="text-capitalize">+ Add Work Experience</a>
                                        </div>
                                    </div>

                                </div>
                            </div> -->
                            <!-- my Certificate -->
                            <!-- <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Certificate</h4>
                                        <p class="text-muted mb-1">Explore More</p>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div class="table-wrapper">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Cource</th>
                                                        <th scope="col">Grade</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                            </svg></th>
                                                        <td>Java Cource</td>
                                                        <td>A</td>
                                                        <td class="text-success">Pass</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                            </svg></th>
                                                        <td>PHP Cource</td>
                                                        <td>A</td>
                                                        <td class="text-danger">Fail</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                            </svg></th>
                                                        <td>React Cource</td>
                                                        <td>A</td>
                                                        <td class="text-success">Pass</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:white;" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form id="editProfileForm" action="edit_profile.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">

                            <!-- Profile Picture Section -->
                            <div class="form-row text-center mb-3" id="profilePicContainer" style="display: flex; align-items: center; justify-content: center;">
                                <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                                    <?php
                                    if (empty($row['profile_image'])) {
                                        echo '<center><img style="width:320px; height: 320px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                    } else {
                                        $decoded_image = base64_decode($row['profile_image']);
                                        if ($decoded_image !== false) {
                                            echo '<center><img style="width:320px; height: 320px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" /></center>';
                                        } else {
                                            echo '<center><img style="width:320px; height: 320px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                        }
                                    }
                                    ?>
                                </label>
                                <input type="file" id="profilePicInput" class="d-none" name="profile_image" accept="image/*">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label style="color:white;">First Name</label>
                                    <input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo htmlspecialchars($row['firstName']); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="color:white;">Last Name</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo htmlspecialchars($row['lastName']); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="color:white;">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($row['email']); ?>">
                            </div>
                            <div class="form-group">
                                <label style="color:white;">Contact</label>
                                <input type="text" class="form-control" name="Pphone" placeholder="Contact" value="<?php echo htmlspecialchars($row['Pphone']); ?>">
                            </div>
                            <div class="form-group">
                                <label style="color:white;">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo htmlspecialchars($row['address']); ?>">
                            </div>
                            <div class="form-group">
                                <label style="color:white;">Country</label>
                                <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo htmlspecialchars($row['country']); ?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label style="color:white;">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo htmlspecialchars($row['city']); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="color:white;">Zip</label>
                                    <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="<?php echo htmlspecialchars($row['zipcode']); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="color:white;">Education</label>
                                <input type="text" class="form-control" name="education" placeholder="Education" value="<?php echo htmlspecialchars($row['education']); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('profilePicInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePicPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>





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