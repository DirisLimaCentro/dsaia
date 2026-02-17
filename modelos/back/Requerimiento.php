<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Requerimiento
{
	//Implementamos nue
	public function __construct()
	{

	}
	public function autorizarRequerimiento($id_requerimiento,$id_usuario_autoriza){
		$sql="update requerimientos set fecha_autorizacion=now(),id_usuario_autoriza='$id_usuario_autoriza' where id='$id_requerimiento'";
		return ejecutarConsulta($sql);
	}

	public function revertirRequerimiento($id_requerimiento,$id_usuario_autoriza){
		$sql="update requerimientos set fecha_autorizacion=null,id_usuario_autoriza=null where id='$id_requerimiento'";
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

	public function actualizar($id_requerimiento,$urgente,$id_usuario,$id_personal_referencia,$observaciones,$detalle){
		if ($id_personal_referencia!=''){
			$sql="SELECT sp_update_requerimiento('$id_requerimiento','$urgente','$id_usuario','$id_personal_referencia','$observaciones','$detalle')";
		}else{
			$sql="SELECT sp_update_requerimiento('$id_requerimiento','$urgente','$id_usuario',null,'$observaciones','$detalle')";
		}	
		return ejecutarConsulta($sql);

	}

	public function insertar($id_empresa,$id_local,$urgente,$observaciones,$id_usuario_crea,$id_solicitante,
		$id_personal_referencia,$detalle){


		if ($id_personal_referencia!=''){
			$sql="SELECT sp_create_requerimiento('$id_empresa','$id_local','$urgente','$observaciones',
			'$id_usuario_crea','$id_solicitante','$id_personal_referencia','$detalle')";
		}else{
			$sql="SELECT sp_create_requerimiento('$id_empresa','$id_local','$urgente','$observaciones',
			'$id_usuario_crea','$id_solicitante',null,'$detalle')";
		}	


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
	public function desactivar($id_requerimiento,$id_usuario)
	{
		$sql="UPDATE requerimientos SET estado='0',id_usuario_anula='$id_usuario',fecha_anulacion=now() WHERE id='$id_requerimiento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_requerimiento,$id_usuario)
	{
		$sql="UPDATE requerimientos SET estado='1' WHERE id='$id_requerimiento'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_requerimiento)
	{
		$sql="SELECT 
		  to_char(i.fecha,'dd/mm/yyyy') as fecha, 
		  e.nombre as empresa,
		  e.direccion,e.telefono_fijo,
		  u.distrito,u.departamento,u.provincia,
		  l.nombre as local,
		  i.numero, 
		  i.observaciones, 			  	  
		  i.urgente,
		  to_char(i.fecha_creacion,'dd/mm/yyyy HH:MI AM') as fecha_creacion, 
		  ui.login as usuario_crea,i.id_usuario_crea,
		  i.id_personal_referencia,
		  (ps.ape_paterno||' '||ps.ape_materno||' '||ps.nombres) as personal_referencial
		FROM 
		  requerimientos i
		INNER JOIN locales l ON l.id=i.id_local
		INNER JOIN empresas e ON e.id=l.id_empresa  
		INNER JOIN usuarios ui ON ui.id=i.id_usuario_crea
		LEFT JOIN ubigeo u ON u.id=e.id_ubigeo 	
		LEFT JOIN personal ps ON ps.id=i.id_personal_referencia		
		WHERE i.id='$id_requerimiento'";


		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		requerimientos  i		
		INNER JOIN locales l ON l.id=i.id_local
		INNER JOIN empresas e ON l.id_empresa=e.id		
		LEFT JOIN usuarios uc ON uc.id=i.id_usuario_crea
		LEFT JOIN personal ps ON ps.id=i.id_solicitante
		LEFT JOIN usuarios ua ON ua.id=i.id_usuario_autoriza ".$sWhere;
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
		i.numero AS \"i.numero\",
		i.urgente AS \"i.urgente\",
		to_char(i.fecha,'dd/mm/YYYY') AS \"i.fecha\",
		to_char(i.fecha_autorizacion,'dd/mm/YYYY HH:MI AM') AS \"i.fecha_autorizacion\",		
		to_char(i.fecha_creacion,'dd/mm/YY HH:MI AM') AS  \"i.fecha_creacion\",		
		l.nombre AS \"l.nombre\",
		uc.login AS \"uc.login\",
		ua.login AS \"ua.login\",
		i.estado AS \"i.estado\",
		(ps.ape_paterno||' '||ps.ape_materno||' '||ps.nombres) as personal,i.id_salida,
		i.id_usuario_crea AS \"i.id_usuario_crea\"
		FROM
		requerimientos i
		INNER JOIN locales l ON l.id=i.id_local
		INNER JOIN empresas e ON l.id_empresa=e.id		
		LEFT JOIN usuarios uc ON uc.id=i.id_usuario_crea
		LEFT JOIN personal ps ON ps.id=i.id_solicitante
		LEFT JOIN usuarios ua ON ua.id=i.id_usuario_autoriza ".$sWhere." ".$sOrder." ".$sLimit;
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
	public function detalleRequerimiento($id_requerimiento)
	{
		$sql="SELECT i.id_requerimiento,		
		i.id_catalogo,
		it.nombre,
		i.cantidad,		
		c.descripcion AS categoria,
		umi.descripcion AS unidad_medida_ingreso,
		i.id_medida
		FROM
		requerimientos_detalle i		
		INNER JOIN catalogo it ON i.id_catalogo=it.id
		LEFT JOIN tablas c ON it.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas umi ON i.id_medida=umi.id_tipo AND umi.id_tabla='6' WHERE i.id_requerimiento='$id_requerimiento'";
		return ejecutarConsulta($sql);
	}


	public function buscarReq($id_requerimiento)
	{
		$sql="SELECT 
		  i.id,i.id_local,
		  l.id_empresa,
		  i.numero,	
		  to_char(i.fecha,'dd/mm/yyyy') as fecha, 
		   i.id_solicitante
		FROM 
		  requerimientos i
			INNER JOIN locales l on l.id=i.id_local 
		WHERE i.id='$id_requerimiento'";


		return ejecutarConsultaSimpleFila($sql);
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
