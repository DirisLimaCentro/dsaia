<?php


$pdf->SetAutoPageBreak(true, 5);
$pdf->SetMargins(5, 3, 3);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(213, 219, 219);

foreach ($declaracion->iniciar()->query($sql3) as $rows) {


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
	$pdf->Cell(100, 12, 'FORMATO 3 - FRUTAS Y HORTALIZAS', 'T', 0, 'C', false);
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
	$pdf->Cell(50, 5, 'NOMBRE 

DEL VENDEDOR   ', 'LTR', 0, 'C', true);
	$pdf->Cell(50, 5, ' DIRECCION  ', 'LTR', 0, 'C', true);
	$pdf->Cell(50, 5, 'PROVEEDOR  ', 'LTR', 1, 'C', true);




	$pdf->Cell(50, 5, $rows['n_inspector'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_vendedor'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_direccion'], 'LTR', 0, 'C', false);
	$pdf->Cell(50, 5, $rows['n_proveedores'], 'LTR', 1, 'C', false);


	$pdf->Cell(200, 5, 'CALIFICACION', 'LTR', 1, 'C', TRUE);



	$pdf->Cell(130, 5, 'I.ALIMENTO', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '1.1 Procedencia formal ', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_1'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('1.2 Aspecto normal de frutas y hortalizas, y  '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode('sin parásitos (huevo-gusanos)'), 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_2'], 'LR', 1, 'C', false);









	$pdf->Cell(130, 5, '1.3 No vende frutas y hortalizas picadas', 'LTR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=2', 'LTR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['i_3'], 'LTR', 1, 'C', false);







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



	$pdf->Cell(130, 5, 'II.BUENAS PRACTICAS DE MANIPULACION ( BPM )', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);







	$pdf->Cell(130, 5, utf8_decode('2.1 Estiba a una altura mínima de 0,20 m del piso '), 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);


	$pdf->Cell(130, 5, ' (cama de hielo ) (*).', 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_1'], 'LR', 1, 'C', false);







	$pdf->Cell(130, 5, utf8_decode('2.2 Usa agua segura (0,5 ppm) y fría para refrescar'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_2'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('2.3 Exhibe ordenadamente y por separado en recipientes de fácil limpieza'), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_3'], 1, 1, 'C', false);





	$pdf->Cell(130, 5, utf8_decode('2.4 Despacha en bolsas plásticas transparentes o blancas, 

'), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('
o de papel de primer uso'), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=2', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['ii_4'], 'LR', 1, 'C', false);






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



	$pdf->Cell(130, 5, 'III.VENDEDOR', 1, 0, 'B', TRUE);
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



	$pdf->Cell(130, 5, 'IIII.AMBIENTES Y ENSERES', 1, 0, 'B', TRUE);
	$pdf->Cell(40, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(30, 5, 'VALOR', 1, 1, 'C', TRUE);



	$pdf->Cell(130, 5, '4.1 Puesto ubicado en zona segun rubro y 
sin riesgo de
 ', 'LTR', 0, 'B', false);
	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);




	$pdf->Cell(130, 5, '     contaminacion cruzada .
 ', 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_1'], 'LR', 1, 'C', false);




	$pdf->Cell(130, 5, '4.2 Exterior e interior del puesto limpio y ordenado
 (sin jabas )', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_2'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('4.3 Parihuelas para estiba en buen estado y limpias '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_3'], 1, 1, 'C', false);

	$pdf->Cell(130, 5, '4.4 Equipos y utensilios en buen estado y limpio . ', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_4'], 1, 1, 'C', false);


	$pdf->Cell(130, 5, '4.5 Basura bien dispuesta (tacho c/bolsa interior y tapa) ', 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_5'], 1, 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('4.6 Ausencia de vectores, roedores u otros animales, 
o signos  '), 'LR', 0, 'B', false);

	$pdf->Cell(40, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, '', 'LR', 1, 'C', false);


	$pdf->Cell(130, 5, utf8_decode(' su presencia (excrementos u otros) '), 'LR', 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_6'], 'LR', 1, 'C', false);



	$pdf->Cell(130, 5, utf8_decode('4.7 Guarda el material de limpieza y desinfección separados de alimentos '), 1, 0, 'B', false);
	$pdf->Cell(40, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(30, 5, $rows['iiii_7'], 1, 1, 'C', false);



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



	$pdf->Cell(80, 5, '', 'LTR', 0, 'B', TRUE);
	$pdf->Cell(60, 5, utf8_decode('Puntaje y porcentaje'), 1, 0, 'B', TRUE);
	$pdf->Cell(60, 5, utf8_decode('Calificacion'), 1, 1, 'B', TRUE);



	$pdf->Cell(80, 5, '', 'LR', 0, 'B', TRUE);
	$pdf->Cell(60, 5, utf8_decode('52 puntos a más (75% a 100%) '), 1, 0, 'B', false);
	$pdf->Cell(60, 5, utf8_decode('Aceptable'), 1, 1, 'B', FALSE);




	$pdf->Cell(80, 5, ' REFERENCIA ', 'LR', 0, 'B', TRUE);
	$pdf->Cell(60, 5, '34 puntos a 51 puntos (50% a 75%) ', 1, 0, 'B', FALSE);
	$pdf->Cell(60, 5, utf8_decode('Regular'), 1, 1, 'B', FALSE);



	$pdf->Cell(80, 5, '', 'LBR', 0, 'B', TRUE);

	$pdf->Cell(60, 5, '0 a 34 puntos (menos del 50%)', 1, 0, 'B', false);
	$pdf->Cell(60, 5, utf8_decode('No aceptable'), 1, 1, 'B', FALSE);

	$pdf->Cell(200, 5, utf8_decode('(*) Criterios de evaluación excluyentes, es decir que su desaprobación se traduce en un a calificación de "no aceptable" (color rojo)
'), 0, 1, 'B', FALSE);

	$pdf->Cell(200, 5, utf8_decode('(**) El valor del puntaje es binario: si cumple el requisito se otorga el total; en
 caso contrario el puntaje es cero.
'), 0, 1, 'B', FALSE);



}
