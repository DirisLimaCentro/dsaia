var tabla;

var limitesLima = [
    [-76.90624611115133,-10.274185603200953],[-76.85639448610468,-10.377265603296964],[-76.80833398605972,-10.392964853311602],[-76.77004098602389,-10.464798853378499],[-76.72505436098186,-10.485714728397976],[-76.70178823596011,-10.593544853498393],[-76.65565536091702,-10.646781853547987],[-76.65938073592048,-10.6882528535866],[-76.6334864858963,-10.78452847867625],[-76.58058298584689,-10.866905978752996],[-76.56507661083242,-10.966178978845438],[-76.58016211084652,-11.010841853887047],[-76.53130273580089,-11.036064478910513],[-76.49121286076347,-11.089441353960218],[-76.51840236078887,-11.116078103985025],[-76.49207723576428,-11.189313979053235],[-76.47769611075086,-11.29352885415028],[-76.43174798570799,-11.345562479198751],[-76.3794561106592,-11.44370810429015],[-76.37166498565195,-11.505213354347434],[-76.28678873557278,-11.591232604427553],[-76.22370511051399,-11.562733229401],[-76.1877071104804,-11.592789854429006],[-76.20488273549641,-11.659531104491146],[-76.20232773549405,-11.72804922955497],[-76.13694536043312,-11.780957229604226],[-76.05131111035328,-11.892237979707872],[-76.05258536035447,-11.948236229760015],[-76.01425411031876,-11.98432972979362],[-75.92599086023655,-11.98429422979361],[-75.82407386014157,-12.015687229822818],[-75.76566298508719,-12.05962735486376],[-75.69430473502072,-12.042691354848007],[-75.63775623496807,-12.11418485491456],[-75.66412435999263,-12.194053604988946],[-75.56409610989944,-12.33628898012142],[-75.55740760989322,-12.456590480233434],[-75.53620110987345,-12.517275355289954],[-75.57184060990664,-12.564067855333537],[-75.57961323491386,-12.641484355405629],[-75.551818109888,-12.68142673044281],[-75.57655073491104,-12.715142480474228],[-75.50749998484675,-12.777154855531972],[-75.53108185986869,-12.822207855573941],[-75.61309160994507,-12.866975355615637],[-75.63612460996653,-12.916175230661457],[-75.61439310994628,-12.964933355706847],[-75.67036123499841,-13.022611730760554],[-75.72546436004973,-13.038124980775018],[-75.76215848508393,-13.018888605757096],[-75.80206248512107,-13.060429730795773],[-75.93768286024742,-12.991324855731415],[-76.01193673531661,-13.08549935581913],[-76.15597061045082,-13.19372898091991],[-76.2073199854987,-13.306099981024573],[-76.24479286053362,-13.323513731040771],[-76.43421098571028,-13.090331980823615],[-76.48978323576212,-13.031845730769144],[-76.51380661078456,-12.952091855694892],[-76.50578711077706,-12.9258144806704],[-76.52986136079952,-12.83966798059016],[-76.63568361089833,-12.74333773050047],[-76.67243361093267,-12.62777535539285],[-76.74675786100214,-12.539121105310262],[-76.79930861105127,-12.50908010528228],[-76.77504098602854,-12.437871105215958],[-76.77736136103074,-12.394062480175188],[-76.83602736108561,-12.3174121051038],[-76.93546873617869,-12.250220730041208],[-77.03770898627447,-12.204083979998186],[-77.0310273612682,-12.134027229932977],[-77.1115332363437,-12.079492229882156],[-77.08294048631687,-12.036417854842059],[-77.11754961134935,-11.956969604768062],[-77.0899043613234,-11.901786729716678],[-77.1260484863573,-11.820788104641217],[-77.18709761141463,-11.828361354648262],[-77.16816598639683,-11.73910935456515],[-77.21603711144179,-11.638968729471861],[-77.28003136150194,-11.587447229423843],[-77.30475198652515,-11.512234354353811],[-77.37216798658858,-11.452585979298215],[-77.49814261170724,-11.377154354227864],[-77.64292386184388,-11.304476604160046],[-77.64165423684267,-11.21450972907625],[-77.59234961179608,-11.182080104046113],[-77.6334159868348,-11.054507853927259],[-77.66174998686154,-11.012654353888266],[-77.65782811185781,-10.946505853826668],[-77.750183611945,-10.817740228706633],[-77.74403511193921,-10.794537103685037],[-77.81065623700212,-10.699894478596795],[-77.8862714870736,-10.611919978514722],[-77.83298923702316,-10.567483103473453],[-77.77137648696491,-10.571614603477421],[-77.77244336196587,-10.512478228422333],[-77.79617773698831,-10.483292853395128],[-77.76021161195428,-10.43022122834576],[-77.75292186194731,-10.322154353245125],[-77.69239061189018,-10.320902478244063],[-77.59759311180073,-10.380364103299545],[-77.68391998688222,-10.431385978346931],[-77.7367812369322,-10.56321210346964],[-77.64425973684482,-10.527409103436403],[-77.64073036184152,-10.596271728500533],[-77.57665036178108,-10.58374810348894],[-77.58637223679024,-10.646944853547794],[-77.5771744867816,-10.728570228623814],[-77.49495986170409,-10.7461026036402],[-77.41542998662919,-10.729979978625247],[-77.39530998661024,-10.661539978561535],[-77.31062886153059,-10.567691353474201],[-77.25187111147538,-10.545242228453294],[-77.19098823641822,-10.552132853459764],[-77.17462486140283,-10.464601728378227],[-77.11098636134314,-10.403341853321216],[-77.0716116113062,-10.338103978260454],[-77.02471161126226,-10.327526728250616],[-77.00672023624541,-10.284231728210298],[-76.96545148620675,-10.305378603229993],[-76.90624611115133,-10.274185603200953]
];

