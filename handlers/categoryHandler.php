<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['addCategory'])) {
    try {
        $category = mysqli_real_escape_string($connection, $_POST["categoryName"]);

        $query = "INSERT INTO category(id, name) VALUES(null, '$category')";

        $result = mysqli_query($connection, $query);


        if ($result) {
            echo "<script>alert('Category Added Successfully');</script>";
            echo "<script>window.history.back()</script>";
        } else {
            echo "<script>alert('Category Not Added');</script>";
        }
        
    } catch (Exception $e) {
        echo "<script>alert('Something Wrong.. Please recheck your category');</script>";
        echo "<script>window.history.back()</script>";
    }
}
