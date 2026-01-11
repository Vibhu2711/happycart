<?php
require_once('auth.php');
require_once('conn.php');
$email= "vibhu232004@gmail.com";

$subject = "Sample Website - Reset Password";
$message = "";
ob_start();
$message = ob_get_clean();
// echo $message;exit;
$eol = "\r\n";
// Mail Main Header
$headers = "From: info@sample.com" . $eol;
$headers .= "Reply-To: noreply@sample.com" . $eol;
$headers .= "To: <{$email}>" . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: text/html; charset=iso-8859-1" . $eol;
try{
	mail($email, $subject, $message, $headers);
	$_SESSION['msg']['success'] = "We have sent you an email to reset your password.";
	
	exit;
}catch(Exception $e){
	throw new ErrorException($e->getMessage());
	exit;
}
?>