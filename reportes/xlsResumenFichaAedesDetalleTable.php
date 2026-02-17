<?
session_start();
/*header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=ficha_detalle_inspeccion.xlsx");*/
require_once "../modelos/FichaVivienda.php";
$sal= new Ficha();
/*$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Año')
->setCellValue('B1', 'Mes')
->setCellValue('C1', 'Actividad')
->setCellValue('D1', 'Distrito')
->setCellValue('E1', 'Establecimiento')
->setCellValue('F1', 'RIS')
->setCellValue('G1', 'Sector')
->setCellValue('H1', 'Localidad')
->setCellValue('I1', 'Fecha Inicio')
->setCellValue('J1', 'Fecha Termino')
->setCellValue('K1', 'Direccion')
->setCellValue('L1', 'Nro Habitantes')
->setCellValue('M1', 'Condicion Vivienda')

->setCellValue('N1', 'I1')
->setCellValue('O1', 'P1')
->setCellValue('P1', 'TQ1')
->setCellValue('Q1', 'TF1')

->setCellValue('R1', 'I2')
->setCellValue('S1', 'P2')
->setCellValue('T1', 'TQ2')
->setCellValue('U1', 'TF2')

->setCellValue('V1', 'I3')
->setCellValue('W1', 'P3')
->setCellValue('X1', 'TQ3')
->setCellValue('Y1', 'TF3')

->setCellValue('Z1', 'I4')
->setCellValue('AA1', 'P4')
->setCellValue('AB1', 'TQ4')
->setCellValue('AC1', 'TF4')

->setCellValue('AD1', 'I5')
->setCellValue('AE1', 'P5')
->setCellValue('AF1', 'TQ5')
->setCellValue('AG1', 'TF5')

->setCellValue('AH1', 'I6')
->setCellValue('AI1', 'P6')
->setCellValue('AJ1', 'TQ6')
->setCellValue('AK1', 'TF6')

->setCellValue('AL1', 'I7')
->setCellValue('AM1', 'P7')
->setCellValue('AN1', 'TQ7')
->setCellValue('AO1', 'TF7')

->setCellValue('AP1', 'I8')
->setCellValue('AQ1', 'P8')
->setCellValue('AR1', 'TQ8')
->setCellValue('AS1', 'TF8')

->setCellValue('AT1', 'D8')

->setCellValue('AU1', 'I9')
->setCellValue('AV1', 'P9')
->setCellValue('AW1', 'TQ9')
->setCellValue('AX1', 'TF9')

->setCellValue('AY1', 'D9')

->setCellValue('AZ1', 'LARV')
->setCellValue('BA1', 'FEBR')

->setCellValue('BB1', 'INSPECCIONADO POR')
->setCellValue('BC1', 'CANTIDAD CASOS PROBABLES')

;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Ficha Detalle Aedes');*/
$fp = fopen("php://temp", 'w+');

if (!$fp) {
    echo "Error al abrir el archivo CSV.\n";
    exit;
}

fputcsv($fp, array(
 utf8_decode("Año"),
 "Mes",
 "Actividad",

 "TIPO DOC PACIENTE",
 "NUMERO DOC PACIENTE",
 "NOMBRES DEL PACIENTE",
 "TIPO DE CONTAGIO",

 "Distrito",
 "Establecimiento",
 "RIS",
 "Sector",
 "Localidad",
 "Fecha Inicio",
 "Fecha Termino",
 "Direccion",
 "Latitud",
 "Longitud",
 "Nro Habitantes",
 "Condicion Vivienda",
 "I1",
 "P1",
 "TQ1",
 "TF1",
 "I2",
 "P2",
 "TQ2",
 "TF2",
 "I3",
 "P3",
 "TQ3",
 "TF3",
 "I4",
 "P4",
 "TQ4",
 "TF4",
 "I5",
 "P5",
 "TQ5",
 "TF5",
 "I6",
 "P6",
 "TQ6",
 "TF6",
 "I7",
 "P7",
 "TQ7",
 "TF7",
 "I8",
 "P8",
 "TQ8",
 "TF8",
 "D8",
 "I9",
 "P9",
 "TQ9",
 "TF9",
 "D9",
 "LARV",
 "FEBR",
 "INSPECCIONADO POR",
 "CANTIDAD CASOS PROBABLES"
),"\t"
);



$rs=$sal->resumenAedesDetalle($_GET["mes"],$_GET["anio"],$_GET["id_establecimiento"],$_GET['tipo'],$_GET['desde'],$_GET['hasta']);

