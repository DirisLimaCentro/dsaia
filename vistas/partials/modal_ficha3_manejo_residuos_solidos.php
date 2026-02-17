<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">Ficha N° 3</h4>
        </div>      

        <div class="modal-body">

          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
              FICHA 3
            </div>
            <div class="panel-body">
				<div class="row">
					<div class="col-md-3">
					  <div class="form-group">
						<label for="fecha_encuesta">Fecha:</label>
						<div class="input-group date">
						  <input type="text" class="form-control pull-right"  disabled  id="fecha_encuesta" placeholder="dd/mm/aaaa" >
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						</div>
					  </div>
					</div>
				</div>
				<div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="codigo_ipress" class="col-form-label">Cod. IPRESS:</label>
                    <div class="input-group">
                      <input type="hidden" id="id_ipress">
                       <input type="hidden" id="id_ficha">
                      <input type="text" class="form-control text-uppercase" id="codigo_ipress" placeholder="Código Unico">

                      <div class="input-group-btn">
                        <button class="btn btn-default" id="btnfindIpress" type="button" onclick="buscar_ipress();">
                          <i class="glyphicon glyphicon-search" title="Buscar IPRESS"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="nombre_ipress">Nombre de la IPRESS:</label>
                   <input  disabled type="text"  class="form-control" id="nombre_ipress" placeholder="Nombre">
                 </div>
               </div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="tipo_ipress">Tipo IPRESS:</label>
						<select  disabled class="form-control" id="tipo_ipress"><option value="" selected="">--Seleccione--</option>
						</select>
					</div>
               </div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="categoria_ipress">Cat. IPRESS:</label>
						<select disabled class="form-control" id="categoria_ipress"><option value="" selected="">--Seleccione--</option>
						</select>
					</div>
               </div>
			   
        </div>
         <div class="row">
			  <div class="col-md-3 col-sm-12 col-xs-12">
				  <div class="form-group">
				   <label for="ubigeo_ipress">Distrito:</label>
				   <select  disabled class='form-control select2  text-uppercase' name='ubigeo_ipress' id='ubigeo_ipress' style="width: 100%;" >
				   </select>
				 </div>
			   </div>

               <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="direccion_ipress">Dirección:</label>
                 <input disabled type="text"  class="form-control" id="direccion_ipress" placeholder="Direccion">
               </div>
             </div>
			 
          <div class="col-md-3">
            <label for="telefono_ipress" class="col-form-label">Telefono(s):</label>
            <div class="form-group has-feedback">                            
              <input disabled type="text" class="form-control" id="telefono_ipress" placeholder="Telefono Fijo">
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>




             <div class="col-md-12 col-sm-12 col-xs-12 x_title">
                 <label class="text-success">Nombre Comercial </label>
             </div>





             <div class="col-md-6 col-sm-12 col-xs-12">


                 <div class="form-group has-feedback">
                     <label for="nombre_comercial">Nombre Comercial de la Ipress :</label>
                     <input type="text"  class="form-control" id="nombre_comercial" placeholder="Nombre Comercial de la Ipress">
                 </div>

             </div>




			<div class="col-md-12 col-sm-12 col-xs-12 x_title">
                <label class="text-success">Responsables</label>
            </div>
			
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
					<label for="nombre_responsable_ipress">Responsable del Establecimiento:</label>
					<input   type="text"  class="form-control" id="nombre_responsable_ipress" placeholder="Nombres representante del Establecimiento">
				</div>
            </div>
			<div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
					<label for="nombre_responsable_eess">Responsable de los Residuos Soludos del EESS O SMA:</label>
					<input  type="text"  class="form-control" id="nombre_responsable_eess" placeholder="Nombre del Responsable de los Residuos Solidos  del EESS O SMA">
				</div>
             </div>
        </div>



            </div>
          </div>


          <div class="panel panel-primary">
            <div class="panel-heading">
              COMPONENTES DE LA GESTION E LOS RESIDUOS SOLIDOS
            </div>
            <div class="panel-body">


                <table class="table table-striped"  style="width:100%"  style="padding: 20px">
                    <tr>
                        <th> 1. DE LAS FUNCIONES NORMATIVAS DEL COMITE</th>
                        <th colspan="2">  SITUACION</th>
                    </tr>
                    <tr>
                        <td>
                            1.1 Cuenta con el Comite de Gestion , creado o designado con Resolucion Directoral
                            o documento que haga sus veces
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <input type="checkbox" id="i_1" class="calificacion"  data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.2 Cuenta con Coordinador o Responsable designado para el Manejo de Residuos Solidos
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_2" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.3 Cuenta con el Reglamento del Comite de Residuos Solidos						</td>
                        <td colspan="2">
                            <input type="checkbox" id="i_3" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.4 Cuenta con un libro de actas de reuniones
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_4" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.5 Cuenta con el Diagnostico inicial de Gestion y Manejo de Residuos Solidos
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_5" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.6 Cuenta con el plan de Contingencias para los Residuos Solidos						</td>


                        <td colspan="2">
                            <input type="checkbox" id="i_6" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>1.7 El Plan de Manejo de Residuos Solidos de su institucion esta aprobado mediante resolucion directoral o el documento que haga sus veces
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_7" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.8 Realizo las capacitaciones programadas en el Plan de Manejo de residuos solidos
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_8" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.9 Las areas/unidades/servicios cuentan con su respectivo protocolo del manejo de residuos y reciclaje
                        </td>
                        <td colspan="2" >
                            <input type="checkbox" id="i_9" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.10 Cumplio con el Control y Monitoreo de los residuos solidos aplicando las listas de verificacion segun su programa
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_10" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
                            INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
                            AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN
                            EL ÍTEM 1.1.2, DEL ARTÍCULO 135, DE LA RM-014-2017-
                            MINAM.">




                            1.11 Se elaboro el listado de los recursos e insumos necesarios para la implementacion del adecuado manejo de los residuos solidos
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="i_11" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            1.12 Las actividades del Plan de Manejo de Residuos Solidos estan incluidas en el Plan Operativo -POA-Plan Operativo Institucional -POI-o documentos que haga sus veces
                        </td>

                        <td colspan="2">
                            <input type="checkbox" id="i_12" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            1.13 Se realizan evaluaciones trimestrales sobre la base de las listas de verificacion que elabora mensualmente cada area / unidad / servicio .                        </td>

                        <td colspan="2">
                            <input type="checkbox" id="i_13" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>



                    <tr>
                        <th colspan="3">
                            2. DEL DIAGNOSTICO INICIAL DE LA GESTION Y MANEJO DE RESIDUOS SOLIDOS
                        </th>
                    </tr>
                    <tr>
                        <td>
                            2.1 Cuenta con el Diagnostico inicial Basal segun lo establecido en la NTS 144-MINSA-2018-DIGESA- V.01						<td colspan="2">
                            <input type="checkbox" id="ii_1" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            3. DE LA ELABORACION DE DOCUMENTOS TECNICOS ADMINISTRATIVOS (6.4)


                        </th>
                    </tr>
                    <tr>
                        <td>

                            <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN
