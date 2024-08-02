<?php
session_start();

require '../../Databsase/connection.php'; 
$teacherId = $_SESSION["id"];


if (isset($_GET['assignment_id'])) {
    $assignmentId = $_GET['assignment_id'];

    // Fetch assignment title 
    $assignmentQuery = "
    SELECT a.assignment_title
    FROM assignments a
    WHERE a.id = ? AND a.teacher_id = ?
    ";

    $assignmentTitle = '';

    if ($stmt = mysqli_prepare($connection, $assignmentQuery)) {
        mysqli_stmt_bind_param($stmt, "ii", $assignmentId, $teacherId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $assignmentTitle = $row['assignment_title'];
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Prepare failed: " . mysqli_error($connection);
    }

    // Fetch student answers for the specific assignment_id
    $query = "
    SELECT sa.id, sa.date, sa.marks, sa.assignment_id, sa.student_id, c.course_title, s.firstName, s.lastName
    FROM student_answers sa
    INNER JOIN courses c ON sa.course_id = c.id
    INNER JOIN student s ON sa.student_id = s.id
    WHERE sa.assignment_id = ? AND sa.teacher_id = ?
    ";

    $studentAnswers = [];

    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "ii", $assignmentId, $teacherId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $studentAnswers[] = $row;
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Prepare failed: " . mysqli_error($connection);
    }
} else {
    echo "Assignment ID not provided.";
    exit;
}

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Create Course - Instructor</title>
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
                                            <div class="row p-3">
                                                <div class="col-10">
                                                    <h3 class="card-title mb-1"><?= htmlspecialchars($assignmentTitle) ?> - Answers</h3>
                                                    <div class="mt-2">
                                                        <a href="assignment_answers.php" class="btn btn-secondary">
                                                            <i class="bi bi-arrow-left" style="font: size 1px;; color: white;"></i> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <main role="main" class="main-content">
                                                <div class="container-fluid">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">                                                          
                                                            <div class="row my-4 table-wrapper">                                                             
                                                                <div class="col-md-12">
                                                                    <div class="card shadow">
                                                                        <div class="card-body">
                                                                            <!-- table -->
                                                                            <table class="table datatables" id="dataTable-1">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="color: black;">#</th>
                                                                                        <th style="color: black;">Student ID</th>
                                                                                        <th style="color: black;">Student Name</th>
                                                                                        <th style="color: black;">Course Name</th>
                                                                                        <th style="color: black;">Marks</th>
                                                                                        <th style="color: black;">Date</th>
                                                                                        <th style="color: black;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php foreach ($studentAnswers as $index => $answer): ?>
                                                                                    <tr>
                                                                                        <td><?= $index + 1 ?></td>
                                                                                        <td><?= htmlspecialchars($answer['student_id']) ?></td>
                                                                                        <td><?= htmlspecialchars($answer['firstName'] . ' ' . $answer['lastName']) ?></td>
                                                                                        <td><?= htmlspecialchars($answer['course_title']) ?></td>
                                                                                        <td><?= htmlspecialchars($answer['marks']) ?></td>
                                                                                        <td><?= htmlspecialchars($answer['date']) ?></td>
                                                                                        <td>
                                                                                            <div>
                                                                                                <a href="review_answers.php?student_id=<?= htmlspecialchars($answer['student_id']) ?>&assignment_id=<?= htmlspecialchars($answer['assignment_id']) ?>">
                                                                                                    <button class="btn" style="background-color: #101E44; color: white;" title="More">Review</button>
                                                                                                </a>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php endforeach; ?>
                                                                            </tbody>
                                                                            </table>
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
    ntegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>
</html>
