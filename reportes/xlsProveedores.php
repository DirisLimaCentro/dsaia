<?
session_start();
require_once "../modelos/Proveedor.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$pro= new Proveedor();


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("System")
->setLastModifiedBy("System")
->setTitle("Listado de Proveedores")
->setSubject("Listado de Proveedores")
->setDescription("Listado de Proveedores.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Proveedores");

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Nro')
->setCellValue('B1', 'Nombre - Razon Social')
->setCellValue('C1', 'RUC')
->setCellValue('D1', 'Direccion')
->setCellValue('E1', 'Telefono')
->setCellValue('F1', 'Celular')
->setCellValue('G1', 'EMail')


;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Proveedores');

$rs=$pro->listar("","","");

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;
	
	
	$objPHPExcel->setActiveSheetIndex(0)
->setCellValueExplicit('A'.$f, $f-1, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('B'.$f, $reg->{'razon_social'})
->setCellValueExplicit('C'.$f, $reg->{'ruc'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('D'.$f, $reg->{'direccion'}.'-'.$reg->{'distrito'})
->setCellValueExplicit('E'.$f, $reg->{'telefono_fijo'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('F'.$f, $reg->{'celular'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('G'.$f, $reg->{'e_mail'})
;
}

/*foreach(range('A','Z') as $columnID){
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}*/

foreach (range(0,6) as $col) {
        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);                
}


$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Proveedores_'.date('Ymd').'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>