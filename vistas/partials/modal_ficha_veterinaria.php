 <div data-toggle="modal" data-backdrop="static" class="modal fade "  style="overflow-y: scroll; " id="modalFicha"  role="dialog" aria-labelledby="modalFicha" aria-modal="true" tabindex="-1" >
  <div class="modal-dialog modal-lg"  role="document">



    <div class="modal-content">


     <div class="modal-header modal-header-success" >
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="panel-title" id="modalTitle">Ficha Consolidado de Vacunacion Antirabica</h4>
      <input type="hidden" id="id_ficha">
      <input type="hidden" id="id_persona">
      <input type="hidden" id="id_ficha_detalle">
    </div>

    <div class="modal-body">

      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Establecimiento</label>
            <input type="hidden" id="hid_local">
            <input type="text" readonly="" class="form-control" id="establecimiento" placeholder="">
          </div>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre Comercial</label>                            
            <input type="text" readonly="" class="form-control" id="nombre_comercial_empresa" placeholder="">
          </div>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="form-group">
            <label for="exampleInputEmail1">RUC</label>                            
            <input type="text" readonly="" class="form-control" id="ruc_empresa" placeholder="">
          </div>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Telefono</label>                            
            <input type="text" readonly="" class="form-control" id="telefono_empresa" placeholder="">
          </div>
        </div>

        

      </div>


      <div class="row">

       <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Direccion</label>                            
          <input type="text" readonly="" class="form-control" id="direccion_empresa" placeholder="">
        </div>
      </div>

      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Distrito</label>
          <input type="text" readonly="" class="form-control" id="distrito_empresa" placeholder="">
        </div>
      </div>

      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Correo</label>
          <input type="text" readonly="" class="form-control" id="correo_empresa" placeholder="">
        </div>
      </div>



      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="form-group">
          <label for="exampleInputPassword1">Res.Nro</label>
          <select class='form-control input-sm select2 itemNamedist text-uppercase'  id='resolucion_numero' style="width: 100%"  >
          </select>
        </div>
      </div>

      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="form-group">
          <label for="exampleInputPassword1">Res.Año</label>
          <select class='form-control input-sm select2 itemNamedist text-uppercase'  id='resolucion_anio' style="width: 100%"  >
          </select>
        </div>
      </div>


    </div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        
        <!---   -->
        <div class="panel panel-warning">
          <div class="modal-header modal-header-warning">
            Datos del Personal Médico Veterinario que regenta en el Servicio Veterinario
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="tipo_doc">Tipo Doc:</label>
                 <select class="form-control" id="tipo_doc"></select>
               </div>
             </div>

             <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="numero_doc" class="col-form-label">N° Doc:</label>
                <div class="input-group">

                  <input type="text" class="form-control text-uppercase" onblur="buscar_persona();" id="numero_doc" placeholder="Numero">

                  <div class="input-group-btn">
                    <button class="btn btn-warning" type="button" onclick="buscar_persona();">
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

       



     </div>

     <div class="row">

       <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="form-group">
         <label for="razon_social">Direccion:</label>
         <input type="text"  class="form-control" id="direccion_persona" placeholder="Direccion">
       </div>
     </div>

     <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="form-group">
        <label for="ubigeo">Distrito:</label>
        <select  class='form-control select2  text-uppercase' name='ubigeo_persona' id='ubigeo_persona' style="width: 100%;" >
        </select>
      </div>
    </div>

    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="form-group">
       <label for="razon_social">Telefono:</label>
       <input type="text"  class="form-control" id="telefono_persona" placeholder="Direccion">
     </div>
   </div>

   <div class="col-md-3 col-sm-12 col-xs-12">
    <div class="form-group">
     <label for="razon_social">N° CMVP:</label>
     <input type="text"  class="form-control" id="cmvp_persona" placeholder="Direccion">
   </div>
 </div>


</div>


</div>
</div>


<!--End panel  --> 

</div>




