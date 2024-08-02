<?php
session_start();
include ('../../Databsase/connection.php');
if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
}

$query = "SELECT * FROM instructors WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$output = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['company'], $_POST['job_title'], $_POST['years'])) {
    $instructor_id = $_SESSION['id']; // Use logged-in instructor's ID
    $companies = $_POST['company'];
    $job_titles = $_POST['job_title'];
    $years = $_POST['years'];

    // Process each set of work experience data
    for ($i = 0; $i < count($companies); $i++) {
        $sql = "INSERT INTO work_experience (instructor_id, company, job_title, years) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("issi", $instructor_id, $companies[$i], $job_titles[$i], $years[$i]);
        $stmt->execute();
        $output .= "<tr><td>" . htmlspecialchars($companies[$i]) . "</td><td>" . htmlspecialchars($job_titles[$i]) . "</td><td>" . htmlspecialchars($years[$i]) . "</td></tr>";
    }
}

$expQuery = "SELECT * FROM work_experience WHERE instructor_id = ?";
$expStmt = $connection->prepare($expQuery);
$expStmt->bind_param("i", $_SESSION["id"]);
$expStmt->execute();
$expResult = $expStmt->get_result();
$experienceData = '';
while ($expRow = $expResult->fetch_assoc()) {
    $experienceData .= "<tr><td>" . htmlspecialchars($expRow['company']) . "</td><td>" . htmlspecialchars($expRow['job_title']) . "</td><td>" . htmlspecialchars($expRow['years']) . "</td></tr>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>profile - Instructor</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="../images/v3_66.png" />

    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />


    <script>
        $(document).ready(function () {
            $("#addExperience").click(function () {
                var formHtml = `
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" class="form-control" name="company[]" required>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Job Title:</label>
                        <input type="text" class="form-control" name="job_title[]" required>
                    </div>
                    <div class="form-group">
                        <label for="years">Years:</label>
                        <input type="text" class="form-control" name="years[]" required>
                    </div>
                    <button type="button" id="saveExperience" class="btn btn-success">Save Experience</button>
                    <hr>
                `;
                $("#workExperienceForm").html(formHtml);
            });

            $(document).on("click", "#saveExperience", function () {
                var formData = $("#workExperienceForm").serialize();

                $.ajax({
                    type: "POST",
                    url: "./save_experience.php",
                    data: formData,
                    success: function (data) {
                        $("#workExperienceTable tbody").html(data);
                        alert("Experience added successfully.");
                    },
                    error: function () {
                        alert("Error submitting the data.");
                    }
                });
            });
        });
    </script>
    <style>
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
                margin-left:-10px  !important;
                margin-right:-10px  !important;
                padding: 0px !important;
            }

            .table th,
            .table td {
                white-space: nowrap; 
            }
        }
        .profile_image {
            float: left;
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
            <div class="content-wrapper" style="background-color: #F9F6F1;">
                <!-- Pink Background -->

                <!-- Transactions and Project -->
                <div class="row">
                    <!-- Transaction History -->
                    <div class="col-md-4 grid-margin stretch-card" >
                        <div class="card">
                            <div class="card-body">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="count-indicator">
                                                        
                                                    <!-- Profile Picture Section -->
                                                    <div class="form-row text-center mb-3" id="profilePicContainer">
                                                        <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                                                        <?php                               
                                                            if (empty($row['profile_image'])) {
                                                                echo '<center><img  style="width: 120px; Height: 120px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                                            } else {                                   
                                                                $decoded_image = base64_decode($row['profile_image']);                                                         
                                                                if ($decoded_image !== false) {                                     
                                                                    echo '<center><img  style="width: 120px; Height: 120px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,'.base64_encode($decoded_image).'" alt="profile image" /></center>';
                                                                } else {                                       
                                                                    echo '<center><img  style="width: 120px; Height: 120px; object-fit: cover" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                                                }
                                                            }
                                                            ?>
                                                        </label>
                                                        
                                                    </div>
                                                    <!-- input profile image -->
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

                                                        <span class="count bg-success"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <h3>
                                                        <?php echo $row['FirstName'] . ' ' . $row['LastName']; ?>
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mx-1">
                                                            <a href="../../Teacher_Profile_Edit.php?id=<?php echo $row['id']; ?>"
                                                                class="btn mt-2"
                                                                style="background-color: #002B45;text-align: center;width: 130px;">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                                <span style="margin-left: 5px;">Edit Profile</span>
                                                            </a>

                                                            <?php
                                                                $instructor_id = $_SESSION['id'];

                                                                $bankSQL = "SELECT * FROM bank_details WHERE instructorId = $instructor_id";
                                                                $bankresult = mysqli_query($connection, $bankSQL);
                                                                $newrow = mysqli_fetch_array($bankresult);

                                                                $hname = htmlspecialchars($newrow['hname'] ?? '');
                                                                $bname = htmlspecialchars($newrow['bname'] ?? '');
                                                                $branch = htmlspecialchars($newrow['branch'] ?? '');
                                                                $anumber = htmlspecialchars($newrow['anumber'] ?? '');

                                                                $hasBankDetails = $hname || $bname || $branch || $anumber;
                                                            ?>

                                                            <a href="#" id="openModalButton" class="btn mt-2" style="background-color: #002B45; text-align: center; max-width: 175px;" data-toggle="modal" data-target="#addbankdet">
                                                                <i class="fa-solid fa-bank"></i>
                                                                <span id="buttonText" style="margin-left: 5px;"><?php echo $hasBankDetails ? 'Edit Bank Details' : 'Add Bank Details'; ?></span>
                                                            </a>

                                                            <?php if (isset($_SESSION['message'])): ?>
                                                                <script>
                                                                    alert("<?php echo $_SESSION['message']; ?>");
                                                                    <?php unset($_SESSION['message']); ?>
                                                                </script>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 mt-1 text-truncate">
                                                    <figcaption class="blockquote-footer">
                                                        <?php echo $row['Country']; ?>
                                                    </figcaption>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-12 mx-1">
                                                        <a href="https://www.facebook.com" target="_blank"><i
                                                                class="fab fa-facebook-f mx-2"
                                                                style="color: #3b5998;font-size: 24px;"></i></a>
                                                        <a href="https://twitter.com" target="_blank"><i
                                                                class="fab fa-twitter mx-2"
                                                                style="color: #1da1f2;font-size: 24px;"></i></a>
                                                        <a href="https://www.instagram.com" target="_blank"><i
                                                                class="fab fa-instagram mx-2"
                                                                style="color: #c13584;font-size: 24px;"></i></a>
                                                        <a href="https://www.linkedin.com" target="_blank"><i
                                                                class="fab fa-linkedin-in mx-2"
                                                                style="color: #0077b5;font-size: 24px;"></i></a>
                                                        <a href="https://wa.me" target="_blank"><i
                                                                class="fab fa-whatsapp mx-2"
                                                                style="color: #25D366;font-size: 24px;"></i></a>
                                                    </div>
                                                </div> -->
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
                                                                        <?php echo $row['Address'] . ', ' . $row['Address2']; ?><br>
                                                                        <?php echo $row['City']; ?><br>
                                                                        <?php echo $row['ZipCode']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>
                                                                        <strong><i class="fas fa-phone"></i> Contact
                                                                            Number:</strong>
                                                                        <?php echo $row['Phone']; ?>
                                                                    </p>
                                                                    <p>
                                                                        <strong><i class="fas fa-envelope"></i>
                                                                            Email:</strong><br>
                                                                        <?php echo $row['Email']; ?>
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
                                                                <?php echo $row['EducationL']; ?>
                                                            </p>
                                                            <p>
                                                                <strong><i class="fas fa-certificate"></i> Degree
                                                                    Path:</strong><br>
                                                                <?php echo $row['DegreeP']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>
                                                                <strong><i class="fas fa-briefcase"></i>
                                                                    Experience:</strong><br>
                                                                <?php echo $row['Experience']; ?>
                                                            </p>
                                                            <p>
                                                                <strong><i class="fas fa-level-up-alt"></i> Experience
                                                                    Level:</strong><br>
                                                                <?php echo $row['ExperienceLevel']; ?>
                                                            </p>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <h5 class="mb-3">Download My CV</h5>
                                                        </div>
                                                        <div class="col-12 mx-1">
                                                            <a href="<?php echo $row['pdfPath']; ?>" download
                                                                class="btn mt-2"
                                                                style="background-color: #002B45;">Download PDF</a>
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

                    <div class="col-md-7 grid-margin stretch-card card">
                        <div class="row">
                            <!-- my cources -->
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Courses</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div class="table-wrapper">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Course Name</th>
                                                        <th scope="col">No of students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $instructor_id = $_SESSION['id'];

                                                    $query = "SELECT * FROM courses WHERE instructor_id = ?";
                                                    $stmt = $connection->prepare($query);
                                                    $stmt->bind_param("i", $instructor_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0):
                                                        while ($course = $result->fetch_assoc()):
                                                            echo "<tr>";
                                                            echo "<td>" . htmlspecialchars($course['id']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($course['course_title']) . "</td>";
                                                            $courseID = htmlspecialchars($course['id']);
                                                            $SQLCou = "SELECT COUNT(*) as StudentsN FROM `payedstudent` WHERE course_id = $courseID";
                                                            $ResultCou = mysqli_query($connection, $SQLCou);
                                                            if(mysqli_num_rows($ResultCou) > 0){
                                                                $RowCou = mysqli_fetch_array($ResultCou);
                                                                echo "<td>". $RowCou['StudentsN'] . "</td>";
                                                            }else{
                                                                echo "<td>" . "0" . "</td>";
                                                            }
                                                            echo "</tr>";
                                                        endwhile;
                                                    else:
                                                        echo "<tr><td colspan='3'>No courses found.</td></tr>";
                                                    endif;
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- add work Experience -->

                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Work Experience</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div class="table-wrapper">

                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <form id="workExperienceForm">
                                            <button id="addExperience" class="btn btn-primary text-capitalize">+ Add
                                                Work Experience</button> <button type="button" id="saveExperience"
                                                class="btn btn-success">Save Experience</button>

                                            <div id="workExperienceFields">
                                            </div>
                                        </form>
                                        <hr>
                                        <h5>Stored Work Experiences</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>Job Title</th>
                                                    <th>Years</th>
                                                </tr>
                                            </thead>
                                            <tbody id="workExperienceTable">
                                                <?php echo $experienceData; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- my Certificate -->
                            <!-- <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Certificate</h4>
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
                                                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="green"
                                                                class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                            </svg></th>
                                                        <td>Java Cource</td>
                                                        <td>A</td>
                                                        <td class="text-success">Pass</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="green"
                                                                class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                            </svg></th>
                                                        <td>PHP Cource</td>
                                                        <td>A</td>
                                                        <td class="text-danger">Fail</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="green"
                                                                class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
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

                <!-- Add Bank Details -->
                <div class="modal fade" id="addbankdet" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true" style="overflow: auto;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="background-color: white; color: black;">
                            <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                                <h1 class="modal-title" id="messageModalLabel" style="font-size: 24px;">Bank Details</h1>
                                <button type="button" class="close" data-dismiss="modal" style="position: relative; right: 10px;" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="../../handlers/addbankHandler.php" method="post">
                                <div class="modal-body">
                                    <label for="hname">Account Holder Name:</label>
                                    <input type="text" id="hname" name="hname" class="form-control bg-white" style="color: black; margin-bottom: 10px;" placeholder="Type Here" value="<?php echo $hname; ?>" required>

                                    <label for="bname">Bank Name:</label>
                                    <input type="text" id="bname" name="bname" class="form-control bg-white" style="color: black; margin-bottom: 10px;" placeholder="Type Here" value="<?php echo $bname; ?>" required>
                                    
                                    <label for="branch">Branch:</label>
                                    <input type="text" id="branch" name="branch" class="form-control bg-white" style="color: black; margin-bottom: 10px;" placeholder="Type Here" value="<?php echo $branch; ?>" required>

                                    <label for="anumber">Account Number:</label>
                                    <input type="text" id="anumber" name="anumber" class="form-control bg-white" style="color: black; margin-bottom: 10px;" placeholder="Type Here" value="<?php echo $anumber; ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="bankdetails" id="submitButton" class="btn btn-success" style="float:right; <?php echo $hasBankDetails ? 'display:none;' : ''; ?>">Send</button>
                                    <button type="submit" name="editbankdetails" id="updateButton" class="btn btn-warning" style="float:right; <?php echo $hasBankDetails ? 'display:inline-block;' : 'display:none;'; ?>">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <footer class="footer">
                <?php
                require "teacherfooter.php";
                ?>
            </footer>
        </div>

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
