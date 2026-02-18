// $("#frmAcceso").on('submit',function(e)
// {
// 	e.preventDefault();
//     logina=$("#logina").val();
//     clavea=$("#clavea").val();
//     id_empresa=$("#id_empresa").val();
//     id_local=$("#id_local").val();

//     if (logina==''){
//         return showMessage('Ingrese su nombre de usuario','error');
//     }
    
//     if (id_empresa=='' || id_empresa==null){
//         showMessage('Seleccione empresa','error');
//         return false;
//     }
//     if (id_local=='' || id_local==null){
//         showMessage('Seleccione area','error');
//         return false;
//     }

//      if (clavea==''){
//         return showMessage('Ingrese su clave de usuario','error');
//     }


//     $.post("../ajax/usuario.php?op=verificar",
//         {"logina":logina,"clavea":clavea, "id_empresa": id_empresa, "id_local": id_local},
//         function(data)
//     {

//         if (data)
//         {
//           $(location).attr("href","welcome.php");
//         }
//         else
//         {
//             //bootbox.alert("Usuario y/o Password incorrectos");
// 			showMessage('Usuario y/o Password incorrectos','error');
//         }
//     });
// })

$("#frmAcceso").on('submit',function(e)
{
    e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();
    id_empresa=$("#id_empresa").val();
    id_local=$("#id_local").val();
    captcha=$("#captcha").val();

    if (logina==''){
        return showMessage('Ingrese su nombre de usuario','error');
    }
    
    if (id_empresa=='' || id_empresa==null){
        showMessage('Seleccione empresa','error');
        return false;
    }
    if (id_local=='' || id_local==null){
        showMessage('Seleccione area','error');
        return false;
    }

    if (clavea==''){
        return showMessage('Ingrese su clave de usuario','error');
    }

    if (captcha==''){
        return showMessage('Complete el captcha','error');
    }

    // ✅ MODIFICACIÓN: Agregar CSRF token y manejar respuesta JSON
    $.post("../ajax/usuario.php?op=verificar",
        {
            "logina": logina,
            "clavea": clavea, 
            "id_empresa": id_empresa, 
            "id_local": id_local,
            "captcha": captcha,
            "csrf_token": $("#frmAcceso input[name='csrf_token']").val()
        },
        function(data)
        {
            if (data.success)
            {
                $(location).attr("href","welcome.php");
            }
            else
            {
                showMessage(data.message || 'Usuario y/o Password incorrectos','error');
                 // ← NUEVO: Recargar página para nuevo CAPTCHA
                if (data.reload_captcha) {
                    setTimeout(function() { location.reload(); }, 2000);
                }
            }
        }, 'json');
})

function getdataEmpresa(){
    var parametros = {
        "usuario":$('#logina').val(),       
    };

    $.ajax({
        url: "../ajax/usuario.php?op=getEmpresaUsuario",
        type: "GET",
        dataType: "json",
        async: false,
        data: parametros,
        success: function(data)
        {
            var template = $('#tpl_empresas').html();            
            var html = Mustache.to_html(template, data);
            $('#id_empresa').html(html);
            getdataArea();
        }

    });
}

function getdataArea(){
    var parametros = {
        "usuario":$('#logina').val(),
        "id_empresa":$("#id_empresa").val()
    };

    $.ajax({
        url: "../ajax/usuario.php?op=getAreasUsuario",
        type: "GET",
        dataType: "json",
        async: false,
        data: parametros,
        success: function(data)
        {
            var template = $('#tpl_locales').html();            
            var html = Mustache.to_html(template, data);
            $('#id_local').html(html);

        }

    });
}

