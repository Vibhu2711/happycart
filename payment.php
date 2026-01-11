<?php 
    include 'header.php';
?>
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
                    <th>Name</th>
                    <th>Address To Place</th>
                    <th>Total Amount</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                    // Create connection
                    include 'conn.php';

                    $sql = "SELECT * FROM res_cart_master,res_customer_master WHERE res_cart_master.custid = res_customer_master.custid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                    
                    <td><?php echo $row["custname"]; ?></td>
                    <td><?php echo $row["custaddress"]; ?><br>
                        <a href="orderhistory2.php?id=<?php echo $row["cartid"]; ?>">Edit</a>
                        
                    </td>
                    <td><?php echo $row["ctamount"]; ?></td>
                    
                    </tr>
                    <?php
                    }
                    } else {
                    echo "no data available";
                    }
                    $conn->close();
                    


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
                        <td class="align-middle"><?php echo $row["atcid"] ?></td>
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
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html>
<?php
    include 'footer.php';
?>