<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ficha
{
	//Implementamos nue
	public function __construct()
	{

	}

	public function reportLecturaPh($anio,$mes){
		$sql="select case when fd.cnt_ph>=6.5 and fd.cnt_ph<=8.5 then 'Dentro del V.N.' else 'Fuera del V.N.' end 
		as title,count(fd.*) as cantidad
		from ficha_cloro fc
		inner join ficha_cloro_detalle fd on fc.id=fd.id_ficha
		where fc.nro_mes='$mes' and nro_anio='$anio' and fc.estado=true
		group by case when fd.cnt_ph>=6.5 and fd.cnt_ph<=8.5 then 'Dentro del V.N.' else 'Fuera del V.N.' end ";
		return ejecutarConsulta($sql);
	}

	public function reportLecturaCloro($anio,$mes){
		$sql="select case when fd.cnt_ppm>=0.5 and fd.cnt_ppm<=1.5 then 'Dentro del V.N.' when fd.cnt_ppm<0.5 then 'Fuera del V.N.' end 
		as title,count(fd.*) as cantidad
		from ficha_cloro fc
		inner join ficha_cloro_detalle fd on fc.id=fd.id_ficha
		where fc.nro_mes='$mes' and nro_anio='$anio' and fc.estado=true
		group by case when fd.cnt_ppm>=0.5 and fd.cnt_ppm<=1.5 then 'Dentro del V.N.' when fd.cnt_ppm<0.5 then 'Fuera del V.N.' end";
		return ejecutarConsulta($sql);
	}

	public function reportLecturaTurbidez($anio,$mes){
		$sql="select case when fd.cnt_turbidez<=5 then 'Dentro del V.N.' else 'Fuera del V.N.' end 
		as title,count(fd.*) as cantidad
		from ficha_cloro fc
		inner join ficha_cloro_detalle fd on fc.id=fd.id_ficha
		where fc.nro_mes='$mes' and nro_anio='$anio' and fc.estado=true
		group by case when fd.cnt_turbidez<=5 then 'Dentro del V.N.' else 'Fuera del V.N.' end";
		return ejecutarConsulta($sql);
	}

	public function reportAedico($mes,$anio,$tipo){
		$sql="select ris,sum(inspeccionados) as inspeccionados,sum(positivos) as positivos from (
		select l.ris,count(d.*) as  inspeccionados,0 as positivos
		from 
		ficha_vivienda_detalle d
		inner join ficha_vivienda f on f.id=d.id_ficha_vivienda
		inner join locales l on l.id=f.id_local
		where date_part('month',fecha_inicio)='$mes'
		and date_part('year',fecha_inicio)='$anio'
		and id_condicion_vivienda='2'
		group by l.ris
		union all
		select l.ris,0 as inspeccionados, count(d.*) as  positivos
		from 
		ficha_vivienda_detalle d
		inner join ficha_vivienda f on f.id=d.id_ficha_vivienda
		inner join locales l on l.id=f.id_local
		where date_part('month',fecha_inicio)='$mes'
		and date_part('year',fecha_inicio)='$anio'
		and id_condicion_vivienda='6'
		group by l.ris
	)x group by ris order by ris";
	return ejecutarConsulta($sql);
}
	public function reportConsolidadoAedes($mes,$anio,$tipo){
		$let=strtolower($tipo);
		$sql="select l.ris,
		sum(cnt_tipo_1_".$let.") as tot1,
		sum(cnt_tipo_2_".$let.") as tot2,
		sum(cnt_tipo_3_".$let.") as tot3,
		sum(cnt_tipo_4_".$let.") as tot4,
		sum(cnt_tipo_5_".$let.") as tot5,
		sum(cnt_tipo_6_".$let.") as tot6,
		sum(cnt_tipo_7_".$let.") as tot7,
		sum(cnt_tipo_8_".$let.") as tot8,
		sum(cnt_tipo_9_".$let.") as tot9
		from ficha_vivienda_detalle d
		inner join ficha_vivienda f on f.id=d.id_ficha_vivienda
		inner join locales l on l.id=f.id_local
		where date_part('month',fecha_inicio)='$mes'
		and date_part('year',fecha_inicio)='$anio'
		group by l.ris";

		return ejecutarConsulta($sql);

	}
	public function resumenAedes($mes,$anio){
		$sql="select  split_part(keyo,'|',1) as anio, split_part(keyo,'|',2) as mes,
		split_part(keyo,'|',3) as actividad, split_part(keyo,'|',4) as distrito, split_part(keyo,'|',5) as establecimiento,
		split_part(keyo,'|',6) as ris,
		
		sum(\"VIVIENDAS INSPECCIONADAS\") as \"viviendas_inspeccionadas\",
		sum(\"CASAS RENUENTES\") as \"casas_renuentes\",
		sum(\"CASAS CERRADAS\") as \"casas_cerradas\",
		sum(\"CASAS DESHABITADAS\") as \"casas_deshabitadas\",
		sum(\"VIVIENDA POSITIVA\") as \"vivienda_positivas\",
		sum(\"VIVIENDA TRATADA CON LARVICIDA\") as \"vivienda_larvicidas\",
		sum(\"DEPOSITOS DESTRUIDOS\") as \"depositos_destruidos\",
		sum(nro_habitantes) as nro_habitantes,
		sum(tot_i_1) as tot_i_1,
		sum(tot_p_1) as tot_p_1,
		sum(tot_t_1) as tot_t_1,

		sum(tot_i_2) as tot_i_2,
		sum(tot_p_2) as tot_p_2,
		sum(tot_t_2) as tot_t_2,

		sum(tot_i_3) as tot_i_3,
		sum(tot_p_3) as tot_p_3,
		sum(tot_t_3) as tot_t_3,

		sum(tot_i_4) as tot_i_4,
		sum(tot_p_4) as tot_p_4,
		sum(tot_t_4) as tot_t_4,

		sum(tot_i_5) as tot_i_5,
		sum(tot_p_5) as tot_p_5,
		sum(tot_t_5) as tot_t_5,

		sum(tot_i_6) as tot_i_6,
		sum(tot_p_6) as tot_p_6,
		sum(tot_t_6) as tot_t_6,

		sum(tot_i_7) as tot_i_7,
		sum(tot_p_7) as tot_p_7,
		sum(tot_t_7) as tot_t_7,

		sum(tot_i_8) as tot_i_8,
		sum(tot_p_8) as tot_p_8,
		sum(tot_t_8) as tot_t_8,

		sum(tot_i_9) as tot_i_9,
		sum(tot_p_9) as tot_p_9,
		sum(tot_t_9) as tot_t_9


		from (
		select *,
		0 nro_habitantes,
		0 tot_i_1,
		0 tot_p_1,
		0 tot_t_1,
		0 tot_i_2,
		0 tot_p_2,
		0 tot_t_2,
		0 tot_i_3,
		0 tot_p_3,
		0 tot_t_3,
		0 tot_i_4,
		0 tot_p_4,
		0 tot_t_4,
		0 tot_i_5,
		0 tot_p_5,
		0 tot_t_5,
		0 tot_i_6,
		0 tot_p_6,
		0 tot_t_6,
		0 tot_i_7,
		0 tot_p_7,
		0 tot_t_7,
		0 tot_i_8,
		0 tot_p_8,
		0 tot_t_8,
		0 tot_i_9,
		0 tot_p_9,
		0 tot_t_9

		from crosstab (
		'select concat(date_part(''year'',f.fecha_inicio),''|'',
		substring(to_char(f.fecha_inicio,''TMMonth''),1,3),''|'',a.descripcion,''|'',
		u.distrito,''|'',l.nombre,''|'',l.ris) as keyo,
		tc.descripcion as condicion_vivienda,
		count(fd.id_condicion_vivienda) as cnt_condicion_vivienda
		from ficha_vivienda f
		inner join ficha_vivienda_detalle fd on fd.id_ficha_vivienda=f.id
		inner join locales l on l.id=f.id_local
		inner join tablas a on a.id_tipo=f.id_tipo_actividad and a.id_tabla=''18''
		inner join ubigeo u on u.id=l.id_ubigeo
		inner join tablas tc on tc.id_tipo=fd.id_condicion_vivienda and tc.id_tabla=''19''
		where f.estado=true and date_part(''year'',fecha_inicio)=".$anio." and date_part(''month'',fecha_inicio)=".$mes." 
		group by date_part(''year'',f.fecha_inicio),to_char(f.fecha_inicio,''TMMonth''),
		a.descripcion,u.distrito,l.nombre,l.ris,
		tc.descripcion','select descripcion as condicion_vivienda from tablas where id_tabla=''19'' order by id_tipo::int') as (
		keyo text,
		
		\"VIVIENDAS INSPECCIONADAS\" int,
		\"CASAS RENUENTES\" int,
		\"CASAS CERRADAS\" int,
		\"CASAS DESHABITADAS\" int,
		\"VIVIENDA POSITIVA\" int,
		\"VIVIENDA TRATADA CON LARVICIDA\" int,
		\"DEPOSITOS DESTRUIDOS\" int) 
		union all

		select concat(date_part('year',f.fecha_inicio),'|',
		substring(to_char(f.fecha_inicio,'TMMonth'),1,3),'|',a.descripcion,'|',
		u.distrito,'|',l.nombre,'|',l.ris) as keyo,
		
		0 as \"VIVIENDAS INSPECCIONADAS\",
		0 as \"CASAS RENUENTES\",
		0 as \"CASAS CERRADAS\",
		0 as \"CASAS DESHABITADAS\",
		0 as \"VIVIENDA POSITIVA\",
		0 as \"VIVIENDA TRATADA CON LARVICIDA\",
		0 as \"DEPOSITOS DESTRUIDOS\",
		sum(nro_habitantes) as nro_habitantes,
		sum(cnt_tipo_1_i) as tot_i_1,
		sum(cnt_tipo_1_p) as tot_p_1,
		sum(cnt_tipo_1_t) as tot_t_1,
		sum(cnt_tipo_2_i) as tot_i_2,
		sum(cnt_tipo_2_p) as tot_p_2,
		sum(cnt_tipo_2_t) as tot_t_2,
		sum(cnt_tipo_3_i) as tot_i_3,
		sum(cnt_tipo_3_p) as tot_p_3,
		sum(cnt_tipo_3_t) as tot_t_3,
		sum(cnt_tipo_4_i) as tot_i_4,
		sum(cnt_tipo_4_p) as tot_p_4,
		sum(cnt_tipo_4_t) as tot_t_4,
		sum(cnt_tipo_5_i) as tot_i_5,
		sum(cnt_tipo_5_p) as tot_p_5,
		sum(cnt_tipo_5_t) as tot_t_5,
		sum(cnt_tipo_6_i) as tot_i_6,
		sum(cnt_tipo_6_p) as tot_p_6,
		sum(cnt_tipo_6_t) as tot_t_6,
		sum(cnt_tipo_7_i) as tot_i_7,
		sum(cnt_tipo_7_p) as tot_p_7,
		sum(cnt_tipo_7_t) as tot_t_7,
		sum(cnt_tipo_8_i) as tot_i_8,
		sum(cnt_tipo_8_p) as tot_p_8,
		sum(cnt_tipo_8_t) as tot_t_8,
		sum(cnt_tipo_9_i) as tot_i_9,
		sum(cnt_tipo_9_p) as tot_p_9,
		sum(cnt_tipo_9_t) as tot_t_9
		from ficha_vivienda f
		inner join ficha_vivienda_detalle fd on fd.id_ficha_vivienda=f.id
		inner join locales l on l.id=f.id_local
		inner join tablas a on a.id_tipo=f.id_tipo_actividad and a.id_tabla='18'
		inner join ubigeo u on u.id=l.id_ubigeo
		where f.estado=true and date_part('year',fecha_inicio)=".$anio." and date_part('month',fecha_inicio)=".$mes." 
		group by date_part('year',f.fecha_inicio),to_char(f.fecha_inicio,'TMMonth'),
		a.descripcion,u.distrito,l.nombre,l.ris
	) x group by keyo";
	return ejecutarConsulta($sql);
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
	public function eliminaItem($id){
		$sql="delete from ficha_cloro_detalle where id='$id'";
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

	public function save($id_ficha,$id_local,$nro_anio,$fecha_emision,
		$id_mes,$id_ambito,$id_usuario){

		$sql="SELECT sp_crud_header_ficha_cloro('$id_ficha','$id_local','$nro_anio','$fecha_emision','$id_mes','$id_ambito','$id_usuario')";

		return ejecutarConsulta($sql);

	}

	public function saveFichaDetalle($id_ficha,$id_ficha_detalle,$razon_social,
		$id_sist_abastecimiento,$direccion_localidad,$este,$norte,$altitud,
		$fecha_vigilancia,$hora,$turbidez,$ph,$cloro,$horario,$localidad,$id_usuario
		){


		$tur=($turbidez=='')?"null":"'".$turbidez."'";
		$ph=($ph=='')?"null":"'".$ph."'";

		$sql="SELECT sp_crud_body_ficha_cloro(
		'$id_ficha',
		'$id_ficha_detalle',
		'$razon_social',
		'$id_sist_abastecimiento',
		'$direccion_localidad',
		'$este',
		'$norte',
		'$altitud',
		'$fecha_vigilancia',
		'$hora',
		".$tur.",
		".$ph.",
		'$cloro',
		'$horario',
		'$localidad',
		'$id_usuario')";

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
	public function desactivar($id_ficha)
	{
		$sql="UPDATE ficha_vivienda SET estado=false,fecha_estado=now() WHERE id='$id_ficha'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_ficha)
	{
		$sql="UPDATE ficha_vivienda SET estado=true,fecha_estado=now() WHERE id='$id_ficha'";
		return ejecutarConsulta($sql);
	}

	

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="select f.id,
		f.id_local  as id_local,
		to_char(f.fecha_emision,'dd/mm/yyyy')  as fecha_emision,		
		f.id_ambito,
		f.nro_anio,
		f.nro_mes,u.provincia,u.distrito,
		l.nombre   as establecimiento,
		uc.login   as usuario_crea,
		to_char(f.fecha_creacion,'dd/mm/yyyy HH:MI AM')  as fecha_creacion
		from  ficha_cloro f
		inner join locales l on l.id=f.id_local
		left join ubigeo u on u.id=l.id_ubigeo		
		left join usuarios uc on uc.id=f.id_usuario_crea 
		where f.id='$id'";


		return ejecutarConsultaSimpleFila($sql);
	}

	public function getItem($id)
	{
		$sql="select d.*,to_char(fecha_vigilancia,'dd/mm/yyyy') as fecha_vig,u.distrito from ficha_cloro_detalle d 
			left join ubigeo u on u.id=d.id_distrito
			where d.id='$id'";
		return ejecutarConsulta($sql);
	}

	public function detalleFicha($id)
	{
		$sql="select d.*, ta.descripcion as tipo_abastecimiento,u.distrito
		from ficha_cloro_detalle d 
		inner join tablas ta on d.id_sist_abastecimiento=ta.id_tipo and ta.id_tabla='59'
		left join ubigeo u on u.id=d.id_distrito
		where d.id_ficha='$id'
		";
		return ejecutarConsulta($sql);
	}

	public function contar($sWhere){
		$sql="SELECT count(f.*) AS cnt 
		from  ficha_cloro f
		inner join locales l on l.id=f.id_local
		inner join tablas ta on ta.id_tipo=f.id_ambito and ta.id_tabla='58'
		inner join tablas m on m.id_tipo=f.nro_mes and m.id_tabla='66'
		left join usuarios uc on uc.id=f.id_usuario_crea

		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		//$sql="SELECT e.*,u.distrito FROM empresas e
		//LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;

		$sql="
		select f.id  as \"f.id\",
		f.id_local  as \"f.id_local\",
		f.fecha_emision  as \"f.fecha_emision\",
		f.nro_mes  as \"f.nro_mes\",
		f.id_ambito  as \"f.id_ambito\",
		f.nro_anio  as \"f.nro_anio\",		
		ta.descripcion as \"ta.descripcion\",
		m.descripcion as \"m.descripcion\",
		l.nombre   as \"l.nombre\",
		uc.login   as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		f.estado  as \"f.estado\",
		to_char(f.fecha_creacion,'dd/mm/yyyy HH:MI AM')  as \"f.fecha_creacion\"
		from  ficha_cloro f
		inner join locales l on l.id=f.id_local
		inner join tablas ta on ta.id_tipo=f.id_ambito and ta.id_tabla='58'
		inner join tablas m on m.id_tipo=f.nro_mes and m.id_tabla='66'
		left join usuarios uc on uc.id=f.id_usuario_crea
		".$sWhere." ".$sOrder." ".$sLimit;
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
