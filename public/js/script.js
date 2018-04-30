$(document).ready(function(){
    
    var map;
    var myLatLng;
    var pathCoordinates;
    var position;
    var inicio;
    var directionsDisplay;
    var directionsService;
var rendererOptions = {
  draggable: true  
};

    geoLocationInit();
    function geoLocationInit() {
        // Cuando la bandera pintar es true, se dibuja la ruta
        // De lo contrario se pinta lo que llega de la bd
        
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
pathCoordinates = Array();
inicio=true;

//initMap();
    }
    
    

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        myLatLng = new google.maps.LatLng(latval, lngval);
        createMap(myLatLng);
        // nearbySearch(myLatLng, "school");
        //searchRutas(latval,lngval);
        
    }

    function fail() {
        alert("it fails");
    }
    //Create Map
    function createMap(myLatLng) {
            map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });
        map.addListener('click', function(e) {
            
         placeMarkerAndPanTo(e.latLng, map);
         
  });
  
        directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);
  
        if(banderaPintar == false){
            pintarGuardado();
//            for (i in ubicacionesDeRuta){
//              console.log(ubicacionesDeRuta[i].lat);
//            }
        }
}

function placeMarkerAndPanTo(latLng) {
        // Cuando la bandera pintar es true, se dibuja la ruta
        // De lo contrario se pinta lo que llega de la bd por lo que esta funcion no se usa
        if(banderaPintar == false){
            return true;
        }
//    var point = new google.maps.LatLng(latLng);

        pathCoordinates.push(latLng);
        if(inicio){
            $('#lat').val(latLng.lat());
            $('#lng').val(latLng.lng());
            inicio = false;
            return true;
        }
        var myLatLngOrigin = pathCoordinates[0];
        var mywaypoints = Array();
        for (var i = 1; i < pathCoordinates.length - 1 && pathCoordinates.length > 2 ; i++) {
            var w = {
                location: { lat: pathCoordinates[i].lat(), lng: pathCoordinates[i].lng() },
                stopover: false
              };
            mywaypoints.push(w);
        }
        directionsService.route({
            origin: myLatLngOrigin,//db waypoint start
            destination: latLng,//db waypoint end
            waypoints: mywaypoints,
            travelMode: google.maps.TravelMode.DRIVING
            
        }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Ha fallat la comunicació amb el mapa a causa de: ' + status);
            }
        });
        $('#lat').val($('#lat').val()+'/'+latLng.lat());
        $('#lng').val($('#lng').val()+'/'+latLng.lng());
//        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
//
//google.maps.event.addListener(searchBox, 'place', function(){
//     var places = searchBox.getPlaces();
//     var bounds = new google.maps.LatLngBounds();
//     var i, place;
//     
//     for(i =0; place=places[i]; i++){
//         bounds.extend(place.geometry.location);
//         w.setPosition(place.geometry.location);//marca la nueva posicion
//     }
//     map.fitBounds(bounds);
//     map.setZoom(15);
//});
        
  //add map
  
//  a=JSON.stringify(marker.position);
//  console.log(a);
//  console.log(JSON.stringify(marker.position));
//  alert('a: ' + marker.position.get(0));
  //
  //pathCoordinates.push(marker.position);
  console.log(pathCoordinates);
//  drawPath();
//  map.panTo(latLng);
  
        
//        map.addListener('center_changed', function() {
//    // 3 seconds after the center of the map has changed, pan back to the
//     marker.window.setTimeout(function() {
//        map.panTo(marker.getPosition());
//            });
//        });
//
//  marker.addListener('click', function() {
//        map.setZoom(8);
//        map.setCenter(marker.getPosition());
//        });
    }

function pintarGuardado() {
        var inicio = true;
        var puntoInicio = {};
        var puntosMedios = Array();
        var puntoFinal = {};
        for (i in ubicacionesDeRuta){
            var puntoActual = new google.maps.LatLng(ubicacionesDeRuta[i].lat, ubicacionesDeRuta[i].lng);
//            var puntoActual = {lat: ubicacionesDeRuta[i].lat, lng: ubicacionesDeRuta[i].lng};
            if(inicio){
                puntoInicio = puntoActual;
                inicio = false;
            }else{
                var w = {
                    location: puntoActual,
                    stopover: false
                };
                puntosMedios.push(w);
//                puntosMedios.push(puntoActual);
            }
            puntoFinal = puntoActual;
        }
        
        
        
        directionsService.route({
            origin: puntoInicio,//db waypoint start
            destination: puntoFinal,//db waypoint end
            waypoints: puntosMedios,
            travelMode: google.maps.TravelMode.DRIVING
            
        }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Fallo al trazar ruta: ' + status);
            }
        });
    }
    
    
});

