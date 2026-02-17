<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Compra
{
	//Implementamos nue
	public function __construct()
	{

	}
	public function mostrarItem($id_ingreso,$id_item,$id_lote){
		$sql="SELECT
		d.id_item,cat.nombre as item,d.factor,d.cantidad,d.costo_unitario_umc,
		d.id_lote,l.numero_lote,to_char(l.fecha_vencimiento,'dd/mm/yyyy') as fecha_vencimiento,
		c.descripcion AS categoria,
		m.descripcion AS marca,
		ums.descripcion AS unidad_medida_salida,
		umi.descripcion AS unidad_medida_ingreso
		FROM
		ingresos_detalle d
		INNER JOIN items i ON d.id_item=i.id
		INNER JOIN catalogo cat ON cat.id=i.id_catalogo
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
		LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6'
		LEFT JOIN lotes l ON l.id=d.id_lote
		WHERE d.id_ingreso='$id_ingreso' AND i.id='$id_item' and d.id_lote='$id_lote' ";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function verificaDisponibilidadLote($id_lote){
		$sql="SELECT  id_lote FROM salidas_detalle WHERE id_lote='$id_lote' LIMIT 1";
		return ejecutarConsulta($sql);
	}
	public function eliminaItem($id_ingreso,$id_item,$id_lote){
		$sql="SELECT sp_delete_item_compra('$id_ingreso','$id_item','$id_lote')";
		return ejecutarConsulta($sql);
	}

	public function actualizarInsertarItem($accion,$id_ingreso,$id_item,$id_lote,$numero_lote,$cantidad,$costo_umc,$fecha_vencimiento,$factor){


		if ($fecha_vencimiento==''){
			$param_fv='';
		}else{
			$param_fv=",'".$fecha_vencimiento."'";
		}

		if ($accion=='U'){
			$sql="SELECT sp_update_item_compra('$id_ingreso','$id_item',".(empty($id_lote)?'0':$id_lote).",'$numero_lote','$cantidad','$costo_umc'".$param_fv.")";
		}else{
			$sql="SELECT sp_insert_item_compra('$id_ingreso','$id_item',".(empty($id_lote)?'null':$id_lote).",'$numero_lote','$cantidad','$costo_umc','$factor'".$param_fv.")";
		}
		return ejecutarConsulta($sql);
	}

	public function actualizar($id_ingreso,$id_local,$id_tipo_documento,$serie_documento,$numero_documento,
		$fecha_compra,$id_moneda,$id_forma_pago,$tipo_cambio,$porcentaje_igv,$numero_guia,$id_proveedor,$observacion,$id_usuario){

		$sql="SELECT sp_update_compra('$id_ingreso','$id_local','$id_tipo_documento','$serie_documento','$numero_documento','$fecha_compra','$id_moneda','$id_forma_pago','$tipo_cambio','$porcentaje_igv','$numero_guia','$id_proveedor','$observacion','$id_usuario')";

		return ejecutarConsulta($sql);

	}

	public function insertar($id_local,$id_tipo_documento,$serie_documento,$numero_documento,
		$fecha_compra,$id_moneda,$id_forma_pago,$tipo_cambio,$porcentaje_igv,$numero_guia,$id_proveedor,$observacion,$id_tipo_ingreso,$detalle,
		$id_motivo,$id_usuario,$id_orden_compra){

		if ($id_orden_compra==''){
			$param_oc='';
		}else{
			$param_oc=",'".$id_orden_compra."'";
		}

		$sql="SELECT sp_create_compra('$id_local','$id_tipo_documento','$serie_documento','$numero_documento','$fecha_compra','$id_moneda','$id_forma_pago','$tipo_cambio','$porcentaje_igv','$numero_guia','$id_proveedor','$observacion','$id_tipo_ingreso','$detalle','$id_motivo','$id_usuario'".$param_oc.")";

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

	

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_ingreso)
	{
		$sql="SELECT
		  i.id_tipo_documento,
		  i.serie_documento,
		  i.numero_documento,
		  to_char(i.fecha,'dd/mm/yyyy') as fecha,
		  i.tipo_cambio,
		  i.id_moneda,
		  i.id_forma_pago,
		  i.id_proveedor,
		  i.porcentaje_igv,
		  i.id_orden_compra,
		  oc.orden,
		  i.numero_guia,
		  i.id_local,
		  i.observacion,
		  to_char(i.fecha_creacion,'dd/mm/yyyy HH:MI AM') as fecha_creacion,
		  i.id_usuario_crea,
		  l.id_empresa,
		  ui.login as usuario_crea,
		  p.razon_social,
		  i.id_motivo
		FROM
		  ingresos i
		INNER JOIN usuarios ui ON ui.id=i.id_usuario_crea
		INNER JOIN locales l ON l.id=i.id_local
		INNER JOIN proveedores p ON i.id_proveedor=p.id
		LEFT JOIN ordenes_compra oc ON oc.id=i.id_orden_compra
		WHERE i.id='$id_ingreso'";


		return ejecutarConsultaSimpleFila($sql);
	}
	public function contar($sWhere){
		$sql="SELECT count(i.*) AS cnt FROM
		ingresos  i
		INNER JOIN locales l ON i.id_local=l.id
		INNER JOIN empresas e ON l.id_empresa=e.id
		INNER JOIN proveedores pro ON i.id_proveedor=pro.id
		LEFT JOIN tablas td ON i.id_tipo_documento=td.id_tipo AND td.id_tabla='2'
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
		i.serie_documento AS \"i.serie_documento\",
		i.numero_documento AS \"i.numero_documento\",
		td.descripcion AS \"td.descripcion\",
		to_char(i.fecha,'dd/mm/YYYY') AS \"i.fecha\",
		to_char(i.fecha_creacion,'dd/mm/YY HH:MI AM') AS  \"i.fecha_creacion\",
		mc.descripcion AS \"mc.descripcion\",
		l.nombre AS \"l.nombre\",
		pro.razon_social AS \"pro.razon_social\",
		fp.descripcion AS \"fp.descripcion\",
		i.estado AS \"i.estado\"
		FROM
		ingresos i

		INNER JOIN locales l ON i.id_local=l.id
		INNER JOIN empresas e ON l.id_empresa=e.id
		INNER JOIN proveedores pro ON i.id_proveedor=pro.id
		LEFT JOIN tablas td ON i.id_tipo_documento=td.id_tipo AND td.id_tabla='2'
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

	public function registroCompras($desde,$hasta,$id_empresa,$id_proveedor)
	{

		$cri_emp="";
		if ($id_empresa!=''){
			$cri_emp="AND lo.id_empresa IN (";
			$aEmpresas=explode(",", $id_empresa);
			for ($i=0;$i<count($aEmpresas);$i++){
				$cri_emp.=$aEmpresas[$i].",";
			}
			$cri_emp=substr($cri_emp,0,strlen($cri_emp)-1).") ";
		}

		$cri_prov="";
		if ($id_proveedor!='*'){
			$cri_prov="AND ig.id_proveedor IN (";
			$aProv=explode(",", $id_proveedor);
			for ($i=0;$i<count($aProv);$i++){
				$cri_prov.=$aProv[$i].",";
			}
			$cri_prov=substr($cri_prov,0,strlen($cri_prov)-1).") ";
		}


		$sql="SELECT 
		ig.serie_documento,
		ig.numero_documento,
		pro.razon_social,
		td.descripcion AS tipo_documento,
		to_char(ig.fecha,'dd/mm/YYYY') AS fecha,
		i.id_ingreso,
		e.nombre as empresa,
		lo.nombre as local,
		lo.id_empresa,
		i.id_item,
		cat.nombre as item,
		i.factor,
		it.maneja_lote,
		i.factor,
		i.cantidad,
		i.costo_unitario_umc,
		l.numero_lote,
		l.fecha_vencimiento,
		c.descripcion AS categoria,
		m.descripcion AS marca,
		mon.descripcion AS  moneda,
		umi.descripcion AS unidad_medida_ingreso,
		i.id_lote
		FROM
		ingresos_detalle i
		INNER JOIN ingresos ig ON ig.id=i.id_ingreso
		INNER JOIN locales lo ON lo.id=ig.id_local
		INNER JOIN empresas e ON lo.id_empresa=e.id
		INNER JOIN items it ON i.id_item=it.id
		INNER JOIN catalogo cat ON cat.id=it.id_catalogo
		INNER JOIN proveedores pro ON ig.id_proveedor=pro.id
		LEFT JOIN tablas mon ON ig.id_moneda=mon.id_tipo AND mon.id_tabla='14'
		LEFT JOIN lotes l ON i.id_lote = l.id
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON it.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas td ON ig.id_tipo_documento=td.id_tipo AND td.id_tabla='2'
		LEFT JOIN tablas umi ON it.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' WHERE ig.fecha>='".$desde." 12:00 AM' 
		AND ig.fecha<='".$hasta." 11:59 PM' ".$cri_emp.$cri_prov."
		ORDER BY e.nombre,ig.fecha,razon_social,td.descripcion,serie_documento,numero_documento";
		return ejecutarConsulta($sql);
	}

	public function detalleIngreso($id_ingreso)
	{
		$sql="SELECT i.id_ingreso,
		lo.id_empresa,
		i.id_item,
		cat.nombre,
		i.factor,
		it.maneja_lote,
		i.factor,
		i.cantidad,
		i.costo_unitario_umc,
		l.numero_lote,
		l.fecha_vencimiento,
		c.descripcion AS categoria,
		m.descripcion AS marca,
		umi.descripcion AS unidad_medida_ingreso,
		i.id_lote
		FROM
		ingresos_detalle i
		INNER JOIN ingresos ig ON ig.id=i.id_ingreso
		INNER JOIN locales lo ON lo.id=ig.id_local
		INNER JOIN items it ON i.id_item=it.id
		INNER JOIN catalogo cat ON cat.id=it.id_catalogo
		LEFT JOIN lotes l ON i.id_lote = l.id
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON it.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas umi ON it.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' WHERE i.id_ingreso='$id_ingreso'";
		return ejecutarConsulta($sql);
	}
}

?>
