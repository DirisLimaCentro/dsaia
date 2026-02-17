<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class OrdenCompra
{
	//Implementamos nue
	public function __construct()
	{

	}

	public function marcarEnvioCorreo($id_orden_compra,$id_usuario_envio){
		$sql="update ordenes_compra set fecha_correo=now(),id_usuario_envia_correo='$id_usuario_envio' where id='$id_orden_compra'";
		return ejecutarConsulta($sql);

	}


	public function autorizarOrdenCompra($id_orden_compra,$id_usuario_autoriza){
		$sql="update ordenes_compra set fecha_autorizacion=now(),id_usuario_autoriza='$id_usuario_autoriza' where id='$id_orden_compra'";
		return ejecutarConsulta($sql);

	}
	public function mostrarItem($id_ingreso,$id_item){
		$sql="SELECT
		d.id_item,i.nombre as item,d.factor,d.cantidad,d.costo_unitario_umc,
		d.id_lote,l.numero_lote,to_char(l.fecha_vencimiento,'dd/mm/yyyy') as fecha_vencimiento,
		c.descripcion AS categoria,
		m.descripcion AS marca,
		ums.descripcion AS unidad_medida_salida,
		umi.descripcion AS unidad_medida_ingreso
		FROM
		ingresos_detalle d 
		INNER JOIN items i ON d.id_item=i.id
		LEFT JOIN tablas c ON i.id_categoria=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6'
		LEFT JOIN lotes l ON l.id=d.id_lote
		WHERE d.id_ingreso='$id_ingreso' AND i.id='$id_item'";
		return ejecutarConsultaSimpleFila($sql);
	}


	public function getOrdenCompraPendientes(){
		$sql="SELECT SUM(cnt_oc) as cnt_oc,SUM(cnt_req) AS cnt_req FROM (
			SELECT  count(*) AS cnt_oc,0 as cnt_req FROM ordenes_compra WHERE fecha_autorizacion IS NULL AND estado='1' 
			  UNION ALL
		  SELECT 0 AS cnt_oc, count(*) AS cnt_req FROM requerimientos WHERE fecha_autorizacion IS NULL AND estado='1'
			)x "; 
		return ejecutarConsulta($sql);
	}

	public function verificaDisponibilidadLote($id_lote){
		$sql="SELECT  id_lote FROM salidas_detalle WHERE id_lote='$id_lote' LIMIT 1";
		return ejecutarConsulta($sql);
	}
	public function eliminaItem($id_ingreso,$id_item){
		$sql="SELECT sp_delete_item_compra('$id_ingreso','$id_item')";
		return ejecutarConsulta($sql);
	}	

	public function actualizarInsertarItem($accion,$id_ingreso,$id_item,$id_lote,$numero_lote,$cantidad,$costo_umc,$fecha_vencimiento,$factor){


		if ($fecha_vencimiento==''){
			$param_fv='';
		}else{
			$param_fv=",'".$fecha_vencimiento."'";
		}

		if ($accion=='U'){
			$sql="SELECT sp_update_item_compra('$id_ingreso','$id_item',".(empty($id_lote)?'null':$id_lote).",'$numero_lote','$cantidad','$costo_umc'".$param_fv.")";
		}else{
			$sql="SELECT sp_insert_item_compra('$id_ingreso','$id_item',".(empty($id_lote)?'null':$id_lote).",'$numero_lote','$cantidad','$costo_umc','$factor'".$param_fv.")";
		}
		return ejecutarConsulta($sql);
	}	

	public function actualizar($id_orden,$id_empresa,$id_moneda,$id_forma_pago,$tipo_cambio,$porcentaje_igv,$validez,$id_proveedor,$observaciones,$detalle,$id_usuario){

		$sql="SELECT sp_update_orden_compra('$id_orden','$id_empresa','$id_moneda','$id_forma_pago','$tipo_cambio','$porcentaje_igv','$validez','$id_proveedor','$observaciones','$detalle','$id_usuario')";

		return ejecutarConsulta($sql);

	}

	public function insertar($id_empresa,$id_moneda,$id_forma_pago,$tipo_cambio,$porcentaje_igv,$id_proveedor,$observacion,$validez,$detalle,$id_usuario){

		$sql="SELECT sp_create_orden_compra('$id_empresa','$id_moneda','$id_forma_pago','$tipo_cambio','$porcentaje_igv','$id_proveedor','$observacion','$validez','$detalle','$id_usuario')";

		return ejecutarConsulta($sql);

	}

	//Implementamos un método para insertar registros
	public function insertar_($nombre,$id_empresa,$id_marca,$id_categoria,$id_ums,$id_umi,$factor,$precio_compra,$maneja_lote)
	{
		$sql="INSERT INTO items (nombre,id_empresa,id_marca,id_categoria,id_medida_sal,id_medida_ing,factor,precio_compra,maneja_lote,id_usuario_crea)
		VALUES ('$nombre','$id_empresa','$id_marca','$id_categoria','$id_ums','$id_umi','$factor','$precio_compra','$maneja_lote','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para editar registros
	public function editar($id_item,$nombre,$id_empresa,$id_marca,$id_categoria,$id_ums,$id_umi,$factor,$precio_compra,$maneja_lote)
	{

		$sql="UPDATE items SET nombre='$nombre',id_empresa='$id_empresa',id_marca='$id_marca',id_categoria='$id_categoria',id_medida_sal='$id_ums',id_medida_ing='$id_umi',factor='$factor',precio_compra='$precio_compra',maneja_lote='$maneja_lote',id_usuario_modifica='1' WHERE id='$id_item'";

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_orden_compra)
	{
		$sql="UPDATE ordenes_compra SET estado='0' WHERE id='$id_orden_compra'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_item)
	{
		$sql="UPDATE items SET estado='1' WHERE id='$id_item'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_orden_compra)
	{
		$sql="SELECT 
		  to_char(i.fecha,'dd/mm/yyyy') as fecha, 
		  p.ruc,

		  e.nombre as empresa,
		  e.direccion,
		  p.direccion as direccion_p,
		  up.distrito as distrito_p,
		  p.ruc,
		  e.telefono_fijo,
		  u.distrito,u.departamento,u.provincia,
		  i.tipo_cambio, 
		  i.id_moneda, 
		  i.id_forma_pago, 
		  fp.descripcion as forma_pago,
		  i.id_proveedor, 
		  i.porcentaje_igv, 
		  i.orden, 
		  i.observaciones, 		  
		  i.validez,
		  to_char(i.fecha_creacion,'dd/mm/yyyy HH:MI AM') as fecha_creacion, 
		  i.id_usuario_crea,
		  i.id_empresa,
		  ui.login as usuario_crea,
		  p.razon_social
		FROM 
		  ordenes_compra i
		INNER JOIN usuarios ui ON ui.id=i.id_usuario_crea 	
		INNER JOIN empresas e ON e.id=i.id_empresa
		INNER JOIN proveedores p ON i.id_proveedor=p.id
		LEFT JOIN ubigeo u ON u.id=e.id_ubigeo
		LEFT JOIN ubigeo up ON up.id=p.id_ubigeo 
		LEFT JOIN tablas fp ON fp.id_tipo=i.id_forma_pago AND fp.id_tabla='3'
		WHERE i.id='$id_orden_compra'";


		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		ordenes_compra  i		
		INNER JOIN empresas e ON i.id_empresa=e.id
		INNER JOIN proveedores pro ON i.id_proveedor=pro.id		
		LEFT JOIN tablas mc ON i.id_moneda=mc.id_tipo AND mc.id_tabla='14'
		LEFT JOIN tablas fp ON i.id_forma_pago=fp.id_tipo AND fp.id_tabla='3' ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		//$sql="SELECT e.*,u.distrito FROM empresas e
		//LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;

		$sql="SELECT
		i.id AS \"i.id\",
		e.nombre AS \"e.nombre\",
		i.validez AS \"i.validez\",
		i.orden AS \"i.orden\",
		to_char(i.fecha,'dd/mm/YYYY') AS \"i.fecha\",
		to_char(i.fecha_autorizacion,'dd/mm/YYYY') AS \"i.fecha_autorizacion\",	
		to_char(i.fecha_correo,'dd/mm/YYYY HH:MI AM') AS \"i.fecha_correo\",		
		to_char(ing.fecha_creacion,'dd/mm/YY HH:MI AM') AS  \"ing.fecha_creacion\",
		mc.descripcion AS \"mc.descripcion\",		
		pro.razon_social AS \"pro.razon_social\",
		fp.descripcion AS \"fp.descripcion\",
		pro.e_mail,
		i.estado AS \"i.estado\",i.id_proveedor
		FROM
		ordenes_compra i
		LEFT JOIN ingresos ing on ing.id_orden_compra=i.id
		INNER JOIN empresas e ON i.id_empresa=e.id
		INNER JOIN proveedores pro ON i.id_proveedor=pro.id
		LEFT JOIN tablas mc ON i.id_moneda=mc.id_tipo AND mc.id_tabla='14'
		LEFT JOIN tablas fp ON i.id_forma_pago=fp.id_tipo AND fp.id_tabla='3' ".$sWhere." ".$sOrder." ".$sLimit;
		//return  $sql;
		//echo $sql;
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT id,nombre FROM empresas ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function detalleOrdenCompra($id_orden_compra)
	{
		$sql="SELECT i.id_orden_compra,
		oc.id_empresa,
		i.id_catalogo,
		cat.nombre,				
		i.factor,
		i.cantidad,
		i.costo_unitario_umc,
		i.id_medida_ing,
		round(i.cantidad*i.costo_unitario_umc,2) as costo_total,		
		c.descripcion AS categoria,		
		umi.descripcion AS unidad_medida_ingreso		
		FROM
		ordenes_compra_detalle i
		INNER JOIN ordenes_compra oc ON oc.id=i.id_orden_compra		
		INNER JOIN catalogo cat ON i.id_catalogo=cat.id
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' WHERE i.id_orden_compra='$id_orden_compra'";
		return ejecutarConsulta($sql);
	}


	public function buscar($id_empresa,$id_orden_compra)
	{
		$sql="SELECT 
		  i.id,	
		  to_char(i.fecha,'dd/mm/yyyy') as fecha, 
		  p.ruc,
		  c.id as id_ingreso,
		  e.nombre as empresa,
		  e.direccion,
		  p.direccion as direccion_p,
		  up.distrito as distrito_p,
		  p.ruc,
		  e.telefono_fijo,
		  u.distrito,u.departamento,u.provincia,
		  i.tipo_cambio, 
		  i.id_moneda, 
		  i.id_forma_pago, 
		  fp.descripcion as forma_pago,
		  i.id_proveedor, 
		  i.porcentaje_igv, 
		  i.orden, 
		  i.observaciones, 		  
		  i.validez,
		  to_char(i.fecha_creacion,'dd/mm/yyyy HH:MI AM') as fecha_creacion,
		  to_char(i.fecha_autorizacion,'dd/mm/yyyy HH:MI AM') as fecha_autorizacion, 
		  i.id_usuario_crea,
		  i.id_empresa,
		  ui.login as usuario_crea,
		  p.razon_social
		FROM 
		  ordenes_compra i
		INNER JOIN usuarios ui ON ui.id=i.id_usuario_crea 	
		INNER JOIN empresas e ON e.id=i.id_empresa
		INNER JOIN proveedores p ON i.id_proveedor=p.id
		LEFT JOIN ubigeo u ON u.id=e.id_ubigeo
		LEFT JOIN ubigeo up ON up.id=p.id_ubigeo 
		LEFT JOIN ingresos c ON c.id_orden_compra=i.id
		LEFT JOIN tablas fp ON fp.id_tipo=i.id_forma_pago AND fp.id_tabla='3'
		WHERE i.id_empresa='$id_empresa' AND i.orden='$id_orden_compra'";


		return ejecutarConsultaSimpleFila($sql);
	}


	public function buscarDetalle($id_empresa,$id_orden_compra)
	{
		$sql="SELECT i.id_orden_compra,
		oc.id_empresa,
		i.id_item,
		it.nombre,				
		i.factor,
		i.cantidad,
		i.costo_unitario_umc,
		round(i.cantidad*i.costo_unitario_umc,2) as costo_total,		
		c.descripcion AS categoria,
		m.descripcion AS marca,
		umi.descripcion AS unidad_medida_ingreso		
		FROM
		ordenes_compra_detalle i
		INNER JOIN ordenes_compra oc ON oc.id=i.id_orden_compra		
		INNER JOIN items it ON i.id_item=it.id
		LEFT JOIN tablas c ON it.id_categoria=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON it.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas umi ON it.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' 
		WHERE oc.id_empresa='$id_empresa' AND oc.orden='$id_orden_compra'";
		return ejecutarConsulta($sql);
	}

}

?>
