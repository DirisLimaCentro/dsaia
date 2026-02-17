<?php
require_once "Mail.php";
require_once('Mail/mime.php');
$from = "Clinica Gonzalez <admin@clinicagonzalez.com>";
$to = "Nobody <lesch80@gmail.com>";
$subject = "Orden de Compra\r\n\r\n";
$body = "This is a test email message";

$host = "mail.clinicagonzalez.com";
$username = "admin@clinicagonzalez.com";
$password = "Gerenciageneral1";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,'port'=>'25',
    'auth' => false,	
    'username' => $username,
    'password' => $password,
	'debug' => false	
	));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}
?>