while ($reg=pg_fetch_assoc($rs)){
	//print_r($reg);
	array_walk($reg, function(&$value, $key) {
        //$value = htmlspecialchars($value, ENT_QUOTES);
        $value = utf8_decode($value);
    });

	fputcsv($fp, $reg,"\t");
}



$f=1;

/*echo "<table>";
echo "<tr>";
echo "<td>Año</td>";
echo "<td>Mes</td>";
echo "<td>Actividad</td>";
echo "<td>Distrito</td>";
echo "<td>Establecimiento</td>";
echo "<td>RIS</td>";
echo "<td>Sector</td>";
echo "<td>Localidad</td>";
echo "<td>Fecha Inicio</td>";
echo "<td>Fecha Termino</td>";
echo "<td>Direccion</td>";
echo "<td>Latitud</td>";
echo "<td>Longitud</td>";
echo "<td>Nro Habitantes</td>";
echo "<td>Condicion Vivienda</td>";
echo "<td>I1</td>";
echo "<td>P1</td>";
echo "<td>TQ1</td>";
echo "<td>TF1</td>";
echo "<td>I2</td>";
echo "<td>P2</td>";
echo "<td>TQ2</td>";
echo "<td>TF2</td>";
echo "<td>I3</td>";
echo "<td>P3</td>";
echo "<td>TQ3</td>";
echo "<td>TF3</td>";
echo "<td>I4</td>";
echo "<td>P4</td>";
echo "<td>TQ4</td>";
echo "<td>TF4</td>";
echo "<td>I5</td>";
echo "<td>P5</td>";
echo "<td>TQ5</td>";
echo "<td>TF5</td>";
echo "<td>I6</td>";
echo "<td>P6</td>";
echo "<td>TQ6</td>";
echo "<td>TF6</td>";
echo "<td>I7</td>";
echo "<td>P7</td>";
echo "<td>TQ7</td>";
echo "<td>TF7</td>";
echo "<td>I8</td>";
echo "<td>P8</td>";
echo "<td>TQ8</td>";
echo "<td>TF8</td>";
echo "<td>D8</td>";
echo "<td>I9</td>";
echo "<td>P9</td>";
echo "<td>TQ9</td>";
echo "<td>TF9</td>";
echo "<td>D9</td>";
echo "<td>LARV</td>";
echo "<td>FEBR</td>";
echo "<td>INSPECCIONADO POR</td>";
echo "<td>CANTIDAD CASOS PROBABLES</td>";


echo "</tr>";*/

//PHPExcel_Cell_DataType::TYPE_STRING
/*while ($reg=pg_fetch_object($rs)){
	$f++;	
	echo "<tr>";
	echo "<td>".$reg->{'anio'}."</td>";
	echo "<td>".$reg->{'mes'}."</td>";
	echo "<td>".$reg->{'actividad'}."</td>";
	echo "<td>".$reg->{'distrito'}."</td>";
	echo "<td>".$reg->{'establecimiento'}."</td>";
	echo "<td>".$reg->{'ris'}."</td>";
	echo "<td>".$reg->{'sector'}."</td>";
	echo "<td>".$reg->{'localidad'}."</td>";
	echo "<td>".$reg->{'fecha_inicio'}."</td>";
	echo "<td>".$reg->{'fecha_termino'}."</td>";
	echo "<td>".$reg->{'direccion_familia'}."</td>";
	echo "<td>".$reg->{'latitud'}."</td>";
	echo "<td>".$reg->{'longitud'}."</td>";
	echo "<td>".$reg->{'nro_habitantes'}."</td>";
	echo "<td>".$reg->{'condicion_vivienda'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_1_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_1_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_1_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_1_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_2_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_2_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_2_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_2_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_3_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_3_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_3_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_3_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_10_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_10_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_10_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_10_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_4_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_4_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_4_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_4_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_5_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_5_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_5_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_5_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_6_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_6_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_6_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_6_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_7_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_7_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_7_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_7_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_7_d'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_9_i'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_9_p'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_9_t'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_9_tf'}."</td>";
	echo "<td>".$reg->{'cnt_tipo_9_d'}."</td>";	
	echo "<td>".$reg->{'cnt_larvicidas'}."</td>";
	echo "<td>".$reg->{'cnt_febriles'}."</td>";
	echo "<td>".$reg->{'usuario_inspector'}."</td>";
	echo "<td>".$reg->{'cantidad_probable_dengue'}."</td>";
	echo "</tr>";
}
echo "</table>";
*/

//$filename = 'test_postgres.csv';
rewind($fp);
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="resultado.csv"');
header("Content-Transfer-Encoding: UTF-8");
fpassthru($fp);
fclose($fp);
?>