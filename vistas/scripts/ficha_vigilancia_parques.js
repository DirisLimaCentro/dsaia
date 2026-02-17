var tabla;
var bTab=false;
//Función que se ejecuta al inicio
function open_ficha(id)
{
  //alert(id_item);
	for (i=1;i<=6;i++){
		$("input[name=ii_1_"+i.toString()+"]").attr("checked", false);
	}
	for (i=1;i<=7;i++){
		$("input[name=ii_2_"+i.toString()+"]").attr("checked", false);
	}
	for (i=1;i<=11;i++){
		$("input[name=ii_3_"+i.toString()+"]").attr("checked", false);
	}
	$('.btn-group').find('.btn-success').removeClass('active');
	$('.btn-group').find('.btn-primary').removeClass('active');
	$('.btn-group').find('.btn-warning').removeClass('active');

  $.post("../ajax/ficha_vigilancia_parques.php?op=mostrar",{id : id}, function(data, status)
  {
    
    //console.log(data);
    //return false;
    data = JSON.parse(data);
    
    $("#id_ficha").val(id);
	$("#fecha_encuesta").val(data[0].fecha);
	$("#hora").val(data[0].fecha);
	$("#hora").val(data[0].hora);
	if (data[0].es_publico_parque=='1') $('#t_es_publico_parque').bootstrapToggle('on'); else  $('#t_es_publico_parque').bootstrapToggle('off');
	if (data[0].con_cerco_perimetro_parque=='1') $('#t_con_cerco_perimetro_parque').bootstrapToggle('on'); else  $('#t_con_cerco_perimetro_parque').bootstrapToggle('off');
	$('#t_id_parque').append("<option value='"+data[0].id_parque+"' selected='selected'>"+data[0].nombre_parque+"</option>");
    $("#t_id_parque").trigger('change');
	$("#descrip_consultorio_cercano").val(data[0].descrip_consultorio_cercano);
	
	$("#ii_1_1_"+data[0].ii_1_1.toString()+"").addClass('active');
	$("input[name=ii_1_1][value=" + data[0].ii_1_1 + "]").prop('checked', true);
	$("#ii_1_2_"+data[0].ii_1_2.toString()+"").addClass('active');
	$("input[name=ii_1_2][value=" + data[0].ii_1_2 + "]").prop('checked', true);
	$("#ii_1_3_"+data[0].ii_1_3.toString()+"").addClass('active');
	$("input[name=ii_1_3][value=" + data[0].ii_1_3 + "]").prop('checked', true);
	$("#ii_1_3_"+data[0].ii_1_3.toString()+"").addClass('active');
	$("input[name=ii_1_3][value=" + data[0].ii_1_3 + "]").prop('checked', true);
	$("#ii_1_4_"+data[0].ii_1_4.toString()+"").addClass('active');
	$("input[name=ii_1_4][value=" + data[0].ii_1_4 + "]").prop('checked', true);
	$("#ii_1_5_"+data[0].ii_1_5.toString()+"").addClass('active');
	$("input[name=ii_1_5][value=" + data[0].ii_1_5 + "]").prop('checked', true);
	$("#ii_1_6_"+data[0].ii_1_6.toString()+"").addClass('active');
	$("input[name=ii_1_6][value=" + data[0].ii_1_6 + "]").prop('checked', true);
	
	$("#ii_2_1_"+data[0].ii_2_1.toString()+"").addClass('active');
	$("input[name=ii_2_1][value=" + data[0].ii_2_1 + "]").prop('checked', true);
	$("#ii_2_2_"+data[0].ii_2_2.toString()+"").addClass('active');
	$("input[name=ii_2_2][value=" + data[0].ii_2_2 + "]").prop('checked', true);
	$("#ii_2_3_"+data[0].ii_2_3.toString()+"").addClass('active');
	$("input[name=ii_2_3][value=" + data[0].ii_2_3 + "]").prop('checked', true);
	$("#ii_2_4_"+data[0].ii_2_4.toString()+"").addClass('active');
	$("input[name=ii_2_4][value=" + data[0].ii_2_4 + "]").prop('checked', true);
	$("#ii_2_5_"+data[0].ii_2_5.toString()+"").addClass('active');
	$("input[name=ii_2_5][value=" + data[0].ii_2_5 + "]").prop('checked', true);
	$("#ii_2_6_"+data[0].ii_2_6.toString()+"").addClass('active');
	$("input[name=ii_2_6][value=" + data[0].ii_2_6 + "]").prop('checked', true);
	$("#ii_2_7_"+data[0].ii_2_7.toString()+"").addClass('active');
	$("input[name=ii_2_7][value=" + data[0].ii_2_7 + "]").prop('checked', true);
	
	$("#ii_3_1_"+data[0].ii_3_1.toString()+"").addClass('active');
	$("input[name=ii_3_1][value=" + data[0].ii_3_1 + "]").prop('checked', true);
	$("#ii_3_2_"+data[0].ii_3_2.toString()+"").addClass('active');
	$("input[name=ii_3_2][value=" + data[0].ii_3_2 + "]").prop('checked', true);
	$("#ii_3_3_"+data[0].ii_3_3.toString()+"").addClass('active');
	$("input[name=ii_3_3][value=" + data[0].ii_3_3 + "]").prop('checked', true);
	$("#ii_3_4_"+data[0].ii_3_4.toString()+"").addClass('active');
	$("input[name=ii_3_4][value=" + data[0].ii_3_4 + "]").prop('checked', true);
	$("#ii_3_5_"+data[0].ii_3_5.toString()+"").addClass('active');
	$("input[name=ii_3_5][value=" + data[0].ii_3_5 + "]").prop('checked', true);
	$("#ii_3_6_"+data[0].ii_3_6.toString()+"").addClass('active');
	$("input[name=ii_3_6][value=" + data[0].ii_3_6 + "]").prop('checked', true);
	$("#ii_3_7_"+data[0].ii_3_7.toString()+"").addClass('active');
	$("input[name=ii_3_7][value=" + data[0].ii_3_7 + "]").prop('checked', true);
	$("#ii_3_8_"+data[0].ii_3_8.toString()+"").addClass('active');
	$("input[name=ii_3_8][value=" + data[0].ii_3_8 + "]").prop('checked', true);
	$("#ii_3_9_"+data[0].ii_3_9.toString()+"").addClass('active');
	$("input[name=ii_3_9][value=" + data[0].ii_3_9 + "]").prop('checked', true);
	$("#ii_3_10_"+data[0].ii_3_10.toString()+"").addClass('active');
	$("input[name=ii_3_10][value=" + data[0].ii_3_10 + "]").prop('checked', true);
	$("#ii_3_11_"+data[0].ii_3_11.toString()+"").addClass('active');
	$("input[name=ii_3_11][value=" + data[0].ii_3_11 + "]").prop('checked', true);

	
	$("#total_puntaje").val(data[0].total_puntaje);
	$("#puntaje_calificado").text(data[0].puntaje_calificado);
	//setTimeout(function(){sum_valores()},2000);
	
    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
  })
}

