<div data-backdrop="static" class="modal fade" id="modalNew" role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg " role="document" style="width: 70%;">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalTitle">Ficha Vigilancia de Piscinas</h4>
      </div>

      <div class="modal-body">

        <div class="panel panel-success">
          <div class="modal-header modal-header-success">
            Datos de la Ficha
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-md-3">

                <div class="form-group">
                  <label for="local">Establecimiento Registro:</label>
                  <input type="text" class="form-control" id="local" placeholder="" disabled>
                </div>

              </div>


              <div class="col-md-2">

                <div class="form-group">
                  <label for="local">Tipo de Acta:</label>

                  <select class="form-control" id="tipo_inspeccion"></select>

                </div>

              </div>




              <div class="col-md-3">
                <div class="form-group">

                  <label for="fecha_encuesta">Fecha Encuesta:</label>
                  <div class="input-group date">

                    <input type="text" class="form-control pull-right" id="fecha_encuesta" placeholder="dd/mm/aaaa">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">

                  <label for="hora_inicio">Hora Inicio:</label>
                  <div class="input-group date">

                    <input type="time" class="form-control pull-right" id="hora_inicio" placeholder="hh:mm">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">

                  <label for="hora_fin">Hora Termino:</label>
                  <div class="input-group date">

                    <input type="time" class="form-control pull-right" id="hora_fin" placeholder="hh:mm">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ruc" class="col-form-label">RUC:</label>
                  <div class="input-group">
                    <input type="hidden" id="id_entidad">
                    <input type="hidden" id="id_persona">
                    <input type="hidden" id="id_ficha">
                    <input type="text" class="form-control text-uppercase" id="ruc" placeholder="RUC">

                    <div class="input-group-btn">
                      <button class="btn btn-default" id="btnfindRuc" type="button" onclick="buscar_entidad();">
                        <i class="glyphicon glyphicon-search" title="Buscar en SUNAT"></i>
                      </button>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="razon_social">Nombre o Razon Social:</label>
                  <input type="text" class="form-control" id="razon_social" placeholder="Razon Social">
                </div>
              </div>




              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ubigeo">Distrito:</label>
                  <select class='form-control select2  text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;">
                  </select>
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="razon_social">Direccion:</label>
                  <input type="text" class="form-control" id="direccion_empresa" placeholder="Direccion">
                </div>
              </div>

              <div class="col-md-1 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="razon_social">Coord Este:</label>
                  <input type="text" class="form-control" id="long_este" placeholder="">
                </div>
              </div>

              <div class="col-md-1 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="razon_social">Coord Norte:</label>
                  <input type="text" class="form-control" id="long_norte" placeholder="">
                </div>
              </div>






            </div>
            <div class="row">

              <div class="col-md-3">
                <label for="telefono_fijo" class="col-form-label">Telefono Fijo:</label>
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" id="telefono_fijo_empresa" placeholder="Telefono Fijo">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="col-md-3">
                <label for="Celular" class="col-form-label">Celular:</label>
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" id="celular_empresa" placeholder="Celular">
                  <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="col-md-3">
                <label for="Email" class="col-form-label">E-mail:</label>
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" id="email_empresa" placeholder="Email">
                  <span class="fa fa-envelope  form-control-feedback right" aria-hidden="true"></span>

                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="razon_social">Representado Por:</label>
                  <input type="text" class="form-control" id="nombre_representante" placeholder="Nombre del representante">
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12 x_title">
                <label class="text-success">Datos de la persona que atiende al momento de realizar la inspección</label>
              </div>

              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_doc">Tipo Doc:</label>
                  <select class="form-control" id="tipo_doc"></select>
                </div>
              </div>


              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="numero_doc" class="col-form-label">Numero Doc:</label>
                  <div class="input-group">

                    <input type="text" class="form-control text-uppercase" id="numero_doc" placeholder="Numero">

                    <div class="input-group-btn">
                      <button class="btn btn-default" type="button" onclick="buscar_persona();">
                        <i class="glyphicon glyphicon-search" id="btnFindPersona" title="Buscar en RENIEC"></i>
                      </button>
                    </div>
                  </div>
                </div>

              </div>


              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="nombres">Nombres:</label>
                  <input type="text" class="form-control" id="nombres" placeholder="Nombres">
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ape_paterno">Primer Apellido:</label>
                  <input type="text" class="form-control" id="ape_paterno" placeholder="Primero Apellido">
                </div>
              </div>

              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ape_materno">Segundo Apellido:</label>
                  <input type="text" class="form-control" id="ape_materno" placeholder="Segundo Apellido">
                </div>
              </div>



            </div>



          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-condensed ">
              <tr class="v-grid-header">
                <td colspan="7" class="text-center" style="font-weight: bold;">Tabla de Valores de Parametros</td>

              </tr>
              <tr style="font-weight: bold;" class="v-grid-header">
                <td>Parametro</td>
                <td class="text-center">V.N. (Valor Normal)</td>
                <td class="text-center">Color</td>
                <td class="text-center">Condición</td>
                <td class="text-center">Fuera del V.N.</td>
                <td class="text-center">Color</td>
                <td class="text-center">Condición</td>
              </tr>
              <tr>
                <td>Turbidez</td>
                <td class="text-center">
                  <=5< /td>
                <td class="text-center success"></td>
                <td class="text-center">Apto</td>
                <td class="text-center">>5</td>
                <td class="text-center danger"></td>
                <td class="text-center">No apto</td>
              </tr>
              <tr>
                <td>PH</td>
                <td class="text-center"> >=6.5 y <=8.5< /td>
                <td class="text-center success"></td>
                <td class="text-center">Apto</td>
                <td class="text-center">
                  < 6.5 ó> 8.5
                </td>
                <td class="text-center danger"></td>
                <td class="text-center">No apto</td>
              </tr>
              <tr>
                <td>Cloro Residual</td>
                <td class="text-center"> >=0.4 y <=1.2< /td>
                <td class="text-center success"></td>
                <td class="text-center">Apto</td>
                <td class="text-center">
                  < 0.4 o> 1.2
                </td>
                <td class="text-center danger"></td>
                <td class="text-center">No apto</td>
              </tr>

            </table>
          </div>
        </div>



        <div class="panel panel-primary">
          <div class="panel-heading">
            A) Control Calidad Microbiologica
          </div>
          <div class="panel-body">

            <div class="row">

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group ">
                  <label for="tipo_1">Tipo Piscina:</label>

                  <div class="input-group">
                    <span class="input-group-btn">
                      <input type="checkbox" id="chkrow1" class="flat" checked="checked" onchange="evalrow1();">
                    </span>

                    <input type="text" class="form-control" id="tipo_1" value="Patera" disabled />

                  </div>

                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_cloro_residual_1">Cloro:</label>
                  <input type="text" class="form-control numeric cloro" id="resul_cloro_residual_1" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_ph_1">Ph:</label>
                  <input type="text" class="form-control numeric ph" id="resul_ph_1" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_temperatura_1">T°(°C):</label>
                  <input type="text" class="form-control numeric" id="resul_temperatura_1" value="0.00">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_turbidez_1">Turbidez:</label>
                  <input type="text" class="form-control numeric turbidez" id="resul_turbidez_1" value="0.00">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_2">Tipo Piscina:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <input type="checkbox" id="chkrow2" class="flat" checked="checked">
                    </span>
                    <input type="text" class="form-control " id="tipo_2" value="N° 1" disabled />
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_cloro_residual_2">Cloro:</label>
                  <input type="text" class="form-control numeric cloro" id="resul_cloro_residual_2" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_ph_2">Ph:</label>
                  <input type="text" class="form-control numeric ph" id="resul_ph_2" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_temperatura_2">T°(°C):</label>
                  <input type="text" class="form-control numeric" id="resul_temperatura_2" value="0.00">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_turbidez_2">Turbidez:</label>
                  <input type="text" class="form-control numeric turbidez" id="resul_turbidez_2" value="0.00">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_3">Tipo Piscina:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <input type="checkbox" id="chkrow3" class="flat" checked="checked">
                    </span>
                    <input type="text" class="form-control" id="tipo_3" value="N° 2" disabled />
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_cloro_residual_3">Cloro:</label>
                  <input type="text" class="form-control numeric cloro" id="resul_cloro_residual_3" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_ph_3">Ph:</label>
                  <input type="text" class="form-control numeric ph" id="resul_ph_3" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_temperatura_3">T°(°C):</label>
                  <input type="text" class="form-control numeric" id="resul_temperatura_3" value="0.00">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_turbidez_3">Turbidez:</label>
                  <input type="text" class="form-control numeric turbidez" id="resul_turbidez_3" value="0.00">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_4">Tipo Piscina:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <input type="checkbox" id="chkrow4" class="flat" checked="checked">
                    </span>
                    <input type="text" class="form-control" id="tipo_4" value="N° 3" disabled />
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_cloro_residual_4">Cloro:</label>
                  <input type="text" class="form-control numeric cloro" id="resul_cloro_residual_4" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_ph_4">Ph:</label>
                  <input type="text" class="form-control numeric ph" id="resul_ph_4" value="0.00">
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_temperatura_4">T°(°C):</label>
                  <input type="text" class="form-control numeric" id="resul_temperatura_4" value="0.00">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="resul_turbidez_4">Turbidez:</label>
                  <input type="text" class="form-control numeric turbidez" id="resul_turbidez_4" value="0.00">
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="panel panel-info">
          <div class="modal-header modal-header-success">
            B) Control de calidad de Limpieza
          </div>
          <div class="panel-body">

            <div class="row">
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_lavapies">Lavapiés:</label>
                  <select class="form-control" id="tipo_lavapies" onchange="process_result();"></select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_sshh">SS.HH.:</label>
                  <select class="form-control" id="tipo_sshh" onchange="process_result();"></select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="tipo_recirculacion">Sistema de Recirculación:</label>
                  <select class="form-control" id="tipo_recirculacion" onchange="process_result();"></select>
                  <!--<input type="checkbox" onchange="process_result();" id="tipo_recirculacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="Funciona" data-off="No funciona" data-onstyle="success" data-offstyle="info">-->


                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="panel panel-warning">
          <div class="modal-header modal-header-warning">
            C) Control de Calidad Equipamiento e Instalaciones
          </div>
          <div class="panel-body">

            <div class="row">

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="limpieza_local">Limpieza del local:</label>
                  <input type="checkbox" onchange="process_result();" id="limpieza_local" data-toggle="toggle" data-width="100%" data-size="small" data-on="Limpio" data-off="Sucio" data-onstyle="success" data-offstyle="info">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="limpieza_estanque">Limpieza del Estanque:</label>
                  <!--<input type="checkbox" onchange="process_result();" id="limpieza_estanque" data-toggle="toggle" data-width="100%" data-size="small" data-on="Agua sobre el nivel" data-off="Agua debajo el nivel" data-onstyle="success" data-offstyle="info">-->

                 <select class="form-control" id="limpieza_estanque" onchange="process_result();"></select> 

                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="criador_aedes_aegypti">Criaderos de Aedes aegypti:</label>
                  <input type="checkbox" onchange="process_result();" id="criador_aedes_aegypti" data-toggle="toggle" data-width="100%" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="cuerpos_agua">Cuerpos de agua:</label>
                  <input type="checkbox" onchange="process_result();" id="cuerpos_agua" data-toggle="toggle" data-width="100%" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                </div>
              </div>

            </div>

          </div>
        </div>


        <div class="row">

          <div class="col-md-8 col-sm-12 col-xs-12">


            <div class="panel panel-primary">
              <div class="panel-heading">
                D) Control de Ordenamiento Documentario
              </div>
              <div class="panel-body">

                <div class="row">

                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label for="cuaderno_registro">Cuaderno o Libro de registro:</label>
                      <input type="checkbox" onchange="process_result();" id="cuaderno_registro" data-toggle="toggle" data-width="100%" data-size="small" data-on="Está al día" data-off="No está al día" data-onstyle="success" data-offstyle="info">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label for="aprobacion_sanitaria">Aprobación Sanitaria?:</label>
                      <input type="checkbox" onchange="process_result();" id="aprobacion_sanitaria" data-toggle="toggle" data-width="100%" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label for="nro_aprobacion_sanitaria">Nro de aprobación sanitaria:</label>
                      <input type="text" class="form-control" id="nro_aprobacion_sanitaria" placeholder="Nro de aprobación">
                    </div>
                  </div>

                </div>

              </div>
            </div>

          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="panel panel-info">
              <div class="modal-header modal-header-info">
                Resultado Final
              </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-12 ">
                          <div class="tile-stats green text-center" id="div_resultado" >
                              <div class="icon"><i class="fa fa-check green" id="icon_resultado"></i>
                              </div>
                              <div class="count" id="label_resultado">Apto</div>
                          </div>  
                      </div>
                  </div>
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