<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">Ficha Atencion a personas expuestas al virus rábico</h4>        
        </div>      

        <div class="modal-body">

          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
              Datos de la Ficha
            </div>
            <div class="panel-body">
              <div class="row">

                


                <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="razon_social">Ficha Persona:</label>
                    <input type="text"  class="form-control" id="ficha_persona" placeholder="Numero">
                  </div>

                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Ficha Animal:</label>
                   <input type="text"  class="form-control" id="ficha_animal" placeholder="Numero">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="razon_social">H.C.:</label>
                 <input type="text"  class="form-control" id="historia_clinica" placeholder="Numero">
               </div>
              </div>

              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ubigeo">Especie:</label>
                  <select  class='form-control'  id='id_especie' style="width: 100%;" >
                  </select>
                </div>
              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ubigeo">Raza:</label>
                  <select  class='form-control input-sm select2 itemNamedist text-uppercase'  id='id_raza' style="width: 100%;" >
                  </select>
                </div>
              </div>


            </div>
            <div class="row">


              <div class="col-md-3">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Atencion:</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_encuesta" placeholder="dd/mm/aaaa" >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Accidente:</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_accidente" placeholder="dd/mm/aaaa" >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="ubigeo">Distrito del Accidente:</label>
                   <select  class='form-control select2  text-uppercase' name='ubigeo_accidente' id='ubigeo_accidente' style="width: 100%;" >
                   </select>
                 </div>
               </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ubigeo">Situacion del Animal:</label>
                  <select  class='form-control'  id='id_estado_actual_animal' style="width: 100%;" >
                  </select>
                </div>
              </div>


         </div>

         
            </div>
          </div>


          <div class="panel panel-info">
            <div class="panel-heading">
              Datos de la persona
            </div>
            <div class="panel-body">

              
              <div class="row">

                <div class="col-md-1 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="tipo_doc">Tipo Exp:</label>
                   <input type="hidden" id="id_persona">
                   <input type="hidden" id="id_ficha">
                   <input type="hidden" id="id_acompanante">
                   <select class="form-control" id="tipo_exposicion"></select>
                 </div>
               </div>

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
                        <button class="btn btn-default" type="button" onclick="buscar_persona('P');">
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

               <div class="col-md-1 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Edad:</label>
                   <input type="text"  class="form-control" id="edad" placeholder="">
                 </div>
               </div>

               <div class="col-md-1 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="sexo">Sexo:</label>
                   <select class="form-control" id="sexo">
                   <option value="" selected="">--Seleccione--</option>
                   <option value="2">Femenino</option>
                   <option value="1">Masculino</option></select>
                 </div>
               </div>

               

              

             </div>



             <div class="row">

              <div class="col-md-1 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="peso">Peso:</label>
                   <input type="text"  class="form-control" id="peso" placeholder="">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Direccion:</label>
                   <input type="text"  class="form-control" id="direccion_persona" placeholder="Direccion">
                 </div>
               </div>

              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="ubigeo">Distrito:</label>
                  <select  class='form-control select2  text-uppercase' name='ubigeo_persona' id='ubigeo_persona' style="width: 100%;" >
                  </select>
                </div>
              </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Referencia:</label>
                   <input type="text"  class="form-control" id="direccion_referencia" placeholder="Direccion">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Telef:</label>
                   <input type="text"  class="form-control" id="telefono" placeholder="Direccion">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">E-mail:</label>
                   <input type="text"  class="form-control" id="e_mail" placeholder="Direccion">
                 </div>
               </div>

               <div class="col-md-1 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="sexo">Grado I.:</label>
                   <select class="form-control" id="id_grado_instruccion">
                   </select>
                 </div>
               </div>


            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 x_title">
                    <label class="text-success">Datos del acompañante</label>
               </div>

            </div>

              <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                    <label for="tipo_doc">Tipo Doc:</label>
                    <select class="form-control" id="tipo_doc_acompanante"></select>
                  </div>
                </div>


                <div class="col-md-2 col-sm-12 col-xs-12">
                      <div class="form-group">
                      <label for="numero_doc" class="col-form-label">Numero Doc:</label>
                        <div class="input-group">

                        <input type="text" class="form-control text-uppercase" id="numero_doc_acompanante" placeholder="Numero">

                        <div class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="buscar_persona('A');">
                          <i class="glyphicon glyphicon-search" id="btnFindAcompanante" title="Buscar en RENIEC"></i>
                        </button>
                      </div>
                        </div>
                      </div>

                </div>

                    <div class="col-md-2 col-sm-12 col-xs-12">
                      <div class="form-group">
                       <label for="razon_social">Nombres:</label>
                       <input type="text"  class="form-control" id="nombres_acompanante" placeholder="Nombres">
                     </div>
                   </div>

                   <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <label for="razon_social">Primer Apellido:</label>
                     <input type="text"  class="form-control" id="ape_paterno_acompanante" placeholder="Primero Apellido">
                   </div>
                 </div>

                 <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Segundo Apellido:</label>
                   <input type="text"  class="form-control" id="ape_materno_acompanante" placeholder="Segundo Apellido">
                 </div>
               </div>



            </div>

            </div>
          </div>


          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
              Caracteristicas de la lesión y atención
            </div>
            <div class="panel-body">

                <div class="row">

                <div class="col-md-4 col-sm-12 col-xs-12">

                  <fieldset class="scheduler-border">

                    <legend  class="scheduler-border">Lesión  </legend>


                        <div class="checkbox checkbox-primary">
                          <input id="mordedura" name="tipo_lesion" type="checkbox"   class="flat" > <label for="chk1">Moderdura</label>
                          <input id="aranazo" name="tipo_lesion" type="checkbox"   class="flat" > <label for="chk1">Arañazo</label>
                          <input id="contacto" name="tipo_lesion" type="checkbox"   class="flat" > <label for="chk1">Contacto</label>
                        </div>
                        
                       

                </fieldset>

                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                  <label for="razon_social">Localizacion:</label>
                 <select class="form-control"   multiple id='id_localizacion' data-actions-box="true" data-select-all-text="Todos" data-deselect-all-text="Ninguno" data-style="btn-default"  >
                 </select>

               </div>

               <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label class="control-label">Descripción:</label>
                    <input type="text" class="form-control input-sm" id="otra_localizacion" placeholder=""  maxlength="20" required autofocus>
               </div>

              </div>

              <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                  <label for="tipo_doc">Protección:</label>
                  <select class="form-control" id="id_tipo_proteccion"></select>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                  <label for="tipo_doc">Numero:</label>
                  <select class="form-control" id="id_numero_lesiones"></select>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 form-group">

                  <fieldset class="scheduler-border">

                    <legend  class="scheduler-border">Alcance  </legend>


                        <div class="checkbox checkbox-primary">
                          <input id="superficial" name="alcance" type="checkbox"   class="flat" > <label for="chk1">Superficial</label>
                          <input id="profunda" name="alcance" type="checkbox"   class="flat" > <label for="chk1">Profunda</label>
                         
                        </div>                       
                       

                </fieldset>                 


                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                  <label for="tipo_doc">Estado Herida:</label>
                  <select class="form-control" id="id_estado_herida"></select>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                  <label for="tipo_doc">Atención Herida:</label>
                  <select class="form-control" id="id_atencion_herida"></select>
                </div>

                

               

              </div>

              <div class="row">
                 <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                  <label for="tipo_doc">Lugar Suceso:</label>
                  <select class="form-control" id="id_lugar_suceso"></select>
                </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="tipo_doc">Antec vacunacion:</label>
                    <input type="checkbox" id="antecedentes_vacunacion"  data-toggle="toggle" data-width="100%" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                  </div>
                   <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                      <label for="tipo_doc">Fecha:</label>
                      <input type="date"  class="form-control" id="fecha_vacunacion" placeholder="Fecha">
                   </div>
                   <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                      <label for="tipo_doc">N° Dosis:</label>
                      <input type="text"  class="form-control" id="nro_dosis" placeholder="Dosis">
                   </div>

                   <div class="col-md-4 col-sm-12 col-xs-12 form-group">

                    <label for="tipo_doc">Alergico:</label>
                    <select class="form-control" id="id_alergico"></select>
                  </div>

                 

                   <!--<div class="col-md-2 col-sm-12 col-xs-12 form-group">
                      <label for="tipo_doc">Descripcion Alergia:</label>
                      <input type="text"  class="form-control" id="descripcion_alergia" placeholder="Descripcion alergia">
                   </div>-->

              </div>

              <div class="row">
                   <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="tipo_doc">Enfermedad actual:</label>
                    <input type="checkbox" id="enfermedad_actual"  data-toggle="toggle" data-width="100%" data-size="small" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="info">
                  </div>
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="tipo_doc">Descripcion Enfermedad:</label>
                    <input type="text"  class="form-control" id="descripcion_enfermedad" placeholder="Descripcion enfermedad">
                  </div>

              </div>
              

            </div>
          </div>

          <div class="panel panel-warning">
            <div class="modal-header modal-header-warning">
              Estado y ubicacion del animal
            </div>
            <div class="panel-body">
              <div class="row">
                   <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                    <label for="tipo_doc">Propietario:</label>
                    <select class="form-control" id="id_tipo_propietario"></select>
                  </div>   
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                      <label for="tipo_doc">Descripcion:</label>
                      <input type="text"  class="form-control" id="descripcion_otros" placeholder="Descricion">
                   </div>
                   <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                    <label for="tipo_doc">Estado del animal:</label>
                    <select class="form-control" id="id_situacion"></select>
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