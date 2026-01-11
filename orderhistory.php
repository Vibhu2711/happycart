<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ORDER HISTORY</title>
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
                    <a class="text-body mr-3" href="about.php">About</a>
                    <a class="text-body mr-3" href="contact.php">Contact</a>
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
                               <a href="orderhistory.php" class="dropdown-item active" type="button">Order history</a>
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
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
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
                            <a href="" class="btn px-0">
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

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Total Amount</th>
                      <th>Opration</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Create connection
                      include 'conn.php';
                      $p1= $_SESSION['custname'];

                      $sql = "SELECT * FROM res_cart_master WHERE res_cart_master.custname = '$p1'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row["cartid"]; ?></td>
                        <td><?php echo $row["custname"]; ?></td>
                        <td><?php echo $row["cdate"]; ?></td>
                        <td><?php echo $row["ctamount"]; ?></td>
                        <td>
                          <a href="orderhistory2.php?id=<?php echo $row["cartid"]; ?>">View</a>
                          &nbsp;&nbsp;
                          <a href="invoice.php?id=<?php echo $row["cartid"]; ?>">Invoice</a>
                        </td>
                      </tr>
                      <?php
                        }
                      } else {
                        echo "no data available";
                      }
                      $conn->close();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
  </div>
  </section>
<!-- Main content end -->
    
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
<?php
    include 'footer.php';
?>