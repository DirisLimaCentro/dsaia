<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Persona
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function selectPersonal(){
		$sql="select id, (ape_paterno||' '||ape_materno||' '||nombres) as nombre from personal order by 2";
		return ejecutarConsulta($sql);
	}


	public function getEmail($log)
	{
		$sql="select p.e_mail,us.id ,u.distrito,u.provincia,u.departamento
			from personal p 
			inner join usuarios us on us.id_personal=p.id
			left join ubigeo u on u.id=p.id_ubigeo
			where upper(us.login)='$log'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function buscar_doc($tipo_doc,$numero_doc)
	{
		$sql="select p.*,u.distrito,u.provincia,u.departamento
			from personal p left join ubigeo u on u.id=p.id_ubigeo
			where p.id_tipo_documento='$tipo_doc' and p.nro_documento='$numero_doc'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function buscar_id($tipo_doc,$numero_doc)
	{
		$sql="select p.*,u.distrito,u.provincia,u.departamento
			from persona p left join ubigeo u on u.id=p.id_ubigeo
			where p.id_tipo_documento='$tipo_doc' and p.numero_documento='$numero_doc'";
		return ejecutarConsultaSimpleFila($sql);
	}


	public function deleteLocalPersonal($id_local,$id_personal){
		$sql="DELETE FROM personal_empresa WHERE id_local='$id_local' AND id_personal='$id_personal'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para insertar registros
	public function insertarpersonalocal($id_persona_local,$local,$cargo)
	{
		$sql="INSERT INTO personal_empresa (id_local,id_personal,id_cargo)
		VALUES ('$local','$id_persona_local','$cargo')";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	/*public function editarpersonalocal($id_persona_local,$local,$cargo)
	{
		$sql="UPDATE personal SET nombres='$nombre',ape_paterno='$apellido_paterno',ape_materno='$apellido_materno',id_tipo_documento='$tipo_documento',nro_documento='$numero_documento',sexo='$sexo',direccion='$direccion',id_ubigeo='$ubigeo',telefono_fijo='$telefono',celular='$celular',e_mail='$email' WHERE id='$idpersona'";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}*/


	//Implementamos un método para insertar registros
	public function insertar($nombre,$tipo_documento,$numero_documento,$sexo,$nombres,$apellido_paterno,$apellido_materno,$ubigeo,$direccion,$telefono,$celular,$email,$aoc,$areq,$ext,$id_condicion_laboral)
	{
		$sql="INSERT INTO personal (nombres,ape_paterno,ape_materno,id_tipo_documento,nro_documento,sexo,direccion,id_ubigeo,telefono_fijo,celular,e_mail,id_usuario_crea,autoriza_orden_compra,autoriza_requerimiento,externo,id_condicion_laboral)
		VALUES ('$nombre','$apellido_paterno','$apellido_materno','$tipo_documento','$numero_documento','$sexo','$direccion','$ubigeo','$telefono','$celular','$email','1','$aoc','$areq','$ext','$id_condicion_laboral')";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idpersona,$nombre,$tipo_documento,$numero_documento,$sexo,$nombres,$apellido_paterno,$apellido_materno,$ubigeo,$direccion,$telefono,$celular,$email,$aoc,$areq,$ext,$id_condicion_laboral)
	{
		$sql="UPDATE personal SET nombres='$nombre',ape_paterno='$apellido_paterno',ape_materno='$apellido_materno',id_tipo_documento='$tipo_documento',nro_documento='$numero_documento',sexo='$sexo',direccion='$direccion',id_ubigeo='$ubigeo',telefono_fijo='$telefono',celular='$celular',e_mail='$email',
			autoriza_orden_compra='$aoc',autoriza_requerimiento='$areq',externo='$ext',
			id_condicion_laboral='$id_condicion_laboral'
			WHERE id='$idpersona'";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_personal)
	{
		$sql="UPDATE personal SET estado='0' WHERE id='$id_personal'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_personal)
	{
		$sql="UPDATE personal SET estado='1' WHERE id='$id_personal'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para eliminar categorías
	public function eliminar($idpersona)
	{
		$sql="DELETE FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpersona)
	{
		$sql="SELECT p.*,u.distrito,u.departamento,u.provincia FROM personal p
		LEFT JOIN ubigeo u ON u.id=p.id_ubigeo WHERE p.id='$idpersona'" ;
		return ejecutarConsultaSimpleFila($sql);
	}

	public function contar($sWhere){
		$sql="SELECT count(*) AS cnt FROM personal p 
		LEFT JOIN ubigeo u ON u.id=p.id_ubigeo ".$sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar($sWhere,$sOrder,$sLimit)
	{
		$sql="SELECT p.*,u.distrito FROM personal p
		LEFT JOIN ubigeo u ON u.id=p.id_ubigeo ".$sWhere." ".$sOrder." ".$sLimit;
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	public function tableEmpresaPersonal($id_personal)
	{
		$sql="SELECT pe.id_personal,pe.id_local,l.nombre,pe.id_cargo,tc.descripcion FROM personal_empresa pe
		Inner Join locales l on pe.id_local=l.id
		left Join tablas tc on pe.id_cargo=tc.id_tipo and tc.id_tabla='11'
		WHERE pe.id_personal='$id_personal' ORDER BY l.nombre";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listarp($name)
	{
		$sql="SELECT distinct p.id,  
		trim(p.nombres)||' '||trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nro_documento)  as persona,
		p.nombres,p.ape_paterno
    FROM personal p
    WHERE trim(p.nombres)||' '||trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nro_documento) LIKE upper ($$%" . $name . "%$$)   LIMIT 10 ";
		return ejecutarConsulta($sql);
	}

	public function select2($name)
	{
		$nam=mb_strtoupper($name,'UTF-8');
		$sql="SELECT distinct p.id,  trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nombres)  as persona
    FROM personal p
    WHERE trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nombres) LIKE upper ($$%" . $nam . "%$$)  order by 2";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para listar los registros
	public function select()
	{
		$sql="SELECT distinct p.id,trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nombres) as persona FROM personal p order by 2 ";
		//echo $sql;exit();
		return ejecutarConsulta($sql);
	}
}

?>
