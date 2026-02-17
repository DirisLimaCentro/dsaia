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
    background-color: #ed5565;
  }

  .bg-verde {

    color: #1ab394;
    background-color: #1ab394;
  }

  /*.bg-verde:before {
      content: "x";
  } */
  
</style>
<div class="right_col" role="main">
  <!-- Main content -->


  <section class="row">

    <div class="row">

      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Nivel</label>
          <select class='form-control' id='tipo_nivel'>
            <option value="D" selected>Distrito</option>
            <option value="E">Establecimiento</option>

          </select>
        </div>
      </div>


      <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Mes</label>
          <select class='form-control' id='mes_report'>
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


      <div class="col-md-2 col-sm-12 col-xs-12">

        <div class="form-group">
          <label for="ruc" class="col-form-label">Año:</label>
          <div class="input-group">
            <input type="number" class="form-control text-uppercase" id="anio" value='<?= date('Y'); ?>'>

            <div class="input-group-btn">
              <button class="btn btn-success" id="btnfind" type="button" onclick="consultar1();">
                <i class="glyphicon glyphicon-filter" title="Filtar por año"></i> Ejecutar Filtro
              </button>

            </div>
          </div>
        </div>

      </div>




    </div>

    <div class="row">
      <!--<div class="col-md-1 col-sm-3 col-xs-3">
      	</div>-->

      <div class="col-md-6 col-sm-12 col-xs-12">

        <div class="x_panel ">

          <div class="x_title">
            <h2>Resultado Inspeccion Sanitaria de Piscinas<small></small></h2>
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
          <div class="x_content">

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <table id="tblris" class="table table-striped table-bordered dt-responsive table-hover ">
                  <thead>
                    <tr class="v-grid-header">
                      <th id="td_nivel">DISTRITO</th>
                      <th>PISCINA</th>
                      <th>INSPECCIONES</th>
                    </tr>
                  </thead>
                  <tbody id="tb_results">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr class="v-grid-header">
                      <td>Totales</td>
                      <td class="text-right"></td>
                      <td class="text-right" style="font-weight: bold;" id="tot_cantidad">0</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="responsive" id="grafica1" style="height:400px; ">

                </div>
              </div>
            </div>

            <!--Fin centro -->
          </div><!-- /.box -->



        </div><!-- /.col -->

      </div>

      <div class="col-md-6 col-sm-12 col-xs-12">

        <div class="x_panel ">

          <div class="x_title">
            <h2>Resultado Condición Sanitaria<small></small></h2>
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
          <div class="x_content">

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <table id="tblgraph2" class="table table-striped table-bordered dt-responsive table-hover ">
                  <thead>
                    <tr class="v-grid-header">
                      <th id="td_nivel_2">DISTRITO</th>
                      <th>PISCINA</th>
                      <th>CONDICIÓN</th>
                    </tr>
                  </thead>
                  <tbody id="tb_results_2">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  <!--<tfoot>
                    <tr class="v-grid-header">
                      <td>Totales</td>
                      <td class="text-right"></td>
                      <td class="text-right" style="font-weight: bold;" id="tot_cantidad">0</td>
                    </tr>
                  </tfoot>-->
                </table>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="responsive" id="grafica2" style="height:400px; ">

                </div>
              </div>
            </div>

            <!--Fin centro -->
          </div><!-- /.box -->



        </div><!-- /.col -->

      </div>


    </div><!-- /.row -->





  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<!--Fin-Contenido-->
<?php

