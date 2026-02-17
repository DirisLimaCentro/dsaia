var tabla;
var bTab = false;
//Función que se ejecuta al inicio
function open_ficha(id) {
	//alert(id_item);

	$.post("../ajax/ficha_abastecimiento.php?op=mostrar", { id: id }, function (data, status) {

		//console.log(data);
		//return false;
		data = JSON.parse(data);
		dat=data[0];
	
		$("#id_ficha").val(id);
		$("#establecimiento").val(dat.establecimiento);
		$("#distrito").val(dat.distrito_local);
		$("#ris").val(dat.ris);

		$('#fecha_encuesta').val(dat.fecha_reg);
		$('#numero_suministro').val(dat.numero_suministro);
		$('#id_tipo_sistema').val(dat.id_tipo_sistema);
		$('#numero_bombas').val(dat.numero_bombas);
		$('#potencia_bomba').val(dat.potencia_bomba);
		$('#numero_tanques_elevados').val(dat.numero_tanques_elevados);
		$('#funciona_sistema_abastecimiento').val(dat.funciona_sistema_abastecimiento);
		$('#numero_sistemas_con_grifo').val(dat.numero_sistemas_con_grifo);
		$('#antiguedad_instalacion').val(dat.antiguedad_instalacion);
		$('#conservacion_tuberias_tanque').val(dat.conservacion_tuberias_tanque);
		$('#conservacion_hidro_llave').val(dat.conservacion_hidro_llave);
		$('#horario_abastecimiento').val(dat.horario_abastecimiento);
		$('#numero_grifos_agua').val(dat.numero_grifos_agua);
		$('#cuenta_tanque_anexo').val(dat.cuenta_tanque_anexo);
		$('#capacidad_tanque_elevado').val(dat.capacidad_tanque_elevado);
		$('#capacidad_cisterna').val(dat.capacidad_cisterna);
		$('#volumen_agua_promedio_anual').val(dat.volumen_agua_promedio_anual);
		$('#distancia_cisterna_punto').val(dat.distancia_cisterna_punto);
		$('#animales_cinco_metros').val(dat.animales_cinco_metros);
		$('#tiene_cerco_perimetral_tanque').val(dat.tiene_cerco_perimetral_tanque);
		$('#posible_ingreso_ajenos').val(dat.posible_ingreso_ajenos);
		$('#material_tapa_adecuado').val(dat.material_tapa_adecuado);
		$('#tapa_tanque_buen_estado').val(dat.tapa_tanque_buen_estado);
		$('#tanque_presenta_fisuras').val(dat.tanque_presenta_fisuras);
		$('#paredes_interiores_limpias').val(dat.paredes_interiores_limpias);
		$('#natas_flotantes_tanque').val(dat.natas_flotantes_tanque);
		$('#posible_ingreso_lluvia').val(dat.posible_ingreso_lluvia);
		$('#residuos_solidos_cercanos').val(dat.residuos_solidos_cercanos);
		$('#tiene_cerco_perimetral_cisterna').val(dat.tiene_cerco_perimetral_cisterna);
		$('#boca_cisterna_raz_piso').val(dat.boca_cisterna_raz_piso);
		$('#inservibles_cercanos').val(dat.inservibles_cercanos);
		$('#fecha_muestreo').val(dat.fecha_mue);
		$('#hora_muestreo').val(dat.hora_muestreo);
		$('#punto_muestreo').val(dat.punto_muestreo);
		$('#cloro_residual').val(dat.cloro_residual);
		$('#ph').val(dat.ph);
		$('#frecuencia_medicion_cloro').val(dat.frecuencia_medicion_cloro);
		$('#toma_muestra_am').val(dat.toma_muestra_am);
		$('#fecha_ultima_limpieza').val(dat.fecha_ult);
		$('#empresa_realizo_servicio').val(dat.empresa_realizo_servicio);


		

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
		$('#fecha_registro').val(''),
		$('#numero_suministro').val(''),
		$('#id_tipo_sistema').val(''),
		$('#numero_bombas').val('0'),
		$('#potencia_bomba').val(''),
		$('#numero_tanques_elevados').val('0'),
		$('#funciona_sistema_abastecimiento').val(''),
		$('#numero_sistemas_con_grifo').val('0'),
		$('#antiguedad_instalacion').val(''),
		$('#conservacion_tuberias_tanque').val(''),
		$('#conservacion_hidro_llave').val(''),
		$('#horario_abastecimiento').val(''),
		$('#numero_grifos_agua').val('0'),
		$('#cuenta_tanque_anexo').val(''),
		$('#capacidad_tanque_elevado').val('0'),
		$('#capacidad_cisterna').val('0'),
		$('#volumen_agua_promedio_anual').val('0'),
		$('#distancia_cisterna_punto').val('0'),
		$('#animales_cinco_metros').val(''),
		$('#tiene_cerco_perimetral_tanque').val(''),
		$('#posible_ingreso_ajenos').val(''),
		$('#material_tapa_adecuado').val(''),
		$('#tapa_tanque_buen_estado').val(''),
		$('#tanque_presenta_fisuras').val(''),
		$('#paredes_interiores_limpias').val(''),
		$('#natas_flotantes_tanque').val(''),
		$('#posible_ingreso_lluvia').val(''),
		$('#residuos_solidos_cercanos').val(''),
		$('#tiene_cerco_perimetral_cisterna').val(''),
		$('#boca_cisterna_raz_piso').val(''),
		$('#inservibles_cercanos').val(''),
		$('#fecha_muestreo').val(''),
		$('#hora_muestreo').val(''),
		$('#punto_muestreo').val(''),
		$('#cloro_residual').val('0'),
		$('#ph').val('0'),
		$('#frecuencia_medicion_cloro').val(''),
		$('#toma_muestra_am').val(''),
		$('#fecha_ultima_limpieza').val(''),
		$('#empresa_realizo_servicio').val('')

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
			"sAjaxSource": "../ajax/ficha_abastecimiento.php?op=listar&id_nivel=" + $("#s_id_nivel").val() + "&id_usuario=" + $("#s_id_usuario").val() + "&id_local=" + $("#s_id_local").val(), // Load Data

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
				{ "orderable": false, "targets": 3, "searchable": false }
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
				{ aTargets: 'f.fecha_registro' },
				{ aTargets: 'u.distrito' },
				{ aTargets: 'l.ris' },
				{ aTargets: 'l.celular' },
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
		var msj = "Ingrese fecha de registro";
	} else if ($("#numero_suministro").val() == '') {
		var msj = "Ingrese numero de suministro";
	} else if ($("#id_tipo_sistema").val() == '') {
		var msj = "Ingrese tipo de sistema de abastecimiento";
	} else if ($("#numero_bombas").val() == '') {
		var msj = "Ingrese numero de bombas";
	} else if ($("#potencia_bomba").val() == '') {
		var msj = "Ingrese potencia de bomba";
	} else if ($("#numero_tanques_elevados").val() == '') {
		var msj = "Ingrese numero de tanques elevados";
	} else if ($("#funciona_sistema_abastecimiento").val() == '') {
		var msj = "Ingrese un valor para sistema de abastecimiento";

	} else if ($("#numero_sistemas_con_grifo").val() == '') {
		var msj = "Ingrese un valor para numero_sistemas_con_grifo";
	} else if ($("#antiguedad_instalacion").val() == '') {
		var msj = "Ingrese un valor para antiguedad_instalacion";

	} else if ($("#conservacion_tuberias_tanque").val() == '') {
		var msj = "Ingrese un valor para conservacion fisica de las instalaciones";
	} else if ($("#conservacion_hidro_llave").val() == '') {
		var msj = "Ingrese un valor para conservacion fisica del hidroneumatico";
	} else if ($("#horario_abastecimiento").val() == '') {
		var msj = "Ingrese un valor para horario_abastecimiento";
	} else if ($("#numero_grifos_agua").val() == '') {
		var msj = "Ingrese un valor para numero_grifos_agua";
	} else if ($("#cuenta_tanque_anexo").val() == '') {
		var msj = "Ingrese un valor para Cuenta con tanque anexo";
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
					'fecha_registro': $('#fecha_encuesta').val(),
					'numero_suministro': $('#numero_suministro').val().toUpperCase(),
					'id_tipo_sistema': $('#id_tipo_sistema').val(),
					'numero_bombas': $('#numero_bombas').val(),
					'potencia_bomba': $('#potencia_bomba').val(),
					'numero_tanques_elevados': $('#numero_tanques_elevados').val(),
					'funciona_sistema_abastecimiento': $('#funciona_sistema_abastecimiento').val(),
					'numero_sistemas_con_grifo': $('#numero_sistemas_con_grifo').val(),
					'antiguedad_instalacion': $('#antiguedad_instalacion').val().toUpperCase(),
					'conservacion_tuberias_tanque': $('#conservacion_tuberias_tanque').val(),
					'conservacion_hidro_llave': $('#conservacion_hidro_llave').val(),
					'horario_abastecimiento': $('#horario_abastecimiento').val(),
					'numero_grifos_agua': $('#numero_grifos_agua').val(),
					'cuenta_tanque_anexo': $('#cuenta_tanque_anexo').val(),
					'capacidad_tanque_elevado': $('#capacidad_tanque_elevado').val(),
					'capacidad_cisterna': $('#capacidad_cisterna').val(),
					'volumen_agua_promedio_anual': $('#volumen_agua_promedio_anual').val(),
					'distancia_cisterna_punto': $('#distancia_cisterna_punto').val(),
					'animales_cinco_metros': $('#animales_cinco_metros').val(),
					'tiene_cerco_perimetral_tanque': $('#tiene_cerco_perimetral_tanque').val(),
					'posible_ingreso_ajenos': $('#posible_ingreso_ajenos').val(),
					'material_tapa_adecuado': $('#material_tapa_adecuado').val(),
					'tapa_tanque_buen_estado': $('#tapa_tanque_buen_estado').val(),
					'tanque_presenta_fisuras': $('#tanque_presenta_fisuras').val(),
					'paredes_interiores_limpias': $('#paredes_interiores_limpias').val(),
					'natas_flotantes_tanque': $('#natas_flotantes_tanque').val(),
					'posible_ingreso_lluvia': $('#posible_ingreso_lluvia').val(),
					'residuos_solidos_cercanos': $('#residuos_solidos_cercanos').val(),
					'tiene_cerco_perimetral_cisterna': $('#tiene_cerco_perimetral_cisterna').val(),
					'boca_cisterna_raz_piso': $('#boca_cisterna_raz_piso').val(),
					'inservibles_cercanos': $('#inservibles_cercanos').val(),
					'fecha_muestreo': $('#fecha_muestreo').val(),
					'hora_muestreo': $('#hora_muestreo').val(),
					'punto_muestreo': $('#punto_muestreo').val(),
					'cloro_residual': $('#cloro_residual').val(),
					'ph': $('#ph').val(),
					'frecuencia_medicion_cloro': $('#frecuencia_medicion_cloro').val().toUpperCase(),
					'toma_muestra_am': $('#toma_muestra_am').val(),
					'fecha_ultima_limpieza': $('#fecha_ultima_limpieza').val(),
					'empresa_realizo_servicio': $('#empresa_realizo_servicio').val().toUpperCase(),
					"id_usuario": $("#s_id_usuario").val()


				};


				$.ajax({
					url: "../ajax/ficha_abastecimiento.php?op=save",
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
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function (result) {
		if (result) {
			$.post("../ajax/ficha_abastecimiento.php?op=desactivar", { id: id }, function (e) {
				bootbox.alert(e);
				table.ajax.reload();
			});
		}
	})
}

//Función para activar registros
function activar(id) {
	bootbox.confirm("¿Está Seguro de activar el registro?", function (result) {
		if (result) {
			$.post("../ajax/ficha_abastecimiento.php?op=activar", { id: id }, function (e) {
				bootbox.alert(e);
				table.ajax.reload();
			});
		}
	})
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

init();
