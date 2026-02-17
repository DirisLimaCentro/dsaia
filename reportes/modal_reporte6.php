<?php


$pdf->SetAutoPageBreak(true, 5);
$pdf->SetMargins(5, 3, 3);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(213, 219, 219);

foreach ($declaracion->iniciar()->query($sql6) as $rows) {

	/*
   $ti='CONSOLIDADO DE LAS FICHAS DE EVALUACIONES SANITARIAS DE SERVICIOS 
		   DE ALIMENTACION EN ESTABLECIMIENTOS DE SALUD ( COMIDAS PREPARADAS )';
		   

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
	$pdf->Cell(100, 12, 'FORMATO 6 - JUGOS Y REFRESCOS', 'T', 0, 'C', false);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(50, 12, '', 'T', 1, 'C', false);







	$pdf->SetFont('Arial', 'B', 8);


	$pdf->Cell(50, 5, 'DIRIS : LIMA CENTRO ', 1, 0, 'C', true);

	$pdf->Cell(100, 5, 'EESS : ' . $rows['nombre'], 1, 0, 'L', true);

	$pdf->Cell(50, 5, 'RIS : ' . $rows['ris'], 1, 1, 'L', true);



	$pdf->Cell(50, 7, '', 'T', 0, 'C', false);

	$pdf->Cell(100, 7, '', 'T', 0, 'L', false);

	$pdf->Cell(50, 7, '', 'T', 1, 'L', false);




	$pdf->Cell(50, 5, 'NOMBRE DEL  MERCADO ', 1, 0, 'C', true);

	$pdf->Cell(50, 5, 'RAZON SOCIAL  ', 1, 0, 'C', true);

	$pdf->Cell(50, 5, utf8_decode('N° PUESTO'), 1, 0, 'C', true);

	$pdf->Cell(50, 5, 'TIPO DE ALIMENTOS ', 1, 1, 'C', true);





	$pdf->Cell(50, 5, $rows['nombre_mercado'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['razon_s'], 1, 0, 'C', false);



	$pdf->Cell(50, 5, $rows['numero_puesto'], 1, 0, 'C', false);
	$pdf->Cell(50, 5, $rows['tipos_alimentos'], 1, 1, 'C', false);





	$pdf->Cell(50, 5, 'NOMBRE DEL INSPECTOR ', 1, 0, 'C', true);
	$pdf->Cell(50, 5, 'NOMBRE DEL VENDEDOR   ', 1, 0, 'C', true);
	$pdf->Cell(50, 5, ' DIRECCION  ', 1, 0, 'C', true);
	$pdf->Cell(50, 5, 'PROVEEDOR  ', 1, 1, 'C', true);




	$pdf->Cell(50, 5, $rows['n_inspector'], 1, 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_vendedor'], 1, 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_direccion'], 1, 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_proveedores'], 1, 1, 'C', false);


	$pdf->Cell(200, 5, 'CALIFICACION', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '1.ALIMENTO', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '1.1 Aspecto normal de los insumos', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_1'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('1.2 Agua segura (0,05 ppm) para preparar (*)'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_2'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, '1.3 Hielo de agua segura para bebidas (*)
', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_3'], 1, 1, 'C', false);





	$pdf->Cell(170, 5, 'TOTAL  ', 1, 0, 'L', true);
	$pdf->Cell(30, 5, $rows['total_puntaje1'], 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '2.BUENAS PRACTICAS DE MANIPULACION ( BPM )', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, utf8_decode('2.1 Aplica temperatura de frío en la conservación (5 °C o menos) '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_1'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('2.2 Protege alimentos exhibidos '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_2'], 'LR', 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('2.3 No prueba los alimentos con los utensilios de preparacion  '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_3'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('2.4 Usa agua segura (0,5 ppm)'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_4'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('2.5 Lava y desinfecta equipos, utensilios, superficies y secadores'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_5'], 1, 1, 'C', false);




	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(130, 5, utf8_decode('2.6 Sirve en vasos en buen estado, limpios y desinfectados o en vasos descartables de primer uso'), 1, 0, 'B', false);
	$pdf->SetFont('Arial', 'B', 8);

	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_6'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('2.7 Seca utensilios por escurrimiento o con secador limpio'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_7'], 1, 1, 'C', false);



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
 ', 'LFT', 0, 'B', false);
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




	$pdf->Cell(130, 5, '4.AMBIENTES Y ENSERES', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '4.1 Exterior e interior del puesto limpio y ordenado
 ', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_1'], 'LR', 1, 'C', false);

	$pdf->Cell(130, 5, '4.2 Superficie para cortar en buen estado y limpia', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_2'], 1, 1, 'C', false);

	$pdf->Cell(130, 5, utf8_decode('4.3 Utensilios en buen estado y limpios'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_3'], 1, 1, 'C', false);

	$pdf->Cell(130, 5, utf8_decode('4.4 Mostrador de exhibición en buen estado y limpio '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_4'], 1, 1, 'C', false);



	$pdf->Cell(
		130,
		5,
		utf8_decode('4.5 Paños, secadores limpios y desinfectados')
		,
		1,
		0,
		'B',
		false
	);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_5'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('4.6 Basura bien dispuesta (tacho c/bolsa interior y tapa)'), 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_6'], 'LR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('4.7 Desagüe con sumidero, rejilla y trampa en buena 
condición '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_7'], 1, 1, 'C', false);




	$pdf->Cell(130, 4, utf8_decode('4.8 Ausencia de vectores, roedores u otros 
animales, o signos '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 4, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, '', 'LR', 1, 'C', false);
	$pdf->Cell(130, 4, utf8_decode(' de su presencia (excrementos u otros) '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 4, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 4, $rows['iiii_8'], 'LR', 1, 'C', false);



	$pdf->Cell(130, 4, utf8_decode('4.9 Guarda el material de limpieza y desinfección '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 4, '', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 4, '', 'TLR', 1, 'C', false);
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






	$pdf->Cell(130, 5, '5.0 CALIFICACION DEL PUESTO', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(170, 5, '5.1 PUNTAJE TOTAL ', 1, 0, 'B', TRUE);
	$pdf->Cell(30, 5, $rows['total_puntaje5'], 1, 1, 'B', false);




	$pdf->Cell(170, 5, 'ESTADO ', 1, 0, 'B', TRUE);
	$pdf->Cell(30, 5, $rows['total_puntaje6'], 1, 1, 'B', false);


	$pdf->SetFont('Arial', 'B', 7);

	$pdf->Cell(80, 5, '', 'LTR', 0, 'B', TRUE);
	$pdf->Cell(60, 5, utf8_decode('Puntaje y porcentaje'), 1, 0, 'B', TRUE);
	$pdf->Cell(60, 5, utf8_decode('Calificacion'), 1, 1, 'B', TRUE);



	$pdf->Cell(80, 5, '', 'LR', 0, 'B', TRUE);
	$pdf->Cell(60, 5, utf8_decode('69 puntos a más (75% a 100%) '), 1, 0, 'B', false);
	$pdf->Cell(60, 5, utf8_decode('Aceptable'), 1, 1, 'B', FALSE);




	$pdf->Cell(80, 4, ' REFERENCIA ', 'LR', 0, 'B', TRUE);
	$pdf->Cell(60, 4, '45 puntos a 68 puntos (50% a 75%) ', 1, 0, 'B', FALSE);
	$pdf->Cell(60, 4, utf8_decode('Regular'), 1, 1, 'B', FALSE);



	$pdf->Cell(80, 4, '', 'LBR', 0, 'B', TRUE);

	$pdf->Cell(60, 4, '0 a 45 puntos (menos del 50%)', 1, 0, 'B', false);
	$pdf->Cell(60, 4, utf8_decode('No aceptable'), 1, 1, 'B', FALSE);

	$pdf->Cell(200, 4, utf8_decode('(*) Criterios de evaluación excluyentes, es decir que su desaprobación se traduce en un a calificación de "no aceptable" (color rojo)
'), 0, 1, 'B', FALSE);

	$pdf->Cell(200, 4, utf8_decode('(**) El valor del puntaje es binario: si cumple el requisito se otorga el total; en
 caso contrario el puntaje es cero.
'), 0, 1, 'B', FALSE);





}