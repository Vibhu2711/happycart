<!DOCTYPE html>
<html lang="en">
<body>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5><p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Santi nagar, Waghodiya road, Vadodara</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 12345 67890</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
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
                        <a class="text-secondary mb-2" href="myprofile.php"><i class="fa fa-angle-right mr-2"></i>My Profile</a>
                        <a class="text-secondary mb-2" href="editprofile.php"><i class="fa fa-angle-right mr-2"></i>Edit Profile</a>
                        <a class="text-secondary mb-2" href="changepass.php"><i class="fa fa-angle-right mr-2"></i>Change Password</a>
                        <a class="text-secondary mb-2" href="logout.php"><i class="fa fa-angle-right mr-2"></i>Logout</a>
                    </div>
                    <?php
                        }
                        else
                        {
                    ?>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="signin.php"><i class="fa fa-angle-right mr-2"></i>Sign in</a>
                            <a class="text-secondary mb-2" href="signup.php"><i class="fa fa-angle-right mr-2"></i>Sign up</a>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">Domain</a>
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