EL ÍTEM 1.1.3, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">
                            3.1 Presento la Declaracion Anual de Residuos Solidos a traves del SIGERSOL durante los 15 primeros dias habiles del mes de abril, o a la autoridad sectorial competente de su jurisdiccion .
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="iii_1" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN
EL ÍTEM 1.1.3, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">
                            3.2 Presento el Manifiesto de Manejo de Residuos Solidos peligrosos a traves de SIGERSOL durante los 15 primeros dias habiles
                            de cada trimestre del año en curso ( contar con la evidencia correspondiente ),
                            o a la autoridad sectorial competente de su jurisdiccion .
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="iii_2" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3.3 Presento el Plan de Manejo de Residuos Solidos segun lo establecido en norma tecnica
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="iii_3" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3.4 El generador conserva los Manifiestos de Manejo de Residuos Solidos Peligrosos
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="iii_4" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>
                    <tr>
                        <td>
                              <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN
EL ÍTEM 1.1.1, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">
                            3.5 Reporta la Generacion de Residuos Solidos en la
                            ficha de Registro Diario
                        </td>
                        <td colspan="2">
                            <input type="checkbox" id="iii_5" class="calificacion" data-toggle="toggle" data-width="100%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                    </tr>








                    <tr>
                        <th colspan="3">CRITERIOS DE EVALUACION</th>
                    </tr>
                    <td>
                        <b><span class="text-danger">MUY DEFICIENTE ( 0 a 8  )</span> - <span class="text-primary">DEFICIENTE ( 9 a 10 )</span> - <span class="text-success">ACEPTABLE  ( + 10 )</span></b>
                    </td>
                    <td colspan="2">
                        <input type="text" class="form-control" id="total_puntaje" value="0" style="text-align: right;" disabled>
                    </td>




                    <tr class="v-grid-header">

                        <th class="text-success">ESTADO</th>
                        <th class="text-center"></th>
                        <th class="text-center"><input type="text"  disabled   placeholder=""   id="valoracion" class="form-control text-right text-success " ></th>



                    </tr>

                    <tr class="v-grid-header">

                        <th colspan="5"  class="text-success">Observaciones Generales </th>

                    </tr>



                    <tr>
                        <th colspan="5" >
                            <textarea   type="text"      id="observacion" class="form-control text-left text-black " >
                                </textarea>
                        </th>
                    </tr>
                </table>

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