<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
/*
if (!isset($_SESSION["nombre"]))
{
header("Location: login.html");
}
else
{*/
require 'header.php';

?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<style type="text/css">

@media (min-width: 768px) {
  .modal-lg {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .modal-lg {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .modal-lg {
    width: 1170px;
  }
}

.btn.btn-flota-dcha {
  float: left;
  margin-top: -10px;
  margin-bottom: -9px;
  z-index: 10;
}

.btn.btn-fab, .btn.btn-fab .ripple-wrapper {
  border-radius: 100%;
}
.btn.btn-fab, .btn.btn-fab:hover {
  box-shadow: 0 1px 6px 0 rgba(0,0,0,.12),0 1px 6px 0 rgba(0,0,0,.12);
  box-shadow: 0 1px 6px rgba(0,0,0,.12),0 1px 6px rgba(0,0,0,.12) !important;
}

.btn.btn-fab {
  width: 48px;
  height: 48px;
  line-height: 48px;
  padding: 0;
  margin: 0;
  margin-top: -13px;
  margin-bottom: 0px;
  font-size: 26px;
}

.select2-selection__rendered {
  line-height: 35px !important;
}

.select2-selection {
  height: 35px !important;
}
.select2-selection__arrow {
  height: 35px !important;
}

</style>
<div class="right_col" role="main">
  <!-- Main content -->
  <!--<section class="content">-->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Despacho <small></small></h2>
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

        <!--<button type="button" class="btn btn-success btn-fab btn-raised btn-flota-dcha btn-aclarado mdi-content-add" data-toggle="tooltip" data-placement="top" title="" onclick="ver();" data-original-title="Registrar Salida"><i class="fa fa-plus" aria-hidden="true"></i></button>
      </button>-->
      <!-- /.box-header -->
      <!-- centro -->
      <div class="x_content" id="listadoregistros">
        <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
          <thead class="v-grid-header">
            <th></th>
            <th>Acciones</th>
            <th>Empresa</th>
            <th>Area Destino</th>
            <th>Tipo Documento</th>
            <th>Serie</th>
            <th>Numero</th>            
            <th>Fecha Salida</th>
            <th>Persona Traslado</th>
            <th>Nro Req</th>
            <th>Estado</th>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <th></th>
            <th>Acciones</th>
            <th>Empresa</th>
            <th>Area Destino</th>
            <th>Tipo Documento</th>
            <th>Serie</th>
            <th>Numero</th>
            <th>Fecha Salida</th>
            <th>Persona Traslado</th>
            <th>Nro Req</th>
            <th>Estado</th>
          </tfoot>
        </table>
      </div>

      <div  class="modal fade" data-backdrop="static"  id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1" style="overflow-y: scroll;" >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header modal-header-success" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="panel-title" id="modalTitle">Nuevo Despacho</h4>
            </div>

            <div class="modal-body">

              <div class="row">
                <div class="col-md-12 box-header with-border">
                  <h2 class="box-title">Guia de Despacho</h2>
                  <input type="hidden" id="id_salida">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo Documento</label>
                    <select class='form-control' onchange="load_series()"  id='id_tipo_documento'  >
                    </select>
                  </div>
                </div>
                <div class="col-md-1 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Serie </label>
                    <input readonly="" type="text" class="form-control" id="serie_documento" placeholder="Serie">
                  </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numero</label>
                    <input readonly="" type="text" class="form-control" id="numero_documento" placeholder="Nro Documento">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">

                    <label for="exampleInputPassword1">Fecha Salida</label>
                    <div class="input-group date">

                      <input type="text" class="form-control pull-right" id="fecha_salida" placeholder="dd/mm/aaaa"  >
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>

                  </div>
                </div>  

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Empresa</label>
                    <select class='form-control'  id='id_empresa' onchange="listLocales('');listLocalesIng('');"  >
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Area Destino</label>
                    <select class='form-control'  id='id_local_ingreso'  >
                      <option value='' selected>--Seleccione Area--</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Persona Traslado</label>
                    <select class='form-control'  id='id_persona_traslado'  >
                    </select>
                  </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Motivo de Salida</label>
                    <select class='form-control'  id='id_motivo_salida'  >
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="numero_requerimiento">N° Requer </label>
                    <input type="hidden" id="id_requerimiento">
                    <input readonly="" type="text" class="form-control" id="numero_requerimiento" placeholder="Numero Req">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea  class="form-control" rows="2" id="observaciones" placeholder="Observaciones"></textarea>
                  </div>  
                </div>  

              </div>
              <div class="row" id="row_btn_item">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group" >
                    <!--<button type="button" class="btn btn-success btn-sm" onclick="addRow();">Agregar Item</button>-->
                    <button type="button" class="btn btn-success btn-sm" onclick="open_item();">Agregar Item</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row" id="row_tbl_detalle">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <table  id="tblDet" class="table table-sm table-striped table-bordered table-hover table-responsive ">
                    <thead>
                      <tr class="v-grid-header">
                        <th >Accion</th>
                        <th >Descripcion del Item</th>
                        <th>Unidad Medida</th>
                        <th>Factor</th>
                        <th>Lote</th>
                        <th>Fecha Vto</th>
                        <th>Cantidad</th>
                        <th style="width: 1px; display:none"></th>
                        <th style="width: 1px; display:none">Marca</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
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


      <!--Fin centro -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!--Modal Select Requerimiento-->

 <div data-toggle="modal" class="modal fade" data-backdrop="static"  id="modalListReq"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1" >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header modal-header-success" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="panel-title" id="modalTitle">Listado de Requerimientos</h4>
            </div>

            <div class="modal-body">

              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">


                  <table id="tblrequerimientos" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
                    <thead class="v-grid-header">
                      <th></th>
                      <th>Acciones</th>
                      <th>Empresa</th>
                      <th>Area Solicitante</th>
                      <th>Fecha</th>
                      <th>Numero</th>
                      <th>Personal Solicita</th> 
                      <th>Fecha Aut</th>          
                      <th>Atendido</th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th>Acciones</th>
                      <th>Empresa</th>
                      <th>Area Solicitante</th>
                      <th>Fecha</th>
                      <th>Numero</th>
                      <th>Personal Solicita</th>
                      <th>Fecha Aut</th>          
                      <th>Atendido</th>
                    </tfoot>
                  </table>

                </div>

              </div>
               

            </div>
            <div class="modal-footer">
             <!--<button type="button" onclick="save();" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>-->
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>
            </div>
          </div>
        </div>
  </div>




<!---Fin de modal --->

<div class="modal fade" id="modalItem" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" tabindex="-1">

  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-success" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalItemTitle">Seleccione Item</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="exampleInputPassword1">Item</label>
              <input type="hidden" id="maneja_lote">
              <select  class='form-control select2 itemName text-uppercase' name='id_item' id='id_item' style="width: 100%;" >
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >Categoria</label>
              <input type="text" class="form-control" id="categoria" readonly="" placeholder="Categoria">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >Marca</label>
              <input type="text" class="form-control" id="marca" readonly="" placeholder="Marca">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >U.M. Compra</label>
              <input type="text" class="form-control" id="unidad_medida_compra" readonly="" placeholder="Unidad Medida">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >Factor</label>
              <input type="text" class="form-control" id="factor" readonly="" placeholder="Factor">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >Lote </label><button data-toggle="tooltip" title="Ver lotes" onclick="open_lotes();" class="btn btn-link btn-xs " ><i class="fa fa-table text-success"></i></button>
              <input type="hidden" class="form-control" id="idlote" readonly="" >
              <input type="text" class="form-control" id="numero_lote" readonly="" placeholder="Lote">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >Vencimiento</label>
              <input type="text" class="form-control" id="fecha_vencimiento" readonly="" placeholder="Vencimiento">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group has-success has-feedback">
              <label >Stock Actual</label>
              <input type="text" class="form-control text-right text-success" id="stock_actual" readonly="" placeholder="Stock Actual">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label >Cantidad</label>
              <input type="text" class="form-control" id="cantidad" placeholder="Cantidad">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="addEditRow();" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modalLotes"  role="dialog" aria-labelledby="modalItem" aria-hidden="true" >
  <div class="modal-dialog modal-md" role="document">
    <div class="panel panel-success">
      <div class="panel-heading " >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalItemTitle">Seleccione Lote</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <!--<ul class="list-group ">-->
                <div id="result" class="form-group"></div>
              <!--</ul>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group has-success has-feedback">
              <label for="exampleInputPassword1">Nro de Lote</label>
              <input type="hidden" class="form-control" id="mo_id_numero_lote">
              <input type="text" class="form-control" id="mo_numero_lote" readonly placeholder="Nro de Lote">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group has-success has-feedback">
              <label for="exampleInputPassword1">Vencimiento</label>
              <input type="text" class="form-control" id="mo_vencimiento" readonly placeholder="Vencimiento">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group has-success has-feedback">
              <label for="exampleInputPassword1">Stock Actual</label>
              <input type="text" class="form-control text-success" id="mo_stock_actual" readonly placeholder="Stock Actual">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <!--<button type="button" onclick="closeLotes();" class="btn btn-success"><i class="fa fa-plus"></i> Seleccionar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cerrar</button>-->
      </div>
    </div>
  </div>
</div>


<!-- Modal Descarga -->


<div class="modal fade" id="modalFilter" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" tabindex="-1">

  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content">

      <div class="modal-header modal-header-success" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="panel-title" id="modalItemTitle">Criterios</h4>
        <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a>
      </div>



      <div class="modal-body">



        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label >Desde</label>
              <div class="input-group date">

                <input type="text" class="form-control pull-right" id="fecha_desde" placeholder="dd/mm/aaaa" >
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label >Hasta</label>
              <div class="input-group date">

                <input type="text" class="form-control pull-right" id="fecha_hasta" placeholder="dd/mm/aaaa" >
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
              </div>

            </div>
          </div>


        </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="descargarSalidas();" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

      </div>
    </div>
  </div>
</div>          





<!--Fin-Contenido-->
<?php

require 'footer.php';
?>
<script type="text/javascript" src="scripts/salidas.js?rnd=<? echo rand(); ?>"></script>
<script type="text/javascript" src="../public/js/mustache.min.js"></script>

<script>
var rIndex;
var editItem;
var tblReq;
var hoy="<?=date('d/m/Y');?>";
var tabled = document.getElementById('tblDet').getElementsByTagName('tbody')[0]; //document.getElementById("tblDet");


//$('.modal-dialog').draggable();


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



  //$("#id_item").select2('open');  
  //var $search = $('#id_item').data('select2').dropdown.$search
  //$search.val($("#"+r+" #td_id_item").html());
  //$search.trigger('keyup');


  $('#id_item').append("<option value='"+$("#"+r+" #td_id_item").html()+"' selected='selected'>"+$("#"+r+" #td_nombre_item").html()+"</option>");
  
  //$search.trigger('keyup');  

  $("#id_item").trigger('change');

  $("#unidad_medida_compra").val($("#"+r+" #td_unidad_medida").html());
  $("#marca").val($("#"+r+" #td_marca").html());
  $("#factor").val($("#"+r+" #td_factor").html());
  $("#cantidad").val($("#"+r+" #td_cantidad").html());
  $("#costo_umc").val($("#"+r+" #td_costo_umc").html());
  $("#numero_lote").val($("#"+r+" #td_numero_lote").html());
  $("#fecha_vencimiento").val($("#"+r+" #td_fecha_vencimiento").html());

  if ($("#numero_requerimiento").val()==''){
      $("#cantidad").prop('disabled', false);
  }else{
     //$("#cantidad").prop('disabled', true);
  }

  $('#modalItem').modal('show');
}
function  delRow(row){

  //table.deleteRow(row);
  bootbox.confirm({
    title: "Mensaje",
    message: "Esta seguro de quitar el item?",
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
        $("#"+row).remove();
      }
    }
  });
}

