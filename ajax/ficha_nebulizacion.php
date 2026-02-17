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
require_once "../modelos/FichaNebulizacion.php";

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
		$rs=$ficha->dataFumigacion($_GET['desde'],$_GET['tipo'],$_GET['id_establecimiento']);
		while ($reg=pg_fetch_object($rs)){

			/*$nameClass="";
			if ($reg->indice<1){
				$nameClass="success";
			}else if($reg->indice<2){
				$nameClass="warning";
			}else if($reg->indice>=2){
				$nameClass="danger";
			}*/

			echo "<tr>";
			echo "<td >".$reg->establecimiento."</td>";

			echo "<td >".$reg->fecha_programada."</td>";

			echo "<td >".$reg->actividad."</td>";

			echo "<td >".$reg->detalles_actividad."</td>";


			echo "</tr>";
		}
	break;	



	case 'positivosDistrito':
		$rs=$ficha->positivosDistrito($_GET['desde'],$_GET['hasta'],$_GET['tipo'],$_GET['id_establecimiento']);
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
		$rs=$ficha->getCoordenadasFumigacion($_GET['desde'],$_GET['id_establecimiento']);
		//$adet=pg_fetch_all($rs);
		//print_r($rs);

		//$adet=$rs->fetch_all(MYSQLI_ASSOC);
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
		$rs=$ficha->save(
			$_POST['id_ficha'],
			$_POST['id_local_destino'],
			$_POST['sector_neb'],
			$_POST['fecha_neb'],
			$_POST['id_turno_neb'],
			$_POST['nro_brigada_neb'],
			$_POST['id_jefe_brigada'],
			$_POST['nro_vuelta'],
			$_POST['hora_inicio_neb'],
			$_POST['hora_termino_neb'],
			limpiarCadena($_POST['tipo_maquina_neb']),
			limpiarCadena($_POST['insecticida_neb']),
			limpiarCadena($_POST['observaciones_neb']),
			$_POST['id_nebulizador'],
			$_POST['id_usuario']
		);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;

	case 'saveFichaDetalle':
		$rs=$ficha->saveFichaDetalle(
			$_POST['id_ficha'],
			$_POST['id_ficha_detalle'],			
			limpiarCadena($_POST['direccion']),
			$_POST['latitud'],
			$_POST['longitud'],
			limpiarCadena($_POST['codigo_manzana']),
			$_POST['nro_pisos'],
			$_POST['nro_residentes'],
			$_POST['id_condicion_vivienda'],
			$_POST['mezcla'],
			$_POST['gasolina'],
			$_POST['id_usuario']
		);
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
 									<th>Codigo Manzana</th>
 									<th>Direccion</th>
 									<th>Latitud</th>
 									<th>Longitud</th>
 									<th>Nro pisos</th>
 									<th>Nro residentes</th>
 									<th>Condicion Vivienda</th>
 									<th>Mezcla</th>
 									<th>Gasolina</th>
 									<th>Fecha Creacion</th>

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
 									//$deng=($reg->caso_probable_dengue=='1')?'SI':'NO';
 									//$stat='';
 									//$sub=round($reg->cantidad*$reg->costo_unitario_umc,2);
 									//$tot+=$sub;
 									echo "<tr>";
 									
 									echo "<td >".$btn."</td>";
 									echo "<td >".$reg->codigo_manzana."</td>";
 									echo "<td >".$reg->direccion."</td>";
 									echo "<td >".$reg->latitud."</td>";
 									echo "<td >".$reg->longitud."</td>";
 									echo "<td >".$reg->nro_pisos."</td>";
 									echo "<td >".$reg->nro_residentes."</td>";
 									echo "<td >".$reg->condicion_vivienda."</td>";
 									echo "<td >".$reg->mezcla."</td>";
 									echo "<td >".$reg->gasolina."</td>";
 									echo "<td >".$reg->fecha_creacion."</td>";

 									
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
 		//$rs=$ficha->detalleFicha($_POST["id_ficha"]);


 		//$adetalle=pg_fetch_all($rs);


		$data=array(
			'id'=>$f->id,
			'id_local'=>$f->id_local,
			'fecha'=>$f->fecha,
			'establecimiento'=>$f->establecimiento,
			'hora_inicio'=>$f->hora_inicio,
			'hora_termino'=>$f->hora_termino,
			'sector'=>$f->sector,
			'vuelta'=>$f->vuelta,
			'nro_brigada'=>$f->nro_brigada,
			'tipo_maquina'=>$f->tipo_maquina,
			'id_turno'=>$f->id_turno,
			'insecticida'=>$f->insecticida,
			'observaciones'=>$f->observaciones,
			'id_nebulizador'=>$f->id_nebulizador,
			'id_jefe_brigada'=>$f->id_jefe_brigada,
			'jefe_brigada'=>$f->jefe_brigada,
			'nebulizador'=>$f->nebulizador

		);
 		echo json_encode($data);
	break;

	case 'listar':

		$aColumns = array( 
			'f.id',
			'l.nombre', 
			'f.sector',
			'f.fecha', 
			't.descripcion',
			'f.nro_brigada',
			'jefe_brigada',
			'f.vuelta',
			'f.hora_inicio',
			'f.hora_termino',
			'f.tipo_maquina',
			'f.insecticida',
			'uc.login',
			'f.fecha_creacion'
			 );
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
	    
	    /*
	    if ($_GET['id_nivel']=='2'){ 
	    	$sWhere.=" AND f.id_local='".$_GET['id_local']."' ";
	    }*/
		
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

	    		if ($aColumns[$i]=='f.id' ){
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
 				//if ($reg->{'f.estado'}=='t'){
 					$btnEdit="<a href='#' onclick='open_ficha(".$reg->{'f.id'}.")'><i class='fa fa-pencil text-success'></i></a>&nbsp;";
 				//}	
 				/*$btnActDes=($reg->{'f.estado'}=='t')?"<button class='btn btn-link btn-xs ' onclick='desactivar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-close text-danger'></i></button>":"<button class='btn btn-link btn-xs' onclick='activar(".$reg->{'f.id'}.")'>
 				<i class='fa fa-check'></i></button>";*/
 			}
 			$btnPrint="<a href='#' onclick='print_compra(".$reg->{'f.id'}.")'><i class='fa fa-print text-warning'></i></a>";



 			//$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activado</span>':
 			//	'<span class="label bg-red">Desactivado</span>';

 			//$btn='';$stat='';
 			$btnAnul='';

 			$data[]=array(

 				"0"=>$reg->{'f.id'},
 				"1"=>$btnEdit.' '.$btnActDes.$btnPrint,
 				"2"=>$reg->{'l.nombre'},
 				"3"=>$reg->{'f.sector'},
 				"4"=>$reg->{'f.fecha'},
 				"5"=>$reg->{'t.descripcion'},
 				"6"=>$reg->{'f.nro_brigada'},
 				"7"=>$reg->{'jefe_brigada'},
 				"8"=>$reg->{'f.vuelta'},
 				"9"=>$reg->{'f.hora_inicio'},
 				"10"=>$reg->{'f.hora_termino'},
 				"11"=>$reg->{'f.tipo_maquina'},
 				"12"=>$reg->{'f.insecticida'},
 				"13"=>$reg->{'uc.login'},
 				"14"=>$reg->{'f.fecha_creacion'},
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