function buscar_parque(){
	if ($("#t_id_parque").val() == null) return false;
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/parque.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			op: "buscar_id",
			id: $("#t_id_parque").val(),
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {

    			$("#loaderModal").hide();
    			if (result.msj=='') {
    				//$("#nombre_parque").val(result.nombre_parque);
					if (result.es_publico_parque=='t') $('#t_es_publico_parque').bootstrapToggle('on'); else  $('#t_es_publico_parque').bootstrapToggle('off');
					if (result.con_cerco_perimetro_parque=='t') $('#t_con_cerco_perimetro_parque').bootstrapToggle('on'); else  $('#t_con_cerco_perimetro_parque').bootstrapToggle('off');
					$("#t_area_parque").val(result.area_parque);
					$('#t_id_ubigeo_parque').append("<option value='"+result.id_ubigeo_parque+"' selected='selected'>"+result.distrito_parque+"</option>");
 					$("#t_id_ubigeo_parque").trigger('change');
    				$("#t_direccion_parque").val(result.direccion_parque);
					$("#t_ubicacion_georefencial_parque").val(result.ubicacion_georefencial_parque);
    				
                }else{
                	//buscar_sunat()	
					$("#loaderModal").hide();
					alert("No se encontró la IPRESS");
                }

        },
        timeout: 12000, // sets timeout to 30 seconds
        error: function (request, status, err) {
          	$("#loaderModal").hide();
          	if (status == "timeout") {
                    //showMessage("Su petición demoro mas de lo permitido", "error");
                    alert("Su petición demoro mas de lo permitido");
            } else {
                    //showMessage("ocurrio un error en su petición.", "error");
                    alert("ocurrio un error en su petición.");
            }
         }
    });
}

function init(){
	listar();
}

