<?php

$id=$_POST['id'];
$cid=$_POST['cid'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
$image=  basename($_FILES["fileToUpload"]["name"]);

$target_dir = "./pimage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// Create connection
include 'conn.php';

$name = mysqli_real_escape_string($conn,$name);
$sql = "UPDATE res_product_master SET cid='$cid',pname='$name', pdesc='$desc',pprice1='$p1',pprice2='$p2', pimage='$image' WHERE pid = $id";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE)
{
    header("location:product.php");
}
else 
{
    echo "Error updating record: " . $conn->error;
}
  
$conn->close();
?>