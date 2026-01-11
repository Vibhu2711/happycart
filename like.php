<?php 
include 'conn.php';
  
$p1 = $_GET['id'];
$pid = "";
$pname = "";
$pprice1 = "";
$pprice2 = "";

$sql = "SELECT * FROM res_product_master WHERE res_product_master.pid=$p1";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $pid=$row["pid"];
        $pname=$row["pname"];
        $pimage=$row["pimage"];
        $pprice1=$row["pprice1"];
        $pprice2=$row["pprice2"];
        
    } 
}
else 
{
echo "no data available";
}

$sql2="SELECT * FROM res_like_master where pid='$p1'";
$result2= $conn->query($sql2);

if($result2 -> num_rows>0) {
    echo "customer exists";
} 
else 
{  
    //insert results from the form input
    $query = "INSERT INTO res_like_master(pid, pname,pimage, price1,price2)VALUES ($pid,'$pname', '$pimage' ,$pprice1,$pprice2)";
    $checkrows1= $conn->query($query);

    if($checkrows1 >0) {
        //echo "customer added";
        header("location:like_display.php");
    } 
    else{
        $result = die('Error querying database.');
    }
}
$conn->close();
?>