<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Lote
{
	//Implementamos nue
	public function __construct()
	{

	}
	public function listLotesxVencer($meses){
		$sql="SELECT
		i.id ,
		cat.nombre AS catalogo,
		i.factor,
		i.precio_compra,
		i.estado,		
		c.descripcion AS categoria,
		m.descripcion AS marca,
		umi.descripcion AS unidad_medida,
		i.stock_real,i.stock_maximo,i.stock_minimo,maneja_lote,
		l.numero_lote,
		to_char(l.fecha_vencimiento,'dd-mm-yyyy') AS fecha_vencimiento,
		l.stock_actual
		FROM
		lotes l 
		INNER JOIN items i ON l.id_item=i.id
		INNER JOIN catalogo cat ON cat.id=i.id_catalogo		
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' 
		WHERE l.stock_actual>0 AND extract(year from age(fecha_vencimiento,now())) * 12 +
		extract(month from age(fecha_vencimiento,now()))=".$meses.
		"ORDER BY cat.nombre";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$id_empresa,$id_marca,$id_categoria,$id_ums,$id_umi,$factor,$precio_compra,$maneja_lote)
	{
		$sql="INSERT INTO items (nombre,id_empresa,id_marca,id_categoria,id_medida_sal,id_medida_ing,factor,precio_compra,maneja_lote,id_usuario_crea)
		VALUES ('$nombre','$id_empresa','$id_marca','$id_categoria','$id_ums','$id_umi','$factor','$precio_compra','$maneja_lote','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_lote,$nombre,$id_empresa,$id_marca,$id_categoria,$id_ums,$id_umi,$factor,$precio_compra,$maneja_lote)
	{

		$sql="UPDATE items SET nombre='$nombre',id_empresa='$id_empresa',id_marca='$id_marca',id_categoria='$id_categoria',id_medida_sal='$id_ums',id_medida_ing='$id_umi',factor='$factor',precio_compra='$precio_compra',maneja_lote='$maneja_lote',id_usuario_modifica='1' WHERE id='$id_lote'";

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_lote)
	{
		$sql="UPDATE items SET estado='0' WHERE id='$id_lote'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_lote)
	{
		$sql="UPDATE items SET estado='1' WHERE id='$id_lote'";
		return ejecutarConsulta($sql);
	}

	public function listarItems($name)
	{
		$sql="SELECT id,nombre FROM items WHERE nombre like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY nombre ";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function selected($id_item)
	{

		$sql="SELECT
		l.*
		FROM
		lotes l
		WHERE l.id_item='$id_item' AND  stock_actual>0 order by 5 asc ";

		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		items i
		INNER JOIN empresas e ON i.id_empresa = e.id
		LEFT JOIN tablas c ON i.id_categoria=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' ".$sWhere;
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
		i.factor,
		i.precio_compra,
		i.estado AS \"i.estado\",
		e.nombre AS \"e.nombre\",
		c.descripcion AS \"c.descripcion\",
		m.descripcion AS \"m.descripcion\",
		ums.descripcion AS \"ums.descripcion\",
		umi.descripcion AS \"umi.descripcion\"
		FROM
		items i
		INNER JOIN empresas e ON i.id_empresa = e.id
		LEFT JOIN tablas c ON i.id_categoria=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' ".$sWhere." ".$sOrder." ".$sLimit;
		//return  $sql;

		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT id,nombre FROM empresas ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function selectLocales($id_empresa)
	{
		$sql="SELECT l.id,nombre,l.direccion,l.telefono_fijo,l.celular,u.distrito,l.estado,l.id_ubigeo FROM locales l
		LEFT JOIN ubigeo u ON u.id=l.id_ubigeo
		WHERE l.id_empresa='$id_empresa' ORDER BY l.nombre";
		return ejecutarConsulta($sql);
	}

	public function findByName($name,$id_empresa)
	{
		$sql="SELECT id,nombre FROM items WHERE id_empresa='$id_empresa' AND nombre like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY nombre ";
		return ejecutarConsulta($sql);
	}
}

?>
