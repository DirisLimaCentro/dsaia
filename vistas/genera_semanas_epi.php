<?php
$fi='02-01-2022';

$datei = "2022-01-02";
 
// Add days to date and display it
for ($i=1;$i<=52;$i++){
	$tempo=strtotime($datei. ' + 6 days');
	$tempo1=strtotime($datei. ' + 7 days');
	echo $datei."|".date('Y-m-d',$tempo).'<br>';
	$datei=date('Y-m-d',$tempo1);
}


?>