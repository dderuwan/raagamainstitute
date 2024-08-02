<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['NewsendMessage'])) {

        $topic = mysqli_real_escape_string($connection, $_POST['TopicName']);
        $message = mysqli_real_escape_string($connection, $_POST['message']);
        $startedTime = mysqli_real_escape_string($connection, $_POST['newstartedTime']);
        $studentID = $_SESSION['id']; 

        // Get student name
        $studentQuery = "SELECT firstName FROM student WHERE id = $studentID";
        $studentResult = mysqli_query($connection, $studentQuery);
        $studentRow = mysqli_fetch_array($studentResult);
        $studentName = $studentRow['firstName'];

        // Get the latest course the student has paid for
        $latestCourseQuery = "
            SELECT cou_id FROM course_options 
            WHERE id = (SELECT course_optionsID FROM payedstudent WHERE studentID = $studentID ORDER BY id DESC LIMIT 1)";

        $latestCourseResult = mysqli_query($connection, $latestCourseQuery);
        $latestCourseRow = mysqli_fetch_array($latestCourseResult);
        $courseID = $latestCourseRow['cou_id'];

        // Get instructor email
        $instructorQuery = "SELECT instructor_id, instructor_email FROM courses WHERE id = $courseID";
        $instructorResult = mysqli_query($connection, $instructorQuery);
        $instructorRow = mysqli_fetch_array($instructorResult);
        $instructorId = $instructorRow['instructor_id'];
        $instructorEmail = $instructorRow['instructor_email'];

        // Check if the topic already exists
        $topicQuery = "SELECT topic FROM student_message WHERE studentNo = $studentID AND topic = '$topic'";
        $topicResult = mysqli_query($connection, $topicQuery);

        if (mysqli_num_rows($topicResult) > 0) {
            // If topic exists, append 'repeat' with the appropriate number
            $repeatCount = mysqli_num_rows($topicResult) + 1;
            $topic .= " Repeat $repeatCount";
        }

        // Insert into student_message table
        $status = 'pending';
        $insertSQL = "
            INSERT INTO student_message (studentNo, studentName, instructuerNo, instructuerEmail, topic, message, startedTime, status)
            VALUES ('$studentID', '$studentName', $instructorId, '$instructorEmail', '$topic', '$message', '$startedTime', '$status')
        "; 

        if (mysqli_query($connection, $insertSQL)) {
            echo "<script>alert('Message Sent Successfully');</script>";
        } else {
            echo "<script>alert('Message Not Sent');</script>";
        }
        echo "<script>window.history.back()</script>"; 
}
?>
