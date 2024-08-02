<?php 
session_start();
    include('../Databsase/connection.php');

    if(isset($_GET['id'])){
        $instructorId = $_GET['id'];

        $sql = "DELETE FROM Instructors WHERE id = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $instructorId);
            
            if(mysqli_stmt_execute($stmt)){
                header("Location:../Admin/blockedTeacher.php");
            }

            else{
                echo "Error: ". mysqli_error($connection);
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($connection);
?>