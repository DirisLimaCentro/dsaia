var tabla;
function descargarSalidas(){
    document.getElementById('aDwn').setAttribute('href',"../reportes/xlsSalidas.php?desde="+$('#fecha_desde').val()+"&hasta="+$('#fecha_hasta').val());
    document.getElementById('aDwn').click();  
}
function seleccionar_req(id){
    $.post("../ajax/requerimiento.php?op=buscarReq",{id_requerimiento: id}, function(data, status)  {
    data = JSON.parse(data);


    $("#id_empresa").val(data.id_empresa);
    listLocalesIng(data.id_local);  
    $("#id_requerimiento").val(id);
    $("#numero_requerimiento").val(data.numero);    
    $("#id_persona_traslado").val(data.id_solicitante);
    
    $("#id_empresa").prop("disabled", true);
    $('#id_local_ingreso').prop("disabled", true);
    

    $("#tblDet > tbody").empty();


    /*------*/
    $.each(data.detalle, function( i, item ){
     
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
        cell7 = newRow.insertCell(6),
        cell8 = newRow.insertCell(7);
        cell9 = newRow.insertCell(8);
        cell10 = newRow.insertCell(9);

        
        cell1.innerHTML = "<button class='btn btn-link btn-xs' onclick='editRow(\""+idRow+"\")'><i class='fa fa-pencil'></i></button><button class='btn btn-link btn-xs' onclick='delRow(\""+idRow+"\");'><i class='fa fa-close'></i></button>";
        cell2.innerHTML = item.nombre;      
        cell2.id="td_nombre_item";

        cell3.innerHTML = ''; 
        cell3.id="td_unidad_medida";

        cell4.innerHTML =''; //factor
        cell4.id="td_factor";
        
        cell5.innerHTML = '';
        cell5.id="td_numero_lote";

        cell6.innerHTML = '';
        cell6.id="td_fecha_vencimiento";


        cell7.innerHTML = item.cantidad;
        cell7.id="td_cantidad";
        cell7.className  ='text-right';     

        cell8.innerHTML = ''; //item.id_catalogo;
        cell8.id="td_id_item";
        cell8.style.display ='none';

        cell9.innerHTML = item.id_catalogo; //item.id_medida;
        cell9.id="td_marca";
        cell9.style.display ='none'; 

        cell10.innerHTML = '';
        cell10.id="td_idlote";
        cell10.style.display ='none';




        });
    /*************************/

    $('#row_btn_item').show();
    $('#row_tbl_detalle').show();

   

    $("#modalListReq").modal('toggle')
    $("#modalTitle").html('Nuevo Despacho');
    $('#modalNew').modal('show'); 

   });
}
function openRequerimiento(){
  tblReq.ajax.reload();
  $('#modalListReq').modal('toggle');
}

//Función que se ejecuta al inicio
function load_series(){

  if ($("#id_tipo_documento").val()==''){
    $("#serie_documento").val('');
    $("#numero_documento").val('');
    return false;
  }

  var parametros = {"id_tipo_documento":$("#id_tipo_documento").val()};
  $.ajax({
      url: '../ajax/salidas.php?op=loadSerie',
      data: parametros,
      dataType: 'html',
      success: function(json) {
        //div.html(json).removeClass('loading');
        $("#serie_documento").val(json);
        load_last_number();
      }
    });
}
function load_last_number(){
    var parametros = {"id_tipo_documento":$("#id_tipo_documento").val(),
    "serie_documento":$("#serie_documento").val()
  };
    $.ajax({
        url: '../ajax/salidas.php?op=getLastNumber',
        data: parametros,
        dataType: 'html',
        success: function(json) {
          //div.html(json).removeClass('loading');
          $("#numero_documento").val(json);
          
        }
      });
}
function init() {
  //mostrarform(false);
  $('#fecha_desde').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });

      $('#fecha_hasta').daterangepicker({
       locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
      });



  listar();
  listReq();
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
function limpiar() {
  $("#modalTitle").html('Nueva Salida');
  editItem=false;

  $("#id_requerimiento").val('');
  $("#numero_requerimiento").val('');

  $("#id_empresa").val('');
  $("#id_local_ingreso").val('');
  $("#id_persona_traslado").val('');
  $("#id_motivo_salida").val('');
  $("#observaciones").val('');
  $("#id_salida").val('');
  $("#numero_documento").val('');

  $("#tblDet > tbody").empty();
  $("#id_empresa").prop("disabled",false);
  $("#id_local_ingreso").prop("disabled",false);
  //$("#id_proveedor").val("");
  //$("#nombre").val("");
  //$("#direccion").val("");
  //$('#ubigeo').val('').trigger('change.select2');
  //$("#ruc").val("");
  //$("#telefono_fijo").val("");


}


