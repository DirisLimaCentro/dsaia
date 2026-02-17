<?php
require_once "../modelos/Empresa.php";
$empresa=new Empresa();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DIRIS LIMA CENTRO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/font-awesome/css/font-awesome.min.css">


    <!-- NProgress -->
    <link href="../public/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../public/animate.css/animate.min.css" rel="stylesheet">



    <link href="../public/build/css/custom.css" rel="stylesheet">

    <!-- Theme style -->
    <!--<link rel="stylesheet" href="../public/css/AdminLTE.min.css">-->
    <!-- iCheck -->
    <!--<link rel="stylesheet" href="../public/css/blue.css">-->
    <!-- toastr -->
    <link rel="stylesheet" href="../public/toastr/toastr.min.css">

    <link href="../public/build/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/spinkit/spinkit.css">
    <link rel="stylesheet" href="../public/app/css/app.css">

    <link href="../public/select2/dist/css/select2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style=" background-image: url('../public/app/images/warehouse.jpg');" >

     <div class="loader_modal" id="loaderModal" tabindex="-1" >
    <div class="loader_modal_content">
     
      <div class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>
     
    </div>
  </div>


    <div class="container">


      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        


     <div id="loginbox" style="margin-top:250px;" class="mainbox">
      <div class="panel panel-primary" >
     <!-- <div class="animate form login_form">-->
        
        <!--<section class="login_content">-->

          <div class="panel-heading">
            <div class="panel-title">Registro de Formatos</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px; display: none;"><a href="#">Forgot password?</a></div>
          </div>     


          <div style="padding-top:30px" class="panel-body" >

        <form method="post" id="frmAcceso" class="form-horizontal" >

          

          <div class="input-group">           
              <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
              <input type="text" id="logina" name="logina" class="form-control" placeholder="Usuario" onblur="getdataEmpresa();">            
          </div>

          <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-hospital-o fa" aria-hidden="true"></i></span>

              <select name="id_empresa" id="id_empresa" class="form-control"  onChange="carga_locales();"  >
              </select>              
                       
            
          </div>

          <div class="input-group">
            
             <span class="input-group-addon"><i class="fa fa-home -o fa" aria-hidden="true"></i></span>

              <select name="id_local" id="id_local" class="form-control">

              </select>           
            
          </div>


          

          <div class="input-group">            
              <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
              <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Password">
           
          </div>

          <div class="row">
            <div class="col-xs-8">
                No tiene una cuenta? <a href="#" onclick="open_register();" style="font-weight: bold;" class="btn-link">Registrese</a>
            </div><!-- /.col -->
            <div class="col-xs-4 text-right">
                <a href="#" onclick="open_recovery();" style="font-weight: bold;" class="btn-link">Olvido su clave?</a>
            </div><!-- /.col -->
          </div>

           <div class="row text-center">
            <div class="col-xs-12 ">
              <br>
                  <button type="submit" class="btn btn-success btn-flat" style="width: 80%;">Ingresar</button>
            </div>
          </div>


        </form>

      </div>


      </div>


      <!--</section>-->

      <!--</div>-->

      <!-- /.login-box-body -->
    </div><!-- /.login-box -->

  </div>

  <div class="col-md-4 col-sm-4 col-xs-4">
        </div>

