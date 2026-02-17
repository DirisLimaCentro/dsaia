<?php
ob_start();
session_start();
require 'header.php';
?>
<style type="text/css">
 th.rotate {
   position: relative;
   height: 250px;
   width: 25px;
 }

 th.rotate div {
  transform: translate(-50%, -50%) rotate(270deg);
  white-space: nowrap;
  top: 50%;
  left: 50%;
  position: absolute;
  text-align: center;
}
}

</style>
<div class="right_col" role="main">
    <!-- Main content -->
    <section class="row">

      <div class="row">
      	<!--<div class="col-md-1 col-sm-3 col-xs-3">
      	</div>-->

        <div class="col-md-12 col-sm-6 col-xs-6">

          <div class="x_panel ">

            <div class="x_title">
                <h2>Reporte Consolidado por Tipo de Recipiente <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a><small></small></h2>
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

            	

                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          
                       <div class="row">

                        <div class="col-md-1">
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

                        <div class="col-md-2">
                          <div class="form-group">
                            <label >Año</label>

                            <input type="number" value="<?=date('Y');?>" class="form-control pull-right" id="anio_report"  >


                          </div>
                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label >Nivel</label>
                            <select class='form-control'  id='id_nivel' onchange="show_local()"  >
                              <option value="R" selected="">RIS</option>
                              <option value="E">Establecimiento</option>
                              <option value="D">Distrito</option>
                              <option value="S">Sector</option>
                              <option value="L">Localidad</option>
                            </select>  
                          </div>
                        </div>

                         <div class="col-md-2 col-sm-12 col-xs-12" style="display: none;" id="td_local">
                         <div class="form-group">
                           <label for="id_local" class="col-form-label">Establecimiento</label>
                           <select class="form-control input-sm select2 itemNamedist text-uppercase" style="width: 100%;"   id='id_local'  >
                           </select>
                         </div>
                       </div>


                        <div class="col-md-2">
                          <div class="form-group">
                            <label >Tipo Indicador</label>
                            <select class='form-control'  id='tipo_indicador' onchange="change_headers();"  >
                              <option value="I" selected="">Inspeccionado</option>
                              <option value="P">Positivo</option>
                              <option value="T">Tratado</option>
                              
                            </select>  
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="id_empresa" class="col-form-label">Actividad</label>
                           <select class="form-control"   multiple id='id_actividad' data-actions-box="true" data-select-all-text="Todos" data-deselect-all-text="Ninguno" data-style="btn-default"  >
                           </select>
                         </div>
                       </div>

                       <div class="col-md-2 col-sm-12 col-xs-12">
                        <label for="" class="col-form-label">&nbsp;</label>
                            <div class="form-group">
                                <a onclick="filtrar();" class="btn btn-default btn-primary btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span><i class="fa fa-filter "></i> Filtrar </span></a>
                              </div>
                       </div>


                     </div>

                        	<div class="row">

                                <div class="col-md-5 col-sm-12 col-xs-12">
                                  <table  id="tblris" class="table table-striped table-bordered dt-responsive table-hover " >
                                    <thead >
                                      <tr class="v-grid-header" >
                                        <th style="width: 10%;" >&nbsp;</th>
                                        <th class="rotate"><div>TANQUE ELEVADO</div></th>
                                        <th class="rotate"><div>TANQUE BAJO CISTERNA</div></th>
                                        <th class="rotate"><div>BARRIL CILINDROS SANSON TACHO</div></th>
                                        <th class="rotate"><div>BALDE BATEA TINA OLLA</div></th>  
                                        <th class="rotate"><div>LLANTAS</div></th>
                                        
                                        <th class="rotate"><div>FLOREROS JARRONES MACETAS</div></th>
                                        <th class="rotate"><div>LATA BOTELLAS</div></th>
                                        <th class="rotate"><div>POZOS</div></th>
                                        <th class="rotate"><div>OTROS RECIP.</div></th>
                                      </tr>
                                      <tr class="v-grid-header">
                                        <th class="text-center" id="td_nivel"></th>
                                        <td class="text-center" id="hea1">I</td>
                                        <td class="text-center" id="hea2">I2</td>
                                        <td class="text-center" id="hea3">I3</td>
                                        <td class="text-center" id="hea4">I4</td>
                                        <td class="text-center" id="hea5">I5</td>
                                        <td class="text-center" id="hea6">I6</td>
                                        <td class="text-center" id="hea7">I7</td>
                                        <td class="text-center" id="hea8">I8</td>
                                        <td class="text-center" id="hea9">I9</td>
                                      </tr>
                                    </thead>
                                    <tbody id="tb_results">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tbody>
                                  </table>

                                </div>
                                 <div class="col-md-7 col-sm-12 col-xs-12"><div class="responsive"  id="echart_resumen" style="height:620px; "></div>
                                </div>

                        		
                        	</div>

                        	
                          

                    	
                      </div>  
                  </div>  

                  
                  	<!--<div class="ln_solid"></div>
                  	<div class="form-group row">
                  		<div class="col-md-12 col-sm-12  text-center">
                  			    			<a onclick="to_excel();" class="btn btn-default btn-primary btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span><i class="fa fa-file-excel-o "></i> Exportar </span></a>
                  			
                  		</div>
                  	</div>-->
                 
               
                      
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
<script type="text/javascript">

