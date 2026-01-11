<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SIG IN</title>
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

    <link rel="shortcut icon" href="favicon.ico" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    

</head>
<body>
    <!-- sign-in Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Login</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form method="post" action="welcomeuser.php" name="sentMessage" novalidate="novalidate">
                        
                        <?php
                            if(isset($_SESSION['msg1']))
                            {
                            ?>
                            <div class="alert alert-danger">
                                <strong><?php echo $_SESSION['msg1'];?></strong>
                            </div>
                            <?php
                            }
                            unset($_SESSION['msg1']);
                            ?>
                        <div class="control-group">
                            <input name="phone" type="phone" class="form-control" id="Mobile" placeholder="Your Mobile"
                                required="required" data-validation-required-message="Please enter a mobile no" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Your password"
                                required="required" data-validation-required-message="Please enter a password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
					        <div class="g-recaptcha" data-sitekey="6LdsXfQdAAAAAPT4IhSJeLzBckWDaofUwoGX8puw"></div>
				        </div>
                        <div class="control-group">
                            <div class="form-group">
                                <a href="forgot.php">forget Password?</a>
                            </div>
                        </div>
                        
                        <div>
                            <button name="login" class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">login</button>
                        </div>
                        <div class="control-group">
                            <p></p>
                            <p>Don"t have account ? 	
                                <a href="signup.php">Register</a>
                            </p>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
               
            </div>
        </div>
    </div>
    <!-- sign-in End -->
</body>
</html>
<?php
    include 'footer.php';
?>