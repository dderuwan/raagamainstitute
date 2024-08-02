<?php
session_start();
include ('../Databsase/connection.php');

if (isset ($_GET["v"])) {

    $vc = $_GET["v"];

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM `Instructors` WHERE `verification`=?");
    $stmt->bind_param("s", $vc);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo "Success";
    } else {
        echo "You must enter a valid verification code to log in.";
    }

    $stmt->close();
} else {
    echo "Please provide a verification code.";
}

?>