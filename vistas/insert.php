<? session_start();
include 'clases/clinica.class.php';
include('nusoap/lib/nusoap.php');

$ope=$_POST['id_establecimiento']; //trim($_SESSION['idoperativo']);

$matrix=$_SESSION[$_POST['g_sid']];

$idusuario=$_SESSION['usr_id'];
$pigv=$_SESSION['s_porigv'];
$cn=conectar();
$nom=strtoupper(trim(pg_escape_string(stripslashes($_POST['nombres']))));
$pat=strtoupper(trim(pg_escape_string(stripslashes($_POST['paterno']))));
$mat=strtoupper(trim(pg_escape_string(stripslashes($_POST['materno']))));
$nom_apo=strtoupper(trim(pg_escape_string(stripslashes($_POST['nom_apo']))));
$pat_apo=strtoupper(trim(pg_escape_string(stripslashes($_POST['pat_apo']))));
$mat_apo=strtoupper(trim(pg_escape_string(stripslashes($_POST['mat_apo']))));
$sex_apo=strtoupper(trim(pg_escape_string(stripslashes($_POST['sex_apo']))));
$raz=$nom.' '.$pat.' '.$mat;
$sex=strtoupper(trim(pg_escape_string(stripslashes($_POST['sexo']))));
$dni=$_POST['dni']; $rucp=$_POST['rucp']; $fec=$_POST['fechanac']; $eda=$_POST['edad']; 
if ($eda=='') $eda='0';
$dir=strtoupper(trim(pg_escape_string(stripslashes($_POST['direccion'])))); 
$dis=$_POST['id_dist']; 
$fon=strtoupper(trim(pg_escape_string(stripslashes($_POST['telefonos'])))); 
$doc=strtoupper(trim(pg_escape_string(stripslashes($_POST['otrosdoc'])))); 
$ase=''; //$_POST[''];
$mai=strtoupper(trim(pg_escape_string(stripslashes($_POST['correo']))));
//$nro=$_POST['nrohistoria']; 
$pac=trim($_POST['idpaciente']); $id_e=$_POST['id_empresa']; $_nh=$_POST['nro_historia'];
/*validando*/
if (empty($ope)){ echo '10'; exit(); }
if (empty($nom)){ echo '11'; exit(); }
if (empty($pat)){ echo '12'; exit(); }
if (empty($mat)){ echo '13'; exit(); }
if (empty($dir)){ echo '14'; exit(); }
if (empty($_POST['tipdoc'])){ echo '15'; exit(); }
if (empty($_POST['serie'])){ echo '16'; exit(); }
if (empty($_POST['nrocomp'])){ echo '17'; exit(); }
$ni=count($matrix);
if ($ni<=0){ 
	echo '20'; exit(); 
}
$lerror='';
$pos='';
for ($i=1;$i<=$ni;$i++){
	if (isset($matrix[$i][1])){   //id produ
		if (empty($matrix[$i][1])){
			$lerror='s';
		}
		$_pf_ic=substr($matrix[$i][1],0,6);
		if ($_pf_ic!=$_POST['idcon']){
			$lerror='z';
		}
		
	}
	if (isset($matrix[$i][2])){   //descripcion
		if (empty($matrix[$i][2])){
			$lerror='s';
		}else{
			$pos=strpos($matrix[$i][2],'ONSULTA');
		}
	}
	if (isset($matrix[$i][3])){   //valido cantidad
		if (!is_numeric($matrix[$i][3]) || !is_numeric($matrix[$i][4]) || !is_numeric($matrix[$i][5]) || !is_numeric($matrix[$i][6]) || !is_numeric($matrix[$i][7]) || !is_numeric($matrix[$i][8]) || !is_numeric($matrix[$i][9]) ){
			$lerror='s';
		}	
	}
}
//print_r($matrix);
//exit();
if ($lerror=='s'){
	echo '21'; exit();
}elseif($lerror=='z'){
	echo '21'; exit();
}


	//buscando si es paciente asegurado
	$body_json = '{"dni": "'.substr($dni,1,8).'"}';
		
	/*$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4ODQ2YmQzZjBlODI5ZGNlMmQyMjhiMWVjZGQyZDA0ZTQ4ODlhY2NhY2Q1YTM5NDUxYWI0ODMwZTBmZWMwMWM1M2YxMzY5OWQzODllMTllIn0.eyJhdWQiOiIxIiwianRpIjoiNzg4NDZiZDNmMGU4MjlkY2UyZDIyOGIxZWNkZDJkMDRlNDg4OWFjY2FjZDVhMzk0NTFhYjQ4MzBlMGZlYzAxYzUzZjEzNjk5ZDM4OWUxOWUiLCJpYXQiOjE1ODMyNTkwNjgsIm5iZiI6MTU4MzI1OTA2OCwiZXhwIjoxODk4NzkxODY4LCJzdWIiOiI4MzIiLCJzY29wZXMiOlsiKiJdfQ.O7uvb0dryRbYrHBuWxWET28fEI_Bl3JSXPmqEF3pBi9F7fbU0fdXn-x1LYJerdkOXuztvMsRhVWcPDSfYomg_-VOdyQcpi3QL_RZ9kqAH4CYekibRsEwNfPMqS2TQoRKL1SvlCVtCJp-1RiAtGO1I2XvXUvBK0wmx5FlXj7eXT3WjPOMugvX9TFNMXK2HTCde1UhFHdoJbqJsGOh968YgUF7dANm-hkMEgV3InFc_8rLONaDcMWHIGZTpXafchKyRhnN6U0ZAydznDxZemPTs4czKSsLvtZZ3ce4gwqtNcubXq8g0uS1wfDiI6M8esBVVihQWpa0tERBzfXKTqh-ZQlBJ1A1u6b2m_3qS9A7Fl2cx6cDdiQR9Ct9Ht-sINBcbT9tdSKbGqTUjpll-uRnYdBMFyvB9WrdganB4CEjjbM2XeTIhBMR6nFiSKeg93IAJL3GfMNBZlelloJtH5NkEXx2PiV7giaOqU9Pb47RMY5tfUoqCLi_7Ui-Vmp3fMv7GGV2h5O6-o8HiR0o2prs1xCeCtP33gjdx7HVftC6kKDALlPVkcfjO-DZTOCwhbIUD_lEDsUqu-REZBo3IeZFKOePDsp5uhlsehA8bet4gR6w5rxK4RumlmNPg-L0FjPMv-NULN6ypspojal4bu6ou-r9rQxKeGX5tn9g1jutLrw",
			"Content-Type: application/json"
		),
		CURLOPT_URL => "https://api.apirest.pe/api/getEssalud",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $body_json,
	));
	
	$response = curl_exec($curl);
	curl_close($curl);
	$ar_response = json_decode($response,true);	
	
	if ($ar_response["success"] == true){ 

		$vig_hasta = $ar_response["result"]["acreditacion"]["vigencia"]["hasta"];
		$vig_hastas = strtotime(str_replace('/','-',$vig_hasta));

		$hoy = date('d/m/Y');
		$hoys = strtotime('now');

		if ($vig_hastas >= $hoys){

			echo "36"; 
			exit();
		}

	}*/
	
	