function capturarCoordenadas(){
  var latitud = marker.getLatLng().lat; // Obtiene la latitud del marcador
  var longitud = marker.getLatLng().lng;
  $("#latitud").val(latitud.toFixed(6));
  $("#longitud").val(longitud.toFixed(6));

  /*$("#loaderModal").show();
  fetch('https://nominatim.openstreetmap.org/reverse?lat=${latitud}&lon=${longitud}&format=json')
  .then(response => response.json())
  .then(data => {
      $("#loaderModal").hide();
      var direccion = data.display_name; 
      alert("Dirección del Marcador: " + direccion); 
   })
  .catch(error => {
    $("#loaderModal").hide();
    console.error('Error al obtener la dirección:', error);
    alert("Hubo un error al obtener la dirección del marcador.");
  });*/


  $('#modalMapa').modal('toggle');
}


function show_div_depositos(){
  $("#nro_habitantes").val('0')
  $("#cantidad_probable_dengue").val('0')
  $("#cnt_larvicidas").val('0')
  $("#cnt_febriles").val('0')

  for (i=1;i<=10;i++){   
    $("#cnt_tipo_"+i.toString()+"_i").val('0');
    $("#cnt_tipo_"+i.toString()+"_p").val('0');
    $("#cnt_tipo_"+i.toString()+"_t").val('0');
    $("#cnt_tipo_"+i.toString()+"_v").val('0');
    $("#cnt_tipo_"+i.toString()+"_tf").val('0');
    $("#cnt_tipo_"+i.toString()+"_d").val('0');
  }

  if ($("#id_condicion_vivienda").val()=='2'){  //inspeccionados
    $("#div_depositos").show();

    $("#nro_habitantes").prop("disabled", false); 
    $("#cantidad_probable_dengue").prop("disabled", false);
    $("#cnt_larvicidas").prop("disabled", false);
    $("#cnt_febriles").prop("disabled", false);


  }else{
    $("#div_depositos").hide();

    $("#nro_habitantes").prop("disabled", true); 
    $("#cantidad_probable_dengue").prop("disabled", true);
    $("#cnt_larvicidas").prop("disabled", true);
    $("#cnt_febriles").prop("disabled", true);

  }
}



function placeMarker(location) {
  // Crea un marcador en la ubicación donde se hizo clic
  
  /*var marker = new google.maps.Marker({
    position: location,
    map: map
  });*/

  // Muestra las coordenadas en una alerta o haz lo que necesites con ellas
  //alert('Coordenadas: ' + location.lat() + ', ' + location.lng());
  $("#latitud").val(location.lat());
  $("#longitud").val(location.lng());    
  $('#modalMapa').modal('toggle');
}

//Función que se ejecuta al inicio
function init(){
	listar();
  //initMap();
}

function display_paciente(){

  $("#id_tipo_documento_paciente").val('').trigger('change');
  $("#numero_documento_paciente").val('');
  $("#nombres_paciente").val('');
  $("#id_tipo_paciente").val('');
  $("#direccion_ovitrampa").val('');

  if ($("#id_tipo_actividad").val()=='4'){
    $("#div_paciente").show();
    $("#div_ovitrampa").hide();  
  } else if ($("#id_tipo_actividad").val()=='5'){
    $("#div_ovitrampa").show();  
    $("#div_paciente").hide();      
  }else{
    $("#div_paciente").hide();
    $("#div_ovitrampa").hide();
  }
}

function openNuevoPersonal(){
  $('#md_tipo_documento').val("");
  $('#md_numero_documento').val("");
  $('#md_sexo').val("");
  $('#md_nombres').val("");
  $('#md_apellido_paterno').val("");
  $('#md_apellido_materno').val("");
  $('#md_celular').val("");


  $('#modalNewPersonal').modal('show');
}




function saveNewInspector(){

  msj="";

  if ($('#md_tipo_documento').val()==''){
      msj="Seleccione tipo de documento";
  }else if ($('#md_numero_documento').val()==''){
      msj="Ingrese numero de documento de identidad";
  }else if ($('#md_sexo').val()==''){
      msj="Seleccione sexo";
  }else if ($('#md_nombres').val()==''){
      msj="Ingrese nombres";
  }else if ($('#md_apellido_paterno').val()==''){
      msj="Ingrese apellido paterno";
  }else if ($('#md_apellido_materno').val()==''){
      msj="Ingrese apellido materno";
  }

  if (msj){
      return bootbox.alert(msj);
  }

  msj="Esta seguro de guardar el registro";

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
          "id_personal": "",
          "tipo_documento":$('#md_tipo_documento').val().toUpperCase(),
          "numero_documento":$('#md_numero_documento').val().toUpperCase(),
          "sexo": $('#md_sexo').val().toUpperCase(),
          "nombre": $('#md_nombres').val().toUpperCase(),
          "apellido_paterno": $('#md_apellido_paterno').val().toUpperCase(),
          "apellido_materno": $("#md_apellido_materno").val().toUpperCase(),
          "ubigeo": "",
          "direccion": "",
          "telefono": "",
          "celular": $("#md_celular").val(),
          "email": "",
          "autoriza_orden_compra": false,
          "autoriza_requerimiento": false,
          "externo": false,
          "id_condicion_laboral": $('#id_condicion_laboral').val().toUpperCase()
          };


        $.ajax({
          url: "../ajax/personal.php?op=guardaryeditar",
          type: "POST",
          data: parametros,          
          success: function(datos)
          {

            bootbox.alert(datos);

            $.ajax({
              url: '../ajax/personal.php?op=cboPersonal',
              //data:  parametros,
              dataType: 'html',
              success: function ( json ) {
                $("#id_usuario_registro").html( json );
                $("#id_usuario_registro").select2();

              }
            });  

            $('#modalNewPersonal').modal('toggle')
            
          }

        });


      }
    }
  });

}


