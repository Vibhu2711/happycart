<?php 
    if (!isset($_SESSION['custname'])) {
        header('Location: signin.php');
        exit(); // THIS IS REQUIRED
    }
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LIKE</title>
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
    <!-- like Product Start -->
    <div class="col-lg-9 col-md-8">
        <div class="row pb-3">
            
            <?php
            // Create connection
            include 'conn.php';

            
            
            $sql = "SELECT * FROM res_like_master";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="admin/pimage/<?php echo $row["pimage"]; ?>"  alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="like2.php?id=<?php echo $row["pid"]; ?>" ><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a name="id" class="h6 text-decoration-none text-truncate" href="Productdetail.php?id=<?php echo $row["pid"]; ?>">
                            <h5> <?php echo $row["pname"]; ?></h5>
                        </a>
                        <div class="d-flex align-items-center justify-content-center mt-2" >
                            <h5><?php echo $row["price1"]; ?></h5>
                            <h6 class="text-muted ml-2"><del><?php echo $row["price2"]; ?></del></h6>
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
    <!-- like Product End -->
</body>
</html>
<?php
    include 'footer.php';
?>