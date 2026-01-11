<?php 
    include 'header.php';
?>
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
            
</head>
<body>
    
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
                            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="signup.php">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 600px;">
                    <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="signup.php">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 600px;">
                    <img class="position-absolute w-100 h-100" src="img/carousel-3.jpg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1>
                            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="signup.php">Shop Now</a>
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
        <a class="text-decoration-none" href="Product.?id=<?php echo $row["cid"]; ?>">
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

</body>
</html>
<?php
    include 'footer.php';
?>