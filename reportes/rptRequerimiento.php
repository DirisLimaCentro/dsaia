<?php
//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
require_once "../modelos/Requerimiento.php";

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
		
		$this->SetFont('Arial','B',8);
		
		//$ti='ORDEN DE COMPRA';
		//$dat=date('d/m/Y');
		//$col=ceil((210-strlen($ti))/2);
		//$this->Cell($col);
		
		//Título
		//$this->SetFont('calibrib','',9);
		//$this->Cell(297,6,$ti,0,0,'C');
		
		//Fecha
		//$this->SetFont('calibrib','',8);
		//$this->Cell(0,6,'Fecha: '.$dat,0,1,'R');
		
		//$this->Cell(297,6,$_SESSION['s_subunidad_nombre'],0,0,'C');
		
		
		//Aubtitles
		//$this->Cell(0,5,'Pagina: '.$this->PageNo().'/{nb}',0,1,'R');
				
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
		$this->SetDrawColor(128,128,128);
		//$this->SetFont('calibrib','',7);
		$this->SetFillColor(164,164,164);
		$this->SetTextColor(255,255,255);
		/*$this->Cell(16,5,'COD','LT',0,'C',true);
		$this->Cell(58,5,'ACTIVIDAD','LT',0,'C',true);		
		$this->Cell(16,5,'META','LT',0,'C',true);
		$this->Cell(20,5,'U. MED','LT',0,'C',true);
		$this->Cell(180,4,'CRONOGRAMA','LTBR',1,'C',true);
		
		$this->Cell(16,4,'','LB',0,'',true);
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

$requerimiento=new Requerimiento();

$oc=$requerimiento->mostrar($_GET["id"]);
 		
$rs=$requerimiento->detalleRequerimiento($_GET["id"]);



$pdf=new PDF('P','mm','A4');



//$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(true,4);
$pdf->SetMargins(6,6,6);
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->SetDisplayMode(real,'default');


$pdf->SetFont('Arial','B',10);

$pdf->Cell(20,4,'','',1,'L');

$pdf->Cell(20,4,$oc->empresa,'',0,'L');


$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(38,185,154);
$pdf->Cell(0,6,'REQUERIMIENTO','',1,'R');
$pdf->SetTextColor(0,0,0);

$pdf->SetFont('Arial','',8);


$pdf->Cell(160,6,$oc->direccion.'- '.$oc->distrito,'',0,'L');

//$pdf->Cell(160,6,'','',0,'L');
$pdf->Cell(15,6,'Fecha','',0,'L');
$pdf->Cell(20,6,$oc->fecha,'LTBR',1,'L');

$pdf->Cell(160,6,$oc->telefono_fijo,'',0,'L');
$pdf->Cell(15,6,'Nro.','',0,'L');

$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,6,$oc->numero,'LBR',1,'R');
$pdf->SetFont('Arial','',8);

$pdf->Cell(0,6,'','',1,'L');

$pdf->SetFillColor(38,185,154);
$pdf->SetTextColor(255,255,255);

$pdf->SetDrawColor(128,128,128);

$pdf->Cell(132,6,'AREA Y USUARIO','LTR',0,'C',true);

$pdf->Cell(10,6,'','',1,'C',false);

//$pdf->Cell(62,6,'CONDICIONES','LTR',1,'C',true);



$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);


$pdf->Cell(30,6,'Area','L',0,'L');
$pdf->Cell(102,6,': '.utf8_decode($oc->local),'R',1,'L');

//$pdf->Cell(10,6,'','',0,'C',false);
//$pdf->Cell(20,6,'Forma Pago','L',0,'L');
//$pdf->Cell(42,6,': '.$oc->forma_pago,'R',1,'L');



$pdf->Cell(30,6,'Usuario','L',0,'L');
$pdf->Cell(102,6,': '.$oc->usuario_crea,'R',1,'L');

$pdf->Cell(30,6,'Personal Referencia','LB',0,'L');
$pdf->Cell(102,6,': '.utf8_decode($oc->personal_referencial),'RB',1,'L');

//$pdf->Cell(10,6,'','',0,'C',false);
//$pdf->Cell(20,6,'Validez','LB',0,'L');
//$pdf->Cell(42,6,': '.$oc->validez,'RB',1,'L');


//$pdf->Cell(20,6,'RUC','LB',0,'L');
//$pdf->Cell(102,6,': '.$oc->ruc,'RB',1,'L');


$pdf->Cell(0,2,'','',1,'L');


$pdf->SetFillColor(38,185,154);
$pdf->SetTextColor(255,255,255);


$pdf->Cell(10,6,'Nro','LT',0,'C',true);
$pdf->Cell(145,6,'Descripcion','LT',0,'C',true);
$pdf->Cell(15,6,'Cant','LT',0,'C',true);
$pdf->Cell(25,6,'Und Med','TR',1,'C',true);

//$pdf->Cell(20,6,'Precio','T',0,'C',true);
//$pdf->Cell(20,6,'Total','RT',1,'C',true);



$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);



//$pdf->SetLineWidth(0.01);

$pdf->SetWidths(array(10,145,15,25));
$pdf->SetAligns(array('R','L','R','L'));

$tot=0;$corr=0;
while ($reg=pg_fetch_object($rs)){
	//$tot+=$reg->costo_total;
	$corr++;
	$pdf->Row(array($corr,utf8_decode($reg->nombre),$reg->cantidad,
		$reg->unidad_medida_ingreso));
}	
//$imp=($oc->porcentaje_igv/100)+1;
//$vv=round($tot/$imp,2);
//$igv=$tot-$vv;



$fil=$pdf->GetY();

$pdf->Cell(0,2,'','',1,'L',false);

$pdf->SetFillColor(38,185,154);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(100,6,'Observaciones','LTBR',1,'L',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

$pdf->MultiCell(100,6,utf8_decode($oc->observaciones),'LRTB','L',false);

$pdf->SetY($fil);
$pdf->SetX(161);

/*$pdf->Cell(20,7,'SubTotal','LTBR',0,'L',false);
$pdf->Cell(20,7,$vv,'LTBR',1,'R',false);
$pdf->SetX(161);
$pdf->Cell(20,7,'I.G.V.','LTBR',0,'L',false);
$pdf->Cell(20,7,$igv,'LTBR',1,'R',false);
$pdf->SetX(161);
$pdf->Cell(20,7,'Total','LTBR',0,'L',false);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,7,$tot,'LTBR',1,'R',false);
$pdf->SetFont('Arial','',8);*/


