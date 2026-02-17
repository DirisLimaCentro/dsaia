<?
session_start();
require_once "../modelos/Descargo.php";
require_once("../services/PHPExcel/Classes/PHPExcel.php");
$com= new Descargo();


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("System")
->setLastModifiedBy("System")
->setTitle("Listado de Descargos")
->setSubject("Listado de Descargos")
->setDescription("Listado de Descargos.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Descargos");

// Agregar Informacion

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Empresa')
->setCellValue('B1', 'Area')
->setCellValue('C1', 'Fecha')
->setCellValue('D1', 'Observaciones')
->setCellValue('E1', 'Encargado')
->setCellValue('F1', 'Insumo')
->setCellValue('G1', 'Marca')
->setCellValue('H1', 'Unidad Medida')
->setCellValue('I1', 'Cantidad')
->setCellValue('J1', 'Precio')
->setCellValue('K1', 'Total')


;
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Descargos');

if (isset($_GET['id_empresa'])){
	$id_empresa=$_GET['id_empresa'];
}else{
	$id_empresa="";
}

$id_local=(isset($_GET['id_local']))?$_GET['id_local']:'';
//$id_personal=(isset($_GET['id_personal']))?$_GET['id_personal']:'';
$id_catalogo=(isset($_GET['id_catalogo']))?$_GET['id_catalogo']:'';

$rs=$com->registroDescargos($_GET['desde'],$_GET['hasta'],$id_empresa,$id_local,$id_catalogo);

$f=1;
//PHPExcel_Cell_DataType::TYPE_STRING
while ($reg=pg_fetch_object($rs)){
	$f++;
	
	
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$f, utf8_decode($reg->{'empresa'}) )
	->setCellValue('B'.$f, $reg->{'local'} )
	->setCellValue('C'.$f, $reg->{'fecha'} )
	->setCellValue('D'.$f, $reg->{'observaciones'})	
	->setCellValue('E'.$f, utf8_decode($reg->{'encargado'}) )
	->setCellValue('F'.$f, ($reg->{'item'}) )	
	->setCellValue('G'.$f, $reg->{'marca'})	
	->setCellValue('H'.$f, $reg->{'unidad_medida_ingreso'})	
	->setCellValue('I'.$f, $reg->{'cantidad'} )
	->setCellValue('J'.$f, $reg->{'precio_compra'} )
	->setCellValue('K'.$f, $reg->{'cantidad'}*$reg->{'precio_compra'} )
;
}

/*foreach(range('A','Z') as $columnID){
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}*/

foreach (range(0,7) as $col) {
        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);                
}


$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Descargos_'.date('Ymd').'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>