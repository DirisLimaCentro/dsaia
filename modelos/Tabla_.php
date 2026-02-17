<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Tabla
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($id_empresa,$nombre,$direccion,$id_ubigeo,$telefono_fijo,$celular)
	{
		$sql="INSERT INTO locales (id_empresa,nombre,direccion,id_ubigeo,
		telefono_fijo,celular,id_usuario_crea)
		VALUES ('$id_empresa','$nombre','$direccion','$id_ubigeo','$telefono_fijo','$celular','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_local,$nombre,$direccion,$id_ubigeo,$telefono_fijo,$celular)
	{
		$sql="UPDATE locales SET nombre='$nombre',direccion='$direccion',
		id_ubigeo='$id_ubigeo',celular='$celular',telefono_fijo='$telefono_fijo',id_usuario_modifica='1' WHERE id='$id_local'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_local)
	{
		$sql="UPDATE locales SET estado='0' WHERE id='$id_local'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_local)
	{
		$sql="UPDATE locales SET estado='1' WHERE id='$id_local'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_local)
	{
		$sql="SELECT e.*,u.distrito FROM locales e
		LEFT JOIN ubigeo u ON u.id=e.id_ubigeo WHERE e.id='$id_local'";
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
	public function select($id_tabla)
	{
		$sql="SELECT id_tipo,descripcion FROM tablas where id_tabla='$id_tabla' ORDER BY descripcion";
		return ejecutarConsulta($sql);
	}
	public function selectLocales($id_empresa)
	{
		$sql="SELECT l.id,nombre,l.direccion,l.telefono_fijo,l.celular,u.distrito,l.estado,l.id_ubigeo FROM locales l
		LEFT JOIN ubigeo u ON u.id=l.id_ubigeo
		WHERE l.id_empresa='$id_empresa' ORDER BY l.nombre";
		return ejecutarConsulta($sql);
	}
}

?>
