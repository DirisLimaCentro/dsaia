<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
Class Salida
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function registroSalidas($desde,$hasta,$id_empresa,$id_local)
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

		$cri_loc="";
		if ($id_local!='*'){
			$cri_loc="AND ig.id_local_ingreso IN (";
			$aProv=explode(",", $id_local);
			for ($i=0;$i<count($aProv);$i++){
				$cri_loc.=$aProv[$i].",";
			}
			$cri_loc=substr($cri_loc,0,strlen($cri_loc)-1).") ";
		}


		$sql="SELECT 
		ig.serie_documento,
		ig.numero_documento,
		(per.ape_paterno||' '||per.ape_materno||' '||per.nombres) as personal_traslado,
		td.descripcion AS tipo_documento,
		to_char(ig.fecha_salida,'dd/mm/YYYY') AS fecha,
		
		e.nombre as empresa,
		lo.nombre as local,
		lo.id_empresa,
		i.id_item,
		cat.nombre as item,
		it.maneja_lote,
		i.cantidad,
		it.precio_compra,
		l.numero_lote,
		l.fecha_vencimiento,
		c.descripcion AS categoria,
		m.descripcion AS marca,
		umi.descripcion AS unidad_medida_ingreso,
		i.id_lote
		FROM
		salidas_detalle i
		INNER JOIN salidas ig ON ig.id=i.id_salida
		INNER JOIN locales lo ON lo.id=ig.id_local_ingreso
		INNER JOIN empresas e ON lo.id_empresa=e.id
		INNER JOIN items it ON i.id_item=it.id
		INNER JOIN catalogo cat ON cat.id=it.id_catalogo
		INNER JOIN personal per ON ig.id_encargado_traslado=per.id
		LEFT JOIN lotes l ON i.id_lote = l.id
		LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
		LEFT JOIN tablas m ON it.id_marca=m.id_tipo AND m.id_tabla='5'
		LEFT JOIN tablas td ON ig.id_tipo_documento=td.id_tipo AND td.id_tabla='2'
		LEFT JOIN tablas umi ON it.id_medida_ing=umi.id_tipo AND umi.id_tabla='6' WHERE ig.fecha_salida>='".$desde." 12:00 AM' 
		AND ig.fecha_salida<='".$hasta." 11:59 PM' ".$cri_emp.$cri_loc."
		ORDER BY e.nombre,ig.fecha_salida,td.descripcion,serie_documento,numero_documento";
		return ejecutarConsulta($sql);
	}

	public function loadSerie($tipo_documento){
		$sql="select serie from tablas where id_tipo='$tipo_documento' and id_tabla='2'";
		return ejecutarConsultaSimpleFila($sql);

	}
	public function getLastNumber($tipo_documento,$serie_documento){
		$sql="select max(cast(trim(numero_documento) as int)) + 1 as maximo from salidas where serie_documento='$serie_documento' and id_tipo_documento='$tipo_documento'";
		return ejecutarConsultaSimpleFila($sql);

	}
	public function actualizarInsertarItem($accion,$id_salida,$id_item,$id_lote,$numero_lote,$cantidad,$factor,$fecha_vencimiento){


		if ($fecha_vencimiento==''){
			$param_fv='';
		}else{
			$param_fv=",'".$fecha_vencimiento."'";
		}

		if ($accion=='U'){
			$sql="SELECT sp_update_item_salida('$id_salida','$id_item',".(empty($id_lote)?'null':$id_lote).",'$numero_lote','$cantidad')";
		}else{
			$sql="SELECT sp_insert_item_salida('$id_salida','$id_item',".(empty($id_lote)?'null':$id_lote).",'$numero_lote','$cantidad')";
		}
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	public function actualizar($id_salida,$id_tipo_documento,$serie_documento,$numero_documento,$fecha_salida,$id_local_ingreso,$id_persona_traslado,$id_motivo_salida,$id_usuario,$observaciones){
		$fecha_salida=$fecha_salida.' '.date('H:i');
		$sql="SELECT sp_update_salida('$id_salida','$id_tipo_documento','$serie_documento','$numero_documento','$fecha_salida','$id_local_ingreso','$id_persona_traslado','$id_motivo_salida','$id_usuario','$observaciones')";
		return ejecutarConsulta($sql);
	}

	public function insertar($id_tipo_documento,$serie_documento,$numero_documento,	$id_local_ingreso,$id_persona_traslado,
		$id_motivo_salida,$observaciones,$detalle,$id_usuario,$fecha_salida,$id_requerimiento){

		$fecha_salida=$fecha_salida.' '.date('H:i');

		$sql="SELECT sp_create_salida ('$id_tipo_documento','$serie_documento','$numero_documento','$id_local_ingreso','$id_persona_traslado','$id_motivo_salida','$observaciones','$detalle','$id_usuario','$fecha_salida','$id_requerimiento')";
		//echo $sql;exit();
		return ejecutarConsulta($sql);

	}
	//Implementamos un método para insertar registros
	public function insertar_($nombre,$nombre_comercial,$direccion,$ruc,$telefono_fijo,$ubigeo,$celular,$email,$web,$facebook)
	{
		$sql="INSERT INTO proveedores (razon_social,nombre_comercial,direccion,id_ubigeo,ruc,
			telefono_fijo,id_usuario_crea,celular,e_mail,web,facebookk)
			VALUES ('$nombre_comercial','$nombre','$direccion','$ubigeo','$ruc','$telefono_fijo','1',$celular,$email,$web,$facebook)";
			//echo $sql;
			return ejecutarConsulta($sql);
		}

		//Implementamos un método para editar registros
		public function editar($id_proveedor,$nombre,$nombre_comercial,$direccion,$ruc,$telefono_fijo,$ubigeo,$celular,$email,$web,$facebook)
		{
			$sql="UPDATE proveedores SET razon_social='$nombre',nombre_comercial='$nombre_comercial',direccion='$direccion',
			id_ubigeo='$ubigeo',ruc='$ruc',telefono_fijo='$telefono_fijo',celular='$celular',e_mail='$email',web='$web',facebook='$facebook' WHERE id='$id_proveedor'";
			//echo $sql;exit();
			return ejecutarConsulta($sql);
		}

		//Implementamos un método para desactivar categorías
		public function desactivar($id_salida)
		{
			$sql="UPDATE salidas SET estado='0' WHERE id='$id_salida'";
			//echo $sql;exit();
			return ejecutarConsulta($sql);
		}

		//Implementamos un método para activar categorías
		public function activar($id_salida)
		{
			$sql="UPDATE salidas SET estado='1' WHERE id='$id_salida'";
			//echo $sql;exit();
			return ejecutarConsulta($sql);
		}


		public function verificaDisponibilidadLote($id_lote){
			$sql="SELECT  id_lote FROM salidas_detalle WHERE id_lote='$id_lote' LIMIT 1";
			return ejecutarConsulta($sql);
		}


		public function eliminaItem($id_salida,$id_item,$cantidad){
			$sql="SELECT sp_delete_item_salida('$id_salida','$id_item','$cantidad')";
			return ejecutarConsulta($sql);
		}

		public function mostrarItem($id_salida,$id_item){
			$sql="SELECT
			d.id_item,cat.nombre as item, d.cantidad ,
			d.id_lote,l.numero_lote,to_char(l.fecha_vencimiento,'dd/mm/yyyy') as fecha_vencimiento,
			c.descripcion AS categoria,
			m.descripcion AS marca,
			ums.descripcion AS unidad_medida_salida,
			umi.descripcion AS unidad_medida_ingreso,
			l.stock_actual,i.stock_real
			FROM
			salidas_detalle d
			INNER JOIN items i ON d.id_item=i.id
			INNER JOIN catalogo cat ON cat.id=i.id_catalogo
			LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
			LEFT JOIN tablas m ON i.id_marca=m.id_tipo AND m.id_tabla='5'
			LEFT JOIN tablas ums ON i.id_medida_sal=ums.id_tipo AND ums.id_tabla='6'
			LEFT JOIN tablas umi ON i.id_medida_ing=umi.id_tipo AND umi.id_tabla='6'
			LEFT JOIN lotes l ON l.id=d.id_lote
			WHERE d.id_salida='$id_salida' AND i.id='$id_item'";
			return ejecutarConsultaSimpleFila($sql);
		}
		//Implementar un método para mostrar los datos de un registro a modificar
		public function mostrar($id_salida)
		{
			$sql="SELECT
			s.id_tipo_documento,
			e.nombre as empresa,
			s.serie_documento,
			s.numero_documento,
			to_char(s.fecha_salida,'dd/mm/yyyy') fecha,
			s.id_local_ingreso,s.id_motivo_salida,s.id_encargado_traslado,
			to_char(s.fecha_creacion,'dd/mm/yyyy HH:MI AM') fecha_creacion,
			s.id_usuario_crea,
			l.id_empresa,
			us.login usuario_crea,s.observaciones,
			l.nombre as area_destino,
			(et.ape_paterno||' '||et.ape_materno||' '||et.nombres) as personal_traslado,s.id_requerimiento,
			r.numero as numero_requerimiento
			FROM
			salidas s
			INNER JOIN usuarios us ON us.id=s.id_usuario_crea
			INNER JOIN locales l ON l.id=s.id_local_ingreso
			INNER JOIN empresas e ON e.id=l.id_empresa
			LEFT JOIN personal et ON et.id=s.id_encargado_traslado
			LEFT JOIN requerimientos r ON r.id=s.id_requerimiento
			WHERE s.id='$id_salida'";
			//echo $sql;exit();
			return ejecutarConsultaSimpleFila($sql);
		}
		public function contar($sWhere){
			$sql="SELECT count(*) AS cnt
			FROM salidas s
			INNER JOIN tablas td on s.id_tipo_documento=td.id_tipo and td.id_tabla='2'
			INNER JOIN locales li on s.id_local_ingreso=li.id
			INNER JOIN empresas e on e.id=li.id_empresa
			INNER JOIN personal p on s.id_encargado_traslado=p.id ".$sWhere;
			return ejecutarConsultaSimpleFila($sql);
		}
		//Implementar un método para listar los registros
		public function listar($sWhere,$sOrder,$sLimit)
		{
			$sql="SELECT s.estado,s.id,td.descripcion as tipo_documento,s.serie_documento,s.numero_documento,li.nombre local_ingreso,
			to_char(s.fecha_salida,'dd/mm/yyyy') as fecha_salida,
			e.nombre as empresa,s.id_requerimiento,
			trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nombres) as persona
			FROM salidas s
			INNER JOIN tablas td on s.id_tipo_documento=td.id_tipo and td.id_tabla='2'
			INNER JOIN locales li on s.id_local_ingreso=li.id
			INNER JOIN empresas e on e.id=li.id_empresa
			INNER JOIN personal p on s.id_encargado_traslado=p.id ".$sWhere." ".$sOrder." ".$sLimit;
			//echo $sql;exit();
			return ejecutarConsulta($sql);
		}
		//Implementar un método para listar los registros y mostrar en el select
		public function select()
		{
			$sql="SELECT id,nombre FROM proveedores ORDER BY nombre";
			return ejecutarConsulta($sql);
		}
		public function detalleSalida($id_salida)
		{
			$sql="SELECT s.id_salida,em.id \"id_empresa\",
			s.id_item,
			cat.nombre,
			it.maneja_lote,
			s.cantidad,
			l.numero_lote,
			l.fecha_vencimiento,
			c.descripcion AS categoria,
			m.descripcion AS marca,
			ums.descripcion AS unidad_medida_ingreso,
			s.id_lote
			FROM
			salidas_detalle s
			INNER JOIN salidas sa ON s.id_salida=sa.id
			INNER JOIN items it ON s.id_item=it.id
			INNER JOIN catalogo cat ON cat.id=it.id_catalogo
			LEFT JOIN locales lo ON sa.id_local_ingreso=lo.id
			LEFT JOIN empresas em ON lo.id_empresa=em.id
			LEFT JOIN lotes l ON s.id_lote = l.id
			LEFT JOIN tablas c ON cat.id_grupo=c.id_tipo AND c.id_tabla='4'
			LEFT JOIN tablas m ON it.id_marca=m.id_tipo AND m.id_tabla='5'
			LEFT JOIN tablas ums ON it.id_medida_ing=ums.id_tipo AND ums.id_tabla='6'
			WHERE s.id_salida='$id_salida'
			";
			//echo $sql;exit();
			return ejecutarConsulta($sql);
		}


		public function listarDetallado($desde,$hasta)
		{
			$sql="SELECT s.estado,s.id,td.descripcion as tipo_documento,s.serie_documento,s.numero_documento,li.nombre area_destino,
			to_char(s.fecha_salida,'dd/mm/yyyy') as fecha_salida,
			e.nombre as empresa,s.id_requerimiento,
			trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nombres) as persona,
			(cat.nombre||' '||m.descripcion) as item,
			ums.descripcion AS unidad_medida_ingreso,
			ds.cantidad,
			l.numero_lote,
			l.fecha_vencimiento
			FROM salidas s
			INNER JOIN salidas_detalle ds on ds.id_salida=s.id						
			INNER JOIN tablas td on s.id_tipo_documento=td.id_tipo and td.id_tabla='2'
			INNER JOIN locales li on s.id_local_ingreso=li.id
			INNER JOIN empresas e on e.id=li.id_empresa
			INNER JOIN personal p on s.id_encargado_traslado=p.id 

			INNER JOIN items it ON ds.id_item=it.id
			INNER JOIN catalogo cat ON cat.id=it.id_catalogo
			LEFT JOIN tablas m ON it.id_marca=m.id_tipo AND m.id_tabla='5'
			LEFT JOIN tablas ums ON it.id_medida_ing=ums.id_tipo AND ums.id_tabla='6'
			LEFT JOIN lotes l ON ds.id_lote = l.id
			WHERE s.fecha_salida>='".$desde." 12:00 AM' and s.fecha_salida<='".$hasta." 11:59 PM' 
			ORDER BY s.fecha_salida,e.nombre,s.serie_documento,s.numero_documento ";
			//echo $sql;exit();
			return ejecutarConsulta($sql);
		}


	}

	?>
