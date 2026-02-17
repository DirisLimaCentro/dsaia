

<?php


require "reporte_alimentos.php";

$user = new reporte_alimentos();

$mes = $_POST['mesreporte'];

$anio = $_POST['anioreporte'];

$user->reporte1($mes,$anio);

?>