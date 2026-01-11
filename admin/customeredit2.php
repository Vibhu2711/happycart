<?php

$id=$_POST['id'];
$p1=$_POST['name'];
$p2=$_POST['email'];
$p3 =$_POST['addr'];
$p4 =date('Y-m-d', strtotime($_POST['date']));

// Create connection
include 'conn.php';

$sql = "UPDATE res_customer_master SET custname='$p1', custaddress='$p3',custemail='$p2', custbd='$p4' WHERE custid = $id";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE)
{
    header("location:customer.php");
}
else 
{
    echo "Error updating record: " . $conn->error;
}
  
$conn->close();
?>