function change_headers(){
  $("#tb_results").html("");
    t=$("#tipo_indicador").val();
    if (t=='I'){
        $("#hea1").html('I');
        $("#hea2").html('I2');
        $("#hea3").html('I3');
        $("#hea4").html('I4');
        $("#hea5").html('I5');
        $("#hea6").html('I6');
        $("#hea7").html('I7');
        $("#hea8").html('I8');
        $("#hea9").html('I9');
    }else if (t=='P'){
        $("#hea1").html('P');
        $("#hea2").html('P2');
        $("#hea3").html('P3');
        $("#hea4").html('P4');
        $("#hea5").html('P5');
        $("#hea6").html('P6');
        $("#hea7").html('P7');
        $("#hea8").html('P8');
        $("#hea9").html('P9');
    }else{
        $("#hea1").html('T');
        $("#hea2").html('T2');
        $("#hea3").html('T3');
        $("#hea4").html('T4');
        $("#hea5").html('T5');
        $("#hea6").html('T6');
        $("#hea7").html('T7');
        $("#hea8").html('T8');
        $("#hea9").html('T9');
    }
}

function filtrar(){

  $.ajax({
      url: "../ajax/ficha_vivienda.php?op=reportConsolidadoAedes",
      dataType: "json",
      type: "post",
      data: {
        mes: $("#mes_report").val(),
        anio: $("#anio_report").val(),
        tipo: $('#tipo_indicador').val(),
        id_nivel: $("#id_nivel").val(),
        id_local: $("#id_local").val()
      },
      processData: true,
      success: function (data) {
          //console.log(data[1]['ris']);
          cnt=data.length;
          rows="";
          var tipo = [];
          var ris = [];
          var datab = [];
          var rw=[];
          t1=0;t2=0;t3=0;t4=0;t5=0;t6=0;t7=0;t8=0;t9=0;
          for (i=0;i<cnt;i++){
              rows=rows+"<tr><td>"+data[i]['ris']+"</td>"+"<td class='text-right'>"+data[i]['tot1']+"</td>"+"<td class='text-right'>"+data[i]['tot2']+"</td>"+"<td class='text-right'>"+
              data[i]['tot3']+"</td>"+"<td class='text-right'>"+data[i]['tot4']+"</td>"+"<td class='text-right'>"+data[i]['tot5']+"</td>"+"<td class='text-right'>"+data[i]['tot6']+"</td>"+"<td>"+
              data[i]['tot7']+"</td>"+"<td class='text-right'>"+data[i]['tot8']+"</td>"+"<td class='text-right'>"+data[i]['tot9']+"</td></tr>";
              ris.push(data[i]['ris']);
              rw0=[0,i,data[i]['tot1']];
              rw1=[1,i,data[i]['tot2']];
              rw2=[2,i,data[i]['tot3']];
              rw3=[3,i,data[i]['tot4']];
              rw4=[4,i,data[i]['tot5']];
              rw5=[5,i,data[i]['tot6']];
              rw6=[6,i,data[i]['tot7']];
              rw7=[7,i,data[i]['tot8']];
              rw8=[8,i,data[i]['tot9']];

              t1=t1+parseInt(data[i]['tot1']);
              t2=t2+parseInt(data[i]['tot2']);
              t3=t3+parseInt(data[i]['tot3']);
              t4=t4+parseInt(data[i]['tot4']);
              t5=t5+parseInt(data[i]['tot5']);
              t6=t6+parseInt(data[i]['tot6']);
              t7=t7+parseInt(data[i]['tot7']);
              t8=t8+parseInt(data[i]['tot8']);
              t9=t8+parseInt(data[i]['tot9']);


              datab.push(rw0,rw1,rw2,rw3,rw4,rw5,rw6,rw7,rw8);
          }
          foot="<tr style='font-weight: bold' class='v-grid-header'><td >Totales</td><td class='text-right'>"+t1.toString()+"</td><td class='text-right'>"+t2.toString()+"</td><td class='text-right'>"+t3.toString()+"</td>"+
          "<td class='text-right'>"+t4.toString()+"</td><td class='text-right'>"+t5.toString()+"</td><td class='text-right'>"+t6.toString()+"</td><td class='text-right'>"+t7.toString()+"</td><td class='text-right'>"+t8.toString()+"</td><td class='text-right'>"+t9.toString()+"</td></tr>";

          
          $("#tb_results").html(rows+foot);


          nivel= $('#id_nivel').val();
          switch(nivel) {
            case 'R':
              $("#td_nivel").html('RIS');
            break;
            case 'E':
              $("#td_nivel").html('Establecimiento');
            break;
            case 'D':
              $("#td_nivel").html('Distrito');
            break;
            case 'S':
              $("#td_nivel").html('Sector');
            break;
            case 'L':
              $("#td_nivel").html('Localidad');
            break;           
              
          }
          

          //var echarte = echarts.init(document.getElementById('echart_resumen'));
          var echarte = echarts.init(document.getElementById('echart_resumen'));

          var option;


          // prettier-ignore
          tip=$('#tipo_indicador').val();

          var tipo = [tip, tip+'2', tip+'3', tip+'4', tip+'5', tip+'6', tip+'7',tip+'8', tip+'9', ];


          
          option = {
            layout: {
              padding: 1
            },
            legend: {
              //data: [{name:'series 1',icon:'circle'}],
              show: true
            },
            tooltip: {},
            title:{
              show: true,
              text: 'Grafica por tipo de recipientes',
              textAlign: 'center',
              padding: 0,
              right: 0,
             top: 0,
             bottom: 0
           },
             colorBy:'series',
            visualMap: {
              min: 0,
              max: 300,
              show: false,
              //dimension: 2,
              padding: 0,
              top:0,
              inRange: {
               color: ['#37A2DA', '#32C5E9', '#67E0E3', '#9FE6B8', '#FFDB5C','#ff9f7f', '#fb7293', '#E062AE', '#E690D1', '#e7bcf3', '#9d96f5', '#8378EA', '#96BFFF'],
              }
            },

            xAxis3D: {
              type: 'category',
              data: ris,
              //name: '',
              axisLabel: {
                interval: 0,
                rotate: -45,
                fontSize: 7               
              },
              nameTextStyle: {
                fontSize: 0
              }
            },
            yAxis3D: {
              type: 'category',
              data: tipo,
              axisLabel: {
                interval: 0,
                fontSize: 8,

              },
              name: 'Tipo Recip',
              nameTextStyle: {
                fontSize: 8
              }
            },
            zAxis3D: {
              type: 'value',
              axisLabel: {                
                fontSize: 8  
              },
              name: 'Cant Recip',
               nameTextStyle: {
                fontSize: 8
              }
            },
            grid3D: {
              boxWidth: 150,
              boxDepth: 90,
              //left: '1%',
              top: 1,
              right: 0,
              bottom: 0,
              viewControl: {
              //  projection: 'orthogonal', //'orthographic'
                //targetCoord: [21.255592,27.436933],
                distance: 280,
              },
              light: {
                main: {
                  intensity: 1.2,
                  shadow: true
                },
                ambient: {
                  intensity: 0.3
                }
              }
            },
            series: [
            {
              type: 'bar3D',
              data: datab.map(function (item) {
                return {
                  value: [item[1], item[0], item[2]]
                };
              }),
              shading: 'lambert',
              label: {
                fontSize: 16,
                borderWidth: 1
              },
              emphasis: {
                label: {
                  fontSize: 20,
                  color: '#900'
                },
                itemStyle: {
                  color: '#900'
                }
              }
            }
            ]
          };

          echarte.setOption(option);

          /*echarte.dispatchAction({
            type: 'dataZoom',
            dataZoomIndex: 0,
            
            start: '20%',
            end: '30%',
          })*/

      }
    });
}

