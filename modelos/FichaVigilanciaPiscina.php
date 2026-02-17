<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ficha
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function reportCondicionxDistrito($anio,$mes){
		$sql="select distinct on (1,2) u.distrito,e.nombre,case when f.resultado=true then 'SALUDABLE' else 'NO SALUDABLE' end as resultado,fecha_inicio_ficha
		from ficha_piscina_vigilancia f
		inner join entidad e on e.id=f.id_entidad
		inner join ubigeo u on u.id=e.id_ubigeo
		where date_part('month',f.fecha_inicio_ficha)='$mes'
		and date_part('year',f.fecha_inicio_ficha)='$anio'
		and f.estado=true
		order by 1,2,4 desc";
		return ejecutarConsulta($sql);
	}

	public function reportCondicionxEstablecimiento($anio,$mes){
		$sql="select distinct on (1,2) l.nombre as distrito,e.nombre,case when f.resultado=true then 'SALUDABLE' else 'NO SALUDABLE' end as resultado,fecha_inicio_ficha
		from ficha_piscina_vigilancia f
		inner join entidad e on e.id=f.id_entidad
		inner join locales l on l.id=f.id_local
		where date_part('month',f.fecha_inicio_ficha)='$mes'
		and date_part('year',f.fecha_inicio_ficha)='$anio'
		and f.estado=true
		order by 1,2,4 desc";
		return ejecutarConsulta($sql);
	}

	public function reportControlPiscinasxEstablecimiento($anio,$mes){
		$sql="select l.nombre,count(f.id) as cantidad
		from ficha_piscina_vigilancia f
		inner join entidad e on e.id=f.id_entidad
		inner join locales l on l.id=f.id_local
		where date_part('month',f.fecha_inicio_ficha)='$mes'
		and date_part('year',f.fecha_inicio_ficha)='$anio'
		and f.estado=true
		group by l.nombre order by l.nombre";
		return ejecutarConsulta($sql);
	}

	public function reportControlPiscinasxEstablecimientoEntidad($anio,$mes){
		$sql="select l.nombre as distrito,e.nombre,count(f.id) as cantidad
		from ficha_piscina_vigilancia f
		inner join entidad e on e.id=f.id_entidad
		inner join locales l on l.id=f.id_local
		where date_part('month',f.fecha_inicio_ficha)='$mes'
		and date_part('year',f.fecha_inicio_ficha)='$anio'
		and f.estado=true
		group by l.nombre,e.nombre
		order by l.nombre,e.nombre";
		return ejecutarConsulta($sql);
	}



	public function reportControlPiscinasxDistrito($anio,$mes){
		$sql="select u.distrito as nombre,count(f.id) as cantidad
		from ficha_piscina_vigilancia f
		inner join entidad e on e.id=f.id_entidad
		inner join ubigeo u on u.id=e.id_ubigeo
		where date_part('month',f.fecha_inicio_ficha)='$mes'
		and date_part('year',f.fecha_inicio_ficha)='$anio'
		and f.estado=true
		group by u.distrito order by u.distrito";
		return ejecutarConsulta($sql);
	}

	public function reportControlPiscinasxEntidad($anio,$mes){
		$sql="select u.distrito,e.nombre,count(f.id) as cantidad
		from ficha_piscina_vigilancia f
		inner join entidad e on e.id=f.id_entidad
		inner join ubigeo u on u.id=e.id_ubigeo
		where date_part('month',f.fecha_inicio_ficha)='$mes'
		and date_part('year',f.fecha_inicio_ficha)='$anio'
		and f.estado=true
		group by u.distrito,e.nombre
		order by u.distrito,e.nombre";
		return ejecutarConsulta($sql);
	}



	public function save(
		$accion,
		$id_ficha,
		$dato_entidad,
		$dato_principal,	
		$dato_detalle,
		$id_usuario,
		$resultado
		){
		$sql="SELECT sp_crud_piscina_vigilancia(
		'$accion',
		'$id_ficha',
		'$dato_entidad',
		'$dato_principal',	
		'$dato_detalle',
		'$id_usuario',
		'$resultado'
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
	public function desactivar($id_empresa)
	{
		$sql="UPDATE ficha_piscina_vigilancia SET estado=false WHERE id='$id_empresa'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_empresa)
	{
		$sql="UPDATE ficha_piscina_vigilancia SET estado=true WHERE id='$id_empresa'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{

		$sql="Select f.id, f.id_local, f.id_inspector, f.id_entidad, f.id_atiende, to_char(f.fecha_inicio_ficha,'dd-mm-yyyy') as fecha, to_char(f.hora_inicio, 'hh:ss') hora_inicio, to_char(f.hora_fin, 'hh:ss') hora_fin, 
l.nombre as establecimiento, e.ruc as ruc, e.nombre as razon_social,e.direccion as direccion_empresa, e.id_ubigeo as id_ubigeo_empresa, de.distrito as distrito_empresa, e.telefono_fijo as telefono_fijo_empresa, e.celular as celular_empresa, e.e_mail as email_empresa, nombre_representante, 
ati.id_tipo_documento, ati.numero_documento, ati.nombres, ati.ape_paterno, ati.ape_materno,
f.long_este,f.long_norte,
id_motivo_ficha, motiinsp.descripcion motivo_ficha, id_instalacion_lavapies, pies.descripcion instalacion_lavapies, id_instalacion_sshh, sshh.descripcion instalacion_sshh, chk_sistema_recirculacion, chk_limpieza_local, chk_limpieza_estanque, chk_criador_aedes_aegypti, chk_cuerpos_agua, chk_cuaderno_registro, chk_aprobacion_sanitaria, nro_aprobacion_sanitaria, obs_general, 
resul_cloro_residual_1, resul_ph_1, resul_turbidez_1, resul_temperatura_1, resul_cloro_residual_2, 
resul_ph_2, resul_turbidez_2, resul_temperatura_2, resul_cloro_residual_3, resul_ph_3, resul_turbidez_3, 
resul_temperatura_3, resul_cloro_residual_4, resul_ph_4, resul_turbidez_4, resul_temperatura_4,
l.nombre as establecimiento,
f.id_estado_sistema_recirculacion,
f.id_estado_estanque
from ficha_piscina_vigilancia f
inner join locales l on l.id=f.id_local
inner join entidad e on e.id=f.id_entidad
inner join persona ati on ati.id=f.id_atiende
inner join tablas motiinsp on motiinsp.id_tipo=f.id_motivo_ficha and motiinsp.id_tabla='71'
inner join tablas pies on pies.id_tipo=f.id_instalacion_lavapies and pies.id_tabla='72'
inner join tablas sshh on sshh.id_tipo=f.id_instalacion_sshh and sshh.id_tabla='73'
left join ubigeo de on de.id=e.id_ubigeo
where f.id=$id";

		return ejecutarConsulta($sql);
		
	}
	public function contar($sWhere){
		$sql="SELECT count(f.*) AS cnt 
		from ficha_piscina_vigilancia f
		inner join locales l on l.id=f.id_local
		inner join entidad e on e.id=f.id_entidad
		inner join persona r on r.id=f.id_atiende
		inner join usuarios uc on uc.id=f.id_usuario_crea
		".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="select f.id  as \"f.id\",
		to_char(f.fecha_inicio_ficha,'dd-mm-yyyy') as \"f.fecha_inicio_ficha\",
		l.nombre as \"l.nombre\",
		e.nombre as \"e.nombre\",
		e.ruc as \"e.ruc\",
		f.estado as \"f.estado\",
		f.resultado,
		(r.ape_paterno||' '||r.ape_materno||' '||r.nombres) as responsable,
		uc.login as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
		from ficha_piscina_vigilancia f
		inner join locales l on l.id=f.id_local
		inner join entidad e on e.id=f.id_entidad
		inner join persona r on r.id=f.id_atiende
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