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
		$id_persona,
		$id_acompanante,
		$ficha_persona,
		$ficha_animal,
		$historia_clinica,
		$id_especie,
		$id_raza,
		$fecha_atencion,
		$fecha_accidente,
		$ubigeo_accidente,
		$id_estado_actual_animal,
		$tipo_exposicion,
		$tipo_doc,
		$numero_doc,
		$nombres,
		$ape_paterno,
		$ape_materno,
		$edad,
		$sexo,
		$peso,
		$direccion_persona,
		$ubigeo_persona,
		$direccion_referencia,
		$telefono,
		$e_mail,
		$id_grado_instruccion,
		$tipo_doc_acompanante,
		$numero_doc_acompanante,
		$nombres_acompanante,
		$ape_paterno_acompanante,
		$ape_materno_acompanante,
		$mordedura,
		$aranazo,
		$contacto,
		$superficial,
		$profunda,
		$id_localizacion,
		$antecedentes_vacunacion,
		$enfermedad_actual,
		$otra_localizacion,
		$id_tipo_proteccion,
		$id_numero_lesiones,
		$id_estado_herida,
		$id_atencion_herida,
		$id_lugar_suceso,
		$fecha_vacunacion,
		$nro_dosis,
		$id_alergico,
		$descripcion_enfermedad,
		$id_tipo_propietario,
		$descripcion_otros,
		$id_situacion,
		$id_local,
		$id_usuario

		){

		if ($fecha_vacunacion==''){
			$strfv="null,";
		}else{
			$strfv="'$fecha_vacunacion',";
		}

		$sql="SELECT sp_crud_ficha_atencion_rabia(
		'$id_ficha',
		'$id_persona',
		'$id_acompanante',
		'$ficha_persona',
		'$ficha_animal',
		'$historia_clinica',
		'$id_especie',
		'$id_raza',
		'$fecha_atencion',
		'$fecha_accidente',
		'$ubigeo_accidente',
		'$id_estado_actual_animal',
		'$tipo_exposicion',
		'$tipo_doc',
		'$numero_doc',
		'$nombres',
		'$ape_paterno',
		'$ape_materno',
		'$edad',
		'$sexo',
		'$peso',
		'$direccion_persona',
		'$ubigeo_persona',
		'$direccion_referencia',
		'$telefono',
		'$e_mail',
		'$id_grado_instruccion',
		'$tipo_doc_acompanante',
		'$numero_doc_acompanante',
		'$nombres_acompanante',
		'$ape_paterno_acompanante',
		'$ape_materno_acompanante',
		'$mordedura',
		'$aranazo',
		'$contacto',
		'$superficial',
		'$profunda',
		'$id_localizacion',
		'$antecedentes_vacunacion',
		'$enfermedad_actual',
		'$otra_localizacion',
		'$id_tipo_proteccion',
		'$id_numero_lesiones',
		'$id_estado_herida',
		'$id_atencion_herida',
		'$id_lugar_suceso',
		".$strfv."
		'$nro_dosis',
		'$id_alergico',		
		'$descripcion_enfermedad',
		'$id_tipo_propietario',
		'$descripcion_otros',
		'$id_situacion',
		'$id_local',
		'$id_usuario'
		)";

		//return $sql;

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
		$sql="UPDATE ficha_virus_rabico_atencion SET estado=false WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql="UPDATE ficha_virus_rabico_atencion SET estado=true WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{

		$sql="select f.*,
		to_char(f.fecha_atencion,'dd/mm/yyyy') as fecha_atencion,
        to_char(f.fecha_accidente,'dd/mm/yyyy') as fecha_accidente,
        (ua.departamento||' - '||ua.provincia||' - '||ua.distrito) as ubigeo_accidente,
		l.nombre as establecimiento,		
        r.id_tipo_documento,
        r.numero_documento,
        r.nombres,r.ape_paterno,r.ape_materno,
        ac.id_tipo_documento as tipo_documento_ac,
        ac.numero_documento as numero_documento_ac,
        ac.nombres as nombres_ac,
        ac.ape_paterno as ape_paterno_ac,
        ac.ape_materno as ape_materno_ac,
        r.direccion as direccion_persona,
        r.id_ubigeo as id_ubigeo_persona,
        r.telefono,r.e_mail,r.sexo,r.id_grado_instruccion,r.direccion_referencia,
        (dp.departamento||' - '||dp.provincia||' - '||dp.distrito) as distrito_persona,        
        (select  array_to_json(array_agg( id_lesion_localizacion )) from ficha_virus_rabico_atencion_localizacion where
         ficha_virus_rabico_atencion_localizacion.id_ficha=f.id) as localizacion
		from ficha_virus_rabico_atencion f
		inner join locales l on l.id=f.id_local		
		inner join persona r on r.id=f.id_persona
        left join persona ac on ac.id=f.id_acompaniante
        inner join ubigeo ua on ua.id=f.id_distrito_accidente
        left join ubigeo dp on dp.id=r.id_ubigeo
        where f.id='$id'";


		return ejecutarConsulta($sql);
		
	}
	public function contar($sWhere){
		$sql="SELECT count(f.*) AS cnt 
		from ficha_virus_rabico_atencion f
		inner join locales l on l.id=f.id_local
		inner join persona r on r.id=f.id_persona
		inner join ubigeo ua on ua.id=f.id_distrito_accidente
		inner join usuarios uc on uc.id=f.id_usuario_crea
		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="select f.id  as \"f.id\",
		to_char(f.fecha_atencion,'dd-mm-yyyy') as \"f.fecha_atencion\",
		to_char(f.fecha_accidente,'dd-mm-yyyy') as \"f.fecha_accidente\",
		l.nombre as \"l.nombre\",		
		f.estado as \"f.estado\",
		(r.ape_paterno||' '||r.ape_materno||' '||r.nombres) as persona,
		uc.login as \"uc.login\",
		ua.distrito as \"ua.distrito\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
		from ficha_virus_rabico_atencion f
		inner join locales l on l.id=f.id_local
		inner join persona r on r.id=f.id_persona
		inner join ubigeo ua on ua.id=f.id_distrito_accidente
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