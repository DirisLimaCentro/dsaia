<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Establecimiento
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$direccion,$ubigeo,$medico_jefe,$telefono_fijo,$celular,$correo)
	{
		$sql="INSERT INTO tbl_establecimientos (nombre,direccion,ubigeo,medico_jefe,
		telefono_fijo,celular,correo,id_usuario_crea)
		VALUES ('$nombre','$direccion','$ubigeo','$medico_jefe','$telefono_fijo','$celular','$correo','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_establecimiento,$nombre,$direccion,$ubigeo,$medico_jefe,$telefono_fijo,$celular,$correo)
	{
		$sql="UPDATE tbl_establecimientos SET nombre='$nombre',direccion='$direccion',
		ubigeo='$ubigeo',medico_jefe='$medico_jefe',telefono_fijo='$telefono_fijo',celular='$celular',correo='$correo' WHERE id_establecimiento='$id_establecimiento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_establecimiento)
	{
		$sql="UPDATE tbl_establecimientos SET estado=false WHERE id_establecimiento='$id_establecimiento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_establecimiento)
	{
		$sql="SELECT e.*,u.distrito FROM tbl_establecimientos e
		LEFT JOIN tbl_ubigeo u ON u.ubigeo=e.ubigeo WHERE id_establecimiento='$id_establecimiento'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(*) AS cnt FROM tbl_establecimientos ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="SELECT e.*,u.distrito FROM tbl_establecimientos e 
		LEFT JOIN tbl_ubigeo u ON u.ubigeo=e.ubigeo ".$sWhere." ".$sOrder." ".$sLimit;
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM categoria where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>