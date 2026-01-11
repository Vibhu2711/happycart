<?php session_start(); ?>

<?php
// ----------------------------------------------------------------
include 'conn.php';
$cookie_name = "sessionid";
$cookie_value = rand(1000,100000);
// ----------------------------------------------------------------
//check user log in or not?
if(isset($_SESSION['custname']))
{
    //echo $_SESSION['custname']; 
}
else
{
    header('location:signin.php');
}
// ----------------------------------------------------------------
// ----------------------------------------------------------------
//check cookie value found or not? y=go ahead and n= go home page
if(!isset($_COOKIE[$cookie_name])) 
{
    header('location:index.php');
}
else 
{
    $cookie_value = $_COOKIE[$cookie_name];
}
// ----------------------------------------------------------------
// ----------------------------------------------------------------
//read data from addtocart db of cookie value
//master entry
$cmid = $_SESSION['custid'];
$name = $_SESSION['custname'];

$sql3 = "INSERT INTO res_cart_master(custid, ctamount,custname)VALUES ($cmid,0,'$name')";
$last_id =0;
$v="";
if ($conn->query($sql3) === TRUE) {
   
    $last_id = $conn->insert_id;
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 
//detail entry
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

        $sql2 = "INSERT INTO res_cart_details(cartid,pid, pquantity, pprice1, pamout)VALUES ($last_id, $pid, $pquantity, $pprice1,$pamout)";

        if ($conn->query($sql2) === TRUE) {
           
           // header("location:cart.php");
        }
        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} 
else {
echo "no data available";
}
// ----------------------------------------------------------------
//update cartm total value
$sql4 = "UPDATE res_cart_master SET ctamount = $mytotal+10 where cartid = $last_id";
if ($conn->query($sql4) === TRUE) {          
    // header("location:cart.php");
 }
 else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }
// ----------------------------------------------------------------
$conn->close();
?>