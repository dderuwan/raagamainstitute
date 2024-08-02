
<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['remove'])) {
    $cartId = mysqli_real_escape_string($connection, $_POST['id']);

    $sql = "DELETE FROM cart WHERE id = ?";

    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $cartId);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>window.history.back()</script>";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($connection);
?>