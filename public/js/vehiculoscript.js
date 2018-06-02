function listarRuta(url, url_asignaruta, vehiculo_id, url_rutas_ver) {
    
    var parametros = {vehiculo_id : vehiculo_id};
    $.get(url, parametros, function(res){
        var stringRuta = "<table width='90%' align='center'>";
        var divRuta = document.getElementById("listaRutas");
        
        
        for(var i=0; i<res.rutas.length; i++){
            stringRuta += "<tr>";
            // Cuando se reciben los datos el campo 'contiene_ruta' nos indica que ya existe la ruta para el vehiculo
            var boton_texto = '';
            var boton_color = '';
            if(res.rutas[i].contiene_ruta === '1'){
                boton_texto = 'Remover ruta';
                boton_color = 'btn btn-danger';
            }else{
                boton_texto = 'Agregar ruta';
                boton_color = 'btn btn-success';
            }
            var url_ver_ruta = url_rutas_ver + '/' + res.rutas[i].id;
            stringRuta += "<td>" + res.rutas[i].name + "</td>" +
                    "<td>" + " <input type='button' class='"+boton_color+"' value='"+boton_texto+"' onclick='agregarRuta(this, \""+ url_asignaruta +"\", \""+ vehiculo_id+"\",\""+ res.rutas[i].id +"\" )'/>  </td>" +
                    " <td> <input type='button' class='btn btn-primary' value='Ver ruta' onclick='window.location = \""+url_ver_ruta+"\"'/></td>";
            
        stringRuta += "</tr>";
        }
        
        stringRuta +="</table>";
        divRuta.innerHTML = stringRuta;
        
    });
    
}
    
function agregarRuta(boton,url_asignaruta, vehiculo_id, rutas_id) {
    // Se desactiva el boton antes de empezar el proceso
    // con la intencion de que no se envien mas peticiones al servidor
    boton.disabled = true;
    
    // tipo_accion representa que pasa con la ruta 'agregar' => inserta en la bd 'remover' => elimina
    var tipo_accion = 'agregar';
    if(boton.value !== 'Agregar ruta'){
        tipo_accion = 'remover';
    }
    var parametros = {vehiculo_id : vehiculo_id, ruta_id: rutas_id, tipo_accion: tipo_accion};
    $.get(url_asignaruta, parametros, function(res){
        if(res === 'ok'){
            if(boton.value === 'Agregar ruta'){
                boton.className = 'btn btn-danger';
                boton.value = 'Remover ruta';
            }else{
                boton.className = 'btn btn-success';
                boton.value = 'Agregar ruta';
            }
            // Si hay respuesta positiva se activa el boton
            boton.disabled = false;
        }else{
            console.log("Error al intentar agregar la ruta:\n" + res);
        }
        
    });
    
    
    
        /*
        console.log(vehiculo_id, '2');
        
        $.get(boton, function(res){
            var stringRuta = "<table>";
            var divRuta = document.getElementById("listaRutas");


            for(var i=0; i<res.rutas.length; i++){

                console.log(res.vehiculo_id[i]);  
                console.log(url_asignaruta);
            }

        });
        
        console.log(vehiculo_id, '2');
        console.log(rutas_id);    */
  
}
        
//    
//    var tipo = 1;
//    
//    if(boton.value === 'Agregar ruta'){
//    tipo = 1;
//    }
//  else{
//    tipo = 2;
//    

//------------------------------------------------------------------------------------------------------------

/*
        $(document).on('ready',function(){

      $('#Agregar ruta').click(function agregaRuta(boton,url_asignaruta, vehiculo_id, rutas_id){                                     

        $.ajax({                        
           type: "POST",
            url: url_asignaruta,
            data: {body: vehiculo_id, published_at: rutas_id},
            success:function(){
         
        console.log(vehiculo_id, '1asdd');
           if(tipo === 1){
                boton.className = 'btn btn-danger';
                boton.value = 'Remover ruta';
               
           }else if(tipo === 2){
                boton.className = 'btn btn-success';
                boton.value = 'Agregar ruta';            
           }
       }
      });
    });
 });
*/


//}----------------------------------------------------------------------------------------------------
//        var body;
//        var published_at;
//        $.ajax({
//            
//            $('#btn-ingresar').click(function(){
//        var url = "datos_login.php";                                      
//
//        $.ajax({                        
//           type: "POST",                 
//           url: url,                    
//           data: $("#formulario").serialize(),
//           success: function(data)            
//           {
//             $('#resp').html(data);           
//           }
//         });
//      });
//            type: "POST",
//            url: url_asignaruta,
//            data: {body: vehiculo_id, published_at: rutas_id},
//            success:function(){
//         
//        console.log(vehiculo_id, '1asdd');
//           if(tipo === 1){
//                boton.className = 'btn btn-danger';
//                boton.value = 'Remover ruta';
//               
//           }else if(tipo === 2){
//                boton.className = 'btn btn-success';
//                boton.value = 'Agregar ruta';            
//           }
//       }
//            });
//
//   
//    }
//    
      
 /*     
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
      $.post(url_asignaruta, function (respuesta){
          console.log(respuesta);
      });
   
   $.ajax({
       
       url: url_asignaruta,
       type: 'GET',
       dataType: 'json',
       data:{vehiculo_id: vehiculo_id, rutas_id: rutas_id, tipo: tipo},
       
       success:function(){
         
           if(tipo === 1){
                boton.className = 'btn btn-danger';
                boton.value = 'Remover ruta';
               
           }else if(tipo === 2){
                boton.className = 'btn btn-success';
                boton.value = 'Agregar ruta';
               
           }
           
       }
   });*/
    /*
    var httpRequest = false;
if (window.XMLHttpRequest) { // Mozilla, Safari, Chrome etc.
  httpRequest = new XMLHttpRequest();
} else {
  // Internet explorer siempre llevando la contra.
  httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}
if (httpRequest == false) return false; // no se puedo crear el objeto
    
    
    httpRequest.open('GET', url, true);
    console.log('entrada 1');
console.table(httpRequest.responseText);
return;
    
    httpRequest.onload = function() {
    console.log('entrada 2');
   if (httpRequest.readyState == 4) {
    console.log('entrada 3');
       // la peticion la recibio el servidor
       if (httpRequest.status == 200) {
         // el servidor retorno un codigo 200 (OK)
         console.log('okkkkk');
       } else {
          // error 404, 500 etc.
         console.log('noooook');
       }       
    console.log('entrada 4');
   }
    console.log('entrada 5');
};

*/
    
//   $.get('rutas').click(function(data){
//       $('#getRequestData').append(data);
//       console.log(data);
//   });   
//