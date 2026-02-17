var tabla;
var bTab=false;
//Función que se ejecuta al inicio
function open_ficha(id)
{
  //alert(id_item);

  $.post("../ajax/ficha_atencion_rabia.php?op=mostrar",{id : id}, function(data, status)
  {
    
    //console.log(data);
    //return false;
    data = JSON.parse(data);

    dat=data[0];
    
    if (data[0].chk_antecedente_vacunacion=='t') $('#antecedentes_vacunacion').bootstrapToggle('on'); else  $('#antecedentes_vacunacion').bootstrapToggle('off');
    if (data[0].chk_enfermedad_actual=='t') $('#enfermedad_actual').bootstrapToggle('on'); else  $('#enfermedad_actual').bootstrapToggle('off');
    //if (data[0].mordedura_ultimo=='t') $('#mordedura_ultimo').bootstrapToggle('on'); else  $('#mordedura_ultimo').bootstrapToggle('off');
    //if (data[0].acudio_es=='t') $('#acudio_es').bootstrapToggle('on'); else  $('#acudio_es').bootstrapToggle('off');
    
    if (dat.chk_lesion_mordedura=='t') $("#mordedura").iCheck('check'); else $("#mordedura").iCheck('uncheck');
    if (dat.chk_lesion_araniazo=='t') $("#aranazo").iCheck('check'); else $("#aranazo").iCheck('uncheck');
    if (dat.chk_lesion_contacto=='t') $("#contacto").iCheck('check'); else $("#contacto").iCheck('uncheck');

    if (dat.chk_herida_superficial=='t') $("#superficial").iCheck('check'); else $("#superficial").iCheck('uncheck');
    if (dat.chk_herida_profunda=='t') $("#profunda").iCheck('check'); else $("#profunda").iCheck('uncheck');


    $("#id_ficha").val(id);
    $("#id_acompanante").val(data[0].id_acompaniante);
    $("#id_persona").val(data[0].id_persona);
    $("#fecha_atencion").val(data[0].fecha_atencion);
    $("#fecha_accidente").val(data[0].fecha_accidente);  

    $('#ficha_persona').val(dat.ficha_persona);
    $('#ficha_animal').val(dat.ficha_animal);
    $('#historia_clinica').val(dat.hc_persona);

    $("#id_especie").val(dat.id_especie_animal);

    $('#id_raza').val(dat.id_raza_animal);
    $("#id_raza").trigger('change'); 

    //$('#ubigeo_accidente').val()

    $('#ubigeo_accidente').append("<option value='"+dat.id_distrito_accidente+"' selected='selected'>"+dat.ubigeo_accidente+"</option>");
    $("#ubigeo_accidente").trigger('change'); 

    $('#id_estado_actual_animal').val(dat.id_estado_animal_inicial);
    $('#tipo_exposicion').val(dat.id_tipo_exposicion);
    $('#tipo_doc').val(dat.id_tipo_documento);
    $('#numero_doc').val(dat.numero_documento);

    $('#nombres').val(dat.nombres);
    $('#ape_paterno').val(dat.ape_paterno);
    $('#ape_materno').val(dat.ape_materno);
    $('#edad').val(dat.edad_persona);
    $('#sexo').val(dat.sexo);
    $('#peso').val(dat.peso_persona);
    $('#direccion_persona').val(dat.direccion_persona);

    $('#ubigeo_persona').append("<option value='"+dat.id_ubigeo_persona+"' selected='selected'>"+dat.distrito_persona+"</option>");
    $("#ubigeo_persona").trigger('change'); 

    //$("#ubigeo_persona").val();
    $('#direccion_referencia').val(dat.direccion_referencia);
    $('#telefono').val(dat.telefono);
    $('#e_mail').val(dat.e_mail);
    $('#id_grado_instruccion').val(dat.id_grado_instruccion);
    $('#tipo_doc_acompanante').val(dat.tipo_documento_ac);
    $('#numero_doc_acompanante').val(dat.numero_documento_ac);

    $('#nombres_acompanante').val(dat.nombres_ac);
    $('#ape_paterno_acompanante').val(dat.ape_paterno_ac);
    $('#ape_materno_acompanante').val(dat.ape_materno_ac);

    $('#otra_localizacion').val(dat.descrip_otro_localizacion);
    $('#id_tipo_proteccion').val(dat.id_lesion_tipo_proteccion);
    $('#id_numero_lesiones').val(dat.id_lesion_numero);
    $('#id_estado_herida').val(dat.id_estado_herida);
    $('#id_atencion_herida').val(dat.id_lesion_atencion_herida);
    $('#id_lugar_suceso').val(dat.id_lugar_accidente);
    $("#fecha_vacunacion").val(dat.fecha_ultima_vacuna);
    $("#nro_dosis").val(dat.nro_dosis_vacunado);
    $("#id_alergico").val(dat.id_alergico_vacuna);
    $("#descripcion_enfermedad").val(dat.descrip_enfermedad_actual);
    $("#id_tipo_propietario").val(dat.id_duenio_animal);
    $("#descripcion_otros").val(dat.descrip_otro_propietario);
    $("#id_situacion").val(dat.id_estado_animal);


    aLoca=JSON.parse(dat.localizacion);
    $('#id_localizacion').selectpicker('val', aLoca);



    /*$("#razon_social").val(data[0].razon_social);
    $("#direccion_empresa").val(data[0].direccion_empresa);
    $('#ubigeo').append("<option value='"+data[0].id_ubigeo_empresa+"' selected='selected'>"+data[0].distrito_empresa+"</option>");
    $("#ubigeo").trigger('change');
    $("#telefono_fijo_empresa").val(data[0].telefono_fijo_empresa);
    $("#celular_empresa").val(data[0].celular_empresa);
    $("#email_empresa").val(data[0].email_empresa);
    $("#tipo_doc").val(data[0].id_tipo_documento);
    $("#numero_doc").val(data[0].numero_documento);
    $("#nombres").val(data[0].nombres);
    $("#ape_paterno").val(data[0].ape_paterno);
    $("#ape_materno").val(data[0].ape_materno);
    $("#direccion_persona").val(data[0].direccion_persona);
    $('#ubigeo_persona').append("<option value='"+data[0].id_ubigeo_persona+"' selected='selected'>"+data[0].distrito_persona+"</option>");
    $("#ubigeo_persona").trigger('change');
   
    aEspecies=JSON.parse(data[0].especies);
    $('#id_especie').selectpicker('val', aEspecies);*/

    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
  })
}