function to_pdf(){

	var cntProv=document.getElementById('id_area').length;
	
	strEmpresas=$("#id_empresa").val();

	strProveedores=$("#id_area").val();
	strProveedores=strProveedores.toString();

	var aProv=strProveedores.split(",");
	var cntSel=aProv.length;

	if (cntProv==cntSel){
		strProv="*";
	}else{
		strProv=strProveedores;
	}

  var cntPer=document.getElementById('id_personal').length;
  strPersona=$("#id_personal").val();
  strPersona=strPersona.toString();
  var aPer=strPersona.split(",");
  var cntSel=aPer.length;
  if (cntPer==cntSel){
    strPer="*";
  }else{
    strPer=strPersona;
  }

  var cntCat=document.getElementById('id_insumo').length;
  strCat=$("#id_insumo").val();
  strCat=strCat.toString();
  var aCat=strCat.split(",");
  var cntSel=aCat.length;
  if (cntCat==cntSel){
    strCat="*";
  }else{
    //strCat=strPersona;
  }




	document.getElementById('aDwn').setAttribute('href',"../reportes/pdfSalidas.php?desde="+$("#fecha_desde").val()+"&hasta="+$("#fecha_hasta").val()+"&id_empresa="+strEmpresas.toString()+"&id_local="+strProv+"&id_personal="+strPer+"&id_catalogo="+strCat);
	document.getElementById('aDwn').click();
}

