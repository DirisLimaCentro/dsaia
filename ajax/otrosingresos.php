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
require_once "../modelos/OtrosIngresos.php";

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

$otrosi=new Otrosi();


$id_item=isset($_POST["id_item"])? limpiarCadena($_POST["id_item"]):"";

$id_ingreso=isset($_POST["id_ingreso"])? limpiarCadena($_POST["id_ingreso"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";

if (isset($_POST['detalle'])){
	$aDet=array();
	for ($i=0;$i<count($_POST['detalle']);$i++){
		$aDet[$i]=array($_POST['detalle'][$i]['id_item'],$_POST['detalle'][$i]['factor'],$_POST['detalle'][$i]['cantidad'],$_POST['detalle'][$i]['precio_costo'],$_POST['detalle'][$i]['numero_lote'],$_POST['detalle'][$i]['fecha_vencimiento']);

	}
}


switch ($_GET["op"]){
	case 'loadSerie':
		/**/
		$rs=$otrosi->loadSerie($_GET['id_tipo_documento']); 
		echo $rs->serie;	
	break;
	case 'getLastNumber':
		$rs=$otrosi->getLastNumber($_GET['id_tipo_documento'],$_GET['serie_documento']);
		if ($rs->maximo==''){
			echo "1";
		} else{
			echo $rs->maximo;
		}	
	break;
	case 'updateInsertItem':
		$rs=$compra->actualizarInsertarItem($_POST['accion'],$_POST['id_ingreso'],$_POST['id_item'],$_POST['id_lote'],$_POST['numero_lote'],$_POST['cantidad'],$_POST['costo_umc'],$_POST['fecha_vencimiento'],$_POST['factor']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];

	break;
	case 'showItem':
		$result=$compra->mostrarItem($_POST['id_ingreso'],$_POST['id_item']);
 		echo json_encode($result);
	break;
	case 'verificaDisponibilidadLote':
		$rs=$compra->verificaDisponibilidadLote($_POST['id_lote']);
		$cnt=pg_num_rows($rs);
		echo ($cnt>0)?'1':'0';

	break;
	case 'removeItem':
		$rs=$compra->eliminaItem($_POST['id_ingreso'],$_POST['id_item']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];

	break;
	case 'updateOtrosIngresos':
		$rs=$otrosi->actualizar($_POST['id_empresa'],$_POST['id_ingreso'],$_POST['id_local'],$_POST['id_tipo_documento'],$_POST['serie_documento'],$_POST['numero_documento'],$_POST['fecha_compra'],$_POST['id_motivo'],$_POST['observacion'],'1');
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'saveOtrosIngresos':
		$rs=$otrosi->insertar($_POST['id_empresa'],$_POST['id_local'],$_POST['id_tipo_documento'],$_POST['serie_documento'],$_POST['numero_documento'],$_POST['fecha_compra'],$_POST['id_motivo'],$_POST['id_proveedor'],$_POST['observacion'],$_POST['id_tipo_ingreso'],to_pg_array($aDet),'1');
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'detalleCompra':
		$rs=$otrosi->detalleIngreso($_GET['id_ingreso']);
		$data=array();

 			?>
 			<div class="" id="div_detalleLocal" >
 				<div class="row">

 					<div class="col-md-11">

 						<table id="dt<?=$_GET['id_ingreso']; ?>" class="table table-striped table-bordered table-hover table-responsive " >
 							<thead  >
 								<tr class="modal-header-success">
 									<th >Accion</th>
 									<th >Item</th>
 									<th>Categoria</th>
 									<th>Marca</th>
 									<th>Unidad Medida</th>
 									<th>Factor</th>
 									<th>Lote</th>
 									<th>Fecha Vto</th>
 									<th>Cantidad</th>
 									<th>Costo UMC</th>
 									<th>Total</th>

 								</tr>
 							</thead>
 							<tbody>
 								<? $tot=0;$cnt_items=0;
 								while ($reg=pg_fetch_object($rs)){
 									$id_empresa=$reg->id_empresa;
 									$cnt_items++;
 				$btn='<button class="btn btn-link btn-xs " onclick="action_show_item('.$_GET['id_ingreso'].','.$reg->id_item.','.$reg->id_lote.')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="action_remove_item('.$_GET['id_ingreso'].','.$reg->id_item.','.$reg->id_lote.')"><i class="fa fa-close text-success"></i></button>';
 									$stat='';
 									$sub=round($reg->cantidad*$reg->costo_unitario_umc,2);
 									$tot+=$sub;
 									echo "<tr>";
 									echo "<td scope='row'>".$btn."</td>";
 									echo "<td scope='row'>".$reg->nombre."</td>";
 									echo "<td scope='row'>".$reg->categoria."</td>";
 									echo "<td scope='row'>".$reg->marca."</td>";
									echo "<td scope='row'>".$reg->unidad_medida_ingreso."</td>";
									echo "<td scope='row'>".$reg->factor."</td>";
									echo "<td scope='row'>".$reg->numero_lote."</td>";
									echo "<td scope='row'>".$reg->fecha_vencimiento."</td>";
									echo "<td scope='row'>".$reg->cantidad."</td>";
									echo "<td scope='row' class='text-right'>".$reg->costo_unitario_umc."</td>";
									echo "<td scope='row' class='text-right'>".number_format($sub,2,'.',',')."</td>";
									//echo "<td scope='row'>".$stat."</td>";
 									echo "</tr>";

 								}
 								?>
 							</tbody>
 							<tfoot>
 								<tr >
 									<td colspan="1">
 										<input type="hidden" id="cnt_items" value="<?=$cnt_items;?>" >
 										<button type="button" class="btn btn-success" onclick="open_new_item('<?=$_GET['id_ingreso'];?>','<?=$id_empresa;?>');">Nuevo Item</button></td>
 									<td colspan="9" class='text-right'><strong>Total:</strong></td>
 									<td class='text-right'><strong><?=number_format($tot,2,'.',',');?></strong></td>
 								</tr>
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

			$rspta=$item->insertar($nombre,$_POST['id_empresa'],$_POST['id_marca'],$_POST['id_categoria'],$_POST['id_ums'],$_POST['id_umi'],$_POST['factor'],$_POST['precio_compra'], $_POST['maneja_lote']);

			echo $rspta ? "Item registrado" : "Item no se pudo registrar";
		}
		else {
			$rspta=$item->editar($id_item,$nombre,$_POST['id_empresa'],$_POST['id_marca'],$_POST['id_categoria'],$_POST['id_ums'],$_POST['id_umi'],$_POST['factor'],$_POST['precio_compra'], $_POST['maneja_lote']);
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
		$rspta=$compra->mostrar($id_ingreso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array( 'i.id','i.id', 'e.nombre', 'l.nombre', 'td.descripcion','i.serie_documento','i.numero_documento','i.fecha','mc.descripcion' );
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
	    			if ( isset($_GET['bSearchable_'.$i]) &&  $_GET['bSearchable_'.$i] == "true" )
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


	    if ($sWhere==''){
	    	$sWhere=" WHERE id_tipo_ingreso='2' ";
	    }else{
	    	$sWhere.=" AND id_tipo_ingreso='2' ";
	    }

		$rspta=$otrosi->listar($sWhere,$sOrder,$sLimit);

		//$r=pg_fetch_object($rspta);
		//print_r($r);
		//echo $r->{'i.nombre'};
		//exit();

		$a =$otrosi->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();



 		while ($reg=pg_fetch_object($rspta)){
 			/*$btn=($reg->{'i.estado'}=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar_compra('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->{'i.id'}.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar_compra('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar('.$reg->{'i.id'}.')"><i class="fa fa-check"></i></button>';*/
 			$btnAnul=($reg->{'i.estado'}=='1')?"&nbsp;&nbsp;<a href='#' onclick='desactivar(".$reg->{'i.id'}.")'><i class='fa fa-remove '></i></a>":"";

 			//$btnIcons='<button data-toggle="tooltip" data-placement="bottom" title="Editar" class="btn btn-link btn-xs" onclick="mostrar_compra('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button><button data-toggle="tooltip" data-placement="bottom" title="Imprimir" class="btn btn-link btn-xs" onclick="print_compra('.$reg->{'i.id'}.')"><i class="fa fa-print"></i></button>';
 			$btnIcons="<a href='#' onclick='mostrar_compra(".$reg->{'i.id'}.")'><i class='fa fa-pencil'></i></a>&nbsp;&nbsp;<a href='#' onclick='print_compra(".$reg->{'i.id'}.")'><i class='fa fa-print'></i></a>";

 			$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>';

 			//$btn='';$stat='';

 			$data[]=array(

 				"0"=>$reg->{'i.id'},
 				"1"=>$btnIcons.$btnAnul,
 				"2"=>$reg->{'e.nombre'},
 				"3"=>$reg->{'l.nombre'},
 				"4"=>$reg->{'td.descripcion'},
 				"5"=>$reg->{'i.serie_documento'},
 				"6"=>$reg->{'i.numero_documento'},
 				"7"=>$reg->{'i.fecha'},
 				"8"=>$reg->{'mc.descripcion'}, 				
 				"9"=>$stat ,
 				"10"=>$reg->{'i.estado'}
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
