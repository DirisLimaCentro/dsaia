<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 require 'header.php';
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
                <h2>Empresas <small></small></h2>


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
                <div class="clearfix">

                </div>


              </div>

              <!-- /.box-header -->
              <!-- centro -->


              <div class="x_content" id="listadoregistros">
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>
                    
                    <tr class="headings">
                    <th></th>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>RUC</th>
                    <th>Estado</th>
                    </tr>  
                  </thead>
                  <tbody>                            
                  </tbody>
                  <tfoot>
                    
                    <th></th>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>RUC</th>
                    <th>Estado</th>
                  </tfoot>
                </table>
              </div>

              <div data-backdrop="static" class="modal fade" id="modalNew"
                   role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-lg " role="document">




              <div class="modal-content">

                  <!--<div class="panel panel-primary">-->
                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h4 class="panel-title" id="modalTitle">Nueva Empresa</h4>        
                    </div>      

                    <div class="modal-body style="100%">


                        <form data-toggle="validator" role="form"
                              name="frmestablecimiento" id="frmestablecimiento"
                              method="POST" novalidate>

                        </form>




<!----------------------------INICIO DE  MODAL ---------->

                  <table class="table table-striped" style="width:100%" >

                      <tr >
                          <th colspan="5"> DATOS SOBRE LA ACTIVIDAD</th>


                      </tr>


                      <tr>

                          <td><BR>INSPECTOR
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>


                          <td><BR>ENTIDAD ADMINISTRADORA
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                          <td> REP. DE LA ENTIDAD ADMINISTRADORA
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>


                          <td><BR>ATENDIDO POR
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                          <td><BR>FECHA / HORA
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                      </tr>


                      <tr>

                          <td><BR>DNI DEL PERSONAL
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>


                          <td>CARACTERISTICAS GENERALES DE LA PISCINA
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                          <td> <BR>DIRECCION DE LA PISCINA
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>


                          <td><BR>R.A N°
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                          <td><BR>RAZON SOCIAL
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                      </tr>
                      <!--------------VALIDACION DE DATOS ----->
                      <tr>

                          <td><BR>TELEFONO
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>


                          <td><br>EXPEDIDA
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                          <td> <BR>FECHA DE VENCIMIENTO
                              <input  class="form-control"
                                      aria-label="Default"
                                      aria-describedby="inputGroup-sizing-default"
                                      type="DATE" name="flexRadioDefault1" id="f1">

                          </td>


                          <td><BR>R.U.C
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                          <td><BR>OBSERVACIONES
                              <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                          </td>

                      </tr>






































                  </table>



                            <table class="table table-striped"  style="width:100%" >



                                <tr>
                                    <tH> 1 - ASPECTOS GENERALES</tH>
                                    <tH> MARCAR</tH>


                                </tr>




                                <tr>
                                    <td>

                                        1.1 La piscina tiene autorizacion sanitaria de funcionamiento ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        1.2 Cuenta con personal operativo tecnicamente capacitado  ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td>

                                        1.3 Cuenta con libro de registro con anotaciones de : Fecha / Hora /T°agua /T°ambiente / CI residual<BR> libre de pH / grado de transparencia / observaciones ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>



                                <tr>
                                    <td>

                                        1.4 Cuenta con botiquin de primeros auxilios  ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>



                                <tr>
                                    <td>

                                        1.5 Cuenta con enfermeria ( para > 450 Usuaruios ) ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>



                                <tr>
                                    <td>



                                        1.6 Cuenta con libro de registros de accidentes ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>



                                <tr>
                                    <td>

                                        1.7 Cuenta con personal salvavidas ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        1.8 Cuenta con torres de salvataje ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        1.9 Cuenta con salvavidas , boyas enn lugar visible y facil acceso ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>







                                <tr>
                                    <td>

                                        1.10 Cuenta con normas para el usuario sobre el uso de la piscina ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>






                                <tr>
                                    <td>

                                        1.11 Cuenta con programa de desinsectacion y desratizacion ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td>

                                        1.12  La patera tiene acceso directo a otros estanques ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        1.13 Piscina con zona de descanso y sombreado (1/4 parte)
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        1.14 Elementos estructurales que establezcan condiciones inseguras ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        1.15 Se encontro criaderos de Aedes aegypti en las piscinas  ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>



                                <tr>
                                    <td>

                                        1.16 Se encontro cuerpos de agua que potencialmente puede albergar al vector Aedes aegypti
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>

                                <TR>

                                </TR>

                                <tr>
                                    <th>

                                        2- FACILIDADES SANITARIAS Y VESTUARIO
                                    </th>


                                    <TH>.</TH>
                                </tr>




                                <tr>
                                    <td>

                                        2.1 N° de duchas suficientes ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        2.2 SSHH con acceso independiente y N° suficiente ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>

                                <tr>
                                    <td>

                                        2.3 SSHH varones con urinarios ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>

                                <tr>
                                    <td>

                                        2.4 SSHH con lavatorios ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td>

                                        2.5 SSHH con papel higienico , toallas / secador y jabon liquido ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        2.6 Vestuario de mujeres cabinas individuales y N° suficiente ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>



                                <tr>
                                    <td>

                                        2.7 Vestuario anexo a SSHH ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>





                                <tr>
                                    <td>

                                        2.8 Cabinas  A>1m2 , piso no resbaladizo y ventilado
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>





                                <tr>
                                    <td>

                                        2.9 Vestuario con ventilacion adecuada ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td>

                                        2.10 Vestuario con fuente de agua tipo bebedero / limitadores de flujo
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>


                                <tr>
                                    <td>

                                        2.11 Los materiales aseguran una correcta limpieza y desinfe. Periodica
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td>

                                        2.12 Piso antideslizantes con sistema eficaz y adecuado drenaje de agua  ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td>

                                        2.13 Armarios con material de acero inoxidable / guardarropa comun ?
                                    </td>

                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                            </table>





                            <table class="table table-striped"  style="width:100%" >


                                <TR>

                                    <TH> 3- AGUA POTABLE , ALCANTARILLADO Y ZONA  DE  SEGURIDAD
                                    </TH>