function limpiar_contacto() {
  $("#modalLocalTitle").html('Nuevo registro');
  $("#id_contacto").val("");
  $("#nombre_contacto").val("");
  $("#direccion_contacto").val("");
  $('#id_ubigeo_contacto').val('').trigger('change.select2');
  $("#celular_contacto").val("");
  $("#telefono_fijo_contacto").val("");

}

//Actualiza child row
function update_child(row) {
  var parametros = {"id_salida":row};
  $.ajax({
    url: '../ajax/salidas.php?op=detalleSalida',
    data: parametros,
    dataType: 'html',
    success: function(json) {
      $("#row_" + row).html(json);
    }
  });
}

//Función mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
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


function listReq(){

  function formatReq(rowData) {
    var parametros = {
      "id_requerimiento": rowData[0]
    };
    var div = $("<div id='row_r_" + rowData[0] + "' >")
      .addClass('Cargando')
      .text('Cargando...');
    $.ajax({
      url: '../ajax/requerimiento.php?op=detalleRequerimiento',
      data: parametros,
      dataType: 'html',
      success: function(json) {
        div
          .html(json)
          .removeClass('loading');
      }
    });

    return div;
    //alert('hola');
  }


  $('#tblrequerimientos thead tr').clone(true).appendTo('#tblrequerimientos thead');
  $('#tblrequerimientos thead tr:eq(1) th').each(function(i) {
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
  tblReq = $('#tblrequerimientos').DataTable({
    dom: "ltip",
    /*buttons: [
        {
            extend: 'collection',
            text: "Nuevo <span class='caret'></span>",
            className: "btn btn-success  dropdown-toggle",
            autoClose: true,
            buttons: [
                { text: 'Nuevo',   action: function () { ver(); } },
                { text: 'Abrir Requerimiento', action: function () { openRequerimiento(); } }

            ],
            fade: true
        }
    ],*/


    orderCellsTop: true,
    fixedHeader: true,
    "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
    "bProcessing": true, //Activamos el procesamiento del datatables
    "bJQueryUI": false,
    "responsive": true,
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
    "sAjaxSource": "../ajax/requerimiento.php?op=listarModal", // Load Data
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

    "columnDefs": [{
        "orderable": false,
        "targets": 0,
        "searchable": false
      },
      {
        width: '2%',
        "orderable": false,
        "targets": 1,
        "searchable": false,
        
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
      },
      {
        "orderable": true,
        "targets": 4,
        "searchable": false
      },
      {
        "orderable": true,
        "targets": 5,
        "searchable": true
      },
      {
        "orderable": true,
        "targets": 6,
        "searchable": true
      },
      {
        "orderable": true,
        "targets": 7,
        "searchable": false
      }

      ,{
        "orderable": true,
        "targets": 8,
        "searchable": false
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
    columns: [{
        className: 'details-control',
        defaultContent: '',
        data: null,
        orderable: false,
        defaultContent: ''
      },

      //{ aTargets: null },
      { aTargets: 'i.id' },
      { aTargets: 'i.id'  },
      { aTargets: 'e.nombre' },
      { aTargets: 'l.nombre' },
      { aTargets: 'i.fecha'  },
      { aTargets: 'i.numero' },
      { aTargets: 'personal' },
      { aTargets: 'i.fecha_autorizacion' }
      
      
    ],

    "pagingType": 'full_numbers',
    "iDisplayLength": 5, //Paginación
    "order": [
      [6, "desc"]
    ] //Ordenar (columna,orden)

  });


  $('#tblrequerimientos').removeClass('display').addClass('table table-striped table-bordered');

  $('#tblrequerimientos tfoot th').each(function() {
    //Agar kolom Action Tidak Ada Tombol Pencarian
    if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Atendido" && $(this).text() != "Fecha Aut") {
      var title = $('#tblrequerimientos thead th').eq($(this).index()).text();
      $(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
    }
  });


  $('#tblrequerimientos tbody').on('click', 'td.details-control', function() {
    var tr = $(this).closest('tr');
    var row = tblReq.row(tr);

    if (row.child.isShown()) {
      row.child.hide();
      tr.removeClass('shown');      
    } else {
      row.child(formatReq(row.data())).show();
      tr.addClass('shown');      
    }
  });



}

//Función Listar
function listar() {
  function format(rowData) {
    var parametros = {
      "id_salida": rowData[0]
    };
    var div = $("<div id='row_" + rowData[0] + "' >")
      .addClass('Cargando')
      .text('Cargando...');
    $.ajax({
      url: '../ajax/salidas.php?op=detalleSalida',
      data: parametros,
      dataType: 'html',
      success: function(json) {
        div
          .html(json)
          .removeClass('loading');
      }
    });

    return div;
    //alert('hola');
  }


  $('#tbllistado thead tr').clone(true).appendTo('#tbllistado thead');
  $('#tbllistado thead tr:eq(1) th').each(function(i) {
    var title = $(this).text();
    if (title != '' && title != 'Acciones' && title != 'Estado' && title != 'Fecha Salida') {
      $(this).html('<input style="width:100%;" type="text" class="form-control input-sm" placeholder="Buscar ' + title + '" />');
    } else {
      $(this).html('');
    }
    $('input', this).on('keyup change', function() {
      if (table.column(i).search() !== this.value) {
        table
          .column(i)
          .search(this.value)
          .draw();
      }
    });
  });
  table = $('#tbllistado').DataTable({


    dom: "Bltip",
    buttons: [
        {
            extend: 'collection',
            text: "Nuevo <span class='caret'></span>",
            className: "btn btn-success  dropdown-toggle",
            autoClose: true,
            buttons: [
                { text: 'Nuevo',   action: function () { ver(); } },
                { text: 'Abrir Requerimiento', action: function () { openRequerimiento(); } }

            ],
            fade: true
        },

        {
          text: '<i class="glyphicon glyphicon-save"></i> Descargar',
          className: "btn btn-success ",
          action: function ( e, dt, node, config ) {
              openModalFiltro();
          }

        },

    ],


    orderCellsTop: true,
    fixedHeader: true,
    "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
    "bProcessing": true, //Activamos el procesamiento del datatables
    "bJQueryUI": false,
    "responsive": true,
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
    "sAjaxSource": "../ajax/salidas.php?op=listar", // Load Data
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

    "columnDefs": [{
        "orderable": false,
        "targets": 0,
        "searchable": false
      },
      {
        "orderable": false,
        "targets": 1,
        "searchable": false
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
      },
      {
        "orderable": true,
        "targets": 4,
        "searchable": true
      },
      {
        "orderable": true,
        "targets": 5,
        "searchable": true
      },
      {
        "orderable": true,
        "targets": 6,
        "searchable": true
      },
      {
        "orderable": true,
        "targets": 7,
        "searchable": false
      },
      {
        "orderable": true,
        "targets": 8,
        "searchable": false
      },
      {
        "orderable": true,
        "targets": 9,
        "searchable": false
      },
      {
        "orderable": true,
        "targets": 10,
        "searchable": false
      }
    ],
    initComplete: function() {

      $('.dt-buttons').removeClass('btn-group'); 
      table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
          that
            .search(this.value)
            .draw();
        });
      });
    },



    columns: [{
        className: 'details-control',
        defaultContent: '',
        data: null,
        orderable: false,
        defaultContent: ''
      },

      //{ aTargets: null },
      {
        aTargets: 'id'
      },
      {
        aTargets: ''
      },
      {
        aTargets: 'nombre'
      },
      {
        aTargets: 'direccion'
      },
      {
        aTargets: 'distrito'
      },
      {
        aTargets: 'telefono_fijo'
      },
      {
        aTargets: 'ruc'
      },
      {
        aTargets: 'estado'
      },
      {
        aTargets: 'estado'
      }
    ],

    "pagingType": 'full_numbers',
    "iDisplayLength": 10, //Paginación
    "order": [
      [1, "asc"]
    ] //Ordenar (columna,orden)

  });


  $('#tbllistado').removeClass('display').addClass('table table-striped table-bordered');

  $('#tbllistado tfoot th').each(function() {
    //Agar kolom Action Tidak Ada Tombol Pencarian
    if ($(this).text() != "" && $(this).text() != "Acciones" && $(this).text() != "Estado" && title == 'Fecha Salida') {
      var title = $('#tbllistado thead th').eq($(this).index()).text();
      $(this).html('<input class="form-control input-sm" type="text" placeholder="Buscar ' + title + '" style="width:100%;" />');
    }
  });


  $('#tbllistado tbody').on('click', 'td.details-control', function() {
    var tr = $(this).closest('tr');
    var row = table.row(tr);

    if (row.child.isShown()) {
      row.child.hide();
      tr.removeClass('shown');
      //tr.find('svg').attr('data-icon', 'plus-circle');
    } else {
      row.child(format(row.data())).show();
      tr.addClass('shown');
      //tr.find('svg').attr('data-icon', 'minus-circle');
    }
  });


  /*$('.buttons-excel, .buttons-print').each(function() {
     $(this).removeClass('btn-default').addClass('btn-primary')
  })*/


}