function limpiar(){
	$("#modalTitle").html('Nuevo registro');
	$("#id_ficha").val("");
	$("#hora").val("");
	
	$('#t_id_parque').val('').trigger('change.select2');
	$('#t_es_publico_parque').bootstrapToggle('off');
	$('#t_con_cerco_perimetro_parque').bootstrapToggle('off');
	$("#t_area_parque").val("");
	$('#t_id_ubigeo_parque').val('').trigger('change.select2');
	$("#t_direccion_parque").val("");
	$("#t_ubicacion_georefencial_parque").val("");
	
	$("#descrip_consultorio_cercano").val("");
	
	//$("input:radio").attr("checked", false);
	//$("input:radio").removeAttr("checked");
	
	$("#ii_1_1_0").removeAttr("checked");
	$("#ii_1_1_1").removeAttr("checked");
	$("#ii_1_1_99").removeAttr("checked");
	
	  for (i=1;i<=6;i++){
		  $("input[name=ii_1_"+i.toString()+"]").attr("checked", false);
		  //$("input[name=ii_1_"+i.toString()+"]").removeAttr("checked");
		  //document.querySelectorAll("[name=ii_1_"+i.toString()+"]").forEach((x) => x.checked=false);
	  }
	  for (i=1;i<=7;i++){
		  $("input[name=ii_2_"+i.toString()+"]").attr("checked", false);
	  }
	  for (i=1;i<=11;i++){
		  $("input[name=ii_3_"+i.toString()+"]").attr("checked", false);
	  }
	  $('.btn-group').find('.btn-success').removeClass('active');
	  $('.btn-group').find('.btn-primary').removeClass('active');
	  $('.btn-group').find('.btn-warning').removeClass('active');
	  
	
	
	$("#total_puntaje").val("0");
	$("#puntaje_calificado").val("84");


}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function createDataTable(id){
	tbl="dt"+id;
	dt=$('#'+tbl).DataTable({
		dom: "lftip",
		orderCellsTop: true,
		fixedHeader: true,
		fixedColumns: true,
		"lengthChange": true,
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

		"bDestroy": true,

		"columnDefs": [
		{ "orderable": false, "targets": 0, "searchable": false,"width": "12%" },
		{ "orderable": true, "targets": 1, "searchable": true },
	{ "orderable": true, "targets": 2, "searchable": true /*, className: "wrapok"*/},
	{ "orderable": true, "targets": 3, "searchable": false },
	{ "orderable": true, "targets": 4, "searchable": false },
	{ "orderable": true, "targets": 5, "searchable": false },
	{ "orderable": true, "targets": 6, "searchable": false }
	//{ "orderable": true, "targets": 7, "searchable": false }


	],  

	/*columns: [
		{
			className: 'details-control',
			defaultContent: '',
			data: null,
			orderable: false,
			defaultContent: '' 
		}
	],*/


	"pagingType": 'numbers',
	"bAutoWidth": false ,
	"iDisplayLength": 10
});
}

//Actualiza child row
function update_child(row){
	var parametros = {"id_empresa":row};
	$.ajax( {
		url: '../ajax/empresa.php?op=tableLocales',
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#row_"+row).html( json );	
			createDataTable(row);		
		}
	} );
}

//Función Listar
function listar()
{
	function format ( rowData ) {
		var parametros = {"id_empresa":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/empresa.php?op=tableLocales',
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );
				createDataTable(rowData[0]);

			}
		} );

		return div;
		//alert('hola');
	}


  $('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
    $('#tbllistado thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title!='' && $.trim(title)!='Acciones' && title!='Fecha Inicio' && title!='Fecha Termino' && title!='Fecha Crea'){
          $(this).html( '<input style="width:100%;" type="text" class="form-control input-sm" placeholder="Buscar '+title+'" />' );
    }else{
      $(this).html('');
    }
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

	table=$('#tbllistado').DataTable(
	{
	dom: "Bltip",
	"buttons": [
      {
          text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
          className: "btn btn-success btn-sm",
          action: function ( e, dt, node, config ) {
              ver();
          }
 
      }
      ],
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"bProcessing": true,//Activamos el procesamiento del datatables
		"bJQueryUI": false,
		"responsive": true,
		"bInfo": true,
		"bFilter": true,
	    "bServerSide": true,//Paginación y filtrado realizados por el servidor
	    "sServerMethod": "GET",
      	"sAjaxSource": "../ajax/ficha_vigilancia_parques.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data
		"language": {
			"lengthMenu": "Mostrar : _MENU_ registros",
			"search": '<i class="fa fa-search"></i>',
			"paginate": {
						"previous": '<i class="fa fa-angle-left"></i>',
						"next": '<i class="fa fa-angle-right"></i>'
			},
			"buttons": {
				"copyTitle": "Tabla Copiada",
				"copySuccess": {
					_: '%d líneas copiadas',
					1: '1 línea copiada'
				}
			}
		},
		"bDestroy": true,
		"columnDefs": [
		{ "orderable": false,	"targets": 0,	"searchable": false },
		{ 'width':'2%', "orderable": true,	"targets": 1,	"searchable": true },
		{ "orderable": false,	"targets": 2,	"searchable": false },
		{ "orderable": false,	"targets": 3,	"searchable": false }
		],

		"createdRow": function( row, data, dataIndex){
			if( data[1] ==  '0'){
				//$(row).addClass('alert alert-warning');
				//$(row).css('background-color', 'rgb(250, 235, 204)');
				//$(row).css('background-color', '#F39B9B');
			}

		},

    initComplete: function () {
      $('.dt-buttons').removeClass('btn-group'); 
      table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
          that
          .search( this.value )
          .draw();
        } );
      } );
    },

		columns: [
			/*{
			className: 'details-control',
			defaultContent: '',
			data: null,
			orderable: false,
			defaultContent: '' },*/

			//{ aTargets: null },
			{ aTargets: 'f.id' },
			{ aTargets: 'l.nombre' },
			{ aTargets: 'f.id' },
			{ aTargets: 'f.fecha' },
			{ aTargets: 'pa.nombre_parque' },
			{ aTargets: 'puntaje_calificado' },
			{ aTargets: 'total_puntaje' },
			{ aTargets: 'uc.login' },
			{ aTargets: 'f.fecha_creacion' }

			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 8, "des" ]]//Ordenar (columna,orden)

	});


	$('#tbllistado tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = table.row( tr );

		if ( row.child.isShown() ) {
			row.child.hide();
			tr.removeClass('shown');
			//tr.find('svg').attr('data-icon', 'plus-circle');
		}
		else {
			row.child( format(row.data()) ).show();
			tr.addClass('shown');
			//tr.find('svg').attr('data-icon', 'minus-circle');
		}
	} );
}

