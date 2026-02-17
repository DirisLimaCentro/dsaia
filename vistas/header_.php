<?php
if (strlen(session_id()) < 1)
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGA | BiosoftEngine</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/plugins/bootstrap-dialog/css/bootstrap-dialog.min.css">
  
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
  <link rel="shortcut icon" href="../public/img/favicon.ico">

  <!-- DATATABLES -->
  <!--<link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">-->
  <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>

  <link href="../public/datatables/dataTables.bootstrap.css" rel="stylesheet"/>

  <!--  <link href="../public/datatables/dataTables.bootstrap.css" rel="stylesheet"/>-->

  <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  <link rel="stylesheet" type="text/css" href="../public/select2/select2.css">

  <link rel="stylesheet" href="../public/plugins/iCheck/all.css">
  <link rel="stylesheet" href="../public/plugins/datepicker/css/bootstrap-datepicker.min.css">
  <!-- toastr -->
  <link rel="stylesheet" href="../public/toastr/toastr.min.css">

  
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="escritorio.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>AD</b>Almacen</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ALMACEN</b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Navegación</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                  <p>
                    www.biosoftengine.com - Desarrollando Software
                    <small>www.youtube.com/biosoftengine</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header"></li>
          <?php
          if ($_SESSION['escritorio']==0)
          {
            echo '<li id="mEscritorio">
            <a href="escritorio.php">
            <i class="fa fa-tasks"></i> <span>Escritorio</span>
            </a>
            </li>';

          }
          ?>
          <?php
          if ($_SESSION['almacen']==0)
          {
            echo '<li id="mTablas" class="treeview">
            <a href="#">
            <i class="fa fa-table"></i>
            <span>Tablas</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li id="lEmpresas"><a href="empresa.php"><i class="fa fa-circle-o"></i> Empresas</a></li>
            <li id="lProveedores"><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
            <li id="lItems"><a href="items.php"><i class="fa fa-circle-o"></i> Items</a></li>
            <li id="lPersonal"><a href="personal.php"><i class="fa fa-circle-o"></i> Personal</a></li>
            <li id="lusuario"><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            </ul>
            </li>';
          }
          ?>
          <?php
          if ($_SESSION['compras']==1)
          {
            echo '<li id="mCompras" class="treeview">
            <a href="#">
            <i class="fa fa-th"></i>
            <span>Compras</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li id="lIngresos"><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
            <li id="lProveedores"><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
            </ul>';

            }
            ?>

            <?php
            if ($_SESSION['almacen']==0)
            {
              echo '<li id="mCompras" class="treeview">
              <a href="#">
                <i class="fa fa-sign-in"></i>
                <span>Ingresos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lCompras"><a href="compra.php"><i class="fa fa-circle-o"></i> Compras</a></li>

              </ul>
            </li>';
            }
            //<li id="lProveedores"><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
            ?>

            <?php
            /*if ($_SESSION['ventas']==0)
            {
              echo '<li id="mVentas" class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lVentas"><a href="venta.php"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li id="lClientes"><a href="cliente.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>';
          }*/
          ?>
          <?php
          if ($_SESSION['ventas']==0)
          {
            echo '<li id="mSalidas" class="treeview">
            <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Salidas</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li id="lVentas"><a href="salidas.php"><i class="fa fa-circle-o"></i> Salidas</a></li>
            <li id="lClientes"><a href="cliente.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
            </ul>
            </li>';
          }
          ?>
          <?php
          if ($_SESSION['acceso']==1)
          {
            echo '<li id="mAcceso" class="treeview">
            <a href="#">
            <i class="fa fa-folder"></i> <span>Acceso</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li id="lUsuarios"><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            <li id="lPermisos"><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
            </ul>
            </li>';
          }
          ?>
          <?php
          if ($_SESSION['consultac']==1)
          {
            echo '<li id="mConsultaC" class="treeview">
            <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Consulta Compras</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li id="lConsulasC"><a href="comprasfecha.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>
            </ul>
            </li>';
          }
          ?>

          <?php
          if ($_SESSION['consultav']==1)
          {
            echo '<li id="mConsultaV" class="treeview">
            <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li id="lConsulasV"><a href="ventasfechacliente.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>
            </ul>
            </li>';
          }
          ?>
          <li>
            <a href="ayuda.php">
              <i class="fa fa-plus-square"></i> <span>Ayuda</span>
              <small class="label pull-right bg-red">PDF</small>
            </a>
          </li>
          <li>
            <a href="acerca.php">
              <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
              <small class="label pull-right bg-yellow">IT</small>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
