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
require_once "../modelos/Items.php";

$item=new Item();

$id_item=isset($_POST["id_item"])? limpiarCadena($_POST["id_item"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";


switch ($_GET["op"]){
	case 'listSinStock':
		$rs=$item->sinStock();
		$f=0;
		while ($reg=pg_fetch_object($rs)){
			$f++;
			echo "<tr><th scope='row' >".$f."</th>";
			echo "<td>".$reg->catalogo."</td>";
			echo "<td>".$reg->id."</td>";
			echo "<td>".$reg->categoria."</td>";
			echo "<td>".$reg->marca."</td>";
			echo "<td>".$reg->unidad_medida."</td>";
			echo "<td class='text-right '>".$reg->precio_compra."</td>";
			echo "<td class='text-right font-bold'>".$reg->stock_real."</td>";
			
			echo "</tr>";
		}	
	break;
	case 'findExamenByName':
		$json= Array();
		$rspta=$item->findExamenByName($_GET['q']);
		while ($reg=pg_fetch_object($rspta)){
			$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
		}
		echo json_encode($json);
	break;
	case 'findByName':
		$json= Array();
		$rspta=$item->findByName($_GET['q'],$_GET['emp']);
		while ($reg=pg_fetch_object($rspta)){
			$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
		}
		echo json_encode($json);
	break;
	case 'tableLotes':
		$rs=$item->selectLotes($_GET['id_item']);
		$data=array();

 			?>
 			<div class="" id="div_detalleLocal">
 				<div class="row">
 					<div class="col-md-8">

 						<table class="table table-striped table-bordered table-hover">
 							<thead class="btn-success" >
 								<tr>
 									<th>Nro Lote</th>
 									<th>Fecha Vencimiento</th>
 									<th>Cantidad Inicial</th>
 									<th>Stock Actual</th>
 								</tr>
 							</thead>
 							<tbody>
 								<? while ($reg=pg_fetch_object($rs)){		

 									echo "<tr>";
 									
 									echo "<td scope='row'>".$reg->numero_lote."</td>";
 									echo "<td scope='row'>".$reg->fecha_vencimiento."</td>";
									echo "<td scope='row'>".$reg->cantidad_inicial."</td>";
									echo "<td scope='row'>".$reg->stock_actual."</td>";
									
 									echo "</tr>";

 								}
 								?>
 							</tbody>
 							




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
        $rs=$item->select();

		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('empresas'=>$data);
 		echo json_encode($results);
	break;
	case 'guardaryeditar':
		if (empty($id_item)){

			$rspta=$item->insertar($_POST['id_catalogo'],$_POST['id_marca'],$_POST['id_ums'],$_POST['id_umi'],$_POST['factor'],$_POST['precio_compra'], $_POST['maneja_lote'], $_POST['id_laboratorio'],$_POST['stock_real'],$_POST['stock_minimo'],$_POST['stock_maximo'],$_SESSION['s_id_usuario']
		);

			echo $rspta ? "Item registrado" : "Item no se pudo registrar";
		}
		else {
			$rspta=$item->editar($id_item,$_POST['id_marca'],$_POST['id_ums'],$_POST['id_umi'],$_POST['factor'],$_POST['precio_compra'], $_POST['maneja_lote'], $_POST['id_laboratorio'],$_POST['stock_real'],$_POST['stock_minimo'],$_POST['stock_maximo'],$_SESSION['s_id_usuario']

		);
			echo $rspta ? "Registro actualizado" : "Item no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$item->desactivar($id_item);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$item->activar($id_item);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$item->mostrar($id_item);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array( 'i.id','i.id','cat.nombre','i.id', 'c.descripcion', 'm.descripcion','ums.descripcion','umi.descripcion','factor','precio_compra','stock_real','maneja_lote' );
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

	    $sWhere =" WHERE i.id IS NOT NULL ";	
	    /* Individual column filtering */
	    for ( $i=0 ; $i<count($aColumns) ; $i++ )
	    {
	    	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
	    	{
	    		/*if ( $sWhere == "" ){
	    			$sWhere = "WHERE ";
	    		}else{
	    			$sWhere .= " AND ";
	    		}*/


	    		if ($aColumns[$i]=='i.id'){
	    			$sWhere .= "AND ".$aColumns[$i]."='".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."' ";
	    		}else{
	    			if ($aColumns[$i]=='maneja_lote'){
	    				if ($_GET['sSearch_'.$i]!='*'){
	    					$sWhere .= "AND ".$aColumns[$i]."  LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    				}	

	    			}else{
	    				$sWhere .= "AND ".$aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    			}	
	    		}	
	    	}
	    }




		$rspta=$item->listar($sWhere,$sOrder,$sLimit);

		//$r=pg_fetch_object($rspta);
		//print_r($r);
		//echo $r->{'i.nombre'};
		//exit();

		$a =$item->contar($sWhere);
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
 				"2"=>$reg->{'cat.nombre'},
 				"3"=>$reg->{'i.id'},
 				"4"=>$reg->{'c.descripcion'}, 				
 				"5"=>$reg->{'m.descripcion'},
 				"6"=>$reg->{'ums.descripcion'},
 				"7"=>$reg->{'umi.descripcion'},
 				"8"=>$reg->{'factor'},
 				"9"=>$reg->{'precio_compra'},
 				"10"=>$reg->{'stock_real'},
 				"11"=>$reg->{'maneja_lote'},
 				"12"=>$stat ,
 				"13"=>$reg->{'i.estado'}
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
