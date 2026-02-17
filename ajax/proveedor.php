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
require_once "../modelos/Proveedor.php";

$proveedor=new Proveedor();

$id_proveedor=isset($_POST["id_proveedor"])? limpiarCadena($_POST["id_proveedor"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$nombre_comercial=isset($_POST["nombre_comercial"])? limpiarCadena($_POST["nombre_comercial"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";

$e_mail_alt=isset($_POST["e_mail_alt"])? limpiarCadena($_POST["e_mail_alt"]):"";

$web=isset($_POST["web"])? limpiarCadena($_POST["web"]):"";
$facebook=isset($_POST["facebook"])? limpiarCadena($_POST["facebook"]):"";


switch ($_GET["op"]){
	case 'listProveedores':
		$json= Array();
		$rspta=$proveedor->listarProveedores($_GET['q']);
 		//Codificar el resultado utilizando json
 		while ($reg=pg_fetch_object($rspta)){
 			$json[] = array('id' => $reg->id, 'text' => $reg->razon_social);
 		}
 		echo json_encode($json);
	break;
	case 'tableProveedores':
	$rs=$proveedor->selectProveedores($_GET['id_proveedor']);
	$data=array();

	?>
	<div class="" id="div_detalleLocal">
		<div class="row">
			<div class="col-md-8">

				<table class="table table-striped table-bordered table-hover" >
					<thead class="btn-success">
						<tr>
							<th>Accion</th>
							<th>ID</th>
							<th>Nombre</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>
						<? while ($reg=pg_fetch_object($rs)){

							$btn=($reg->estado=='1')?'
							<button class="btn btn-link btn-xs" onclick="mostrar_contacto('.$_GET['id_proveedor'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
							' <button class="btn btn-link btn-xs" onclick="desactivar_contacto('.$_GET['id_proveedor'].','.$reg->id.')"><i class="fa fa-close"></i></button>':
							'<button class="btn btn-link btn-xs" onclick="mostrar_contacto('.$_GET['id_proveedor'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
							' <button class="btn btn-link btn-xs" onclick="activar_contacto('.$_GET['id_proveedor'].','.$reg->id.')"><i class="fa fa-check"></i></button>';
							$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
							'<span class="label bg-red">Desactivado</span>';

							echo "<tr>";
							echo "<td scope='row'>".$btn."</td>";
							echo "<td scope='row'>".$reg->id."</td>";
							echo "<td scope='row'>".$reg->nombre."</td>";
							echo "<td scope='row'>".$reg->celular."</td>";
							echo "<td scope='row'>".$reg->telefono_fijo."</td>";
							echo "<td scope='row'>".$stat."</td>";
							echo "</tr>";

						}
						?>
					</tbody>
					<tfoot>
						<th><button type="button" class="btn btn-success" onclick="open_contacto('<?=$_GET['id_proveedor'];?>');">Nuevo</button></th>
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
	$rs=$proveedor->selectLocales($_GET['id_proveedor']);
	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
	}
	$results = array('locales'=>$data);
	echo json_encode($results);
	break;
	case 'list':
	
	$rs=$proveedor->select();

	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
	}
	$results = array('proveedores'=>$data);
	echo json_encode($results);
	break;
	case 'guardaryeditar':
		if ($id_proveedor==''){

			$rspta=$proveedor->insertar($nombre,$nombre_comercial,$direccion,$ruc,$_POST['telefono_fijo'],$_POST['ubigeo'],$celular,$email,$web,$facebook,$e_mail_alt);

			echo $rspta ? "Proveedor registrado" : "Proveedor no se pudo registrar";
		}
		else {
			$rspta=$proveedor->editar($id_proveedor,$nombre,$nombre_comercial,$direccion,$ruc,$_POST['telefono_fijo'],$_POST['ubigeo'],$celular,$email,$web,$facebook,$e_mail_alt);
			echo $rspta ? "Proveedor actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
	$rspta=$proveedor->desactivar($id_proveedor);
	echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
	$rspta=$proveedor->activar($id_proveedor);
	echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
	$rspta=$proveedor->mostrar($id_proveedor);
	//Codificar el resultado utilizando json
	echo json_encode($rspta);
	break;

	case 'listar':

	$aColumns = array( 'id','id', 'razon_social', 'nombre_comercial', 'direccion','ruc','telefono_fijo','celular' );
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




	$rspta=$proveedor->listar($sWhere,$sOrder,$sLimit);

	$a =$proveedor->contar($sWhere);
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
			"2"=>$reg->razon_social,
			"3"=>$reg->nombre_comercial,
			"4"=>$reg->direccion,
			"5"=>$reg->ruc,
			"6"=>$reg->telefono_fijo,
			"7"=>$reg->celular,
			"8"=>$stat
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