function buscar_lat_(){

    var direccion = document.getElementById('direccion_familia').value;
    if (!direccion){
      return false;
    }
    $("#loaderModal").show();

            // Realizar la solicitud a Nominatim
            fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + direccion)
            .then(response => response.json())
            .then(data => {
              $("#loaderModal").hide();
              if (data.length > 0) {
                var latitud = data[0].lat;
                var longitud = data[0].lon;
                //console.log('Latitud:', latitud);
                //console.log('Longitud:', longitud);
                //alert('Latitud: ' + latitud + ', Longitud: ' + longitud);

                coordenada=[latitud, longitud];
                if (puntoEnPoligono(coordenada, limitesLima)){ 
                    $("#latitud").val(latitud);
                    $("#longitud").val(longitud);
                }

              } else {
                //$("#latitud").val('');
                //$("#longitud").val('');
                //alert('No se encontraron resultados para la dirección ingresada.');
              }
            })
            .catch(error => {
              $("#loaderModal").hide();
              //console.error('Error al buscar la dirección:', error);
              //alert('Error al buscar la dirección.');
            });
}



function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    var limaBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-12.3393, -77.2200), // Límites suroeste de Lima
            new google.maps.LatLng(-11.9260, -76.7890) // Límites noreste de Lima
    );

    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('direccion_familia')),
        {
            types: ['geocode'],
            bounds: limaBounds,
            strictBounds: true
            //componentRestrictions: { 'country': ['pe'] }

        });

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);


    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -12.0464, lng: -77.0428},
      options: {
        gestureHandling: 'greedy',
        draggableCursor: 'crosshair'
      },
      zoom: 12
    });

    var input = document.getElementById('pac-input');
    searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();
      if (places.length == 0) {
        return;
      }
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var location = place.geometry.location;
        bounds.extend(location);
        console.log('Latitud:', location.lat(), 'Longitud:', location.lng());
      });
      map.fitBounds(bounds);
    });

            // Agrega un evento de clic al mapa para capturar las coordenadas
            google.maps.event.addListener(map, 'click', function(event) {
              //map.setOptions({ draggableCursor: 'crosshair' });
              placeMarker(event.latLng);
            });

            /*google.maps.event.addListener(map, 'mouseup', function() {
              map.setOptions({ draggableCursor: null });
            });*/


    /*map = new google.maps.Map(document.getElementById('map'), {
         zoom: 18,
         gestureHandling: 'greedy',
         streetViewControl: false,
         disableDefaultUI: true,
         mapTypeControl: false,
         center: new google.maps.LatLng(-12.042475148258253, -77.08818063065029),
         mapTypeId: google.maps.MapTypeId.ROADMAP
     });

    marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(-12.042475148258253, -77.08818063065029),
        offset: '0',       
        map: map       
    });*/

  }

function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    lat=place.geometry.location.lat();
    lng=place.geometry.location.lng();
    $("#latitud").val(lat);
    $("#longitud").val(lng);    

  }


function getLocalidades(def){

	var parametros = {
        "op": "listLocalidades",
        "sector": $('#sector').val(),
        "id_local":$("#id_establecimiento").val(),
        "id_default":def,
        "q":"%%"
    };    
    $.ajax({
        data: parametros,
        url: '../ajax/tabla.php',
        type: 'get',
        async: false,
        beforeSend: function () {            
        },
        success: function (response) {
            $("#id_localidad").html(response);
            $("#id_localidad").select2();
        }
    });	

}

function puntoEnPoligono(coordenada, poligono) {
    var latitud = coordenada[0];
    var longitud = coordenada[1];

    var dentro = false;

    for (var i = 0, j = poligono.length - 1; i < poligono.length; j = i++) {
        var xi = poligono[i][0], yi = poligono[i][1];
        var xj = poligono[j][0], yj = poligono[j][1];

        var intersecta = ((yi > latitud) != (yj > latitud)) &&
            (longitud < (xj - xi) * (latitud - yi) / (yj - yi) + xi);
        if (intersecta) dentro = !dentro;
    }

    return dentro;
}


