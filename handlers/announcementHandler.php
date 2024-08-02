<?php 
session_start();
include('../Databsase/connection.php');

if (isset($_POST['annosendMessage'])) {
    try {
        $studentNo = $_SESSION['id'];
        $annotopic = mysqli_real_escape_string($connection, $_POST['annotopic']);
        $annomessage = mysqli_real_escape_string($connection, $_POST['annomessage']);
        $annostartedTime = mysqli_real_escape_string($connection,  $_POST['annostartedTime']);
        $annoinstructuerNo = mysqli_real_escape_string($connection,  $_POST['annoinstructuerNo']);


        // Get student name
        $stuQuery = "SELECT * FROM student WHERE id = $studentNo";
        $stuResult = mysqli_query($connection, $stuQuery);
        $stuRow = mysqli_fetch_array($stuResult);
        $studentName = $stuRow['firstName'];


        // Get instructor email
        $instQuery = "SELECT * FROM instructors WHERE id = $annoinstructuerNo";
        $instResult = mysqli_query($connection, $instQuery);
        $instRow = mysqli_fetch_array($instResult);
        $instructuerEmail = $instRow['Email'];
        

        // Insert into student_annomessage table
        $status = 'pending';
        $newannotopic =  'Announcement- ' . $annotopic;
        $insertSQL = "
            INSERT INTO student_message (studentNo, studentName, instructuerNo, instructuerEmail, topic, message, startedTime, status)
            VALUES ('$studentNo', '$studentName', '$annoinstructuerNo', '$instructuerEmail', '$newannotopic', '$annomessage', '$annostartedTime', '$status')";

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
