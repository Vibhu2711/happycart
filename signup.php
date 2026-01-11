
<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SING UP</title>
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
    <!-- sign-up Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Register</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form  method="post" action="register2.php" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-validation-required-message="Please enter your name" Required="Required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" data-validation-required-message="Please enter your email" Required="Required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Your Mobile"  />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Your password" data-validation-required-message="Please enter a password" Required="Required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="address" class="form-control" id="address" placeholder="Your address" data-validation-required-message="Please enter a address" Required="Required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        
                        <div>
                            <button name="register" class="btn btn-primary py-2 px-4" type="submit" >Register</button>
                        </div>
                        <br><p class="control-group">Have already an account?
                            <a href="signin.html" class="fw-bold text-body"><u>Login here</u></a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- sign-up End -->
    
</body>
</html>
<?php
    include 'footer.php';
?>