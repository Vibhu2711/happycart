<?php 

$id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "happy_cart";

// Create connection
include 'conn.php';

$sql = "DELETE FROM res_customer_master WHERE custid = $id";

if ($conn->query($sql) === TRUE) {
    header("location:customer.php");
} 
else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>