<div data-backdrop="static" class="modal fade" id="modalNew" role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg " role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalTitle">Ficha Evaluacion de Sistemas de Abastecimiento de Agua en EE.SS.</h4>
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
                  <label for="exampleInputEmail1">RIS</label>
                  <input type="text" readonly="" class="form-control" id="ris" placeholder="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">

                  <label for="exampleInputPassword1">Fecha Encuesta:</label>
                  <div class="input-group date">

                    <input type="text" class="form-control pull-right" id="fecha_encuesta" placeholder="dd/mm/aaaa">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>

                </div>
              </div>






            </div>




          </div>
        </div>

        <!-- row -->
        <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">

            <table class="table  table-bordered table-condensed table-hover " style="width: 100%">
              <thead>

                <!--<tr class="v-grid-header">

                      <th></th>
                      <th>Respuesta</th>

                    </tr>-->
              </thead>
              <tbody>
                <tr class="v-grid-header">
                  <th>1. Informacion General del Sistema de Abastecimiento de Agua</th>
                  <th>Respuesta</th>
                </tr>

                <tr>
                  <td>N° de suministro de abastecimiento de agua del EE.SS.</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="numero_suministro">
                  </td>
                </tr>

                <tr>
                  <td>Tipo de Sistema de Abastecimiento</td>
                  <td class="text-center">
                    <select class="form-control" id="id_tipo_sistema" >

                    </select>
                  </td>
                </tr>

                <tr>
                  <td>N° de de Bombas de Agua</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="numero_bombas">
                  </td>
                </tr>
                <tr>
                  <td>Potencia de la Bomba de Agua</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="potencia_bomba">
                  </td>
                </tr>
                <tr>
                  <td>N° de tanques elevados</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="numero_tanques_elevados">
                  </td>
                </tr>

                <tr>
                  <td>El sistema de abastecimiento de agua indirecto funciona?</td>
                  <td class="text-center">
                    <select class="form-control" id="funciona_sistema_abastecimiento">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <td>N° servicios que tienen grifos de agua</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="numero_sistemas_con_grifo">
                  </td>
                </tr>

                <tr>
                  <td>Antiguedad de la Instalación (en años)</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="antiguedad_instalacion">
                  </td>
                </tr>

                <tr>
                  <td>Conservación física de las instalaciones del sistema: tuberias y tanque y/o cisterna</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="conservacion_tuberias_tanque">
                  </td>
                </tr>

                <tr>
                  <td>Conservación fisica del hidroneumatico, llave de control, etc</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="conservacion_hidro_llave">
                  </td>
                </tr>

                <tr>
                  <td>Horario de abastecimiento de agua</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="horario_abastecimiento">
                  </td>
                </tr>

                <tr>
                  <td>N° de grifos de agua</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="numero_grifos_agua">
                  </td>
                </tr>
                <tr>
                  <td>En caso de emergencia cuentan con un tanque anexo</td>
                  <td class="text-center">
                    <select class="form-control" id="cuenta_tanque_anexo">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>

                <tr class="v-grid-header">
                  <th>2. Caracteristicas Fisicas del sistema</th>
                  <th>Respuesta</th>
                </tr>

                <tr>
                  <td>Capacidad en m3 de cada tanque elevado</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="capacidad_tanque_elevado">
                  </td>
                </tr>
                <tr>
                  <td>Capacidad en m3 de cada Cisterna</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="capacidad_cisterna">
                  </td>
                </tr>
                <tr>
                  <td>Volumen de agua promedio anual utilizado en el EE.SS</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="volumen_agua_promedio_anual">
                  </td>
                </tr>
                <tr>
                  <td>Distancia entre la Cisterna (tanque bajo) y punto de abastecimiento externo(camión cisterna)</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="distancia_cisterna_punto">
                  </td>
                </tr>

                <tr class="v-grid-header">
                  <th>3. Seguridad del tanque</th>
                  <th>Respuesta</th>
                </tr>

                <tr>
                  <td>Hay animales como a 5 metros</td>
                  <td class="text-center">
                    <select class="form-control" id="animales_cinco_metros">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tiene cerco perimetral</td>
                  <td class="text-center">
                    <select class="form-control" id="tiene_cerco_perimetral_tanque">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Es posible que ingresen personas ajenas</td>
                  <td class="text-center">
                    <select class="form-control" id="posible_ingreso_ajenos">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>El material de la tapa es adecuado</td>
                  <td class="text-center">
                    <select class="form-control" id="material_tapa_adecuado">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>La tapa del tanque esta en buen estado de limpieza</td>
                  <td class="text-center">
                    <select class="form-control" id="tapa_tanque_buen_estado">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>La estructura del tanque presenta fisuras</td>
                  <td class="text-center">
                    <select class="form-control" id="tanque_presenta_fisuras">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Las paredes interiores estan limpias</td>
                  <td class="text-center">
                    <select class="form-control" id="paredes_interiores_limpias">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Existen natas flotantes o materiales extraños dentro del tanque</td>
                  <td class="text-center">
                    <select class="form-control" id="natas_flotantes_tanque">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Es posible que ingrese agua por lluvia</td>
                  <td class="text-center">
                    <select class="form-control" id="posible_ingreso_lluvia">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Existen residuos sólidos a menos de 25 m.</td>
                  <td class="text-center">
                    <select class="form-control" id="residuos_solidos_cercanos">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>

                <tr class="v-grid-header">
                  <th>4. Seguridad de la Cisterna</th>
                  <th>Respuesta</th>
                </tr>

                <tr>
                  <td>Tiene cerco perimetral</td>
                  <td class="text-center">
                    <select class="form-control" id="tiene_cerco_perimetral_cisterna">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>La boca de la cisterna esta al raz del piso</td>
                  <td class="text-center">
                    <select class="form-control" id="boca_cisterna_raz_piso">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Presencia de inservibles a menos de 10 metros</td>
                  <td class="text-center">
                    <select class="form-control" id="inservibles_cercanos">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>

                <tr class="v-grid-header">
                  <th>5. Caracteristicas del agua</th>
                  <th>Respuesta</th>
                </tr>

                <tr>
                  <td>Fecha de muestreo</td>
                  <td class="text-center">
                    <div class="form-group">

                      
                      <div class="input-group date">

                        <input type="text" class="form-control pull-right" id="fecha_muestreo" placeholder="dd/mm/aaaa">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>

                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Hora de muestreo</td>
                  <td class="text-center">
                    <div class="form-group">

                      
                      <div class="input-group date">

                        <input type="text" class="form-control pull-right" id="hora_muestreo" placeholder="">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>

                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Punto de muestreo</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="punto_muestreo">
                  </td>
                </tr>


                <tr>
                    <td colspan="2">
                          <div class="row">
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                Cloro residual (mg/L):
                              </div>
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="cloro_residual" value="0">
                              </div>
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                pH:
                              </div>
                              <div class="col-md-3 col-sm-12 col-xs-12">
                              <input type="text" class="form-control" id="ph" value="0">
                              </div>

                          </div>
                    </td>

                </tr>

                <tr>
                  <td>Frecuencia con la que se mide el cloro Residual (especificar):</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="frecuencia_medicion_cloro">
                  </td>
                </tr>
                <tr>
                  <td>Se tomó muestras para análisis microbióligoc:</td>
                  <td class="text-center">
                    <select class="form-control" id="toma_muestra_am">
                      <option value="">Seleccione</option>
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </td>
                </tr>

                <tr class="v-grid-header">
                  <th>6. Desinfeccion de tanques elevados y cisternas</th>
                  <th>Respuesta</th>
                </tr>
                <tr>
                  <td>Fecha de última limpieza y desinfección</td>
                  <td class="text-center">
                    <div class="form-group">

                      
                      <div class="input-group date">

                        <input type="text" class="form-control pull-right" id="fecha_ultima_limpieza" placeholder="dd/mm/aaaa">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>

                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Empresa que realizó el servicio:</td>
                  <td class="text-center">
                    <input type="text" class="form-control" id="empresa_realizo_servicio">
                  </td>
                </tr>



              </tbody>
            </table>
          </div>


        </div>
        <!--  -->

      </div>


      <div class="modal-footer">
        <button type="button" onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

      </div>
      <!--</div>-->


    </div>
  </div>

</div>