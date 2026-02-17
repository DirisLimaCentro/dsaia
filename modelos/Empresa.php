<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Empresa
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	public function deleteLocalidad($id)
	{
		$sql="DELETE FROM localidades where id='$id'";
		return ejecutarConsulta($sql);
	}

	public function insertCobertura($id_local,$id_actividad,$anio){
		for ($i=1;$i<=12;$i++){
			$sql="insert into locales_coberturas(id_local,tipo,nmes,anio) 
			values('$id_local','$id_actividad','$i','$anio')";
			ejecutarConsulta($sql);
		}
	}

	public function updateCobertura($id_local,$id_actividad,$anio,
		$ene,$feb,$mar,$abr,$may,$jun,$jul,$ago,$set,$oct,$nov,$dic	){
		$ames=array(1=>$ene,2=>$feb,3=>$mar,4=>$abr,5=>$may,6=>$jun,7=>$jul,8=>$ago,9=>$set,10=>$oct,11=>$nov,12=>$dic);

		for ($i=1;$i<=12;$i++){
			$sql="update locales_coberturas set cobertura='".$ames[$i]."' where id_local='$id_local' and 
			tipo='$id_actividad' and nmes='$i' and anio='$anio'";
			ejecutarConsulta($sql);
		}

		
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
	public function insertar($nombre,$direccion,$ubigeo,$ruc,$telefono_fijo,$nombre_comercial,$correo)
	{
		$sql="INSERT INTO empresas (nombre,direccion,id_ubigeo,ruc,
		telefono_fijo,nombre_comercial,e_mail,id_usuario_crea)
		VALUES ('$nombre','$direccion','$ubigeo','$ruc','$telefono_fijo','$nombre_comercial','$correo','1')";
		//echo $sql;
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_empresa,$nombre,$direccion,$ubigeo,$ruc,$telefono_fijo,$nombre_comercial,$correo)
	{
		$sql="UPDATE empresas SET nombre='$nombre',direccion='$direccion',nombre_comercial='$nombre_comercial',e_mail='$correo',
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
	public function mostrar($id_empresa)
	{
		$sql="SELECT e.*,u.distrito FROM empresas e
		LEFT JOIN ubigeo u ON u.id=e.id_ubigeo WHERE e.id='$id_empresa'";
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

	public function selectCoberturas($id_local)
	{
		$sql="select split_part(keyo,'|',2) as anio,split_part(keyo,'|',1) as tipo,
		split_part(keyo,'|',3) as id_tipo,
		x.* from (
		select * from crosstab
		(
		'select concat(ta.descripcion,''|'',c.anio,''|'',c.tipo) as keyo,
		m.descripcion as mes,
		c.cobertura
		from locales_coberturas c
		inner join tablas ta on ta.id_tipo=c.tipo and ta.id_tabla=''18'' 
		inner join tablas m on m.id_tipo=c.nmes and m.id_tabla=''66'' 
		where c.id_local=''".$id_local."''
		order by anio::int,ta.descripcion,nmes::int',
		'select descripcion as mes from tablas where id_tabla=''66'' order by id_tipo::int'
		) as 
		(
		keyo text,
		Enero int,
		Febrero int,
		Marzo int,
		Abril int,
		Mayo int,
		Junio int,
		Julio int,
		Agosto int,
		Setiembre int,
		Octubre int,
		Noviembre int,
		Diciembre int
		)
	)x";
		return ejecutarConsulta($sql);		
	}


}

?>