<TH></TH>
                                    <Th>


                                        ESTANQUE 1

                                    </TH>



                                    <TH> ESTANQUE 2
                                    </TH>

                                    <TH>

                                        PATERA
                                    </TH>


                                </TR>

                                <TR>

                                    <TD>
                                        3.1 Abastecimiento de agua en la red publica ?

                                    </TD>
<TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.2 Tiene tanque de compensacion ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.2 Tiene canaleta exterior ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.4 Las rejillas son de material anticorrosivo y <BR>antideslizante ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.5 Paseo Perimental con piso antidezlizante y libre de<BR> obstaculos ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>  <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                 data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.6 Paseo perimental con pendiente hacia la<BR> canaleta exterior ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.7 Conexion de desague directa con<BR> la red publica ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.8 Piscina de uso publico de lavapies (L>3m)?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        3.9 Sistema de lavapies con desinfectante <BR>(C=0.01%)?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>







                      <TR>

                          <TH> 4 - DEL ESTANQUE
                          </TH>
<TH></TH>
                          <Th>


                              ESTANQUE 1

                          </tH>



                          <TH> ESTANQUE 2
                          </TH>

                          <TH>

                              PATERA
                          </TH>











                      </TR>
                                <TR>

                                    <TD>
                                        4.1 Cuenta con canales de Limpieza ( si A>200m2) ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                        4.2 Cuenta con desnatadores (si A< 200 m2) ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                     4.3 Cuenta con boquillas de retorno con d < 5m/h = 0.30 ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                      4.4 Cuenta con boquillas de aspiracion

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                      4.5 Cuenta con escaleras casa 37.5m ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>


                                <TR>

                                    <TD>
                                     4.6 Escaleras de Mat.Antideslizante , anticorrosivo y <BR>barandales ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                   4.7 Pasos de escalera amplio y L > 0.6 m ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                       4.8 Existe material o recubrimiento susceptible a
                                        <br>crecimiento bacteriano ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>

                                <TR>

                                    <TD>
                                     4.9 Cuenta con boquilla aspiracion ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>




                                <TR>

                                    <TH> 5 - ILUMINACION Y VENTILACION
                                    </TH>
<TH></TH>
                                    <Th>


                                        ESTANQUE 1

                                    </tH>



                                    <TH> ESTANQUE 2
                                    </TH>

                                    <TH>

                                        PATERA
                                    </TH>











                                </TR>





                                <TR>

                                    <TD>
                                 5.1 Piscina iluminada con luz natural/ artificial adecuada ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>








                                <TR>

                                    <TD>
                                     5.2 Espejo de agua iluminado adecuadamente ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>



                                <TR>

                                    <TD>
                                        5.3 Piscina cerrada con ventilacion natural adecuada ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>









                                <TR>

                                    <TH> 6 - RESIDUOS SOLIDOS
                                    </TH>
