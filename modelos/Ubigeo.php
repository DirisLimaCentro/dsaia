<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ubigeo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$direccion)
	{
		$sql="INSERT INTO tbl_establecimientos (nombre,direccion)
		VALUES ('".$nombre."','".$direccion."')";
		echo $sql;
		//return ejecutarConsulta($sql);
	}
	public function getUbigeo($id){
		$sql="select * from ubigeo where id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcategoria,$nombre,$descripcion)
	{
		$sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcategoria)
	{
		$sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(*) AS cnt FROM tbl_establecimientos ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($name)
	{
		$sql="SELECT * FROM ubigeo WHERE distrito like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY departamento,provincia,distrito ";
		return ejecutarConsulta($sql);		
	}

	public function listarUbigeo($name)
	{
		$sql="SELECT * FROM ubigeo WHERE distrito like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY departamento,provincia,distrito ";
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