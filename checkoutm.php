<?php
session_start();
include 'conn.php';   // conn.php must NOT include header.php

// SAFETY CHECK
if (!isset($_POST['placeorder'])) {
    header("Location: checkout.php");
    exit;
}

$name    = $_POST['name'];
$email   = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$payment = $_POST['payment'];

$sessionid = $_COOKIE['sessionid'] ?? '';

// CALCULATE TOTAL
$total = 0;
$cart = mysqli_query($conn,
    "SELECT * FROM res_addtocart_master WHERE sessionid='$sessionid'"
);

while ($row = mysqli_fetch_assoc($cart)) {
    $total += $row['pamout'];
}

/* ========== CASH ON DELIVERY ========== */
if ($payment === "COD") {

    mysqli_query($conn, "INSERT INTO res_order_master
    (name,custcontact,custaddress,payment_method,total_amount,status)
    VALUES
    ('$custname','$contact','$address','COD','$total','Pending')");

    $order_id = mysqli_insert_id($conn);

    $items = mysqli_query($conn,
        "SELECT * FROM res_addtocart_master, res_product_master
         WHERE res_addtocart_master.pid = res_product_master.pid
         AND sessionid='$sessionid'"
    );

    while ($p = mysqli_fetch_assoc($items)) {
        mysqli_query($conn, "INSERT INTO order_items
        (order_id, product_id, product_name, price, quantity)
        VALUES
        ('$order_id','".$p['pid']."','".$p['pname']."','".$p['pprice1']."','".$p['pquantity']."')");
    }

    mysqli_query($conn,
        "DELETE FROM res_addtocart_master WHERE sessionid='$sessionid'"
    );

    header("Location: order-success.php");
    exit;
}

/* ========== UPI / RAZORPAY ========== */

header("Location: order-success2.php");
exit;
