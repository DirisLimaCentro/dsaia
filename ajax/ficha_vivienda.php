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
require_once "../modelos/FichaVivienda.php";

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

$ficha=new Ficha();


$id_ficha=isset($_POST["id_ficha"])? limpiarCadena($_POST["id_ficha"]):"";

$id_ingreso=isset($_POST["id_ingreso"])? limpiarCadena($_POST["id_ingreso"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";

if (isset($_POST['detalle'])){
	$aDet=array();
	for ($i=0;$i<count($_POST['detalle']);$i++){
		$aDet[$i]=array(
			limpiarCadena($_POST['detalle'][$i]['direccion_familia']),
			$_POST['detalle'][$i]['nro_habitantes'],
			$_POST['detalle'][$i]['id_condicion_vivienda'],
			$_POST['detalle'][$i]['cnt_tipo_1_i'],
			$_POST['detalle'][$i]['cnt_tipo_1_p'],
			$_POST['detalle'][$i]['cnt_tipo_1_t'],
			$_POST['detalle'][$i]['cnt_tipo_1_v'],
			$_POST['detalle'][$i]['cnt_tipo_2_i'],
			$_POST['detalle'][$i]['cnt_tipo_2_p'],
			$_POST['detalle'][$i]['cnt_tipo_2_t'],
			$_POST['detalle'][$i]['cnt_tipo_2_v'],
			$_POST['detalle'][$i]['cnt_tipo_3_i'],
			$_POST['detalle'][$i]['cnt_tipo_3_p'],
			$_POST['detalle'][$i]['cnt_tipo_3_t'],
			$_POST['detalle'][$i]['cnt_tipo_3_v'],
			$_POST['detalle'][$i]['cnt_tipo_4_i'],
			$_POST['detalle'][$i]['cnt_tipo_4_p'],
			$_POST['detalle'][$i]['cnt_tipo_4_t'],
			$_POST['detalle'][$i]['cnt_tipo_4_v'],
			$_POST['detalle'][$i]['cnt_tipo_5_i'],
			$_POST['detalle'][$i]['cnt_tipo_5_p'],
			$_POST['detalle'][$i]['cnt_tipo_5_t'],
			$_POST['detalle'][$i]['cnt_tipo_5_v'],
			$_POST['detalle'][$i]['cnt_tipo_6_i'],
			$_POST['detalle'][$i]['cnt_tipo_6_p'],
			$_POST['detalle'][$i]['cnt_tipo_6_t'],
			$_POST['detalle'][$i]['cnt_tipo_6_v'],
			$_POST['detalle'][$i]['cnt_tipo_7_i'],
			$_POST['detalle'][$i]['cnt_tipo_7_p'],
			$_POST['detalle'][$i]['cnt_tipo_7_t'],
			$_POST['detalle'][$i]['cnt_tipo_7_v'],
			$_POST['detalle'][$i]['cnt_tipo_8_i'],
			$_POST['detalle'][$i]['cnt_tipo_8_p'],
			$_POST['detalle'][$i]['cnt_tipo_8_t'],
			$_POST['detalle'][$i]['cnt_tipo_8_v'],
			$_POST['detalle'][$i]['cnt_tipo_9_i'],
			$_POST['detalle'][$i]['cnt_tipo_9_p'],
			$_POST['detalle'][$i]['cnt_tipo_9_t'],
			$_POST['detalle'][$i]['cnt_tipo_9_v'],
			$_POST['detalle'][$i]['cnt_larvicidas'],
			$_POST['detalle'][$i]['cnt_febriles'],
			$_POST['detalle'][$i]['id_usuario_registro'],
			$_POST['detalle'][$i]['caso_probable_dengue'],
			$_POST['detalle'][$i]['cantidad_probable_dengue'],

			$_POST['detalle'][$i]['cnt_tipo_1_tf'],
			$_POST['detalle'][$i]['cnt_tipo_1_d'],
			$_POST['detalle'][$i]['cnt_tipo_2_tf'],
			$_POST['detalle'][$i]['cnt_tipo_2_d'],
			$_POST['detalle'][$i]['cnt_tipo_3_tf'],
			$_POST['detalle'][$i]['cnt_tipo_3_d'],
			$_POST['detalle'][$i]['cnt_tipo_4_tf'],
			$_POST['detalle'][$i]['cnt_tipo_4_d'],
			$_POST['detalle'][$i]['cnt_tipo_5_tf'],
			$_POST['detalle'][$i]['cnt_tipo_5_d'],
			$_POST['detalle'][$i]['cnt_tipo_6_tf'],
			$_POST['detalle'][$i]['cnt_tipo_6_d'],
			$_POST['detalle'][$i]['cnt_tipo_7_tf'],
			$_POST['detalle'][$i]['cnt_tipo_7_d'],
			$_POST['detalle'][$i]['cnt_tipo_8_tf'],
			$_POST['detalle'][$i]['cnt_tipo_8_d'],
			$_POST['detalle'][$i]['cnt_tipo_9_tf'],
			$_POST['detalle'][$i]['cnt_tipo_9_d'],

			$_POST['detalle'][$i]['cnt_tipo_10_i'],
			$_POST['detalle'][$i]['cnt_tipo_10_p'],
			$_POST['detalle'][$i]['cnt_tipo_10_t'],
			$_POST['detalle'][$i]['cnt_tipo_10_v'],
			$_POST['detalle'][$i]['cnt_tipo_10_tf'],
			$_POST['detalle'][$i]['cnt_tipo_10_d'],

			$_POST['detalle'][$i]['latitud'],
			$_POST['detalle'][$i]['longitud']

		);

	}
}


switch ($_GET["op"]){

	case 'dataFumigacion':
		$rs=$ficha->dataFumigacion($_GET['desde'],$_GET['hasta'],$_GET['tipo'],$_GET['id_establecimiento']);
		while ($reg=pg_fetch_object($rs)){

			echo "<tr>";
			echo "<td >".$reg->establecimiento."</td>";

			echo "<td >".$reg->fecha_programada."</td>";

			echo "<td >".$reg->actividad."</td>";

			echo "<td >".$reg->detalles_actividad."</td>";


			echo "</tr>";
		}
	break;	

	case 'dataNebulizacion':
		$rs=$ficha->dataNebulizacion($_GET['desde'],$_GET['hasta'],$_GET['tipo'],$_GET['id_establecimiento']);
		while ($reg=pg_fetch_object($rs)){

			echo "<tr>";
			echo "<td >".$reg->establecimiento."</td>";
			echo "<td >".$reg->fecha."</td>";
			echo "<td >".$reg->cantidad."</td>";
			echo "</tr>";
		}
	break;



	case 'positivosDistrito':
		$rs=$ficha->positivosDistrito($_GET['desde'],$_GET['hasta'],$_GET['tipo'],$_GET['id_establecimiento'],$_GET['tipo_ag']);
		while ($reg=pg_fetch_object($rs)){

			$nameClass="";
			if ($reg->indice<1){
				$nameClass="success";
			}else if($reg->indice<2){
				$nameClass="warning";
			}else if($reg->indice>=2){
				$nameClass="danger";
			}

			echo "<tr>";
			echo "<td id='td_distrito_".$reg->indice_mapa."'>".$reg->distrito."</td>";

			echo "<td id='td_insp_".$reg->indice_mapa."' class='text-right'>".$reg->inspeccionados."</td>";

			echo "<td id='td_posi_".$reg->indice_mapa."' class='text-right'>".$reg->positivos."</td>";

			echo "<td id='td_ia_".$reg->indice_mapa."' class='text-right ".$nameClass."' >".$reg->indice."</td>";


			echo "<td style='display: none' id='td_conf_".$reg->indice_mapa."'  >".$reg->confirmados."</td>";
			echo "<td style='display: none' id='td_prob_".$reg->indice_mapa."'  >".$reg->probables."</td>";

			echo "<td style='display: none' id='td_ac_".$reg->indice_mapa."'  >".$reg->autoctonos_confirmados."</td>";
			echo "<td style='display: none' id='td_ic_".$reg->indice_mapa."'  >".$reg->importados_confirmados."</td>";
			echo "<td style='display: none' id='td_ap_".$reg->indice_mapa."'  >".$reg->autoctonos_probables."</td>";
			echo "<td style='display: none' id='td_ip_".$reg->indice_mapa."'  >".$reg->importados_probables."</td>";

			echo "<td style='display: none' id='td_fal_".$reg->indice_mapa."'  >".$reg->fallecidos."</td>";
			echo "<td style='display: none' id='td_feb_".$reg->indice_mapa."'  >".$reg->febriles."</td>";




			echo "</tr>";
		}
	break;	

	case 'getCoordenadasFumigacion':
		$rs=$ficha->getCoordenadasFumigacion($_GET['desde'],$_GET['hasta'],$_GET['id_establecimiento']);		
		$adet=pg_fetch_all($rs);
		$data=array(			
			'detalle'=>$adet
		);
 		echo json_encode($data);
	break;

	case 'getCoordenadasNebulizacion':
		$rs=$ficha->getCoordenadasNebulizacion($_GET['desde'],$_GET['hasta'],$_GET['id_establecimiento']);		
		$adet=pg_fetch_all($rs);
		$data=array(			
			'detalle'=>$adet
		);
 		echo json_encode($data);
	break;




	case 'getCoordenadas':
		$rs=$ficha->getCoordenadas($_GET['desde'],$_GET['hasta'],$_GET['tipo'],$_GET['id_establecimiento']);
		//$adet=pg_fetch_all($rs);
		//print_r($rs);

		//$adet=$rs->fetch_all(MYSQLI_ASSOC);
		$adet=pg_fetch_all($rs);

		$data=array(			
			'detalle'=>$adet
		);
 		echo json_encode($data);

	break;


	case 'getItem':
		
 		$rs=$ficha->getItem($_GET["id"]);


 		$data=pg_fetch_all($rs);

 		echo json_encode($data);

	break;
	case 'reportConsolidadoAedes':
		$rs=$ficha->reportConsolidadoAedes($_POST['mes'],$_POST['anio'],
			$_POST['tipo'],$_POST['id_nivel'],$_POST['id_local']);
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=$reg;
 		}
		echo json_encode($data);	

	break;

	case 'reportCalidadAgua':
		$rs=$ficha->reportCalidadAgua($_POST['anio']);
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=$reg;
 		}
		echo json_encode($data);	

	break;

	case 'reportAedico':
		$rs=$ficha->reportAedico($_POST['mes'],$_POST['anio'],$_POST['tipo'],$_POST['nivel'],$_POST['id_local']);
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=$reg;
 		}
		echo json_encode($data);	

	break;

	case 'reportAedicoSector':
		$rs=$ficha->reportAedicoSector($_POST['mes'],$_POST['anio'],
			$_POST['tipo'],$_POST['nivel'],$_POST['id_local']);
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=$reg;
 		}
		echo json_encode($data);	

	break;

	case 'reportCobertura':
		if ($_POST['nivel']=='E'){  //x establecimiento
			$rs=$ficha->reportCobertura($_POST['mes'],$_POST['anio'],$_POST['tipo']);
		}else{
			$rs=$ficha->reportCoberturaSector($_POST['id_local'],$_POST['mes'],$_POST['anio'],$_POST['tipo']);
		}
		
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=$reg;
 		}
		echo json_encode($data);	

	break;



	case 'updateInsertItem':
		$rs=$compra->actualizarInsertarItem($_POST['accion'],$_POST['id_ingreso'],$_POST['id_item'],$_POST['id_lote'],$_POST['numero_lote'],$_POST['cantidad'],$_POST['costo_umc'],$_POST['fecha_vencimiento'],$_POST['factor']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];

	break;
	case 'showItem':
		$result=$compra->mostrarItem($_POST['id_ingreso'],$_POST['id_item'],$_POST['id_lote']);
 		echo json_encode($result);
	break;
	case 'verificaDisponibilidadLote':
		$rs=$compra->verificaDisponibilidadLote($_POST['id_lote']);
		$cnt=pg_num_rows($rs);
		echo ($cnt>0)?'1':'0';

	break;
	case 'removeItem':
		$rs=$ficha->eliminaItem($_POST['id']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];

	break;
	case 'updateCompra':
		$rs=$compra->actualizar($_POST['id_ingreso'],$_POST['id_local'],$_POST['id_tipo_documento'],$_POST['serie_documento'],$_POST['numero_documento'],$_POST['fecha_compra'],$_POST['id_moneda'],$_POST['id_forma_pago'],$_POST['tipo_cambio'],$_POST['porcentaje_igv'],$_POST['numero_guia'],$_POST['id_proveedor'],$_POST['observacion'],'1');
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'saveFicha':
		/*$rs=$ficha->save($_POST['id_ficha'],$_POST['id_local'],$_POST['sector'],$_POST['fecha_inicio'],
			$_POST['id_tipo_actividad'],$_POST['id_localidad'],$_POST['id_usuario'],$_POST['fecha_termino'],
			to_pg_array($aDet));*/
		$rs=$ficha->save($_POST['id_ficha'],$_POST['id_local'],$_POST['sector'],$_POST['fecha_inicio'],
			$_POST['id_tipo_actividad'],$_POST['id_localidad'],$_POST['id_usuario'],$_POST['fecha_termino'],
			$_POST['id_tipo_documento_paciente'],$_POST['numero_documento_paciente'],
			limpiarCadena($_POST['nombres_paciente']),
			limpiarCadena($_POST['id_tipo_paciente']),
			limpiarCadena($_POST['id_usuario_inspector']),
			limpiarCadena($_POST['direccion_ovitrampa'])
		);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;

	case 'saveFichaDetalle':
		$id_ubigeo=(isset($_POST['id_ubigeo'])?$_POST['id_ubigeo']:'');

		$rs=$ficha->saveFichaDetalle($_POST['id_ficha'],$_POST['id_ficha_detalle'],to_pg_array($aDet),$id_ubigeo);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;

	case 'detalleFicha':
		$rs=$ficha->detalleFicha($_GET['id']);
		$data=array();
 			?>
 			<div  >
 				<div class="row">

 					<div class="col-md-11 table-responsive">

 						<table id="dt<?=$_GET['id']; ?>" class="table table-responsive table-striped table-bordered table-hover " >
 							<thead >
 								<tr class="v-grid-header">
 									
 									<th>Acciones</th>
 									<th>Direccion/Familia</th>

 									<th>Distrito</th>

 									<th>Latitud</th>
 									<th>Longitud</th>

 									<th>N° Habi</th>
 									<th>Condicion</th>

 									<th>I1</th>
 									<th>P1</th>
 									<th>TQ1</th> 									
 									<!--<th>LP1</th>-->
 									<th>TF1</th>

 									<th>I2</th>
 									<th>P2</th>
 									<th>TQ2</th>
 									<!--<th>LP2</th>-->
 									<th>TF2</th>
 									

 									<th>I3</th>
 									<th>P3</th>
 									<th>TQ3</th> 									
 									<!--<th>LP3</th>-->
 									<th>TF3</th>

 									<th>I4</th>
 									<th>P4</th>
 									<th>TQ4</th>
 									<!--<th>LP4</th>-->
 									<th>TF4</th>

 									<th>I5</th>
 									<th>P5</th>
 									<th>TQ5</th>
 									<!--<th>LP5</th>-->
 									<th>TF5</th>

 									<th>I6</th>
 									<th>P6</th>
 									<th>TQ6</th>
 									<!--<th>LP6</th>-->
 									<th>TF6</th>

 									<th>I7</th>
 									<th>P7</th>
 									<th>TQ7</th>
 									<!--<th>LP7</th>-->
 									<th>TF7</th>

 									<th>I8</th>
 									<th>P8</th>
 									<th>TQ8</th>
 									<!--<th>LP8</th>-->
 									<th>TF8</th>
 									<th>D8</th>

 									<th>I9</th>
 									<th>P9</th>
 									<th>TQ9</th>
 									<!--<th>LP9</th>-->
 									<th>TF9</th>
 									<th>D9</th>

 									<th>Larv</th>
 									<th>Febr</th>
 									
 									<!--<th>Inspeccionado por</th>-->
 									<th>Cantidad probable</th>

 								</tr>
 							</thead>
 							<tbody>
 								<? $tot=0;$cnt_items=0;
 								while ($reg=pg_fetch_object($rs)){
 									
 									$cnt_items++;
 									$btn="";
 									if ($reg->id_usuario_crea==$_GET['id_usuario']){
 										$btn='<button class="btn btn-link btn-xs " onclick="action_show_item('.$reg->id.','.$_GET['id'].')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="action_remove_item('.$reg->id.','.$_GET['id'].')"><i class="fa fa-close text-success"></i></button>';
 									}
 									$deng=($reg->caso_probable_dengue=='1')?'SI':'NO';
 									//$stat='';
 									//$sub=round($reg->cantidad*$reg->costo_unitario_umc,2);
 									//$tot+=$sub;
 									echo "<tr>";
 									
 									echo "<td >".$btn."</td>";
 									echo "<td >".$reg->direccion_familia."</td>";

 									echo "<td >".$reg->distrito."</td>";

 									echo "<td >".$reg->latitud."</td>";
 									echo "<td >".$reg->longitud."</td>";

 									echo "<td >".$reg->nro_habitantes."</td>";
 									echo "<td >".$reg->condicion_vivienda."</td>";

									echo "<td >".$reg->cnt_tipo_1_i."</td>";
									echo "<td >".$reg->cnt_tipo_1_p."</td>";
									echo "<td >".$reg->cnt_tipo_1_t."</td>";
									echo "<td >".$reg->cnt_tipo_1_tf."</td>";
									
									echo "<td >".$reg->cnt_tipo_2_i."</td>";
									echo "<td >".$reg->cnt_tipo_2_p."</td>";
									echo "<td >".$reg->cnt_tipo_2_t."</td>";
									echo "<td >".$reg->cnt_tipo_2_tf."</td>";

									echo "<td >".$reg->cnt_tipo_3_i."</td>";
									echo "<td >".$reg->cnt_tipo_3_p."</td>";
									echo "<td >".$reg->cnt_tipo_3_t."</td>";
									echo "<td >".$reg->cnt_tipo_3_tf."</td>";

									echo "<td >".$reg->cnt_tipo_10_i."</td>";
									echo "<td >".$reg->cnt_tipo_10_p."</td>";
									echo "<td >".$reg->cnt_tipo_10_t."</td>";
									echo "<td >".$reg->cnt_tipo_10_tf."</td>";


									echo "<td >".$reg->cnt_tipo_4_i."</td>";
									echo "<td >".$reg->cnt_tipo_4_p."</td>";
									echo "<td >".$reg->cnt_tipo_4_t."</td>";
									echo "<td >".$reg->cnt_tipo_4_tf."</td>";

									echo "<td >".$reg->cnt_tipo_5_i."</td>";
									echo "<td >".$reg->cnt_tipo_5_p."</td>";
									echo "<td >".$reg->cnt_tipo_5_t."</td>";
									echo "<td >".$reg->cnt_tipo_5_tf."</td>";

									echo "<td >".$reg->cnt_tipo_6_i."</td>";
									echo "<td >".$reg->cnt_tipo_6_p."</td>";
									echo "<td >".$reg->cnt_tipo_6_t."</td>";
									echo "<td >".$reg->cnt_tipo_6_tf."</td>";

									echo "<td >".$reg->cnt_tipo_7_i."</td>";
									echo "<td >".$reg->cnt_tipo_7_p."</td>";
									echo "<td >".$reg->cnt_tipo_7_t."</td>";
									echo "<td >".$reg->cnt_tipo_7_tf."</td>";

									echo "<td >".$reg->cnt_tipo_7_d."</td>";

									/*echo "<td >".$reg->cnt_tipo_8_i."</td>";
									echo "<td >".$reg->cnt_tipo_8_p."</td>";
									echo "<td >".$reg->cnt_tipo_8_t."</td>";
									echo "<td >".$reg->cnt_tipo_8_tf."</td>";*/

									echo "<td >".$reg->cnt_tipo_9_i."</td>";
									echo "<td >".$reg->cnt_tipo_9_p."</td>";
									echo "<td >".$reg->cnt_tipo_9_t."</td>";
									echo "<td >".$reg->cnt_tipo_9_tf."</td>";

									echo "<td >".$reg->cnt_tipo_9_d."</td>";


									echo "<td >".$reg->cnt_larvicidas."</td>";
									echo "<td >".$reg->cnt_febriles."</td>";

									//echo "<td >".$reg->inspector."</td>";
									echo "<td >".$reg->cantidad_probable_dengue."</td>";

									//echo "<td scope='row' class='text-right'>".$reg->costo_unitario_umc."</td>";
									//echo "<td scope='row' class='text-right'>".number_format($sub,2,'.',',')."</td>";
									//echo "<td scope='row'>".$stat."</td>";
 									echo "</tr>";

 								}
 								?>
 							</tbody>
 							<!--<tfoot>
 								<tr >
 									
 								</tr>
 							</tfoot>-->




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
		$rspta=$ficha->desactivar($id_ficha);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$ficha->activar($id_ficha);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$f=$ficha->mostrar($_POST["id_ficha"]); 		
 		$rs=$ficha->detalleFicha($_POST["id_ficha"]);


 		$adetalle=pg_fetch_all($rs);


		$data=array(
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
			'distrito'=>$f->distrito,

			'id_tipo_documento_paciente'=>$f->id_tipo_documento_paciente,
			'numero_documento_paciente'=>$f->numero_documento_paciente,
			'nombres_paciente'=>$f->nombres_paciente,

			'id_tipo_paciente'=>$f->id_tipo_paciente,
			'direccion_ovitrampa'=>$f->direccion_ovitrampa,
			'id_usuario_inspector'=>$f->id_usuario_inspector,	

			'detalle'=>$adetalle
		);
 		echo json_encode($data);
	break;

	case 'listar':

		$aColumns = array( 'f.id','f.id', 'l.nombre','f.id', 'ta.descripcion','f.fecha_inicio','f.fecha_termino','f.sector','lo.descripcion','f.nombres_paciente','uc.login','f.fecha_creacion','inspector' );
		/* Indexed column (used for fast and accurate table cardinality) */
    	$sIndexColumn = "f.id";
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

		if ($sWhere==''){
	    	$sWhere=" WHERE f.id<>0 ";
	    }else{
	    	$sWhere.=" AND f.id<>0 ";
	    }

	    /*Filtrando por establecimiento segun tipo de usuario*/
	    if ($_GET['id_nivel']=='2'){ //Solo filtrar para tipo usuario simple
	    	$sWhere.=" AND f.id_local='".$_GET['id_local']."' ";
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

	    		if ($aColumns[$i]=='f.id' || $aColumns[$i]=='f.sector'){
	    			$sWhere .= $aColumns[$i]." = '".$_GET['sSearch_'.$i]."' ";
	    		}else{
	    			$sWhere .= $aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    		}
	    		

	    	}
	    }




		$rspta=$ficha->listar($sWhere,$sOrder,$sLimit);

		//$r=pg_fetch_object($rspta);
		//print_r($r);
		//echo $r->{'i.nombre'};
		//exit();

		$a =$ficha->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();



 		while ($reg=pg_fetch_object($rspta)){
 			/*$btn=($reg->{'i.estado'}=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar_compra('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->{'i.id'}.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar_compra('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar('.$reg->{'i.id'}.')"><i class="fa fa-check"></i></button>';*/
 			//$btnAnul=($reg->{'i.estado'}=='1')?"&nbsp;&nbsp;<a href='#' onclick='desactivar(".$reg->{'i.id'}.")'><i class='fa fa-remove '></i></a>":"";

 			//$btnIcons='<button data-toggle="tooltip" data-placement="bottom" title="Editar" class="btn btn-link btn-xs" onclick="mostrar_compra('.$reg->{'i.id'}.')"><i class="fa fa-pencil"></i></button><button data-toggle="tooltip" data-placement="bottom" title="Imprimir" class="btn btn-link btn-xs" onclick="print_compra('.$reg->{'i.id'}.')"><i class="fa fa-print"></i></button>';
 			$btnEdit='';
 			$btnActDes='';
 			if ($reg->{'f.id_usuario_crea'}==$_GET['id_usuario']){
 				if ($reg->{'f.estado'}=='t'){
 					$btnEdit="<a href='#' onclick='open_ficha(".$reg->{'f.id'}.")'><i class='fa fa-pencil text-success'></i></a>&nbsp;";
 				}	
 				$btnActDes=($reg->{'f.estado'}=='t')?"<button class='btn btn-link btn-xs ' onclick='desactivar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-close text-danger'></i></button>":"<button class='btn btn-link btn-xs' onclick='activar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-check'></i></button>";
 			}
 			$btnPrint="<a href='#' onclick='print_compra(".$reg->{'f.id'}.")'><i class='fa fa-print text-warning'></i></a>";



 			//$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activado</span>':
 			//	'<span class="label bg-red">Desactivado</span>';

 			//$btn='';$stat='';
 			$btnAnul='';

 			$data[]=array(

 				"0"=>$reg->{'f.id'},
 				"1"=>$btnEdit.$btnActDes.$btnPrint,
 				"2"=>$reg->{'l.nombre'},
 				"3"=>$reg->{'f.id'},
 				"4"=>$reg->{'ta.descripcion'},
 				"5"=>$reg->{'f.fecha_inicio'},
 				"6"=>$reg->{'f.fecha_termino'},
 				"7"=>$reg->{'f.sector'},
 				"8"=>$reg->{'lo.descripcion'},
 				"9"=>$reg->{'f.nombres_paciente'},
 				"10"=>$reg->{'uc.login'},
 				"11"=>$reg->{'f.fecha_creacion'},
 				"12"=>$reg->{'inspector'}, 				
 				"13"=>$reg->{'id_ubigeo'},
 				"14"=>$reg->{'distrito'},
 				"15"=>$reg->{'f.estado'},
 				
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
