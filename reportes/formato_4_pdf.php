<?php
//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');

include "cons.php";


$declaracion = new cons();



$mx = $_GET['id'];


$sql = " select  m.nombre_mercado , * from  ficha_4_mercado  as f
INNER JOIN locales as l on l.id=f.id_local
inner join lista_mercados m on m.id=f.responsable_mercado

where f.id=$mx";











//require_once "../modelos/FichaVeterinaria.php";

class PDF extends PDF_MC_Table
{
	public $__currentY = 0;
	//Cabecera de página
	function Header()
	{




		$this->SetFont('Arial', 'B', 10);
		/*	
					 $ti='CONSOLIDADO DE LAS FICHAS DE EVALUACIONES SANITARIAS DE SERVICIOS 
					 DE ALIMENTACION EN ESTABLECIMIENTOS DE SALUD ( ALIMENTOS PROCESADOS , ENVASADOS Y A GRANEL  )';
					 

				 $this->MultiCell(200,7,utf8_decode($ti),'LRTB','C',false);

					 */

		$this->SetDrawColor(128, 128, 128);

		$this->SetFillColor(164, 164, 164);

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



//$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(true, 4);
$pdf->SetMargins(3, 3, 3);
$pdf->AliasNbPages();
$pdf->AddPage();




$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFillColor(213, 219, 219);

foreach ($declaracion->iniciar()->query($sql) as $rows) {






	/*

	   $ti='CONSOLIDADO DE LAS FICHAS DE EVALUACIONES SANITARIAS DE SERVICIOS 
			   DE ALIMENTACION EN ESTABLECIMIENTOS DE SALUD ( ALIMENTOS PROCESADOS ,
				ENVASADOS Y A GRANEL  )';
			   

		   $pdf->MultiCell(200,7,utf8_decode($ti),'LRTB','C',false);

	   */



	$pdf->Image('logo.png', 6, 4, 48, 17);
	$pdf->Cell(50, 10, '', 'LTR', 0, 'C', false);
	$pdf->Cell(100, 10, 'FICHA DE VIGILANCIA SANITARIA 
	', 'LTR', 0, 'C', true);


	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 10, utf8_decode('CÓDIGO:DSAIA-OVISA-FORM
	'), 'LTR', 1, 'C', true);




	$pdf->SetFont('Arial', 'B', 10);



	$pdf->Cell(50, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(100, 5, '
	EN MERCADOS DE ABASTO', 'LR', 0, 'C', true);


	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 5, 'Fecha: 01/10/2017', 'LR', 1, 'C', true);



	$pdf->Cell(50, 3, '', 'LBR', 0, 'C', false);
	$pdf->Cell(100, 3, '
	', 'LBR', 0, 'C', true);



	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 3, 'VERSION : 01 ', 'LBR', 1, 'C', true);



	$pdf->Cell(50, 12, '', 'T', 0, 'C', false);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(100, 12, 'FORMATO 4 - ALIMENTOS PROCESADOS , ENVASADOS Y A GRANEL', 'T', 0, 'C', false);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(50, 12, '', 'T', 1, 'C', false);







	$pdf->SetFont('Arial', 'B', 8);


	$pdf->Cell(50, 5, 'DIRIS : LIMA CENTRO ', 1, 0, 'C', true);

	$pdf->Cell(100, 5, 'EESS : ' . $rows['nombre'], 1, 0, 'L', true);

	$pdf->Cell(50, 5, 'RIS : ' . $rows['ris'], 1, 1, 'L', true);



	$pdf->Cell(50, 7, '', 'T', 0, 'C', false);

	$pdf->Cell(100, 7, '', 'T', 0, 'L', false);

	$pdf->Cell(50, 7, '', 'T', 1, 'L', false);






	$pdf->Cell(50, 5, 'NOMBRE DEL  MERCADO ', 'LTR', 0, 'C', true);

	$pdf->Cell(50, 5, 'RAZON SOCIAL  ', 'LTR', 0, 'C', true);

	$pdf->Cell(50, 5, utf8_decode('N° PUESTO'), 'LTR', 0, 'C', true);

	$pdf->Cell(50, 5, 'TIPO DE ALIMENTOS ', 'LTR', 1, 'C', true);





	$pdf->Cell(50, 5, $rows['nombre_mercado'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['razon_s'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['numero_puesto'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['tipos_alimentos'], 'LTR', 1, 'C', false);





	$pdf->Cell(50, 5, 'NOMBRE DEL INSPECTOR ', 'LTR', 0, 'C', true);
	$pdf->Cell(50, 5, 'NOMBRE DEL VENDEDOR   ', 'LTR', 0, 'C', true);
	$pdf->Cell(50, 5, ' DIRECCION  ', 'LTR', 0, 'C', true);
	$pdf->Cell(50, 5, 'PROVEEDOR  ', 'LTR', 1, 'C', true);




	$pdf->Cell(50, 5, $rows['n_inspector'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_vendedor'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_direccion'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_proveedores'], 'LTR', 1, 'C', false);


	$pdf->Cell(200, 5, 'CALIFICACION', 'LTR', 1, 'C', TRUE);



	$pdf->Cell(130, 5, '1.ALIMENTO', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '1.1 Productos industrializados con registro sanitario y fecha vigente (*)', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_1'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('1.2 Aspecto normal de envasados (enlatados y embolsados)'), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_2'], 'LR', 1, 'C', false);





	$pdf->Cell(130, 5, '1.3 Aspecto normal de alimentos a 
granel secos (menestras, cereales, 
', 'LTR', 0, 'B', false);

	$pdf->Cell(40, 5, '', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LTR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('condimentos,  etc.) y ausencia de insectos parásitos'), 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_3'], 'LR', 1, 'C', false);




	$pdf->Cell(130, 5, '1.4 Aspecto normal de salsas, aderezos, etc', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_4'], 1, 1, 'C', false);




	$pdf->Cell(
		170,
		5,
		'TOTAL  ',
		1,
		0,
		'L',
		true
	);
	$pdf->Cell(30, 5, $rows['total_puntaje1'], 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '2.BUENAS PRACTICAS DE MANIPULACION ( BPM )', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, utf8_decode('2.1 Aplica frío (5 °C o menos) en conservación de embutidos y lácteos (*) '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_1'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('2.2 Aplica temperatura de frío (5° C o menos) en la conservación '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('de salsas, aderezos, etc.'), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_2'], 'LR', 1, 'C', false);





	$pdf->Cell(130, 5, utf8_decode('2.3 Exhibe ordenadamente, separado por producto '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LTR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode(' en recipientes de fácil limpieza'), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_3'], 'LR', 1, 'C', false);





	$pdf->Cell(130, 5, utf8_decode('2.4 Despacha según sea aplicable,
 en bolsas plásticas transparentes '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LTR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode(' blancas,
 papel poligrasa '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=2', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_4'], 'LR', 1, 'C', false);




	$pdf->Cell(130, 5, utf8_decode('2.5 Desinfecta utensilios, superficies, paños y equipos'), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_5'], 'LTR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('2.6 Realiza rotación de stock'), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_6'], 'LTR', 1, 'C', false);





	$pdf->Cell(
		170,
		5,
		'TOTAL  ',
		1,
		0,
		'L',
		true
	);
	$pdf->Cell(30, 5, $rows['total_puntaje2'], 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '3.VENDEDOR', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);






	$pdf->Cell(130, 5, '3.1 Sin episodio actual de enfermedad y sin heridas ni infecciones en piel 
 ', 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);


	$pdf->Cell(130, 5, ' y mucosas', 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iii_1'], 'LR', 1, 'C', false);




	$pdf->Cell(130, 5, utf8_decode('3.2 Manos limpias y sin joyas, con uñas cortas, limpias y sin esmalte'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iii_2'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, '3.3 Cabello corto o recogido , 
sin maquillaje facial .', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=2', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iii_3'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, '3.4 Uniforme completo , limpio , y
 de color claro .', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=2', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iii_4'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, '3.5 Aplica capacitaciones en BPM', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iii_5'], 1, 1, 'C', false);



	$pdf->Cell(
		170,
		5,
		'TOTAL  ',
		1,
		0,
		'L',
		true
	);
	$pdf->Cell(30, 5, $rows['total_puntaje3'], 1, 1, 'C', TRUE);




	$pdf->Cell(130, 4, '4.AMBIENTES Y ENSERES', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 4, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 4, 'VALOR', 1, 1, 'C', TRUE);








	$pdf->Cell(130, 4, '4.1 Exterior e interior del puesto limpio y ordenado
 ', 'LTR', 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_1'], 'LR', 1, 'C', false);



	$pdf->Cell(130, 4, '4.2 Superficie para cortar en buen estado y limpia', 1, 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_2'], 1, 1, 'C', false);


	$pdf->Cell(130, 4, utf8_decode('4.3 Equipos y utensilios en buen estado y limpios'), 1, 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_3'], 1, 1, 'C', false);


	$pdf->Cell(130, 4, utf8_decode('4.4 Mostrador de exhibición en buen estado y limpio '), 1, 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_4'], 1, 1, 'C', false);



	$pdf->Cell(
		130,
		4,
		utf8_decode('4.5 Paños, secadores en buen estado y limpios')
		,
		1,
		0,
		'B',
		false
	);
	$pdf->Cell(40, 4, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_5'], 1, 1, 'C', false);



	$pdf->Cell(130, 4, utf8_decode('4.6 Basura bien dispuesta (tacho c/bolsa interior y tapa)'), 'LR', 0, 'B', false);

	$pdf->Cell(40, 4, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, '', 'LR', 1, 'C', false);


	$pdf->Cell(130, 4, utf8_decode(' su presencia (excrementos u otros) '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_6'], 'LR', 1, 'C', false);



	$pdf->Cell(130, 4, utf8_decode('4.7 Desagüe con sumidero, rejilla y trampa en buena 
condición '), 1, 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_7'], 1, 1, 'C', false);




	$pdf->Cell(130, 4, utf8_decode('4.8 Ausencia de vectores, roedores u otros 
animales, o signos '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 4, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, '', 'LR', 1, 'C', false);
	$pdf->Cell(130, 4, utf8_decode(' de su presencia (excrementos u otros) '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_8'], 'LR', 1, 'C', false);



	$pdf->Cell(130, 4, utf8_decode('4.9 Guarda el material de limpieza y desinfección '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 4, '', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 4, '', 'LTR', 1, 'C', false);
	$pdf->Cell(130, 4, utf8_decode(' separados de los alimentos '), 'LRB', 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 'LRB', 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_9'], 'LRB', 1, 'C', false);




	$pdf->Cell(
		170,
		5,
		'TOTAL ',
		1,
		0,
		'L',
		true
	);
	$pdf->Cell(30, 5, $rows['total_puntaje4'], 1, 1, 'C', TRUE);



	$pdf->Cell(130, 4, '5.0 CALIFICACION DEL PUESTO', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 4, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 4, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(170, 4, '5.1 PUNTAJE TOTAL ', 1, 0, 'B', TRUE);
	$pdf->Cell(30, 4, $rows['total_puntaje5'], 1, 1, 'B', false);




	$pdf->Cell(170, 4, 'ESTADO ', 1, 0, 'B', TRUE);
	$pdf->Cell(30, 4, $rows['total_puntaje6'], 1, 1, 'B', false);




	$pdf->Cell(80, 4, '', 'LTR', 0, 'B', TRUE);
	$pdf->Cell(60, 4, utf8_decode('Puntaje y porcentaje'), 1, 0, 'B', TRUE);
	$pdf->Cell(60, 4, utf8_decode('Calificacion'), 1, 1, 'B', TRUE);



	$pdf->Cell(80, 4, '', 'LR', 0, 'B', TRUE);
	$pdf->Cell(60, 4, utf8_decode('68 puntos a más (75% a 100%) '), 1, 0, 'B', false);
	$pdf->Cell(60, 4, utf8_decode('Aceptable'), 1, 1, 'B', FALSE);




	$pdf->Cell(80, 4, ' REFERENCIA ', 'LR', 0, 'B', TRUE);
	$pdf->Cell(60, 4, '45 puntos a 67 puntos (50% a 75%) ', 1, 0, 'B', FALSE);
	$pdf->Cell(60, 4, utf8_decode('Regular'), 1, 1, 'B', FALSE);



	$pdf->Cell(80, 4, '', 'LBR', 0, 'B', TRUE);

	$pdf->Cell(60, 4, '0 a 44 puntos (menos del 50%)', 1, 0, 'B', false);
	$pdf->Cell(60, 4, utf8_decode('No aceptable'), 1, 1, 'B', FALSE);

	$pdf->Cell(200, 4, utf8_decode('(*) Criterios de evaluación excluyentes, es decir que su desaprobación se traduce en un a calificación de "no aceptable" (color rojo)
'), 0, 1, 'B', FALSE);

	$pdf->Cell(200, 4, utf8_decode('(**) El valor del puntaje es binario: si cumple el requisito se otorga el total; en
 caso contrario el puntaje es cero.
'), 0, 1, 'B', FALSE);



}


/*
$pdf->Cell(200,5,'F','LTR',1,'C',TRUE);
*/


$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('Arial', 'B', 9);
//$pdf->Cell(290,5,'RESOLUCION ADMINISTRATIVA N '.$fi[0]['resolucion_numero'].' - '.$fi[0]['resolucion_anio'].' DESAIA/DIRIS-LC','LTR',1,'C');

/*
$pdf->SetFont('Arial','',8);
$pdf->Cell(20,5,'RUC:','LT',0,'L');
//$pdf->Cell(270,5,$fi[0]['ruc'],'LTR',1,'L');

$pdf->Cell(40,5,'Nombre o Razon Social:','LTB',0,'L');
//$pdf->Cell(250,5,utf8_decode($fi[0]['empresa']),'LTBR',1,'L');

$pdf->Cell(40,5,'Nombre Comercial:','LTB',0,'L');
//$pdf->Cell(250,5,strtoupper($fi[0]['nombre_comercial']),'LTBR',1,'L');

$pdf->Cell(40,5,'Direccion:','LTB',0,'L');
//$pdf->Cell(250,5,strtoupper(utf8_decode($fi[0]['direccion_empresa'])),'LTBR',1,'L');

$pdf->Cell(40,5,'Distrito:','LTB',0,'L');
//$pdf->Cell(160,5,strtoupper($fi[0]['ubigeo_empresa']),'LTBR',0,'L');
$pdf->Cell(40,5,'Telefono y/o Celular:','LTB',0,'L');
//$pdf->Cell(50,5,strtoupper($fi[0]['telefono_empresa']),'LTBR',1,'L');


$pdf->Cell(40,5,utf8_decode('Correo electrónico:'),'LTB',0,'L');
//$pdf->Cell(250,5,strtoupper($fi[0]['correo_empresa']),'LTBR',1,'L');

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor( 213, 219, 219 );
$pdf->Cell(290,5,'DATOS DEL PERSONAL MEDICO VETERINARIO QUE LABORA EN EL ESTABLECIMIENTO','LTR',1,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);

$pdf->Cell(40,5,'DNI(  ) - C.E(  ):','LTB',0,'L');
//$pdf->Cell(40,5,strtoupper($fi[0]['numero_documento']),'LTBR',0,'L');
$pdf->Cell(40,5,'Nombres y Apellidos:','LTB',0,'L');
//$pdf->Cell(170,5,utf8_decode($fi[0]['nombres'].' '.$fi[0]['ape_materno'].' '.$fi[0]['ape_paterno']),'LTBR',1,'L');


$pdf->Cell(40,5,'Direccion:','LTB',0,'L');
//$pdf->Cell(160,5,utf8_decode($fi[0]['direccion']),'LTBR',0,'L');
$pdf->Cell(40,5,'Distrito:','LTB',0,'L');
//$pdf->Cell(50,5,utf8_decode($fi[0]['ubigeo_persona']),'LTBR',1,'L');


$pdf->Cell(40,5,utf8_decode('N° CMVP:'),'LTB',0,'L');
//$pdf->Cell(40,5,strtoupper($fi[0]['cmvp']),'LTBR',0,'L');
$pdf->Cell(40,5,'Telefono y/o Celular:','LTB',0,'L');
//$pdf->Cell(170,5,utf8_decode($fi[0]['telefono']),'LTBR',1,'L');



$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor( 213, 219, 219 );
$pdf->Cell(290,5,'DATOS SOBRE LAS ACTIVIDADES PREVENTIVAS DE LA RABIA','LTR',1,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);


$pdf->Cell(10,5,'','LT',0,'C');
$pdf->Cell(30,5,'','LT',0,'C');
$pdf->Cell(210,5,utf8_decode('Vacunación Antirrábica Canina'),'LT',0,'C');
$pdf->Cell(40,5,'','LTR',1,'C');


$pdf->Cell(10,5,'','L',0,'C');
$pdf->Cell(30,5,'','L',0,'C');
$pdf->Cell(105,5,utf8_decode('Vacunación antirrábica INS/otro Laboratorio'),'LT',0,'C');
$pdf->Cell(105,5,utf8_decode('Vacuna Tipo sextuple (que incluya Rabia)'),'LT',0,'C');
$pdf->Cell(40,5,'','LR',1,'C');

$pdf->Cell(10,5,utf8_decode('N°'),'L',0,'C');
$pdf->Cell(30,5,'Mes de Reporte','L',0,'C');
$pdf->Cell(52,5,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(53,5,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(52,5,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(53,5,utf8_decode('Primovacunado'),'LT',0,'C');
$pdf->Cell(40,5,'Distrito','LR',1,'C');


$pdf->Cell(10,5,'','L',0,'C');
$pdf->Cell(30,5,'','L',0,'C');
$pdf->Cell(26,5,utf8_decode('menor 1 año'),'LT',1,'C');
$pdf->Cell(26,5,utf8_decode('menor 1 año'),'LT',1,'C');
$pdf->Cell(26,5,utf8_decode('menor 1 año'),'LT',1,'C');
$pdf->Cell(27,5,utf8_decode('mayor 1 año'),'LT',1,'C');
$pdf->Cell(26,5,utf8_decode('menor 1 año'),'LT',1,'C');
$pdf->Cell(26,5,utf8_decode('mayor 1 año'),'LT',1,'C');
$pdf->Cell(26,5,utf8_decode('menor 1 año'),'LT',1,'C');
$pdf->Cell(27,5,utf8_decode('mayor 1 año'),'LT',1,'C');
$pdf->Cell(40,5,'','LR',1,'C');


$pdf->Cell(10,5,'1','LT',0,'C');
/* $pdf->Cell(30,5,utf8_decode($fi[0]['name_mes']),'LT',0,'C');
$pdf->Cell(26,5,$fi[0]['vac_ant_pri_men_1'],'LT',0,'C');
$pdf->Cell(26,5,$fi[0]['vac_ant_pri_may_1'],'LT',0,'C');
$pdf->Cell(26,5,$fi[0]['vac_ant_rev_men_1'],'LT',0,'C');
$pdf->Cell(27,5,$fi[0]['vac_ant_rev_may_1'],'LT',0,'C');
$pdf->Cell(26,5,$fi[0]['vac_sex_pri_men_1'],'LT',0,'C');
$pdf->Cell(26,5,$fi[0]['vac_sex_pri_may_1'],'LT',0,'C');
$pdf->Cell(26,5,$fi[0]['vac_sex_rev_men_1'],'LT',0,'C');
$pdf->Cell(27,5,$fi[0]['vac_sex_rev_may_1'],'LT',0,'C');
$pdf->Cell(40,5,utf8_decode($fi[0]['ubigeo_ficha']),'LTR',1,'C');


$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor( 213, 219, 219 );
$pdf->Cell(290,5,'NOTIFICACION DE MUESTRAS','LTR',1,'C',true);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);

/*
$pdf->Cell(100,5,'DATOS DE LA MASCOTA','LT',0,'C');
$pdf->Cell(190,5,'DATOS DEL PROPIETARIO','LTR',1,'C');

$pdf->Cell(10,5,utf8_decode('N°'),'LTB',0,'C');
$pdf->Cell(20,5,'Especie','LTB',0,'C');
$pdf->Cell(30,5,'Nombre','LTB',0,'C');
$pdf->Cell(20,5,'Sexo','LTB',0,'C');
$pdf->Cell(20,5,'Edad','LTB',0,'C');

$pdf->Cell(80,5,'Nombre y Apellido del propietario','LTB',0,'C');
$pdf->Cell(50,5,'Telefono y/o Celular','LTB',0,'C');
$pdf->Cell(60,5,'Distrito','LTB',1,'C');
*/


$pdf->SetWidths(array(10, 20, 30, 20, 20, 80, 50, 60));
$j = 0;



/*
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
*/


$pdf->Output();
?>