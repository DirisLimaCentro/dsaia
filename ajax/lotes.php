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
require_once "../modelos/Lotes.php";

$lote=new Lote();

$id_lote=isset($_POST["id_lote"])? limpiarCadena($_POST["id_lote"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$id_item=isset($_POST["id_item"])? limpiarCadena($_POST["id_item"]):"";
$id_itemp=isset($_GET["id_itemp"])? limpiarCadena($_GET["id_itemp"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";


switch ($_GET["op"]){
	case 'listLotesxVencer':
		$rs=$lote->listLotesxVencer($_GET['meses']);
		$f=0;
		while ($reg=pg_fetch_object($rs)){
			$f++;
			echo "<tr><th scope='row' class='v-grid-header'>".$f."</th>";
			echo "<td>".$reg->catalogo."</td>";
			echo "<td>".$reg->id."</td>";
			echo "<td>".$reg->categoria."</td>";
			echo "<td>".$reg->marca."</td>";
			echo "<td>".$reg->numero_lote."</td>";
			echo "<td>".$reg->unidad_medida."</td>";
			echo "<td class='text-right font-bold'>".$reg->stock_actual."</td>";
			echo "<td>".$reg->fecha_vencimiento."</td>";
			echo "</tr>";
		}	
	break;
	case 'findByName':
	$json= Array();
	$rspta=$lote->findByName($_GET['q'],$_GET['emp']);
	while ($reg=pg_fetch_object($rspta)){
		$json[] = array('id' => $reg->id, 'text' => $reg->nombre);
	}
	echo json_encode($json);
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
							<button class="btn btn-link btn-xs" onclick="mostrar_lote('.$_GET['id_lote'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
							' <button class="btn btn-link btn-xs" onclick="desactivar_local('.$_GET['id_lote'].','.$reg->id.')"><i class="fa fa-close"></i></button>':
							'<button class="btn btn-link btn-xs" onclick="mostrar_local('.$_GET['id_lote'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
							' <button class="btn btn-link btn-xs" onclick="activar_local('.$_GET['id_lote'].','.$reg->id.')"><i class="fa fa-check"></i></button>';
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

	case 'listLotes':
	$json= Array();
	$rspta=$lote->listarLotes($_GET['q']);
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
	$rs=$lote->select();

	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
	}
	$results = array('empresas'=>$data);
	echo json_encode($results);
	break;
	case 'guardaryeditar':
	if (empty($id_lote)){

		$rspta=$lote->insertar($nombre,$_POST['id_empresa'],$_POST['id_marca'],$_POST['id_categoria'],$_POST['id_ums'],$_POST['id_umi'],$_POST['factor'],$_POST['precio_compra'], $_POST['maneja_lote']);

		echo $rspta ? "Item registrado" : "Item no se pudo registrar";
	}
	else {
		$rspta=$lote->editar($id_lote,$nombre,$_POST['id_empresa'],$_POST['id_marca'],$_POST['id_categoria'],$_POST['id_ums'],$_POST['id_umi'],$_POST['factor'],$_POST['precio_compra'], $_POST['maneja_lote']);
		echo $rspta ? "Registro actualizado" : "Item no se pudo actualizar";
	}
	break;

	case 'desactivar':
	$rspta=$lote->desactivar($id_lote);
	echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
	$rspta=$lote->activar($id_lote);
	echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'selected':
	$rs=$lote->selected($id_itemp);

	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("idlote"=>$reg->id, "id"=>$reg->id_item, "nombre"=>$reg->numero_lote, "vencimiento"=>$reg->fecha_vencimiento, "inicial"=>$reg->cantidad_inicial , "actual"=>$reg->stock_actual);
	}
	$results = array('lotes'=>$data);
	echo json_encode($results);
	break;

	case 'listar':

	$aColumns = array( 'i.id', 'e.nombre', 'c.descripcion', 'i.nombre','m.descripcion','ums.descripcion','umi.descripcion','factor' );
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




	$rspta=$lote->listar($sWhere,$sOrder,$sLimit);

	//$r=pg_fetch_object($rspta);
	//print_r($r);
	//echo $r->{'i.nombre'};
	//exit();

	$a =$lote->contar($sWhere);
	$cnt = $a->cnt;

	//Vamos a declarar un array
	$data= Array();



	while ($reg=pg_fetch_object($rspta)){
		$btn=($reg->{'i.estado'}=='1')?'
		<button class="btn btn-link btn-xs" onclick="mostrar_lote('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
		' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->{'i.id'}.')"><i class="fa fa-close"></i></button>':
		'<button class="btn btn-link btn-xs" onclick="mostrar_lote('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
		' <button class="btn btn-link btn-xs" onclick="activar('.$reg->{'i.id'}.')"><i class="fa fa-check"></i></button>';
		$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activado</span>':
		'<span class="label bg-red">Desactivado</span>';

		//$btn='';$stat='';

		$data[]=array(

			"0"=>$reg->{'i.id'},
			"1"=>$btn,
			"2"=>$reg->{'e.nombre'},
			"3"=>$reg->{'c.descripcion'},
			"4"=>$reg->{'i.nombre'},
			"5"=>$reg->{'m.descripcion'},
			"6"=>$reg->{'ums.descripcion'},
			"7"=>$reg->{'umi.descripcion'},
			"8"=>$reg->{'factor'},
			"9"=>$reg->{'precio_compra'},
			"10"=>$stat ,
			"11"=>$reg->{'i.estado'}
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
