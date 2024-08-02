<?php 
session_start();
    include('../Databsase/connection.php');

    if(isset($_GET['id'])){
        $courseId = $_GET['id'];

        $sql = "UPDATE courses SET status = 'Deactivate' WHERE id = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $courseId);
            
            if(mysqli_stmt_execute($stmt)){
                header("Location:../teacher_dashboard/template/viewdetails.php");
            }

            else{
                echo "Error: ". mysqli_error($connection);
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($connection);
?>