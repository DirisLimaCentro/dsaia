<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Catalogo
{
	//Implementamos nue
	public function __construct()
	{

	}
	public function updateCatalogoLocal($accion,$id_local,$id_catalogo){
		$sql="select sp_update_catalogo_local('$accion','$id_local','$id_catalogo')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para insertar registros
	public function insertar($nombre,$id_categoria,$id_tipo_rotacion,$id_tipo_precio,$id_usuario)
	{
		$sql="INSERT INTO catalogo(nombre,id_grupo,id_tipo_rotacion,id_tipo_precio,id_usuario_crea)
		VALUES ('$nombre','$id_categoria','$id_tipo_rotacion','$id_tipo_precio','$id_usuario')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_catalogo,$nombre,$id_categoria,$id_tipo_rotacion,$id_tipo_precio,$id_usuario)
	{

		$sql="UPDATE catalogo SET nombre='$nombre',id_grupo='$id_categoria',
		id_tipo_rotacion='$id_tipo_rotacion',id_tipo_precio='$id_tipo_precio',
		id_usuario_modifica='$id_usuario' WHERE id='$id_catalogo'";

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_catalogo)
	{
		$sql="UPDATE catalogo SET estado='0' WHERE id='$id_catalogo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_catalogo)
	{
		$sql="UPDATE catalogo SET estado='1' WHERE id='$id_catalogo'";
		return ejecutarConsulta($sql);
	}

	public function listarCatalogo($name)
	{
		$sql="SELECT id,nombre FROM catalogo WHERE nombre like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY nombre ";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_catalogo)
	{

		$sql="SELECT
		i.*,c.descripcion AS categoria		
		FROM
		catalogo i		
		LEFT JOIN tablas c ON i.id_grupo=c.id_tipo AND c.id_tabla='4'
		WHERE i.id='$id_catalogo'";


		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		catalogo i
		
		LEFT JOIN tablas g ON i.id_grupo=g.id_tipo AND g.id_tabla='4' 
		LEFT JOIN tablas r ON i.id_tipo_rotacion=r.id_tipo AND r.id_tabla='16' 
		LEFT JOIN tablas p ON i.id_tipo_precio=p.id_tipo AND p.id_tabla='17' 

		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		//$sql="SELECT e.*,u.distrito FROM empresas e
		//LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;

		$sql="SELECT
		i.id AS \"i.id\",
		i.nombre AS \"i.nombre\",
		i.estado AS \"i.estado\",		
		g.descripcion AS \"g.descripcion\",
		r.descripcion AS \"r.descripcion\",
		p.descripcion AS \"p.descripcion\"

		FROM
		catalogo i
		
		LEFT JOIN tablas g ON i.id_grupo=g.id_tipo AND g.id_tabla='4' 
		LEFT JOIN tablas r ON i.id_tipo_rotacion=r.id_tipo AND r.id_tabla='16' 
		LEFT JOIN tablas p ON i.id_tipo_precio=p.id_tipo AND p.id_tabla='17' 

		".$sWhere." ".$sOrder." ".$sLimit;
		//return  $sql;

		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT id,nombre FROM catalogo ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function selectLocales($id_catalogo)
	{
		$sql="select * from (
				select '1' as stat, e.nombre as empresa,l.nombre as area,l.id from 
				locales l 
				inner join catalogo_local cl on l.id=cl.id_local
				inner join empresas e on e.id=l.id_empresa where cl.id_catalogo='$id_catalogo'
				union all
				select '' as stat,e.nombre as empresa,l.nombre,l.id as area from 
				locales l 
				inner join empresas e on e.id=l.id_empresa 
				where l.id not in (select id_local from catalogo_local where id_catalogo='$id_catalogo')
				)x order by 2,3";
		return ejecutarConsulta($sql);
	}

	public function findByName($name,$id_empresa)
	{
		$sql="SELECT id,nombre FROM catalogo WHERE estado='1' AND nombre like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY nombre ";
		return ejecutarConsulta($sql);
	}
}

?>
