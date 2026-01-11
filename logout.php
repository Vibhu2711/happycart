<?php 
session_start();
unset($_SESSION['custname']);
unset($_SESSION['custphone']);
unset($_SESSION['custemail']);
unset($_SESSION['custaddress']);

header("location:index.php");
?>