<TH></TH>
                                    <Th>


                                        ESTANQUE 1

                                    </tH>



                                    <TH> ESTANQUE 2
                                    </TH>

                                    <TH>

                                        PATERA
                                    </TH>











                                </TR>





     <TR>

         <TD>
             6.1 Presencia visible de insectos y / o roedores ?

         </TD>
         <TD></TD>
         <TD>
             <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

         </td>

         <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                        data-onstyle="warning" data-offstyle="danger">
         </TD>

         <TD>

             <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

         </TD>

     </TR>








     <TR>

         <TD>
             6.2 Cuenta con certificado de fumigacion (C /6 meses ) ?

         </TD>
         <TD></TD>
         <TD>
             <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

         </td>

         <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                        data-onstyle="warning" data-offstyle="danger">
         </TD>

         <TD>

             <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

         </TD>

     </TR>



     <TR>

         <TD>
         6.3 Lugar de almacenamiento central de RRSS adecuado

         </TD>
         <TD></TD>
         <TD>
             <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

         </td>

         <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                        data-onstyle="warning" data-offstyle="danger">
         </TD>

         <TD>

             <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

         </TD>

     </TR>









                                <TR>

                                    <TH> 7- CASA DE MAQUINAS
                                    </TH>
<TH></TH>
                                    <Th>


                                        ESTANQUE 1

                                    </tH>



                                    <TH> ESTANQUE 2
                                    </TH>

                                    <TH>

                                        PATERA
                                    </TH>











                                </TR>





                                <TR>

                                    <TD>
                                        7.1- Cuenta con sistema de recirculacion de agua ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>








                                <TR>

                                    <TD>
                                        7.2- Cuenta con equipo automatico de desinfeccion ?
                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>



                                <TR>

                                    <TD>
                                       7.3 Cuenta con pozo de drenaje y valvula de purga ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>




                                <TR>

                                    <TD>
                                        7.4 Cuenta con manometros ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>


                                <TR>

                                    <TD>
                                        7.5 Cuenta con medidor de caudal a la salida de los filtros ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>






                                <TR>

                                    <TD>
                                        7.6 Cuenta con grifo para el muestreo de agua ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>



                                <TR>

                                    <TD>
                                        7.7 Cuenta con manometro a la  entrada y salida del filtro ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>




                                <TR>

                                    <TD>
                                        7.8 Cuenta con visor de vidrio para el seguimiento de lavado de filtros ?

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>








                                <TR>

                                    <TD>
                                        7.9 Verifica los siguientes parametros de calidad

                                    </TD>
                                    <TD></TD>
                                    <TD   colspan="3" >
                                        <select
                                                class="selectpicker" multiple

                                                data-live-search="true"
                                                data-style="btn-success"
                                                data-actions-box="true"
                                                data-width="500"
                                                id="db_parametros_calidad" name="db_parametros_calidad" >

                                        </select>
                                    </td>







                                </TR>



                                <TR>

                                    <TD>


                                        7.10 Verifica los siguientes parametros de calidad fisico

                                    </TD>
                                    <TD></TD>
                                    <TD   colspan="3" >
                                        <select
                                      class="selectpicker" data-style="btn-success"
   data-live-search="true"
                                      multiple data-actions-box="true"
                                                data-width="500"
                                                id="db_parametros_fisicos" name="db_parametros_fisicos" >

                                        </select>
                                    </td>







                                </TR>





                                <TR>

                                    <TD>


                                        7.11 Verifica los siguientes para metros de calidad bacteriologica

                                    </TD>
                                    <TD></TD>
                                    <TD   colspan="3" >
                                        <select


                                                class="selectpicker" multiple
                                                multiple data-actions-box="true"
                                                data-live-search="true"
                                                data-style="btn-success"
                                                data-width="500"
                                                id="db_calidad_bacte" name="db_calidad_bacte" >

                                        </select>
                                    </td>







                                </TR>

                                <TR>

                                    <TH> 9- PISCINAS CLIMATIZADAS
                                    </TH>
                                    <TH></TH>
                                    <Th>


                                        ESTANQUE 1

                                    </tH>



                                    <TH> ESTANQUE 2
                                    </TH>

                                    <TH>

                                        PATERA
                                    </TH>











                                </TR>





                                <TR>

                                    <TD>
                                        9.1 - Temperatura de estanque entre 24 y 28° C

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>








                                <TR>

                                    <TD>
                                        9.2 Temperatura del ambiente entre 26 y 32° C
                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>



                                <TR>

                                    <TD>
                                        9.3 Cuenta con sistema climatizacion

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>




                                <TR>

                                    <TD>
                                        9.4 Cuenta con termometro  e hidrometro a la vista de los usuarios

                                    </TD>
                                    <TD></TD>
                                    <TD>
                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                    <TD>    <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO"
                                                   data-onstyle="warning" data-offstyle="danger">
                                    </TD>

                                    <TD>

                                        <input type="checkbox" checked data-toggle="toggle" data-width="50" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">

                                    </TD>

                                </TR>






                                <tr>
                                    <tH COLSPAN="3"> 8 - ALMACEN DE PRODUCTOS QUIMICOS </tH>
                                    <tH COLSPAN="3"> MARCAR</tH>


                                </tr>




                                <tr>
                                    <td COLSPAN="3">

                                        8.1 Cuenta con ambiente exclusivo como almacen de productos
                                    </td>
                                    <TD></TD>
                                    <td COLSPAN="3">
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>





                                </tr>


                                <tr>
                                    <td COLSPAN="3">

                                        8.2 Almacen con ventilacion adecuada
                                    </td>
                                    <TD></TD>
                                    <td COLSPAN="3">
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>




                                <tr>
                                    <td COLSPAN="3">

