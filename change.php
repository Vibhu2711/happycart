<?php

$phone= $_POST['phone'];
$pass= md5($_POST['password']);
$npass= md5($_POST['npassword']);
$oldpass= md5($_POST['oldpassword']);

include 'conn.php';

$v="";
$sql = "SELECT * FROM res_customer_master where custphone=$phone ";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {	
        $v = $row["custpassword"];
    }
} 
if($v == $oldpass)
{
    if($pass == $npass)
    {
        $sql = "UPDATE res_customer_master SET custpassword = '$npass' WHERE custphone = $phone";
        $result = $conn->query($sql);
    
        if ($conn->query($sql) === TRUE)
        {
            header("location:signin.php");
        }
        else 
        {
            echo "Error updating record: " . $conn->error;
        }
    }
?>
    <script>
    alert("ERROR! conform password dont match!");
    </script>
<?php
}
else 
{
?>
    <script>
    alert("ERROR! Old password dont match!");
    </script>
<?php
}
$conn->close();
?>