var tabla;
var bTab = false;

//Función que se ejecuta al inicio

function evalCloro() {

	clo1 = $('#resul_cloro_residual_1').val();
	clo2 = $('#resul_cloro_residual_2').val();
	clo3 = $('#resul_cloro_residual_3').val();
	clo4 = $('#resul_cloro_residual_4').val();


	if (clo1 != '') {
		clo1 = parseFloat(clo1);
		if (clo1 >= 0.4 && clo1 <= 1.2) {
			$("#resul_cloro_residual_1").removeClass("bg bg-red");
			$("#resul_cloro_residual_1").addClass("bg bg-green");
		} else {
			$("#resul_cloro_residual_1").removeClass("bg bg-green");
			$("#resul_cloro_residual_1").addClass("bg bg-red");
		}
	} else {
		$("#resul_cloro_residual_1").removeClass("bg bg-green bg-red");
	}

	if (clo2 != '') {
		clo2 = parseFloat(clo2);
		if (clo2 >= 0.4 && clo2 <= 1.2) {
			$("#resul_cloro_residual_2").removeClass("bg bg-red");
			$("#resul_cloro_residual_2").addClass("bg bg-green");
		} else {
			$("#resul_cloro_residual_2").removeClass("bg bg-green");
			$("#resul_cloro_residual_2").addClass("bg bg-red");
		}
	} else {
		$("#resul_cloro_residual_2").removeClass("bg bg-green bg-red");
	}

	if (clo3 != '') {
		clo3 = parseFloat(clo3);
		if (clo3 >= 0.4 && clo3 <= 1.2) {
			$("#resul_cloro_residual_3").removeClass("bg bg-red");
			$("#resul_cloro_residual_3").addClass("bg bg-green");
		} else {
			$("#resul_cloro_residual_3").removeClass("bg bg-green");
			$("#resul_cloro_residual_3").addClass("bg bg-red");
		}
	} else {
		$("#resul_cloro_residual_3").removeClass("bg bg-green bg-red");
	}

	if (clo4 != '') {
		clo4 = parseFloat(clo4);
		if (clo4 >= 0.4 && clo4 <= 1.2) {
			$("#resul_cloro_residual_4").removeClass("bg bg-red");
			$("#resul_cloro_residual_4").addClass("bg bg-green");
		} else {
			$("#resul_cloro_residual_4").removeClass("bg bg-green");
			$("#resul_cloro_residual_4").addClass("bg bg-red");
		}
	} else {
		$("#resul_cloro_residual_4").removeClass("bg bg-green bg-red");
	}

	process_result();
}

function evalPh() {

	ph1 = $('#resul_ph_1').val();
	ph2 = $('#resul_ph_2').val();
	ph3 = $('#resul_ph_3').val();
	ph4 = $('#resul_ph_4').val();


	if (ph1 != '') {
		ph1 = parseFloat(ph1);
		if (ph1 >= 6.5 && ph1 <= 8.5) {
			$("#resul_ph_1").removeClass("bg bg-red");
			$("#resul_ph_1").addClass("bg bg-green");
		} else {
			$("#resul_ph_1").removeClass("bg bg-green");
			$("#resul_ph_1").addClass("bg bg-red");
		}
	} else {
		$("#resul_ph_1").removeClass("bg bg-green bg-red");
	}

	if (ph2 != '') {
		ph2 = parseFloat(ph2);
		if (ph2 >= 6.5 && ph2 <= 8.5) {
			$("#resul_ph_2").removeClass("bg bg-red");
			$("#resul_ph_2").addClass("bg bg-green");
		} else {
			$("#resul_ph_2").removeClass("bg bg-green");
			$("#resul_ph_2").addClass("bg bg-red");
		}
	} else {
		$("#resul_ph_2").removeClass("bg bg-green bg-red");
	}

	if (ph3 != '') {
		ph3 = parseFloat(ph3);
		if (ph3 >= 6.5 && ph3 <= 8.5) {
			$("#resul_ph_3").removeClass("bg bg-red");
			$("#resul_ph_3").addClass("bg bg-green");
		} else {
			$("#resul_ph_3").removeClass("bg bg-green");
			$("#resul_ph_3").addClass("bg bg-red");
		}
	} else {
		$("#resul_ph_3").removeClass("bg bg-green bg-red");
	}

	if (ph4 != '') {
		ph4 = parseFloat(ph4);
		if (ph4 >= 6.5 && ph4 <= 8.5) {
			$("#resul_ph_4").removeClass("bg bg-red");
			$("#resul_ph_4").addClass("bg bg-green");
		} else {
			$("#resul_ph_4").removeClass("bg bg-green");
			$("#resul_ph_4").addClass("bg bg-red");
		}
	} else {
		$("#resul_ph_4").removeClass("bg bg-green bg-red");
	}

	process_result();
}


