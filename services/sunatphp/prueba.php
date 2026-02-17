<?php
	require_once("./src/autoload.php");
	error_reporting(0);

	try {
        $company = new \Sunat\Sunat(true, true);
        $ruc = "0";

        $search1 = $company->search($ruc);

        echo $search1->json();
    }catch (Exception $e){
		//echo $e->getMessage();
	}
?>
