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
                <h2>Reporte de Lotes por Vencer <small></small></h2>
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
                      
                     
                      <div class="col-md-2 col-xs-12">
                        <div class="form-group">
                          <label for="nombre_comercial" class="col-form-label">Cantidad Meses:</label>
                          <input type="number" class="form-control text-uppercase" id="meses" placeholder="Meses" value="3" required>
                        </div>
                      </div>
                      

                     <div class="col-md-2 col-xs-12">
                      <div class="form-group align-self-end">
                        <label for="nombre_comercial" class="col-form-label"><br>&nbsp</label>
                        <button type="button" id="btn" class="btn btn-success btn-sm" onclick="consultarxVencer();"><i class="fa fa-eye"></i> Consultar</button> 
                      </div>
                    </div>

                  </div>

                  <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="x_content table-responsive">                        
                       <table id="tbllistado" class="table table-striped table-bordered dt-responsive table-hover " cellspacing="0" style="width: 100%">
                        <thead>
                          <tr class="v-grid-header">
                            <th></th>
                            <th>Item</th>
                            <th>Codigo</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Lote</th>
                            <th>Unidad de Medida</th>
                            <th>Stock</th>
                            <th>Fecha Vencimiento</th>
                          </tr> 
                        </thead>
                        <tbody id="table_body"> 
                          <tr>
                          <th scope="row">&nbsp;</th>
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

function consultarxVencer(){
  //alert($("#id_medicamento").val());
  //return false;
  var parametros = {"meses":$("#meses").val()};
    $.ajax( {
    url: '../ajax/lotes.php?op=listLotesxVencer',
    data:  parametros,
    dataType: 'html',
    success: function ( json ) {
      //$("#cboalmacen").html( json );
        $("#table_body").html(json);
        
      }    
    } );

}

function ver(){
  limpiar();

  $('#modalNew').modal('show')
  //$("#nombre").focus();
}

$(function () {
  /*$("#cboalmacen").chosen({
       enable_split_word_search:true,
       search_contains:true,
       width: '100%',
       disable_search: true
  }).trigger("chosen:updated");*/


/*$("#id_cliente").chosen({
              enable_split_word_search:true,
              search_contains:true,
              width: '100%',
              disable_search: true
        }).trigger("chosen:updated");*/
  /*$(".select-box").chosen(

    );*/
/*$("#id_medicamento").chosen({
              enable_split_word_search:true,
              search_contains:true,
              width: '100%',
              disable_search: false
  }).trigger("chosen:updated");*/

/*$("#nmes").chosen({
              enable_split_word_search:true,
              search_contains:true,
              width: '100%',
              disable_search: true
  }).trigger("chosen:updated");*/



 /* $('.chosen-search-input').autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: "../ajax/stock.php?op=listMedicamentos&id_almacen="+$("#cboalmacen").val()+"&name="+request.term,
        dataType: "json",
        success: function( data ) {
          $('#id_medicamento').empty();
          $('#id_medicamento').append('<option value="*">--Todos--</option>');
          response( $.map( data, function( item ) {
            $('#id_medicamento').append('<option value="'+item.id+'">' + item.text + '</option>');
          }));
          $("#id_medicamento").trigger("chosen:updated");
        }
   });
    }

  });*/




});




</script>


<?php
ob_end_flush();
?>
