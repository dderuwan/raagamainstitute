<?php
require '../../Databsase/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    // SQL to delete the assignment
    $query = "DELETE FROM assignments WHERE id = ?";
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "Prepare failed: " . mysqli_error($connection);
    }
    // Redirect or inform the user of success/failure
    header("Location: assignments.php"); // Adjust the redirection URL as necessary
    exit();
}
?>
