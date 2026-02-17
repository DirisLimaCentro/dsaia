<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
require 'header.php';

?>
<style type="text/css">
  button,
  .buttons,
  .btn,
  .modal-footer .btn+.btn {
    margin-bottom: 0px;
    margin-right: 0px;

  }

  .btn-success {
    background: #26B99A;
    border: 1px solid #169F85;


  }

  .orange{
    color: orange;
  }

  .navbar-toggle {
    width: 100%;
    float: none;
    margin-right: 0;
  }
</style>
<div class="right_col" role="main">
  <!-- Main content -->
  <!--<section class="content">-->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

      <div class="x_panel">

        <div class="x_title">
          <h2>Ficha de Inspeccion para Vigilancia Sanitaria de Restaurantes y Servicios Afines<small></small></h2>
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

                <th>Acciones</th>
                <th>Establecimiento</th>
                <th>ID</th>
                <th>Fecha</th>
                <th>Centro Encuestado</th>
                <th>RUC</th>
                <th>Persona Responsable</th>
                <th>Creado por</th>
                <th>Fecha Creacion</th>

              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>


              <th>Acciones</th>
              <th>Establecimiento</th>
              <th>ID</th>
              <th>Fecha</th>
              <th>Centro Encuestado</th>
              <th>RUC</th>
              <th>Persona Responsable</th>
              <th>Creado por</th>
              <th>Fecha Creacion</th>

            </tfoot>
          </table>
        </div>


        <? require 'partials/modal_ficha_vigilancia_restaurantes.php'; ?>


        <!-- Form Local-->
        <div class="modal fade" id="modalLocal" role="dialog" aria-hidden="true" data-backdrop="static" tabindex="-1">
          <div class="modal-dialog " role="document">

            <div class="modal-content">
              <!--<div class="panel panel-success">-->
              <div class="modal-header modal-header-success">
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
                      <input type="text" class="form-control text-uppercase" id="nombre_local" placeholder="Nombre" maxlength="200" required autofocus>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Direccion:</label>
                      <input type="text" class="form-control input-sm text-uppercase" id="direccion_local" placeholder="Direccion" maxlength="200" required autofocus>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Distrito:</label>
                      <select class='form-control input-sm select2 itemNamedist text-uppercase' name='id_ubigeo_local' id='id_ubigeo_local' style="width: 100%;">
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Telefono Fijo:</label>
                      <input type="text" class="form-control input-sm" id="telefono_fijo_local" placeholder="Telefono" maxlength="20" required autofocus>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Celular:</label>
                      <input type="text" class="form-control input-sm" id="celular_local" placeholder="Celular" maxlength="20" required autofocus>
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


        <div data-toggle="modal" class="modal fade" id="modalLocalidades" role="dialog" aria-labelledby="modalLocalidades" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header modal-header-success">
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


        <!-- Modal nueva Localidad--->






        <!--Fin centro -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!--</section>-->
  <!-- /.content -->

</div><!-- /.content-wrapper -->










<!--Fin-Contenido-->
<?php
require 'footer.php';
?>



<script type="text/javascript" src="scripts/ficha_vigilancia_restaurantes.js?rnd=<?php echo rand(); ?>"></script>

<script>
  var tblReq;
  var cntValoracion=0; 
  function ver() {

    limpiar();

    $("#id_usuario").val($("#s_id_usuario").val());
    $("#id_local").val($("#s_id_local").val());

    $('#modalNew').modal('show')
    //$("#nombre").focus();
  }

  $(function() {

    $('.text-right').keypress(function(e) {
      var key = window.Event ? e.which : e.keyCode
      return (key >= 48 && key <= 57)
    });


    $("input[type='checkbox']").on('change', function() {
      $(this).val(this.checked ? "true" : "false");
      valorant(this);
    })

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=17', function(data) {
      var template = $('#tpl_sector').html();
      var html = Mustache.to_html(template, data);
      $('#sector').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=1', function(data) {
      var template = $('#tpl_tipo_doc').html();
      var html = Mustache.to_html(template, data);
      $('#tipo_doc').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=40', function(data) {
      var template = $('#tpl_especies').html();
      var html = Mustache.to_html(template, data);
      $('#id_especie').html(html);
      $('#id_especie').selectpicker();
    });




    $('#id_ubigeo_local').select2({
      //dropdownParent: $("#modalLocal"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function() {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term, // search term
            page: params.page,
            op: 'listar'
          };
        },
        results: function(data, page) { // parse the results into the format expected by 
          return {
            results: data
          };
        },
        processResults: function(data, params) {

          for (var i = 0; i < data.length; i++) {
            data[i].id = data[i].id;
          }
          return {
            results: data
          };
        },
        cache: true
      },
      escapeMarkup: function(markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 2,

    });


    //$('#id_localidad').select2();
    /*$('#id_localidad').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function() {
          return 'digite localidad.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/tabla.php",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term, // search term
            page: params.page,
            op: 'findLocalidad',
            sector: $("#sector").val(),
            id_local: $("#id_local").val()
          };
        },
        results: function(data, page) { // parse the results into the format expected
          return {
            results: data
          };
        },
        processResults: function(data, params) {

          for (var i = 0; i < data.length; i++) {
            data[i].id = data[i].id;
          }
          return {
            results: data
          };
        },
        cache: true
      },
      escapeMarkup: function(markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 2,

    });*/


    $('#fecha_inicio').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      },
      autoclose: true,
      singleDatePicker: true,
      singleClasses: "picker_2"
    });


    $('#fecha_termino').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      },
      autoclose: true,
      singleDatePicker: true,
      singleClasses: "picker_2"
    });


    $('#hora_inicio').datetimepicker({
      format: 'hh:mm A'
    });

    $('#hora_termino').datetimepicker({
      format: 'hh:mm A'
    });




    $('#ubigeo').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function() {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term, // search term
            page: params.page,
            op: 'listarUbigeo'
          };
        },
        results: function(data, page) { // parse the results into the format expected by Select2.

          return {
            results: data
          };
        },
        processResults: function(data, params) {

          for (var i = 0; i < data.length; i++) {
            data[i].id = data[i].id;
          }
          return {
            results: data
          };
        },
        cache: true
      },
      escapeMarkup: function(markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 2,

    });


    $('#ubigeo_persona').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function() {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term, // search term
            page: params.page,
            op: 'listar'
          };
        },
        results: function(data, page) { // parse the results into the format expected by Select2.

          return {
            results: data
          };
        },
        processResults: function(data, params) {

          for (var i = 0; i < data.length; i++) {
            data[i].id = data[i].id;
          }
          return {
            results: data
          };
        },
        cache: true
      },
      escapeMarkup: function(markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 2,

    });




    $('#modalNew').on('shown.bs.modal', function() {
      $('#nombre').focus();
    })

    /*$("#ubigeo").select2({
      dropdownParent: $('#modalNew .modal-body')
    });*/
  });
</script>
<script id="tpl_sector" type="text/template"><option value='' selected>--Seleccione Sector--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_tipo_doc" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_especies" type="text/template">
  {{#tablas}}
    <option value='{{id}}'>{{nombre}}</option>
  {{/tablas}}
</script>

<?php
ob_end_flush();
?>