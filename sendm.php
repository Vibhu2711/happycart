<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\wamp64\www\happy_cart1\phpmailer\src\Exception.php';
require 'C:\wamp64\www\happy_cart1\phpmailer\src\PHPMailer.php';
require 'C:\wamp64\www\happy_cart1\phpmailer\src\SMTP.php';


$email = $_POST["email"];

if (isset($_POST['send']))
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username = 'vibhu232004@gmail.com';
    $mail->Password = 'sxqebazdfwpvpjbv';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;  

    $mail->setForm('vibhu232004@gmail.com');
    $mail->addAddress("vibhu232004@gmail.com");

    $mail->addAddress($_POST["email"]);
    $mail->isHTML(TRUE);
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["msg"];

    $mail->send();
    echo 
    "
    <script>
    alert('sent done!!);
    document.location.href='mail.php';
    </script>
    ";
}
?>