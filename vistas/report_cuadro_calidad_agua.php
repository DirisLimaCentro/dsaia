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

.my_circle {
  display: inline-block;
  width: 15px;
  height: 15px;

  border-radius: 50%;
}

.bg-rojo {
  color: #ed5565;
  background-color: #ed5565 ;
}

.bg-verde {

  color: #1ab394;
  background-color: #1ab394;
}

/*.bg-verde:before {
      content: "x";
  } */

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
                <h2>Vigilancia de la Calidad del Agua de Consumo Humano <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a><small></small></h2>
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
            <div class="x_content" >          	
                                          
                 <div class="row">                    
                  <div class="col-md-2">
                    <div class="form-group">
                      <label >Año</label>
                      <input type="number" value="<?=date('Y');?>" class="form-control pull-right" id="anio_report"  >
                    </div>
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12">
                    <label for="" class="col-form-label">&nbsp;</label>
                    <div class="form-group">
                      <a onclick="consultar();" class="btn btn-default btn-success btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span><i class="fa fa-filter "></i> Filtrar </span></a>
                    </div>
                  </div>
                  </div>
                  <br>

                  <div class="row">

                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="row ">

                            <div class="col-md-8 col-sm-12 col-xs-12">
                          
                        <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover  " style="width: 100%">
                          <thead>

                            <tr class="v-grid-header">

                              <th></th>
                              <th>RIS</th>
                              <th>Establecimiento</th>
                              <th class="text-center">Ene</th>
                              <th class="text-center">Feb</th>
                              <th class="text-center">Mar</th>
                              <th class="text-center">Abr</th>
                              <th class="text-center">May</th>
                              <th class="text-center">Jun</th>
                              <th class="text-center">Jul</th>
                              <th class="text-center">Ago</th>
                              <th class="text-center">Set</th>
                              <th class="text-center">Oct</th>
                              <th class="text-center">Nov</th>
                              <th class="text-center">Dic</th>
                              <th class="text-center">Total</th>
                            </tr>  
                          </thead>
                          <tbody id="tb_resumen"> 

                          </tbody>

                          <tfoot>
                          <tr>
                            
                           
                            <th colspan="3">Totales</th>
                            <th id="f1" class="text-center" style="font-weight: bold;"></th>
                            <th id="f2" class="text-center" style="font-weight: bold;"></th>
                            <th id="f3" class="text-center" style="font-weight: bold;"></th>
                            <th id="f4" class="text-center" style="font-weight: bold;"></th>
                            <th id="f5" class="text-center" style="font-weight: bold;"></th>
                            <th id="f6" class="text-center" style="font-weight: bold;"></th>
                            <th id="f7" class="text-center" style="font-weight: bold;"></th>
                            <th id="f8" class="text-center" style="font-weight: bold;"></th>
                            <th id="f9" class="text-center" style="font-weight: bold;"></th>
                            <th id="f10" class="text-center" style="font-weight: bold;"></th>
                            <th id="f11" class="text-center" style="font-weight: bold;"></th>
                            <th id="f12" class="text-center" style="font-weight: bold;"></th>
                            <th id="ftotal" class="text-center" style="font-weight: bold;"></th>
                            
                          </tr>
                        </tfoot>

                        </table>

                          </div>

                          <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="responsive"  id="echart_resumen" style="height:580px; ">

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


