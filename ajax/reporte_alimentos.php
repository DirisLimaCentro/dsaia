
<?php

include "cons.php";
/*
require  "phpExcel/Classes/PHPExcel.php";*/


require  "../services/PHPExcel/Classes/PHPExcel/IOFactory.php";


class reporte_alimentos {



    public function reporte1($mes,$anio){

        $archivoexcel = 'plantilla_reporte_alimentos.xlsx';
        /*
        $objPHPExcel = new PHPExcel();
        */

        $objPHPExcel = PHPExcel_IOFactory::load($archivoexcel);

        $declaracion = new cons();


        $sql = "select ris , nombre  , ficha_restaurantes ,  ficha_panaderias ,
ficha_servicios_alimentacion ,
ficha_cunamas,

ficha_qaliwarma,
ficha_sanitaria_alimentacion ,  
ficha_comedores_can1,
ficha_comedores_can3,
ficha_evaluacion_sanitaria_xl ,
ficha_acta_condiciones_sanitarias_xl
,  ( coalesce(ficha_1_mercado, 0) +  coalesce(ficha_2_mercado, 0) +
					   +  coalesce(ficha_3_mercado, 0) +  coalesce(ficha_4_mercado, 0) +  
					   coalesce(ficha_5_mercado, 0) +  coalesce(ficha_6_mercado, 0) ) total_mercados
from 
(
select l.ris , l.nombre ,  ficha_restaurantes , 
	ficha_servicios_alimentacion ,
	ficha_panaderias,
ficha_cunamas,
ficha_qaliwarma,
ficha_sanitaria_alimentacion ,  
ficha_comedores_can1,

ficha_comedores_can3,
ficha_evaluacion_sanitaria_xl ,
ficha_acta_condiciones_sanitarias_xl ,
ficha_1_mercado , ficha_2_mercado , ficha_3_mercado , 
ficha_4_mercado ,
ficha_5_mercado , ficha_6_mercado from locales  l 
left join 
( select  l.id, l.nombre ,   count (m1.id_local  ) as ficha_1_mercado  from locales l left join 
ficha_1_mercado m1 on l.id=m1.id_local where l.id_empresa=1  and extract( month from m1.fecha) = $mes
 and extract( year from m1.fecha)  = $anio
group by  l.id, l.nombre )x
on l.id=x.id
left join 
 (select  l.id, l.nombre ,   count (m2.id_local  ) as ficha_2_mercado  from locales l left join 
ficha_2_mercado m2 on l.id=m2.id_local where l.id_empresa=1  and extract( month from m2.fecha)   = $mes
 and extract( year from m2.fecha)  = $anio
group by  l.id, l.nombre)x2
on l.id=x2.id
left join
 (select  l.id, l.nombre ,   count (m3.id_local  ) as ficha_3_mercado  from locales l left join 
ficha_3_mercado m3 on l.id=m3.id_local where l.id_empresa=1  and extract( month from m3.fecha)  = $mes
 and extract( year from m3.fecha)  = $anio
group by  l.id, l.nombre)x3
on l.id=x3.id
left join 
(select  l.id, l.nombre ,   count (m4.id_local  ) as ficha_4_mercado  from locales l left join 
ficha_4_mercado m4 on l.id=m4.id_local where l.id_empresa=1  and extract( month from m4.fecha)   = $mes
 and extract( year from m4.fecha)  = $anio
group by  l.id, l.nombre)x4
on l.id=x4.id
left join 
(select  l.id, l.nombre ,   count (m5.id_local  ) as ficha_5_mercado  from locales l left join 
ficha_5_mercado m5 on l.id=m5.id_local where l.id_empresa=1  and extract( month from m5.fecha)  = $mes
group by  l.id, l.nombre)x5
on l.id=x5.id
left join
( select  l.id, l.nombre ,   count (m6.id_local  ) as ficha_6_mercado  from locales l left join 
ficha_6_mercado m6 on l.id=m6.id_local where l.id_empresa=1  and extract( month from m6.fecha)  = $mes
 and extract( year from m6.fecha)  = $anio
group by  l.id, l.nombre)x6
on l.id=x6.id

	left join 
(  select  l.id, l.nombre ,   count (f.id_local  ) as ficha_restaurantes from locales l left join 
ficha_vig_restaurantes f on l.id=f.id_local where l.id_empresa=1  and extract( month from f.fecha_inicio) = $mes
 and extract( year from f.fecha_inicio)  = $anio
 group by  l.id, l.nombre    )e
on l.id=e.id
	
left join  /* ficha 6 */
(  select  l.id, l.nombre ,   count (j.id_local  ) as ficha_panaderias from locales l left join 
ficha_anexo2_evaluacion_panaderia j on l.id=j.id_local where l.id_empresa=1  and extract( month from j.fecha_inicio) = $mes
 and extract( year from j.fecha_inicio)  = $anio
group by  l.id, l.nombre    )y
on l.id=y.id
	
  left join /*fich Cunamas */
( select  l.id, l.nombre ,   count (j6.id_local  ) as ficha_cunamas from locales l left join 
ficha_servicios_alimentacion j6 on l.id=j6.id_local where l.id_empresa=1 and j6.id_forma_servicio::int=1  and extract( month from j6.fecha)  = $mes
 and extract( year from j6.fecha)  = $anio
group by  l.id, l.nombre)y6
on l.id=y6.id 
      
    
    
    
 left join /*fich Qaliwarma */
( select  l.id, l.nombre ,   count (j7.id_local  ) as ficha_qaliwarma from locales l left join 
ficha_acta_condiciones_sanitarias_xl j7 on l.id=j7.id_local where l.id_empresa=1 and j7.tipo_qaliwarma=1  and extract( month from j7.fecha_inicio)  = $mes
 and extract( year from j7.fecha_inicio)  = $anio
group by  l.id, l.nombre)y7
on l.id=y7.id   
  
	
	
	
left join /*ficha1 de alimentosm */
( select  l.id, l.nombre ,   count (j2.id_local  ) as ficha_servicios_alimentacion from locales l left join 
ficha_servicios_alimentacion j2 on l.id=j2.id_local where l.id_empresa=1 and j2.id_forma_servicio::int=3  and extract( month from j2.fecha) =  $mes
 and extract( year from j2.fecha)  = $anio
group by  l.id, l.nombre)y2
on l.id=y2.id
    
    left join /*fich Comedores del Minsa _ Can1 */
( select  l.id, l.nombre ,   count (j8.id_local  ) as ficha_comedores_can1 from locales l left join 
ficha_servicios_alimentacion j8 on l.id=j8.id_local where l.id_empresa=1 and j8.id_forma_servicio::int=4  and extract( month from j8.fecha) = $mes
 and extract( year from j8.fecha)  = $anio
group by  l.id, l.nombre)y8
on l.id=y8.id 
    
 left join /*fich Comedores del Minsa _ Can3 */
( select  l.id, l.nombre ,   count (j11.id_local  ) as ficha_comedores_can3 from locales l left join 
ficha_servicios_alimentacion j11 on l.id=j11.id_local where l.id_empresa=1 and j11.id_forma_servicio::int=5  and extract( month from j11.fecha)  = $mes
 and extract( year from j11.fecha)  = $anio
group by  l.id, l.nombre)y22
on l.id=y22.id   
  
left join /* ficha 2 de alimentacion */
( select  l.id, l.nombre ,   count (j3.id_local  ) as ficha_sanitaria_alimentacion from locales l left join 
ficha_sanitaria_alimentacion j3 on l.id=j3.id_local where l.id_empresa=1  and extract( month from j3.fecha)  = $mes
  and extract( year from j3.fecha)  = $anio
group by  l.id, l.nombre)y3
on l.id=y3.id
left join /* ficha 3  de alimentacion */
( select  l.id, l.nombre ,   count (j4.id_local  ) as ficha_evaluacion_sanitaria_xl from locales l left join 
ficha_evaluacion_sanitaria_xl j4 on l.id=j4.id_local where l.id_empresa=1  and extract( month from j4.fecha_inicio)  = $mes
 and extract( year from j4.fecha_inicio)  = $anio
group by  l.id, l.nombre)y4
on l.id=y4.id
left join/*ficha de alimentacion 5  */
( select  l.id, l.nombre ,   count (j5.id_local  ) as ficha_acta_condiciones_sanitarias_xl from locales l left join 
ficha_acta_condiciones_sanitarias_xl j5 on l.id=j5.id_local where l.id_empresa=1  and extract( month from j5.fecha_inicio)  = $mes
 and extract( year from j5.fecha_inicio)  = $anio
group by  l.id, l.nombre)y5
on l.id=y5.id	
	

	where l.id_empresa=1)r";

       /*
    id=$mid";
*/


        $objPHPExcel->getProperties()
            ->setCreator("OTI DIRIS 2022")
            ->setLastModifiedBy("OTI DIRIS 2022")
            ->setTitle("Excel en PHP")
            ->setSubject("OTI DIRIS 2022")
            ->setDescription("OTI DIRIS 2022")
            ->setKeywords("OTI DIRIS 2022")
            ->setCategory("OTI DIRIS 2022");




        $objPHPExcel->getActiveSheet()->setTitle('PROGRAMACION DE LOS EE.SS');





$rowCount =2 ;


        foreach ($declaracion->iniciar()->query($sql) AS $rows){





            $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $rows['ris']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $rows['nombre']);


            $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $rows['ficha_restaurantes']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $rows['ficha_panaderias']);


//FICHA MERCADOS

