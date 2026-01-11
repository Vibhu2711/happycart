<?php
 include 'conn.php';

 $v=$_GET['actid'];
 $pquantity = "";
 $pprice1  = "";
 $pamout = "";
 $atcid="";

 $sql = "SELECT * FROM res_addtocart_master WHERE  atcid='$v'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) 
 {
     // output data of each row

     while($row = $result->fetch_assoc()) 
     {
        
        $pquantity=$row["pquantity"];
        $pprice1=$row["pprice1"];
        $atcid=$row["atcid"];
    }
} else {
echo "no data available";
}

$updateq = $pquantity+1;
$j = $pprice1*$updateq;
if ($v>0) 
{    
    $sql4 = "UPDATE res_addtocart_master SET pquantity=$updateq, pamout=$j where atcid='$v'"; 
    if ($conn->query($sql4) === TRUE) 
    {        
        header("location:cart.php");
        }
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>