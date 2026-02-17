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
    <section class="row">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel ">

            <div class="x_title">
                <h2>Proveedores <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a><a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a>
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

              <table id="tbllistado" class="table table-striped table-bordered  table-hover"  width="100%">

                <thead >
                  <th></th>
                  <th>Acciones</th>
                  <th>Razon Social</th>
                  <th>Nombre Comercial</th>
                  <th>Direccion</th>
                  <th>RUC</th>
                  <th>Telefono</th>
                  <th>Celular</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th></th>
                  <th>Acciones</th>
                  <th>Razon Social</th>
                  <th>Nombre Comercial</th>
                  <th>Direccion</th>
                  <th>RUC</th>
                  <th>Telefono</th>
                  <th>Celular</th>
                  <th>Estado</th>
                </tfoot>
              </table>
            </div>

            <div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
              <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">

                <!--<div class="panel panel-primary">-->
                  <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h4 class="panel-title" id="modalTitle">Nuevo Proveedor</h4>        
                    </div>    

                  <div class="modal-body">
                    <form data-toggle="validator" role="form" name="frmproveedor" id="frmproveedor" method="POST">
                      <div class="row">
                        <div class="col-md-4">

                          <div class="form-group">
<label for="ruc" class="col-form-label">RUC:</label>
                          <div class="input-group">
                           
                            <input type="text" class="form-control text-uppercase" id="ruc" placeholder="RUC">

                            <div class="input-group-btn">
      <button class="btn btn-default" type="button" onclick="buscar_sunat();">
        <i class="glyphicon glyphicon-search" title="Buscar en SUNAT"></i>
      </button>
    </div>
            </div>
</div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nombre" class="col-form-label">Razon Social:</label>
                            <input type="hidden" name="id_proveedor" id="id_proveedor">
                            <input type="text" class="form-control text-uppercase" id="nombre" placeholder="Nombre"  required autofocus>
                            <!--<div class="help-block with-errors">Ingrese nombre de establecimiento!</div>-->
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nombre_comercial" class="col-form-label">Nombre Comercial:</label>
                            <input type="text" class="form-control text-uppercase" id="nombre_comercial" placeholder="Nombre Comercial" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                       
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control text-uppercase" id="direccion" placeholder="Descripción" required>
                          </div>
                        </div>

                         <div class="col-md-3">
                          <div class="form-group">
                            <label for="ubigeo" class="col-form-label">Distrito:</label>
                            <select class='form-control input-sm select2 itemNamedist text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;" >
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <label for="telefono_fijo" class="col-form-label">Telefono Fijo:</label>

                          <div class="form-group has-feedback">                            
                            <input type="text" class="form-control" id="telefono_fijo" placeholder="Telefono Fijo">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            

                          </div>
                        </div>
                        <div class="col-md-2">
                            <label for="Celular" class="col-form-label">Celular:</label>

                            <div class="form-group has-feedback">
                              
                              <input type="text" class="form-control" id="celular" placeholder="Celular">
                              <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                      </div>
                      <div class="row">
                        

                        

                        <div class="col-md-4">

                          <label for="Email" class="col-form-label">Email 1:</label>

                          <div class="form-group has-feedback">
                            
                            <input type="text" class="form-control" id="email" placeholder="Email 1">
                            <span class="fa fa-envelope  form-control-feedback right" aria-hidden="true"></span>

                          </div>
                        </div>

                         <div class="col-md-4">
                          <label for="Email" class="col-form-label">Email 2:</label>
                          <div class="form-group has-feedback">
                            
                            <input type="text" class="form-control" id="e_mail_alt" placeholder="Email 2">
                            <span class="fa fa-envelope  form-control-feedback right" aria-hidden="true"></span>
                          </div>
                        </div>


                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="Web" class="col-form-label">Web:</label>
                            <input type="text" class="form-control" id="web" placeholder="Web">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="Facebook" class="col-form-label">Facebook:</label>
                            <input type="text" class="form-control" id="facebook" placeholder="Facebook">
                          </div>
                        </div>
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





            <div class="modal fade" id="modalcontacto"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" style="overflow:hidden;">
              <div class="modal-dialog" role="document">
                <div class="panel panel-success">
                  <div class="panel-heading " >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="panel-title" id="modalcontactoTitle">Nuevo Contacto</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="nombre_local" class="col-form-label">Nombre:</label>
                          <input type="hidden" id="id_proveedor_contacto">
                          <input type="hidden" name="id_contacto" id="id_contacto">
                          <input type="text" class="form-control text-uppercase" id="nombre_contacto" placeholder="Nombre"  maxlength="200" required autofocus>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Telefono Fijo:</label>
                           <input type="text" class="form-control input-sm text-uppercase" id="telefono_fijo_contacto" placeholder="telefono fijo"  maxlength="200" required autofocus>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Celular:</label>
                           <input type="text" class="form-control input-sm text-uppercase" id="celular_contacto" placeholder="Celular"  maxlength="200" required autofocus>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Email:</label>
                           <input type="text" class="form-control input-sm" id="email_contacto" placeholder="Email"  required autofocus>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="guardaryeditar_contacto();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin centro -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->

  </div><!-- /.content-wrapper -->

  <!--Fin-Contenido-->
  <?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/proveedor.js?rnd=<?php echo rand(); ?>"></script>

<script>
function buscar_sunat(){
  $("#loaderModal").show();
  $.ajax({
    url: "../ajax/services.php",
    dataType: "json",
    method: "get",
    async : false,
    data: {
      accion: "LOAD_SUNAT",
      ruc: $("#ruc").val(),
    },
    beforeSend: function () {
        //$("#dialog-sunat").dialog("open");
      },
      success: function (result) {
                //$("#loaderRUC").hide();
                /*if (result.success) {
                    $("#txtorganizacion").val(result.result.razon_social);
                } else {
                    showMessage("Ingrese nro ruc válido", "error");
                  }*/
                   $("#loaderModal").hide();
                  if (result.msj=='') {
                    $("#nombre").val(result.razon_social);
                    $("#direccion").val(result.direccion);
                    //$("#nombre_comercial").val(result.result.nombre_comercial);
                  }else{
                    alert("Ocurrio un error en la busqueda");
                  }

          },
            timeout: 12000, // sets timeout to 30 seconds
            error: function (request, status, err) {
              $("#loaderModal").hide();
              if (status == "timeout") {
                    //showMessage("Su petición demoro mas de lo permitido", "error");
                    alert("Su petición demoro mas de lo permitido");
                  } else {
                    //showMessage("ocurrio un error en su petición.", "error");
                    alert("ocurrio un error en su petición.");
                  }
                }
              });
}



function ver(){
  limpiar();

  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {

  $(".select2").select2();
  $('.itemNamedist').select2({
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
});




</script>


<?php
ob_end_flush();
?>
