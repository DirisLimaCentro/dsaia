var tabla;
var bTab=false;
//Función que se ejecuta al inicio
function open_ficha(id)
{
  //alert(id_item);

  $.post("../ajax/ficha_acta_condiciones_sanitarias_xl.php?op=mostrar",{id : id}, function(data, status)
  {
    
    //console.log(data);
    //return false;
    data = JSON.parse(data);
    
    /*if (data[0].vacuna_antirabica=='t') $('#vacuna_antirabica').bootstrapToggle('on'); else  $('#vacuna_antirabica').bootstrapToggle('off');
    if (data[0].vacuna_antitetanica=='t') $('#vacuna_antitetanica').bootstrapToggle('on'); else  $('#vacuna_antitetanica').bootstrapToggle('off');
    if (data[0].mordedura_ultimo=='t') $('#mordedura_ultimo').bootstrapToggle('on'); else  $('#mordedura_ultimo').bootstrapToggle('off');
    if (data[0].acudio_es=='t') $('#acudio_es').bootstrapToggle('on'); else  $('#acudio_es').bootstrapToggle('off');
    if (data[0].conoce_triada=='t') $('#conoce_triada').bootstrapToggle('on'); else  $('#conoce_triada').bootstrapToggle('off');
    if (data[0].facilita_informacion=='t') $('#facilita_informacion').bootstrapToggle('on'); else  $('#facilita_informacion').bootstrapToggle('off');
    if (data[0].permite_observar=='t') $('#permite_observar').bootstrapToggle('on'); else  $('#permite_observar').bootstrapToggle('off');
    if (data[0].verifica_temperatura=='t') $('#verifica_temperatura').bootstrapToggle('on'); else  $('#verifica_temperatura').bootstrapToggle('off');
    if (data[0].verifica_equipos=='t') $('#verifica_equipos').bootstrapToggle('on'); else  $('#verifica_equipos').bootstrapToggle('off');
    if (data[0].apoya_vigilancia=='t') $('#apoya_vigilancia').bootstrapToggle('on'); else  $('#apoya_vigilancia').bootstrapToggle('off');
    if (data[0].guia_sanitaria=='t') $('#guia_sanitaria').bootstrapToggle('on'); else  $('#guia_sanitaria').bootstrapToggle('off');
    if (data[0].autoriza_correo=='t') $('#autoriza_correo').bootstrapToggle('on'); else  $('#autoriza_correo').bootstrapToggle('off');*/
    dat=data[0];

    $("#id_ficha").val(id);
    $("#id_entidad").val(dat.id_entidad);
    $("#fecha_inicio").val(dat.fecha_ini);
    $("#fecha_termino").val(dat.fecha_ter);
    $("#hora_inicio").val(dat.hora_inicio);
    $("#hora_termino").val(dat.hora_fin);

    $("#usuario").val(dat.login);

    $("#id_usuario").val(dat.id_usuario_crea);
    $("#id_local").val(dat.id_local);

    $("#ruc").val(dat.ruc);

   
    $("#razon_social").val(dat.razon_social);
    $("#direccion_empresa").val(dat.direccion_empresa);
    $('#ubigeo').append("<option value='"+dat.id_ubigeo_empresa+"' selected='selected'>"+dat.distrito_empresa+"</option>");
    $("#ubigeo").trigger('change');
    $("#telefono_fijo_empresa").val(dat.telefono_fijo_empresa);
    $("#celular_empresa").val(dat.celular_empresa);
    $("#email_empresa").val(dat.email_empresa);

    $("#responsable_establecimiento").val(dat.responsable_establecimiento)
    $("#licencia").val(dat.numero_licencia)



    $("#responsable_calidad").val(dat.responsable_calidad)

    $("#cargo").val(dat.cargo)
    $("#dias_actividad").val(dat.numero_dias_actividad)
    $("#tipo_establecimiento").val(dat.tipo_establecimiento)
    $("#nro_hombres").val(dat.numero_hombres)
    $("#tipo_qaliwarma").val(dat.tipo_qaliwarma)

    //const keys = dat.keys();
    keys = Object.keys(dat); 
    for (let x of keys) {
      //text += x + "<br>";
      //console.log(x);
        l=x.substring(0,1);
        if (l=='i'){

          if (x.search('obs')>0){
            $('textarea[name="'+x+'"]').val(dat[x])
          }else{

           if (dat[x]=='t') $('input[type=checkbox][name='+x+']').bootstrapToggle('on'); else  $('input[type=checkbox][name='+x+']').bootstrapToggle('off');

          }
        }
    }

   
    //aEspecies=JSON.parse(data[0].especies);
    //$('#id_especie').selectpicker('val', aEspecies);

    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
  })
}


