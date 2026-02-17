<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="../public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<title>Seleccione una ubicacion moviendo el marcador en el mapa</title>
</head>
<style type="text/css">
	#map {
          height: 400px;
          width: 100%;
          /*cursor: crosshair;*/
      }
</style>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<!-- jQuery -->
<script src="../public/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../public/bootstrap/dist/js/bootstrap.min.js"></script>
<body>

<div class="container body">
      <div class="main_container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div id="map" style="border-style: solid; border-width: 1px;"></div>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<button type="button" class="btn btn-info" onclick="capturarCoordenadas();" ><i class="fa map-marker"></i> Capturar coordenadas</button>

					<button type="button" class="btn btn-secondary" onclick="window.close();"><i class="fa fa-remove"></i> Cerrar</button>
				</div>
			</div>		
		</div>
</div>	

</body>
<script>
	 var map = L.map('map').setView([-12.0464, -77.0428], 13); // Establece la vista del mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
     }).addTo(map); // Añade la capa del mapa base



    var geocoder = L.Control.geocoder().addTo(map);

    //var marker = L.marker([-12.0464, -77.0428]).addTo(map);
    var marker = L.marker([-12.0464, -77.0428], { // Example coordinates in Paris
      icon: new L.Icon({
        iconUrl: 'pointer.png', // Replace with your icon path
        //iconSize: [32, 32] // Adjust icon size
      })
    });

    map.addLayer(marker)

    map.on('move', function(e) {
            var latlng = map.getCenter(); // Obtiene la nueva posición central del mapa
            marker.setLatLng(latlng); // Actualiza la posición del marcador
    });

    map.on('click', onMapClick);

    // Expande automáticamente el cuadro de búsqueda
    //geocoder.expand();

    // Función para manejar el evento de clic en el mapa
    function onMapClick(e) {
          //alert("Coordenadas: " + e.latlng.lat.toFixed(6) + ", " + e.latlng.lng.toFixed(6));         
        //$("#latitud").val(e.latlng.lat.toFixed(6));
        //$("#longitud").val(e.latlng.lng.toFixed(6));  
        //$('#modalMapa').modal('toggle'); 
        window.opener.document.getElementById('latitud').value=e.latlng.lat.toFixed(6);
        window.opener.document.getElementById('longitud').value=e.latlng.lng.toFixed(6);
        window.close();
    }

    function capturarCoordenadas(){
    	var latitud = marker.getLatLng().lat; // Obtiene la latitud del marcador
		var longitud = marker.getLatLng().lng;
		
		window.opener.document.getElementById('latitud').value=latitud.toFixed(6);
        window.opener.document.getElementById('longitud').value=longitud.toFixed(6);
        window.close();
    }

    
</script>
</html>