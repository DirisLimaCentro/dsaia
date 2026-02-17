<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 require 'header.php';
 
?>
<style type="text/css" xmlns="http://www.w3.org/1999/html">
  button, .buttons, .btn, .modal-footer .btn + .btn {
    margin-bottom: 0px;
    margin-right: 0px;

  }



  .btn-success {
  background: #26B99A;
  border: 1px solid #169F85;





}

  .hovertext {
      position: relative;
      border-bottom: 1px dotted black;
  }

  .hovertext:before {
      content: attr(data-hover);
      visibility: hidden;
      opacity: 0;
      width: 800px;
      background-color: #ea3535;
      color: #fff;
      text-align: center;
      border-radius: 5px;
      padding: 5px 0;
      transition: opacity 1s ease-in-out;

      position: absolute;
      z-index: 1;
      left: 0;
      top: 110%;
  }

  .hovertext:hover:before {
      opacity: 1;
      visibility: visible;
      width: 800px;
  }



.navbar-toggle {
  width: 100%;
  float: none;
  margin-right: 0;
}
</style> 
    <div class="right_col" role="main">        
      <!-- Main content -->
      <!--<section class="content">-->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              
              <div class="x_title">


                  <br>  <h2>FICHA Nº 02:VERIFICACIÓN DE
                      CUMPLIMIENTO DE LOS ASPECTOS DE  GESTIÓN
                      DE RESIDUOS SÓLIDOS  <br>EN ESTABLECIMIENTOS DE
                      SALUD, SERVICIOS MÉDICOS DE APOYO DE LA
                      CATEGORIA I-1 AL I-4 Y <br>CENTROS DE
                      INVESTIGACIÓN EN SALUD. </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>


              
              <!-- /.box-header -->
              <!-- centro -->
              <div class="x_content" id="listadoregistros">
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover " style="width: 100%">
                  <thead>
                    
                    <tr class="v-grid-header">
                    
                    <th>Acciones</th>
                    <th>Establecimiento</th>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Centro Inspeccionado</th>
                    <th>RUC</th>
                    <th>Persona Atiende</th>
                    <th>Creado por</th>
                    <th>Fecha Creacion</th>
                    
                    </tr>  
                  </thead>
                  <tbody>                            
                  </tbody>
                  <tfoot>
                    
                    
                    <th>Acciones</th>
                    <th>Establecimiento</th>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Centro Inspeccionado</th>
                    <th>RUC</th>
                    <th>Persona Atiende</th>
                    <th>Creado por</th>
                    <th>Fecha Creacion</th>
                    
                  </tfoot>
                </table>
              </div>


                <?php require  'partials/modal_ficha2_manejo_residuos_solidos.php'; ?>

              <!--Fin centro -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      
      <!--</section>--><!-- /.content -->

    </div><!-- /.content-wrapper -->










    <!--Fin-Contenido-->
    <?php
   require 'footer.php';
  ?>



  <script type="text/javascript" src="scripts/ficha2_manejo_residuos_solidos.js?rnd=<?php echo rand(); ?>"></script>

  <script>



var tblReq;






function sum_valores7(){
	tot_i=0


	
    for (i=1;i<=4;i++){
	  if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;


      tot_i+=parseInt(nval);








    }


if(tot_i==4) {

    tot_=1;



}if(tot_i==3)
    {
        tot_i = 0;




    }
    if(tot_i==2)
    {
        tot_i = 0;




    }
    if(tot_i==1)
    {
        tot_i = 0;

    }


    $("#p_1").val(tot_i/4);



}



function sum_valores8(){
    tot_i=0



    for (i=5;i<=8;i++){
        if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;


        tot_i+=parseInt(nval);








    }


    if(tot_i==4) {

        tot_=1;



    }if(tot_i==3)
    {
        tot_i = 0;




    }
    if(tot_i==2)
    {
        tot_i = 0;




    }
    if(tot_i==1)
    {
        tot_i = 0;

    }


    $("#p_2").val(tot_i/4);



}


