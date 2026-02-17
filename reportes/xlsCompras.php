<?
session_start();
require_once "../modelos/Compra.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$com= new Compra();


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("System")
->setLastModifiedBy("System")
->setTitle("Listado de Compras")
->setSubject("Listado de Compras")
->setDescription("Listado de Compras.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Compras");

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Empresa')
->setCellValue('B1', 'Area')
->setCellValue('C1', 'Fecha Compra')
->setCellValue('D1', 'Tipo Doc')
->setCellValue('E1', 'Serie')
->setCellValue('F1', 'Numero')
->setCellValue('G1', 'Moneda')
->setCellValue('H1', 'Proveedor')
->setCellValue('I1', 'Item')
->setCellValue('J1', 'Precio')
->setCellValue('K1', 'Cantidad')
->setCellValue('L1', 'Subtotal')



;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Items');

if (isset($_GET['id_empresa'])){
	$id_empresa=$_GET['id_empresa'];
}else{
	$id_empresa="";
}

$id_proveedor=(isset($_GET['id_proveedor']))?$_GET['id_proveedor']:'';
 		
$rs=$com->registroCompras($_GET['desde'],$_GET['hasta'],$id_empresa,$id_proveedor);

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;
	
	
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$f, utf8_decode($reg->{'empresa'}) )
	->setCellValue('B'.$f, $reg->{'local'} )
	->setCellValue('C'.$f, $reg->{'fecha'} )
	->setCellValue('D'.$f, $reg->{'tipo_documento'})
	->setCellValueExplicit('E'.$f, $reg->{'serie_documento'}, PHPExcel_Cell_DataType::TYPE_STRING)
	->setCellValueExplicit('F'.$f, $reg->{'numero_documento'}, PHPExcel_Cell_DataType::TYPE_STRING)
	->setCellValue('G'.$f, $reg->{'moneda'})
	->setCellValue('H'.$f, utf8_decode($reg->{'razon_social'}) )
	->setCellValue('I'.$f, ($reg->{'item'}.'-'.$reg->{'unidad_medida_ingreso'}.'-'.$reg->{'marca'}) )
	->setCellValue('J'.$f, $reg->{'costo_unitario_umc'} )
	->setCellValue('K'.$f, $reg->{'cantidad'} )
	->setCellValue('L'.$f, round(($reg->{'cantidad'}*$reg->{'costo_unitario_umc'}),2))
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
header('Content-Disposition: attachment;filename="Compras_'.date('Ymd').'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>