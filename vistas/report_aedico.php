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
      	<div class="col-md-1 col-sm-3 col-xs-3">
      	</div>

        <div class="col-md-10 col-sm-6 col-xs-6">

          <div class="x_panel ">

            <div class="x_title">
                <h2>Reporte Indice Aedico <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a><small></small></h2>
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
                            <select class='form-control'  id='mes_report' multiple  id='mes_report' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-default" >
                              <option value="1" <? if(date('m')=='01') echo " selected "; ?> >Enero</option>
                              <option value="2" <? if(date('m')=='02') echo " selected "; ?>>Febrero</option>
                              <option value="3" <? if(date('m')=='03') echo " selected "; ?>>Marzo</option>
                              <option value="4" <? if(date('m')=='04') echo " selected "; ?>>Abril</option>
                              <option value="5" <? if(date('m')=='05') echo " selected "; ?>>Mayo</option>
                              <option value="6" <? if(date('m')=='06') echo " selected "; ?>>Junio</option>
                              <option value="7" <? if(date('m')=='07') echo " selected "; ?>>Julio</option>
                              <option value="8" <? if(date('m')=='08') echo " selected "; ?>>Agosto</option>
                              <option value="9" <? if(date('m')=='09') echo " selected "; ?>>Setiembre</option>
                              <option value="10" <? if(date('m')=='10') echo " selected "; ?>>Octubre</option>
                              <option value="11" <? if(date('m')=='11') echo " selected "; ?>>Noviembre</option>
                              <option value="12" <? if(date('m')=='12') echo " selected "; ?>>Diciembre</option>
                            </select>  
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label >Año</label>

                            <input type="number" value="<?=date('Y');?>" class="form-control pull-right" id="anio_report"  >


                          </div>
                        </div>

                        <!--<div class="col-md-2">
                          <div class="form-group">
                            <label >Tipo Indicador</label>
                            <select class='form-control'  id='tipo_indicador' onchange="change_headers();"  >
                              <option value="I" selected="">Inspeccionado</option>
                              <option value="P">Positivo</option>
                              <option value="T">Tratado</option>
                              
                            </select>  
                          </div>
                        </div>-->

                        <div class="col-md-2">
                          <div class="form-group">
                            <label >Nivel</label>
                            <select class='form-control'  id='id_nivel' onchange="show_local()" >
                              <option value="R" selected="">RIS</option>
                              <option value="E">Establecimiento</option>
                              <option value="D">Distrito</option>
                              <option value="S">Sector</option>
                              <option value="L">Localidad</option>
                            </select>  
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12" style="display: none;" id="td_local">
                         <div class="form-group">
                           <label for="id_local" class="col-form-label">Establecimiento</label>
                           <select class="form-control input-sm select2 itemNamedist text-uppercase" style="width: 100%;"   id='id_local'  >
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

                                <div class="col-md-7 col-sm-12 col-xs-12">
                                  <table  id="tblris" class="table table-striped table-bordered dt-responsive table-hover " >
                                    <thead >
                                      <tr class="v-grid-header" >
                                        <th style="width: 30%;" id="td_nivel">&nbsp;</th>
                                        <!--<th class="rotate"><div>VIVIENDAS INSPECCIONADAS</div></th>
                                        <th class="rotate"><div>VIVIENDAS +</div></th>
                                        <th class="rotate"><div>INDICE AEDICO</div></th>-->

                                         <th >INSPECCIONADAS</th>
                                        <th >VIVIENDAS +</th>
                                        <th >I.A.</th>
                                       
                                      </tr>
                                      <!--<tr class="v-grid-header">
                                        <th class="text-center"></th>
                                        <td class="text-center" ></td>
                                        <td class="text-center" ></td>
                                        <td class="text-center" ></td>
                                       
                                      </tr>-->
                                    </thead>
                                    <tbody id="tb_results">
                                        <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                        
                                    </tbody>
                                    <tfoot>
                                          <tr class="v-grid-header">
                                                <td>Totales</td>
                                                <td class="text-right" id="tot_vi"></td>
                                                <td class="text-right" id="tot_vp"></td>
                                                <td class="text-right" style="font-weight: bold;" id="tot_i"></td>
                                          </tr>
                                    </tfoot>
                                  </table>

                                </div>
                                 <div class="col-md-5 col-sm-12 col-xs-12">

                                      <!--<div class="responsive"  id="echart_resumen" style="height:420px; ">
                                        
                                      </div>-->
                                      <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  
                                              </div>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table   class="table table-striped table-bordered dt-responsive table-hover " >
                                                  <thead >
                                                    <tr class="v-grid-header" >
                                                      <th >ESTRATIF. DEL RIESGO EPID. ESC. II</th>                                                      
                                                      <th >IND. AÉDICO</th>
                                                     
                                                    </tr>                                                   
                                                  </thead>
                                                  <tbody >
                                                    <tr>
                                                    <td>BAJO RIESGO</td>
                                                    <td class="success">0 - < 1%</td>                                                    
                                                    </tr>
                                                     <tr>
                                                    <td>MEDIANO RIESGO</td>
                                                    <td class="warning">1 - < 2%</td>                                                    
                                                    </tr>
                                                     <tr>
                                                    <td>ALTO  RIESGO</td>
                                                    <td class="danger">>= 2%</td>                                                    
                                                    </tr>


                                                  </tbody>
                                                </table>
                                              </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                          <!--<div class="responsive"  id="echart_resumen" style="height:620px; ">

                                          </div>-->

                                          <div id="divMeter" style="height:420px; ">
                                            
                                          </div>


                                        </div> 
                                      </div>

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

