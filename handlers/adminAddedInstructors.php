<?php
session_start();
include("../Databsase/connection.php");

if (isset($_POST["regNext"])) {
    $firstName = mysqli_real_escape_string($connection, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($connection, $_POST["lastName"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $address2 = mysqli_real_escape_string($connection, $_POST["address2"]);
    $country = mysqli_real_escape_string($connection, $_POST["country"]);
    $city = mysqli_real_escape_string($connection, $_POST["city"]);
    $zipcode = mysqli_real_escape_string($connection, $_POST["zipcode"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $educationL = mysqli_real_escape_string($connection, $_POST["educationL"]);
    $degreeP = mysqli_real_escape_string($connection, $_POST["degreeP"]);
    $Experience = mysqli_real_escape_string($connection, $_POST["Experience"]);
    $ExperienceLevel = mysqli_real_escape_string($connection, $_POST["ExperienceLevel"]);


    $target_dir = "../uploads/";
    $target_file = $target_dir.basename($_FILES['imageFile']["name"]);

    if (move_uploaded_file($_FILES['imageFile']["tmp_name"], $target_file)) {
        $image = $target_file;
    } 
    
    else {
        die("Sorry, there was an error uploading your file.");
    }

    $pdf_dir = "../resume/";
    $pdf_file = $pdf_dir.basename($_FILES['resumeFile']["name"]);

    if (move_uploaded_file($_FILES['resumeFile']["tmp_name"], $pdf_file)) {
        $resume = $pdf_file;
    } 
    
    else {
        die("Sorry, there was an error uploading your file.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // $image = "./uploads".basename($_FILES[$_POST["imageFile"]]["name"]);
    // move_uploaded_file($_FILES[$_POST["imageFile"]]["tmp_name"],$image);

    // $sql = "INSERT INTO `Instructors` (`id` ,`FirstName`, `LastName`, `Address`, `Address2`, `Country`, 
    //     `City`, `ZipCode`, `Phone`, `imagePath`, `Email`, `Password`, `EducationL`, `DegreeP`, `Experience`, `ExperienceLevel`) 
    //     VALUES (null, '$firstName', '$lastName', '$address', '$address2', '$country', '$city', '$zipcode', '$phone', '$image', '$email', 
    //     '$password', '$educationL', '$degreeP', '$Experience', '$ExperienceLevel')";

    // $result = mysqli_query($connection, $sql);

    // if ($result) {
    //     echo "New record created successfully";
    //     header("Location: ../waiting.php");
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    $sql = "INSERT INTO Instructors (id, Status, FirstName, LastName, Address, Address2, Country, City, ZipCode, Phone, imagePath, Email, Password, EducationL, DegreeP, Experience, ExperienceLevel, pdfPath) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $status = "Approved";
    
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssssss" , $status, $firstName, $lastName, $address, $address2, $country, $city, $zipcode, $phone, $image, $email, $hashed_password, $educationL, $degreeP, $Experience, $ExperienceLevel, $resume);

        if (mysqli_stmt_execute($stmt)) {
            echo "New record created successfully";
            header("Location: ../Admin/allTeacher.php"); 
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
    mysqli_close($connection);
}

else {
    echo "Invalid access method.";
}