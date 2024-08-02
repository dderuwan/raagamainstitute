<?php 
    session_start();
    include('dbconnect.php');

    if(isset($_POST["regNext"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $address = $_POST["address"];
        $address2 = $_POST["address2"];
        $country = $_POST["country"];
        $city = $_POST["city"];
        $zipcode = $_POST["zipcode"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $educationL = $_POST["educationL"];
        $degreeP = $_POST["degreeP"];
        $Experience = $_POST["Experience"];
        $ExperienceLevel = $_POST["ExperienceLevel"];

        $postData = [
            'fname' => $firstName,
            'lname' => $lastName,
            'address' => $address,
            'address2' => $address2,
            'country' => $country,
            'city' => $city,
            'zip' => $zipcode,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'educationL' => $educationL,
            'degreep' => $degreeP,
            'experiance' => $Experience,
            'ExperienceLevel' => $ExperienceLevel,
        ];

        $ref_table = "temp_instructors";
        $postRef_result = $database->getReference($ref_table)->push($postData);
    
        if($postRef_result){
            $_SESSION['status'] = "Registered successfully";
            header('Location:../waiting.php');
        }

        else{
            $_SESSION['status'] = "Registered unsuccessfull";
            header('Location:../home.php');
        }
    }
?>