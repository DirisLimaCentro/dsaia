<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">Ficha Encuesta Vigilancia de Rabia y TRAC en Servicios Veterinarios</h4>        
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

                    <label for="exampleInputPassword1">Fecha Encuesta:</label>
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
                   <input type="text"  class="form-control" id="razon_social" placeholder="Razon Social">
                 </div>
               </div>

               <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="razon_social">Direccion:</label>
                 <input type="text"  class="form-control" id="direccion_empresa" placeholder="Direccion">
               </div>
             </div>

             


         </div>
         <div class="row">

          <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="ubigeo">Distrito:</label>
               <select  class='form-control select2  text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;" >
               </select>
             </div>
           </div>

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


        </div>



            </div>
          </div>


          <div class="panel panel-primary">
            <div class="panel-heading">
              Datos del personal que labora en el establecimiento
            </div>
            <div class="panel-body">

              <div class="row">

                <div class="col-md-1 col-sm-12 col-xs-12">
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


               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Nombres:</label>
                   <input type="text"  class="form-control" id="nombres" placeholder="Nombres">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Primer Apellido:</label>
                   <input type="text"  class="form-control" id="ape_paterno" placeholder="Primero Apellido">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Segundo Apellido:</label>
                   <input type="text"  class="form-control" id="ape_materno" placeholder="Segundo Apellido">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Direccion:</label>
                   <input type="text"  class="form-control" id="direccion_persona" placeholder="Direccion">
                 </div>
               </div>

              <div class="col-md-1 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ubigeo">Distrito:</label>
                  <select  class='form-control select2  text-uppercase' name='ubigeo_persona' id='ubigeo_persona' style="width: 100%;" >
                  </select>
                </div>
              </div>



             </div>

             <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <table class="table  table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>

                    <tr class="v-grid-header">

                      <th></th>
                      <th>Marcar</th>

                    </tr>  
                  </thead>
                  <tbody>  
                    <tr>
                      <td>¿ Ultimamente el personal que labora en el establecimiento ha recibido su vacunacion Antirabica Humana Pre Exposicion ?</td>
                      <td class="text-center">

                       
                        <input type="checkbox" id="vacuna_antirabica" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                     
                      </td>
                    </tr>
                    <tr>  
                      <td>y la vacuna antitetánica ?</td>
                      <td >

                        <input type="checkbox" id="vacuna_antitetanica"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">

                      </td>
                    </tr>
                    <tr>  
                      <td>¿ Ha sufrido morderduras por animales mamiferos en el ultimo año ?</td>
                      <td><input type="checkbox" id="mordedura_ultimo"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                    </tr>
                    <tr>   
                      <td>¿ Acudió a un Establecimiento de Salud para su atención inmediata ?</td>
                      <td><input type="checkbox"  id="acudio_es" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                    </tr>
                    <tr>
                       <td>¿ Conoce a la triada preventiva de rabia ?</td>
                      <td><input type="checkbox" id="conoce_triada" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>

                    </tr>
                  </tbody>
                  
                </table>

              </div>


            </div>



            </div>
          </div>


          <div class="panel panel-info">
            <div class="modal-header modal-header-success">
              Datos sobre las actividades preventivas de la rabia
            </div>
            <div class="panel-body">

                <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <table  class="table  table-bordered table-condensed table-hover " style="width: 100%">

                    <tbody>  
                      <tr>
                        <td>¿ Podria usted facilitarnos la informacion sobre la cantidad aplicada de la vacuna antirrabica canina , con la finalidad de complementar las cifras obtenidas de las campañas de vacunacion antirrabica canina organizadas por el MINSA?</td>
                        <td><input type="checkbox" id="facilita_informacion"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                      </tr>
                      <tr>
                        <td>VACUNA SEXTUPLE * INCLUYE RABIA</td>
                        <td><input type="text" value="0"  class="form-control" id="cnt_vacuna_sextuple" placeholder="Cantidad"></td>
                      </tr>
                      <tr>
                        <td>VACUNA ANTIRRABICA CANINA (producidas por el INS )</td>
                        <td><input type="text" value="0"  class="form-control" id="cnt_vacuna_ant_ins" placeholder="Cantidad"></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                              VACUNA ANTIRRABICA CANINA (Otro Laboratorio) detalle nombre: 
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                              <input type="text"  class="form-control" id="nombre_lab" placeholder="Nombre">
                            </div>
                          </div>

                        </td>
                        <td><input type="text" value="0" class="form-control" id="cnt_vacuna_ant_lab" placeholder="Cantidad"></td>
                      </tr>

                       <tr>
                        <td>¿ Toda vacuna debe contar con una adecuada conservacion para garantizar la calidad del biologico al 100% nos permitiria observar ?</td>
                        <td><input type="checkbox" id="permite_observar"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                      </tr>

                       <tr>
                        <td>¿ Se verifica la temperatura interna de la refrigeracion en el rango de 2 - 8° C  ?</td>
                        <td><input type="checkbox" id="verifica_temperatura" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                      </tr>

                       <tr>
                        <td>¿ Se verifica que los biologicos se conserven en equipo exclusivo y no se comparte con almacenaje de alimentos y bebidas?</td>
                        <td><input type="checkbox" id="verifica_equipos" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                      </tr>

                       <tr>
                        <td>¿ Solicitamos su apoyo en la vigilancia activa de rabia, mediante comunicacion inmediata de la muerte de un mamifero con
                          sintomas compatibles a esta enfermedad, nosotros trasladamos el animal al centro de zoonosis para su diagnostico confirmatorio
                          o negativo al virus rabico .¿ Desea usted apoyar al sector salud en esta actividad ?</td>
                        <td><input type="checkbox" id="apoya_vigilancia" data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                      </tr>

                      <tr>
                        <td>
                          <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                              Los accidentes de mordedura ocasionados por perros y gatos se mantienen constantes , pero tambien existen las ocasionadas por mamiferos silvestres , ¿ en su establecimiento ha podido atender ? 
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <select class="form-control"   multiple id='id_especie' data-actions-box="true" data-select-all-text="Todos" data-deselect-all-text="Ninguno" data-style="btn-default"  >
                                </select>

                            </div>
                          </div>

                        </td>
                        <td><input type="text"  class="form-control" id="otros_animales" placeholder="Detalle"></td>
                      </tr>

                      <tr>
                        <td>¿ Cuenta usted con la Guia Sanitaria de Tenencia Responsable de animales de compañia ?</td>
                        <td><input type="checkbox" id="guia_sanitaria"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
                      </tr>

                      <tr>
                        <td>¿ Quisiera contar con la informacion educativa por correo electronico , para difundirla con sus clientes  ?</td>
                        <td><input type="checkbox" id="autoriza_correo"  data-toggle="toggle" data-width="100" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info"></td>
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