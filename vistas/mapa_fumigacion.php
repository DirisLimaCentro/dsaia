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
      .pac-container {z-index: 99999999999 !important;}

       #map {
      height: 700px;
    }

      .verticalText {
        writing-mode: vertical-lr;
        transform: rotate(180deg);
        text-align: center;     
        
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
                <h2>Mapa Programacion de Fumigacion <small></small></h2>
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

                  <div class="row">  
                    <div class="col-md-3 col-sm-12 col-xs-12">

                      <div class="row">  
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                         <label >Establecimiento</label>
                         <select class="form-control select2 itemNamedist text-uppercase"    id='id_establecimiento' onchange="filtrar();"   >
                         </select>
                       </div>
                     </div>

                      <div class="row">  
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <label for="">Desde</label>
                          <div class="input-group date">

                            <input type="text" value="<?=date('d/m/Y');?>" class="form-control pull-right" id="fecha_desde" placeholder="dd/mm/aaaa" >
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                        </div>  

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <label for="">Hasta</label>
                          <div class="input-group date">

                            <input type="text" value="<?=date('d/m/Y');?>" class="form-control pull-right" id="fecha_hasta" placeholder="dd/mm/aaaa" >
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                        </div>  



                         

                      </div> 

                      <!--<div class="row">  
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <div class="radio">
                            <label>
                              <input type="radio" id="tipo1"  checked name="tiporeporte" value="T" onclick="filtrar()" > Viviendas Positivas
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" id="tipo2"  name="tiporeporte" value="C" onclick="filtrar()"> Cerco Entomológico
                            </label>
                          </div>
                        </div>
                      </div>  -->

                      <div class="row">  
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                              <table   class="table table-striped table-bordered table-hover table-responsive ">
                                    <thead>
                                      <tr class="v-grid-header">
                                        <th class="text-center">Establecimiento</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Actividad</th>
                                        <th class="text-center">Detalle</th>
                                      </tr>
                                    </thead>
                                     <tbody id="tbDistritos" >
                                     </tbody> 

                                     <!--<tfoot>
                                       <tr class="v-grid-header">
                                         <th>Totales</th>
                                         <th class='text-right' id="td_total_insp">0</th>
                                         <th class='text-right' id="td_total_pos">0</th>
                                         <th class='text-right' id="td_total_ind">0</th>
                                       </tr>
                                     </tfoot> -->
                              </table>
                        </div>
                      </div>   

                      
                      <!--<div class="row">  
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <button onclick="renderMapRuta();" class="btn btn-info" >Mapa Ruta Control Vectorial</buton>
                            
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <a href="../../dengue/index.php" class="btn btn-success" target="_blank">Mapa Dengue</a>
                        </div>
                      </div> 
                    -->

                         
                    </div>

                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div id="map"></div>                
                    </div>     
                  </div>       


              </div>



               

                  

              <!--Formulario Imprimir-->

               



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

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSXwJKsNIgqvJ79XFalp9JfHQNzeNfhvE&libraries=visualization"></script>
 

  <script>
    var rIndex;
    var editItem=false;
    var newItem;
    var currentItem=0;

    var items_arr = [];
    var id_items = 1;

    //var tabled = document.getElementById('tblDet').getElementsByTagName('tbody')[0]; //document.getElementById("tblDet");
   



   


    $(function () {


      $.getJSON('../ajax/local.php?op=listaLocales', function(data) {
        var template = $('#tpl_establecimientos').html();
        var html = Mustache.to_html(template, data);
        $('#id_establecimiento').html(html);
        $('#id_establecimiento').select2();
      });



        $('#fecha_desde').daterangepicker({
         locale: {
          format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });

        $('#fecha_desde').on('apply.daterangepicker', function(ev, picker) {      
         
          renderData();
           getData();
        });

        $('#fecha_hasta').daterangepicker({
         locale: {
          format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });


        $('#fecha_hasta').on('apply.daterangepicker', function(ev, picker) {      
          
          renderData();
          getData();
        });

        renderData();  

        getData();

        


     /* $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass   : 'iradio_flat-green'
      })*/
      $.fn.modal.Constructor.prototype.enforceFocus = function () {
        };

       

});

function listLocales(id_selected){
  $.getJSON('../ajax/empresa.php?op=listLocales&id_selected='+id_selected+'&id_empresa='+$("#id_empresa").val(), function(data) {
      var template = $('#tpl_locales').html();
      var html = Mustache.to_html(template, data);
      $('#id_local').html(html);
    });
}






function save(){

  if ($("#fecha_inicio").val()==''){
    bootbox.alert('Ingrese fecha de inicio');
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
    return false;
  }

   if ($("#fecha_termino").val()==''){
      bootbox.alert('Ingrese fecha de termino');
      return false;
   }

  if ($("#sector").val()==''){
    bootbox.alert('Seleccione sector');
    $("#sector").focus();
    return false;
  }
  if ($("#id_localidad").val()==''){
    bootbox.alert('Seleccione localidad');
    $("#id_localidad").focus();
    return false;
  }
  if ($("#id_tipo_actividad").val()==''){
    bootbox.alert('Seleccione tipo de actividad');
    $("#numero_documento").focus();
    return false;
  }
  
  /* r = tabled.rows.length;

   if ($("#id_ingreso").val()==''){
     if (r<=0){
        bootbox.alert('No existen items en el detalle');
        return false;
     }
   }*/

  /*var aDetail= [];
  var rowCount = tabled.rows.length;
  for(var i=0; i<rowCount; i++) {
      var row = tabled.rows[i];
      aDetail.push({
        id_item :  row.cells[9].innerHTML,
        factor :  row.cells[3].innerHTML,
        cantidad :  row.cells[6].innerHTML,
        precio_costo :  row.cells[7].innerHTML,
        numero_lote :  row.cells[4].innerHTML,
        fecha_vencimiento :  row.cells[5].innerHTML

      });
  }*/

  var aItems= [];

  var rowCount = items_arr.length;  
  for(var i=0; i<rowCount; i++) {
    aItems.push({      
      direccion_familia   : items_arr[i][1],
      nro_habitantes: items_arr[i][2],
      id_condicion_vivienda: items_arr[i][3],
      cnt_tipo_1_i: items_arr[i][5],
      cnt_tipo_1_p: items_arr[i][6],
      cnt_tipo_1_t: items_arr[i][7],
      cnt_tipo_1_v: items_arr[i][8],
      cnt_tipo_2_i: items_arr[i][9],
      cnt_tipo_2_p: items_arr[i][10],
      cnt_tipo_2_t: items_arr[i][11],
      cnt_tipo_2_v: items_arr[i][12],
      cnt_tipo_3_i: items_arr[i][13],
      cnt_tipo_3_p: items_arr[i][14],
      cnt_tipo_3_t: items_arr[i][15],
      cnt_tipo_3_v: items_arr[i][16],
      cnt_tipo_4_i: items_arr[i][17],
      cnt_tipo_4_p: items_arr[i][18],
      cnt_tipo_4_t: items_arr[i][19],
      cnt_tipo_4_v: items_arr[i][20],
      cnt_tipo_5_i: items_arr[i][21],
      cnt_tipo_5_p: items_arr[i][22],
      cnt_tipo_5_t: items_arr[i][23],
      cnt_tipo_5_v: items_arr[i][24],
      cnt_tipo_6_i: items_arr[i][25],
      cnt_tipo_6_p: items_arr[i][26],
      cnt_tipo_6_t: items_arr[i][27],
      cnt_tipo_6_v: items_arr[i][28],
      cnt_tipo_7_i: items_arr[i][29],
      cnt_tipo_7_p: items_arr[i][30],
      cnt_tipo_7_t: items_arr[i][31],
      cnt_tipo_7_v: items_arr[i][32],
      cnt_tipo_8_i: items_arr[i][33],
      cnt_tipo_8_p: items_arr[i][34],
      cnt_tipo_8_t: items_arr[i][35],
      cnt_tipo_8_v: items_arr[i][36],
      cnt_tipo_9_i: items_arr[i][37],
      cnt_tipo_9_p: items_arr[i][38],
      cnt_tipo_9_t: items_arr[i][39],
      cnt_tipo_9_v: items_arr[i][40],
      cnt_larvicidas: items_arr[i][45],
      cnt_febriles: items_arr[i][47]
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
              $("#loaderModal").show();
              //$op=($("#id_ficha").val()=='')?'saveFicha':'updateFicha';
              $op='saveFicha';
              id_f=($("#id_ficha").val()=='')?'0':$("#id_ficha").val();
              $.ajax({
                type: "POST",
                url: "../ajax/ficha_vivienda.php?op="+$op,
                //dataType: "json",
                //data: JSON.stringify({ paramName: info }),
                data : {
                  id_ficha: id_f,
                  id_local: $("#s_id_local").val(),
                  sector: $("#sector").val(),
                  fecha_inicio: $("#fecha_inicio").val(),
                  fecha_termino: $("#fecha_termino").val(),
                  id_tipo_actividad: $("#id_tipo_actividad").val(),
                  id_localidad: $("#id_localidad").val(), 
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
                    $('#modalFicha').modal('toggle');
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
  <option value='' selected>--Todos--</option>
  {{#locales}}<option value='{{id}}' >{{nombre}}</option>{{/locales}}
</script>

  <?php
//}
ob_end_flush();
?>
