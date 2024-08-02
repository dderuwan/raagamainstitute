<?php
// Include database connection
include('./Databsase/connection.php');

// Get lesson ID from GET parameter
$lessonId = isset($_GET['lessonId']) ? $_GET['lessonId'] : null;

// Initialize variables to store fetched data
$lesson = array();

// Prepare SQL statement
$sql = "SELECT type, lesson_name, s_description, youtubeLink, lesson_link, zoom_id, meetingPassword, start_date, start_time, end_date, end_time FROM lessons WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param('i', $lessonId); // 'i' specifies the type of parameter (integer)

// Execute SQL statement
if ($stmt->execute()) {
    // Bind result variables
    $stmt->bind_result($type, $lesson_name, $s_description, $youtubeLink, $lesson_link, $zoom_id, $meetingPassword, $start_date, $start_time, $end_date, $end_time);
    
    // Fetch data
    if ($stmt->fetch()) {
        // Construct array with fetched data
        $lesson = array(
            'type' => $type,
            'lesson_name' => $lesson_name,
            's_description' => $s_description,
            'youtubeLink' => $youtubeLink,
            'lesson_link' => $lesson_link,
            'zoom_id' => $zoom_id,
            'meetingPassword' => $meetingPassword,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'end_date' => $end_date,
            'end_time' => $end_time,
        );

        // Return data as JSON
        echo json_encode($lesson);
    } else {
        // Handle case where lesson ID was not found
        echo json_encode(array('error' => 'Lesson not found'));
    }
} else {
    // Handle database connection or query error
    echo json_encode(array('error' => 'Database error: ' . $connection->error));
}

// Close statement and connection
$stmt->close();
$connection->close();
?>
