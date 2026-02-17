<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">Ficha Evaluación Sanitaria de Servicios de Alimentación en Establecimiento de Salud</h4>        
        </div>      

        <div class="modal-body">

          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
              Datos de la Ficha
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Establecimiento</label>
                    <input type="hidden" id="hid_local">
                    <input type="hidden" id="id_ficha">
                    <input type="text" readonly="" class="form-control" id="establecimiento" placeholder="">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Distrito</label>
                    <input type="text" readonly="" class="form-control" id="distrito" placeholder="">
                  </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Visita:</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_encuesta" placeholder="dd/mm/aaaa" >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>


                

               <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="ubigeo">Medico Jefe:</label>
               <select  class='form-control select2  text-uppercase' name='id_medico_jefe' id='id_medico_jefe' style="width: 100%;" >
               </select>
             </div>
           </div>

            


         </div>
         <div class="row">

          

             <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Responsable Modulo Venta</label>
                
                <input type="text"  class="form-control" id="responsable_modulo_venta" placeholder="">
              </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Numero de Carnet</label>
               
                <input type="text"  class="form-control" id="numero_carnet" placeholder="">
              </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">N° Manipuladores</label>
                
                <input type="text"  class="form-control" id="numero_manipuladores" placeholder="">
              </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Tipos de Alimentos</label>
                
                <input type="text"  class="form-control" id="tipo_alimentos" placeholder="">
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

                        <th>I. DEL MODULO DE VENTA: Estructura y Saneamiento Básico</th>
                        <th class="text-center">Calificacion</th>
                        <th class="text-center">Valor</th>
                      </tr>  
                      <tr>
                        <td>Se ubica lejos de los SS.HH. u otros focos de contaminacion o de malos olores</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="i_1" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Está construido de material resistente, impermeable, de fácil limpieza y de color claro</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="i_2" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Se observa un buen estado de conservación y limpieza (pisos, paredes y techo)</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"   placeholder=""  onfocus="this.select();"  id="i_3" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>El ambiente facilita el desarrollo de las actividades de manipulación de alimentos</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="i_4" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Cuenta con sistema de desague operativo</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="i_5" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>La basura se dispone en tachos con tapa y bolsa sanitaria y se elimina a diario</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="i_6" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>No existe evidencia de la presencia de insectos y roedores (excretas, orina)</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="i_7" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <!--II-->

                      <tr class="v-grid-header">

                        <th>II. DEL PERSONAL: Prácticas de Higiene y Capacitación</th>
                        <th class="text-center">Calificacion</th>
                        <th class="text-center">Valor</th>
                      </tr>  
                      <tr>
                        <td>Reciben control médico periódico y no muestra indicios de enfermedad</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_1" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Reciben capacitación periódica en higiene y manipulación de alimentos (menor de 1 año)</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_2" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Tiene los cabellos cortos o recogidos, limpios y totalmente cubiertos</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_3" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Aseo y presentación personal adecuada con indumentaria completa de color claro y limpio</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_4" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Manos limpias, libres de accesorios, uñas cortas y sin esmalte</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_5" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Cuenta c/ materiales para la desinfeccion de las manos (alcohol, gel desinfectante, toallas descartables)</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="ii_6" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>No coge o toca dnero u otro contaminante cuando manipula alimentos</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="ii_7" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <!-- III -->
                      <tr class="v-grid-header">

                        <th>III. DE LOS ALIMENTOS: Protección y Buenas Prácticas de Manipulación</th>
                        <th class="text-center">Calificacion</th>
                        <th class="text-center">Valor</th>
                      </tr>  
                      <tr>
                        <td>Adquieren alimentos industrializados que cuentan con Registro Sanitario y Fecha Vencimiento vigente</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="iii_1" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Los utensilios utilizados estan en buen estado de conservación y son de facil limpieza</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_2" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Existen refrigeradoras o conservadoras de alimentos operativas y limpias</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_3" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>Los alimentos son protegidos y exhibidos en vitrinas evitando asi su contaminación</td>
                        <td class="text-center">SI=2</td>
                        <td class="text-center">
                          <input type="text"    placeholder="" onfocus="this.select();"  id="iii_4" class="form-control text-right " value="0">

                        </td>
                      </tr>
                       <tr>
                        <td>No se expenden cigarrillos y/o bebidas alcoholicas en el quiosco</td>
                        <td class="text-center">SI=4</td>
                        <td class="text-center">
                          <input type="text"   placeholder="" onfocus="this.select();"  id="iii_5" class="form-control text-right " value="0">

                        </td>
                      </tr>
                     
                     <tr class="v-grid-header">

                        <th class="text-success">Total de Puntaje Obtenido</th>
                        <th class="text-center"></th>
                        <th class="text-center"><input type="text"   placeholder=""   id="total_puntaje" class="form-control text-right text-success " value="0"></th>
                      </tr>  


                       <tr class="v-grid-header">

                        <th class="text-center">INFORMACION COMPLEMENTARIA</th>
                        <th class="text-center">Calificacion</th>
                        <th class="text-center">Valor</th>
                      </tr>  
                      <tr>
                        <td>Contra incendios (extintores operativos vigentes)</td>
                        <td class="text-center"></td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="cnt_extintores" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>Señalizacion</td>
                        <td class="text-center"></td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="cnt_senalizadores" class="form-control text-right " value="0">

                        </td>
                      </tr>

                       <tr>
                        <td>Botiquin</td>
                        <td class="text-center"></td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="cnt_botiquin" class="form-control text-right " value="0">

                        </td>
                      </tr>

                      <tr>
                        <td>Sistema electrico Protegido</td>
                        <td class="text-center"></td>
                        <td class="text-center">
                          <input type="text"    placeholder=""  onfocus="this.select();"  id="cnt_sep" class="form-control text-right " value="0">

                        </td>
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