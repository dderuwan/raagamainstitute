<?php 
session_start();
include('../Databsase/connection.php');

if (isset($_POST['studentreplyMessage'])) {
    try {
        $student_id = $_SESSION['id'];
        $message = mysqli_real_escape_string($connection, $_POST['message']);
        $topic = mysqli_real_escape_string($connection, $_POST['topic']);
        $startedTime = mysqli_real_escape_string($connection,  $_POST['startedTime']);
        $instructuerNo = mysqli_real_escape_string($connection,  $_POST['instructuerNo']);


        // Get student name
        $stuQuery = "SELECT * FROM student WHERE id = $student_id";
        $stuResult = mysqli_query($connection, $stuQuery);
        $stuRow = mysqli_fetch_array($stuResult);
        $studentName = $stuRow['firstName'];


        // Get instructor email
        $instQuery = "SELECT * FROM instructors WHERE id = $instructuerNo";
        $instResult = mysqli_query($connection, $instQuery);
        $instRow = mysqli_fetch_array($instResult);
        $instructuerEmail = $instRow['Email'];
        

        // Insert into student_message table
        $status = 'pending';
        $insertSQL = "
            INSERT INTO student_message (studentNo, studentName, instructuerNo, instructuerEmail, topic, message, startedTime, status)
            VALUES ('$student_id', '$studentName', '$instructuerNo', '$instructuerEmail', '$topic', '$message', '$startedTime', '$status')";

        if (mysqli_query($connection, $insertSQL)) {
            echo "<script>alert('Reply Sent Successfully');</script>";
        } else {
            echo "<script>alert('Reply Message Not Sent');</script>";
        }
        echo "<script>window.history.back()</script>";

    } catch (Exception $e) {
        echo "<script>alert('Something went wrong. Please recheck your Reply');</script>";
        echo "<script>window.history.back()</script>";
    }
}

// Set the date to 45 days ago
$deleteBeforeDate = date('Y-m-d H:i:s', strtotime('-45 days'));

// Delete old messages from student_message table and check the number of affected rows
$deleteStudentMessagesSQL = "DELETE FROM student_message WHERE startedTime < '$deleteBeforeDate'";
$studentMessagesResult = mysqli_query($connection, $deleteStudentMessagesSQL);
$studentMessagesDeleted = mysqli_affected_rows($connection);

// Delete old messages from instructor_reply table and check the number of affected rows
$deleteInstructorRepliesSQL = "DELETE FROM instructor_reply WHERE sendedTime < '$deleteBeforeDate'";
$instructorRepliesResult = mysqli_query($connection, $deleteInstructorRepliesSQL);
$instructorRepliesDeleted = mysqli_affected_rows($connection);


// Update the status to viewed when a new message is received
if (isset($_POST['studentupdateStatus'])) {
    try {
        $student_id = $_SESSION['id'];

        // Update the status of messages to 'viewed'
        $updateSQL = "UPDATE instructor_reply SET status='viewed' WHERE studentNo = '$student_id' AND status = 'pending'";
        mysqli_query($connection, $updateSQL);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