//buscando
$cad="select nro_historia from tickets where substring(nro_historia,1,3)='".$_POST['id_establecimiento']."' and dventa='".$_POST['tipdoc']."' and serie='".$_POST['serie']."' and nro_ticket='".$_POST['nrocomp']."'";
$r=pg_query($cn,$cad);
$nr=pg_num_rows($r);
if ($nr>0){
	echo '01'; //existe documento
	pg_close($cn);
	exit();
}
//validar si se inserta apoderado
if ($_POST['ins_apo']=='T'){
	//verificar si apoderado es nuevo o continuador
	if (empty($_POST['id_apo'])){
		//buscado documento si es q se ingreso documento
		$dni_apo=$_POST['dni_apo'];
		if (substr($dni_apo,0,1)!='5'){
			$cad="select id_usuario_salud from pacientes where id_usuario_salud='".$_POST['dni_apo']."'";
			$rs=pg_query($cn,$cad);
			$nf=pg_num_rows($rs);
			if ($nf>0){
				echo '30'; 
				pg_close($cn);
				exit();
			}
		}
		//buscando apellidos y nombres
		$cad="select id_paciente from pacientes where nombre='{$nom_apo}' and ape_paterno='{$pat_apo}' and ape_materno='{$mat_apo}'";
		$rs=pg_query($cn,$cad);
		$nf=pg_num_rows($rs);
		if ($nf>0){
			echo '31'; 
			pg_close($cn);
			exit();
		}		
		//insertando como apoderado
		$fec_apo='';$eda_apo='0';$fon_apo='';$dir_apo='';$ase_apo='';$dis_apo='';$doc_apo='';$mai_apo='';$rucp_apo='';		
		$str="select sp_insert_paciente_s('".$ope."','{$nom_apo}','{$pat_apo}','{$mat_apo}','".$dni_apo."','".$fec_apo."','".$eda_apo."','".$sex_apo."','{$fon_apo}',
		'{$dir_apo}','".$ase_apo."','".$dis_apo."','{$doc_apo}','{$mai_apo}','','','".$rucp_apo."','".$idusuario."','','','','','','','','')";
		$rs=pg_query($cn,$str);
		$id_apo=pg_fetch_result($rs,0,0);	
		if ($id_apo=='-1'){
			echo '32';
			exit();
		}
		
	}else{ //apoderado continuador
		$id_apo=$_POST['id_apo'];
	}
	$par_apo=$_POST['par_apo'];
}else{
	$id_apo='';
	$par_apo='';
}

