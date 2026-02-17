<?
session_start();
require_once "../modelos/FichaVivienda.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$sal= new Ficha();


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("System")
->setLastModifiedBy("System")
->setTitle("Listado")
->setSubject("Listado")
->setDescription("Listado")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Ficha");

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
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
$objPHPExcel->getActiveSheet()->setTitle('Ficha Detalle Aedes');

$rs=$sal->resumenAedesDetalle($_GET["mes"],$_GET["anio"],$_GET["id_establecimiento"]);

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;	
	$objPHPExcel->setActiveSheetIndex(0)

->setCellValue('A'.$f, $reg->{'anio'})
->setCellValue('B'.$f, $reg->{'mes'})
->setCellValue('C'.$f, $reg->{'actividad'})
->setCellValueExplicit('D'.$f, $reg->{'distrito'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('E'.$f, $reg->{'establecimiento'})
->setCellValue('F'.$f, $reg->{'ris'})
->setCellValue('G'.$f, $reg->{'sector'})
->setCellValue('H'.$f, $reg->{'localidad'})
->setCellValue('I'.$f, $reg->{'fecha_inicio'})
->setCellValue('J'.$f, $reg->{'fecha_termino'})
->setCellValue('K'.$f, $reg->{'direccion_familia'})
->setCellValue('L'.$f, $reg->{'nro_habitantes'})
->setCellValue('M'.$f, $reg->{'condicion_vivienda'})

->setCellValue('N'.$f, $reg->{'cnt_tipo_1_i'})
->setCellValue('O'.$f, $reg->{'cnt_tipo_1_p'})
->setCellValue('P'.$f, $reg->{'cnt_tipo_1_t'})
->setCellValue('Q'.$f, $reg->{'cnt_tipo_1_tf'})

->setCellValue('R'.$f, $reg->{'cnt_tipo_2_i'})
->setCellValue('S'.$f, $reg->{'cnt_tipo_2_p'})
->setCellValue('T'.$f, $reg->{'cnt_tipo_2_t'})
->setCellValue('U'.$f, $reg->{'cnt_tipo_2_tf'})

->setCellValue('V'.$f, $reg->{'cnt_tipo_3_i'})
->setCellValue('W'.$f, $reg->{'cnt_tipo_3_p'})
->setCellValue('X'.$f, $reg->{'cnt_tipo_3_t'})
->setCellValue('Y'.$f, $reg->{'cnt_tipo_3_tf'})

->setCellValue('Z'.$f, $reg->{'cnt_tipo_10_i'})
->setCellValue('AA'.$f, $reg->{'cnt_tipo_10_p'})
->setCellValue('AB'.$f, $reg->{'cnt_tipo_10_t'})
->setCellValue('AC'.$f, $reg->{'cnt_tipo_10_tf'})

->setCellValue('AD'.$f, $reg->{'cnt_tipo_4_i'})
->setCellValue('AE'.$f, $reg->{'cnt_tipo_4_p'})
->setCellValue('AF'.$f, $reg->{'cnt_tipo_4_t'})
->setCellValue('AG'.$f, $reg->{'cnt_tipo_4_tf'})

->setCellValue('AH'.$f, $reg->{'cnt_tipo_5_i'})
->setCellValue('AI'.$f, $reg->{'cnt_tipo_5_p'})
->setCellValue('AJ'.$f, $reg->{'cnt_tipo_5_t'})
->setCellValue('AK'.$f, $reg->{'cnt_tipo_5_tf'})

->setCellValue('AL'.$f, $reg->{'cnt_tipo_6_i'})
->setCellValue('AM'.$f, $reg->{'cnt_tipo_6_p'})
->setCellValue('AN'.$f, $reg->{'cnt_tipo_6_t'})
->setCellValue('AO'.$f, $reg->{'cnt_tipo_6_tf'})

->setCellValue('AP'.$f, $reg->{'cnt_tipo_7_i'})
->setCellValue('AQ'.$f, $reg->{'cnt_tipo_7_p'})
->setCellValue('AR'.$f, $reg->{'cnt_tipo_7_t'})
->setCellValue('AS'.$f, $reg->{'cnt_tipo_7_tf'})

->setCellValue('AT'.$f, $reg->{'cnt_tipo_7_d'})

->setCellValue('AU'.$f, $reg->{'cnt_tipo_9_i'})
->setCellValue('AV'.$f, $reg->{'cnt_tipo_9_p'})
->setCellValue('AW'.$f, $reg->{'cnt_tipo_9_t'})
->setCellValue('AX'.$f, $reg->{'cnt_tipo_9_tf'})

->setCellValue('AY'.$f, $reg->{'cnt_tipo_9_d'})


->setCellValue('AZ'.$f, $reg->{'cnt_larvicidas'})
->setCellValue('BA'.$f, $reg->{'cnt_febriles'})

->setCellValue('BB'.$f, $reg->{'usuario_inspector'})
->setCellValue('BC'.$f, $reg->{'cantidad_probable_dengue'})


;
}

/*foreach(range('A','Z') as $columnID){
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}*/

/*foreach (range(0,65) as $col) {
        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);                
}*/


$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Detalle_Ficha_Aedes_'.date('Ymd').'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>