function openModalFiltro(){
  $('#modalFilter').modal('show');
}

function limpiar_modal_items() {
  editItem = false;
  newItem = false;
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

  $("#numero_lote").prop("disabled", true);
  $("#fecha_vencimiento").prop("disabled", true);
}


//Función para guardar o editar

function guardaryeditar() {


  if ($("#id_proveedor").val() == '') {
    var msj = "Esta seguro de guardar el nuevo registro?";
  } else {
    var msj = "Esta seguro de guardar los cambios?";
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
    callback: function(result) {
      //console.log('This was logged in the callback: ' + result);
      if (result) {
        //Grabar
        //var formData = new FormData($("#frmestablecimiento")[0]);

        var parametros = {
          "id_proveedor": $('#id_proveedor').val(),
          "nombre": $('#nombre').val().toUpperCase(),
          "nombre_comercial": $('#nombre_comercial').val().toUpperCase(),
          "direccion": $('#direccion').val().toUpperCase(),
          "ruc": $('#ruc').val().toUpperCase(),
          "telefono_fijo": $('#telefono_fijo').val(),
          "ubigeo": $("#ubigeo").val(),
          "celular": $("#celular").val(),
          "email": $("#email").val(),
          "web": $("#web").val(),
          "facebook": $("#facebook").val()
        };


        $.ajax({
          url: "../ajax/proveedor.php?op=guardaryeditar",
          type: "POST",
          data: parametros,
          //contentType: false,
          //processData: false,
          success: function(datos) {
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

function guardaryeditar_contacto() {
  if ($("#id_contacto").val() == '') {
    var msj = "Esta seguro de guardar el nuevo registro?";
  } else {
    var msj = "Esta seguro de guardar los cambios?";
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
    callback: function(result) {
      //console.log('This was logged in the callback: ' + result);
      if (result) {
        //Grabar
        //var formData = new FormData($("#frmestablecimiento")[0]);

        var parametros = {
          "id_contacto": $('#id_contacto').val(),
          "id_proveedor": $('#id_proveedor_contacto').val(),
          "nombre": $('#nombre_contacto').val().toUpperCase(),
          "telefono": $('#telefono_fijo_contacto').val().toUpperCase(),
          "celular": $('#celular_contacto').val().toUpperCase(),
          "email": $('#email_contacto').val()
        };

        $.ajax({
          url: "../ajax/contacto.php?op=guardaryeditar",
          type: "POST",
          data: parametros,
          //contentType: false,
          //processData: false,
          success: function(datos) {
            //mostrarform(false);
            $('#modalcontacto').modal('toggle')
            update_child($('#id_proveedor_contacto').val());
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


function mostrar_salida(id_salida) {

  $.post("../ajax/salidas.php?op=mostrar", {
    id_salida: id_salida
  }, function(data, status) {
    data = JSON.parse(data);
    //alert(data);
    $("#id_salida").val(id_salida);
    $("#id_tipo_documento").val(data.id_tipo_documento);
    $("#id_empresa").val(data.id_empresa);
    $("#serie_documento").val(data.serie_documento);
    $("#numero_documento").val(data.numero_documento);
    $("#id_persona_traslado").val(data.id_encargado_traslado);
    $("#id_motivo_salida").val(data.id_motivo_salida);
    $("#fecha_salida").val(data.fecha);
    $("#observaciones").val(data.observaciones);

    $("#numero_requerimiento").val(data.numero_requerimiento);
    $("#id_requerimiento").val(data.id_requerimiento);

    //$("#usuario_creacion").val(data.usuario_crea);
    //$("#fecha_creacion").val(data.fecha_creacion);
    //listLocales(data.id_local_salida);
    listLocalesIng(data.id_local_ingreso);
    $("#id_empresa").prop("disabled", true);

    $("#serie_documento").prop("disabled", true);
    $("#numero_documento").prop("disabled", true);
    //$("#id_local_salida").prop("disabled", true);
    //$("#id_local_ingreso").prop("disabled", true);
    $('#row_btn_item').hide();
    $('#row_tbl_detalle').hide();
    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
  })
}


function action_show_item(id_salida, id_item, id_lote) {
  //Verificar si no tiene salidas con el lote a editar
  if (id_lote != '') {
    $.ajax({
      type: "POST",
      url: "../ajax/salidas.php?op=verificaDisponibilidadLote",
      //dataType: "json",
      //data: JSON.stringify({ paramName: info }),
      data: {
        id_salida: id_salida,
        id_item: id_item,
        id_lote: id_lote
      },
      success: function(msg) {
        //alert(msg);
        //if (msg == '1') {
        //bootbox.alert('Item no se puede eliminar, existe salidas vinculadas al lote');
        //} else {
        mostrar_datos_item(id_salida, id_item);
        $('#modalItemTitle').html('Edicion de Item');
        $('#modalItem').modal('show');
        //}
      }
    });
  } else {
    mostrar_datos_item(id_salida, id_item);
    $('#modalItemTitle').html('Edicion de Item');
    $('#modalItem').modal('show');
  }
}

function mostrar_datos_item(id_salida, id_item) {

  $.ajax({
    type: "POST",
    url: "../ajax/salidas.php?op=showItem",
    dataType: "json",
    //data: JSON.stringify({ paramName: info }),
    data: {
      id_salida: id_salida,
      id_item: id_item
    },
    success: function(data) {
      $("#id_salida").val(id_salida);
      //$("#categoria").val(data.categoria);
      //$("#marca").val(data.marca);
      //$("#unidad_medida_compra").val(data.unidad_medida_ingreso);
      //$("#factor").val(data.factor);
      $("#cantidad").val(data.cantidad);
     // $("#costo_umc").val(data.costo_unitario_umc);
      $("#numero_lote").val(data.numero_lote);
      $("#id_lote").val(data.id_lote);
      $("#fecha_vencimiento").val(data.fecha_vencimiento);
      $('#id_item').append("<option value='" + data.id_item + "' selected='selected'>" + data.item + "</option>");
      //$("#id_item").trigger('change');
      $('#id_item').select2("enable", false);
      
      if (data.id_lote!=null){
        $("#stock_actual").val(data.stock_actual);
      }else{
        $("#stock_actual").val(data.stock_real);
      } 
     // ContarUnidades();
      //calcular();
      editItem = true;
      newItem = false;
    }
  });

}

function action_remove_item(id_salida,id_item,cantidad){
  //alert('salida='+id_salida+' item='+id_item+' lote='+id_lote+ ' cant='+cantidad);return false;
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
					url: "../ajax/salidas.php?op=removeItem",
				    //dataType: "json",
				    //data: JSON.stringify({ paramName: info }),
				    data : {
				    	id_salida: id_salida,
				    	id_item: id_item,
              cantidad: cantidad
				    },
				    success: function(msg){
				    	/*if (msg=='0'){
				    		bootbox.alert('Item no se puede eliminar, existe salidas vinculadas al lote');
				    	}else{
				    		update_child(id_salida);
				    		bootbox.alert('Item eliminado');
				    	}*/
                var amsg=msg.split('|');
                var nerror=amsg[0];
                if (nerror=='0'){
                    bootbox.alert('Ocurrio un error: '+amsg[1]); 
                }else{
                    update_child(id_salida);
                    bootbox.alert('Item eliminado');
                }

				    }
				});
		}
		}
	});

}


function selectitem(idlote, id, nombre, vencimiento, actual) {
  /*var numberOfli = $('#result').children('li').length;
  for (var xe = 0; xe <= numberOfli; xe ++) {
      $("#id_item_"+xe).addClass("bg-blue");
  }*/
  //alert(idlote)
  $("#result li").removeClass("active");
  $("#id_item_" + idlote).addClass("active");
 
 /* $("#mo_numero_lote").val(nombre);
  $("#mo_vencimiento").val(vencimiento);
  $("#mo_stock_actual").val(actual);
  $("#mo_id_numero_lote").val(idlote);*/


  $("#numero_lote").val(nombre);
  $("#fecha_vencimiento").val(vencimiento);
  $("#stock_actual").val(actual);
  $("#idlote").val(idlote);
  $('#modalLotes').modal('toggle')



}

function closeLotes() {
  if ($("#mo_numero_lote").val() == '') {
    bootbox.alert("Selecciona un Lote");
    return false;
  }

  $("#numero_lote").val($("#mo_numero_lote").val());
  $("#fecha_vencimiento").val($("#mo_vencimiento").val());
  $("#stock_actual").val($("#mo_stock_actual").val());
  $("#idlote").val($("#mo_id_numero_lote").val());
  $('#modalLotes').modal('toggle')
}
/*
function selectitem(id,nombre,vencimiento,actual)
{
		$("#mo_numero_lote").val(nombre);
		$("#mo_vencimiento").val(vencimiento);
		$("#mo_stock_actual").val(actual);
}*/

function mostrar(id_proveedor) {
  $.post("../ajax/proveedor.php?op=mostrar", {
    id_proveedor: id_proveedor
  }, function(data, status) {
    data = JSON.parse(data);
    //mostrarform(true);
    //alert(data.ruc);return false;
    $("#nombre").val(data.razon_social);
    $("#id_proveedor").val(id_proveedor);
    $("#direccion").val(data.direccion);
    $("#nombre_comercial").val(data.nombre_comercial);
    $("#ruc").val(data.ruc);
    $("#telefono_fijo").val(data.telefono_fijo);
    $("#celular").val(data.celular);
    $("#email").val(data.e_mail);
    $("#web").val(data.web);
    $("#facebook").val(data.facebook);
    $('#ubigeo').append("<option value='" + data.id_ubigeo + "' selected='selected'>" + data.distrito + "</option>");
    $("#ubigeo").trigger('change');

    $("#modalTitle").html('Edicion de registro');
    $('#modalNew').modal('show');
    //$("#nombre").focus();

  })
}



function mostrar_contacto(id_proveedor, id_contacto) {
  //alert(id_empresa);
  $("#id_proveedor_contacto").val(id_proveedor);

  $.post("../ajax/contacto.php?op=mostrar", {
    id_contacto: id_contacto
  }, function(data, status) {
    data = JSON.parse(data);
    $("#nombre_contacto").val(data.nombre);
    $("#id_contacto").val(id_contacto);
    $("#telefono_fijo_contacto").val(data.telefono_fijo);
    $("#celular_contacto").val(data.celular);
    $("#email_contacto").val(data.e_mail);

    $("#modalcontactoTitle").html('Edicion de Contacto');
    $('#modalcontacto').modal('show');
  })

}

//Función para desactivar registros
function desactivar(id_salida) {
  bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result) {
    if (result) {
      $.post("../ajax/salidas.php?op=desactivar", {
        id_salida: id_salida
      }, function(e) {
        bootbox.alert(e);
        table.ajax.reload();
      });
    }
  })
}

//Función para activar registros
function activar(id_salida) {
  bootbox.confirm("¿Está Seguro de activar el registro?", function(result) {
    if (result) {
      $.post("../ajax/salidas.php?op=activar", {
        id_salida: id_salida
      }, function(e) {
        bootbox.alert(e);
        table.ajax.reload();
      });
    }
  })
}

function open_contacto(id_proveedor) {
  limpiar_contacto();
  $('#id_proveedor_contacto').val(id_proveedor)
  $('#modalcontacto').modal('show')
}

//Función para activar local
function activar_contacto(id_empresa, id_contacto) {
  bootbox.confirm("¿Está Seguro de activar el registro?", function(result) {
    if (result) {
      $.post("../ajax/local.php?op=activar", {
        id_contacto: id_contacto
      }, function(e) {
        bootbox.alert(e);
        update_child(id_empresa);
      });
    }
  })
}

//Función para desactivar registros
function desactivar_contacto(id_proveedor, id_contacto) {
  bootbox.confirm("¿Está Seguro de desactivar el registro?", function(result) {
    if (result) {
      $.post("../ajax/contacto.php?op=desactivar", {
        id_contacto: id_contacto
      }, function(e) {
        bootbox.alert(e);
        update_child(id_proveedor);
      });
    }
  })
}

init();
