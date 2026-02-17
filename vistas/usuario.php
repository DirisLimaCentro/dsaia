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
      <div class="right_col" role="main">
        <!-- Main content -->
        <!--<section class="content">-->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="x_panel">

                <div class="x_title">
                <h2>Usuarios <small></small></h2>
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
                          <thead >
                            <tr class="v-grid-header">
                            <th>Acciones</th>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Persona</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Acciones</th>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Persona</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="modal fade" data-backdrop="static"  id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                         <div class="modal-header modal-header-success" >
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="panel-title" id="modalTitulo">Nueva Usuario</h4>
                          </div>

                          <div class="modal-body">
                            <form data-toggle="validator" role="form" name="frmestablecimiento" id="frmestablecimiento" method="POST">
                              <div class="form-group">
                                <label for="personal" class="col-form-label">Personal:</label>
                                <select class='form-control input-sm select2 itemNameper text-uppercase' name='personal' id='personal' style="width: 100%;" >
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nombre" class="col-form-label">Login:</label>
                                <input type="hidden" name="id_usuario" id="id_usuario">
                                <input type="text" class="form-control text-uppercase" id="login" placeholder="login"  required autofocus>
                                <!--<div class="help-block with-errors">Ingrese nombre de establecimiento!</div>-->
                              </div>
                              <div class="form-group" id="div_clave">
                                <label for="clave" class="col-form-label">Clave:</label>
                                <input type="password" class="form-control text-uppercase" id="clave" placeholder="Clave" required>
                              </div>
                              <div class="form-group">
                                <label for="nivel" class="col-form-label">Nivel:</label>
                                <select class="form-control text-uppercase" id="nivel" required autofocus>
                                  <?
                                  $rspta=$tabla->select('13');
                                  while ($reg=pg_fetch_object($rspta)){
                                    echo "<option value='".$reg->id_tipo."' >".$reg->descripcion."</option>";}
                                  ?>
                                </select>
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




                    <div data-toggle="modal" data-backdrop="static" class="modal fade "   id="modalAccesos"  role="dialog" aria-labelledby="modalAccesos" aria-modal="true" tabindex="-1" >
                      <div class="modal-dialog modal-md" style="width: 70%; " role="document">



                        <div class="modal-content">


                         <div class="modal-header modal-header-success" >
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="panel-title" id="modalTitle2">Otorgar Accesos</h4>
                        </div>

                        <div class="modal-body">
                            <?php require "partials/content_accesos.php"; ?>
                        </div>
                      </div>
                    </div>
                  </div>




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

<script type="text/javascript" src="scripts/usuario.js?rnd=<?php echo rand(); ?>"></script>
<script type="text/javascript" src="scripts/accesos.js?rnd=<?php echo rand(); ?>"></script>
<script>

function ver(){
  limpiar();
  

  $("#login").prop("disabled",false);
  $("#div_clave").show();

  //$('#personal').select2("enable", true)
  $('#personal').select2('enable');

  $("#modalTitulo").html("Nuevo Registro");
  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {

  $("#personal").select2();
  $('#personal').select2({
    dropdownParent: $("#modalNew"),
    language: {
      inputTooShort: function () {
        return 'digita nombre de la persona.';
      }
    },
    ajax: {
      type: "GET",
      url: "../ajax/personal.php",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page,
          op : 'listarp'
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

  $('#personal').on('change', function() {
      var data = $("#personal").select2('data');
      //console.log(data[0].nombres);


      nom=data[0].nombres;
      app=data[0].ape_paterno;
      pos=nom.lastIndexOf(' ')
      if (pos>0){
        log=nom.substr(0,nom.lastIndexOf(' '))+"."+app;
      }else{
        log=nom+"."+app;
      }  
      $("#login").val(log);
    

  })

  /*$('#personal').on("select2:close", function(e) {
    generalogin();
  });*/

  /*$("#ubigeo").select2({
  dropdownParent: $('#modalNew .modal-body')
});*/
});




</script>
<script id="tpl_menus" type="text/template">
  <option value='' selected>--Seleccione--</option>
  {{#menus}}<option value='{{id}}' >{{nombre}}</option>{{/menus}}
</script>

<script id="tpl_menus_detalle" type="text/template">  
  {{#menus}}<option value='{{id}}' >{{nombre}}</option>{{/menus}}
</script>

<script id="tpl_accesos" type="text/template">  
  {{#accesos}}<option value='{{id}}' >{{nombre}}</option>{{/accesos}}
</script>

<script id="tpl_usuarios" type="text/template">
  <option value='' selected>--Seleccione--</option>
  {{#usuarios}}<option value='{{id}}' >{{nombre}}</option>{{/usuarios}}
</script>

<?php
ob_end_flush();
?>
