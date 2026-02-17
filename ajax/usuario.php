<?php
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/Usuario.php";

$usuario=new Usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

$id_usuario=isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";
$personal=isset($_POST["personal"])? limpiarCadena($_POST["personal"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$nivel=isset($_POST["nivel"])? limpiarCadena($_POST["nivel"]):"";



switch ($_GET["op"]){
	case 'resetPwd':
		$rs=$usuario->resetPwd($_POST['id'],$_POST['correo']);
		echo $rs;
	break;

	case 'creaExterno':
		$rs=$usuario->saveExterno(
			$_POST['id_empresa'],
			$_POST['id_persona'],
			$_POST['ruc'],
			limpiarCadena($_POST['razon_social']),
			limpiarCadena($_POST['direccion_empresa']),
			limpiarCadena($_POST['comercial']),
			$_POST['ubigeo_empresa'],
			$_POST['tipo_rubro'],
			$_POST['tipo_doc'],
			$_POST['numero_doc'],
			limpiarCadena($_POST['nombres']),
			limpiarCadena($_POST['ape_paterno']),
			limpiarCadena($_POST['ape_materno']),
			limpiarCadena($_POST['direccion_persona']),
			$_POST['ubigeo_persona'],
			$_POST['celular_persona'],
			$_POST['correo_persona'],
			$_POST['cuenta_usuario'],
			$_POST['clave_usuario']

		);
		$rpta=pg_fetch_array($rs);
		if ($rpta){
			$usuario->senderMail($_POST['nombres'],$_POST['cuenta_usuario'],$_POST['clave_usuario'],$_POST['correo_persona']);
			echo $rpta[0];
		}else{
			echo "Error";
		}

		//


	break;
	case 'getEmpresaUsuario':
		$rs=$usuario->selectEmpresasUsuario($_GET['usuario']);		
		$data=array();$sel=' selected ';
		//$pselect=(isset($_GET['id_selected']))?$_GET['id_selected']:'';
		while ($reg=pg_fetch_object($rs)){
			//$sel=($reg->id==$pselect)?' selected ':'';			
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre, "selected"=>$sel);
 		}
 		$results = array('empresas'=>$data);	
 		echo json_encode($results);
	break;

	case 'getAreasUsuario':
		$rs=$usuario->selectAreasUsuario($_GET['usuario'],$_GET['id_empresa']);		
		$data=array();$sel=' selected ';		
		while ($reg=pg_fetch_object($rs)){			
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre, "selected"=>$sel);
 		}
 		$results = array('locales'=>$data);	
 		echo json_encode($results);
	break;

	case 'crudAccesos':
		$amenu=explode(",",$_GET['id_menu_detalle']);
		//print_r($amenu);
		for ($i=0;$i<count($amenu);$i++){
			//echo "entro";
			$usuario->crudAcceso($_GET['id_usuario'],$amenu[$i],$_GET['opt'],$_SESSION['s_id_usuario']);
		}
		
	break;

	case 'update_pwd':
		$usuario->update_pwd($_POST['id_usuario'],$_POST['clave']);
	break;

	case 'listAccesos':		
        $rs=$usuario->listAccesos($_GET['id_usuario']);		
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('accesos'=>$data);	
 		echo json_encode($results);
	break;

	case 'cboUsers':		
        $rs=$usuario->selectUsers();		
		$data=array();
		while ($reg=pg_fetch_object($rs)){
 			$data[]=array("id"=>$reg->id, "nombre"=>$reg->nombre);
 		}
 		$results = array('usuarios'=>$data);	
 		echo json_encode($results);
	break;

	case 'guardaryeditar':
		if (empty($id_usuario)){

			$rspta=$usuario->insertar($personal,trim($login),md5(trim($clave)),$nivel);

			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($id_usuario,$personal,$login,md5(trim($clave)),$nivel);
			echo $rspta ? "Usuario actualizado" : "Registro no se pudo actualizar";
		}
	break;

	case 'desactivar':
				$rspta=$usuario->desactivar($idusuario);
 				echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
			//Fin de las validaciones de acceso
	break;

	case 'activar':
				$rspta=$usuario->activar($idusuario);
 				echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
			//Fin de las validaciones de acceso
	break;

	case 'mostrar':	
				$rspta=$usuario->mostrar($idusuario);
		 		//Codificar el resultado utilizando json
		 		echo json_encode($rspta);

	break;

	case 'listar':
	$aColumns = array( 'id', 'login', 'persona', 'descripcion','estado' );
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




	$rspta=$usuario->listar($sWhere,$sOrder,$sLimit);

	$a =$usuario->contar($sWhere);
	$cnt = $a->cnt;

	//Vamos a declarar un array
	$data= Array();

	while ($reg=pg_fetch_object($rspta)){
		$btn=($reg->estado=='1')?'
			<button class="btn btn-link btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-link btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-link btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-link btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>';
		$stat=($reg->estado=='1')?'<span class="label bg-green">Activo</span>':
			'<span class="label bg-red">Desactivado</span>';
		$data[]=array(

			"0"=>$btn,
			"1"=>$reg->id,
			"2"=>$reg->login,
			"3"=>$reg->persona,
			"4"=>$reg->descripcion,
			"5"=>$stat

			);
	}
	$results = array(
		//"sEcho"=>1, //Información para el datatables
		"iTotalRecords"=>$cnt, //enviamos el total registros al datatable
		"iTotalDisplayRecords"=>$cnt, //enviamos el total registros a visualizar
		"aaData"=>$data);
	echo json_encode($results);

break;

	/*case 'permisos':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $usuario->listarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Almacenar los permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->idpermiso);
			}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
				}
	break;
*/
	case 'verificar':
		$logina=strtoupper($_POST['logina']);
	    $clavea=$_POST['clavea'];

	    $id_empresa=$_POST['id_empresa'];
	    $id_local=$_POST['id_local'];

	    //Hash SHA256 en la contraseña
		//$clavehash=hash("SHA256",$clavea);
		$clavehash=md5($clavea);

		$rspta=$usuario->verificar($logina, $clavehash, $id_empresa, $id_local);

		//$fetch=$rspta->fetch_object();
		$fetch=pg_fetch_object($rspta);
		//var_dump($fetch);
		$lpass=false;

		if ($fetch)
	    {
	        //Declaramos las variables de sesión
	        $lpass=true;
	        $_SESSION['s_id_usuario']=$fetch->id;
	        $_SESSION['s_nombre']='';//$fetch->login;
	        $_SESSION['s_imagen']=''; //$fetch->imagen;
	        $_SESSION['s_login']=$fetch->login;
	        $_SESSION['s_id_personal']=$fetch->id_personal;
	        $_SESSION['s_id_empresa']=$fetch->id_empresa;
	        $_SESSION['s_empresa']=$fetch->empresa;
	        $_SESSION['s_id_local']=$fetch->id_local;
	        $_SESSION['s_local']=$fetch->local;
			
			$_SESSION['s_ris']=$fetch->ris;

	        $_SESSION['s_provincia']=$fetch->provincia;
	        $_SESSION['s_distrito']=$fetch->distrito;



	        $_SESSION['s_ruc_empresa']=$fetch->ruc_empresa;
	        $_SESSION['s_telefono_empresa']=$fetch->telefono_empresa;	        
	        $_SESSION['s_nombre_comercial']=$fetch->nombre_comercial;
	        $_SESSION['s_direccion_empresa']=$fetch->direccion_empresa;
	        $_SESSION['s_correo_empresa']=$fetch->correo_empresa;
	        $_SESSION['s_distrito_empresa']=$fetch->distrito_empresa;

	        $_SESSION['s_ubigeo_establecimiento']=$fetch->ubigeo_establecimiento;

			$_SESSION['s_id_nivel']=$fetch->id_nivel;
	        $_SESSION['s_autoriza_orden_compra']=$fetch->autoriza_orden_compra;
	        $_SESSION['s_autoriza_requerimiento']=$fetch->autoriza_requerimiento;
	        //Obtenemos los permisos del usuario
	    	//$marcados = $usuario->listarmarcados($fetch->idusuario);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array

			/*while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso);
				}*/

			//Determinamos los accesos del usuario
			/*in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
			in_array(2,$valores)?$_SESSION['almacen']=1:$_SESSION['almacen']=0;
			in_array(3,$valores)?$_SESSION['compras']=1:$_SESSION['compras']=0;
			in_array(4,$valores)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
			in_array(5,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
			in_array(6,$valores)?$_SESSION['consultac']=1:$_SESSION['consultac']=0;
			in_array(7,$valores)?$_SESSION['consultav']=1:$_SESSION['consultav']=0;*/

			$_SESSION['s_escritorio']=0;
			$_SESSION['s_almacen']=0;
			$_SESSION['s_compras']=0;
			$_SESSION['s_ventas']=0;
			$_SESSION['s_acceso']=0;
			$_SESSION['s_consultac']=0;
			$_SESSION['s_consultav']=0;


	    }
	    //echo json_encode($fetch);
	    echo $lpass;
	break;

	case 'salir':
		//Limpiamos las variables de sesión
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;
}
ob_end_flush();
?>
