<?php
session_start();

require '../../Databsase/connection.php'; // Ensure the path is correctly specified
$teacherId = $_SESSION["id"];

// Fetch assignments from the database using the correct column names
$query = "SELECT id, course_id, assignment_title, assignment_name, assignment_marks, file_name FROM assignments WHERE teacher_id = ?";

$assignments = [];

if ($stmt = mysqli_prepare($connection, $query)) {
    mysqli_stmt_bind_param($stmt, "i", $teacherId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $assignments[] = $row;
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Prepare failed: " . mysqli_error($connection);
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
                margin-left:-10px  !important;
                margin-right:-10px  !important;
                padding: 0px !important;
            }

            .table th,
            .table td {
                white-space: nowrap; 
            }
        }
        @media (max-width: 700px) {
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
                                            <div class="row">
                                                <div class="col-10">
                                                    <h3 class="card-title mb-1">Assignments</h3>
                                                </div>
                                                <div class="col-2">
                                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">+ Add Assignment</button> -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">+ Add Assignment</button>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Assignment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="assignmentForm" enctype="multipart/form-data">
                                                                <input type="hidden" id="assignmentId" name="id" value="">
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
                                                                    <label for="assignmentTitle">Assignment Title</label>
                                                                    <input type="text" class="form-control" id="assignmentTitle" name="assignment_title" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="assignmentMarks">Marks:</label>
                                                                    <input type="number" class="form-control" id="assignmentMarks" name="assignment_marks" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Current File:</label>
                                                                    <span id="fileName"></span> <!-- This will display the file name -->
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
                                                    <th>#</th>
                                                    <th>Course ID</th>
                                                    <th>Assignment Name</th>
                                                    <th>Assignment Title</th>
                                                    <th>Marks</th>
                                                    <th>File</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($assignments as $assignment): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($assignment['id']) ?></td>
                                                    <td><?= htmlspecialchars($assignment['course_id']) ?></td>
                                                    <td><?= htmlspecialchars($assignment['assignment_name']) ?></td>
                                                    <td><?= htmlspecialchars($assignment['assignment_title']) ?></td>
                                                    <td><?= htmlspecialchars($assignment['assignment_marks']) ?></td>
                                                    <td>
                                                        <?php if (!empty($assignment['file_name'])): ?>
                                                            <a href="./uploads/<?= htmlspecialchars($assignment['file_name']) ?>" target="_blank"><?= htmlspecialchars($assignment['file_name']) ?></a>
                                                        <?php else: ?>
                                                            No file uploaded
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php
                                                        echo "<button onclick=\"editAssignment('{$assignment['id']}', '{$assignment['course_id']}', '{$assignment['assignment_name']}', '{$assignment['assignment_title']}', '{$assignment['assignment_marks']}', '{$assignment['file_name']}')\" class=\"btn btn-primary\">Edit</button>";
                                                        ?>
                                                        <button class="btn btn-danger" onclick="confirmDeletion(<?= $assignment['id'] ?>)">Delete</button>
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
            </div>
             <footer class="footer">
                <?php require "teacherfooter.php"; ?>
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
    <script>
        function confirmDeletion(id) {
            if(confirm("Are you sure you want to delete this assignment?")) {
                window.location.href = 'delete_assignment.php?id=' + id;
            }
        }
    </script>
    <script>
    function editAssignment(id, courseId, assignmentName, assignmentTitle, assignmentMarks, fileName) {
        $('#assignmentId').val(id);
        $('#courseSelect').val(courseId);
        $('#assignmentName').val(assignmentName);
        $('#assignmentTitle').val(assignmentTitle);
        $('#assignmentMarks').val(assignmentMarks);
        // Display the current file name
        $('#fileName').text(fileName); // You might need a span or div to show this
        $('#exampleModalCenter').modal('show');
    }

    </script>
    <script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                type: 'POST',
                url: './upload_assignment.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Assuming response is a plain message
                    alert(response); // Or use another modal to show the response
                    $('#exampleModalCenter').modal('hide'); // Hide the form modal
                    setTimeout(function() {
                        window.location.href = 'assignments.php'; // Redirect after 3 seconds
                    }, 0);
                },
                error: function() {
                    alert('There was an error uploading the assignment.');
                }
            });
        });
    });
    </script>


 </body>

</html>
