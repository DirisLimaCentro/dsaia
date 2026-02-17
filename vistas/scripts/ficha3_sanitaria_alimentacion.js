var tabla;
var bTab = false;
//Función que se ejecuta al inicio
function open_ficha(id) {
	//alert(id_item);

	$.post("../ajax/ficha3_sanitaria_alimentacion.php?op=mostrar", { id: id }, function (data, status) {

		//console.log(data);
		//return false;
		data = JSON.parse(data);



		$("#id_ficha").val(id);
		$("#establecimiento").val(data[0].establecimiento);
		$("#distrito").val(data[0].distrito_local);
		$("#fecha_encuesta").val(data[0].fecha_visita);




		$("#responsable_mercado").val(data[0].responsable_mercado);
		$("#razon_s").val(data[0].razon_s);
		$("#numero_puesto").val(data[0].numero_puesto);

		$("#tipo_alimentos").val(data[0].tipos_alimentos);


		$("#responsable_mercado").append("<option value='" + data[0].responsable_mercado + "' selected='selected'>" + data[0].nombre_mercado + "</option>");
		$("#responsable_mercado").trigger('change');

		$("#i_1").val(data[0].i_1);
		$("#i_2").val(data[0].i_2);
		$("#i_3").val(data[0].i_3);


		$("#ii_1").val(data[0].ii_1);
		$("#ii_2").val(data[0].ii_2);
		$("#ii_3").val(data[0].ii_3);
		$("#ii_4").val(data[0].ii_4);




		$("#iii_1").val(data[0].iii_1);
		$("#iii_2").val(data[0].iii_2);
		$("#iii_3").val(data[0].iii_3);
		$("#iii_4").val(data[0].iii_4);
		$("#iii_5").val(data[0].iii_5);





		$("#iiii_1").val(data[0].iiii_1);
		$("#iiii_2").val(data[0].iiii_2);
		$("#iiii_3").val(data[0].iiii_3);
		$("#iiii_4").val(data[0].iiii_4);
		$("#iiii_5").val(data[0].iiii_5);

		$("#iiii_6").val(data[0].iiii_6);
		$("#iiii_7").val(data[0].iiii_7);






		$("#n_inspector").val(data[0].n_inspector);

		$("#n_vendedor").val(data[0].n_vendedor);
		$("#n_direccion").val(data[0].n_direccion);
		$("#n_proveedores").val(data[0].n_proveedores);



		$("#total_puntaje1").val(data[0].total_puntaje1);

		$("#total_puntaje2").val(data[0].total_puntaje2);

		$("#total_puntaje3").val(data[0].total_puntaje3);
		$("#total_puntaje4").val(data[0].total_puntaje4);

		$("#total_puntaje5").val(data[0].total_puntaje5);

		$("#total_puntaje6").val(data[0].total_puntaje6);

		sum_valores();

		$("#modalTitle").html('Edicion de registro');
		$('#modalNew').modal('show');
	})
}


