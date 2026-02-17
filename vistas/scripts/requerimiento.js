var tabla;

//Función que se ejecuta al inicio
function init(){
	$('[data-toggle="tooltip"]').tooltip(); 
	//mostrarform(false);
	//var bEditItem=false;
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
function autorizarRequerimiento(id_requerimiento){

	if ($("#autoriza_requerimiento").val()!='t'){
		return false;
	}

	bootbox.confirm({
        title: "Mensaje",
        message: "Esta seguro de autorizar el requerimiento seleccionado?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-remove"></i> Cancelar'
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Aceptar',
            className: "btn-success"
          }
        },
        callback: function (result) {
          //console.log('This was logged in the callback: ' + result);
          if (result){        

				$.ajax({
					type: "POST",
					url: "../ajax/requerimiento.php?op=autorizarRequerimiento",
				    //dataType: "json",
				    //data: JSON.stringify({ paramName: info }),
				    data : {
				    	id_requerimiento: id_requerimiento,
				    	id_usuario_autoriza: $("#id_usuario_crea").val()				    	    
				    },
				    success: function(msg){

				    	/*if (msg=='0'){
				    		bootbox.alert('Item no se puede eliminar, existe salidas vinculadas al lote');
				    	}else{
				    		update_child(id_ingreso);
				    		bootbox.alert('Item eliminado');
				    	}*/
				    	table.ajax.reload(); 
				    	bootbox.alert('Registro autorizado');
				    }
				});
		}
		}		
	});

}

function revertirRequerimiento(id_requerimiento){

	if ($("#autoriza_requerimiento").val()!='t'){
		return false;
	}

	bootbox.confirm({
        title: "Mensaje",
        message: "Esta seguro de revertir la aprobacion del requerimiento seleccionado?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-remove"></i> Cancelar'
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Aceptar',
            className: "btn-success"
          }
        },
        callback: function (result) {
          //console.log('This was logged in the callback: ' + result);
          if (result){        

				$.ajax({
					type: "POST",
					url: "../ajax/requerimiento.php?op=revertirRequerimiento",
				    //dataType: "json",
				    //data: JSON.stringify({ paramName: info }),
				    data : {
				    	id_requerimiento: id_requerimiento,
				    	id_usuario_autoriza: $("#id_usuario_crea").val()				    	    
				    },
				    success: function(msg){

				    	/*if (msg=='0'){
				    		bootbox.alert('Item no se puede eliminar, existe salidas vinculadas al lote');
				    	}else{
				    		update_child(id_ingreso);
				    		bootbox.alert('Item eliminado');
				    	}*/
				    	table.ajax.reload(); 
				    	bootbox.alert('Registro revertido');
				    }
				});
		}
		}		
	});

}

function action_show_item(id_ingreso,id_item,id_lote){

	//Verificar si no tiene salidas con el lote a editar
	if (id_lote!=''){
		$.ajax({
			type: "POST",
			url: "../ajax/compra.php?op=verificaDisponibilidadLote",
		    //dataType: "json",
		    //data: JSON.stringify({ paramName: info }),
		    data : {
		    	id_ingreso: id_ingreso,
		    	id_item: id_item,
		    	id_lote: id_lote
		    },
		    success: function(msg){
		    	if (msg=='1'){
		    		bootbox.alert('Item no se puede eliminar, existe salidas vinculadas al lote');
		    	}else{		    		
		    		mostrar_datos_item(id_ingreso,id_item);
					$('#modalItemTitle').html('Edicion de Item');
					$('#modalItem').modal('show');	

		    	}
		    }
		});

		
	}else{
		mostrar_datos_item(id_ingreso,id_item);
		$('#modalItemTitle').html('Edicion de Item');
		$('#modalItem').modal('show');	
	}	

}

