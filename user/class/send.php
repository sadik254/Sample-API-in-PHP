<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = ' smtp.titan.email';
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@reuse.sale';
    $mail->Password = 'zufaa@123';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('no-reply@reuse.sale');
    $mail->addAddress($_POST["u_email"]);
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();


}
?>