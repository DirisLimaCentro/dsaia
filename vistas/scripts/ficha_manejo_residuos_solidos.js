var tabla;
var bTab=false;
//Función que se ejecuta al inicio
function open_ficha(id)
{
  //alert(id_item);

  $.post("../ajax/ficha_manejo_residuos_solidos.php?op=mostrar",{id : id}, function(data, status)
  {
    
    //console.log(data);
    //return false;
    data = JSON.parse(data);
    
    $("#id_ficha").val(id);
    $("#id_ipress").val(data[0].id_ipress);
    $("#fecha_encuesta").val(data[0].fecha);

	$("#codigo_ipress").val(data[0].codigo_unico);   
    $("#nombre_ipress").val(data[0].nombre_establecimiento);
    $("#tipo_ipress").val(data[0].id_tipo_ipress).trigger('change');
	$("#categoria_ipress").val(data[0].id_categoria_ipress).trigger('change');
    $('#ubigeo_ipress').append("<option value='"+data[0].id_ubicacion_ubigeo+"' selected='selected'>"+data[0].distrito_ipress+"</option>");
    $("#ubigeo_ipress").trigger('change');
	$("#direccion_ipress").val(data[0].direccion_ipress);
    $("#telefono_ipress").val(data[0].telefono_ipress);
    $("#celular_empresa").val(data[0].celular_empresa);
	
    $("#nombre_responsable_ipress").val(data[0].nombre_responsable_ipress);
	$("#nombre_responsable_eess").val(data[0].nombre_responsable_eess);
	
    if (data[0].i_1=='1') $('#i_1').bootstrapToggle('on'); else  $('#i_1').bootstrapToggle('off');
    if (data[0].i_2=='1') $('#i_2').bootstrapToggle('on'); else  $('#i_2').bootstrapToggle('off');
    if (data[0].i_3=='1') $('#i_3').bootstrapToggle('on'); else  $('#i_3').bootstrapToggle('off');
    if (data[0].i_4=='1') $('#i_4').bootstrapToggle('on'); else  $('#i_4').bootstrapToggle('off');
    if (data[0].i_5=='1') $('#i_5').bootstrapToggle('on'); else  $('#i_5').bootstrapToggle('off');
    if (data[0].i_6=='1') $('#i_6').bootstrapToggle('on'); else  $('#i_6').bootstrapToggle('off');
    if (data[0].i_7=='1') $('#i_7').bootstrapToggle('on'); else  $('#i_7').bootstrapToggle('off');
	if (data[0].i_8=='1') $('#i_8').bootstrapToggle('on'); else  $('#i_8').bootstrapToggle('off');
	if (data[0].i_9=='1') $('#i_9').bootstrapToggle('on'); else  $('#i_9').bootstrapToggle('off');
	if (data[0].i_10=='1') $('#i_10').bootstrapToggle('on'); else  $('#i_10').bootstrapToggle('off');
	if (data[0].i_11=='1') $('#i_11').bootstrapToggle('on'); else  $('#i_11').bootstrapToggle('off');
	if (data[0].ii_1=='1') $('#ii_1').bootstrapToggle('on'); else  $('#ii_1').bootstrapToggle('off');
	if (data[0].iii_1=='1') $('#iii_1').bootstrapToggle('on'); else  $('#iii_1').bootstrapToggle('off');
	if (data[0].iii_2=='1') $('#iii_2').bootstrapToggle('on'); else  $('#iii_2').bootstrapToggle('off');
	if (data[0].iii_3=='1') $('#iii_3').bootstrapToggle('on'); else  $('#iii_3').bootstrapToggle('off');
	if (data[0].iii_4=='1') $('#iii_4').bootstrapToggle('on'); else  $('#iii_4').bootstrapToggle('off');
	if (data[0].iii_5=='1') $('#iii_5').bootstrapToggle('on'); else  $('#iii_5').bootstrapToggle('off');
    
    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
  })
}

