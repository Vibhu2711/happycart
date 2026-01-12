<?php
session_start();

/* LOGIN CHECK */
if (!isset($_SESSION['custname'])) {
    $_SESSION['redirect_after_login'] = $_SERVER['HTTP_REFERER'];
    header("Location: signin.php");
    exit;
}

/* DB */
include 'conn.php';

/* CART SESSION COOKIE */
if (!isset($_COOKIE['sessionid'])) {
    $sid = rand(1000, 100000);
    setcookie("sessionid", $sid, time() + 86400 * 30, "/");
} else {
    $sid = $_COOKIE['sessionid'];
}

/* FORM DATA (POST) */
$pid    = $_POST['pid'];
$pqty   = $_POST['pqty'];
$price  = $_POST['price1'];

/* CHECK CART */
$sql = "SELECT * FROM res_addtocart_master 
        WHERE pid='$pid' AND sessionid='$sid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newqty = $row['pquantity'] + 1;
    $amount = $newqty * $price;

    $conn->query(
        "UPDATE res_addtocart_master 
         SET pquantity='$newqty', pamout='$amount'
         WHERE pid='$pid' AND sessionid='$sid'"
    );
} else {
    $amount = $pqty * $price;
    $conn->query(
        "INSERT INTO res_addtocart_master
        (sessionid, pid, pquantity, pprice1, pamout)
        VALUES ('$sid','$pid','$pqty','$price','$amount')"
    );
}

/* REDIRECT */
header("Location: cart.php");
exit;