function evalTurbidez() {

	tur1 = $('#resul_turbidez_1').val();
	tur2 = $('#resul_turbidez_2').val();
	tur3 = $('#resul_turbidez_3').val();
	tur4 = $('#resul_turbidez_4').val();


	if (tur1 != '') {
		tur1 = parseFloat(tur1);
		if (tur1 <= 5) {
			$("#resul_turbidez_1").removeClass("bg bg-red");
			$("#resul_turbidez_1").addClass("bg bg-green");
		} else {
			$("#resul_turbidez_1").removeClass("bg bg-green");
			$("#resul_turbidez_1").addClass("bg bg-red");
		}
	} else {
		$("#resul_turbidez_1").removeClass("bg bg-green bg-red");
	}

	if (tur2 != '') {
		tur2 = parseFloat(tur2);
		if (tur2 <= 5) {
			$("#resul_turbidez_2").removeClass("bg bg-red");
			$("#resul_turbidez_2").addClass("bg bg-green");
		} else {
			$("#resul_turbidez_2").removeClass("bg bg-green");
			$("#resul_turbidez_2").addClass("bg bg-red");
		}
	} else {
		$("#resul_turbidez_2").removeClass("bg bg-green bg-red");
	}

	if (tur3 != '') {
		tur3 = parseFloat(tur3);
		if (tur3 <= 5) {
			$("#resul_turbidez_3").removeClass("bg bg-red");
			$("#resul_turbidez_3").addClass("bg bg-green");
		} else {
			$("#resul_turbidez_3").removeClass("bg bg-green");
			$("#resul_turbidez_3").addClass("bg bg-red");
		}
	} else {
		$("#resul_turbidez_3").removeClass("bg bg-green bg-red");
	}

	if (tur4 != '') {
		tur4 = parseFloat(tur4);
		if (tur4 <= 5) {
			$("#resul_turbidez_4").removeClass("bg bg-red");
			$("#resul_turbidez_4").addClass("bg bg-green");
		} else {
			$("#resul_turbidez_4").removeClass("bg bg-green");
			$("#resul_turbidez_4").addClass("bg bg-red");
		}
	} else {
		$("#resul_turbidez_4").removeClass("bg bg-green bg-red");
	}

	process_result();


}

function muestra(){
	
}

function process_result(){
	var resPat='';
	var resPis1='';
	var resPis2='';
	var resPis3='';

	if ($('#chkrow1').is(':checked')) {
		if ($("#resul_cloro_residual_1").hasClass("bg-green") && $("#resul_ph_1").hasClass("bg-green") && $("#resul_turbidez_1").hasClass("bg-green")) {
			resPat='1';
		}else{
			resPat='0';
		}
	}

	if ($('#chkrow2').is(':checked')) {
		if ($("#resul_cloro_residual_2").hasClass("bg-green") && $("#resul_ph_2").hasClass("bg-green") && $("#resul_turbidez_2").hasClass("bg-green")) {
			resPis1='1';
		}else{
			resPis1='0';
		}
	}

	if ($('#chkrow3').is(':checked')) {
		if ($("#resul_cloro_residual_3").hasClass("bg-green") && $("#resul_ph_3").hasClass("bg-green") && $("#resul_turbidez_3").hasClass("bg-green")) {
			resPis2='1';
		}else{
			resPis2='0';
		}
	}
	if ($('#chkrow4').is(':checked')) {
		if ($("#resul_cloro_residual_4").hasClass("bg-green") && $("#resul_ph_4").hasClass("bg-green") && $("#resul_turbidez_4").hasClass("bg-green")) {
			resPis3='1';
		}else{
			resPis3='0';
		}
	}

	lavapies=$("#tipo_lavapies").val();
	sshh=$("#tipo_sshh").val();
	recir=$("#tipo_recirculacion").val();

	/*if ($('#tipo_recirculacion').is(':checked') ) {
		recir='1'
	}else{
		recir='';
	}*/


	if ($('#limpieza_local').is(':checked') ) {
		limplocal='1'
	}else{
		limplocal='';
	}

	//limpestanque=($('#limpieza_estanque').is(':checked'))?'1':'';
	limpestanque=$("#limpieza_estanque").val();

	aedes=($('#criador_aedes_aegypti').is(':checked'))?'':'1';
	cuerpos=($('#cuerpos_agua').is(':checked'))?'':'1';
	cuaderno=($('#cuaderno_registro').is(':checked'))?'1':'';
	aprobacion=($('#aprobacion_sanitaria').is(':checked'))?'1':'';

	
	if ( (resPat=='' || resPat=='1') && (resPis1=='' || resPis1=='1') && (resPis2=='' || resPis2=='1') &&  (resPis3=='' || resPis3=='1')
		&& (lavapies!='2') && (sshh=='3' || sshh=='1') && (recir=='1') && (limplocal=='1')
		&& (limpestanque=='1') && (aedes=='1') && (cuerpos=='1') && (cuaderno=='1') && (aprobacion=='1')
		) {
		$("#label_resultado").html("Apto");
		$("#div_resultado").removeClass("red");
		$("#div_resultado").addClass("green");

		$("#icon_resultado").removeClass("red fa-close");
		$("#icon_resultado").addClass("fa-check green");

	}else{
		$("#label_resultado").html("No Apto");
		$("#div_resultado").removeClass("green");
		$("#div_resultado").addClass("red");

		$("#icon_resultado").addClass("red fa-close");
		$("#icon_resultado").removeClass("fa-check green");

	}
	

}