function to_excel(){

	var cntProv=document.getElementById('id_area').length;
	
	strEmpresas=$("#id_empresa").val();

	strProveedores=$("#id_area").val();
	strProveedores=strProveedores.toString();

	var aProv=strProveedores.split(",");
	var cntSel=aProv.length;

	if (cntProv==cntSel){
		strProv="*";
	}else{
		strProv=strProveedores;
	}

  var cntCat=document.getElementById('id_insumo').length;
  strCat=$("#id_insumo").val();
  strCat=strCat.toString();
  var aCat=strCat.split(",");
  var cntSel=aCat.length;
  if (cntCat==cntSel){
    strCat="*";
  }else{
    //strCat=strPersona;
  }

  /*var cntPer=document.getElementById('id_personal').length;
  strPersona=$("#id_personal").val();
  strPersona=strPersona.toString();

  var aPer=strPersona.split(",");
  var cntSel=aPer.length;

  if (cntPer==cntSel){
    strPer="*";
  }else{
    strPer=strPersona;
  }*/

	document.getElementById('aDwn').setAttribute('href',"../reportes/xlsDescargos.php?desde="+$("#fecha_desde").val()+"&hasta="+$("#fecha_hasta").val()+"&id_empresa="+strEmpresas.toString()+"&id_local="+strProv+"&id_catalogo="+strCat);
	document.getElementById('aDwn').click();
}

function show_local(){
  if ($("#id_nivel").val()=='S' || $("#id_nivel").val()=='L'){
      $("#td_local").show();
  }else{
       $("#td_local").hide();
  }
}

	
$(function () {

  $("#mes_report").val($("#s_mes").val());

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


      $.getJSON('../ajax/tabla.php?op=list&id_tabla=18', function(data) {
      	var template = $('#tpl_actividades').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_actividad').html(html);
      	$('#id_actividad').selectpicker();
      });
      $.getJSON('../ajax/local.php?op=list', function(data) {
      	var template = $('#tpl_areas').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_area').html(html);
      	$('#id_area').selectpicker();
      });

       $.getJSON('../ajax/personal.php?op=list', function(data) {
        var template = $('#tpl_personal').html();
        var html = Mustache.to_html(template, data);
        $('#id_personal').html(html);
        $('#id_personal').selectpicker();
      });

       $.getJSON('../ajax/catalogo.php?op=list', function(data) {
        var template = $('#tpl_catalogo').html();
        var html = Mustache.to_html(template, data);
        $('#id_insumo').html(html);
        $('#id_insumo').selectpicker();
      });


        $.ajax( {
          url: '../ajax/local.php?op=cboLocales',
          //data:  parametros,
          dataType: 'html',
          success: function ( json ) {
            $("#id_local").html( json );
            $("#id_local").select2();

          }
        } );

       filtrar();
});	

</script>

<script id="tpl_actividades" type="text/template">
  {{#tablas}}<option value='{{id}}' selected>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_areas" type="text/template">
  {{#locales}}<option value='{{id}}' selected>{{nombre}}</option>{{/locales}}
</script>

<script id="tpl_personal" type="text/template">
  {{#empresas}}<option value='{{id}}' selected>{{nombre}}</option>{{/empresas}}
</script>
<script id="tpl_catalogo" type="text/template">
  {{#catalogo}}<option value='{{id}}' selected>{{nombre}}</option>{{/catalogo}}
</script>
<?php
ob_end_flush();
?>