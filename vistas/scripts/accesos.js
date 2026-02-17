function add(tip){
  if (tip=='O'){
    var sel=$('#id_menu_detalle').val();
  }else{
    sel=[];
    var sel = new Array();
    $('#id_menu_detalle option').each(function(){
          sel.push(this.value);
    });
  }

  if (sel==null){
    alert('Seleccione una opcion a agregar');
  }else{
    sel = sel.toString();
    if ($('#id_usuario_a').val()=='')  {
      alert('Seleccione un usuario');
    } else {
      var parametros = {"op" : 'crudAccesos',"opt" : 'I',"id_usuario" : $("#id_usuario_a").val(),"id_menu_detalle": sel};
      $.ajax({
        data:  parametros,
        url:   '../ajax/usuario.php',
        type:  'get',
        beforeSend: function () {
          //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
          //alert(response);return false;
          loadAccesosxUsuario();
        }
      });
    }
  }
}

function remove(tip){
  if (tip=='O'){
    var sel=$('#id_acceso').val();
  }else{
    sel=[];
    var sel = new Array();
    $('#id_acceso option').each(function(){
          sel.push(this.value);
    });
  }

  if (sel==null){
    alert('Seleccione una opcion a quitar');
  }else{
    sel = sel.toString();
    if ($('#id_usuario_a').val()=='')  {
      alert('Seleccione un usuario');
    } else {
      var parametros = {"op" : 'crudAccesos',"opt" : 'D',"id_usuario" : $("#id_usuario_a").val(),"id_menu_detalle": sel};
      $.ajax({
        data:  parametros,
        url:   '../ajax/usuario.php',
        type:  'get',
        beforeSend: function () {
          //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
          //alert(response);return false;
          loadAccesosxUsuario();
        }
      });
    }
  }
}


function loadMenuDetalle(){
  $.getJSON('../ajax/tabla.php?op=listMenusDetalle&id_menu='+$("#id_menu").val(), function(data) {
    var template = $('#tpl_menus_detalle').html();
    var html = Mustache.to_html(template, data);
    $('#id_menu_detalle').html(html);

  });
}

function loadAccesosxUsuario(){
  $.getJSON('../ajax/usuario.php?op=listAccesos&id_usuario='+$("#id_usuario_a").val(), function(data) {
    var template = $('#tpl_accesos').html();
    var html = Mustache.to_html(template, data);
    $('#id_acceso').html(html);

  });
}

function render_list_users(){
    $.getJSON('../ajax/usuario.php?op=cboUsers', function(data) {
      var template = $('#tpl_usuarios').html();
      var html = Mustache.to_html(template, data);
      $('#id_usuario_a').html(html);
      $("#id_usuario_a").select2();        
    });
}
	
$(function () {
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


      $.getJSON('../ajax/tabla.php?op=listMenus', function(data) {
      	var template = $('#tpl_menus').html();
      	var html = Mustache.to_html(template, data);
      	$('#id_menu').html(html);      	
      });


      render_list_users();
       
      
});	



