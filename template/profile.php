<?php
// session_start();
include('../../Databsase/connection.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
     <link rel="shortcut icon" href="assets/images/favicon.png" />


    <script>
        $(document).ready(function() {
            $("#addExperience").click(function() {
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

            $(document).on("click", "#saveExperience", function() {
                var formData = $("#workExperienceForm").serialize();

                $.ajax({
                    type: "POST",
                    url: "./save_experience.php",
                    data: formData,
                    success: function(data) {
                        $("#workExperienceTable tbody").html(data);
                        alert("Experience added successfully.");
                    },
                    error: function() {
                        alert("Error submitting the data.");
                    }
                });
            });
        });
    </script>

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
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="count-indicator">
                                                        <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="" style="width: 100px;height: 100px;" />
                                                        <span class="count bg-success"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <h3>
                                                        <?php echo $row['FirstName'] . ' ' . $row['LastName']; ?>
                                                    </h3>
                                                </div>
                                                <div class="col-12 mt-1 text-truncate">
                                                    <figcaption class="blockquote-footer">
                                                        <?php echo $row['Country']; ?>
                                                    </figcaption>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mx-1">
                                                        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f mx-2" style="color: #3b5998;font-size: 24px;"></i></a>
                                                        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter mx-2" style="color: #1da1f2;font-size: 24px;"></i></a>
                                                        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram mx-2" style="color: #c13584;font-size: 24px;"></i></a>
                                                        <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in mx-2" style="color: #0077b5;font-size: 24px;"></i></a>
                                                        <a href="https://wa.me" target="_blank"><i class="fab fa-whatsapp mx-2" style="color: #25D366;font-size: 24px;"></i></a>
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
                                                            <a href="<?php echo $row['pdfPath']; ?>" download class="btn mt-2" style="background-color: #002B45;">Download PDF</a>
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

                    <div class="col-md-8 grid-margin stretch-card card">
                        <div class="row">
                            <!-- my cources -->
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Courses</h4>
                                     </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Course Name</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Price</th>

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

                                                    if ($result->num_rows > 0) :
                                                        while ($course = $result->fetch_assoc()) :
                                                            echo "<tr>";
                                                            echo "<td>" . htmlspecialchars($course['id']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($course['course_title']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($course['description']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($course['price']) . "</td>";
                                                            echo "</tr>";
                                                        endwhile;
                                                    else :
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
                                        <div>

                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <form id="workExperienceForm">
                                            <button id="addExperience" class="btn btn-primary text-capitalize">+ Add Work Experience</button>                                            <button type="button" id="saveExperience" class="btn btn-success">Save Experience</button>

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
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Certificate</h4>
                                     </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div>
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
                            </div>
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