function open_ficha(id) {
	//alert(id_item);

	$.post("../ajax/ficha_vigilancia_piscina.php?op=mostrar", { id: id }, function (data, status) {

		//console.log(data);
		//return false;
		data = JSON.parse(data);

		$("#local").val(data[0].establecimiento);

		$("#ruc").val(data[0].ruc);
		$("#razon_social").val(data[0].razon_social);
		$("#direccion_empresa").val(data[0].direccion_empresa);
		$('#ubigeo').append("<option value='" + data[0].id_ubigeo_empresa + "' selected='selected'>" + data[0].distrito_empresa + "</option>");
		$("#ubigeo").trigger('change');
		$("#telefono_fijo_empresa").val(data[0].telefono_fijo_empresa);
		$("#celular_empresa").val(data[0].celular_empresa);
		$("#email_empresa").val(data[0].email_empresa);
		$("#nombre_representante").val(data[0].nombre_representante);

		$("#tipo_doc").val(data[0].id_tipo_documento);
		$("#numero_doc").val(data[0].numero_documento);
		$("#nombres").val(data[0].nombres);
		$("#ape_paterno").val(data[0].ape_paterno);
		$("#ape_materno").val(data[0].ape_materno);

		$("#long_este").val(data[0].long_este);
		$("#long_norte").val(data[0].long_norte);


		$("#id_ficha").val(id);
		$("#id_entidad").val(data[0].id_entidad);
		$("#id_persona").val(data[0].id_persona);
		$("#fecha_encuesta").val(data[0].fecha);
		$("#hora_inicio").val(data[0].hora_inicio);
		$("#hora_fin").val(data[0].hora_fin);



		$('#tipo_inspeccion').val(data[0].id_motivo_ficha);

		$('#tipo_lavapies').val(data[0].id_instalacion_lavapies);

		$('#tipo_sshh').val(data[0].id_instalacion_sshh);


		$("#resul_cloro_residual_1").val(data[0].resul_cloro_residual_1);
		$("#resul_ph_1").val(data[0].resul_ph_1);
		$("#resul_temperatura_1").val(data[0].resul_temperatura_1);
		$("#resul_turbidez_1").val(data[0].resul_turbidez_1);

		$("#resul_cloro_residual_2").val(data[0].resul_cloro_residual_2);
		$("#resul_ph_2").val(data[0].resul_ph_2);
		$("#resul_temperatura_2").val(data[0].resul_temperatura_2);
		$("#resul_turbidez_2").val(data[0].resul_turbidez_2);

		$("#resul_cloro_residual_3").val(data[0].resul_cloro_residual_3);
		$("#resul_ph_3").val(data[0].resul_ph_3);
		$("#resul_temperatura_3").val(data[0].resul_temperatura_3);
		$("#resul_turbidez_3").val(data[0].resul_turbidez_3);

		$("#resul_cloro_residual_4").val(data[0].resul_cloro_residual_4);
		$("#resul_ph_4").val(data[0].resul_ph_4);
		$("#resul_temperatura_4").val(data[0].resul_temperatura_4);
		$("#resul_turbidez_4").val(data[0].resul_turbidez_4);

		valores = $("#resul_cloro_residual_1").val() + $("#resul_ph_1").val() + $("#resul_temperatura_1").val() + $("#resul_turbidez_1").val();
		if (valores != '') {
			$("#chkrow1").iCheck('check');
			$('#resul_cloro_residual_1').removeAttr('disabled');
			$('#resul_ph_1').removeAttr('disabled');
			$('#resul_temperatura_1').removeAttr('disabled');
			$('#resul_turbidez_1').removeAttr('disabled');
		} else {
			$("#chkrow1").removeAttr('checked').iCheck('update');
			$('#resul_cloro_residual_1').attr('disabled','disabled');
			$('#resul_ph_1').attr('disabled','disabled');
			$('#resul_temperatura_1').attr('disabled','disabled');
			$('#resul_turbidez_1').attr('disabled','disabled');
		}

		valores = $("#resul_cloro_residual_2").val() + $("#resul_ph_2").val() + $("#resul_temperatura_2").val() + $("#resul_turbidez_2").val();
		if (valores != '') {
			$("#chkrow2").iCheck('check');
			$('#resul_cloro_residual_2').removeAttr('disabled');
			$('#resul_ph_2').removeAttr('disabled');
			$('#resul_temperatura_2').removeAttr('disabled');
			$('#resul_turbidez_2').removeAttr('disabled');
		} else {
			$("#chkrow2").removeAttr('checked').iCheck('update');
			$('#resul_cloro_residual_2').attr('disabled','disabled');
			$('#resul_ph_2').attr('disabled','disabled');
			$('#resul_temperatura_2').attr('disabled','disabled');
			$('#resul_turbidez_2').attr('disabled','disabled');
		}

		valores = $("#resul_cloro_residual_3").val() + $("#resul_ph_3").val() + $("#resul_temperatura_3").val() + $("#resul_turbidez_3").val();
		if (valores != '') {
			$("#chkrow3").iCheck('check');
			$('#resul_cloro_residual_3').removeAttr('disabled');
			$('#resul_ph_3').removeAttr('disabled');
			$('#resul_temperatura_3').removeAttr('disabled');
			$('#resul_turbidez_3').removeAttr('disabled');
		} else {
			$("#chkrow3").removeAttr('checked').iCheck('update');
			$('#resul_cloro_residual_3').attr('disabled','disabled');
			$('#resul_ph_3').attr('disabled','disabled');
			$('#resul_temperatura_3').attr('disabled','disabled');
			$('#resul_turbidez_3').attr('disabled','disabled');
		}

		valores = $("#resul_cloro_residual_4").val() + $("#resul_ph_4").val() + $("#resul_temperatura_4").val() + $("#resul_turbidez_4").val();
		if (valores != '') {
			$("#chkrow4").iCheck('check');
			$('#resul_cloro_residual_4').removeAttr('disabled');
			$('#resul_ph_4').removeAttr('disabled');
			$('#resul_temperatura_4').removeAttr('disabled');
			$('#resul_turbidez_4').removeAttr('disabled');
		} else {
			$("#chkrow4").removeAttr('checked').iCheck('update');
			$('#resul_cloro_residual_4').attr('disabled','disabled');
			$('#resul_ph_4').attr('disabled','disabled');
			$('#resul_temperatura_4').attr('disabled','disabled');
			$('#resul_turbidez_4').attr('disabled','disabled');
		}


		//alert(data[0].chk_sistema_recirculacion);

		/*if (data[0].chk_sistema_recirculacion == 't') {					
			$('#tipo_recirculacion').bootstrapToggle('on');			
		} else {			
			$('#tipo_recirculacion').bootstrapToggle('off');
		}*/
		$('#tipo_recirculacion').val(data[0].id_estado_sistema_recirculacion);
		$('#limpieza_estanque').val(data[0].id_estado_estanque);

			

		if (data[0].chk_limpieza_local == 't') {
			//$('#limpieza_local').prop('checked', true).trigger('change');
			$('#limpieza_local').bootstrapToggle('on'); 
		}else{
			//$('#limpieza_local').prop('checked', true).trigger('change');
			$('#limpieza_local').bootstrapToggle('off');
		}

		//alert(data[0].chk_limpieza_estanque);

		/*if (data[0].chk_limpieza_estanque == 't') {
			$('#limpieza_estanque').bootstrapToggle('on'); 
		}else{
			$('#limpieza_estanque').bootstrapToggle('off');
		}*/

		if (data[0].chk_criador_aedes_aegypti == 't') $('#criador_aedes_aegypti').bootstrapToggle('on'); else $('#criador_aedes_aegypti').bootstrapToggle('off');
		if (data[0].chk_cuerpos_agua == 't') $('#cuerpos_agua').bootstrapToggle('on'); else $('#cuerpos_agua').bootstrapToggle('off');
		if (data[0].chk_cuaderno_registro == 't') $('#cuaderno_registro').bootstrapToggle('on'); else $('#cuaderno_registro').bootstrapToggle('off');
		if (data[0].chk_aprobacion_sanitaria == 't') $('#aprobacion_sanitaria').bootstrapToggle('on'); else $('#aprobacion_sanitaria').bootstrapToggle('off');
		$("#nro_aprobacion_sanitaria").val(data[0].nro_aprobacion_sanitaria);

		evalCloro(); evalPh(); evalTurbidez();


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

function init() {
	listar();
}


function limpiar() {
	$("#modalTitle").html('Nuevo registro');
	$("#id_ficha").val("");
	$("#id_entidad").val("");
	$("#id_persona").val("");

	$("#hora_inicio").val("");
	$("#hora_fin").val("");

	$("#long_este").val("");
	$("#long_norte").val("");

	$("#ruc").val("");
	$("#razon_social").val("");
	$('#ubigeo').val('').trigger('change.select2');
	$("#direccion_empresa").val("");
	$("#telefono_fijo_empresa").val("");
	$("#celular_empresa").val("");
	$("#email_empresa").val("");
	$("#nombre_representante").val("");

	$('#tipo_doc').val('').trigger('change.select2');
	$("#numero_doc").val("");
	$("#nombres").val("");
	$("#ape_paterno").val("");
	$("#ape_materno").val("");

	$("#resul_cloro_residual_1").val("");
	$("#resul_ph_1").val("");
	$("#resul_temperatura_1").val("");
	$("#resul_turbidez_1").val("");
	$("#resul_cloro_residual_2").val("");
	$("#resul_ph_2").val("");
	$("#resul_temperatura_2").val("");
	$("#resul_turbidez_2").val("");
	$("#resul_cloro_residual_3").val("");
	$("#resul_ph_3").val("");
	$("#resul_temperatura_3").val("");
	$("#resul_turbidez_3").val("");
	$("#resul_cloro_residual_4").val("");
	$("#resul_ph_4").val("");
	$("#resul_temperatura_4").val("");
	$("#resul_turbidez_4").val("");

	$('#tipo_inspeccion').val('').trigger('change.select2');
	$('#tipo_lavapies').val('').trigger('change.select2');
	$('#tipo_sshh').val('').trigger('change.select2');


	//$('#tipo_recirculacion').bootstrapToggle('off');
	$('#tipo_recirculacion').val('');
	$('#limpieza_estanque').val('');


	$('#limpieza_local').bootstrapToggle('off');
	//$('#limpieza_estanque').bootstrapToggle('off');
	$('#criador_aedes_aegypti').bootstrapToggle('off');
	$('#cuerpos_agua').bootstrapToggle('off');
	$('#cuaderno_registro').bootstrapToggle('off');
	$('#aprobacion_sanitaria').bootstrapToggle('off');

	$("#chkrow1").iCheck('check');
	$("#chkrow2").iCheck('check');
	$("#chkrow3").iCheck('check');
	$("#chkrow4").iCheck('check');

	$("#nro_aprobacion_sanitaria").val("");

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
			orderCellsTop: true,
        	fixedHeader: true,
        	//fixedColumns: true,

			"lengthMenu": [5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
			"bProcessing": true,//Activamos el procesamiento del datatables
			"bJQueryUI": false,
			//"responsive": true,
			"bInfo": true,
			"bFilter": true,
			"bServerSide": true,//Paginación y filtrado realizados por el servidor
			"sServerMethod": "GET",
			"sAjaxSource": "../ajax/ficha_vigilancia_piscina.php?op=listar&id_nivel=" + $("#s_id_nivel").val() + "&id_usuario=" + $("#s_id_usuario").val() + "&id_local=" + $("#s_id_local").val(), // Load Data
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
				if (data[10] == 'f') {
					$(row).addClass('danger')
					//$(row).addClass('alert alert-warning');
					//$(row).css('background-color', 'rgb(250, 235, 204)');
					//$(row).css('background-color', '#F39B9B');
				}

			},

			initComplete: function () {
				//$('.dt-buttons').removeClass('btn-group');
				/*table.columns().every(function () {
					var that = this;
					$('input', this.footer()).on('keyup change', function () {
						that
							.search(this.value)
							.draw();
					});
				});*/
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
				{ aTargets: 'f.fecha_inicio_ficha' },
				{ aTargets: 'e.nombre' },
				{ aTargets: 'e.ruc' },
				{ aTargets: 'responsable' },
				{ aTargets: 'uc.login' },
				{ aTargets: 'f.fecha_creacion' },
				{ aTargets: null },

			],

			"pagingType": 'full_numbers',
			"iDisplayLength": 10,//Paginación
			"order": [[8, "des"]]//Ordenar (columna,orden)

		});

		/*$('#tbllistado tfoot th').each(function () {		
			if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Fecha" && $(this).text() != "Fecha Termino" && $(this).text() != "Estado") {
					var title = $('#tbllistado thead th').eq($(this).index()).text();
					$(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
			}
		});*/

		$('#tbllistado').removeClass('display').addClass('table table-striped table-bordered');


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


	if ($("#ruc").val() == '') {
		var msj = "Ingrese RUC del establecimiento";
	} else if ($("#razon_social").val() == '') {
		var msj = "Ingrese razon social establecimiento";
	} else if ($("#direccion_empresa").val() == '') {
		var msj = "Ingrese direccion del establecimiento";
	} else if ($("#ubigeo").val() == '') {
		var msj = "Ingrese distrito del establecimiento";
	} else if ($("#tipo_doc").val() == '') {
		var msj = "Ingrese tipo de documento del responsable";
	} else if ($("#numero_doc").val() == '') {
		var msj = "Ingrese numero de documento del responsable";
	} else if ($("#nombres").val() == '') {
		var msj = "Ingrese nombres de la perona que atiende";
	} else if ($("#ape_materno").val() == '') {
		var msj = "Ingrese nombres de la perona que atiende";
	}

	//Validando checkbox
	if ($('#chkrow1').is(':checked')) {
		valores = $("#resul_cloro_residual_1").val() + $("#resul_ph_1").val() + $("#resul_temperatura_1").val() + $("#resul_turbidez_1").val();
		if (valores == '') {
			var msj = "Ingrese los valores correspondientes a Patera";
		}
	}

	if ($('#chkrow2').is(':checked')) {
		valores = $("#resul_cloro_residual_2").val() + $("#resul_ph_2").val() + $("#resul_temperatura_2").val() + $("#resul_turbidez_2").val();
		if (valores == '') {
			var msj = "Ingrese los valores correspondientes a Piscina 1";
		}
	}

	if ($('#chkrow3').is(':checked')) {
		valores = $("#resul_cloro_residual_3").val() + $("#resul_ph_3").val() + $("#resul_temperatura_3").val() + $("#resul_turbidez_3").val();
		if (valores == '') {
			var msj = "Ingrese los valores correspondientes a Piscina 2";
		}
	}

	if ($('#chkrow4').is(':checked')) {
		valores = $("#resul_cloro_residual_4").val() + $("#resul_ph_4").val() + $("#resul_temperatura_4").val() + $("#resul_turbidez_4").val();
		if (valores == '') {
			var msj = "Ingrese los valores correspondientes a Piscina 3";
		}
	}



	if (msj) {
		return bootbox.alert({ title: 'Mensaje', message: msj, centerVertical: true, animate: true });
	}

	//if ($('#tipo_recirculacion').is(':checked')) var chk_sistema_recirculacion = true; else var chk_sistema_recirculacion = false;
	//if ($('#limpieza_estanque').is(':checked')) var chk_limpieza_estanque = true; else var chk_limpieza_estanque = false;

	if ($('#limpieza_local').is(':checked')) var chk_limpieza_local = true; else var chk_limpieza_local = false;
	


	if ($('#criador_aedes_aegypti').is(':checked')) var chk_criador_aedes_aegypti = true; else var chk_criador_aedes_aegypti = false;
	if ($('#cuerpos_agua').is(':checked')) var chk_cuerpos_agua = true; else var chk_cuerpos_agua = false;
	if ($('#cuaderno_registro').is(':checked')) var chk_cuaderno_registro = true; else var chk_cuaderno_registro = false;
	if ($('#aprobacion_sanitaria').is(':checked')) var chk_aprobacion_sanitaria = true; else var chk_aprobacion_sanitaria = false;

	resultado=($("#icon_resultado").hasClass("green"))?'true':'false';

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
					"id_entidad": ($("#id_entidad").val() == '') ? '0' : $("#id_entidad").val(),
					"id_persona": ($("#id_persona").val() == '') ? '0' : $("#id_persona").val(),
					"fecha_inicio_ficha": $('#fecha_encuesta').val(),
					"hora_inicio": $('#hora_inicio').val(),
					"hora_fin": $('#hora_fin').val(),
					"ruc": $('#ruc').val(),
					"razon_social": $('#razon_social').val().toUpperCase(),
					"ubigeo": $("#ubigeo").val(),
					"direccion_empresa": $('#direccion_empresa').val().toUpperCase(),
					"telefono_fijo_empresa": $('#telefono_fijo_empresa').val(),
					"celular_empresa": $('#celular_empresa').val(),
					"email_empresa": $('#email_empresa').val(),
					"nombre_representante": $('#nombre_representante').val().toUpperCase(),
					"tipo_doc": $('#tipo_doc').val(),
					"numero_doc": $('#numero_doc').val(),
					"nombres": $('#nombres').val().toUpperCase(),
					"ape_paterno": $('#ape_paterno').val().toUpperCase(),
					"ape_materno": $('#ape_materno').val().toUpperCase(),

					"id_motivo_ficha": $('#tipo_inspeccion').val(),
					"id_instalacion_lavapies": $('#tipo_lavapies').val(),
					"id_instalacion_sshh": $('#tipo_sshh').val(),

					"long_este": $('#long_este').val(),
					"long_norte": $('#long_norte').val(),


					//"chk_sistema_recirculacion": chk_sistema_recirculacion,
					"id_estado_sistema_recirculacion": $("#tipo_recirculacion").val(),

					"chk_limpieza_local": chk_limpieza_local,
					
					//"chk_limpieza_estanque": chk_limpieza_estanque,
					"id_estado_estanque": $("#limpieza_estanque").val(),						

					"chk_criador_aedes_aegypti": chk_criador_aedes_aegypti,
					"chk_cuerpos_agua": chk_cuerpos_agua,

					"chk_cuaderno_registro": chk_cuaderno_registro,
					"chk_aprobacion_sanitaria": chk_aprobacion_sanitaria,
					"nro_aprobacion_sanitaria": $("#nro_aprobacion_sanitaria").val(),

					"resul_cloro_residual_1": $("#resul_cloro_residual_1").val(),
					"resul_ph_1": $("#resul_ph_1").val(),
					"resul_turbidez_1": $("#resul_turbidez_1").val(),
					"resul_temperatura_1": $("#resul_temperatura_1").val(),
					"resul_cloro_residual_2": $("#resul_cloro_residual_2").val(),
					"resul_ph_2": $("#resul_ph_2").val(),
					"resul_turbidez_2": $("#resul_turbidez_2").val(),
					"resul_temperatura_2": $("#resul_temperatura_2").val(),
					"resul_cloro_residual_3": $("#resul_cloro_residual_3").val(),
					"resul_ph_3": $("#resul_ph_3").val(),
					"resul_turbidez_3": $("#resul_turbidez_3").val(),
					"resul_temperatura_3": $("#resul_temperatura_3").val(),
					"resul_cloro_residual_4": $("#resul_cloro_residual_4").val(),
					"resul_ph_4": $("#resul_ph_4").val(),
					"resul_turbidez_4": $("#resul_turbidez_4").val(),
					"resul_temperatura_4": $("#resul_temperatura_4").val(),

					"id_usuario": $("#s_id_usuario").val(),
					"id_local": $("#s_id_local").val(),
					"resultado": resultado
				};


				$.ajax({
					url: "../ajax/ficha_vigilancia_piscina.php?op=save",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function (msg) {
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
			$.post("../ajax/ficha_vigilancia_piscina.php?op=desactivar", { id: id }, function (e) {
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
			$.post("../ajax/ficha_vigilancia_piscina.php?op=activar", { id: id }, function (e) {
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
