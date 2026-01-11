<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
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
                                    <a href="changepass.php" class="dropdown-item" type="button">Change Password</a>
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
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Happy</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Cart</span>
                </a>
            </div>
            <div class="col-lg-8 col-8 text-right">
            
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
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="cart.php" class="nav-item nav-link">Shopping Cart</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="like_display.php" class="nav-item nav-link">Like</a>

                        </div>
                        <!-- <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="like_display.php" class="btn px-0">
                                <i class="fas fa-heart text-primary" ></i>
                            </a>
                        </div> -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    </body>
    </html>