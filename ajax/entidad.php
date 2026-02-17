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
require_once "../modelos/Entidad.php";

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

$entidad=new Entidad();


$id_ficha=isset($_POST["id_ficha"])? limpiarCadena($_POST["id_ficha"]):"";

$id_ingreso=isset($_POST["id_ingreso"])? limpiarCadena($_POST["id_ingreso"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";

if (isset($_POST['detalle'])){
	$aDet=array();
	for ($i=0;$i<count($_POST['detalle']);$i++){
		$aDet[$i]=array(
			$_POST['detalle'][$i]['direccion_familia'],
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
			$_POST['detalle'][$i]['cnt_febriles']

		);

	}
}


switch ($_GET["op"]){
	case 'reportConsolidadoAedes':
		$rs=$ficha->reportConsolidadoAedes($_POST['mes'],$_POST['anio'],$_POST['tipo']);
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
		$rs=$compra->eliminaItem($_POST['id_ingreso'],$_POST['id_item'],$_POST['id_lote']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];

	break;
	case 'updateCompra':
		$rs=$compra->actualizar($_POST['id_ingreso'],$_POST['id_local'],$_POST['id_tipo_documento'],$_POST['serie_documento'],$_POST['numero_documento'],$_POST['fecha_compra'],$_POST['id_moneda'],$_POST['id_forma_pago'],$_POST['tipo_cambio'],$_POST['porcentaje_igv'],$_POST['numero_guia'],$_POST['id_proveedor'],$_POST['observacion'],'1');
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'saveFicha':
		$rs=$ficha->save($_POST['id_ficha'],$_POST['id_local'],$_POST['sector'],$_POST['fecha_inicio'],
			$_POST['id_tipo_actividad'],$_POST['id_localidad'],$_POST['id_usuario'],$_POST['fecha_termino'],
			to_pg_array($aDet));
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'detalleCompra':
		$rs=$compra->detalleIngreso($_GET['id_ingreso']);
		$data=array();
 			?>
 			<div class="" id="div_detalleLocal" >
 				<div class="row">

 					<div class="col-md-11">

 						<table class="table table-striped table-bordered table-hover table-responsive " >
 							<thead >
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
		$rspta=$ficha->desactivar($id_ficha);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$ficha->activar($id_ficha);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;


	case 'buscar_id':
		$f=$entidad->buscar_id($_GET["ruc"]); 

		if (isset($f->id)){
			$data=array(
				'msj'=>'',
				'id'=>$f->id,
				'nombre'=>$f->nombre,
				'direccion'=>$f->direccion,
				'id_ubigeo'=>$f->id_ubigeo,
				'telefono_fijo'=>$f->telefono_fijo,
				'celular'=>$f->celular,
				'ruc'=>$f->ruc,
				'e_mail'=>$f->e_mail,
				'distrito'=>$f->distrito,
				'distrito_empresa'=>$f->distrito_empresa
				
			);
		}else{
			$data=array(
				'msj'=>'NF'
			);
		}
 		echo json_encode($data);

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
			'detalle'=>$adetalle
		);
 		echo json_encode($data);
	break;

	case 'listar':

		$aColumns = array( 'f.id','f.id', 'l.nombre','f.id', 'ta.descripcion','f.fecha_inicio','f.fecha_termino','f.sector','lo.descripcion','uc.login','f.fecha_creacion' );
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
 				"9"=>$reg->{'uc.login'},
 				"10"=>$reg->{'f.fecha_creacion'},
 				"11"=>$reg->{'f.estado'}
 				
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
