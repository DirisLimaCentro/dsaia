<?php 
ob_start();
/*if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
if ($_SESSION['almacen']==0)
{
	*/
require_once "../modelos/FichaVigilanciaParque.php";

function to_pg_array($set) {
    settype($set, 'array'); // can be called with a scalar or array
    $result = array();
    foreach ($set as $t) {
        if (is_array($t)) {
            $result[] = to_pg_array($t);
        } else {
            $t = str_replace('"', '\\"', $t); // escape double quote
            if (! is_numeric($t)) // quote only non-numeric values
                $t = '"' . $t . '"';
            $result[] = $t;
        }
    }
    return '{' . implode(",", $result) . '}'; // format
}

$ficha=new Ficha();
/*
$aDet=array();
if (isset($_POST['id_especies'])){
	$aesp=explode(",", $_POST['id_especies']);
	for ($i=0;$i<count($aesp);$i++){
		$aDet[$i]=array($aesp[$i]);
	}
}

$idempresa=isset($_POST["id_empresa"])? limpiarCadena($_POST["id_empresa"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";
$nombre_localidad=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
*/
switch ($_GET["op"]){
	case 'save':
	
		$arr_parque = array($_POST['id_parque'], '', $_POST['id_ubigeo_parque'], trim($_POST['direccion_parque']), trim($_POST['ubicacion_georefencial_parque']), $_POST['con_cerco_perimetro_parque'], $_POST['es_publico_parque'], trim($_POST['area_parque']));
		$arr_dato = array($_POST['id_local'], $_POST['id_usuario'], $_POST['fecha'], trim($_POST['hora']), trim($_POST['descrip_consultorio_cercano']), $_POST['ii_1_1'], $_POST['ii_1_2'], $_POST['ii_1_3'], $_POST['ii_1_4'], $_POST['ii_1_5'], $_POST['ii_1_6'], $_POST['ii_2_1'], $_POST['ii_2_2'], $_POST['ii_2_3'], $_POST['ii_2_4'], $_POST['ii_2_5'],$_POST['ii_2_6'], $_POST['ii_2_7'], $_POST['ii_3_1'], $_POST['ii_3_2'], $_POST['ii_3_3'], $_POST['ii_3_4'], $_POST['ii_3_5'], $_POST['ii_3_6'], $_POST['ii_3_7'], $_POST['ii_3_8'], $_POST['ii_3_9'], $_POST['ii_3_10'], $_POST['ii_3_11'], $_POST['total_puntaje'], $_POST['puntaje_calificado']);
	
		//echo ($_POST['id_usuario']); exit();
		$accion=($_POST['id_ficha']=='0') ? 'I':'A';
		$rs=$ficha->save(
			$accion,
			$_POST['id_ficha'],
			'{'.to_pg_array($arr_parque).'}',
			'{'.to_pg_array($arr_dato).'}',
			$_POST['id_usuario']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	
	case 'mostrar':
		$f=$ficha->mostrar($_POST["id"]); 		
 		$data=pg_fetch_all($f);
 		echo json_encode($data);
	break;

	case 'desactivar':
		$rspta=$empresa->desactivar($idempresa);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$empresa->activar($idempresa);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;
	
	case 'listar':

		$aColumns = array( 'f.id', 'l.nombre', 'f.id', 'f.fecha',
			'pa.nombre_parque','puntaje_calificado', 'total_puntaje','uc.login','f.fecha_creacion');
		/* Indexed column (used for fast and accurate table cardinality) */
    	$sIndexColumn = "f.id";
    	$sOrder="";
    	
    	/*  Paging */
     	
    	$sLimit = "";
    	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    	{
    		$sLimit = "LIMIT ".intval( $_GET['iDisplayLength'] )." OFFSET ".
    		intval( $_GET['iDisplayStart'] );
    	}

    	/*    * Ordering     */
    	if ( isset( $_GET['iSortCol_0'] ) )
    	{
    		$sOrder = "ORDER BY  ";
    		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
    		{
    			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
    			{
    				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
    				".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc').", ";
    			}
    		}

    		$sOrder = substr_replace( $sOrder, "", -2 );
    		if ( $sOrder == "ORDER BY" )
    		{
    			$sOrder = "";
    		}
    	}

	    	/*
	     * Filtering
	     * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
	     * on which ILIKE can be used). Boolean fields etc will need a modification here.
	     */
	    	$sWhere = "";



	    	//$_GET['sSearch'] != ""
	    	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != ""  )
	    	{
	    		$sWhere = "WHERE (";
	    		for ( $i=0 ; $i<count($aColumns) ; $i++ )
	    		{
	    			if ( $_GET['bSearchable_'.$i] == "true" )
	    			{
	    				$sWhere .= $aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string( $_GET['sSearch'] ),'UTF-8')."%' OR ";
	    			}
	    		}
	    		$sWhere = substr_replace( $sWhere, "", -3 );
	    		$sWhere .= ")";
	    	}
    	

	    if ($sWhere==''){
	    	$sWhere=" WHERE f.id<>0 ";
	    }else{
	    	$sWhere.=" AND f.id<>0 ";
	    }

	    /*Filtrando por establecimiento segun tipo de usuario*/
	    if ($_GET['id_nivel']=='2'){ //Solo filtrar para tipo usuario simple
	    	$sWhere.=" AND f.id_local='".$_GET['id_local']."' ";
	    }



	    /* Individual column filtering */
	    for ( $i=0 ; $i<count($aColumns) ; $i++ )
	    {
	    	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
	    	{
	    		if ( $sWhere == "" )
	    		{
	    			$sWhere = "WHERE ";
	    		}
	    		else
	    		{
	    			$sWhere .= " AND ";
	    		}
	    		$sWhere .= $aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    	}
	    }


    	

		$rspta=$ficha->listar($sWhere,$sOrder,$sLimit);

		$a =$ficha->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=pg_fetch_object($rspta)){
 			$btnEdit='';
 			$btnActDes='';
 			if ($reg->{'f.id_usuario_crea'}==$_GET['id_usuario']){
 				if ($reg->{'f.estado'}=='1'){
 					$btnEdit="<a href='#' onclick='open_ficha(".$reg->{'f.id'}.")'><i class='fa fa-pencil text-success'></i></a>&nbsp;";
 				}	
 				$btnActDes=($reg->{'f.estado'}=='t')?"<button class='btn btn-link btn-xs ' onclick='desactivar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-close text-danger'></i></button>":"<button class='btn btn-link btn-xs' onclick='activar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-check'></i></button>";
 			}
 			$btnPrint="<a href='#' onclick='print_compra(".$reg->{'f.id'}.")'><i class='fa fa-print text-warning'></i></a>";
 			$data[]=array( 				
 				
 				"0"=>$btnEdit.$btnActDes.$btnPrint,
 				"1"=>$reg->{'l.nombre'},
 				"2"=>$reg->{'f.id'},
 				"3"=>$reg->{'f.fecha'},
 				"4"=>$reg->{'pa.nombre_parque'},
 				"5"=>$reg->{'puntaje_calificado'},
 				"6"=>$reg->{'total_puntaje'},
 				"7"=>$reg->{'uc.login'},
 				"8"=>$reg->{'f.fecha_creacion'}
 				);
 		}
 		$results = array(
 			//"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>$cnt, //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>$cnt, //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
//Fin de las validaciones de acceso
/*}
else
{
  require 'noacceso.php';
}
}*/
ob_end_flush();
?>