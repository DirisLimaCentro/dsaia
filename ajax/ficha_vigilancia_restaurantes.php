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
require_once "../modelos/FichaVigilanciaRestaurantes.php";

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

$aDet=array();
if (isset($_POST['id_especies'])){
	$aesp=explode(",", $_POST['id_especies']);
	for ($i=0;$i<count($aesp);$i++){
		$aDet[$i]=array($aesp[$i]);
	}
}

$idempresa=isset($_POST["id_empresa"])? limpiarCadena($_POST["id_empresa"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ruc=isset($_POST["ruc"])? limpiarCadena($_POST["ruc"]):"";
$nombre_localidad=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){
	case 'save':


		/*foreach ($_POST as $key => $value) {
		    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
		}*/

		$data=array();
		foreach ($_POST as $key => $value) {
		    $data[htmlspecialchars($key)]=limpiarCadena(htmlspecialchars($value));
		}

		//echo print_r($data, true);

		//exit();
		$adat=array();

		$id_ficha=$data['id_ficha'];
		$fecha_inicio=$data['fecha_inicio'];
		$hora_inicio=$data['hora_inicio'];
		$fecha_termino=$data['fecha_termino'];
		$hora_termino=$data['hora_termino'];
		$id_entidad=$data['id_entidad'];

		$id_persona=$data['id_persona'];
		$ruc=$data['ruc'];
		$razon_social=mb_strtoupper($data['razon_social'],'UTF-8');
		$direccion_empresa=mb_strtoupper($data['direccion_empresa'],'UTF-8');
		$ubigeo=$data['ubigeo'];

		$telefono_fijo_empresa=$data['telefono_fijo_empresa'];

		$celular_empresa=$data['celular_empresa'];
		$email_empresa=$data['email_empresa'];
		$representante_legal=mb_strtoupper($data['representante_legal'],'UTF-8');
		$licencia=mb_strtoupper($data['licencia'],'UTF-8');
		$responsable=mb_strtoupper($data['responsable'],'UTF-8');
		$cargo=mb_strtoupper($data['cargo'],'UTF-8');

		$dias_actividad=$data['dias_actividad'];
		$horario_atencion=mb_strtoupper($data['horario_atencion'],'UTF-8');
		$nro_hombres=$data['nro_hombres'];
		$nro_mujeres=$data['nro_mujeres'];

		$otros_hallazgos=$data['otros_hallazgos'];
		$observaciones=$data['observaciones'];

		$id_usuario=$data['id_usuario'];
		$id_local=$data['id_local'];

		$sector=$data['sector'];
		$id_localidad=$data['id_localidad'];
		$long_este=$data['long_este'];
		$long_norte=$data['long_norte'];

		$id_resultado=$data['id_resultado'];
		$cnt_total=$data['cnt_total'];


		$aDat[0]=array(
			$data['i_1'],
			$data['i_1_obs'],
			$data['i_2'],
			$data['i_2_obs'],
			$data['i_3'],
			$data['i_3_obs'],
			$data['i_4'],
			$data['i_4_obs'],
			$data['i_5'],
			$data['i_5_obs'],
			$data['i_6'],
			$data['i_6_obs'],
			$data['i_7'],
			$data['i_7_obs'],
			$data['i_8'],
			$data['i_8_obs'],
			$data['i_9'],
			$data['i_9_obs'],
			$data['i_10'],
			$data['i_10_obs'],
			$data['i_11'],
			$data['i_11_obs'],
			$data['i_12'],
			$data['i_12_obs'],
			$data['i_13'],
			$data['i_13_obs'],
			$data['i_14'],
			$data['i_14_obs'],
			$data['i_15_a'],
			$data['i_15_a_obs'],
			$data['i_15_b'],
			$data['i_15_b_obs'],
			$data['i_16'],
			$data['i_16_obs'],
			$data['i_17'],
			$data['i_17_obs'],
			$data['i_18_a'],
			$data['i_18_a_obs'],
			$data['i_18_b'],
			$data['i_18_b_obs'],
			$data['i_19'],
			$data['i_19_obs'],
			$data['ii_1'],
			$data['ii_1_obs'],
			$data['ii_2_a'],
			$data['ii_2_a_obs'],
			$data['ii_2_b'],
			$data['ii_2_b_obs'],
			$data['ii_3_a'],
			$data['ii_3_a_obs'],
			$data['ii_3_b'],
			$data['ii_3_b_obs'],
			$data['ii_4'],
			$data['ii_4_obs'],
			$data['iii_1'],
			$data['iii_1_obs'],
			$data['iii_2'],
			$data['iii_2_obs'],
			$data['iii_3_a'],
			$data['iii_3_a_obs'],
			$data['iii_3_b'],
			$data['iii_3_b_obs'],
			$data['iii_3_c'],
			$data['iii_3_c_obs'],
			$data['iii_3_d'],
			$data['iii_3_d_obs'],
			$data['iii_4'],
			$data['iii_4_obs'],
			$data['iii_5'],
			$data['iii_5_obs'],
			$data['iii_6_a'],
			$data['iii_6_a_obs'],
			$data['iii_6_b'],
			$data['iii_6_b_obs'],
			$data['iii_7'],
			$data['iii_7_obs'],
			$data['iii_8'],
			$data['iii_8_obs'],
			$data['iii_9'],
			$data['iii_9_obs'],
			$data['iii_10'],
			$data['iii_10_obs'],
			$data['iii_11'],
			$data['iii_11_obs'],
			$data['iii_12'],
			$data['iii_12_obs'],
			$data['iii_13'],
			$data['iii_13_obs'],
			$data['iii_14'],
			$data['iii_14_obs'],
			$data['iii_15'],
			$data['iii_15_obs'],
			$data['iii_16'],
			$data['iii_16_obs'],
			$data['iv_1'],
			$data['iv_1_obs'],
			$data['iv_2'],
			$data['iv_2_obs'],
			$data['iv_3'],
			$data['iv_3_obs'],
			$data['iv_4'],
			$data['iv_4_obs'],
			$data['iv_5'],
			$data['iv_5_obs'],
			$data['iv_6'],
			$data['iv_6_obs'],
			$data['iv_7'],
			$data['iv_7_obs'],
			$data['iv_8'],
			$data['iv_8_obs'],
			$data['iv_9'],
			$data['iv_9_obs'],
			$data['iv_10'],
			$data['iv_10_obs'],
			$data['iv_11'],
			$data['iv_11_obs'],
			$data['iv_12'],
			$data['iv_12_obs'],
			$data['iv_13'],
			$data['iv_13_obs']

		);

		$rs=$ficha->save(
			$id_ficha,
			$fecha_inicio,
			$hora_inicio,
			$fecha_termino,
			$hora_termino,
			$id_entidad,
			
			$ruc,
			$razon_social,
			$direccion_empresa,
			$ubigeo,
			$telefono_fijo_empresa,
			$celular_empresa,
			$email_empresa,
			$representante_legal,
			$licencia,
			$responsable,
			$cargo,
			$dias_actividad,
			$horario_atencion,
			$nro_hombres,
			$nro_mujeres,
			$otros_hallazgos,
			$observaciones,
			$id_usuario,
			$id_local,
			$sector,
			$id_localidad,
			$long_este,
			$long_norte,
			$id_resultado,
			$cnt_total,

			to_pg_array($aDat)
		);
		
		$rpta=pg_fetch_array($rs);
		echo $rpta[0];
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
	case 'tableLocales':
		$rs=$empresa->selectLocales($_GET['id_empresa']);		
		$data=array();
		
 			?>
 			<div  id="div_detalleLocal">
 				<div class="row">
 					<div class="col-md-11">

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
 				<button class="btn btn-link btn-xs" onclick="mostrar_local('.$_GET['id_empresa'].','.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
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
			
			$rspta=$empresa->insertar($nombre,$direccion,$_POST['ubigeo'],$ruc,$_POST['telefono_fijo']);
			
			echo $rspta ? "Empresa registrada" : "Empresa no se pudo registrar";
		}
		else {
			$rspta=$empresa->editar($idempresa,$nombre,$direccion,$_POST['ubigeo'],$ruc,$_POST['telefono_fijo']);
			echo $rspta ? "Registro actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$ficha->desactivar($_POST['id']);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$ficha->activar($_POST['id']);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$f=$ficha->mostrar($_POST["id"]); 		
 		//$rs=$ficha->detalleFicha($_POST["id_ficha"]);


 		$data=pg_fetch_all($f);


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

		$aColumns = array( 'f.id', 'l.nombre', 'f.id', 'f.fecha_inicio','e.nombre','e.ruc',
			'responsable','uc.login','f.fecha_creacion','res.descripcion');
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
	    			if ( $_GET['bSearchable_'.$i] == "true" )
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
	    		$sWhere .= $aColumns[$i]." LIKE '%".mb_strtoupper(pg_escape_string($_GET['sSearch_'.$i]),'UTF-8')."%' ";
	    	}
	    }


    	

		$rspta=$ficha->listar($sWhere,$sOrder,$sLimit);

		$a =$ficha->contar($sWhere);
		$cnt = $a->cnt;

 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=pg_fetch_object($rspta)){
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
 			$data[]=array( 				
 				
 				"0"=>$btnEdit.$btnActDes.$btnPrint,
 				"1"=>$reg->{'l.nombre'},
 				"2"=>$reg->{'f.id'},
 				"3"=>$reg->{'f.fecha_inicio'},
 				"4"=>$reg->{'e.nombre'},
 				"5"=>$reg->{'e.ruc'},
 				"6"=>$reg->{'f.responsable'},
 				"7"=>$reg->{'uc.login'},
 				"8"=>$reg->{'f.fecha_creacion'},
				"9"=>$reg->{'res.descripcion'},
 				"10"=>$reg->{'f.estado'},
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