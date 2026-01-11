<?php 

$id=$_GET['id'];
// Create connection
include 'conn.php';

$sql = "DELETE FROM res_like_master where pid = $id";

if ($conn->query($sql) === TRUE) {
    header("location:like_display.php");
} 
else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>