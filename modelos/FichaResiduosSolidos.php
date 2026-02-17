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
		$accion,
		$id_ficha,
		$dato_ipress,
		$dato_principal,	
		$id_usuario
		){
		$sql="SELECT sp_crud_ficha_1_residuos_solidos(
		'$accion',
		'$id_ficha',
		'$dato_ipress',
		'$dato_principal',	
		'$id_usuario'
		)";
		//echo $sql;
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
	public function mostrar($id)
	{

		$sql="select f.id, f.id_local, f.id_evaluador, f.id_ipress, l.nombre as establecimiento, to_char(f.fecha,'dd-mm-yyyy') as fecha, 
i.codigo_unico, i.nombre_establecimiento, i.id_tipo_ipress, itipo.descripcion tipo_ipress, i.id_categoria_ipress, icate.descripcion categoria_ipress, i.id_ubicacion_ubigeo, di.distrito as distrito_ipress, i.direccion as direccion_ipress, i.telefono as telefono_ipress, 
nombre_responsable_ipress, nombre_responsable_eess, i_1, i_2, i_3, i_4, i_5, i_6, i_7, i_8, i_9, i_10, i_11, ii_1, iii_1, iii_2, iii_3, iii_4, iii_5, total_puntaje
from ficha_1_residuos_solidos f
inner join locales l on l.id=f.id_local
inner join ipress i on i.id=f.id_ipress
inner join tablas itipo on itipo.id_tipo=i.id_tipo_ipress and itipo.id_tabla='76'
inner join tablas icate on icate.id_tipo=i.id_categoria_ipress and icate.id_tabla='77'
left join ubigeo di on di.id_inei=i.id_ubicacion_ubigeo
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
		to_char(f.fecha,'dd-mm-yyyy') as \"f.fecha\",
		l.nombre as \"l.nombre\",
		i.nombre_establecimiento as \"i.nombre_establecimiento\",
		i.codigo_unico as \"i.codigo_unico\",
		f.estado as \"f.estado\",
		f.nombre_responsable_ipress,
		uc.login as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
		from ficha_1_residuos_solidos f
		inner join locales l on l.id=f.id_local
		inner join ipress i on i.id=f.id_ipress
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