/*foreach ($rs as $row) {
	if ($idoeg!=$row['id_oeg']){
		$pdf->SetFont('calibrib','',7);
		$pdf->SetFillColor(128,128,128);
		$pdf->SetTextColor(255,255,255);
		$pdf->MultiCell(290,4,$row['id_oeg'].' : '.utf8_decode($row['oegeneral']),'LRTB','L',true);
		$idoeg=$row['id_oeg'];
		$idoee='';
		$idres='';
		$idpro='';
		$idtipo='';
		
		$pdf->SetFont('calibri','',7);
		$pdf->SetFillColor(255,255,255);
		$pdf->SetTextColor(0,0,0);
	}
	if ($idoee!=$row['id_oee']){
		$pdf->SetFont('calibrib','',7);
		
		$pdf->SetFillColor(150,150,150);
		$pdf->SetTextColor(255,255,255);
		
		$pdf->MultiCell(290,4,$row['id_oee'].' : '.utf8_decode($row['oeespecifico']),'LRTB','L',true);
		$idoee=$row['id_oee'];
		$idres='';
		$idpro='';
		$idtipo='';
		$pdf->SetFont('calibri','',7);
		
		$pdf->SetFillColor(255,255,255);
		$pdf->SetTextColor(0,0,0);
	}
	if ($idres!=$row['id_resultado']){
		$pdf->SetFont('calibrib','',7);
		$pdf->MultiCell(290,4,$row['id_resultado'].' : '.utf8_decode($row['resultado']),'LRTB','L',false);
		$idres=$row['id_resultado'];
		$idpro='';
		$idtipo='';
		$pdf->SetFont('calibri','',7);
	}
	if ($idpro!=$row['id_producto']){
		$pdf->SetFont('calibrib','',7);
		$pdf->MultiCell(290,4,$row['id_producto'].' : '.utf8_decode($row['producto']),'LRTB','L',false);
		$idpro=$row['id_producto'];		
		$idtipo='';
		$pdf->SetFont('calibri','',7);
	}
	
	if ($idtipo!=$row['id_tipo']){
		$pdf->MultiCell(290,4,$row['tipo_actividad'],'LRTB','L',false);
		$idtipo=$row['id_tipo'];
	}
	/*$pdf->__currentY=$pdf->GetY();
	$pdf->SetXY($pdf->GetX(), $pdf->__currentY);
	$pdf->Cell(12,4,$row['id_actividad'],'LTB',0,'L');
	$pdf->MultiCell(54,4,utf8_decode($row['actividad']),'LRTB','L',false);
	$aux=$pdf->GetY();
	$pdf->SetXY($pdf->GetX()+54+12, $pdf->__currentY);	
	$pdf->Cell(20,4,$row['meta_e'],'LTB',0,'R');
	$pdf->Cell(20,4,$row['medida'],'LTB',0,'L');
	$pdf->Cell(15,4,$row['ve_01'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_02'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_03'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_04'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_05'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_06'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_07'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_08'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_09'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_10'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_11'],'LTB',0,'R');
	$pdf->Cell(15,4,$row['ve_12'],'LTBR',1,'R');
	$pdf->SetY($aux);*/
	//$pdf->Row(array(substr($row['id_actividad'],5,20),utf8_decode($row['actividad']),$row['meta_e'],$row['medida'],$row['ve_01'],$row['ve_02'],$row['ve_03'],
	//$row['ve_04'],$row['ve_05'],$row['ve_06'],$row['ve_07'],$row['ve_08'],$row['ve_09'],$row['ve_10'],$row['ve_11'],$row['ve_12']));
	
//}

/*for($row=1;$row<30;$row++)
{
	$pdf->__currentY=$pdf->GetY();	
	$pdf->SetXY($pdf->GetX(), $pdf->__currentY);
	$pdf->MultiCell(15, 8, "Line $row", 1);	
	$pdf->SetXY($pdf->GetX()+15, $pdf->__currentY);
	$pdf->MultiCell(30, 4, "Second cell of line en dos lineassssss $row", 1);
    $aux=$pdf->GetY();
	$pdf->SetXY($pdf->GetX()+30+15, $pdf->__currentY);	
	$pdf->MultiCell(0, 8, "Last cell of line sssssssss   sssss$row", 1);	
	$pdf->SetY($aux);
}*/

$pdf->Output();
?>
