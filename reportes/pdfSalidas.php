<?php
//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
require_once "../modelos/Salida.php";

class PDF extends PDF_MC_Table
{
	public $__currentY=0;
	//Cabecera de página
	function Header()
	{
		//Logo
		//$this->Image('logo_pb.png',10,8,33);
		//Arial bold 15
		//Movernos a la derecha
		
		
		//$this->AddFont('calibri','','calibri.php');
		//$this->AddFont('calibrib','','calibrib.php');
		
		
		//$this->Image($_SESSION['s_logo_head_report'],4,4,48,14);
		
		//$this->Image('../img/logo_small.jpg',2,2,60,8);
		//$this->SetY(28);
		
		//$this->Image('imagenes/head_logo_hc.jpg',4,6,204,16);
		
		//$this->SetY(15);		
		//$this->SetFont('calibrib','',10);		
		//$this->SetTextColor(128,128,128);
		
		//$this->Cell(204,9,$_SESSION['operativo'],0,1,'R');	
		
		//$this->SetTextColor(0,0,0);
		
		$this->SetFont('Arial','B',12);
		
		$ti='REPORTE DE SALIDAS DE ALMACEN';
		$dat=date('d/m/Y');
		//$col=ceil((210-strlen($ti))/2);
		//$this->Cell($col);
		
		//Título
		//$this->SetFont('calibrib','',9);
		$this->Cell(297,4,$ti,0,1,'C');
		
		//Fecha
		//$this->SetFont('calibrib','',8);
		$this->SetFont('Arial','',7);
		$this->Cell(0,4,'Fecha: '.$dat,0,1,'R');
		
		//$this->Cell(297,6,$_SESSION['s_subunidad_nombre'],0,0,'C');
		
		
		//Aubtitles
		$this->Cell(0,4,'Pagina: '.$this->PageNo().'/{nb}',0,1,'R');
				
		//$this->Cell(30,4,'Dependencia',0,0,'');
		
		//$this->Cell(80,4,': SISTEMA METROPOLITANO DE LA SOLIDARIDAD',0,1,'');
		
		/*if ($_GET['id_consultorio']<>''){
			$this->Cell(30,4,'ESPECIALIDAD',0,0,'');
			$this->Cell(80,4,': '.$_GET['tag_consultorio'],0,1,'');
		}*/
		
		//if ($_GET['id_consultorio']<>''){
			/*$this->Cell(16,4,'TIPO',0,0,'');
			$this->SetFont('calibrib','',8);
			$this->Cell(80,4,': '.$_GET['tag_empresa'],0,1,'');
			$this->SetFont('calibri','',8);*/
		//}
		
		/*if ($_GET['id_estado']<>''){
			$this->Cell(16,4,'ESTADO',0,0,'');
			$this->SetFont('calibrib','',8);
			$this->Cell(80,4,': '.$_GET['tag_estado'],0,1,'');
			$this->SetFont('calibri','',8);
		}
		if ($_GET['id_tipo']<>''){
			$this->Cell(16,4,'TIPO PROD',0,0,'');
			$this->SetFont('calibrib','',8);
			$this->Cell(80,4,': '.$_GET['tag_tipo'],0,1,'');
			$this->SetFont('calibri','',8);
		}*/
		
		/*if ($_GET['desde']<>''){
			$this->SetFont('Arial','',8);
			$this->Cell(30,4,'Bienes Adquiridos Del',0,0,'');
			$this->SetFont('Arial','B',8);
			$this->Cell(20,4,': '.$_GET['desde'],0,0,'');
			$this->SetFont('Arial','',8);
			$this->Cell(4,4,'Al',0,0,'');
			$this->SetFont('Arial','B',8);
			$this->Cell(20,4,': '.$_GET['hasta'],0,1,'');
		}*/
		//Salto de línea
		//$this->Ln(20);
		$this->SetFont('Arial','B',7);
		$this->SetDrawColor(128,128,128);
		//$this->SetFont('calibrib','',7);
		$this->SetFillColor(164,164,164);
		$this->SetTextColor(255,255,255);
		
		$this->Cell(50,5,'EMPRESA','LT',0,'C',true);
		$this->Cell(20,5,'AREA','LT',0,'C',true);		
		$this->Cell(20,5,'FECHA','LT',0,'C',true);
		$this->Cell(20,5,'TIPO DOC','LT',0,'C',true);
		$this->Cell(10,5,'SERIE','LTBR',0,'C',true);
		$this->Cell(20,5,'NUMERO','LTBR',0,'C',true);
		$this->Cell(30,5,'PERSONA RECEP','LTBR',0,'C',true);
		$this->Cell(60,5,'ITEM','LTBR',0,'C',true);
		$this->Cell(20,5,'PRECIO','LTBR',0,'C',true);
		$this->Cell(20,5,'CANT','LTBR',0,'C',true);
		$this->Cell(20,5,'SUBTOTAL','LTBR',1,'C',true);
		
		
		/*$this->Cell(16,4,'','LB',0,'',true);
		$this->Cell(58,4,'','LB',0,'',true);		
		$this->Cell(16,4,'','LB',0,'C',true);
		$this->Cell(20,4,'','LB',0,'C',true);
		$this->Cell(15,4,'ENE','LTB',0,'C',true);
		$this->Cell(15,4,'FEB','LTB',0,'C',true);
		$this->Cell(15,4,'MAR','LTB',0,'C',true);
		$this->Cell(15,4,'ABR','LTB',0,'C',true);
		$this->Cell(15,4,'MAY','LTB',0,'C',true);
		$this->Cell(15,4,'JUN','LTB',0,'C',true);
		$this->Cell(15,4,'JUL','LTB',0,'C',true);
		$this->Cell(15,4,'AGO','LTB',0,'C',true);
		$this->Cell(15,4,'SET','LTB',0,'C',true);
		$this->Cell(15,4,'OCT','LTB',0,'C',true);
		$this->Cell(15,4,'NOV','LTB',0,'C',true);
		$this->Cell(15,4,'DIC','LTBR',1,'C',true);
		
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0,0,0);*/
		
		//$this->SetFont('calibri','',7);
		
		//parent::Header();
		//$this->__currentY=$this->GetY();
	}
	
