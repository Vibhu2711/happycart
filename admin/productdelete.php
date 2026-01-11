<?php 
 session_start();


$id=$_GET['id'];
// Create connection
include './../conn.php';

$sql = "DELETE FROM res_product_master WHERE pid = $id";

if ($conn->query($sql) === TRUE) {

    $_SESSION['msg'] = "task end";
    header("location:product.php");
} 
else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>