if ($pac==''){  //nuevo paciente
	//buscando si ingreso DNI
	if (!empty($dni)){ 
		$pref=substr($dni,0,1);
		if ($pref!='1'){
			if (isset($_POST['txtdni'])){
				$dni=$pref.trim($_POST['txtdni']);
			}
		}			
		$cad="select id_usuario_salud from pacientes where id_usuario_salud='".$dni."'";		
		$rs=pg_query($cn,$cad);
		$nf=pg_num_rows($rs);
		if ($nf>0){
			echo '02'; 
			pg_close($cn);
			exit();
		}
	}
	//buscando si es homonimo
	$cad="select id_paciente from pacientes where nombre='{$nom}' and ape_paterno='{$pat}' and ape_materno='{$mat}'";
	$rs=pg_query($cn,$cad);
	$nf=pg_num_rows($rs);
	if ($nf>0){
		echo '03'; 
		pg_close($cn);
		exit();
	}


	$cad="select id_paciente from pacientes where nombre='{$nom}' and ape_paterno='{$pat}' and ape_materno='{$mat}'";
	$rs=pg_query($cn,$cad);
	$nf=pg_num_rows($rs);
	if ($nf>0){
		echo '03'; 
		pg_close($cn);
		exit();
	}


	$str="select sp_insert_paciente_s('".$ope."','{$nom}','{$pat}','{$mat}','".$dni."','".$fec."','".$eda."','".$sex."','{$fon}',
	'{$dir}','".$ase."','".$dis."','{$doc}','{$mai}','','','".$rucp."','".$idusuario."','".$_POST['id_un']."','".$_POST['est_civ']."','".$_POST['id_nac']."','".$_POST['id_gi']."','".$_POST['id_rel']."','".$_POST['id_ocu']."','".$_POST['days']."','".$_POST['months']."')";
	$rs=pg_query($cn,$str);

	$idpac=pg_fetch_result($rs,0,0);	
	if ($idpac=='-1'){
		echo '18';
		exit();
	}
	//cliente
	if ($_POST['buscap']=='S'){
		//insertando en clientes
		
		/*$cad="Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(substring(id_cliente,4,9)) as int)) + 1 as maximo
			from clientes where substring(id_cliente,1,3)='".$ope."')x";
		$ar=pg_query($cn,$cad);
		$gen=pg_fetch_result($ar,0,'maximo');
		$nfound=true;
		$max=$gen;
		while ($nfound){			
			$maxi=$ope.$max;	
			$sq="select id_cliente from clientes where id_cliente='".$maxi."'";  	
			$rscl=pg_query($cn,$sq);
			$nrcl=pg_num_rows($rscl);
			if ($nrcl>0){
				$max=$max+1;
			}else{
				break;
			}
		}		
		$gen=$ope.$max;*/
		$nip=substr('000'.substr(GetIP(),strrpos(GetIP(),'.')+1,3),-3);
		$gen=$ope.$nip.date('ymdHis');
		$st="insert into clientes(id_cliente,nombres,direccion,id_distrito,ruc,id_paciente)
		values('".$gen."','{$raz}','{$dir}','".$dis."','".$rucp."','".pg_escape_string(stripslashes($idpac))."')";
		pg_query($cn,$st);
	} else {
		//verificando si eligio nuevo cliente
		if ($_POST['id_cliente']==''){
			//anexamos
			//$gen=$ope.$gen;
			$nip=substr('000'.substr(GetIP(),strrpos(GetIP(),'.')+1,3),-3);
			$gen=$ope.$nip.date('ymdHis');		
			$rzocial=pg_escape_string(utf8_encode($_POST['razonsocial']));
			$direcc=pg_escape_string(strtoupper($_POST['dircliente']));
			$st="insert into clientes(id_cliente,nombres,direccion,id_distrito,ruc,id_paciente)
			values('".$gen."','{$rzocial}','{$direcc}','".$_POST['id_distc']."','".$_POST['ruc']."','')";
			pg_query($cn,$st);
		} else {
			$gen=$_POST['id_cliente'];
		}
	}
}else{ //continuador
	//update paciente
	$str="select sp_update_paciente_s('{$pac}','{$nom}','{$pat}','{$mat}','".$fec."','".$eda."','".$sex."','{$fon}',
		'{$dir}','".$ase."','".$dis."','{$doc}','{$mai}','".$rucp."','".$idusuario."','".$_POST['id_un']."','".$_POST['est_civ']."','".$_POST['id_nac']."','".$_POST['id_gi']."','".$_POST['id_rel']."','".$_POST['id_ocu']."','".$_POST['days']."','".$_POST['months']."')";
	$rs=pg_query($cn,$str);
	$_i=pg_fetch_result($rs,0,0);	
	if ($_i=='-1'){
		echo '18';
		exit();
	}
	$idpac=$pac;
	if ($_POST['buscap']=='S'){ //elije facturar al mismo paciente
		//buscando en clienstes para obtener su id_cliente si es ke existe
		$ipa=$_POST['idpaciente'];
		$cad="select id_cliente from clientes where id_paciente='".$ipa."' ";
		$rs=pg_query($cn,$cad);
		$nf=pg_num_rows($rs);
		if ($nf>0){
			//updatea clientes
			$gen=pg_fetch_result($rs,0,'id_cliente');
			$upc="update clientes set nombres='{$raz}',direccion='{$dir}',id_distrito='".$dis."',ruc='".$rucp."' where id_cliente='".$gen."'";
			pg_query($cn,$upc);
			
		} else { //se aï¿½ade
			
			//$gen=$ope.$gen;
			$nip=substr('000'.substr(GetIP(),strrpos(GetIP(),'.')+1,3),-3);
			$gen=$ope.$nip.date('ymdHis');			
			$st="insert into clientes(id_cliente,nombres,direccion,id_distrito,ruc,id_paciente)
			values('".$gen."','{$raz}','{$dir}','".$dis."','".$rucp."','".$idpac."')";
			pg_query($cn,$st);
		}
	} else {//	elije a nombre de otra persona o empresa
		//verifica si elijio nuevo cliente o cliente existente
		if ($_POST['id_cliente']==''){ //nuevo cliente
			
			$nip=substr('000'.substr(GetIP(),strrpos(GetIP(),'.')+1,3),-3);
			$gen=$ope.$nip.date('ymdHis');	
			$rzocial=pg_escape_string(utf8_encode($_POST['razonsocial']));
			$direcc=pg_escape_string(strtoupper($_POST['dircliente']));
			$st="insert into clientes(id_cliente,nombres,direccion,id_distrito,ruc,id_paciente)
			values('".$gen."','{$rzocial}','{$direcc}','".$_POST['id_distc']."','".$_POST['ruc']."','')";
			pg_query($cn,$st);
			
		} else {
			//ya selecciono
			$gen=$_POST['id_cliente'];
		}	
	}
}

