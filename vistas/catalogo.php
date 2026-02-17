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
              <h2>Catalogo <small></small></h2>
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
                  <th></th>
                  <th>Acciones</th>
                  <th>Nombre</th>
                  <th>ID</th>
                  <th>Grupo</th> 
                  <th>Tipo Rot</th> 
                  <th>Tipo Precio</th>                 
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>

                  <th></th>
                  <th>Acciones</th>
                  <th>Nombre</th>
                  <th>ID</th>
                  <th>Grupo</th>  
                  <th>Tipo Rot</th> 
                  <th>Tipo Precio</th>                 
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
  <div data-toggle="modal" id="modalNew"  class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">

      <div class="modal-content">

        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Nuevo</h4>
        </div>

        <div class="modal-body">         
             <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <input type="hidden" id="id_catalogo">

                <label class="control-label">Nombre:</label>
                <input type="text" class="form-control text-uppercase" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Categoria:</label>
                <select class='form-control'  id='id_categoria' style="width: 100%;">
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('4','id_categoria','tpl_categorias','Categoria');" class="btn btn-success input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </div>
            
          </div>   

          <div class="row">


               <div class="col-md-5">
              <div class="form-group">
                <label class="control-label">Tipo Rotacion:</label>
                <select class='form-control'  id='id_tipo_rotacion' style="width: 100%;">
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('16','id_tipo_rotacion','tpl_tipo_rotacion','Tipo Rotacion');" class="btn btn-success input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </div>

             <div class="col-md-5">
              <div class="form-group">
                <label class="control-label">Tipo Precio:</label>
                <select class='form-control'  id='id_tipo_precio' style="width: 100%;">
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('17','id_tipo_precio','tpl_tipo_precio','Tipo Precio');" class="btn btn-success input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
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

  <div id="modalNew2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="panel-title" id="modalTitle">Nuevo Item</h4>
        </div>
        <div class="modal-body">
          
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Nombre:</label>
                
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">Marca:</label>
                <select class='form-control' name='id_marca' id='id_marca' style="width: 100%;" >
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('5','id_marca','tpl_marcas','Marcas');" class="btn btn-warning input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">Laboratorio:</label>
                <select class='form-control' name='id_laboratorio' id='id_laboratorio' >
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('15','id_laboratorio','tpl_laboratorios','Laboratorios');" class="btn btn-warning input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">UM Salida:</label>
                <select class='form-control' name='id_ums' id='id_ums'>
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('6','id_ums','tpl_um','Unidad de Medidad Salida');" class="btn btn-warning input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">UM Ingreso:</label>
                <select class='form-control' name='id_umi' id='id_umi' >
                </select>
              </div>
            </div>
            <div class="col-md-1"><label class="control-label">...</label><br>
              <button type="button" onclick="open_new_tabla('6','id_umi','tpl_um','Unidad de Medidad Ingreso');" class="btn btn-warning input-sm" data-toggle="modal" >
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">Factor:</label>
                <input type="text" class="form-control" name="factor" id="factor" maxlength="50" placeholder="Factor" value="1" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">Precio Compra:</label>
                <input type="text" class="form-control" name="precio_compra" id="precio_compra" maxlength="50" placeholder="Precio Compra" value="0.00" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label"></label><br><br>
                <label>
                  <input type="checkbox" class="flat-red" checked="checked" id="maneja_lotes"> Maneja Lotes
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
          <button onclick="guardaryeditar();" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modaltablas"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" role="document">
      <div class="panel panel-success">
        <div class="panel-heading " >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="panel-title" id="modalItems">Nuevo Item por Tabla</h4>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="nombre_local" class="col-form-label">Nombre:</label>
                <input type="hidden" id="idtabla">
                <input type="hidden" id="nameinput">
                <input type="hidden" id="tpl_name">
                <input type="text" class="form-control text-uppercase" id="descripcion" placeholder="Descripcion"  maxlength="200" required autofocus>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Abreviado:</label>
                <input type="text" class="form-control input-sm text-uppercase" id="abreviado" placeholder="Abreviado"  maxlength="200" required autofocus>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="insert_tabla()"; class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

        </div>
      </div>
    </div>
  </div>


  <!-- Form Local-->
  <div class="modal fade" id="modalLocal"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" role="document">
      <div class="panel panel-success">
        <div class="panel-heading " >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="panel-title" id="modalLocalTitle">Nuevo Local</h4>
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


<script type="text/javascript" src="scripts/catalogo.js?rnd=<? echo rand();?>"></script>
<script type="text/javascript" src="../public/js/mustache.min.js"></script>

<script>

function ver(){
  limpiar();

  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {


$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
})

$('#maneja_lotes').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass: 'iradio_flat-green'
});


$(".select2").select2();
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

$('#modalNew').on('shown.bs.modal', function () {
  $('#nombre').focus();
})

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
