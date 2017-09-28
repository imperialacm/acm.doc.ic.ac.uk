#!/usr/bin/php
<?php
require './include/PHPMailerAutoload.php';

$errors = '';

if(empty($_POST['email'])) {
  $errors .= "\n all fields are required";
}
#$email = $_POST['email'] . '@imperial.ac.uk';
$email = $_POST['email'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email)) {
  $errors .= "\n invalid email address";
}

if (empty($errors)) {
  $mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host = 'automail.cc.ic.ac.uk';
  $mail->From = 'noreply@imperial.ac.uk';
  $mail->addAddress('acm@imperial.ac.uk');
  $mail->addReplyTo($email);
  $mail->Subject = "Subscription";
  $mail->Body = "Subscription request from $email";

  if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
  }

  echo 'Message has been sent';
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Sing-up Form Handler</title>
</head>
<body>
<?php
echo nl2br($errors);
?>
</body>
</html>