</div>




  </div>


  <div data-backdrop="static" class="modal fade" id="modalNew"  role="dialog" aria-labelledby="modalNew" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" >

      <div class="modal-content">

        <!--<div class="panel panel-primary">-->
          <div class="modal-header modal-header-success" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
            <h4 class="panel-title" id="modalTitle">Nuevo Registro</h4>  
            <input type="hidden" id="id_entidad">
            <input type="hidden" id="id_persona">      
          </div>      

          <div class="modal-body">

            <div class="panel panel-success">
              <div class="modal-header modal-header-success">
                Datos de la Empresa
              </div>
              <div class="panel-body">

                <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label for="ruc" class="col-form-label">RUC:</label>
                      <div class="input-group">

                        <input type="text" class="form-control text-uppercase" id="ruc" placeholder="RUC">

                        <div class="input-group-btn">
                          <button class="btn btn-default" id="btnfindRuc" type="button" onclick="buscar_entidad();">
                            <i class="glyphicon glyphicon-search" title="Buscar en SUNAT"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <label for="razon_social">Nombre o Razon Social:</label>
                     <input type="text"  class="form-control" id="razon_social" disabled="" placeholder="Razon Social">
                   </div>
                 </div>

                     <div class="col-md-3 col-sm-12 col-xs-12">
                      <div class="form-group">
                       <label for="tipo_doc">Rubro:</label>
                       <select class="form-control" id="tipo_rubro"></select>
                     </div>
                   </div>

               </div>

               <div class="row">

                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="razon_social">Nombre Comercial:</label>
                    <input type="text"  class="form-control" id="nombre_comercial" placeholder="Nombre Comercial">
                  </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Direccion:</label>
                   <input type="text"  class="form-control" id="direccion_empresa" placeholder="Direccion">
                 </div>
               </div>

               <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="ubigeo">Distrito:</label>
                 <select  class='form-control select2  text-uppercase' name='ubigeo_empresa' id='ubigeo_empresa' style="width: 100%;" >
                 </select>
               </div>
             </div>


               </div>

              </div>
            </div>


            <!---Panel persona---->

            <div class="panel panel-info">
              <div class="panel-heading">
                Datos de la Persona
              </div>
              <div class="panel-body">

               <div class="row">

                <div class="col-md-2 col-sm-8 col-xs-12">
                  <div class="form-group">
                   <label for="tipo_doc">Tipo Doc:</label>
                   <select class="form-control" id="tipo_doc"></select>
                 </div>
               </div>

               <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="numero_doc" class="col-form-label">Numero Doc:</label>
                    <div class="input-group">

                      <input type="text" class="form-control text-uppercase" id="numero_doc" placeholder="Numero">

                      <div class="input-group-btn">
                        <button class="btn btn-default" type="button" id="btnFindPersona" onclick="buscar_persona();">
                          <i class="glyphicon glyphicon-search"  title="Buscar"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                </div>


                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Nombres:</label>
                   <input type="text"  class="form-control" id="nombres" disabled="" placeholder="Nombres">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Primer Ap:</label>
                   <input type="text"  class="form-control" id="ape_paterno" disabled placeholder="Primero Apellido">
                 </div>
               </div>

               <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Segundo Ap:</label>
                   <input type="text"  class="form-control" id="ape_materno" disabled placeholder="Segundo Apellido">
                 </div>
               </div>





             </div>

             <div class="row">

                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="razon_social">Direccion:</label>
                   <input type="text"  class="form-control" id="direccion_persona" placeholder="Direccion">
                 </div>
               </div>

               <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="ubigeo">Distrito:</label>
                 <select  class='form-control select2  text-uppercase' name='ubigeo_persona' id='ubigeo_persona' style="width: 100%;" >
                 </select>
               </div>
             </div>

             <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="celular_persona">Celular:</label>
                   <input type="text"  class="form-control" id="celular_persona" placeholder="Celular">
                 </div>
               </div>

               <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                   <label for="correo_persona">Correo:</label>
                   <input type="text"  class="form-control" id="correo_persona" placeholder="Email">
                 </div>
               </div>



             </div>

              

              </div>
            </div>

            <!---end panel personal  -->

             <div class="panel panel-warning">
              <div class="modal-header modal-header-warning">
                Datos de la Cuenta de Usuario
              </div>
              <div class="panel-body">

                  <div class="row">

                   <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <label for="correo_persona">Cuenta de usuario (autogenerado):</label>
                     <input type="text"  class="form-control" id="txtlog" disabled placeholder="Login">
                   </div>
                 </div>

                   <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <label for="new_pwd">Ingrese Clave:</label>
                     <input type="password"  class="form-control" id="new_pwd" placeholder="">
                   </div>
                 </div>

                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <label for="new_pwd_bis">Repita Clave:</label>
                     <input type="password"  class="form-control" id="new_pwd_bis" placeholder="">
                   </div>
                 </div>

               </div>

              </div>
             </div>   





          </div>
          <div class="modal-footer">
            <button type="button" onclick="save();" class="btn btn-success"><i class="fa fa-save"></i> Registrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

          </div>
          <!--</div>-->


        </div>
      </div>

    </div>



    <div data-backdrop="static" class="modal fade" id="modalValida"  role="dialog" aria-labelledby="modalValida" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-sm" role="document" >
        <div class="modal-content">          
            <div class="modal-header modal-header-info" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
              <h4 class="panel-title" id="modalTitle">Validación para restablecer clave</h4>               
            </div>   
            <div class="modal-body">
              <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="txtcuenta_usuario">Ingrese su cuenta de usuario:</label>
                 <input type="text"  class="form-control text-uppercase" id="txtcuenta_usuario" placeholder="">
               </div>
              </div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" onclick="next_valida();" class="btn btn-success"><i class="fa fa-caret-right"></i> Siguiente</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
            </div>

       </div>
     </div>
   </div>

    <div data-backdrop="static" class="modal fade" id="modalConfirm"  role="dialog" aria-labelledby="modalConfirm" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-md" role="document" >
        <div class="modal-content">          
            <div class="modal-header modal-header-info" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
              <h4 class="panel-title" id="modalTitle">Restablecer clave</h4>               
            </div>   
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <h6>Estimado usuario, su nueva clave sera enviado al correo registrado, revise su bandeja (spam incluido) con la confirmación de su nueva clave</h6>
                  </div>
              </div>
              <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                 <label for="txtcuenta_usuario">Correo Electronico:</label>
                 <input type="hidden" id="he_mail">
                 <input type="hidden" id="hid_user">
                 <input type="text"  class="form-control text-uppercase" disabled="" id="txte_mail" placeholder="">
               </div>
              </div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" onclick="open_confirm_correo();" class="btn btn-success"><i class="fa fa-caret-right"></i> Enviar Correo</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
            </div>

       </div>
     </div>
   </div>




    <!-- jQuery -->
    <script src="../public/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>
    <!-- toastr -->
   <script src="../public/toastr/toastr.min.js"></script>
   <script src="../public/toastr/my_functions.js"></script>

   <script src="../public/select2/dist/js/select2.full.js"></script>
    <script src="../public/boostrap-select-1.13.9/js/bootstrap-select.js"></script>

    <script type="text/javascript" src="scripts/login.js?rnd=<?php echo rand();?>"></script>
    <script type="text/javascript" src="../public/js/mustache.min.js"></script>




