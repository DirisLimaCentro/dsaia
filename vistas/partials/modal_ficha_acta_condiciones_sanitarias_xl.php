<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">
    <form id="frmmodal">
    <div class="modal-content" id="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">Ficha </h4>        
        </div>      

        <div class="modal-body">

          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
              Datos de la Ficha
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-2">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Inicio:</label>
                    <div class="input-group date">

                      <input type="hidden" name="id_usuario" id="id_usuario">
                      <input type="hidden" name="id_local"  id="id_local">

                      <input type="text" class="form-control pull-right" id="fecha_inicio" name="fecha_inicio" placeholder="dd/mm/aaaa" >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="hora">Hora Inicio</label>                            
                    <input type="text"  class="form-control" id="hora_inicio" name="hora_inicio" placeholder="">
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Termino:</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_termino" name="fecha_termino" placeholder="dd/mm/aaaa" >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="hora">Hora Termino</label>                            
                    <input type="text"  class="form-control" id="hora_termino" name="hora_termino" placeholder="">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="hora">Registrado por</label>                            
                    <input type="text"  class="form-control" id="usuario" name="usuario" placeholder="" disabled="">
                  </div>
                </div>

           </div>

           <div class="row">
               <br>
               <div class="col-md-12 col-sm-12 col-xs-12 x_title">
                   <label class="text-success">Informacion del Almacen</label>
               </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="ruc" class="col-form-label">RUC:</label>
                    <div class="input-group">
                      <input type="hidden" id="id_entidad" name="id_entidad" value="0">
                       <input type="hidden" id="id_persona" name="id_persona" value="0">
                       <input type="hidden" id="id_ficha" name="id_ficha" value="0">
                      <input type="text" class="form-control text-uppercase" id="ruc" name="ruc" placeholder="RUC">

                      <div class="input-group-btn">
                        <button class="btn btn-default" id="btnfindRuc" type="button" onclick="buscar_entidad();">
                          <i class="glyphicon glyphicon-search" title="Buscar en SUNAT"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Nombre o Razon Social:</label>
                   <input type="text"  class="form-control" id="razon_social" name="razon_social" placeholder="Razon Social">
                 </div>
               </div>

               <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="razon_social">Direccion:</label>
                 <input type="text"  class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Direccion">
               </div>
             </div>



             


         </div>
         <div class="row">

          

          <div class="col-md-3">
            <label for="telefono_fijo" class="col-form-label">Telefono Fijo:</label>
            <div class="form-group has-feedback">                            
              <input type="text" class="form-control" id="telefono_fijo_empresa" name="telefono_fijo_empresa" placeholder="Telefono Fijo">
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-3">
            <label for="Celular" class="col-form-label">Celular:</label>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" id="celular_empresa" name="celular_empresa" placeholder="Celular">
              <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-3">
            <label for="Email" class="col-form-label">E-mail:</label>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" id="email_empresa" name="email_empresa" placeholder="Email">
              <span class="fa fa-envelope  form-control-feedback right" aria-hidden="true"></span>

            </div>
          </div>

             <div class="col-md-3 col-sm-12 col-xs-12">
                 <div class="form-group">
                     <label for="ubigeo">Distrito:</label>
                     <select  class='form-control select2  text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;" >
                     </select>
                 </div>
             </div>



        </div>

         <div class="row">
             <br>
             <div class="col-md-12 col-sm-12 col-xs-12 x_title">
                 <label class="text-success">Responsables </label>
             </div>

             <div class="col-md-3 col-sm-12 col-xs-12">
                 <div class="form-group">
                     <label for="responsable_establecimiento">Responsable del Establecimiento:</label>
                     <input type="text" class="form-control" id="responsable_establecimiento" name="responsable_establecimiento" placeholder="Responsable Establecimiento">
                 </div>
             </div>




           <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="Licencia _Municipal">Cuenta con certificacion de H.Vigente :</label>



                  <select class="form-control" id="licencia" name="licencia"  placeholder="Seleccionar">

                      <option value="SI">SI</option>
                      <option value="NO">NO</option>

                  </select>
             </div>
           </div>




           <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-groablup">
               <label for="Responsable_calidad">Responsable Control Calidad :</label>
                <input type="text" class="form-control" id="responsable_calidad" name="responsable_calidad" placeholder="Representante">
             </div>
           </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="Cargo">Cargo:</label>
                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Representante">
             </div>
           </div>



        
        </div>

        <div class="row">


            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="Dias_actividad">N° Dias Actividad:</label>
                    <input type="text" class="form-control text-right" id="dias_actividad" name="dias_actividad" placeholder="">
                </div>
            </div>




           <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="Horario">Seleccionar Tipo Establecimiento:</label>


                  <select class="form-control"  id="tipo_establecimiento" name="tipo_establecimiento"  aria-label="Default select example" >
