<?php
//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
require_once "../modelos/FichaVeterinaria.php";

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
		
		$ti='FORMATO DE CONSOLIDADO DE VACUNACION ANTIRABICA Y OTRAS ZOONOSIS DE LOS ESTABLECIMIENTOS VETERINARIOS DE LA JURISDICCION DE LA DIRIS LIMA CENTRO';
		//$dat=date('d/m/Y');
		//$col=ceil((210-strlen($ti))/2);
		//$this->Cell($col);
		
		//Título
		//$this->SetFont('calibrib','',9);

		//$this->Cell(290,6,$ti,'LTBR',1,'C');

		$this->MultiCell(290,6,utf8_decode($ti),'LRTB','C',false);

		
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

$sal=new Ficha();

$ficha=$sal->mostrar($_GET["id"]);
 		
$rs=$sal->detalleFicha($_GET["id"]);

$fi=pg_fetch_all($ficha);

$pdf=new PDF('L','mm','A4');



//$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(true,4);
$pdf->SetMargins(3,3,3);
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->SetDisplayMode(real,'default');


$pdf->SetFont('Arial','B',10);

$pdf->SetFillColor( 213, 219, 219 );

$pdf->Cell(290,6,'DATOS DEL ESTABLECIMIENTO VETERINARIO','LTR',1,'C',true);

