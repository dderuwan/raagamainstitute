<?php 
session_start();
include('../Databsase/connection.php');

if (isset($_POST['replyMessage'])) {
    try {
        $InstID = $_SESSION['id']; 
        $Reply = mysqli_real_escape_string($connection, $_POST['Reply']);
        $topic = mysqli_real_escape_string($connection, $_POST['topic']);
        $sendedtime = mysqli_real_escape_string($connection, $_POST['sendedTime']);
        $adminId = mysqli_real_escape_string($connection, $_POST['adminId']);

        // Get instructor name
        $instQuery = "SELECT * FROM instructors WHERE id = $InstID";
        $instResult = mysqli_query($connection, $instQuery);
        $instRow = mysqli_fetch_array($instResult);
        $instructuerName = $instRow['FirstName'];
        $instructuerEmail = $instRow['Email'];

        // Insert into admin_reply table
        $status = 'pending'; // Default status
        $insertSQL = "
            INSERT INTO admin_reply (instructuerNo, instructuerName, instructuerEmail, adminId, topic, reply, sendedTime, status)
            VALUES ('$InstID', '$instructuerName', '$instructuerEmail', '$adminId', '$topic', '$Reply', '$sendedtime', '$status')";

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
        $adminId = mysqli_real_escape_string($connection, $_POST['adminId']);
        $InstID = $_SESSION['id'];

        // Update the status of messages to 'viewed'
        $updateSQL = "UPDATE admin_message SET status='viewed' WHERE adminId = '$adminId' AND instructuerNo = '$InstID' AND status = 'pending'";
        mysqli_query($connection, $updateSQL);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}


// Set the date to 45 days ago
$deleteBeforeDate = date('Y-m-d H:i:s', strtotime('-45 days'));

// Delete old messages from admin_message table and check the number of affected rows
$deleteStudentMessagesSQL = "DELETE FROM admin_message WHERE sendedTime < '$deleteBeforeDate'";
$studentMessagesResult = mysqli_query($connection, $deleteStudentMessagesSQL);
$studentMessagesDeleted = mysqli_affected_rows($connection);

// Delete old messages from admin_reply table and check the number of affected rows
$deleteInstructorRepliesSQL = "DELETE FROM admin_reply WHERE sendedTime < '$deleteBeforeDate'";
$instructorRepliesResult = mysqli_query($connection, $deleteInstructorRepliesSQL);
$instructorRepliesDeleted = mysqli_affected_rows($connection);




?>
