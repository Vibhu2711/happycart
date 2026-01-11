<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PRODUCT</title>
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
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                    
                  <?php
                  // Create connection
                  include 'conn.php';
                  
                  $p1 = $_GET['id']; 
                  $sql = "SELECT * FROM res_product_master,res_category_master WHERE res_category_master.cid=res_product_master.cid and  res_category_master.cid=$p1";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                  ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="admin/pimage/<?php echo $row["pimage"]; ?>" width="50" height="50" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="addtocart.php?pid=<?php echo $row['pid']; ?>&pqty=1&price1=<?php echo $row['pprice1']; ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="like.php?id=<?php echo $row["pid"]; ?>" >
                                        <i class="far fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a name="id" class="h6 text-decoration-none text-truncate" href="Productdetail.php?id=<?php echo $row["pid"]; ?>">
                                   <h5> <?php echo $row["pname"]; ?></h5>
                                </a>
                                <div class="d-flex align-items-center justify-content-center mt-2" >
                                    <h5><?php echo $row["pprice1"]; ?></h5>
                                    <h6 class="text-muted ml-2"><del><?php echo $row["pprice2"]; ?></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
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
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</body>
</html>
<?php
    include 'footer.php';
?>