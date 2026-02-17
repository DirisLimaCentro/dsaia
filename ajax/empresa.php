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
require_once "../modelos/Empresa.php";

$empresa=new Empresa();

$idempresa=isset($_POST["id_empresa"])? limpiarCadena($_POST["id_empresa"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";
$nombre_localidad=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){
	case 'updateCobertura':
		$empresa->updateCobertura(
		$_POST["id_local"],
		$_POST["id_actividad"],
		$_POST["anio"],
		$_POST["enero"],
		$_POST["febrero"],
		$_POST["marzo"],
		$_POST["abril"],
		$_POST["mayo"],
		$_POST["junio"],
		$_POST["julio"],
		$_POST["agosto"],
		$_POST["setiembre"],
		$_POST["octubre"],
		$_POST["noviembre"],
		$_POST["diciembre"]
	);
	break;

	case 'insertCobertura':
		$empresa->insertCobertura($_POST["id_local"],$_POST["id_actividad"],$_POST["anio"]);
	break;

	case 'deleteLocalidad':
		$rspta=$empresa->deleteLocalidad($_POST["id_localidad"]);
 		echo $rspta ? "Registro eliminado" : "Registro no se puede eliminar";
	break;
	case 'mostrarLocalidad':
		$f=$empresa->mostrarLocalidad($_POST["id_localidad"]); 
		$data=array(			
			'descripcion'=>$f->descripcion,
			'cnt_viviendas'=>$f->cnt_viviendas,
			'sector'=>$f->sector			
		);
 		echo json_encode($data);
	break;
	case 'saveLocalidad':
		$rs=$empresa->saveLocalidad($_POST['id_localidad'],$_POST['id_local'],
			$_POST['sector'],$nombre_localidad,$_POST['cnt_viviendas'],$_POST['id_usuario']);
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
	break;
	case 'listarLocalidades':
	$aColumns = array( 'l.id','sec.descripcion', 'l.descripcion',"l.cnt_viviendas" );
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "l.id";
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
	    	$sWhere = "WHERE l.id_local='".$_GET['id_establecimiento']."' ";
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




	    	$rspta=$empresa->listarLocalidades($sWhere,$sOrder,$sLimit);


	    	$a =$empresa->contarLocalidades($sWhere);
	    	$cnt = $a->cnt;

 		//Vamos a declarar un array
	    	$data= Array();


	    	$stat="";$btns="";

	    	while ($reg=pg_fetch_object($rspta)){

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
	    		$btns='<button class="btn btn-link btn-xs " onclick="show_localidad('.$reg->{'l.id'}.')"><i  class="fa fa-pencil text-success"></i></button><button class="btn btn-link btn-xs" onclick="delete_localidad('.$reg->{'l.id'}.')"><i class="fa fa-trash text-danger"></i></button>';
	    		$data[]=array( 

	    			//,
	    			
	    			"0"=>$btns,
	    			"1"=>$reg->{'sec.descripcion'},
	    			"2"=>$reg->{'l.descripcion'}, 				
	    			"3"=>$reg->{'l.cnt_viviendas'},
	    			"4"=>$reg->{'l.id'}


	    		);
	    	}
	    	$results = array(
 			//"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>$cnt, //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>$cnt, //enviamos el total registros a visualizar
 			"aaData"=>$data);
	    	echo json_encode($results);
	break;
	case 'tableCoberturas':

		$rs=$empresa->selectCoberturas($_GET['id_local']);		
		$data=array();
		
 			?>
 			
 			<table id="tblcob" class="table  table-striped table-bordered table-hover " style="width: 100%">
 				<thead >
 					<tr  class="v-grid-header">
 						<!--<th ></th>-->
 						<th>Accion</th>
 						<th>Año</th>
 						<th>Tipo</th>
 						<th>Ene</th>
 						<th>Feb</th>
 						<th>Maz</th>	
 						<th>Abr</th>
 						<th>May</th>
 						<th>Jun</th>
 						<th>Jul</th>
 						<th>Ago</th>
 						<th>Set</th>
 						<th>Oct</th>
 						<th>Nov</th>
 						<th>Dic</th>

 					</tr>
 				</thead>
 				<tbody> 								
 					<? while ($reg=pg_fetch_object($rs)){ 

 						$btn='<button class="btn btn-link btn-xs" 
 						onclick="editCobertura('.$_GET['id_local'].','.$reg->anio.','.$reg->id_tipo.'
 							,'.$reg->enero.','.$reg->febrero.','.$reg->marzo.','.$reg->abril.'
 						,'.$reg->mayo.','.$reg->junio.','.$reg->julio.','.$reg->agosto.'
 					,'.$reg->setiembre.','.$reg->octubre.','.$reg->noviembre.','.$reg->diciembre.')"><i class="fa fa-pencil"></i></button>';
 						
 						$btntoogle='';						

 						echo "<tr>";
 						echo "<td scope='row'>".$btn."</td>";
 						echo "<td scope='row'>".$reg->anio."</td>";
 						echo "<td scope='row'>".$reg->tipo."</td>";
 						echo "<td scope='row'>".$reg->enero."</td>";
 						echo "<td scope='row'>".$reg->febrero."</td>";
 						echo "<td scope='row'>".$reg->marzo."</td>";
 						echo "<td scope='row'>".$reg->abril."</td>";
 						echo "<td scope='row'>".$reg->mayo."</td>";
 						echo "<td scope='row'>".$reg->junio."</td>";
 						echo "<td scope='row'>".$reg->julio."</td>";
 						echo "<td scope='row'>".$reg->agosto."</td>";
 						echo "<td scope='row'>".$reg->setiembre."</td>";
 						echo "<td scope='row'>".$reg->octubre."</td>";
 						echo "<td scope='row'>".$reg->noviembre."</td>";
 						echo "<td scope='row'>".$reg->diciembre."</td>";
 						
 						echo "</tr>";
 									//echo "<tr class='collapse' id='colla".$reg->id."' ><td scope='row' colspan='8'>Localidades</td></tr>";

 					}
 					?>
 				</tbody>
 				
 			</table>
 					
 			<?

	break;
	case 'tableLocales':
		$rs=$empresa->selectLocales($_GET['id_empresa']);		
		$data=array();
		
 			?>
 			<div  id="div_detalleLocal">
 				<div class="row">
 					<div class="col-md-12">

 						<table id="dt<?=$_GET['id_empresa']; ?>" class="table  table-striped table-bordered table-hover table-responsive" style="width: 100%">
 							<thead class="bg-green" >
 								<tr  class="modal-header-success">
 									<!--<th ></th>-->
 									<th >Accion</th>
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

 									$btn=($reg->estado=='1')?'<button class="btn btn-link btn-xs" onclick="show_localidades('.$reg->id.')"><i class="fa fa-institution text-success"></i></button>
 									<button class="btn btn-link btn-xs" onclick="show_coberturas('.$reg->id.')"><i class="fa fa-calendar text-info"></i></button><button class="btn btn-link btn-xs" onclick="mostrar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 									' <button class="btn btn-link btn-xs" onclick="desactivar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-close"></i></button>':
 									'<button class="btn btn-link btn-xs" onclick="mostrar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 									' <button class="btn btn-link btn-xs" onclick="activar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-check"></i></button>';


 									$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
 									'<span class="label bg-red">Desactivado</span>'; 	
 									$btntoogle='<button class="btn btn-link btn-xs" data-toggle="collapse" data-target="#colla'.$reg->id.'" onclick=""><i class="fa fa-plus"></i></button>';	
 									$btntoogle='';						

 									echo "<tr>";
 									//echo "<td scope='row'>".$btntoogle."</td>";
 									echo "<td scope='row'>".$btn."</td>";
 									echo "<td scope='row'>".$reg->nombre."</td>";
 									echo "<td scope='row'>".$reg->direccion."</td>";
 									echo "<td scope='row'>".$reg->distrito."</td>";
									echo "<td scope='row'>".$reg->telefono_fijo."</td>";
									echo "<td scope='row'>".$reg->celular."</td>";
									echo "<td scope='row'>".$stat."</td>";
 									echo "</tr>";
 									//echo "<tr class='collapse' id='colla".$reg->id."' ><td scope='row' colspan='8'>Localidades</td></tr>";

 								}
 								?>
 							</tbody>
 							<tfoot>
 								<th colspan="7"><button type="button" class="btn btn-success" onclick="open_local('<?=$_GET['id_empresa'];?>');">Nuevo</button></th>
 								
 								
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
		$pselect=(isset($_GET['id_selected']))?$_GET['id_selected']:'';
		while ($reg=pg_fetch_object($rs)){
			$sel=($reg->id==$pselect)?' selected ':'';
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre, "selected"=>$sel);
 		}
 		$results = array('locales'=>$data);	
 		echo json_encode($results);
	break;
	case 'list':
		
        $rs=$empresa->select();
		
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('empresas'=>$data);	
 		echo json_encode($results);
	break;
	case 'guardaryeditar':
		if (empty($idempresa)){
			
			$rspta=$empresa->insertar($nombre,$direccion,$_POST['ubigeo'],$ruc,$_POST['telefono_fijo'],limpiarCadena($_POST['nombre_comercial']),$_POST['correo']);
			
			echo $rspta ? "Empresa registrada" : "Empresa no se pudo registrar";
		}
		else {
			$rspta=$empresa->editar($idempresa,$nombre,$direccion,$_POST['ubigeo'],$ruc,$_POST['telefono_fijo'],limpiarCadena($_POST['nombre_comercial']),$_POST['correo']);
			echo $rspta ? "Registro actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$empresa->desactivar($idempresa);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$empresa->activar($idempresa);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$empresa->mostrar($idempresa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':

		$aColumns = array( 'id', 'nombre', 'direccion', 'distrito','telefono_fijo','ruc' );
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


    	

		$rspta=$empresa->listar($sWhere,$sOrder,$sLimit);

		$a =$empresa->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=pg_fetch_object($rspta)){
 			$btn=($reg->estado=='1')?'
 				<button class="btn btn-link btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil "></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close "></i></button>':
 					'<button class="btn btn-link btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil "></i></button>'.
 					' <button class="btn btn-link btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check "></i></button>';
 			$stat=($reg->estado=='1')?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>';

 			$data[]=array( 				
 				
 				"0"=>$reg->id,
 				"1"=>$btn,
 				"2"=>$reg->nombre,
 				"3"=>$reg->direccion,
 				"4"=>$reg->distrito,
 				"5"=>$reg->telefono_fijo,	
 				"6"=>$reg->ruc,
 				"7"=>$stat ,
 				"8"=>$reg->estado 				
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