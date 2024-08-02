<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['addlanguage'])) {
    try {
        $language = mysqli_real_escape_string($connection, $_POST["languageName"]);

        $query = "INSERT INTO languages(id, name) VALUES(null, '$language')";

        $result = mysqli_query($connection, $query);


        if ($result) {
            echo "<script>alert('Language Added Successfully');</script>";
            echo "<script>window.history.back()</script>";
        } else {
            echo "<script>alert('Language Not Added');</script>";
        }
        
    } catch (Exception $e) {
        echo "<script>alert('Something Wrong.. Please try again');</script>";
        echo "<script>window.history.back()</script>";
    }
}