$his=$ope.$_POST['tipdoc'].'-'.$_POST['serie'].'-'.$_POST['nrocomp'];
$hoy=date('d/m/Y');

//save head and body
$ni=count($matrix);
$a_i=array();$a_q=array();$a_p=array();$a_d=array();$p_r=array();
for ($i=1;$i<=$ni;$i++){
	$a_i[$i]=$matrix[$i][1];
	$a_q[$i]=$matrix[$i][3];
	$a_p[$i]=$matrix[$i][4];
	$a_d[$i]=$matrix[$i][8];
	$p_r[$i]=$matrix[$i][9];
}
$str="select sp_insert_ticket_new('".$his."','".$_POST['nrocomp']."','".$_POST['idcon']."','".pg_escape_string(stripslashes($idpac))."','".$idusuario."','"
.$_POST['forpago']."','".$_POST['serie']."','".$_POST['id_moneda']."','".$_POST['tipdoc']."','".$id_apo."','".$id_e."','".$_POST['cambio']."','".$pigv."','".$gen."','".$_POST['id_me']."','".$_POST['acuenta']."',
'".$_POST['saldo']."','".$eda."','".GetIP()."','".$_POST['idtar']."','".$_POST['id_auto']."','".$_POST['total_dscto']."','".$_POST['days']."','".$_POST['months']."',
'".to_pg_array($a_i)."','".to_pg_array($a_q)."','".to_pg_array($a_p)."','".to_pg_array($a_d)."',
'".$ni."','".$par_apo."','".to_pg_array($p_r)."','".$_POST['id_medico_asignado']."')";
//echo $str;
//exit();

