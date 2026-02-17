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

//Función limpiar 
function limpiar()
{
	$("#modalTitle").html('Nuevo registro');
	$("#id_proveedor").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$('#ubigeo').val('').trigger('change.select2');
	$("#ruc").val("");
	$("#telefono_fijo").val("");

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

//Función Listar
function listar()
{
	function format ( rowData ) {
		var parametros = {"id_proveedor":rowData[0]};
		var div = $('<div>')
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/proveedor.php?op=tableContactoProveedores',
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

	table=$('#tbllistado').DataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"bProcessing": true,//Activamos el procesamiento del datatables
		"bJQueryUI": false,
		"responsive": true,
		"bInfo": true,
		"bFilter": true,
	    "bServerSide": true,//Paginación y filtrado realizados por el servidor
	    "sServerMethod": "GET",
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
      	"sAjaxSource": "../ajax/proveedor.php?op=listar", // Load Data
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
		{ "orderable": true,	"targets": 1,	"searchable": true },
		{ "orderable": false,	"targets": 2,	"searchable": false },
		{ "orderable": false,	"targets": 3,	"searchable": false },
		{ "orderable": false,	"targets": 4,	"searchable": false }
		],


		columns: [
		{
			className: 'details-control',
			defaultContent: '',
			data: null,
			orderable: false,
			defaultContent: '' },

			//{ aTargets: null },
			{ aTargets: 'id' },
			{ aTargets: '' },
			{ aTargets: 'nombre' },
			{ aTargets: 'direccion' },
			{ aTargets: 'distrito' },
			{ aTargets: 'telefono_fijo' },
			{ aTargets: 'ruc' },
			{ aTargets: 'estado' }
			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 1, "asc" ]]//Ordenar (columna,orden)

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
	if ($("#id_proveedor").val()==''){
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
					"id_proveedor":$('#id_proveedor').val(),
					"nombre":$('#nombre').val().toUpperCase(),
					"nombre_comercial":$('#nombre_comercial').val().toUpperCase(),
					"direccion": $('#direccion').val().toUpperCase(),
					"ruc": $('#ruc').val().toUpperCase(),
					"telefono_fijo": $('#telefono_fijo').val(),
					"ubigeo": $("#ubigeo").val(),
					"celular": $("#celular").val(),
					"email": $("#email").val(),
					"web": $("#web").val(),
					"facebook": $("#facebook").val()
					};


				$.ajax({
					url: "../ajax/proveedor.php?op=guardaryeditar",
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



	//e.preventDefault(); //No se activará la acción predeterminada del evento
	/*$("#btnGuardar").prop("disabled",true);*/



	/*
	limpiar();*/
}


function guardaryeditar_contacto()
{
	if ($("#id_contacto").val()==''){
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
					"id_contacto":$('#id_contacto').val(),
					"id_proveedor":$('#id_proveedor_contacto').val(),
					"nombre":$('#nombre_contacto').val().toUpperCase(),
					"telefono": $('#telefono_fijo_contacto').val().toUpperCase(),
					"celular": $('#celular_contacto').val().toUpperCase(),
					"email": $('#email_contacto').val()
					};


				$.ajax({
					url: "../ajax/contacto.php?op=guardaryeditar",
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

function mostrar(id_proveedor)
{
	$.post("../ajax/proveedor.php?op=mostrar",{id_proveedor : id_proveedor}, function(data, status)
	{
		data = JSON.parse(data);
		//mostrarform(true);
		//alert(data.ruc);return false;
		$("#nombre").val(data.razon_social);
		$("#id_proveedor").val(id_proveedor);
 		$("#direccion").val(data.direccion);
		$("#nombre_comercial").val(data.nombre_comercial);
 		$("#ruc").val(data.ruc);
 		$("#telefono_fijo").val(data.telefono_fijo);
		$("#celular").val(data.celular);
		$("#email").val(data.e_mail);
		$("#web").val(data.web);
		$("#facebook").val(data.facebook);
 		$('#ubigeo').append("<option value='"+data.id_ubigeo+"' selected='selected'>"+data.distrito+"</option>");
 		$("#ubigeo").trigger('change');

 		$("#modalTitle").html('Edicion de registro');
 		$('#modalNew').modal('show');
 		//$("#nombre").focus();

 	})
}

//Función para desactivar registros
function desactivar(id_proveedor)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/proveedor.php?op=desactivar", {id_proveedor : id_proveedor}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_proveedor)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/Proveedor.php?op=activar", {id_proveedor : id_proveedor}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

function open_local(id_proveedor){
	limpiar_local();
	$('#id_empresa_local').val(id_proveedor)
	$('#modalcontacto').modal('show')
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
