<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['addlesson'])) {
    try {
        $sectionID = isset($_POST["sectionID"]) ? mysqli_real_escape_string($connection, $_POST["sectionID"]) : '';
        $sectionName = isset($_POST["sectionName"]) ? mysqli_real_escape_string($connection, $_POST["sectionName"]) : '';
        $courseID = isset($_POST["courseID"]) ? mysqli_real_escape_string($connection, $_POST["courseID"]) : '';
        $courseName = isset($_POST["courseName"]) ? mysqli_real_escape_string($connection, $_POST["courseName"]) : '';
        $InstructorName = isset($_POST["InstructorName"]) ? mysqli_real_escape_string($connection, $_POST["InstructorName"]) : '';
        $InstructorID = isset($_POST["InstructorID"]) ? mysqli_real_escape_string($connection, $_POST["InstructorID"]) : '';
        $lesson_name = isset($_POST["lesson_name"]) ? mysqli_real_escape_string($connection, $_POST["lesson_name"]) : '';
        $type = "Text Lesson";
        $lesson_duration = isset($_POST["lesson_duration"]) ? mysqli_real_escape_string($connection, $_POST["lesson_duration"]) : '';
        $start_date = isset($_POST["start_date"]) ? mysqli_real_escape_string($connection, $_POST["start_date"]) : '';
        $end_date = isset($_POST["end_date"]) ? mysqli_real_escape_string($connection, $_POST["end_date"]) : '';
        $s_description = isset($_POST["s_description"]) ? mysqli_real_escape_string($connection, $_POST["s_description"]) : '';
        $description = isset($_POST["description"]) ? mysqli_real_escape_string($connection, $_POST["description"]) : '';

        $query = "INSERT INTO `lessons`(`sectionID`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`, 
        `lesson_name`, `type`, `lesson_duration`, `start_date`, `end_date`, `s_description`, `description`) 
        VALUES ('$sectionID','$sectionName','$courseID','$courseName','$InstructorName','$InstructorID','$lesson_name','$type',
        '$lesson_duration','$start_date','$end_date','$s_description','$description')";

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
