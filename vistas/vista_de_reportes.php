<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 require 'header.php';
 
?>
<style type="text/css" xmlns="http://www.w3.org/1999/html">
  button, .buttons, .btn, .modal-footer .btn + .btn {
    margin-bottom: 0px;
    margin-right: 0px;

  }
  .btn-success {
  background: #26B99A;
  border: 1px solid #169F85;
}
  .hovertext {
      position: relative;
      border-bottom: 1px dotted black;
  }

  .hovertext:before {
      content: attr(data-hover);
      visibility: hidden;
      opacity: 0;
      width: 800px;
      background-color: #ea3535;
      color: #fff;
      text-align: center;
      border-radius: 5px;
      padding: 5px 0;
      transition: opacity 1s ease-in-out;

      position: absolute;
      z-index: 1;
      left: 0;
      top: 110%;
  }

  .hovertext:hover:before {
      opacity: 1;
      visibility: visible;
      width: 800px;
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


                  <br>  <h2> - CONSOLIDADO  REPORTES  </h2>
                <ul class="nav navbar-right panel_toolbox">





                    <!--
                    <form action="PRUEBAD2.PHP" method="post">
                        Mes: <input type="number" name="mesreporte" ><br>

                        <input type="button"   >
                    </form>


-->




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







                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                      +  Descargar
                  </button>



                  <form action="../ajax/prueba_consolidado_alimentos.PHP" method="post">



                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                      <div class="modal-dialog modal-md" role="document">


                          <div class="modal-content">

                              <div class="modal-header modal-header-success">


                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title" id="exampleModalLabel">Descarga de Reportes </h4>
                              </div>


                              <div class="modal-body">

                                     <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Mes</label>
                                          <select class="form-control" name="mesreporte">
                                              <option value="1">Enero</option>
                                              <option value="2">Febrero</option>
                                              <option value="3">Marzo</option>
                                              <option value="4">Abril</option>
                                              <option value="5">Mayo</option>
                                              <option value="6">Junio</option>
                                              <option value="7">Julio</option>
                                              <option value="8">Agosto</option>
                                              <option value="9">Setiembre</option>
                                              <option value="10">Octubre</option>
                                              <option value="11">Noviembre</option>
                                              <option value="12">Diciembre</option>
                                          </select>
                                      </div>
                                  </div>


                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Año</label>

                                          <input type="number" value="2022" class="form-control pull-right" name="anioreporte">


                                      </div>
                                  </div>


                              </div>

                              </div>

                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Descargar</button>

                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>
                              </div>


                          </div>
                      </div>
                  </div>



</form>




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



  <script type="text/javascript" src="scripts/ficha2_manejo_residuos_solidos.js?rnd=<?php echo rand(); ?>"></script>



<!--
<script id="tpl_tipo_ipress" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_categoria_ipress" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
-->


  <?php 
ob_end_flush();
?>


