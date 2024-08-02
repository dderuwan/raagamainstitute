<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['addlesson'])) {
    try {
        $sectionID = mysqli_real_escape_string($connection, $_POST["sectionID"]);
        $sectionName =  mysqli_real_escape_string($connection, $_POST["sectionName"]);
        $courseID =  mysqli_real_escape_string($connection, $_POST["courseID"]);
        $courseName = mysqli_real_escape_string($connection, $_POST["courseName"]);
        $InstructorName = mysqli_real_escape_string($connection, $_POST["InstructorName"]);
        $InstructorID = mysqli_real_escape_string($connection, $_POST["InstructorID"]);
        $lesson_name = mysqli_real_escape_string($connection, $_POST["lesson_name"]);
        $type = "Zoom Lesson";
        $lesson_link = mysqli_real_escape_string($connection, $_POST["lesson_link"]);
        $zoom_id = mysqli_real_escape_string($connection, $_POST["zoom_id"]);
        $meetingPassword = mysqli_real_escape_string($connection, $_POST["meetingPassword"]);
        $lesson_duration = mysqli_real_escape_string($connection, $_POST["lesson_duration"]);
        $timeLine = mysqli_real_escape_string($connection, $_POST["timeLine"]);
        $start_date = mysqli_real_escape_string($connection, $_POST["start_date"]);
        $start_time = mysqli_real_escape_string($connection, $_POST["start_time"]);
        $end_date = mysqli_real_escape_string($connection, $_POST["end_date"]);
        $end_time = mysqli_real_escape_string($connection, $_POST["end_time"]);
        $s_description = mysqli_real_escape_string($connection, $_POST["s_description"]);

        $query = "INSERT INTO `lessons`(`sectionID`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`,
        `lesson_name`, `type`, `lesson_link`, `zoom_id`, `meetingPassword`,  `lesson_duration`, `timeLine`, `start_date`, `start_time`, `end_date`, `end_time`, `s_description`)
        VALUES ('$sectionID','$sectionName','$courseID','$courseName','$InstructorName','$InstructorID','$lesson_name','$type', '$lesson_link',
        '$zoom_id', '$meetingPassword', '$lesson_duration', '$timeLine', '$start_date', '$start_time', '$end_date', '$end_time', '$s_description')";

        $result = mysqli_query($connection, $query);


        if ($result) {
            echo "<script>alert('Lesson Created Successfully');</script>";
            echo "<script>window.history.back()</script>";
        } else {
            echo "<script>alert('Lesson Not Added');</script>";
        }
        
    } catch (Exception $e) {
        echo "<script>alert('Something Wrong.. Please recheck your Lesson');</script>";
        echo "<script>window.history.back()</script>";
    }
}
