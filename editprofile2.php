<?php 
session_start();
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_SESSION['custphone'];
$addr= $_POST['address'];

include 'conn.php';
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE res_customer_master SET custname='$name', custemail='$email', custaddress='$addr' WHERE custphone='$phone'";


if ($conn->query($sql) === TRUE) 
{
    //echo "Record updated successfully";
    $_SESSION['custname']=$name;
    $_SESSION['custemail']=$email;
    $_SESSION['custaddress']=$addr;
    header("location:myprofile.php");
} 
else 
{
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