var bTab=false;
var table;

function show_local(){
  if ($("#id_nivel").val()=='S' || $("#id_nivel").val()=='L'){
      $("#td_local").show();
  }else{
       $("#td_local").hide();
  }
}

function graficar_gauge(valor){
     var echarte = echarts.init(document.getElementById('divMeter'));
     var option;

     option = {
      series: [
      {
        max: 3,
        type: 'gauge',
        axisLine: {
          lineStyle: {
            width: 30,
            color: [
            [0.32, '#7CFFB2'],
            [0.69, '#FDDD60'],
            [1, '#FF6E76']
            ]
          }
        },
        pointer: {
          itemStyle: {
            color: 'auto'
          }
        },
        axisTick: {
          distance: -30,
          length: 8,
          lineStyle: {
            color: '#fff',
            width: 2
          }
        },
        splitLine: {
          distance: -30,
          length: 30,
          lineStyle: {
            color: '#fff',
            width: 4
          }
        },
        axisLabel: {
          color: 'auto',
          distance: 40,
          fontSize: 20
        },
        detail: {
          valueAnimation: true,
          formatter: '{value} %',
          color: 'auto'
        },
        data: [
        {
          value: valor
        }
        ]
      }
      ]
    };

    echarte.setOption(option);

}

function graficar(valor){

  if (valor>=2){
    maximo=valor;
  }else{
    maximo=3;
  }

  $('#divMeter').highcharts({
          
          //////////////////////
          
          
        chart: {
      backgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(223, 239, 252)']
                ]
            },
      
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
      height: 299
      //shadow: true
        },
    
    
    
    
        title: {
            text: 'Indice Aedico ',
      
      style: {
                //color: '#FF00FF',
                fontWeight: 'bold',
        fontSize: '14px'
            }
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: maximo,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: '%'
            },
            plotBands: [{
                from: 0,
                to: 0.99,
                color: '#55BF3B' // green
            }, {
                from: 0.99,
                to: 1.99,
                color: '#DDDF0D' // yellow
            }, {
                from: 1.99,
                to: 100,
                color: '#DF5353' // red
            }
      
      
      ]
        },

        series: [{
            name: 'I.A.',
            data: [valor],
            tooltip: {
                valueSuffix: ' %'
            }
        }]

    },
        // Add some life
        function (chart) {
            
          
          /////////////
        });
        
}

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

