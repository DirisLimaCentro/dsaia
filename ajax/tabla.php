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
require_once "../modelos/Tabla.php";

$tabla=new Tabla();

$idempresa=isset($_POST["id_empresa"])? limpiarCadena($_POST["id_empresa"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";
$idtabla =isset($_POST["idtabla"])? limpiarCadena($_POST["idtabla"]):"";
$descripcion =isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$abreviado =isset($_POST["abreviado"])? limpiarCadena($_POST["abreviado"]):"";


switch ($_GET["op"]){
	case 'cboReso':
	$rs=$tabla->selectCombo($_GET['id']);
	echo "<option value='' selected>&nbsp;</option>";
	while ($reg=pg_fetch_object($rs)){

		echo "<option value='".$reg->nombre."' >".$reg->nombre."</option>";
	}
	break;

	case 'cboSemanaEpi':
	$rs=$tabla->selectSemanaEpi();
	while ($reg=pg_fetch_object($rs)){
		echo "<option value='".$reg->id."' >".$reg->nombre."</option>";
	}
	break;

	case 'listLocalidades':
	//$rs=$tabla->selectSemanaEpi();
	$rs=$tabla->findLocalidad($_GET['q'],$_GET['sector'],$_GET['id_local']);
	echo "<option value=''>--Seleccione--</option>";	
	while ($reg=pg_fetch_object($rs)){
		$sel=($reg->id==$_GET['id_default'])?" selected ":"";
		echo "<option value='".$reg->id."' ".$sel.">".$reg->nombre."</option>";
	}
	break;

	case 'cboLocalidades':
	//$rs=$tabla->selectSemanaEpi();
	$rs=$tabla->findLocalidad($_GET['q'],$_GET['sector'],$_GET['id_local']);
	echo "<option value=''>--Seleccione--</option>";
	while ($reg=pg_fetch_object($rs)){
		$sel=($reg->id==$_GET['id_default'])?" selected ":"";
		echo "<option value='".$reg->id."' ".$sel.">".$reg->nombre."</option>";
	}
	break;


	case 'cbotabla':
		echo "<option value=''>--Seleccione--</option>";
		$rs=$tabla->select($_GET['id_tabla']);
		while ($reg=pg_fetch_object($rs)){
			echo "<option value='".$reg->id_tipo."'>".$reg->descripcion."</option>";
		}	
	break;
	case 'findLocalidad':
		$json= Array();
		$rspta=$tabla->findLocalidad($_GET['q'],$_GET['sector'],$_GET['id_local']);
		while ($reg=pg_fetch_object($rspta)){
			$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
		}
		echo json_encode($json);
	break;

	case 'listMenusDetalle':		
        $rs=$tabla->selectMenusDetalle($_GET['id_menu']);		
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('menus'=>$data);	
 		echo json_encode($results);
	break;
	case 'listMenus':		
        $rs=$tabla->selectMenus();		
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('menus'=>$data);	
 		echo json_encode($results);
	break;
	case 'tableLocales':
		$rs=$empresa->selectLocales($_GET['id_empresa']);
		$data=array();

 			?>
 			<div class="" id="div_detalleLocal">
 				<div class="row">
 					<div class="col-md-8">

 						<table class="table table-striped table-bordered table-hover">
 							<thead class="btn-success" >
 								<tr>
 									<th>Accion</th>
 									<th>Nombre</th>
 									<th>Direccion</th>
 									<th>Distrito</th>
 									<th>Telefono</th>
 									<th>Celular</th>
 									<th>Estado</th>
 								</tr>
 							</thead>
 							<tbody>
 								<? while ($reg=pg_fetch_object($rs)){

 									$btn=($reg->estado=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-check"></i></button>';
 			$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>';

 									echo "<tr>";
 									echo "<td scope='row'>".$btn."</td>";
 									echo "<td scope='row'>".$reg->nombre."</td>";
 									echo "<td scope='row'>".$reg->direccion."</td>";
 									echo "<td scope='row'>".$reg->distrito."</td>";
									echo "<td scope='row'>".$reg->telefono_fijo."</td>";
									echo "<td scope='row'>".$reg->celular."</td>";
									echo "<td scope='row'>".$stat."</td>";
 									echo "</tr>";

 								}
 								?>
 							</tbody>
 							<tfoot>
 								<th><button type="button" class="btn btn-success" onclick="open_local('<?=$_GET['id_empresa'];?>');">Nuevo</button></th>
 								<th></th>
 								<th></th>
 								<th></th>
 								<th></th>
 								<th></th>
 								<th></th>
 							</tfoot>




 						</table>
 					</div>
 				</div>
 			</div>
 			<?

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
	case 'list':		
		if (isset($_GET['ids'])) $rs=$tabla->select($_GET['id_tabla'],$_GET['ids']); else $rs=$tabla->select($_GET['id_tabla']);
        

		$data=array();

		$def=(isset($_GET['default']))?$_GET['default']:'';


		while ($reg=pg_fetch_object($rs)){
			$sel=($reg->id_tipo==$def)?'selected':'';
 			$data[]=array("id"=>$reg->id_tipo, "nombre"=>$reg->descripcion, "selected"=>$sel);
 		}
 		$results = array('tablas'=>$data);
 		echo json_encode($results);
	break;

	case 'list_filter':		
        $rs=$tabla->selectFilter($_GET['id_tabla']);

		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id_tipo, "nombre"=>$reg->descripcion);
 		}
 		$results = array('tablas'=>$data);
 		echo json_encode($results);
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


	case 'insert_tabla':
			$rspta=$tabla->insertarselect($idtabla,strtoupper($descripcion),strtoupper($abreviado));
			echo $rspta ? "Opción registrada" : "Opción no se pudo registrar";
	break;


	case 'crud':
			$rspta=$tabla->crud($_POST['accion'],$_POST['id_tabla'],$_POST['id_tipo'],$descripcion,$abreviado);
			echo $rspta ? "Opción registrada" : "Opción no se pudo registrar";
	break;



	case 'desactivar':
		$rspta=$empresa->desactivar($idempresa);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$empresa->activar($idempresa);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$tabla->mostrar($_POST['id_tipo'],$_POST['id_tabla']);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array('id_tipo','descripcion', 'id_tipo', 'abreviado','fecha_creacion' );
		/* Indexed column (used for fast and accurate table cardinality) */
    	$sIndexColumn = "";
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

        $sWhere = "WHERE id_tabla IS NOT NULL ";

	    /* Individual column filtering */
	    for ( $i=0 ; $i<count($aColumns) ; $i++ )
	    {
	    	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
	    	{
	    		/*if ( $sWhere == "" )
	    		{
	    			$sWhere = "WHERE ";
	    		}
	    		else
	    		{
	    			$sWhere .= " AND ";
	    		}*/
	    		$sWhere .= "AND " .$aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    	}
	    }

	    if (isset($_GET['id_tabla'])){			
			$sWhere.="AND id_tabla='".$_GET['id_tabla']."' ";			
		}else{
			$sWhere.="AND id_tabla='11' ";			
		}


		$rspta=$tabla->listarTablas($sWhere,$sOrder,$sLimit);

		$a =$tabla->contarTablas($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=pg_fetch_object($rspta)){
 			$btn=($reg->estado=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar(\''.$reg->id_tipo.'\',\''.$reg->id_tabla.'\')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->id_tipo.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar(\''.$reg->id_tipo.'\',\''.$reg->id_tabla.'\')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar('.$reg->id_tipo.')"><i class="fa fa-check"></i></button>';
 			$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>';
 			$data[]=array(

 				
 				//"0"=>$reg->id_tipo,
 				"0"=>$btn,
 				"1"=>$reg->descripcion,
 				"2"=>$reg->id_tipo,
 				"3"=>$reg->abreviado,
 				"4"=>$reg->fecha_creacion,
 				"5"=>$stat 
 				
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
