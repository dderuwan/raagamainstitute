<?php
session_start();
include('../../Databsase/connection.php'); 

if (!isset($_SESSION["id"])) {
      die("Your session has expired, please login again.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['company'], $_POST['job_title'], $_POST['years'])) {
    $instructor_id = $_SESSION['id'];
    $companies = $_POST['company'];
    $job_titles = $_POST['job_title'];
    $years = $_POST['years'];

    $output = '';
    $all_fields_filled = true;

    for ($i = 0; $i < count($companies); $i++) {
         if (empty($companies[$i]) || empty($job_titles[$i]) || empty($years[$i])) {
            $all_fields_filled = false;
            break;
        }
    }

    if ($all_fields_filled) {
        for ($i = 0; $i < count($companies); $i++) {
            $sql = "INSERT INTO work_experience (instructor_id, company, job_title, years) VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            if (!$stmt) {
                echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                exit;
            }
            $stmt->bind_param("issi", $instructor_id, $companies[$i], $job_titles[$i], $years[$i]);

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            } else {
                $output .= "<tr><td>" . htmlspecialchars($companies[$i]) . "</td><td>" . htmlspecialchars($job_titles[$i]) . "</td><td>" . htmlspecialchars($years[$i]) . "</td></tr>";
            }
        }
        $stmt->close();
        $connection->close();
        echo $output;   
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "No data received or incomplete data.";
}
?>