function renderDataTable(){
    


                table=$('#tblris').DataTable(
                {
                  "initComplete": function(settings, json) {
                    //$("#loaderModal").hide();

                    //$('.dt-buttons').removeClass('btn-group'); 
                  },

                  dom: "Bltip",            
                  "buttons": [
                  
                  
                  {     
                    extend: 'excelHtml5',
                    className: "btn btn-success btn-sm",
                    text: '<i class="fa fa-file-excel-o "></i> Exportar',
                    exportOptions: {
                      modifier: {
                        page: 'all',
                        search : 'none'
                      },
                      columns: [ 0,1,2,3]
                    }                  
                  }, 

                  ],



                  orderCellsTop: true,
                  fixedHeader: true,
                  fixedColumns: true,
                  "lengthMenu": [ 5, 10, 25, 75, 100,10000],
                  "bProcessing": true,
                  "bJQueryUI": false,
                  //"responsive": true,            
                  "bInfo": true,
                  "bFilter": true,
                  language: {
                    "url": "../public/datatables.net.languages/Spanish.json",
                    "lengthMenu": '_MENU_ entries per page',
                    "search": '<i class="fa fa-search"></i>',
                    "paginate": {
                      "previous": '<i class="fa fa-angle-left"></i>',
                      "next": '<i class="fa fa-angle-right"></i>'
                    },
                  },

                  
                  "bDestroy": true,

                  /*"columnDefs": [
                  { "orderable": false, "targets": 0, "searchable": false },
                  { "orderable": true, "targets": 1, "searchable": true },
                  { "orderable": true, "targets": 2, "searchable": true},
                  { "orderable": false, "targets": 3, "searchable": true },
                  { "orderable": false, "targets": 4, "searchable": true },
                  { "orderable": false, "targets": 5, "searchable": true }


                  ],*/

                  "pagingType": 'numbers',
                  "bAutoWidth": false ,
                  "iDisplayLength": 25
                } 


                );
}

