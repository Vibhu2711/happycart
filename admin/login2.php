<?php	
session_start();
$email= $_POST['email'];
$pass= $_POST['password'];
include 'conn.php';
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM res_admin_master where aemail=$email";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	// output data of each row
	while($row=mysqli_fetch_assoc($result)) 
	{	
		$_SESSION['aid'] = $row["aid"];
		$_SESSION['aname'] = $row["aname"];
		$_SESSION['aphone'] = $row["aphone"];
		$_SESSION['aemail'] = $row["aemail"];
		$_SESSION['aaddr'] = $row["aaddr"];
		header("location:dashboard.php");
	} 
}
else 
{
	echo "0 results";
}
$conn->close();
?>