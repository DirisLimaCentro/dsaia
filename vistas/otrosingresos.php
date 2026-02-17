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

  //if ($_SESSION['almacen']==0)
  //{
    ?>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">

  </style>
    <div class="right_col" role="main">
      <!-- Main content -->
      <!--<section class="content">-->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

              <div class="x_title">
                <h2>Otros ingresos <small></small></h2>
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

                <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
                  <thead>
                    <tr class="v-grid-header">
                    <th></th>
                    <th>Acciones</th>
                    <th>Empresa</th>
                    <th>Local</th>
                    <th>Tipo Documento</th>
                    <th>Serie</th>
                    <th>N° Documento</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th></th>
                    <th>Acciones</th>
                    <th>Empresa</th>
                    <th>Local</th>
                    <th>Tipo Documento</th>
                    <th>Serie</th>
                    <th>N° Documento</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                  </tr>
                  </tfoot>
                </table>



              </div>



              <div data-toggle="modal" class="modal fade" data-backdrop="static" style="overflow-y: scroll;" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1" >
                <div class="modal-dialog modal-lg" role="document">



                  <div class="modal-content">


                   <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalTitle">Nuevo Ingreso</h4>
                    </div>

                    <div class="modal-body">

                              <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12 box-header with-border">
                                    <h2 class="box-title">Datos del Comprobante</h2>
                                    <input type="hidden" id="id_ingreso">
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Empresa</label>
                                      <select class='form-control'  id='id_empresa' onchange="listLocales('');"  >
                                      </select>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Local</label>
                                      <select class='form-control'  id='id_local'  >
                                        <option value='' selected>--Seleccione Local--</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Fecha Creacion</label>
                                    <input type="text" readonly="" class="form-control" id="fecha_creacion" placeholder="Fecha Creacion">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Usuario Registro</label>
                                    <input type="text" readonly="" class="form-control" id="usuario_creacion" placeholder="Usuario">
                                  </div>
                                </div>

                              </div>

                              <div class="row">

                                <div class="col-md-2 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo Documento</label>
                                      <select class='form-control'  id='id_tipo_documento' onchange="load_series()" >
                                      </select>
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Serie Documento</label>
                                    <input type="text" class="form-control" id="serie_documento" value="001" placeholder="Serie">
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Numero Documento</label>
                                    <input type="text" class="form-control" id="numero_documento" placeholder="Nro Documento">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">

                                    <label for="exampleInputPassword1">Fecha Ingreso</label>
                                    <div class="input-group date">

                                      <input type="text" class="form-control pull-right" id="fecha_compra" placeholder="dd/mm/aaaa" >
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Motivo</label>
                                    <select class='form-control'  id='id_motivo'  >
                                      </select>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Observaciones</label>
                                    <input type="text" class="form-control" id="observacion" placeholder="Observaciones">
                                  </div>
                                </div>


                              </div>


                            <!--<div class="row">
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Tipo de Cambio</label>
                                  <input type="text" class="form-control" id="tipo_cambio" placeholder="Tasa de Cambio">
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">% IGV</label>
                                  <input type="text" class="form-control" id="porcentaje_igv" placeholder="% IGV">
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Numero Guia</label>
                                  <input type="text" class="form-control" id="numero_guia" placeholder="N° de Guia">
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group has-success">
                                  <label for="exampleInputPassword1">Orden de Compra</label>
                                  <input type="hidden" id="id_orden_compra">
                                  <input type="text" class="form-control" id="nro_orden_compra" placeholder="Orden de Compra" disabled="">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Observaciones</label>
                                  <input type="text" class="form-control" id="observacion" placeholder="Observaciones">
                                </div>
                              </div>

                            </div>-->

                           <!-- <div class="row">
                              <div class="col-md-12 box-header with-border">
                                <h2 class="box-title">Datos del Proveedor <button type="button" class="btn btn-info btn-sm"><i class="fa fa-user"></i> Nuevo</button></h2>
                              </div>
                            </div>-->

                           <!-- <div class="row">

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Razon Social</label>
                                  <select  class='form-control input-sm select2 itemNamedist text-uppercase' name='razon_social' id='razon_social' style="width: 100%;" >
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">RUC</label>
                                  <input type="text" class="form-control" id="ruc" readonly="" placeholder="RUC">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Direccion</label>
                                  <input type="text" class="form-control" id="direccion" readonly="" placeholder="Direccion">
                                </div>
                              </div>


                            </div>-->


                            <div class="row" id="row_btn_item">
                              <div class="col-md-12 ">
                                <div class="form-group">
                                  <button type="button" class="btn btn-success btn-sm" onclick="open_item();"><i class="fa fa-plus"></i> Nuevo item</button>
                                </div>
                              </div>
                            </div>


                          <div class="row" id="row_tbl_detalle">

                            <div class="col-md-12 col-sm-12 col-xs-12">


                                <table  id="tblDet" class="table table-sm table-striped table-bordered table-hover table-responsive ">
                                    <thead >
                                      <tr class="v-grid-header">
                                        <th>Accion</th>
                                        <th>Descripcion del Item</th>
                                        <th>Unidad Medida</th>
                                        <th>Factor</th>
                                        <th>Lote</th>
                                        <th>Fecha Vto</th>
                                        <th>Cantidad</th>
                                        <th>Costo Unitario</th>
                                        <th>Sub-Total</th>
                                        <th style="width: 1px; display:none "></th>
                                        <th style="width: 1px; display:none ">Marca</th>
                                      </tr>
                                    </thead>
                                    <tbody >

                                    </tbody>
                                    <tfoot>
                                      <!--<tr class="v-grid-header">
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Sub-Total:</strong></td>
                                            <td id="td_subtotal" class="text-right ">0.00</td>
                                            <td class="text-right "><strong>I.G.V.:</strong></td>
                                            <td id="td_igv" class="text-right ">0.00</td>
                                            <td class="text-right "><strong>Total:</strong></td>
                                            <td id="td_total" class="text-right">0.00</td>

                                        </tr>-->
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




              <!-- Form Item-->
              <div class="modal fade" id="modalItem" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" tabindex="-1">

                <div class="modal-dialog modal-md" role="document">


                  <div class="modal-content">

                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalItemTitle">Seleccione Item</h4>
                    </div>



                    <div class="modal-body">


                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Descripcion del Item</label>
                            <select  class='form-control input-sm select2 itemNamedist text-uppercase' name='id_item' id='id_item' style="width: 100%;" >
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">

                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Categoria</label>
                                  <input type="text" class="form-control" id="categoria" readonly="" placeholder="Categoria">
                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Marca</label>
                                  <input type="text" class="form-control" id="marca" readonly="" placeholder="Marca">
                                </div>
                          </div>


                      </div>

                      <div class="row">

                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Unidad Medida Compra</label>
                                  <input type="text" class="form-control" id="unidad_medida_compra" readonly="" placeholder="Unidad Medida">
                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Factor</label>
                                  <input type="text" class="form-control" id="factor" readonly="" placeholder="Factor">
                                </div>
                          </div>

                      </div>

                       <div class="row">

                          <div class="col-md-3">
                              <div class="form-group  has-success has-feedback">
                                  <label >Cantidad UMC</label>
                                  <input type="text" class="form-control" id="cantidad"  placeholder="0"  onBlur="ContarUnidades();">
                                </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label >Unidades</label>
                                  <input type="text" class="form-control" id="unidades" readonly="" placeholder="0">
                                </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group has-warning has-feedback">
                                  <label >Costo UMC</label>
                                  <input onblur="calcular();" type="text" class="form-control" id="costo_umc"  placeholder="0.00">
                                </div>
                          </div>

                          <div class="col-md-3">
                              <div class="form-group  ">
                                  <label >Costo Unidad</label>
                                  <input type="text" class="form-control" id="costo_unidad" readonly=""  placeholder="0.00">
                                </div>
                          </div>

                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">

                              <label>
                                <input disabled="" type="checkbox" class="flat-red"  id="maneja_lotes"> Maneja Lotes
                              </label>

                          </div>
                        </div>
                        <div class="col-md-3">
                          <label >Total:</label>
                        </div>
                        <div class="col-md-3">
                              <div class="form-group ">
                                  <input type="text" class="form-control" id="costo_total" readonly=""  placeholder="0.00">
                                </div>
                          </div>
                      </div>

                       <div class="row">
                          <div class="col-md-6">
                           <div class="form-group">
                            <label >Numero de Lote</label>
                            <input type="hidden" id="id_lote" >
                            <input type="text" class="form-control" id="numero_lote" disabled="" placeholder="">
                          </div>
                        </div>

                        <div class="col-md-6">
                         <div class="form-group">
                          <label >Fecha de Vencimiento</label>
                          <div class="input-group date">

                            <input disabled="" type="text" class="form-control pull-right" id="fecha_vencimiento" placeholder="dd/mm/aaaa" >
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
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


              <!--Form busca Orden de Compra-->

              <div class="modal fade" id="modalOrdenCompra" data-backdrop="static" role="dialog" aria-labelledby="modalItem" aria-hidden="true" tabindex="-1">

                <div class="modal-dialog modal-md" role="document">


                  <div class="modal-content">

                    <div class="modal-header modal-header-success" >
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="panel-title" id="modalItemTitle">Busca Orden de Compra</h4>
                    </div>



                    <div class="modal-body">


                     
                      <div class="row">

                          <div class="col-md-8">
                              <div class="form-group">
                                  <label >Empresa</label>
                                  
                                  <select class='form-control'  id='moc_id_empresa'  >
                                      </select>  


                                </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label >Numero Orden</label>
                                  <input type="text" class="form-control" id="mod_oc" placeholder="N° Orden">
                                </div>
                          </div>


                      </div>

                      


                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="buscarOrdenCompra();" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>

                    </div>
                  </div>
                </div>
              </div>



              <!--Fin formulario orden-->

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



  <script type="text/javascript" src="scripts/otrosingresos.js?rnd=<? echo rand(); ?>"></script>
  <script type="text/javascript" src="../public/js/mustache.min.js"></script>

  <script>
    var rIndex;
    var editItem;
    var newItem;

    var tabled = document.getElementById('tblDet').getElementsByTagName('tbody')[0]; //document.getElementById("tblDet");
    function load_series(){
      var parametros = {"id_tipo_documento":$("#id_tipo_documento").val()};
        $.ajax({
          url: '../ajax/otrosingresos.php?op=loadSerie',
          data: parametros,
          dataType: 'html',
          success: function(json) {
          //div.html(json).removeClass('loading');
          $("#serie_documento").val(json);
          load_last_number();
        }
      });
    }


    function load_last_number(){
      var parametros = {"id_tipo_documento":$("#id_tipo_documento").val(),
      "serie_documento":$("#serie_documento").val()
    };
    $.ajax({
      url: '../ajax/otrosingresos.php?op=getLastNumber',
      data: parametros,
      dataType: 'html',
      success: function(json) {
          //div.html(json).removeClass('loading');
          $("#numero_documento").val(json);
          
        }
      });
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
            //calculoTotal();


          }
        }
      });


    }
    function addEditRow(){
      msj='';
      if ($("#cantidad").val()==''){
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
      }
      if (msj){
        bootbox.alert(msj);
        return false;
      }
      if (editItem==false){
        addRow();
      }else{

              //Evaluamos si ID Ingreso tiene un valor
              if ($("#id_ingreso").val()!=''){
                //Guardando cambios///
                    if (newItem==true){
                        act='I';
                        msj="Esta seguro de agregar el item al registro?";
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
                    "id_ingreso":$('#id_ingreso').val(),
                    "id_lote":$('#id_lote').val(),
                    "numero_lote":$('#numero_lote').val().toUpperCase(),
                    "fecha_vencimiento": $('#fecha_vencimiento').val(),
                    "cantidad": $('#cantidad').val(),
                    "costo_umc": $('#costo_umc').val(),
                    "factor": $('#factor').val(),
                    "id_item": $("#id_item option:selected").val()
                  };


                  $.ajax({
                    url: "../ajax/compra.php?op=updateInsertItem",
                    type: "POST",
                    data: parametros,
                    //contentType: false,
                    //processData: false,

                    success: function(msg)
                    {

                      //mostrarform(false);
                      //$('#modalLocal').modal('toggle')
                      //update_child($('#id_empresa_local').val());
                      //bootbox.alert(datos);

                      //table.ajax.reload();
                      var amsg=msg.split('|');
                      var nerror=amsg[0];
                      if (nerror=='0'){
                        bootbox.alert('Ocurrio un error: '+amsg[1]);
                      }else if (nerror=='1'){
                        $('#modalItem').modal('toggle');
                        update_child($("#id_ingreso").val());
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
          $("#"+rIndex+" #td_numero_lote").html($("#numero_lote").val());
          $("#"+rIndex+" #td_fecha_vencimiento").html($("#fecha_vencimiento").val());
          $("#"+rIndex+" #td_costo_umc").html($("#costo_umc").val());
          $("#"+rIndex+" #td_costo_total").html($("#costo_total").val());
          //calculoTotal();

          $('#modalItem').modal('toggle');

        }



      }
    }

    function addRow(){

      if ($("#id_item option:selected").val()==null){
        bootbox.alert("Seleccione un item");
        return false;
      }


      idRow="tr"+$("#id_item option:selected").val();

      if (document.getElementById(idRow)){
          bootbox.alert("Item ya se agrego en el detalle");
          return false;
      }

      $('#modalItem').modal('toggle');

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
      cell11 = newRow.insertCell(10);

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

      cell8.innerHTML = $("#costo_umc").val();
      cell8.id="td_costo_umc";

      cell9.innerHTML = $("#costo_total").val();
      cell9.id="td_costo_total";
      cell9.className  ='text-right';

      cell10.innerHTML = $("#id_item option:selected").val();
      cell10.id="td_id_item";
      cell10.style.display ='none';

      cell11.innerHTML = $("#marca").val();
      cell11.id="td_marca";
      cell11.style.display ='none';

      //tot = parseFloat($("#costo_total").val())+parseFloat($("#td_total").html());
      //$("#td_total").html(parseFloat(tot).toFixed(2));

      //$("#id_empresa").prop("disabled",true);
      //$("#id_local").prop("disabled",true);

      //calculoTotal();
      // call the function to set the event to the new row
      //selectedRowToInput();
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
      //BootstrapDialog.alert('I want banana!');
      $('#row_btn_item').show();
      $('#row_tbl_detalle').show();
      limpiar();
      $("#id_ingreso").val("");
      $('#modalNew').modal('show')
      //$("#nombre").focus();
    }

    function openOrdenCompra(){
      $('#modalOrdenCompra').modal('show');
    }
    //nuevo item en base de datis
    function open_new_item(id_ingreso,id_empresa){
          limpiar_modal_items();
          editItem=true;
          newItem=true;
          $("#id_empresa").val(id_empresa);
          $("#id_ingreso").val(id_ingreso);
          $('#modalItemTitle').html('Nuevo Item');
          $('#id_item').select2('enable');
          $('#modalItem').modal('show');
    }
    function open_item(){
     
        limpiar_modal_items();
        $('#id_item').select2('enable');

       // $('#id_item').select2('open');
        //$('#id_item').select2('close');

        $('#modalItem').modal('show');
        //$('#id_item').select2('open');
        //$('#id_item').prev('.select2-container').find('.select2-input').focus();
        /*$('#id_item').click()
        $('#id_item').focus()*/
        //$('#id_item').select2();
        //$('#id_item').select2('open');
      
    }


    $(function () {


     /* $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass   : 'iradio_flat-green'
      })*/
    $('#maneja_lotes').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    $("#razon_social").select2();
    $("#id_item").select2();

    $('#razon_social').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function () {
          return 'digita razon social.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/proveedor.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
          q: params.term, // search term
          page: params.page,
          op : 'listProveedores'
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


    $.getJSON('../ajax/tabla.php?op=list_filter&id_tabla=2', function(data) {
      var template = $('#tpl_tipos_documento').html();
      var html = Mustache.to_html(template, data);
      $('#id_tipo_documento').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=14', function(data) {
      var template = $('#tpl_moneda').html();
      var html = Mustache.to_html(template, data);
      $('#id_moneda').html(html);
    });

     $.getJSON('../ajax/tabla.php?op=list&id_tabla=8', function(data) {
      var template = $('#tpl_motivo').html();
      var html = Mustache.to_html(template, data);
      $('#id_motivo').html(html);
    });

      $('#fecha_compra').daterangepicker({

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





function save(){

  if ($("#id_local").val()==''){
    bootbox.alert('Seleccione un local');
       /*bootbox.dialog({
        message: "Error in task",
        closeButton: false,
        buttons: {
          "success": {
           label: "Ok",
           className: "btn-success",
           callback: function () {}
         }
       }
     });*/

    $("#id_local").focus();
    return false;
  }
  if ($("#id_tipo_documento").val()==''){
    bootbox.alert('Seleccione tipo de documento');
    $("#id_tipo_documento").focus();
    return false;
  }
  if ($("#serie_documento").val()==''){
    bootbox.alert('Ingrese serie del documento');
    $("#serie_documento").focus();
    return false;
  }
  if ($("#numero_documento").val()==''){
    bootbox.alert('Ingrese numero del documento');
    $("#numero_documento").focus();
    return false;
  }
  if ($("#fecha_compra").val()==''){
    bootbox.alert('Ingrese fecha ');
    //$("#numero_documento").focus();
    return false;
  }
  /*if ($("#id_moneda").val()==''){
    bootbox.alert('Seleccione tipo de moneda');
    $("#id_moneda").focus();
    return false;
  }*/
  if ($("#id_motivo").val()==''){
    bootbox.alert('Seleccione motivo');
    $("#id_motivo").focus();
    return false;
  }
  /*if ($("#tipo_cambio").val()==''){
    bootbox.alert('Ingrese tipo de cambio');
    $("#tipo_cambio").focus();
    return false;
  }
  if ($("#porcentaje_igv").val()==''){
    bootbox.alert('Ingrese porcentaje de IGV');
    $("#porcentaje_igv").focus();
    return false;
  }
  if ($("#razon_social option:selected").val()==''){
    bootbox.alert('Seleccione proveedor');
   // $("#porcentaje_igv").focus();
    return false;
  }*/


   r = tabled.rows.length;

   if ($("#id_ingreso").val()==''){
     if (r<=0){
        bootbox.alert('No existen items en el detalle');
        return false;
     }
   }

  var aDetail= [];

  //var table = document.getElementById('tblEstudios');
  var rowCount = tabled.rows.length;
  for(var i=0; i<rowCount; i++) {
      var row = tabled.rows[i];
      //var id = row.cells[6].childNodes[0];
      aDetail.push({
        id_item :  row.cells[9].innerHTML,
        factor :  row.cells[3].innerHTML,
        cantidad :  row.cells[6].innerHTML,
        precio_costo :  row.cells[7].innerHTML,
        numero_lote :  row.cells[4].innerHTML,
        fecha_vencimiento :  row.cells[5].innerHTML

      });
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
              $op=($("#id_ingreso").val()=='')?'saveOtrosIngresos':'updateOtrosIngresos';

              $.ajax({
                type: "POST",
                url: "../ajax/otrosingresos.php?op="+$op,
                //dataType: "json",
                //data: JSON.stringify({ paramName: info }),
                data : {
                  id_ingreso: $("#id_ingreso").val(),
                  id_local: $("#id_local").val(),
                  id_tipo_documento: $("#id_tipo_documento").val(),
                  serie_documento: $("#serie_documento").val(),
                  numero_documento: $("#numero_documento").val(),
                  fecha_compra: $("#fecha_compra").val(),
                  id_empresa: $("#id_empresa").val(),
                  //id_moneda: $("#id_moneda").val(),
                  id_motivo: $("#id_motivo").val(),
                  //tipo_cambio: $("#tipo_cambio").val(),
                  //porcentaje_igv: $("#porcentaje_igv").val(),
                  //numero_guia: $("#numero_guia").val(),
                  //id_orden_compra: $("#id_orden_compra").val(),
                  id_proveedor: '0',
                  observacion: $("#observacion").val(),
                  id_tipo_ingreso: '2', //2=Otros ingresos
                  detalle: aDetail
                },
                success: function(msg){

                    //$('.answer').html(msg);

                        //mostrarform(false);
                  table.ajax.reload();
                  var amsg=msg.split('|');
                  var nerror=amsg[0];
                  if (nerror=='0'){
                    bootbox.alert('Ocurrio un error: '+amsg[1]);
                  }else{
                    $('#modalNew').modal('toggle');
                    bootbox.alert('Registro guardado');
                  }



                   //
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
<script id="tpl_tipos_documento" type="text/template">
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_moneda" type="text/template"><option value='' selected>--Seleccione Moneda--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_motivo" type="text/template"><option value='' selected>--Seleccione Forma--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_locales" type="text/template"><option value='' selected>--Seleccione Local--</option>
  {{#locales}}<option value='{{id}}' {{ selected }}>{{nombre}}</option>{{/locales}}
</script>

  <?php
//}
ob_end_flush();
?>
