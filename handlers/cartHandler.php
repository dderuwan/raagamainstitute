<?php
session_start();
include('../Databsase/connection.php');

if (!isset($_SESSION['id'])) {
    header("location:../Student_Signin.php");
}
$studentID = $_SESSION['id'];

if (isset($_POST['cartSub'])) {
    
    $courseID = mysqli_real_escape_string($connection, $_POST['id']);

    $Check = "SELECT * FROM cart WHERE student_id = $studentID AND course_id = $courseID";
    $result = mysqli_query($connection, $Check);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Course already added")</script>';
        echo '<script>window.history.back();</script>';
    } else {

        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $imagePath = mysqli_real_escape_string($connection, $_POST['imagePath']);
        $s_description = mysqli_real_escape_string($connection, $_POST['s_description']);
        $package_type = mysqli_real_escape_string($connection, $_POST['package_type']);

        $sql = "INSERT INTO `cart`(`id`, `student_id`, `course_id`, `package_type`, `title`, `price`, `imagePath`, `s_description`) VALUES (null , ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($stmt, "iisssss", $studentID, $courseID, $package_type, $title, $price, $imagePath, $s_description);

            if (mysqli_stmt_execute($stmt)) {
                echo "Course Added Successfully";
                header("Location: ../cart.php");
            } else {
                echo "Error: " . mysqli_error($connection);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($connection);
        }
    }
    mysqli_close($connection);
}