</div>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    
    <!---   -->
    <div class="panel panel-info">
      <div class="modal-header modal-header-info">
        Datos sobre las actividades de la Rabia
      </div>
      <div class="panel-body">
        <div class="row">

          <table class="table table-striped table-bordered">
            <tr>
              <td  rowspan="4">N°</td>
              <td >&nbsp;</td>
              <td colspan="8" align="center">Vacunación Antirrabica Canina</td>
              <td  rowspan="4" align="center">Distrito</td>
            </tr>
            <tr>
              <td rowspan="3" align="center">Mes de Reporte</td>
              <td colspan="4" align="center">Vacuna antirrabica INS / otro Laboratorio</td>
              <td colspan="4" align="center">Vacuna Tipo sextuple (que inc Rabia)</td>
            </tr>
            <tr>
              <td colspan="2" align="center">Primovacunado</td>
              <td colspan="2" align="center">Revacunado</td>
              <td colspan="2" align="center">Primovacunado</td>
              <td colspan="2" align="center">Revacunado</td>
            </tr>
            <tr>
              <td >&lt; 1 año</td>
              <td >&gt;1 año</td>
              <td >&lt; 1 año</td>
              <td>&gt; 1 año</td>
              <td >&lt; 1 año</td>
              <td>&gt; 1 año</td>
              <td >&lt; 1 año</td>
              <td >&gt; 1 año</td>
            </tr>
            <tr>

              <td>1</td>
              <td>
                <select class="form-control" id="mes_reporte">
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Setiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
              </td>
              <td><input type="text"  class="form-control text-right" id="vac_ant_pri_men_1" value="0" placeholder=""></td>
              <td><input type="text"  class="form-control text-right" id="vac_ant_pri_may_1" value="0" placeholder=""></td>
              <td><input type="text"  class="form-control text-right" id="vac_ant_rev_men_1" value="0" placeholder=""></td>
              <td><input type="text"  class="form-control text-right" id="vac_ant_rev_may_1" value="0" placeholder=""></td>

              <td><input type="text"  class="form-control text-right" id="vac_sex_pri_men_1" value="0" placeholder=""></td>
              <td><input type="text"  class="form-control text-right" id="vac_sex_pri_may_1" value="0" placeholder=""></td>
              <td><input type="text"  class="form-control text-right" id="vac_sex_rev_men_1" value="0" placeholder=""></td>
              <td><input type="text"  class="form-control text-right" id="vac_sex_rev_may_1" value="0" placeholder=""></td>
              <td>
                <select  class='form-control select2  text-uppercase' name='ubigeo_reporte' id='ubigeo_reporte'  >
                </select>

              </td>

            </tr>
          </table>
          



        </div>

        

      </div>
    </div>


    <!--End panel  --> 

  </div>

</div>


<div class="row" id="row_btn_item" style="display: none;">
  <div class="col-md-12 ">
    <div class="form-group">
      <button type="button" class="btn btn-success btn-sm" onclick="open_item();"><i class="fa fa-plus"></i> Agregar</button>
    </div>
  </div>
</div>

<div class="row" id="row_tbl_detail" style="display: none;" >

  <div class="col-md-12 col-sm-12 col-xs-12" style="overflow: auto">


    <table  id="tblDetail" class="table table-sm table-striped table-bordered table-hover table-responsive " style="font-size: 11px;">
      <thead >
        <tr class="v-grid-header">
          <th></th>
          <th>Direccion/Familia</th>
          <th class="verticalText text-center">N° H</th>
          <th class="text-center">Condicion</th>

          <th colspan="4" class=" text-center">T Elev</th>
          <th colspan="4" class=" text-center">T Baj</th>
          <th colspan="4" class=" text-center">Bar Cil</th>
          <th colspan="4" class=" text-center">Bal Batea</th>
          <th colspan="4" class=" text-center">Llant</th>
          <th colspan="4" class=" text-center">Flor,Jar</th>
          <th colspan="4" class=" text-center">Lat,Bot</th>
          <th colspan="4" class=" text-center">Inserv</th>
          <th colspan="4" class=" text-center">Otros</th>

          <th colspan="3">Tot D</th>

          <th class=" text-center">Tot Lar/P</th>

          <th class=" text-center">Larv</th>
          <th class=" text-center">N° Dep</th>
          <th class=" text-center">N° Feb</th>

        </tr>

        <tr class="v-grid-header">
          <th></th>
          <th></th>
          <th></th>
          <th></th>

          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>

          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>
          <th >I</th>
          <th >P</th>
          <th >T</th>
          <th >L/P</th>

          <th >I</th>
          <th >P</th>
          <th >T</th>

          <th ></th>


          <th class=" text-center"></th>
          <th class=" text-center"></th>
          <th class=" text-center"></th>

        </tr>


      </thead>
      <tbody id="tbl_items">

      </tbody>
      <tfoot>
        <tr class="v-grid-header">


        </tr>
      </tfoot>
    </table>


  </div>


</div>


</div>

<div class="modal-footer">
  <button type="button" onclick="save();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

</div>

</div>
</div>
</div>