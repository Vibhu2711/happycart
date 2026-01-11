<?php
    $conn = mysqli_connect('sql202.infinityfree.com','if0_38305366','YWhfAEF6Po','if0_38305366_db1');

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //include 'conn.php';  
?>