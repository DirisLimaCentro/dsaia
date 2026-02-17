var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
}

function getLocalidades(def){

	var parametros = {
        "op": "listLocalidades",
        "sector": $('#sector').val(),
        "id_local":$("#hid_local").val(),
        "id_default":def,
        "q":"%%"
    };    
    $.ajax({
        data: parametros,
        url: '../ajax/tabla.php',
        type: 'get',
        beforeSend: function () {            
        },
        success: function (response) {
            $("#id_localidad").html(response);
            $("#id_localidad").select2();
        }
    });	

}

function save_item(){

	  msg='';
      if ($("#codigo").val()==''){
          bootbox.alert("Ingrese el codigo de la ovitrampa");
          return false;  
      }
      if ($("#sector").val()==''){
         bootbox.alert("Seleccione sector");
          return false;  
      }

      if ($("#id_localidad").val()==''){
         bootbox.alert("Seleccione localidad");
          return false;  
      }

      if ($("#direccion").val()==''){
         bootbox.alert("Ingrese direccion");
          return false;  
      }

       if ($("#coordenada_este").val()==''){
         bootbox.alert("Ingrese coordinada este");
          return false;  
      }

       if ($("#coordenada_norte").val()==''){
         bootbox.alert("Ingrese coordinada norte");
          return false;  
      }

      if ($("#altitud").val()==''){
         bootbox.alert("Ingrese altitud o valor 0");
          return false;  
      }

      if ($("#huevo_campo").val()==''){
         bootbox.alert("Ingrese Cantidad de huevos o valor 0");
          return false;  
      }

      if ($("#larva_campo").val()==''){
         bootbox.alert("Ingrese Cantidad de larvas o valor 0");
          return false;  
      }

      if ($("#fecha_colocacion").val()==''){
         bootbox.alert("Ingrese la fecha de colocacion de la ovitrampa");
          return false;  
      }


     
      if (msg){
        return  bootbox.alert(msg);
      }

      var aItems= [];
 


    bootbox.confirm({
        title: "Mensaje",
        message: "Esta seguro de guardar el registro?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Cancelar'
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Aceptar',
            className: "btn-success"
          }
        },
        callback: function (result) {
          
          //console.log('This was logged in the callback: ' + result);
          if (result){
              $("#loaderModal").show();
              //$op=($("#id_ficha").val()=='')?'saveFicha':'updateFicha';
              $op='saveFichaDetalle';
              id_ficha_detalle=($("#id_ficha_detalle").val()=='')?'0':$("#id_ficha_detalle").val();
              $.ajax({
                type: "POST",
                url: "../ajax/ficha_ovitrampa.php?op="+$op,
                //dataType: "json",
                //data: JSON.stringify({ paramName: info }),
                data : {
                  id_ficha: $("#id_ficha").val(),
                  id_ficha_detalle: id_ficha_detalle,
                  codigo: $("#codigo").val().toUpperCase(),
                  id_sector: $("#sector").val(),
                  id_localidad: $("#id_localidad").val(),
                  direccion: $("#direccion").val().toUpperCase(),
                  descripcion: $("#punto_critico").val().toUpperCase(),
                  coordenada_este:  $("#coordenada_este").val(),
                  coordenada_norte:  $("#coordenada_norte").val(),
                  altitud:  $("#altitud").val(),
                  fecha_colocacion:  $("#fecha_colocacion").val(),
                  fecha_recojo:  $("#fecha_recojo").val(),
                  huevo_campo:  $("#huevo_campo").val(),
                  larva_campo:  $("#larva_campo").val(),
                  huevo_laboratorio:  $("#huevo_laboratorio").val(),
                  larva_laboratorio:  $("#larva_laboratorio").val(),
                  fecha_lectura:  $("#fecha_lectura").val(),                  
                  determinacion_especie:  $("#determinacion_especie").val(),
                  observaciones:  $("#observaciones").val()
                },
                success: function(msg){
                  $("#loaderModal").hide();
                  //table.ajax.reload();
                  update_child($("#id_ficha").val());
                  var amsg=msg.split('|');
                  var nerror=amsg[0];
                  if (nerror=='0'){
                    bootbox.alert('Ocurrio un error: '+amsg[1]);
                  }else{
                    $('#modalItem').modal('toggle');
                    bootbox.alert('Registro guardado');
                  }

                }
              });

        }
      }

    });





}