<script type="text/javascript">


  function open_confirm_correo(){
      bootbox.confirm({
                title: "Mensaje",
                message: "Se enviará una nueva clave a su cuenta de correo, esta seguro de continuar?",
                buttons: {
                  cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar'
                  },
                  confirm: {
                    label: '<i class="fa fa-send"></i> Enviar',
                    className: 'btn-success'
                  }
                },
                callback: function (result) {

                  

                  if (result) {

                    $("#loaderModal").show();
                    var parametros = {
                     "id":$("#hid_user").val(),                    
                     "correo":$("#he_mail").val()

                    };


              $.ajax({
                url: "../ajax/usuario.php?op=resetPwd",
                type: "POST",
                    //data: parametros,
                    data: parametros,
                    //contentType: false,
                    //processData: false,

                    success: function (msg) {
                     
                      var amsg = msg.split('|');
                      var nerror = amsg[0];
                      if (nerror == '0') {
                          bootbox.alert('Ocurrio un error: ' + amsg[1]);
                      } else {
                          $("#loaderModal").hide();
                          $('#modalConfirm').modal('toggle');
                          bootbox.alert('Se envio su nueva clave al correo registrado');
                      }

                    }

                  });


            }
          }
          });
  }

  function open_recovery(){
      $('#modalValida').modal('show')
  }

  function next_valida(){
      if ($("#txtcuenta_usuario").val()==''){
          return bootbox.alert("Ingrese su cuenta de usuario");
      }

      $("#loaderModal").show();

      $.ajax({
        url: "../ajax/persona.php",
        dataType: "json",
        method: "get",
        async : false,
        data: {
          op: "getEmail",
          log: $("#txtcuenta_usuario").val().toUpperCase(),
           
        },
        beforeSend: function () {

        },
        success: function (result) {

           $("#loaderModal").hide();
           if (result.msj=='') {
             if (result.e_mail!=''){
                $("#txte_mail").val(result.e_mail);
                $("#he_mail").val(result.e_mail);  
                $("#hid_user").val(result.id);            
                $('#modalValida').modal('toggle');
                $('#modalConfirm').modal('show');
             }else{
                return bootbox.alert("No se hallo una cuenta de correo para reenvio de clave");
             }
            
          }else{
            return bootbox.alert("No se hallo cuenta de usuario");
          }

      },
      timeout: 12000, 
      error: function (request, status, err) {
        $("#loaderModal").hide();
        if (status == "timeout") {

          alert("Su petición demoro mas de lo permitido");
        } else {

          alert("ocurrio un error en su petición.");
        }
      }
    }); 


  }

  function limpiar(){
    $("#id_entidad").val('');
    $("#id_persona").val('');

    $("#ruc").val('');
    $("#razon_social").val('');
    $("#direccion_empresa").val('');
    $("#nombre_comercial").val('');
    

    $("#tipo_doc").val('');
    $("#numero_doc").val('');
    $("#nombres").val('');
    $("#ape_paterno").val('');
    $("#ape_materno").val('');
    $("#direccion_persona").val('');
    
    $("#celular_persona").val('');
    $("#correo_persona").val('');
    $("#txtlog").val('');
    $("#new_pwd").val('');
    $("#new_pwd_bis").val('');

    $('#ubigeo_empresa').val('').trigger('change.select2');
    $('#ubigeo_persona').val('').trigger('change.select2');
  

    $("#btnFindPersona").prop("disabled",false);
    $("#numero_doc").prop("disabled",false);
    $("#btnfindRuc").prop("disabled",false);
    $("#ruc").prop("disabled",false);

       

  }  


  function save(){

    msj = "";

    id_empresa=($("#id_entidad").val()=='')?'0':$("#id_entidad").val();
    id_persona=($("#id_persona").val()=='')?'0':$("#id_persona").val();

    ruc=$("#ruc").val();
    razon_social=$("#razon_social").val();
    direccion_empresa=$("#direccion_empresa").val();
    comercial=$("#nombre_comercial").val();
    ubigeo_empresa=$("#ubigeo_empresa").val();

    tipo_rubro=$("#tipo_rubro").val();

    tipo_doc=$("#tipo_doc").val();
    numero_doc=$("#numero_doc").val();
    nombres=$("#nombres").val();
    ape_paterno=$("#ape_paterno").val();
    ape_materno=$("#ape_materno").val();
    direccion_persona=$("#direccion_persona").val();
    ubigeo_persona=$("#ubigeo_persona").val();
    celular_persona=$("#celular_persona").val();
    correo_persona=$("#correo_persona").val();
    cuenta_usuario=$("#txtlog").val();
    clave_usuario=$("#new_pwd").val();
    clave_repetida=$("#new_pwd_bis").val();


    if (ruc == '') {
      var msj = "Ingrese RUC del establecimiento";
    } else if (razon_social == '') {
      var msj = "Ingrese razon social establecimiento";
    } else if (tipo_rubro == '') {
      var msj = "Seleccione tipo de rubro";
    } else if (direccion_empresa == '') {
      var msj = "Ingrese direccion establecimiento";
    } else if (ubigeo_empresa == '') {
      var msj = "Ingrese distrito del establecimiento";
    } else if (tipo_doc == '') {
      var msj = "Ingrese tipo de documento de la persona";
    }  else if (nombres == '') {
      var msj = "Ingrese nombres de la persona";
    }  else if (ape_paterno == '') {
      var msj = "Ingrese apellido paterno";
    }  else if (ape_materno == '') {
      var msj = "Ingrese apellido materno";
    }  else if (direccion_persona == '') {
      var msj = "Ingrese direccion actual de la persona";
    }  else if (ubigeo_persona == '') {
      var msj = "Ingrese distrito de la persona";
    }  else if (celular_persona == '') {
      var msj = "Ingrese al menos un numero de telefono de referencia";
    }  else if (correo_persona == '') {
      var msj = "Ingrese un correo electronico valido para confirmacion de su cuenta de usuario";
    }  else if (clave_usuario == '') {
      var msj = "Ingrese una clave";
    }  else if (clave_repetida == '') {
      var msj = "Repita la clave";    
    }  else if (clave_usuario !=clave_repetida) {
      var msj = "Las claves ingresadas no son iguales";
    }          

    if (msj){
        return bootbox.alert(msj);
    }


              bootbox.confirm({
                title: "Mensaje",
                message: "Su cuenta de usuario sera generada, esta seguro de continuar?",
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

                  

                  if (result) {

                    $("#loaderModal").show();
                    var parametros = {
                      "id_empresa":id_empresa,
                     "id_persona":id_persona,
                     "ruc":ruc,
                     "razon_social":razon_social,
                     "direccion_empresa":direccion_empresa,
                     "comercial":comercial,
                     "ubigeo_empresa":ubigeo_empresa,
                     "tipo_rubro":tipo_rubro,
                     "tipo_doc":tipo_doc,
                     "numero_doc":numero_doc,
                     "nombres":nombres,
                     "ape_paterno":ape_paterno,
                     "ape_materno":ape_materno,
                     "direccion_persona":direccion_persona,
                     "ubigeo_persona":ubigeo_persona,
                     "celular_persona":celular_persona,
                     "correo_persona":correo_persona,
                     "cuenta_usuario":cuenta_usuario,
                     "clave_usuario":clave_usuario

                    };


              $.ajax({
                url: "../ajax/usuario.php?op=creaExterno",
                type: "POST",
                    //data: parametros,
                    data: parametros,
                    //contentType: false,
                    //processData: false,

                    success: function (msg) {
                     
                      var amsg = msg.split('|');
                      var nerror = amsg[0];
                      if (nerror == '0') {
                          bootbox.alert('Ocurrio un error: ' + amsg[1]);
                      } else {
                          $("#loaderModal").hide();
                          $('#modalNew').modal('toggle');
                          bootbox.alert('Su cuenta de usuario fue generada con exito, por favor inicie sesión con sus nuevas credenciales');
                      }

                    }

                  });


            }
          }
          });


  }

  function show_usuario(){
    nom=$("#nombres").val()

    pos=nom.lastIndexOf(' ')
   
    if (pos>0){
      log=nom.substr(0,nom.lastIndexOf(' '))+"."+$("#ape_paterno").val();
    }else{
      log=nom+"."+$("#ape_paterno").val();
    }  
    $("#txtlog").val(log);
  }

  function buscar_persona(){
  

    td=$("#tipo_doc").val();
    nd=$("#numero_doc").val();

    if (nd==''){
      return bootbox.alert("Ingrese un numero de documento a buscar");
    }
 

  $("#loaderModal").show();

  $.ajax({
    url: "../ajax/persona.php",
    dataType: "json",
    method: "get",
    async : false,
    data: {
      op: "buscar_doc",
      tipo_doc: td,
      numero_doc: nd 
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

          $("#celular_persona").val(result.telefono);
          $("#correo_persona").val(result.correo);


          $('#ubigeo_persona').append("<option value='"+result.id_ubigeo+"' selected='selected'>"+result.departamento+" - "+result.provincia+" - "+result.distrito+"</option>");
          $("#ubigeo_persona").trigger('change');
          $("#btnFindPersona").prop("disabled",true);
          $("#numero_doc").prop("disabled",true);
       
          show_usuario()

        }else{
          if (td=='1'){
            buscar_reniec()
          }


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

   nd=$("#numero_doc").val();

   

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
                    $("#id_persona").val('');
                    $("#nombres").val(dataPersona.nombres);
                    $("#ape_paterno").val(dataPersona.apellido_paterno);
                    $("#ape_materno").val(dataPersona.apellido_materno);                  
                    $("#direccion_persona").val(dataPersona.domicilio_direccion_actual+' '+dataPersona.domicilio_direccion);

                    $("#btnFindPersona").prop("disabled",true);

                    show_usuario();
                 
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

  $(document).ready(function() {

    /*$.getJSON('../ajax/empresa.php?op=list', function(data) {
    var template = $('#tpl_empresas').html();
    var html = Mustache.to_html(template, data);
    $('#id_empresa').html(html);
    });*/

   /* $.getJSON('../ajax/empresa.php?op=list', function(data) {
    var template = "<h1>{{name}} {{age}}";
    var html = Mustache.to_html(template, data);
    $('#sampleArea').html(html);
    });*/

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=1', function(data) {
      var template = $('#tpl_tipo_doc').html();
      var html = Mustache.to_html(template, data);
      $('#tipo_doc').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=84', function(data) {
      var template = $('#tpl_rubros').html();
      var html = Mustache.to_html(template, data);
      $('#tipo_rubro').html(html);
    });

    $('#ubigeo_persona').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function() {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term, // search term
            page: params.page,
            op: 'listarUbigeo'
          };
        },
        results: function(data, page) { // parse the results into the format expected by Select2.

          return {
            results: data
          };
        },
        processResults: function(data, params) {

          for (var i = 0; i < data.length; i++) {
            data[i].id = data[i].id;
          }
          return {
            results: data
          };
        },
        cache: true
      },
      escapeMarkup: function(markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 2,

    });


    $('#ubigeo_empresa').select2({
      dropdownParent: $("#modalNew"),
      placeholder: "Seleccione",
      language: {
        inputTooShort: function() {
          return 'digita nombre del Distrito.';
        }
      },
      ajax: {
        type: "GET",
        url: "../ajax/ubigeo.php",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term, // search term
            page: params.page,
            op: 'listarUbigeo'
          };
        },
        results: function(data, page) { // parse the results into the format expected by Select2.

          return {
            results: data
          };
        },
        processResults: function(data, params) {

          for (var i = 0; i < data.length; i++) {
            data[i].id = data[i].id;
          }
          return {
            results: data
          };
        },
        cache: true
      },
      escapeMarkup: function(markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 2,

    });


  });