function sum_valores9(){
    tot_i=0



    for (i=9;i<=12;i++){
        if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;


        tot_i+=parseInt(nval);








    }


    if(tot_i==4) {

        tot_=1;



    }if(tot_i==3)
    {
        tot_i = 0;




    }
    if(tot_i==2)
    {
        tot_i = 0;




    }
    if(tot_i==1)
    {
        tot_i = 0;

    }


    $("#p_3").val(tot_i/4);



}
/*
function sum_valores10(){
    tot_i=0



    for (i=13;i<=16;i++){
        if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;


        tot_i+=parseInt(nval);








    }


    if(tot_i==4) {

        tot_=1;



    }if(tot_i==3)
    {
        tot_i = 0;




    }
    if(tot_i==2)
    {
        tot_i = 0;




    }
    if(tot_i==1)
    {
        tot_i = 0;

    }


    $("#p_4").val(tot_i/4);



}
*/

function sum_valores11(){
    tot_i=0



    for (i=17;i<=20;i++){
        if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;


        tot_i+=parseInt(nval);








    }


    if(tot_i==4) {

        tot_=1;



    }if(tot_i==3)
    {
        tot_i = 0;




    }
    if(tot_i==2)
    {
        tot_i = 0;




    }
    if(tot_i==1)
    {
        tot_i = 0;

    }


    $("#p_5").val(tot_i/4);



}





function sum_valores12(){
    tot_i=0



    for (i=21;i<=24;i++){
        if ($("#i_"+i.toString()).is(':checked')) nval=1; else nval=0;


        tot_i+=parseInt(nval);








    }


    if(tot_i==4) {

        tot_=1;



    }if(tot_i==3)
    {
        tot_i = 0;




    }
    if(tot_i==2)
    {
        tot_i = 0;




    }
    if(tot_i==1)
    {
        tot_i = 0;

    }


    $("#p_6").val(tot_i/4);



}






//bloque 2



