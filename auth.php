<?php
session_start();
$_self = $_SERVER["PHP_SELF"];
if(stripos($_self, 'index.php')){
    if(!isset($_SESSION['id']) || (isset($_SESSION['id']) && $_SESSION['id'] <= 0)){
        header('location:signin.php');
    }
} elseif(stripos($_self, 'login.php') || stripos($_self, 'reset-password.php') || stripos($_self, 'forgot.php')){
    if(isset($_SESSION['id']) && $_SESSION['id'] > 0){
        header('location: index.php');
    }
}
?>