function consultar(){
    $.ajax({
      url: "../ajax/ficha_vivienda.php?op=reportCalidadAgua",
      dataType: "json",
      type: "post",
      data: {
       
        anio: $("#anio_report").val()
       
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
          var est = [];
          
          var totf=0;

          j=0;

          scol1=0;
          scol2=0;
          scol3=0;
          scol4=0;
          scol5=0;
          scol6=0;
          scol7=0;
          scol8=0;
          scol9=0;
          scol10=0;
          scol11=0;
          scol12=0;

          for (i=0;i<cnt;i++){
            var trow=0;
            j++;

            //bg-green 
            if (parseInt(data[i]['1'])>0) { clas1='bg-verde'; trow++; scol1++; }  else { clas1='bg-rojo'};
            if (parseInt(data[i]['2'])>0) { clas2='bg-verde'; trow++; scol2++;} else { clas2='bg-rojo'};
            if (parseInt(data[i]['3'])>0) { clas3='bg-verde'; trow++; scol3++;} else { clas3='bg-rojo'};
            if (parseInt(data[i]['4'])>0) { clas4='bg-verde'; trow++; scol4++;} else { clas4='bg-rojo'};
            if (parseInt(data[i]['5'])>0) { clas5='bg-verde'; trow++; scol5++;} else { clas5='bg-rojo'};
            if (parseInt(data[i]['6'])>0) { clas6='bg-verde'; trow++; scol6++;} else { clas6='bg-rojo'};
            if (parseInt(data[i]['7'])>0) { clas7='bg-verde'; trow++; scol7++;} else { clas7='bg-rojo'};
            if (parseInt(data[i]['8'])>0) { clas8='bg-verde'; trow++; scol8++;} else { clas8='bg-rojo'};
            if (parseInt(data[i]['9'])>0) { clas9='bg-verde'; trow++; scol9++;} else { clas9='bg-rojo'};
            if (parseInt(data[i]['10'])>0) { clas10='bg-verde'; trow++; scol10++;} else { clas10='bg-rojo'};
            if (parseInt(data[i]['11'])>0) { clas11='bg-verde'; trow++; scol11++;} else { clas11='bg-rojo'};
            if (parseInt(data[i]['12'])>0) { clas12='bg-verde'; trow++; scol12++;} else { clas12='bg-rojo'};
            

            totf=totf+trow;
            if (trow>0){
              est.push(data[i]['establecimiento']);
              datab.push(trow);
            }  
              rows=rows+"<tr><td class='text-right' >"+j.toString()+"</td><td>"+data[i]['ris']+"</td><td>"+data[i]['establecimiento']+
              "</td><td class='text-center'><div class='my_circle "+clas1+"'></div> </td>"+
              "<td class='text-center'><div class='my_circle "+clas2+"'></div></td><td class='text-center'><div class='my_circle "+clas3+"'></div></td>"+
              "<td class='text-center'><div class='my_circle "+clas4+"'></div></td>"+
              "<td class='text-center'><div class='my_circle "+clas5+"'></div></td><td class='text-center'><div class='my_circle "+clas6+"'></div></td>"+
              "<td class='text-center'><div class='my_circle "+clas7+"'></div></td><td class='text-center'><div class='my_circle "+clas8+"'></div></td>"+
              "<td class='text-center'><div class='my_circle "+clas9+"'></div></td><td class='text-center'><div class='my_circle "+clas10+"'></div></td>"+
              "<td class='text-center'><div class='my_circle "+clas11+"'></div></td><td class='text-center'><div class='my_circle "+clas12+"'></div></td><td class='text-center'><strong>"+trow+"</strong></td></tr>";
             
          }
          /*rows=rows+"<tr>"+
                  "<td class='text-center v-grid-header' colspan='3'><strong>Totales</strong></td>"+
                  "<td class='text-center'><strong>"+scol1+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol2+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol3+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol4+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol5+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol6+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol7+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol8+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol9+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol10+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol11+"</strong></td>"+
                  "<td class='text-center'><strong>"+scol12+"</strong></td>"+
                  "<td class='text-center'><strong>"+totf+"</strong></td></tr>";*/
          $("#f1").html(scol1);
          $("#f2").html(scol2);
          $("#f3").html(scol3);
          $("#f4").html(scol4);
          $("#f5").html(scol5);
          $("#f6").html(scol6);
          $("#f7").html(scol7);
          $("#f8").html(scol8);
          $("#f9").html(scol9);
          $("#f10").html(scol10);
          $("#f11").html(scol11);
          $("#f12").html(scol12);
          $("#ftotal").html(totf);


          $("#tb_resumen").html(rows);

          $(".bg-verde").html('x');

          if (bTab==true){

            //table.ajax.reload();
            table.destroy();
            //bTab=false;
            //return false;
          }  
          bTab=true;  


          var echarte = echarts.init(document.getElementById('echart_resumen'));
          var option;
          option = {
             /*toolbox: {
              feature: {
                dataView: { show: true, readOnly: false },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
              }
            },*/
           yAxis: [
            {
              type: 'category',
              data: est,

              axisLabel: {
                //rotate: 38,
                fontSize: 7,
                width: '200%',
                margin: 1,
                //inside: true,
                overflow: 'breakAll'
              }
              
            }
            ],

          xAxis: {
              type: 'value',
              //interval: 0
          },
          series: [
          {
            data: datab,
            type: 'bar',
            label:{
              show: true
            }
            //barWidth: "50%"
            }
            ]
          };

           echarte.setOption(option);




                table=$('#tbllistado').DataTable(
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
                      columns: [ 1,2,3,4, 5,6,7,8,9,10,11,12,13,14,15]
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

                  "columnDefs": [
                  { "orderable": false, "targets": 0, "searchable": false },
                  { "orderable": false, "targets": 1, "searchable": false },
                  { "orderable": false, "targets": 2, "searchable": false},
                  { "orderable": false, "targets": 3, "searchable": false },
                  { "orderable": false, "targets": 4, "searchable": false },
                  { "orderable": false, "targets": 5, "searchable": false },
                  { "orderable": false, "targets": 6, "searchable": false },
                  { "orderable": false, "targets": 7, "searchable": false },
                  { "orderable": false, "targets": 8, "searchable": false },
                  { "orderable": false, "targets": 9, "searchable": false },
                  { "orderable": false, "targets": 10, "searchable": false },
                  { "orderable": false, "targets": 11, "searchable": false },
                  { "orderable": false, "targets": 12, "searchable": false },
                  { "orderable": false, "targets": 13, "searchable": false },
                  { "orderable": false, "targets": 14, "searchable": false },
                  { "orderable": false, "targets": 15, "searchable": false }

                  ],

                  "pagingType": 'numbers',
                  "bAutoWidth": false ,
                  "iDisplayLength": 25
                } 


                );



          
      }
    });
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

