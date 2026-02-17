<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
  require 'header.php';

  if ($_SESSION['almacen']==0)
  {
    ?>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">        
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">

                <button type="button" class="btn btn-primary" data-toggle="modal" onclick="ver();" >
                  Nuevo
                  <span class="glyphicon glyphicon-plus"></span>
                </button>

                <div class="box-tools pull-right">
                </div>
              </div>
              <!-- /.box-header -->
              <!-- centro -->
              <div class="panel-body table-responsive" id="listadoregistros">
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>Medico Jefe</th>

                    <th>Estado</th>
                  </thead>
                  <tbody>                            
                  </tbody>
                  <tfoot>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>Medico Jefe</th>
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

              <div class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" style="overflow:hidden;">
                <div class="modal-dialog" role="document">
                  <div class="panel panel-primary">
                    <div class="panel-heading " >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h4 class="panel-title" id="modalTitle">Nuevo Establecimiento</h4>        
                    </div>      

                    <div class="modal-body">
                      <form data-toggle="validator" role="form" name="frmestablecimiento" id="frmestablecimiento" method="POST">
                        <div class="form-group">
                          <label for="nombre" class="col-form-label">Nombre:</label>
                          <input type="hidden" name="id_establecimiento" id="id_establecimiento">
                          <input type="text" class="form-control text-uppercase" id="nombre" placeholder="Nombre"  required autofocus>
                          <!--<div class="help-block with-errors">Ingrese nombre de establecimiento!</div>-->
                        </div>
                        <div class="form-group">
                          <label for="direccion" class="col-form-label">Direccion:</label>
                          <input type="text" class="form-control text-uppercase" id="direccion" placeholder="Direccion" required>
                        </div>

                        <div class="form-group">
                          <label for="ubigeo" class="col-form-label">Distrito:</label>
                          
                          <select class='form-control input-sm select2 itemNamedist text-uppercase' name='ubigeo' id='ubigeo' style="width: 100%;" >
                          </select>

                        </div>


                        <div class="form-group">
                          <label for="medico_jefe" class="col-form-label">Medico Jefe:</label>
                          <input type="text" class="form-control text-uppercase" id="medico_jefe" placeholder="Medico jefe">
                        </div>
                        <div class="form-group">
                          <label for="telefono_fijo" class="col-form-label">Telefono Fijo:</label>
                          <input type="text" class="form-control" id="telefono_fijo" placeholder="Telefono Fijo">
                        </div>
                        
                        <div class="form-group">
                          <label for="celular" class="col-form-label">Celular:</label>
                          <input type="text" class="form-control" id="celular" placeholder="Celular">
                        </div>

                        <div class="form-group">
                          <label for="correo">Email address</label>
                          <input type="email" class="form-control" id="correo" placeholder="name@example.com">
                        </div>  


                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="guardaryeditar();" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
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
  }
  else
  {
    require 'noacceso.php';
  }

  require 'footer.php';
  ?>



  <script type="text/javascript" src="scripts/establecimiento.js"></script>

  <script>

    function ver(){
      limpiar();

      $('#modalNew').modal('show')
      //$("#nombre").focus();
    }

    $(function () {

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
});



 
  </script>


  <?php 
}
ob_end_flush();
?>