</script>

<script id="tpl_empresas" type="text/template"><option value='' >Seleccione Empresa</option>
  {{#empresas}}<option value='{{id}}' {{selected}}>{{nombre}}</option>{{/empresas}}
</script>

<script id="tpl_locales" type="text/template"><option value='' >Seleccione Local</option>
  {{#locales}}<option value='{{id}}' {{selected}}>{{nombre}}</option>{{/locales}}
</script>

<script type="text/javascript">

  function buscar_entidad(){
    ruc=$("#ruc").val();

    if (ruc.length<11){
      return bootbox.alert("Ingrese un numero de RUC valido a buscar");
    }

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

            //$("#telefono_fijo_empresa").val(result.telefono_fijo);
            //$("#celular_empresa").val(result.celular);
            //$("#email_empresa").val(result.e_mail);
            $("#id_entidad").val(result.id);

          $('#ubigeo_empresa').append("<option value='"+result.id_ubigeo+"' selected='selected'>"+result.distrito_empresa+"</option>");
          $("#ubigeo_empresa").trigger('change');

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
                  $("#ruc").prop("disabled",true);
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


  function carga_locales(){
    $.getJSON('../ajax/empresa.php?op=listLocales',{id_empresa: $('#id_empresa').val()}, function(data) {
      var template = $('#tpl_locales').html();
      var html = Mustache.to_html(template, data);
      $('#id_local').html(html);
    });
  }


  function open_register(){
      limpiar();
      $('#modalNew').modal('show')
  }


</script>
<script id="tpl_tipo_doc" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>


<script id="tpl_rubros" type="text/template"><option value='' selected>--Seleccione--</option>
  {{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

<div id="sampleArea">

</div>
  </body>
</html>