8.3 Cuenta con un cartel con las medidas de seguridad

                                    </td>
                                    <TD></TD>
                                    <td COLSPAN="3">
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" data-on="SI" data-off="NO" data-onstyle="success" data-offstyle="danger">

                                    </td>

                                </tr>





                                <tr>






                                    <td>

                                       CLORO RESIDUAL
                                        <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="TEXT" name="flexRadioDefault1" id="h2">

                                    </td>



                                    <td>TURBIDEZ
                                        <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">
                                    </td>




                                    <TD>
                                   PH                                        <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f1">

                                    </td>


                                    <td> T°
                                        <input  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  type="text" name="flexRadioDefault1" id="f2">
                                    </td>




<TD></TD>









                                </tr>















                            </table>






                            <!--------FIN DEL MODAL ---------------------------------------------->
                            <!--------FIN DEL MODAL --------------------------------------------------------------------------------------------------------->

                            <!-------FIN DEL MODAL ---------------------------------------------->

    <div class="modal-footer">
        <button type="button" onclick="save();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

    </div>






                </div>











              <!-- Form Local-->
              <div class="modal fade" id="modalLocal"  role="dialog"  aria-hidden="true" data-backdrop="static" tabindex="-1">
                <div class="modal-dialog " role="document">

                  <div class="modal-content">
                  <!--<div class="panel panel-success">-->
                       <div class="modal-header modal-header-success" >
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




                  <!--</div>-->
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


            <!-- Latest compiled and minified CSS -->

  <script
          type="text/javascript" src="scripts/empresa.js?rnd=
          <?php echo rand(); ?>">



  </script>

  <script>

      function ver(){
          limpiar();

          $('#modalNew').modal('show')
          //$("#nombre").focus();
      }



      $(function () {

          $.getJSON('../ajax/tabla.php?op=list&id_tabla=55', function(data) {
              var template = $('#tpl_forma_pago2x').html();
              var html = Mustache.to_html(template, data);
              $('#db_parametros_calidad ').html(html);
          });

          $(".select2").select2();


          $('#id_ubigeo_local').select2({
              dropdownParent: $("#modalLocal"),
              placeholder: "Seleccione",
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
                  results: function (data, page) { // parse the results into the format expected by
                      return { results: data };
                  },
                  processResults: function (data, params) {

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

          });



          $('#ubigeo').select2({
              dropdownParent: $("#modalNew"),
              placeholder: "Seleccione",
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




      $(function () {

          $.getJSON('../ajax/tabla.php?op=list&id_tabla=56', function(data) {
              var template = $('#tpl_forma_pago2x').html();
              var html = Mustache.to_html(template, data);
              $('#db_parametros_fisicos ').html(html);
          });

          $(".select2").select2();


          $('#id_ubigeo_local').select2({
              dropdownParent: $("#modalLocal"),
              placeholder: "Seleccione",
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
                  results: function (data, page) { // parse the results into the format expected by
                      return { results: data };
                  },
                  processResults: function (data, params) {

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

          });



          $('#ubigeo').select2({
              dropdownParent: $("#modalNew"),
              placeholder: "Seleccione",
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


      $(function () {

          $.getJSON('../ajax/tabla.php?op=list&id_tabla=57', function(data) {
              var template = $('#tpl_forma_pago2x').html();
              var html = Mustache.to_html(template, data);
              $('#db_calidad_bacte ').html(html);
          });

          $(".select2").select2();


          $('#id_ubigeo_local').select2({
              dropdownParent: $("#modalLocal"),
              placeholder: "Seleccione",
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
                  results: function (data, page) { // parse the results into the format expected by
                      return { results: data };
                  },
                  processResults: function (data, params) {

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

          });



          $('#ubigeo').select2({
              dropdownParent: $("#modalNew"),
              placeholder: "Seleccione",
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







            <script id="tpl_forma_pago2x" type="text/template">
                {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
            </script>

  <?php
ob_end_flush();
?>
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
