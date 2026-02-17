<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

//if (!isset($_SESSION["nombre"]))
//{
 // header("Location: login.html");
//}
//else
//{
require 'header.php';
require_once '../modelos/Local.php';
require_once '../modelos/Tabla.php';
$tabla = new Tabla();

  //if ($_SESSION['almacen']==0)
  //{
    ?>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">
      .pac-container {z-index: 99999999999 !important;}


      .verticalText {
        writing-mode: vertical-lr;
        transform: rotate(180deg);
        text-align: center;     
        
      }
      .dataTables_filter {
      text-align: left !important;
      }

      .dt-buttons {
      text-align: left !important;
      }

    .dt-buttons btn-group {
    white-space: normal;
    }
    </style>
    <div class="right_col" role="main">
      <!-- Main content -->
      <!--<section class="content">-->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

              <div class="x_title">
                <h2>Ficha Programacion de Fumigacion <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                        <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a>
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

                


                <table id="tbllistado" class="table table-striped table-bordered  table-hover " cellspacing="0" style="width: 100%">
                  <thead>
                    <tr class="v-grid-header">
                      <th></th>
                      <th>Acciones</th>

                      <th>Fecha Salida</th>
                      <th>Hora Salida</th>
                      <th>Lugar Destino</th>
                      <th>Hora Llegada</th>
                      <th>Area</th>
                      <th>Participan</th>
                      <th>Organizan</th>
                      <th>Resumen de Actividad</th>
                      <th>Fecha Crea</th>
                      <th>Creado por</th>

                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Acciones</th>

                      <th>Fecha Salida</th>
                      <th>Hora Salida</th>
                      <th>Lugar Destino</th>
                      <th>Hora Llegada</th>
                      <th>Area</th>
                      <th>Participan</th>
                      <th>Organizan</th>
                      <th>Resumen de Actividad</th>
                      <th>Fecha Crea</th>
                      <th>Creado por</th>
                    </tr>
                  </tfoot>
                </table>



              </div>



              <div data-toggle="modal" data-backdrop="static" class="modal fade "  style="overflow-y: scroll; " id="modalFichaF"  role="dialog" aria-labelledby="modalFichaF" aria-modal="true" tabindex="-1" >
                <div class="modal-dialog modal-md" style="width: 40%; " role="document">

                  <div class="modal-content">

                   <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" >Ficha Programacion</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                           <label for="exampleInputPassword1">Fecha</label>
                           <div class="input-group date">
                            <input type="text" class="form-control pull-right" value="<?=date('d/m/Y');?>"  id="fecha_programada" placeholder="dd/mm/aaaa" >
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>


                          </div>
                          <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                              <label for="exampleInputPassword1">Hora Salida</label>  
                              <input type="time" id="hora_salida" class="form-control">
                          </div>  

                          <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                            <label for="exampleInputPassword1">Establecimiento Destino</label>
                             <select class="form-control select2 itemNamedist text-uppercase" style="width: 100%;"    id='id_local_destino'    >
                            </select>
                         </div>

                         <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                              <label for="exampleInputPassword1">Hora Llegada</label>  
                              <input type="time" id="hora_llegada" class="form-control">
                          </div>  


                      </div>  

                       <div class="row">
                          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                              <label for="">Area</label>  
                              <input type="text" id="area" class="form-control text-uppercase">                              
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                              <label for="">Participa</label>  
                              <input type="text" id="participa" class="form-control text-uppercase">                              
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                              <label for="">Organiza</label>  
                              <input type="text" id="organiza" class="form-control text-uppercase">                              
                          </div>
                       </div>  
                       <div class="row"> 
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                              <label for="">Resumen de la Actividad</label>  
                              <textarea id="resumen_actividad" class="form-control "></textarea>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                              <label for="">Detalles de la Actividad</label>  
                              <textarea  id="detalles_actividad" class="form-control"></textarea>
                            </div>

                       </div>


                    </div>

                     <div class="modal-footer">
                      <button type="button" onclick="saveFichaF();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

                    </div>

                  </div>

               </div> 
             </div>        




               <div data-toggle="modal" data-backdrop="static" class="modal fade "  style="overflow-y: scroll; " id="modalFicha"  role="dialog" aria-labelledby="modalFicha" aria-modal="true" tabindex="-1" >
                <div class="modal-dialog modal-lg" style="width: 90%; " role="document">



                  <div class="modal-content">


                   <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalTitle">Ficha Inspeccion de Viviendas para vigilancia y control</h4>
                      <input type="hidden" id="id_ficha">
                      <input type="hidden" id="id_ficha_detalle">
                    </div>

                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Establecimiento</label>
                            <input type="hidden" id="hid_local">
                            <input type="text" readonly="" class="form-control" id="establecimiento" placeholder="">
                          </div>
                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Distrito</label>
                             <input type="text" readonly="" class="form-control" id="distrito" placeholder="">
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">

                            <label for="exampleInputPassword1">Fecha Inicio</label>
                            <div class="input-group date">

                              <input type="text" class="form-control pull-right" id="fecha_inicio" placeholder="dd/mm/aaaa" >
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">

                            <label for="exampleInputPassword1">Fecha Termino</label>
                            <div class="input-group date">

                              <input type="text" class="form-control pull-right" id="fecha_termino" placeholder="dd/mm/aaaa" >
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Sector</label>
                            <select class='form-control'  id='sector' onchange="getLocalidades('');"  >
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Localidad</label>
                            <select class='form-control input-sm select2 itemNamedist text-uppercase'  id='id_localidad' style="width: 100%"  >
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Tipo Actividad</label>
                            <select class='form-control'  id='id_tipo_actividad'  >
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="row" id="row_btn_item" style="display: none;">
                        <div class="col-md-12 ">
                          <div class="form-group">
                            <button type="button" class="btn btn-success btn-sm" onclick="open_item();"><i class="fa fa-plus"></i> Agregar</button>
                          </div>
                        </div>
                      </div>

                      <div class="row" id="row_tbl_detail" style="display: none;" >

                        <div class="col-md-12 col-sm-12 col-xs-12" style="overflow: auto">


                          <table  id="tblDetail" class="table table-sm table-striped table-bordered table-hover table-responsive " style="font-size: 11px;">
                            <thead >
                              <tr class="v-grid-header">
                                <th></th>
                                <th>Direccion/Familia</th>
                                <th class="verticalText text-center">N° H</th>
                                <th class="text-center">Condicion</th>

                                <th colspan="4" class=" text-center">T Elev</th>
                                <th colspan="4" class=" text-center">T Baj</th>
                                <th colspan="4" class=" text-center">Bar Cil</th>
                                <th colspan="4" class=" text-center">Bal Batea</th>
                                <th colspan="4" class=" text-center">Llant</th>
                                <th colspan="4" class=" text-center">Flor,Jar</th>
                                <th colspan="4" class=" text-center">Lat,Bot</th>
                                <th colspan="4" class=" text-center">Inserv</th>
                                <th colspan="4" class=" text-center">Otros</th>

                                <th colspan="3">Tot D</th>

                                <th class=" text-center">Tot Lar/P</th>

                                <th class=" text-center">Larv</th>
                                <th class=" text-center">N° Dep</th>
                                <th class=" text-center">N° Feb</th>

                              </tr>

                              <tr class="v-grid-header">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>

                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>
                                <th >I</th>
                                <th >P</th>
                                <th >T</th>
                                <th >L/P</th>

                                <th >I</th>
                                <th >P</th>
                                <th >T</th>

                                <th ></th>


                                <th class=" text-center"></th>
                                <th class=" text-center"></th>
                                <th class=" text-center"></th>

                              </tr>


                            </thead>
                            <tbody id="tbl_items">

                            </tbody>
                            <tfoot>
                              <tr class="v-grid-header">


                              </tr>
                            </tfoot>
                          </table>


                        </div>


                      </div>


                    </div>

                    <div class="modal-footer">
                      <button type="button" onclick="save();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>

                    </div>

                  </div>
                </div>
              </div>




              <div data-toggle="modal" class="modal fade" id="modalItemF" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" >

                <div class="modal-dialog modal-md" role="document">


                  <div class="modal-content">

                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalItemTitle">Ingrese datos </h4>
                    </div>



                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Lugar</label>
                            <input type="text " class="form-control text-uppercase" id="lugar_ruta"  placeholder="">
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Direccion</label>
                            <input type="text " class="form-control text-uppercase" id="direccion_ruta"  placeholder="">
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Latitud</label>
                            <input type="text " class="form-control text-uppercase" id="latitud_ruta"  placeholder="">
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Longitud</label>
                            <input type="text " class="form-control text-uppercase" id="longitud_ruta"  placeholder="">
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Orden</label>
                            <input type="text " class="form-control " id="orden_ruta" value="1"  placeholder="">
                          </div>
                        </div>


                    </div>   


                  </div>
                    <div class="modal-footer">
                      <button type="button" onclick="save_item_f();" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

                    </div>
                 </div>

               </div>  
            </div>   
              




              <!-- Form Item-->
              <div data-toggle="modal" class="modal fade" id="modalItem" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" >

                <div class="modal-dialog modal-md" role="document">


                  <div class="modal-content">

                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalItemTitle">Ingrese datos </h4>
                    </div>



                    <div class="modal-body">
                      
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group">
                          <label for="exampleInputPassword1">Direccion y/o Familia</label>
                          <input type="text " class="form-control text-uppercase" id="direccion_familia"  placeholder="">
                        </div>
                        </div>
                      </div>   

                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label >Latitud  <a href="#" onclick="obtenerUbicacionActual()"><span class="badge bg-red">Obtener ubicación actual</span></a></label>
                            <input type="text " class="form-control text-uppercase" id="latitud"  placeholder="">
                          </div>  
                        </div>                        

                        <div class="col-md-6 col-sm-12 col-xs-12">
                         <div class="form-group">
                          <label for="exampleInputPassword1">Longitud</label>
                          <input type="text " class="form-control text-uppercase" id="longitud"  placeholder="">
                        </div>
                        </div>

                      </div>   



                      <div class="row">
                        

                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">N° Habitantes</label>
                            <input type="number" class="form-control" id="nro_habitantes"  placeholder="">
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Condicion de Viviendas</label>
                            <select class='form-control'  id='id_condicion_vivienda'  >
                            </select>

                          </div>
                        </div>


                      </div>

                      <div class="row">
                          <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Inspeccionado por  <a href="#" onclick="openNuevoPersonal()"><span class="badge bg-green">Nuevo Registro</span></a> </label>
                              <select class='form-control input-sm select2 itemNamedist text-uppercase'  id='id_usuario_registro' style="width: 100%"  >
                              </select>
                            </div>
                          </div>

                           <div class="col-md-6 col-sm-12 col-xs-12" style="display: none;">
                                <br>
                                <div class="checkbox ">
                                  <label>
                                    <input type="checkbox" id="caso_probable_dengue" value=""> <strong>Caso probable de DENGUE</strong>
                                  </label>
                                </div>
                           </div> 

                           <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cantidad Casos Probables DENGUE:</label>
                                <input type="number" class="form-control" value="0" id="cantidad_probable_dengue"  placeholder="">
                            </div>
                          </div>


                      </div>


                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Tipo de Depositos</label>
                          </div>
                        </div>

                      </div>

                      <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                  <table   class="table table-striped table-bordered table-hover table-responsive ">
                                    <thead>
                                      <tr class="v-grid-header">
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Insp</th>
                                        <th class="text-center">Posit</th>
                                        <th class="text-center" >Trat Quim</th>

                                        <th class="text-center">Trat Fis</th>


                                        <th class="text-center" style="display: none;">Larva o Pupa o Adulto</th>    

                                        <th class="text-center">Destru</th>                                    
                                        
                                      </tr>
                                    </thead>
                                     <tbody >
                                        <tr>
                                          
                                          <td>Tanque Elevado</td>
                                          <td class="success"><input type="text" onfocus="this.select();"  id="cnt_tipo_1_i" class="form-control text-right " value="0"   placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_1_p" class="form-control text-right " value="0"   placeholder=""></td>

                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_1_t" class="form-control text-right" value="0"   placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_1_tf" class="form-control text-right" value="0"   placeholder=""></td>


                                          <td style="display: none;"><input  type="text" onfocus="this.select();"  id="cnt_tipo_1_v" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td class="purple"><input style="display: none"  type="text" onfocus="this.select();" id="cnt_tipo_1_d" class="form-control text-right" value="0"   placeholder=""></td>

                                        </tr>

                                        <tr>
                                          
                                          <td>Tanque Bajo</td>
                                          <td class="success"><input  type="text" onfocus="this.select();"  id="cnt_tipo_2_i" class="form-control text-right "  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_2_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_2_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_2_tf" class="form-control text-right" value="0"   placeholder=""></td>


                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_2_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input style="display: none" type="text" onfocus="this.select();" id="cnt_tipo_2_d" class="form-control text-right" value="0"   placeholder=""></td>
                                        </tr>

                                        <tr>
                                          
                                          <td>Barril-Cilindro</td>
                                          <td class="success"><input  type="text" onfocus="this.select();"  id="cnt_tipo_3_i" class="form-control text-right "  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_3_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_3_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_3_tf" class="form-control text-right" value="0"   placeholder=""></td>


                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_3_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input style="display: none" type="text" onfocus="this.select();" id="cnt_tipo_3_d" class="form-control text-right" value="0"   placeholder=""></td>
                                        </tr>

                                        <!---->
                                        <tr>                                          
                                          <td>Sanson-Bidon</td>
                                          <td class="success"><input  type="text" onfocus="this.select();" id="cnt_tipo_10_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_10_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_10_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_10_tf" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_10_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input style="display: none" type="text" onfocus="this.select();" id="cnt_tipo_10_d" class="form-control text-right" value="0"   placeholder=""></td>


                                        </tr>


                                        <!---->


                                        <tr>
                                          
                                          <td>Bald,Batea,Tinajas</td>
                                          <td class="success"><input  type="text" onfocus="this.select();"  id="cnt_tipo_4_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_4_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_4_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_4_tf" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_4_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input style="display: none" type="text" onfocus="this.select();" id="cnt_tipo_4_d" class="form-control text-right" value="0"   placeholder=""></td>


                                        </tr>

                                        <tr>
                                          
                                          <td>Llantas</td>
                                          <td class="success"><input  type="text" onfocus="this.select();" id="cnt_tipo_5_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"> <input  type="text" onfocus="this.select();" id="cnt_tipo_5_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_5_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_5_tf" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_5_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input style="display: none" type="text" onfocus="this.select();" id="cnt_tipo_5_d" class="form-control text-right" value="0"   placeholder=""></td>


                                        </tr>

                                        <tr>
                                          
                                          <td>Florero,Maceteros</td>
                                          <td class="success"><input  type="text" onfocus="this.select();" id="cnt_tipo_6_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_6_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_6_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_6_tf" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_6_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input style="display: none" type="text" onfocus="this.select();" id="cnt_tipo_6_d" class="form-control text-right" value="0"   placeholder=""></td>


                                        </tr>

                                        <tr>
                                          
                                          <td>Latas,Botellas</td>
                                          <td class="success"><input  type="text" onfocus="this.select();" id="cnt_tipo_7_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_7_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_7_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_7_tf" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_7_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input  type="text" onfocus="this.select();" id="cnt_tipo_7_d" class="form-control text-right" value="0"   placeholder=""></td>


                                        </tr>

                                        <tr style="display: none;">
                                          
                                          <td>Inservibles</td>
                                          <td class="success"><input  type="text" onfocus="this.select();" id="cnt_tipo_8_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_8_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_8_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_8_tf" class="form-control text-right" value="0"   placeholder=""></td>

                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_8_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input  type="text" onfocus="this.select();" id="cnt_tipo_8_d" class="form-control text-right" value="0"   placeholder=""></td>


                                        </tr>

                                        <tr>
                                          
                                          <td>Otros</td>
                                          <td class="success"><input  type="text" onfocus="this.select();" id="cnt_tipo_9_i" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="warning"><input  type="text" onfocus="this.select();" id="cnt_tipo_9_p" class="form-control text-right"  value="0"  placeholder=""></td>
                                          <td class="info" ><input  type="text" onfocus="this.select();" id="cnt_tipo_9_t" class="form-control text-right"  value="0"  placeholder=""></td>

                                          
                                          <td class="secondary"><input  type="text" onfocus="this.select();" id="cnt_tipo_9_tf" class="form-control text-right" value="0"   placeholder=""></td>


                                          <td style="display: none;"><input  type="text" onfocus="this.select();" id="cnt_tipo_9_v" class="form-control text-right"  value="0"  placeholder=""></td>

                                          <td class="purple"><input  type="text" onfocus="this.select();" id="cnt_tipo_9_d" class="form-control text-right" value="0"   placeholder=""></td>
                                        </tr>


                                         



                                    </tbody>

                                    <tfoot>
                                      <tr class="v-grid-header">
                                            <td >Totales</td>
                                           
                                            <td id="total_i" class="text-right text-success" style="font-weight: bold">0</td>
                                            <td id="total_p" class="text-right text-info"  style="font-weight: bold">0</td>
                                            <td id="total_t" class="text-right text-warning" style="font-weight: bold; ">0</td>

                                           
                                            <td id="total_tf" class="text-right text-secondary" style="font-weight: bold">0</td>

                                            <td id="total_v" class="text-right text-danger" style="font-weight: bold; display: none;">0</td>

                                            <td id="total_d" class="text-right purple" style="font-weight: bold; ">0</td>


                                        </tr>
                                    </tfoot>

                                  </table>
                            </div>
                      </div>

                      <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12 text-right ">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Larvicida (grs):</label>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <input  id="cnt_larvicidas" onfocus="this.select();" class="form-control"  value="0.00"  placeholder="">
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12 text-right ">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Febriles:</label>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12 ">
                          <div class="form-group">
                            <input  id="cnt_febriles" class="form-control text-right"  value="0"  placeholder="">
                          </div>
                        </div>

                      </div> 


                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="save_item();" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

                    </div>
                  </div>
                </div>
              </div>


              <!--Form busca Orden de Compra-->

             
                  

              <!--Formulario Imprimir-->

              <div class="modal fade" id="modalPrint" data-backdrop="static" role="dialog" aria-labelledby="" aria-hidden="true" tabindex="-1">

                <div class="modal-dialog modal-md" role="document">


                  <div class="modal-content">

                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalItemTitle">Descarga Información</h4>
                    </div>



                    <div class="modal-body">


                     
                      <div class="row">

                           <div class="col-md-4">
                              <div class="form-group">
                                     <label >Establecimiento</label>
                                        <select class="form-control"   multiple id='cboalmacen' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-default"  >
                                        </select>
                              </div>
                            </div>






                          <div class="col-md-4">
                              <div class="form-group">
                                  <label >Mes</label>
                                  <select class='form-control'  id='mes_report'  >
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
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label >Año</label>
                                 
                                      <input type="number" value="<?=date('Y');?>" class="form-control pull-right" id="anio_report"  >
                                                                    

                                </div>
                          </div>


                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="downReport('D');" class="btn btn-success"><i class="fa fa-download"></i> Descargar Detallado</button>
                      <button type="button" onclick="downReport('R');" class="btn btn-success"><i class="fa fa-download"></i> Descargar Resumen</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

                    </div>
                  </div>
                </div>
              </div>  





              <div class="modal fade" id="modalNewPersonal" data-backdrop="static" role="dialog" aria-labelledby="" aria-hidden="true" tabindex="-1">

                <div class="modal-dialog modal-md" role="document">


                  <div class="modal-content">

                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalItemTitle">Nuevo Inspector</h4>
                    </div>



                    <div class="modal-body">


                     
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Tipo Documento</label>                                
                                  <select class='form-control'  id='md_tipo_documento'  >
                                    <option value="" selected="">--Seleccione--</option>
                                    <?
                                    $rspta=$tabla->select('1');
                                    while ($reg=pg_fetch_object($rspta)){
                                      echo "<option value='".$reg->id_tipo."' >".$reg->descripcion."</option>";}
                                      ?>
                                    </select>  
                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Numero Documento</label>
                                  <input type="text" class="form-control text-uppercase" id="md_numero_documento" >
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label >Nombres</label>
                                  <input type="text" class="form-control text-uppercase" id="md_nombres" >
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label >Ap. Paterno</label>
                                  <input type="text" class="form-control text-uppercase" id="md_apellido_paterno" >
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label >Ap. Materno</label>
                                  <input type="text" class="form-control text-uppercase" id="md_apellido_materno" >
                              </div>
                          </div>

                      </div>

                      <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label >Genero</label>                                
                                  <select class='form-control'  id='md_sexo'  >
                                    <option value="">--Seleccione--</option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                  </select>  
                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Celular</label>
                                  <input type="text" class="form-control" id="md_celular" >
                              </div>
                          </div>

                      </div>
                      


                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="saveNewInspector();" class="btn btn-success"><i class="fa fa-search"></i> Grabar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

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
  //}
  //else
  //{
  //  require 'noacceso.php';
  //}

  require 'footer.php';
  ?>



  <script type="text/javascript" src="scripts/ficha_fumigacion.js?rnd=<?php echo rand(); ?>"></script>
  <script type="text/javascript" src="../public/js/mustache.min.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Cy8utiRrZQrfPdgq1RKau_QhcyQOSfo&libraries=places&callback=initAutocomplete" async defer></script>

  <script>
    var rIndex;
    var editItem=false;
    var newItem;
    var currentItem=0;

    var items_arr = [];
    var id_items = 1;

    //var tabled = document.getElementById('tblDet').getElementsByTagName('tbody')[0]; //document.getElementById("tblDet");

    function obtenerUbicacionActual(){

      //javascript:navigator.geolocation.getCurrentPosition(function(position) { alert('Latitud: ' + position.coords.latitude); });


      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          const latitude = position.coords.latitude;
          const longitude = position.coords.longitude;
          $("#latitud").val(latitude);
          $("#longitud").val(longitude);
          //console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
        });
      } else {
        //console.log("Geolocation is not supported by this browser.");
          alert("La geolocalizacion no esta soportado por tu navegador, verifica si tiene permiso para realizar esta accion");
      }
    }
    function editRow(r){
        //var table = document.getElementById('tblCapacitacion');
        //tr = $("#"+r).cells[9].childNodes[0].nodeValue.trim();
        //tr = $("#"+r+" #td_nombre_item").html();
       /* var row = table.rows[r];
        var obj = row.cells[9].childNodes[0];
        alert(row.cells[9].childNodes[0].nodeValue.trim());*/
        rIndex=r;
        editItem=true;
        newItem=false;
        $('#id_item').append("<option value='"+$("#"+r+" #td_id_item").html()+"' selected='selected'>"+$("#"+r+" #td_nombre_item").html()+"</option>");
        $("#id_item").trigger('change');

        $("#unidad_medida_compra").val($("#"+r+" #td_unidad_medida").html());
        $("#marca").val($("#"+r+" #td_marca").html());
        $("#factor").val($("#"+r+" #td_factor").html());
        $("#cantidad").val($("#"+r+" #td_cantidad").html());
        $("#costo_umc").val($("#"+r+" #td_costo_umc").html());
        $("#numero_lote").val($("#"+r+" #td_numero_lote").html());
        $("#fecha_vencimiento").val($("#"+r+" #td_fecha_vencimiento").html());

        ContarUnidades();
        calcular();
        $('#modalItem').modal('show');


    }
    function  delRow(row){
      //table.deleteRow(row);

      bootbox.confirm({
        title: "Mensaje",
        message: "Esta seguro de quitar el item?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-remove"></i> Cancelar'
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Aceptar'
          }
        },
        callback: function (result) {
          //console.log('This was logged in the callback: ' + result);
          if (result){

            //tot = parseFloat($("#td_total").html())-parseFloat($("#"+row+" #td_costo_total").html());
            //$("#td_total").html(parseFloat(tot).toFixed(2));

            $("#"+row).remove();
            calculoTotal();


          }
        }
      });


    }
    function addEditRow(){
      msj='';
      /*if ($("#cantidad").val()==''){
        msj="Ingrese cantidad comprada";
      }
      if ($("#costo_umc").val()==''){
        msj="Ingrese precio costo";
      }

      if ($('#maneja_lotes').is(':checked')){
        if ($('#numero_lote').val()==''){
          msj="El item maneja lotes, ingrese el numero de lote";
        }
        if ($('#fecha_vencimiento').val()==''){
          msj="El item maneja lotes, ingrese la fecha de vencimiento";
        }
      }*/
      direc=$("#direccion_familia").val();
      if (msj){
        bootbox.alert(msj);
        return false;
      }
      if (editItem==false){
        addRow();
      }else{
        i=currentItem;
        //Editando item
        var tot_i=parseInt($("#cnt_tipo_1_i").val())+parseInt($("#cnt_tipo_2_i").val())+parseInt($("#cnt_tipo_3_i").val())+parseInt($("#cnt_tipo_4_i").val())+
        parseInt($("#cnt_tipo_5_i").val())+parseInt($("#cnt_tipo_6_i").val())+parseInt($("#cnt_tipo_7_i").val())+parseInt($("#cnt_tipo_8_i").val())+
        parseInt($("#cnt_tipo_9_i").val());

        var tot_p=parseInt($("#cnt_tipo_1_p").val())+parseInt($("#cnt_tipo_2_p").val())+parseInt($("#cnt_tipo_3_p").val())+parseInt($("#cnt_tipo_4_p").val())+
        parseInt($("#cnt_tipo_5_p").val())+parseInt($("#cnt_tipo_6_p").val())+parseInt($("#cnt_tipo_7_p").val())+parseInt($("#cnt_tipo_8_p").val())+
        parseInt($("#cnt_tipo_9_p").val());

        var tot_t=parseInt($("#cnt_tipo_1_t").val())+parseInt($("#cnt_tipo_2_t").val())+parseInt($("#cnt_tipo_3_t").val())+parseInt($("#cnt_tipo_4_t").val())+
        parseInt($("#cnt_tipo_5_t").val())+parseInt($("#cnt_tipo_6_t").val())+parseInt($("#cnt_tipo_7_t").val())+parseInt($("#cnt_tipo_8_t").val())+
        parseInt($("#cnt_tipo_9_t").val());  

        var tot_l=parseInt($("#cnt_tipo_1_v").val())+parseInt($("#cnt_tipo_2_v").val())+parseInt($("#cnt_tipo_3_v").val())+parseInt($("#cnt_tipo_4_v").val())+
        parseInt($("#cnt_tipo_5_v").val())+parseInt($("#cnt_tipo_6_v").val())+parseInt($("#cnt_tipo_7_v").val())+parseInt($("#cnt_tipo_8_v").val())+
        parseInt($("#cnt_tipo_9_v").val()); 


        items_arr[i][1]=direc.toUpperCase();   

        items_arr[i][2]=$("#nro_habitantes").val();
        items_arr[i][3]=$("#id_condicion_vivienda").val();

        items_arr[i][4]=$("#id_condicion_vivienda option:selected").text();


        items_arr[i][5]=$("#cnt_tipo_1_i").val();
        items_arr[i][6]=$("#cnt_tipo_1_p").val();
        items_arr[i][7]=$("#cnt_tipo_1_t").val();
        items_arr[i][8]=$("#cnt_tipo_1_v").val();

        items_arr[i][9]=$("#cnt_tipo_2_i").val();
        items_arr[i][10]=$("#cnt_tipo_2_p").val();
        items_arr[i][11]=$("#cnt_tipo_2_t").val();
        items_arr[i][12]=$("#cnt_tipo_2_v").val();

        items_arr[i][13]=$("#cnt_tipo_3_i").val();
        items_arr[i][14]=$("#cnt_tipo_3_p").val();
        items_arr[i][15]=$("#cnt_tipo_3_t").val();
        items_arr[i][16]=$("#cnt_tipo_3_v").val();

        items_arr[i][17]=$("#cnt_tipo_4_i").val();
        items_arr[i][18]=$("#cnt_tipo_4_p").val();
        items_arr[i][19]=$("#cnt_tipo_4_t").val();
        items_arr[i][20]=$("#cnt_tipo_4_v").val();

        items_arr[i][21]=$("#cnt_tipo_5_i").val();
        items_arr[i][22]=$("#cnt_tipo_5_p").val();
        items_arr[i][23]=$("#cnt_tipo_5_t").val();
        items_arr[i][24]=$("#cnt_tipo_5_v").val();

        items_arr[i][25]=$("#cnt_tipo_6_i").val();
        items_arr[i][26]=$("#cnt_tipo_6_p").val();
        items_arr[i][27]=$("#cnt_tipo_6_t").val();
        items_arr[i][28]=$("#cnt_tipo_6_v").val();

        items_arr[i][29]=$("#cnt_tipo_7_i").val();
        items_arr[i][30]=$("#cnt_tipo_7_p").val();
        items_arr[i][31]=$("#cnt_tipo_7_t").val();
        items_arr[i][32]=$("#cnt_tipo_7_v").val();

        items_arr[i][33]=$("#cnt_tipo_8_i").val();
        items_arr[i][34]=$("#cnt_tipo_8_p").val();
        items_arr[i][35]=$("#cnt_tipo_8_t").val();
        items_arr[i][36]=$("#cnt_tipo_8_v").val();

        items_arr[i][37]=$("#cnt_tipo_9_i").val();
        items_arr[i][38]=$("#cnt_tipo_9_p").val();
        items_arr[i][39]=$("#cnt_tipo_9_t").val();
        items_arr[i][40]=$("#cnt_tipo_9_v").val();

        items_arr[i][41]= tot_i;
        items_arr[i][42]= tot_p;
        items_arr[i][43]= tot_t;
        items_arr[i][44]= tot_l;


        items_arr[i][45]=$("#cnt_larvicidas").val();

        items_arr[i][46]=tot_p;

        items_arr[i][47]=$("#cnt_febriles").val();

        renderDetalle();

        $('#modalItem').modal('toggle');


      }
    }

    function addRow(){

      /*if ($("#id_item option:selected").val()==null){
        bootbox.alert("Seleccione un item");
        return false;
      }
      

      idRow="tr"+$("#id_item option:selected").val()+$("#numero_lote").val();

      if (document.getElementById(idRow)){

          lot=$("#"+idRow+" #td_numero_lote").html();
          if ($("#numero_lote").val()==lot){
            bootbox.alert("Ya existe un registro del mismo item y lote en el detalle");
            return false;  
          }
          
      }*/
      msg='';
      if ($("#direccion_familia").val()==''){
          bootbox.alert("Ingrese direccion o familia");
          return false;  
      }
      if ($("#id_condicion_vivienda").val()==''){
         bootbox.alert("Seleccione una condicion de vivienda");
          return false;  
      }
      cond=$("#id_condicion_vivienda").val();
      if (cond=='4' && cond=='5' ){   //Diferente de cerrada o desha
        cnt=$("#nro_habitantes").val();
        cnt=cnt.parseInt();  
        if (cnt<=0){
          return bootbox.alert("Ingrese un valor valido para numero de habitantes");
        }
      }
      direc=$("#direccion_familia").val();
      /*for (var i = 0; i < items_arr.length; i++) {
        if (direc == items_arr[i][1]) {
          msg = "La direccion o familia ya se agrego a la lista";
          break;
        }
      }*/
      if (msg){
        return  bootbox.alert(msg);
      }

      var tot_i=parseInt($("#cnt_tipo_1_i").val())+parseInt($("#cnt_tipo_2_i").val())+parseInt($("#cnt_tipo_3_i").val())+parseInt($("#cnt_tipo_4_i").val())+
                parseInt($("#cnt_tipo_5_i").val())+parseInt($("#cnt_tipo_6_i").val())+parseInt($("#cnt_tipo_7_i").val())+parseInt($("#cnt_tipo_8_i").val())+
                parseInt($("#cnt_tipo_9_i").val());

      var tot_p=parseInt($("#cnt_tipo_1_p").val())+parseInt($("#cnt_tipo_2_p").val())+parseInt($("#cnt_tipo_3_p").val())+parseInt($("#cnt_tipo_4_p").val())+
                parseInt($("#cnt_tipo_5_p").val())+parseInt($("#cnt_tipo_6_p").val())+parseInt($("#cnt_tipo_7_p").val())+parseInt($("#cnt_tipo_8_p").val())+
                parseInt($("#cnt_tipo_9_p").val());

      var tot_t=parseInt($("#cnt_tipo_1_t").val())+parseInt($("#cnt_tipo_2_t").val())+parseInt($("#cnt_tipo_3_t").val())+parseInt($("#cnt_tipo_4_t").val())+
                parseInt($("#cnt_tipo_5_t").val())+parseInt($("#cnt_tipo_6_t").val())+parseInt($("#cnt_tipo_7_t").val())+parseInt($("#cnt_tipo_8_t").val())+
                parseInt($("#cnt_tipo_9_t").val());          
      var tot_l=parseInt($("#cnt_tipo_1_v").val())+parseInt($("#cnt_tipo_2_v").val())+parseInt($("#cnt_tipo_3_v").val())+parseInt($("#cnt_tipo_4_v").val())+
                parseInt($("#cnt_tipo_5_v").val())+parseInt($("#cnt_tipo_6_v").val())+parseInt($("#cnt_tipo_7_v").val())+parseInt($("#cnt_tipo_8_v").val())+
                parseInt($("#cnt_tipo_9_v").val());          


      var data = [ /*00*/ id_items,
                    /*01*/ direc.toUpperCase(),
                    /*02*/ $("#nro_habitantes").val(),
                    /*03*/ $("#id_condicion_vivienda").val(),
                    /*04*/ $("#id_condicion_vivienda option:selected").text(),
                    /*05*/ $("#cnt_tipo_1_i").val(),
                    /*06*/ $("#cnt_tipo_1_p").val(),
                    /*07*/ $("#cnt_tipo_1_t").val(),
                    /*08*/ $("#cnt_tipo_1_v").val(),

                     /*9*/ $("#cnt_tipo_2_i").val(),
                    /*9*/ $("#cnt_tipo_2_p").val(),
                    /*10*/ $("#cnt_tipo_2_t").val(),
                    /*11*/ $("#cnt_tipo_2_v").val(),

                            $("#cnt_tipo_3_i").val(),
                    /*04*/ $("#cnt_tipo_3_p").val(),
                    /*04*/ $("#cnt_tipo_3_t").val(),
                    /*04*/ $("#cnt_tipo_3_v").val(),

                           $("#cnt_tipo_4_i").val(),
                    /*04*/ $("#cnt_tipo_4_p").val(),
                    /*04*/ $("#cnt_tipo_4_t").val(),
                    /*04*/ $("#cnt_tipo_4_v").val(),

                          $("#cnt_tipo_5_i").val(),
                    /*04*/ $("#cnt_tipo_5_p").val(),
                    /*04*/ $("#cnt_tipo_5_t").val(),
                    /*04*/ $("#cnt_tipo_5_v").val(),

                          $("#cnt_tipo_6_i").val(),
                    /*04*/ $("#cnt_tipo_6_p").val(),
                    /*04*/ $("#cnt_tipo_6_t").val(),
                    /*04*/ $("#cnt_tipo_6_v").val(),

                          $("#cnt_tipo_7_i").val(),
                    /*04*/ $("#cnt_tipo_7_p").val(),
                    /*04*/ $("#cnt_tipo_7_t").val(),
                    /*04*/ $("#cnt_tipo_7_v").val(),

                          $("#cnt_tipo_8_i").val(),
                    /*04*/ $("#cnt_tipo_8_p").val(),
                    /*04*/ $("#cnt_tipo_8_t").val(),
                    /*04*/ $("#cnt_tipo_8_v").val(),

                          $("#cnt_tipo_9_i").val(),
                    /*04*/ $("#cnt_tipo_9_p").val(),
                    /*04*/ $("#cnt_tipo_9_t").val(),
                    /*04*/ $("#cnt_tipo_9_v").val(),

                          tot_i,
                          tot_p,
                          tot_t,
                          tot_l,

                         $("#cnt_larvicidas").val(),
                         tot_p,
                          $("#cnt_febriles").val()



      ];

      items_arr.push(data);
      id_items++;            
      renderDetalle();

      $('#modalItem').modal('toggle');

      

      //tot = parseFloat($("#costo_total").val())+parseFloat($("#td_total").html());
      //$("#td_total").html(parseFloat(tot).toFixed(2));

      //$("#id_empresa").prop("disabled",true);
      //$("#id_local").prop("disabled",true);

      //calculoTotal();
      // call the function to set the event to the new row
      //selectedRowToInput();
    }

    function openItem(i){

      //console.log(items_arr);
      i=i-1;

      $("#direccion_familia").val(items_arr[i][1]);   

      $("#nro_habitantes").val(items_arr[i][2]);
      $("#id_condicion_vivienda").val(items_arr[i][3])
      
      $("#cnt_tipo_1_i").val(items_arr[i][5]);
      $("#cnt_tipo_1_p").val(items_arr[i][6]);
      $("#cnt_tipo_1_t").val(items_arr[i][7]);
      $("#cnt_tipo_1_v").val(items_arr[i][8]);

      $("#cnt_tipo_2_i").val(items_arr[i][9]);
      $("#cnt_tipo_2_p").val(items_arr[i][10]);
      $("#cnt_tipo_2_t").val(items_arr[i][11]);
      $("#cnt_tipo_2_v").val(items_arr[i][12]);

      $("#cnt_tipo_3_i").val(items_arr[i][13]);
      $("#cnt_tipo_3_p").val(items_arr[i][14]);
      $("#cnt_tipo_3_t").val(items_arr[i][15]);
      $("#cnt_tipo_3_v").val(items_arr[i][16]);

      $("#cnt_tipo_4_i").val(items_arr[i][17]);
      $("#cnt_tipo_4_p").val(items_arr[i][18]);
      $("#cnt_tipo_4_t").val(items_arr[i][19]);
      $("#cnt_tipo_4_v").val(items_arr[i][20]);

      $("#cnt_tipo_5_i").val(items_arr[i][21]);
      $("#cnt_tipo_5_p").val(items_arr[i][22]);
      $("#cnt_tipo_5_t").val(items_arr[i][23]);
      $("#cnt_tipo_5_v").val(items_arr[i][24]);

      $("#cnt_tipo_6_i").val(items_arr[i][25]);
      $("#cnt_tipo_6_p").val(items_arr[i][26]);
      $("#cnt_tipo_6_t").val(items_arr[i][27]);
      $("#cnt_tipo_6_v").val(items_arr[i][28]);

      $("#cnt_tipo_7_i").val(items_arr[i][29]);
      $("#cnt_tipo_7_p").val(items_arr[i][30]);
      $("#cnt_tipo_7_t").val(items_arr[i][31]);
      $("#cnt_tipo_7_v").val(items_arr[i][32]);

      $("#cnt_tipo_8_i").val(items_arr[i][33]);
      $("#cnt_tipo_8_p").val(items_arr[i][34]);
      $("#cnt_tipo_8_t").val(items_arr[i][35]);
      $("#cnt_tipo_8_v").val(items_arr[i][36]);

      $("#cnt_tipo_9_i").val(items_arr[i][37]);
      $("#cnt_tipo_9_p").val(items_arr[i][38]);
      $("#cnt_tipo_9_t").val(items_arr[i][39]);
      $("#cnt_tipo_9_v").val(items_arr[i][40]);


      $("#cnt_larvicidas").val(items_arr[i][45]);
                       
      $("#cnt_febriles").val(items_arr[i][47]);

      editItem=true;
      currentItem=i;  

       $('#modalItem').modal('show');


    }

    function deleteItem(it){

          bootbox.confirm({
            title: "Mensaje",
            message: "Esta seguro de quitar el registro?",
            buttons: {
              cancel: {
                label: '<i class="fa fa-times"></i> Cancelar'
              },
              confirm: {
                label: '<i class="fa fa-check"></i> Aceptar'
              }
            },
            callback: function (result) {
              //console.log('This was logged in the callback: ' + result);
              if (result){
                 var index = null;
                 for(var i=0;i<items_arr.length;i++){
                  if(it == items_arr[i][0]){
                    index = i;
                    break;
                  }
                }
                items_arr.splice(index,1);
                renderDetalle();

              }
            }
          });


    }

    function renderDetalle() {
      if (items_arr.length > 0) {
        var htmlRows = "";

        for (var i = 0; i < items_arr.length; i++) {
            /*var edit = "<a class='fa fa-edit text-warning mx-1' href='#' style='font-size: .95em' " +
                " onclick='event.preventDefault();openModalItem(\"upd_detalle\"," + JSON.stringify(items_arr[i]) +")' >"
                +"</a>";   43*/
                var edit = "<a  class='fa fa-edit text-warning ' " +
                " onclick='event.preventDefault();openItem(" + items_arr[i][0] + ")' href='#' >"
                + "</a>&nbsp";  
                var del = "<a  class='fa fa-trash text-danger ' " +
                " onclick='event.preventDefault();deleteItem(" + items_arr[i][0] + ")' href='#' >"
                + "</a>";

                htmlRows +=
                "<tr>" +
                "<td class='text-center'>" + edit+del + "</td>" +
                "<td >" + items_arr[i][1] + "</td>" +
                "<td>" + items_arr[i][2] + "</td>" +
                "<td>" + items_arr[i][4] + "</td>" +
                "<td class='success'>" + items_arr[i][5] + "</td>" +
                "<td class='warning'>" + items_arr[i][6] + "</td>" +
                "<td class='info'>" + items_arr[i][7] + "</td>" +
                "<td class='danger'>" + items_arr[i][8] + "</td>" +
                "<td  class='success'>" + items_arr[i][9] + "</td>" +
                "<td class='warning'>" + items_arr[i][10] + "</td>" +
                "<td class='info'>" + items_arr[i][11] + "</td>" +

                "<td class='danger'>" + items_arr[i][12] + "</td>" +

                "<td  class='success'>" + items_arr[i][13] + "</td>" +
                "<td class='warning'>" + items_arr[i][14] + "</td>" +
                "<td class='info'>" + items_arr[i][15] + "</td>" +
                "<td class='danger'>" + items_arr[i][16] + "</td>" +

                "<td class='success'>" + items_arr[i][17] + "</td>" +
                "<td class='warning'>" + items_arr[i][18] + "</td>" +
                "<td class='info'>" + items_arr[i][19] + "</td>" +
                "<td class='danger'>" + items_arr[i][20] + "</td>" +

                "<td class='success'>" + items_arr[i][21] + "</td>" +
                "<td class='warning'>" + items_arr[i][22] + "</td>" +
                "<td class='info'>" + items_arr[i][23] + "</td>" +
                "<td class='danger'>" + items_arr[i][24] + "</td>" +

                "<td class='success'>" + items_arr[i][25] + "</td>" +
                "<td class='warning'>" + items_arr[i][26] + "</td>" +
                "<td class='info'>" + items_arr[i][27] + "</td>" +
                "<td class='danger'>" + items_arr[i][28] + "</td>" +
 
                "<td class='success'>" + items_arr[i][29] + "</td>" +
                "<td class='warning'>" + items_arr[i][30] + "</td>" +
                "<td class='info'>" + items_arr[i][31] + "</td>" +
                "<td class='danger'>" + items_arr[i][32] + "</td>" +

                "<td class='success'>" + items_arr[i][33] + "</td>" +
                "<td class='warning'>" + items_arr[i][34] + "</td>" +
                "<td class='info'>" + items_arr[i][35] + "</td>" +
                "<td class='danger'>" + items_arr[i][36] + "</td>" +

                "<td class='success'>" + items_arr[i][37] + "</td>" +
                "<td class='warning'>" + items_arr[i][38] + "</td>" +
                "<td class='info'>" + items_arr[i][39] + "</td>" +
                "<td class='danger'>" + items_arr[i][40] + "</td>" +

                "<td class='success'>" + items_arr[i][41] + "</td>" +
                "<td class='warning'>" + items_arr[i][42] + "</td>" +
                "<td class='info'>" + items_arr[i][43] + "</td>" +
                "<td class='danger'>" + items_arr[i][44] + "</td>" +

                "<td>" + items_arr[i][45] + "</td>" +
                "<td>" + items_arr[i][46] + "</td>" +
                "<td>" + items_arr[i][47] + "</td>" +



                "</tr>";
              }

              $("#tbl_items").html(htmlRows);

      } else {
          $("#tbl_items").html("");
      }
    }

    function calculoTotal(){

        var rowCount = tabled.rows.length;
        var nTot=0;
        for(var i=0; i<rowCount; i++) {
          var row = tabled.rows[i];
           nTot= nTot + parseFloat(row.cells[8].innerHTML);
         };

      $("#td_total").html(parseFloat(nTot).toFixed(2));

      igv = (parseFloat($("#porcentaje_igv").val())/100)+1
      vv = parseFloat(parseFloat($("#td_total").html())/igv).toFixed(2);
      vigv=parseFloat(parseFloat($("#td_total").html())-vv).toFixed(2);
      $("#td_subtotal").html(vv);
      $("#td_igv").html(vigv);
    }


    function ContarUnidades(){
      var unidades = parseInt($("#factor").val())*parseInt($("#cantidad").val())
      $("#unidades").val(unidades);
    }

    function calcular(){
      var cxu = parseFloat($("#costo_umc").val())/parseFloat($("#unidades").val());
      $("#costo_unidad").val(cxu.toFixed(4));
      var total=parseFloat($("#cantidad").val()*parseFloat($("#costo_umc").val()));
      $("#costo_total").val(total.toFixed(2));
    }

    function ver(){
      
      $("#hid_local").val($("#s_id_local").val());
      
      //$("#establecimiento").val($("#s_local").val())
      //$("#distrito").val($("#s_distrito").val())
      $("#id_ficha").val('');


      //$("#sector").val('');
      //$("#id_tipo_actividad").val('');

      //getLocalidades('');


      items_arr = [];
      id_items = 1;
      renderDetalle();      

      $('#modalFichaF').modal('show')
      //$("#nombre").focus();
    }



    function openOrdenCompra(){
      $('#modalOrdenCompra').modal('show');
    }
    //nuevo item en base de datis
    
    /*function open_new_item_(id_ingreso,id_empresa){
          limpiar_modal_items();
          editItem=true;
          newItem=true;
          $("#id_empresa").val(id_empresa);
          $("#id_ingreso").val(id_ingreso);
          $('#modalItemTitle').html('Nuevo Item');
          $('#id_item').select2('enable');
          $('#modalItem').modal('show');
    }*/

    function open_item(){
      //if ($("#id_local").val()==''){
      //    bootbox.alert("Seleccione un local antes de agregar los itemsss");

      //}else{
        //$('#id_item').select2("enable",true);
        //$("#id_item").trigger('change');
        //Limpiando modal de items
       // limpiar_modal_items();
       // $('#id_item').select2('enable');

       // $('#id_item').select2('open');
        //$('#id_item').select2('close');
        editItem=false;
        $("#direccion_familia").val("");
        $("#nro_habitantes").val('0');
        $("#id_condicion_vivienda").val('');

        $("#cnt_larvicidas").val('0');
        $("#cnt_febriles").val('0');

        for (i=1;i<=9;i++){   
          $("#cnt_tipo_"+i.toString()+"_i").val('0');
          $("#cnt_tipo_"+i.toString()+"_p").val('0');
          $("#cnt_tipo_"+i.toString()+"_t").val('0');
          $("#cnt_tipo_"+i.toString()+"_v").val('0');
        }

        sum_valores();


        $('#modalItem').modal('show');
        //$('#id_item').select2('open');
        //$('#id_item').prev('.select2-container').find('.select2-input').focus();
        /*$('#id_item').click()
        $('#id_item').focus()*/
        //$('#id_item').select2();
        //$('#id_item').select2('open');
    //  }
    }


    $(function () {


     /* $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass   : 'iradio_flat-green'
      })*/

      $.getJSON('../ajax/local.php?op=listaLocales', function(data) {
        var template = $('#tpl_establecimientos').html();
        var html = Mustache.to_html(template, data);
        $('#id_local_destino').html(html);
        $('#id_local_destino').select2();
      });


      $.fn.modal.Constructor.prototype.enforceFocus = function () {
        };

        $.getJSON('../ajax/local.php?op=listaLocales', function(data) {
        var template = $('#tpl_establecimientos').html();
        var html = Mustache.to_html(template, data);
        $('#cboalmacen').html(html);
        $('#cboalmacen').selectpicker();
      });


      $.ajax( {
          url: '../ajax/personal.php?op=cboPersonal',
          //data:  parametros,
          dataType: 'html',
          success: function ( json ) {
            $("#id_usuario_registro").html( json );
            $("#id_usuario_registro").select2();

          }
        } );  



      $(document).on('hidden.bs.modal', '.bootbox.modal', function (e) {    
        if($(".modal").hasClass('in')) {
            $('body').addClass('modal-open');
        }
      });

      $('.text-right').keypress(function (e) {
          var key = window.Event ? e.which : e.keyCode
          return (key >= 48 && key <= 57)
      });

       $('.text-right').blur(function (e) {
          sum_valores();
      });



    $('#maneja_lotes').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    $("#id_localidad").select2();





    $("#razon_social").select2();
    $("#id_item").select2();

    /*$('#id_localidad').select2({
      dropdownParent: $("#modalFicha"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digite localidad.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/tabla.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, 
          page: params.page,
          op : 'findLocalidad',
          sector: $("#sector").val(),
          id_local: $("#hid_local").val()
        };
      },
      results: function (data, page) {
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
    }, 
    minimumInputLength: 2,
  });*/




  $('#id_item').select2({
      dropdownParent: $("#modalItem"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digita descripcion del item.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/items.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, // search term
          page: params.page,
          op : 'findByName',
          emp: $("#id_empresa").val()
        };
      },
      results: function (data, page) { // parse the results into the format expected
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


    $('#razon_social').on('change', function() {
        var id_proveedor = $("#razon_social option:selected").val();
        $.post("../ajax/proveedor.php?op=mostrar",{id_proveedor : id_proveedor}, function(data, status){
          data = JSON.parse(data);
            $("#direccion").val(data.direccion);
            $("#ruc").val(data.ruc);
        });

    });


    $('#id_item').on('change', function() {
        var id_item = $("#id_item option:selected").val();
        $.post("../ajax/items.php?op=mostrar",{id_item : id_item}, function(data, status){
          data = JSON.parse(data);
           // $("#direccion").val(data.direccion);
           // $("#ruc").val(data.ruc);
           $("#categoria").val(data.categoria);
           $("#marca").val(data.marca);
           $("#unidad_medida_compra").val(data.unidad_medida_ingreso);
           $("#factor").val(data.factor);
		   $("#stock_real").val(data.stock_real);	
           if (data.maneja_lote=='1'){
              $("#maneja_lotes").iCheck('check');
              $("#numero_lote").prop('disabled', false);
              $("#fecha_vencimiento").prop('disabled', false);

           }else{
              $("#maneja_lotes").iCheck('uncheck')
              $("#numero_lote").prop('disabled', true);
              $("#fecha_vencimiento").prop('disabled', true);

           }


           $("#cantidad").focus();
        });

    });

    $('#modalNew').on('shown.bs.modal', function () {

       //$('#id_item').focus();

    })


    $('#modalItem').on('shown.bs.modal', function () {
      //$('#id_item').select2('open');
      /*alert(editItem);

      if (editItem==false){
          $('#id_item').select2("enable",true);
          $('#id_item').select2('open');
      }else{
          //$('#id_item').prop("disabled", true);
          $('#id_item').select2("enable",false);
      }*/

    })
    /*$("#ubigeo").select2({
      dropdownParent: $('#modalNew .modal-body')
    });*/

    $.getJSON('../ajax/empresa.php?op=list', function(data) {
      var template = $('#tpl_empresas').html();
      var html = Mustache.to_html(template, data);
      $('#id_empresa').html(html);
    });

    $.getJSON('../ajax/empresa.php?op=list', function(data) {
      var template = $('#tpl_empresas').html();
      var html = Mustache.to_html(template, data);
      $('#moc_id_empresa').html(html);
    });


    $.getJSON('../ajax/tabla.php?op=list&id_tabla=2', function(data) {
      var template = $('#tpl_tipos_documento').html();
      var html = Mustache.to_html(template, data);
      $('#id_tipo_documento').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=14', function(data) {
      var template = $('#tpl_moneda').html();
      var html = Mustache.to_html(template, data);
      $('#id_moneda').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=19', function(data) {
      var template = $('#tpl_condicion_vivienda').html();
      var html = Mustache.to_html(template, data);
      $('#id_condicion_vivienda').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=17', function(data) {
      var template = $('#tpl_sector').html();
      var html = Mustache.to_html(template, data);
      $('#sector').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=18', function(data) {
      var template = $('#tpl_tipo_actividad').html();
      var html = Mustache.to_html(template, data);
      $('#id_tipo_actividad').html(html);
    });

    /*$.getJSON('../ajax/tabla.php?op=list&id_tabla=16', function(data) {
      var template = $('#tpl_localidades').html();
      var html = Mustache.to_html(template, data);
      $('#id_localidad').html(html);
    });*/



      $('#fecha_inicio').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });


      $('#fecha_programada').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });

      $('#fecha_termino').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });

      $('#fecha_desde').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });

      $('#fecha_hasta').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });


      $('#fecha_vencimiento').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_3"
      });

});