function addEditRow(){
  msj='';
  if ($("#cantidad").val()==''){
    msj="Ingrese cantidad";
  }
  
  if (parseInt($("#cantidad").val())>parseInt($("#stock_actual").val())){
    bootbox.alert("Cantidad no puede ser mayor que el stock");
    return false;
  }
  
  if ($("#maneja_lote").val()=='1'){
    if ($("#numero_lote").val()==''){
        bootbox.alert("Este item maneja lotes, seleccione uno previamente");
        return false;
    }
  }

  /*if ($("#costo_umc").val()==''){
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
  if (msj){
    bootbox.alert(msj);
    return false;
  }
  if (editItem==false){
    addRow();
    //alert('ins');return false;
    //alert(editItem);
  }else{
    //alert('upd');
    //alert(editItem);
    //Evaluamos si ID Salida tiene un valor
    //alert($("#id_salida").val());
    if ($("#id_salida").val()!=''){
      //Guardando cambios///
          if (newItem==true){
              act='I';
              msj="Esta seguro de agregar el item a la guia de Despacho?";
          }else{
              msj="Esta seguro de actualizar el item?";
              act='U';
          }
          bootbox.confirm({
            title: "Mensaje",
            message: msj,
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
        //Grabar
        //var formData = new FormData($("#frmestablecimiento")[0]);
        var parametros = {
          "accion":act,
          "id_salida":$('#id_salida').val(),
          "id_lote":$('#idlote').val(),
          "numero_lote":$('#numero_lote').val().toUpperCase(),
          "fecha_vencimiento": $('#fecha_vencimiento').val(),
          "cantidad": $('#cantidad').val(),
          //"costo_umc": $('#costo_umc').val(),
          "factor": $('#factor').val(),
          "id_item": $("#id_item option:selected").val()
        };
            $.ajax({
              url: "../ajax/salidas.php?op=updateInsertItem",
              type: "POST",
              data: parametros,
              success: function(msg)
              {
                var amsg=msg.split('|');
                var nerror=amsg[0];
                if (nerror=='0'){
                  bootbox.alert('Ocurrio un error: '+amsg[1]);
                }else if (nerror=='1'){
                  $('#modalItem').modal('toggle');
                  update_child($("#id_salida").val());
                  bootbox.alert('Registro guardado');
                }else{
                  bootbox.alert('Ocurrio un error: '+msg);
                }
              }
            });

          }
    }
  });
      /////////////////////
}else{
    

      $("#"+rIndex+" #td_cantidad").html($("#cantidad").val());
      $("#"+rIndex+" #td_idlote").html($("#idlote").val());
      $("#"+rIndex+" #td_numero_lote").html($("#numero_lote").val());
      $("#"+rIndex+" #td_fecha_vencimiento").html($("#fecha_vencimiento").val());
      $("#"+rIndex+" #td_costo_umc").html($("#costo_umc").val());
      $("#"+rIndex+" #td_costo_total").html($("#costo_total").val());
      $("#"+rIndex+" #td_id_item").html($("#id_item option:selected").val());
      $("#"+rIndex+" #td_nombre_item").html($('#id_item').select2('data')[0]['text']);
      $("#"+rIndex+" #td_unidad_medida").html($("#unidad_medida_compra").val());

      $('#modalItem').modal('toggle');
    }
  }
}


function addRow(){
  //alert($("#id_item").val());
  if($("#id_item").val()=='' || $("#id_item").val()==null){
    bootbox.alert("Selecciona un Item");
    return false;
  }
  if($("#idlote").val()!=''){
    if($("#cantidad").val()==''||$("#cantidad").val()=='0'){bootbox.alert("Ingresa una cantidad valida...");$("#cantidad").focus();return false;}
    if( Number($("#cantidad").val()>Number($("#stock_actual").val()))){bootbox.alert("Cantidad no puede ser mayor al Stock Actual...");$("#cantidad").focus();return false;}
  }




  //$("#numero_lote").val($("#mo_numero_lote").val());
  //$("#fecha_vencimiento").val($("#mo_vencimiento").val());
  //$("#stock_actual").val($("#mo_stock_actual").val());

  idRow="tr"+$("#id_item option:selected").val();
  if (document.getElementById(idRow)){
    bootbox.alert("Item ya se agrego en el detalle");
    return false;
  }
  //$('#modalItem').modal('toggle');
  r = tabled.rows.length;
  var newRow = tabled.insertRow(r);

  newRow.id=idRow;
  cell1 = newRow.insertCell(0),
  cell2 = newRow.insertCell(1),
  cell3 = newRow.insertCell(2),
  cell4 = newRow.insertCell(3),
  cell5 = newRow.insertCell(4),
  cell6 = newRow.insertCell(5),
  cell7 = newRow.insertCell(6),
  cell8 = newRow.insertCell(7);
  cell9 = newRow.insertCell(8);
  cell10 = newRow.insertCell(9);


  cell1.innerHTML = "<button class='btn btn-link btn-xs' onclick='editRow(\""+idRow+"\")'><i class='fa fa-pencil'></i></button><button class='btn btn-link btn-xs' onclick='delRow(\""+idRow+"\");'><i class='fa fa-close'></i></button>";

  cell2.innerHTML = $('#id_item').select2('data')[0]['text'];
  cell2.id="td_nombre_item";

  cell3.innerHTML = $("#unidad_medida_compra").val();
  cell3.id="td_unidad_medida";

  cell4.innerHTML = $("#factor").val();
  cell4.id="td_factor";

  cell5.innerHTML = $("#numero_lote").val();
  cell5.id="td_numero_lote";

  cell6.innerHTML = $("#fecha_vencimiento").val();
  cell6.id="td_fecha_vencimiento";

  cell7.innerHTML = $("#cantidad").val();
  cell7.id="td_cantidad";

  cell8.innerHTML = $("#id_item option:selected").val();
  cell8.id="td_id_item";
  cell8.style.display ='none';

  cell9.innerHTML = $("#marca").val();
  cell9.id="td_marca";
  cell9.style.display ='none';

  cell10.innerHTML = $("#idlote").val();
  cell10.id="td_idlote";
  cell10.style.display ='none';

  // call the function to set the event to the new row
  //selectedRowToInput();
  //$('#modalLotes').modal('toggle');
  $('#modalItem').modal('toggle');
}

function ver(){
  $('#row_btn_item').show();
  $('#row_tbl_detalle').show();
  limpiar();
  $("#fecha_salida").val(hoy);
  $("#id_salida").val("");

  load_series();
  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

function save(){
  if ($("#id_tipo_documento").val()==''){
    bootbox.alert('Seleccione tipo de documento');
    $("#id_tipo_documento").focus();
    return false;
  }
  if ($("#serie_documento").val()==''){
    bootbox.alert('No se cargo serie del documento');
    //$("#serie_documento").focus();
    return false;
  }
  if ($("#numero_documento").val()==''){
    bootbox.alert('No se cargo numero del documento');
    //$("#numero_documento").focus();
    return false;
  }
  if ($("#id_empresa").val()==''){
    bootbox.alert('Seleccione un Empresa');
    $("#id_empresa").focus();
    return false;
  }
  /*if ($("#id_local_salida").val()==''){
    bootbox.alert('Seleccione un local de Salida');
    $("#id_local_salida").focus();
    return false;
  }*/
  if ($("#id_local_ingreso").val()==''){
    bootbox.alert('Seleccione un local de Ingreso');
    $("#id_local_ingreso").focus();
    return false;
  }
  if ($("#id_persona_traslado").val()==''){
    bootbox.alert('Seleccione Personal de Traslado');
    $("#id_persona_traslado").focus();
    return false;
  }
  if ($("#id_motivo_salida").val()==''){
    bootbox.alert('Seleccione Motivo de Salida');
    $("#id_motivo_salida").focus();
    return false;
  }
  

  r = tabled.rows.length;

  if ($("#id_salida").val()==''){
    if (r<=0){
       bootbox.alert('No existen items en el detalle');
       return false;
    }
  }

  var aDetail= [];
  //var table = document.getElementById('tblEstudios');
  var rowCount = tabled.rows.length;
  //Validando
   for(var i=0; i<rowCount; i++) {
      var row = tabled.rows[i];    
      if (row.cells[7].innerHTML==''){
          bootbox.alert('Existe uno o mas insumos por seleccionar en el detalle revisar');
          return false;
      }
   }   



  for(var i=0; i<rowCount; i++) {
    var row = tabled.rows[i];    
    aDetail.push({
      id_item :  row.cells[7].innerHTML,
      factor :  row.cells[3].innerHTML,
      cantidad :  row.cells[6].innerHTML,
      numero_lote :  row.cells[4].innerHTML,
      fecha_vencimiento :  row.cells[5].innerHTML,
      idlote :  row.cells[9].innerHTML
    });
  }

  

  //alert(aDetail);
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
        $op=($("#id_salida").val()=='')?'saveSalida':'updateSalida';
        $.ajax({
          type: "POST",
          url: "../ajax/salidas.php?op="+$op,
          //dataType: "json",
          //data: JSON.stringify({ paramName: info }),
          data : {
            id_salida: $("#id_salida").val(),
            id_tipo_documento: $("#id_tipo_documento").val(),
            serie_documento: $("#serie_documento").val(),
            numero_documento: $("#numero_documento").val(),
            fecha_salida: $("#fecha_salida").val(),
            id_local_ingreso: $("#id_local_ingreso").val(),
            id_persona_traslado: $("#id_persona_traslado").val(),
            id_motivo_salida: $("#id_motivo_salida").val(),
            observaciones: $("#observaciones").val(),
            id_requerimiento: $("#id_requerimiento").val(),
            detalle: aDetail
          },
          success: function(msg){
            table.ajax.reload();
            
            var amsg=msg.split('|');
            var nerror=amsg[0];
            if (nerror=='0'){
              bootbox.alert('Ocurrio un error: '+amsg[1]); 
            }else{

              $('#modalNew').modal('toggle');
              bootbox.alert('Registro guardado');  
            }
          }
        });

      }
    }

  });


}


