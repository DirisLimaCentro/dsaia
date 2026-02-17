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
	$("#id_establecimiento").val("");
	$("#nombre").val("");
	$("#direccion").val("");	
	$('#ubigeo').val('').trigger('change.select2');
	$("#medico_jefe").val("");
	$("#telefono_fijo").val("");
	$("#celular").val("");
	$("#correo").val("");
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
	tabla=$('#tbllistado').dataTable(
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
      	"sAjaxSource": "../ajax/establecimiento.php?op=listar", // Load Data       
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
            /*"paginate": {
								"previous": '<i class="fa fa-angle-left"></i>',
								"next": '<i class="fa fa-angle-right"></i>'
							},*/
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
		{ "orderable": false,	"targets": 3,	"searchable": false }
		],

		"iDisplayLength": 10,//Paginación
	    "order": [[ 1, "asc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar()
{
	if ($("#id_establecimiento").val()==''){
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
					"id_establecimiento":$('#id_establecimiento').val(), 
					"nombre":$('#nombre').val().toUpperCase(), 
					"direccion": $('#direccion').val().toUpperCase(),
					"medico_jefe": $('#medico_jefe').val().toUpperCase(),
					"telefono_fijo": $('#telefono_fijo').val(),
					"celular": $('#celular').val(),
					"correo": $('#correo').val(),
					"ubigeo": $("#ubigeo").val()
					};


				$.ajax({
					url: "../ajax/establecimiento.php?op=guardaryeditar",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(datos)
					{                    
						bootbox.alert(datos);	          
						//mostrarform(false);
						$('#modalNew').modal('toggle')
						tabla.ajax.reload();
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

function mostrar(id_establecimiento)
{
	$.post("../ajax/establecimiento.php?op=mostrar",{id_establecimiento : id_establecimiento}, function(data, status)
	{
		data = JSON.parse(data);		
		//mostrarform(true);


		$("#nombre").val(data.nombre);
		$("#id_establecimiento").val(id_establecimiento);
 		$("#direccion").val(data.direccion);
 		$("#medico_jefe").val(data.medico_jefe);
 		$("#telefono_fijo").val(data.telefono_fijo);
 		$("#celular").val(data.celular);
 		$("#correo").val(data.correo);

 		//$('#ubigeo').val(data.ubigeo).trigger('change.select2');
 		//$("#ubigeo").select2("val", data.ubigeo);
 		
 		

 		//$('#ubigeo').select2('data', {id: data.ubigeo, a_key: data.distrito});
 		//$('#ubigeo').val(data.ubigeo).trigger('change');
 		
 		//if (data.ubigeo !== undefined){
 			$('#ubigeo').append("<option value='"+data.ubigeo+"' selected='selected'>"+data.distrito+"</option>");
 			$("#ubigeo").trigger('change');
		//}

 		$("#modalTitle").html('Edicion de registro');
 		$('#modalNew').modal('show');
 		//$("#nombre").focus();

 	})
}

//Función para desactivar registros
function desactivar(idestablecimiento)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/establecimiento.php?op=desactivar", {id_establecimiento : idestablecimiento}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcategoria)
{
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/categoria.php?op=activar", {idcategoria : idcategoria}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();