function sum_valores2(){
    tot_ii=0;

    for (i=1;i<=4;i++){
        if ($("#ii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_ii+=parseInt(nval);
    }


    if(tot_ii==4) {

        tot_=1;



    }if(tot_ii==3)
    {
        tot_ii = 0;




    }
    if(tot_ii==2)
    {
        tot_ii = 0;




    }
    if(tot_ii==1)
    {
        tot_ii = 0;

    }

    $("#p_7").val(tot_ii/4);
}



/*

function sum_valores13(){
    tot_ii=0;

    for (i=5;i<=8;i++){
        if ($("#ii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_ii+=parseInt(nval);
    }


    if(tot_ii==4) {

        tot_=1;



    }if(tot_ii==3)
    {
        tot_ii = 0;




    }
    if(tot_ii==2)
    {
        tot_ii = 0;




    }
    if(tot_ii==1)
    {
        tot_ii = 0;

    }

    $("#p_8").val(tot_ii/4);
}
*/


function sum_valores14(){
    tot_ii=0;

    for (i=9;i<=12;i++){
        if ($("#ii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_ii+=parseInt(nval);
    }


    if(tot_ii==4) {

        tot_=1;



    }if(tot_ii==3)
    {
        tot_ii = 0;




    }
    if(tot_ii==2)
    {
        tot_ii = 0;




    }
    if(tot_ii==1)
    {
        tot_ii = 0;

    }

    $("#p_9").val(tot_ii/4);





}





var m_5 = document.getElementById("m_5"),
    m_5Value = m_5.value;


var m_6 = document.getElementById("m_6"),
    m_6Value = m_6.value;

var m_7 = document.getElementById("m_7"),
    m_7Value = m_7.value;
var m_8 = document.getElementById("m_8"),
    m_8Value = m_8.value;



var m_2_5 = document.getElementById("m_2_5"),
    m_2_5Value = m_2_5.value;


var m_2_6 = document.getElementById("m_2_6"),
    m_2_6Value = m_2_6.value;

var m_2_7 = document.getElementById("m_2_7"),
    m_2_7Value = m_2_7.value;
var m_2_8 = document.getElementById("m_2_8"),
    m_2_8Value = m_2_8.value;


var m_3_1 = document.getElementById("m_3_1"),
    m_3_1Value = m_3_1.value;





var m_5_1 = document.getElementById("m_5_1"),
    m_5_1Value = m_5_1.value;

var m_5_2 = document.getElementById("m_5_2"),
    m_5_2Value = m_5_2.value;

var m_5_3 = document.getElementById("m_5_3"),
    m_5_3Value = m_5_3.value;

var iii_2 = document.getElementById("iii_2"),
    iii_2Value = iii_2.value;

var iii_3 = document.getElementById("iii_3"),
    iii_3Value = iii_3.value;

var iii_4 = document.getElementById("iii_4"),
    iii_4Value = iii_4.value;

var iii_5 = document.getElementById("iii_5"),
    iii_5Value = iii_5.value;


m_5.onchange = () => calculate();
m_6.onchange = () => calculate();
m_7.onchange = () => calculate();
m_8.onchange = () => calculate();



m_2_5.onchange = () => calculate();
m_2_6.onchange = () => calculate();
m_2_7.onchange = () => calculate();
m_2_8.onchange = () => calculate();


m_5_1.onchange = () => calculate();
m_5_2.onchange = () => calculate();
m_5_3.onchange = () => calculate();

m_3_1.onchange = () => calculate();
iii_2.onchange = () => calculate();

iii_3.onchange = () => calculate();
iii_4.onchange = () => calculate();
iii_5.onchange = () => calculate();



function calculate() {
    m_5Value = m_5.value;
    m_6Value = m_6.value;
    m_7Value = m_7.value;
    m_8Value = m_8.value;

    m_2_5Value = m_2_5.value;
    m_2_6Value = m_2_6.value;
    m_2_7Value = m_2_7.value;
    m_2_8Value = m_2_8.value;


    m_5_1Value = m_5_1.value;
    m_5_2Value = m_5_2.value;
    m_5_3Value = m_5_3.value;

    m_3_1Value = m_3_1.value;

  iii_2Value = iii_2.value;

    iii_3Value = iii_3.value;
    iii_4Value = iii_4.value;
    iii_5Value = iii_5.value;



    var sum = 0;

    var a = +m_5Value;
    var b = +m_6Value;
    var c = +m_7Value;
    var d = +m_8Value;

    var e = +m_2_5Value;
    var f = +m_2_6Value;
    var g = +m_2_7Value;
    var h = +m_2_8Value;


    var a2 = +m_5_1Value;

    if(a2==3){

        a2=1;
    }
    var b2 = +m_5_2Value;

    if(b2==3){

        b2=1;
    }

    var c2 = +m_5_3Value;

    if(c2==3){

        c2=1;
    }


   var  t =   +m_3_1Value ;

   if(t==3){

       t=1;
   }




    var  t2 =   +iii_2Value ;

    var  t3 =   +iii_3Value ;
    var  t4 =   +iii_4Value ;
    var  t5 =   +iii_5Value ;




/*

    if(sum==4)
    {
      sum=1;

        document.getElementById("p_4").value = sum;


        sumt =  document.getElementById("total_puntaje").value   ;

        document.getElementById("total_puntaje").value = sumt + sum ;

    }else {

 document.getElementById("p_4").value = 0;

  sumt =  document.getElementById("total_puntaje").value   ;

     if(sumt ==1 ){

         sumt =0;





         sumt =  document.getElementById("total_puntaje").value   ;

         document.getElementById("total_puntaje").value = sumt + sum ;

     }else
     {

sumt = sumt   - ( sumt* 1)  ;
         document.getElementById("total_puntaje").value = sumt ;



     }



    }*/




    sum5 = e + f + g+ h  ;

    if(sum5==4  || sum5==12)
    {
     let  sumar =1 ;


document.getElementById("p_8").value =sumar ;

        pr1 = document.getElementById("p_7").value;
        pr2 = document.getElementById("p_9").value;
        let Suma =  Number(pr1) +  Number(pr2)  +Number(sumar)   ;
        document.getElementById("total_puntaje2").value = Suma ;

    }else {

  let sumar2 =0 ;




        document.getElementById("p_8").value = sumar2;


        pr1 = document.getElementById("p_7").value;
        pr2 = document.getElementById("p_9").value;




        let Suma =  Number(pr1) +  Number(pr2)      ;

        document.getElementById("total_puntaje2").value =  Suma;

    }













    sum3 = a + b + c+ d  ;

    if(sum3==4  || sum3==12)
    {
        let  sum3=1;
        document.getElementById("p_4").value = sum3;
        pr1 = document.getElementById("p_1").value;
        pr2 = document.getElementById("p_2").value;
        pr3 = document.getElementById("p_3").value;


        pr5 = document.getElementById("p_5").value;
        pr6 = document.getElementById("p_6").value;


        let Suma =  Number(pr1) +  Number(pr2) +   Number(pr3) +  Number(pr5) +    Number(pr6)   +    Number(sum3)     ;
        document.getElementById("total_puntaje").value = Suma ;

    }else {

        sum3= sum3 *0;

        document.getElementById("p_4").value = sum3;


        pr1 = document.getElementById("p_1").value;
        pr2 = document.getElementById("p_2").value;
        pr3 = document.getElementById("p_3").value;


        pr5 = document.getElementById("p_5").value;
        pr6 = document.getElementById("p_6").value;


        let Suma =  Number(pr1) +  Number(pr2) +   Number(pr3) +  Number(pr5) +    Number(pr6)   +    Number(sum3)     ;

        document.getElementById("total_puntaje").value =  Suma;
    }





    sum4 = t  + t2  +t3 + t4 + t5;
if(t==2){
   sum4= sum4-1;

}



    document.getElementById("total_puntaje3").value = sum4;


    if( sum4 <2 ){

        document.getElementById("valoracion3").value=" MUY DEFICIENTE";

        document.getElementById("valoracion3").className ="btn btn-danger";


    }if( sum4 >1 && sum4 <5){

        document.getElementById("valoracion3").value=" DEFICIENTE ";

        document.getElementById("valoracion3").className ="btn btn-primary";

    }if( sum4 > 4){

        document.getElementById("valoracion3").value=" ACEPTABLE  ";
        document.getElementById("valoracion3").className ="btn btn-success";
    }







    sum3 =a2 +b2 +c2 ;


    document.getElementById("total_puntaje5").value = sum3;

    if( sum3 <2 ){

        document.getElementById("valoracion5").value=" MUY DEFICIENTE";

        document.getElementById("valoracion5").className ="btn btn-danger";


    }if( sum3==2){

        document.getElementById("valoracion5").value=" DEFICIENTE ";

        document.getElementById("valoracion5").className ="btn btn-primary";

    }if( sum3 > 2){

        document.getElementById("valoracion5").value=" ACEPTABLE  ";
        document.getElementById("valoracion5").className ="btn btn-success";
    }

}



calculate()



// suma de puntaje 1


function sum_valores15(){






    let num1 = document.getElementsByName("p_1")[0].value;

    let num2 = document.getElementsByName("p_2")[0].value;

    let num3 = document.getElementsByName("p_3")[0].value;

    let num4 = document.getElementsByName("p_4")[0].value;


    let num5 = document.getElementsByName("p_5")[0].value;


    let num6 = document.getElementsByName("p_6")[0].value;


    let sum = Number(num1) + Number(num2) + Number(num3)  + Number(num4) + Number(num5) + Number(num6);

    document.getElementsByName("total_puntaje")[0].value = sum;

tamount = sum ;


    if( tamount <2 ){

        document.getElementById("valoracion1").value=" MUY DEFICIENTE";

        document.getElementById("valoracion1").className ="btn btn-danger";


    }if( tamount >1 && tamount <5){

        document.getElementById("valoracion1").value=" DEFICIENTE ";

        document.getElementById("valoracion1").className ="btn btn-primary";

    }if( tamount > 4){

        document.getElementById("valoracion1").value=" ACEPTABLE  ";
        document.getElementById("valoracion1").className ="btn btn-success";
    }



}


// suma de puntaje 2


function sum_valores16(){



    let num1 = document.getElementsByName("p_7")[0].value;
    let num2 = document.getElementsByName("p_8")[0].value;
    let num3 = document.getElementsByName("p_9")[0].value;




    let sum = Number(num1) + Number(num2) + Number(num3)   ;

    document.getElementsByName("total_puntaje2")[0].value = sum;






    tamount = sum ;


    if( tamount <2 ){

        document.getElementById("valoracion2").value=" MUY DEFICIENTE";

        document.getElementById("valoracion2").className ="btn btn-danger";


    }if( tamount >1 && tamount <3){

        document.getElementById("valoracion2").value=" DEFICIENTE ";

        document.getElementById("valoracion2").className ="btn btn-primary";

    }if( tamount > 2){

        document.getElementById("valoracion2").value=" ACEPTABLE  ";
        document.getElementById("valoracion2").className ="btn btn-success";
    }







}

/*
$(document).ready(function(){

    $("#servicio_a").select2({
        ajax: {
            url: "../ajax/tablas_anexo15.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });


});
*/




// suma de puntaje del 3 al 6

/*

function sum_valores3(){



let pint = document.getElementById("m_3_1").value ;

    let sumat = Number (pint) ;
    tot_iii=sumat;


    for (i=1;i<=5;i++){
        if ($("#iii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_iii+=parseInt(nval);
    }



    $("#total_puntaje3").val(tot_iii );

    tamount = tot_iii ;


    if( tamount <2 ){

        document.getElementById("valoracion3").value=" MUY DEFICIENTE";

        document.getElementById("valoracion3").className ="btn btn-danger";


    }if( tamount >1 && tamount <5){

        document.getElementById("valoracion3").value=" DEFICIENTE ";

        document.getElementById("valoracion3").className ="btn btn-primary";

    }if( tamount > 4){

        document.getElementById("valoracion3").value=" ACEPTABLE  ";
        document.getElementById("valoracion3").className ="btn btn-success";
    }





}

*/



function sum_valores4(){
    tot_iiii=0;

    for (i=1;i<=9;i++){
        if ($("#iiii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_iiii+=parseInt(nval);
    }



    $("#total_puntaje4").val(tot_iiii+0);


    tamount = tot_iiii ;


    if( tamount <4 ){

        document.getElementById("valoracion4").value=" MUY DEFICIENTE";

        document.getElementById("valoracion4").className ="btn btn-danger";


    }if( tamount >3 && tamount <6){

        document.getElementById("valoracion4").value=" DEFICIENTE ";

        document.getElementById("valoracion4").className ="btn btn-primary";

    }if( tamount > 5){

        document.getElementById("valoracion4").value=" ACEPTABLE  ";
        document.getElementById("valoracion4").className ="btn btn-success";
    }






}







/*

function sum_valores5(){
    tot_iiiii=0;

    for (i=1;i<=3;i++){
        if ($("#iiiii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_iiiii+=parseInt(nval);
    }





    $("#total_puntaje5").val(tot_iiiii+0);

    tamount = tot_iiiii ;


    if( tamount <2 ){

        document.getElementById("valoracion5").value=" MUY DEFICIENTE";

        document.getElementById("valoracion5").className ="btn btn-danger";


    }if( tamount >1 && tamount <3){

        document.getElementById("valoracion5").value=" DEFICIENTE ";

        document.getElementById("valoracion5").className ="btn btn-primary";

    }if( tamount > 2){

        document.getElementById("valoracion5").value=" ACEPTABLE  ";
        document.getElementById("valoracion5").className ="btn btn-success";
    }




}


*/




function sum_valores6(){
    tot_iiiiii=0;




    for (i=1;i<=4;i++){
        if ($("#iiiiii_"+i.toString()).is(':checked')) nval=1; else nval=0;
        tot_iiiiii+=parseInt(nval);
    }



    $("#total_puntaje6").val(tot_iiiiii+0);



    tamount = tot_iiiiii ;


    if( tamount <2 ){

        document.getElementById("valoracion6").value=" MUY DEFICIENTE";

        document.getElementById("valoracion6").className ="btn btn-danger";


    }if( tamount >1 && tamount <3){

        document.getElementById("valoracion6").value=" DEFICIENTE ";

        document.getElementById("valoracion6").className ="btn btn-primary";

    }if( tamount > 2){

        document.getElementById("valoracion6").value=" ACEPTABLE  ";
        document.getElementById("valoracion6").className ="btn btn-success";
    }








}











function ver(){

  limpiar();
  $('#modalNew').modal('show')
      //$("#nombre").focus();




}



$(function () {

    $('.calificacion').change(function (e) {
        sum_valores2();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });






    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});



/*
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores3();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});

*/

$(function () {

    $('.calificacion').change(function (e) {
        sum_valores4();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});


/*
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores5();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});

*/


$(function () {

    $('.calificacion').change(function (e) {
        sum_valores6();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores7();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores8();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});

$(function () {

    $('.calificacion').change(function (e) {
        sum_valores9();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});


/*
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores10();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});



 */


$(function () {

    $('.calificacion').change(function (e) {
        sum_valores11();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});

$(function () {

    $('.calificacion').change(function (e) {
        sum_valores12();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});
/*
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores13();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});
*/
$(function () {

    $('.calificacion').change(function (e) {
        sum_valores14();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});

$(function () {

    $('.calificacion').change(function (e) {
        sum_valores15();
    });



    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});




$(function () {

    $('.calificacion').change(function (e) {
        sum_valores16();
    });

    $(".select2").select2();

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=76', function(data) {
        var template = $('#tpl_tipo_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#tipo_ipress').html(html);
    });

    $.getJSON('../ajax/tabla.php?op=list&id_tabla=77', function(data) {
        var template = $('#tpl_categoria_ipress').html();
        var html = Mustache.to_html(template, data);
        $('#categoria_ipress').html(html);
    });


    $('#fecha_encuesta').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        autoclose: true,
        singleDatePicker: true,
        singleClasses: "picker_2"
    });


    $('#ubigeo_ipress').select2({
        dropdownParent: $("#modalNew"),
        placeholder: "Seleccione",
        language: {
            inputTooShort: function () {
                return 'digita nombre del Distrito.';
            }
        },
        ajax: {
            type: "GET",
            url: "../ajax/ubigeo.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    op : 'listar'
                };
            },
            results: function (data, page) { // parse the results into the format expected by Select2.

                return { results: data };
            },
            processResults: function (data, params) {

                for (var i = 0; i < data.length; i++) {
                    data[i].id = data[i].id;
                }
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2,
    });

    $('#modalNew').on('shown.bs.modal', function () {
        $('#nombre').focus();
    })

});
















</script>

<script id="tpl_tipo_ipress" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>
<script id="tpl_categoria_ipress" type="text/template"><option value='' selected>--Seleccione--</option>
	{{#tablas}}<option value='{{id}}'>{{nombre}}</option>{{/tablas}}
</script>

  <?php 
ob_end_flush();
?>


