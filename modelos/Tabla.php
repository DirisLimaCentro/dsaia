<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Tabla
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}



	public function selectSemanaEpi(){
		$sql="SELECT id, (numero::varchar||'. '||'DEL '||to_char(desde,'dd-mm-yyyy')||' AL '||to_char(hasta,'dd-mm-yyyy'))
			as nombre
		from semanas_epi where date_part('year',desde)=date_part('year',desde) order by numero";
		return ejecutarConsulta($sql);
	}
	public function selectCombo($id_tabla){
		$sql="select id_tipo as id,descripcion as nombre from tablas where id_tabla='$id_tabla'
			order by descripcion";
		return ejecutarConsulta($sql);	
	}

	public function findLocalidad($name,$sector,$id_local)
	{
		$sql="select id,descripcion as nombre from localidades where id_local='$id_local' and sector='$sector' 		
		 and descripcion like '%".mb_strtoupper($name, 'UTF-8')."%' ORDER BY 2 ";
		return ejecutarConsulta($sql);
	}


	public function selectMenus()
	{
		$sql="SELECT id, descripcion as nombre FROM menu ORDER BY orden";
		return ejecutarConsulta($sql);		
	}
	public function selectMenusDetalle($id_menu)
	{
		$sql="SELECT id, descripcion as nombre FROM menu_detalle WHERE id_menu='$id_menu' ORDER BY orden";
		return ejecutarConsulta($sql);		
	}
	public function listAccesos($id_usuario,$id_menu){
		$cri='';	
		if ($id_menu!=''){
			$cri=" and m.id='".$id_menu."' ";
		}
		$sql="select m.descripcion as menu,m.id as id_menu,md.id as id_menu_detalle,
		md.descripcion as menu_detalle,m.icono,
		md.link_menu from accesos a 
		inner join menu_detalle md on a.id_menu_detalle=md.id
		inner join menu m on m.id=md.id_menu
		where a.id_usuario='$id_usuario'".$cri." order by m.orden,md.orden";
		return ejecutarConsulta($sql);
	}
	public function listarTablas($sWhere,$sOrder,$sLimit)	{
		$sql="select id_tabla,id_tipo,descripcion,abreviado,estado,fecha_creacion FROM tablas ".$sWhere." ".$sOrder." ".$sLimit;
		return ejecutarConsulta($sql);
	}
	public function contarTablas($sWhere)	{
		$sql="select count(*) AS cnt from tablas ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementamos un método para insertar registros
	public function insertarselect($idtabla,$descripcion,$abreviado)
	{
		$sqla="select max(cast(trim(id_tipo) as int)) + 1 as maximo from tablas where id_tabla='$idtabla'";
		$rsmax=ejecutarConsulta($sqla);
		$max= pg_fetch_result($rsmax,0,'maximo');
		if (empty($max)) $max='1';
		$sql="INSERT INTO tablas (id_tabla,id_tipo,descripcion,abreviado,id_usuario_crea)
		VALUES ('$idtabla','$max','$descripcion','$abreviado','1')";
		return ejecutarConsulta($sql);
	}


	public function crud($accion,$idtabla,$idtipo,$descripcion,$abreviado)	{
		if ($accion=='I'){
			$sqla="select max(cast(trim(id_tipo) as int)) + 1 as maximo from tablas where id_tabla='$idtabla'";
			$rsmax=ejecutarConsulta($sqla);
			$max= pg_fetch_result($rsmax,0,'maximo');
			if (empty($max)) $max='1';
			$sql="INSERT INTO tablas (id_tabla,id_tipo,descripcion,abreviado,id_usuario_crea) VALUES ('$idtabla','$max','$descripcion','$abreviado','1')";
		}else{
			$sql="UPDATE tablas SET descripcion='$descripcion', abreviado='$abreviado',id_usuario_modifica='1'  WHERE id_tabla='$idtabla' AND id_tipo='$idtipo'";	
		}	
		return ejecutarConsulta($sql);
	}



	//Implementamos un método para insertar registros
	public function insertar($nombre,$direccion,$ubigeo,$ruc,$telefono_fijo)
	{
		$sql="INSERT INTO empresas (nombre,direccion,id_ubigeo,ruc,
		telefono_fijo,id_usuario_crea)
		VALUES ('$nombre','$direccion','$ubigeo','$ruc','$telefono_fijo','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_empresa,$nombre,$direccion,$ubigeo,$ruc,$telefono_fijo)
	{
		$sql="UPDATE empresas SET nombre='$nombre',direccion='$direccion',
		id_ubigeo='$ubigeo',ruc='$ruc',telefono_fijo='$telefono_fijo' WHERE id='$id_empresa'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_empresa)
	{
		$sql="UPDATE empresas SET estado='0' WHERE id='$id_empresa'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_empresa)
	{
		$sql="UPDATE empresas SET estado='1' WHERE id='$id_empresa'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_tipo,$id_tabla)
	{
		$sql="SELECT i.id_tabla,i.id_tipo,i.descripcion,i.abreviado,t.descripcion as tabla FROM tablas i 
			INNER JOIN tablas t ON t.id_tipo=i.id_tabla AND t.id_tabla='0' 
			WHERE i.id_tabla='$id_tabla' and i.id_tipo='$id_tipo'";
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
	public function select($id_tabla,$ids=NULL)
	{
		$filter='';
		if (isset($ids)){
			$filter="AND id_tipo IN (";
			$aids=explode(',',$ids);
			for($i=0;$i<count($aids);$i++){
				 $filter.="'".$aids[$i]."',";
			}
			$filter.="'') ";
		}	
		$sql="SELECT id_tipo,descripcion FROM tablas
		 WHERE estado='1' and protegido<>'1' AND id_tabla='$id_tabla'".$filter." ORDER BY descripcion";
		return ejecutarConsulta($sql);
	}
	public function selectFilter($id_tabla)
	{
		$sql="SELECT id_tipo,descripcion FROM tablas WHERE id_tabla='$id_tabla' and id_tipo in ('5') ORDER BY descripcion";
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
