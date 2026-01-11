<?php 
$p1= $_POST['name'];
$p2= $_POST['phone'];
$p3= $_POST['email'];
$p4= $_POST['addr'];
$p5=md5($_POST['pass']);
$p6 =date('Y-m-d', strtotime($_POST['date']));

// Create connection
include 'conn.php';

$sql = "INSERT INTO res_customer_master (custname, custphone,custemail, custaddress, custpassword,custbd) 
VALUES ('$p1', '$p2','$p3','$p4', '$p5',$p6)";

if ($conn->query($sql) === TRUE) {
    header("location:customer.php");
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>