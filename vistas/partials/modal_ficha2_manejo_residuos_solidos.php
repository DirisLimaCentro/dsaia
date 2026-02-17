<div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg "  role="document">

    <div class="modal-content">

      <!--<div class="panel panel-primary">-->
        <div class="modal-header modal-header-success" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="panel-title" id="modalTitle">FICHA Nº 02:VERIFICACIÓN DE
              CUMPLIMIENTO DE LOS ASPECTOS DE GESTIÓN
              DE RESIDUOS SÓLIDOS EN ESTABLECIMIENTOS DE
              SALUD, SERVICIOS MÉDICOS DE APOYO DE LA
              CATEGORIA I-1 AL I-4 Y CENTROS DE
              INVESTIGACIÓN EN SALUD.</h4>
        </div>      

        <div class="modal-body">

          <div class="panel panel-success">
            <div class="modal-header modal-header-success">
                FICHA N° 2
            </div>
            <div class="panel-body">
				<div class="row">
					<div class="col-md-3">
					  <div class="form-group">
						<label for="fecha_encuesta">Fecha:</label>
						<div class="input-group date">
						  <input type="text" class="form-control pull-right"  disabled id="fecha_encuesta" placeholder="dd/mm/aaaa" >
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
                      <input  type="text" class="form-control text-uppercase" id="codigo_ipress" placeholder="Código Unico">

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
                   <input disabled type="text"  class="form-control" id="nombre_ipress" placeholder="Nombre">
                 </div>
               </div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="tipo_ipress">Tipo IPRESS:</label>
						<select disabled class="form-control" id="tipo_ipress"><option value="" selected="">--Seleccione--</option>
						</select>
					</div>
               </div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="categoria_ipress">Cat. IPRESS:</label>
						<select  disabled class="form-control" id="categoria_ipress"><option value="" selected="">--Seleccione--</option>
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
              <input  disabled type="text" class="form-control" id="telefono_ipress" placeholder="Telefono Fijo">
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
			
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
					<label for="nombre_responsable_ipress">Responsable del Establecimiento:</label>
					<input type="text"  class="form-control" id="nombre_responsable_ipress" placeholder="Nombres representante del Establecimiento">
				</div>
            </div>

             <div class="col-md-3 col-sm-12 col-xs-12">
                 <div class="form-group">
                     <label for="nombre_evaluador">Nombre del Evaluador:</label>
                     <input type="text"  class="form-control" id="nombre_evaluador" placeholder="Nombre de Evaluador">
                 </div>
             </div>



			<div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
					<label for="nombre_responsable_eess">Responsable de los Residuos Solidos del EESS O SMA:</label>
					<input type="text"  class="form-control" id="nombre_responsable_eess" placeholder="Nombre del Responsable de Residuos Solidos del EESS O SMA">
				</div>
             </div>
        </div>



            </div>
          </div>


          <div class="panel panel-primary">
            <div class="panel-heading">
              ETAPAS DEL MANEJO DE RESIDUOS SOLIDOS
            </div>
            <div class="panel-body">

                <table class="table table-striped"  style="width:100%"  style="padding: 20px">


                    <tr>
                        <th  > 1. ACONDICIONAMIENTO</th>
                        <th colspan="5"> SERVICIOS  </th>
                        <th>


                        </th>
                    </tr>




                    <tr>



                        <th  > </th>
                        <th >


                            <select class='form-control'  style='width: 110px;border-radius: 15px ;font-size: small ' id='servicio_a'  >
                                <option value="" disabled selected>Escoger</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </th>



                        <th ><select class='form-control'  style='width: 110px;border-radius: 15px ;font-size: small ' id='servicio_b'  >
                            <option value="" disabled selected>Escoger</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select> </th>


                        <th > <select class='form-control'  style='width: 110px;border-radius: 15px ;font-size: small ' id='servicio_c'  >
                            <option value="" disabled selected>Escoger</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>  </th>


                        <th > <select class='form-control'  style='width: 110px;border-radius: 15px ;font-size: small ' id='servicio_d'  >
                            <option value="" disabled selected>Escoger</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>  </th>

                        <th>


                        </th>
                    </tr>


                    <tr>
                        <th >  </th>
                        <th colspan="5">  SITUACION DE CUMPLIMIENTO </th>
                       <th>


                       </th>
                    </tr>






                    <tr>
                        <td><span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN EL
