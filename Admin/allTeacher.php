<?php
session_start();
include ('../Databsase/connection.php');
if (!isset($_SESSION['idAdmin'])) {
    header('location: login.php');
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

    <title>All Teachers</title>

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function blockInstructor(id) {
            window.location.href = '../handlers/block.php?id=' + id;
        }
    </script>

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

        div:where(.swal2-container) img:where(.swal2-image) {
            object-fit: cover;
        }

        div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
            background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            background-color: #224abe;
        }

        .div:where(.swal2-container) button:where(.swal2-styled):not([disabled]) {
            cursor: pointer;
        }

        .custom-confirm-button {
            width: 300px;
        }
        .teacherBtn{
            background-color: white;
        }

        .teacherBtn:hover {
            background-color: #002B45;
            color: white;
            transform: scale(1.09);
            transition: 300ms;
        }
    </style>

</head>

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
                                <a class="dropdown-item" href="logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
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
                        <h1 class="h3 mb-0 text-gray-800">All Teacher</h1>
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

                <!-- <form action=""> -->
                    <div class="col-12 ">
                        <div class="card shadow mb-4">
                            <table class="table" style="align-items: center;">
                                <thead class="bg-gradient-primary">
                                    <tr style="color: white;">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Education Level</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>

                                <?php
                                $sql = "SELECT * FROM Instructors WHERE Status = 'Approved' ORDER BY `id` ASC";
                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        // Fetch courses and enrolled students for each instructor
                                        $instructorId = $row['id'];
                                        $coursesSql = "
                                            SELECT 
                                                courses.course_title, 
                                                COUNT(payedstudent.studentID) AS enrolled_students 
                                            FROM 
                                                courses 
                                            JOIN 
                                                course_options ON courses.id = course_options.cou_id 
                                            LEFT JOIN 
                                                payedstudent ON course_options.id = payedstudent.course_optionsID 
                                            WHERE 
                                                course_options.techer_id = $instructorId 
                                            GROUP BY 
                                        courses.id;";
                                        $coursesResult = mysqli_query($connection, $coursesSql);
                                        $coursesData = [];
                                        while ($courseRow = mysqli_fetch_assoc($coursesResult)) {
                                            $coursesData[] = $courseRow;
                                        }
                                        $coursesJson = json_encode($coursesData);
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th>
                                                <?php
                                                    $myImage;
                                                    if (empty($row['profile_image'])) {
                                                        if($row['imagePath'] != '' || $row['imagePath'] != null){
                                                            $myImage = $row['imagePath'];
                                                            echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="'.$row['imagePath'].'" alt="profile image" />';
                                                        }else{
                                                            $myImage = "../teacher_dashboard/template/assets/images/faces/face16.jpg";
                                                            echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="../teacher_dashboard/template/assets/images/faces/face16.jpg" alt="default image" />';
                                                        }
                                                    } 
                                                    else {
                                                        $decoded_image = base64_decode($row['profile_image']);
                                                        $myImage = $decoded_image;
                                                        if ($decoded_image !== false) {
                                                            echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" />';
                                                        } else {
                                                            if($row['imagePath'] != '' || $row['imagePath'] != null){
                                                                $myImage = $row['imagePath'];
                                                                echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="'.$row['imagePath'].'" alt="profile image" />';
                                                            }else{
                                                                $myImage = "../teacher_dashboard/template/assets/images/faces/face16.jpg";
                                                                echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="../teacher_dashboard/template/assets/images/faces/face16.jpg" alt="default image" />';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </th>
                                                <td><?php echo $row["FirstName"] ?></td>
                                                <td><?php echo $row["Phone"] ?></td>
                                                <td><?php echo $row["Address"] ?></td>
                                                <td><?php echo $row["Country"] ?></td>
                                                
                                                <td>
                                                    <button style="padding: 10px; border-radius: 15px;" class="teacherBtn" data-toggle="modal" data-target="#adminModal" onclick="setEmail('<?php echo $row['Email'] ?>')" ><?php echo $row["Email"]; ?></button>
                                                </td>

                                                <td><?php echo $row["DegreeP"] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success"
                                                        onclick="viewInstructor('<?php echo $row['id'] ?>','<?php echo $row['FirstName'] ?>','<?php echo $row['LastName'] ?>', '<?php echo $row['Phone'] ?>', '<?php echo $row['Email'] ?>','<?php echo $row['DegreeP'] ?>', <?php echo htmlspecialchars($coursesJson); ?>)">View</button>
                                                </td>
                                                <td><a href="<?php echo $row["pdfPath"] ?>"><button type="button"
                                                            style="width: 100px;" class="btn btn-primary">View CV</button></a>
                                                </td>

                                                <td>
                                                    <div
                                                        style="display:flex; justify-content:center; align-items:center; flex-direction:column; gap:5px;">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="blockInstructor(<?php echo $row['id'] ?>)">Blocked</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                            <!-- <tfooter class="mb-4" style="margin-right: 2%;">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2 mx-2" type="button"><i
                                            class="bi bi-arrow-left-short"></i></button>
                                    <button class="btn btn-primary" type="button"><i
                                            class="bi bi-arrow-right-short"></i></button>
                                </div>
                            </tfooter> -->
                        </div>
                    </div>
                <!-- </form> -->
            </div>
            <!-- End of Main Content -->

            
        <!-- popup for the Course Details -->
        <div id="adminModal" class="modal fade" role="dialog" style="color:black;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">
            <form action="../handlers/adminmessageHandler.php" onsubmit="adminsetStartedTimenew()" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                    <h1 style="font-size: 24px;">Send Message</h1>
                </div>
                <div class="modal-body">
                    <label for="TopicName">Topic:</label>
                    <input name="TopicName" type="text" class="form-control" style="background-color: white; color: black;" placeholder="Type Here" required>
                    <label for="message" style="padding-top: 10px;">Message:</label>
                    <textarea name="message" class="form-control" style="background-color: white; color: black;" placeholder="Type Here" required></textarea>
                    <input type="hidden" id="adminsendedTime" name="adminsendedTime">
                    <input type="hidden" id="hiddenEmail" name="email">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="adminsendMessage" class="btn btn-success">Send Message</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <script>
        // current time for the Course Details popup
        function adminsetStartedTimenew() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var day = ("0" + now.getDate()).slice(-2);
            var hours = ("0" + now.getHours()).slice(-2);
            var minutes = ("0" + now.getMinutes()).slice(-2);
            var seconds = ("0" + now.getSeconds()).slice(-2);
            var formattedDateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
            document.getElementById('adminsendedTime').value = formattedDateTime;
            console.log("adminsendedTime:", formattedDateTime); // Add this line for debugging
        }


        function setEmail(email) {
            // Set the value of the hidden input field with the email
            document.getElementById('hiddenEmail').value = email;
        }
        </script>















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
            var selectedOption = this.value;
            if (selectedOption === 'Approved') {
                Swal.fire({
                    title: "Are you sure to change status to Approved?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, change it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Approved!",
                            "The status has been changed to Approved.",
                            "success"
                        );
                        // Handle the approval process here
                    }
                });
            } else if (selectedOption === 'Blocked') {
                Swal.fire({
                    title: "Are you sure to change status to Blocked?",
                    text: "This will restrict access!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, block it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Blocked!",
                            "The status has been changed to Blocked.",
                            "error"
                        );
                        // Handle the blocking process here
                    }
                });
            } else if (selectedOption === 'Pending') {
                Swal.fire({
                    title: "Change status to Pending?",
                    text: "You can change this later.",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, set it to Pending!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Pending!",
                            "The status has been changed to Pending.",
                            "success"
                        );
                        // Handle the pending status setting here
                    }
                });
            }
        });
    </script>
    <script>
        function viewInstructor(id, firstname, lastname, phone, email, DegreeP, coursesData) {
            let coursesHtml = '';

            if (coursesData.length === 0) {
                coursesHtml += '<br><br><table style="width: 100%; display: none;border-collapse: collapse;" id="coursesTable">';
                coursesHtml += '<tr style = "border-bottom: 1px solid #ddd;"><th>Courses</th><th>Enrolled Students</th></tr>';
                coursesHtml += '<tr style = "border-bottom: 1px solid #ddd;"><td colspan="2" style = "text-align: center;padding: 5px 0px;">No courses found.</td></tr>';
                coursesHtml += '</table>';
            } else {
                coursesHtml += '<br><br><table style="width: 100%; display: none;border-collapse: collapse;" id="coursesTable">';
                coursesHtml += '<tr style = "border-bottom: 1px solid #ddd;"><th>Courses</th><th>Enrolled Students</th></tr>';
                coursesData.forEach(course => {
                    coursesHtml += `<tr style = "border-bottom: 1px solid #ddd;"><td style = "text-align: left;padding: 5px 0px;">${course.course_title}</td><td>${course.enrolled_students}</td></tr>`;
                });
                coursesHtml += '</table>';
            }

            Swal.fire({
                title: "<div><b>" + firstname + " " + lastname + "</b></div>",
                html: "<hr style='width: 300px'>" +
                    "<div id='infoSection'>" +
                    "<table>" +
                    "<tr><td style='padding-bottom: 10px; text-align: left;'><i style='color: #7066E0' class='fas fa-user'></i></td><td style='padding-bottom: 10px; text-align: left;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + firstname + " " + lastname + "</td></tr>" +
                    "<tr><td style='padding-bottom: 10px; text-align: left;'><i style='color: #7066E0' class='fas fa-phone'></i></td><td style='padding-bottom: 10px; text-align: left;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + phone + "</td></tr>" +
                    "<tr><td style='padding-bottom: 10px; text-align: left;'><i style='color: #7066E0' class='fas fa-envelope'></i></td><td style='padding-bottom: 10px; text-align: left;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + email + "</td></tr>" +
                    "</table>" +
                    "</div>" +
                    "<hr style='width: 300px'>" +
                    "<div id='coursesSection'>" +
                    "<button style = 'width: 100%;' id='toggleCoursesBtn' class='btn btn-outline-primary' onclick='toggleCoursesTable()'>Show Courses</button>" +
                    coursesHtml +
                    "</div>",
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                customClass: {
                    confirmButton: 'custom-confirm-button'
                }
            });
        }

        function toggleCoursesTable() {
            let coursesTable = document.getElementById('coursesTable');
            let toggleCoursesBtn = document.getElementById('toggleCoursesBtn');

            if (coursesTable.style.display === 'none') {
                coursesTable.style.display = 'table';
                toggleCoursesBtn.textContent = 'Hide Courses';
            } else {
                coursesTable.style.display = 'none';
                toggleCoursesBtn.textContent = 'Show Courses';
            }
        }


    </script>


</body>

</html>