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
require_once "../modelos/Local.php";

$local=new Local();

$id_empresa=isset($_POST["id_empresa"])? limpiarCadena($_POST["id_empresa"]):"";
$id_local=isset($_POST["id_local"])? limpiarCadena($_POST["id_local"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono_fijo=isset($_POST["telefono_fijo"])? limpiarCadena($_POST["telefono_fijo"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";

switch ($_GET["op"]){

	case 'loadlocales':
	$rs=$local->selectLocales($_GET['id_empresa']);
	while ($reg=pg_fetch_object($rs)){
		echo "<option value='".$reg->id."' >".$reg->nombre."</option>";
	}
	break;

	case 'list':
	
	$rs=$local->select();

	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
	}
	$results = array('locales'=>$data);
	echo json_encode($results);
	break;

	case 'cboLocales':
	
	//echo "<option value='*'>--Todos los centros--</option>";
		$rspta=$local->cboLocales();
		while ($reg=pg_fetch_object($rspta)){
			echo "<option value='".$reg->id."'>".$reg->nombre."</option>";
		}	

	break;



	case 'listLocales':
		$rs=$empresa->selectLocales($_GET['id_empresa']);
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('locales'=>$data);
 		echo json_encode($results);
	break;

	case 'listaLocales':
		$rs=$local->cboLocales();
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('locales'=>$data);
 		echo json_encode($results);
	break;




	case 'guardaryeditar':
		if (empty($id_local)){

			$rspta=$local->insertar($id_empresa, $nombre, $direccion, $_POST['id_ubigeo'], $telefono_fijo, $celular);

			echo $rspta ? "Local registrado" : "Local no se pudo registrar";
		}
		else {
			$rspta=$local->editar($id_local,$nombre,$direccion,$_POST['id_ubigeo'],$telefono_fijo, $celular);
			echo $rspta ? "Registro actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$local->desactivar($id_local);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$local->activar($id_local);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$local->mostrar($id_local);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array( 'id', 'nombre', 'direccion', 'distrito','telefono_fijo','ruc' );
		/* Indexed column (used for fast and accurate table cardinality) */
    	$sIndexColumn = "id";
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




		$rspta=$empresa->listar($sWhere,$sOrder,$sLimit);

		$a =$empresa->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=pg_fetch_object($rspta)){
 			$btn=($reg->estado=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>';
 			$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>';
 			$data[]=array(

 				"0"=>$reg->id,
 				"1"=>$btn,
 				"2"=>$reg->nombre,
 				"3"=>$reg->direccion,
 				"4"=>$reg->distrito,
 				"5"=>$reg->telefono_fijo,
 				"6"=>$reg->ruc,
 				"7"=>$stat
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
