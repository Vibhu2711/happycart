<?php 

$id=$_GET['id'];
// Create connection
include 'conn.php';

$sql = "DELETE FROM res_category_master WHERE cid = $id";

if ($conn->query($sql) === TRUE) {
    header("location:categorym.php");
} 
else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>