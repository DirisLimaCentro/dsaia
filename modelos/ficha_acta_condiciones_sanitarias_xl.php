<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ficha
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function save(
			$id_ficha,
			$fecha_inicio,
			$hora_inicio,
			$fecha_termino,
			$hora_termino,
			$id_entidad,
			
			$ruc,
			$razon_social,
			$direccion_empresa,
			$ubigeo,
			$telefono_fijo_empresa,
			$celular_empresa,
			$email_empresa,
			$responsable_establecimiento,
			$licencia,

			$responsable_calidad,
			$cargo,
			$dias_actividad,
			$tipo_establecimiento,
			$nro_hombres,
			$tipo_qaliwarma,



			$id_usuario,
			$id_local,
			$datos

	){



		$sql="SELECT sp_crud_ficha_acta_condiciones_sanitarias_xl(
		
			'$id_ficha',
			'$fecha_inicio',
			'$hora_inicio',
			'$fecha_termino',
			'$hora_termino',
			'$id_entidad',			
			'$ruc',
			'$razon_social',
			'$direccion_empresa',
			'$ubigeo',
			'$telefono_fijo_empresa',
			'$celular_empresa',
			'$email_empresa',
			'$responsable_establecimiento',
			'$licencia',
		
			'$responsable_calidad',
			'$cargo',
			'$dias_actividad',
			'$tipo_establecimiento',
			'$nro_hombres',
			'$tipo_qaliwarma',
		
			
			'$id_usuario',
			'$id_local',
			'$datos'

		)";

		//echo $sql;

		return ejecutarConsulta($sql);

	}

	public function deleteLocalidad($id)
	{
		$sql="DELETE FROM localidades where id='$id'";
		return ejecutarConsulta($sql);
	}

	public function mostrarLocalidad($id){
		$sql="select * from localidades where id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function saveLocalidad($id_localidad,$id_local,$sector,$nombre,$cnt_viviendas,$id_usuario){
		$sql="select sp_crud_localidad('$id_localidad','$id_local',
		'$sector','$nombre','$cnt_viviendas','$id_usuario')";
		return ejecutarConsulta($sql);
	}
	public function contarLocalidades($sWhere){
		$sql="SELECT count(*) AS cnt FROM 
			localidades l
			inner join tablas sec on sec.id_tipo::int=l.sector and sec.id_tabla='17'
			".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listarLocalidades($sWhere,$sOrder,$sLimit)
	{
		//$sql="SELECT e.*,u.distrito FROM empresas e
		//LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;

		$sql="SELECT
			l.id as \"l.id\",
			l.descripcion as \"l.descripcion\",
			l.sector as \"l.sector\",
			l.cnt_viviendas as \"l.cnt_viviendas\",
			sec.descripcion as \"sec.descripcion\"
			from localidades l
			inner join tablas sec on sec.id_tipo::int=l.sector and sec.id_tabla='17'

		 ".$sWhere." ".$sOrder." ".$sLimit;
		//return  $sql;
		//echo $sql;
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
	public function desactivar($id)
	{
		$sql="UPDATE ficha_acta_condiciones_sanitarias_xl SET estado=false WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE ficha_acta_condiciones_sanitarias_xl SET estado=true WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{

		$sql="
		select 
		f.*,
		l.nombre as establecimiento,
		e.nombre as razon_social,
    	e.direccion as direccion_empresa,
		e.ruc as ruc,
		e.id_ubigeo as id_ubigeo_empresa,
		(de.departamento||' - '||de.provincia||' - '||de.distrito) as distrito_empresa,
        e.telefono_fijo as telefono_fijo_empresa,
        e.celular as celular_empresa,
        e.e_mail as email_empresa,
		to_char(f.fecha_inicio,'dd/mm/yyyy') as fecha_ini,
		to_char(f.fecha_fin,'dd/mm/yyyy') as fecha_ter,
		uc.login       
		from ficha_acta_condiciones_sanitarias_xl f
		inner join locales l on l.id=f.id_local
		inner join entidad e on e.id=f.id_entidad
		inner join usuarios uc on uc.id=f.id_usuario_crea
		left join ubigeo de on de.id=e.id_ubigeo
        
        where f.id='$id'";


		return ejecutarConsulta($sql);
		
	}
	public function contar($sWhere){
		$sql="SELECT count(f.*) AS cnt 
		from ficha_acta_condiciones_sanitarias_xl f
		inner join locales l on l.id=f.id_local
		inner join entidad e on e.id=f.id_entidad
		inner join usuarios uc on uc.id=f.id_usuario_crea
		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="select f.id  as \"f.id\",
		to_char(f.fecha_inicio,'dd-mm-yyyy') as \"f.fecha_inicio\",
		l.nombre as \"l.nombre\",
		e.nombre as \"e.nombre\",
		e.ruc as \"e.ruc\",
		f.estado as \"f.estado\",
		f.responsable_calidad as \"f.responsable_calidad\",
		uc.login as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
		from ficha_acta_condiciones_sanitarias_xl f
		inner join locales l on l.id=f.id_local
		inner join entidad e on e.id=f.id_entidad
		inner join usuarios uc on uc.id=f.id_usuario_crea".$sWhere." ".$sOrder." ".$sLimit;
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


}

?>