<?php
session_start();

require '../../Databsase/connection.php'; 
$teacherId = $_SESSION["id"];

$studentAnswer = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marks = isset($_POST['marks']) ? intval($_POST['marks']) : null;
    $comment = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : null;

    // Update the student_answers table
    if (isset($_GET['student_id']) && isset($_GET['assignment_id'])) {
        $student_id = $_GET['student_id'];
        $assignment_id = $_GET['assignment_id'];

        $query = "UPDATE student_answers SET marks = ?, comment = ? WHERE student_id = ? AND assignment_id = ? AND teacher_id = ?";
        
        if ($stmt = mysqli_prepare($connection, $query)) {
            mysqli_stmt_bind_param($stmt, "isiii", $marks, $comment, $student_id, $assignment_id, $teacherId);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Marks and comment updated successfully.";
            } else {
                echo "Failed to update marks and comment.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Prepare failed: " . mysqli_error($connection);
        }
    } else {
        echo "Student ID or Assignment ID not provided.";
    }
}

if (isset($_GET['student_id']) && isset($_GET['assignment_id'])) {
    $student_id = $_GET['student_id'];
    $assignment_id = $_GET['assignment_id'];

    // Fetch the details using the student_id and assignment_id
    $query = "SELECT sa.*, s.firstName, s.lastName, a.assignment_title, c.course_title
              FROM student_answers sa
              INNER JOIN student s ON sa.student_id = s.id
              INNER JOIN assignments a ON sa.assignment_id = a.id
              INNER JOIN courses c ON sa.course_id = c.id
              WHERE sa.student_id = ? AND sa.assignment_id = ? AND sa.teacher_id = ?";

    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "iii", $student_id, $assignment_id, $teacherId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $studentAnswer = $row; 
        } else {
            echo "No record found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Prepare failed: " . mysqli_error($connection);
    }
} else {
    echo "Student ID or Assignment ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Assignment Answers - Instructor</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="images/v3_66.png" />
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
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
                margin-left: -10px !important;
                margin-right: -10px !important;
                padding: 0px !important;
            }

            .table th,
            .table td {
                white-space: nowrap; 
            }
        }

        @media (max-width: 500px) {
            .btn.btn-primary {
                font-size: 0;
            }
            .btn.btn-primary::after {
                content: "+"; 
                font-size: 14px; 
            }
        }

        .inputmarks {
            width: 150px;
            color: black;
            border: 1px solid #dddddd; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
        }

        .inputcomment {
            color: black;
            border: 1px solid #dddddd; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav>
            <?php require "sidenav.php"; ?>
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
                                            <main role="main" class="main-content">
                                                <div class="container-fluid">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12"> 
                                                            <div class="row my-4">                                                             
                                                                <div class="col-md-12">
                                                                    <div class="card shadow">
                                                                        <div class="card-body">
                                                                            <div class="col-10">
                                                                                <h4 class="card-title mb-1">Student ID - <?= htmlspecialchars($studentAnswer['student_id'] ?? '') ?></h4>
                                                                                <h4 class="card-title mb-1"><?= htmlspecialchars($studentAnswer['assignment_title'] ?? '') ?></h4>
                                                                                <div class="mt-2">
                                                                                    <a href="javascript:history.back()" class="btn btn-secondary">
                                                                                        <i class="bi bi-arrow-left" style="font-size: 1rem; color: white;"></i> 
                                                                                    </a>
                                                                                    <div class="mt-4">
                                                                                        <p>Answer:</p>
                                                                                        <?php if (!empty($studentAnswer['answer_pdf'])): ?>
                                                                                            <iframe src="pdfs/<?= htmlspecialchars($studentAnswer['answer_pdf']) ?>" width="100%" height="600px"></iframe>
                                                                                        <?php else: ?>
                                                                                            No PDF
                                                                                        <?php endif; ?>

                                                                                        <form method="post" action="">
                                                                                            <div class="form-group mt-4">
                                                                                                <label for="marks">Marks:</label>
                                                                                                <input type="number" class="form-control inputmarks" id="marks" name="marks" 
                                                                                                    value="<?= htmlspecialchars($studentAnswer['marks'] ?? '') ?>" required style="background-color: transparent;">
                                                                                            </div>
                                                                                            <div class="form-group mt-2">
                                                                                                <label for="comment">Comment:</label>
                                                                                                <textarea class="form-control inputcomment" id="comment" name="comment" rows="4" 
                                                                                                        style="background-color: transparent;"><?= htmlspecialchars($studentAnswer['comment'] ?? '') ?></textarea>
                                                                                            </div>
                                                                                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>              
                                            </main>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <?php require "teacherfooter.php"; ?>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" i
    ntegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9eIH4xmG3INP9zcbwUFp" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/Chart.roundedBarCharts.js"></script>
</body>
</html>
