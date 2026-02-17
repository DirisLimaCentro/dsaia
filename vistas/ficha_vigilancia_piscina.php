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

.icheckbox_flat-green, .iradio_flat-green {  
  margin-right: 5px;
}

</style> 
    <div class="right_col" role="main">        
      <!-- Main content -->
      <!--<section class="content">-->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              
              <div class="x_title">
                <h2>Ficha de Vigilancia Sanitaria de Piscinas <small></small></h2>
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
                    <th>Resultado</th>
                    </tr>  
                  </thead>
                  <tbody>                            
                  </tbody>
                  <!--<tfoot>
                    
                    <tr>
                    <th>Acciones</th>
                    <th>Establecimiento</th>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Centro Inspeccionado</th>
                    <th>RUC</th>
                    <th>Persona Atiende</th>
                    <th>Creado por</th>
                    <th>Fecha Creacion</th>
                    <th>Resultado</th>
                    </tr>

                  </tfoot>-->
                </table>
              </div>

              
              <? require 'partials/modal_ficha_vigilancia_piscina.php'; ?>

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



  <script type="text/javascript" src="scripts/ficha_vigilancia_piscina.js?rnd=<?php echo rand(); ?>"></script>

  <script>
var tblReq;

function ver(){

  limpiar();

  evalCloro();evalPh();evalTurbidez();

  $("#btnFindPersona").prop("disabled", false);
  $("#numero_doc").prop("disabled", false);

  $("#local").val($("#s_local").val());
  $('#modalNew').modal('show')
      //$("#nombre").focus();
}







    $(function () {

      $('#chkrow1').on('ifUnchecked', function(event){          
          $("#resul_cloro_residual_1").val('');
          $("#resul_ph_1").val('');
          $("#resul_temperatura_1").val('');
          $("#resul_turbidez_1").val('');   
          $('#resul_cloro_residual_1').attr('disabled','disabled');
          $('#resul_ph_1').attr('disabled','disabled');
          $('#resul_temperatura_1').attr('disabled','disabled');
          $('#resul_turbidez_1').attr('disabled','disabled');
          evalCloro();evalPh(); evalTurbidez();
      });

      $('#chkrow1').on('ifChecked', function(event){          
         
          $('#resul_cloro_residual_1').removeAttr('disabled');
          $('#resul_ph_1').removeAttr('disabled');
          $('#resul_temperatura_1').removeAttr('disabled');
          $('#resul_turbidez_1').removeAttr('disabled');
          evalCloro();evalPh(); evalTurbidez();
      });




      $('#chkrow2').on('ifUnchecked', function(event){
          
          $("#resul_cloro_residual_2").val('');
          $("#resul_ph_2").val('');
          $("#resul_temperatura_2").val('');
          $("#resul_turbidez_2").val('');   
          $('#resul_cloro_residual_2').attr('disabled','disabled');
          $('#resul_ph_2').attr('disabled','disabled');
          $('#resul_temperatura_2').attr('disabled','disabled');
          $('#resul_turbidez_2').attr('disabled','disabled');

          evalCloro();evalPh(); evalTurbidez();
           
      });

       $('#chkrow2').on('ifChecked', function(event){          
         
          $('#resul_cloro_residual_2').removeAttr('disabled');
          $('#resul_ph_2').removeAttr('disabled');
          $('#resul_temperatura_2').removeAttr('disabled');
          $('#resul_turbidez_2').removeAttr('disabled');
          evalCloro();evalPh(); evalTurbidez();
      });

       $('#chkrow3').on('ifUnchecked', function(event){          
          $("#resul_cloro_residual_3").val('');
          $("#resul_ph_3").val('');
          $("#resul_temperatura_3").val('');
          $("#resul_turbidez_3").val('');  
          $('#resul_cloro_residual_3').attr('disabled','disabled');
          $('#resul_ph_3').attr('disabled','disabled');
          $('#resul_temperatura_3').attr('disabled','disabled');
          $('#resul_turbidez_3').attr('disabled','disabled');
          evalCloro();evalPh(); evalTurbidez();           
      });

      $('#chkrow3').on('ifChecked', function(event){          
         
          $('#resul_cloro_residual_3').removeAttr('disabled');
          $('#resul_ph_3').removeAttr('disabled');
          $('#resul_temperatura_3').removeAttr('disabled');
          $('#resul_turbidez_3').removeAttr('disabled');
          evalCloro();evalPh(); evalTurbidez();
      });


      $('#chkrow4').on('ifUnchecked', function(event){

        $("#resul_cloro_residual_4").val('');
        $("#resul_ph_4").val('');
        $("#resul_temperatura_4").val('');
        $("#resul_turbidez_4").val('');   
        $('#resul_cloro_residual_4').attr('disabled','disabled');
        $('#resul_ph_4').attr('disabled','disabled');
        $('#resul_temperatura_4').attr('disabled','disabled');
        $('#resul_turbidez_4').attr('disabled','disabled');

        evalCloro();evalPh(); evalTurbidez();

      });

       $('#chkrow4').on('ifChecked', function(event){          
         
          $('#resul_cloro_residual_4').removeAttr('disabled');
          $('#resul_ph_4').removeAttr('disabled');
          $('#resul_temperatura_4').removeAttr('disabled');
          $('#resul_turbidez_4').removeAttr('disabled');
          evalCloro();evalPh(); evalTurbidez();
      });





      $('.cloro').keyup(function (e) {
         evalCloro();
      });

      $('.ph').keyup(function (e) {
         evalPh();
      });

      $('.turbidez').keyup(function (e) {
         evalTurbidez();
      });


      $('.numeric').inputmask("decimal", { min: -180, max: 100, allowMinus: true });


    $(".select2").select2();


    $.getJSON('../ajax/tabla.php?op=list&id_tabla=1', function(data) {
      var template = $('#tpl_tipo_doc').html();
      var html = Mustache.to_html(template, data);
      $('#tipo_doc').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=71', function(data) {
        var template = $('#tpl_inspeccion').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_inspeccion').html(html);
    });
	
    $.getJSON('../ajax/tabla.php?op=list&id_tabla=72', function(data) {
        var template = $('#tpl_lavapies').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_lavapies').html(html);
    });
	
    $.getJSON('../ajax/tabla.php?op=list&id_tabla=73', function(data) {
        var template = $('#tpl_sshh').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_sshh').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=87', function(data) {
        var template = $('#tpl_tipo_recirculacion').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_recirculacion').html(html);
    });

     $.getJSON('../ajax/tabla.php?op=list&id_tabla=86', function(data) {
        var template = $('#tpl_estanque').html();
        var html = Mustache.to_html(template, data);
        $('#limpieza_estanque').html(html);
    });

	
    $.getJSON('../ajax/tabla.php?op=list&id_tabla=74', function(data) {
        var template = $('#tpl_piscina').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_piscina').html(html);
    });
	

	$('#fecha_encuesta').daterangepicker({
		locale: {
			format: 'DD/MM/YYYY'
		},
		autoclose: true,
		singleDatePicker: true,
		singleClasses: "picker_2"
	});


    $('#ubigeo').select2({
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

<script id="tpl_tipo_doc" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_piscina" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_inspeccion" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_lavapies" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_sshh" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_tipo_recirculacion" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<script id="tpl_estanque" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

  <?php 
ob_end_flush();
?>


