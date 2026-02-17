<?
session_start();
require_once "../modelos/Items.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$pro= new Item();


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("System")
->setLastModifiedBy("System")
->setTitle("Listado de Items")
->setSubject("Listado de Items")
->setDescription("Listado de Items.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Items");

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Nro')
->setCellValue('B1', 'Nombre del Items')
->setCellValue('C1', 'Codigo')
->setCellValue('D1', 'Categoria')
->setCellValue('E1', 'Unidad Medida')
->setCellValue('F1', 'Marca')
->setCellValue('G1', 'Stock')
->setCellValue('H1', 'Costo Unitario')
->setCellValue('I1', 'Total')



;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Items');

$rs=$pro->listar("","","");

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;
	
	
	$objPHPExcel->setActiveSheetIndex(0)
->setCellValueExplicit('A'.$f, $f-1, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('B'.$f, $reg->{'cat.nombre'})
->setCellValueExplicit('C'.$f, $reg->{'i.id'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('D'.$f, $reg->{'c.descripcion'})
->setCellValueExplicit('E'.$f, $reg->{'umi.descripcion'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('F'.$f, $reg->{'m.descripcion'}, PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValue('G'.$f, $reg->{'stock_real'})
->setCellValue('H'.$f, $reg->{'precio_compra'})
->setCellValue('I'.$f, round($reg->{'stock_real'}*$reg->{'precio_compra'},2))
;
}

/*foreach(range('A','Z') as $columnID){
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}*/

foreach (range(0,8) as $col) {
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