function buscar_persona(){
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/persona.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			op: "buscar_id",
			tipo_doc: $("#tipo_doc").val(),
			numero_doc: $("#numero_doc").val()
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {

    			$("#loaderModal").hide();
    			if (result.msj=='') {
    				$("#id_persona").val(result.id);
    				$("#nombres").val(result.nombres);
    				$("#ape_paterno").val(result.ape_paterno);

    				$("#ape_materno").val(result.ape_materno);
    				$("#direccion_persona").val(result.direccion);
    				    				
    				$('#ubigeo_persona').append("<option value='"+result.id_ubigeo+"' selected='selected'>"+result.distrito+"</option>");
 					$("#ubigeo_persona").trigger('change');

 					$("#btnFindPersona").prop("disabled",true);
 					$("#numero_doc").prop("disabled",true);

                 
                }else{
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


function buscar_reniec(){

	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/services.php",
		dataType: "json",
		method: "get",
		async : false,
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
                if (result.error=='') {
                	var dataPersona = result.row;
                	$("#nombres").val(dataPersona.nombres);
                	$("#ape_paterno").val(dataPersona.apellido_paterno);
                	$("#ape_materno").val(dataPersona.apellido_materno);
                	
                	$("#direccion_persona").val(dataPersona.domicilio_direccion_actual+' '+dataPersona.domicilio_direccion);
    					
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



function buscar_entidad(){
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/entidad.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			op: "buscar_id",
			ruc: $("#ruc").val(),
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {

    			$("#loaderModal").hide();
    			if (result.msj=='') {
    				$("#razon_social").val(result.nombre);
    				$("#direccion_empresa").val(result.direccion);

    				$("#telefono_fijo_empresa").val(result.telefono_fijo);
    				$("#celular_empresa").val(result.celular);
    				$("#email_empresa").val(result.e_mail);

    				$("#id_entidad").val(result.id);

    			$('#ubigeo').append("<option value='"+result.id_ubigeo+"' selected='selected'>"+result.distrito+"</option>");
 					$("#ubigeo").trigger('change');

 					//$("#btnfindRuc").prop("disabled",true);
 					//$("#ruc").prop("disabled",true);

                 
                }else{
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
                	$("#razon_social").val(result.razon_social);
                	$("#direccion_empresa").val(result.direccion);
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

    "pagingType": 'full_numbers',
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
  $("input[type=text], textarea").val('');

	$("#id_ficha").val("0");
	$("#id_entidad").val("0");
	$("#id_persona").val("0");

  $("#ruc").val("");
  $("#razon_social").val("");  
  $("#direccion_empresa").val("");


  $("#telefono_fijo_empresa").val("");
  $("#celular_empresa").val("");
  $("#email_empresa").val("");
  $("#numero_doc").val("");
  $("#nombres").val("");
   $("#ape_paterno").val("");
   $("#ape_materno").val("");
   $("#direccion_persona").val("");

 $("#responsable_establecimiento").val("");
 $("#licencia").val("");


 $("#responsable_calidad").val("");
 $("#cargo").val("");
 $("#dias_actividad").val("0");
 $("#tipo_establecimiento").val("");
 $("#tipo_qaliwarma").val("0");
 $("#nro_hombres").val("0");


 $("#usuario").val($("#s_login").val());
 $("#fecha_inicio").val($("#s_hoy").val());

   
  $('#ubigeo').val('').trigger('change.select2');
  $('#ubigeo_persona').val('').trigger('change.select2'); 

  //$('#vacuna_antirabica').bootstrapToggle('off');
 $('input[type=checkbox]').bootstrapToggle('off');
 

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
		{ "orderable": false, "targets": 0, "searchable": false,"width": "12%" },
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


  $('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
    $('#tbllistado thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title!='' && $.trim(title)!='Acciones' && title!='Fecha Inicio' && title!='Fecha Termino' && title!='Fecha Crea'){
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
      	"sAjaxSource": "../ajax/ficha_acta_condiciones_sanitarias_xl.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data

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
			if( data[9] ==  'f'){
        $(row).addClass('danger')
        //$(row).addClass('alert alert-warning');
        //$(row).css('background-color', 'rgb(250, 235, 204)');
        //$(row).css('background-color', '#F39B9B');
      }

		},

    initComplete: function () {
      $('.dt-buttons').removeClass('btn-group'); 
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
			{ aTargets: 'f.fecha_inicio' },
			{ aTargets: 'e.nombre' },
			{ aTargets: 'e.ruc' },
			{ aTargets: 'f.responsable_calidad' },
			{ aTargets: 'uc.login' },
			{ aTargets: 'f.fecha_creacion' }

			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 8, "des" ]]//Ordenar (columna,orden)

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
	msj="";
	/*if ($("#ruc").val()==''){
    	msj="Ingrese RUC del establecimiento";
  	}else if(){

  	}*/

    var datastring = $("#frmmodal").serialize();

    //var datastring =  $('#modal-content').find('select, textarea, input, checkbox').serialize();

   

	if ($("#ruc").val()==''){
		var msj="Ingrese RUC del establecimiento";
	}else if ($("#razon_social").val()==''){
		var msj="Ingrese razon social establecimiento";
	}else if ($("#direccion_empresa").val()==''){
    var msj="Ingrese direccion del establecimiento";
  }else if ($("#ubigeo").val()==''){
    var msj="Ingrese distrito del establecimiento";
  }else if ($("#fecha_inicio").val()==''){
    var msj="Ingrese fecha de inicio";
  }else if ($("#hora_inicio").val()==''){
    var msj="Ingrese hora de inicio";
  }else if ($("#licencia").val()==''){
    var msj="Ingrese numero de licencia";
  }else if ($("#ubigeo").val()==''){
    var msj="Seleccione distrito de empresa";
  }
  if (msj){
    //return bootbox.alert(msj);
  }

 // if ($('#vacuna_antirabica').is(':checked')) var vacuna_antirabica=true; else var vacuna_antirabica=false;




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
			
			if (result){
				
        
				/*var parametros = {
          "id_ficha":($("#id_ficha").val()=='')?'0':$("#id_ficha").val(), 
					"id_entidad":($("#id_entidad").val()=='')?'0':$("#id_entidad").val(), 
          "id_persona":($("#id_persona").val()=='')?'0':$("#id_persona").val(),         
          "id_local": $("#s_id_local").val(),
          "id_usuario": $("#s_id_usuario").val()
					};*/


				$.ajax({
					url: "../ajax/ficha_acta_condiciones_sanitarias_xl.php?op=save",
					type: "POST",
					//data: parametros,
          data: datastring,
					//contentType: false,
					//processData: false,

					success: function(msg)
					{
						//bootbox.alert(datos);
						//mostrarform(false);
						//$('#modalNew').modal('toggle')
            console.log(msg)
           
						table.ajax.reload();
            var amsg=msg.split('|');
            var nerror=amsg[0];
            if (nerror=='0'){
              bootbox.alert('Ocurrio un error: '+amsg[1]);
            }else{
              $('#modalNew').modal('toggle');
              bootbox.alert('Registro guardado');
            }

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
function desactivar(id)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/ficha_acta_condiciones_sanitarias_xl.php?op=desactivar", {id : id}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/ficha_acta_condiciones_sanitarias_xl.php?op=activar", {id : id}, function(e){
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