<option value="Establecimiento de Fabricacion">Establecimiento de Fabricacion</option>
                      <option value="Establecimiento de Fraccionamiento">Establecimiento de Fraccionamiento</option>
                      <option value="Establecimiento de Distribucion">Establecimiento de Distribucion</option>
                      <option value="Establecimiento de Comercializacion">Establecimiento de Comercializacion</option>
<option value="Otros">Otros</option>
                  </select>



             </div>
           </div>

           <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="Manipuladores_hombres">N° Manipuladores Hombres
               :</label>
                <input type="text" class="form-control text-right" id="nro_hombres" name="nro_hombres" placeholder="">
             </div>
           </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="Manipuladores_mujeres">Ficha  Qaliwarma:  </label>


                  <select class="form-control" id="tipo_qaliwarma" name="tipo_qaliwarma"  placeholder="Seleccionar">

                      <option value="1">SI</option>
                      <option value="2">NO</option>

                  </select>



             </div>
           </div>

        
        </div>

       



            </div>
          </div>




          <!--<div class="panel panel-info">
            <div class="modal-header modal-header-success">
              Fichas
            </div>
            <div class="panel-body">-->
              
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">



                    <div class="tabs-container">

                                  <ul class="nav nav-tabs bar_tabs">

                                    <li class="active">
                                      <a data-toggle="tab" role="tab" aria-controls="tb_0"  class="nav-link active show" aria-selected="false" href="#tb_0"><span class="round-tabs two">
                                        
                                      </span>Tabla 1 </a>
                                    </li>

                                    <li class="nav-link">
                                      <a data-toggle="tab" role="tab" aria-controls="tb_1"  class="nav-link " aria-selected="true" href="#tb_1"><span class="round-tabs two">
                                       
                                      </span>Tabla 2</a>
                                    </li>
                                    <li >
                                      <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_2"  aria-selected="false" href="#tb_2"><span class="round-tabs two">
                                        
                                      </span>Tabla 2.2 </a>
                                    </li>

                                    <li >
                                      <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_3"  aria-selected="false" href="#tb_3"><span class="round-tabs two">
                                        
                                      </span>Tabla 3</a>
                                    </li>


                                      <li >
                                          <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_4"  aria-selected="false" href="#tb_4"><span class="round-tabs two">

                                      </span>Tabla 4 .</a>
                                      </li>


                                      <li >
                                          <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_5"  aria-selected="false" href="#tb_5"><span class="round-tabs two">

                                      </span>Tabla 5.</a>
                                      </li>



                                      <li >
                                          <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_6"  aria-selected="false" href="#tb_6"><span class="round-tabs two">

                                      </span>OTROS .</a>
                                      </li>







                                  </ul>

                                  <div class="tab-content">

                                     <div id="tb_0" class="tab-pane active" role="tabpanel" aria-labelledby="tb_0">
                                       <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">


                                          <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

                                                 <thead>
                                                  <tr class="v-grid-header">
                                                    <th class="text-center">N°</th>
                                                    <th class="text-center">CRITERIO</th>
                                                    <th class="text-center">SI / NO</th>
                                                   
                                                    <th class="text-center">Observaciones</th>
                                                  </tr>
                                                </thead>  

                                            <tbody>  
                                               
                                            <tr >  <td colspan="5"  ><center>1. CONDICIONES SANITARIAS GENERALES </center> </td> </tr>

                                              <tr>
                                                <td>1.1</td>
                                                <input type="hidden" name="i_1" value="false">
                                                <td> Uso exclusivo para la actividad con alimentos. (5.2.1)</td>
                                                <td><input type="checkbox" name="i_1"  value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control" name="i_1_obs"  style="height: 50px;"></textarea></td>
                                              </tr>

                                               <tr>
                                                <td>1.2</td>
                                                <input type="hidden" name="i_2"  value="false">
                                                <td>Ubicación que no implica riesgo de contaminación cruzada desde  fuentes de contaminación.(5.2.2) </td>
                                                <td><input type="checkbox" name="i_2"  value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control"  name="i_2_obs" style="height: 50px;"></textarea></td>
                                              </tr>

                                               <tr>
                                                <td>1.3</td>
                                                <input type="hidden" name="i_3"  value="false">
                                                <td>Estructura física que permite la protección de los alimentos, en buen estado de conservación e higiene.(5.2.3)</td>
                                                <td><input type="checkbox" name="i_3"  value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control"  name="i_3_obs" style="height: 50px;"></textarea></td>
                                              </tr>

                                               <tr>
                                                <td>1.4</td>
                                                <input type="hidden" name="i_4"  value="false">
                                                <td>Pisos, paredes, techo, puertas bien conservadas y limpias, de material no absorbente (impermeable).(5.2.4)</td>
                                                <td><input type="checkbox" name="i_4" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control" name="i_4_obs" style="height: 50px;"></textarea></td>
                                              </tr>

                                               <tr>
                                                <td>1.5</td>
                                                <input type="hidden" name="i_5" value="false">
                                                <td>Cuenta con protección que impide el ingreso de vectores.(5.2.5)</td>
                                                <td><input type="checkbox" name="i_5" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control" name="i_5_obs"  style="height: 50px;"></textarea></td>
                                              </tr>

                                               <tr>
                                                <td>1.6</td>
                                                 <input type="hidden" name="i_6" value="false">
                                                <td>Iluminación natural o artificial suficiente para realizar la inspección, bien distribuida y luminarias protegidas. (5.2.6)</td>
                                                <td><input type="checkbox" name="i_6" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control" name="i_6_obs" style="height: 50px;"></textarea></td>
                                              </tr>


                                            <tr>
                                                <td>1.7</td>
                                                <input type="hidden" name="i_7" value="false">
                                                <td>Ventilación natural o forzada.(5.2.7).</td>
                                                <td><input type="checkbox" name="i_7" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                <td><textarea class="form-control" name="i_7_obs" style="height: 50px;"></textarea></td>
                                            </tr>



                                            


                                            </tbody>
                                          </table>





                                        </div>

                                      </div>    
                                    </div>

                                    <!-- tab II  -->

                                    <div id="tb_1" class="tab-pane " role="tabpanel" aria-labelledby="tb_0">
                                       <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                          <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

                                           <thead>
                                            <tr class="v-grid-header">
                                              <th class="text-center">N°</th>
                                              <th class="text-center">CRITERIO</th>
                                              <th class="text-center">SI / NO</th>
                                             
                                              <th class="text-center">Observaciones</th>
                                            </tr>
                                          </thead>  

                                          <tbody>


                                          <tr >  <td colspan="5"  > <center> 2.PRINCIPIOS GENERALES DE HIGIENE (PGH)</center> </td> </tr>

                                          <tr >  <td colspan="5"  > <center> 2.1 BUENAS PRACTICAS DE ALMACENAMIENTO ( BPAL) </center> </td> </tr>


                                          <tr>
                                              <td>2.1.1</td>

                                               <input type="hidden" name="ii_1_1" value="false">

                                              <td>Los alimentos son ingresados al almacén en tiempo y condiciones que no implica riesgo de contaminación cruzada e interrupción
                                                  <BR>de la cadena de frío (esta última en caso aplique). (6.1.1 a)</td>
                                              <td><input type="checkbox" name="ii_1_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_1_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                              <td >2.1.2</td>

                                               <input type="hidden" name="ii_1_2" value="false">

                                              <td>Los empaques están íntegros, limpios y bien identificados.(6.1.1.b)</td>
                                              <td><input type="checkbox" name="ii_1_2" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_2_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                                <td >2.1.3</td>
                                             <input type="hidden" name="ii_1_3" value="false">

                                              <td> Correcta rotación de productos (PEPS-PVPS) (6.1.1.d).</td>
                                              <td><input type="checkbox" name="ii_1_3" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_3_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>

                                                <td >2.1.4</td>
                                              <input type="hidden" name="ii_1_4" value="false">


                                              <td>No hay presencia de insumos, productos o elementos que favorecen la contaminación cruzada. (6.1.1.e).</td>
                                              <td><input type="checkbox" name="ii_1_4" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_4_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                                <td >2.1.5</td>
                                               <input type="hidden" name="ii_1_5" value="false">

                                              <td>
                                                  Los vehículos de transporte no ingresan al almacén. (6.1.1.f).
                                              </td>
                                              <td><input type="checkbox" name="ii_1_5" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control"  name="ii_1_5_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                              <td>2.1.6</td>

                                              <input type="hidden" name="ii_1_6" value="false">


                                              <td>Las condiciones de almacenamiento son acordes con las indicaciones del fabricante o en su defecto con el Codex. (6.1.2.a).</td>
                                              <td><input type="checkbox" name="ii_1_6" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_6_obs" style="height: 50px;"></textarea></td>
                                            </tr>


                                          <tr>
                                              <td rowspan="7">2.1.7</td>

                                              <input type="hidden" name="ii_1_7" value="false">



                                              <td>Estiba de productos no perecibles (6.1.2.b):
                                              </td>

                                               <td>   <input type="checkbox" name="ii_1_7" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_7_obs" style="height: 50px;"></textarea></td>
                                          </tr>

