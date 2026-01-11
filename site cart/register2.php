<?php 
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$pass= md5($_POST['password']);
$addr= $_POST['address'];

include 'conn.php';

$sql = "INSERT INTO res_customer_master(`custname`, `custphone`, `custaddress`, `custpassword`, `custemail`)
VALUES ('$name', '$phone', '$addr', '$pass','$email')";

if ($conn->query($sql) === TRUE) {
  header("location:signin.php");
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>