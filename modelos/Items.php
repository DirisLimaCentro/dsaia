<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Item
{
	//Implementamos nue
	public function __construct()
	{

	}
	public function sinStock(){
		$sql="SELECT
		i.id ,
		cat.nombre AS catalogo,
		i.factor,
		i.precio_compra,
		i.estado,		
		c.descripcion AS categoria,
		m.descripcion AS marca,
		umi.descripcion AS unidad_medida,
		i.stock_real,i.stock_maximo,i.stock_minimo,maneja_lote
		FROM
		items i
		INNER JOIN catalogo cat ON cat.id=i.id_catalogo		
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' 
		WHERE i.stock_real<=0 ORDER BY cat.nombre";
		

		return ejecutarConsulta($sql);
	}
	//Implementamos un método para insertar registros
	public function insertar($id_catalogo,$id_marca,$id_ums,$id_umi,$factor,$precio_compra,$maneja_lote,$id_laboratorio,$stock_real,$stock_minimo,$stock_maximo,$id_usuario)
	{
		$sql="INSERT INTO items (id_catalogo,id_marca,id_medida_sal,id_medida_ing,factor,precio_compra,maneja_lote,id_laboratorio,stock_real,
		stock_minimo,stock_maximo,id_usuario_crea)
		VALUES ('$id_catalogo','$id_marca','$id_ums','$id_umi','$factor','$precio_compra','$maneja_lote','$id_laboratorio','$stock_real','$stock_minimo','$stock_maximo','$id_usuario')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_item,$id_marca,$id_ums,$id_umi,$factor,$precio_compra,$maneja_lote,$id_laboratorio,$stock_real,$stock_minimo,
		$stock_maximo,$id_usuario)
	{

		$sql="UPDATE items SET id_marca='$id_marca',id_medida_sal='$id_ums',id_medida_ing='$id_umi',factor='$factor',precio_compra='$precio_compra',maneja_lote='$maneja_lote',id_usuario_modifica='$id_usuario',id_laboratorio='$id_laboratorio',
		stock_real='$stock_real',stock_minimo='$stock_minimo',stock_maximo='$stock_maximo' WHERE id='$id_item'";

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_item)
	{
		$sql="UPDATE items SET estado='0' WHERE id='$id_item'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_item)
	{
		$sql="UPDATE items SET estado='1' WHERE id='$id_item'";
		return ejecutarConsulta($sql);
	}

	public function listarItems($name)
	{
		$sql="SELECT id,nombre FROM items WHERE nombre like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY nombre ";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_item)
	{

		$sql="SELECT
		i.*,
		cat.nombre AS nombre_catalogo,
		c.descripcion AS categoria,
		m.descripcion AS marca,
		ums.descripcion AS unidad_medida_salida,
		umi.descripcion AS unidad_medida_ingreso
		FROM
		items i
		INNER JOIN catalogo cat ON i.id_catalogo = cat.id
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6'
		WHERE i.id='$id_item'";


		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		items i
		INNER JOIN catalogo cat ON cat.id=i.id_catalogo	
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
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
		cat.nombre AS \"cat.nombre\",
		i.factor,
		i.precio_compra,
		i.estado AS \"i.estado\",		
		c.descripcion AS \"c.descripcion\",
		m.descripcion AS \"m.descripcion\",
		ums.descripcion AS \"ums.descripcion\",
		umi.descripcion AS \"umi.descripcion\",
		i.stock_real,i.stock_maximo,i.stock_minimo,maneja_lote
		FROM
		items i
		INNER JOIN catalogo cat ON cat.id=i.id_catalogo		
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
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
	public function selectLotes($id_item)
	{
		$sql="SELECT * FROM lotes WHERE id_item='$id_item' ORDER BY fecha_vencimiento DESC";
		return ejecutarConsulta($sql);
	}

	public function findByName($name,$id_empresa)
	{
		$sql="SELECT i.id,(c.nombre||'-'||m.descripcion||'-'||umi.descripcion) as nombre FROM items i
		inner join catalogo c on c.id=i.id_catalogo
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6'			
		WHERE c.nombre like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY 2 ";
		return ejecutarConsulta($sql);
	}
	public function findExamenByName($name)
	{
		$sql="SELECT id_producto as id,descripcion as nombre FROM productos		
		WHERE descripcion like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY 2 ";
		return ejecutarConsulta($sql);
	}
}

?>
