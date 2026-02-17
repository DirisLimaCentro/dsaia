var tabla;

//Función que se ejecuta al inicio
function init(){
	//mostrarform(false);

	listar();

	/*$("#frmestablecimiento").on("submit",function(e)
	{
		guardaryeditar(e);
	});*/

	/*$("#frmestablecimiento").submit(function(e){
		guardaryeditar(e);
	});*/

    //$('#mTablas').addClass("treeview active");
    //$('#lEstablecimientos').addClass("active");

}
//Función limpiar_modal_local
//Función limpiar
function imprimir(){
	document.getElementById('aDwn').setAttribute('href',"../reportes/pdfItems.php");
	document.getElementById('aDwn').click();	
}

function descargar(){
	document.getElementById('aDwn').setAttribute('href',"../reportes/xlsItems.php");
	document.getElementById('aDwn').click();	
}

function open_new_tabla(idtabla,nameinput,tpl_name,titulo) {
	$('#modaltablas').modal('show');
	$("#idtabla").val(idtabla);
	$("#nameinput").val(nameinput);
	$("#tpl_name").val(tpl_name);
	$("#modalItems").html('Agregar a ' + titulo);

}
function insert_tabla() {
	var idtabla = $("#idtabla").val();
	var nameinput =$("#nameinput").val();
	var tpl_name =$("#tpl_name").val();
	var descripcion =$("#descripcion").val();
	var abreviado =$("#abreviado").val();


    var message = "";
    if (descripcion == "") {message = "Ingresa Descripción";}
		else if (abreviado === "") {message = "Ingresa Abreviatura";}
    if (message) return showMessage(message, "error");// return false;
		var parametros = {"idtabla":idtabla,"descripcion":descripcion,"abreviado":abreviado};
		$.ajax( {
			url: '../ajax/tabla.php?op=insert_tabla',
			data:  parametros,
			dataType: 'html',
			type: "POST",
			success: function ( result ) {
				//alert(result);return false;
				if (result == "Opción registrada") {
						$('#modaltablas').modal('hide');
						showMessage("Guardado correctamente", "success");
						loadtabla(idtabla,nameinput,tpl_name);
						//$("#cbx_instituciones").val(result);

				} else {
						showMessage(result.error, "error", true);
				}
			},
			timeout: 10000, // sets timeout to 10 seconds
			error: function (request, status, err) {

					if (status == "timeout") {
							showMessage("Su petición demoro mas de lo permitido", "error");
					} else {
							// another error occured
							showMessage("ocurrio un error.", "error");
					}
			}
		} );
}

		function loadtabla(idtabla,valtabla,tpl_name) {

			$.getJSON('../ajax/tabla.php?op=list&id_tabla='+idtabla, function(data) {
				loadDataToTemplate(tpl_name,valtabla,data)
			});



		}


function limpiar_local()
{
	$("#modalLocalTitle").html('Nuevo registro');
	$("#id_local").val("");
	$("#nombre_local").val("");
	$("#direccion_local").val("");
	$('#id_ubigeo_local').val('').trigger('change.select2');
	$("#celular_local").val("");
	$("#telefono_fijo_local").val("");

}

function limpiar()
{
	$("#modalTitle").html('Nuevo registro');
	$("#id_item").val("");
	//$("#nombre").val("");
	//$("#id_empresa").val("");
	//$('#ubigeo').val('').trigger('change.select2');
	$("#categoria").val("");
	$('#id_catalogo').val('').trigger('change.select2');
	$("#id_marca").val("");
	$("#id_laboratorio").val("");
	$("#id_ums").val("");
	$("#id_umi").val("");
	$("#Factor").val("1");
	$("#precio_compra").val("0.00");
	$("#stock_real").val("0.00");
	$("#stock_minimo").val("0.00");
	$("#stock_maximo").val("0.00");
	
	$("#maneja_lotes").iCheck('uncheck');

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
//Actualiza child row
function update_child(row){
	var parametros = {"id_empresa":row};
	$.ajax( {
		url: '../ajax/empresa.php?op=tableLocales',
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#row_"+row).html( json );
		}
	} );
}

