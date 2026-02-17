<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}

require_once "../modelos/Ubigeo.php";

$ubigeo=new Ubigeo();

/*$idestablecimiento=isset($_POST["id_establecimiento"])? limpiarCadena($_POST["id_establecimiento"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";*/

switch ($_GET["op"]){
	case 'getUbigeo':
		$rs=$ubigeo->getUbigeo($_GET["id"]);
 		$data=pg_fetch_all($rs);
 		echo json_encode($data);	
	break;
	case 'guardaryeditar':
		if (empty($idestablecimiento)){
			echo 'xxxxxx'.$_POST["nombre"];
			//$rspta=$establecimiento->insertar($nombre,$direccion);
			//echo $rspta;
			//echo $rspta ? "Establecimiento registrado" : "Establecimiento no se pudo registrar";
		}
		else {
			$rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$categoria->desactivar($idcategoria);
 		echo $rspta ? "Categoría Desactivada" : "Categoría no se puede desactivar";
	break;

	case 'activar':
		$rspta=$categoria->activar($idcategoria);
 		echo $rspta ? "Categoría activada" : "Categoría no se puede activar";
	break;

	case 'listar':
		$json= Array();
		$rspta=$ubigeo->listar($_GET['q']);
 		//Codificar el resultado utilizando json
 		while ($reg=pg_fetch_object($rspta)){
 			$json[] = array('id' => $reg->id, 'text' => $reg->distrito);
 		}
 		echo json_encode($json);
	break;

	case 'listarUbigeo':
		$json= Array();
		$rspta=$ubigeo->listarUbigeo($_GET['q']);
 		//Codificar el resultado utilizando json
 		while ($reg=pg_fetch_object($rspta)){
 			$json[] = array('id' => $reg->id, 'text' => $reg->departamento.' - '.$reg->provincia.' - '.$reg->distrito);
 		}
 		echo json_encode($json);
	break;

	case 'listar_':

		$aColumns = array( 'id_establecimiento', 'nombre', 'direccion', 'telefono_fijo' );
		/* Indexed column (used for fast and accurate table cardinality) */
    	$sIndexColumn = "id_establecimiento";
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


    	

		$rspta=$establecimiento->listar($sWhere,$sOrder,$sLimit);

		$a =$establecimiento->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=pg_fetch_object($rspta)){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_establecimiento.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->id_establecimiento.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->id_establecimiento.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->id_establecimiento.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->direccion,
 				"3"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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

ob_end_flush();
?>