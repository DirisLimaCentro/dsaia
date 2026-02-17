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


        /*
		$dato_ipress,

        */

		$dato_principal,	
		$id_usuario
		){
		$sql="SELECT sp_crud_ficha_4_residuos_solidos(
		'$accion',
		'$id_ficha',
	
		'$dato_principal',	
		'$id_usuario'
		)";
		//echo $sql;
		return ejecutarConsulta($sql);
	}



    /*  '$dato_ipress',

		'$dato_principal',
		'$id_usuario'
		)";
		//echo $sql;
		return ejecutarConsulta($sql);
  */


	//Implementamos un método para desactivar categorías
	public function desactivar($id_ficha)
	{
		$sql="UPDATE ficha_4_residuos_solidos SET estado=false    WHERE id='$id_ficha'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_ficha)
	{
		$sql="UPDATE ficha_4_residuos_solidos SET estado=true  WHERE id='$id_ficha'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{

		$sql="select f.id, 
       f.id_local, 
       f.id_evaluador, 
       
  /*     f.id_ipress, */
       
       l.nombre as establecimiento, 
         l.direccion as direccion, 
       to_char(f.fecha,'dd-mm-yyyy') as fecha, 
       
       /*
i.codigo_unico,

i.nombre_establecimiento,
i.id_tipo_ipress, 
itipo.descripcion tipo_ipress,
i.id_categoria_ipress, 
icate.descripcion categoria_ipress,
i.id_ubicacion_ubigeo, di.distrito as distrito_ipress,
i.direccion as direccion_ipress, 
i.telefono as telefono_ipress, 
        */
nombre_responsable_ipress, nombre_responsable_eess, nombre_evaluador,

nombre_comercial , observacion , valoracion1 , valoracion2 , valoracion3 , valoracion4 , valoracion5 , 
valoracion6 , valoracion7
,
i_1, i_2, i_3, i_4, i_5, i_6, i_7, i_8, i_9, i_10,
i_11, i_12,   /*i_13,   i_14, i_15, i_16,
                */
                
                i_17, i_18, i_19, 
 i_20, i_21, i_22, i_23, i_24,


ii_1,  ii_2, ii_3, ii_4,
/*
ii_5, ii_6, ii_7, ii_8,
*/

ii_9, ii_10,
ii_11, ii_12 ,  



ii_13, ii_14, ii_15,  ii_16, ii_17, ii_18, ii_19, ii_20, ii_21, 
ii_22, ii_23, ii_24,
 




/*
iii_1,*/


iii_2, iii_3,

iiii_1, iiii_2, iiii_3, iiii_4, iiii_5,  

/*
iiiii_1, iiiii_2, iiiii_3, */


iiiii_4, iiiii_5, iiiii_6, iiiii_7, iiiii_8, iiiii_9,




iiiiii_1, iiiiii_2, iiiiii_3, iiiiii_4,


iiiiiii_1, iiiiiii_2, iiiiiii_3, iiiiiii_4,






total_puntaje ,  total_puntaje2 ,  total_puntaje3 ,  total_puntaje4 ,  total_puntaje5 ,  total_puntaje6 ,   total_puntaje7 , 



p_1  ,  p_2 , p_3 
, p_4  , p_5  , p_6    ,   p_7  , p_8  , p_9      ,   p_10    ,   p_11  , p_12  , p_13      , p_14    ,
  
   p_15 , p_16     ,   p_17    ,   p_18  , p_19  , p_20      , p_21   , p_22  , p_23   , 
          
          p_24      , p_25   , p_26  , p_27    , p_28   , p_29  , p_30   , p_31   , p_32 
       , p_33   ,
          p_34   , p_35   , p_36 
       , p_37   , m_5  ,  m_6 , m_7 , m_8  , m_2_5  ,  m_2_6 , m_2_7 , m_2_8 ,  
         
         m_3_1  ,  m_5_1 , m_5_2 , m_5_3 , servicio_a , servicio_b ,  servicio_c ,  servicio_d
          

       

from ficha_4_residuos_solidos f
inner join locales l on l.id=f.id_local
   
    
 /*   
inner join ipress i on i.id=f.id_ipress
inner join tablas itipo on itipo.id_tipo=i.id_tipo_ipress and itipo.id_tabla='76'
inner join tablas icate on icate.id_tipo=i.id_categoria_ipress and icate.id_tabla='77'
left join ubigeo di on di.id_inei=i.id_ubicacion_ubigeo

  */


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
		/*
 		i.codigo_unico as \"i.codigo_unico\",
		
		*/
		
		f.estado as \"f.estado\",
		f.nombre_responsable_ipress,
		uc.login as \"uc.login\",
		f.id_usuario_crea as \"f.id_usuario_crea\",
		to_char(f.fecha_creacion,'dd-mm-yyyy hh:mi') as \"f.fecha_creacion\"
	
		from ficha_4_residuos_solidos f
		inner join locales l on l.id=f.id_local
		    
		    /*
		inner join ipress i on i.id=f.id_ipress
		
		  */
		    
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