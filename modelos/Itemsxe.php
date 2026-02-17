<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Itemsxe
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
	public function save($edit_mode,$id_producto,$id_item,$id_tipo_resultado,$cantidad)
	{
		if ($edit_mode=='N') {
			$sql="INSERT INTO items_examen(id_producto,id_item,resultado,cantidad) 
				values('$id_producto','$id_item','$id_tipo_resultado','$cantidad')";
		}else{
			$sql="UPDATE items_examen set cantidad='$cantidad' where id_producto='$id_producto'
			 and id_item='$id_item' and resultado='$id_tipo_resultado'";
		}
		
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
	public function eliminar($id_producto,$id_item,$tipo)
	{
		$sql="delete from items_examen where id_producto='$id_producto' and id_item='$id_item' and resultado='$tipo'";
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
	public function mostrar($id_producto,$id_item,$tipo)
	{

		$sql="select i.id AS id_item,
		p.id_producto ,
		p.descripcion AS nombre_producto,
		c.nombre||' '||m.descripcion AS nombre_item,
		ie.resultado,
		ie.cantidad
		from items_examen ie
		inner join productos p on p.id_producto=ie.id_producto
		inner join items i on i.id=ie.id_item
		inner join catalogo c on c.id=i.id_catalogo
		inner join tablas m on m.id_tipo=i.id_marca and m.id_tabla='5'
		where ie.id_producto='$id_producto' and ie.id_item='$id_item' and resultado='$tipo'";


		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		items_examen ie
		inner join productos p on p.id_producto=ie.id_producto
		inner join items i on i.id=ie.id_item
		inner join catalogo c on c.id=i.id_catalogo
		inner join tablas m on m.id_tipo=i.id_marca and m.id_tabla='5'
		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		//$sql="SELECT e.*,u.distrito FROM empresas e
		//LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;

		$sql="select i.id AS \"i.id\",
		p.id_producto AS \"p.id_producto\",
		p.descripcion AS \"p.descripcion\",
		c.nombre||' '||m.descripcion AS \"i.descripcion\",
		ie.resultado AS \"ie.resultado\",
		ie.cantidad AS \"ie.cantidad\"
		from items_examen ie
		inner join productos p on p.id_producto=ie.id_producto
		inner join items i on i.id=ie.id_item
		inner join catalogo c on c.id=i.id_catalogo
		inner join tablas m on m.id_tipo=i.id_marca and m.id_tabla='5' 
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
