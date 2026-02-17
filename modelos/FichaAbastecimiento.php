<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Ficha
{
	//Implementamos nuestro constructor
	public function __construct()
	{
	}

	public function reportLimpiezaCisterna($anio){
		$sql="select case when title='' then 'No Indica' when title='0' then '0 años' when title='1' then '1 año' when title='2' then '2 año' else '3 años a mas' end as title,count(*) as cantidad from 
		(select 
		case when fecha_ultima_limpieza is not null then
		date_part('year',age(now(),fecha_ultima_limpieza))::varchar
		else '' end 
		as title from ficha_sistema_abastecimiento
		where date_part('year',fecha_registro) ='$anio' and estado=true
		)x group by title order by 1";
		return ejecutarConsulta($sql);
	}

	public function reportAntiguedadCisterna($anio){
		$sql="select case when antiguedad_instalacion<1 then '0 años' 
		when antiguedad_instalacion>=1 and antiguedad_instalacion<=10 then '1 a 10 años' 
		when antiguedad_instalacion>=11 and antiguedad_instalacion<=20 then '11 a 20 años' 
		when antiguedad_instalacion>=21 then '21 años a mas' end as title,count(*) as cantidad
		from ficha_sistema_abastecimiento
		where date_part('year',fecha_registro) ='$anio' and estado=true
		group by 
		case when antiguedad_instalacion<1 then '0 años' 
		when antiguedad_instalacion>=1 and antiguedad_instalacion<=10 then '1 a 10 años' 
		when antiguedad_instalacion>=11 and antiguedad_instalacion<=20 then '11 a 20 años' 
		when antiguedad_instalacion>=21 then '21 años a mas' end order by 1";
		return ejecutarConsulta($sql);
	}

	public function reportLecturaCloro($anio){
		$sql="select case when cloro_residual>=0 and cloro_residual<=0.4 then '0 a 0.4 ppm' when cloro_residual>=0.5 then '>= 0.5' end as title,
		count(*) as cantidad
		from ficha_sistema_abastecimiento
		where date_part('year',fecha_registro) ='$anio' and estado=true
		group by case when cloro_residual>=0 and cloro_residual<=0.4 then '0 a 0.4 ppm' when cloro_residual>=0.5 then '>= 0.5' end";
		return ejecutarConsulta($sql);
	}

	public function reportExaBac($anio){
		$sql="select case when toma_muestra_am='1' then 'Si' else 'No' end as title,count(*) as cantidad from 
		ficha_sistema_abastecimiento 
		where date_part('year',fecha_registro) ='$anio' and estado=true
		group by toma_muestra_am";
		return ejecutarConsulta($sql);
	}

	public function reportTanques($anio){
		$sql="select case when id_tipo_sistema<>'1' then 'Si' else 'No' end as title,
		count(*) as cantidad
		from
		ficha_sistema_abastecimiento 
		where date_part('year',fecha_registro) ='$anio' and estado=true
		group by case when id_tipo_sistema<>'1' then 'Si' else 'No' end";
		return ejecutarConsulta($sql);
	}


	public function reportFuncionamientoTanques($anio){
		$sql="select case when funciona_sistema_abastecimiento='1' then 'Si funciona' else 'No funciona' end as title,
		count(*) as cantidad
		from
		ficha_sistema_abastecimiento 
		where date_part('year',fecha_registro) ='$anio' and estado=true
		group by case when funciona_sistema_abastecimiento='1' then 'Si funciona' else 'No funciona' end";
		return ejecutarConsulta($sql);
	}

	public function save(
		$id_ficha,
		$id_local,
		$fecha_registro,
		$numero_suministro,
		$id_tipo_sistema,
		$numero_bombas,
		$potencia_bomba,
		$numero_tanques_elevados,
		$funciona_sistema_abastecimiento,
		$numero_sistemas_con_grifo,
		$antiguedad_instalacion,
		$conservacion_tuberias_tanque,
		$conservacion_hidro_llave,
		$horario_abastecimiento,
		$numero_grifos_agua,
		$cuenta_tanque_anexo,
		$capacidad_tanque_elevado,
		$capacidad_cisterna,
		$volumen_agua_promedio_anual,
		$distancia_cisterna_punto,
		$animales_cinco_metros,
		$tiene_cerco_perimetral_tanque,
		$posible_ingreso_ajenos,
		$material_tapa_adecuado,
		$tapa_tanque_buen_estado,
		$tanque_presenta_fisuras,
		$paredes_interiores_limpias,
		$natas_flotantes_tanque,
		$posible_ingreso_lluvia,
		$residuos_solidos_cercanos,
		$tiene_cerco_perimetral_cisterna,
		$boca_cisterna_raz_piso,
		$inservibles_cercanos,
		$fecha_muestreo,
		$hora_muestreo,
		$punto_muestreo,
		$cloro_residual,
		$ph,
		$frecuencia_medicion_cloro,
		$toma_muestra_am,
		$fecha_ultima_limpieza,
		$empresa_realizo_servicio,
		$id_usuario
	) {
		$fecha_muestreo=($fecha_muestreo=='')?"null":"'".$fecha_muestreo."'";
		$fecha_ultima_limpieza=($fecha_ultima_limpieza=='')?"null":"'".$fecha_ultima_limpieza."'";
		

		$sql = "SELECT sp_crud_ficha_sistema_abastecimiento_agua(		
		'$id_ficha',
		'$id_local',
		'$fecha_registro',
		'$numero_suministro',
		'$id_tipo_sistema',
		'$numero_bombas',
		'$potencia_bomba',
		'$numero_tanques_elevados',
		'$funciona_sistema_abastecimiento',
		'$numero_sistemas_con_grifo',
		'$antiguedad_instalacion',
		'$conservacion_tuberias_tanque',
		'$conservacion_hidro_llave',
		'$horario_abastecimiento',
		'$numero_grifos_agua',
		'$cuenta_tanque_anexo',
		'$capacidad_tanque_elevado',
		'$capacidad_cisterna',
		'$volumen_agua_promedio_anual',
		'$distancia_cisterna_punto',
		'$animales_cinco_metros',
		'$tiene_cerco_perimetral_tanque',
		'$posible_ingreso_ajenos',
		'$material_tapa_adecuado',
		'$tapa_tanque_buen_estado',
		'$tanque_presenta_fisuras',
		'$paredes_interiores_limpias',
		'$natas_flotantes_tanque',
		'$posible_ingreso_lluvia',
		'$residuos_solidos_cercanos',
		'$tiene_cerco_perimetral_cisterna',
		'$boca_cisterna_raz_piso',
		'$inservibles_cercanos',
		".$fecha_muestreo.",
		'$hora_muestreo',
		'$punto_muestreo',
		'$cloro_residual',
		'$ph',
		'$frecuencia_medicion_cloro',
		'$toma_muestra_am',
		".$fecha_ultima_limpieza.",
		'$empresa_realizo_servicio',
		'$id_usuario'
		)";

		//echo $sql;

		return ejecutarConsulta($sql);
	}

	public function deleteLocalidad($id)
	{
		$sql = "DELETE FROM localidades where id='$id'";
		return ejecutarConsulta($sql);
	}

	public function mostrarLocalidad($id)
	{
		$sql = "select * from localidades where id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function saveLocalidad($id_localidad, $id_local, $sector, $nombre, $cnt_viviendas, $id_usuario)
	{
		$sql = "select sp_crud_localidad('$id_localidad','$id_local',
		'$sector','$nombre','$cnt_viviendas','$id_usuario')";
		return ejecutarConsulta($sql);
	}
	public function contarLocalidades($sWhere)
	{
		$sql = "SELECT count(*) AS cnt FROM 
			localidades l
			inner join tablas sec on sec.id_tipo::int=l.sector and sec.id_tabla='17'
			" . $sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listarLocalidades($sWhere, $sOrder, $sLimit)
	{
		//$sql="SELECT e.*,u.distrito FROM empresas e
		//LEFT JOIN ubigeo u ON u.id=e.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;

		$sql = "SELECT
			l.id as \"l.id\",
			l.descripcion as \"l.descripcion\",
			l.sector as \"l.sector\",
			l.cnt_viviendas as \"l.cnt_viviendas\",
			sec.descripcion as \"sec.descripcion\"
			from localidades l
			inner join tablas sec on sec.id_tipo::int=l.sector and sec.id_tabla='17'

		 " . $sWhere . " " . $sOrder . " " . $sLimit;
		//return  $sql;
		//echo $sql;
		return ejecutarConsulta($sql);
	}



	//Implementamos un método para insertar registros
	public function insertar($nombre, $direccion, $ubigeo, $ruc, $telefono_fijo)
	{
		$sql = "INSERT INTO empresas (nombre,direccion,id_ubigeo,ruc,
		telefono_fijo,id_usuario_crea)
		VALUES ('$nombre','$direccion','$ubigeo','$ruc','$telefono_fijo','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_empresa, $nombre, $direccion, $ubigeo, $ruc, $telefono_fijo)
	{
		$sql = "UPDATE empresas SET nombre='$nombre',direccion='$direccion',
		id_ubigeo='$ubigeo',ruc='$ruc',telefono_fijo='$telefono_fijo' WHERE id='$id_empresa'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id)
	{
		$sql = "UPDATE ficha_sistema_abastecimiento SET estado=false WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql = "UPDATE ficha_sistema_abastecimiento SET estado=true WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{

		$sql = "select f.*,
		to_char(f.fecha_registro,'dd/mm/yyyy') as fecha_reg,
		to_char(f.fecha_ultima_limpieza,'dd/mm/yyyy') as fecha_ult,
		to_char(f.fecha_muestreo,'dd/mm/yyyy') as fecha_mue,
		l.nombre as establecimiento,
		de.distrito as distrito_local,
        l.celular as celular_local,l.ris
		from ficha_sistema_abastecimiento f
		inner join locales l on l.id=f.id_local
        left join ubigeo de on de.id=l.id_ubigeo
        where f.id='$id'";


		return ejecutarConsulta($sql);
	}
	public function contar($sWhere)
	{
		$sql = "SELECT count(f.*) AS cnt 
		from ficha_sistema_abastecimiento f
		inner join locales l on l.id=f.id_local
		left join ubigeo u on u.id=l.id_ubigeo
		inner join usuarios uc on uc.id=f.id_usuario_crea
		" . $sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere, $sOrder, $sLimit)
	{
		$sql = "select f.id  as \"f.id\",
		to_char(f.fecha_registro,'dd-mm-yyyy') as \"f.fecha_registro\",
		l.nombre as \"l.nombre\",
		l.ris as \"l.ris\",
		l.celular as \"l.celular\",
		u.distrito as \"u.distrito\",
		f.estado as \"f.estado\",		
		uc.login as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
		from ficha_sistema_abastecimiento f
		inner join locales l on l.id=f.id_local
		left join ubigeo u on u.id=l.id_ubigeo
		inner join usuarios uc on uc.id=f.id_usuario_crea" . $sWhere . " " . $sOrder . " " . $sLimit;
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql = "SELECT id,nombre FROM empresas ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function selectLocales($id_empresa)
	{
		$sql = "SELECT l.id,nombre,l.direccion,l.telefono_fijo,l.celular,u.distrito,l.estado,l.id_ubigeo FROM locales l
		LEFT JOIN ubigeo u ON u.id=l.id_ubigeo
		WHERE l.id_empresa='$id_empresa' ORDER BY l.nombre";
		return ejecutarConsulta($sql);
	}
}
