<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapa</title>
        <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkz-BhCJcWq35bx6vEpFTn4KtKYCm-OQE&libraries=places">
        </script>
        @yield('content')
        <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js">
        </script>
<script type="text/javascript">
 
var map      = null;
var geocoder = null;
  
function load() {
 
var $lat_array= "<?php echo $lat_array; ?>";
var $lng_array= "<?php echo $lng_array; ?>";
 
 
 map = new GMap2(document.getElementById("map"));
 map.setCenter(new GLatLng(coordenada1,coordenada2), 15);
 map.addControl(new GSmallMapControl());
 map.addControl(new GMapTypeControl());
 geocoder = new GClientGeocoder();
     }
 function showAddress(address, zoom) {
 
if (geocoder) {
          geocoder.getLatLng(address,
             function(point) {
               if (!point) {
                alert(address + " not found");
               } else {
                map.setCenter(point, zoom);
                var marker = new GMarker(point);
                map.addOverlay(marker);
                document.form_mapa.coordenadas1.value = point.y;
                document.form_mapa.coordenadas2.value = point.x;
                  }
 
                }
 
         );
 
       }}
</script>
</head>
 
<body onLoad="load();"  onunload="GUnload();"> 
<center>
<div align="center" id="map" style="height: 425px; width: 425px;">
</div>
</center> 
</body>
</html>