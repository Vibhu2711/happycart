<?php
     $conn = mysqli_connect('localhost','root','','happy_cart');

     if ($conn->connect_error) 
     {
         die("Connection failed: " . $conn->connect_error);
     }
    include 'conn.php';
?>