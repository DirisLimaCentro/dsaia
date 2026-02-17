<?php
ob_start();
session_start();
require 'header.php';
?>
<style type="text/css">

</style>
<div class="right_col" role="main">
    <!-- Main content -->
    <section class="row">

      <div class="row">
      	<div class="col-md-3 col-sm-3 col-xs-3">
      	</div>

        <div class="col-md-6 col-sm-6 col-xs-6">

          <div class="x_panel ">

            <div class="x_title">
                <h2>Reporte de Compras <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a><small></small></h2>
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
                        		<div class="col-md-6">
                        			<div class="form-group">
                        				<label >Desde</label>
                        				<div class="input-group date">
                        					<input type="text" class="form-control pull-right" id="fecha_desde" placeholder="dd/mm/aaaa" >
                        					<div class="input-group-addon">
                        						<i class="fa fa-calendar"></i>
                        					</div>
                        				</div>
                        			</div>
                        		</div>
                        		<div class="col-md-6">
                        			<div class="form-group">
                        				<label for="fecha_hasta" >Hasta</label>
                        				<div class="input-group date">
                        					<input type="text" class="form-control pull-right" id="fecha_hasta" placeholder="dd/mm/aaaa" >
                        					<div class="input-group-addon">
                        						<i class="fa fa-calendar"></i>
                        					</div>
                        				</div>
                        			</div>
                        		</div>		
                        	</div>

                        	<div class="row">
                        		<div class="col-md-12 col-sm-12 col-xs-12">
                        			 <div class="form-group">
                        			 	 <label for="id_empresa" class="col-form-label">Empresa</label>
	                                      <select class="form-control"   multiple id='id_empresa' data-actions-box="true" data-select-all-text="Todos" data-deselect-all-text="Ninguno" data-style="btn-default"  >
	                                      </select>
                        			 </div>
                        		</div>
                        	</div>

                        	<div class="row">
                        		<div class="col-md-12 col-sm-12 col-xs-12">
                        			 <div class="form-group">
                        			 	 <label for="id_proveedor" class="col-form-label">Proveedor</label>
	                                      <select class="form-control"   multiple id='id_proveedor' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-default"  >
	                                      </select>
                        			 </div>
                        		</div>
                        	</div>

                    	
                      </div>  
                  </div>  

                  
                  	<div class="ln_solid"></div>
                  	<div class="form-group row">
                  		<div class="col-md-12 col-sm-12  text-center">
                  			<a onclick="to_pdf();"  class="btn btn-default btn-success btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span><i class="glyphicon glyphicon-print"></i> Imprimir </span></a>

                  			<a onclick="to_excel();" class="btn btn-default btn-primary btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span><i class="fa fa-file-excel-o "></i> Exportar </span></a>
                  			
                  		</div>
                  	</div>
                 
               
                      
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

function to_pdf(){

	var cntProv=document.getElementById('id_proveedor').length;
	
	strEmpresas=$("#id_empresa").val();

	strProveedores=$("#id_proveedor").val();
	strProveedores=strProveedores.toString();

	var aProv=strProveedores.split(",");
	var cntSel=aProv.length;

	if (cntProv==cntSel){
		strProv="*";
	}else{
		strProv=strProveedores;
	}

	document.getElementById('aDwn').setAttribute('href',"../reportes/pdfCompras.php?desde="+$("#fecha_desde").val()+"&hasta="+$("#fecha_hasta").val()+"&id_empresa="+strEmpresas.toString()+"&id_proveedor="+strProv);
	document.getElementById('aDwn').click();
}

function to_excel(){

	var cntProv=document.getElementById('id_proveedor').length;
	
	strEmpresas=$("#id_empresa").val();

	strProveedores=$("#id_proveedor").val();
	strProveedores=strProveedores.toString();

	var aProv=strProveedores.split(",");
	var cntSel=aProv.length;

	if (cntProv==cntSel){
		strProv="*";
	}else{
		strProv=strProveedores;
	}

	document.getElementById('aDwn').setAttribute('href',"../reportes/xlsCompras.php?desde="+$("#fecha_desde").val()+"&hasta="+$("#fecha_hasta").val()+"&id_empresa="+strEmpresas.toString()+"&id_proveedor="+strProv);
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


      $.getJSON('../ajax/empresa.php?op=list', function(data) {
      	var template = $('#tpl_empresas').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_empresa').html(html);
      	$('#id_empresa').selectpicker();
      });
      $.getJSON('../ajax/proveedor.php?op=list', function(data) {
      	var template = $('#tpl_proveedores').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_proveedor').html(html);
      	$('#id_proveedor').selectpicker();
      });
});	

</script>

<script id="tpl_empresas" type="text/template">
  {{#empresas}}<option value='{{id}}' selected>{{nombre}}</option>{{/empresas}}
</script>

<script id="tpl_proveedores" type="text/template">
  {{#proveedores}}<option value='{{id}}' selected>{{nombre}}</option>{{/proveedores}}
</script>
<?php
ob_end_flush();
?>