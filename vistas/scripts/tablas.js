var table;

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
function imprimir(){
	document.getElementById('aDwn').setAttribute('href',"../reportes/pdfProveedores.php");
	document.getElementById('aDwn').click();	
}
//Función limpiar
function limpiar()
{
	$("#txttabla").val($("#cbotabla option:selected" ).text());
	$("#txtdescripcion").val('');
	$("#txtabreviatura").val('');
	$("#haccion").val('I');
	$("#modalTitle").html('Nuevo registro');
	/*$("#id_proveedor").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$('#ubigeo').val('').trigger('change.select2');
	$("#ruc").val("");
	$("#telefono_fijo").val("");*/

}


function limpiar_contacto()
{
	$("#modalLocalTitle").html('Nuevo registro');
	$("#id_contacto").val("");
	$("#nombre_contacto").val("");
	$("#direccion_contacto").val("");
	$('#id_ubigeo_contacto').val('').trigger('change.select2');
	$("#celular_contacto").val("");
	$("#telefono_fijo_contacto").val("");

}

//Actualiza child row
function update_child(row){
	var parametros = {"id_proveedor":row};
	$.ajax( {
		url: '../ajax/proveedor.php?op=tableProveedores',
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#row_"+row).html( json );
		}
	} );
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
	/*function format ( rowData ) {
		var parametros = {"id_proveedor":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/proveedor.php?op=tableProveedores',
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );
			}
		} );

		return div;		
	}*/

	$('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
    $('#tbllistado thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title!='' && title!='Acciones' && title!='Estado'){
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


	table=$('#tbllistado')
	/*.on('preXhr.dt', function (e, settings, data) {
        data.id_tabla_def = '11';
        return data;
    })*/.	DataTable(
	{
		
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"bProcessing": true,
		"bJQueryUI": false,
		"responsive": true,
		"bInfo": true,
		"bFilter": true,
	    "bServerSide": true,//Paginación y filtrado realizados por el servidor
	    "sServerMethod": "GET",
	   /* dom: '<Bl<f>rtip>',/
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],*/
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
      ],
      	orderCellsTop: true,
        fixedHeader: true,

      	"sAjaxSource": "../ajax/tabla.php?op=listar", 

      	"fnServerParams": function ( aoData ) {
            aoData.push(  { "name": "id_tabla", "value": $("#cbotabla option:selected").val() }	
            			 	 );
        },


      	// Load Data
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
					'loadingRecords': 'Cargando...',
            		'processing': 'Cargando...',
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
		{ "orderable": true,	"targets": 2,	"searchable": true },
		{ "orderable": true,	"targets": 3,	"searchable": true },
		{ "orderable": false,	"targets": 4,	"searchable": true }
		],


		/*columns: [		
			{ aTargets: 'descripcion' },
			{ aTargets: 'id_tipo' },
			{ aTargets: 'abreviado' },
			{ aTargets: 'fecha_creacion' }
			],*/

		"pagingType": 'full_numbers',
		"bAutoWidth": false ,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 1, "asc" ]]//Ordenar (columna,orden)

	});

	//$('#tbllistado').removeClass('display').addClass('table table-striped table-bordered');

	$('#tbllistado tfoot th').each(function () {
		//Agar kolom Action Tidak Ada Tombol Pencarian
		if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Estado" && $(this).text() != "Estado") {
				var title = $('#tbllistado thead th').eq($(this).index()).text();
				$(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
		}
	});


	/*$('#tbllistado tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = table.row( tr );

		if ( row.child.isShown() ) {
			row.child.hide();
			tr.removeClass('shown');			
		}
		else {
			row.child( format(row.data()) ).show();
			tr.addClass('shown');			
		}
	} );*/



}
//Función para guardar o editar

function guardaryeditar()
{
	if ($("#haccion").val()=='I'){
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
					"accion":$('#haccion').val(),
					"id_tipo":$('#hid_tipo').val(),
					"id_tabla":$('#cbotabla').val(),
					"descripcion":$('#txtdescripcion').val().toUpperCase(),
					"abreviado":$('#txtabreviatura').val().toUpperCase()
					};


				$.ajax({
					url: "../ajax/tabla.php?op=crud",
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
						$('#modalcontacto').modal('toggle')
						update_child($('#id_proveedor_contacto').val());
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

function mostrar(id_tipo,id_tabla)
{
	$.post("../ajax/tabla.php?op=mostrar",{id_tipo : id_tipo,id_tabla: id_tabla}, function(data, status)
	{
		data = JSON.parse(data);

		$("#txtdescripcion").val(data.descripcion);
		$("#txtabreviatura").val(data.abreviado);
 		$("#hid_tipo").val(id_tipo);
		$("#haccion").val('U');
		$("#txttabla").val(data.tabla);

 		$("#modalTitle").html('Edicion de registro');
 		$('#modalNew').modal('show');


 	})
}



function mostrar_contacto(id_proveedor,id_contacto){
	//alert(id_empresa);
	$("#id_proveedor_contacto").val(id_proveedor);

	$.post("../ajax/contacto.php?op=mostrar",{id_contacto : id_contacto}, function(data, status)
	{
		data = JSON.parse(data);
		$("#nombre_contacto").val(data.nombre);
		$("#id_contacto").val(id_contacto);
 		$("#telefono_fijo_contacto").val(data.telefono_fijo);
 		$("#celular_contacto").val(data.celular);
 		$("#email_contacto").val(data.e_mail);

 		$("#modalcontactoTitle").html('Edicion de Contacto');
 		$('#modalcontacto').modal('show');
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
        	$.post("../ajax/proveedor.php?op=activar", {id_proveedor : id_proveedor}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

function open_contacto(id_proveedor){
	limpiar_contacto();
	$('#id_proveedor_contacto').val(id_proveedor)
	$('#modalcontacto').modal('show')
}

//Función para activar local
function activar_contacto(id_empresa,id_contacto)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/local.php?op=activar", {id_contacto : id_contacto}, function(e){
        		bootbox.alert(e);
	            update_child(id_empresa);
        	});
        }
	})
}

//Función para desactivar registros
function desactivar_contacto(id_proveedor,id_contacto)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/contacto.php?op=desactivar", {id_contacto : id_contacto}, function(e){
        		bootbox.alert(e);
	            update_child(id_proveedor);
        	});
        }
	})
}

init();
