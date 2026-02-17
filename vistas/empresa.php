<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 require 'header.php';
 ?>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    
    <div class="right_col" role="main">        
      <!-- Main content -->
      <!--<section class="content">-->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              
              <div class="x_title">
                <h2>Establecimientos <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>


              
              <!-- /.box-header -->
              <!-- centro -->
              <div class="x_content" id="listadoregistros">
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>
                    
                    <tr class="v-grid-header">
                    <th></th>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>RUC</th>
                    <th>Estado</th>
                    </tr>  
                  </thead>
                  <tbody>                            
                  </tbody>
                  <tfoot>
                    
                    <th></th>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>RUC</th>
                    <th>Estado</th>
                  </tfoot>
                </table>
              </div>

              
             

              <div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog " role="document">

                  <div class="modal-content">

                    <!--<div class="panel panel-primary">-->
                      <div class="modal-header modal-header-success" >
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                        <h4 class="panel-title" id="modalTitle">Nueva Empresa</h4>        
                      </div>      

                      <div class="modal-body">
                        <form data-toggle="validator" role="form" name="frmestablecimiento" id="frmestablecimiento" method="POST" novalidate>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ruc" class="col-form-label">RUC:</label>
                                <div class="input-group">

                                  <input type="text" class="form-control text-uppercase" id="ruc" placeholder="RUC">

                                  <div class="input-group-btn">
                                    <button class="btn btn-default" id="btnfindRuc" type="button" onclick="buscar_sunat();">
                                      <i class="glyphicon glyphicon-search" title="Buscar en SUNAT"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-8">
                             <div class="item form-group">
                              <label for="nombre" class="col-form-label">Razon Social: <span class="required">*</span></label>
                              <input type="hidden" name="id_empresa" id="id_empresa">
                              <input type="text" data-validate-length-range="6" class="form-control text-uppercase" id="nombre" placeholder="Nombre"  required="required" autofocus>                          
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="direccion" class="col-form-label">Nombre Comercial:</label>
                          <input type="text" class="form-control text-uppercase" id="nombre_comercial" placeholder="Nombre Comercial" required>
                        </div>


                        <div class="form-group">
                          <label for="direccion" class="col-form-label">Direccion:</label>
                          <input type="text" class="form-control text-uppercase" id="direccion" placeholder="Descripción" required>
                        </div>

                        <div class="form-group">
                          <label for="ubigeo" class="col-form-label">Distrito:</label>
                          
                          <select class='form-control input-sm select2 itemNamedist text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;" >
                          </select>

                        </div>

                        <div class="form-group">
                          <label for="telefono_fijo" class="col-form-label">Telefono Fijo:</label>
                          <input type="text" class="form-control" id="telefono_fijo" placeholder="Telefono Fijo">
                        </div>  

                        <div class="form-group">
                          <label for="telefono_fijo" class="col-form-label">Correo:</label>
                          <input type="text" class="form-control" id="correo" placeholder="Correo">
                        </div>  


                        
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

                    </div>
                    <!--</div>-->

                  

                    


                  </div>
                </div>

              </div>






              <!-- Form Local-->
              <div class="modal fade" id="modalLocal"  role="dialog"  aria-hidden="true" data-backdrop="static" tabindex="-1">
                <div class="modal-dialog " role="document">

                  <div class="modal-content">
                  <!--<div class="panel panel-success">-->
                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h4 class="panel-title" id="modalTitle">Nueva Area</h4>        
                    </div>   

                    <div class="modal-body">
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">                            
                            <label for="nombre_local" class="col-form-label">Nombre:</label>
                            <input type="hidden" id="id_empresa_local">
                            <input type="hidden" name="id_local" id="id_local">
                            <input type="text" class="form-control text-uppercase" id="nombre_local" placeholder="Nombre"  maxlength="200" required autofocus>
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Direccion:</label>
                             <input type="text" class="form-control input-sm text-uppercase" id="direccion_local" placeholder="Direccion"  maxlength="200" required autofocus>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Distrito:</label>
                             <select class='form-control input-sm select2 itemNamedist text-uppercase' name='id_ubigeo_local' id='id_ubigeo_local' style="width: 100%;" >
                          </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Telefono Fijo:</label>
                             <input type="text" class="form-control input-sm" id="telefono_fijo_local" placeholder="Telefono"  maxlength="20" required autofocus>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Celular:</label>
                             <input type="text" class="form-control input-sm" id="celular_local" placeholder="Celular"  maxlength="20" required autofocus>
                          </div>
                        </div>
                      </div>  



                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="guardaryeditar_local();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

                    </div>
                  <!--</div>-->
                </div>

                </div>
              </div>


              <div data-backdrop="static" data-toggle="modal" class="modal fade"  id="modalLocalidades" style="overflow-y: scroll;"  role="dialog" aria-labelledby="modalLocalidades" aria-hidden="true" tabindex="-1" >
                <div class="modal-dialog modal-md " role="document">
                  <div class="modal-content">
                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalTitleLocalidad">Listado de Localidades</h4>
                    </div>

                    <div class="modal-body">

                      <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">


                          <table id="tbllocalidades" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
                            <thead class="v-grid-header"> 

                              <th>Acciones</th>
                              <th>Sector</th>
                              <th>Localidad</th>                       
                              <th>Viviendas</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                              <th>Acciones</th>
                              <th>Sector</th>
                              <th>Localidad</th>                       
                              <th>Viviendas</th>
                            </tfoot>
                          </table>

                        </div>

                      </div>


                    </div>
                    <div class="modal-footer">
                     <!--<button type="button" onclick="save();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>-->
                     <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
                   </div>
                 </div>
               </div>
             </div>  

             <!--Modal Coberturas-->
               <div data-backdrop="static" data-toggle="modal" class="modal fade"  id="modalCoberturas" style="overflow-y: scroll;"  role="dialog" aria-labelledby="modalCoberturas" aria-hidden="true" tabindex="-1" >
                <div class="modal-dialog modal-lg " role="document">
                  <div class="modal-content">
                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalTitleLocalidad">Coberturas Mensual</h4>
                    </div>

                    <div class="modal-body">

                      <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12" id="div_coberturas"></div>

                      </div>


                    </div>
                    <div class="modal-footer">
                     
                     <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
                   </div>
                 </div>
               </div>
             </div>  