//Función Listar
function listar()
{
	function format ( rowData ) {
		var parametros = {"id_item":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/items.php?op=tableLotes',
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );
			}
		} );

		return div;
		//alert('hola');
	}


	$('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
    $('#tbllistado thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title!='' && $.trim(title)!='Acciones' && title!='Estado' && title!='Maneja Lote'){
        	$(this).html( '<input style="width:100%;" type="text" class="form-control input-sm" placeholder="Buscar '+title+'" />' );
 		}else{
 			if(title=='Maneja Lote'){
 				$(this).html("<select id='cbolote'  class='form-control ' onchange='table.column(11).search( this.value ).draw();' style='width: 100%;' ><option value='*'>--Todos--</option><option value='1'>Maneja</option><option value='0'>No maneja</option></select>")	

	 		}else{	
	 			$(this).html('');
	 		}
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
		"initComplete": function(settings, json) {
                          
              $('.dt-buttons').removeClass('btn-group'); 
            },
		dom: "Bltip",

		"buttons": [
      {
          text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
          className: "btn btn-success btn-sm",
          action: function ( e, dt, node, config ) {
              ver();
          }

      },
      {
          text: '<i class="glyphicon glyphicon-print"></i> Imprimir',
          className: "btn btn-success btn-sm",
          action: function ( e, dt, node, config ) {
              imprimir();
          }

      },

      {
          text: '<i class="glyphicon glyphicon-save"></i> Descargar',
          className: "btn btn-success btn-sm",
          action: function ( e, dt, node, config ) {
              descargar();
          }

      },

      ],
      	orderCellsTop: true,
        fixedHeader: true,
        fixedColumns: true,

		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"bProcessing": true,//Activamos el procesamiento del datatables
		"bJQueryUI": false,
		"responsive": true,
		"bInfo": true,
		"bFilter": true,
	    "bServerSide": true,//Paginación y filtrado realizados por el servidor
	    "sServerMethod": "GET",
	    //dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    /*buttons: [
	    	 {
		    	text: 'Nuevo',
		    	//className: "btn",
		    	action: function ( e, dt, node, config ) {
		    		ver();
		    	}
		    }	,

		    {
		    	extend:    'copyHtml5',
		    	text:      '<i class="fa fa-files-o"></i>',
		    	titleAttr: 'Copy'
		    },
		    {
		    	extend:    'excelHtml5',
		    	text:      '<i class="fa fa-file-excel-o"></i>',
		    	titleAttr: 'Excel'
		    },
		    {
		    	extend:    'csvHtml5',
		    	text:      '<i class="fa fa-file-text-o"></i>',
		    	titleAttr: 'CSV'
		    },
		    {
		    	extend:    'pdfHtml5',
		    	text:      '<i class="fa fa-file-pdf-o"></i>',
		    	titleAttr: 'PDF'
		    }



	    ],*/
      	"sAjaxSource": "../ajax/items.php?op=listar", // Load Data
		/*"ajax":
				{
					url: '../ajax/establecimiento.php?op=listar',
					type : "get",
					dataType : "json",
					error: function(e){
						console.log(e.responseText);
					}
				},*/
				"language": {
					"url": "../public/datatables.net.languages/Spanish.json",
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
		{ "orderable": false,	"targets": 1,	"searchable": false },
		{ "orderable": true,	"targets": 2,	"searchable": true },
		{ "orderable": true,	"targets": 3,	"searchable": true },
		{ "orderable": false,	"targets": 11,	"searchable": true }
		],

		"createdRow": function( row, data, dataIndex){
			if( data[8] ==  '0'){
				//$(row).addClass('alert alert-warning');
				//$(row).css('background-color', 'rgb(250, 235, 204)');
				//$(row).css('background-color', '#F39B9B');
			}

		},

		columns: [
		{
			className: 'details-control',
			defaultContent: '',
			data: null,
			orderable: false,
			defaultContent: '' },

			//{ aTargets: null },
			{ aTargets: 'i.id' },
			{ aTargets: '' },
			{ aTargets: 'cat.nombre' },
			{ aTargets: 'i.id' },
			{ aTargets: 'c.descripcion' },			
			{ aTargets: 'm.descripcion' },
			{ aTargets: 'ums.descripcion' },
			{ aTargets: 'umi.descripcion' },
			{ aTargets: 'factor' },
			{ aTargets: 'precio_compra' },
			{ aTargets: 'stock_real' },
			{ aTargets: 'maneja_lote' }

			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 2, "asc" ]]//Ordenar (columna,orden)

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


	/*$('.buttons-excel, .buttons-print').each(function() {
	   $(this).removeClass('btn-default').addClass('btn-primary')
	})*/


}
//Función para guardar o editar

