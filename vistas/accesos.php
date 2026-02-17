<?php
ob_start();
session_start();
require 'header.php';
?>
<style type="text/css">

</style>
<div class="right_col" role="main">
    <!-- Main content -->
    <section class="row">

      <div class="row">
      	<div class="col-md-2 col-sm-2 col-xs-2">
      	</div>

        <div class="col-md-8 col-sm-8 col-xs-8">

          <div class="x_panel ">

            <div class="x_title">
                <h2>Otorgar Accesos <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a><small></small></h2>
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
            	
              <?php  require 'partials/content_accesos.php'; ?>
                      
            </div>

            <!--Fin centro -->
          </div><!-- /.box -->

          <div class="col-md-3 col-sm-3 col-xs-3">
      	  </div>


        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->

  </div><!-- /.content-wrapper -->

  <!--Fin-Contenido-->
  <?php

require 'footer.php';
?>
<script type="text/javascript" src="scripts/accesos.js?rnd=<? echo rand(); ?>"></script>
<script type="text/javascript">



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