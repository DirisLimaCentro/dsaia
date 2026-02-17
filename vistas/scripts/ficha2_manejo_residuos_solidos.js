var tabla;
var bTab=false;
//Función que se ejecuta al inicio


function open_ficha(id)
{
  //alert(id_item);

  $.post("../ajax/ficha2_manejo_residuos_solidos.php?op=mostrar",{id : id}, function(data, status)
  {
    
    //console.log(data);
    //return false;
    data = JSON.parse(data);
    
    $("#id_ficha").val(id);
    $("#id_ipress").val(data[0].id_ipress);
    $("#fecha_encuesta").val(data[0].fecha);

	$("#codigo_ipress").val(data[0].codigo_unico);   
    $("#nombre_ipress").val(data[0].nombre_establecimiento);
    $("#tipo_ipress").val(data[0].id_tipo_ipress).trigger('change');
	$("#categoria_ipress").val(data[0].id_categoria_ipress).trigger('change');
    $('#ubigeo_ipress').append("<option value='"+data[0].id_ubicacion_ubigeo+"' selected='selected'>"+data[0].distrito_ipress+"</option>");
    $("#ubigeo_ipress").trigger('change');
	$("#direccion_ipress").val(data[0].direccion_ipress);
    $("#telefono_ipress").val(data[0].telefono_ipress);
    $("#celular_empresa").val(data[0].celular_empresa);
	
    $("#nombre_responsable_ipress").val(data[0].nombre_responsable_ipress);
	$("#nombre_responsable_eess").val(data[0].nombre_responsable_eess);
	  $("#nombre_evaluador").val(data[0].nombre_evaluador);
	  $("#nombre_comercial").val(data[0].nombre_comercial);
	  $("#observacion").val(data[0].observacion);

	  $("#valoracion1").val(data[0].valoracion1);
	  $("#valoracion2").val(data[0].valoracion2);
	  $("#valoracion3").val(data[0].valoracion3);

	  $("#valoracion4").val(data[0].valoracion4);
	  $("#valoracion5").val(data[0].valoracion5);
	  $("#valoracion6").val(data[0].valoracion6);
	  $("#m_5").val(data[0].m_5);
	  $("#m_6").val(data[0].m_6);
	  $("#m_7").val(data[0].m_7);
	  $("#m_8").val(data[0].m_8);

	  $("#m_2_5").val(data[0].m_2_5);
	  $("#m_2_6").val(data[0].m_2_6);
	  $("#m_2_7").val(data[0].m_2_7);
	  $("#m_2_8").val(data[0].m_2_8);

	  $("#m_3_1").val(data[0].m_3_1);
	  $("#m_5_1").val(data[0].m_5_1);
	  $("#m_5_2").val(data[0].m_5_2);
	  $("#m_5_3").val(data[0].m_5_3);
	  $("#servicio_a").val(data[0].servicio_a);
	  $("#servicio_b").val(data[0].servicio_b);
	  $("#servicio_c").val(data[0].servicio_c);
	  $("#servicio_d").val(data[0].servicio_d);


	  /**
	   $("#servicio_a").val(data[0].servicio_a);$("#servicio_a").append("<option value='"+data[0].servicio_a2+"' selected='selected'>"+data[0].servicio_a+"</option>");
	  $("#servicio_a").trigger('change');




	   **/




	  if (data[0].i_1=='1') $('#i_1').bootstrapToggle('on'); else  $('#i_1').bootstrapToggle('off');
    if (data[0].i_2=='1') $('#i_2').bootstrapToggle('on'); else  $('#i_2').bootstrapToggle('off');
    if (data[0].i_3=='1') $('#i_3').bootstrapToggle('on'); else  $('#i_3').bootstrapToggle('off');
    if (data[0].i_4=='1') $('#i_4').bootstrapToggle('on'); else  $('#i_4').bootstrapToggle('off');
    if (data[0].i_5=='1') $('#i_5').bootstrapToggle('on'); else  $('#i_5').bootstrapToggle('off');

    if (data[0].i_6=='1') $('#i_6').bootstrapToggle('on'); else  $('#i_6').bootstrapToggle('off');
    if (data[0].i_7=='1') $('#i_7').bootstrapToggle('on'); else  $('#i_7').bootstrapToggle('off');
	if (data[0].i_8=='1') $('#i_8').bootstrapToggle('on'); else  $('#i_8').bootstrapToggle('off');
	if (data[0].i_9=='1') $('#i_9').bootstrapToggle('on'); else  $('#i_9').bootstrapToggle('off');

	if (data[0].i_10=='1') $('#i_10').bootstrapToggle('on'); else  $('#i_10').bootstrapToggle('off');
	if (data[0].i_11=='1') $('#i_11').bootstrapToggle('on'); else  $('#i_11').bootstrapToggle('off');
	  if (data[0].i_12=='1') $('#i_12').bootstrapToggle('on'); else  $('#i_12').bootstrapToggle('off');

	  /*
	  if (data[0].i_13=='1') $('#i_13').bootstrapToggle('on'); else  $('#i_13').bootstrapToggle('off');
     if (data[0].i_14=='1') $('#i_14').bootstrapToggle('on'); else  $('#i_14').bootstrapToggle('off');
	  if (data[0].i_15=='1') $('#i_15').bootstrapToggle('on'); else  $('#i_15').bootstrapToggle('off');
	  if (data[0].i_16=='1') $('#i_16').bootstrapToggle('on'); else  $('#i_16').bootstrapToggle('off');

	  */

	  if (data[0].i_17=='1') $('#i_17').bootstrapToggle('on'); else  $('#i_17').bootstrapToggle('off');
	  if (data[0].i_18=='1') $('#i_18').bootstrapToggle('on'); else  $('#i_18').bootstrapToggle('off');
	  if (data[0].i_19=='1') $('#i_19').bootstrapToggle('on'); else  $('#i_19').bootstrapToggle('off');


	  if (data[0].i_20=='1') $('#i_20').bootstrapToggle('on'); else  $('#i_20').bootstrapToggle('off');
	  if (data[0].i_21=='1') $('#i_21').bootstrapToggle('on'); else  $('#i_21').bootstrapToggle('off');
	  if (data[0].i_22=='1') $('#i_22').bootstrapToggle('on'); else  $('#i_22').bootstrapToggle('off');
	  if (data[0].i_23=='1') $('#i_23').bootstrapToggle('on'); else  $('#i_23').bootstrapToggle('off');
	  if (data[0].i_24=='1') $('#i_24').bootstrapToggle('on'); else  $('#i_24').bootstrapToggle('off');


	  if (data[0].ii_1=='1') $('#ii_1').bootstrapToggle('on'); else  $('#ii_1').bootstrapToggle('off');

	  if (data[0].ii_2=='1') $('#ii_2').bootstrapToggle('on'); else  $('#ii_2').bootstrapToggle('off');
	  if (data[0].ii_3=='1') $('#ii_3').bootstrapToggle('on'); else  $('#ii_3').bootstrapToggle('off');
	  if (data[0].ii_4=='1') $('#ii_4').bootstrapToggle('on'); else  $('#ii_4').bootstrapToggle('off');

	/*
	  if (data[0].ii_5=='1') $('#ii_5').bootstrapToggle('on'); else  $('#ii_5').bootstrapToggle('off');
	  if (data[0].ii_6=='1') $('#ii_6').bootstrapToggle('on'); else  $('#ii_6').bootstrapToggle('off');
	  if (data[0].ii_7=='1') $('#ii_7').bootstrapToggle('on'); else  $('#ii_7').bootstrapToggle('off');
	  if (data[0].ii_8=='1') $('#ii_8').bootstrapToggle('on'); else  $('#ii_8').bootstrapToggle('off');

	  */


	  if (data[0].ii_9=='1') $('#ii_9').bootstrapToggle('on'); else  $('#ii_9').bootstrapToggle('off');
	  if (data[0].ii_10=='1') $('#ii_10').bootstrapToggle('on'); else  $('#ii_10').bootstrapToggle('off');
	  if (data[0].ii_11=='1') $('#ii_11').bootstrapToggle('on'); else  $('#ii_11').bootstrapToggle('off');
	  if (data[0].ii_12=='1') $('#ii_12').bootstrapToggle('on'); else  $('#ii_12').bootstrapToggle('off');




	//if (data[0].iii_1=='1') $('#iii_1').bootstrapToggle('on'); else  $('#iii_1').bootstrapToggle('off');
	//if (data[0].iii_2=='1') $('#iii_2').bootstrapToggle('on'); else  $('#iii_2').bootstrapToggle('off');

	//if (data[0].iii_3=='1') $('#iii_3').bootstrapToggle('on'); else  $('#iii_3').bootstrapToggle('off');
	//if (data[0].iii_4=='1') $('#iii_4').bootstrapToggle('on'); else  $('#iii_4').bootstrapToggle('off');


	//if (data[0].iii_5=='1') $('#iii_5').bootstrapToggle('on'); else  $('#iii_5').bootstrapToggle('off');





	  if (data[0].iiii_1=='1') $('#iiii_1').bootstrapToggle('on'); else  $('#iiii_1').bootstrapToggle('off');

	  if (data[0].iiii_2=='1') $('#iiii_2').bootstrapToggle('on'); else  $('#iiii_2').bootstrapToggle('off');
	  if (data[0].iiii_3=='1') $('#iiii_3').bootstrapToggle('on'); else  $('#iiii_3').bootstrapToggle('off');
	  if (data[0].iiii_4=='1') $('#iiii_4').bootstrapToggle('on'); else  $('#iiii_4').bootstrapToggle('off');
	  if (data[0].iiii_5=='1') $('#iiii_5').bootstrapToggle('on'); else  $('#iiii_5').bootstrapToggle('off');


	  if (data[0].iiii_6=='1') $('#iiii_6').bootstrapToggle('on'); else  $('#iiii_6').bootstrapToggle('off');
	  if (data[0].iiii_7=='1') $('#iiii_7').bootstrapToggle('on'); else  $('#iiii_7').bootstrapToggle('off');
	  if (data[0].iiii_8=='1') $('#iiii_8').bootstrapToggle('on'); else  $('#iiii_8').bootstrapToggle('off');

	  if (data[0].iiii_9=='1') $('#iiii_9').bootstrapToggle('on'); else  $('#iiii_9').bootstrapToggle('off');



/*
	  if (data[0].iiiii_1=='1') $('#iiiii_1').bootstrapToggle('on'); else  $('#iiiii_1').bootstrapToggle('off');

	  if (data[0].iiiii_2=='1') $('#iiiii_2').bootstrapToggle('on'); else  $('#iiiii_2').bootstrapToggle('off');
	  if (data[0].iiiii_3=='1') $('#iiiii_3').bootstrapToggle('on'); else  $('#iiiii_3').bootstrapToggle('off');
*/


	  if (data[0].iiiiii_1=='1') $('#iiiiii_1').bootstrapToggle('on'); else  $('#iiiiii_1').bootstrapToggle('off');

	  if (data[0].iiiiii_2=='1') $('#iiiiii_2').bootstrapToggle('on'); else  $('#iiiiii_2').bootstrapToggle('off');
	  if (data[0].iiiiii_3=='1') $('#iiiiii_3').bootstrapToggle('on'); else  $('#iiiiii_3').bootstrapToggle('off');

	  if (data[0].iiiiii_4=='1') $('#iiiiii_4').bootstrapToggle('on'); else  $('#iiiiii_4').bootstrapToggle('off');






    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
  })
}