function open_new_item(id,id_local){

	$("#id_ficha").val(id);
	$("#id_ficha_detalle").val("");

	$("#hid_local").val(id_local);

	$("#codigo").val("");

	$("#sector").val("");


	//$('#id_localidad').append("<option value='' selected='selected'></option>");
	getLocalidades('');

	$("#direccion").val("");
	$("#punto_critico").val("");

	$("#coordenada_este").val("");
	$("#coordenada_norte").val("");
	$("#altitud").val("0");

	$("#fecha_colocacion").val("");
	$("#fecha_recojo").val("");
	$("#huevo_campo").val("0");
	$("#larva_campo").val("0");

	$("#huevo_laboratorio").val("0");
	$("#larva_laboratorio").val("0");

	$("#fecha_lectura").val("");

	$("#determinacion_especie").val("");
	$("#observaciones").val("");


	/*$("#id_ficha_detalle").val('');
	$("#direccion_familia").val("");
	$("#nro_habitantes").val('0');
	$("#id_condicion_vivienda").val('');

	$("#cnt_larvicidas").val('0');
	$("#cnt_febriles").val('0');

	for (i=1;i<=9;i++){   
		$("#cnt_tipo_"+i.toString()+"_i").val('0');
		$("#cnt_tipo_"+i.toString()+"_p").val('0');
		$("#cnt_tipo_"+i.toString()+"_t").val('0');
		$("#cnt_tipo_"+i.toString()+"_v").val('0');
	}

	sum_valores();*/


	$('#modalItem').modal('show');
}

