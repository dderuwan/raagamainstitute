<?php
session_start();
include('./Databsase/connection.php');


if (!isset($_SESSION["id"])) {
    header("location:./Student_Signin.php");
    exit;
}

$student_id = $_SESSION["id"];

// Validate input
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course_id = $_POST['course_id'] ?? null;
    $comment = $_POST['comment'] ?? '';
    $rating = $_POST['rating'] ?? '';

    
    if ($course_id === null) {
        die("Course ID not provided.");
    }

    $insert_query = "INSERT INTO `reviews` (`id`, `course_id`, `student_id`, `comment`, `rating`) VALUES (null, ?, ?, ?, ?)";
    $stmt = $connection->prepare($insert_query);
    $stmt->bind_param("iisi", $course_id, $student_id, $comment, $rating);

    if ($stmt->execute()) {
        header("Location: Single_Page_View.php?id=" . $course_id); 
        exit;
    } else {
        echo "Error inserting review: " . $stmt->error;
    }

    $stmt->close();
}

?>