function buscar_ipress(){
	$("#loaderModal").show();
	$.ajax({
		url: "../ajax/ipress.php",
		dataType: "json",
		method: "get",
		async : false,
		data: {
			op: "buscar_id",
			codigo: $("#codigo_ipress").val(),
		},
		beforeSend: function () {
        
    	},
    	success: function (result) {

    			$("#loaderModal").hide();
    			if (result.msj=='') {
    				$("#nombre_ipress").val(result.nombre_establecimiento);
 					$("#tipo_ipress").val(result.id_tipo_ipress).trigger('change');
 					$("#categoria_ipress").val(result.id_categoria_ipress).trigger('change');
					$('#ubigeo_ipress').append("<option value='"+result.id_ubicacion_ubigeo+"' selected='selected'>"+result.distrito+"</option>");
 					$("#ubigeo_ipress").trigger('change');
    				$("#direccion_ipress").val(result.direccion);
					$("#telefono_ipress").val(result.telefono);
    				
    				$("#id_ipress").val(result.id);

 					$("#btnfindIpress").prop("disabled",true);
 					$("#codigo_ipress").prop("disabled",true);
                
                }else{
                	//buscar_sunat()	
					$("#loaderModal").hide();
					alert("No se encontró la IPRESS");
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

function init(){
	listar();
}

function limpiar(){
	$("#modalTitle").html('Nuevo registro');
	$("#id_ficha").val("");
	$("#id_ipress").val("");

	$("#codigo_ipress").val("");
	$("#nombre_ipress").val("");  
	$('#tipo_ipress').val('').trigger('change.select2');
	$('#categoria_ipress').val('').trigger('change.select2');
	$('#ubigeo_ipress').val('').trigger('change.select2');
	$("#direccion_ipress").val("");
	$("#telefono_ipress").val("");
	$("#nombre_responsable_ipress").val("");
	$("#nombre_responsable_eess").val("");
	$("#nombre_evaluador").val("");
	$("#nombre_comercial").val("");
	$("#observacion").val("");


	$("#valoracion1").val("");

	$("#valoracion2").val("");

	$("#valoracion3").val("");

	$("#valoracion4").val("");

	$("#valoracion5").val("");

	$("#valoracion6").val("");

	/*$('#servicio_a').val('').trigger('change.select2');
*/



	$('#i_1').bootstrapToggle('off');
	$('#i_2').bootstrapToggle('off');
	$('#i_3').bootstrapToggle('off');
	$('#i_4').bootstrapToggle('off');
	$('#i_5').bootstrapToggle('off');
	$('#i_6').bootstrapToggle('off');
	$('#i_7').bootstrapToggle('off');
	$('#i_8').bootstrapToggle('off');
	$('#i_9').bootstrapToggle('off');
	$('#i_10').bootstrapToggle('off');
	$('#i_11').bootstrapToggle('off');
	$('#i_12').bootstrapToggle('off');

/*	$('#i_13').bootstrapToggle('off');
    $('#i_14').bootstrapToggle('off');
	$('#i_15').bootstrapToggle('off');
	$('#i_16').bootstrapToggle('off');*/



	$('#i_17').bootstrapToggle('off');
	$('#i_18').bootstrapToggle('off');
	$('#i_19').bootstrapToggle('off');

	$('#i_20').bootstrapToggle('off');
	$('#i_21').bootstrapToggle('off');
	$('#i_22').bootstrapToggle('off');
	$('#i_23').bootstrapToggle('off');
	$('#i_24').bootstrapToggle('off');




	$('#ii_1').bootstrapToggle('off');






	$('#ii_2').bootstrapToggle('off');
	$('#ii_3').bootstrapToggle('off');
	$('#ii_4').bootstrapToggle('off');

/*	$('#ii_5').bootstrapToggle('off');
	$('#ii_6').bootstrapToggle('off');
	$('#ii_7').bootstrapToggle('off');
	$('#ii_8').bootstrapToggle('off');
	*/

	$('#ii_9').bootstrapToggle('off');
	$('#ii_10').bootstrapToggle('off');
	$('#ii_11').bootstrapToggle('off');
	$('#ii_12').bootstrapToggle('off');






	//$('#iii_1').bootstrapToggle('off');
	//$('#iii_2').bootstrapToggle('off');
	//$('#iii_3').bootstrapToggle('off');
//	$('#iii_4').bootstrapToggle('off');
	//$('#iii_5').bootstrapToggle('off');


	$('#iiii_1').bootstrapToggle('off');
	$('#iiii_2').bootstrapToggle('off');
	$('#iiii_3').bootstrapToggle('off');
	$('#iiii_4').bootstrapToggle('off');
	$('#iiii_5').bootstrapToggle('off');
	$('#iiii_6').bootstrapToggle('off');
	$('#iiii_7').bootstrapToggle('off');
	$('#iiii_8').bootstrapToggle('off');
	$('#iiii_9').bootstrapToggle('off');


/*
	$('#iiiii_1').bootstrapToggle('off');
	$('#iiiii_2').bootstrapToggle('off');
	$('#iiiii_3').bootstrapToggle('off');*/


	$('#iiiiii_1').bootstrapToggle('off');
	$('#iiiiii_2').bootstrapToggle('off');
	$('#iiiiii_3').bootstrapToggle('off');
	$('#iiiiii_4').bootstrapToggle('off');


	$("#total_puntaje").val("0");

	$("#total_puntaje2").val("0");
	$("#total_puntaje3").val("0");
	$("#total_puntaje4").val("0");
	$("#total_puntaje5").val("0");
	$("#total_puntaje6").val("0");


	$("#p_1").val("0");

	$("#p_2").val("0");
	$("#p_3").val("0");
	$("#p_4").val("0");
	$("#p_5").val("0");
	$("#p_6").val("0");


	$("#p_7").val("0");

	$("#p_8").val("0");
	$("#p_9").val("0");


	$("#p_10").val("");   $("#p_11").val("");    $("#p_12").val("");   $("#p_13").val("");  $("#p_14").val("");


	$("#p_15").val("");   $("#p_16").val("");    $("#p_17").val("");   $("#p_18").val("");  $("#p_19").val("");

	$("#p_20").val("");   $("#p_21").val("");    $("#p_22").val("");   $("#p_23").val("");


	$("#p_24").val("");    $("#p_25").val("");   $("#p_26").val("");  $("#p_27").val("");

	$("#p_28").val("");   $("#p_29").val("");    $("#p_30").val("");   $("#m_5").val("0");

	$("#m_6").val("0"); $("#m_7").val("0"); $("#m_8").val("0");

	$("#m_2_5").val("0");  $("#m_2_6").val("0"); $("#m_2_7").val("0"); $("#m_2_8").val("0");

	$("#m_3_1").val("0");  $("#m_5_1").val("0"); $("#m_5_2").val("0"); $("#m_5_3").val("0");

	$("#servicio_a").val(""); $("#servicio_b").val(""); $("#servicio_c").val(""); $("#servicio_d").val("");



/*
	$("#servicio_a").append("<option value='"+data.servicio_a+"' selected='selected'>"+data.servicio_a+"</option>");
	$("#servicio_a").trigger('change');
$("#servicio_a").val("");
*/




	$("#btnfindIpress").prop("disabled",false);
 	$("#codigo_ipress").prop("disabled",false);

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
      	"sAjaxSource": "../ajax/ficha2_manejo_residuos_solidos.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data
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
			if( data[1] ==  '0'){
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
			{ aTargets: 'f.fecha' },
			{ aTargets: 'i.nombre_establecimiento' },
			{ aTargets: 'i.codigo_unico' },
			{ aTargets: 'nombre_responsable_ipress' },
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
}

//Función para guardar o editar
function guardaryeditar()
{
	msj="";
	if ($("#codigo_ipress").val()==''){
		var msj="Ingrese Codigo Unico de la IPRESS";
	}else if ($("#nombre_ipress").val()==''){
		var msj="Ingrese nombre de la IPRESS";
	}else if ($("#tipo_ipress").val()==''){
		var msj="Seleccione tipo de IPRESS";
	}else if ($("#categoria_ipress").val()==''){
		var msj="Ingrese categoria de IPRESS";
	}else if ($("#ubigeo_ipress").val()==''){
		var msj="Seleccione distrito dirección de IPRESS";
	}else if ($("#direccion_ipress").val()==''){
		var msj="Ingrese dirección de IPRESS";
	}
	if (msj){
		return bootbox.alert(msj);
	}

  if ($('#i_1').is(':checked')) var i_1=1; else var i_1=0;
  if ($('#i_2').is(':checked')) var i_2=1; else var i_2=0;
  if ($('#i_3').is(':checked')) var i_3=1; else var i_3=0;
  if ($('#i_4').is(':checked')) var i_4=1; else var i_4=0;
  if ($('#i_5').is(':checked')) var i_5=1; else var i_5=0;
  if ($('#i_6').is(':checked')) var i_6=1; else var i_6=0;
  if ($('#i_7').is(':checked')) var i_7=1; else var i_7=0;
  if ($('#i_8').is(':checked')) var i_8=1; else var i_8=0;
  if ($('#i_9').is(':checked')) var i_9=1; else var i_9=0;
  if ($('#i_10').is(':checked')) var i_10=1; else var i_10=0;
  if ($('#i_11').is(':checked')) var i_11=1; else var i_11=0;

	if ($('#i_12').is(':checked')) var i_12=1; else var i_12=0;

	/*
	if ($('#i_13').is(':checked')) var i_13=1; else var i_13=0;
   if ($('#i_14').is(':checked')) var i_14=1; else var i_14=0;
	if ($('#i_15').is(':checked')) var i_15=1; else var i_15=0;
	if ($('#i_16').is(':checked')) var i_16=1; else var i_16=0;

	*/

	if ($('#i_17').is(':checked')) var i_17=1; else var i_17=0;
	if ($('#i_18').is(':checked')) var i_18=1; else var i_18=0;
	if ($('#i_19').is(':checked')) var i_19=1; else var i_19=0;


	if ($('#i_20').is(':checked')) var i_20=1; else var i_20=0;
	if ($('#i_21').is(':checked')) var i_21=1; else var i_21=0;
	if ($('#i_22').is(':checked')) var i_22=1; else var i_22=0;
	if ($('#i_23').is(':checked')) var i_23=1; else var i_23=0;
	if ($('#i_24').is(':checked')) var i_24=1; else var i_24=0;




  if ($('#ii_1').is(':checked')) var ii_1=1; else var ii_1=0;


	if ($('#ii_2').is(':checked')) var ii_2=1; else var ii_2=0;
	if ($('#ii_3').is(':checked')) var ii_3=1; else var ii_3=0;
	if ($('#ii_4').is(':checked')) var ii_4=1; else var ii_4=0;

	/*
	if ($('#ii_5').is(':checked')) var ii_5=1; else var ii_5=0;
	if ($('#ii_6').is(':checked')) var ii_6=1; else var ii_6=0;
     if ($('#ii_7').is(':checked')) var ii_7=1; else var ii_7=0;
	if ($('#ii_8').is(':checked')) var ii_8=1; else var ii_8=0;
	*/


	if ($('#ii_9').is(':checked')) var ii_9=1; else var ii_9=0;


	if ($('#ii_10').is(':checked')) var ii_10=1; else var ii_10=0;
	if ($('#ii_11').is(':checked')) var ii_11=1; else var ii_11=0;
	if ($('#ii_12').is(':checked')) var ii_12=1; else var ii_12=0;




	//if ($('#iii_1').is(':checked')) var iii_1=1; else var iii_1=0;

 // if ($('#iii_2').is(':checked')) var iii_2=1; else var iii_2=0;
  //if ($('#iii_3').is(':checked')) var iii_3=1; else var iii_3=0;
  //if ($('#iii_4').is(':checked')) var iii_4=1; else var iii_4=0;
  //if ($('#iii_5').is(':checked')) var iii_5=1; else var iii_5=0;





	if ($('#iiii_1').is(':checked')) var iiii_1=1; else var iiii_1=0;
	if ($('#iiii_2').is(':checked')) var iiii_2=1; else var iiii_2=0;
	if ($('#iiii_3').is(':checked')) var iiii_3=1; else var iiii_3=0;
	if ($('#iiii_4').is(':checked')) var iiii_4=1; else var iiii_4=0;
	if ($('#iiii_5').is(':checked')) var iiii_5=1; else var iiii_5=0;


	if ($('#iiii_6').is(':checked')) var iiii_6=1; else var iiii_6=0;
	if ($('#iiii_7').is(':checked')) var iiii_7=1; else var iiii_7=0;
	if ($('#iiii_8').is(':checked')) var iiii_8=1; else var iiii_8=0;
	if ($('#iiii_9').is(':checked')) var iiii_9=1; else var iiii_9=0;


/*
	if ($('#iiiii_1').is(':checked')) var iiiii_1=1; else var iiiii_1=0;
	if ($('#iiiii_2').is(':checked')) var iiiii_2=1; else var iiiii_2=0;
	if ($('#iiiii_3').is(':checked')) var iiiii_3=1; else var iiiii_3=0;*/

	if ($('#iiiiii_1').is(':checked')) var iiiiii_1=1; else var iiiiii_1=0;
	if ($('#iiiiii_2').is(':checked')) var iiiiii_2=1; else var iiiiii_2=0;
	if ($('#iiiiii_3').is(':checked')) var iiiiii_3=1; else var iiiiii_3=0;
	if ($('#iiiiii_4').is(':checked')) var iiiiii_4=1; else var iiiiii_4=0;





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
		var parametros = {
			"id_ficha":($("#id_ficha").val()=='')?'0':$("#id_ficha").val(), 
			"id_ipress":($("#id_ipress").val()=='')?'0':$("#id_ipress").val(), 
			"fecha":$('#fecha_encuesta').val(),
			"codigo_ipress":$('#codigo_ipress').val(),
			"nombre_ipress":$('#nombre_ipress').val().toUpperCase(),          
			"tipo_ipress": $("#tipo_ipress").val(),
			"categoria_ipress": $("#categoria_ipress").val(),
			"ubigeo_ipress": $("#ubigeo_ipress").val(),
			"direccion_ipress": $('#direccion_ipress').val().toUpperCase(),
			"telefono_ipress": $('#telefono_ipress').val(),
			"nombre_responsable_ipress": $('#nombre_responsable_ipress').val().toUpperCase(),
			"nombre_responsable_eess": $('#nombre_responsable_eess').val().toUpperCase(),
			"nombre_evaluador": $('#nombre_evaluador').val().toUpperCase(),
			"nombre_comercial": $('#nombre_comercial').val().toUpperCase(),
			"observacion": $('#observacion').val().toUpperCase(),

			"valoracion1": $('#valoracion1').val().toUpperCase(),

			"valoracion2": $('#valoracion2').val().toUpperCase(),

			"valoracion3": $('#valoracion3').val().toUpperCase(),

			"valoracion4": $('#valoracion4').val().toUpperCase(),

			"valoracion5": $('#valoracion5').val().toUpperCase(),

			"valoracion6": $('#valoracion6').val().toUpperCase(),



			"i_1": i_1,
			"i_2": i_2,
			"i_3": i_3,
			"i_4": i_4,
			"i_5": i_5,
			"i_6": i_6,
			"i_7": i_7,
			"i_8": i_8,
			"i_9": i_9,
			"i_10": i_10,
			"i_11": i_11,
			"i_12": i_12,

			/*
			"i_13": i_13,
             "i_14": i_14,
			"i_15": i_15,
			"i_16": i_16,*/


			"i_17": i_17,
			"i_18": i_18,
			"i_19": i_19,


			"i_20": i_20,
			"i_21": i_21,
			"i_22": i_22,
			"i_23": i_23,
			"i_24": i_24,




			"ii_1": ii_1,
			"ii_2": ii_2,
			"ii_3": ii_3,
			"ii_4": ii_4,

			/*
			"ii_5": ii_5,
			"ii_6": ii_6,
			"ii_7": ii_7,
            "ii_8": ii_8,
			*/


			"ii_9": ii_9,
			"ii_10": ii_10,

			"ii_11": ii_11,
			"ii_12": ii_12,


			//"iii_1": iii_1,
			"iii_2":  $("#iii_2").val(),
			"iii_3": $("#iii_3").val(),
			"iii_4": $("#iii_4").val(),
			"iii_5": $("#iii_5").val(),


			"iiii_1": iiii_1,
			"iiii_2": iiii_2,
			"iiii_3": iiii_3,
			"iiii_4": iiii_4,
			"iiii_5": iiii_5,

			"iiii_6": iiii_6,
			"iiii_7": iiii_7,
			"iiii_8": iiii_8,
			"iiii_9": iiii_9,


			/*"iiiii_1": iiiii_1,
			"iiiii_2": iiiii_2,
			"iiiii_3": iiiii_3,
*/


			"iiiiii_1": iiiiii_1,
			"iiiiii_2": iiiiii_2,
			"iiiiii_3": iiiiii_3,

			"iiiiii_4": iiiiii_4,

			"total_puntaje": $("#total_puntaje").val(),

			"total_puntaje2": $("#total_puntaje2").val(),
			"total_puntaje3": $("#total_puntaje3").val(),
			"total_puntaje4": $("#total_puntaje4").val(),
			"total_puntaje5": $("#total_puntaje5").val(),
			"total_puntaje6": $("#total_puntaje6").val(),


			"p_1": $("#p_1").val(),
			"p_2": $("#p_2").val(),
			"p_3": $("#p_3").val(),
			"p_4": $("#p_4").val(),
			"p_5": $("#p_5").val(),
			"p_6": $("#p_6").val(),



			"p_7": $("#p_7").val(),
			"p_8": $("#p_8").val(),
			"p_9": $("#p_9").val(),
			"p_10": $("#p_10").val(),
			"p_11": $("#p_11").val(),

			"p_12": $("#p_12").val(),
			"p_13": $("#p_13").val(),
			"p_14": $("#p_14").val(),



			"p_15": $("#p_15").val(),
			"p_16": $("#p_16").val(),
			"p_17": $("#p_17").val(),

			"p_18": $("#p_18").val(),
			"p_19": $("#p_19").val(),
			"p_20": $("#p_20").val(),

			"p_21": $("#p_21").val(),
			"p_22": $("#p_22").val(),

			"p_23": $("#p_23").val(),


			"p_24": $("#p_24").val(),
			"p_25": $("#p_25").val(),
			"p_26": $("#p_26").val(),
			"p_27": $("#p_27").val(),

			"p_28": $("#p_28").val(),
			"p_29": $("#p_29").val(),
			"p_30": $("#p_30").val(),

			"m_5": $("#m_5").val(),
			"m_6": $("#m_6").val(),
			"m_7": $("#m_7").val(),
			"m_8": $("#m_8").val(),


			"m_2_5": $("#m_2_5").val(),
			"m_2_6": $("#m_2_6").val(),
			"m_2_7": $("#m_2_7").val(),
			"m_2_8": $("#m_2_8").val(),

			"m_3_1": $("#m_3_1").val(),
			"m_5_1": $("#m_5_1").val(),
			"m_5_2": $("#m_5_2").val(),
			"m_5_3": $("#m_5_3").val(),

			"servicio_a": $("#servicio_a").val(),
			"servicio_b": $("#servicio_b").val(),
			"servicio_c": $("#servicio_c").val(),
			"servicio_d": $("#servicio_d").val(),


			"id_usuario": $("#s_id_usuario").val(),
			"id_local": $("#s_id_local").val()

					};

				$.ajax({ 
					url: "../ajax/ficha2_manejo_residuos_solidos.php?op=save",
					type: "POST",
					data: parametros,
					//contentType: false,
					//processData: false,

					success: function(msg)
					{
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

//Función para desactivar registros
function desactivar(id_ficha)
{
	bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/ficha2_manejo_residuos_solidos.php?op=desactivar", {id_ficha : id_ficha}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(id_ficha)
{
	bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/ficha2_manejo_residuos_solidos.php?op=activar", {id_ficha : id_ficha}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})
}

init();
