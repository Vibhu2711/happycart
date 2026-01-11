<?php 
 include 'conn.php';
session_start();
unset($_SESSION['custname']);
unset($_SESSION['custphone']);
unset($_SESSION['custemail']);
unset($_SESSION['custaddress']);

session_unset();

header("location:index.php");
?>
