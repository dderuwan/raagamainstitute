<?php 
session_start();
    include('../Databsase/connection.php');

    if(isset($_GET['id'])){
        $StudentId = $_GET['id'];

        $sql = "DELETE FROM student WHERE id = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $StudentId);
            
            if(mysqli_stmt_execute($stmt)){
                header("Location:../Admin/blockedStudent.php");
            }

            else{
                echo "Error: ". mysqli_error($connection);
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($connection);
?>