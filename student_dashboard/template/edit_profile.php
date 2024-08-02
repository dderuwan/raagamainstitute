<?php
session_start();
include('../../Databsase/connection.php');

if (!isset($_SESSION["id"])) {
    header("location:../../Student_Signin.php");
    exit;
}

$student_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = intval($_POST['student_id']);
    $first_name = ($_POST['fname']);
    $last_name = ($_POST['lname']);
    $email = ($_POST['email']);
    $phone = ($_POST['Pphone']);
    $address = ($_POST['address']);
    $country = ($_POST['country']);
    $city = ($_POST['city']);
    $zip = ($_POST['zipcode']);
    $education = ($_POST['education']);

    // Handle the profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $imgData = file_get_contents($_FILES['profile_image']['tmp_name']);
        $imgData = base64_encode($imgData);

        $query = "UPDATE student 
                  SET firstName = ?, lastName = ?, email = ?, Pphone = ?, address = ?, country = ?, city = ?, zipcode = ?, education = ?, profile_image = ? 
                  WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssssssssssi", $first_name, $last_name, $email, $phone, $address, $country, $city, $zip, $education, $imgData, $student_id);
    } else {
        $query = "UPDATE student 
                  SET firstName = ?, lastName = ?, email = ?, Pphone = ?, address = ?, country = ?, city = ?, zipcode = ?, education = ? 
                  WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssssssssi", $first_name, $last_name, $email, $phone, $address, $country, $city, $zip, $education, $student_id);
    }

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: profile.php?id=$student_id");
        exit;
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

?>
