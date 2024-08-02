<?php
session_start();

unset($_SESSION['idAdmin']);

if (!isset($_SESSION['idAdmin'])) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: Could not log out.";
}
?>
