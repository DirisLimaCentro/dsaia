<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Contacto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($id_proveedor,$nombre,$telefono,$celular,$email)
	{
		$sql="INSERT INTO contactos_proveedor (id_proveedor,nombre,telefono_fijo,celular,
		e_mail,id_usuario_crea)
		VALUES ('$id_proveedor','$nombre','$telefono','$celular','$email' ,'1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_contacto,$nombre,$telefono,$celular,$email)
	{
		$sql="UPDATE contactos_proveedor SET nombre='$nombre',telefono_fijo='$telefono',celular='$celular',e_mail='$email',id_usuario_modifica='1' WHERE id='$id_contacto'";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_contacto)
	{
		$sql="UPDATE contactos_proveedor SET estado='0' WHERE id='$id_contacto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_local)
	{
		$sql="UPDATE locales SET estado='1' WHERE id='$id_local'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_contacto)
	{
		$sql="SELECT c.* FROM contactos_proveedor c
		WHERE c.id='$id_contacto'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(*) AS cnt FROM empresas ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="SELECT e.*,u.distrito FROM empresas e
		LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT id,nombre FROM empresas ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function selectProveedores($id_proveedor)
	{
		$sql="SELECT c.id,c.nombre,c.telefono_fijo,c.celular,c.e_mail,c.estado FROM contactos_proveedor
		WHERE c.id_proveedor='$id_proveedor' ORDER BY c.nombre";
		return ejecutarConsulta($sql);
	}
}

?>
