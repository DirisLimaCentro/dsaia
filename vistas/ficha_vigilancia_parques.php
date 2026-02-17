<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 require 'header.php';
 
?>
<style type="text/css">
  button, .buttons, .btn, .modal-footer .btn + .btn {
    margin-bottom: 0px;
    margin-right: 0px;

  }
  .btn-success {
  background: #26B99A;
  border: 1px solid #169F85;


}
.navbar-toggle {
  width: 100%;
  float: none;
  margin-right: 0;
}

</style> 
    <div class="right_col" role="main">        
      <!-- Main content -->
      <!--<section class="content">-->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              
              <div class="x_title">
                <h2>Ficha de Aplicación para la Vigilancia Sanitaria de Parques</h2>
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
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>
                    
                    <tr class="v-grid-header">
                    
                    <th>Acciones</th>
                    <th>Establecimiento</th>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre del parque</th>
                    <th>Puntaje calificado</th>
                    <th>Puntaje alcanzado</th>
                    <th>Creado por</th>
                    <th>Fecha Creacion</th>
                    
                    </tr>  
                  </thead>
                  <tbody>                            
                  </tbody>
                  <tfoot>
                    
                    
                    <th>Acciones</th>
                    <th>Establecimiento</th>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre del parque</th>
                    <th>Puntaje calificado</th>
                    <th>Puntaje alcanzado</th>
                    <th>Creado por</th>
                    <th>Fecha Creacion</th>
                    
                  </tfoot>
                </table>
              </div>

              
              <? require 'partials/modal_ficha_vigilancia_parques.php'; ?>

              <!--Fin centro -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      
      <!--</section>--><!-- /.content -->

    </div><!-- /.content-wrapper -->










    <!--Fin-Contenido-->
    <?php
   require 'footer.php';
  ?>



  <script type="text/javascript" src="scripts/ficha_vigilancia_parques.js?rnd=<?php echo rand(); ?>"></script>

  <script>
var tblReq;

	//var tot_ini=parseInt($("#total_puntaje").val()); 
	//var tot_fin=parseInt($("#puntaje_calificado").text());	
function sum_valores(){
	tot_ii_2_1=0;tot_ii_2_2=0;tot_ii_2_3=0;
	var tot_ini=0; 
	var tot_fin=84;
	
    for (i=1;i<=6;i++){
	  if ($("input[name=ii_1_"+i.toString()+"]").is(':checked')){
		  nval=parseInt($("input:radio[name=ii_1_"+i.toString()+"]:checked").val());
		  if(nval >= 0) tot_ii_2_1+=nval; else tot_fin+=nval;
	  }
	}
    for (i=1;i<=7;i++){
	  if ($("input[name=ii_2_"+i.toString()+"]").is(':checked')){
		  nval=parseInt($("input:radio[name=ii_2_"+i.toString()+"]:checked").val());
		  if(nval >= 0) tot_ii_2_2+=nval; else tot_fin+=nval;
	  }
	}
    for (i=1;i<=11;i++){
	  if ($("input[name=ii_3_"+i.toString()+"]").is(':checked')){
		  nval=parseInt($("input:radio[name=ii_3_"+i.toString()+"]:checked").val());
		  if(nval >= 0) tot_ii_2_3+=nval; else tot_fin+=nval;
	  }
	}

    $("#total_puntaje").val(tot_ii_2_1+tot_ii_2_2+tot_ii_2_3);
	$("#puntaje_calificado").text(tot_fin);
}


function ver(){

  limpiar();
  $('#modalNew').modal('show')
      //$("#nombre").focus();
}

    $(function () {
		
      $('.calificacion').change(function (e) {
		  //alert("jose");
          sum_valores();
      });

    $(".select2").select2();

	$('#fecha_encuesta').daterangepicker({
		locale: {
			format: 'DD/MM/YYYY'
		},
		autoclose: true,
		singleDatePicker: true,
		singleClasses: "picker_2"
	});

    $('#t_id_parque').select2({
		dropdownParent: $("#modalNew"),
		placeholder: "Seleccione",
		language: {
			inputTooShort: function () {
			  return 'digita nombre del parque';
			}
		},
		ajax: {
			type: "GET",
			url: "../ajax/parque.php",
			dataType: 'json',
			delay: 250,
			data: function (params) {
			  return {
			  q: params.term, // search term
			  page: params.page,
			  op : 'listar'
			  };
			},
			results: function (data, page) { // parse the results into the format expected by Select2.

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

    $('#t_id_ubigeo_parque').select2({
		dropdownParent: $("#modalNew"),
		placeholder: "Seleccione",
		language: {
			inputTooShort: function () {
			  return 'digita nombre del Distrito.';
			}
		},
		ajax: {
			type: "GET",
			url: "../ajax/ubigeo.php",
			dataType: 'json',
			delay: 250,
			data: function (params) {
			  return {
			  q: params.term, // search term
			  page: params.page,
			  op : 'listar'
			  };
			},
			results: function (data, page) { // parse the results into the format expected by Select2.

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

    $('#modalNew').on('shown.bs.modal', function () {
		$('#nombre').focus();
    })

});
</script>

  <?php 
ob_end_flush();
?>


