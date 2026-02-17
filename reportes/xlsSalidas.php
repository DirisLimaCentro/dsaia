<?
session_start();
require_once "../modelos/Salida.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$sal= new Salida();


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("System")
->setLastModifiedBy("System")
->setTitle("Listado de Salidas")
->setSubject("Listado de Salidas")
->setDescription("Listado de Salidas.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Salidas");

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Empresa')
->setCellValue('B1', 'Area Destino')
->setCellValue('C1', 'Tipo Documento')
->setCellValue('D1', 'Serie')
->setCellValue('E1', 'Numero')
->setCellValue('F1', 'Fecha Salida')
->setCellValue('G1', 'Solicitante')
->setCellValue('H1', 'Item')
->setCellValue('I1', 'Unidad Medida')
->setCellValue('J1', 'Lote')
->setCellValue('K1', 'Cantidad')


;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Salidas');

$rs=$sal->listarDetallado($_GET["desde"],$_GET["hasta"]);

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;
	
	
	$objPHPExcel->setActiveSheetIndex(0)
//->setCellValueExplicit('A'.$f, $f-1, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('A'.$f, $reg->{'empresa'})
->setCellValue('B'.$f, $reg->{'area_destino'})
->setCellValue('C'.$f, $reg->{'tipo_documento'})
//->setCellValue('D'.$f, $reg->{'serie_documento'})
->setCellValueExplicit('D'.$f, $reg->{'serie_documento'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('E'.$f, $reg->{'numero_documento'})
->setCellValue('F'.$f, $reg->{'fecha_salida'})
->setCellValue('G'.$f, $reg->{'persona'})
->setCellValue('H'.$f, $reg->{'item'})
->setCellValue('I'.$f, $reg->{'unidad_medida_ingreso'})
//->setCellValue('J'.$f, $reg->{'numero_lote'})
->setCellValueExplicit('J'.$f, $reg->{'numero_lote'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('K'.$f, $reg->{'cantidad'})


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

foreach (range(0,10) as $col) {
        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);                
}


$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Salidas_'.date('Ymd').'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>