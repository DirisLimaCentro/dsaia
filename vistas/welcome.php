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
                <h2>Bienvenido <small></small></h2>
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