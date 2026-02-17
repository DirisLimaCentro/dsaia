<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
require_once "../services/phpmailer/class.phpmailer.php";

define("USER_MAIL", "stdvirtual@dirislimacentro.gob.pe");
define("PWD_MAIL", "Diris2021");

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	public function resetPwd($id,$correo){
		$newpwd=substr(rand(),0,6);
		$sql="update usuarios set clave=md5('$newpwd') WHERE id='$id'";
		$stm=ejecutarConsulta($sql);
		if ($stm){
			//sender mail
			$message="Estimado usuario, le remitimos su nueva clave de acceso.<br>".
			"Clave: ".$newpwd;

			$mail = new PHPMailer(true);
			$mail->CharSet = "UTF-8";
	        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
	        $mail->isSMTP();                                            // Set mailer to use SMTP
	        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
	        $mail->Username = USER_MAIL;                     // SMTP username
	        $mail->Password = PWD_MAIL;                               // SMTP password
	        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
	        $mail->Port = 587;                                    // TCP port to connect to

	            //Recipients
	        $mail->setFrom($correo, 'SISTEMA REGISTRO DSAIA');
	        $mail->addAddress($correo);
	        $mail->isHTML(true);
	        $mail->Subject = 'Confirmación de clave de usuario';
	        $mail->msgHTML($message); 
	        $mail->send();

	        return "1|Ok";

		}else{
			return "0|error al realizar update";
		}

	}
	public function senderMail($nombres,$cuenta,$clave,$correo){

		$message="Estimado ".$nombres.", su cuenta de usuario ha sido creado satisfactoriamente.<br>".
				 "Credenciales para acceso: <br>".
				 "Usuario: ".$cuenta."<br>".
				 "Clave: ".$clave;

		$mail = new PHPMailer(true);
		$mail->CharSet = "UTF-8";
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'stdvirtual@dirislimacentro.gob.pe';                     // SMTP username
        $mail->Password = 'Diris2021';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
        $mail->setFrom($correo, 'SISTEMA REGISTRO DSAIA');
        $mail->addAddress($correo);
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de creación de cuenta de usuario';
        $mail->msgHTML($message); 
        $mail->send();

	}

	public function saveExterno(
		$id_empresa,
		$id_persona,
		$ruc,
		$razon_social,
		$direccion_empresa,
		$comercial,
		$ubigeo_empresa,
		$tipo_rubro,
		$tipo_doc,
		$numero_doc,
		$nombres,
		$ape_paterno,
		$ape_materno,
		$direccion_persona,
		$ubigeo_persona,
		$celular_persona,
		$correo_persona,
		$cuenta_usuario,
		$clave_usuario
		){

		$sql="SELECT sp_save_usuario_externo(
				'$id_empresa',
				'$id_persona',
				'$ruc',
				'$razon_social',
				'$direccion_empresa',
				'$comercial',
				'$ubigeo_empresa',
				'$tipo_rubro',
				'$tipo_doc',
				'$numero_doc',
				'$nombres',
				'$ape_paterno',
				'$ape_materno',
				'$direccion_persona',
				'$ubigeo_persona',
				'$celular_persona',
				'$correo_persona',
				'$cuenta_usuario',
				'$clave_usuario'
				)";

		return ejecutarConsulta($sql);

	}

	public function selectEmpresasUsuario($login){
		$sql=	"select distinct e.id,e.nombre from
				personal_empresa pe 
				inner join locales l on l.id=pe.id_local
				inner join empresas e on e.id=l.id_empresa
				inner join personal p on p.id=pe.id_personal
				inner join usuarios u on u.id_personal=p.id
				where upper(u.login)='".mb_strtoupper($login,"UTF-8")."' order by e.nombre";
		return ejecutarConsulta($sql);	
	}

	public function selectAreasUsuario($login,$id_empresa){
		$sql=	"select distinct l.id,l.nombre from
				personal_empresa pe 
				inner join locales l on l.id=pe.id_local
				inner join empresas e on e.id=l.id_empresa
				inner join personal p on p.id=pe.id_personal
				inner join usuarios u on u.id_personal=p.id
				where upper(u.login)='".mb_strtoupper($login,"UTF-8")."' and l.id_empresa='$id_empresa' order by l.nombre";
		return ejecutarConsulta($sql);	
	}

	public function crudAcceso($usuario,$id_submenu,$op,$s_id_usuario)
	{
		if ($op=='I'){
			$sql="INSERT INTO accesos(id_menu_detalle,id_usuario,id_usuario_crea) VALUES('$id_submenu','$usuario','$s_id_usuario')";
		}else{
			$sql="DELETE FROM accesos WHERE id_menu_detalle='$id_submenu' AND id_usuario='$usuario'";
		}
		return ejecutarConsulta($sql);
	}

	public function listAccesos($id_usuario)
	{
		$sql="select md.id,
		m.descripcion||' > '||md.descripcion as nombre from accesos a 
		inner join menu_detalle md on a.id_menu_detalle=md.id
		inner join menu m on m.id=md.id_menu
		where a.id_usuario='$id_usuario' order by m.orden,md.orden";
		return ejecutarConsulta($sql);		
	}

	public function selectUsers()
	{
		$sql="SELECT u.id,(p.ape_paterno||' '||p.ape_materno||' '||p.nombres) as nombre FROM 
		usuarios u inner join personal p  on u.id_personal=p.id
		 ORDER BY 2";
		return ejecutarConsulta($sql);		
	}

	public function insertar($personal,$usuario,$clave,$nivel)
	{
		$sql="INSERT INTO usuarios (id_personal,login,clave,id_nivel,estado,id_usuario_crea)
		VALUES ('$personal','$usuario','$clave','$nivel','1','1')";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	public function update_pwd($id_usuario,$clave){
		$sql="update usuarios set clave=md5('$clave'),fecha_modificado=now() where id='$id_usuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_usuario,$personal,$usuario,$clave,$nivel)
	{
		$sql="UPDATE usuarios SET id_nivel='$nivel',fecha_modificado=now() WHERE id='$id_usuario'";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para insertar registros
	public function insertar_p($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		$sql="INSERT INTO usuarios (nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,condicion)
		VALUES ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','1')";
		//return ejecutarConsulta($sql);
		$idusuarionew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	//Implementamos un método para editar registros
	public function editar_($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		$sql="UPDATE usuarios SET nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen' WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);

		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario)
	{

		$sql="UPDATE usuarios SET estado='0' WHERE id='$idusuario'";		
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario)
	{

		$sql="UPDATE usuarios SET estado='1' WHERE id='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{

		$sql="SELECT u.*, trim(p.nombres)||' '||trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nro_documento)  as persona FROM usuarios u
		INNER JOIN personal p on u.id_personal=p.id WHERE u.id='$idusuario'";
		//echo $sql;exit();
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function contar($sWhere){
		$sql="		SELECT count(u.*) AS cnt FROM usuarios u
		LEFT JOIN personal p ON u.id_personal=p.id
		LEFT JOIN  tablas t ON u.id_nivel=t.id_tipo and t.id_tabla='13'
		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="SELECT u.*,coalesce(trim(p.ape_paterno)||' ','' ) || coalesce(trim(p.ape_materno)||', ','' )  || coalesce(trim(p.nombres)||' ','' ) as persona,t.descripcion
		FROM usuarios u
		LEFT JOIN  personal p ON u.id_personal=p.id
		LEFT JOIN  tablas t ON u.id_nivel=t.id_tipo and t.id_tabla='13' ".$sWhere." ".$sOrder." ".$sLimit;
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
	public function verificar($login,$clave, $id_empresa, $id_local)
	{
		$sql="SELECT u.id,u.id_personal,u.login,u.id_nivel,
		u.estado,l.nombre as local,pe.id_local,e.nombre as empresa,
		e.ruc as ruc_empresa,e.telefono_fijo as telefono_empresa,e.nombre_comercial,
		e.direccion as direccion_empresa,
		e.e_mail as correo_empresa,
		l.id_ubigeo as ubigeo_establecimiento,
		ube.distrito as distrito_empresa,
		e.id as id_empresa,p.autoriza_orden_compra,p.autoriza_requerimiento,
		ubi.provincia,
		(ubi.departamento||' - '||ubi.provincia||' - '||ubi.distrito) as distrito,
		l.ris
		FROM usuarios u
		INNER JOIN personal p ON p.id=u.id_personal
		INNER JOIN personal_empresa pe ON pe.id_personal=p.id
		INNER JOIN locales l ON l.id=pe.id_local
		INNER JOIN empresas e ON e.id=l.id_empresa
		LEFT JOIN ubigeo ubi on ubi.id=l.id_ubigeo
		left join ubigeo ube on ube.id=e.id_ubigeo
		WHERE upper(login)='$login' AND clave='$clave' AND u.estado='1'
		AND pe.id_local='$id_local'";

		return ejecutarConsulta($sql);
	}
}

?>