<tr>


   <td colspan="1">


      <BR>  • Espacio libre al piso (tarimas, parihuelas): no menor de 0.20 m o estándar internacional.
                              </td>

    <input type="hidden" name="ii_1_7_a" value="false">
    <td colspan="2">
        <input type="checkbox" name="ii_1_7_a" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
    </td>

</tr>



   <tr>

  <td colspan="1">


     <BR>  • Espacio libre al techo: no menor de 0.60 m.
    </td>

     <input type="hidden" name="ii_1_7_b" value="false">
    <td colspan="2">
       <input type="checkbox" name="ii_1_7_b" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
        </td>

         </tr>


      <tr>

        <td colspan="1">


            <BR>  • Espacio libre entre filas de rumas: no menor de 0.50 m.
       </td>

        <input type="hidden" name="ii_1_7_c" value="false">
              <td colspan="2">
          <input type="checkbox" name="ii_1_7_c" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
       </td>

             </tr>
                                          <tr>

                                              <td colspan="1">


                                                  <BR>  • Espacio libre entre rumas: no menor de 0.20 m.
                                              </td>

                                              <input type="hidden" name="ii_1_7_d" value="false">
                                              <td colspan="2">
                                                  <input type="checkbox" name="ii_1_7_d" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                                              </td>

                                          </tr>


                                          <tr>

                                              <td colspan="1">


                                                  <BR>  • Espacio libre entre filas de ruma y pared no menor de 0.50 m.
                                              </td>

                                              <input type="hidden" name="ii_1_7_e" value="false">
                                              <td colspan="2">
                                                  <input type="checkbox" name="ii_1_7_e" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                                              </td>

                                          </tr>



                                          <tr>

                                              <td colspan="1">


                                                  <BR>  • En los métodos de anclaje a la pared, el espacio libre entre filas y pared no deberá ser menor de 0.30 m.
                                              </td>

                                              <input type="hidden" name="ii_1_7_f" value="false">
                                              <td colspan="2">
                                                  <input type="checkbox" name="ii_1_7_f" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                                              </td>

                                          </tr>







                                          <tr>
                                              <td>2.1.8</td>

                                              <input type="hidden" name="ii_1_8" value="false">


                                              <td>Condiciones de almacenamiento de productos perecibles en refrigeración (no mayor de 5°C)
                                                  <BR> o congelación (de -18°C o más frías) según corresponda. Puertas con cierre hermético.(6.1.3.a)</td>
                                              <td><input type="checkbox" name="ii_1_8" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_8_obs" style="height: 50px;"></textarea></td>
                                          </tr>
                                          <tr>
                                              <td>2.1.9</td>

                                              <input type="hidden" name="ii_1_9" value="false">


                                              <td>Estiba de productos perecibles (6.1.3.b):
                                                 <BR> Espacio libre al piso: no menor de 0.15 m.
                                                <BR>  Espacio libre a la pared: no menor de 0.15m.
                                               <BR>   Espacio libre al techo: no menor de 0.50 m.
                                              </td>
                                              <td><input type="checkbox" name="ii_1_9" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_1_9_obs" style="height: 50px;"></textarea></td>
                                          </tr>



                                          </tbody>
                                        </table>


                                        </div>
                                      </div>
                                    </div>

                                    <!--end tab II  -->


                                    <!-- III  -->

                                    <div id="tb_2" class="tab-pane " role="tabpanel" aria-labelledby="tb_2">
                                       <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">


                                          <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

                                                 <thead>
                                                  <tr class="v-grid-header">
                                                    <th class="text-center">N°</th>
                                                    <th class="text-center">CRITERIO</th>
                                                    <th class="text-center">SI / NO</th>
                                                   
                                                    <th class="text-center">Observaciones</th>
                                                  </tr>
                                                </thead>  

                                            <tbody>



                                            <tr >  <td colspan="5"  > <CENTER>2.2 Higiene y Saneamiento </CENTER> </td> </tr>

                                             <tr>
                                              <td>2.2.1</td>

                                               <input type="hidden" name="ii_2_1" value="false">

                                              <td>Los medios de almacenamiento están limpios, en buen estado de conservación y son exclusivos para el uso en el almacén de alimentos. (6.2.1)</td>
                                              <td><input type="checkbox" name="ii_2_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_2_1_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                              <td>2.2.2</td>

                                              <input type="hidden" name="ii_2_2" value="false">


                                              <td>Las operaciones de limpieza se realizan con agua potable o segura según las especificaciones del MINSA (evidenciar control  del nivel de cloro libre residual).(6.2.2)</td>
                                              <td><input type="checkbox" name="ii_2_2" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="ii_2_2_obs" style="height: 50px;"></textarea></td>
                                            </tr>




                                            <tr>

                                                <td>2.2.3</td>
                                               <td>Manejo y disposición de residuos sólidos no implica riesgo de contaminación cruzada para los alimentos almacenados. (6.2.3).</td>

                                                <input type="hidden" name="ii_2_3" value="false">


                                               <td><input type="checkbox" name="ii_2_3" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                               <td><textarea class="form-control" name="ii_2_3_obs" style="height: 50px;"></textarea></td>

                                            </tr>





                                            <tr>
                                                <td>2.2.4</td>
                                               <td>El sistema de evacuación de aguas residuales no implica riesgo de contaminación cruzada para los alimentos almacenados. (6.2.4)

                                               </td>

                                               <input type="hidden" name="ii_2_4" value="false">


                                               <td><input type="checkbox" name="ii_2_4" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                               <td><textarea class="form-control" name="ii_2_4_obs"  style="height: 50px;"></textarea></td>

                                            </tr>

                                            <tr>


                                                <td>2.2.5</td>
                                              <input type="hidden" name="ii_2_5" value="false">


                                               <td> Ausencia de animales domésticos y silvestres.(6.2.5) </td>
                                               <td><input type="checkbox" name="ii_2_5" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                               <td><textarea class="form-control"  name="ii_2_5_obs" style="height: 50px;"></textarea></td>

                                            </tr>

                                            <tr>
                                                <td>2.2.6</td>

                                                <input type="hidden" name="ii_2_6" value="false">

                                               <td>Las sustancias peligrosas se almacenana en forma segura sin riesgo para los alimentos. (6.2.6)



                                            </td>

                                               <td><input type="checkbox" name="ii_2_6" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>




                                               <td><textarea class="form-control" name="ii_2_6_obs" style="height: 50px;"></textarea></td>

                                            </tr>



                                            <tr>
                                                <td>2.2.7</td>

                                                <input type="hidden" name="ii_2_7" value="false">

                                                <td>Cuenta con programa de prevención y control de plagas efectivo.(6.2.7)




                                                </td>

                                                <td><input type="checkbox" name="ii_2_7" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>




                                                <td><textarea class="form-control" name="ii_2_7_obs" style="height: 50px;"></textarea></td>

                                            </tr>










                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>


                                    <!---end III -->

                                    <!-- IV  -->
                                    <div id="tb_3" class="tab-pane " role="tabpanel" aria-labelledby="tb_3">
                                       <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                          <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

                                           <thead>
                                            <tr class="v-grid-header">
                                              <th class="text-center">N°</th>
                                              <th class="text-center">CRITERIO</th>
                                              <th class="text-center">SI / NO</th>
                                             
                                              <th class="text-center">Observaciones</th>
                                            </tr>
                                          </thead>  

                                          <tbody>


                                          <tr >  <td colspan="5"  > <center>3. Manipuladores de Alimentos   </center> </td> </tr>
                                            <tr>
                                              <td>3.1</td>

                                              <input type="hidden" name="iii_1" value="false">


                                              <td>Los manipuladores que operan en el almacén no presentan signos asociados a enfermedades transmitidas por los alimentos,  tales como procesos diarreicos, ictericia, vómitos, procesos respiratorios, dolor de garganta con fiebre, o tener heridas infectadas o
                                                  abiertas, infecciones cutáneas, en oídos, ojos o nariz.(6.3.1)</td>
                                              <td><input type="checkbox" name="iii_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="iii_1_obs"  style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                              <td>3.2</td>

                                              <input type="hidden" name="iii_2" value="false">


                                              <td>Los manipuladores han recibido capacitación sanitaria vinculada a la actividad que realizan. (6.3.4)
                                              </td>

                                              <td><input type="checkbox" name="iii_2" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="iii_2_obs"  style="height: 50px;"></textarea></td>
                                            </tr>

                                            <tr>
                                              <td>3.3</td>
                                              <input type="hidden" name="iii_3" value="false">


                                              <td>Aseo personal y vestimenta apropiada a la actividad.(6.3.2 y 6.3.3).</td>
                                              <td><input type="checkbox" name="iii_3" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                              <td><textarea class="form-control" name="iii_3_obs" style="height: 50px;"></textarea></td>
                                            </tr>

                                           







                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>


                                   <div id="tb_4" class="tab-pane " role="tabpanel" aria-labelledby="tb_4">
                                       <div class="row">

