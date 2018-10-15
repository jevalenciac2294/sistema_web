<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <script src="//github.hubspot.com/tether/dist/js/tether.js"></script>
        <link rel='stylesheet' type='text/css' href='{{url()}}/bootstrap/css/bootstrap.min.css' />
        <script type='text/javascript' src='{{url()}}/bootstrap/js/jquery.js'>
        </script>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type='text/javascript' src='{{url()}}/bootstrap/js/bootstrap.min.js'>
        </script>
        
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    </head>
    <body>
        



        
        
<!--    <div>
    <label for="origen">Origen</label>
    <input type="text" name="origen" id="origen" placeholder="calle, ciudad, estado..." />
    <br />
    <label for="destino">Destino</label>
    <input type="text" name="destino" id="destino" placeholder="calle, ciudad, estado..." />
    <br />
    <input type="button" id="buscar" value="Buscar ruta"  />
</div>
<br />
<div id="map">  </div>
<h3>Opciones</h3>

<div id="rutaOps">
    <select id="modo_viaje" class="opciones_ruta">
        <option value="DRIVING" selected="selected">Auto</option>
        <option value="BICYCLING">Bicicleta</option>
        <option value="WALKING">Caminando</option>
    </select>
    <select id="tipo_sistema" class="opciones_ruta">
        <option value="METRIC" selected="selected">Métrico</option>
        <option value="IMPERIAL">Imperial</option>
    </select>
</div>
<br />
<div>
    <div id="map_canvas" style="float:left; width:70%; height:500px"></div>
    <div id="panel_ruta" style="float:right; overflow: auto; width:30%; height: 500px"></div>
</div>
<script>
        
var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();

var request = {
 origin: $('#origen').val(),
 destination: $('#destino').val(),
 travelMode: google.maps.DirectionsTravelMode[$('#modo_viaje').val()],
 unitSystem: google.maps.DirectionsUnitSystem[$('#tipo_sistema').val()],
 provideRouteAlternatives: true
 };

 directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel($("#panel_ruta").get(0));
        directionsDisplay.setDirections(response);
    } else {
            alert("No existen rutas entre ambos puntos");
    }
});

$('#buscar').live('click', function(){
    rockAndRoll();
});
 
$('.opciones_ruta').live('change', function(){
    rockAndRoll();
});             
</script>-->

        <!--<div class="container" style="padding-top: 40px ">-->
            @yield('content')
            
<!--        </div>-->
    </body>
</html>
