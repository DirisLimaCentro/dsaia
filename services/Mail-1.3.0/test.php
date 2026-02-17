<?php
require_once "Mail.php";

$from = "Web Master <mail.clinicagonzalez.com>";
$to = "Nobody <lesch80@gmail.com>";
$subject = "Test email using PHP SMTP\r\n\r\n";
$body = "This is a test email message";

$host = "mail.clinicagonzalez.com";
$username = "admin@clinicagonzalez.com";
$password = "Gerenciageneral1";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,'port'=>'25',
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}
?>