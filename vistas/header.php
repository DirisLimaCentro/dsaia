<?php
//session_start();
if (!isset($_SESSION["s_id_usuario"])){
	header("Location: login.php");
}	
require_once "../modelos/Tabla.php";

$acceso=new Tabla();
$rs=$acceso->listAccesos($_SESSION["s_id_usuario"],'');
$menu=array();
$mnu='';$i=0;
while ($reg=pg_fetch_object($rs)){
    if ($mnu!=$reg->id_menu){
        $menu[$i]['menu']=$reg->menu;
        $menu[$i]['id_menu']=$reg->id_menu;
        $menu[$i]['icono']=$reg->icono;
        $mnu=$reg->id_menu;
        $i++;
    }    
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>DLC</title>

    <!-- Bootstrap -->
    <link href="../public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../public/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../public/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="../public/switchery/dist/switchery.min.css" rel="stylesheet">

    <link href="../public/bootstrap-toggle/css/bootstrap-toggle.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../public/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../public/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../public/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="../public/boostrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    
    <link href="../public/select2/dist/css/select2.css" rel="stylesheet">

    <link rel="stylesheet" href="../public/boostrap-select-1.13.9/css/bootstrap-select.css"> 

    <!-- Datatables -->
    <link href="../public/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="../public/datatables.net-bs/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="../public/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../public/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <!--<link href="../public/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">-->
    <link href="../public/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">  

    <!-- toastr -->
    <link rel="stylesheet" href="../public/toastr/toastr.min.css">

    <!-- Custom Theme Style -->
    <link href="../public/build/css/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="../public/bootstrap-dialog/css/bootstrap-dialog.min.css">

    <link rel="stylesheet" href="../public/app/css/app.css">

    <link rel="stylesheet" href="../public/spinkit/spinkit.css">

    <link href="../public/sweetalert2/dist/sweetalert2.css" rel="stylesheet">

    <!--<link href="../public/bootstrap-multiselect/bootstrap-multiselect.css" rel="stylesheet">-->


  </head>

  <body class="nav-sm">

    <div class="loader_modal" id="loaderModal" tabindex="-1" >
    <div class="loader_modal_content">
     
      <div class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>
     
    </div>
  </div>


  <div class="modal fade" data-backdrop="static"  id="modalPwd"  role="dialog" aria-labelledby="modalPwd" aria-hidden="true" tabindex="-1" >
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
       <div class="modal-header modal-header-success" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalTitle">Actualizar clave</h4>
      </div>

      <div class="modal-body">

          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="g_clave" class="col-form-label">Nueva Clave:</label>
                  <input type="password" class="form-control" id="g_clave" autocomplete="off" placeholder="" required>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="g_clave_repetida" class="col-form-label">Repita Clave:</label>
                  <input type="password" class="form-control" id="g_clave_repetida" autocomplete="off" placeholder="" required>
                </div>
              </div>

          </div>

      </div>

      <div class="modal-footer">
        <button type="button" onclick="gf_updatepwd();" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

      </div>
    </div>    
  </div>
</div>

    
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="welcome.php" class="site_title">
                <i class="fa fa-list-alt"></i> 
                <!--<img src="images/warehouse.png">-->
                <span>DLC</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              
              <!--
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
            -->

              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?=$_SESSION['s_login'];?></h2>
                <input type="hidden" id="s_id_local" value="<?=$_SESSION['s_id_local'];?>">
                <input type="hidden" id="s_local" value="<?=$_SESSION['s_local'];?>">
                <input type="hidden" id="s_id_usuario" value="<?=$_SESSION['s_id_usuario'];?>">

                <input type="hidden" id="s_login" value="<?=$_SESSION['s_login'];?>">




                <input type="hidden" id="s_id_nivel" value="<?=$_SESSION['s_id_nivel'];?>">
                <input type="hidden" id="s_provincia" value="<?=$_SESSION['s_provincia'];?>">
                <input type="hidden" id="s_distrito" value="<?=$_SESSION['s_distrito'];?>">


                <input type="hidden" id="s_ubigeo_establecimiento" value="<?=$_SESSION['s_ubigeo_establecimiento'];?>">

                
                <input type="hidden" id="s_empresa" value="<?=$_SESSION['s_empresa'];?>">
                <input type="hidden" id="s_ruc_empresa" value="<?=$_SESSION['s_ruc_empresa'];?>">
                <input type="hidden" id="s_telefono_empresa" value="<?=$_SESSION['s_telefono_empresa'];?>">
                <input type="hidden" id="s_nombre_comercial" value="<?=$_SESSION['s_nombre_comercial'];?>">
                <input type="hidden" id="s_direccion_empresa" value="<?=$_SESSION['s_direccion_empresa'];?>">
                <input type="hidden" id="s_correo_empresa" value="<?=$_SESSION['s_correo_empresa'];?>">
                <input type="hidden" id="s_distrito_empresa" value="<?=$_SESSION['s_distrito_empresa'];?>">


                <input type="hidden" id="s_ris" value="<?=$_SESSION['s_ris'];?>">

                <input type="hidden" id="s_anio" value="<?=date('Y');?>">
                <input type="hidden" id="s_mes" value="<?=date('n');?>">

                <input type="hidden" id="s_hoy" value="<?=date('d/m/Y');?>" >


              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  
                  <?
                  $cntmnu=count($menu);
                  for ($i=0;$i<$cntmnu;$i++){
                  ?>

                  <li><a><i class="fa <?=$menu[$i]['icono'];?>"></i> <?=$menu[$i]['menu'];?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <?
                      $rs=$acceso->listAccesos($_SESSION["s_id_usuario"],$menu[$i]['id_menu']);
                      while ($reg=pg_fetch_object($rs)){                 
                      ?>

                      <li><a href="<?=$reg->link_menu;?>"><?=$reg->menu_detalle;?></a></li>
                      
                      <? } ?>
                    </ul>
                  </li>
                  
                 <? } ?>

                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"><?=$_SESSION['s_login'];?></a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <!--<li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuracion</span>
                      </a>
                    </li>

                    <li><a href="javascript:;">Ayuda</a></li>-->
                    <li><a href="#" onclick="gf_open_pwd();"><i class="fa fa-key"></i> Cambiar clave</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out "></i> Cerrar Sesion</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">



                  <a href="javascript:;" class="dropdown-toggle info-number" title="Ordenes de Compra por autorizar" data-toggle="dropdown" aria-expanded="false">                    
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-red" id="spn_oc_x_autorizar">0</span>
                  </a>

                 
                  <!--
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>               
                    
                    
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                  -->


                </li>

                <li role="presentation" class="dropdown">
                       <a href="javascript:;" class="dropdown-toggle info-number" title="Requerimientos por autorizar" data-toggle="dropdown" aria-expanded="false">                    
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green" id="spn_req_x_autorizar">0</span>
                  </a>

                </li>  

              </ul>
            </nav>
          </div>
        </div>