function buscar_ipress(){
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/ipress.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			op: "buscar_id",
			codigo: $("#codigo_ipress").val(),
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {

    			$("#loaderModal").hide();
    			if (result.msj=='') {
    				$("#nombre_ipress").val(result.nombre_establecimiento);
 					$("#tipo_ipress").val(result.id_tipo_ipress).trigger('change');
 					$("#categoria_ipress").val(result.id_categoria_ipress).trigger('change');
					$('#ubigeo_ipress').append("<option value='"+result.id_ubicacion_ubigeo+"' selected='selected'>"+result.distrito+"</option>");
 					$("#ubigeo_ipress").trigger('change');
    				$("#direccion_ipress").val(result.direccion);
					$("#telefono_ipress").val(result.telefono);
    				
    				$("#id_ipress").val(result.id);

 					$("#btnfindIpress").prop("disabled",true);
 					$("#codigo_ipress").prop("disabled",true);
                
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
	$("#id_ipress").val("");

	$("#codigo_ipress").val("");
	$("#nombre_ipress").val("");  
	$('#tipo_ipress').val('').trigger('change.select2');
	$('#categoria_ipress').val('').trigger('change.select2');
	$('#ubigeo_ipress').val('').trigger('change.select2');
	$("#direccion_ipress").val("");
	$("#telefono_ipress").val("");
	$("#nombre_responsable_ipress").val("");
	$("#nombre_responsable_eess").val("");

	$('#i_1').bootstrapToggle('off');
	$('#i_2').bootstrapToggle('off');
	$('#i_3').bootstrapToggle('off');
	$('#i_4').bootstrapToggle('off');
	$('#i_5').bootstrapToggle('off');
	$('#i_6').bootstrapToggle('off');
	$('#i_7').bootstrapToggle('off');
	$('#i_8').bootstrapToggle('off');
	$('#i_9').bootstrapToggle('off');
	$('#i_10').bootstrapToggle('off');
	$('#i_11').bootstrapToggle('off');
	$('#ii_1').bootstrapToggle('off');
	$('#iii_1').bootstrapToggle('off');
	$('#iii_2').bootstrapToggle('off');
	$('#iii_3').bootstrapToggle('off');
	$('#iii_4').bootstrapToggle('off');
	$('#iii_5').bootstrapToggle('off');

	$("#total_puntaje").val("0");
	
	$("#btnfindIpress").prop("disabled",false);
 	$("#codigo_ipress").prop("disabled",false);

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
      	"sAjaxSource": "../ajax/ficha_manejo_residuos_solidos.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data
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
			{ aTargets: 'i.nombre_establecimiento' },
			{ aTargets: 'i.codigo_unico' },
			{ aTargets: 'nombre_responsable_ipress' },
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
	if ($("#codigo_ipress").val()==''){
		var msj="Ingrese Codigo Unico de la IPRESS";
	}else if ($("#nombre_ipress").val()==''){
		var msj="Ingrese nombre de la IPRESS";
	}else if ($("#tipo_ipress").val()==''){
		var msj="Seleccione tipo de IPRESS";
	}else if ($("#categoria_ipress").val()==''){
		var msj="Ingrese categoria de IPRESS";
	}else if ($("#ubigeo_ipress").val()==''){
		var msj="Seleccione distrito dirección de IPRESS";
	}else if ($("#direccion_ipress").val()==''){
		var msj="Ingrese dirección de IPRESS";
	}
	if (msj){
		return bootbox.alert(msj);
	}

  if ($('#i_1').is(':checked')) var i_1=1; else var i_1=0;
  if ($('#i_2').is(':checked')) var i_2=1; else var i_2=0;
  if ($('#i_3').is(':checked')) var i_3=1; else var i_3=0;
  if ($('#i_4').is(':checked')) var i_4=1; else var i_4=0;
  if ($('#i_5').is(':checked')) var i_5=1; else var i_5=0;
  if ($('#i_6').is(':checked')) var i_6=1; else var i_6=0;
  if ($('#i_7').is(':checked')) var i_7=1; else var i_7=0;
  if ($('#i_8').is(':checked')) var i_8=1; else var i_8=0;
  if ($('#i_9').is(':checked')) var i_9=1; else var i_9=0;
  if ($('#i_10').is(':checked')) var i_10=1; else var i_10=0;
  if ($('#i_11').is(':checked')) var i_11=1; else var i_11=0;
  if ($('#ii_1').is(':checked')) var ii_1=1; else var ii_1=0;
  if ($('#iii_1').is(':checked')) var iii_1=1; else var iii_1=0;
  if ($('#iii_2').is(':checked')) var iii_2=1; else var iii_2=0;
  if ($('#iii_3').is(':checked')) var iii_3=1; else var iii_3=0;
  if ($('#iii_4').is(':checked')) var iii_4=1; else var iii_4=0;
  if ($('#iii_5').is(':checked')) var iii_5=1; else var iii_5=0;
  

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
			"id_ipress":($("#id_ipress").val()=='')?'0':$("#id_ipress").val(), 
			"fecha":$('#fecha_encuesta').val(),
			"codigo_ipress":$('#codigo_ipress').val(),
			"nombre_ipress":$('#nombre_ipress').val().toUpperCase(),          
			"tipo_ipress": $("#tipo_ipress").val(),
			"categoria_ipress": $("#categoria_ipress").val(),
			"ubigeo_ipress": $("#ubigeo_ipress").val(),
			"direccion_ipress": $('#direccion_ipress').val().toUpperCase(),
			"telefono_ipress": $('#telefono_ipress').val(),
			"nombre_responsable_ipress": $('#nombre_responsable_ipress').val().toUpperCase(),
			"nombre_responsable_eess": $('#nombre_responsable_eess').val().toUpperCase(),
			
			"i_1": i_1,
			"i_2": i_2,
			"i_3": i_3,
			"i_4": i_4,
			"i_5": i_5,
			"i_6": i_6,
			"i_7": i_7,
			"i_8": i_8,
			"i_9": i_9,
			"i_10": i_10,
			"i_11": i_11,
			"ii_1": ii_1,
			"iii_1": iii_1,
			"iii_2": iii_2,
			"iii_3": iii_3,
			"iii_4": iii_4,
			"iii_5": iii_5,
			"total_puntaje": $("#total_puntaje").val(),
						
			"id_usuario": $("#s_id_usuario").val(),
			"id_local": $("#s_id_local").val()

					};

				$.ajax({ 
					url: "../ajax/ficha_manejo_residuos_solidos.php?op=save",
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