function mostrar_datos_item(id_ingreso,id_item){

	$.ajax({
		type: "POST",
		url: "../ajax/compra.php?op=showItem",
		dataType: "json",
		//data: JSON.stringify({ paramName: info }),
		data : {
		   	id_ingreso: id_ingreso,
		  	id_item: id_item      
		},
		success: function(data){
			$("#id_ingreso").val(id_ingreso);
	    	$("#categoria").val(data.categoria);
	    	$("#marca").val(data.marca);
	    	$("#unidad_medida_compra").val(data.unidad_medida_ingreso);
	    	$("#factor").val(data.factor);
	    	$("#cantidad").val(data.cantidad);
	    	$("#costo_umc").val(data.costo_unitario_umc);

			$("#numero_lote").val(data.numero_lote);

			$("#id_lote").val(data.id_lote);

			$("#fecha_vencimiento").val(data.fecha_vencimiento);

			$('#id_item').append("<option value='"+data.id_item+"' selected='selected'>"+data.item+"</option>");
 			$("#id_item").trigger('change');
 			$('#id_item').select2("enable",false);
			ContarUnidades();
 			calcular();
 			editItem=true;
 			newItem=false;
	    }
	});

}


function action_remove_item(id_ingreso,id_item){
	//verificando si no tiene salida con lote
	if ($("#cnt_items").val()=='1'){
        bootbox.alert('No se puede eliminar, debe existir al menos un item en el detalle '); 
        return false
    }

	bootbox.confirm({
        title: "Mensaje",
        message: "Esta seguro de eliminar el item seleccionado?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-remove"></i> Cancelar'
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Aceptar',
            className: "btn-success"
          }
        },
        callback: function (result) {
          //console.log('This was logged in the callback: ' + result);
          if (result){        

				$.ajax({
					type: "POST",
					url: "../ajax/compra.php?op=removeItem",
				    //dataType: "json",
				    //data: JSON.stringify({ paramName: info }),
				    data : {
				    	id_ingreso: id_ingreso,
				    	id_item: id_item      
				    },
				    success: function(msg){

				    	if (msg=='0'){
				    		bootbox.alert('Item no se puede eliminar, existe salidas vinculadas al lote');
				    	}else{
				    		update_child(id_ingreso);
				    		bootbox.alert('Item eliminado');
				    	}

				    }
				});
		}
		}		
	});	

}

function limpiar_local()
{
	$("#modalLocalTitle").html('Nuevo registro');
	//$("#id_local").val("");
	$("#nombre_local").val("");
	$("#direccion_local").val("");
	$('#id_ubigeo_local').val('').trigger('change.select2');
	$("#celular_local").val("");
	$("#telefono_fijo_local").val("");

}
function limpiar_modal_items() {
	editItem=false;
	newItem=false;
	$('#id_item').val('').trigger('change.select2');

	$("#categoria").val('');
	$("#marca").val('');
	$("#unidad_medida_compra").val('');
	$("#factor").val('1');
	$("#cantidad").val('1');
	$("#unidades").val('0');
	$("#costo_umc").val('0.00');
	$("#costo_unidad").val('0.00');
	$("#costo_total").val('0.00');
	$("#numero_lote").val('');
	$("#fecha_vencimiento").val('');

	$("#maneja_lotes").iCheck('uncheck');

	$("#numero_lote").prop("disabled",true);
	$("#fecha_vencimiento").prop("disabled",true);
}

