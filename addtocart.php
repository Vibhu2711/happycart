<?php
session_start();

$cookie_name = "sessionid";
$cookie_value = rand(1000,100000);

//check user log in or not?

if (!isset($_SESSION['custname'])) {
    header('Location: signin.php');
    exit(); // THIS IS REQUIRED
}
//check cookie value found or not? y=go ahead and n= go home page

if(!isset($_COOKIE[$cookie_name])) 
{
    //echo "Cookie named '" . $cookie_name . "' is not set!";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
else 
{
    $cookie_value =  $_COOKIE[$cookie_name];
}
include 'conn.php';

$p1 = $_GET['pid'];
$p2 = $_GET['pqty'];
$p3 = $_GET['price1'];

$sql2 = "SELECT * FROM res_addtocart_master WHERE pid='$p1' AND sessionid='$cookie_value'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $p = $row['pquantity'] + 1;
    $v = $p * $p3;

    $sql4 = "UPDATE res_addtocart_master 
             SET pquantity='$p', pamout='$v' 
             WHERE pid='$p1' AND sessionid='$cookie_value'";
    $conn->query($sql4);
} else {
    $v = $p2 * $p3;
    $sql = "INSERT INTO res_addtocart_master
            (sessionid, pid, pquantity, pprice1, pamout)
            VALUES ('$cookie_value','$p1','$p2','$p3','$v')";
    $conn->query($sql);
}
header("location:cart.php");
$conn->close();
?>