function buscar_persona() {
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/persona.php",
		dataType: "json",
		method: "get",
		async: false,
		data: {
			op: "buscar_id",
			tipo_doc: $("#tipo_doc").val(),
			numero_doc: $("#numero_doc").val()
		},
		beforeSend: function () {

		},
		success: function (result) {

			$("#loaderModal").hide();
			if (result.msj == '') {
				$("#id_persona").val(result.id);
				$("#nombres").val(result.nombres);
				$("#ape_paterno").val(result.ape_paterno);

				$("#ape_materno").val(result.ape_materno);
				$("#direccion_persona").val(result.direccion);

				$('#ubigeo_persona').append("<option value='" + result.id_ubigeo + "' selected='selected'>" + result.distrito + "</option>");
				$("#ubigeo_persona").trigger('change');

				$("#btnFindPersona").prop("disabled", true);
				$("#numero_doc").prop("disabled", true);


			} else {
				buscar_reniec()
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


function buscar_reniec() {

	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/services.php",
		dataType: "json",
		method: "get",
		async: false,
		data: {
			accion: "LOAD_RENIEC",
			numero_documento: $("#numero_doc").val()
		},
		beforeSend: function () {
			//$("#dialog-sunat").dialog("open");
		},
		success: function (result) {
			//$("#loaderRUC").hide();
			/*if (result.success) {
				$("#txtorganizacion").val(result.result.razon_social);
			} else {
				showMessage("Ingrese nro ruc válido", "error");
			}*/
			$("#loaderModal").hide();
			if (result.error == '') {
				var dataPersona = result.row;
				$("#nombres").val(dataPersona.nombres);
				$("#ape_paterno").val(dataPersona.apellido_paterno);
				$("#ape_materno").val(dataPersona.apellido_materno);

				$("#direccion_persona").val(dataPersona.domicilio_direccion_actual + ' ' + dataPersona.domicilio_direccion);

			} else {
				alert("Ocurrio un error en la busqueda");
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



function buscar_entidad() {
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/entidad.php",
		dataType: "json",
		method: "get",
		async: false,
		data: {
			op: "buscar_id",
			ruc: $("#ruc").val(),
		},
		beforeSend: function () {

		},
		success: function (result) {

			$("#loaderModal").hide();
			if (result.msj == '') {
				$("#razon_social").val(result.nombre);
				$("#direccion_empresa").val(result.direccion);

				$("#telefono_fijo_empresa").val(result.telefono_fijo);
				$("#celular_empresa").val(result.celular);
				$("#email_empresa").val(result.e_mail);

				$("#id_entidad").val(result.id);

				$('#ubigeo').append("<option value='" + result.id_ubigeo + "' selected='selected'>" + result.distrito + "</option>");
				$("#ubigeo").trigger('change');

				$("#btnfindRuc").prop("disabled", true);
				$("#ruc").prop("disabled", true);


			} else {
				buscar_sunat()
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
function buscar_sunat() {


	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/services.php",
		dataType: "json",
		method: "get",
		async: false,
		data: {
			accion: "LOAD_SUNAT",
			ruc: $("#ruc").val(),
		},
		beforeSend: function () {
			//$("#dialog-sunat").dialog("open");
		},
		success: function (result) {
			//$("#loaderRUC").hide();
			/*if (result.success) {
				$("#txtorganizacion").val(result.result.razon_social);
			} else {
				showMessage("Ingrese nro ruc válido", "error");
			}*/
			$("#loaderModal").hide();
			if (result.msj == '') {
				$("#razon_social").val(result.razon_social);
				$("#direccion_empresa").val(result.direccion);
				//$("#nombre_comercial").val(result.result.nombre_comercial);
			} else {
				alert("Ocurrio un error en la busqueda");
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
function delete_localidad(id) {
	bootbox.confirm({
		message: "Está seguro de eliminar el registro seleccionado?",
		buttons: {
			confirm: {
				label: '<i class="fa fa-check"></i> Si',
				className: 'btn-success'
			},
			cancel: {
				label: '<i class="fa fa-times"></i> No',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				$.post("../ajax/empresa.php?op=deleteLocalidad", { id_localidad: id }, function (e) {
					bootbox.alert(e);
					tblReq.ajax.reload();
				});
			}
		}
	});
}
function new_localidad() {
	$("#id_localidad").val('0');
	$("#nombre_localidad").val('');
	$("#sector").val('');
	$("#cnt_viviendas").val('0');
	$('#modalNewLocalidad').modal('show');
}
function show_localidad(id) {
	$.post("../ajax/empresa.php?op=mostrarLocalidad", { id_localidad: id }, function (data, status) {
		data = JSON.parse(data);
		$("#nombre_localidad").val(data.descripcion);
		$("#sector").val(data.sector);
		$("#cnt_viviendas").val(data.cnt_viviendas);
		$("#id_localidad").val(id);
		$('#modalNewLocalidad').modal('show');
	});
}

function saveLocalidad() {
	if ($("#sector").val() == '') {
		return bootbox.alert('Ingrese sector');
	}
	if ($("#nombre_localidad").val() == '') {
		return bootbox.alert('Ingrese nombre localidad');
	}
	if ($("#cnt_viviendas").val() == '') {
		return bootbox.alert('Ingrese 0 o un valor valido en viviendas');
	}


	bootbox.confirm({
		title: "Mensaje",
		message: "Esta seguro de guardar el registro?",
		buttons: {
			cancel: {
				label: '<i class="fa fa-times"></i> Cancelar'
			},
			confirm: {
				label: '<i class="fa fa-check"></i> Aceptar',
				className: 'btn-success'
			}
		},
		callback: function (result) {
			//console.log('This was logged in the callback: ' + result);
			if (result) {
				//Grabar
				//var formData = new FormData($("#frmestablecimiento")[0]);

				var parametros = {
					"id_localidad": $("#id_localidad").val(),
					"id_local": $('#id_local').val(),
					"sector": $("#sector").val(),
					"nombre": $('#nombre_localidad').val().toUpperCase(),
					"cnt_viviendas": $("#cnt_viviendas").val(),
					"id_usuario": $("#s_id_usuario").val()
				};


				$.ajax({
					url: "../ajax/empresa.php?op=saveLocalidad",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function (msg) {
						//bootbox.alert(datos);
						//mostrarform(false);
						var amsg = msg.split('|');
						var nerror = amsg[0];
						if (nerror == '0') {
							return bootbox.alert('Ocurrio un error: ' + amsg[1]);
						} else {
							$('#modalNewLocalidad').modal('toggle')
							bootbox.alert('Registro guardado');
						}

						tblReq.ajax.reload();
					}

				});


			}
		}
	});

}
function listLocalidades(id_establecimiento) {
	$("#id_local").val(id_establecimiento);
	if (bTab == true) {

		tblReq.ajax.reload();
		//tblReq.destroy();
		return false;
	}
	bTab = true;
	$('#tbllocalidades thead tr').clone(true).appendTo('#tbllocalidades thead');
	$('#tbllocalidades thead tr:eq(1) th').each(function (i) {
		var title = $(this).text();
		if (title != '' && title != 'Acciones' && title != 'Fecha Aut' && title != 'Atendido') {
			$(this).html('<input style="width:100%;" type="text" class="form-control input-sm" placeholder="Buscar ' + title + '" />');
		} else {
			$(this).html('');
		}
		$('input', this).on('keyup change', function () {
			if (tblReq.column(i).search() !== this.value) {
				tblReq
					.column(i)
					.search(this.value)
					.draw();
			}
		});
	});
	tblReq = $('#tbllocalidades').DataTable({
		//dom: "ltip",
		dom: "Bltip",

		"buttons": [
			{
				text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
				className: "btn btn-info btn-sm",
				action: function (e, dt, node, config) {
					new_localidad();
				}

			}
		],


		orderCellsTop: true,
		fixedHeader: true,
		"lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
		"bProcessing": true, //Activamos el procesamiento del datatables
		"bJQueryUI": false,
		//"responsive": true,
		"bInfo": true,
		"bFilter": true,
		"bServerSide": true, //Paginación y filtrado realizados por el servidor
		"sServerMethod": "GET",
		//dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
		/*buttons: [
		  'copyHtml5',
		  'excelHtml5',
		  'csvHtml5',
		  'pdf'
		],*/
		"sAjaxSource": "../ajax/empresa.php?op=listarLocalidades", // Load Data

		"fnServerParams": function (aoData) {
			aoData.push({ "name": "id_establecimiento", "value": $('#id_local').val() }

			);
		},
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
			"info": "Mostrando _PAGE_ a _PAGES_ de _TOTAL_ registros",
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

			{
				"orderable": false,
				"targets": 0,
				"searchable": false
			},
			{
				"orderable": true,
				"targets": 1,
				"searchable": true
			},
			{
				"orderable": true,
				"targets": 2,
				"searchable": true
			},
			{
				"orderable": true,
				"targets": 3,
				"searchable": true
			}

		],
		fixedColumns: true,
		initComplete: function () {
			tblReq.columns().every(function () {
				var that = this;
				$('input', this.footer()).on('keyup change', function () {
					that
						.search(this.value)
						.draw();
				});
			});
		},
		columns: [

			{ aTargets: 'l.id', "width": "5%" },
			{ aTargets: 'sec.descripcion', "width": "5%", },
			{ aTargets: 'l.descripcion', "width": "80%", },
			{ aTargets: 'l.cnt_viviendas', "width": "10%" }


		],

		"pagingType": 'full_numbers',
		"iDisplayLength": 5, //Paginación
		"order": [
			[2, "asc"]
		] //Ordenar (columna,orden)

	});


	$('#tbllocalidades').removeClass('display').addClass('table table-striped table-bordered');

	$('#tbllocalidades tfoot th').each(function () {
		//Agar kolom Action Tidak Ada Tombol Pencarian
		if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Atendido" && $(this).text() != "Fecha Aut") {
			var title = $('#tbllocalidades thead th').eq($(this).index()).text();
			$(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
		}
	});



}
function init() {
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
function show_localidades(id_establecimiento) {
	//$("#modalTitleLocalidad").html('Localidades: '+nombre);
	listLocalidades(id_establecimiento);
	$('#modalLocalidades').modal('show');
}
function limpiar_local() {
	$("#modalLocalTitle").html('Nuevo registro');
	$("#id_local").val("");
	$("#nombre_local").val("");
	$("#direccion_local").val("");
	$('#id_ubigeo_local').val('').trigger('change.select2');
	$("#celular_local").val("");
	$("#telefono_fijo_local").val("");

}

function limpiar() {
	$("#modalTitle").html('Nuevo registro');
	$("#id_ficha").val("");

	//$("#fecha_encuesta").val("");

	$("#razon_s").val("");
	$("#numero_puesto").val("");
	$("#tipo_alimentos").val("");
	$("#responsable_mercado").val("");




	$('.text-right').val('0');
	sum_valores();



}


//Función mostrar formulario
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
	}
	else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform() {
	limpiar();
	mostrarform(false);
}

function createDataTable(id) {
	tbl = "dt" + id;
	dt = $('#' + tbl).DataTable({
		dom: "lftip",
		orderCellsTop: true,
		fixedHeader: true,
		fixedColumns: true,
		"lengthChange": true,
		"lengthMenu": [5, 10, 25, 75, 100],
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
			{ "orderable": false, "targets": 0, "searchable": false, "width": "12%" },
			{ "orderable": true, "targets": 1, "searchable": true },
			{ "orderable": true, "targets": 2, "searchable": true /*, className: "wrapok"*/ },
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
		"bAutoWidth": false,
		"iDisplayLength": 10
	});
}

//Actualiza child row
function update_child(row) {
	var parametros = { "id_empresa": row };
	$.ajax({
		url: '../ajax/empresa.php?op=tableLocales',
		data: parametros,
		dataType: 'html',
		success: function (json) {
			$("#row_" + row).html(json);
			createDataTable(row);
		}
	});
}

//Función Listar
function listar() {
	function format(rowData) {
		var parametros = { "id_empresa": rowData[0] };
		var div = $("<div id='row_" + rowData[0] + "' >")
			.addClass('Cargando')
			.text('Cargando...');
		$.ajax({
			url: '../ajax/empresa.php?op=tableLocales',
			data: parametros,
			dataType: 'html',
			success: function (json) {
				div
					.html(json)
					.removeClass('loading');
				createDataTable(rowData[0]);

			}
		});

		return div;
		//alert('hola');
	}


	$('#tbllistado thead tr').clone(true).appendTo('#tbllistado thead');
	$('#tbllistado thead tr:eq(1) th').each(function (i) {
		var title = $(this).text();
		if (title != '' && $.trim(title) != 'Acciones' && title != 'Fecha Inicio' && title != 'Fecha Termino' && title != 'Fecha Crea') {
			$(this).html('<input style="width:100%;" type="text" class="form-control input-sm" placeholder="Buscar ' + title + '" />');
		} else {
			$(this).html('');
		}
		$('input', this).on('keyup change', function () {
			if (table.column(i).search() !== this.value) {
				table
					.column(i)
					.search(this.value)
					.draw();
			}
		});
	});

	table = $('#tbllistado').DataTable(
		{

			dom: "Bltip",

			"buttons": [
				{
					text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
					className: "btn btn-success btn-sm",
					action: function (e, dt, node, config) {
						ver();
					}

				}
			],


			"lengthMenu": [5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
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
			"sAjaxSource": "../ajax/ficha3_sanitaria_alimentacion.php?op=listar&id_nivel=" + $("#s_id_nivel").val() + "&id_usuario=" + $("#s_id_usuario").val() + "&id_local=" + $("#s_id_local").val(), // Load Data

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
				{ "orderable": false, "targets": 0, "searchable": false },
				{ 'width': '2%', "orderable": true, "targets": 1, "searchable": true },
				{ "orderable": false, "targets": 2, "searchable": false },
				{ "orderable": false, "targets": 3, "searchable": false },
				{ "orderable": false, "targets": 4, "searchable": true }
			],

			"createdRow": function (row, data, dataIndex) {
				if (data[9] == 'f') {
					$(row).addClass('danger')
				}

			},

			initComplete: function () {
				$('.dt-buttons').removeClass('btn-group');
				table.columns().every(function () {
					var that = this;
					$('input', this.footer()).on('keyup change', function () {
						that
							.search(this.value)
							.draw();
					});
				});
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
				{ aTargets: 'me.nombre_mercado' },
				{ aTargets: 'f.razon_s' },
				{ aTargets: 'f.numero_puesto' },
				{ aTargets: 'uc.login' },
				{ aTargets: 'f.fecha_creacion' }

			],

			"pagingType": 'full_numbers',
			"iDisplayLength": 10,//Paginación
			"order": [[8, "des"]]//Ordenar (columna,orden)

		});


	$('#tbllistado tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = table.row(tr);

		if (row.child.isShown()) {
			row.child.hide();
			tr.removeClass('shown');
			//tr.find('svg').attr('data-icon', 'plus-circle');
		}
		else {
			row.child(format(row.data())).show();
			tr.addClass('shown');
			//tr.find('svg').attr('data-icon', 'minus-circle');
		}
	});


	/*$('.buttons-excel, .buttons-print').each(function() {
	   $(this).removeClass('btn-default').addClass('btn-primary')
	})*/


}
//Función para guardar o editar

function guardaryeditar() {
	msj = "";
	/*if ($("#ruc").val()==''){
		msj="Ingrese RUC del establecimiento";
		}else if(){

		}*/


	if ($("#fecha_encuesta").val() == '') {
		var msj = "Ingrese fecha de visita";

	} else if ($("#responsable_mercado").val() == '') {
		var msj = "Ingrese responsable del modulo de venta";
	} else if ($("#razon_s").val() == '') {
		var msj = "Ingrese numero de carnet";
	} else if ($("#numero_puesto").val() == '') {
		var msj = "Ingrese numero de puesto";
	} else if ($("#tipo_alimentos").val() == '') {
		var msj = "Ingrese tipo de alimentos";
	}

	if (msj) {
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

			if (result) {

				var parametros = {
					"id_ficha": ($("#id_ficha").val() == '') ? '0' : $("#id_ficha").val(),
					"id_local": $("#s_id_local").val(),
					"id_usuario": $("#s_id_usuario").val(),


					"responsable_mercado": $('#responsable_mercado').val().toUpperCase(),
					"razon_s": $('#razon_s').val().toUpperCase(),
					"numero_puesto": $('#numero_puesto').val().toUpperCase(),
					"tipo_alimentos": $("#tipo_alimentos").val().toUpperCase(),
					"fecha": $("#fecha_encuesta").val(),


					"i_1": $('#i_1').val(),
					"i_2": $('#i_2').val(),
					"i_3": $('#i_3').val(),



					"ii_1": $('#ii_1').val(),
					"ii_2": $('#ii_2').val(),
					"ii_3": $('#ii_3').val(),
					"ii_4": $('#ii_4').val(),



					"iii_1": $('#iii_1').val(),
					"iii_2": $('#iii_2').val(),
					"iii_3": $('#iii_3').val(),
					"iii_4": $('#iii_4').val(),
					"iii_5": $('#iii_5').val(),




					"iiii_1": $('#iiii_1').val(),
					"iiii_2": $('#iiii_2').val(),
					"iiii_3": $('#iiii_3').val(),
					"iiii_4": $('#iiii_4').val(),
					"iiii_5": $('#iiii_5').val(),

					"iiii_6": $('#iiii_6').val(),
					"iiii_7": $('#iiii_7').val(),





					"n_inspector": $('#n_inspector').val(),

					"n_vendedor": $('#n_vendedor').val(),

					"n_direccion": $('#n_direccion').val(),

					"n_proveedores": $('#n_proveedores').val(),




					"total_puntaje1": $('#total_puntaje1').val(),

					"total_puntaje2": $('#total_puntaje2').val(),


					"total_puntaje3": $('#total_puntaje3').val(),

					"total_puntaje4": $('#total_puntaje4').val(),

					"total_puntaje5": $('#total_puntaje5').val(),

					"total_puntaje6": $('#total_puntaje6').val()

				};


				$.ajax({
					url: "../ajax/ficha3_sanitaria_alimentacion.php?op=save",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function (msg) {
						//bootbox.alert(datos);
						//mostrarform(false);
						//$('#modalNew').modal('toggle')

						table.ajax.reload();
						var amsg = msg.split('|');
						var nerror = amsg[0];
						if (nerror == '0') {
							bootbox.alert('Ocurrio un error: ' + amsg[1]);
						} else {
							$('#modalNew').modal('toggle');
							bootbox.alert('Registro guardado');
						}

					}

				});


			}
		}
	});

}

function guardaryeditar_local() {
	if ($("#nombre_local").val() == '') {
		bootbox.alert('Ingrese nombre del local');
		return false;
	}
	if ($("#id_local").val() == '') {
		var msj = "Esta seguro de guardar el nuevo registro?";
	} else {
		var msj = "Esta seguro de guardar los cambios?";
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
			if (result) {
				//Grabar
				//var formData = new FormData($("#frmestablecimiento")[0]);

				var parametros = {
					"id_local": $('#id_local').val(),
					"id_empresa": $('#id_empresa_local').val(),
					"nombre": $('#nombre_local').val().toUpperCase(),
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

					success: function (datos) {

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

function mostrar(id_empresa) {
	$.post("../ajax/empresa.php?op=mostrar", { id_empresa: id_empresa }, function (data, status) {
		data = JSON.parse(data);
		$("#nombre").val(data.nombre);
		$("#id_empresa").val(id_empresa);
		$("#direccion").val(data.direccion);
		$("#ruc").val(data.ruc);
		$("#telefono_fijo").val(data.telefono_fijo);
		$('#ubigeo').append("<option value='" + data.id_ubigeo + "' selected='selected'>" + data.distrito + "</option>");
		$("#ubigeo").trigger('change');
		$("#modalTitle").html('Edicion de registro');
		$('#modalNew').modal('show');
	})
}

function mostrar_local(id_empresa, id_local) {
	//alert(id_empresa);
	$("#id_empresa_local").val(id_empresa);

	$.post("../ajax/local.php?op=mostrar", { id_local: id_local }, function (data, status) {
		data = JSON.parse(data);
		$("#nombre_local").val(data.nombre);
		$("#id_local").val(id_local);
		$("#direccion_local").val(data.direccion);
		$("#celular_local").val(data.celular);
		$("#telefono_fijo_local").val(data.telefono_fijo);
		$('#id_ubigeo_local').append("<option value='" + data.id_ubigeo + "' selected='selected'>" + data.distrito + "</option>");
		$("#id_ubigeo_local").trigger('change');
		$("#modalLocalTitle").html('Edicion de local');
		$('#modalLocal').modal('show');
	})

}



//Función para desactivar registros
function desactivar(id) {
	bootbox.confirm({
		message: "Está seguro de anular el registro " + id + "?",
		buttons: {
			confirm: {
				label: '<i class="fa fa-check"></i> Si',
				className: 'btn-success'
			},
			cancel: {
				label: '<i class="fa fa-times"></i> No',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				$.post("../ajax/ficha3_sanitaria_alimentacion.php?op=desactivar", { id_ficha: id }, function (e) {
					bootbox.alert(e);
					table.ajax.reload();
				});
			}
		}
	});
}

//Función para activar registros
function activar(id) {

	bootbox.confirm({
		message: "Está seguro de activar el registro " + id + "?",
		buttons: {
			confirm: {
				label: '<i class="fa fa-check"></i> Si',
				className: 'btn-success'
			},
			cancel: {
				label: '<i class="fa fa-times"></i> No',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				$.post("../ajax/ficha3_sanitaria_alimentacion.php?op=activar", { id_ficha: id }, function (e) {
					bootbox.alert(e);
					table.ajax.reload();
				});
			}
		}
	});
}

function open_local(id_empresa) {
	limpiar_local();
	$('#id_empresa_local').val(id_empresa)
	$('#modalLocal').modal('show')
}

//Función para activar local
function activar_local(id_empresa, id_local) {
	bootbox.confirm("¿Está Seguro de activar el registro?", function (result) {
		if (result) {
			$.post("../ajax/local.php?op=activar", { id_local: id_local }, function (e) {
				bootbox.alert(e);
				update_child(id_empresa);
			});
		}
	})
}

//Función para desactivar registros
function desactivar_local(id_empresa, id_local) {
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function (result) {
		if (result) {
			$.post("../ajax/local.php?op=desactivar", { id_local: id_local }, function (e) {
				bootbox.alert(e);
				update_child(id_empresa);
			});
		}
	})
}



/*combo de ficha 3 */
$(document).ready(function () {

	$("#responsable_mercado").select2({
		ajax: {
			url: "../ajax/tablas_mercado.php",
			type: "post",
			dataType: 'json',
			delay: 250,
			data: function (params) {
				return {
					searchTerm: params.term // search term
				};
			},
			processResults: function (response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});


});






init();