// function drawPath() {
//                new google.maps.Polyline({
//                        path : pathCoordinates,
//                        geodesic : true,
//                        strokeColor : '#FF0000',
//                        strokeOpacity : 1,
//                        strokeWeight : 4,
//                        map : map
//                });
//        }
//        var objConfigDR = {
//            map: map
//        }
//        var objConfigDS = {
//            origin: myLatLng,
//            destination: pathCoordinates,
//            travelMode: google.maps.TravelMode.DRIVING
//        }
//        
//        var ds = new google.maps.DirectionsService();
//        //obtener coordenadas
//        var dr = new google.maps.DirectionsRenderer(objConfigDR);
//        //traduce las coordenada a una ruta visible
//        
//        ds.route(objConfigDS, fnrutear);
//        function fnrutear(resultados, status){
//            //mostrar la linea entre A y B
//            if(status == 'OK'){
//                dr.serDirections(resultados);
//            }else{
//                alert('error'+status);
//            }
        
//               
//        map.event.addListener(map, 'click', function(event) {
//   var marker = new google.maps.Marker({
//        position: event.myLatLng, 
//        map: map
//    });
//    map.panTo(position);
//});
//        var marker = new google.maps.Marker({
//            position: myLatLng,
//            map: map
//        });
    
    //Create marker
//    function createMarker(latlng, icn, name) {
//        var marker = new google.maps.Marker({
//            position: latlng,
//            map: map,
//            icon: icn,
//            title: name
//        });
//        map.addListener('center_changed', function() {
//    // 3 seconds after the center of the map has changed, pan back to the
//    // marker.
//    window.setTimeout(function() {
//      map.panTo(marker.getPosition());
//    }, 3000);
//  });
//
//  marker.addListener('click', function() {
//    map.setZoom(8);
//    map.setCenter(marker.getPosition());
//  });
//}
//
//        function initMap() {
//  var map = new google.maps.Map(document.getElementById('map'), {
//    zoom: 4,
//    center: {lat: -25.363882, lng: 131.044922 }
//  });
//
//  map.addListener('click', function(e) {
//    placeMarkerAndPanTo(e.latLng, map);
//  });
//}      
//
//function placeMarkerAndPanTo(latLng, map) {
//  var marker = new google.maps.Marker({
//    position: latLng,
//    map: map
//  });
//  map.panTo(latLng);
//}
//    


//    function searchRutas(lat,lng){
//        $.post('http://localhost/sistemaweb/public/searchRutas',{lat:lat,lng:lng},function(match){
//            // console.log(match);
//            $('#rutasResult').html('');
//
//            $.each(match,function(i,val){
//                var glatval=val.lat;
//                var glngval=val.lng;
//                var gname=val.name;
//                var GLatLng = new google.maps.LatLng(glatval, glngval);
//                var gicn= 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
//                createMarker(GLatLng,gicn,gname);
//                var html='<h5><li>'+gname+'</li></h5>';
//                $('#rutasResult').append(html);
//            });
//
//              // $.each(match, function(i, val) {
//              //   console.log(val.name);
//              // });
//        });
//    }
//    
//    $('#searchRutas').submit(function(e){
//       e.preventDefault();
//        var val=$('#locationSelect').val();
//        $.post('http://localhost/api/getLocationCoords',{val:val},function(match){
//
//            var myLatLng = new google.maps.LatLng(match[0],match[1]);
//            createMap(myLatLng);
//            searchRutas(match[0],match[1]);
//        });
//    });
//        
//        service = new google.maps.places.PlacesService(map);
//        service.nearbySearch(request, callback);
    
//-----------prueba ruta    
//    var directionsDisplay = new google.maps.DirectionsRenderer();
//var directionsService = new google.maps.DirectionsService();
//
//var request = {
// origin: $('#origen').val(),
// destination: $('#destino').val(),
// travelMode: google.maps.DirectionsTravelMode[$('#modo_viaje').val()],
// unitSystem: google.maps.DirectionsUnitSystem[$('#tipo_sistema').val()],
// provideRouteAlternatives: true
// };
//
// directionsService.route(request, function(response, status) {
//    if (status == google.maps.DirectionsStatus.OK) {
//        directionsDisplay.setMap(map);
//        directionsDisplay.setPanel($("#panel_ruta").get(0));
//        directionsDisplay.setDirections(response);
//    } else {
//            alert("No existen rutas entre ambos puntos");
//    }
//});
//
//$('#buscar').live('click', function(){
//    rockAndRoll();
//});
// 
//$('.opciones_ruta').live('change', function(){
//    rockAndRoll();
//});   
//});
function guardarmapa(){
    if($('#lat').val()==''|| $('#lng').val()==''){
        alert('Por favor seleccione la ruta');
    }else{
        $('#formmapa').submit();
    }
}


var map      = null;
var geocoder = null;
  
function load() {
 
var lat_array= latLng.lat();
var lng_array= latLng.lng();
 
 
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
 
       }
}