function createDataTable(id,id_local){
	tbl="dt"+id;
				  dt=$('#'+tbl).DataTable({
	              dom: "Blftip",

	              "buttons": [
	              {
	              	text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
	              	className: "btn btn-success btn-sm",
	              	action: function ( e, dt, node, config ) {
	              		open_new_item(id,id_local);
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
	               "language": {
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
				    { "orderable": true, "targets": 0, "searchable": false },
				    { "orderable": false, "targets": 1, "searchable": true },
				    { "orderable": true, "targets": 2, "searchable": true /*, className: "wrapok"*/},
				    { "orderable": false, "targets": 3, "searchable": true },
				    { "orderable": false, "targets": 4, "searchable": true },
				    { "orderable": false, "targets": 5, "searchable": true },
				    { "orderable": false, "targets": 6, "searchable": false },
				    { "orderable": false, "targets": 7, "searchable": false },
				    { "orderable": false, "targets": 8, "searchable": false },

				    { "orderable": false, "targets": 9, "searchable": false },
				    { "orderable": false, "targets": 10, "searchable": false },

				    { "orderable": false, "targets": 11, "searchable": false },
				    { "orderable": false, "targets": 12, "searchable": false },
				    { "orderable": false, "targets": 13, "searchable": false },
				    { "orderable": false, "targets": 14, "searchable": false },
				    { "orderable": false, "targets": 15, "searchable": false },
				    { "orderable": false, "targets": 16, "searchable": false },
				    { "orderable": false, "targets": 17, "searchable": false },
				   
			


				    
				  ],  


	              "pagingType": 'numbers',
	              "bAutoWidth": false ,
	              "iDisplayLength": 10
	            });
}

function downResumen(){
	document.getElementById('aDwn').setAttribute('href',"../reportes/xlsOvitrampasDetalle.php?desde="+$('#fecha_reporte_desde').val()+"&hasta="+$('#fecha_reporte_hasta').val());
    document.getElementById('aDwn').click();  
}

function open_ficha(id){
	$.post("../ajax/ficha_ovitrampa.php?op=mostrar",{id_ficha : id}, function(data, status)
	{
		items_arr = [];
    	id_items = 1;
    	editItem=false;
		data = JSON.parse(data);
		$("#hid_local").val(data.id_local);
		$("#establecimiento").val(data.establecimiento);
		$("#id_ficha").val(data.id);
		$("#distrito").val(data.distrito);

		$("#fecha_inicio").val(data.fecha_entrega);
		
		//$('#id_localidad').append("<option value='"+data.id_localidad+"' selected='selected'>"+data.localidad+"</option>");

		$("#id_semana_epi").val(data.id_semana_epi);	

		//$('#id_localidad').append("<option value='"+dat.id_localidad+"' selected='selected'>"+dat.localidad+"</option>");
 		$("#id_semana_epi").trigger('change');


 		$('#modalFicha').modal('show');

	});
}
function open_print(){
	$('#modalPrint').modal('show');
}

function onlyNumber(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

function sum_valores(){
	tot_i=0;tot_p=0;tot_t=0;tot_l=0;
	for (i=1;i<=9;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_i").val();
		tot_i+=parseInt(nval);
	}

	for (i=1;i<=9;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_p").val();
		tot_p+=parseInt(nval);
	}

	for (i=1;i<=9;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_t").val();
		tot_t+=parseInt(nval);
	}

	for (i=1;i<=9;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_v").val();
		tot_l+=parseInt(nval);
	}



	$("#total_i").html(tot_i);
	$("#total_p").html(tot_p);
	$("#total_t").html(tot_t);
	$("#total_v").html(tot_l);


}




function printCompras(){

	document.getElementById('aDwn').setAttribute('href',"../reportes/pdfCompras.php?desde="+$("#fecha_desde").val()+"&hasta="+$("#fecha_hasta").val());
	document.getElementById('aDwn').click();
}

function buscarOrdenCompra(){
	if ($("#moc_id_empresa").val()=='' ){
		bootbox.alert('Seleccione empresa');
		return false;
	}
	if ($("#mod_oc").val()==''){
		bootbox.alert('Ingrese numero de orden de compra');
		return false;
	}



	$.post("../ajax/ordencompra.php?op=buscar",{id_empresa: $("#moc_id_empresa").val(), id_orden_compra : $("#mod_oc").val()}, function(data, status)
	{
		data = JSON.parse(data);
		//alert(data);
		if (jQuery.isEmptyObject(data)){
			bootbox.alert('No se hallo la Orden de Compra');
			return false;
		}

		if (data.fecha_autorizacion=='' || data.fecha_autorizacion==null){
			bootbox.alert('La Orden de Compra no se encuentra autorizada');
			return false;
		}
		if (data.id_ingreso!='' && data.id_ingreso!=null){
			bootbox.alert('La Orden de Compra ya fue facturada');
			return false;
		}


		$("#id_empresa").val(data.id_empresa);
		$("#id_moneda").val(data.id_moneda);
		$("#id_forma_pago").val(data.id_forma_pago);

		$("#tipo_cambio").val(data.tipo_cambio);
		$("#porcentaje_igv").val(data.porcentaje_igv);

		$("#id_orden_compra").val(data.id);	
		$("#nro_orden_compra").val(data.orden);	

		$('#razon_social').append("<option value='"+data.id_proveedor+"' selected='selected'>"+data.razon_social+"</option>");
 		$("#razon_social").trigger('change');

 		$("#id_empresa").prop("disabled",true);
      	//
      	listLocales('');
      	$("#id_local").prop("disabled",false);


      	$("#tblDet > tbody").empty();

      	/*$.each(data.detalle, function( i, item ){
			
            idRow="tr"+item.id_item; 
            r = tabled.rows.length;
		    var newRow = tabled.insertRow(r);
		    newRow.id=idRow;
		    cell1 = newRow.insertCell(0),
		    cell2 = newRow.insertCell(1),
		    cell3 = newRow.insertCell(2),
		    cell4 = newRow.insertCell(3),
		    cell5 = newRow.insertCell(4),
		    cell6 = newRow.insertCell(5),
		    cell7 = newRow.insertCell(6),
		    cell8 = newRow.insertCell(7);
      		cell9 = newRow.insertCell(8);
      		cell10 = newRow.insertCell(9);
      		cell11 = newRow.insertCell(10);

      		cell1.innerHTML = "<button class='btn btn-link btn-xs' onclick='editRow(\""+idRow+"\")'><i class='fa fa-pencil'></i></button><button class='btn btn-link btn-xs' onclick='delRow(\""+idRow+"\");'><i class='fa fa-close'></i></button>";
      	    cell2.innerHTML = item.nombre;      
		    cell2.id="td_nombre_item";
			cell3.innerHTML = item.unidad_medida_ingreso;
		    cell3.id="td_unidad_medida";
			cell4.innerHTML = item.factor;
		    cell4.id="td_factor";
		    cell4.className  ='text-right';

		    cell5.innerHTML = '';
		    cell5.id="td_numero_lote";
		    
		    cell6.innerHTML = '';
		    cell6.id="td_fecha_vencimiento";

		    cell7.innerHTML = item.cantidad;
		    cell7.id="td_cantidad";
		    cell7.className  ='text-right';

			cell8.innerHTML = item.costo_unitario_umc;
		    cell8.id="td_costo_umc";    
		    cell8.className  ='text-right';  

		    cell9.innerHTML = item.costo_total;
		    cell9.id="td_costo_total";            
		    cell9.className  ='text-right';

		    cell10.innerHTML = item.id_item;
		    cell10.id="td_id_item";
		    cell10.style.display ='none';

		    cell11.innerHTML = item.marca;
		    cell11.id="td_marca";
		    cell11.style.display ='none'; 

        });*/

      	calculoTotal();


		$("#modalOrdenCompra").modal('toggle')
		$("#modalTitle").html('Nueva Compra');
	 	$('#modalNew').modal('show');	

	 });

	
}




//Función limpiar_modal_local
//Función limpiar
function find_coordenadas(){
	if ($("#codigo").val()==''){
		return bootbox.alert('Ingrese codigo de ovitrampa a buscar');
	}
	$("#loaderModal").show();
	$.ajax({
		type: "GET",
		url: "../ajax/ficha_ovitrampa.php?op=getCoordenadas",
		dataType: "json",
		//data: JSON.stringify({ paramName: info }),
		data : {		   	
		  	id: $("#codigo").val().toUpperCase(),
		  	id_local: $("#s_id_local").val()
		},
		success: function(data){
			
			//$("#numero_lote").val(data.numero_lote);
			$("#loaderModal").hide();
			if (data[0]){
				dat=data[0];
				$("#coordenada_norte").val(dat.coordenada_norte);
				$("#coordenada_este").val(dat.coordenada_este);
				$("#sector").val(dat.sector);
				$("#direccion").val(dat.direccion);
				$("#punto_critico").val(dat.punto_critico);
				$("#altitud").val(dat.altitud);

				$('#id_localidad').append("<option value='"+dat.id_localidad+"' selected='selected'>"+dat.localidad+"</option>");
 				$("#id_localidad").trigger('change');

			}
	
	    }
	});
}

function action_show_item(id,id_ficha){
	
	$("#id_ficha_detalle").val(id);
	$("#id_ficha").val(id_ficha);
	$.ajax({
		type: "GET",
		url: "../ajax/ficha_ovitrampa.php?op=getItem",
		dataType: "json",
		//data: JSON.stringify({ paramName: info }),
		data : {		   	
		  	id: id
		},
		success: function(data){
			
			//$("#numero_lote").val(data.numero_lote);
			dat=data[0];
			$("#codigo").val(dat.codigo);
			$("#sector").val(dat.sector);
			$("#direccion").val(dat.direccion);

			$("#punto_critico").val(dat.punto_critico);
			$("#coordenada_este").val(dat.coordenada_este);
			$("#coordenada_norte").val(dat.coordenada_norte);
			$("#altitud").val(dat.altitud);
			$("#fecha_colocacion").val(dat.fecha_colocacion);
			$("#fecha_recojo").val(dat.fecha_recojo);
			$("#huevo_campo").val(dat.huevo_campo);
			$("#larva_campo").val(dat.larva_campo);
			$("#huevo_laboratorio").val(dat.huevo_laboratorio);
			$("#larva_laboratorio").val(dat.larva_laboratorio);
			$("#fecha_lectura").val(dat.fecha_lectura);
			$("#determinacion_especie").val(dat.determinacion_especie);
			$("#observaciones").val(dat.observaciones);

			$("#hid_local").val(dat.id_local);

			//$('#id_localidad').append("<option value='"+dat.id_localidad+"' selected='selected'>"+dat.localidad+"</option>");
 			//$("#id_localidad").trigger('change');
 			getLocalidades(dat.id_localidad);

			//$("#nro_habitantes").val(data[0]['nro_habitantes']);

			

			$('#modalItem').modal('show');
	    }
	});

}
function action_show_item_(id_ingreso,id_item,id_lote){

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
		    		bootbox.alert('Item no se puede eliminar o editar, existe salidas vinculadas al lote');
		    	}else{
		    		mostrar_datos_item(id_ingreso,id_item,id_lote);
					$('#modalItemTitle').html('Edicion de Item');
					$('#modalItem').modal('show');

		    	}
		    }
		});


	}else{
		mostrar_datos_item(id_ingreso,id_item,id_lote);
		$('#modalItemTitle').html('Edicion de Item');
		$('#modalItem').modal('show');
	}

}

