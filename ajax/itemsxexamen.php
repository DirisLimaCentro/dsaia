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
require_once "../modelos/Itemsxe.php";

$itemsxe=new Itemsxe();

$id_producto=isset($_POST["id_producto"])? limpiarCadena($_POST["id_producto"]):"";
$id_item=isset($_POST["id_item"])? limpiarCadena($_POST["id_item"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";

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
			$rspta=$itemsxe->save($_POST['edit_mode'],$_POST['id_producto'],$_POST['id_item'],$_POST['id_tipo_resultado'], $_POST['cantidad']);
			echo $rspta ? "Transaccion satisfactoria" : "Error en la transaccion";
	break;

	case 'eliminar':
		$rspta=$itemsxe->eliminar($id_producto,$id_item,$tipo);
 		echo $rspta ? "Registro eliminado" : "Registro no se puede eliminar";
	break;

	case 'activar':
		$rspta=$catalogo->activar($id_catalogo);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$itemsxe->mostrar($id_producto,$id_item,$tipo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array( 'i.id','p.descripcion', 'i.id',"c.nombre||' '||m.descripcion",'ie.resultado','ie.cantidad' );
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




		$rspta=$itemsxe->listar($sWhere,$sOrder,$sLimit);

		//$r=pg_fetch_object($rspta);
		//print_r($r);
		//echo $r->{'i.nombre'};
		//exit();

		$a =$itemsxe->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();



 		while ($reg=pg_fetch_object($rspta)){
 			$btn='<button class="btn btn-link btn-xs" onclick="mostrar_item(\''.$reg->{'p.id_producto'}.'\',\''.$reg->{'i.id'}.'\',\''.$reg->{'ie.resultado'}.'\')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar(\''.$reg->{'p.id_producto'}.'\',\''.$reg->{'i.id'}.'\',\''.$reg->{'ie.resultado'}.'\')"><i class="fa fa-close"></i></button>';
 			

 			$data[]=array(

 				
 				"0"=>$btn, 				
 				"1"=>$reg->{'p.descripcion'},
 				"2"=>$reg->{'i.id'},
 				"3"=>$reg->{'i.descripcion'}, 	
 				"4"=>$reg->{'ie.resultado'}, 	
 				"5"=>$reg->{'ie.cantidad'}, 	

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
