<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 require 'header.php';
?>

    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">
  </style>
  <div class="right_col" role="main">
    <!-- Main content -->
    <section class="row">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel ">

            <div class="x_title">
                <h2>Items sin stock <small></small></h2>
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
                        <div class="x_content table-responsive">                        
                       <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
                        <thead>
                          <tr class="v-grid-header">
                            <th></th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Unidad Medida</th>  
                            <th>Precio</th>
                            <th>Stock Real</th>
                          </tr> 
                        </thead>
                        <tbody id="table_body"> 
                          <tr>                          
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>

                        </tr>

                        </tbody>
                        <!--<tfoot>
                          <tr>
                            
                            <th colspan="31">Total</th>
                            <th>&nbsp;</th>
                            
                          </tr>
                        </tfoot>-->
                      </table>

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

  <!--Fin-Contenido-->
  <?php

require 'footer.php';
?>

<!--<script type="text/javascript" src="scripts/stock.js"></script>-->

<script>

function consultaCuadro(){
  //alert($("#id_medicamento").val());
  //return false;
  var parametros = {};
    $.ajax( {
    url: '../ajax/items.php?op=listSinStock',
    data:  parametros,
    dataType: 'html',
    success: function ( json ) {
      //$("#cboalmacen").html( json );
        $("#table_body").html(json);
        
        var tablei=$('#tbllistado').DataTable({

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
                columns: [ 1, 2, 3, 4, 5,6,7]
              }                  
            }, 

            ],

            orderCellsTop: true,
            fixedHeader: true,
            fixedColumns: true,
            "lengthChange": false,
            "lengthMenu": [ 5, 10, 25, 75, 100],
            "bProcessing": true,
            "bJQueryUI": false,
            "responsive": true,            
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

              columnDefs:[
            {orderable: false, targets: 0, searchable: false},
            {orderable: true, targets: 1, searchable: true},
            {orderable: true, targets: 2, searchable: true},
            {orderable: true, targets: 3, searchable: true},
            {orderable: true, targets: 4, searchable: true},
            {orderable: true, targets: 5, searchable: true},

            
        ],


            //orderCellsTop: true,
            //fixedHeader: true,  
            "bDestroy": true,

            "pagingType": 'numbers',
            "bAutoWidth": false ,
            "iDisplayLength": 10//Paginación
          });





      }    
    } );

}

function ver(){
  limpiar();

  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {
  consultaCuadro();

});




</script>


<?php
ob_end_flush();
?>