function listLocales(id_selected){
  $.getJSON('../ajax/empresa.php?op=listLocales&id_selected='+id_selected+'&id_empresa='+$("#id_empresa").val(), function(data) {
      var template = $('#tpl_locales').html();
      var html = Mustache.to_html(template, data);
      $('#id_local').html(html);
    });
}






function saveFichaF(){

  if ($("#fecha_programada").val()==''){
    bootbox.alert('Ingrese fecha programada');    
    return false;
  }

  if ($("#hora_salida").val()==''){
     bootbox.alert('Ingrese hora de salida');
     return false;
  }

  if ($("#id_local_destino").val()==''){
    bootbox.alert('Seleccione establecimiento destino');
    //$("#id_local_destino").focus();
    return false;
  }

  if ($("#hora_llegada").val()==''){
     bootbox.alert('Ingrese hora de llegada');
     return false;
  }
  
  

   bootbox.confirm({
        title: "Mensaje",
        message: "Esta seguro de guardar el registro?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Cancelar'
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Aceptar',
            className: "btn-success"
          }
        },
        callback: function (result) {
          
          //console.log('This was logged in the callback: ' + result);
          if (result){
              $("#loaderModal").show();
              //$op=($("#id_ficha").val()=='')?'saveFicha':'updateFicha';
              $op='saveFicha';
              id_f=($("#id_ficha").val()=='')?'0':$("#id_ficha").val();
              $.ajax({
                type: "POST",
                url: "../ajax/ficha_fumigacion.php?op="+$op,
                //dataType: "json",
                //data: JSON.stringify({ paramName: info }),
                data : {
                  id_ficha: id_f,
                  id_local_destino: $("#id_local_destino").val(),
                  fecha_programada: $("#fecha_programada").val(),
                  hora_salida: $("#hora_salida").val(),
                  hora_llegada: $("#hora_llegada").val(),
                  area: $("#area").val().toUpperCase(),
                  participa: $("#participa").val().toUpperCase(),
                  organiza: $("#organiza").val().toUpperCase(),
                  resumen: $("#resumen_actividad").val(),
                  detail: $("#detalles_actividad").val(),
                  id_usuario: $("#s_id_usuario").val()
                  //detalle: aItems
                },
                success: function(msg){
                  $("#loaderModal").hide();
                  table.ajax.reload();
                    var amsg=msg.split('|');
                    var nerror=amsg[0];
                    if (nerror=='0'){
                      bootbox.alert('Ocurrio un error: '+amsg[1]);
                    }else{
                      $('#modalFichaF').modal('toggle');
                      bootbox.alert('Registro guardado');
                    }

                }
              });

        }
      }

    });

}


</script>

<script id="tpl_empresas" type="text/template"><option value='' selected>--Seleccione Empresa--</option>
  {{#empresas}}<option value='{{id}}'>{{nombre}}</option>{{/empresas}}
</script>
<script id="tpl_tipos_documento" type="text/template"><option value='' selected>--Seleccione Tipo--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_moneda" type="text/template"><option value='' selected>--Seleccione Moneda--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_condicion_vivienda" type="text/template"><option value='' selected>--Seleccione Condicion--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_tipo_actividad" type="text/template"><option value='' selected>--Seleccione Actividad--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_localidades" type="text/template"><option value='' selected>--Seleccione Localidad--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>


<script id="tpl_sector" type="text/template"><option value='' selected>--Seleccione Sector--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>


<script id="tpl_locales" type="text/template"><option value='' selected>--Seleccione Local--</option>
  {{#locales}}<option value='{{id}}' {{ selected }}>{{nombre}}</option>{{/locales}}
</script>

<script id="tpl_establecimientos" type="text/template">
  <option value='' selected>--Seleccione Local--</option>
  {{#locales}}<option value='{{id}}' >{{nombre}}</option>{{/locales}}
</script>

  <?php
//}
ob_end_flush();
?>
