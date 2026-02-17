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


  .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
  }




  .hovertext {
      position: relative;

      border-bottom: 1px dotted black;
  }

  .hovertext:before {
      content: attr(data-hover);
      width: 800px;
      color: white;
      visibility: hidden;
      opacity: 0;
      width: 140px;
      background-color: #ea3535;
      text-align: center;
      border-radius: 5px;
      padding: 5px 0;
      transition: opacity 1s ease-in-out;

      position: absolute;
      z-index: 1;
      left: 0;
      top: 110%;
  }

  .hovertext:hover:before {
      opacity: 1;
      visibility: visible;
      width: 800px;
  }





  .btn-success {
  background: #26B99A;
  border: 1px solid #169F85;


}
.navbar-toggle {
  width: 200%;
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
                <h2>FICHA Nº 01 :VERIFICACIÓN DE
                    CUMPLIMIENTO DE LOS ASPECTOS DE GESTIÓN DE
                    RESIDUOS SÓLIDOS EN ESTABLECIMIENTOS DE
                    SALUD, <br>SERVICIOS MÉDICOS DE APOYO DE LA
                    CATEGORIA I-1 AL I-4 Y CENTROS DE
                    INVESTIGACIÓN EN SALUD.



                </h2>
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
                    <th>Centro Inspeccionado</th>
                    <th>RUC</th>
                    <th>Persona Atiende</th>
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
                    <th>Centro Inspeccionado</th>
                    <th>RUC</th>
                    <th>Persona Atiende</th>
                    <th>Creado por</th>
                    <th>Fecha Creacion</th>
                    
                  </tfoot>
                </table>
              </div>

              
              <?php require 'partials/modal_ficha_manejo_residuos_solidos.php'; ?>

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



  <script type="text/javascript" src="scripts/ficha_manejo_residuos_solidos.js?rnd=<?php echo rand(); ?>"></script>

  <script>



var tblReq;




function sum_valores(){

	tot_i=0;tot_ii=0;tot_iii=0;

    tamount=0;
	
    for (i=1;i<=11;i++){   
	  if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;
      tot_i+=parseInt(nval);
    }


	if ($("#ii_1").is(':checked')) nval=1; else nval=0;
    tot_ii+=parseInt(nval);


	for (i=1;i<=5;i++){
      if ($("#iii_"+i.toString()).is(':checked')) nval=1; else nval=0;
      tot_iii+=parseInt(nval);
    }


    $("#total_puntaje").val(tot_i+tot_ii+tot_iii);

tamount=tot_i+tot_ii+tot_iii;



    if(  tamount <6 ){

        document.getElementById("valoracion").value=" MUY DEFICIENTE";

        document.getElementById("valoracion").className ="btn btn-danger";


    }if( tamount >5 && tamount <12){

        document.getElementById("valoracion").value=" DEFICIENTE ";

        document.getElementById("valoracion").className ="btn btn-primary";

    }if( tamount > 11){

        document.getElementById("valoracion").value=" ACEPTABLE  ";
        document.getElementById("valoracion").className ="btn btn-success";
    }






}





function ver(){

  limpiar();
  $('#modalNew').modal('show')
      //$("#nombre").focus();
}

    $(function () {
		
      $('.calificacion').change(function (e) {
          sum_valores();
      });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });
	
    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });
	

	$('#fecha_encuesta').daterangepicker({
		locale: {
			format: 'DD/MM/YYYY'
		},
		autoclose: true,
		singleDatePicker: true,
		singleClasses: "picker_2"
	});


    $('#ubigeo_ipress').select2({
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

<script id="tpl_tipo_ipress" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_categoria_ipress" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

  <?php 
ob_end_flush();
?>