//Función para guardar o editar
function guardaryeditar()
{
	msj="";
	if ($("#t_id_parque").val()==''){
		var msj="Seleccione el parque";
	}else if ($("#t_direccion_parque").val()==''){
		var msj="Seleccione el parque";
	}else if ($("#fecha_encuesta").val()==''){
		var msj="Seleccione fecha de inspeccion";
	}
	if (msj){
		return bootbox.alert(msj);
	}

	if ($('#t_es_publico_parque').is(':checked')) var es_publico_parque=1; else var es_publico_parque=0;
	if ($('#t_con_cerco_perimetro_parque').is(':checked')) var con_cerco_perimetro_parque=1; else var con_cerco_perimetro_parque=0;
	if ($("input[name=ii_1_1]").is(':checked')){ii_1_1=parseInt($("input:radio[name=ii_1_1]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.1.1";}
	if ($("input[name=ii_1_2]").is(':checked')){ii_1_2=parseInt($("input:radio[name=ii_1_2]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.1.2";}
	if ($("input[name=ii_1_3]").is(':checked')){ii_1_3=parseInt($("input:radio[name=ii_1_3]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.1.3";}
	if ($("input[name=ii_1_4]").is(':checked')){ii_1_4=parseInt($("input:radio[name=ii_1_4]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.1.4";}
	if ($("input[name=ii_1_5]").is(':checked')){ii_1_5=parseInt($("input:radio[name=ii_1_5]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.1.5";}
	if ($("input[name=ii_1_6]").is(':checked')){ii_1_6=parseInt($("input:radio[name=ii_1_6]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.1.6";}
	if ($("input[name=ii_2_1]").is(':checked')){ii_2_1=parseInt($("input:radio[name=ii_2_1]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.1";}
	if ($("input[name=ii_2_2]").is(':checked')){ii_2_2=parseInt($("input:radio[name=ii_2_2]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.2";}
	if ($("input[name=ii_2_3]").is(':checked')){ii_2_3=parseInt($("input:radio[name=ii_2_3]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.3";}
	if ($("input[name=ii_2_4]").is(':checked')){ii_2_4=parseInt($("input:radio[name=ii_2_4]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.4";}
	if ($("input[name=ii_2_5]").is(':checked')){ii_2_5=parseInt($("input:radio[name=ii_2_5]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.5";}
	if ($("input[name=ii_2_6]").is(':checked')){ii_2_6=parseInt($("input:radio[name=ii_2_6]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.6";}
	if ($("input[name=ii_2_7]").is(':checked')){ii_2_7=parseInt($("input:radio[name=ii_2_7]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.2.7";}
	if ($("input[name=ii_3_1]").is(':checked')){ii_3_1=parseInt($("input:radio[name=ii_3_1]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.1";}
	if ($("input[name=ii_3_2]").is(':checked')){ii_3_2=parseInt($("input:radio[name=ii_3_2]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.2";}
	if ($("input[name=ii_3_3]").is(':checked')){ii_3_3=parseInt($("input:radio[name=ii_3_3]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.3";}
	if ($("input[name=ii_3_4]").is(':checked')){ii_3_4=parseInt($("input:radio[name=ii_3_4]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.4";}
	if ($("input[name=ii_3_5]").is(':checked')){ii_3_5=parseInt($("input:radio[name=ii_3_5]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.5";}
	if ($("input[name=ii_3_6]").is(':checked')){ii_3_6=parseInt($("input:radio[name=ii_3_6]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.6";}
	if ($("input[name=ii_3_7]").is(':checked')){ii_3_7=parseInt($("input:radio[name=ii_3_7]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.7";}
	if ($("input[name=ii_3_8]").is(':checked')){ii_3_8=parseInt($("input:radio[name=ii_3_8]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.8";}
	if ($("input[name=ii_3_9]").is(':checked')){ii_3_9=parseInt($("input:radio[name=ii_3_9]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.9";}
	if ($("input[name=ii_3_10]").is(':checked')){ii_3_10=parseInt($("input:radio[name=ii_3_10]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.10";}
	if ($("input[name=ii_3_11]").is(':checked')){ii_3_11=parseInt($("input:radio[name=ii_3_11]:checked").val());} else { var msj="Seleccione una de las opciones en el punto 2.3.11";}
	if (msj){
		return bootbox.alert(msj);
	}
	bootbox.confirm({
		title: "Mensaje",
		message: "Esta seguro de guardar el registro?",
		buttons: {
			cancel: {
				label: '<i class="fa fa-times"></i> Cancelar'
			},
			confirm: {
				label: '<i class="fa fa-check"></i> Grabar',
				className: 'btn-success'
			}
		},
		callback: function (result) {
			
			if (result){
		var parametros = {
			"id_ficha":($("#id_ficha").val()=='')?'0':$("#id_ficha").val(), 
			"id_parque":($("#t_id_parque").val()=='')?'0':$("#t_id_parque").val(), 
			"fecha":$('#fecha_encuesta').val(),
			"hora":$('#hora').val(),
			"area_parque":$('#t_area_parque').val(),
			"id_ubigeo_parque":$('#t_id_ubigeo_parque').val(),          
			"direccion_parque": $("#t_direccion_parque").val().toUpperCase(),
			"ubicacion_georefencial_parque": $("#t_ubicacion_georefencial_parque").val(),
			"descrip_consultorio_cercano": $("#descrip_consultorio_cercano").val().toUpperCase(),

			"es_publico_parque": es_publico_parque,
			"con_cerco_perimetro_parque": con_cerco_perimetro_parque,
			"ii_1_1": ii_1_1,
			"ii_1_2": ii_1_2,
			"ii_1_3": ii_1_3,
			"ii_1_4": ii_1_4,
			"ii_1_5": ii_1_5,
			"ii_1_6": ii_1_6,
			"ii_2_1": ii_2_1,
			"ii_2_2": ii_2_2,
			"ii_2_3": ii_2_3,
			"ii_2_4": ii_2_4,
			"ii_2_5": ii_2_5,
			"ii_2_6": ii_2_6,
			"ii_2_7": ii_2_7,
			"ii_3_1": ii_3_1,
			"ii_3_2": ii_3_2,
			"ii_3_3": ii_3_3,
			"ii_3_4": ii_3_4,
			"ii_3_5": ii_3_5,
			"ii_3_6": ii_3_6,
			"ii_3_7": ii_3_7,
			"ii_3_8": ii_3_8,
			"ii_3_9": ii_3_9,
			"ii_3_10": ii_3_10,
			"ii_3_11": ii_3_11,
			"total_puntaje": $("#total_puntaje").val(),
			"puntaje_calificado": $("#puntaje_calificado").text(),
						
			"id_usuario": $("#s_id_usuario").val(),
			"id_local": $("#s_id_local").val()

					};

				$.ajax({ 
					url: "../ajax/ficha_vigilancia_parques.php?op=save",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(msg)
					{
						table.ajax.reload();
						var amsg=msg.split('|');
						var nerror=amsg[0];
						if (nerror=='0'){
						  bootbox.alert('Ocurrio un error: '+amsg[1]);
						}else{
						  $('#modalNew').modal('toggle');
						  bootbox.alert('Registro guardado');
						}
					}

				});


			}
		}
	});

}

//Función para desactivar registros
function desactivar(id_empresa)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/empresa.php?op=desactivar", {id_empresa : id_empresa}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_empresa)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/empresa.php?op=activar", {id_empresa : id_empresa}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

init();
