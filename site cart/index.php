<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HAPPY CART</title>
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

    <link rel="stylesheet" href="admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="admin/plugins/toastr/toastr.min.css">

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67ac44ca6eb4310012fdd81f&product=inline-share-buttons&source=platform" async="async"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="aboutus.php">About</a>
                    <a class="text-body mr-3" href="help.php">Help</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <?php 
                             if(isset($_SESSION['custname']))
                             { //user login
                        ?>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="myprofile.php" class="dropdown-item" type="button">My Profile</a>
                                    <a href="editprofile.php" class="dropdown-item" type="button">Edit Profile</a>
                                    <a href="changepass.php" class="dropdown-item" type="button">change password</a>
                                    <a href="orderhistory.php" class="dropdown-item" type="button">Order history</a>
                                    <a href="logout.php" class="dropdown-item" type="button">Logout</a>
                                </div>
                        <?php
                             }
                             else
                             {
                        ?>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="signin.php" class="dropdown-item" type="button">Sign in</a>
                                <a href="signup.php" class="dropdown-item" type="button">Sign up</a>
                            </div>
                        <?php
                             }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-12 col-6 text-right">
                <p class="m-0">Welcome</p>
                <h5 class="m-0">
                <?php
                if(isset($_SESSION['custname']))
                {
                   
                    echo $_SESSION['custname']; 
                    
                }
                else
                {
                    echo "guest"; 
                }
                ?></h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary " style="height: 65px; padding: 0 30px;">
                    <h6 class="h2 text-uppercase text-dark bg-primary px-2 m-0">happy cart</h6>
                </a> 
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                        <?php 
                             if(isset($_SESSION['custname']))
                             { //user login
                        ?>
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="cart.php" class="nav-item nav-link">Shopping Cart</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                <a href="like_display.php" class="btn px-0">
                                    <i class="fas fa-heart text-primary"></i>
                                </a>
                                <a href="cart.php" class="btn px-0 ml-3">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                </a>
                        </div>
                        <?php
                             }
                             else
                             {
                        ?> 
                                <a href="index.php" class="nav-item nav-link active">Home</a>
                                <a href="shop.php" class="nav-item nav-link">Shop</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <?php
                             }
                        ?>  
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 600px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1>
                                    <!-- <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="signup.php">Shop Now</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 600px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                                    <!-- <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="signup.php">Shop Now</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 600px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1>
                                    <!-- <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="signup.php">Shop Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div> 
    <!-- Featured End -->
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <?php
            // Create connection
            include 'conn.php';
  
            $sql = "SELECT * FROM res_category_master";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="Product.php?id=<?php echo $row["cid"]; ?>">   
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="admin/image/<?php echo $row["cimage"]; ?>" alt=""  >
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $row["cname"]; ?></h6> 
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            } else {
            echo "no data available";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <!-- Categories End -->
   
    <div>
        <div class="sharethis-inline-share-buttons"></div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5><p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Santi nagar, Waghodiya road, Vadodara</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>vibhu232004@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 7096562010</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shop Cart</a>
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <?php 
                             if(isset($_SESSION['custname']))
                             { //user login
                        ?>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="myprofile.php"><i class="fa fa-angle-right mr-2"></i>My profile</a>
                            <a class="text-secondary mb-2" href="editprofile.php"><i class="fa fa-angle-right mr-2"></i>Edit profile</a>
                            <a class="text-secondary mb-2" href="changepass.php"><i class="fa fa-angle-right mr-2"></i>Change password</a>
                            <a class="text-secondary mb-2" href="orderhistory.php"><i class="fa fa-angle-right mr-2"></i>Order history</a>
                            <a class="text-secondary mb-2" href="logout.php"><i class="fa fa-angle-right mr-2"></i>Sign out</a>
                        </div>
                        <?php
                             }
                             else
                             {
                        ?>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="signin.php"><i class="fa fa-angle-right mr-2"></i>Sign In</a>
                                <a class="text-secondary mb-2" href="signup.php"><i class="fa fa-angle-right mr-2"></i>Sign Up</a>
                            </div>
                        <?php
                             }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="admin/plugins/toastr/toastr.min.js"></script>
    <?php

    if (isset($_SESSION['msg']))
    {
        
    ?>
    <script>
    toastr.success('WELCOME !!')
    </script>
    
    <?php
    unset($_SESSION['msg']);
    }
    ?>
</body>
</html>