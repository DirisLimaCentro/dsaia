var tabla;
var bTab=false;
var bTabCob=false;
//Función que se ejecuta al inicio
function delete_localidad(id){
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
			if(result){
				$.post("../ajax/empresa.php?op=deleteLocalidad", {id_localidad : id}, function(e){
					bootbox.alert(e);
					tblReq.ajax.reload();
				});
			}
		}
	});
}
function new_localidad(){
	$("#id_localidad").val('0');
	$("#nombre_localidad").val('');
	$("#sector").val('');
	$("#cnt_viviendas").val('0');
	$('#modalNewLocalidad').modal('show');	
}
function show_localidad(id){
	$.post("../ajax/empresa.php?op=mostrarLocalidad",{id_localidad : id}, function(data, status)
	{
		data = JSON.parse(data);
		$("#nombre_localidad").val(data.descripcion);
		$("#sector").val(data.sector);
		$("#cnt_viviendas").val(data.cnt_viviendas);
		$("#id_localidad").val(id);
		$('#modalNewLocalidad').modal('show');
	});
}

function editCobertura(id_local,anio,id_tipo,ene,feb,mar,abr,may,jun,jul,ago,set,oct,nov,dic){

	$("#anio_cobertura").val(anio);
	$("#id_actividad").val(id_tipo);

	$("#id_actividad").prop("disabled",true);
	$("#anio_cobertura").prop("disabled",true);

	$("#txtenero").val(ene);
	$("#txtfebrero").val(feb);
	$("#txtmarzo").val(mar);
	$("#txtabril").val(abr);
	$("#txtmayo").val(may);
	$("#txtjunio").val(jun);
	$("#txtjulio").val(jul);
	$("#txtagosto").val(ago);
	$("#txtsetiembre").val(set);
	$("#txtoctubre").val(oct);
	$("#txtnoviembre").val(nov);
	$("#txtdiciembre").val(dic);
	



	$("#modalTitleCob").html("Edicion de Cobertura");
	$("#div_meses").show();
	$('#modalNewCobertura').modal('show');
}

function saveCobertura(){
	//alert($("#id_local").val());
	if ($("#id_actividad").val()==''){
		return bootbox.alert('Seleccione tipo de actividad');
	}
	if ($("#anio_cobertura").val()==''){
		return bootbox.alert('Ingrese año de cobertura');
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
			
			if (result){
			

				var parametros = {					
					"id_local":$('#id_local').val(),
					"id_actividad": $("#id_actividad").val(),					
					"anio": $("#anio_cobertura").val(),
					"enero": $("#txtenero").val(),
					"febrero": $("#txtfebrero").val(),
					"marzo": $("#txtmarzo").val(),
					"abril": $("#txtabril").val(),
					"mayo": $("#txtmayo").val(),
					"junio": $("#txtjunio").val(),
					"julio": $("#txtjulio").val(),
					"agosto": $("#txtagosto").val(),
					"setiembre": $("#txtsetiembre").val(),
					"octubre": $("#txtoctubre").val(),
					"noviembre": $("#txtnoviembre").val(),
					"diciembre": $("#txtdiciembre").val()

					};
				if($('#id_actividad').is(':disabled')){
					crud="updateCobertura";
				}else{
					crud="insertCobertura";
				}

				
				$.ajax({
					url: "../ajax/empresa.php?op="+crud,
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(msg)
					{
						listCoberturas($('#id_local').val());
						$('#modalNewCobertura').modal('toggle')
					}

				});


			}
		}
	});

}

