<?php 
ob_start();
//if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
//}
/*if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
if ($_SESSION['almacen']==0)
{
	*/
require_once "../modelos/Requerimiento.php";

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

$requerimiento=new Requerimiento();


$id_item=isset($_POST["id_item"])? limpiarCadena($_POST["id_item"]):"";

$id_ingreso=isset($_POST["id_ingreso"])? limpiarCadena($_POST["id_ingreso"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";

if (isset($_POST['detalle'])){
	$aDet=array();
	for ($i=0;$i<count($_POST['detalle']);$i++){
		$aDet[$i]=array($_POST['detalle'][$i]['id_item'],$_POST['detalle'][$i]['cantidad'],$_POST['detalle'][$i]['id_unidad_medida']);

	}	
}

if (isset($_POST['id_personal_referencia'])){
	$aPersona=array();
	for ($i=0;$i<count($_POST['id_personal_referencia']);$i++){
		$aPersona[$i]=array($_POST['id_personal_referencia'][$i]['id_persona']);
	}	
}

switch ($_GET["op"]){

	case 'autorizarRequerimiento':
		$requerimiento->autorizarRequerimiento($_POST['id_requerimiento'],$_POST['id_usuario_autoriza']);

	break;
	case 'revertirRequerimiento':
		$requerimiento->revertirRequerimiento($_POST['id_requerimiento'],$_POST['id_usuario_autoriza']);

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
	case 'updateRequerimiento':

		$rs=$requerimiento->actualizar($_POST['id_requerimiento'],$_POST['urgente'],$_POST['id_usuario_crea'],
			to_pg_array($aPersona),
			$_POST['observaciones'],to_pg_array($aDet));

		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'saveRequerimiento':
		$rs=$requerimiento->insertar($_POST['id_empresa'],$_POST['id_local'],$_POST['urgente'],$_POST['observaciones'],$_POST['id_usuario_crea'],$_POST['id_solicitante'],
			to_pg_array($aPersona),to_pg_array($aDet));
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'detalleRequerimiento':
		$rs=$requerimiento->detalleRequerimiento($_GET['id_requerimiento']);
		$data=array();
		
 			?>
 			<div class="" id="div_detalleLocal" >
 				<div class="row">
 					
 					<div class="col-md-11">

 						<table class="table table-striped table-bordered table-hover table-responsive " >
 							<thead " >
 								<tr class="modal-header-success">
 									
 									<th >Item</th>
 									<th>Categoria</th>
 									<th>Unidad Medida</th>
 									<th>Cantidad</th> 									

 								</tr>
 							</thead>
 							<tbody> 								
 								<? $tot=0;$cnt_items=0;
 								while ($reg=pg_fetch_object($rs)){ 
 									//$id_empresa=$reg->id_empresa;
 									$cnt_items++;
 				//$btn='<button class="btn btn-link btn-xs " onclick="action_show_item('.$_GET['id_orden_compra'].','.$reg->id_item.')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="action_remove_item('.$_GET['id_orden_compra'].','.$reg->id_item.')"><i class="fa fa-close text-success"></i></button>';	
 									$stat='';
 									//$sub=round($reg->cantidad*$reg->costo_unitario_umc,2);
 									//$tot+=$sub;
 									echo "<tr>";
 									
 									echo "<td scope='row'>".$reg->nombre."</td>";
 									echo "<td scope='row'>".$reg->categoria."</td>";					
									echo "<td scope='row'>".$reg->unidad_medida_ingreso."</td>";
									echo "<td scope='row'>".$reg->cantidad."</td>";
									//echo "<td scope='row' class='text-right'>".$reg->costo_unitario_umc."</td>";
									//echo "<td scope='row' class='text-right'>".number_format($sub,2,'.',',')."</td>";
									//echo "<td scope='row'>".$stat."</td>";
 									echo "</tr>";

 								}
 								?>
 							</tbody>
 							<tfoot>
 								<tr >
 									
 									<!--<td colspan="7" class='text-right'><strong>Total:</strong></td>	
 									<td class='text-right'><strong><?//=number_format($tot,2,'.',',');?></strong></td>	-->
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
		$rspta=$requerimiento->desactivar($_POST['id_requerimiento'],$_SESSION['s_id_usuario']);
 		echo $rspta ? "Registro anulado" : "Registro no se puede anular";
	break;

	case 'activar':
		$rspta=$requerimiento->activar($_POST['id_requerimiento'],$_POST['id_usuario']);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;
	case 'buscarReq':
		/*$oc=$requerimiento->buscarReq($_POST["id_requerimiento"]); 
		$data=array();
 		if ($oc){
			$data=array(
				'id'=>$oc->id,
				'id_empresa'=>$oc->id_empresa,
				'id_local'=>$oc->id_local,
				'id_solicitante'=>$oc->id_solicitante,
				'numero'=>$oc->numero
				
			);
		}*/	

		$oc=$requerimiento->buscarReq($_POST["id_requerimiento"]); 		
 		$rs=$requerimiento->detalleRequerimiento($_POST["id_requerimiento"]);
 		$adet=pg_fetch_all($rs);
		$data=array(
			'id'=>$oc->id,				
			'id_empresa'=>$oc->id_empresa,
			'id_local'=>$oc->id_local,
			'id_solicitante'=>$oc->id_solicitante,
			'numero'=>$oc->numero,						
			'detalle'=>$adet
		);

 		echo json_encode($data);
	break;
	case 'buscar':
		$oc=$ordencompra->buscar($_POST["id_empresa"],$_POST["id_orden_compra"]); 		
 		$rs=$ordencompra->buscarDetalle($_POST["id_empresa"],$_POST["id_orden_compra"]);
 		$adet=pg_fetch_all($rs);
 		$data=array();
 		if ($oc){
			$data=array(
				'id'=>$oc->id,
				'id_ingreso'=>$oc->id_ingreso,
				'fecha'=>$oc->fecha,
				'id_empresa'=>$oc->id_empresa,
				'tipo_cambio'=>$oc->tipo_cambio,
				'id_moneda'=>$oc->id_moneda,
				'id_forma_pago'=>$oc->id_forma_pago,
				'id_proveedor'=>$oc->id_proveedor,
				'porcentaje_igv'=>$oc->porcentaje_igv,
				'orden'=>$oc->orden,
				'observaciones'=>$oc->observaciones,
				'validez'=>$oc->validez,
				'fecha_creacion'=>$oc->fecha_creacion,
				'fecha_autorizacion'=>$oc->fecha_autorizacion,
				'usuario_crea'=>$oc->usuario_crea,
				'razon_social'=>$oc->razon_social,
				'detalle'=>$adet
			);
		}	

 		echo json_encode($data);
	break;
	case 'mostrar':
		$oc=$requerimiento->mostrar($_POST["id_requerimiento"]); 		
 		$rs=$requerimiento->detalleRequerimiento($_POST["id_requerimiento"]);
 		$adet=pg_fetch_all($rs);
		$data=array(
			'fecha'=>$oc->fecha,				
			'numero'=>$oc->numero,
			'empresa'=>$oc->empresa,
			'local'=>$oc->local,
			'observaciones'=>$oc->observaciones,
			'urgente'=>$oc->urgente,
			'fecha_creacion'=>$oc->fecha_creacion,
			'usuario_crea'=>$oc->usuario_crea,	
			'id_usuario_crea'=>$oc->id_usuario_crea,
			'id_personal_referencia'=>$oc->id_personal_referencia,			
			'detalle'=>$adet
		);
 		echo json_encode($data);
	break;

	case 'listar':

		$aColumns = array( 'i.id','i.id', 'e.nombre', 'i.numero','l.nombre', 'i.fecha','uc.login',
			'i.fecha_autorizacion','ua.login','i.estado' );
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
	    	if ($_SESSION['s_id_nivel']!='1'){
	    		$sWhere = "WHERE id_local='".$_SESSION['s_id_local']."' ";
	    	}else{
	    		$sWhere = "WHERE id_local IS NOT NULL ";
	    	}


	    	//$_GET['sSearch'] != ""
	    	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != ""  )
	    	{
	    		$sWhere = "AND  (";
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
	    		
	    		/*if ( $sWhere == "" ) 	{
	    			$sWhere = "WHERE ";
	    		}	else  		{
	    			$sWhere .= " AND ";
	    		}*/
	    		if ($aColumns[$i]=='i.numero'){
	    			$sWhere .= "AND ".$aColumns[$i]."='".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."' ";
	    		}else{
	    			$sWhere .= " AND ".$aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    		}	
	    	}
	    }


    	

		$rspta=$requerimiento->listar($sWhere,$sOrder,$sLimit);

				
		$a =$requerimiento->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();



 		while ($reg=pg_fetch_object($rspta)){
 			
 			$btnAut=($reg->{'i.fecha_autorizacion'}=='' && $reg->{'i.estado'}=='1')?"&nbsp;&nbsp;<a href='#'   onclick='autorizarCompra(".$reg->{'i.id'}.")'><i class='fa fa-thumbs-o-up' data-placement='top' data-toggle='tooltip' data-original-title='Autorizar Requerimiento'></i></a>":"";		
 			
 			$btnActDes='';
 			//Si no esta autorizado
 			if ($reg->{'i.fecha_autorizacion'}==''){
 				//Solo el que registro puede editar
 				if ($_SESSION['s_id_usuario']==$reg->{'i.id_usuario_crea'} || $_SESSION['s_id_nivel']=='1'){
 					$btnActDes=($reg->{'i.estado'}=='1')?"<li><a href='#' onclick='desactivar(".$reg->{'i.id'}.")'><i class='fa fa-remove text-success'></i> Anular</a>
 					</li>":"";
 				}
 			}

 		
 			$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activo</span>':
 			'<span class="label bg-red">Desactivado</span>';	

 			$stat_aut="";
 			if ($_SESSION['s_autoriza_requerimiento']!='t'){
 				$stat_aut="class = 'disabled'";
 			}
 				
 			$btnAut=($reg->{'i.fecha_autorizacion'}=='' && $reg->{'i.estado'}=='1')?"<li ".$stat_aut."><a href='#' onclick='autorizarRequerimiento(".$reg->{'i.id'}.")'><i class='fa fa-thumbs-o-up text-success'></i> Autorizar</a>
 			</li>":"";

 			$btnEdit=($reg->{'i.fecha_autorizacion'}=='' && $reg->{'i.estado'}=='1')?"<li><a href='#' onclick='mostrar_requerimiento(".$reg->{'i.id'}.",".$_SESSION['s_id_nivel'].")'><i class='fa fa-pencil text-success'></i> Editar</a>
 			</li>":"";

 			$url='../reportes/rptRequerimiento.php?id='.$reg->{'i.id'};

 			
 			if ($reg->{'i.fecha_autorizacion'}!='') {
 				$btnPrint="<li ><a target='_blank' href='".$url."'><i class='fa fa-print text-success'></i> Imprimir</a></li>";
 				$btnRev="<li ><a href='#' onclick='revertirRequerimiento(".$reg->{'i.id'}.")' ><i class='fa fa-undo text-danger'></i> Revertir aprobacion</a></li>";
 			} else {
 				$btnPrint="";
 				$btnRev="";
 			}	



 			$btns="<div class='btn-group'>
 			<button id='dropdownMenuButton' aria-haspopup='true' aria-expanded='false' data-toggle='dropdown' class='btn btn-info btn-sm dropdown-toggle ' type='button'> Accion <span class='caret'></span> </button>
 			<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
 			".$btnEdit.$btnActDes.$btnAut.$btnPrint.$btnRev."
 			</ul>
 			</div>";		
 			$data[]=array( 
 				
 				"0"=>$reg->{'i.id'},
 				//"1"=>$btnIcons.$btnAut.$btnAnul,
 				"1"=>$btns,
 				"2"=>$reg->{'e.nombre'},
 				"3"=>$reg->{'i.numero'}, 				
 				"4"=>$reg->{'l.nombre'}, 				
 				"5"=>$reg->{'i.fecha'},
 				"6"=>$reg->{'uc.login'},
 				"7"=>$reg->{'i.fecha_autorizacion'},
 				"8"=>$reg->{'ua.login'},
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


	case 'listarModal':

		$aColumns = array( 'i.id','i.id', 'e.nombre','l.nombre','i.fecha','i.numero',"(ps.ape_paterno||' '||ps.ape_materno||' '||ps.nombres)" );
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
	    	$sWhere = "WHERE i.estado='1' ";
	    	//$_GET['sSearch'] != ""
	    	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != ""  )
	    	{
	    		$sWhere = "AND  (";
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

	    		if ($aColumns[$i]=='i.numero'){
	    			$sWhere .= "AND ".$aColumns[$i]."='".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."' ";
	    		}else{
	    			$sWhere .= " AND ".$aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    		}	

	    			
	    	}
	    }


    	

		$rspta=$requerimiento->listar($sWhere,$sOrder,$sLimit);

				
		$a =$requerimiento->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

		
		$stat="";$btns="";

 		while ($reg=pg_fetch_object($rspta)){

 			$fa=$reg->{'i.fecha_autorizacion'};
 			$ids=$reg->{'id_salida'};
 			
 			if ($fa!='' && $ids==''){
				$btns="<button type='button' class='btn btn-success btn-sm' onclick='seleccionar_req(".$reg->{'i.id'}.")'>Seleccionar</button>";
			}else{
				$btns="";
			}

			if ($ids!=""){
				$stat="<i class='fa fa-check text-success'></i>";
			}else{
				$stat="";
			}
						
 			$data[]=array( 
 				
 				"0"=>$reg->{'i.id'},
 				"1"=>$btns,
 				"2"=>$reg->{'e.nombre'},
 				"3"=>$reg->{'l.nombre'}, 				
 				"4"=>$reg->{'i.fecha'}, 				
 				"5"=>$reg->{'i.numero'},
 				"6"=>$reg->{'personal'},
 				"7"=>$reg->{'i.fecha_autorizacion'},
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




ob_end_flush();
?>