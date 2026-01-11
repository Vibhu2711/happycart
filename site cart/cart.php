<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add to cart</title>
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
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="cart.php" class="nav-item nav-link active">Shopping Cart</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
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
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="like_display.php" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        <?php
                        // Create connection
                        include 'conn.php';
                        $cookie_name = "sessionid";
                        $cookie_value = rand(1000,100000);

                        if(!isset($_COOKIE[$cookie_name])) 
                        {
                            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                        }
                        else 
                        {
                            $cookie_value =  $_COOKIE[$cookie_name];
                        }
                        $p1 =  $cookie_value;
                        $pid = "";
                        $pquantity = "";
                        $pprice1  = "";
                        $pamout = "";
                        $actid="";
                        $counter = 0;

                        $sql = "SELECT * FROM res_addtocart_master, res_product_master WHERE res_product_master.pid=res_addtocart_master.pid and sessionid=$p1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc()) {
                            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                $pid=$row["pid"];
                                $pquantity=$row["pquantity"];
                                $pprice1=$row["pprice1"];
                                $pamout=$row["pamout"];
                                $atcid=$row["atcid"];

                        ?> 
                        <tr>
                            <td class="align-middle"><img src="admin/pimage/<?php echo $row["pimage"]; ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo $row["pprice1"] ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus " >
                                            <a href="qtyminus.php?actid=<?php echo $row["atcid"]; ?>"> <i class="fa fa-minus"></i></a>     
                                        </button>
                                    </div>
                                    <input type="text"  class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $row["pquantity"] ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">  
                                            <a href="qtyplus.php?actid=<?php echo $row["atcid"]; ?>"> <i class="fa fa-plus"></i></a>     
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $row["pamout"] ?></td>
                            <td class="align-middle">
                                <a href="cart_del.php?id=<?php echo $row["pid"]; ?>"><button class="btn-sm btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                        }
                        } else {
                        echo "no data available";
                        }
                        ?>
                        <?php
                            $p1 =  $cookie_value;
                            $pid = "";
                            $pquantity = "";
                            $pprice1  = "";
                            $pamout = "";
                            $mytotal=0;
                            
                            $sql = "SELECT * FROM res_addtocart_master where sessionid=$cookie_value";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) 
                            {
                                while($row = $result->fetch_assoc()) {
                                    $pid=$row["pid"];
                                    $pquantity=$row["pquantity"];
                                    $pprice1=$row["pprice1"];
                                    $pamout=$row["pamout"];
                                    $mytotal= $mytotal + $pamout;
                                }
                            } 
                            else {
                                echo "no data available";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo $mytotal ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $mytotal+10 ?></h5>
                        </div>
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="checkoutm.php">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Santi nagar, Waghodiya road, Vadodara</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>vibhu232004@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 7096562610</p>
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
</body>
</html>