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
                <h2>Requerimientos <small></small></h2>
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
                    <th>Numero</th>
                    <th>Area</th>
                    <th>Fecha</th>      
                    <th>Usuario Crea</th>                           
                    <th>Fecha Aut</th>
                    <th>Usuario Aut</th>
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
                    <th>Numero</th>
                    <th>Area</th>
                    <th>Fecha</th>
                    <th>Usuario Crea</th> 
                    <th>Fecha Aut</th>
                    <th>Usuario Aut</th>                    
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
                      <h4 class="panel-title" id="modalTitle">Nuevo Requerimiento</h4>        
                    </div> 

                    <div class="modal-body">                     
                          
                              <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12 box-header with-border">
                                    <h2 class="box-title">Datos del Requerimiento</h2>
                                    <input type="hidden" id="id_requerimiento">
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="id_empresa">Empresa</label>
                                    <input type="hidden" id="id_empresa" value="<?=$_SESSION['s_id_empresa'];?>">
                                      <input type="text" readonly="" class="form-control" value="<?=$_SESSION['s_empresa'];?>" id="empresa" placeholder="Empresa">  
                                  </div>     
                                  </div>                                  
                                

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="orden">Numero Requerimiento:</label>
                                    <input type="text" readonly="" class="form-control" id="numero" placeholder="Numero">  
                                  </div>                                  
                                </div>

                                 <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="orden">Area:</label>
                                    <input type="hidden" name="id_local" id="id_local" value="<?=$_SESSION['s_id_local'];?>">
                                    <input type="hidden" name="autoriza_requerimiento" id="autoriza_requerimiento" value="<?=$_SESSION['s_autoriza_requerimiento'];?>">
                                    <input type="text" readonly="" class="form-control" value="<?=$_SESSION['s_local'];?>" id="area" placeholder="Area">  
                                  </div>                                  
                                </div>
                                

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Fecha Creacion</label>
                                    <input type="text" readonly="" class="form-control" id="fecha_creacion" value="<?=date('d/m/Y');?>" placeholder="Fecha Creacion">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Usuario Registro</label>
                                    <input type="hidden" name="id_usuario_crea" id="id_usuario_crea" value="<?=$_SESSION['s_id_usuario'];?>">
                                    <input type="hidden" name="id_personal" id="id_personal" value="<?=$_SESSION['s_id_personal'];?>">
                                    <input type="text" readonly="" class="form-control" id="usuario_creacion" placeholder="Usuario" value="">
                                  </div>
                                </div>

                              </div>

                              <div class="row">                                

                                

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <input  type="checkbox" class="flat-red"  id="urgente"> Urgente
                                  </div> 

                                </div>  

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Seleccione medico(s):</label>
                                    <select class='form-control'  id='id_personal_referencia' multiple id='id_proveedor' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-success"  >
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea  class="form-control" rows="2" id="observaciones" placeholder="Observaciones"></textarea>
                                  </div>  
                                </div>  


                              </div>                              



                            
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
                                        <th>Cantidad</th>                                        
                                        <th style="width: 1px; display:none "></th>
                                        <th style="width: 1px; display:none "></th>
                                      </tr>
                                    </thead>
                                    <tbody >  
                                        
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




              <!-- Form Local-->
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
                          
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label >Categoria</label>
                                  <input type="text" class="form-control" id="categoria" readonly="" placeholder="Categoria">
                                </div>  
                          </div>
                          


                      </div>

                      <div class="row">
                          
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Unidad Medida </label>
                                  <select class='form-control' name='id_umi' id='id_umi' ></select>
                                </div>  
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label >Cantidad UM</label>
                                   <input type="text" class="form-control number" id="cantidad" maxlength="10"  step='0.01' value='0.00' placeholder='0.00' >
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



  <script type="text/javascript" src="scripts/requerimiento.js?rnd=<?php echo rand(); ?>"></script>
  <script type="text/javascript" src="../public/js/mustache.min.js"></script>

  <script>
    var rIndex;
    var editItem;
    var newItem;
    var tabled = document.getElementById('tblDet').getElementsByTagName('tbody')[0];
   

     //document.getElementById("tblDet");
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
       // alert($("#"+r+" #td_unidad_medida").html());
        $("#id_umi").val($("#"+r+" #td_id_unidad_medida").html());
        //$("#marca").val($("#"+r+" #td_marca").html());
        //$("#factor").val($("#"+r+" #td_factor").html());
        $("#cantidad").val($("#"+r+" #td_cantidad").html());
        //$("#costo_umc").val($("#"+r+" #td_costo_umc").html());
        //$("#numero_lote").val($("#"+r+" #td_numero_lote").html());
        //$("#fecha_vencimiento").val($("#"+r+" #td_fecha_vencimiento").html());
        $('#id_item').select2("enable",false);

        //ContarUnidades();
        //calcular();
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
        msj="Ingrese cantidad";
      }
     /* if ($("#costo_umc").val()==''){
        msj="Ingrese precio costo";
      }*/

      /*if ($('#maneja_lotes').is(':checked')){
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
      }else{

          //Evaluamos si ID Ingreso tiene un valor
          //alert()
          //if ($("#id_orden_compra").val()!=''){          
                

                /////////////////////
          //}else{  
            $("#"+rIndex+" #td_cantidad").html($("#cantidad").val());

            $("#"+rIndex+" #td_unidad_medida").html($("#id_umi option:selected").text());

            $("#"+rIndex+" #td_id_unidad_medida").html($("#id_umi").val());

            //$("#"+rIndex+" #td_numero_lote").html($("#numero_lote").val());
            //$("#"+rIndex+" #td_fecha_vencimiento").html($("#fecha_vencimiento").val());
            //$("#"+rIndex+" #td_costo_umc").html($("#costo_umc").val());
            //$("#"+rIndex+" #td_costo_total").html($("#costo_total").val());
            //calculoTotal();
            $('#modalItem').modal('toggle');
          //}

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
      //cell7 = newRow.insertCell(6);
      //cell8 = newRow.insertCell(7);
      //cell9 = newRow.insertCell(8);
      //cell10 = newRow.insertCell(9);
      //cell11 = newRow.insertCell(10);

      cell1.innerHTML = "<button class='btn btn-link btn-xs' onclick='editRow(\""+idRow+"\")'><i class='fa fa-pencil'></i></button><button class='btn btn-link btn-xs' onclick='delRow(\""+idRow+"\");'><i class='fa fa-close'></i></button>";
      
      cell2.innerHTML = $('#id_item').select2('data')[0]['text'];      
      cell2.id="td_nombre_item";

      cell3.innerHTML = $("#id_umi option:selected").text();
      cell3.id="td_unidad_medida";

      //cell4.innerHTML = $("#factor").val();
      //cell4.id="td_factor";
      //cell4.className  ='text-right';

      //cell5.innerHTML = $("#numero_lote").val();
      //cell5.id="td_numero_lote";

      //cell6.innerHTML = $("#fecha_vencimiento").val();
      //cell6.id="td_fecha_vencimiento";
      cant = $("#cantidad").val()
      cell4.innerHTML = $.trim(cant);
      cell4.id="td_cantidad";
      cell4.className  ='text-right';

     

      cell5.innerHTML = $("#id_item option:selected").val();
      cell5.id="td_id_item";
      cell5.style.display ='none';

      cell6.innerHTML = $("#id_umi").val();
      cell6.id="td_id_unidad_medida";
      cell6.style.display ='none'; 

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
           nTot= nTot + parseFloat(row.cells[6].innerHTML); 
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
      //$("#empresa").val(s_empresa);
      

      $('#row_btn_item').show();
      $('#row_tbl_detalle').show();
      limpiar();
      //$("#id_requerimiento").val("");
      $('#modalNew').modal('show')
      //$("#nombre").focus();
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
      //if ($("#id_local").val()==''){
          //bootbox.alert("Seleccione un local antes de agregar los items");

      //}else{
        //$('#id_item').select2("enable",true);
        //$("#id_item").trigger('change');
        //Limpiando modal de items
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
      //}  
    }


    $(function () {

      //Integer Number
    $(document).on("input", ".int-number", function (e) {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

      $(".disabled-link").click(function(event) {
        event.preventDefault();
        return false;
      });
     /* $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass   : 'iradio_flat-green'
      })*/
    $('#urgente').iCheck({
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
      //customClass: "success",
      language: {
        inputTooShort: function () {
          return 'digita descripcion del item.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/catalogo.php",
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
        $.post("../ajax/catalogo.php?op=mostrar",{id_catalogo : id_item}, function(data, status){
          data = JSON.parse(data);
           // $("#direccion").val(data.direccion);
           // $("#ruc").val(data.ruc);
           $("#categoria").val(data.categoria);
           //$("#marca").val(data.marca);
           //$("#unidad_medida_compra").val(data.unidad_medida_ingreso);
           //$("#factor").val(data.factor);

           /*if (data.maneja_lote=='1'){
              $("#maneja_lotes").iCheck('check');
              $("#numero_lote").prop('disabled', false);
              $("#fecha_vencimiento").prop('disabled', false);

           }else{
              $("#maneja_lotes").iCheck('uncheck')
              $("#numero_lote").prop('disabled', true);
              $("#fecha_vencimiento").prop('disabled', true);

           }*/


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

     $.getJSON('../ajax/tabla.php?op=list&id_tabla=3', function(data) {
      var template = $('#tpl_forma_pago').html();
      var html = Mustache.to_html(template, data);
      $('#id_forma_pago').html(html);
    });

     $.getJSON('../ajax/tabla.php?op=list&id_tabla=6', function(data) {
      var template = $('#tpl_um').html();
      var html = Mustache.to_html(template, data);
      //$('#id_ums').html(html);
      $('#id_umi').html(html);
    });

     $.getJSON('../ajax/persona.php?op=list', function(data) {
      var template = $('#tpl_lista_pesona').html();
      var html = Mustache.to_html(template, data);
      $('#id_personal_referencia').html(html);
      $('#id_personal_referencia').selectpicker();
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

  /*if ($("#id_empresa").val()==''){    
    bootbox.alert('Seleccione una Empresa');
    $("#id_empresa").focus();
    return false;
  }*/
  /*if ($("#id_tipo_documento").val()==''){
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
  }*/
  
  /*if ($("#fecha_compra").val()==''){
    bootbox.alert('Ingrese fecha de compra');
    //$("#numero_documento").focus();
    return false;
  }*/


 
  

   r = tabled.rows.length;

  // if ($("#id_requerimiento").val()==''){
     if (r<=0){
        bootbox.alert('No existen items en el detalle');
        return false;
     }
   //}  

  var aDetail= [];

  
  /*var rowCount = tabled.rows.length;  
  for(var i=0; i<rowCount; i++) {
      var row = tabled.rows[i];     
      var cant=row.cells[3].innerHTML;
      var cnt = cant.split(' ').join('');
      var id_i=row.cells[4].innerHTML;
      var id_i=id_i.split(' ').join('');

      aDetail.push({
        id_item :  id_i,
        cantidad :  cnt,
        id_unidad_medida :  row.cells[5].innerHTML    

      }); 
  }*/

  $("#tblDet tbody tr").each(function(){
        var currentRow=$(this);
    
        var cant=currentRow.find("td:eq(3)").text(); 
        var cnt = cant.split(' ').join('');
        var id_i=currentRow.find("td:eq(4)").text(); 
        var id_i=id_i.split(' ').join('');

        aDetail.push({
          id_item :  id_i,
          cantidad :  cnt,
          id_unidad_medida :  currentRow.find("td:eq(5)").text()  

        }); 
        
   });


  var aPersonas=[];


  ap=$('#id_personal_referencia').val();

  if (ap){
    for (var i = 0; i < ap.length; i++) {
      aPersonas.push({id_persona: ap[i]});
    }
  }

  if ($('#urgente').is(':checked')){
      var urgente=true;
  }else{
      var urgente=false;
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
              $op=($("#id_requerimiento").val()=='')?'saveRequerimiento':'updateRequerimiento';
              
              $.ajax({
                type: "POST",
                url: "../ajax/requerimiento.php?op="+$op,
                //dataType: "json",
                //data: JSON.stringify({ paramName: info }),
                data : {
                  id_requerimiento: $("#id_requerimiento").val(),
                  id_empresa: $("#id_empresa").val(), 
                  id_local: $("#id_local").val(), 
                  urgente: urgente,                 
                  observaciones: $("#observaciones").val(),
                  id_usuario_crea: $("#id_usuario_crea").val(),
                  id_solicitante: $("#id_personal").val(), //1=Compras
                  id_personal_referencia: aPersonas,
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
<script id="tpl_tipos_documento" type="text/template"><option value='' selected>--Seleccione Tipo--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_moneda" type="text/template"><option value='' selected>--Seleccione Moneda--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_forma_pago" type="text/template"><option value='' selected>--Seleccione Forma--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_locales" type="text/template"><option value='' selected>--Seleccione Local--</option>
  {{#locales}}<option value='{{id}}' {{ selected }}>{{nombre}}</option>{{/locales}}
</script>

<script id="tpl_um" type="text/template"><option value='' selected>--Seleccione Unidad de Medida--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_lista_pesona" type="text/template">
  {{#personas}}<option value='{{id}}'>{{nombre}}</option>{{/personas}}
</script>

  <?php 
//}
ob_end_flush();
?>