function filtrar(){

  $.ajax({
      url: "../ajax/ficha_vivienda.php?op=reportCobertura",
      dataType: "json",
      type: "post",
      data: {
        mes: $("#mes_report").val(),
        anio: $("#anio_report").val(),
        tipo: $('#id_actividad').val()
        //nivel: $('#id_nivel').val()
      },
      processData: true,
      success: function (data) {
          //console.log(data[1]['ris']);
          cnt=data.length;
          rows="";
          var tipo = [];
          var est = [];
          var dataa = [];
          var datab = [];

          var rw=[];
          var tot_vi=0;
          var tot_vp=0;
          var tot_i=0;

          for (i=0;i<cnt;i++){
              var insp=data[i]['inspeccionados'];
              var posi=data[i]['positivos'];
              var progra=data[i]['programados'];

              //tot_vi=tot_vi+parseInt(insp);
              //tot_vp=tot_vp+parseInt(posi);
              ind=0;
              cob=0;
              if (parseInt(insp)>0){                  
                  ind=(parseInt(posi)/parseInt(insp))*100;
              }
              if (parseInt(progra)>0){                  
                  cob=(parseInt(insp)/parseInt(progra))*100;
              }

              est.push(data[i]['establecimiento']);
              dataa.push(ind.toFixed(2));
              datab.push(cob.toFixed(2));
              
              //rows=rows+"<tr><td>"+data[i]['ris']+"</td>"+"<td class='text-right'>"+data[i]['inspeccionados']+"</td>"+"<td class='text-right'>"+data[i]['positivos']+"</td>"+
                        //"<td class='text-right "+nameClass+"'>"+ind.toFixed(3)+"</td></tr>";
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

          


          /*if (tot_vp>0){
              tot_i=(tot_vp/tot_vi)*100;
          }          
          $("#tot_vi").html(tot_vi);
          $("#tot_vp").html(tot_vp);
          $("#tot_i").html(tot_i.toFixed(3));
          $("#tb_results").html(rows);
          valor=tot_i.toFixed(3)

          graficar_gauge(parseFloat(valor));*/
          var echarte = echarts.init(document.getElementById('echart_resumen'));

          var option;


          option = {
            tooltip: {
              trigger: 'axis',
              axisPointer: {
                type: 'cross',
                crossStyle: {
                  color: '#999'
                }
              }
            },
            toolbox: {
              feature: {
                dataView: { show: true, readOnly: false },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
              }
            },
            legend: {
              data: ['Cobertura',  'I.A.']
            },
            xAxis: [
            {
              type: 'category',
              data: est,

              axisPointer: {
                type: 'shadow'
              },
              axisLabel: {
                rotate: 38,
                fontSize: 9
              }
            }
            ],
            yAxis: [
            {
              type: 'value',
              name: 'Cobertura',
              //min: 0,
              //max: 250,
              //interval: 50,
              axisLabel: {

                formatter: '{value} '
              }
            },
            {
              type: 'value',
              name: 'I.A.',
              //min: 0,
              //max: 25,
              //interval: 5,
              axisLabel: {
                formatter: '{value} '
              }
            }
            ],
            series: [
            {
              name: 'Cobertura',
              type: 'bar',
              label : {
                show: true,
                rotate: 90,
                position: 'top'
              },
              tooltip: {
                valueFormatter: function (value) {
                  return value + ' %';
                }
              },
              data: datab
            },
            /*{
              name: 'Precipitation',
              type: 'bar',
              tooltip: {
                valueFormatter: function (value) {
                  return value + ' ml';
                }
              },
              data: [
              2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3
              ]
            },*/
            {
              name: 'I.A.',
              type: 'line',
              label : {
                show: true,
                rotate: 90,
                
              },
              yAxisIndex: 1,
              tooltip: {
                valueFormatter: function (value) {
                  return value + ' %';
                }
              },
              data: dataa
            }
            ]
          };


          echarte.setOption(option);






          
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
      	//$('#id_actividad').selectpicker();
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
});	

</script>

<script id="tpl_actividades" type="text/template">
  {{#tablas}}<option value='{{id}}' >{{nombre}}</option>{{/tablas}}
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