<div class="cold-md-12 col-sm-12 col-xs-12" >




    <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

        <thead>
        <tr class="v-grid-header">
            <th class="text-center">N°</th>
            <th class="text-center">CRITERIO</th>
            <th class="text-center">SI / NO</th>
           
            <th class="text-center">Observaciones</th>
        </tr>
        </thead>

        <tbody>


        <tr >  <td colspan="5"  ><center>4. Almacenamiento de Envases  </center>  </td> </tr>



        <tr>
            <td>4.1</td>

            <input type="hidden" name="iiii_1" value="false">


            <td>El almacén de envases está limpio, en buen estado de conservación, sin presencia de elementos que favorecen la contaminación cruzada. (6.4)</td>
            <td><input type="checkbox" name="iiii_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

            <td><textarea class="form-control" name="iiii_1_obs"  style="height: 50px;"></textarea></td>
        </tr>

        <tr>
            <td>4.2</td>
            <input type="hidden" name="iiii_2" value="false">


            <td>Los envases, incluidas las tapas, se hallan protegidos de la contaminación.(6.4).</td>
            <td><input type="checkbox" name="iiii_2" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

            <td><textarea class="form-control" name="iiii_2_obs" style="height: 50px;"></textarea></td>
        </tr>







        </tbody>
    </table>





