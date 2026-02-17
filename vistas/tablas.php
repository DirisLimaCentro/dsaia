<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
require 'header.php';

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
              <h2>Tablas General <small></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                      <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>



            <div class="x_content ">
                  <div class="row">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="cbotabla" class="col-form-label">Tabla de Datos:</label>
                            <select class='form-control input-sm select2 itemNamedist text-uppercase' name='cbotabla' id='cbotabla' onchange='table.ajax.reload();' style="width: 100%;" >
                            </select>
                          </div>
                        </div>
                  </div>
            </div>
                            <!-- /.box-header -->
            <!-- centro -->
            <div class="x_content" id="listadoregistros">

              <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover" style="width: 100%">
                <thead>
                   <tr class="v-grid-header">
                  <!--<th></th>-->
                  <th>Acciones</th>                  
                  <th>Nombre</th>
                  <th>Codigo</th>
                  <th>Abreviatura</th>                  
                  <th>Fecha de Creacion</th>
                  <th>Estado</th>
                  
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <!--<th></th>-->                  
                  <th>Acciones</th>
                  <th>Nombre</th>
                  <th>Codigo</th>
                  <th>Abreviatura</th> 
                  <th>Fecha de Creacion</th>
                  <th>Estado</th>
                  
                </tfoot>
              </table>
            </div>


            <!--<div class="panel-body" style="height: 400px;" id="formularioregistros">
            <form name="formulario" id="formulario" method="POST">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Nombre:</label>
            <input type="hidden" name="idestablecimiento" id="idestablecimiento">
            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label>Direccion:</label>
          <input type="text" class="form-control" name="direccion" id="direccion" maxlength="256" placeholder="Descripción">
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
      </div>
    </form>
  </div>-->
  
  <div id="modalNew" data-toggle="modal" class="modal fade" data-backdrop="static" style="overflow-y: scroll;" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="panel-title" id="modalTitle">Nuevo Registro</h4>
        </div>
        <div class="modal-body">

          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            <!--<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>-->
          </ul>

          <div class="tab-content">
              <div id="home" class="tab-pane fade in active">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" id="id_item">

                        <label class="control-label">Tabla:</label><input type="hidden" id="haccion">
                        <input type="hidden" id="hid_tipo">
                        <input type="text" class="form-control text-uppercase" disabled="" id="txttabla" placeholder="tabla"  maxlength="200" required autofocus>
                      </div>
                    </div>
                   
                    
                  </div>
                  <div class="row">
                   
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Descripcion:</label>
                        <input type="text" class="form-control text-uppercase" id="txtdescripcion" placeholder="Descripcion"  maxlength="200" required autofocus>
                        </select>
                      </div>
                    </div>
                    

                  </div>
                  <div class="row">
                    
                      <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Abreviatura:</label>
                        <input type="text" class="form-control" name="factor" id="txtabreviatura" maxlength="20" placeholder="Abreviatura" value="" required>
                      </div>
                    </div>
                   

                  </div>

            </div>

        </div>    


        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
          <button onclick="guardaryeditar();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
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



<script type="text/javascript" src="scripts/tablas.js?rnd=<? echo rand(); ?>"></script>
<script type="text/javascript" src="../public/js/mustache.min.js"></script>

<script>

function ver(){
  limpiar();

  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {


  /*$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-blue',
  radioClass   : 'iradio_flat-green'
})*/
$("#id_catalogo").select2();
$('#id_catalogo').select2({
  dropdownParent: $("#modalNew"),
  placeholder: "Seleccione",
  language: {
    inputTooShort: function () {
      return 'Digite catalogo';
    }
  },
  ajax: {
    type: "GET",
    url: "../ajax/catalogo.php",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
          q: params.term, // search term
          page: params.page,
          op : 'listCatalogos'
        };
      },
      results: function (data, page) { // parse the results into the format expected
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
  
  $('#id_catalogo').on('change', function() {
        var id_catalogo = $("#id_catalogo option:selected").val();
        $.post("../ajax/catalogo.php?op=mostrar",{id_catalogo : id_catalogo}, function(data, status){
          data = JSON.parse(data);
          $("#categoria").val(data.categoria);
            //$("#ruc").val(data.ruc);
        });

    });


$('#maneja_lotes').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass: 'iradio_flat-green'
});


//$(".select2").select2();




$('#modalNew').on('shown.bs.modal', function () {
  //$('#nombre').focus();
})

/*$("#ubigeo").select2({
dropdownParent: $('#modalNew .modal-body')
});*/

$.getJSON('../ajax/empresa.php?op=list', function(data) {
  var template = $('#tpl_empresas').html();
  var html = Mustache.to_html(template, data);
  $('#id_empresa').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=0&default=11', function(data) {
  var template = $('#tpl_tablas').html();
  var html = Mustache.to_html(template, data);
  $('#cbotabla').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=5', function(data) {
  var template = $('#tpl_marcas').html();
  var html = Mustache.to_html(template, data);
  $('#id_marca').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=15', function(data) {
  var template = $('#tpl_laboratorios').html();
  var html = Mustache.to_html(template, data);
  $('#id_laboratorio').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=6', function(data) {
  var template = $('#tpl_um').html();
  var html = Mustache.to_html(template, data);
  $('#id_ums').html(html);
  $('#id_umi').html(html);

});

});

</script>

<script id="tpl_empresas" type="text/template"><option value='' selected>--Seleccione Empresa--</option>
  {{#empresas}}<option value='{{id}}'>{{nombre}}</option>{{/empresas}}
</script>
<script id="tpl_tablas" type="text/template">{{#tablas}}<option value='{{id}}' {{selected}} >{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_marcas" type="text/template"><option value='' selected>--Seleccione Marca--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_um" type="text/template"><option value='' selected>--Seleccione Unidad de Medida--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_laboratorios" type="text/template"><option value='' selected>--Seleccione Laboratorio--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>



<?php
ob_end_flush();
?>
