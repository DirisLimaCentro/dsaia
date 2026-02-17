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

function open_new_tabla(idtabla,nameinput,tpl_name,titulo) {
	$("#descripcion").val('');
	$("#abreviado").val('');

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
	$("#edit_mode").val("N");

	//$("#nombre").val("");
	//$("#id_categoria").val("");
	//$("#maneja_lotes").iCheck('uncheck');

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

function marcar_todo(chk,id_catalogo){
	if (chk.checked){
		var stat='A';
	}else{
		var stat='D';
	}

	$.each($("input[data-id="+id_catalogo+"]"), function(){
		if (stat=='A') {
			$(this).prop("checked",true);
		}else{
			$(this).prop("checked",false);
		}	
       
        var parametros = {"stat":stat, "id_local":$(this).val(), "id_catalogo":id_catalogo};
		$.ajax( {
			url: '../ajax/catalogo.php?op=updateCatalogoLocal',
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {				
				
			}
		} );
     });
}

function marcar(chk,id_local,id_catalogo){
	//chk="chk"+id_local+"_"+id_catalogo;
	if (chk.checked){
		var stat='A';
	}else{
		var stat='D';
	}
	
	var parametros = {"stat":stat, "id_local":id_local, "id_catalogo":id_catalogo};
	$.ajax( {
		url: '../ajax/catalogo.php?op=updateCatalogoLocal',
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			//$("#row_"+row).html( json );
		}
	} );
}


//Función Listar
function listar()
{
	function format ( rowData ) {
		var parametros = {"id_catalogo":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/itemsxexamen.php?op=tableLocales',
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );

				/*$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				  checkboxClass: 'icheckbox_flat-green',
				  radioClass   : 'iradio_flat-green'
				})
				$("input[type='checkbox']").on('ifChanged', function (event) {				   
				   //$(event.target).trigger('change');
				   $(this).val(event.target.checked == true);
				   marcar(this,event.target.value);
				});*/

			}
		} );

		return div;
		//alert('hola');
	}

	$('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
    $('#tbllistado thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title!='' && $.trim(title)!='Acciones' && title!='Estado'){
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
      	"sAjaxSource": "../ajax/itemsxexamen.php?op=listar", // Load Data
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
		{ "width":"8%", "orderable": false,	"targets": 0,	"searchable": false },
		{ "orderable": true,	"targets": 1,	"searchable": true },
		{ "orderable": true,	"targets": 2,	"searchable": true },
		{ "orderable": true,	"targets": 3,	"searchable": true },
		{ "orderable": true,	"targets": 4,	"searchable": true }
		

		],

		"createdRow": function( row, data, dataIndex){
			//if( data[8] ==  '0'){
				//$(row).addClass('alert alert-warning');
				//$(row).css('background-color', 'rgb(250, 235, 204)');
				//$(row).css('background-color', '#F39B9B');
			//}

		},

		columns: [
		/*{
			className: 'details-control',
			defaultContent: '',
			data: null,
			orderable: false,
			defaultContent: '' },*/

			//{ aTargets: null },
			{ aTargets: 'i.id' },
			{ aTargets: 'p.descripcion' },
			{ aTargets: 'i.id' },
			{ aTargets: 'i.descripcion' },			
			{ aTargets: 'ie.resultado' },	
			{ aTargets: 'ie.cantidad' },	

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
	//
	 var msj='';
	if ($("#id_producto").val()==''){
		var msj="Selecciona un examen...!";	
	}else if($("#id_item").val()==''){
		var msj="Seleccione un item..!";
	}else if($("#id_tipo_resultado").val()==''){
		var msj="Seleccione tipo de resultado..!";
	}else if($("#cantidad").val()==''){
		var msj="Ingrese cantidad..!";
	}
	
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
			
			if (result){				

				var parametros = {
					"id_producto":$('#id_producto').val(),					
					"id_item":$('#id_item').val(),
					"id_tipo_resultado":$('#id_tipo_resultado').val(),
					"cantidad":$('#cantidad').val(),
					"edit_mode":$('#edit_mode').val()			
					};


				$.ajax({
					url: "../ajax/itemsxexamen.php?op=guardaryeditar",
					type: "POST",
					data: parametros,
					success: function(datos)
					{
						bootbox.alert(datos);
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

function mostrar_item(id_producto,id_item,tipo)
{
	
	$.post("../ajax/itemsxexamen.php?op=mostrar",{id_producto : id_producto, id_item: id_item, tipo: tipo}, function(data, status)
	{
		data = JSON.parse(data);
		
		
 		/*$("#direccion").val(data.direccion);*/
 		$("#edit_mode").val('E');
 		$('#id_item').append("<option value='"+data.id_item+"' selected='selected'>"+data.nombre_item+"</option>");
 		$("#id_item").trigger('change');

 		$('#id_producto').append("<option value='"+data.id_producto+"' selected='selected'>"+data.nombre_producto+"</option>");
 		$("#id_producto").trigger('change');

 		$("#id_tipo_resultado").val(data.resultado);
 		$("#cantidad").val(data.cantidad);

 		$('#id_item').select2("enable",false);
 		$('#id_producto').select2("enable",false);

 		$("#id_tipo_resultado").prop("disabled",true);


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
function desactivar(id_producto,id_item,tipo)
{
	bootbox.confirm("¿Está seguro de eliminar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/itemsxexamen.php?op=eliminar", {id_producto : id_producto,id_item: id_item, tipo: tipo}, function(e){
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
        	$.post("../ajax/catalogo.php?op=activar", {id_catalogo : id_item}, function(e){
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