function buscar_persona(tipo){
	$("#loaderModal").show();

  if (tipo=='P'){
    td=$("#tipo_doc").val();
    nd=$("#numero_doc").val();
  }else{
    td=$("#tipo_doc_acompanante").val();
    nd=$("#numero_doc_acompanante").val();
  }

	$.ajax({
		url: "../ajax/persona.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			op: "buscar_id",
			tipo_doc: td,
			numero_doc: nd 
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {

       $("#loaderModal").hide();
       if (result.msj=='') {

        if (tipo=='P'){

          $("#id_persona").val(result.id);
          $("#nombres").val(result.nombres);
          $("#ape_paterno").val(result.ape_paterno);
          $("#ape_materno").val(result.ape_materno);
          $("#direccion_persona").val(result.direccion);

          $("#sexo").val(result.sexo);
          $("#telefono").val(result.telefono);
          $("#e_mail").val(result.correo);

          $("#id_grado_instruccion").val(result.id_grado_instruccion);
          $("#direccion_referencia").val(result.direccion_referencia);

          $('#ubigeo_persona').append("<option value='"+result.id_ubigeo+"' selected='selected'>"+result.departamento+" - "+result.provincia+" - "+result.distrito+"</option>");
          $("#ubigeo_persona").trigger('change');
          $("#btnFindPersona").prop("disabled",true);
          $("#numero_doc").prop("disabled",true);
        }else{
          $("#id_acompanante").val(result.id);
          $("#nombres_acompanante").val(result.nombres);
          $("#ape_paterno_acompanante").val(result.ape_paterno);
          $("#ape_materno_acompanante").val(result.ape_materno);
        }


        }else{
          buscar_reniec(tipo,nd)	
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




function buscar_reniec(tipo,nd){



	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/services.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			accion: "LOAD_RENIEC",
			numero_documento: nd
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {
                
                $("#loaderModal").hide();
                if (result.error=='') {
                	var dataPersona = result.row;
                  if (tipo=='P'){
                  	$("#nombres").val(dataPersona.nombres);
                  	$("#ape_paterno").val(dataPersona.apellido_paterno);
                  	$("#ape_materno").val(dataPersona.apellido_materno);                	
                  	$("#direccion_persona").val(dataPersona.domicilio_direccion_actual+' '+dataPersona.domicilio_direccion);
      					  }else{
                    $("#nombres_acompanante").val(dataPersona.nombres);
                    $("#ape_paterno_acompanante").val(dataPersona.apellido_paterno);
                    $("#ape_materno_acompanante").val(dataPersona.apellido_materno); 
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

 					$("#btnfindRuc").prop("disabled",true);
 					$("#ruc").prop("disabled",true);

                 
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
	$("#id_ficha").val("");
	$("#id_acompanante").val("");
	$("#id_persona").val("");

    
  $('#ubigeo_accidente').val('').trigger('change.select2');
  $('#ubigeo_persona').val('').trigger('change.select2'); 

  $('#antecedentes_vacunacion').bootstrapToggle('off');
  $('#enfermedad_actual').bootstrapToggle('off');
  
  $("#mordedura").iCheck('uncheck');
  $("#aranazo").iCheck('uncheck');
  $("#contacto").iCheck('uncheck');
  $("#superficial").iCheck('uncheck');
  $("#profunda").iCheck('uncheck');


    $("#fecha_atencion").val('');
    $("#fecha_accidente").val('');  

    $('#ficha_persona').val('');
    $('#ficha_animal').val('');
    $('#historia_clinica').val('');

    $("#id_especie").val('');

    $('#id_raza').val('');
    $("#id_raza").trigger('change'); 

   
    $('#id_estado_actual_animal').val('');
    $('#tipo_exposicion').val('');
    $('#tipo_doc').val('');
    $('#numero_doc').val('');

    $('#nombres').val('');
    $('#ape_paterno').val('');
    $('#ape_materno').val('');
    $('#edad').val('0');
    $('#sexo').val('');
    $('#peso').val('0');
    $('#direccion_persona').val('');

    $('#direccion_referencia').val('');
    $('#telefono').val('');
    $('#e_mail').val('');
    $('#id_grado_instruccion').val('');
    $('#tipo_doc_acompanante').val('');
    $('#numero_doc_acompanante').val('');

    $('#nombres_acompanante').val('');
    $('#ape_paterno_acompanante').val('');
    $('#ape_materno_acompanante').val('');

    $('#otra_localizacion').val('');
    $('#id_tipo_proteccion').val('');
    $('#id_numero_lesiones').val('');
    $('#id_estado_herida').val('');
    $('#id_atencion_herida').val('');
    $('#id_lugar_suceso').val('');
    $("#fecha_vacunacion").val('');
    $("#nro_dosis").val('');
    $("#id_alergico").val('');
    $("#descripcion_enfermedad").val('');
    $("#id_tipo_propietario").val('');
    $("#descripcion_otros").val('');
    $("#id_situacion").val('');


    aLoca='';
    $('#id_localizacion').selectpicker('val', aLoca);



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
      	"sAjaxSource": "../ajax/ficha_atencion_rabia.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data

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
			{ aTargets: 'f.fecha_atencion' },
			{ aTargets: 'f.fecha_accidente' },
			{ aTargets: 'ua.distrito' },
			{ aTargets: 'persona' },
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


	if ($("#ficha_persona").val()==''){
		var msj="Ingrese numero de ficha de la persona";
	}else if ($("#ficha_animal").val()==''){
		var msj="Ingrese numero de ficha del animal";
	}else if ($("#historia_clinica").val()==''){
    var msj="Ingrese numero de historia clinica";
  }else if ($("#id_especie").val()==''){
    var msj="Seleccione tipo de especie";
  }else if ($("#id_raza").val()==''){
    var msj="Seleccione raza del animal";
  }else if ($("#fecha_encuesta").val()==''){
    var msj="Ingrese fecha de atencion";
  }else if ($("#fecha_accidente").val()==''){
    var msj="Ingrese fecha de accidente";
  }else if ($("#ubigeo_accidente").val()==''){
    var msj="Seleccione distrito del accidente";
  }else if ($("#id_estado_actual_animal").val()==''){
    var msj="Seleccione situacion del animal";
  }else if ($("#tipo_exposicion").val()==''){
    var msj="Seleccione tipo de exp";
  }else if ($("#tipo_doc").val()==''){
    var msj="Seleccione tipo de documento de la persona";
  }else if ($("#numero_doc").val()==''){
    var msj="Ingrese numero de documento de la persona";
  }else if ($("#id_localizacion").val()==''){
    var msj="Seleccione localizacion de la herida";
  }else if ($("#id_tipo_proteccion").val()==''){
    var msj="Seleccione tipo de proteccion";
  }


  if (msj){
    return bootbox.alert(msj);
  }

  if ($('#mordedura').is(':checked')) var mordedura=true; else var mordedura=false;
  if ($('#aranazo').is(':checked')) var aranazo=true; else var aranazo=false;
  if ($('#contacto').is(':checked')) var contacto=true; else var contacto=false;

  if ($('#superficial').is(':checked')) var superficial=true; else var superficial=false;
  if ($('#profunda').is(':checked')) var profunda=true; else var profunda=false;
  
  if ($('#antecedentes_vacunacion').is(':checked')) var antecedentes_vacunacion=true; else var antecedentes_vacunacion=false;
  if ($('#enfermedad_actual').is(':checked')) var enfermedad_actual=true; else var enfermedad_actual=false;

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
				
        strLocalizacion=$("#id_localizacion").val();
        if (strLocalizacion){
          strLocalizacion=strLocalizacion.toString();
        }else{
          strLocalizacion='';
        }  
				var parametros = {
          "id_ficha":($("#id_ficha").val()=='')?'0':$("#id_ficha").val(), 					
          "id_persona":($("#id_persona").val()=='')?'0':$("#id_persona").val(), 
          "id_acompanante":($("#id_acompanante").val()=='')?'0':$("#id_acompanante").val(),   
          "ficha_persona":$('#ficha_persona').val().toUpperCase(),
					"ficha_animal":$('#ficha_animal').val().toUpperCase(),          
					"historia_clinica": $('#historia_clinica').val().toUpperCase(),								
					"id_especie": $("#id_especie").val(),
          "id_raza": $('#id_raza').val(),
          "fecha_atencion": $('#fecha_encuesta').val(),
          "fecha_accidente": $('#fecha_accidente').val(),
          "ubigeo_accidente": $('#ubigeo_accidente').val(),
          "id_estado_actual_animal": $('#id_estado_actual_animal').val(),
          "tipo_exposicion": $('#tipo_exposicion').val(),
          "tipo_doc": $('#tipo_doc').val(),
          "numero_doc": $('#numero_doc').val(),
          "nombres":$('#nombres').val().toUpperCase(),
          "ape_paterno":$('#ape_paterno').val().toUpperCase(),
          "ape_materno":$('#ape_materno').val().toUpperCase(),
          "edad": $('#edad').val(),
          "sexo": $('#sexo').val(),
          "peso": $('#peso').val(),
          "direccion_persona":$('#direccion_persona').val().toUpperCase(),
          "ubigeo_persona": $("#ubigeo_persona").val(),
          "direccion_referencia":$('#direccion_referencia').val().toUpperCase(),
          "telefono":$('#telefono').val().toUpperCase(),
          "e_mail":$('#e_mail').val().toUpperCase(),
          "id_grado_instruccion": $('#id_grado_instruccion').val(),
          "tipo_doc_acompanante": $('#tipo_doc_acompanante').val(),
          "numero_doc_acompanante": $('#numero_doc_acompanante').val(),
          "nombres_acompanante":$('#nombres_acompanante').val().toUpperCase(),
          "ape_paterno_acompanante":$('#ape_paterno_acompanante').val().toUpperCase(),
          "ape_materno_acompanante":$('#ape_materno_acompanante').val().toUpperCase(),
          "mordedura": mordedura,
          "aranazo": aranazo,
          "contacto": contacto,
          "superficial": superficial,
          "profunda": profunda,
          "id_localizacion": strLocalizacion,
          "antecedentes_vacunacion": antecedentes_vacunacion,
          "enfermedad_actual": enfermedad_actual,
          "otra_localizacion": $('#otra_localizacion').val().toUpperCase(),
          "id_tipo_proteccion": $('#id_tipo_proteccion').val(),
          "id_numero_lesiones": $('#id_numero_lesiones').val(),
          "id_estado_herida":$('#id_estado_herida').val(),
          "id_atencion_herida":$('#id_atencion_herida').val(),
          "id_lugar_suceso":$('#id_lugar_suceso').val(),       
          "fecha_vacunacion": $("#fecha_vacunacion").val(),
          "nro_dosis": $("#nro_dosis").val(),
          "id_alergico": $("#id_alergico").val(),          
          "descripcion_enfermedad": $("#descripcion_enfermedad").val().toUpperCase(),
          "id_tipo_propietario": $("#id_tipo_propietario").val(),          
          "descripcion_otros": $("#descripcion_otros").val().toUpperCase(),
          "id_situacion": $("#id_situacion").val(),
          "id_local": $("#s_id_local").val(),
          "id_usuario": $("#s_id_usuario").val()     
         

					};


				$.ajax({
					url: "../ajax/ficha_atencion_rabia.php?op=save",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(msg)
					{
						//bootbox.alert(datos);
						//mostrarform(false);
						//$('#modalNew').modal('toggle')
            //console.log(msg);
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
        	$.post("../ajax/ficha_atencion_rabia.php?op=desactivar", {id_ficha : id}, function(e){
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
        	$.post("../ajax/ficha_atencion_rabia.php?op=activar", {id_ficha : id}, function(e){
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