function save_item(){

	  msg='';
      if ($("#direccion_familia").val()==''){
          bootbox.alert("Ingrese direccion o familia");
          return false;  
      }
      if ($("#id_condicion_vivienda").val()==''){
         bootbox.alert("Seleccione una condicion de vivienda");
         return false;  
      }

      id_ubigeo=$("#ubigeo").val()

      if (!id_ubigeo){
         bootbox.alert("Seleccione el distrito");
         return false;  
      }

      cond=$("#id_condicion_vivienda").val();
      
      /*if (cond=='4' && cond =='5' ){ 
        cnt=$("#nro_habitantes").val();
        cnt=cnt.parseInt();  
        if (cnt<=0){
          return bootbox.alert("Ingrese un valor valido para numero de habitantes");
        }
      }*/
      cnt_posi=$("#total_p").html();
      cnt_posi=parseInt(cnt_posi);

      cnt_insp=$("#total_i").html();
      cnt_insp=parseInt(cnt_insp);


      if (cnt_posi>cnt_insp){  //Si hay positivos en cantidad
         return bootbox.alert("La suma total de recipientes positivos no puede ser mayor al total de recipientes inspeccionados"); 
      }






      direc=$("#direccion_familia").val();
      for (var i = 0; i < items_arr.length; i++) {
        if (direc == items_arr[i][1]) {
          //msg = "La direccion o familia ya se agrego a la lista";
          break;
        }
      }

      /*if ($("#id_usuario_registro").val()==''){
      		msg = "Seleccione el personal que realiza la inspección";		
      }*/

      if ($("#cantidad_probable_dengue").val()==''){
      		return bootbox.alert("Ingrese valor 0 en cantidad probable");
      }


      nlatitud=$("#latitud").val().trim();
      nlongitud=$("#longitud").val().trim();

      //alert(latitud);

      if (nlatitud.length>0 && nlongitud.length>0) {
        coordenada=[nlatitud, nlongitud];
        //alert(arregloExterno[0]);
        if (!puntoEnPoligono(coordenada, limitesLima)){  
            //alert("No en limites")
            msg="Latitud y longitud no pertenecen a Lima. Corriga la direccion o elimine el contenido Latitud y Longitud";
        }
      }  

      if (msg){
        return  bootbox.alert(msg);
      }

      cnt_tipo_1_i=$("#cnt_tipo_1_i").val();
      cnt_tipo_1_p=$("#cnt_tipo_1_p").val();

      cnt_tipo_2_i=$("#cnt_tipo_2_i").val();
      cnt_tipo_2_p=$("#cnt_tipo_2_p").val();

      total_tq=$("#total_t").html();
      larv=$("#cnt_larvicidas").val();

      if (parseInt(total_tq)>0){
         /* if (parseFloat(larv)<=0){
              return bootbox.alert("Existen recipientes tratados quimicamente, por favor ingrese larvicidas");
          }*/
      }      



      if (parseInt(cnt_tipo_1_p)>parseInt(cnt_tipo_1_i)){
          msg="La cantidad de Tanques Elevados positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if(parseInt(cnt_tipo_2_p)>parseInt(cnt_tipo_2_i)){
          msg="La cantidad de Tanques Bajos positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_3_p").val())>parseInt($("#cnt_tipo_3_i").val())){
          msg="La cantidad de Barril-Cilindro positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_10_p").val())>parseInt($("#cnt_tipo_10_i").val())){
          msg="La cantidad de Sanson-Bidon positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_4_p").val())>parseInt($("#cnt_tipo_4_i").val())){
          msg="La cantidad de Baldes-Bateas-Tinajas positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_5_p").val())>parseInt($("#cnt_tipo_5_i").val())){
          msg="La cantidad de Llantas positivas no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_6_p").val())>parseInt($("#cnt_tipo_6_i").val())){
          msg="La cantidad de Floreros-Meceteros positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_7_p").val())>parseInt($("#cnt_tipo_7_i").val())){
          msg="La cantidad de Latas,Botellas positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }else if (parseInt($("#cnt_tipo_9_p").val())>parseInt($("#cnt_tipo_9_i").val())){
          msg="La cantidad de Otros positivos no puede ser mayor a la cantidad de inspeccionados"; 
      }

      if (msg){
        //return  bootbox.alert(msg);
      }



      caso_probable_dengue='';
      if ($('#caso_probable_dengue').is(':checked')){
      		caso_probable_dengue='1'
      }

      var aItems= [];
 
      aItems.push({      
      direccion_familia   : direc.toUpperCase(),
      nro_habitantes: $("#nro_habitantes").val(),
      id_condicion_vivienda: $("#id_condicion_vivienda").val(),
      cnt_tipo_1_i: $("#cnt_tipo_1_i").val(),
      cnt_tipo_1_p: $("#cnt_tipo_1_p").val(),
      cnt_tipo_1_t: $("#cnt_tipo_1_t").val(),
      cnt_tipo_1_v: $("#cnt_tipo_1_v").val(),
      cnt_tipo_2_i: $("#cnt_tipo_2_i").val(),
      cnt_tipo_2_p: $("#cnt_tipo_2_p").val(),
      cnt_tipo_2_t: $("#cnt_tipo_2_t").val(),
      cnt_tipo_2_v: $("#cnt_tipo_2_v").val(),
      cnt_tipo_3_i: $("#cnt_tipo_3_i").val(),
      cnt_tipo_3_p: $("#cnt_tipo_3_p").val(),
      cnt_tipo_3_t: $("#cnt_tipo_3_t").val(),
      cnt_tipo_3_v: $("#cnt_tipo_3_v").val(),
      cnt_tipo_4_i: $("#cnt_tipo_4_i").val(),
      cnt_tipo_4_p: $("#cnt_tipo_4_p").val(),
      cnt_tipo_4_t: $("#cnt_tipo_4_t").val(),
      cnt_tipo_4_v: $("#cnt_tipo_4_v").val(),
      cnt_tipo_5_i: $("#cnt_tipo_5_i").val(),
      cnt_tipo_5_p: $("#cnt_tipo_5_p").val(),
      cnt_tipo_5_t: $("#cnt_tipo_5_t").val(),
      cnt_tipo_5_v: $("#cnt_tipo_5_v").val(),
      cnt_tipo_6_i: $("#cnt_tipo_6_i").val(),
      cnt_tipo_6_p: $("#cnt_tipo_6_p").val(),
      cnt_tipo_6_t: $("#cnt_tipo_6_t").val(),
      cnt_tipo_6_v: $("#cnt_tipo_6_v").val(),
      cnt_tipo_7_i: $("#cnt_tipo_7_i").val(),
      cnt_tipo_7_p: $("#cnt_tipo_7_p").val(),
      cnt_tipo_7_t: $("#cnt_tipo_7_t").val(),
      cnt_tipo_7_v: $("#cnt_tipo_7_v").val(),
      cnt_tipo_8_i: $("#cnt_tipo_8_i").val(),
      cnt_tipo_8_p: $("#cnt_tipo_8_p").val(),
      cnt_tipo_8_t: $("#cnt_tipo_8_t").val(),
      cnt_tipo_8_v: $("#cnt_tipo_8_v").val(),
      cnt_tipo_9_i: $("#cnt_tipo_9_i").val(),
      cnt_tipo_9_p: $("#cnt_tipo_9_p").val(),
      cnt_tipo_9_t: $("#cnt_tipo_9_t").val(),
      cnt_tipo_9_v: $("#cnt_tipo_9_v").val(),
      cnt_larvicidas: $("#cnt_larvicidas").val(),
      cnt_febriles: $("#cnt_febriles").val(),
      
      //id_usuario_registro: $("#id_usuario_registro").val(),

      id_usuario_registro: '0',

      caso_probable_dengue : caso_probable_dengue,
      cantidad_probable_dengue: $("#cantidad_probable_dengue").val(),

      cnt_tipo_1_tf: $("#cnt_tipo_1_tf").val(),
      cnt_tipo_1_d: $("#cnt_tipo_1_d").val(),
      cnt_tipo_2_tf: $("#cnt_tipo_2_tf").val(),
      cnt_tipo_2_d: $("#cnt_tipo_2_d").val(),
      cnt_tipo_3_tf: $("#cnt_tipo_3_tf").val(),
      cnt_tipo_3_d: $("#cnt_tipo_3_d").val(),
      cnt_tipo_4_tf: $("#cnt_tipo_4_tf").val(),
      cnt_tipo_4_d: $("#cnt_tipo_4_d").val(),
      cnt_tipo_5_tf: $("#cnt_tipo_5_tf").val(),
      cnt_tipo_5_d: $("#cnt_tipo_5_d").val(),
      cnt_tipo_6_tf: $("#cnt_tipo_6_tf").val(),
      cnt_tipo_6_d: $("#cnt_tipo_6_d").val(),
      cnt_tipo_7_tf: $("#cnt_tipo_7_tf").val(),
      cnt_tipo_7_d: $("#cnt_tipo_7_d").val(),
      cnt_tipo_8_tf: $("#cnt_tipo_8_tf").val(),
      cnt_tipo_8_d: $("#cnt_tipo_8_d").val(),
      cnt_tipo_9_tf: $("#cnt_tipo_9_tf").val(),
      cnt_tipo_9_d: $("#cnt_tipo_9_d").val(),

      cnt_tipo_10_i: $("#cnt_tipo_10_i").val(),
      cnt_tipo_10_p: $("#cnt_tipo_10_p").val(),
      cnt_tipo_10_t: $("#cnt_tipo_10_t").val(),
      cnt_tipo_10_v: $("#cnt_tipo_10_v").val(),
      cnt_tipo_10_tf: $("#cnt_tipo_10_tf").val(),      
      cnt_tipo_10_d: $("#cnt_tipo_10_d").val(),

      latitud: $("#latitud").val(),
      longitud: $("#longitud").val()    


 	}); 



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
                url: "../ajax/ficha_vivienda.php?op="+$op,
                //dataType: "json",
                //data: JSON.stringify({ paramName: info }),
                data : {
                  id_ficha: $("#id_ficha").val(),
                  id_ficha_detalle: id_ficha_detalle,
                  detalle: aItems,
                  id_ubigeo: $("#ubigeo").val()
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

function open_new_item(id,user,id_ubigeo,distrito){
	if (user!=$("#s_login").val()){
		//return alert("Ud no puede ingresar registros en esta ficha");
	}

	//dat=table.rows({selected:  true}).data();
	//console.log(table.rows(2).data());
  $("#div_depositos").hide();

	$("#id_ficha").val(id);
	$("#id_ficha_detalle").val('');
	$("#direccion_familia").val("");
	$("#nro_habitantes").val('0');
	$("#id_condicion_vivienda").val('');


	$("#latitud").val('');
	$("#longitud").val('');

  //$("#ubigeo").val('');  

  //$("#ubigeo").html("<option value='" + $("#s_ubigeo_establecimiento").val() + "' selected>" + $("#s_distrito").val()  + "</option>").change();

  $("#ubigeo").html("<option value='" + id_ubigeo + "' selected>" + distrito  + "</option>").change();



	$("#cnt_larvicidas").val('0');
	$("#cnt_febriles").val('0');

	$("#cantidad_probable_dengue").val('0');

	for (i=1;i<=10;i++){   
		$("#cnt_tipo_"+i.toString()+"_i").val('0');
		$("#cnt_tipo_"+i.toString()+"_p").val('0');
		$("#cnt_tipo_"+i.toString()+"_t").val('0');
		$("#cnt_tipo_"+i.toString()+"_v").val('0');

		$("#cnt_tipo_"+i.toString()+"_tf").val('0');
		$("#cnt_tipo_"+i.toString()+"_d").val('0');
	}

	sum_valores();


	$('#modalItem').modal('show');
}

function createDataTable(id,user){
  //alert(id_ubigeo+distrito);
	tbl="dt"+id;
				  dt=$('#'+tbl).DataTable({
	              dom: "Blftip",

	              "buttons": [
	              {
	              	text: '<i class="glyphicon glyphicon-plus"></i> Nuevo',
	              	className: "btn btn-info btn-sm",
	              	action: function ( e, dt, node, config ) {
	              		open_new_item(id,user,$("#cboid_ubigeo").val(),$("#cbotext_ubigeo").val());
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
				    { "orderable": false, "targets": 1, "searchable": false },
				    { "orderable": true, "targets": 2, "searchable": true /*, className: "wrapok"*/},
				    { "orderable": false, "targets": 3, "searchable": false },
				    { "orderable": false, "targets": 4, "searchable": false },
				    { "orderable": false, "targets": 5, "searchable": false },
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
				    { "orderable": false, "targets": 18, "searchable": false },
				    { "orderable": false, "targets": 19, "searchable": false },
				    { "orderable": false, "targets": 20, "searchable": false },

				    { "orderable": false, "targets": 21, "searchable": false },
				    { "orderable": false, "targets": 22, "searchable": false },
				    { "orderable": false, "targets": 23, "searchable": false },
				    { "orderable": false, "targets": 24, "searchable": false },
				    { "orderable": false, "targets": 25, "searchable": false },
				    { "orderable": false, "targets": 26, "searchable": false },
				    { "orderable": false, "targets": 27, "searchable": false },
				    { "orderable": false, "targets": 28, "searchable": false },
				    { "orderable": false, "targets": 29, "searchable": false },
				    { "orderable": false, "targets": 30, "searchable": false },

				    { "orderable": false, "targets": 31, "searchable": false },
				    { "orderable": false, "targets": 32, "searchable": false },
				    { "orderable": false, "targets": 33, "searchable": false },
				    { "orderable": false, "targets": 34, "searchable": false },
				    { "orderable": false, "targets": 35, "searchable": false },
				    { "orderable": false, "targets": 36, "searchable": false },
				    { "orderable": false, "targets": 37, "searchable": false },
				    { "orderable": false, "targets": 38, "searchable": false },
				    { "orderable": false, "targets": 39, "searchable": false },
				    { "orderable": false, "targets": 40, "searchable": false },

				    { "orderable": false, "targets": 41, "searchable": false }
			


				    
				  ],  


	              "pagingType": 'numbers',
	              "bAutoWidth": false ,
	              "iDisplayLength": 10
	            });
}

function downReport(tipo){

  tipoReport=$('input[name="optTipoReport"]:checked').val();
  

	var cntCat=document.getElementById('cboalmacen').length;
	strCat=$("#cboalmacen").val();
	strCat=strCat.toString();
	var aCat=strCat.split(",");
	var cntSel=aCat.length;
	if (cntCat==cntSel){
		strCat="*";
	}


  var cntCatMes=document.getElementById('mes_report').length;
  strCatMes=$("#mes_report").val();
  strCatMes=strCatMes.toString();
  var aCatMes=strCatMes.split(",");
  var cntSel=aCatMes.length;

  if (cntSel && cntSel<=0){
    return bootbox.alert('Seleccione al menos un mes');
  }


  if (cntCatMes==cntSel){
    strCatMes="*";
  }


	if (tipo=='R'){
		report="xlsResumenFichaAedes.php";
	}else{
		//report="xlsResumenFichaAedesDetalle.php";
    report="xlsResumenFichaAedesDetalleTable.php";
	}

	document.getElementById('aDwn').setAttribute('href',"../reportes/"+report+"?tipo="+tipoReport+"&desde="+$("#date_from").val()+"&hasta="+$("#date_to").val()+"&mes="+strCatMes+"&anio="+$('#anio_report').val()+"&id_establecimiento="+strCat);
    document.getElementById('aDwn').click();  
}




function open_ficha(id){
	$.post("../ajax/ficha_vivienda.php?op=mostrar",{id_ficha : id}, function(data, status)
	{
		items_arr = [];
    	id_items = 1;
    	editItem=false;
		data = JSON.parse(data);
		$("#hid_local").val(data.id_local);
		
    //$("#establecimiento").val(data.establecimiento);

    $("#id_establecimiento").val(data.id_local).trigger('change');

		$("#id_ficha").val(data.id);
		$("#distrito").val(data.distrito);
		$("#fecha_inicio").val(data.fecha_inicio);
		$("#fecha_termino").val(data.fecha_termino);
		$("#sector").val(data.sector);




		getLocalidades(data.id_localidad);
		//$('#id_localidad').append("<option value='"+data.id_localidad+"' selected='selected'>"+data.localidad+"</option>");

		//$("#id_localidad").val(data.id_localidad);
		$("#id_tipo_actividad").val(data.id_tipo_actividad).trigger('change');

    $("#id_tipo_documento_paciente").val(data.id_tipo_documento_paciente);
    $("#numero_documento_paciente").val(data.numero_documento_paciente);
    $("#nombres_paciente").val(data.nombres_paciente);

    $("#id_tipo_paciente").val(data.id_tipo_paciente);
    $("#direccion_ovitrampa").val(data.direccion_ovitrampa);
    $("#id_usuario_registro").val(data.id_usuario_inspector).trigger('change'); 


		$.each(data.detalle, function( i, item ){
 				var data = [ 
 				  /*00*/id_items,
                  /*01*/item.direccion_familia,
                  		item.nro_habitantes,
                  		item.id_condicion_vivienda,
                  /*05*/item.condicion_vivienda,
                  		item.cnt_tipo_1_i,
						item.cnt_tipo_1_p,
						item.cnt_tipo_1_t,
						item.cnt_tipo_1_v,
						item.cnt_tipo_2_i,
						item.cnt_tipo_2_p,
						item.cnt_tipo_2_t,
						item.cnt_tipo_2_v,
						item.cnt_tipo_3_i,
						item.cnt_tipo_3_p,
						item.cnt_tipo_3_t,
						item.cnt_tipo_3_v,
						item.cnt_tipo_4_i,
						item.cnt_tipo_4_p,
						item.cnt_tipo_4_t,
						item.cnt_tipo_4_v,
						item.cnt_tipo_5_i,
						item.cnt_tipo_5_p,
						item.cnt_tipo_5_t,
						item.cnt_tipo_5_v,
						item.cnt_tipo_6_i,
						item.cnt_tipo_6_p,
						item.cnt_tipo_6_t,
						item.cnt_tipo_6_v,
						item.cnt_tipo_7_i,
						item.cnt_tipo_7_p,
						item.cnt_tipo_7_t,
						item.cnt_tipo_7_v,
						item.cnt_tipo_8_i,
						item.cnt_tipo_8_p,
						item.cnt_tipo_8_t,
						item.cnt_tipo_8_v,
						item.cnt_tipo_9_i,
						item.cnt_tipo_9_p,
						item.cnt_tipo_9_t,
						item.cnt_tipo_9_v,

						item.tot_i,
						item.tot_p,
						item.tot_t,
						item.tot_l,

						item.cnt_larvicidas,
						item.tot_p,
						item.cnt_febriles

                  
                ];
			    items_arr.push(data);
			    id_items++;            
 		});
 		renderDetalle();





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
	tot_i=0;tot_p=0;tot_t=0;tot_l=0;tot_tf=0;tot_d=0;
	for (i=1;i<=10;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_i").val();
		tot_i+=parseInt(nval);
	}

	for (i=1;i<=10;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_p").val();
		tot_p+=parseInt(nval);
	}

	for (i=1;i<=10;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_t").val();
		tot_t+=parseInt(nval);
	}

  for (i=1;i<=10;i++){    
    nval=$("#cnt_tipo_"+i.toString()+"_tf").val();
    tot_tf+=parseInt(nval);
  }

	for (i=1;i<=10;i++){		
		nval=$("#cnt_tipo_"+i.toString()+"_v").val();
		tot_l+=parseInt(nval);
	}

  for (i=1;i<=10;i++){    
    nval=$("#cnt_tipo_"+i.toString()+"_d").val();
    tot_d+=parseInt(nval);
  }




	$("#total_i").html(tot_i);
	$("#total_p").html(tot_p);
	$("#total_t").html(tot_t);
	$("#total_v").html(tot_l);

  $("#total_tf").html(tot_tf);
  $("#total_d").html(tot_d);

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
      	

      	calculoTotal();


		$("#modalOrdenCompra").modal('toggle')
		$("#modalTitle").html('Nueva Compra');
	 	$('#modalNew').modal('show');	

	 });

	
}




//Función limpiar_modal_local
//Función limpiar

function action_show_item(id,id_ficha){
	
	$("#id_ficha_detalle").val(id);
	$("#id_ficha").val(id_ficha);
	$.ajax({
		type: "GET",
		url: "../ajax/ficha_vivienda.php?op=getItem",
		dataType: "json",
		//data: JSON.stringify({ paramName: info }),
		data : {		   	
		  	id: id
		},
		success: function(data){
			
			//$("#numero_lote").val(data.numero_lote);
			$("#direccion_familia").val(data[0]['direccion_familia']);
			$("#nro_habitantes").val(data[0]['nro_habitantes']);


			$("#latitud").val(data[0]['latitud']);
			$("#longitud").val(data[0]['longitud']);



			$("#id_condicion_vivienda").val(data[0]['id_condicion_vivienda']);

			$("#cnt_tipo_1_i").val(data[0]['cnt_tipo_1_i']);
			$("#cnt_tipo_1_p").val(data[0]['cnt_tipo_1_p']);
			$("#cnt_tipo_1_t").val(data[0]['cnt_tipo_1_t']);
			$("#cnt_tipo_1_v").val(data[0]['cnt_tipo_1_v']);

			$("#cnt_tipo_2_i").val(data[0]['cnt_tipo_2_i']);
			$("#cnt_tipo_2_p").val(data[0]['cnt_tipo_2_p']);
			$("#cnt_tipo_2_t").val(data[0]['cnt_tipo_2_t']);
			$("#cnt_tipo_2_v").val(data[0]['cnt_tipo_2_v']);

			$("#cnt_tipo_3_i").val(data[0]['cnt_tipo_3_i']);
			$("#cnt_tipo_3_p").val(data[0]['cnt_tipo_3_p']);
			$("#cnt_tipo_3_t").val(data[0]['cnt_tipo_3_t']);
			$("#cnt_tipo_3_v").val(data[0]['cnt_tipo_3_v']);

			$("#cnt_tipo_4_i").val(data[0]['cnt_tipo_4_i']);
			$("#cnt_tipo_4_p").val(data[0]['cnt_tipo_4_p']);
			$("#cnt_tipo_4_t").val(data[0]['cnt_tipo_4_t']);
			$("#cnt_tipo_4_v").val(data[0]['cnt_tipo_4_v']);

			$("#cnt_tipo_5_i").val(data[0]['cnt_tipo_5_i']);
			$("#cnt_tipo_5_p").val(data[0]['cnt_tipo_5_p']);
			$("#cnt_tipo_5_t").val(data[0]['cnt_tipo_5_t']);
			$("#cnt_tipo_5_v").val(data[0]['cnt_tipo_5_v']);

			$("#cnt_tipo_6_i").val(data[0]['cnt_tipo_6_i']);
			$("#cnt_tipo_6_p").val(data[0]['cnt_tipo_6_p']);
			$("#cnt_tipo_6_t").val(data[0]['cnt_tipo_6_t']);
			$("#cnt_tipo_6_v").val(data[0]['cnt_tipo_6_v']);

			$("#cnt_tipo_7_i").val(data[0]['cnt_tipo_7_i']);
			$("#cnt_tipo_7_p").val(data[0]['cnt_tipo_7_p']);
			$("#cnt_tipo_7_t").val(data[0]['cnt_tipo_7_t']);
			$("#cnt_tipo_7_v").val(data[0]['cnt_tipo_7_v']);

			$("#cnt_tipo_8_i").val(data[0]['cnt_tipo_8_i']);
			$("#cnt_tipo_8_p").val(data[0]['cnt_tipo_8_p']);
			$("#cnt_tipo_8_t").val(data[0]['cnt_tipo_8_t']);
			$("#cnt_tipo_8_v").val(data[0]['cnt_tipo_8_v']);

			$("#cnt_tipo_9_i").val(data[0]['cnt_tipo_9_i']);
			$("#cnt_tipo_9_p").val(data[0]['cnt_tipo_9_p']);
			$("#cnt_tipo_9_t").val(data[0]['cnt_tipo_9_t']);
			$("#cnt_tipo_9_v").val(data[0]['cnt_tipo_9_v']);


			$("#cnt_larvicidas").val(data[0]['cnt_larvicidas']);

			$("#cnt_febriles").val(data[0]['cnt_febriles']);

			$("#cantidad_probable_dengue").val(data[0]['cantidad_probable_dengue']);

			$("#id_usuario_registro").val(data[0]['id_usuario_registro']);


			$("#cnt_tipo_10_i").val(data[0]['cnt_tipo_10_i']);
			$("#cnt_tipo_10_p").val(data[0]['cnt_tipo_10_p']);
			$("#cnt_tipo_10_t").val(data[0]['cnt_tipo_10_t']);
			$("#cnt_tipo_10_v").val(data[0]['cnt_tipo_10_v']);
			$("#cnt_tipo_10_tf").val(data[0]['cnt_tipo_10_tf']);
			$("#cnt_tipo_10_d").val(data[0]['cnt_tipo_10_d']);


			$("#cnt_tipo_1_tf").val(data[0]['cnt_tipo_1_tf']);
			$("#cnt_tipo_1_d").val(data[0]['cnt_tipo_1_d']);
			$("#cnt_tipo_2_tf").val(data[0]['cnt_tipo_2_tf']);
			$("#cnt_tipo_2_d").val(data[0]['cnt_tipo_2_d']);
			$("#cnt_tipo_3_tf").val(data[0]['cnt_tipo_3_tf']);
			$("#cnt_tipo_3_d").val(data[0]['cnt_tipo_3_d']);
			$("#cnt_tipo_4_tf").val(data[0]['cnt_tipo_4_tf']);
			$("#cnt_tipo_4_d").val(data[0]['cnt_tipo_4_d']);
			$("#cnt_tipo_5_tf").val(data[0]['cnt_tipo_5_tf']);
			$("#cnt_tipo_5_d").val(data[0]['cnt_tipo_5_d']);
			$("#cnt_tipo_6_tf").val(data[0]['cnt_tipo_6_tf']);
			$("#cnt_tipo_6_d").val(data[0]['cnt_tipo_6_d']);
			$("#cnt_tipo_7_tf").val(data[0]['cnt_tipo_7_tf']);
			$("#cnt_tipo_7_d").val(data[0]['cnt_tipo_7_d']);
			$("#cnt_tipo_8_tf").val(data[0]['cnt_tipo_8_tf']);
			$("#cnt_tipo_8_d").val(data[0]['cnt_tipo_8_d']);
			$("#cnt_tipo_9_tf").val(data[0]['cnt_tipo_9_tf']);
			$("#cnt_tipo_9_d").val(data[0]['cnt_tipo_9_d']);


      $("#ubigeo").html("<option value='" + data[0]['id_ubigeo'] + "' selected>" + data[0]['distrito']  + "</option>").change();


			//$("#id_usuario_registro").trigger('change');


			if (data[0]['caso_probable_dengue']=='1'){
				$("#caso_probable_dengue").prop( "checked", true );
			}else{
				$("#caso_probable_dengue").prop( "checked", false );
			}


      if ($("#id_condicion_vivienda").val()=='2'){ //vivi inspeccionada
          $("#div_depositos").show();
          $("#nro_habitantes").prop("disabled", false); 
          $("#cantidad_probable_dengue").prop("disabled", false);
          $("#cnt_larvicidas").prop("disabled", false);
          $("#cnt_febriles").prop("disabled", false);

      }else{
          $("#div_depositos").hide();
          $("#nro_habitantes").prop("disabled", true); 
          $("#cantidad_probable_dengue").prop("disabled", true);
          $("#cnt_larvicidas").prop("disabled", true);
          $("#cnt_febriles").prop("disabled", true);

      }


			sum_valores();

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
					url: "../ajax/ficha_vivienda.php?op=removeItem",
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
		url: '../ajax/ficha_vivienda.php?op=detalleFicha&id_usuario='+$("#s_id_usuario").val(),
		data:  parametros,
		dataType: 'html',
		success: function ( json ) {
			$("#row_"+row).html( json );
			createDataTable(row,$("#s_login").val());
		}
	} );
}

//Función Listar
function listar()
{
	function format ( rowData ) {

    $("#cboid_ubigeo").val(rowData[13]);
    $("#cbotext_ubigeo").val(rowData[14]);
		
		var parametros = {"id":rowData[0]};
		var div = $("<div id='row_"+rowData[0]+"' >")
		.addClass( 'Cargando' )
		.text( 'Cargando...' );
		$.ajax( {
			url: '../ajax/ficha_vivienda.php?op=detalleFicha&id_usuario='+$("#s_id_usuario").val(),
			data:  parametros,
			dataType: 'html',
			success: function ( json ) {
				div
				.html( json )
				.removeClass( 'loading' );

				 createDataTable(rowData[0],rowData[9]);
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

		buttons: [
		{
			extend: 'collection',
			text: "Nuevo <span class='caret'></span>",
			className: "btn btn-success  dropdown-toggle",
			autoClose: true,
			select: true,
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
      	"sAjaxSource": "../ajax/ficha_vivienda.php?op=listar&id_nivel="+$("#s_id_nivel").val()+"&id_usuario="+$("#s_id_usuario").val()+"&id_local="+$("#s_id_local").val(), // Load Data
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
		{ "orderable": true,	"targets": 5,	"searchable": true },
		{ "orderable": true,	"targets": 6,	"searchable": true },
		{ "orderable": true,	"targets": 7,	"searchable": true },
		{ "orderable": true,	"targets": 8,	"searchable": true },
		{ "orderable": true,	"targets": 9,	"searchable": true },
		{ "orderable": true,	"targets": 10,	"searchable": true },
    { "orderable": true,  "targets": 11,  "searchable": true },
    { "orderable": true,  "targets": 12,  "searchable": false },

    { "orderable": true,  "targets": 13,  "searchable": false },
    { "orderable": true,  "targets": 14,  "searchable": false }

		],

		"createdRow": function( row, data, dataIndex){
			if( data[11] ==  'f'){
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
			{ aTargets: 'ta.descripcion' },
			{ aTargets: 'f.fecha_inicio' },
			{ aTargets: 'f.fecha_termino' },
			{ aTargets: 'f.sector' },
			{ aTargets: 'lo.descripcion' },
      { aTargets: 'f.nombres_paciente' },
			{ aTargets: 'uc.login' },
			{ aTargets: 'fecha_creacion' },
      { aTargets: 'inspector' },

      { aTargets: 'id_ubigeo' },
      { aTargets: 'distrito' }

			],

		"pagingType": 'full_numbers',
		"iDisplayLength": 10,//Paginación
	    "order": [[ 11, "des" ]]//Ordenar (columna,orden)

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
		var data = table.row( this ).data();
		console.log(data);

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
				$.post("../ajax/ficha_vivienda.php?op=desactivar", {id_ficha : id}, function(e){
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
				$.post("../ajax/ficha_vivienda.php?op=activar", {id_ficha : id}, function(e){
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
