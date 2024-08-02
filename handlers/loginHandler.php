<?php
session_start();
include("../Databsase/connection.php");

if (isset($_POST['signin'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM Instructors WHERE Email = ?";

    $result = $connection->prepare($sql);
    $result -> bind_param("s", $email);
    $result -> execute();
    $final = $result->get_result();

    if($final->num_rows > 0){
        $user = $final->fetch_assoc();

        // $hashedPassword = $user['Password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(password_verify($password, $hashedPassword)){
            if($user["Status"] == "Approved"){
                $_SESSION['email'] = $user['Email'];
                $_SESSION['firstname'] = $user['FirstName'];
                $_SESSION['lastname'] = $user['LastName'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['status'] = $user['Status'];

                header("Location:../teacher_dashboard/template/index.php");
            }

            else{
                header("location:../waiting.php");
            }
        }

        else{
            header("Location: ../Teacher_Signin.php?error=invalid_password");
        }
    }
    else{
        header("Location: ../Teacher_Signin.php?error=invalid_email");
    }
}

// if (isset($_POST['signin'])) {
//     $email = mysqli_real_escape_string($connection, $_POST['email']);
//     $password = mysqli_real_escape_string($connection, $_POST['password']);

//     $select_users = mysqli_query($connection, "SELECT * FROM Instructors WHERE Email = '$email'") or die('query failed');

//     if (mysqli_num_rows($select_users) > 0) {
//         $row = mysqli_fetch_assoc($select_users);

//         //password verify to check if the provided password matches the hashed password
//         if (password_verify($password, $row['Password'])) {
//             $_SESSION['signin'] = true;
//             $_SESSION['user_name'] = $row['Email'];
//             $_SESSION['user_email'] = $row['id'];
//             header('location:../teacher_dashboard/template/announcement.php');
//         } else {
//             $message[] = 'Incorrect email or password!';
//         }
//     } else {
//         $message[] = 'User not found!';
//     }
// }

?>
