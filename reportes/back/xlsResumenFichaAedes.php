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
->setCellValue('G1', 'Nro Habitantes')
->setCellValue('H1', 'Viviendas Programadas')
->setCellValue('I1', 'Viviendas Inspeccionadas')
->setCellValue('J1', 'Viviendas Cerradas')
->setCellValue('K1', 'Viviendas Renuentes')

->setCellValue('L1', 'Viviendas Deshabitadas')
->setCellValue('M1', 'Viviendas +')
->setCellValue('N1', '% Cobertura EESS')
->setCellValue('O1', 'Umbral')
->setCellValue('P1', 'I.A')
->setCellValue('Q1', 'I.R')
->setCellValue('R1', 'I.B')

->setCellValue('S1', 'I1')
->setCellValue('T1', 'P1')
->setCellValue('U1', 'T1')

->setCellValue('V1', 'I2')
->setCellValue('W1', 'P2')
->setCellValue('X1', 'T2')

->setCellValue('Y1', 'I3')
->setCellValue('Z1', 'P3')
->setCellValue('AA1', 'T3')

->setCellValue('AB1', 'I4')
->setCellValue('AC1', 'P4')
->setCellValue('AD1', 'T4')

->setCellValue('AE1', 'I5')
->setCellValue('AF1', 'P5')
->setCellValue('AG1', 'T5')

->setCellValue('AH1', 'I6')
->setCellValue('AI1', 'P6')
->setCellValue('AJ1', 'T6')

->setCellValue('AK1', 'I7')
->setCellValue('AL1', 'P7')
->setCellValue('AM1', 'T7')

->setCellValue('AN1', 'I8')
->setCellValue('AO1', 'P8')
->setCellValue('AP1', 'T8')

->setCellValue('AQ1', 'I9')
->setCellValue('AR1', 'P9')
->setCellValue('AS1', 'T9')



;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Resumen Aedes');

$rs=$sal->resumenAedes($_GET["mes"],$_GET["anio"]);

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;
	
	
	$objPHPExcel->setActiveSheetIndex(0)
//->setCellValueExplicit('A'.$f, $f-1, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('A'.$f, $reg->{'anio'})
->setCellValue('B'.$f, $reg->{'mes'})
->setCellValue('C'.$f, $reg->{'actividad'})
//->setCellValue('D'.$f, $reg->{'serie_documento'})
->setCellValueExplicit('D'.$f, $reg->{'distrito'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('E'.$f, $reg->{'establecimiento'})
->setCellValue('F'.$f, $reg->{'ris'})
->setCellValue('G'.$f, $reg->{'nro_habitantes'})
->setCellValue('H'.$f, '0')
->setCellValue('I'.$f, $reg->{'viviendas_inspeccionadas'})
->setCellValue('J'.$f, $reg->{'casas_cerradas'})
->setCellValue('K'.$f, $reg->{'casas_renuentes'})
->setCellValue('L'.$f, $reg->{'casas_deshabitadas'})
->setCellValue('M'.$f, $reg->{'vivienda_positivas'})

->setCellValue('N'.$f, '')
->setCellValue('O'.$f, '')
->setCellValue('P'.$f, '')
->setCellValue('Q'.$f, '')
->setCellValue('R'.$f, '')

->setCellValue('S'.$f, $reg->{'tot_i_1'})
->setCellValue('T'.$f, $reg->{'tot_p_1'})
->setCellValue('U'.$f, $reg->{'tot_t_1'})

->setCellValue('V'.$f, $reg->{'tot_i_2'})
->setCellValue('W'.$f, $reg->{'tot_p_2'})
->setCellValue('X'.$f, $reg->{'tot_t_2'})

->setCellValue('Y'.$f, $reg->{'tot_i_3'})
->setCellValue('Z'.$f, $reg->{'tot_p_3'})
->setCellValue('AA'.$f, $reg->{'tot_t_3'})

->setCellValue('AB'.$f, $reg->{'tot_i_4'})
->setCellValue('AC'.$f, $reg->{'tot_p_4'})
->setCellValue('AD'.$f, $reg->{'tot_t_4'})

->setCellValue('AE'.$f, $reg->{'tot_i_5'})
->setCellValue('AF'.$f, $reg->{'tot_p_5'})
->setCellValue('AG'.$f, $reg->{'tot_t_5'})

->setCellValue('AH'.$f, $reg->{'tot_i_6'})
->setCellValue('AI'.$f, $reg->{'tot_p_6'})
->setCellValue('AJ'.$f, $reg->{'tot_t_6'})

->setCellValue('AK'.$f, $reg->{'tot_i_7'})
->setCellValue('AL'.$f, $reg->{'tot_p_7'})
->setCellValue('AM'.$f, $reg->{'tot_t_7'})

->setCellValue('AN'.$f, $reg->{'tot_i_8'})
->setCellValue('AO'.$f, $reg->{'tot_p_8'})
->setCellValue('AP'.$f, $reg->{'tot_t_8'})

->setCellValue('AQ'.$f, $reg->{'tot_i_9'})
->setCellValue('AR'.$f, $reg->{'tot_p_9'})
->setCellValue('AS'.$f, $reg->{'tot_t_9'})


/*->setCellValueExplicit('C'.$f, $reg->{'ruc'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('D'.$f, $reg->{'direccion'}.'-'.$reg->{'distrito'})
->setCellValueExplicit('E'.$f, $reg->{'telefono_fijo'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('F'.$f, $reg->{'celular'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('G'.$f, $reg->{'e_mail'})*/
;
}

/*foreach(range('A','Z') as $columnID){
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}*/

foreach (range(0,45) as $col) {
        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);                
}


$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="REsumen_Aedes_'.date('Ymd').'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>