function saveLocalidad(){
	if ($("#sector").val()==''){
		return bootbox.alert('Ingrese sector');
	}
	if ($("#nombre_localidad").val()==''){
		return bootbox.alert('Ingrese nombre localidad');
	}
	if ($("#cnt_viviendas").val()==''){
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
			if (result){
				//Grabar
				//var formData = new FormData($("#frmestablecimiento")[0]);

				var parametros = {
					"id_localidad": $("#id_localidad").val(),
					"id_local":$('#id_local').val(),
					"sector": $("#sector").val(),
					"nombre":$('#nombre_localidad').val().toUpperCase(),					
					"cnt_viviendas": $("#cnt_viviendas").val(),
					"id_usuario": $("#s_id_usuario").val()
					};


				$.ajax({
					url: "../ajax/empresa.php?op=saveLocalidad",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(msg)
					{
						//bootbox.alert(datos);
						//mostrarform(false);
						 var amsg=msg.split('|');
		                  var nerror=amsg[0];
		                  if (nerror=='0'){
		                    return bootbox.alert('Ocurrio un error: '+amsg[1]);
		                  }else{
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

function listCoberturas(id_establecimiento){
	$("#id_local").val(id_establecimiento);
	var parametros = {"id_local":id_establecimiento};
	$.ajax( {
		url: '../ajax/empresa.php?op=tableCoberturas',
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#div_coberturas").html(json);
			renderCoberturas(id_establecimiento);
			//div
			//.html( json )
			//.removeClass( 'loading' );
			//createDataTable(rowData[0]);

		}
	} );
  
}

function new_cobertura(id_establecimiento){
	$("#id_actividad").prop("disabled",false);
	$("#anio_cobertura").prop("disabled",false);

	$("#modalTitleCob").html("Nueva Cobertura");
	$("#div_meses").hide();
	$('#modalNewCobertura').modal('show');
}

function renderCoberturas(id_establecimiento){
	//tbl="dt"+id;
	dt=$('#tblcob').DataTable({
		dom: "Blftip",
		"buttons": [
      {
          text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
          className: "btn btn-info btn-sm",
          action: function ( e, dt, node, config ) {
              new_cobertura(id_establecimiento);
          }
 
      }
      ],
		orderCellsTop: true,
		fixedHeader: true,
		fixedColumns: true,
		"lengthChange": true,
		"lengthMenu": [ 5, 10, 25, 75, 100],
		"bProcessing": true,
		"bJQueryUI": false,
		//"responsive": true,            
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
		{ "orderable": false, "targets": 0, "searchable": false },
		{ "orderable": true, "targets": 1, "searchable": true },
	{ "orderable": true, "targets": 2, "searchable": true /*, className: "wrapok"*/},
	{ "orderable": true, "targets": 3, "searchable": false },
	{ "orderable": true, "targets": 4, "searchable": false },
	{ "orderable": true, "targets": 5, "searchable": false },
	{ "orderable": true, "targets": 6, "searchable": false },
	{ "orderable": true, "targets": 7, "searchable": false },
	{ "orderable": true, "targets": 8, "searchable": false },
	{ "orderable": true, "targets": 9, "searchable": false },
	{ "orderable": true, "targets": 10, "searchable": false },
	{ "orderable": true, "targets": 11, "searchable": false },
	{ "orderable": true, "targets": 12, "searchable": false }
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
	"bAutoWidth": false ,
	"iDisplayLength": 10
});
}


function listLocalidades(id_establecimiento){
	$("#id_local").val(id_establecimiento);
	if (bTab==true){

		  tblReq.ajax.reload();
          //tblReq.destroy();
          return false;
    }  
     bTab=true;     
  $('#tbllocalidades thead tr').clone(true).appendTo('#tbllocalidades thead');
  $('#tbllocalidades thead tr:eq(1) th').each(function(i) {
    var title = $(this).text();
    if (title != '' && title != 'Acciones' && title != 'Fecha Aut' && title!='Atendido') {
      $(this).html('<input style="width:100%;" type="text" class="form-control input-sm" placeholder="Buscar ' + title + '" />');
    } else {
      $(this).html('');
    }
    $('input', this).on('keyup change', function() {
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
          action: function ( e, dt, node, config ) {
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

    "fnServerParams": function ( aoData ) {
    	aoData.push( { "name": "id_establecimiento", "value": $('#id_local').val() }
    		
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
    initComplete: function() {
      tblReq.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
          that
            .search(this.value)
            .draw();
        });
      });
    },
    columns: [
    	
      { aTargets: 'l.id' ,"width": "5%"},     
      { aTargets: 'sec.descripcion',"width": "5%",  },
      { aTargets: 'l.descripcion',"width": "80%",  },
      { aTargets: 'l.cnt_viviendas',"width": "10%" }    
      
      
    ],

    "pagingType": 'numbers',
    "iDisplayLength": 5, //Paginación
    "order": [
      [2, "asc"]
    ] //Ordenar (columna,orden)

  });


  $('#tbllocalidades').removeClass('display').addClass('table table-striped table-bordered');

  $('#tbllocalidades tfoot th').each(function() {
    //Agar kolom Action Tidak Ada Tombol Pencarian
    if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Atendido" && $(this).text() != "Fecha Aut") {
      var title = $('#tbllocalidades thead th').eq($(this).index()).text();
      $(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
    }
  });
  
}





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
function show_localidades(id_establecimiento){
	//$("#modalTitleLocalidad").html('Localidades: '+nombre);
	listLocalidades(id_establecimiento);
 	$('#modalLocalidades').modal('show');
}

function show_coberturas(id_establecimiento){
	//$("#modalTitleLocalidad").html('Localidades: '+nombre);
	listCoberturas(id_establecimiento);
 	$('#modalCoberturas').modal('show');
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
	$("#id_empresa").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$("#nombre_comercial").val("")
	$("#correo").val("")
	$('#ubigeo').val('').trigger('change.select2');
	$("#ruc").val("");
	$("#telefono_fijo").val("");

}
//Función limpiar
function buscar_sunat(){


	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/services.php",
		dataType: "json",
		method: "get",
		async : false,
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
                if (result.msj=='') {
                	$("#nombre").val(result.razon_social);
                	$("#direccion").val(result.direccion);
                    //$("#nombre_comercial").val(result.result.nombre_comercial);
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

function createDataTable(id){
	tbl="dt"+id;
	dt=$('#'+tbl).DataTable({
		dom: "lftip",
		orderCellsTop: true,
		fixedHeader: true,
		fixedColumns: true,
		"lengthChange": true,
		"lengthMenu": [ 5, 10, 25, 75, 100],
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
		{ "orderable": false, "targets": 0, "searchable": false,"width": "13%" },
		{ "orderable": true, "targets": 1, "searchable": true },
	{ "orderable": true, "targets": 2, "searchable": true /*, className: "wrapok"*/},
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
	"bAutoWidth": false ,
	"iDisplayLength": 10
});
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
			createDataTable(row);		
		}
	} );
}

//Función Listar
function listar()
{
	function format ( rowData ) {
		var parametros = {"id_empresa":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/empresa.php?op=tableLocales',
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );
				createDataTable(rowData[0]);

			}
		} );

		return div;
		//alert('hola');
	}

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
      	"sAjaxSource": "../ajax/empresa.php?op=listar", // Load Data
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
		{ 'width':'2%', "orderable": true,	"targets": 1,	"searchable": true },
		{ "orderable": false,	"targets": 2,	"searchable": false },
		{ "orderable": false,	"targets": 3,	"searchable": false }
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
			{ aTargets: 'id' },
			{ aTargets: '' },
			{ aTargets: 'nombre' },
			{ aTargets: 'direccion' },
			{ aTargets: 'distrito' },
			{ aTargets: 'telefono_fijo' },
			{ aTargets: 'ruc' }
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


	/*$('.buttons-excel, .buttons-print').each(function() {
	   $(this).removeClass('btn-default').addClass('btn-primary')
	})*/


}
//Función para guardar o editar

function guardaryeditar()
{
	
	if ($("#nombre").val()==''){
    	bootbox.alert('Ingrese nombre de la empresa');
    	return false;
  	}

  	if ($("#ruc").val()==''){
    	bootbox.alert('Ingrese ruc de la empresa');
    	return false;
  	}


	if ($("#id_empresa").val()==''){
		var msj="Esta seguro de guardar el nuevo registro?";
	}else{
		var msj="Esta seguro de guardar los cambios?";
	}


	/*BootstrapDialog.confirm({
            title: 'Mensaje de Confirmacion',
            message: 'Esta seguro de guardar el registro?',
            type: BootstrapDialog.TYPE_PRIMARY, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true,
            closeByBackdrop: false,
            closeByKeyboard: true,
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
            btnOKLabel: 'Aceptar', // <-- Default value is 'OK',
            btnOKClass: 'btn-success', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                    alert('Yup.');
                }else {
                    alert('Nope.');
                }
            }
        });
        */


	bootbox.confirm({
		title: "Mensaje",
		message: msj,
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
			if (result){
				//Grabar
				//var formData = new FormData($("#frmestablecimiento")[0]);

				var parametros = {
					"id_empresa":$('#id_empresa').val(),
					"nombre":$('#nombre').val().toUpperCase(),
					"direccion": $('#direccion').val().toUpperCase(),
					"nombre_comercial": $('#nombre_comercial').val().toUpperCase(),
					"ruc": $('#ruc').val().toUpperCase(),
					"correo": $('#correo').val().toUpperCase(),
					"telefono_fijo": $('#telefono_fijo').val(),
					"ubigeo": $("#ubigeo").val()
					};


				$.ajax({
					url: "../ajax/empresa.php?op=guardaryeditar",
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
	if ($("#nombre_local").val()==''){
    	bootbox.alert('Ingrese nombre del local');
    	return false;
  	}
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

function mostrar(id_empresa)
{
	$.post("../ajax/empresa.php?op=mostrar",{id_empresa : id_empresa}, function(data, status)
	{
		data = JSON.parse(data);
		$("#nombre").val(data.nombre);
		$("#id_empresa").val(id_empresa);
 		$("#direccion").val(data.direccion);

 		$("#nombre_comercial").val(data.nombre_comercial);
 		$("#correo").val(data.e_mail);

 		$("#ruc").val(data.ruc);
 		$("#telefono_fijo").val(data.telefono_fijo);
 		$('#ubigeo').append("<option value='"+data.id_ubigeo+"' selected='selected'>"+data.distrito+"</option>");
 		$("#ubigeo").trigger('change');
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
function desactivar(id_empresa)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/empresa.php?op=desactivar", {id_empresa : id_empresa}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_empresa)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/empresa.php?op=activar", {id_empresa : id_empresa}, function(e){
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
