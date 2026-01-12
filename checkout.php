<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CHECK OUT</title>
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
                            //echo "Cookie named '" . $cookie_name . "' is not set!";
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
                            // output data of each row

                            while($row = $result->fetch_assoc()) {
                            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                $pid=$row["pid"];
                                $pquantity=$row["pquantity"];
                                $pprice1=$row["pprice1"];
                                $pamout=$row["pamout"];
                                $atcid=$row["atcid"];

                        ?> 
                        <tr>
                            <!-- <td class="align-middle"><?php echo $row["atcid"] ?></td> -->
                            <td class="align-middle"><img src="admin/pimage/<?php echo $row["pimage"]; ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo $row["pprice1"] ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus " >
                                            <a href="qtyminus.php?actid=<?php echo $row["atcid"]; ?>"> <i class="fa fa-minus"></i></a>     
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $row["pquantity"] ?>">
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
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo $mytotal ?></h6>
                        </div>
                        <?php 
                        $shipping = 0;
                        // SHIPPING CHARGE LOGIC
                        if ($mytotal >= 10000) {
                            $shipping = 15;
                        } elseif ($mytotal >= 5000) {
                            $shipping = 44;
                        } elseif ($mytotal >= 1000) {
                            $shipping = 60;
                        } else {
                            $shipping = 70;
                        }

                        $grandtotal = $mytotal + $shipping;

                        ?>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">+ <?php echo $shipping; ?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $grandtotal; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
  
    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <form method="POST" action="checkoutm.php">
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="John" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" placeholder="example@email.com" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="contact" placeholder="+91 ..." required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" placeholder="full address" required>
                            </div>                                               
                        </div>
                    </div>
            </div>
            <div class="col-lg-4">                
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" value="UPI" id="upi">
                                <label class="custom-control-label" for="upi">UPI</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" value="COD" id="cod" checked>
                                <label class="custom-control-label" for="cod">Cash on delivery</label>
                            </div>
                        </div>

                        <button type="submit" name="placeorder"
                            class="btn btn-block btn-primary font-weight-bold py-3">
                            Place Order
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
</body>
</html>
<?php
    include 'footer.php';
?>