$pdf->SetFillColor(255,255,255);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(290,6,'RESOLUCION ADMINISTRATIVA N '.$fi[0]['resolucion_numero'].' - '.$fi[0]['resolucion_anio'].' DESAIA/DIRIS-LC','LTR',1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(20,6,'RUC:','LT',0,'L');
$pdf->Cell(270,6,$fi[0]['ruc'],'LTR',1,'L');

$pdf->Cell(40,6,'Nombre o Razon Social:','LTB',0,'L');
$pdf->Cell(250,6,utf8_decode($fi[0]['empresa']),'LTBR',1,'L');

$pdf->Cell(40,6,'Nombre Comercial:','LTB',0,'L');
$pdf->Cell(250,6,strtoupper($fi[0]['nombre_comercial']),'LTBR',1,'L');

$pdf->Cell(40,6,'Direccion:','LTB',0,'L');
$pdf->Cell(250,6,strtoupper(utf8_decode($fi[0]['direccion_empresa'])),'LTBR',1,'L');

$pdf->Cell(40,6,'Distrito:','LTB',0,'L');
$pdf->Cell(160,6,strtoupper($fi[0]['ubigeo_empresa']),'LTBR',0,'L');
$pdf->Cell(40,6,'Telefono y/o Celular:','LTB',0,'L');
$pdf->Cell(50,6,strtoupper($fi[0]['telefono_empresa']),'LTBR',1,'L');


$pdf->Cell(40,6,utf8_decode('Correo electrónico:'),'LTB',0,'L');
$pdf->Cell(250,6,strtoupper($fi[0]['correo_empresa']),'LTBR',1,'L');

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor( 213, 219, 219 );
$pdf->Cell(290,6,'DATOS DEL PERSONAL MEDICO VETERINARIO QUE LABORA EN EL ESTABLECIMIENTO','LTR',1,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);

$pdf->Cell(40,6,'DNI(  ) - C.E(  ):','LTB',0,'L');
$pdf->Cell(40,6,strtoupper($fi[0]['numero_documento']),'LTBR',0,'L');
$pdf->Cell(40,6,'Nombres y Apellidos:','LTB',0,'L');
$pdf->Cell(170,6,utf8_decode($fi[0]['nombres'].' '.$fi[0]['ape_materno'].' '.$fi[0]['ape_paterno']),'LTBR',1,'L');


$pdf->Cell(40,6,'Direccion:','LTB',0,'L');
$pdf->Cell(160,6,utf8_decode($fi[0]['direccion']),'LTBR',0,'L');
$pdf->Cell(40,6,'Distrito:','LTB',0,'L');
$pdf->Cell(50,6,utf8_decode($fi[0]['ubigeo_persona']),'LTBR',1,'L');


$pdf->Cell(40,6,utf8_decode('N° CMVP:'),'LTB',0,'L');
$pdf->Cell(40,6,strtoupper($fi[0]['cmvp']),'LTBR',0,'L');
$pdf->Cell(40,6,'Telefono y/o Celular:','LTB',0,'L');
$pdf->Cell(170,6,utf8_decode($fi[0]['telefono']),'LTBR',1,'L');



$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor( 213, 219, 219 );
$pdf->Cell(290,6,'DATOS SOBRE LAS ACTIVIDADES PREVENTIVAS DE LA RABIA','LTR',1,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);


$pdf->Cell(10,6,'','LT',0,'C');
$pdf->Cell(30,6,'','LT',0,'C');
$pdf->Cell(210,6,utf8_decode('Vacunación Antirrábica Canina'),'LT',0,'C');
$pdf->Cell(40,6,'','LTR',1,'C');


$pdf->Cell(10,6,'','L',0,'C');
$pdf->Cell(30,6,'','L',0,'C');
$pdf->Cell(105,6,utf8_decode('Vacunación antirrábica INS/otro Laboratorio'),'LT',0,'C');
$pdf->Cell(105,6,utf8_decode('Vacuna Tipo sextuple (que incluya Rabia)'),'LT',0,'C');
$pdf->Cell(40,6,'','LR',1,'C');

$pdf->Cell(10,6,utf8_decode('N°'),'L',0,'C');
$pdf->Cell(30,6,'Mes de Reporte','L',0,'C');
$pdf->Cell(52,6,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(53,6,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(52,6,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(53,6,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(40,6,'Distrito','LR',1,'C');


$pdf->Cell(10,6,'','L',0,'C');
$pdf->Cell(30,6,'','L',0,'C');
$pdf->Cell(26,6,utf8_decode('menor 1 año'),'LT',0,'C');
$pdf->Cell(26,6,utf8_decode('menor 1 año'),'LT',0,'C');
$pdf->Cell(26,6,utf8_decode('menor 1 año'),'LT',0,'C');
$pdf->Cell(27,6,utf8_decode('mayor 1 año'),'LT',0,'C');
$pdf->Cell(26,6,utf8_decode('menor 1 año'),'LT',0,'C');
$pdf->Cell(26,6,utf8_decode('mayor 1 año'),'LT',0,'C');
$pdf->Cell(26,6,utf8_decode('menor 1 año'),'LT',0,'C');
$pdf->Cell(27,6,utf8_decode('mayor 1 año'),'LT',0,'C');
$pdf->Cell(40,6,'','LR',1,'C');


$pdf->Cell(10,6,'1','LT',0,'C');
$pdf->Cell(30,6,utf8_decode($fi[0]['name_mes']),'LT',0,'C');
$pdf->Cell(26,6,$fi[0]['vac_ant_pri_men_1'],'LT',0,'C');
$pdf->Cell(26,6,$fi[0]['vac_ant_pri_may_1'],'LT',0,'C');
$pdf->Cell(26,6,$fi[0]['vac_ant_rev_men_1'],'LT',0,'C');
$pdf->Cell(27,6,$fi[0]['vac_ant_rev_may_1'],'LT',0,'C');
$pdf->Cell(26,6,$fi[0]['vac_sex_pri_men_1'],'LT',0,'C');
$pdf->Cell(26,6,$fi[0]['vac_sex_pri_may_1'],'LT',0,'C');
$pdf->Cell(26,6,$fi[0]['vac_sex_rev_men_1'],'LT',0,'C');
$pdf->Cell(27,6,$fi[0]['vac_sex_rev_may_1'],'LT',0,'C');
$pdf->Cell(40,6,utf8_decode($fi[0]['ubigeo_ficha']),'LTR',1,'C');


$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor( 213, 219, 219 );
$pdf->Cell(290,6,'NOTIFICACION DE MUESTRAS','LTR',1,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);


$pdf->Cell(100,6,'DATOS DE LA MASCOTA','LT',0,'C');
$pdf->Cell(190,6,'DATOS DEL PROPIETARIO','LTR',1,'C');

$pdf->Cell(10,6,utf8_decode('N°'),'LTB',0,'C');
$pdf->Cell(20,6,'Especie','LTB',0,'C');
$pdf->Cell(30,6,'Nombre','LTB',0,'C');
$pdf->Cell(20,6,'Sexo','LTB',0,'C');
$pdf->Cell(20,6,'Edad','LTB',0,'C');

$pdf->Cell(80,6,'Nombre y Apellido del propietario','LTB',0,'C');
$pdf->Cell(50,6,'Telefono y/o Celular','LTB',0,'C');
$pdf->Cell(60,6,'Distrito','LTB',1,'C');

$pdf->SetWidths(array(10,20,30,20,20,80,50,60));
$j=0;
while ($reg=pg_fetch_object($rs)){	
	$j++;
	$pdf->Row(array(
		$j,
		utf8_decode($reg->especie),
		utf8_decode($reg->nombre_mascota),
		utf8_decode($reg->sexo),
		utf8_decode($reg->edad_mascota),
		utf8_decode($reg->propietario),
		utf8_decode($reg->telefono),
		utf8_decode($reg->ubigeo_propietario)
		
		));
}	




/*$pdf->Cell(20,4,$oc->empresa,'',0,'L');


$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(38,185,154);
$pdf->Cell(0,6,'SALIDA DE ALMACEN','',1,'R');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',8);

$pdf->Cell(15,6,'Fecha','',0,'L');
$pdf->Cell(20,6,$oc->fecha,'LTBR',1,'L');

$pdf->Cell(15,6,'Nro.','',0,'L');

$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,6,$oc->numero_documento,'LBR',1,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,6,'','',1,'L');
$pdf->SetFillColor(38,185,154);
$pdf->SetTextColor(255,255,255);

$pdf->SetDrawColor(128,128,128);
$pdf->Cell(122,6,'AREA Y USUARIO TRASLADA','LTR',0,'C',true);

$pdf->Cell(10,6,'','',1,'C',false);


$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);


$pdf->Cell(20,6,'Area','L',0,'L');
$pdf->Cell(102,6,': '.utf8_decode($oc->area_destino),'R',1,'L');


$pdf->Cell(20,6,'Usuario','LB',0,'L');
$pdf->Cell(102,6,': '.utf8_decode($oc->personal_traslado),'RB',1,'L');

$pdf->Cell(0,2,'','L',1,'L');


$pdf->SetFillColor(38,185,154);
$pdf->SetTextColor(255,255,255);


$pdf->Cell(145,6,'Descripcion','T',0,'C',true);
$pdf->Cell(15,6,'Lote','LT',0,'C',true);
$pdf->Cell(15,6,'Cant','LT',0,'C',true);
$pdf->Cell(35,6,'Und','T',1,'C',true);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

$pdf->SetWidths(array(145,15,15,35));
$pdf->SetAligns(array('L','L','R','L'));

$tot=0;
while ($reg=pg_fetch_object($rs)){	
	$pdf->Row(array(utf8_decode($reg->nombre),$reg->numero_lote,$reg->cantidad,$reg->unidad_medida_ingreso));
}	

$fil=$pdf->GetY();

$pdf->Cell(0,2,'','',1,'L',false);

$pdf->SetFillColor(38,185,154);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(100,6,'Observaciones','LTBR',1,'L',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

$pdf->MultiCell(100,6,utf8_decode($oc->observaciones),'LRTB','L',false);

$pdf->SetY($fil);
$pdf->SetX(161);*/


$pdf->Output();
?>
