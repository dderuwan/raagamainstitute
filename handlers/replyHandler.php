<?php 
session_start();
include('../Databsase/connection.php');

if (isset($_POST['replyMessage'])) {
    try {
        $InstID = $_SESSION['id']; 
        $Reply = mysqli_real_escape_string($connection, $_POST['Reply']);
        $topic = mysqli_real_escape_string($connection,  $_POST['topic']);
        $sendedtime = mysqli_real_escape_string($connection, $_POST['sendedTime']);
        $studentNo = mysqli_real_escape_string($connection, $_POST['studentNo']);

        // Get instructor name
        $instQuery = "SELECT * FROM instructors WHERE id = $InstID";
        $instResult = mysqli_query($connection, $instQuery);
        $instRow = mysqli_fetch_array($instResult);
        $instructuerName = $instRow['FirstName'];
        $instructuerEmail = $instRow['Email'];

        // Insert into student_message table
        $status = 'pending'; // Default status
        $insertSQL = "
            INSERT INTO instructor_reply (instructuerNo, instructuerName, instructuerEmail, studentNo, topic, reply, sendedTime, status)
            VALUES ('$InstID', '$instructuerName', '$instructuerEmail', '$studentNo', '$topic', '$Reply', '$sendedtime', '$status')";

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


// Update the status to viewed when a new message is received
if (isset($_POST['updateStatus'])) {
    try {
        $studentNo = $_POST['studentNo'];

        // Update the status of messages to 'viewed'
        $updateSQL = "UPDATE student_message SET status='viewed' WHERE studentNo = '$studentNo' AND status = 'pending'";
        mysqli_query($connection, $updateSQL);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
