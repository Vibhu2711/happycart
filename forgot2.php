<?php 
include('conn.php');
session_start();
$message = $link = '';
if(isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $sql = "SELECT * FROM `res_customer_master` WHERE `custemail` = '$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
	// output data of each row
	    while($row=mysqli_fetch_assoc($result)) 
	    {	
        $id = $row['custid'] ;
        $id_encode=base64_encode($id);
        header('location:reset.php?MnoQtyPXZORTE='.$id_encode.' ');
	    } 
    }
    else{
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Invalid Email..!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
    }
}
$conn->close();
?>