function guardaryeditar()
{
    var msj='';
	if ($("#id_catalogo").val()==''){
		var msj="Selecciona una plantilla...!";
	}else if($("#id_ums").val()==''){
		var msj="Selecciona Unida de Medida Salida..!";	
	}else if($("#id_marca").val()==''){
		var msj="Selecciona una marca o el valor SIN MARCA..!";
	}else if($("#id_umi").val()==''){
		var msj="Selecciona Unida de Medida Ingreso..!";
	}else if($("#factor").val()==''){
		var msj="Ingresa Factor..!";
	}else if($("#precio_compra").val()==''){
		var msj="Ingresa Precio compra..!";
	}else if($("#stock_real").val()==''){
		var msj="Ingrese un valor para stock real..!";
	}else if($("#stock_minimo").val()==''){
		var msj="Ingresa un valor para stock minimo..!";
	}else if($("#stock_maximo").val()==''){
		var msj="Ingresa un valor para stock maximo..!";
	}
	//alert(msj);return false;
	if(msj==''){
		var msj="Esta seguro de guardar los cambios?";
	bootbox.confirm({
		title: "Mensaje",
		message: msj,
		buttons: {
			cancel: {
				label: '<i class="fa fa-times"></i> Cancelar'
			},
			confirm: {
				label: '<i class="fa fa-check"></i> Aceptar'
			}
		},
		callback: function (result) {
			//console.log('This was logged in the callback: ' + result);
			if (result){
				//Grabar
				//var formData = new FormData($("#frmestablecimiento")[0]);
				if ($('#maneja_lotes').is(':checked')){
					var maneja_lote='1';
				}else{
					var maneja_lote='0';
				}

				var parametros = {
					"id_item":$('#id_item').val(),
					"id_catalogo": $("#id_catalogo option:selected").val(),
					"id_marca": $('#id_marca').val(),
					//"id_categoria": $('#id_categoria').val(),
					"id_ums": $("#id_ums").val(),
					"id_umi": $("#id_umi").val(),
					"factor": $("#factor").val(),
					"precio_compra": $("#precio_compra").val(),
					"maneja_lote": maneja_lote,
					"id_laboratorio":$("#id_laboratorio").val(),

					"stock_real": $("#stock_real").val(),
					"stock_minimo": $("#stock_minimo").val(),
					"stock_maximo": $("#stock_maximo").val()

					};


				$.ajax({
					url: "../ajax/items.php?op=guardaryeditar",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(datos)
					{
						bootbox.alert(datos);
						//mostrarform(false);
						$('#modalNew').modal('toggle')
						table.ajax.reload();
					}

				});


			}
		}
	});

}else{
	bootbox.alert(msj);
}

}