require 'footer.php';
?>
<script type="text/javascript">
  var bTab = false;
  var table;
  var table2;
  var chr;

  function clean() {
    $("#grafica1").empty();
    $(".highcharts-container").remove();
    //$("#grafica1").html("");
  }


  function renderGrafica(aCat, aSal, aNos) {

    Highcharts.chart('grafica2', {
      chart: {
        type: 'column',
        //styledMode: true
      },
      title: {
        text: 'Condicion por Distrito'
      },
      subtitle: {
        text: ''
      },
      xAxis: {
        categories: aCat,
        crosshair: true,
        labels: {
          rotation: -55
        }
      },
      yAxis: {
        //className: 'highcharts-color-0',
        title: {
          useHTML: true,
          text: 'Cantidad'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true            
          }
        },
        column: {
          pointPadding: 0.2,
          borderWidth: 0,
          borderRadius: 5
        }
      },
      series: [{
        name: 'Saludable',
        data: aSal,
        color: '#82e0aa'

      }, {
        name: 'No Saludable',
        data: aNos,
        color: '#f5b7b1'

      }]
    });

  }

  function render(data_dis, data_dril) {

    if ($("#tipo_nivel").val() == 'D') {
      var grupo = "Distritos";
      var title = "Inspecciones por Distritos";
    } else if ($("#tipo_nivel").val() == 'E') {
      var grupo = "Establecimientos";
      var title = "Inspecciones por EE.SS.";
    }


    new Highcharts.chart('grafica1', {
      chart: {
        type: 'column'
      },
      title: {
        align: 'left',
        text: title
      },
      subtitle: {
        align: 'left',
        text: ''
      },
      accessibility: {
        announceNewData: {
          enabled: true
        }
      },
      xAxis: {
        type: 'category',
        labels: {
          rotation: -55
        }
      },
      yAxis: {
        title: {
          text: 'Total inspecciones'
        }

      },
      legend: {
        enabled: false
      },
      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true,
            //format: '{point.y:.1f}%'
          }
        }
      },

      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        //pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
      },

      series: [{
        name: grupo,
        colorByPoint: true,
        data: data_dis
      }],
      drilldown: {
        breadcrumbs: {
          position: {
            align: 'right'
          }
        },
        series: data_dril
      }
    });

    //$('#grafica1').highcharts().redraw();
  }

  function renderchart(data, chart, title, colorh) {
    cnt = data.length;
    rows = "";
    var tipo = [];
    var est = [];
    var dataa = [];
    var datab = [];

    var rw = [];
    var tot_vi = 0;
    var tot_vp = 0;
    var tot_i = 0;

    for (i = 0; i < cnt; i++) {
      var insp = data[i]['cantidad'];
      ind = 0;
      ind = insp;

      est.push(data[i]['title']);
      dataa.push(parseInt(ind));

    }

    echarte = echarts.init(document.getElementById(chart));
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
          dataView: {
            show: true,
            readOnly: false
          },
          magicType: {
            show: true,
            type: ['line', 'bar']
          },
          restore: {
            show: true
          },
          saveAsImage: {
            show: true
          }
        }
      },
      legend: {
        data: [title]
      },
      xAxis: [{
        type: 'category',
        data: est,

        axisPointer: {
          type: 'shadow'
        },
        axisLabel: {
          rotate: 30,
          fontSize: 10,
          fontWeight: 'bold'
        }
      }],
      yAxis: [{
        type: 'value',
        //name: title,             
        axisLabel: {

          formatter: '{value} '
        }
      }],
      series: [{
          name: title,
          type: 'bar',
          color: colorh,
          label: {
            show: true,
            //rotate: 90,
            position: 'top'
          },
          tooltip: {
            valueFormatter: function(value) {
              return value; // + ' %';
            }
          },
          data: dataa
        },


      ]
    };


    echarte.setOption(option);
  }


  function renderDataTable() {



    table = $('#tblris').DataTable({
      "initComplete": function(settings, json) {},
      dom: "Bltip",
      "buttons": [{
        extend: 'excelHtml5',
        className: "btn btn-success btn-sm",
        text: '<i class="fa fa-file-excel-o "></i> Exportar',
        exportOptions: {
          modifier: {
            page: 'all',
            search: 'none'
          },
          columns: [0, 1, 2]
        }
      }, ],
      orderCellsTop: true,
      fixedHeader: true,
      fixedColumns: true,
      "lengthMenu": [5, 10, 25, 75, 100, 10000],
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
      "pagingType": 'numbers',
      "bAutoWidth": false,
      "iDisplayLength": 5
    });

    table2 = $('#tblgraph2').DataTable({
      "initComplete": function(settings, json) {},
      dom: "Bltip",
      "buttons": [{
        extend: 'excelHtml5',
        className: "btn btn-success btn-sm",
        text: '<i class="fa fa-file-excel-o "></i> Exportar',
        exportOptions: {
          modifier: {
            page: 'all',
            search: 'none'
          },
          columns: [0, 1, 2]
        }
      }, ],
      orderCellsTop: true,
      fixedHeader: true,
      fixedColumns: true,
      "lengthMenu": [5, 10, 25, 75, 100, 10000],
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
      "pagingType": 'numbers',
      "bAutoWidth": false,
      "iDisplayLength": 5
    });

  }

  function consultar1() {

    $("#loaderModal").show();

    if (bTab == true) {
      table.destroy();
      table2.destroy();
      //$('#grafica1').highcharts().destroy();
      //$("#grafica1").empty(); 
      //$( ".highcharts-container" ).remove();
      //chr.destroy();  
      //$("#grafica1").html("");
      //highcharts-container
      //$('.chart', this).highcharts().reflow(); 
    }
    bTab = true;
    sum = 0;

    if ($("#tipo_nivel").val() == 'D') {
      var opt = "reportControlPiscinasxDistrito";
      $("#td_nivel").html("DISTRITO");
      $("#td_nivel_2").html("DISTRITO");
    } else if ($("#tipo_nivel").val() == 'E') {
      var opt = "reportControlPiscinasxEstablecimiento";
      $("#td_nivel").html("EE.SS.");
      $("#td_nivel_2").html("EE.SS.");
    }


    $.ajax({
      url: "../ajax/ficha_vigilancia_piscina.php?op=" + opt,
      dataType: "json",
      type: "post",
      data: {
        anio: $("#anio").val(),
        mes: $("#mes_report").val()
      },
      processData: true,
      success: function(data) {

        adat = [];
        adril = [];
        dat = data.array_data;
        datd = data.array_drill;
        datcon = data.array_condicion;

        categ = [];
        valor = [];

        aSal = [];
        aNoSal = [];

        saptos = 0;
        snoaptos = 0;
        //console.log(datcon);

        rows = '';
        cat = '';
        cant = datcon.length;
        for (i = 0; i < cant; i++) {
          //cn = parseInt(dat[i]['cantidad']);
          classn = (datcon[i]['resultado'] == 'SALUDABLE') ? 'success' : 'danger';
          rows = rows + "<tr><td>" + datcon[i]['distrito'] + "</td>" + "<td >" + datcon[i]['nombre'] + "</td>" + "<td class='" + classn + "' >" + datcon[i]['resultado'] + "</td></tr>";
          if (cat != datcon[i]['distrito']) {
            categ.push(datcon[i]['distrito']);
          }
          if (i == 0) {
            cat = datcon[i]['distrito'];
          }

          if (cat != datcon[i]['distrito']) {

            valor.push({
              nombre: cat,
              saludables: saptos,
              nosaludables: snoaptos
            });

            aSal.push(saptos);
            aNoSal.push(snoaptos);

            saptos = 0;
            snoaptos = 0;
            cat = datcon[i]['distrito'];
            if (datcon[i]['resultado'] == 'SALUDABLE') {
              saptos++;
            } else {
              snoaptos++;
            }

            if (i + 1 == cant) {
              valor.push({
                nombre: cat,
                saludables: saptos,
                nosaludables: snoaptos
              });
              aSal.push(saptos);
              aNoSal.push(snoaptos);
            }


          } else {
            if (datcon[i]['resultado'] == 'SALUDABLE') {
              saptos++;
            } else {
              snoaptos++;
            }
            if (i + 1 == cant) {
              valor.push({
                nombre: cat,
                saludables: saptos,
                nosaludables: snoaptos
              });
              aSal.push(saptos);
              aNoSal.push(snoaptos);
            }

          }


        }

        //console.log(valor);
        //console.log(aSal);

        $("#tb_results_2").html(rows);



        cnt = dat.length;

        for (i = 0; i < cnt; i++) {
          cn = parseInt(dat[i]['cantidad']);
          sum = sum + cn;
          adat.push({
            name: dat[i]['nombre'],
            y: cn,
            drilldown: dat[i]['nombre']
          });
        }

        cntx = datd.length;
        dis = '';
        aval = [];
        rows = '';
        //console.log(datd);

        for (i = 0; i < cntx; i++) {
          //adril.push({'name':datd[i]['nombre'],'y':datd[i]['cantidad'],'drilldown':datd[i]['nombre'] });
          rows = rows + "<tr><td>" + datd[i]['distrito'] + "</td>" + "<td >" + datd[i]['nombre'] + "</td>" + "<td class='text-right'>" + datd[i]['cantidad'] + "</td></tr>";


          if (dis == '') {
            dis = datd[i]['distrito'];
          }
          if (dis != datd[i]['distrito']) {
            //console.log("Entro");
            adril.push({
              name: dis,
              id: dis,
              data: aval
            });
            aval = [];
            dis = datd[i]['distrito'];
            cnt = datd[i]['cantidad'];
            it = [datd[i]['nombre'], parseInt(cnt)];
            aval.push(it);
          } else {
            //console.log("No Entro");             
            cnt = datd[i]['cantidad'];
            it = [datd[i]['nombre'], parseInt(cnt)];
            aval.push(it);
          }
          if ((i + 1) == cntx) {
            adril.push({
              name: dis,
              id: dis,
              data: aval
            });
          }
        }

        $("#tb_results").html(rows);
        $("#tot_cantidad").html(sum.toString());

        renderDataTable()

        //console.log(adril);
        render(adat, adril);
        renderGrafica(categ, aSal, aNoSal);
        //console.log(adril);

        //dataph=data.array_ph;
        //datatur=data.array_tur;

        //datbac=data.array_bac;
        //dattan=data.array_tan;
        //datfun=data.array_fun;


        //renderchart(dataclo,'grafica1','Resultados parametro Cloro','#a3a6e8');
        //renderchart(dataph,'grafica2','Resultados parametro pH','#69bf64');
        //renderchart(datatur,'grafica3','Resultados parametro turbidez','#9fc5e8');

        /*renderchart(datbac,'grafica4','Examen Bacteriologico','#ea9999');
        renderchart(dattan,'grafica5','EESS que cuentan con tanque y/o cisterna','#9fc5e8');
        renderchart(datfun,'grafica6','Funcionamiento de tanques y/o cisternas','#38761d');*/

        $("#loaderModal").hide();


      }
    });

  }







  function graficar_gauge(valor) {
    var echarte = echarts.init(document.getElementById('divMeter'));
    var option;

    option = {
      series: [{
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
        data: [{
          value: valor
        }]
      }]
    };

    echarte.setOption(option);

  }

  function graficar(valor) {

    if (valor >= 2) {
      maximo = valor;
    } else {
      maximo = 3;
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
              linearGradient: {
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
              },
              stops: [
                [0, '#FFF'],
                [1, '#333']
              ]
            },
            borderWidth: 0,
            outerRadius: '109%'
          }, {
            backgroundColor: {
              linearGradient: {
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
              },
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
      function(chart) {


        /////////////
      });

  }

  function change_headers() {
    $("#tb_results").html("");
    t = $("#tipo_indicador").val();
    if (t == 'I') {
      $("#hea1").html('I');
      $("#hea2").html('I2');
      $("#hea3").html('I3');
      $("#hea4").html('I4');
      $("#hea5").html('I5');
      $("#hea6").html('I6');
      $("#hea7").html('I7');
      $("#hea8").html('I8');
      $("#hea9").html('I9');
    } else if (t == 'P') {
      $("#hea1").html('P');
      $("#hea2").html('P2');
      $("#hea3").html('P3');
      $("#hea4").html('P4');
      $("#hea5").html('P5');
      $("#hea6").html('P6');
      $("#hea7").html('P7');
      $("#hea8").html('P8');
      $("#hea9").html('P9');
    } else {
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

  function filtrar() {

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
      success: function(data) {
        //console.log(data[1]['ris']);
        cnt = data.length;
        rows = "";
        var tipo = [];
        var est = [];
        var dataa = [];
        var datab = [];

        var rw = [];
        var tot_vi = 0;
        var tot_vp = 0;
        var tot_i = 0;

        for (i = 0; i < cnt; i++) {
          var insp = data[i]['inspeccionados'];
          var posi = data[i]['positivos'];
          var progra = data[i]['programados'];

          //tot_vi=tot_vi+parseInt(insp);
          //tot_vp=tot_vp+parseInt(posi);
          ind = 0;
          cob = 0;
          if (parseInt(insp) > 0) {
            ind = (parseInt(posi) / parseInt(insp)) * 100;
          }
          if (parseInt(progra) > 0) {
            cob = (parseInt(insp) / parseInt(progra)) * 100;
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
              dataView: {
                show: true,
                readOnly: false
              },
              magicType: {
                show: true,
                type: ['line', 'bar']
              },
              restore: {
                show: true
              },
              saveAsImage: {
                show: true
              }
            }
          },
          legend: {
            data: ['Cobertura', 'I.A.']
          },
          xAxis: [{
            type: 'category',
            data: est,

            axisPointer: {
              type: 'shadow'
            },
            axisLabel: {
              rotate: 38,
              fontSize: 9
            }
          }],
          yAxis: [{
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
          series: [{
              name: 'Cobertura',
              type: 'bar',
              label: {
                show: true,
                rotate: 90,
                position: 'top'
              },
              tooltip: {
                valueFormatter: function(value) {
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
              label: {
                show: true,
                rotate: 90,

              },
              yAxisIndex: 1,
              tooltip: {
                valueFormatter: function(value) {
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
          series: [{
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
              formatter: function(value) {
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
              formatter: function(value) {
                return Math.round(value); //+ '分';
              },
              color: 'auto'
            },
            data: [{
              value: valor,
              name: 'I.A.'
            }]
          }]
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

  function to_pdf() {

    var cntProv = document.getElementById('id_area').length;

    strEmpresas = $("#id_empresa").val();

    strProveedores = $("#id_area").val();
    strProveedores = strProveedores.toString();

    var aProv = strProveedores.split(",");
    var cntSel = aProv.length;

    if (cntProv == cntSel) {
      strProv = "*";
    } else {
      strProv = strProveedores;
    }

    var cntPer = document.getElementById('id_personal').length;
    strPersona = $("#id_personal").val();
    strPersona = strPersona.toString();
    var aPer = strPersona.split(",");
    var cntSel = aPer.length;
    if (cntPer == cntSel) {
      strPer = "*";
    } else {
      strPer = strPersona;
    }

    var cntCat = document.getElementById('id_insumo').length;
    strCat = $("#id_insumo").val();
    strCat = strCat.toString();
    var aCat = strCat.split(",");
    var cntSel = aCat.length;
    if (cntCat == cntSel) {
      strCat = "*";
    } else {
      //strCat=strPersona;
    }




    document.getElementById('aDwn').setAttribute('href', "../reportes/pdfSalidas.php?desde=" + $("#fecha_desde").val() + "&hasta=" + $("#fecha_hasta").val() + "&id_empresa=" + strEmpresas.toString() + "&id_local=" + strProv + "&id_personal=" + strPer + "&id_catalogo=" + strCat);
    document.getElementById('aDwn').click();
  }

  function to_excel() {

    var cntProv = document.getElementById('id_area').length;

    strEmpresas = $("#id_empresa").val();

    strProveedores = $("#id_area").val();
    strProveedores = strProveedores.toString();

    var aProv = strProveedores.split(",");
    var cntSel = aProv.length;

    if (cntProv == cntSel) {
      strProv = "*";
    } else {
      strProv = strProveedores;
    }

    var cntCat = document.getElementById('id_insumo').length;
    strCat = $("#id_insumo").val();
    strCat = strCat.toString();
    var aCat = strCat.split(",");
    var cntSel = aCat.length;
    if (cntCat == cntSel) {
      strCat = "*";
    } else {
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

    document.getElementById('aDwn').setAttribute('href', "../reportes/xlsDescargos.php?desde=" + $("#fecha_desde").val() + "&hasta=" + $("#fecha_hasta").val() + "&id_empresa=" + strEmpresas.toString() + "&id_local=" + strProv + "&id_catalogo=" + strCat);
    document.getElementById('aDwn').click();
  }


  $(function() {
    $("#mes_report").val($("#s_mes").val());

    //consultar1();
    //consultar2();
    //consultar3();

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
  {{#tablas}}
    <option value='{{id}}'>{{nombre}}</option>
  {{/tablas}}
</script>

<script id="tpl_areas" type="text/template">
  {{#locales}}
    <option value='{{id}}' selected>{{nombre}}</option>
  {{/locales}}
</script>

<script id="tpl_personal" type="text/template">
  {{#empresas}}
    <option value='{{id}}' selected>{{nombre}}</option>
  {{/empresas}}
</script>
<script id="tpl_catalogo" type="text/template">
  {{#catalogo}}
    <option value='{{id}}' selected>{{nombre}}</option>
  {{/catalogo}}
</script>
<?php
ob_end_flush();
?>