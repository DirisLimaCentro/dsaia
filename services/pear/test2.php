<?php
require_once "Mail.php";
require_once('Mail/mime.php');
$crlf = "\n";		
		$message = new Mail_mime($crlf);
		
		$from = "Clinica <admin@clinicagonzalez.com>";

		$to = ' <lesch80@gmail.com>';
		$cc = '';
		//$to = "Nobody <lsaldivarc@saludpol.gob.pe>";		
		$file="test.pdf";
		$subject = utf8_decode("Notificación de Asistencia Diaria");				
		$body = "Estimado(a)";
		
		
		$message->setTXTBody("This is the text version.");
		$message->setHTMLBody($body);
		
		$message->addAttachment($file, 'text/plain');
		
		$host = "mail.clinicagonzalez.com";
		$username = "admin@clinicagonzalez.com";
		$password =  "Gerenciageneral1";
		$headers = array ('From' => $from,
		  'To' => $to,
		  'Subject' => $subject,
		  'Cc' => $cc
		  );
		$smtp = @Mail::factory('smtp',
		  array ('host' => $host,'port'=>'25',
			'auth' => false,	
			'username' => $username,
			'password' => $password,
			'debug' => false,
			'Content-Type'  => 'text/html; charset=UTF-8'
			));
		
		
		$body = $message->get();
		$headers = $message->headers($headers);
		
		
		$mail = $smtp->send($to.','.$cc, $headers,$body );
		
		if (PEAR::isError($mail)) {
		  echo("<p>" . $mail->getMessage() . "</p>");	
		} else {
		  echo "ok";
		}			
?>