function guardaryeditar_local()
{
	if ($("#id_local").val()==''){
		var msj="Esta seguro de guardar el nuevo registro?";
	}else{
		var msj="Esta seguro de guardar los cambios?";
	}

	bootbox.confirm({
		title: "Mensaje",
		message: msj,
		buttons: {
			cancel: {
				label: '<i class="fa fa-times"></i> Cancelar'
			},
			confirm: {
				label: '<i class="fa fa-check"></i> Aceptar'
			}
		},
		callback: function (result) {
			//console.log('This was logged in the callback: ' + result);
			if (result){
				//Grabar
				//var formData = new FormData($("#frmestablecimiento")[0]);

				var parametros = {
					"id_local":$('#id_local').val(),
					"id_empresa":$('#id_empresa_local').val(),
					"nombre":$('#nombre_local').val().toUpperCase(),
					"direccion": $('#direccion_local').val().toUpperCase(),
					"celular": $('#celular_local').val().toUpperCase(),
					"telefono_fijo": $('#telefono_fijo_local').val(),
					"id_ubigeo": $("#id_ubigeo_local").val()
					};


				$.ajax({
					url: "../ajax/local.php?op=guardaryeditar",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(datos)
					{

						//mostrarform(false);
						$('#modalLocal').modal('toggle')
						update_child($('#id_empresa_local').val());
						bootbox.alert(datos);

						//table.ajax.reload();
					}

				});


			}
		}
	});


	//e.preventDefault(); //No se activará la acción predeterminada del evento
	/*$("#btnGuardar").prop("disabled",true);*/



	/*
	limpiar();*/
}

function mostrar_item(id_item)
{
	$.post("../ajax/items.php?op=mostrar",{id_item : id_item}, function(data, status)
	{
		data = JSON.parse(data);
		$("#id_item").val(id_item);

		//$("#nombre").val(data.nombre);
		//$("#id_empresa").val(data.id_empresa);

		$("#id_ums").val(data.id_medida_sal);
		$("#id_umi").val(data.id_medida_ing);
		$("#factor").val(data.factor);
		$("#categoria").val(data.categoria);
		$("#id_laboratorio").val(data.id_laboratorio);
		$("#id_marca").val(data.id_marca);
		$("#precio_compra").val(data.precio_compra);

		$("#stock_real").val(data.stock_real);
		$("#stock_minimo").val(data.stock_minimo);
		$("#stock_maximo").val(data.stock_maximo);

		$('#id_catalogo').append("<option value='"+data.id_catalogo+"' selected='selected'>"+data.nombre_catalogo+"</option>");
 		$("#id_catalogo").trigger('change');

		if (data.maneja_lote=='1'){
			$("#maneja_lotes").iCheck('check')
		}else{
			$("#maneja_lotes").iCheck('uncheck')
		}

 		/*$("#direccion").val(data.direccion);
 		$("#ruc").val(data.ruc);
 		$("#telefono_fijo").val(data.telefono_fijo);
 		$('#ubigeo').append("<option value='"+data.id_ubigeo+"' selected='selected'>"+data.distrito+"</option>");
 		$("#ubigeo").trigger('change');*/

 		$("#modalTitle").html('Edicion de registro');
 		$('#modalNew').modal('show');
 	})
}

function mostrar_local(id_empresa,id_local){
	//alert(id_empresa);
	$("#id_empresa_local").val(id_empresa);

	$.post("../ajax/local.php?op=mostrar",{id_local : id_local}, function(data, status)
	{
		data = JSON.parse(data);
		$("#nombre_local").val(data.nombre);
		$("#id_local").val(id_local);
 		$("#direccion_local").val(data.direccion);
 		$("#celular_local").val(data.celular);
 		$("#telefono_fijo_local").val(data.telefono_fijo);
 		$('#id_ubigeo_local').append("<option value='"+data.id_ubigeo+"' selected='selected'>"+data.distrito+"</option>");
 		$("#id_ubigeo_local").trigger('change');
 		$("#modalLocalTitle").html('Edicion de local');
 		$('#modalLocal').modal('show');
 	})

}



//Función para desactivar registros
function desactivar(id_item)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/items.php?op=desactivar", {id_item : id_item}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_item)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/items.php?op=activar", {id_item : id_item}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}
function open_local(id_empresa){
	limpiar_local();
	$('#id_empresa_local').val(id_empresa)
	$('#modalLocal').modal('show')
}

//Función para activar local
function activar_local(id_empresa,id_local)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/local.php?op=activar", {id_local : id_local}, function(e){
        		bootbox.alert(e);
	            update_child(id_empresa);
        	});
        }
	})
}

//Función para desactivar registros
function desactivar_local(id_empresa,id_local)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/local.php?op=desactivar", {id_local : id_local}, function(e){
        		bootbox.alert(e);
	            update_child(id_empresa);
        	});
        }
	})
}

init();