function limpiar()
{
	$("#modalTitle").html('Nuevo registro');
	editItem=false;
	$("#id_requerimiento").val("");

	$("#id_tipo_documento").val("");
	$("#serie_documento").val("");
	//$("#id_empresa").val("");
	//$("#id_local").val("");
	$("#numero_documento").val("");
	$("#fecha_compra").val("");

	$("#id_moneda").val("");
	$("#numero_guia").val("");
	$("#id_orden_compra").val("");
	$("#observacion").val("");

	$('#id_personal_referencia').selectpicker('val', ['']);

	$("#ruc").val("");
	$("#direccion").val("");
	$('#razon_social').val('').trigger('change.select2');

	//document.getElementById('tblDet').getElementsByTagName('tbody').innerHtml='';

	//$("#maneja_lotes").iCheck('uncheck');

	$("#tblDet > tbody").empty();
	$("#td_total").html('0.00');
	$("#td_subtotal").html('0.00');
    $("#td_igv").html('0.00');

    $("#id_empresa").prop("disabled",false);
    $("#id_local").prop("disabled",false);
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
	var parametros = {"id_ingreso":row};
	$.ajax( {
		url: '../ajax/compra.php?op=detalleCompra',
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
		var parametros = {"id_requerimiento":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/requerimiento.php?op=detalleRequerimiento',
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
        if (title!='' && $.trim(title)!='Acciones' && title!='Estado' && title!='Fecha' && title!='Fecha Aut'){
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
          text: '<i class="glyphicon glyphicon-plus"></i> Nuevo ',
          className: "btn btn-success btn-sm",
          action: function ( e, dt, node, config ) {
              ver();
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
      	"sAjaxSource": "../ajax/requerimiento.php?op=listar", // Load Data
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
		{ "orderable": false,	"targets": 0,	"searchable": false },
		{ "orderable": false,	"targets": 1,	"searchable": false },
		{ "orderable": true,	"targets": 2,	"searchable": true },
		{ "orderable": true,	"targets": 3,	"searchable": true },

		{ "orderable": true,	"targets": 4,	"searchable": true },
		{ "orderable": true,	"targets": 8,	"searchable": true },
		/*{ "orderable": false,	"targets": 5,	"searchable": true },
		{ "orderable": false,	"targets": 6,	"searchable": true },
		{ "orderable": false,	"targets": 7,	"searchable": false },
		{ "orderable": false,	"targets": 8,	"searchable": true },
		{ "orderable": false,	"targets": 9,	"searchable": true },
		{ "orderable": false,	"targets": 10,	"searchable": true },
		{ "orderable": false,	"targets": 11,	"searchable": false }*/
		],

		"createdRow": function( row, data, dataIndex){
			//Si ya esta autorizado
			//console.log(data[4]);
			if( data[7] != null){
				//$(row).addClass('alert alert-warning');
				//$(row).css('background-color', 'rgb(250, 235, 204)');
				//$(row).css('background-color', '#F39B9B');
				$(row).addClass( 'success' )
			}

		},

		/*"drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('bg-green');
        },*/

		initComplete: function () {
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
		{
			className: 'details-control',
			defaultContent: '',
			data: null,
			orderable: false,
			defaultContent: '' },

			//{ aTargets: null },
			{ aTargets: 'i.id' },
			{ aTargets: 'i.id' },
			{ aTargets: 'e.nombre' },			
			{ aTargets: 'i.numero' },
			{ aTargets: 'l.nombre' },
			{ aTargets: 'i.fecha' },
			{ aTargets: 'uc.login' },
			{ aTargets: 'i.fecha_autorizacion' },
			{ aTargets: 'ua.login' }


			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 3, "desc" ]]//Ordenar (columna,orden)

	});
 

	

 	
	$('#tbllistado').removeClass('display').addClass('table table-striped table-bordered');

	/*$('#tbllistado tfoot th').each(function () {
		
		if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Estado" && $(this).text() != "Estado") {
				var title = $('#tbllistado thead th').eq($(this).index()).text();
				$(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
		}
	});*/


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
	if ($("#id_item").val()==''){
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
				if ($('#maneja_lotes').is(':checked')){
					var maneja_lote='1';
				}else{
					var maneja_lote='0';
				}

				var parametros = {
					"id_item":$('#id_item').val(),
					"nombre":$('#nombre').val().toUpperCase(),
					"id_empresa": $('#id_empresa').val(),
					"id_marca": $('#id_marca').val(),
					"id_categoria": $('#id_categoria').val(),
					"id_ums": $("#id_ums").val(),
					"id_umi": $("#id_umi").val(),
					"factor": $("#factor").val(),
					"precio_compra": $("#precio_compra").val(),
					"maneja_lote": maneja_lote
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

function mostrar_requerimiento(id_requerimiento,id_nivel_usuario)
{
	//alert(id_item);
	editItem=false;
	newItem=false;
	$.post("../ajax/requerimiento.php?op=mostrar",{id_requerimiento : id_requerimiento}, function(data, status)
	{
		data = JSON.parse(data);

		//console.log(data);
		if (data.id_usuario_crea!=$("#id_usuario_crea").val() && id_nivel_usuario!='1'){
			bootbox.alert('Ud. no puede editar el registro seleccionado');
			return false;
		}


		$("#id_requerimiento").val(id_requerimiento);
		$("#empresa").val(data.empresa);
		$("#area").val(data.local);

		if (data.urgente=='t'){
			$("#urgente").iCheck('check');
		}else{
			$("#urgente").iCheck('uncheck');
		}

		//$("#id_tipo_documento").val(data.id_tipo_documento);
		//$("#id_empresa").val(data.id_empresa);

		//$("#serie_documento").val(data.serie_documento);
		//$("#numero_documento").val(data.numero_documento);
		//$("#fecha_compra").val(data.fecha);

		//$("#id_moneda").val(data.id_moneda);
		//$("#id_forma_pago").val(data.id_forma_pago);
		$("#numero").val(data.numero);

		//$("#validez").val(data.validez);
		$("#observaciones").val(data.observaciones);

		$("#usuario_creacion").val(data.usuario_crea);

		//$("#id_personal_referencia").val('1');
		aPer=JSON.parse(data.id_personal_referencia);
		//console.log(data.id_personal_referencia);
		
		$('#id_personal_referencia').selectpicker('val', aPer);

		//$('#id_personal_referencia').selectpicker('refresh');

		$("#fecha_creacion").val(data.fecha_creacion);
		//$("#tipo_cambio").val(data.tipo_cambio);
		//$("#porcentaje_igv").val(data.porcentaje_igv);		
		//$('#razon_social').append("<option value='"+data.id_proveedor+"' selected='selected'>"+data.razon_social+"</option>");
 		//$("#razon_social").trigger('change');

 		//$("#id_empresa").prop("disabled",true);



 		


 		$("#tblDet > tbody").empty();

 		$.each(data.detalle, function( i, item ){
			//console.log(item .id_item)
            //console.log(item .nombre); 
            idRow="tr"+item.id_catalogo; 
            r = tabled.rows.length;
		    var newRow = tabled.insertRow(r);
		    newRow.id=idRow;
		    cell1 = newRow.insertCell(0),
		    cell2 = newRow.insertCell(1),
		    cell3 = newRow.insertCell(2),
		    cell4 = newRow.insertCell(3),
		    cell5 = newRow.insertCell(4),
		    cell6 = newRow.insertCell(5),
		    
		    cell1.innerHTML = "<button class='btn btn-link btn-xs' onclick='editRow(\""+idRow+"\")'><i class='fa fa-pencil'></i></button><button class='btn btn-link btn-xs' onclick='delRow(\""+idRow+"\");'><i class='fa fa-close'></i></button>";
      	    cell2.innerHTML = item.nombre;      
		    cell2.id="td_nombre_item";
			cell3.innerHTML = item.unidad_medida_ingreso;
		    cell3.id="td_unidad_medida";
			
		    cell4.innerHTML = item.cantidad;
		    cell4.id="td_cantidad";
		    cell4.className  ='text-right';			

		    cell5.innerHTML = item.id_catalogo;
		    cell5.id="td_id_item";
		    cell5.style.display ='none';

		    cell6.innerHTML = item.id_medida;
		    cell6.id="td_id_unidad_medida";
		    cell6.style.display ='none'; 


        });


 		//calculoTotal();

      	//$('#row_btn_item').hide();
      	//$('#row_tbl_detalle').hide();

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
function desactivar(id_requerimiento)
{
	bootbox.confirm("¿Está Seguro de anular el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/requerimiento.php?op=desactivar",
        	 {id_requerimiento : id_requerimiento,id_usuario: $("#id_usuario_crea").val()
        	 }, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_requerimiento)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/requerimiento.php?op=activar", {id_requerimiento : id_requerimiento,
        		id_usuario: $("#id_usuario_crea").val()
        	}, function(e){
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
