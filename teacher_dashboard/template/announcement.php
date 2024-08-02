<?php
session_start();
include '../../Databsase/connection.php';

if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
}

$Instructor = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $instructor_id = $_SESSION["id"];

    $announcement = $_POST["announcement"];
    $course = $_POST["course"];
    $message = $_POST["message"];

    $sql = "INSERT INTO announcements (instructor_id, announcement, course, message) 
                VALUES ('$instructor_id', '$announcement', '$course', '$message')";

    $stmt = $connection->prepare("INSERT INTO announcements (instructor_id, announcement, course, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $instructor_id, $announcement, $course, $message);

    if ($stmt->execute()) {
        header("location:announcement.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Create Cource - Instructor</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="images/v3_66.png" />
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
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
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav style="background-color: #002B45;">
            <?php
            require "sidenav.php";
            ?>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper" style="background-color: #F9F6F1;">

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10">
                                                    <h4 class="card-title mb-1">Create Announcment</h4>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <form method="post" action="./announcement.php">
                                                <div class="form-group mt-2">
                                                    <label for="announcement">Announcement</label>
                                                    <!-- Notice the addition of the 'name' attribute here -->
                                                    <input type="text" class="form-control" style="background-color: white;color: black;" id="announcement" name="announcement">
                                                </div>
                                                <div class="form-group">
                                                    <label for="course">Select Name of the Course</label>
                                                    <select class="form-control" style="border: 1px solid black; background-color:white;color: black;" id="course" name="course">
                                                        <option value="">--Select subject for the classes--</option>
                                                        <?php
                                                        $sqlCheck = "SELECT * FROM courses WHERE instructor_id = $Instructor AND `status` = 'Approved'";

                                                        $resultCheck = mysqli_query($connection, $sqlCheck);

                                                        if (mysqli_num_rows($resultCheck) > 0) {
                                                            while ($rowCheck = mysqli_fetch_array($resultCheck)) {
                                                        ?>
                                                                <option value="<?php echo $rowCheck["id"] ?>"><?php echo $rowCheck["course_title"] ?>
                                                                </option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <!-- Notice the addition of the 'name' attribute here -->
                                                    <textarea class="form-control" style="background-color: white;color: black;" id="message" name="message" rows="3"></textarea>
                                                </div>
                                                <div class="col-2">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <h4 class="card-title mb-3">Recently added announcement</h4>
                                        <div class="table-wrapper">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col item-center">Announcment</th>
                                                        <th scope="col item-center">Cource</th>
                                                        <th scope="col item-center">Message</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $query = "SELECT * FROM announcements Where instructor_id = $Instructor ORDER BY id DESC";
                                                $result = mysqli_query($connection, $query);
                                                ?>

                                                <tbody>
                                                    <?php if (mysqli_num_rows($result) > 0) : ?>
                                                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($row['announcement']); ?></td>
                                                                <?php
                                                                    $courseID = $row['course'];
                                                                    $SQLC = "SELECT * FROm `courses` WHERE id = $courseID";
                                                                    $RESULTC = mysqli_query($connection, $SQLC);
                                                                    $ROWC = mysqli_fetch_array($RESULTC);
                                                                ?>
                                                                <td class="text-muted"><?php echo htmlspecialchars($ROWC['course_title']); ?></td>
                                                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td colspan="4">No announcements found.</td>
                                                        </tr>
                                                    <?php endif; ?>
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