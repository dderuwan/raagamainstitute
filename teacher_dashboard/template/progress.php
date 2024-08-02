<?php
session_start();
include('../../Databsase/connection.php'); // Adjust the path as necessary

if (!isset($_SESSION["id"])) {
    header("location: ../../Teacher_Signin.php"); // Redirect to login if the session is not active
    exit;
}

// Assuming 'courses' table has columns 'course_id', 'course_name', 'progress'
$query = "SELECT course_name, progress FROM courses WHERE instructor_id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Progress Overview</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- For charts if necessary -->
</head>
<body>
    <div class="container-scroller">
        <?php include 'sidenav.php'; ?>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Progress</h4>
                                <canvas id="progressChart"></canvas> <!-- Placeholder for a progress chart -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detailed Progress</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . htmlspecialchars($row['course_name']) . "</td><td>" . htmlspecialchars($row['progress']) . "%</td></tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='2'>No courses found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php include 'teacherfooter.php'; ?>
        </div>
    </div>

    <script>
    var ctx = document.getElementById('progressChart').getContext('2d');
    var progressChart = new Chart(ctx, {
        type: 'bar', // Can be changed to line, pie, etc.
        data: {
            labels: [<?php while ($row = $result->fetch_assoc()) { echo '"' . $row['course_name'] . '",'; } ?>],
            datasets: [{
                label: 'Progress',
                data: [<?php while ($row = $result->fetch_assoc()) { echo $row['progress'] . ','; } ?>],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

</body>
</html>
