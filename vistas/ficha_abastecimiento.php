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
          <h2>Ficha Evaluacion de Sistema de Abastecimientos de Agua en EE.SS. <small></small></h2>
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
                <th>Distrito</th>
                <th>RIS</th>
                <th>Celular</th>
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
              <th>Distrito</th>
              <th>RIS</th>
              <th>Celular</th>
              <th>Creado por</th>
              <th>Fecha Creacion</th>

            </tfoot>
          </table>
        </div>


        <? require 'partials/modal_ficha_abastecimiento.php'; ?>


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



<script type="text/javascript" src="scripts/ficha_abastecimiento.js?rnd=<?php echo rand(); ?>"></script>

<script>
  var tblReq;

  function ver() {

    


    limpiar();

    $("#establecimiento").val($("#s_local").val());
    $("#distrito").val($("#s_distrito").val());
    $("#ris").val($("#s_ris").val());

    $('#modalNew').modal('show')
    //$("#nombre").focus();
  }

  $(function() {

    $('#hora_muestreo').datetimepicker({
      format: 'hh:mm A'
    });

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

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=83', function(data) {
      var template = $('#tpl_tipos_sistema').html();
      var html = Mustache.to_html(template, data);
      $('#id_tipo_sistema').html(html);
      //$('#id_especie').selectpicker();
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


    $('#fecha_encuesta').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      },
      autoclose: true,
      singleDatePicker: true,
      singleClasses: "picker_2"
    });

  
    $('#fecha_muestreo').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      todayHighlight: true
      //startDate: '-3d'
    });

    /*$('#fecha_ultima_limpieza').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY',
        cancelLabel: 'Clear'
      },
      autoUpdateInput: true,
      autoclose: true,
      singleDatePicker: true,
      singleClasses: "picker_2"
    });*/

    $('#fecha_ultima_limpieza').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      todayHighlight: true,
      language: 'es'
      //startDate: '-3d'
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

<script id="tpl_tipos_sistema" type="text/template"><option value='' selected>--Seleccione tipo--</option>
  {{#tablas}}
    <option value='{{id}}'>{{nombre}}</option>
  {{/tablas}}
</script>

<?php
ob_end_flush();
?>