</div>




                                    </div>



                                  </div>




                                      <div id="tb_5" class="tab-pane " role="tabpanel" aria-labelledby="tb_5">
                                          <div class="cold-md-12 col-sm-12 col-xs-12" >




                                              <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

                                                  <thead>
                                                  <tr class="v-grid-header">
                                                      <th class="text-center">N°</th>
                                                      <th class="text-center">CRITERIO</th>
                                                      <th class="text-center">SI / NO</th>

                                                      <th class="text-center">Observaciones</th>
                                                  </tr>
                                                  </thead>

                                                  <tbody>


                                                  <tr >  <td colspan="5"  ><center>5. Registros de Control  </center>  </td> </tr>



                                                  <tr>
                                                      <td rowspan="8">5.1</td>

                                                      <input type="hidden" name="iiiii_1" value="false">


                                                      <td>Indicar los (X) registros en lo que procede 6.5</td>
                                                      <td><input type="checkbox" name="iiiii_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                                                      <td><textarea class="form-control" name="iiiii_1_obs" style="height: 50px;"></textarea></td>
                                                  </tr>

                                                  <tr>





                                                      <td>a)	Condiciones de almacenamiento de los alimentos que requieran condiciones controladas como temperatura y humedad. </td>

                                                      <input type="hidden" name="iiiii_1_a" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>




                                                  <tr>





                                                      <td>b)		Aplicación de los programas de prevención y control de roedores. </td>

                                                      <input type="hidden" name="iiiii_1_b" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>


                                                  <tr>





                                                      <td>c) Aplicación de los programas de limpieza y desinfección de almacenes y cámaras. </td>

                                                      <input type="hidden" name="iiiii_1_c" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_c" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>

                                                  <tr>





                                                      <td>d)	Mantenimiento de equipos de refrigeración y congelación.</td>

                                                      <input type="hidden" name="iiiii_1_d" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_d" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>

                                                  <tr>


                                                      <td>e)	Controles médicos del personal.</td>

                                                      <input type="hidden" name="iiiii_1_e" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_e" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>

                                                  <tr>


                                                      <td>f)  Capacitaciones del personal.</td>

                                                      <input type="hidden" name="iiiii_1_f" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_f" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>


                                                  <tr>


                                                      <td>g)  Información que facilita la rastreabilidad de los productos.</td>

                                                      <input type="hidden" name="iiiii_1_g" value="false">
                                                      <td><input type="checkbox" name="iiiii_1_g" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>


                                                  </tr>





                                                  </tbody>
                                              </table>





                                          </div>



                                      </div>





                                      <div id="tb_6" class="tab-pane " role="tabpanel" aria-labelledby="tb_6">
                                          <div class="row">


                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                      <label for="motivo">V. Otros Hallazgos:</label>


                                                      <textarea name="i_otras_observaciones_obs" class="form-control" rows="3" placeholder=""></textarea>

                                                  </div>

                                              </div>

                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                      <label for="motivo">VI. Observaciones / Recomendaciones:</label>

                                                      <textarea name="i_recomendaciones_obs" class="form-control" rows="3" placeholder=""></textarea>
                                                  </div>

                                              </div>

                                          </div>
                                      </div>




                                  </div>

                    </div>              



                </div>
              </div>
            

            <!--</div>
          </div>-->
         

        </div>
        <div class="modal-footer">
          <button type="button" onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

        </div>
        <!--</div>-->


      </div>
    </div>
    </form>
  </div>