            $objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $rows['total_mercados']);


            //Ficha Cunamas -- 1 / ok

            $objPHPExcel->getActiveSheet()->setCellValue('K'.$rowCount, $rows['ficha_cunamas']);


            //Menu Qaliwarma    -- 2 / ok

            $objPHPExcel->getActiveSheet()->setCellValue('M'.$rowCount, $rows['ficha_qaliwarma']);



            //MENU   1 - ficha principal-- 3 *//


            $objPHPExcel->getActiveSheet()->setCellValue('O'.$rowCount, $rows['ficha_servicios_alimentacion']);


// MENU 2


            $objPHPExcel->getActiveSheet()->setCellValue('Q'.$rowCount, $rows['ficha_sanitaria_alimentacion']);


// MENU 3   ok plant tb almacen

            $objPHPExcel->getActiveSheet()->setCellValue('S'.$rowCount, $rows['ficha_evaluacion_sanitaria_xl']);


// MENU 4

            $objPHPExcel->getActiveSheet()->setCellValue('U'.$rowCount, $rows['ficha_acta_condiciones_sanitarias_xl']);



            //Ficha comedores del minsa - CAN 1


            $objPHPExcel->getActiveSheet()->setCellValue('W'.$rowCount, $rows['ficha_comedores_can1']);

            //Ficha comedores del minsa - CAN 3


            $objPHPExcel->getActiveSheet()->setCellValue('Y'.$rowCount, $rows['ficha_comedores_can3']);

       // Mercado 1 ficha_1_mercado_total

   // $objPHPExcel->getActiveSheet()->setCellValue('AC'.$rowCount, $rows['ficha_1_mercado_total']);


// Mercado 2 ficha_1_mercado_total


  //    $objPHPExcel->getActiveSheet()->setCellValue('AD'.$rowCount, $rows['ficha_2_mercado_total']);


//  Mercado 3 ficha_3_mercado_total






            $rowCount++;


        }






        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="Ficha1_Reporte_Alimentos.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');




    }








}









