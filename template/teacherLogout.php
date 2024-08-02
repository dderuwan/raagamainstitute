<?php
session_start();
$_SESSION = array();
session_destroy();
header("location:../../Teacher_Signin.php");
exit;
?>
