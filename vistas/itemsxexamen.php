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
              <h2>Items consumidos por Examen <small></small></h2>
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

              <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover" style="width: 100%">
                <thead>
                  <tr class="v-grid-header">
                  
                  <th>Acciones</th>
                  <th>Examen</th>
                  <th>ID</th>
                  <th>Item</th> 
                  <th>Tipo Resultado</th> 
                  <th>Cantidad</th>                 
                  
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>

                  
                  <th>Acciones</th>
                  <th>Examen</th>
                  <th>ID</th>
                  <th>Item</th>  
                  <th>Tipo Resultado</th> 
                  <th>Cantidad</th>                 
                  
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
  <div  id="modalNew"  class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md" role="document">

      <div class="modal-content">

        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <input type="hidden" id="edit_mode">
          <h4 class="modal-title" id="myModalLabel">Nuevo</h4>
        </div>

        <div class="modal-body">         
         <div class="row">

           <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputPassword1">Descripcion del Item</label>
              <select  class='form-control input-sm select2  text-uppercase' name='id_item' id='id_item' style="width: 100%;" >
              </select>
            </div>
          </div>

         </div>   

          <div class="row">

           <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputPassword1">Descripcion del Examen</label>
              <select  class='form-control input-sm select2  text-uppercase' name='id_producto' id='id_producto' style="width: 100%;" >
              </select>
            </div>
          </div>

         </div>   

         <div class="row">
           <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Tipo de Resultado</label>
              <select class="form-control" id="id_tipo_resultado">
                <option value="">--Seleccione--</option>
                <option value="P">POSITIVO</option>
                <option value="N">NEGATIVO</option>
              </select>
            </div>
          </div>

            <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Cantidad</label>
              <input type="number" class="form-control" value="1" id="cantidad">
            </div>
          </div>

        </div>



       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="guardaryeditar();">Guardar</button>
        </div>
      </div>
    </div>
  </div>



  


  <!-- Form Local-->
  




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


<script type="text/javascript" src="scripts/itemsxexamen.js?rnd=<? echo rand();?>"></script>
<script type="text/javascript" src="../public/js/mustache.min.js"></script>

<script>

function ver(){
  limpiar();

  $('#id_item').val('').trigger('change.select2');
  $('#id_producto').val('').trigger('change.select2');

  $('#id_item').select2("enable");
  $('#id_producto').select2("enable");
  $("#id_tipo_resultado").prop("disabled",false);


  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {

$("#id_item").select2();
$("#id_producto").select2();

 $('#id_item').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digita descripcion del item.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/items.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, // search term
          page: params.page,
          op : 'findByName',
          emp: ''
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


$('#id_producto').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digita descripcion del examen.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/items.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, // search term
          page: params.page,
          op : 'findExamenByName'          
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


$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
})

$('#maneja_lotes').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass: 'iradio_flat-green'
});


//$(".select2").select2();
$('.itemNamedist').select2({
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

/*$('#modalNew').on('shown.bs.modal', function () {
  $('#nombre').focus();
})*/

/*$("#ubigeo").select2({
dropdownParent: $('#modalNew .modal-body')
});*/

$.getJSON('../ajax/empresa.php?op=list', function(data) {
  var template = $('#tpl_empresas').html();
  var html = Mustache.to_html(template, data);
  $('#id_empresa').html(html);
});



$.getJSON('../ajax/tabla.php?op=list&id_tabla=16', function(data) {
  var template = $('#tpl_tipo_rotacion').html();
  var html = Mustache.to_html(template, data);
  $('#id_tipo_rotacion').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=17', function(data) {
  var template = $('#tpl_tipo_precio').html();
  var html = Mustache.to_html(template, data);
  $('#id_tipo_precio').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=4', function(data) {
  var template = $('#tpl_categorias').html();
  var html = Mustache.to_html(template, data);
  $('#id_categoria').html(html);
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
<script id="tpl_categorias" type="text/template"><option value='' selected>--Seleccione Categoria--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
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

<script id="tpl_tipo_rotacion" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_tipo_precio" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>


<?php
ob_end_flush();
?>
