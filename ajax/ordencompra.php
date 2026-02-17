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
require_once "../modelos/OrdenCompra.php";
require_once 'Mail.php';
require_once 'Mail/mime.php';

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

$ordencompra=new OrdenCompra();


$id_item=isset($_POST["id_item"])? limpiarCadena($_POST["id_item"]):"";

$id_ingreso=isset($_POST["id_ingreso"])? limpiarCadena($_POST["id_ingreso"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
//$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
//$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";

if (isset($_POST['detalle'])){
	$aDet=array();
	for ($i=0;$i<count($_POST['detalle']);$i++){
		$aDet[$i]=array($_POST['detalle'][$i]['id_item'],$_POST['detalle'][$i]['factor'],$_POST['detalle'][$i]['cantidad'],$_POST['detalle'][$i]['precio_costo'],
			$_POST['detalle'][$i]['id_umi']
	);

	}	
}


switch ($_GET["op"]){
	case 'sendMailOrdenCompra':

		$f = file_get_contents("http://localhost/almacen/reportes/rptOrdenCompra.php?id=".$_POST['id_orden_compra']."&save=1");
		//$id=$_POST['id_orden_compra'];
		//$save='';
		//include("../reportes/rptOrdenCompra.php");

		$crlf = "\n";		
		$message = new Mail_mime($crlf);
		
		$from = "Clinica Gonzalez <admin@clinicagonzalez.com>";

		$to = ' <'.$_POST['email'].'>';
		$cc = '';
		//$to = "Nobody <lsaldivarc@saludpol.gob.pe>";		
		$file="oc.pdf";
		$subject = utf8_decode("Orden de Compra");				
		$body = "Estimados hacemos llegar la Orden de Compra";
		
		
		$message->setTXTBody("This is the text version.");
		$message->setHTMLBody($body);
		
		$message->addAttachment($file, 'text/plain');
		
		$host = "mail.clinicagonzalez.com";
		$username = "admin@clinicagonzalez.com";
		$password =  "Gerenciageneral1";
		$headers = array ('From' => $from,
		  'To' => $to,
		  'Subject' => $subject,
		  'Cc' => $cc
		  );
		$smtp = Mail::factory('smtp',
		  array ('host' => $host,'port'=>'25',
			'auth' => false,	
			'username' => $username,
			'password' => $password,
			'debug' => false,
			'Content-Type'  => 'text/html; charset=UTF-8'
			));
		
		
		$body = $message->get();
		$headers = $message->headers($headers);
		
		
		$mail = $smtp->send($to.','.$cc, $headers,$body );
		
		if (PEAR::isError($mail)) {
		  //echo("<p>" . $mail->getMessage() . "</p>");	
		} else {
		  $ordencompra->marcarEnvioCorreo($_POST['id_orden_compra'],$_SESSION['s_id_usuario']);	
		  echo "ok";
		}			
	break;
	case 'getOrdenCompraPendientes':
		$rs=$ordencompra->getOrdenCompraPendientes();
		$cnt=pg_num_rows($rs);

		echo pg_fetch_result($rs,0,'cnt_oc').'|'.pg_fetch_result($rs,0,'cnt_req');
		

	break;
	case 'autorizarOrdenCompra':
		$ordencompra->autorizarOrdenCompra($_POST['id_orden_compra'],$_SESSION['s_id_usuario']);

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
	case 'updateOrdenCompra':
		$rs=$ordencompra->actualizar($_POST['id_orden'],$_POST['id_empresa'],$_POST['id_moneda'],$_POST['id_forma_pago'],$_POST['tipo_cambio'],$_POST['porcentaje_igv'],$_POST['validez'],$_POST['id_proveedor'],$_POST['observaciones'],to_pg_array($aDet),$_SESSION['s_id_usuario']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'saveOrdenCompra':
		$rs=$ordencompra->insertar($_POST['id_empresa'],$_POST['id_moneda'],$_POST['id_forma_pago'],$_POST['tipo_cambio'],$_POST['porcentaje_igv'],$_POST['id_proveedor'],$_POST['observaciones'],$_POST['validez'],to_pg_array($aDet),$_SESSION['s_id_usuario']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'detalleOrdenCompra':
		$rs=$ordencompra->detalleOrdenCompra($_GET['id_orden_compra']);
		$data=array();
		
 			?>
 			<div class="" id="div_detalleLocal" >
 				<div class="row">
 					
 					<div class="col-md-11">

 						<table class="table table-striped table-bordered table-hover table-responsive " >
 							<thead " >
 								<tr class="modal-header-success">
 									
 									<th >Item</th>
 									<th>Codigo</th>
 									<th>Categoria</th>
 									<th>Unidad Medida</th>
 									<th>Factor</th>	 									
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
 				$btn='<button class="btn btn-link btn-xs " onclick="action_show_item('.$_GET['id_orden_compra'].','.$reg->id_catalogo.')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="action_remove_item('.$_GET['id_orden_compra'].','.$reg->id_catalogo.')"><i class="fa fa-close text-success"></i></button>';	
 									$stat='';
 									$sub=round($reg->cantidad*$reg->costo_unitario_umc,2);
 									$tot+=$sub;
 									echo "<tr>";
 									
 									echo "<td scope='row'>".$reg->nombre."</td>";
 									echo "<td scope='row'>".$reg->id_catalogo."</td>";
 									echo "<td scope='row'>".$reg->categoria."</td>";
									echo "<td scope='row'>".$reg->unidad_medida_ingreso."</td>";
									echo "<td scope='row'>".$reg->factor."</td>";									
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
 									
 									<td colspan="7" class='text-right'><strong>Total:</strong></td>	
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
		$rspta=$ordencompra->desactivar($_POST['id_orden_compra']);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$item->activar($id_item);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'buscar':
		$oc=$ordencompra->buscar($_POST["id_empresa"],$_POST["id_orden_compra"]); 		
 		//$rs=$ordencompra->buscarDetalle($_POST["id_empresa"],$_POST["id_orden_compra"]);
 		//$adet=pg_fetch_all($rs);
 		$adet="";
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
		$oc=$ordencompra->mostrar($_POST["id_orden_compra"]); 		
 		$rs=$ordencompra->detalleOrdenCompra($_POST["id_orden_compra"]);
 		$adet=pg_fetch_all($rs);
		$data=array(
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
			'usuario_crea'=>$oc->usuario_crea,
			'razon_social'=>$oc->razon_social,
			'detalle'=>$adet
		);
 		echo json_encode($data);
	break;

	case 'listar':

		$aColumns = array( 'i.id','i.id', 'e.nombre', 'i.orden', 'i.fecha','fp.descripcion',
			'pro.razon_social','mc.descripcion','i.validez','i.fecha_autorizacion','i.fecha_correo','ing.fecha_creacion','i.estado' );
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
	    	$sWhere = " WHERE i.id IS NOT NULL ";
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
    	
	    $sWhere = " WHERE i.id IS NOT NULL ";	
	    /* Individual column filtering */
	    for ( $i=0 ; $i<count($aColumns) ; $i++ )
	    {
	    	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
	    	{
	    		/*if ( $sWhere == "" ) 		{
	    			$sWhere = "WHERE ";
	    		}else	    		{
	    			$sWhere .= " AND ";
	    		}*/
	    		if ($aColumns[$i]=='i.orden'){
	    			$sWhere .= "AND ".$aColumns[$i]."='".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."' ";
	    		}else{	
	    			$sWhere .= " AND ".$aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    		}	
	    	}
	    }


    	

		$rspta=$ordencompra->listar($sWhere,$sOrder,$sLimit);

		//$r=pg_fetch_object($rspta);
		//print_r($r);
		//echo $r->{'i.nombre'};
		//exit();
		
		$a =$ordencompra->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();



 		while ($reg=pg_fetch_object($rspta)){
 			

 			$btnAut=($reg->{'i.fecha_autorizacion'}=='')?"&nbsp;&nbsp;<a href='#'   onclick='autorizarCompra(".$reg->{'i.id'}.")'><i class='fa fa-thumbs-o-up' data-placement='top' data-toggle='tooltip' data-original-title='Autorizar Compra'></i></a>":"";		
 			
 			$btnActDes='';
 			if ($reg->{'i.fecha_autorizacion'}==''){
 				$btnActDes=($reg->{'i.estado'}=='1')?"<li><a href='#' onclick='desactivar(".$reg->{'i.id'}.")'><i class='fa fa-remove text-success'></i> Anular</a>
 			</li>":"<li><a href='#' onclick='activar(".$reg->{'i.id'}.")'><i class='fa fa-check text-success'></i> Activar</a>
 			</li>";
 			}

 		
 			$stat=($reg->{'i.estado'}=='1')?'<span class="label bg-green">Activo</span>':
 			'<span class="label bg-red">Desactivado</span>';	

 			 $stat_aut="";
 			if ($_SESSION['s_autoriza_orden_compra']!='t'){
 				$stat_aut="class = 'disabled'";
 			}

 				
 			$btnAut=($reg->{'i.fecha_autorizacion'}=='')?"<li ".$stat_aut."><a href='#' onclick='autorizarOrdenCompra(".$reg->{'i.id'}.")'><i class='fa fa-thumbs-o-up text-success'></i> Autorizar</a>
 			</li>":"";

 			$btnEdit=($reg->{'i.fecha_autorizacion'}=='' && $reg->{'i.estado'}=='1')?"<li><a href='#' onclick='mostrar_orden_compra(".$reg->{'i.id'}.")'><i class='fa fa-pencil text-success'></i> Editar</a>
 			</li>":"";

 			$url='../reportes/rptOrdenCompra.php?id='.$reg->{'i.id'};

 			$btns="<div class='btn-group'>
 			<button id='dropdownMenuButton' aria-haspopup='true' aria-expanded='false' data-toggle='dropdown' class='btn btn-info btn-sm dropdown-toggle ' type='button'> Accion <span class='caret'></span> </button>
 			<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
 			".$btnEdit.$btnActDes.$btnAut."  			
 			<li><a target='_blank' href='".$url."'><i class='fa fa-print text-success'></i> Imprimir</a></li>
 			<li><a href='#' onclick='show_mail(\"".$reg->{'i.id'}."\",\"".$reg->{'e_mail'}."\");return false;'><i class='fa fa-envelope text-success'></i> Enviar Correo</a></li>
 			</ul>
 			</div>";		
 			$data[]=array( 
 				
 				"0"=>$reg->{'i.id'},
 				//"1"=>$btnIcons.$btnAut.$btnAnul,
 				"1"=>$btns,
 				"2"=>$reg->{'e.nombre'},
 				"3"=>$reg->{'i.orden'}, 				
 				"4"=>$reg->{'i.fecha'},
 				"5"=>$reg->{'fp.descripcion'},
 				"6"=>$reg->{'pro.razon_social'},
 				"7"=>$reg->{'mc.descripcion'},
 				"8"=>$reg->{'i.validez'},
 				


 				"9"=>$reg->{'i.fecha_autorizacion'},
 				"10"=>$reg->{'i.fecha_correo'},

 				"11"=>$reg->{'ing.fecha_creacion'},
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