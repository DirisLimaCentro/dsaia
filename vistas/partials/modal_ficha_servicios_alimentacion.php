<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">Ficha parA Evaluación Sanitaria de Servicios de Alimentación Colectiva</h4>        
        </div>      

        <div class="modal-body">

          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
              Datos de la Ficha
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Establecimiento</label>
                    <input type="hidden" id="hid_local">
                    <input type="hidden" id="id_ficha">
                    <input type="text" readonly="" class="form-control" id="establecimiento" placeholder="">
                  </div>
                </div>

               



                <div class="col-md-4">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Evaluacion:</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_encuesta" placeholder="dd/mm/aaaa" >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Servicio</label>
                    <input type="text"  class="form-control" id="nombre_servicio" placeholder="">
                  </div>
                </div>



                

               



            


         </div>
         <div class="row">

             <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Direccion</label>
                
                <input type="text"  class="form-control" id="direccion" placeholder="">
              </div>
            </div>


            <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="ubigeo">Distrito:</label>
               <select  class='form-control select2  text-uppercase' name='id_ubigeo' id='id_ubigeo' style="width: 100%;" >
               </select>
             </div>
           </div>
          

            

            <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Ubicacion de la empresa</label>
               
                <input type="text"  class="form-control" id="ubicacion_empresa" placeholder="">
              </div>
            </div>

             <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Responsable del Servicio</label>
               
                <input type="text"  class="form-control" id="responsable_servicio" placeholder="">
              </div>
            </div>


            <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">N° Manipuladores</label>
                
                <input type="text"  class="form-control" id="numero_manipuladores" placeholder="" value="0">
              </div>
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Forma de Servicio</label>
                <select  class='form-control'  id='id_forma_servicio' style="width: 100%;" >
                  <option value="" selected="">--Seleccione--</option>
                  <option value="1" >Propio</option>
                  <option value="2" >Otros</option>
               </select>
                
              </div>
            </div>


        </div>



            </div>
          </div>


          <div class="panel panel-primary">
            <div class="panel-heading ">
              Calificacion
            </div>
            <div class="panel-body">

             

             <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <table class="table  table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>

                    
                  </thead>
                  <tbody> 
                       <tr class="v-grid-header">

                        <th>Si cumple con el aspecto evauado se le consigna la toalidad del valor.<br>
                          Si no cumple, sele consigna valor cero (0). No consignar valores intermedios
                        </th>
                        <th class="text-center">Calificacion</th>
                        <th class="text-center">Valor</th>
                      </tr>  
                      <tr>
                        <td colspan="3" class="text-center"><strong>DE LA UBICACION Y ESTRUCTURA FISICA</strong></td>
                      </tr>
                      <tr>
                        <td>1. Ubicado lejos de contaminación y zonas con malos olores</td>
                        <td class="text-center">2</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="i_1" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>2. Exclusividad de los ambientes destinados a los alimentos</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="i_2" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>3. Ambientes limpios, bien humedos y ventilados</td>
                        <td class="text-center">2</td>
                        <td class="text-center">
                          <input type="text"   placeholder=""  onfocus="this.select();"  id="i_3" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>4. Paredes, techos y pisos de materiales fáciles de higienizar y limpios</td>
                        <td class="text-center">2</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="i_4" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>5. Mobiliario de material resistente, en buen estado de conservación y limpieza</td>
                        <td class="text-center">2</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="i_5" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <tr class="v-grid-header">
                         <td style="text-align: right;">SUB TOTAL I:</td>
                         <td class="text-center">12</td>
                         <td class="text-center">
                          <input type="text"    placeholder=""  readonly=""  id="subtotal_i" class="form-control text-right bg-green " value="0">

                        </td>

                      </tr>
                       

                      <!--II-->

                       <tr>
                        <td colspan="3" class="text-center"><strong>DE LAS INSTALACIONES SANITARIAS</strong></td>
                      </tr>

                     
                      <tr>
                        <td>6. Abastecimiento suficiente de agua segura</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_1" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>7. Eliminación adecuada de aguas residuales</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_2" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>8. Basura bien dispuesta (tacho con bolsa interior y tapa) de eliminación diaria</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_3" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>9. SS.HH. Bien ubicados, limpios, operativos y con implementos para el lavado de manos (agus potable, jabón y escobilla para uñas)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_4" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>10. Ausencia de insectos, de indicios de roedores y de otros animales</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_5" class="form-control text-right " value="0">

                        </td>
                      </tr>
                      

                      <tr class="v-grid-header">
                         <td style="text-align: right;">SUB TOTAL II:</td>
                         <td class="text-center">20</td>
                         <td class="text-center">
                          <input type="text"    placeholder=""  readonly=""  id="subtotal_ii" class="form-control text-right bg-orange" value="0">

                        </td>

                      </tr>


                      <!-- III -->
                      <tr>
                        <td colspan="3" class="text-center"><strong>DE LOS PRINCIPIOS GENERALES DE HIGIENE (PGH)</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><strong>BPM EN EL PROCESO DE ELABORARION DE ALIMENTOS</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><strong>RECEPCION</strong></td>
                      </tr>


                      <tr>
                        <td>11. Alimentos de proveedores autorizados</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="iii_1" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>12. Medio de transporte cerrado, limpio y exclusivo para alimentos</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_2" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>13. Productos frescos con caracteristicas de calidad (organolepticas)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_3" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>14. Alimentos perecibles que mantienen la cadena de frio</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_4" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>15. Productos envasados con registro sanitario y normas de rotulado</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"   placeholder="" onfocus="this.select();"  id="iii_5" class="form-control text-right " value="0">

                        </td>
                      </tr>
                      <tr>
                        <td>16. Inspección sanitaria de alimentos por personal calificado</td>
                        <td class="text-center">2</td>
                        <td class="text-center">
                          <input type="text"   placeholder="" onfocus="this.select();"  id="iii_6" class="form-control text-right " value="0">

                        </td>
                      </tr>


                      <tr>
                        <td colspan="3" ><strong>ALMACENAMIENTO</strong></td>
                      </tr>


                      <tr>
                        <td>17. Ambiente limpio, seco, ventilado e iluminado</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="iii_7" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>18. Alimentos secos sobre tarimas o similares</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_8" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>19. Aplica cadena de frio en conservacion de alimentos perecibles</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_9" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>20. Aplica principio de rotacion de stock (PEPS primero en entrar, primero en salir)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_10" class="form-control text-right " value="0">

                        </td>
                      </tr>


                      <tr>
                        <td colspan="3" ><strong>PREPARACION</strong></td>
                      </tr>


                      <tr>
                        <td>21. Ambiente de cocina limpia y desinfectada</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="iii_11" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>22. Agua segura para preparar alimentos (cloro residual 0.5 ppm)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_12" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>23. Se aplica flujo lineal (recto o en U) durante la preparación de los alimentos (preparación previa-preparacion final-servido)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_13" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>24. No existe riesgo de contaminacion cruzada (por operaciones, utensilio, manipulador, etc)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_14" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>25. Aplica cadena de frio en la conservacion de alimentos perecibles</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_15" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>26. Preparaciones calientes se mantienen a temperaturas superiores a 70° C</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_16" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>27. Lavan y desinfectan las frutas y verduras de tallo corto de consumo directo (crudos)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_17" class="form-control text-right " value="0">

                        </td>
                      </tr>


                       <tr>
                        <td colspan="3" ><strong>SERVIDO DE LOS ALIMENTOS</strong></td>
                      </tr>



                       <tr>
                        <td>28. El menaje, vajilla, cubiertos, vasos, deben estar en buen estado de conservacion e higiene, los de material de vidirio o similares, deben estar integros</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_18" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>29. El mobiliario y manteleria deben estar en buen estado de conservacion e higiene</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_19" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <tr>
                        <td colspan="3" ><strong>TRANSORTE DE ALIMENTOS AL LUGAR DE CONSUMO</strong></td>
                      </tr>

                      <tr>
                        <td>30. El vehiculo debe ser de uso exclusivo para transportar alimentos y debe estar higienizado antes de tranportar los alimentos</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_20" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>31. Los procesos, frecuencias y responsables de la limpieza, higiene y desnfeccion de los vehiculos deben contemplarse en el programa de higiene y sanemamiento del servicio (constatar con su manual de PHS)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_21" class="form-control text-right " value="0">

                        </td>
                      </tr>


                      <tr>
                        <td colspan="3" ><strong>DE LOS MANIPULADORES</strong></td>
                      </tr>

                      <tr>
                        <td>32. Ausencia de signos de enfermedad (heridas, tos, estornudos)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_22" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>33. Usan uniforme: mandil, gorro (que cubra todo el cabello) de color claro y limpio</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_23" class="form-control text-right " value="0">

                        </td>
                      </tr>


                       <tr>
                        <td>34. Manos limpias sin joyas, uñas limpias, cortas y sin esmlate</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_24" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>35. Aplican principios de higiene en la manipulacion de alimentos</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_25" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <tr>
                        <td>36. Reciben capacitaciones continuas (la menos una vez al año)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_26" class="form-control text-right " value="0">

                        </td>
                      </tr>


                      <tr class="v-grid-header">
                         <td style="text-align: right;">SUB TOTAL III:</td>
                         <td class="text-center">92</td>
                         <td class="text-center">
                          <input type="text"    placeholder=""  readonly=""  id="subtotal_iii" class="form-control text-right bg-red" value="0">

                        </td>

                      </tr>


                      <tr>
                        <td colspan="3" ><strong>PROGRAMA DE HIGIENE Y SANEAMIENTO (PHS)</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><strong>Practicas de limpieza y desinfeccion</strong></td>
                      </tr>

                       <tr>
                        <td>37. Equipos de material inocuo, desmontables, limpios y desinfectados</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_1" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>38. Ambiente para utensilios de distribucion de alimentos limpios y de uso exclusivo</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_2" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>39. Mobiliario y utensilios para distribucion de alimentos limpio y desinfectado</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_3" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <tr>
                        <td>40. El PHS debe considera la renovacion, mantenimiento de equipos y utensilios que asegure el buen funcionamiento y condicion sanitaria de los mismo (evidencia en el manual)</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_4" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td colspan="3" ><strong>Prevencion y cntrol de vectores</strong></td>
                      </tr>



                       <tr>
                        <td>41. EL PHS contempla medidas preventivas y de control, descritas, documentadas y supervisadas por el responsable de esta actividad</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_5" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>42. El establecimiento cuenta con medidas destinadas a evitar el ingreso de insectos, roedores u otras plagas a las areas de elaboracion</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_6" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <tr>
                        <td>43. Los productos quimicos y biologicos se guardan bajo estrictas medidas de seguridad</td>
                        <td class="text-center">4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iv_7" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr class="v-grid-header">
                         <td style="text-align: right;">SUB TOTAL IV:</td>
                         <td class="text-center">16</td>
                         <td class="text-center">
                          <input type="text"    placeholder=""  readonly=""  id="subtotal_iv" class="form-control text-right bg-blue" value="0">

                        </td>

                      </tr>



                     
                     <tr class="v-grid-header">

                        <th class="text-success">TOTAL GENERAL</th>
                        <th class="text-center">140</th>
                        <th class="text-center"><input type="text"   placeholder=""   id="total_puntaje" class="form-control text-right text-success " value="0"></th>
                      </tr>  


                      



                    
                  </tbody>
                  
                </table>

              </div>


            </div>



            </div>
          </div>


         
         

        </div>
        <div class="modal-footer">
          <button type="button" onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

        </div>
        <!--</div>-->


      </div>
    </div>

  </div>