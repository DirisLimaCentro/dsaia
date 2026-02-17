<div data-backdrop="static" class="modal fade" id="modalNew" role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg " role="document">
    <form id="frmmodal">
      <div class="modal-content" id="modal-content">

        <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success">
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
                      <input type="hidden" name="id_local" id="id_local">

                      <input type="text" class="form-control pull-right" id="fecha_inicio" name="fecha_inicio" placeholder="dd/mm/aaaa">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="hora">Hora Inicio</label>
                    <input type="text" class="form-control" id="hora_inicio" name="hora_inicio" placeholder="">
                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Termino:</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_termino" name="fecha_termino" placeholder="dd/mm/aaaa">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="hora">Hora Termino</label>
                    <input type="text" class="form-control" id="hora_termino" name="hora_termino" placeholder="">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="hora">Registrado por</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" disabled="">
                  </div>
                </div>

              </div>

              <div class="row">


                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="ruc" class="col-form-label">RUC:</label>
                    <div class="input-group">
                      <input type="hidden" id="id_entidad" name="id_entidad" value="0">
                      <input type="hidden" id="id_persona" name="id_persona" value="0">
                      <input type="hidden" id="id_ficha" name="id_ficha" value="0">
                      <input type="hidden" id="id_resultado" name="id_resultado" value="0">
                      <input type="hidden" id="cnt_total" name="cnt_total" value="0">
                      <input type="text" class="form-control text-uppercase" id="ruc" name="ruc" placeholder="RUC">

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
                    <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Razon Social">
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="razon_social">Direccion:</label>
                    <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Direccion">
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="ubigeo">Distrito:</label>
                    <select class='form-control select2  text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;">
                    </select>
                  </div>
                </div>

              </div>


              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sector</label>
                    <select class='form-control' id='sector' name='sector' onchange="getLocalidades('');">
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Localidad</label>
                    <select class='form-control input-sm select2 itemNamedist text-uppercase' name='id_localidad' id='id_localidad' style="width: 100%">
                    </select>
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="razon_social">Coordenada este:</label>
                    <input type="text" class="form-control" id="long_este" name="long_este" placeholder="">
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="razon_social">Coordenada Norte:</label>
                    <input type="text" class="form-control" id="long_norte" name="long_norte" placeholder="">
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
                    <label for="representante_legal">Representante Legal:</label>
                    <input type="text" class="form-control text-uppercase" id="representante_legal" name="representante_legal" placeholder="">
                  </div>
                </div>


              </div>

              <div class="row">



                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">Licencia Municipal:</label>
                    <input type="text" class="form-control text-uppercase" id="licencia" name="licencia" placeholder="">
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">Responsable:</label>
                    <input type="text" class="form-control text-uppercase" id="responsable" name="responsable" placeholder="">
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">Cargo:</label>
                    <input type="text" class="form-control text-uppercase" id="cargo" name="cargo" placeholder="">
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">N° Dias Actividad:</label>
                    <input type="text" class="form-control text-right" id="dias_actividad" name="dias_actividad" placeholder="">
                  </div>
                </div>


              </div>

              <div class="row">



                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">Horario:</label>
                    <input type="text" class="form-control text-uppercase" id="horario_atencion" name="horario_atencion" placeholder="">
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">N° Manipuladores Hombres
                      :</label>
                    <input type="text" class="form-control text-right" id="nro_hombres" name="nro_hombres" placeholder="">
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="representante_legal">N° Manipuladores Mujeres:</label>
                    <input type="text" class="form-control text-right" id="nro_mujeres" name="nro_mujeres" placeholder="">
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

            <div class="col-md-2 col-sm-12 col-xs-12">
                  <h2 style="font-weight: bold;" id="div_valoracion">Puntaje Total: 0</h2>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
                  <h2 style="font-weight: bold;" id="div_result"></h2>
            </div>
          </div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">



              <div class="tabs-container">

                <ul class="nav nav-tabs bar_tabs">

                  <li class="active">
                    <a data-toggle="tab" role="tab" aria-controls="tb_0" class="nav-link active show" aria-selected="false" href="#tb_0"><span class="round-tabs two">

                      </span>I. Ubicación, Infraestructura</a>
                  </li>

                  <li class="nav-link">
                    <a data-toggle="tab" role="tab" aria-controls="tb_1" class="nav-link " aria-selected="true" href="#tb_1"><span class="round-tabs two">

                      </span>II. Manipuladores de Alimentos</a>
                  </li>
                  <li>
                    <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_2" aria-selected="false" href="#tb_2"><span class="round-tabs two">

                      </span>III. Buenas practicas de manipulación</a>
                  </li>

                  <li>
                    <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_3" aria-selected="false" href="#tb_3"><span class="round-tabs two">

                      </span>IV. Programa de higiene y saneamiento</a>
                  </li>

                  <li>
                    <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tb_4" aria-selected="false" href="#tb_4"><span class="round-tabs two">

                      </span>V. Otros</a>
                  </li>

                </ul>

                <div class="tab-content">

                  <div id="tb_0" class="tab-pane active" role="tabpanel" aria-labelledby="tb_0">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">


                        <table class="table  table-bordered table-condensed table-hover " style="width: 100%">

                          <thead>
                            <tr class="v-grid-header">
                              <th class="text-center">N°</th>
                              <th class="text-center">CRITERIO</th>
                              <th class="text-center">SI / NO</th>
                              <th class="text-center">Riesgo</th>
                              <th class="text-center">Observaciones</th>
                            </tr>
                          </thead>

                          <tbody>



                            <tr class="tr_primary">
                              <td>1.1</td>
                              <input type="hidden" name="i_1" value="false">
                              <td>El ambiente donde se elaboran los alimentos, es de usoexclusivo para la preparaci&oacute;n de alimentos. (5.2.1)</td>
                              <td><input type="checkbox" onchange="resaltar('i_1'); " name="i_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_1_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>1.2</td>
                              <input type="hidden" name="i_2" value="false">
                              <td>Se encuentra en buen estado de conservaci&oacute;n e higiene. (5.2.1)</td>
                              <td><input type="checkbox" name="i_2" onchange="resaltar('i_2'); " value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_2_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.3</td>
                              <input type="hidden" name="i_3" value="false">
                              <td>El dise&ntilde;o favorece el flujo ordenado y secuencial de lasoperaciones de preparaci&oacute;n de los alimentos. (5.2.1)</td>
                              <td><input type="checkbox" name="i_3"  value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_3_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.4</td>
                              <input type="hidden" name="i_4" value="false">
                              <td>Cuenta con sistema de evacuaci&oacute;n de humos y gases derivadosde la actividad de preparaci&oacute;n de alimentos. (5.2.1)</td>
                              <td><input type="checkbox" name="i_4" value="false"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_4_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.5</td>
                              <input type="hidden" name="i_5" value="false">
                              <td>La iluminaci&oacute;n de los ambientes y almacenes favorece la visuallzacl&oacute;n de las operaciones de recepci&oacute;n, almacenamiento, preparaci&oacute;n, despacho/transporte de alimentos para ejecutarlas de manera higi&eacute;nica. (5.2.2) (6.2.1)</td>
                              <td><input type="checkbox" name="i_5" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_5_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.6</td>
                              <input type="hidden" name="i_6" value="false">
                              <td>La ventilaci&oacute;n de los ambientes y almacenes impide la presencia de signos de acumulaci&oacute;n de humedad (gotas por condensaci&oacute;n, manchas por mohos, otros). (5.2,2)</td>
                              <td><input type="checkbox" name="i_6" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_6_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>1.7</td>
                              <input type="hidden" name="i_7" value="false">
                              <td>El agua utilizada cumple los requisitos de potabilidad para el consumo humano; Cloro libre residual m&iacute;nimo 0.5 ppm en el punto de consumo</td>
                              <td><input type="checkbox" name="i_7" onchange="resaltar('i_7');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_7_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>1.8</td>
                              <input type="hidden" name="i_8" value="false">
                              <td>Abastecimiento de agua suficiente para ei nivel de productividaddel establecimiento. (5.2.3)</td>
                              <td><input type="checkbox" name="i_8" onchange="resaltar('i_8');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_8_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>1.9</td>
                              <input type="hidden" name="i_9" value="false">
                              <td>ACOPIO: Los residuos s&oacute;lidos (basura) incluida la vajilla desechable o descartada en las operaciones de preparaci&oacute;n de - alimentos, se segrega y se acopia en &aacute;rea independiente o separada de los ambientes de proceso. (5.2.4)</td>
                              <td><input type="checkbox" name="i_9" onchange="resaltar('i_9');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_9_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>1.10</td>
                              <input type="hidden" name="i_10" value="false">
                              <td>Las aguas residuales se evac&uacute;an a la red de alcantarillado enforma sanitaria, contando con trampas de grasa y protecci&oacute;ncontra reflujos y rebose, seg&uacute;n corresponda. (5.2,4)</td>
                              <td><input type="checkbox" name="i_10" onchange="resaltar('i_10');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_10_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.11</td>
                              <input type="hidden" name="i_11" value="false">
                              <td>Dispone de sistema de recolecci&oacute;n y disposici&oacute;n sanitaria deaceites usados en frituras. (5.2.4)</td>
                              <td><input type="checkbox" name="i_11" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_11_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.12</td>
                              <input type="hidden" name="i_12" value="false">
                              <td>Cuenta con vestuario de uso exclusivo para el persona! con facilidades para disponer de ropa de trabajo. (5.2.5)</td>
                              <td><input type="checkbox" name="i_12" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_12_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.13</td>
                              <input type="hidden" name="i_13" value="false">
                              <td>Dispone de Servicios Higi&eacute;nicos (SSHH) operativos yordenados, en ambientes por separado para personalManipulador y para comensales. (5.2.5)</td>
                              <td><input type="checkbox" name="i_13" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_13_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.14</td>
                              <input type="hidden" name="i_14" value="false">
                              <td>Los SSHH para comensales, se encuentran operativos, en buenestado de conservaci&oacute;n e higiene, en ambiente iluminado yventilado. (5.2.5)</td>
                              <td><input type="checkbox" name="i_14" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_14_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td rowspan="2" style="vertical-align: middle;">1.15</td>

                              <input type="hidden" name="i_15_a" value="false">

                              <td>En los SSHH, los lavatorios cuentan con dispensadores de jab&oacute;n, medios de secado de manos. (5.2.5)</td>
                              <td><input type="checkbox" name="i_15_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_15_a_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>

                              <td>En los SSHH se cuentan con mensajes instructivos para su uso correcto incluyendo la pr&aacute;ctica de lavado de manos, entre otros. (6.2.3)</td>
                              <input type="hidden" name="i_15_b" value="false">

                              <td><input type="checkbox" name="i_15_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_15_b_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.16</td>

                              <input type="hidden" name="i_16" value="false">

                              <td>De contar con lavadero de manos en sala o &aacute;rea de Bar (de corresponder), se dispone de agua segura y su instalaci&oacute;n tiene conexi&oacute;n con la red de desag&uuml;e, (5.2.6), (6.2.2)</td>
                              <td><input type="checkbox" name="i_16" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_16_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.17</td>
                              <input type="hidden" name="i_17" value="false">

                              <td>De contar con m&oacute;dulos de lavado de manos en &aacute;rea de atenci&oacute;n a comensales, estos son de material sanitario en buen estado de conservaci&oacute;n e higiene, provisto de dispensadores de jab&oacute;n,medios de secado de manos, (5.2.5)</td>
                              <td><input type="checkbox" name="i_17" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_17_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td rowspan="2" style="vertical-align: middle;">1.18</td>


                              <input type="hidden" name="i_18_a" value="false">

                              <td>Cada ambiente de preparaci&oacute;n de alimentos, dispone de unlavadero de manos de uso exclusivo, provistos dedispensadores de jab&oacute;n, medios de secado de manos. (5,2.6)</td>
                              <td><input type="checkbox" name="i_18_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_18_a_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>

                              <input type="hidden" name="i_18_b" value="false">

                              <td>Cada ambiente de preparaci&oacute;n de alimentos cuenta con mensajes instructivos de la pr&aacute;ctica de lavado de manos. (5.2.5)</td>
                              <td><input type="checkbox" name="i_18_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_18_b_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>1.19</td>

                              <input type="hidden" name="i_19" value="false">

                              <td>Si usa hielo o agua para descongelamiento, esta es con agua segura (6.2.1 - 6.2.2)</td>
                              <td><input type="checkbox" name="i_19" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="i_19_obs" style="height: 50px;"></textarea></td>
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

                        <table class="table  table-bordered table-condensed table-hover " style="width: 100%">

                          <thead>
                            <tr class="v-grid-header">
                              <th class="text-center">N°</th>
                              <th class="text-center">CRITERIO</th>
                              <th class="text-center">SI / NO</th>
                              <th class="text-center">Riesgo</th>
                              <th class="text-center">Observaciones</th>
                            </tr>
                          </thead>

                          <tbody>



                            <tr>
                              <td>2.1</td>

                              <input type="hidden" name="ii_1" value="false">

                              <td>El personal al momento de la inspecci&oacute;n, presenta signos vinculados con ETA, tales como: ictericia, v&oacute;mitos, procesosrespiratorios, dolor de garganta, fiebre o tener heridas infectadaso abiertas, infecciones cut&aacute;neas, en o&iacute;dos, ojos o nariz. (6.3.1)</td>
                              <td><input type="checkbox" name="ii_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="ii_1_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td rowspan="2" style="vertical-align: middle;">2.2</td>

                              <input type="hidden" name="ii_2_a" value="false">

                              <td>El personal mantiene rigurosa higiene personal, (cabello limpio,corto o recogido, manos limpias, u&ntilde;as cortas, sin esmalte, nollevar art&iacute;culos de uso personal como: aretes, sortijas, collares,piercing, pulseras, reloj, celular, llaves, lapiceros, entre otros)</td>
                              <td><input type="checkbox" name="ii_2_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="ii_2_a_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <input type="hidden" name="ii_2_b" value="false">

                              <td>En la inspecci&oacute;n se evidencia que el personal NO fuma, come,masca chicle, no escupe durante las operaciones con alimentos</td>
                              <td><input type="checkbox" name="ii_2_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="ii_2_b_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>

                              <input type="hidden" name="ii_3_a" value="false">

                              <td rowspan="2" style="vertical-align: middle;">2.3</td>
                              <td>La vestimenta (gorro, mandil, calzado, otros) es de color blancoy/o claro y de uso exclusivo para el &aacute;rea de trabajo y cubre laropa de uso personal</td>
                              <td><input type="checkbox" name="ii_3_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="ii_3_a_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <input type="hidden" name="ii_3_b" value="false">

                              <td>La vestimenta descrita est&aacute; limpia y en buen estado deconservaci&oacute;n</td>
                              <td><input type="checkbox" name="ii_3_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="ii_3_b_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>2.4</td>

                              <input type="hidden" name="ii_4" value="false">


                              <td>Los manipuladores de alimentos tienen capacitaciones enfunci&oacute;n a cada &aacute;rea de trabajo. (6.3.4)</td>
                              <td><input type="checkbox" name="ii_4" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="ii_4_obs" style="height: 50px;"></textarea></td>
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


                        <table class="table  table-bordered table-condensed table-hover " style="width: 100%">

                          <thead>
                            <tr class="v-grid-header">
                              <th class="text-center">N°</th>
                              <th class="text-center">CRITERIO</th>
                              <th class="text-center">SI / NO</th>
                              <th class="text-center">Riesgo</th>
                              <th class="text-center">Observaciones</th>
                            </tr>
                          </thead>

                          <tbody>

                            <tr class="tr_primary">
                              <td>3.1</td>

                              <input type="hidden" name="iii_1" value="false">

                              <td>Las operaciones relacionadas con la elaboraci&oacute;n de losalimentos mantienen un flujo ordenado, incluyendo a losmanipuladores evitando la contaminaci&oacute;n cruzada, desde laadquisici&oacute;n de materias primas hasta el servido</td>
                              <td><input type="checkbox" onchange="resaltar('iii_1');" name="iii_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_1_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.2</td>

                              <input type="hidden" name="iii_2" value="false">


                              <td>Cuenta con , ambiente o ambientes de almacenamiento,separado de las &aacute;reas de preparaci&oacute;n. (6.2.1)</td>
                              <td><input type="checkbox" name="iii_2" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_2_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td rowspan="5">3.3</td>
                              <td>De contar con ambiente de almacenamiento, los registros de los productos estan actualizados por lo menos con la siguiente informacion</td>
                              <td></td>
                              <td class="text-center"></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td>Fecha de ingreso y salida (Sistema PEPS)</td>

                              <input type="hidden" name="iii_3_a" value="false">


                              <td><input type="checkbox" name="iii_3_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_3_a_obs" style="height: 50px;"></textarea></td>

                            </tr>

                            <tr>
                              <td>Informaci&oacute;n del rotulado y fecha vencimiento</td>

                              <input type="hidden" name="iii_3_b" value="false">


                              <td><input type="checkbox" name="iii_3_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_3_b_obs" style="height: 50px;"></textarea></td>

                            </tr>

                            <tr>

                              <input type="hidden" name="iii_3_c" value="false">


                              <td>Control de temperatura y/o humedad de ambiente (paraalimentos que no requieren refrigeraci&oacute;n/congelaci&oacute;n)</td>
                              <td><input type="checkbox" name="iii_3_c" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_3_c_obs" style="height: 50px;"></textarea></td>

                            </tr>

                            <tr class="tr_primary">
                              <input type="hidden" name="iii_3_d" value="false">


                              <td>Control de temperatura refrigerado (4 a 1&deg;C) (de corresponder) y/o Control de temperatura congelado (menor o igual a -18&deg;C) (de corresponder)</td>
                              <td><input type="checkbox" name="iii_3_d" onchange="resaltar('iii_3_d');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_3_d_obs" style="height: 50px;"></textarea></td>

                            </tr>

                            <tr>
                              <td>3.4</td>
                              <input type="hidden" name="iii_4" value="false">


                              <td>El ingreso de materias primas e insumos se realiza enambiente protegido e iluminado, (6,2.1)</td>
                              <td><input type="checkbox" name="iii_4" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_4_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.5</td>

                              <input type="hidden" name="iii_5" value="false">


                              <td>Se cuenta con registros de proveedores y de ingreso de cada lote de alimentos, que permite su rastreabilidad. (6.2.1)</td>
                              <td><input type="checkbox" name="iii_5" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_5_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td rowspan="2">3.6</td>

                              <input type="hidden" name="iii_6_a" value="false">

                              <td>El procesamiento previo de alimentos crudos (frescos,refrigerados o congelados), mantienen una secuenciaordenada de operaciones en condiciones de higiene demanera que no implica riesgo de contaminaci&oacute;n cruzada paralos alimentos de consumo final. (6.2.1)</td>
                              <td><input type="checkbox" name="iii_6_a" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_6_a_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <input type="hidden" name="iii_6_b" value="false">

                              <td>Las hortalizas y frutas son sometidas a un proceso de lavado y desinfecci&oacute;n. (6.2.1)</td>
                              <td><input type="checkbox" onchange="resaltar('iii_6_b');" name="iii_6_b" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_6_b_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.7</td>

                              <input type="hidden" name="iii_7" value="false">


                              <td>El procesamiento intermedio - Cocci&oacute;n/ Blanqueado/ Fritura/ Horneado/otros - mantienen una secuencia ordenada deoperaciones en condiciones de higiene de manera que noimplica riesgo de contaminaci&oacute;n cruzada para los alimentos deconsumo final</td>
                              <td><input type="checkbox" name="iii_7" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_7_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.8</td>

                              <input type="hidden" name="iii_8" value="false">


                              <td>El procesamiento final y acondicionamiento de platos oraciones - mantienen una secuencia ordenada de operacionesen condiciones de higiene de manera que no implica riesgo decontaminaci&oacute;n cruzada para los alimentos de consumo final.(6.2.1)</td>
                              <td><input type="checkbox" name="iii_8" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_8_obs" style="height: 50px;"></textarea></td>
                            </tr>


                            <tr>
                              <td>3.9</td>

                              <input type="hidden" name="iii_9" value="false">

                              <td>La entrega de alimentos a las &aacute;reas de AUTOSERVICIO,SERVIDO EN MESA o DESPACHO a domicilio cuenta conregistros de control de temperaturas de conservaci&oacute;n: servidoen fr&iacute;o y/o en caliente y elimina los saldos y descartes de cadalote de alimentos, que permite su rastreabil&iacute;dad hacia atr&aacute;s.(6.2.2)</td>
                              <td><input type="checkbox" name="iii_9" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_9_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.10</td>

                              <input type="hidden" name="iii_10" value="false">


                              <td>El SERVIDO EN MESA o DESPACHO para llevar raciones yplatos, debe considerar el uso de vajilla, mobiliario, manteler&iacute;a,seg&uacute;n corresponda; en buen estado de conservaci&oacute;n e higiene(6.2.2)</td>
                              <td><input type="checkbox" name="iii_10" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_10_obs" style="height: 50px;"></textarea></td>
                            </tr>


                            <tr>
                              <td>3.11</td>

                              <input type="hidden" name="iii_11" value="false">


                              <td>Las bebidas se sirven en sus envases originales, en vasos deprimer uso (descartadle) o de material no descartable limpio eIntegro. (6.2.2)</td>
                              <td><input type="checkbox" name="iii_11" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_11_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.12</td>
                              <input type="hidden" name="iii_12" value="false">


                              <td>Los equipos surtidores o dispensadores se mantienen en buenestado de conservaci&oacute;n e higiene. (6.2.2)</td>
                              <td><input type="checkbox" name="iii_12" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_12_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.13</td>
                              <input type="hidden" name="iii_13" value="false">


                              <td>El uso de material y envases descartables"5 para consumodirecto es de primer uso y de material reciclable, adem&aacute;s severifica que se desecha inmediatamente. (6.2.2)</td>
                              <td><input type="checkbox" name="iii_13" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_13_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.14</td>

                              <input type="hidden" name="iii_14" value="false">


                              <td>Se brindan mensajes educativos y medios para promover lapr&aacute;ctica de higiene de manos del comensal. (6.2.2)</td>
                              <td><input type="checkbox" name="iii_14" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_14_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.15</td>
                              <input type="hidden" name="iii_15" value="false">


                              <td>Cuenta con Informaci&oacute;n para la preparaci&oacute;n de platos oraciones destinadas a personas al&eacute;rgicas o hlpersensibles.(6.2.3)</td>
                              <td><input type="checkbox" name="iii_15" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_15_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>3.16</td>
                              <input type="hidden" name="iii_16" value="false">

                              <td>No se coloca dispensadores de sal de mesa a menos que searequerido de manera expresa por el comensal. (6.2.3)</td>
                              <td><input type="checkbox" name="iii_16" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iii_16_obs" style="height: 50px;"></textarea></td>
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

                        <table class="table  table-bordered table-condensed table-hover " style="width: 100%">

                          <thead>
                            <tr class="v-grid-header">
                              <th class="text-center">N°</th>
                              <th class="text-center">CRITERIO</th>
                              <th class="text-center">SI / NO</th>
                              <th class="text-center">Riesgo</th>
                              <th class="text-center">Observaciones</th>
                            </tr>
                          </thead>

                          <tbody>

                            <tr>
                              <td>4.1</td>

                              <input type="hidden" name="iv_1" value="false">


                              <td>Cuenta con Programa de Higiene y Saneamiento -PHS y verifica la eficacia de los procedimientos de limpieza y desinfección (6.4 y 6.6)</td>
                              <td><input type="checkbox" name="iv_1" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_1_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.2</td>

                              <input type="hidden" name="iv_2" value="false">


                              <td>El PHS debe considerar un programa de renovación y
                                mantenimiento de equipos y utensilios que asegure el buen
                                funcionamiento y condición sanitaria de los mismos. (6.4.1)</td>
                              <td><input type="checkbox" name="iv_2" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_2_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.3</td>
                              <input type="hidden" name="iv_3" value="false">


                              <td>Mantiene sus ambientes libres de materiales, equipos u otros
                                objetos en desuso 0 inservibles que puedan contaminar los
                                alimentos y propicien la proliferación de insectos y roedores</td>
                              <td><input type="checkbox" name="iv_3" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_3_obs" style="height: 50px;"></textarea></td>
                            </tr>



                            <tr>
                              <td>4.4</td>
                              <input type="hidden" name="iv_4" value="false">

                              <td>Los residuos sólidos que generan las operaciones de
                                procesamiento previo de alimentos crudos y de procesamiento e
                                intermedio, se disponen en forma limpia dentro de contenedores
                                con tapa sin dejar restos en el piso. (5.2 4 - 6.2.1 y 6.4.2)</td>
                              <td><input type="checkbox" name="iv_4" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_4_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.5</td>

                              <input type="hidden" name="iv_5" value="false">


                              <td>El flujo de retiro de residuos sólidos de los ambientes de
                                i procesamiento mantiene una secuencia ordenada, de manera
                                que no Implica riesgo de contaminación cruzada para los
                                alimentos de consumo final, (5.2.4 y 6.2.1 c)</td>
                              <td><input type="checkbox" name="iv_5" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_5_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.6</td>

                              <input type="hidden" name="iv_6" value="false">


                              <td>Los equipos y utensilios permiten su fácil y completa limpieza,
                                asi como su desinfección y están en buen estado de
                                conservación e higiene. (6.4.1)</td>
                              <td><input type="checkbox" name="iv_6" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_6_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>4.7</td>
                              <input type="hidden" name="iv_7" value="false">

                              <td>La superficie de mesas, mostradores, estanterías, exhibidores y
                                similares, son lisas y están en buen estado de conservación e
                                higiene. (6.4.1)</td>
                              <td><input type="checkbox" onchange="resaltar('iv_7');" name="iv_7" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_7_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.8</td>

                              <input type="hidden" name="iv_8" value="false">


                              <td>El PHS contempla medidas para la prevención y control de
                                vectores (insectos, roedores y otras plagas), a fin de minimizar
                                los riesgos para la inocuidad de los alimentos. (6.4.2)</td>
                              <td><input type="checkbox" name="iv_8" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_8_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>4.9</td>

                              <input type="hidden" name="iv_9" value="false">


                              <td>Las medidas preventivas evitan el ingreso de insectos, roedores
                                u otras plagas al establecimiento, especialmente a los
                                ambientes de procesamiento. (6.4.2 - 5.2.1)</td>
                              <td><input type="checkbox" name="iv_9" value="false" onchange="resaltar('iv_9');" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_9_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.10</td>

                              <input type="hidden" name="iv_10" value="false">


                              <td>Las medidas de control se aplican de acuerdo a lo contemplado
                                en su PHS. (6.4.2)</td>
                              <td><input type="checkbox" name="iv_10" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_10_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr>
                              <td>4.11</td>

                              <input type="hidden" name="iv_11" value="false">


                              <td>La aplicación de rodenticidas e insecticidas para el control de
                                vectores es realizada por personal técnico capacitado o
                                servicios autorizados por el Ministerio de Salud. Los productos
                                utilizados para el control deben estar autorizados. (6.4.2)</td>
                              <td><input type="checkbox" name="iv_11" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_11_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>4.12</td>

                              <input type="hidden" name="iv_12" value="false">


                              <td>Los productos químicos y biológicos son almacenados bajo
                                estrictas medidas de seguridad, de tal modo de prevenir
                                cualquier posibilidad de contaminación cruzada hacia los
                                alimentos, (6.4.2 y 6.4)</td>
                              <td><input type="checkbox" name="iv_12" onchange="resaltar('iv_12');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_12_obs" style="height: 50px;"></textarea></td>
                            </tr>

                            <tr class="tr_primary">
                              <td>4.13</td>

                              <input type="hidden" name="iv_13" value="false">


                              <td>El sistema de distribución y almacenamiento de agua se
                                encuentra conservado (mantenido), limpio y protegido de tal
                                manera que se impida la contaminación del agua (5,2.3)</td>
                              <td><input type="checkbox" name="iv_13" onchange="resaltar('iv_13');" value="false" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                              <td class="text-center">R3</td>
                              <td><textarea class="form-control" name="iv_13_obs" style="height: 50px;"></textarea></td>
                            </tr>



                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>


                  <div id="tb_4" class="tab-pane " role="tabpanel" aria-labelledby="tb_4">
                    <div class="row">
                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="motivo">V. Otros Hallazgos:</label>
                          <textarea name="otros_hallazgos" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                      </div>

                      <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="motivo">VI. Observaciones / Recomendaciones:</label>
                          <textarea name="observaciones" class="form-control" rows="3" placeholder=""></textarea>
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