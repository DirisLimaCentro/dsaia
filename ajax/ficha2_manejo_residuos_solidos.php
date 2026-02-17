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
require_once "../modelos/Ficha2ResiduosSolidos.php";

require "Reporte_Ficha2_Solidos.php";

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
	
		$arr_ipress = array($_POST['id_ipress'], $_POST['codigo_ipress'], $_POST['nombre_ipress'], $_POST['tipo_ipress'], $_POST['categoria_ipress'],
            $_POST['ubigeo_ipress'],
            trim($_POST['direccion_ipress']), trim($_POST['telefono_ipress']));
		$arr_dato = array($_POST['id_local'], $_POST['id_usuario'], $_POST['fecha'],
            trim($_POST['nombre_responsable_ipress']), trim($_POST['nombre_responsable_eess']),
            trim($_POST['nombre_evaluador']),         trim($_POST['nombre_comercial']),  trim($_POST['observacion']),



            trim($_POST['valoracion1']),    trim($_POST['valoracion2']), trim($_POST['valoracion3']),

            trim($_POST['valoracion4']),  trim($_POST['valoracion5']),  trim($_POST['valoracion6']),


            $_POST['i_1'], $_POST['i_2'], $_POST['i_3'], $_POST['i_4'],
           $_POST['i_5'], $_POST['i_6'], $_POST['i_7'], $_POST['i_8'],


            $_POST['i_9'], $_POST['i_10'],
            $_POST['i_11'],$_POST['i_12'],

       /*     $_POST['i_13'], $_POST['i_14'],$_POST['i_15'],$_POST['i_16'],*/




            $_POST['i_17'],$_POST['i_18'],$_POST['i_19'],

            $_POST['i_20'],$_POST['i_21'],$_POST['i_22'],
            $_POST['i_23'],$_POST['i_24'],



            $_POST['ii_1'],
            $_POST['ii_2'],
            $_POST['ii_3'],
            $_POST['ii_4'],

            /*
            $_POST['ii_5'],
            $_POST['ii_6'],
            $_POST['ii_7'],
            $_POST['ii_8'],*/


            $_POST['ii_9'],
            $_POST['ii_10'],
            $_POST['ii_11'],
            $_POST['ii_12'],




           // $_POST['iii_1'],

            $_POST['iii_2'], $_POST['iii_3'],
            $_POST['iii_4'], $_POST['iii_5'],

            $_POST['iiii_1'],
            $_POST['iiii_2'],
            $_POST['iiii_3'],
            $_POST['iiii_4'],
            $_POST['iiii_5'],
            $_POST['iiii_6'],
            $_POST['iiii_7'],
            $_POST['iiii_8'],
            $_POST['iiii_9'],

           /* $_POST['iiiii_1'],
            $_POST['iiiii_2'],
            $_POST['iiiii_3'],*/

            $_POST['iiiiii_1'],
            $_POST['iiiiii_2'],
            $_POST['iiiiii_3'],
            $_POST['iiiiii_4'],





            $_POST['total_puntaje'],
            $_POST['total_puntaje2'],
            $_POST['total_puntaje3'],
            $_POST['total_puntaje4'],
            $_POST['total_puntaje5'],
            $_POST['total_puntaje6'],


            $_POST['p_1'],
            $_POST['p_2'],
            $_POST['p_3'],
            $_POST['p_4'],
            $_POST['p_5'],
            $_POST['p_6'],
            $_POST['p_7'],
            $_POST['p_8'],
            $_POST['p_9'],

            $_POST['p_10'],
            $_POST['p_11'],
            $_POST['p_12'],
            $_POST['p_13'],
            $_POST['p_14'],



            $_POST['p_15'],


        $_POST['p_16'],
            $_POST['p_17'],
            $_POST['p_18'],
            $_POST['p_19'],
            $_POST['p_20'],

          $_POST['p_21'],
            $_POST['p_22'],
            $_POST['p_23'],

          $_POST['p_24'],
            $_POST['p_25'],
            $_POST['p_26'],

          $_POST['p_27'],
            $_POST['p_28'],
            $_POST['p_29'],
            $_POST['p_30'],

            $_POST['m_5'],
            $_POST['m_6'],
            $_POST['m_7'],
            $_POST['m_8'],

          $_POST['m_2_5'],
            $_POST['m_2_6'],
            $_POST['m_2_7'],
            $_POST['m_2_8'],

            $_POST['m_3_1'],
            $_POST['m_5_1'],
            $_POST['m_5_2'],
            $_POST['m_5_3'],
            $_POST['servicio_a'],
            $_POST['servicio_b'],
            $_POST['servicio_c'],
            $_POST['servicio_d']);


	
		//echo ('{'.to_pg_array($arr_dato).'}'); exit();
		$accion=($_POST['id_ficha']=='0') ? 'I':'A';
		$rs=$ficha->save(
			$accion,
			$_POST['id_ficha'],
			'{'.to_pg_array($arr_ipress).'}',
			'{'.to_pg_array($arr_dato).'}',
			$_POST['id_usuario']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	
	case 'guardaryeditar':
		if (empty($idempresa)){
			
			$rspta=$empresa->insertar($nombre,$direccion,$_POST['ubigeo'],$ruc,$_POST['telefono_fijo']);
			
			echo $rspta ? "Empresa registrada" : "Empresa no se pudo registrar";
		}
		else {
			$rspta=$empresa->editar($idempresa,$nombre,$direccion,$_POST['ubigeo'],$ruc,$_POST['telefono_fijo']);
			echo $rspta ? "Registro actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$ficha->desactivar($_POST["id_ficha"]);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$ficha->activar($_POST["id_ficha"]);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$f=$ficha->mostrar($_POST["id"]); 		
 		$data=pg_fetch_all($f);
 		echo json_encode($data);
	break;
	
	case 'listar':

		$aColumns = array( 'f.id', 'l.nombre', 'f.id', 'f.fecha','i.nombre_establecimiento','i.codigo_unico',
			'nombre_responsable_ipress','uc.login','f.fecha_creacion');
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

         $printexcel = new Reporte_Ficha2_Solidos();



 		while ($reg=pg_fetch_object($rspta)){



 			$btnEdit='';
 			$btnActDes='';
 			if ($reg->{'f.id_usuario_crea'}==$_GET['id_usuario']){
 				if ($reg->{'f.estado'}=='t'){
 					$btnEdit="<a href='#' onclick='open_ficha(".$reg->{'f.id'}.")'><i class='fa fa-pencil text-success'></i></a>&nbsp;";
 				}	
 				$btnActDes=($reg->{'f.estado'}=='t')?"<button class='btn btn-link btn-xs ' onclick='desactivar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-close text-danger'></i></button>":"<button class='btn btn-link btn-xs' onclick='activar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-check'></i></button>";



 			}
 			$btnPrint="<a href='../ajax/prueba_excel.php?id=".$reg->{'f.id'}."' target='_blank' onclick=''  <i class='fa fa-print text-warning'></i></a>";



 			$data[]=array( 				
 				
 				"0"=>$btnEdit.$btnActDes.$btnPrint,
 				"1"=>$reg->{'l.nombre'},
 				"2"=>$reg->{'f.id'},
 				"3"=>$reg->{'f.fecha'},
 				"4"=>$reg->{'i.nombre_establecimiento'},
 				"5"=>$reg->{'i.codigo_unico'},
 				"6"=>$reg->{'nombre_responsable_ipress'},
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