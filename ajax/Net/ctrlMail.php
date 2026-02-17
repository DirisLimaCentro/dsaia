<?
require_once "Mail.php";
require_once('Mail/mime.php');
require_once '../../model/Personal.php';
$per = new Personal();
switch($_GET['accion']){
		case 'SEND_MAIL_OMISIONES':		
		
		$rs=$per->userstmpList($_GET['nro_doc']);
		$crlf = "\n";		
		$message = new Mail_mime($crlf);
		
		
		//$meg=$message->get();
		
		/*$from = "RRHH ".trim($_GET['remitente']);
		$to = ucwords(strtolower($rs[0]['completo'])).' '.$_GET['email'];
		
		$subject = "Notificación de Asistencia Diaria";
				
		$body = "Estimado(a) ".ucwords(mb_strtolower($rs[0]['completo'],'UTF-8')).utf8_decode(" sobre su asistencia diara se le notifica lo siguiente:\r\n").
				$_GET['msg']."\r\n"
				."atte.\r\n"
				."<strong></strong>Equipo Funcional de Recursos Humanos</strong>";*/
		
		
		//$from = "Web Master <lsaldivarc@saludpol.gob.pe>";
		$from = "Recursos Humanos <".trim($_GET['remitente']).">";
		$to = '=?UTF-8?B?'.base64_encode(ucwords(mb_strtolower($rs[0]['completo'],'UTF-8'))).'?='.' <'.$_GET['email'].'>';
		//$to = "Nobody <lsaldivarc@saludpol.gob.pe>";
		
		
		$subject = utf8_decode("Notificación de Asistencia Diaria");				
		$body = "Estimado(a) ".utf8_decode($rs[0]['completo']).utf8_decode(" sobre su asistencia diaria se le notifica lo siguiente:<br>");
		
		if (preg_match("/\bIngreso\b/",$_GET['msg'])){
			$body.=$_GET['msg']."<br>"
				 .utf8_decode("Por lo cual deberá presentar su papeleta de omisión de marcación de ingreso justificada en un plazo no mayor a 24 horas.");
		}elseif(preg_match("/\Salida\b/",$_GET['msg'])){
			$body.=$_GET['msg']."<br>"
				 .utf8_decode("Por lo cual deberá presentar su papeleta de omisión de marcación de salida justificada en un plazo no mayor a 24 horas.");
		}else{
			$body.=$_GET['msg']."<br>"
				 .utf8_decode("Por lo cual se considera como falta, a menos que haya previamente presentado su papeleta de salida.");
		}
		$body .="<br><br>"
			  ."atte.<br><br>"
			  ."<strong>Equipo Funcional de Recursos Humanos</strong>";		
		
		$message->setTXTBody("This is the text version.");
		$message->setHTMLBody($body);
		
		
		$host = "mail.saludpol.gob.pe";
		$username = trim($_GET['remitente']);
		$password = trim($_GET['clave']);
		$headers = array ('From' => $from,
		  'To' => $to,
		  'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		  array ('host' => $host,'port'=>'25',
			'auth' => false,	
			'username' => $username,
			'password' => $password,
			'debug' => false,
			'Content-Type'  => 'text/html; charset=UTF-8'
			));
		
		
		$body = $message->get();
		$headers = $message->headers($headers);
		
		
		$mail = $smtp->send($to, $headers,$body );
		
		if (PEAR::isError($mail)) {
		  ?><img src="../img/cancel.png" /><?		
		} else {
		  ?><img src="../img/ok.png" /><?
		}			
	break;
	
	case 'SEND_URL_CAS':
	
		$rs=$per->userstmpList($_GET['nro_doc']);	
		$crlf = "\n";		
		$message = new Mail_mime($crlf);
		
			
		$from = "Recursos Humanos <".trim($_GET['remitente']).">";
		$to = '=?UTF-8?B?'.base64_encode(ucwords(mb_strtolower($rs[0]['completo'],'UTF-8'))).'?='.' <'.$_GET['email'].'>';
		//$to = "Nobody <lsaldivarc@saludpol.gob.pe>";
		
		
		$subject = utf8_decode("Link de acceso para ficha de datos");				
		
		$body=	"Estimado(a) ".utf8_decode($rs[0]['completo']).utf8_decode(" se le hace llegar la dirección web para el ingreso de la Ficha de Declaración Jurada de Datos.<br>")
				."<ul style='list-style-type: square'>
				<li>URL: <a href='http://app-grh.saludpol.gob.pe:8097/view/frmAccess.php'>http://app-grh.saludpol.gob.pe:8097/view/frmAccess.php</a></li>"
				."<li>Usuario: ".$rs[0]['dni'].'</li>'
				."<li>Clave: ".$rs[0]['clave_ficha'].'</li>'
				."<li>Manual de Usuario: <a href='http://app-grh.saludpol.gob.pe:8097/uploads/ManualFichadeDatos.pdf'>http://app-grh.saludpol.gob.pe:8097/uploads/ManualFichadeDatos.pdf</a></li>"
				."<li>Video Tutorial: <a href='http://app-grh.saludpol.gob.pe:8097/videotutorial/fichadatos.html'>http://app-grh.saludpol.gob.pe:8097/videotutorial/fichadatos.html</a></li></ul>"
				.utf8_decode("Culminado el ingreso de datos, en caso de modificación solicitarlo al EF Recursos Humanos.<br>")
				.utf8_decode("En lo posterior, en caso de variación de datos como obtención de grado académico, nacimiento de menor hijo u otros, sírvase informar al EF Recursos Humanos.<br><br>")
				."atte.<br>"
				."<strong></strong>Equipo Funcional de Recursos Humanos</strong>"
				;
				
		
		$message->setTXTBody("This is the text version.");
		$message->setHTMLBody($body);
		
		
		$host = "mail.saludpol.gob.pe";
		$username = trim($_GET['remitente']);
		$password = trim($_GET['clave']);
		$headers = array ('From' => $from,
		  'To' => $to,
		  'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		  array ('host' => $host,'port'=>'25',
			'auth' => false,	
			'username' => $username,
			'password' => $password,
			'debug' => false,
			'Content-Type'  => 'text/html; charset=UTF-8'
			));
				
		$body = $message->get();
		$headers = $message->headers($headers);		
		
		$mail = $smtp->send($to, $headers,$body );
		
		if (PEAR::isError($mail)) {
		  ?><img src="../img/cancel.png" /><?		
		} else {
		  ?><img src="../img/ok.png" /><?
		}			
	
	break;
	
}
?>