function open_new_item(id_salida,id_empresa){
      limpiar_modal_items();
      editItem=true;
      newItem=true;
      $("#id_empresa").val(id_empresa);
      $("#id_salida").val(id_salida);
      $('#modalItemTitle').html('Nuevo Item');
      $('#id_item').select2('enable');
      $('#modalItem').modal('show');
}

function open_item(){
  //if ($("#id_local_salida").val()==''){
  //  bootbox.alert("Seleccione un local antes de agregar los itemsss");
  //}else{
    limpiar_modal_items();
    $('#id_item').select2('enable');
    $("#cantidad").prop('disabled', false);
    $('#modalItem').modal('show');
  //}
}


$(function () {

   $('#fecha_salida').daterangepicker({

       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });

  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass   : 'iradio_flat-green'
  })
  $(".select2").select2();
  $('.itemName').select2({

    placeholder: "Seleccione",
    language: {
      inputTooShort: function () {
        return 'digita Item.';
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
      results: function (data, page) { // parse the results into the format expected by Select2.
        // since we are using custom formatting functions we do not need to alter remote JSON data
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
    /*PARA QUE EL BUSCADOR DEL SELECT FUNCIONE EN EL MODAL*/
    dropdownParent: $("#modalItem"),
    escapeMarkup: function (markup) {
      return markup;
    }, // let our custom formatter work
    minimumInputLength: 2,
    //templateResult: formatRepo, // omitted for brevity, see the source of this page
    //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  }).on('change', function (e) {
    //console.log("select");
    //alert($(this).val());
    var id_item = $("#id_item option:selected").val();
    $.post("../ajax/items.php?op=mostrar",{id_item : id_item}, function(data, status){
      data = JSON.parse(data);
      // $("#direccion").val(data.direccion);
      // $("#ruc").val(data.ruc);
      $("#categoria").val(data.categoria);
      $("#marca").val(data.marca);
      $("#stock_actual").val(data.stock_real);
      $("#unidad_medida_compra").val(data.unidad_medida_ingreso);
      $("#factor").val(data.factor);
      $("#maneja_lote").val(data.maneja_lote);
      if(data.maneja_lote=='1'){
        $('#modalLotes').modal('show');
        $("#mo_numero_lote").val('');
        $("#mo_vencimiento").val('');
        $("#mo_stock_actual").val('');
        $("#mo_id_numero_lote").val('');
      }
      loadlotes(data.id);
      /*
      if (data.maneja_lote=='1'){
      $("#maneja_lotes").iCheck('check');
      $("#numero_lote").prop('disabled', false);
      $("#fecha_vencimiento").prop('disabled', false);
    }else{
    $("#maneja_lotes").iCheck('uncheck')
    $("#numero_lote").prop('disabled', true);
    $("#fecha_vencimiento").prop('disabled', true);
  }
  */
  $("#cantidad").focus();
});
});

/*$('.select2').on('change', function (evt) {
if ($('.select2').select2('val') != null){
alert($('.select2').select2('data')[0]);
}
});*/

$('.select2').on('change', function() {
  var data = $(".select2 option:selected").val();
  //alert(data);
})

$('#modalNew').on('shown.bs.modal', function () {
  $('#nombre').focus();
})

/*$("#ubigeo").select2({
dropdownParent: $('#modalNew .modal-body')
});*/

$.getJSON('../ajax/empresa.php?op=list', function(data) {
  var template = $('#tpl_empresas').html();
  var html = Mustache.to_html(template, data);
  $('#id_empresa').html(html);
});

/*$.getJSON('../ajax/empresa.php?op=list', function(data) {
var template = $('#tpl_empresas').html();
var html = Mustache.to_html(template, data);
$('#id_local_ingreso').html(html);
});
*/
$.getJSON('../ajax/tabla.php?op=list&id_tabla=2&ids=4', function(data) {
  var template = $('#tpl_tipos_documento').html();
  var html = Mustache.to_html(template, data);
  $('#id_tipo_documento').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=13', function(data) {
  var template = $('#tpl_moneda').html();
  var html = Mustache.to_html(template, data);
  $('#id_moneda').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=3', function(data) {
  var template = $('#tpl_forma_pago').html();
  var html = Mustache.to_html(template, data);
  $('#id_forma_pago').html(html);
});

$.getJSON('../ajax/persona.php?op=list', function(data) {
  var template = $('#tpl_lista_pesona').html();
  var html = Mustache.to_html(template, data);
  $('#id_persona_traslado').html(html);
});

$.getJSON('../ajax/tabla.php?op=list&id_tabla=9', function(data) {
  var template = $('#tpl_motivo_salida').html();
  var html = Mustache.to_html(template, data);
  $('#id_motivo_salida').html(html);
});




$('#fecha_compra').datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true
});

});

