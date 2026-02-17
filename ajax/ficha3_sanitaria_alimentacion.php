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
require_once "../modelos/Ficha3SanAlimentacion.php";

function to_pg_array($set)
{
	settype($set, 'array'); // can be called with a scalar or array
	$result = array();
	foreach ($set as $t) {
		if (is_array($t)) {
			$result[] = to_pg_array($t);
		} else {
			$t = str_replace('"', '\\"', $t); // escape double quote
			if (!is_numeric($t)) // quote only non-numeric values
				$t = '"' . $t . '"';
			$result[] = $t;
		}
	}
	return '{' . implode(",", $result) . '}'; // format
}

$ficha = new Ficha();

$aDet = array();
if (isset($_POST['id_especies'])) {
	$aesp = explode(",", $_POST['id_especies']);
	for ($i = 0; $i < count($aesp); $i++) {
		$aDet[$i] = array($aesp[$i]);
	}
}

$idempresa = isset($_POST["id_empresa"]) ? limpiarCadena($_POST["id_empresa"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$direccion = isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]) : "";
$ruc = isset($_POST["ruc"]) ? limpiarCadena($_POST["ruc"]) : "";
$nombre_localidad = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";

switch ($_GET["op"]) {
	case 'save':
		$rs = $ficha->save(
			$_POST['id_ficha'],
			$_POST['id_local'],
			$_POST['id_usuario'],

			$_POST['fecha'],
			limpiarCadena($_POST['responsable_mercado']),
			limpiarCadena($_POST['razon_s']),
			$_POST['numero_puesto'],
			limpiarCadena($_POST['tipo_alimentos']),
			$_POST['i_1'],
			$_POST['i_2'],
			$_POST['i_3'],

			$_POST['ii_1'],
			$_POST['ii_2'],
			$_POST['ii_3'],
			$_POST['ii_4'],


			$_POST['iii_1'],
			$_POST['iii_2'],
			$_POST['iii_3'],
			$_POST['iii_4'],
			$_POST['iii_5'],


			$_POST['iiii_1'],
			$_POST['iiii_2'],
			$_POST['iiii_3'],
			$_POST['iiii_4'],
			$_POST['iiii_5'],

			$_POST['iiii_6'],
			$_POST['iiii_7'],





			$_POST['n_inspector'],
			$_POST['n_vendedor'],
			$_POST['n_direccion'],
			$_POST['n_proveedores'],

			$_POST['total_puntaje1'],
			$_POST['total_puntaje2'],

			$_POST['total_puntaje3'],
			$_POST['total_puntaje4'],
			$_POST['total_puntaje5'],
			$_POST['total_puntaje6']




		);

		$rpta = pg_fetch_array($rs);
		echo $rpta[0];
		break;
	case 'deleteLocalidad':
		$rspta = $empresa->deleteLocalidad($_POST["id_localidad"]);
		echo $rspta ? "Registro eliminado" : "Registro no se puede eliminar";
		break;
	case 'mostrarLocalidad':
		$f = $empresa->mostrarLocalidad($_POST["id_localidad"]);
		$data = array(
			'descripcion' => $f->descripcion,
			'cnt_viviendas' => $f->cnt_viviendas,
			'sector' => $f->sector
		);
		echo json_encode($data);
		break;
	case 'saveLocalidad':
		$rs = $empresa->saveLocalidad(
			$_POST['id_localidad'], $_POST['id_local'],
			$_POST['sector'],
			$nombre_localidad, $_POST['cnt_viviendas'], $_POST['id_usuario']
		);
		$rpta = pg_fetch_array($rs);
		echo $rpta[0];
		break;
	case 'listarLocalidades':
		$aColumns = array('l.id', 'sec.descripcion', 'l.descripcion', "l.cnt_viviendas");
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "l.id";
		$sOrder = "";

		/*  Paging */

		$sLimit = "";
		if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
			$sLimit = "LIMIT " . intval($_GET['iDisplayLength']) . " OFFSET " .
				intval($_GET['iDisplayStart']);
		}

		/*    * Ordering     */
		if (isset($_GET['iSortCol_0'])) {
			$sOrder = "ORDER BY  ";
			for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
				if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
					$sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				" . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
				}
			}

			$sOrder = substr_replace($sOrder, "", -2);
			if ($sOrder == "ORDER BY") {
				$sOrder = "";
			}
		}

		/*
		 * Filtering
		 * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
		 * on which ILIKE can be used). Boolean fields etc will need a modification here.
		 */
		$sWhere = "WHERE l.id_local='" . $_GET['id_establecimiento'] . "' ";
		//$_GET['sSearch'] != ""
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
			$sWhere = "AND  (";
			for ($i = 0; $i < count($aColumns); $i++) {
				if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
					$sWhere .= $aColumns[$i] . " LIKE '%" . mb_strtoupper(pg_escape_string($_GET['sSearch']), 'UTF-8') . "%' OR ";
				}
			}
			$sWhere = substr_replace($sWhere, "", -3);
			$sWhere .= ")";
		}


		/* Individual column filtering */
		for ($i = 0; $i < count($aColumns); $i++) {
			if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {

				if ($aColumns[$i] == 'i.numero') {
					$sWhere .= "AND " . $aColumns[$i] . "='" . mb_strtoupper(pg_escape_string($_GET['sSearch_' . $i]), 'UTF-8') . "' ";
				} else {
					$sWhere .= " AND " . $aColumns[$i] . " LIKE '%" . mb_strtoupper(pg_escape_string($_GET['sSearch_' . $i]), 'UTF-8') . "%' ";
				}


			}
		}




		$rspta = $empresa->listarLocalidades($sWhere, $sOrder, $sLimit);


		$a = $empresa->contarLocalidades($sWhere);
		$cnt = $a->cnt;

		//Vamos a declarar un array
		$data = array();


		$stat = "";
		$btns = "";

		while ($reg = pg_fetch_object($rspta)) {

			/*$fa=$reg->{'i.fecha_autorizacion'};
					 $ids=$reg->{'id_salida'};

					 if ($fa!='' && $ids==''){
						 $btns="<button type='button' class='btn btn-success btn-sm' onclick='seleccionar_req(".$reg->{'i.id'}.")'>Seleccionar</button>";
					 }else{
						 $btns="";
					 }*/

			/*if ($ids!=""){
						 $stat="<i class='fa fa-check text-success'></i>";
					 }else{
						 $stat="";
					 }*/
			$btns = '<button class="btn btn-link btn-xs " onclick="show_localidad(' . $reg->{'l.id'} . ')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="delete_localidad(' . $reg->{'l.id'} . ')"><i class="fa fa-trash text-danger"></i></button>';
			$data[] = array(

				//,

				"0" => $btns,
				"1" => $reg->{'sec.descripcion'},
				"2" => $reg->{'l.descripcion'},
				"3" => $reg->{'l.cnt_viviendas'},
				"4" => $reg->{'l.id'}


			);
		}
		$results = array(
			//"sEcho"=>1, //Información para el datatables
			"iTotalRecords" => $cnt,
			//enviamos el total registros al datatable
			"iTotalDisplayRecords" => $cnt,
			//enviamos el total registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);
		break;
	case 'tableLocales':
		$rs = $empresa->selectLocales($_GET['id_empresa']);
		$data = array();

		?>
		<div id="div_detalleLocal">
			<div class="row">
				<div class="col-md-11">

					<table id="dt<?= $_GET['id_empresa']; ?>"
						class="table  table-striped table-bordered table-hover table-responsive" style="width: 100%">
						<thead class="bg-green">
							<tr class="modal-header-success">
								<!--<th ></th>-->
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
							<?php while ($reg = pg_fetch_object($rs)) {

								$btn = ($reg->estado == '1') ? '<button class="btn btn-link btn-xs" onclick="show_localidades(' . $reg->id . ')"><i class="fa fa-institution text-success"></i></button>
 				<button class="btn btn-link btn-xs" onclick="mostrar_local(' . $_GET['id_empresa'] . ',' . $reg->id . ')"><i class="fa fa-pencil"></i></button>' .
									' <button class="btn btn-link btn-xs" onclick="desactivar_local(' . $_GET['id_empresa'] . ',' . $reg->id . ')"><i class="fa fa-close"></i></button>' :
									'<button class="btn btn-link btn-xs" onclick="mostrar_local(' . $_GET['id_empresa'] . ',' . $reg->id . ')"><i class="fa fa-pencil"></i></button>' .
									' <button class="btn btn-link btn-xs" onclick="activar_local(' . $_GET['id_empresa'] . ',' . $reg->id . ')"><i class="fa fa-check"></i></button>';
								$stat = ($reg->estado == '1') ? '<span class="label bg-green">Activado</span>' :
									'<span class="label bg-red">Desactivado</span>';
								$btntoogle = '<button class="btn btn-link btn-xs" data-toggle="collapse" data-target="#colla' . $reg->id . '" onclick=""><i class="fa fa-plus"></i></button>';
								$btntoogle = '';

								echo "<tr>";
								//echo "<td scope='row'>".$btntoogle."</td>";
								echo "<td scope='row'>" . $btn . "</td>";
								echo "<td scope='row'>" . $reg->nombre . "</td>";
								echo "<td scope='row'>" . $reg->direccion . "</td>";
								echo "<td scope='row'>" . $reg->distrito . "</td>";
								echo "<td scope='row'>" . $reg->telefono_fijo . "</td>";
								echo "<td scope='row'>" . $reg->celular . "</td>";
								echo "<td scope='row'>" . $stat . "</td>";
								echo "</tr>";
								//echo "<tr class='collapse' id='colla".$reg->id."' ><td scope='row' colspan='8'>Localidades</td></tr>";
					
							}
							?>
						</tbody>
						<tfoot>
							<th colspan="7"><button type="button" class="btn btn-success"
									onclick="open_local('<?= $_GET['id_empresa']; ?>');">Nuevo</button></th>


						</tfoot>




					</table>
				</div>
			</div>
		</div>
		<?php

		break;
	case 'listLocales':
		$rs = $empresa->selectLocales($_GET['id_empresa']);
		$data = array();
		$pselect = (isset($_GET['id_selected'])) ? $_GET['id_selected'] : '';
		while ($reg = pg_fetch_object($rs)) {
			$sel = ($reg->id == $pselect) ? ' selected ' : '';
			$data[] = array("id" => $reg->id, "nombre" => $reg->nombre, "selected" => $sel);
		}
		$results = array('locales' => $data);
		echo json_encode($results);
		break;
	case 'list':

		$rs = $empresa->select();

		$data = array();
		while ($reg = pg_fetch_object($rs)) {
			$data[] = array("id" => $reg->id, "nombre" => $reg->nombre);
		}
		$results = array('empresas' => $data);
		echo json_encode($results);
		break;
	case 'guardaryeditar':
		if (empty($idempresa)) {

			$rspta = $empresa->insertar($nombre, $direccion, $_POST['ubigeo'], $ruc, $_POST['telefono_fijo']);

			echo $rspta ? "Empresa registrada" : "Empresa no se pudo registrar";
		} else {
			$rspta = $empresa->editar($idempresa, $nombre, $direccion, $_POST['ubigeo'], $ruc, $_POST['telefono_fijo']);
			echo $rspta ? "Registro actualizado" : "Registro no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta = $ficha->desactivar($_POST['id_ficha']);
		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
		break;

	case 'activar':
		$rspta = $ficha->activar($_POST['id_ficha']);
		echo $rspta ? "Registro activo" : "Registro no se puede activar";
		break;

	case 'mostrar':
		$f = $ficha->mostrar($_POST["id"]);
		//$rs=$ficha->detalleFicha($_POST["id_ficha"]);


		$data = pg_fetch_all($f);


		/*$data=array(
				  'id'=>$f->id,
				  'id_local'=>$f->id_local,
				  'fecha_inicio'=>$f->fecha_inicio,
				  'fecha_termino'=>$f->fecha_termino,
				  'id_tipo_actividad'=>$f->id_tipo_actividad,
				  'tipo_actividad'=>$f->tipo_actividad,
				  'sector'=>$f->sector,
				  'id_localidad'=>$f->id_localidad,
				  'localidad'=>$f->localidad,
				  'establecimiento'=>$f->establecimiento,
				  'distrito'=>$f->distrito
				  
			  );*/
		echo json_encode($data);

		break;

	case 'listar':

		$aColumns = array(
			'f.id',
			'l.nombre',
			'f.id',
			'f.fecha',
			'me.nombre_mercado',
			'f.razon_s',
			'f.numero_puesto',
			'uc.login',
			'f.fecha_creacion'
		);
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "f.id";
		$sOrder = "";

		/*  Paging */

		$sLimit = "";
		if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
			$sLimit = "LIMIT " . intval($_GET['iDisplayLength']) . " OFFSET " .
				intval($_GET['iDisplayStart']);
		}

		/*    * Ordering     */
		if (isset($_GET['iSortCol_0'])) {
			$sOrder = "ORDER BY  ";
			for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
				if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
					$sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
    				" . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
				}
			}

			$sOrder = substr_replace($sOrder, "", -2);
			if ($sOrder == "ORDER BY") {
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
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
			$sWhere = "WHERE (";
			for ($i = 0; $i < count($aColumns); $i++) {
				if ($_GET['bSearchable_' . $i] == "true") {
					$sWhere .= $aColumns[$i] . " LIKE '%" . mb_strtoupper(pg_escape_string($_GET['sSearch']), 'UTF-8') . "%' OR ";
				}
			}
			$sWhere = substr_replace($sWhere, "", -3);
			$sWhere .= ")";
		}


		if ($sWhere == '') {
			$sWhere = " WHERE f.id<>0 ";
		} else {
			$sWhere .= " AND f.id<>0 ";
		}

		/*Filtrando por establecimiento segun tipo de usuario*/
		if ($_GET['id_nivel'] == '2') { //Solo filtrar para tipo usuario simple
			$sWhere .= " AND f.id_local='" . $_GET['id_local'] . "' ";
		}



		/* Individual column filtering */
		for ($i = 0; $i < count($aColumns); $i++) {
			if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
				if ($sWhere == "") {
					$sWhere = "WHERE ";
				} else {
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i] . " LIKE '%" . mb_strtoupper(pg_escape_string($_GET['sSearch_' . $i]), 'UTF-8') . "%' ";
			}
		}




		$rspta = $ficha->listar($sWhere, $sOrder, $sLimit);

		$a = $ficha->contar($sWhere);
		$cnt = $a->cnt;

		//Vamos a declarar un array
		$data = array();

		while ($reg = pg_fetch_object($rspta)) {
			$btnEdit = '';
			$btnActDes = '';
			if ($reg->{'f.id_usuario_crea'} == $_GET['id_usuario']) {
				if ($reg->{'f.estado'} == 't') {
					$btnEdit = "<a href='#' onclick='open_ficha(" . $reg->{'f.id'} . ")'><i class='fa fa-pencil text-success'></i></a>&nbsp;";
				}
				$btnActDes = ($reg->{'f.estado'} == 't') ? "<button class='btn btn-link btn-xs ' onclick='desactivar(" . $reg->{'f.id'} . ")'>
 				<i class='fa fa-close text-danger'></i></button>" : "<button class='btn btn-link btn-xs' onclick='activar(" . $reg->{'f.id'} . ")'>
 				<i class='fa fa-check'></i></button>";
			}

			/*
						 $btnPrint="<a href='#' onclick='print_compra(".$reg->{'f.id'}.")'><i class='fa fa-print text-warning'></i></a>";
					 */


			$btnPrint = "<a target=' _blank' href=../reportes/formato_3_pdf.php?id=" . $reg->{'f.id'} . "	'print_compra'><i class='fa fa-print text-warning'></i></a>";


			$data[] = array(

				"0" => $btnEdit . $btnActDes . $btnPrint,
				"1" => $reg->{'l.nombre'},
				"2" => $reg->{'f.id'},
				"3" => $reg->{'f.fecha'},
				"4" => $reg->{'me.nombre_mercado'},
				"5" => $reg->{'f.razon_s'},
				"6" => $reg->{'f.numero_puesto'},
				"7" => $reg->{'uc.login'},
				"8" => $reg->{'f.fecha_creacion'},
				"9" => $reg->{'f.estado'},
			);
		}
		$results = array(
			//"sEcho"=>1, //Información para el datatables
			"iTotalRecords" => $cnt,
			//enviamos el total registros al datatable
			"iTotalDisplayRecords" => $cnt,
			//enviamos el total registros a visualizar
			"aaData" => $data
		);
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