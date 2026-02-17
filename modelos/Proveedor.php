<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Proveedor
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$nombre_comercial,$direccion,$ruc,$telefono_fijo,$ubigeo,$celular,$email,$web,$facebook,$e_mail_alt)
	{
		$sql="INSERT INTO proveedores (razon_social,nombre_comercial,direccion,id_ubigeo,ruc,
		telefono_fijo,id_usuario_crea,celular,e_mail,web,facebook,e_mail_alt)
		VALUES ('$nombre_comercial','$nombre','$direccion','$ubigeo','$ruc','$telefono_fijo','1','$celular','$email','$web','$facebook','$e_mail_alt')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_proveedor,$nombre,$nombre_comercial,$direccion,$ruc,$telefono_fijo,$ubigeo,$celular,$email,$web,$facebook,$e_mail_alt)
	{
		$sql="UPDATE proveedores SET razon_social='$nombre',nombre_comercial='$nombre_comercial',direccion='$direccion',
		id_ubigeo='$ubigeo',ruc='$ruc',telefono_fijo='$telefono_fijo',celular='$celular',e_mail='$email',web='$web',facebook='$facebook',e_mail_alt='$e_mail_alt' WHERE id='$id_proveedor'";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_proveedor)
	{
		$sql="UPDATE proveedores SET estado='0' WHERE id='$id_proveedor'";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_proveedor)
	{
		$sql="UPDATE proveedores SET estado='1' WHERE id='$id_proveedor'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_proveedor)
	{
		$sql="SELECT p.*,u.distrito FROM proveedores p
		LEFT JOIN ubigeo u ON u.id=p.id_ubigeo WHERE p.id='$id_proveedor'";
		//echo $sql;exit();
		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(*) AS cnt FROM proveedores ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="SELECT p.*,u.distrito FROM proveedores p
		LEFT JOIN ubigeo u ON u.id=p.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT id,razon_social as nombre FROM proveedores WHERE estado='1' ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function selectProveedores($id_proveedor)
	{
		$sql="SELECT id,nombre,id_proveedor,telefono_fijo,celular,e_mail,estado FROM contactos_proveedor
		WHERE id_proveedor='$id_proveedor' ORDER BY nombre";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}
	public function listarProveedores($name)
	{
		$sql="SELECT id,razon_social FROM proveedores WHERE razon_social like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY razon_social ";
		return ejecutarConsulta($sql);
	}
}

?>
