<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['bankdetails'])) {

        $instructorId = $_SESSION['id'];
        $hname = mysqli_real_escape_string($connection, $_POST['hname']);
        $bname = mysqli_real_escape_string($connection, $_POST['bname']);
        $branch = mysqli_real_escape_string($connection, $_POST['branch']);
        $anumber = mysqli_real_escape_string($connection, $_POST['anumber']);

        // Insert into bank_details table
        $insertSQL = "
            INSERT INTO bank_details (instructorId, hname, bname, branch, anumber)
            VALUES ('$instructorId', '$hname', '$bname', '$branch', '$anumber')
        "; 

        if (mysqli_query($connection, $insertSQL)) {
            $_SESSION['message'] = "Bank details added successfully.";
        } else {
            $_SESSION['message'] = "Error adding bank details.";
        }
           
        echo "<script>window.history.back()</script>";
    }

    if (isset($_POST['editbankdetails'])) {
        $instructorId = $_SESSION['id'];
        $hname = mysqli_real_escape_string($connection, $_POST['hname']);
        $bname = mysqli_real_escape_string($connection, $_POST['bname']);
        $branch = mysqli_real_escape_string($connection, $_POST['branch']);
        $anumber = mysqli_real_escape_string($connection, $_POST['anumber']);
    
        // Update the bank_details table
        $updateSQL = "
            UPDATE bank_details 
            SET hname = '$hname', bname = '$bname', branch = '$branch', anumber = '$anumber'
            WHERE instructorId = '$instructorId'
        "; 
    
        if (mysqli_query($connection, $updateSQL)) {
            $_SESSION['message'] = "Bank details updated successfully.";
        } else {
            $_SESSION['message'] = "Error updating bank details.";
        }
    
        echo "<script>window.history.back()</script>";
    }
    ?> 