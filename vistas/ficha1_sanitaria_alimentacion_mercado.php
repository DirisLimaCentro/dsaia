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

          <h2>Ficha 1 Vigilancia Sanitaria en Mercado De Abasto <small>

              <br> Carnes y Menudencias de Animales de Abasto
            </small></h2>


          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
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
          <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover "
            style="width: 100%">
            <thead>

              <tr class="v-grid-header">

                <th>Acciones</th>
                <th>Establecimiento</th>
                <th>ID</th>
                <th>Fecha</th>
                <th>Nombre del Mercado</th>
                <th>Razon Social</th>
                <th>N° Puesto</th>
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
              <th>Responsable del Mercado</th>
              <th>Razon Social</th>
              <th>N° Puesto</th>
              <th>Creado por</th>
              <th>Fecha Creacion</th>

            </tfoot>
          </table>
        </div>


        <?php require 'partials/modal_mercado_ficha1_sanitaria_alimentacion.php'; ?>


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
                      <input type="text" class="form-control text-uppercase" id="nombre_local" placeholder="Nombre"
                        maxlength="200" required autofocus>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Direccion:</label>
                      <input type="text" class="form-control input-sm text-uppercase" id="direccion_local"
                        placeholder="Direccion" maxlength="200" required autofocus>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Distrito:</label>
                      <select class='form-control input-sm select2 itemNamedist text-uppercase' name='id_ubigeo_local'
                        id='id_ubigeo_local' style="width: 100%;">
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Telefono Fijo:</label>
                      <input type="text" class="form-control input-sm" id="telefono_fijo_local" placeholder="Telefono"
                        maxlength="20" required autofocus>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Celular:</label>
                      <input type="text" class="form-control input-sm" id="celular_local" placeholder="Celular"
                        maxlength="20" required autofocus>
                    </div>
                  </div>
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" onclick="guardaryeditar_local();" class="btn btn-success"><i
                    class="fa fa-save"></i> Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                    class="fa fa-arrow-circle-left"></i> Cerrar</button>

              </div>
              <!--</div>-->
            </div>

          </div>
        </div>


        <div data-toggle="modal" class="modal fade" id="modalLocalidades" role="dialog"
          aria-labelledby="modalLocalidades" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="panel-title" id="modalTitleLocalidad">Listado de Localidades</h4>
              </div>

              <div class="modal-body">

                <div class="row">

                  <div class="col-md-12 col-sm-12 col-xs-12">


                    <table id="tbllocalidades" class="table table-striped table-bordered dt-responsive table-hover "
                      cellspacing="0" style="width: 100%">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                    class="fa fa-arrow-circle-left"></i> Cerrar</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal nueva Localidad--->
        <div data-backdrop="static" class="modal fade" id="modalNewLocalidad" role="dialog"
          aria-labelledby="modalNewLocalidad" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog modal-md" role="document">

            <div class="modal-content">

              <!--<div class="panel panel-primary">-->
              <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="panel-title" id="modalTitleLoc">Nueva Localidad</h4>
                <input type="hidden" id="id_localidad" value="0">
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Sector</label>
                      <select class='form-control' id='sector'>
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
                      <input type="number" value="0" class="form-control" id="cnt_viviendas">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="saveLocalidad();" class="btn btn-success"><i class="fa fa-save"></i>
                  Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                    class="fa fa-arrow-circle-left"></i> Cancelar</button>

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



<script type="text/javascript" src="scripts/ficha1_sanitaria_alimentacion.js?rnd=<?php echo rand(); ?>"></script>

<script>
  var tblReq;

  function ver() {

    limpiar();

    $("#hid_local").val($("#s_id_local").val());

    $("#establecimiento").val($("#s_local").val())


    $("#distrito").val($("#s_distrito").val())

    $("#fecha_encuesta").val($("#s_hoy").val())

    $('#modalNew').modal('show')
    //$("#nombre").focus();
  }



  function sum_valores() {











  }






  $(document).ready(function T3() {
    $('input[id="total_puntaje1"]').val(calcSuma3());

    $('select[name="coda3"]').change(function T3() {
      $('input[id="total_puntaje1"]').val(calcSuma3());

    });
  });

  function calcSuma3() {
    var tamount = 0;
    $('select[name="coda3"]').each(function T3() {


      tamount += parseInt(($(this).val() ? $(this).val() : 0));

    });


    return tamount;
  }






  $(document).ready(function T4() {

    $('input[id="total_puntaje2"]').val(calcSuma4());

    $('select[name="coda4"]').change(function T4() {
      $('input[id="total_puntaje2"]').val(calcSuma4());

    });
  });

  function calcSuma4() {
    var tamount = 0;
    $('select[name="coda4"]').each(function T4() {


      tamount += parseInt(($(this).val() ? $(this).val() : 0));

    });
    return tamount;
  }




  $(document).ready(function T5() {



    $('input[id="total_puntaje3"]').val(calcSuma5());

    $('select[name="coda5"]').change(function T5() {
      $('input[id="total_puntaje3"]').val(calcSuma5());

    });
  });

  function calcSuma5() {
    var tamount = 0;
    $('select[name="coda5"]').each(function T5() {


      tamount += parseInt(($(this).val() ? $(this).val() : 0));

    });

    return tamount;
  }





  $(document).ready(function T6() {
    $('input[id="total_puntaje4"]').val(calcSuma6());

    $('select[name="coda6"]').change(function T6() {
      $('input[id="total_puntaje4"]').val(calcSuma6());



    });
  });

  function calcSuma6() {
    var tamount = 0;
    $('select[name="coda6"]').each(function T6() {


      tamount += parseInt(($(this).val() ? $(this).val() : 0));

    });


    return tamount;


  }





  $(document).ready(function T8() {
    $('input[id="total_puntaje5"]').val(calcSuma8());

    $('select[class="form-control text-right"]').change(function T8() {
      $('input[id="total_puntaje5"]').val(calcSuma8());



    });
  });

  function calcSuma8() {
    var tamount = 0;
    $('select[class="form-control text-right"]').each(function T8() {


      tamount += parseInt(($(this).val() ? $(this).val() : 0));

    });

    if (tamount > 0 && tamount < 42) {

      document.getElementById("total_puntaje6").value = "NO ACEPTABLE";

      document.getElementById("total_puntaje6").className = "btn btn-danger";


    } if (tamount > 41 && tamount < 63) {

      document.getElementById("total_puntaje6").value = "REGULAR ";

      document.getElementById("total_puntaje6").className = "btn btn-primary";

    } if (tamount > 62) {

      document.getElementById("total_puntaje6").value = " ACEPTABLE  ";
      document.getElementById("total_puntaje6").className = "btn btn-success";
    }



    return tamount;


  }













</script>
<script id="tpl_sector" type="text/template"><option value='' selected>--Seleccione Sector--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_tipo_doc" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_especies" type="text/template">
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<?php
ob_end_flush();
?>