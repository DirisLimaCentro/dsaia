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
                <h2>Reporte de Descargos por Area <a style="visibility:hidden;" target="_blank" id="aDwn" name="aDwn"  href="#" ></a><small></small></h2>
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
                        			 	 <label for="id_area" class="col-form-label">Area</label>
	                                      <select class="form-control"   multiple id='id_area' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-default"  >
	                                      </select>
                        			 </div>
                        		</div>
                        	</div>

                          <!--<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group">
                                 <label for="id_personal" class="col-form-label">Personal Encargado</label>
                                        <select class="form-control"   multiple id='id_personal' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-default"  >
                                        </select>
                               </div>
                            </div>
                          </div>-->

                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group">
                                 <label for="id_insumo" class="col-form-label">Insumo</label>
                                        <select class="form-control"   multiple id='id_insumo' data-actions-box="true" data-select-all-text="Todos" data-live-search="true" data-deselect-all-text="Ninguno" data-style="btn-default"  >
                                        </select>
                               </div>
                            </div>
                          </div>

                    	
                      </div>  
                  </div>  

                  
                  	<div class="ln_solid"></div>
                  	<div class="form-group row">
                  		<div class="col-md-12 col-sm-12  text-center">
                  			<!--<a onclick="to_pdf();"  class="btn btn-default btn-success btn-sm" tabindex="0" aria-controls="tbllistado" href="#"><span><i class="glyphicon glyphicon-print"></i> Imprimir </span></a>-->

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


      $.getJSON('../ajax/empresa.php?op=list', function(data) {
      	var template = $('#tpl_empresas').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_empresa').html(html);
      	$('#id_empresa').selectpicker();
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

<script id="tpl_empresas" type="text/template">
  {{#empresas}}<option value='{{id}}' selected>{{nombre}}</option>{{/empresas}}
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