<?php
session_start();
include("../Databsase/connection.php");

if (isset($_POST['signin'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM student WHERE email = ?";

    $result = $connection->prepare($sql);
    $result -> bind_param("s", $email);
    $result -> execute();
    $final = $result->get_result();

    if($final->num_rows > 0){
        $user = $final->fetch_assoc();

        // $hashedPassword = $user['Password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(password_verify($password, $hashedPassword)){
            if($user["status"] == "Active"){
                $_SESSION['email'] = $user['email'];
                $_SESSION['firstname'] = $user['firstName'];
                $_SESSION['lastname'] = $user['lastName'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['status'] = $user['status'];

                header("Location:../index.php");
            }

            else{
                header("location:../waiting.php");
            }
        }

        else{
            header("Location: ../student_signin.php?error=invalid_password"); 
        }
    }
    else{
        header("Location: ../student_signin.php?error=invalid_email");
    }
}

?>
