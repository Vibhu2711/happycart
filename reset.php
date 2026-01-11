<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CHANGE PASSWORD</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
		
	<?php 
		include('conn.php');

		$id = $_GET['MnoQtyPXZORTE'];
		$message = $Home = '';
		$_SESSION['user'] = $id;
		if($_SESSION['user'] == '') 
		{
			header("location:forgot.php");
		}
		else
		{
			if(isset($_POST['submit'])) 
			{
				$password = $_POST['password'];
				$Repassword = $_POST['Repassword'];
				$encoded_pass=base64_encode($password);
				if ($password !== $Repassword)
				{
					?>
					<script>
						alert("Password not match..!!");
					</script>
					<?php
				}
				else
				{
					$id_decode = base64_decode($id);
					$sql = "UPDATE ngo_registration SET `password` = '$encoded_pass' WHERE `N_id` = $id_decode";
					$query=mysqli_query($con,$sql);
					// $result = $conn->query($query);
					if($query)
					{
						?>
						<script>
							alert("Password Reset Successfully..!!");
						</script>
						<?php
					}
					else
					{
						$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to reset Password..!!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>'; 
					}	
				}
			}
		}
	?>
		
		<div id="fh5co-contact" class="animate-box">
			<div class="container">
				<div class="row">
				<h2><strong>FORGOT PASSWORD</strong></h2>
					<form method="POST">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" name="password" placeholder="Enter Password" class="form-control" Required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" name="Repassword" placeholder="Repeat Password" class="form-control" Required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Reset Password" name="submit" class="btn btn-primary">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
        	</div>
        </div>
</body>
</html>
<?php
    include 'footer.php';
?>