function open_lotes(){
  
  $("#mo_numero_lote").val('');
  $("#mo_vencimiento").val('');
  $("#mo_stock_actual").val('');
  $("#mo_id_numero_lote").val('');
  loadlotes($("#id_item option:selected").val());
  $('#modalLotes').modal('show');
}
function loadlotes(id_item)
{
  $.getJSON('../ajax/lotes.php?op=selected&id_itemp='+id_item, function(data) {
    var template = $('#tpl_lotes').html();
    var html = Mustache.to_html(template, data);
    $('#result').html(html);
  });

}

function listLocales(id_selected){

  $.getJSON('../ajax/empresa.php?op=listLocales&id_selected='+id_selected+'&id_empresa='+$("#id_empresa").val(), function(data) {
    var template = $('#tpl_locales').html();
    var html = Mustache.to_html(template, data);
    $('#id_local_salida').html(html);
    //$('#id_local_ingreso').html(html);
  });
}


function listLocalesIng(id_selected){

  $.getJSON('../ajax/empresa.php?op=listLocales&id_selected='+id_selected+'&id_empresa='+$("#id_empresa").val(), function(data) {
    var template = $('#tpl_localesIng').html();
    var html = Mustache.to_html(template, data);
    //$('#id_local_salida').html(html);
    $('#id_local_ingreso').html(html);
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
<script id="tpl_forma_pago" type="text/template"><option value='' selected>--Seleccione Forma--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_lista_pesona" type="text/template"><option value='' selected>--Seleccione Persona--</option>
  {{#personas}}<option value='{{id}}'>{{nombre}}</option>{{/personas}}
</script>
<script id="tpl_motivo_salida" type="text/template"><option value='' selected>--Seleccione Motivo--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_locales" type="text/template"><option value='' selected>--Seleccione Local--</option>
  {{#locales}}<option value='{{id}}' {{ selected }}>{{nombre}}</option>{{/locales}}
</script>

<script id="tpl_localesIng" type="text/template"><option value='' selected>--Seleccione Local--</option>
  {{#locales}}<option value='{{id}}' {{ selected }}>{{nombre}}</option>{{/locales}}
</script>

<script id="tpl_lotes" type="text/template">
 {{#lotes}}
  <a id="id_item_{{idlote}}" href="#" class="list-group-item list-group-item-action list-group-item-primary" onclick="selectitem('{{idlote}}','{{id}}','{{nombre}}','{{vencimiento}}','{{actual}}')">
    {{nombre}} - {{vencimiento}} - {{inicial}}
    <span   class="badge badge-primary badge-pill">{{actual}}</span>
  </a>
  
  {{/lotes}}
</script>

<?php
//}
ob_end_flush();
?>
