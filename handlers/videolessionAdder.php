<?php
include('../Databsase/connection.php');

if (isset($_POST['addlesson'])) {
    try {
        $sectionID = mysqli_real_escape_string($connection, $_POST["sectionID"]);
        $sectionName = mysqli_real_escape_string($connection, $_POST["sectionName"]);
        $courseID = mysqli_real_escape_string($connection, $_POST["courseID"]);
        $courseName = mysqli_real_escape_string($connection, $_POST["courseName"]);
        $InstructorName = mysqli_real_escape_string($connection, $_POST["InstructorName"]);
        $InstructorID = mysqli_real_escape_string($connection, $_POST["InstructorID"]);
        $lesson_name = mysqli_real_escape_string($connection, $_POST["lesson_name"]);
        $type = "Video Lesson";
        $lesson_duration = mysqli_real_escape_string($connection, $_POST["lesson_duration"]);
        $start_date = mysqli_real_escape_string($connection, $_POST["start_date"]);
        $end_date = mysqli_real_escape_string($connection, $_POST["end_date"]);
        $s_description = mysqli_real_escape_string($connection, $_POST["s_description"]);
        $description = mysqli_real_escape_string($connection, $_POST["description"]);

        $sourse = mysqli_real_escape_string($connection, $_POST["sourse"]);
        $youtubeLink = mysqli_real_escape_string($connection, $_POST["youtubeLink"]);
        $externalLink = mysqli_real_escape_string($connection, $_POST["externalLink"]);

        if ($sourse == "html") {
            $target_dir = "../uploads/video/";
            $target_file = $target_dir . basename($_FILES['video']["name"]);

            if (move_uploaded_file($_FILES['video']["tmp_name"], $target_file)) {
                $video = $target_file;
            } else {
                die("Sorry, there was an error uploading your file.");
            }

            $cover_dir = "../uploads/cover/";
            $cover_file = $cover_dir . basename($_FILES['cover']["name"]);

            if (move_uploaded_file($_FILES['cover']["tmp_name"], $cover_file)) {
                $cover = $cover_file;
            } else {
                die("Sorry, there was an error uploading your file.");
            }
        }

        $query = "INSERT INTO `lessons`(`sectionID`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`, 
        `lesson_name`, `type`, `sourse`, `youtubeLink`, `externalLink`, `video`,`cover`, `lesson_duration`, `start_date`, `end_date`, `s_description`, `description`) 
        VALUES ('$sectionID','$sectionName','$courseID','$courseName','$InstructorName','$InstructorID','$lesson_name','$type', 
        '$sourse', '$youtubeLink', '$externalLink', '$video', '$cover', '$lesson_duration','$start_date','$end_date','$s_description','$description')";

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
} else {
    echo "<script>alert('Something Wrong.. Please recheck your Lesson');</script>";
    echo "<script>window.history.back()</script>";
}
