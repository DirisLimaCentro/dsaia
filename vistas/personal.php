<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
require 'header.php';
require_once '../modelos/Local.php';
require_once '../modelos/Tabla.php';
require_once '../modelos/Empresa.php';
$local = new Local();
$tabla = new Tabla();
$empresa = new Empresa();

?>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">

  </style>
  <div class="right_col" role="main">
    <!-- Main content -->
    <!--<section class="content">-->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">

            <div class="x_title">
                <h2>Personal <small></small></h2>
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

              <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
                <thead class="v-grid-header">
                  <th></th>
                  <th>Acciones</th>                  
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Nombres</th>
                  <th>Nro Documento</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Distrito</th>
                  <th>Direccion</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th></th>
                  <th>Acciones</th>                 
                  <th>Paterno</th>
                  <th>Materno</th>
                   <th>Nombres</th>
                  <th>Nro Documento</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Distrito</th>
                  <th>Direccion</th>
                  <th>Estado</th>
                </tfoot>
              </table>
            </div>

            <div data-toggle="modal" class="modal fade" data-backdrop="static"  id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header modal-header-success" >
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="panel-title" id="modalTitle">Nueva Persona</h4>
                   </div>

                  <div class="modal-body">
                    <form data-toggle="validator" role="form" name="frmpersonal" id="frmpersonal" method="POST">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tipo_documento" class="col-form-label">Tipo de documento:</label>
                            <select class="form-control text-uppercase" id="tipo_documento" required autofocus>
                              <?
                              $rspta=$tabla->select('1');
                              while ($reg=pg_fetch_object($rspta)){
                                echo "<option value='".$reg->id_tipo."' >".$reg->descripcion."</option>";}
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">

                         <div class="form-group">
                          <label for="numero_doc" class="col-form-label">Numero Doc:</label>
                          <div class="input-group">

                            <input type="text" class="form-control text-uppercase" id="numero_documento" placeholder="Numero">

                            <div class="input-group-btn">
                              <button class="btn btn-info" type="button" onclick="buscar_reniec();">
                                <i class="glyphicon glyphicon-search" id="btnFindPersona" title="Buscar en RENIEC"></i>
                              </button>
                            </div>
                          </div>
                        </div>


                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="sexo" class="col-form-label">Sexo:</label>
                            <select class="form-control text-uppercase" id="sexo" required autofocus>
                              <option value="M">MASCULINO</option>
                              <option value="F">FEMENINO</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="hidden" name="id_personal" id="id_personal">
                            <input type="text" class="form-control text-uppercase" id="nombre" placeholder="Nombre"  required autofocus>
                            <!--<div class="help-block with-errors">Ingrese nombre de establecimiento!</div>-->
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="apellido_paterno" class="col-form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control text-uppercase" id="apellido_paterno" placeholder="Apellido Paterno" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="apellido_materno" class="col-form-label">Apellido Materno:</label>
                            <input type="text" class="form-control text-uppercase" id="apellido_materno" placeholder="Apellido Materno" required>
                          </div>
                        </div>
                      </div>

                       


                      <div class="row">


                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control text-uppercase" id="direccion" placeholder="Direccion" required>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="ubigeo" class="col-form-label">Distrito:</label>
                            <select class='form-control input-sm select2 itemNamedist text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;" >
                            </select>
                          </div>
                        </div>



                       
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="direccion" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control text-uppercase" id="telefono" placeholder="Telefono" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">

                         <div class="col-md-3">
                          <div class="form-group">
                            <label for="tipo_documento" class="col-form-label">Condicion Laboral:</label>
                            <select class="form-control text-uppercase" id="id_condicion_laboral" required autofocus>
                              <option value="" selected="">--Seleccione--</option>
                              <?
                              $rspta=$tabla->select('91');
                              while ($reg=pg_fetch_object($rspta)){
                                echo "<option value='".$reg->id_tipo."' >".$reg->descripcion."</option>";}
                              ?>
                            </select>
                          </div>
                        </div>  

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="celular" class="col-form-label">Celular:</label>
                            <input type="text" class="form-control text-uppercase" id="celular" placeholder="Celular">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="email">
                          </div>
                        </div>

                        <div class="col-md-3" style="display: none;" >
                          <div class="form-group">
                            <label for="email" class="col-form-label"></label><br>

                            <input  type="checkbox" class="flat-red"  id="externo"> Personal Externo

                            <input  type="checkbox" class="flat-red"  id="autoriza_orden_compra"> Autoriza Orden Compra
                                  
                             <input  type="checkbox" class="flat-red"  id="autoriza_requerimiento"> Autoriza Requerimientos
                                      
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

                  </div>
                </div>
              </div>
            </div>



            <div class="modal fade" id="modalpersonalocal"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" style="overflow:hidden;">
              <div class="modal-dialog" role="document">
                <div class="panel panel-success">
                  <div class="panel-heading " >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="panel-title" id="modalpersonalocalTitle">Nuevo Contacto</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="nombre_local" class="col-form-label">Empresa:</label>
                          <input type="hidden" id="id_personal">
                          <input type="hidden" id="id_persona_local">
                          <select class="form-control" id="empresa">
                            <option value="" selected="">--Seleccione--</option>
                          <?
                          $rspta=$empresa->select();
                          while ($reg=pg_fetch_object($rspta)){
                            echo "<option value='".$reg->id."' >".$reg->nombre."</option>";}
                          ?>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="nombre_local" class="col-form-label">Local:</label>
                          <select class="form-control input-sm select2 itemNamedist text-uppercase" id="local">
                          
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Cargo:</label>
                          <select class="form-control" id="cargo">
                          <?
                          $rspta=$tabla->select('11');
                          while ($reg=pg_fetch_object($rspta)){
                            echo "<option value='".$reg->id_tipo."' >".$reg->descripcion."</option>";}
                          ?>
                        </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="guardaryeditar_personalocal();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
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

<script type="text/javascript" src="scripts/personal.js?rnd=<? echo rand(); ?>"></script>

<script>

function ver(){
  limpiar();

  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {

  $('#autoriza_orden_compra').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
  }); 
  $('#autoriza_requerimiento').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
  }); 

  $('#externo').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
  }); 



  $("#ubigeo").select2();
  $('#ubigeo').select2({
    dropdownParent: $("#modalNew"),
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
          op : 'listarUbigeo'
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

  $('#modalNew').on('shown.bs.modal', function () {
    $('#nombre').focus();
  })

  /*$("#ubigeo").select2({
  dropdownParent: $('#modalNew .modal-body')
});*/
});




</script>


<?php
ob_end_flush();
?>