$rst=pg_query($cn,$str);
$lok=pg_fetch_result($rst,0,0);	
if ($lok=='-1'){
	echo '19';
	exit();
} else {
	
}

$hoy=date('d/m/Y');
/*-Graba turno y numero-------------*/
if ($_POST['id_medico_asignado']!='' && $_POST['id_turno']!=''){
	$max = "Select case when maximo is null then 1 else maximo end  from 
	(select max(cast(trim(numero_turno) as int)) + 1 as maximo
		 from tickets where to_char(fecha_emision,'dd/mm/yyyy')='".$hoy."' and 
		 id_turno='".$_POST['id_turno']."' and id_medico_asignado='".$_POST['id_medico_asignado']."')x";
	$res = pg_query($cn, $max);
	$maxturno=pg_fetch_result($res,0,'maximo');
	
	$upturno="update tickets set id_turno='".$_POST['id_turno']."',numero_turno='".$maxturno."'  where nro_historia='".$his."'";	
	pg_query($cn,$upturno);
}

if (isset($_POST['id_presupuesto'])){
	if ($_POST['id_presupuesto']!=''){
		$up="update tickets set id_presupuesto='".$_POST['id_presupuesto']."' where nro_historia='".$his."'";
		pg_query($cn,$up);
		$up="update tbl_presupuesto_cirugia set facturado='1' where id_presupuesto='".$_POST['id_presupuesto']."'";
		pg_query($cn,$up);		
	}
}


/*---------------------------------*/
//update contador de talon

$_cv=$_POST['tipdoc'];

if ($_cv=='1' || $_cv=='2' || $_cv=='3')	{
	$up="update talon set ncon=cast(ncon as int)+1 where id_oper='".$ope."' and serie='".$_POST['serie']."' and dventa='".$_POST['tipdoc']."' 
	and usuario='".$idusuario."' and to_char(fecha,'dd/mm/yyyy')='".$hoy."' and ncon<>''";
	pg_query($cn,$up);
	//si contador es mayor o igual al nfinal corte automatico
	$sql="select nfinal,ncon from talon where id_oper='".$ope."' and serie='".$_POST['serie']."' and dventa='".$_POST['tipdoc']."' 
	and usuario='".$idusuario."' and to_char(fecha,'dd/mm/yyyy')='".$hoy."'";
	$rst=pg_query($cn,$sql);
	$_fin=pg_fetch_result($rst,0,'nfinal');
	$_con=pg_fetch_result($rst,0,'ncon');
	if ($_con>$_fin){
		$_con=$_con-1;
		$up="update talon set nfinal='".$_con."',ncon='' where id_oper='".$ope."' and serie='".$_POST['serie']."' and dventa='".$_POST['tipdoc']."' and usuario='".$idusuario."' and to_char(fecha,'dd/mm/yyyy')='".$hoy."' and ncon<>'' ";
		pg_query($cn,$up);	
	}
}

if (substr($dni,0,1)=='5'){ //sin documento
	$sq="select substring(id_usuario_salud,2,8) as codgen from pacientes where id_paciente='".$idpac."'";	
	$rs=pg_query($cn,$sq);
	echo stripslashes($idpac).'@'.pg_fetch_result($rs,0,'codgen');	
}else{
	echo stripslashes($idpac);
}
pg_close($cn);
?>
