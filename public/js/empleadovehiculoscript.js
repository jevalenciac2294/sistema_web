function listarVehiculo(url, url_asignavehiculo, empleado_id, url_vehiculo_ver) {
    
    var parametros = {empleado_id : empleado_id};
    $.get(url, parametros, function(res){
        var stringVehiculo = "<table width='90%' align='center'>";
        var divVehiculo = document.getElementById("listaVehiculos");
        
        
        for(var i=0; i<res.vehiculo.length; i++){
            stringVehiculo += "<tr>";
            // Cuando se reciben los datos el campo 'contiene_ruta' nos indica que ya existe la ruta para el vehiculo
            var boton_texto = '';
            var boton_color = '';
            if(res.vehiculo[i].contiene_vehiculo === '1'){
                boton_texto = 'Remover vehiculo';
                boton_color = 'btn btn-danger';
            }else{
                boton_texto = 'Agregar vehiculo';
                boton_color = 'btn btn-success';
            }
            var url_ver_vehiculo = url_vehiculo_ver + '/' + res.vehiculo[i].id;
            stringVehiculo += "<td>" + res.vehiculo[i].id + "</td>" +
                    "<td>" + " <input type='button' class='"+boton_color+"' value='"+boton_texto+"' onclick='agregarVehiculo(this, \""+ url_asignavehiculo +"\", \""+ empleado_id+"\",\""+ res.vehiculo[i].id +"\" )'/>  </td>" +
                    " <td> <input type='button' class='btn btn-primary' value='ver vehiculo' onclick='window.location = \""+url_ver_vehiculo+"\"'/></td>";
            
        stringVehiculo += "</tr>";
        }
        
        stringVehiculo +="</table>";
        divVehiculo.innerHTML = stringVehiculo;
                
    });
    
}
    
function agregarVehiculo(boton,url_asignavehiculo, vehiculo_id, empleado_id) {
    // Se desactiva el boton antes de empezar el proceso
    // con la intencion de que no se envien mas peticiones al servidor
    boton.disabled = true;
    
    // tipo_accion representa que pasa con la ruta 'agregar' => inserta en la bd 'remover' => elimina
    var tipo_accion = 'agregar';
    if(boton.value !== 'Agregar vehiculo'){
        tipo_accion = 'remover';
    }
    var parametros = {vehiculo_id : vehiculo_id, empleado_id: empleado_id, tipo_accion: tipo_accion};
    $.get(url_asignavehiculo, parametros, function(res){
        if(res === 'ok'){
            if(boton.value === 'Agregar vehiculo'){
                boton.className = 'btn btn-danger';
                boton.value = 'Remover vehiculo';
            }else{
                boton.className = 'btn btn-success';
                boton.value = 'Agregar vehiculo';
            }
            // Si hay respuesta positiva se activa el boton
            boton.disabled = false;
        }else{
            console.log("Error al intentar agregar la vehiculos:\n" + res);
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