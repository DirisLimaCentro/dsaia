<?php
ob_start();
session_start();
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
require_once "../modelos/Catalogo.php";

$catalogo=new Catalogo();

$id_catalogo=isset($_POST["id_catalogo"])? limpiarCadena($_POST["id_catalogo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";


switch ($_GET["op"]){
	case 'updateCatalogoLocal':
		$rspta=$catalogo->updateCatalogoLocal($_GET['stat'],$_GET['id_local'],$_GET['id_catalogo']);
		echo $rspta;
	break;
	case 'findByName':
		$json= Array();
		$rspta=$catalogo->findByName($_GET['q'],$_GET['emp']);
		while ($reg=pg_fetch_object($rspta)){
			$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
		}
		echo json_encode($json);
	break;
	case 'tableLocales':
		$rs=$catalogo->selectLocales($_GET['id_catalogo']);
		$data=array();

 			?>
 			<div class="" id="div_detalleLocal">
 				<div class="row">
 					<div class="col-md-8">

 						<table class="table table-striped table-bordered table-hover">
 							<thead class="btn-success" >
 								<tr>
 									<th><input type="checkbox" onchange="marcar_todo(this, <?=$_GET['id_catalogo'];?>);" ></th>
 									<th>Empresa</th>
 									<th>Area</th>
 								</tr>
 							</thead>
 							<tbody>
 								<? while ($reg=pg_fetch_object($rs)){
 									$stat=($reg->stat=='1')?'checked':'';
 									//$id="chk".$reg->id.'_'.$_GET['id_catalogo'];
 									$btn='<input type="checkbox" value="'.$reg->id.'" data-id="'.$_GET['id_catalogo'].'" onchange="marcar(this,\''.$reg->id.'\',\''.$_GET['id_catalogo'].'\');" class="flat-red" '.$stat.'> ';
 									echo "<tr>";
 									echo "<td scope='row'>".$btn."</td>";
 									echo "<td scope='row'>".$reg->empresa."</td>";
 									echo "<td scope='row'>".$reg->area."</td>";
 									
 									echo "</tr>";

 								}
 								?>
 							</tbody>
 							<tfoot>
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

	case 'listItems':
		$json= Array();
		$rspta=$item->listarItems($_GET['q']);
 		//Codificar el resultado utilizando json
 		while ($reg=pg_fetch_object($rspta)){
 			$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
 		}
 		echo json_encode($json);
	break;

	case 'listCatalogos':
		$json= Array();
		$rspta=$catalogo->listarCatalogo($_GET['q']);
 		//Codificar el resultado utilizando json
 		while ($reg=pg_fetch_object($rspta)){
 			$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
 		}
 		echo json_encode($json);
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
		/*$arr = array(
            "name" => "Tim",
            "age" => "28"     );*/
        $rs=$catalogo->select();

		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('catalogo'=>$data);
 		echo json_encode($results);
	break;
	case 'guardaryeditar':
		if (empty($_POST["id_catalogo"])){

			$rspta=$catalogo->insertar($nombre, $_POST['id_categoria'],$_POST['id_tipo_rotacion'],$_POST['id_tipo_precio'], $_SESSION['s_id_usuario']);
			echo $rspta ? "Item registrado" : "Item no se pudo registrar";
		}
		else {
			$rspta=$catalogo->editar($_POST["id_catalogo"],
			 $nombre, $_POST['id_categoria'],
			 $_POST['id_tipo_rotacion'],$_POST['id_tipo_precio'],
			 $_SESSION['s_id_usuario']);
			echo $rspta ? "Registro actualizado" : "Item no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$catalogo->desactivar($id_catalogo);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$catalogo->activar($id_catalogo);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$catalogo->mostrar($id_catalogo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array( 'i.id', 'i.id','i.nombre', 'i.id','g.descripcion','r.descripcion','p.descripcion' );
		/* Indexed column (used for fast and accurate table cardinality) */
    	$sIndexColumn = "i.id";
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

	    $sWhere = " WHERE i.id IS NOT NULL ";		
	    /* Individual column filtering */
	    for ( $i=0 ; $i<count($aColumns) ; $i++ )
	    {
	    	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
	    	{
	    		if ($aColumns[$i]=='i.id'){
	    			$sWhere .= "AND ".$aColumns[$i]."='".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."' ";
	    		}else{	
	    			$sWhere .= " AND ".$aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    		}	
	    	
	    	}
	    }




		$rspta=$catalogo->listar($sWhere,$sOrder,$sLimit);

		//$r=pg_fetch_object($rspta);
		//print_r($r);
		//echo $r->{'i.nombre'};
		//exit();

		$a =$catalogo->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();



 		while ($reg=pg_fetch_object($rspta)){
 			$btn=($reg->{'i.estado'}=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar_item('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->{'i.id'}.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar_item('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar('.$reg->{'i.id'}.')"><i class="fa fa-check"></i></button>';
 			$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>';

 			//$btn='';$stat='';

 			$data[]=array(

 				"0"=>$reg->{'i.id'},
 				"1"=>$btn,
 				"2"=>$reg->{'i.nombre'},
 				"3"=>$reg->{'i.id'},
 				"4"=>$reg->{'g.descripcion'}, 	
 				"5"=>$reg->{'r.descripcion'}, 	
 				"6"=>$reg->{'p.descripcion'}, 	

 				"7"=>$stat ,
 				"8"=>$reg->{'i.estado'}
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
