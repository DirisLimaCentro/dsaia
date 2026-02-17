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


function buscar_reniec(){



	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/services.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			accion: "LOAD_RENIEC",
			numero_documento: $("#numero_documento").val()
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {
                
                $("#loaderModal").hide();
                if (result.error=='') {
                	var dataPersona = result.row;
                 
                  	$("#nombre").val(dataPersona.nombres);
                  	$("#apellido_paterno").val(dataPersona.apellido_paterno);
                  	$("#apellido_materno").val(dataPersona.apellido_materno);                	
                  	$("#direccion").val(dataPersona.domicilio_direccion_actual+' '+dataPersona.domicilio_direccion);


                  	if (dataPersona.sexo=='1'){
                  		$("#sexo").val('M');
                  	}else{
                  		$("#sexo").val('F');
                  	}

                  	if (dataPersona.id_distrito){
                  		if (dataPersona.id_distrito!=''){
                  			show_ubigeo(dataPersona.id_distrito);
                  		}
                  	}
      				
                }else{
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

function show_ubigeo(ubi){
	$.ajax({
		type: "GET",
		url: "../ajax/ubigeo.php?op=getUbigeo",
		dataType: "json",
		//data: JSON.stringify({ paramName: info }),
		data : {		   	
		  	id: ubi
		},
		success: function(data){
			
			//$("#numero_lote").val(data.numero_lote);
			//$("#loaderModal").hide();
			if (data[0]){
				dat=data[0];
				
				$('#ubigeo').append("<option value='"+dat.id_localidad+"' selected='selected'>"+dat.localidad+"</option>");
				$('#ubigeo').append("<option value='"+dat.id+"' selected='selected'>"+dat.departamento+' - ' + dat.provincia + ' - '+dat.distrito+"</option>");
 				$("#ubigeo").trigger('change');

			}else{
				$('#ubigeo').val('').trigger('change.select2');
			}
	
	    }
	});
}

//Función limpiar
function limpiar()
{
	$("#modalTitle").html('Nuevo registro');

	$("#id_personal").val("");
	$("#numero_documento").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$('#ubigeo').val('').trigger('change.select2');
	$("#apellido_paterno").val("");
	$("#apellido_materno").val("");

	$("#telefono").val("");
	$("#celular").val("");
	$("#email").val("");

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
		var parametros = {"id_personal":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/personal.php?op=tableEmpresaPersonal',
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
        if (title!='' && $.trim(title)!='Acciones' && title!='Estado' ){
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
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"bProcessing": true,//Activamos el procesamiento del datatables
		"bJQueryUI": false,
		"responsive": true,
		"bInfo": true,
		"bFilter": true,
	    "bServerSide": true,//Paginación y filtrado realizados por el servidor
	    "sServerMethod": "GET",
	    orderCellsTop: true,
        fixedHeader: true,
        fixedColumns: true,

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


      	"sAjaxSource": "../ajax/personal.php?op=listar", // Load Data
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
		{ "orderable": false,	"targets": 1,	"searchable": false },
		{ "orderable": true,	"targets": 2,	"searchable": true },
		{ "orderable": true,	"targets": 3,	"searchable": true },
		{ "orderable": true,	"targets": 4,	"searchable": true },
		{ "orderable": true,	"targets": 5,	"searchable": true },
		{ "orderable": true,	"targets": 6,	"searchable": true },

		{ "orderable": true,	"targets": 7,	"searchable": true },

		{ "orderable": true,	"targets": 8,	"searchable": true },
		{ "orderable": true,	"targets": 9,	"searchable": true }


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
			{ aTargets: 'ape_paterno' },
			{ aTargets: 'ape_materno' },
			{ aTargets: 'nombres' },
			{ aTargets: 'nro_documento' },
			{ aTargets: 'celular' },

			{ aTargets: 'e_mail' },

			{ aTargets: 'distrito' },
			{ aTargets: 'direccion' }
			
			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 2, "asc" ],[ 3, "asc" ]]//Ordenar (columna,orden)

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
function update_child(row){
	var parametros = {"id_personal":row};
	$.ajax( {
		url: '../ajax/personal.php?op=tableEmpresaPersonal',
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#row_"+row).html( json );
		}
	} );
}


function guardaryeditar()
{


	msj="";

	if ($('#tipo_documento').val()==''){
		msj="Seleccion tipo de documento de identidad";
	}else if ($('#numero_documento').val()==''){
		msj="Ingrese numero de documento de identidad";
	}else if ($('#sexo').val()==''){
		msj="Seleccione genero del personal";			
	}else if ($('#nombre').val()==''){
		msj="Ingrese nombres";
	}else if ($('#apellido_paterno').val()==''){
		msj="Ingrese apellido paterno";
	}else if ($('#apellido_materno').val()==''){
		msj="Ingrese apellido materno";
	}else if ($('#direccion').val()==''){
		msj="Ingrese direccion";
	}else if ($('#email').val()==''){
		msj="Ingrese un correo";
	}else if ($('#ubigeo').val()==''){
		msj="Seleccione distrito";
	}

	if (msj){
		return Swal.fire("Mensaje", msj, "error");
	}

	if ($("#id_personal").val()==''){
		var msj="Esta seguro de guardar el nuevo registro?";
	}else{
		var msj="Esta seguro de guardar los cambios?";
	}

	if ($('#autoriza_orden_compra').is(':checked')){
      var autoriza_orden_compra=true;
	}else{
	  var autoriza_orden_compra=false;
	}
	if ($('#autoriza_requerimiento').is(':checked')){
      var autoriza_requerimiento=true;
	}else{
	  var autoriza_requerimiento=false;
	}

	if ($('#externo').is(':checked')){
      var externo=true;
	}else{
	  var externo=false;
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
					"id_personal":$('#id_personal').val(),
					"tipo_documento":$('#tipo_documento').val().toUpperCase(),
					"numero_documento":$('#numero_documento').val().toUpperCase(),
					"sexo": $('#sexo').val().toUpperCase(),
					"nombre": $('#nombre').val().toUpperCase(),
					"apellido_paterno": $('#apellido_paterno').val().toUpperCase(),
					"apellido_materno": $("#apellido_materno").val().toUpperCase(),
					"ubigeo": $("#ubigeo").val(),
					"direccion": $("#direccion").val().toUpperCase(),
					"telefono": $("#telefono").val(),
					"celular": $("#celular").val(),
					"email": $("#email").val(),
					"autoriza_orden_compra": autoriza_orden_compra,
					"autoriza_requerimiento": autoriza_requerimiento,
					"externo": externo,
					"id_condicion_laboral": $("#id_condicion_laboral").val()
					};


				$.ajax({
					url: "../ajax/personal.php?op=guardaryeditar",
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


function guardaryeditar_personalocal()
{
	
	if ($('#local').val()=='' || $('#local').val()==null){
		return bootbox.alert("Seleccione una area");
	}

	if ($("#id_personal").val()==''){
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
					"id_personal":$('#id_persona_local').val(),
					"id_persona_local":$('#id_persona_local').val(),
					"local":$('#local').val().toUpperCase(),
					"cargo": $('#cargo').val().toUpperCase()
					};

				$.ajax({
					url: "../ajax/personal.php?op=guardaryeditar_personalocal",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(datos)
					{

						//mostrarform(false);
						$('#modalpersonalocal').modal('toggle')
						update_child($('#id_persona_local').val());
						bootbox.alert(datos);

						//table.ajax.reload();
					}

				});


			}
		}
	});

}

function mostrar(id_personal)
{
	$.post("../ajax/personal.php?op=mostrar",{id_personal : id_personal}, function(data, status)
	{
		data = JSON.parse(data);
		//mostrarform(true);

		if (data.autoriza_orden_compra=='t'){
			$("#autoriza_orden_compra").iCheck('check');
		}else{
			$("#autoriza_orden_compra").iCheck('uncheck');
		}
		if (data.autoriza_requerimiento=='t'){
			$("#autoriza_requerimiento").iCheck('check');
		}else{
			$("#autoriza_requerimiento").iCheck('uncheck');
		}

		if (data.externo=='t'){
			$("#externo").iCheck('check');
		}else{
			$("#externo").iCheck('uncheck');
		}

		$("#id_personal").val(id_personal);
		$("#tipo_documento").val(data.id_tipo_documento);
 		$("#numero_documento").val(data.nro_documento);
 		$("#sexo").val(data.sexo);
 		$("#nombre").val(data.nombres);
		$("#apellido_paterno").val(data.ape_paterno);
		$("#apellido_materno").val(data.ape_materno);
		$("#direccion").val(data.direccion);
		$("#telefono").val(data.telefono_fijo);
		$("#celular").val(data.celular);
		$("#email").val(data.e_mail);

		if (data.id_ubigeo!=''){
 			$('#ubigeo').append("<option value='"+data.id_ubigeo+"' selected='selected'>"+data.departamento+' - ' + data.provincia + ' - '+data.distrito+"</option>");
 		}else{

 		}	

 		$("#ubigeo").trigger('change');
		//}

 		$("#modalTitle").html('Edicion de registro');
 		$('#modalNew').modal('show');
 		//$("#nombre").focus();

 	})
}

function deleteLocalPersonal(id_local,id_personal){
	bootbox.confirm("¿Está Seguro de eliminar el registro seleccionado?", function(result){
		if(result)
        {
        	$.post("../ajax/personal.php?op=deleteLocalPersonal", {id_local:id_local, id_personal : id_personal}, function(e){
        		
        		update_child(id_personal);
        		
	            //table.ajax.reload();
        	});
        }
	})
}

//Función para desactivar registros
function desactivar(id_personal)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/personal.php?op=desactivar", {id_personal : id_personal}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_personal)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/personal.php?op=activar", {id_personal : id_personal}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

function open_persona_local(id_personal){
	limpiar_contacto();
	$('#id_persona_local').val(id_personal)
	$('#modalpersonalocal').modal('show')
}


function limpiar_contacto()
{
	$("#modalpersonalocalTitle").html('Nuevo registro');
	$("#id_persona_local").val("");
	/*
	$("#nombre_contacto").val("");
	$("#direccion_contacto").val("");
	$('#id_ubigeo_contacto').val('').trigger('change.select2');
	$("#celular_contacto").val("");
	$("#telefono_fijo_contacto").val("");
	*/
}

$("#empresa").change(function () {
    var parametros = {
        "op": "loadlocales",
        "id_empresa": $('#empresa').val()
    };
    //$("#dialog-loading").dialog("open");
    $.ajax({
        data: parametros,
        url: '../ajax/local.php',
        type: 'get',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$("#div_reniec").html("Procesando, espere por favor...");
        },
        success: function (response) {
            $("#local").html(response);
            $("#local").select2();
        }
    });

});


init();
