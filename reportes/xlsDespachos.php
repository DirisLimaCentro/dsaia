<?
session_start();
require_once "../modelos/Salida.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$com= new Salida();


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
->setCellValue('B1', 'Area')
->setCellValue('C1', 'Fecha Compra')
->setCellValue('D1', 'Tipo Doc')
->setCellValue('E1', 'Serie')
->setCellValue('F1', 'Numero')
->setCellValue('G1', 'Personal Traslado')
->setCellValue('H1', 'Item')
->setCellValue('I1', 'Precio')
->setCellValue('J1', 'Cantidad')
->setCellValue('K1', 'Subtotal')



;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Items');

if (isset($_GET['id_empresa'])){
	$id_empresa=$_GET['id_empresa'];
}else{
	$id_empresa="";
}

$id_local=(isset($_GET['id_local']))?$_GET['id_local']:'';
$id_personal=(isset($_GET['id_personal']))?$_GET['id_personal']:'';
$id_catalogo=(isset($_GET['id_catalogo']))?$_GET['id_catalogo']:'';
 		
$rs=$com->registroSalidas($_GET['desde'],$_GET['hasta'],$id_empresa,$id_local,$id_personal,$id_catalogo);

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
	->setCellValue('G'.$f, utf8_decode($reg->{'personal_traslado'}) )
	->setCellValue('H'.$f, ($reg->{'item'}.'-'.$reg->{'unidad_medida_ingreso'}.'-'.$reg->{'marca'}) )
	->setCellValue('I'.$f, $reg->{'precio_compra'} )
	->setCellValue('J'.$f, $reg->{'cantidad'} )
	->setCellValue('K'.$f, round(($reg->{'cantidad'}*$reg->{'precio_compra'}),2))
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