<!-- Modal nueva Localidad--->
  <div data-backdrop="static" class="modal fade" id="modalNewLocalidad"  role="dialog" aria-labelledby="modalNewLocalidad" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">

              <div class="modal-content">

                  <!--<div class="panel panel-primary">-->
                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h4 class="panel-title" id="modalTitleLoc">Nueva Localidad</h4> 
                      <input type="hidden" id="id_localidad" value="0" >  
                    </div>      

                    <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Sector</label>
                                <select class='form-control'  id='sector'  >
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="nombre_localidad">Localidad</label>
                                    <input type="text" class="form-control" id="nombre_localidad" placeholder="Localidad">
                              </div>
                            </div>  
                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for="nombre_localidad">Viviendas</label>
                                    <input type="number" value="0" class="form-control" id="cnt_viviendas" >
                              </div>
                            </div>  
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="saveLocalidad();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

                    </div>

                  </div>
              </div>
</div>


<div data-backdrop="static" class="modal fade" id="modalNewCobertura"  role="dialog" aria-labelledby="modalNewCobertura" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">

              <div class="modal-content">

                  <!--<div class="panel panel-primary">-->
                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h4 class="panel-title" id="modalTitleCob">Nueva Cobertura</h4> 
                      
                    </div>      

                    <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tipo Actividad:</label>
                                <select class='form-control'  id='id_actividad'  >
                                </select>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="nombre_localidad">Año:</label>
                                    <input  class="form-control " id="anio_cobertura" value="<?=date('Y');?>"  >
                              </div>
                            </div>  
                          </div>

                          <div class="row" id="div_meses">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Enero:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtenero" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Febrero:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtfebrero" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Marzo:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtmarzo" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Abril:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtabril" onfocus="this.select();" >
                              </div>
                            </div>

                         

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Mayo:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtmayo" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Junio:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtjunio" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Julio:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtjulio" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Agosto:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtagosto" onfocus="this.select();" >
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Setiembre:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtsetiembre" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Octubre:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtoctubre" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Noviembre:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtnoviembre" onfocus="this.select();" >
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nombre_localidad">Diciembre:</label>
                                <input type="text" class="form-control text-right" value="0" id="txtdiciembre" onfocus="this.select();" >
                              </div>
                            </div>

                          </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="saveCobertura();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

                    </div>

                  </div>
              </div>
</div>





              <!--Fin centro -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      
      <!--</section>--><!-- /.content -->

    </div><!-- /.content-wrapper -->










    <!--Fin-Contenido-->
    <?php
   require 'footer.php';
  ?>



  <script type="text/javascript" src="scripts/empresa.js?rnd=<?php echo rand(); ?>"></script>

  <script>
var tblReq; 
var tblCob;

    function ver(){
      limpiar();

      $('#modalNew').modal('show')
      //$("#nombre").focus();
    }

    $(function () {

    $(".select2").select2();

     $.getJSON('../ajax/tabla.php?op=list&id_tabla=17', function(data) {
      var template = $('#tpl_sector').html();
      var html = Mustache.to_html(template, data);
      $('#sector').html(html);
    });

      $.getJSON('../ajax/tabla.php?op=list&id_tabla=18', function(data) {
      var template = $('#tpl_actividad').html();
      var html = Mustache.to_html(template, data);
      $('#id_actividad').html(html);
    });


    $('#id_ubigeo_local').select2({
      dropdownParent: $("#modalLocal"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, // search term
          page: params.page,
          op : 'listar'
        };
      },
      results: function (data, page) { // parse the results into the format expected by 
        return { results: data };
      },
      processResults: function (data, params) {
       
        for (var i = 0; i < data.length; i++) {
          data[i].id = data[i].id;
        }
        return {
          results: data
        };
      },
      cache: true
    },
    escapeMarkup: function (markup) {
      return markup;
    }, // let our custom formatter work
    minimumInputLength: 2,
   
  });



    $('#ubigeo').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, // search term
          page: params.page,
          op : 'listar'
        };
      },
      results: function (data, page) { // parse the results into the format expected by Select2.
        // since we are using custom formatting functions we do not need to alter remote JSON data
        return { results: data };
      },
      processResults: function (data, params) {
        //alert(data);
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        for (var i = 0; i < data.length; i++) {
          data[i].id = data[i].id;
        }
        return {
          results: data
        };
      },
      cache: true
    },
    escapeMarkup: function (markup) {
      return markup;
    }, // let our custom formatter work
    minimumInputLength: 2,
    //templateResult: formatRepo, // omitted for brevity, see the source of this page
    //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  });





   $(document).on('hidden.bs.modal', '.bootbox.modal', function (e) {    
        if($(".modal").hasClass('in')) {
            $('body').addClass('modal-open');
        }
      });

    /*$("#ubigeo").select2({
      dropdownParent: $('#modalNew .modal-body')
    });*/
});



 
  </script>
<script id="tpl_sector" type="text/template"><option value='' selected>--Seleccione Sector--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_actividad" type="text/template"><option value='' selected>--Seleccione Actividad--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

  <?php 
ob_end_flush();
?>