function mostrar_datos_item(id_ingreso,id_item,id_lote){

	$.ajax({
		type: "POST",
		url: "../ajax/compra.php?op=showItem",
		dataType: "json",
		//data: JSON.stringify({ paramName: info }),
		data : {
		   	id_ingreso: id_ingreso,
		  	id_item: id_item,
		  	id_lote: id_lote
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

function action_remove_item(id_ficha_detalle,id_ficha){
	

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
					url: "../ajax/ficha_ovitrampa.php?op=removeItem",
				    //dataType: "json",
				    //data: JSON.stringify({ paramName: info }),
				    data : {
				    	id: id_ficha_detalle				    	
				    },
				    success: function(msg){

				    	update_child(id_ficha);
				    	bootbox.alert('Item eliminado');
				    	

				    }
				});
		}
		}
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
	$("#id_ingreso").val("");

	$("#id_tipo_documento").val("");
	$("#serie_documento").val("");
	$("#id_empresa").val("");
	$("#id_local").val("");
	$("#numero_documento").val("");
	$("#fecha_compra").val("");

	$("#id_moneda").val("1");
	$("#porcentaje_igv").val("18");
	$("#tipo_cambio").val("3.330");
	
	$("#numero_guia").val("");
	$("#id_orden_compra").val("");
	$("#nro_orden_compra").val("");
	$("#observacion").val("");

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
	var parametros = {"id":row};
	$.ajax( {
		url: '../ajax/ficha_ovitrampa.php?op=detalleFicha&id_usuario='+$("#s_id_usuario").val(),
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#row_"+row).html( json );
			createDataTable(row,$("#hid_local").val());
		}
	} );
}

