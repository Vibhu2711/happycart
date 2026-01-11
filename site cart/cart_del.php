<?php 

$id=$_GET['id'];
// Create connection
include 'conn.php';

$sql = "DELETE FROM res_addtocart_master where pid = $id";

if ($conn->query($sql) === TRUE) {
    header("location:cart.php");
} 
else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>