<?php	
session_start();
$phone= $_POST['phone'];
$pass= md5($_POST['password']);
$v="";
include 'conn.php';

if(isset($_POST['g-recaptcha-response']))
	{					
		$response = $_POST["g-recaptcha-response"];	
		$ip = $_SERVER['REMOTE_ADDR'];
		$url = 'https://www.google.com/recaptcha/api/siteverify';				
		$data = array(									
		'secret' => '6LdsXfQdAAAAAPb-qp2nAgVHuyEiKVARGl91aeLh',									
		'response' => $_POST["g-recaptcha-response"]							 
		);				
		$options = array(						
		'http' => array (				'						
		header' => "Content-Type: application/x-www-form-urlencoded\r\n",										
		'method' => 'POST',										
		'content' => http_build_query($data)									
		));						
		$context  = stream_context_create($options);						
		 $verify = file_get_contents($url, false, $context);						
		 $captcha_success=json_decode($verify);							
		
		if ($captcha_success->success==false)					 
		{							
			$_SESSION['msg1']="The reCAPTCHA wasn't entered correctly.";					
			header('Location: signin.php');	
			exit();								
		} 					
		else if ($captcha_success->success==true)		
		{
			$sql = "SELECT * FROM res_customer_master where custphone='$phone' and custpassword='$pass'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row=mysqli_fetch_assoc($result)) 
				{	
					$_SESSION['custid'] = $row["custid"];
					$_SESSION['custname'] = $row["custname"];
					$_SESSION['custphone'] = $row["custphone"];
					$_SESSION['custemail'] = $row["custemail"];
					$_SESSION['custaddress'] = $row["custaddress"];
					
					header("location:index.php");
				} 
			}
			else
			{
				$_SESSION['msg1'] = "Invalid Mobile or Password";
				header('Location: signin.php');
			}
			if ($conn->query($sql) === TRUE) {

				//$_SESSION['msg'] = "task end";
				
				$_SESSION['msg'] = "hello";
				header("location:index.php");
			} 
			else {
			  echo "Error deleting record: " . $conn->error;
			}
		}
		}  
$conn->close();
?>