	//Pie de página
	function Footer()
	{
		//Posición: a 1,5 cm del final
		//$this->SetY(-10);
		//Arial italic 8
		//$this->SetFont('Arial','I',8);
		//Número de página
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		//$this->Cell(120,4,'','B',0,0,'');
		//$this->Cell(105,4,'','B',0,0,'');
		//$this->Cell(20,4,'','B',0,0,'');
		//$this->Cell(30,4,'','B',0,0,'');
	}
}

//$pdf=new FPDF('L','mm','A4');

$com=new Salida();

//$oc=$item->mostrar($_GET["id"]);
if (isset($_GET['id_empresa'])){
	$id_empresa=$_GET['id_empresa'];
}else{
	$id_empresa="";
}

$id_local=(isset($_GET['id_local']))?$_GET['id_local']:'';
$id_personal=(isset($_GET['id_personal']))?$_GET['id_personal']:'';
$id_catalogo=(isset($_GET['id_catalogo']))?$_GET['id_catalogo']:'';
 		
$rs=$com->registroSalidas($_GET['desde'],$_GET['hasta'],$id_empresa,$id_local,$id_personal,$id_catalogo);


$pdf=new PDF('L','mm','A4');



//$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(true,3);
$pdf->SetMargins(3,3,3);
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->SetDisplayMode(real,'default');

$pdf->SetDrawColor(128,128,128);
$pdf->SetFont('Arial','',7);


$pdf->SetWidths(array(50,20,20,20,10,20,30,60,20,20,20));
$pdf->SetAligns(array('L','L','L','L','L','L','L','L','R','R','R'));

$tot=0;
while ($reg=pg_fetch_object($rs)){
	$pdf->Row(array(utf8_decode($reg->{'empresa'}),utf8_decode($reg->{'local'}),$reg->{'fecha'},$reg->{'tipo_documento'},
	$reg->{'serie_documento'},$reg->{'numero_documento'},utf8_decode($reg->{'personal_traslado'}),($reg->{'item'}.'-'.$reg->{'unidad_medida_ingreso'}.'-'.$reg->{'marca'}),$reg->{'precio_compra'},
	$reg->{'cantidad'},round(($reg->{'cantidad'}*$reg->{'precio_compra'}),2)
	));
	$tot+=round(($reg->{'cantidad'}*$reg->{'precio_compra'}),2);
}

$pdf->SetWidths(array(270,20));
$pdf->SetAligns(array('L','R'));
$pdf->Row(array('T O T A L',number_format($tot,2,'.',',') ));


$pdf->Output();
?>
