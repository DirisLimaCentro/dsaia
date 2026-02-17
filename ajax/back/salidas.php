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
require_once "../modelos/Salida.php";
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
$salida=new Salida();

$id_salida=isset($_POST["id_salida"])? limpiarCadena($_POST["id_salida"]):"";
$id_proveedor=isset($_POST["id_proveedor"])? limpiarCadena($_POST["id_proveedor"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$nombre_comercial=isset($_POST["nombre_comercial"])? limpiarCadena($_POST["nombre_comercial"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$web=isset($_POST["web"])? limpiarCadena($_POST["web"]):"";
$facebook=isset($_POST["facebook"])? limpiarCadena($_POST["facebook"]):"";


if (isset($_POST['detalle'])){
	$aDet=array();
	for ($i=0;$i<count($_POST['detalle']);$i++){
    //if ($_POST['detalle'][$i]['idlote']==""){ $varidlote= Null ; }else{ $varidlote=$_POST['detalle'][$i]['idlote']; }
		$aDet[$i]=array($_POST['detalle'][$i]['id_item'],$_POST['detalle'][$i]['factor'],$_POST['detalle'][$i]['cantidad'],$_POST['detalle'][$i]['numero_lote'],$_POST['detalle'][$i]['fecha_vencimiento'],$_POST['detalle'][$i]['idlote']);

	}
}

switch ($_GET["op"]){
	case 'loadSerie':
		/**/
		$rs=$salida->loadSerie($_GET['id_tipo_documento']); 
		echo $rs->serie;	
	break;
	case 'getLastNumber':
		$rs=$salida->getLastNumber($_GET['id_tipo_documento'],$_GET['serie_documento']);
		if ($rs->maximo==''){
			echo "1";
		} else{
			echo $rs->maximo;
		}	
	break;
	case 'detalleSalida':
	$rs=$salida->detalleSalida($_GET['id_salida']);
	$data=array();

	?>
	<div class="" id="div_detalleLocal">
		<div class="row">
			<div class="col-md-11">

				<table class="table table-striped table-bordered table-hover table-responsive " >
					<thead class="modal-header-success">
						<tr>
							<th>Accion</th>
              <th >Item</th>
              <th>Categoria</th>
              <th>Marca</th>
              <th>Unidad Medida</th>
              <th>Lote</th>
              <th>Fecha Vto</th>
              <th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<? $tot=0;$cnt_items=0;
            while ($reg=pg_fetch_object($rs)){
              $id_empresa=$reg->id_empresa;
              $cnt_items++;
							$btn='<button class="btn btn-link btn-xs " onclick="action_show_item('.$_GET['id_salida'].','.$reg->id_item.','.$reg->id_lote.')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="action_remove_item('.$_GET['id_salida'].','.$reg->id_item.','.$reg->cantidad.')"><i class="fa fa-close text-success"></i></button>';
							$stat='';
							echo "<tr>";
							echo "<td scope='row'>".$btn."</td>";
              echo "<td scope='row'>".$reg->nombre."</td>";
							echo "<td scope='row'>".$reg->categoria."</td>";
							echo "<td scope='row'>".$reg->marca."</td>";
							echo "<td scope='row'>".$reg->unidad_medida_ingreso."</td>";
							echo "<td scope='row'>".$reg->numero_lote."</td>";
							echo "<td scope='row'>".$reg->fecha_vencimiento."</td>";
              echo "<td scope='row'>".$reg->cantidad."</td>";
							echo "</tr>";
						}
						?>
					</tbody>
					<tfoot>
            <tr >
              <td colspan="1">
                <input type="hidden" id="cnt_items" value="<?=$cnt_items;?>" >
						    <button type="button" class="btn btn-success" onclick="open_new_item('<?=$_GET['id_salida'];?>','<?=$id_empresa;?>');">Nuevo Item</button></td>
						<td colspan="7"></td>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<?

	break;

  case 'updateSalida':
    $rs=$salida->actualizar($_POST['id_salida'],$_POST['id_tipo_documento'],$_POST['serie_documento'],$_POST['numero_documento'],$_POST['fecha_salida'],$_POST['id_local_ingreso'],$_POST['id_persona_traslado'],$_POST['id_motivo_salida'],'1',$_POST['observaciones']);
    $rpta=pg_fetch_array($rs);
		echo $rpta[0];
  break;

	case 'saveSalida':
		
		$id_req=(trim($_POST['id_requerimiento'])=='')?'0':$_POST['id_requerimiento'];

		$rs=$salida->insertar($_POST['id_tipo_documento'],$_POST['serie_documento'],$_POST['numero_documento'],$_POST['id_local_ingreso'],$_POST['id_persona_traslado'],$_POST['id_motivo_salida'],$_POST['observaciones'],to_pg_array($aDet),'1',$_POST['fecha_salida'],$id_req);
    $rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;

	case 'listLocales':
	$rs=$salida->selectLocales($_GET['id_proveedor']);
	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
	}
	$results = array('locales'=>$data);
	echo json_encode($results);
	break;

  case 'updateInsertItem':
    $rs=$salida->actualizarInsertarItem($_POST['accion'],$_POST['id_salida'],$_POST['id_item'],$_POST['id_lote'],$_POST['numero_lote'],$_POST['cantidad'], $_POST['factor'], $_POST['fecha_vencimiento']);
    $rpta=pg_fetch_array($rs);
    echo $rpta[0];
  break;

  case 'showItem':
		$result=$salida->mostrarItem($_POST['id_salida'],$_POST['id_item']);
 		echo json_encode($result);
	break;
  case 'verificaDisponibilidadLote':
    $rs=$salida->verificaDisponibilidadLote($_POST['id_lote']);
    $cnt=pg_num_rows($rs);
    echo ($cnt>0)?'1':'0';

  break;
  case 'removeItem':
    $rs=$salida->eliminaItem($_POST['id_salida'],$_POST['id_item'],$_POST['cantidad']);
    $rpta=pg_fetch_array($rs);
    echo $rpta[0];

  break;

	case 'list':
	/*$arr = array(
	"name" => "Tim",
	"age" => "28"     );*/
	$rs=$salida->select();

	$data=array();
	while ($reg=pg_fetch_object($rs)){
		$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
	}
	$results = array('empresas'=>$data);
	echo json_encode($results);
	break;
	case 'guardaryeditar':
	if (empty($id_proveedor)){

		$rspta=$salida->insertar($nombre,$nombre_comercial,$direccion,$ruc,$_POST['telefono_fijo'],$_POST['ubigeo'],$celular,$email,$web,$facebook);

		echo $rspta ? "Proveedor registrado" : "Proveedor no se pudo registrar";
	}
	else {
		$rspta=$salida->editar($id_proveedor,$nombre,$nombre_comercial,$direccion,$ruc,$_POST['telefono_fijo'],$_POST['ubigeo'],$celular,$email,$web,$facebook);
		echo $rspta ? "Proveedor actualizado" : "Registro no se pudo actualizar";
	}
	break;

	case 'desactivar':
	$rspta=$salida->desactivar($id_salida);
	echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
	$rspta=$salida->activar($id_salida);
	echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
	$rspta=$salida->mostrar($id_salida);
	//Codificar el resultado utilizando json
	echo json_encode($rspta);
	break;

	case 'listar':

	$aColumns = array( 's.id','s.id','e.nombre','li.nombre','td.descripcion', 's.serie_documento', 's.numero_documento','s.fecha_salida',"trim(p.ape_paterno)||' '||trim(p.ape_materno)||' '||trim(p.nombres)",'s.id_requerimiento' );
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




	$rspta=$salida->listar($sWhere,$sOrder,$sLimit);

	$a =$salida->contar($sWhere);
	$cnt = $a->cnt;

	//Vamos a declarar un array
	$data= Array();

	while ($reg=pg_fetch_object($rspta)){
		$btn=($reg->estado=='1')?'
		<button class="btn btn-link btn-xs" onclick="mostrar_salida('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
		' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>':
		'<button class="btn btn-link btn-xs" onclick="mostrar_salida('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
		' <button class="btn btn-link btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>';

		$url='../reportes/rptSalida.php?id='.$reg->{'id'};


		$btn.="<a target='_blank' href='".$url."'><i class='fa fa-print text-success'></i></a>";

		$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
		'<span class="label bg-red">Desactivado</span>';
		$data[]=array(

			"0"=>$reg->id,
			"1"=>$btn,
			"2"=>$reg->empresa,
			"3"=>$reg->local_ingreso,
			"4"=>$reg->tipo_documento,
			"5"=>$reg->serie_documento,
			"6"=>$reg->numero_documento,
			"7"=>$reg->fecha_salida,
			"8"=>$reg->persona,
			"9"=>$reg->id_requerimiento,
			"10"=>$stat,
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