//Función Listar
function listar()
{
	function format ( rowData ) {
		console.log(rowData);
		var parametros = {"id":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/ficha_ovitrampa.php?op=detalleFicha&id_usuario='+$("#s_id_usuario").val(),
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );
				 createDataTable(rowData[0],rowData[10]);
			}
		} );

		return div;
		//alert('hola');
	}

	$('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
    $('#tbllistado thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title!='' && $.trim(title)!='Acciones' && title!='Del' && title!='Al' && title!='Fecha Crea'){
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

		buttons: [
		{
			extend: 'collection',
			text: "Nuevo <span class='caret'></span>",
			className: "btn btn-success  dropdown-toggle",
			autoClose: true,
			buttons: [
			{ text: 'Nueva Ficha',   action: function () { ver(); } },
                //{ text: 'Abrir Orden Compra', action: function () { openOrdenCompra(); } }

                ],
                fade: true
            },
            
            {
            	text: '<i class="glyphicon glyphicon-download-alt"></i> Descargar ',
            	className: "btn btn-success  dropdown-toggle",
            	action: function ( e, dt, node, config ) {
            		open_print();
            	}
            }

            ],


		orderCellsTop: true,
        fixedHeader: true,
        fixedColumns: true,
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"bProcessing": true,//Activamos el procesamiento del datatables
		"bJQueryUI": false,
		//"responsive": true,
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
      	"sAjaxSource": "../ajax/ficha_ovitrampa.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data
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
		{ "orderable": false,	"targets": 1,	"searchable": true },
		{ "orderable": true,	"targets": 2,	"searchable": true /*, className: "wrapok"*/},
		{ "orderable": true,	"targets": 3,	"searchable": true },
		{ "orderable": true,	"targets": 4,	"searchable": true },
		{ "orderable": true,	"targets": 5,	"searchable": false },
		{ "orderable": true,	"targets": 6,	"searchable": false },
		{ "orderable": true,	"targets": 7,	"searchable": true },
		{ "orderable": true,	"targets": 8,	"searchable": false },
		

		
		],

		"createdRow": function( row, data, dataIndex){
			if( data[9] ==  'f'){
				$(row).addClass('danger')
				//$(row).addClass('alert alert-warning');
				//$(row).css('background-color', 'rgb(250, 235, 204)');
				//$(row).css('background-color', '#F39B9B');
			}

		},

		/*"drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('bg-green');
        },*/

		initComplete: function () {
			//$('.dt-buttons').removeClass('btn-group'); 
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
			orderable: false
			},

			//{ aTargets: null },
			{ aTargets: 'f.id' },			
			{ aTargets: 'l.nombre' },
			{ aTargets: 'f.id' },		
			{ aTargets: 's.numero' },
			{ aTargets: 's.desde' },
			{ aTargets: 's.hasta' },
			{ aTargets: 'uc.login' },
			{ aTargets: 'fecha_creacion' }
			

			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 8, "des" ]]//Ordenar (columna,orden)

	});





	$('#tbllistado').removeClass('display').addClass('table table-striped table-bordered');

	$('#tbllistado tfoot th').each(function () {
		//Agar kolom Action Tidak Ada Tombol Pencarian
		if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Fecha Inicio" && $(this).text() != "Fecha Termino" && $(this).text() != "Estado") {
				var title = $('#tbllistado thead th').eq($(this).index()).text();
				$(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
		}
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



function mostrar_compra(id_ingreso)
{
	//alert(id_item);

	$.post("../ajax/compra.php?op=mostrar",{id_ingreso : id_ingreso}, function(data, status)
	{
		data = JSON.parse(data);
		$("#id_ingreso").val(id_ingreso);

		$("#id_tipo_documento").val(data.id_tipo_documento);
		$("#id_empresa").val(data.id_empresa);

		$("#id_orden_compra").val(data.id_orden_compra);
		$("#nro_orden_compra").val(data.orden);
		
		$("#numero_guia").val(data.numero_guia);

		$("#serie_documento").val(data.serie_documento);
		$("#numero_documento").val(data.numero_documento);
		$("#fecha_compra").val(data.fecha);
		$("#id_moneda").val(data.id_moneda);
		$("#id_forma_pago").val(data.id_forma_pago);

		$("#usuario_creacion").val(data.usuario_crea);
		$("#fecha_creacion").val(data.fecha_creacion);

		$("#tipo_cambio").val(data.tipo_cambio);
		$("#porcentaje_igv").val(data.porcentaje_igv);
		//$("#tipo_cambio").val(data.tipo_cambio);

		listLocales(data.id_local);

		$('#razon_social').append("<option value='"+data.id_proveedor+"' selected='selected'>"+data.razon_social+"</option>");
 		$("#razon_social").trigger('change');

 		$("#id_empresa").prop("disabled",true);
      	$("#id_local").prop("disabled",true);

      	$('#row_btn_item').hide();
      	$('#row_tbl_detalle').hide();

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
function desactivar(id)
{
	bootbox.confirm({
		message: "Está seguro de anular el registro "+id+"?",
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
				$.post("../ajax/ficha_ovitrampa.php?op=desactivar", {id_ficha : id}, function(e){
					bootbox.alert(e);
					table.ajax.reload();
				});
			}
		}
	});
}

//Función para activar registros
function activar(id)
{
	/*bootbox.confirm("¿Está Seguro de activar el registro?", function(result){
		if(result)
        {
        	$.post("../ajax/ficha_vivienda.php?op=activar", {id_ficha : id}, function(e){
        		bootbox.alert(e);
	            table.ajax.reload();
        	});
        }
	})*/
	bootbox.confirm({
		message: "Está seguro de activar el registro "+id+"?",
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
				$.post("../ajax/ficha_ovitrampa.php?op=activar", {id_ficha : id}, function(e){
					bootbox.alert(e);
					table.ajax.reload();
				});
			}
		}
	});
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
