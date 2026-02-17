<?php
//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');

include "cons.php";

/*
require "../vistas/vista_de_reportes_2.php";
include "../modelos/Ficha1_SanAlimentacion.php";
*/

$declaracion = new cons();

/*
$ali= new Ficha();
*/

 $mx = $_POST["responsable_mercado"];
 $año = $_POST["anioreporte"];
 $mes = $_POST["mesreporte"];

/*
$sql = " select   * from  ficha_1_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx' ";
*/
$sql =  " select   * from  ficha_1_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx'  AND  DATE_PART('YEAR', F.FECHA) = '$año' AND DATE_PART('MONTH', F.FECHA) = '$mes' ";
$sql2 = " select   * from  ficha_2_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx' AND DATE_PART('YEAR',F.FECHA ) = '$año' AND DATE_PART('MONTH' , F.FECHA) = '$mes' ";
$sql3 = " select   * from  ficha_3_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx'  AND DATE_PART('YEAR',F.FECHA) = '$año' AND DATE_PART('MONTH' , F.FECHA ) = '$mes' ";
$sql4 = " select   * from  ficha_4_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx' AND DATE_PART('YEAR',F.FECHA) = '$año' AND DATE_PART('MONTH' , F.FECHA ) = '$mes' ";
$sql5 = " select   * from  ficha_5_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx' AND DATE_PART('YEAR',F.FECHA ) = '$año' AND DATE_PART('MONTH' , F.FECHA ) = '$mes' ";
$sql6 = " select   * from  ficha_6_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado
where m.id='$mx' AND DATE_PART('YEAR' , F.FECHA ) = '$año' AND DATE_PART('MONTH' , F.FECHA ) = '$mes' ";
//require_once "../modelos/FichaVeterinaria.php";
class PDF extends PDF_MC_Table
{
     public $__currentY = 0;
	//Cabecera de página
	function Header()
	{
		$this->SetFont('Arial', 'B', 12);
		$this->SetDrawColor(128, 128, 128);
		$this->SetFillColor(155, 155, 155);
		$this->SetTextColor(255, 255, 255);
	}

	//Pie de página
	function Footer()
	{
	}
}
//$sal=new Ficha();
//$ficha=$sal->mostrar($_GET["id"]);
//$rs=$sal->detalleFicha($_GET["id"]);
//$fi=pg_fetch_all($ficha);

$pdf = new PDF('P', 'mm', 'A4');
//$pdf->SetLeftMargin(5);
$pdf->SetAutoPageBreak(true, 5);
$pdf->SetMargins(5, 3, 3);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(213, 219, 219);

include "modal_reporte1.php";
include "modal_reporte2.php";
include "modal_reporte3.php";
include "modal_reporte4.php";
include "modal_reporte5.php";
include "modal_reporte6.php";
$pdf->Output();
?>