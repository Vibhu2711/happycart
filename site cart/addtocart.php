<?php
session_start();
$p1= $_POST['pid'];
$p2= $_POST['pqty'];
$p3= $_POST['price1'];

$cookie_name = "sessionid";
$cookie_value = rand(1000,100000);

//check user log in or not?
if(isset($_POST['submit']))
{
    if(isset($_SESSION['custname']))
    {
        //echo $_SESSION['custname']; 
    }
    else
    {
        header('location:signin.php');
    }
}
//check cookie value found or not? y=go ahead and n= go home page

if(!isset($_COOKIE[$cookie_name])) 
{
    //echo "Cookie named '" . $cookie_name . "' is not set!";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
else 
{
    $cookie_value =  $_COOKIE[$cookie_name];
}
include 'conn.php';

if(isset($_SESSION['custname']))
{
   
    

$sql2="SELECT * FROM res_addtocart_master where pid='$p1'";
$result2= $conn->query($sql2);
$p=$p2+1;
$v=$p*$p3;
if($result2 -> num_rows>0) 
{
    //echo "customer exists";
    $sql4 = "UPDATE res_addtocart_master SET pquantity =$p, pamout=$v where pid=$p1"; 
    if ($conn->query($sql4) === TRUE) {          
         header("location:cart.php");
     }
     else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
}
else
{
    $sql = "INSERT INTO res_addtocart_master(`sessionid`, `pid`, `pquantity`, `pprice1`, `pamout`)VALUES ('$cookie_value', '$p1', '$p2', '$p3','$p3*$p2')";

    if ($conn->query($sql) === TRUE) {
      
        header("location:cart.php");
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    
}
else
{
    header("location:signin.php");
}

$conn->close();
?>