function filtrar(){

  strCatMes=$("#mes_report").val();
  strCatMes=strCatMes.toString();

  $.ajax({
      url: "../ajax/ficha_vivienda.php?op=reportAedico",
      dataType: "json",
      type: "post",
      data: {
        mes: strCatMes,
        anio: $("#anio_report").val(),
        tipo: $('#id_actividad').val().toString(),
        nivel: $('#id_nivel').val(),
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
          var tot_vi=0;
          var tot_vp=0;
          var tot_i=0;

          for (i=0;i<cnt;i++){
              var insp=data[i]['inspeccionados'];
              var posi=data[i]['positivos'];
              tot_vi=tot_vi+parseInt(insp);
              tot_vp=tot_vp+parseInt(posi);
              ind=0;
              if (parseInt(insp)>0){
                  var posi=data[i]['positivos'];
                  ind=(parseInt(posi)/parseInt(insp))*100;
              }

              nameClass="";
              if (ind<1){
                nameClass="success";
              }else if(ind<2){
                nameClass="warning";
              }else if(ind>=2){
                nameClass="danger";
              }
              
              rows=rows+"<tr><td>"+data[i]['ris']+"</td>"+"<td class='text-right'>"+data[i]['inspeccionados']+"</td>"+"<td class='text-right'>"+data[i]['positivos']+"</td>"+
                        "<td class='text-right "+nameClass+"'>"+ind.toFixed(3)+"</td></tr>";
              //data[i]['tot3']+"</td>"+"<td>"+data[i]['tot4']+"</td>"+"<td>"+data[i]['tot5']+"</td>"+"<td>"+data[i]['tot6']+"</td>"+"<td>"+
              //data[i]['tot7']+"</td>"+"<td>"+data[i]['tot8']+"</td>"+"<td>"+data[i]['tot9']+"</td></tr>";
              /*ris.push(data[i]['ris']);
              rw0=[0,i,data[i]['tot1']];
              rw1=[1,i,data[i]['tot2']];
              rw2=[2,i,data[i]['tot3']];
              rw3=[3,i,data[i]['tot4']];
              rw4=[4,i,data[i]['tot5']];
              rw5=[5,i,data[i]['tot6']];
              rw6=[6,i,data[i]['tot7']];
              rw7=[7,i,data[i]['tot8']];
              rw8=[8,i,data[i]['tot9']];

              datab.push(rw0,rw1,rw2,rw3,rw4,rw5,rw6,rw7,rw8);*/
          }

          if (tot_vp>0){
              tot_i=(tot_vp/tot_vi)*100;
          }  
          //console.log(tot_i);    
          if (bTab==true){
            //alert(bTab);
            //table.ajax.reload();
            table.destroy();
            //bTab=false;
            //return false;
          }  
          bTab=true;     

          $("#tot_vi").html(tot_vi);
          $("#tot_vp").html(tot_vp);
          $("#tot_i").html(tot_i.toFixed(3));
          $("#tb_results").html(rows);

          valor=tot_i.toFixed(3)
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

         renderDataTable()

          graficar_gauge(parseFloat(valor));




          
          return false;

          //var echarte = echarts.init(document.getElementById('echart_resumen'));
          var echarte = echarts.init(document.getElementById('divMeter'));

          var option;


          // prettier-ignore
          //tip=$('#tipo_indicador').val();

          //var tipo = [tip, tip+'2', tip+'3', tip+'4', tip+'5', tip+'6', tip+'7',tip+'8', tip+'9', ];

          option = {
            series: [
            {
              type: 'gauge',
              startAngle: 180,
              endAngle: 0,
              min: 0,
              max: 3,
              splitNumber: 8,
              axisLine: {
                lineStyle: {
                  width: 6,
                  
                  /*color: [
                  [0.25, '#FF6E76'],
                  [0.5, '#FDDD60'],
                  [0.75, '#58D9F9'],
                  [1, '#7CFFB2']
                  ]*/

                  /*[0.3, '#67e0e3'],
                  [0.69, '#37a2da'],
                  [1, '#fd666d']*/

                  color: [
                  [0.3, '#7CFFB2'],
                  [1.69, '#FDDD60'],
                  [1, '#FF6E76'],
                  
                  ]

                }
              },
              pointer: {
                icon: 'path://M12.8,0.7l12,40.1H0.7L12.8,0.7z',
                length: '12%',
                width: 20,
                offsetCenter: [0, '-60%'],
                itemStyle: {
                  color: 'auto'
                }
              },
              axisTick: {
                length: 12,
                lineStyle: {
                  color: 'auto',
                  width: 2
                }
              },
              splitLine: {
                length: 20,
                lineStyle: {
                  color: 'auto',
                  width: 5
                }
              },
              axisLabel: {
                color: '#464646',
                fontSize: 20,
                distance: -60,
                formatter: function (value) {
                  if (value === 0.45) {
                    //return 'A';
                  } else if (value === 0.625) {
                    //return 'B';
                  } else if (value === 0.375) {
                    //return 'C';
                  } else if (value === 0.125) {
                    //return 'D';
                  }
                  return '';
                }
              },
              title: {
                offsetCenter: [0, '-20%'],
                fontSize: 30
              },
              detail: {
                fontSize: 50,
                offsetCenter: [0, '0%'],
                valueAnimation: true,
                formatter: function (value) {
                  return Math.round(value ); //+ '分';
                },
                color: 'auto'
              },
              data: [
              {
                value: valor,
                name: 'I.A.'
              }
              ]
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

	
$(function () {

  $("#mes_report").selectpicker();

  //$("#mes_report").val($("#s_mes").val());
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


      /*$.getJSON('../ajax/tabla.php?op=list&id_tabla=18',function(data) {
      	var template = $('#tpl_actividades').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_actividad').html(html);
      	$('#id_actividad').selectpicker();
      });*/

      $.ajax( {
          url: '../ajax/tabla.php?op=list&id_tabla=18',
          //data:  parametros,
          dataType: 'json',
          async: false,
          success: function ( data ) {
            var template = $('#tpl_actividades').html();
            var html = Mustache.to_html(template, data);
            $("#id_actividad").html( html );
            $("#id_actividad").selectpicker();
          }
        } );




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