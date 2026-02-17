<!-- footer content -->
        <footer>
          <div class="pull-right">
            OGTI - DIRIS LIMA <a href="#">CENTRO</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../public/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../public/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../public/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../public/nprogress/nprogress.js"></script>


<!--<script src="../public/datepicker/js/bootstrap-datepicker.min.js"></script>-->


    <!-- Chart.js -->
    <script src="../public/Chart.js/dist/Chart.min.js"></script>

    <!-- EChart-->
    <script src="../public/echarts/dist/echarts.min.js"></script>
    <script src="../public/echarts/map/js/world.js"></script>

    <script src="../public/echarts/dist/extension/echarts-gl.js"></script>

    


    <!-- gauge.js -->
    <script src="../public/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../public/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../public/iCheck/icheck.min.js"></script>

    <script src="../public/switchery/dist/switchery.min.js"></script>

    <script src="../public/bootstrap-toggle/js/bootstrap-toggle.js"></script>

    <!-- Skycons -->
    <script src="../public/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../public/Flot/jquery.flot.js"></script>
    <script src="../public/Flot/jquery.flot.pie.js"></script>
    <script src="../public/Flot/jquery.flot.time.js"></script>
    <script src="../public/Flot/jquery.flot.stack.js"></script>
    <script src="../public/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../public/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../public/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../public/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../public/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../public/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../public/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../public/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../public/moment/min/moment.min.js"></script>
    <script src="../public/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="../public/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../public/boostrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../public/boostrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>

    <script src="../public/select2/dist/js/select2.full.js"></script>

    <script src="../public/boostrap-select-1.13.9/js/bootstrap-select.js"></script>

    <script src="../public/jszip/dist/jszip.min.js"></script>
    
    <!-- Datatables -->
    <script src="../public/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../public/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../public/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../public/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../public/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../public/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../public/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../public/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../public/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../public/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../public/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../public/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <script src="../public/datatables.net/js/dataTables.select.min.js"></script>
    
    <script src="../public/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>

    <script src="../public/jquery.inputmask/dist/jquery.inputmask.js"></script>
    <script src="../public/jquery.inputmask/dist/jquery.inputmask.numeric.extensions.js"></script>


      <script type="text/javascript" src="../public/js/mustache.min.js"></script>

    <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>
    <!-- toastr -->
   <script src="../public/toastr/toastr.min.js"></script>
   <script src="../public/toastr/my_functions.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../public/build/js/custom.js"></script>
	<script src="../public/bootstrap-dialog/js/bootstrap-dialog.min.js"></script>


  <script src="../public/highcharts/highcharts.js"></script>
    <script src="../public/highcharts/highcharts-more.js"></script>
    <script src="../public/highcharts/exporting.js"></script>
    <script src="../public/highcharts/modules/data.js"></script>
    <script src="../public/highcharts/modules/drilldown.js"></script>
    <script src="../public/highcharts/modules/exporting.js"></script>

<script src="../public/sweetalert2/dist/sweetalert2.js"></script>

    <!--Timer para Ordenes de Compra por autorizar-->
    <script>

        //setInterval("buscar_oc_req()", 2000);
        $(function () {
           $(document).on('hidden.bs.modal', '.bootbox.modal', function (e) {    
            if($(".modal").hasClass('in')) {
                $('body').addClass('modal-open');
            }
            });

           $.fn.modal.Constructor.prototype.enforceFocus = function () {
            };



        });

        function gf_open_pwd(){
            $("#modalPwd").modal('show');
        }

        function gf_updatepwd(){

          pwd1=$("#g_clave").val();
          pwd2=$("#g_clave_repetida").val();
          if (!pwd1){
            $("#clave").focus();
            return Swal.fire("Mensaje", "Ingrese la nueva clave", "error"); 

            }
            if (!pwd2){
                $("#clave_repeat").focus();
                return Swal.fire("Mensaje", "Repita la nueva clave", "error"); 
            }

            if (pwd1!=pwd2){
                return Swal.fire("Mensaje", "Las claves no coinciden", "error"); 
            }

            var n = pwd1.length;
            if (n<6){
                return Swal.fire("Mensaje", "La clave deber tener al menos 6 caracteres", "error");
            }  

            Swal.fire({
                    title: "Aviso",
                            text: "Esta seguro de actualizar su contraseña?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si",
                            cancelButtonText: "Cancelar",
                        }).then((result) => {
                            if (result.value) {
                            //Swal.fire("Deleted!", "Your file has been deleted.", "success");
                                gf_update_pwd();
                            }
              });

        }

        function gf_update_pwd() {
            var parametros = {
                "id_usuario":$.trim($('#s_id_usuario').val()),                
                "clave": $.trim($('#g_clave').val())
            };

            $.ajax({
                url: "../ajax/usuario.php?op=update_pwd",
                type: "POST",
                data: parametros,
                    //contentType: false,
                    //processData: false,
                    success: function(datos)
                    {                        
                        $('#modalPwd').modal('toggle');
                        Swal.fire("Mensaje", "Se actualizo correctamente su clave!", "success");                        
                    },
                    error: function(request, status, err) {
                        Swal.fire("Mensaje", "Ocurrio un error en su petición!", "error");
                    }
                });
        }


    </script>    

  </body>
</html>