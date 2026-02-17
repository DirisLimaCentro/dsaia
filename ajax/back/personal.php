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
require_once "../modelos/Persona.php";

$personal=new Persona();

$id_personal=isset($_POST["id_personal"])? limpiarCadena($_POST["id_personal"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$numero_documento=isset($_POST["numero_documento"])? limpiarCadena($_POST["numero_documento"]):"";
$sexo=isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellido_paterno=isset($_POST["apellido_paterno"])? limpiarCadena($_POST["apellido_paterno"]):"";
$apellido_materno=isset($_POST["apellido_materno"])? limpiarCadena($_POST["apellido_materno"]):"";
$ubigeo=isset($_POST["ubigeo"])? limpiarCadena($_POST["ubigeo"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";

$id_persona_local=isset($_POST["id_persona_local"])? limpiarCadena($_POST["id_persona_local"]):"";
$local=isset($_POST["local"])? limpiarCadena($_POST["local"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";

switch ($_GET["op"]){
	case 'deleteLocalPersonal':
		$personal->deleteLocalPersonal($_POST['id_local'],$_POST['id_personal']);
	break;
	case 'tableEmpresaPersonal':
		$rs=$personal->tableEmpresaPersonal($_GET['id_personal']);
		$data=array();
 			?>
 			<div class="" id="div_detalleLocal" >
 				<div class="row">
 					<div class="col-md-8">
 						<table class="table table-striped table-bordered table-hover" >
 							<thead class="btn-success">
 								<tr>
 									<th>ID</th>
 									<th>Local</th>
 									<th>Cargo</th>
 									<th>Accion</th>
 								</tr>
 							</thead>
 							<tbody>
 								<? while ($reg=pg_fetch_object($rs)){ ?>
 									<input class="form-control input-sm" name="txtlocal_det" id="txtlocal_det" type="hidden" value="<?=$reg->id;?>">
 									<?

 									echo "<tr>";
 									echo "<td scope='row'>".$reg->id_local."</td>";
 									echo "<td scope='row'>".$reg->nombre."</td>";
 									echo "<td scope='row'>".$reg->descripcion."</td>";
 									echo "<td scope='row'><button class='btn btn-link ' 
 									onclick=\"deleteLocalPersonal('".$reg->id_local."','".$_GET['id_personal']."')\"><i class='fa fa-trash'></i></button></td>";
 									echo "</tr>";
 								}
 								?>
 							</tbody>
							<th><button type="button" class="btn btn-success" onclick="open_persona_local('<?=$_GET['id_personal'];?>');">Nuevo</button></th>
							<th></th>
 						</table>
 					</div>
 				</div>
 			</div>
 			<?

	break;
	case 'listLocales':
		$rs=$personal->selectLocales($_GET['id_personal']);
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
        $rs=$personal->select();

		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('empresas'=>$data);
 		echo json_encode($results);
	break;
	case 'guardaryeditar':
		if (empty($id_personal)){

			$rspta=$personal->insertar($nombre,$tipo_documento,$numero_documento,$sexo,$nombre,$apellido_paterno,$apellido_materno,$ubigeo,$direccion,$telefono,$celular,$email,$_POST["autoriza_orden_compra"],$_POST["autoriza_requerimiento"],$_POST["externo"]);

			echo $rspta ? "Personal registrado" : "Personal no se pudo registrar";
		}
		else {
			$rspta=$personal->editar($id_personal,$nombre,$tipo_documento,$numero_documento,$sexo,$nombre,$apellido_paterno,$apellido_materno,$ubigeo,$direccion,$telefono,$celular,$email,$_POST["autoriza_orden_compra"],$_POST["autoriza_requerimiento"],$_POST["externo"]);
			echo $rspta ? "Personal actualizado" : "Registro no se pudo actualizar";
		}
	break;
	case 'guardaryeditar_personalocal':
		if (!empty($id_personal)){

			$rspta=$personal->insertarpersonalocal($id_persona_local,$local,$cargo);

			echo $rspta ? "Registro registrado" : "Registro no se pudo registrar";
		}
		else {
			$rspta=$personal->editarpersonalocal($id_personal,$id_persona_local,$local,$cargo);
			echo $rspta ? "Registro actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$personal->desactivar($id_personal);
 		echo $rspta ? "Registro desactivado" : "Registro no se puede desactivar";
	break;

	case 'activar':
		$rspta=$personal->activar($id_personal);
 		echo $rspta ? "Registro activo" : "Registro no se puede activar";
	break;

	case 'mostrar':
		$rspta=$personal->mostrar($id_personal);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarp':
		$json= Array();
		$rspta=$personal->listarp($_GET['q']);
		//Codificar el resultado utilizando json
		while ($reg=pg_fetch_object($rspta)){
			$json[] = array('id' => $reg->id, 'text' => $reg->persona);
		}
		echo json_encode($json);
	break;


	case 'listar':

		$aColumns = array( 'id','id','ape_paterno','ape_materno','nombres','nro_documento','celular','u.distrito','direccion' );
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




		$rspta=$personal->listar($sWhere,$sOrder,$sLimit);

		$a =$personal->contar($sWhere);
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
 				"2"=>$reg->ape_paterno,
 				"3"=>$reg->ape_materno,
 				"4"=>$reg->nombres,
 				"5"=>$reg->nro_documento,
 				"6"=>$reg->celular,
				"7"=>$reg->distrito,
 				"8"=>$reg->direccion,
				"9"=>$stat
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
