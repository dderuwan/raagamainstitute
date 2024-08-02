<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['addSection'])) {
    try {
        $sectionName = mysqli_real_escape_string($connection, $_POST["sectionName"]);
        $courseID = mysqli_real_escape_string($connection, $_POST["courseID"]);
        $courseName = mysqli_real_escape_string($connection, $_POST["courseName"]);
        $InstructorName = mysqli_real_escape_string($connection, $_POST["InstructorName"]);
        $InstructorID = mysqli_real_escape_string($connection, $_POST["InstructorID"]);
        $date = (new DateTime())->format('Y-m-d H:i:s');

        $query = "INSERT INTO sections(sectionName, courseID, courseName, InstructorName, InstructorID, date) VALUES ('$sectionName', '$courseID', '$courseName', '$InstructorName', '$InstructorID', '$date')";

        $result = mysqli_query($connection, $query);


        if ($result) {
            echo "<script>alert('Section Added Successfully');</script>";
            echo "<script>window.history.back()</script>";
        } else {
            echo "<script>alert('Category Not Added');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.history.back()</script>";
    }
} else {
    echo "<script>alert('Something went wrong');</script>";
    echo "<script>window.history.back()</script>";
}