ÍTEM 1.2.1, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">


                             1.1 Se cuenta con la cantidad de recipientes acorde a sus necesidades  </span>
                        </td>






                        <td colspan="1">
                            <div class="form-group">
                                <input type="checkbox" id="i_1" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td colspan="1">
                            <div class="form-group">
                                <input type="checkbox" id="i_2" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td colspan="1">
                            <div class="form-group">
                                <input type="checkbox" id="i_3" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td colspan="1">
                            <div class="form-group">
                                <input type="checkbox" id="i_4" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>



                        <td >
                            <input type="text" class="form-control"

                                   name="p_1"
                                   id="p_1" value="0" style="text-align: right;" disabled>
                        </td>




                    </tr>









                    <tr  >

                        <td>  <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN EL
ÍTEM 1.2.1, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">
                            1.2 Los recipientes utilizados para residuos comunes , biocontaminados o especales cuentan con tapa
                            </span>

  <td >
                            <div  class="form-group">




                                <input type="checkbox" id="i_5" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info" >
                            </div>
                        </td>


                        <td >
                            <div  class="form-group">





                                <input type="checkbox" id="i_6" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info" >
                            </div>
                        </td>

                        <td >
                            <div class="form-group">



                                <input type="checkbox" id="i_7" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info" >
                            </div>
                        </td>

                        <td >
                            <div class="form-group">


                                <input type="checkbox" id="i_8" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info" >
                            </div>
                        </td>

                        <td >
                            <input type="text"          name="p_2"

                                   class="form-control" id="p_2" value="0" style="text-align: right;" disabled>
                        </td>









                    </tr>




                    <tr>
                        <td>
                            1.3 Se encuentra con bolsa de colores segun el tipo de residuos a
                            eliminar( residuo comun : negro ; biocontaminado : rojo , residuo especial (bolsa amarilla) en cada recipiente
                        </td>
                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_9" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_10" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_11" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_12" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>


                        <td >
                            <input type="text"   name="p_3"  class="form-control" id="p_3" value="0" style="text-align: right;" disabled>
                        </td>



                    </tr>





                    <tr>


                        <td>
                            1.4 El recipiente para residuos punzocortante es rigido cumple con las especificaciones tecnicas de la norma
                        </td>
                        <td >
                            <div class="form-group">
                                  <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " name="m_5"  id="m_5">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>

                                <!--<input type="checkbox" id="i_13" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                           -->

                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                  <select  class="btn btn-success"   placeholder="0"  style="width: 66px;height: 28px;font-size: small "   name="m_6" id="m_6">
                                  <!-- <option  value="" selected disabled hidden>0</option>  -->
                                    <option value="0"  >0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>
                              <!--  <input type="checkbox" id="i_14" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">

                           -->
                           </div>
                        </td>

                        <td >
                            <div class="form-group">


                                  <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " name="m_7"  id="m_7">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>
<!--
                                <input type="checkbox" id="i_15" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                          -->


                            </div>
                        </td>

                        <td >
                            <div class="form-group">

                                <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " name="m_8"  id="m_8">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>

<!--
                                <input type="checkbox" id="i_16" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">

                           -->
                            </div>
                        </td>


                        <td >
                            <input type="text"   name="p_4"  class="form-control" id="p_4" value="0" style="text-align: right;" disabled>
                        </td>


                    </tr>





                    <tr>


                        <td>
                            1.5 Las areas administrativaso de uso exclusivo del personalz
                            del EESS o SMA cuentan con recipientes y bolsas de color negro
                            para el deposito de residuos comunes
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_17" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_18" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_19" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_20" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <input type="text"  name="p_5" class="form-control" id="p_5" value="0" style="text-align: right;" disabled>
                        </td>

                    </tr>



                    <tr>
                        <td>
                            1.6 Los servicios higienicos que son de uso compartido
                            o exclusivo de pacientes cuentan con bolsas roja			</td>


                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_21" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_22" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_23" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="i_24" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>
                        <td >
                            <input type="text"   name="p_6" class="form-control" id="p_6" value="0" style="text-align: right;" disabled>
                        </td>







                    </tr>

                    <tr>
                        <th colspan="7">CRITERIOS DE EVALUACION</th>
                    </tr>


                    <td COLSPAN="4">
                        <b><span class="text-danger">MUY DEFICIENTE ( Puntaje entre  0 a 1 )</span> - <span class="text-primary">DEFICIENTE ( Puntaje entre 2 a 4 )</span> - <span class="text-success">ACEPTABLE  ( Puntaje +4)</span></b>
                    </td>


                    <td colspan="2">
                        <input type="text" class="form-control" name="total_puntaje" id="total_puntaje" value="0" style="text-align: right;" disabled>
                    </td>



<TR>

                    <td COLSPAN="4">
                        <b><span class="text-success">ESTADO

                            </TD>

                    <td colspan="2">
                        <input type="text" class="form-control"   id="valoracion1" value="0" style="text-align: right;" disabled>
                    </td>

</TR>





                    <tr>
                        <th> 2. SEGREGACION Y ALMACENAMIENTO PRIMARIO</th>
                        <th colspan="5">  SITUACION</th>
                    </tr>


                    <tr>
                     <td>  <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN
EL ÍTEM 1.2.2, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">




                           2.1 Se disponen los residuos en el recipiente correspondiente segun su clase</span>
                        </td>
                        <td >
                            <div class="form-group">
                                <input type="checkbox"     id="ii_1" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox"       id="ii_2" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="ii_3" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="ii_4" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>
                        <td >
                            <input type="text" class="form-control"   name="p_7" id="p_7" value="0" style="text-align: right;" disabled>
                        </td>








                    </tr>




                    <tr>


                        <td>  <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES PASIBLE DE
INFRACIÓN, TENIENDO UNA SANCIÓN DESDE UNA
AMONESTACIÓN HASTA 3 UIT, TAL COMO SE INDICA EN
EL ÍTEM 1.2.2, DEL ARTÍCULO 135, DE LA RM-014-2017-
MINAM.">




                            2.2 Los residuos punzocortantes se agregan en los recipientes rigidos segun lo establecido en la Norma Tecnica
                        </td>

                        <td >
                            <div class="form-group">
                                  <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " id="m_2_5">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>
                             <!--   <input type="checkbox" id="ii_5" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                       -->

                            </div>
                        </td>

                        <td >
                            <div class="form-group">

                                  <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " id="m_2_6">

                                    <option value="0" selected="selected" >0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>
                              <!--  <input type="checkbox" id="ii_6" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                          -->

                            </div>
                        </td>

                        <td >
                            <div class="form-group">

                                  <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " id="m_2_7">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>

<!--
                                <input type="checkbox" id="ii_7" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">

                           -->
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                  <select  class="btn btn-success"    style="width: 66px;height: 28px;font-size: small " id="m_2_8">

                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="3">NA</option>

                                </select>

                                <!--
                                <input type="checkbox" id="ii_8" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">

                         -->
                            </div>
                        </td>
                        <td >


                            <input type="text" class="form-control" name="p_8" id="p_8" value="0" style="text-align: right;" disabled>
                        </td>




                    </tr>
                    <tr>



                        <td>
                            2.3 Las bolsas y recipientes rigidos se retiran una vez alcanzadas los 3/4 partes de su capacidad
                        </td>
                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="ii_9" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="ii_10" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="ii_11" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>

                        <td >
                            <div class="form-group">
                                <input type="checkbox" id="ii_12" class="calificacion"  data-toggle="toggle" data-width="50%" data-size="small" data-on=" 1 " data-off="0 " data-onstyle="success" data-offstyle="info">
                            </div>
                        </td>
                        <td >
                            <input type="text" class="form-control"  name="p_9"  id="p_9" value="0" style="text-align: right;" disabled>
                        </td>

       </tr>



                    <tr>
                        <th colspan="7">CRITERIOS DE EVALUACION</th>
                    </tr>


                    <td COLSPAN="4">
                        <b><span class="text-danger">MUY DEFICIENTE ( Puntaje  1)</span> - <span class="text-primary">DEFICIENTE (  Puntaje 2 )</span> - <span class="text-success">ACEPTABLE  (  Puntaje 3)</span></b>
                    </td>


                    <td colspan="2">
                        <input type="text" class="form-control"  name="total_puntaje2" id="total_puntaje2" value="0" style="text-align: right;" disabled>
                    </td>



                    <TR>

                        <td COLSPAN="4">
                            <b><span class="text-success">ESTADO

                        </TD>

                        <td colspan="2">
                            <input type="text" class="form-control"   id="valoracion2" value="0" style="text-align: right;" disabled>
                        </td>

                    </TR>



                </table>
                <table class="table table-striped"   style="padding: 20px">


                <tr>
                        <th  > 3. RECOLECCION Y TRANSPORTE URBANO </th>
                        <th  colspan="4"   style="width: 400px;" >  SITUACION  </th>
                        <TH  > Observaciones </TH>
                    </tr>


                    <tr>
                        <td >
                            3.1 Cuenta con coches o tachos con rueda
                        </td>
                        <td    colspan="4">
                              <select  class="btn btn-success"   style="width: 95px;height: 28px" id="m_3_1">

                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="3">NA</option>

                            </select>


                         <!--   <input   type="checkbox" id="iii_1" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                        -->
                        </td>


<TD   style="width: 300px"  >   <input type="text" class="form-control" id="p_10"  style="text-align: right;" > </td>

                    </tr>







                    <tr>
                        <td>
                            3.2 El transporte de residuos solidos se realiza en los horarios establecidos
                        </td>
                        <td   colspan="4" >


                            <select  class="btn btn-success"   style="width: 95px;height: 28px" id="iii_2">

                                <option value="0">0</option>
                                <option value="1">1</option>


                            </select>


                           <!-- <input type="checkbox" id="iii_2" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                    -->

                        </td>
                        <TD   style="width: 300px" >   <input type="text" class="form-control" id="p_11"  style="text-align: right;" > </td>

                    </tr>

                    <tr>
                        <td>
                            3.3 Cuenta con rutas debidamente señalizadas para el transporte de los residuos solidos
                        </td>
                        <td  colspan="4" >

                            <select  class="btn btn-success"   style="width: 95px;height: 28px" id="iii_3">

                                <option value="0">0</option>
                                <option value="1">1</option>


                            </select>


                            <!--<input type="checkbox" id="iii_3" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                    -->
                        </td>
                        <TD  style="width: 300px" >   <input type="text" class="form-control" id="p_12"  style="text-align: right;" > </td>

                    </tr>

                    <tr>
                        <td>
                            3.4 Al final de cada jornada laboral se realiza la limpieza y desinfeccion  o vehiculo de transporte urbano .
                        </td>
                        <td colspan="4" >


                            <select  class="btn btn-success"   style="width: 95px;height: 28px" id="iii_4">

                                <option value="0">0</option>
                                <option value="1">1</option>


                            </select>

                           <!-- <input type="checkbox" id="iii_4" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                     -->
                        </td>

                        <TD style="width: 300px" >   <input type="text" class="form-control" id="p_13"  style="text-align: right;" > </td>
                    </tr>




                    <tr>
                        <td>
                            3.5 Los coches o tachos de transporte de residiuos solidos no pueden ser usados para ningun oto proposito
                        </td>
                        <td colspan="4" >

                            <select  class="btn btn-success"   style="width: 95px;height: 28px" id="iii_5">

                                <option value="0">0</option>
                                <option value="1">1</option>


                            </select>

                          <!--  <input type="checkbox" id="iii_5" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                  -->
                        </td>

                        <TD style="width: 300px">   <input type="text" class="form-control" id="p_14" " style="text-align: right;" > </td>
                    </tr>


                    <tr>
                        <th  COLSPAN="7">CRITERIOS DE EVALUACION</th>
                    </tr>
                    <td  COLSPAN="4">
                        <b><span class="text-danger">MUY DEFICIENTE ( Puntaje entre  0 a 1 )</span> - <span class="text-primary">DEFICIENTE (Puntaje entre  2 a 4 )</span> - <span class="text-success">ACEPTABLE  (Puntaje  +4)</span></b>
                    </td>
                    <td></td>
                    <td  COLSPAN="2">
                        <input type="text" class="form-control" id="total_puntaje3" value="0" style="text-align: right;" disabled>
                    </td>


                    <TR>

                        <td COLSPAN="4">
                            <b><span class="text-success">ESTADO

                        </TD>
<td></td>
                        <td colspan="2">
                            <input type="text" class="form-control"   STYLE="color:white" placeholder="MUY DEFICIENTE" id="valoracion3" value="0" style="text-align: right;" disabled>
                        </td>

                    </TR>

                    <tr>
                        <th> 4. ALMACENAMIENTO FINAL O CENTRAL  </th>
                        <th colspan="4">  SITUACION</th>
                        <TH > Observaciones </TH>
                    </tr>





                    <tr>
                   <td>   <span class="hovertext" data-hover="EL IMCUMPLIENTO DE ESTA ACTIVIDAD, ES
PASIBLE DE INFRACIÓN, TENIENDO UNA
SANCIÓN DESDE UNA AMONESTACIÓN
HASTA 3 UIT, TAL COMO SE INDICA EN EL
ÍTEM 1.2.1, DEL ARTÍCULO 135, DE LA RM014-2017-MINAM.">






                            4.1 En EESS , SMA o CIS cuenta con un ambiente de almacenamineto final o central donde almacena las 03 clases de residuos solidos.</span>
                   </td>

                        <td colspan="4">
                            <input type="checkbox" id="iiii_1" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>


                        <TD style="width: 300px">   <input type="text" class="form-control" id="p_15" " style="text-align: right;" > </td>

                    </tr>

                    <tr>
                        <td>
                            4.2 El almacenamiento final o central esta correctamente delimitado y señalizado
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_2" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                        <TD>   <input type="text" class="form-control" id="p_16" " style="text-align: right;" > </td>
                   </tr>




                    <tr>
                        <td>
                            4.3 Se encuentra ubicado en zona de facil acceso , que permita la maniobra y operacion del vehiculo colector externo y los coches de recoleccion interna
                        </td>

                        <td colspan="4">
                            <input type="checkbox" id="iiii_3" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_17" " style="text-align: right;" > </td>

                    </tr>

                    <tr>
                        <td>
                            4.4 Revestido internamente (piso y paredes ) con material liso
                            resistente , lavable , impermeable y de color claro y contar con canaletas de desague , de ser el caso .
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_4" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_18" " style="text-align: right;" > </td>

                    </tr>
                    <tr>
                        <td>
                            4.5 La ubicacion del almacenamiento central de RRSS esta alejada de los servicios de atencion medica
                            y de  alimentacion.
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_5" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>


                        <TD>   <input type="text" class="form-control" id="p_19" " style="text-align: right;" > </td>
                    </tr>



                    <tr>
                        <td>
                            4.6 El almacenamiento central se encuentra revestido internamente final o central,cuenta con la indumentaria de
                            proteccion personal necesarios para dicho fin .
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_6" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                        <TD>   <input type="text" class="form-control" id="p_20" " style="text-align: right;" > </td>
                    </tr>


                    <tr>
                        <td>
                            4.7 Personal de limpieza que realiza actividades en el
                            almacenamiento final o central , cuenta con la indumentaria
                            de proteccion personal necesarios para dicho fin .
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_7" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_21" " style="text-align: right;" > </td>
                    </tr>

                    <tr>
                        <td>
                            4.8 Los residuos solidos se encuentran almacenados en sus areas correspondientes segun su clase.
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_8" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_22" " style="text-align: right;" > </td>
                    </tr>

                    <tr>
                        <td>
                            4.9 Los residuos solidos biocontaminados permanecen en el almacenamiento central , dentro de
                            contenedores (indicar periodo de tiempo )
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiii_9" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_23" " style="text-align: right;" > </td>
                    </tr>


                    <tr>
                        <th colspan="7">CRITERIOS DE EVALUACION</th>
                    </tr>
                    <td COLSPAN="4">
                        <b><span class="text-danger">MUY DEFICIENTE ( Puntaje entre  0 a 3 )</span> - <span class="text-primary">DEFICIENTE (Puntaje entre 4 a 5)</span> - <span class="text-success">ACEPTABLE  ( Puntaje +6)</span></b>
                    </td>
                    <td></td>
                    <td colspan="2">
                        <input type="text" class="form-control" id="total_puntaje4" value="0" style="text-align: right;" disabled>
                    </td>



                    <TR>

                        <td COLSPAN="4">
                            <b><span class="text-success">ESTADO

                        </TD>
<td></td>
                        <td colspan="2">
                            <input type="text" class="form-control"   id="valoracion4" value="0" style="text-align: right;" disabled>
                        </td>

                    </TR>


                    <tr>
                        <th> 5. Tratamiento  </th>
                        <th colspan="4">  SITUACION</th>
                        <TH > Observaciones </TH>
                    </tr>


                    <tr>
                        <td>
                            5.1 El EESS , CIS o SMA realiza algun tipo de tratamiento para residuos solidos o cuenta con una EO-RS debidamente registrada y autorizada
                        </td>
                        <td colspan="4">
                              <select  class="btn btn-success"   style="width: 110px;height: 28px" id="m_5_1">

                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="3">NA</option>

                            </select>

                          <!--  <input type="checkbox" id="iiiii_1" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                   -->

                        </td>


                        <TD>   <input type="text" class="form-control" id="p_24" " style="text-align: right;" > </td>

                    </tr>


                    <tr>
                        <td>
                            5.2 El sistema de tratamiento cuenta con las aprobaciones y
                            autorizaciones correspondientes.
                        </td>
                        <td colspan="4">

                              <select  class="btn btn-success"   style="width: 110px;height: 28px" id="m_5_2">

                                <option value="0" >0</option>
                                <option value="1">1</option>
                                <option value="3">NA</option>

                            </select>
                          <!--  <input type="checkbox" id="iiiii_2" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">


                       -->

                        </td>

                        <TD>   <input type="text" class="form-control" id="p_25" " style="text-align: right;" > </td>
                    </tr>


                    <tr>
                        <td>
                            5.3 El sistema de tratamiento de encuentra detallado en el Plan de Manejo de los RRSS del EESS , SMA y CIS
                        </td>
                        <td colspan="4">

                              <select  class="btn btn-success"   style="width: 110px;height: 28px" id="m_5_3">

                                <option value="0"  >0</option>
                                <option value="1">1</option>
                                <option value="3">NA</option>

                            </select>

                         <!--   <input type="checkbox" id="iiiii_3" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">

                       -->
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_26" " style="text-align: right;" > </td>                    </tr>

                    <tr>
                        <th colspan="7">CRITERIOS DE EVALUACION</th>
                    </tr>
                    <td COLSPAN="4">
                        <b><span class="text-danger">MUY DEFICIENTE (   Puntaje entre 0 a 1 )</span> - <span class="text-primary">DEFICIENTE ( Puntaje 2 )</span> - <span class="text-success">ACEPTABLE  ( Puntaje 3)</span></b>
                    </td>
                    <td></td>
                    <td colspan="2" >
                        <input type="text" class="form-control" id="total_puntaje5" value="0" style="text-align: right;" disabled>
                    </td>



                    <TR>

                        <td COLSPAN="4">
                            <b><span class="text-success">ESTADO

                        </TD>
                        <td></td>
                        <td colspan="2">
                            <input type="text" class="form-control" STYLE="color:white"   placeholder="MUY DEFICIENTE"  id="valoracion5" value="0" style="text-align: right;" disabled>
                        </td>

                    </TR>




                    <tr>
                        <th> 6. RECOLECCION Y TRANSPORTE EXTERNO Y DISPOSICION FINAL DE LOS RESIDUOS SOLIDOS    </th>
                        <th colspan="4">  SITUACION</th>
                        <TH > Observaciones </TH>
                    </tr>

                    <tr>
                        <td>
                            6.1 Cuenta con contrato vigente de recoleccion de residuos solidos peligrosos con EO-RS o municipalidad registrada
                            y autorizada por la autoridad competente
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiiiii_1" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_27" " style="text-align: right;" > </td>
                    </tr>

                    <tr>
                        <td>
                            6.2 Los manifiestos de Residuos Solidos son devueltos en los plazos establecidos
                            en la normatividad por la EO-RS y cuenta con firmas y sellos correspondientes
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiiiii_2" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                        <TD>   <input type="text" class="form-control" id="p_28" " style="text-align: right;" > </td>


                    </tr>


                    <tr>
                        <td>
                            6.3 Cuenta con el Registro Diario de Residuos Solidos
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiiiii_3" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>

                        <TD>   <input type="text" class="form-control" id="p_29" " style="text-align: right;" > </td>

                    </tr>


                    <tr>
                        <td>
                            6.4 La disposicion final de residuos solidos se realiza en un relleno sanitario con celdas de seguridad o en un relleno de seguridad registrado y autorizado por la autoridad competente
                        </td>
                        <td colspan="4">
                            <input type="checkbox" id="iiiiii_4" class="calificacion" data-toggle="toggle" data-width="50%" data-size="small" data-on="1" data-off="0" data-onstyle="success" data-offstyle="info">
                        </td>
                        <TD>   <input type="text" class="form-control" id="p_30" " style="text-align: right;" > </td>

                    </tr>


                    <tr>
                        <th colspan="7">CRITERIOS DE EVALUACION</th>
                    </tr>
                    <td COLSPAN="4">
                        <b><span class="text-danger">MUY DEFICIENTE ( Puntaje   0 a 1)</span> - <span class="text-primary">DEFICIENTE (Puntaje  2)</span> - <span class="text-success">ACEPTABLE  ( Puntaje +  o  = 3 )</span></b>
                    </td>
                    <td></td>
                    <td colspan="2">
                        <input type="text" class="form-control" id="total_puntaje6" value="0" style="text-align: right;" disabled>
                    </td>




                    <TR>

                        <td COLSPAN="4">
                            <b><span class="text-success">ESTADO

                        </TD>
                        <td></td>
                        <td colspan="2">
                            <input type="text" class="form-control"   id="valoracion6" value="0" style="text-align: right;" disabled>
                        </td>

                    </TR>




                    <tr class="v-grid-header">

                        <th colspan="6"  class="text-success">Observaciones Generales </th>

                    </tr>







                    <tr>
                        <th colspan="6" >
                            <TEXTAREA  type="text"      id="observacion" class="form-control text-left text-black " >

                            </TEXTAREA>

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
        <script>


            function clickButton(e) {
                const currentBtn = document.getElementById(e);
                const otherBtn = document.getElementById(e === "knapp2"? "knapp1": "knapp2");

                currentBtn.disabled = true;
                otherBtn.disabled = false;
                currentBtn.value="Not Clickable"
                otherBtn.value="Clickable"
            }



        </script>






      </div>
    </div>

  </div>