<?php

foreach ($declaracion->iniciar()->query($sql) as $rows) {

	
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
	$pdf->Cell(100, 12, 'FORMATO 1 - CARNES Y MENUDENCIAS DE ANIMALES DE ABASTO', 'T', 0, 'C', false);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(50, 12, '', 'T', 1, 'C', false);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(50, 5, 'DIRIS : LIMA CENTRO ', 1, 0, 'C', true);
	$pdf->Cell(100, 5, 'EESS : ' . $rows['nombre'], 1, 0, 'L', true);
	$pdf->Cell(50, 5, 'RIS : ' . $rows['ris'], 1, 1, 'L', true);
	$pdf->Cell(50, 9, '', 'T', 0, 'C', false);
	$pdf->Cell(100, 9, '', 'T', 0, 'L', false);
	$pdf->Cell(50, 9, '', 'T', 1, 'L', false);
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
	$pdf->Cell(50, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(20, 5, 'VALOR', 1, 1, 'C', TRUE);
	$pdf->Cell(130, 5, '1.1 Procedencia formal y No beneficia al puesto (*)', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['i_1'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '1.2 Aspecto normal de carcasas o visceras y
     ', 'LTR', 0, 'B', false);
	$pdf->Cell(50, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, '', 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, '     ausencia de parasitos ( quistes , larvas )
    ', 'LR', 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, $rows['i_2'], 'LR', 1, 'C', false);
    $pdf->Cell(130,5,'1.3 Carnes y menudencias identificadas por especie',1,0,'B',false
	);
	$pdf->Cell(50, 5, 'SI=2', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['i_3'], 1, 1, 'C', false);
    $pdf->Cell(180,5,'TOTAL DE PUNTAJE 1  ',1,0,'L',true);
	$pdf->Cell(20, 5, $rows['total_puntaje1'], 1, 1, 'C', TRUE);
    $pdf->Cell(130, 5, '2.BUENAS PRACTICAS DE MANIPULACION ( BPM )', 1, 0, 'B', TRUE);
	$pdf->Cell(50, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(20, 5, 'VALOR', 1, 1, 'C', TRUE);
    $pdf->Cell(130, 5, utf8_decode('2.1 Aplica temperatura de frio ( 5°C a -18° C )
    en la conservacion  (*).'), 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['ii_1'], 1, 1, 'C', false);
    $pdf->Cell(130, 5, '2.2 Escribe en bandejas de material sarvitario y de
     facil limpieza', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['ii_2'], 1, 1, 'C', false);
    $pdf->Cell(130, 5, '2.3 Usa agua segura (0,5 ppm ) y fria (*)', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['ii_3'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, utf8_decode('2.4 Desinfecta utensilios , superficies , 
     paños y equipos .'), 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['ii_4'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '2.5 Despacha en bolsas plasticas transparentes o
    blancas de primer uso .', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=2', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['ii_5'], 1, 1, 'C', false);
    $pdf->Cell(180,5,'TOTAL DE PUNTAJE 2 ', 1 ,0,'L',TRUE);
	$pdf->Cell(20, 5, $rows['total_puntaje2'], 1, 1, 'C', TRUE);
    $pdf->Cell(130, 5, '3.VENDEDOR', 1, 0, 'B', TRUE);
	$pdf->Cell(50, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(20, 5, 'VALOR', 1, 1, 'C', TRUE);
	$pdf->Cell(130, 5, '3.1 Sin episodio actual de enfermedad y sin heridas ni infecciones en piel
    ', 'LTR', 0, 'B', false);
	$pdf->Cell(50, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, '', 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, ' y mucosas', 'LR', 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iii_1'], 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, utf8_decode('3.2 Manos limpias y sin joyas , con uñas cortas ,
    limpias y sin esmaltes .'), 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iii_2'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '3.3 Cabello corto o recogido , 
    sin maquillaje facial .', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=2', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iii_3'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '3.4 Uniforme completo , limpio y
    de color claro .', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=2', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iii_4'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '3.5 Aplica capacitaciones en BPM', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iii_5'], 1, 1, 'C', false);
	$pdf->Cell(180, 5, 'TOTAL DE PUNTAJE 3 ', 1, 0, 'L', true);
	$pdf->Cell(20, 5, $rows['total_puntaje3'], 1, 1, 'C', TRUE);
	$pdf->Cell(130, 5, '4.AMBIENTES Y ENSERES', 1, 0, 'B', TRUE);
	$pdf->Cell(50, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(20, 5, 'VALOR', 1, 1, 'C', TRUE);
	$pdf->Cell(130, 5, '4.1 Puesto ubicado en zona segun rubro y 
    sin riesgo de ', 'LTR', 0, 'B', false);
	$pdf->Cell(50, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, '', 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, '     contaminacion cruzada .
    ', 'LR', 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_1'], 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, '4.2 Exterior e interior del puesto limpio y ordenado
    (sin jabas )', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_2'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '4.3 Superficie para cortar en buen estado y limpia . ', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_3'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '4.4 Equipos y utensilios en buen estado y limpio . ', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_4'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '4.5 Mostrador de exhibicion en buen estado y limpios . ', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_5'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, utf8_decode('4.6 Paños y secadores en buen estado y limpios . '), 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_6'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '4.7 Basura bien dispuesta ( tacho c/bolsa interior y tapa ) ', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_7'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '4.8 Desague con sumidero , rejilla y 
    trampa en buena condicion .', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_8'], 1, 1, 'C', false);
	$pdf->Cell(130, 5, '4.9 Ausencia de vectores , roedores
    u otros animales o', 'LTR', 0, 'B', false);
	$pdf->Cell(50, 5, '', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, '', 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, ' signos de su presencia 
    ( excremento u otros ) .', 'LR', 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 'LR', 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_9'], 'LR', 1, 'C', false);
	$pdf->Cell(130, 5, '4.10 Guarda el material de limpieza
    y desinfeccion separados de alimento .', 1, 0, 'B', false);
	$pdf->Cell(50, 5, 'SI=4', 1, 0, 'C', false);
	$pdf->Cell(20, 5, $rows['iiii_10'], 1, 1, 'C', false);
	$pdf->Cell(180, 5, 'TOTAL DE PUNTAJE 5  ', 1, 0, 'L', true);
	$pdf->Cell(20, 5, $rows['total_puntaje5'], 1, 1, 'C', TRUE);
	$pdf->Cell(130, 5, '5.0 CALIFICACION DEL PUESTO ', 1, 0, 'B', TRUE);
	$pdf->Cell(50, 5, 'CALIFICACION', 1, 0, 'C', TRUE);
	$pdf->Cell(20, 5, 'VALOR', 1, 1, 'C', TRUE);
	$pdf->Cell(180, 5, '5.1 PUNTAJE TOTAL ', 1, 0, 'B', TRUE);
	$pdf->Cell(20, 5, $rows['total_puntaje5'], 1, 1, 'B', false);
	$pdf->Cell(180, 5, 'ESTADO ', 1, 0, 'B', TRUE);
	$pdf->Cell(20, 5, $rows['total_puntaje5'], 1, 1, 'B', false);
	$pdf->Cell(100, 5, '', 'LTR', 0, 'B', TRUE);
	$pdf->Cell(50, 5, utf8_decode('Puntaje y porcentaje'), 1, 0, 'B', TRUE);
	$pdf->Cell(50, 5, utf8_decode('Calificacion'), 1, 1, 'B', TRUE);
	$pdf->Cell(100, 5, '', 'LR', 0, 'B', TRUE);
	$pdf->Cell(50, 5, utf8_decode('63 puntos a más (75% a 100%) '), 1, 0, 'B', false);
	$pdf->Cell(50, 5, utf8_decode('Aceptable'), 1, 1, 'B', FALSE);
	$pdf->Cell(100, 5, ' REFERENCIA ', 'LR', 0, 'B', TRUE);
	$pdf->Cell(50, 5, '42 puntos a 62 puntos (50% a 75%) ', 1, 0, 'B', FALSE);
	$pdf->Cell(50, 5, utf8_decode('Regular'), 1, 1, 'B', FALSE);
	$pdf->Cell(100, 5, '', 'LBR', 0, 'B', TRUE);
	$pdf->Cell(50, 5, '0 a 41 puntos (menos del 50%)', 1, 0, 'B', false);
	$pdf->Cell(50, 5, utf8_decode('No aceptable'), 1, 1, 'B', FALSE);
	$pdf->Cell(200, 5, utf8_decode('(*) Criterios de evaluación excluyentes, es decir que su desaprobación se traduce en un a calificación de "no aceptable" (color rojo)
'), 0, 1, 'B', FALSE);
	$pdf->Cell(200, 5, utf8_decode('(**) El valor del puntaje es binario: si cumple el requisito se otorga el total; en
 caso contrario el puntaje es cero.
'), 0, 1, 'B', FALSE);


}
