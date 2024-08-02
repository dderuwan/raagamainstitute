<?php
session_start();


include('../Databsase/connection.php');

if (isset($_POST['adminsendMessage'])) {

    $topic = mysqli_real_escape_string($connection, $_POST['TopicName']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    $adminstartedTime = mysqli_real_escape_string($connection, $_POST['adminsendedTime']);
    $instemail = mysqli_real_escape_string($connection, $_POST['email']);
    $adminID = $_SESSION['idAdmin'];

    // Get admin name
    $adminQuery = "SELECT name FROM admin WHERE id = '$adminID'";
    $adminResult = mysqli_query($connection, $adminQuery);
    $adminRow = mysqli_fetch_array($adminResult);
    $adminName = $adminRow['name'];
   

    // Get instructor ID
    $instQuery = "SELECT id FROM instructors WHERE Email = '$instemail'";
    $instResult = mysqli_query($connection, $instQuery);
    $instRow = mysqli_fetch_array($instResult);
    $instId = $instRow['id'];
  

    // Check if the topic already exists
    $topicQuery = "SELECT topic FROM admin_message WHERE adminId = '$adminID' AND topic LIKE '$topic%'";
    $topicResult = mysqli_query($connection, $topicQuery);

    if (mysqli_num_rows($topicResult) > 0) {
        // If topic exists, append 'repeat' with the appropriate number
        $repeatCount = mysqli_num_rows($topicResult) + 1;
        $topic .= " Repeat $repeatCount";
    }

    // Insert into admin_message table
    $status = 'pending';
    $insertSQL = "
        INSERT INTO admin_message (adminId, adminName, instructuerNo, instructuerEmail, topic, message, sendedTime, status)
        VALUES ('$adminID', '$adminName', '$instId', '$instemail', '$topic', '$message', '$adminstartedTime', '$status')
    ";

    if (mysqli_query($connection, $insertSQL)) {
        echo "<script>alert('Message Sent Successfully');</script>";
    } else {
        echo "<script>alert('Message Not Sent');</script>";
    }
    echo "<script>window.history.back()</script>";
}
?>
