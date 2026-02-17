<?php

switch($_GET['accion']){
	case 'LOAD_RENIEC':
		$data=file_get_contents("http://200.123.29.214/sismed_/ajaxDNI.php?nro_doc=".$_GET['numero_documento']);	
		//$data=file_get_contents("http://190.187.36.77:8080/sismed/ajaxDNI.php?nro_doc=".$_GET['numero_documento']);	
		echo $data;	
	break;
	case 'LOAD_SUNAT':
		/*require_once __DIR__ . "/../services/sunatphp/src/autoload.php";	
		error_reporting(0);	
		$company = new \Sunat\Sunat(true, true);
		$ruc = $_GET["ruc"];	
		$search1 = $company->search($ruc);	
		echo $search1->json();*/
		$aj=array();
    	$aj['msj']='';
    	//$data=file_get_contents("http://190.187.36.77:8080/sismed/api_sunat.php?ruc=".$_GET['ruc']);
    	$data=file_get_contents("http://200.123.29.214/sismed_/api_sunat.php?ruc=".$_GET['ruc']);
    	$dat=json_decode($data,true);
    	if (isset($dat['razon_social'])){
    		$aj['msj']='';
    		$aj["razon_social"]=$dat['razon_social'];
    		$aj["direccion"]=$dat['direccion'];

    		
    	}else{
    		$aj['msj']='ERR';
    	}

    	if ($aj['msj']=='ERR'){
    		$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://dniruc.apisperu.com/api/v1/ruc/'.$_GET['ruc'].'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imxlc2NoODBAaG90bWFpbC5jb20ifQ.zfpd-VaPd-Po2hCYFN_GZ2bmIbpauZt67twbNcKYTAA',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$adat=json_decode($response,true);

			if (isset($adat["ruc"])){
				if ($adat["ruc"]!=''){	
					$aj['msj']=''; 
					$aj["razon_social"]=$adat["razonSocial"];
					if (isset($adat["direccion"])){
						$aj["direccion"]=$adat["direccion"];
					}else{
						$aj["direccion"]="";
					}
					$aj["id_distrito"]='';
					$aj["id_departamento"]='';
					$aj["id_provincia"]='';
					$aj["comercial"]=$adat["nombreComercial"];
				}else{
					$aj['msj']='ERR';
				}
				
			}else{
				$aj['msj']='ERR';
			}	
    	}

    	if ( $aj['msj']=='ERR'){

	       	$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://apiperu.dev/api/ruc/'.$_GET['ruc'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer 18596ac346d852fe87334e198542f4cb944e28c7b8985d296cd2c291fee3fce6'
			 ),
			));

	        $response = curl_exec($curl);
		
	        curl_close($curl);
	      
	        $adat=json_decode($response,true);
	        if (isset($adat["success"])){
			   if ($adat["success"]==true){	
			        $aj['msj']=''; 
		        	$aj["razon_social"]=$adat["data"]["nombre_o_razon_social"];
		        	$aj["comercial"]='';
		          	if (isset($adat["data"]["direccion_completa"])){
						$aj["direccion"]=$adat["data"]["direccion_completa"];
					}else{
						$aj["direccion"]="";
					}
		        }else{
		            $aj['msj']='ERR';
		        }
				
		    }else{
		           $aj['msj']='ERR';
			}
		}
			
		if ( $aj['msj']=='ERR'){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://api.sunat.binvoice.net/consulta.php");		
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_POST, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


			$result=curl_exec ($ch);		
			curl_close ($ch);

			$adat=json_decode($result,true);
			if ($adat['success']){
				if ($adat['success']=='1'){
					$aj['msj']=""; 
					$aj["razon_social"]=$adat['result']['razon_social'];
					$aj["direccion"]=$adat['result']['direccion'];
					$aj["direccion"]=$adat['result']['direccion'];
					$aj["comercial"]='';
				}else{
					$aj['msj']='ERR';
				}
			}else{
				$aj['msj']='ERR';
			}
		}		

	  echo json_encode($aj);
	break;
}

?>