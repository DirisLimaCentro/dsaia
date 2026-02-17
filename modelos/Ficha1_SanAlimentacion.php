<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Ficha
{



	//Implementamos nuestro constructor
	public function __construct()
	{

	}


    


	public function save(
		$id_ficha,
		$id_local,
		$id_usuario,

		$fecha,
		$responsable_mercado,
		$razon_s,
		$numero_puesto,
		$tipo_alimentos,
		$i_1,
		$i_2,
		$i_3,



		$ii_1,
		$ii_2,
		$ii_3,
		$ii_4,
		$ii_5,



		$iii_1,
		$iii_2,
		$iii_3,
		$iii_4,
		$iii_5,



		$iiii_1,
		$iiii_2,
		$iiii_3,
		$iiii_4,
		$iiii_5,

		$iiii_6,
		$iiii_7,
		$iiii_8,
		$iiii_9,
		$iiii_10,




		$n_inspector,
		$n_vendedor,
		$n_direccion,
		$n_proveedores,



		$total_puntaje1,

		$total_puntaje2,

		$total_puntaje3,

		$total_puntaje4,

		$total_puntaje5,

		$total_puntaje6

	) {

		$sql = "SELECT sp_crud_ficha_1_mercado(
		'$id_ficha',
		'$id_local',
		'$id_usuario',

		'$responsable_mercado',		
		'$razon_s',
		'$numero_puesto',
		'$tipo_alimentos',
		'$fecha',
		'$i_1',
		'$i_2',
		'$i_3',


	
		'$ii_1',
		'$ii_2',
		'$ii_3',
		'$ii_4',
		'$ii_5',
	
	
	
	
		'$iii_1',
		'$iii_2',
		'$iii_3',
		'$iii_4',
		'$iii_5',
		
		
		'$iiii_1',
		'$iiii_2',
		'$iiii_3',
		'$iiii_4',
		'$iiii_5',
		
		'$iiii_6',
		'$iiii_7',
		'$iiii_8',
		'$iiii_9',
		'$iiii_10',
		
		
		
		
		
		
		
		
		
			'$n_inspector',
					'$n_vendedor',
			'$n_direccion',
			
			
			'$n_proveedores',
			
			'$total_puntaje1', 

        '$total_puntaje2' ,

        '$total_puntaje3' ,

       '$total_puntaje4' ,

        '$total_puntaje5' ,
        
          '$total_puntaje6'
			


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
		$sql = "UPDATE ficha_1_mercado SET estado=false WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id)
	{
		$sql = "UPDATE ficha_1_mercado SET estado=true WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{

		$sql = "select f.*,
		to_char(f.fecha,'dd/mm/yyyy') as fecha_visita,
		l.nombre as establecimiento,
		m.nombre_mercado , 
		
		de.distrito as distrito_local
    
		from ficha_1_mercado f
		  
		inner join locales l on l.id=f.id_local		
		
        left join ubigeo de on de.id=l.id_ubigeo

		inner join lista_mercados m on m.id=f.responsable_mercado
    
        where f.id='$id'";

		//echo $sql;exit();
		return ejecutarConsulta($sql);

	}
	public function contar($sWhere)
	{
		$sql = "SELECT count(f.*) AS cnt 
		from ficha_1_mercado f
		inner join locales l on l.id=f.id_local		
		inner join usuarios uc on uc.id=f.id_usuario_crea
		inner join lista_mercados me on me.id=f.responsable_mercado

		" . $sWhere;
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros

   

	public function listar($sWhere, $sOrder, $sLimit)
	{
		$sql = "select f.id  as \"f.id\",
		to_char(f.fecha,'dd-mm-yyyy') as \"f.fecha\",
        
		me.nombre_mercado as \"me.nombre_mercado\",


		f.razon_s as \"f.razon_s\",
		l.nombre   as \"l.nombre\",
		f.numero_puesto as \"f.numero_puesto\",
		f.tipos_alimentos as \"f.tipos_alimentos\",
		f.estado as \"f.estado\",		
		uc.login as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
		from ficha_1_mercado f
		inner join locales l on l.id=f.id_local		

		inner join lista_mercados me on me.id=f.responsable_mercado

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

?>