<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vehiculo;
use App\Empleado;
use App\EmpleadoVehiculo;

class EmpleadoVehiculoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empleadovehiculo(Request $request){            
    
    if ($request->isMethod('post'))
    { 
        $empleado = new Empleado();
        $vehiculo = new Vehiculo();
        $empleadovehiculo = new EmpleadoVehiculo();
        
            $empleadovehiculo->vehiculo_id=$empleado->id;
            $empleadovehiculo->empleado_id=$vehiculo->id;
            
            console.log('holaaaa');
        
        if ($empleado->save()){
            $salida = true;
            console.log('holaaaa');

//            for($i=0; $i<sizeof($lat_array); $i++){
//                $ubicacion = new Ubicacion();
//
//                $ubicacion->lat=$lat_array[$i];
//                $ubicacion->lng=$lng_array[$i];
//                $ubicacion->ruta_id=$ruta->id;
//                if(!$ubicacion->save()){
//                    $salida = false;
//                    break;
//
//                }
//
//            }
        }else{
            $salida = false;
            
        }
    
    if ($salida){
     return redirect()->back()->with('message', 'Ha creado la ruta correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   
  }
  
        return View('admin.vehiculo.createVehiculo');
    
}
public function asignaempleadovehiculo(Request $request){
    
    if ($request->isMethod('get')){
        $id_vehiculo = $request->vehiculo_id;
        $id_empleado = $request->empleado_id;
        $tipo_accion = $request->tipo_accion;
        
//    echo 'entra:'.$tipo_accion;exit;
        $salida_respuesta = 'error';
        // Dependiendo del tipo_accion se busca y se crea el objeto Rutas_Vehiculos o se elimina
        if($tipo_accion === 'agregar'){
//            $vehiculo = Vehiculo::find($id_vehiculo);
//            $ruta = Ruta::find($id_ruta);
            $empleadovehiculo = new EmpleadoVehiculos();
            $empleadovehiculo->vehiculo_id=$id_vehiculo;
            $empleadovehiculo->empleado_id=$id_empleado;
            $salida_respuesta = $empleadovehiculo->save();
        }else{
            $empleadovehiculo = EmpleadoVehiculos::Where('vehiculo_id', '=', $id_vehiculo)->
                                            Where('empleado_id', '=', $id_empleado)->first();
//            foreach($rutavehiculo as $key => $rv){
//                    echo 'key: ' . $key . ", dato:" . $rv. "</br>";
//                foreach($rv as $key2 => $rv2){
//                    echo 'key: ' . $key2 . ", dato:" . $rv2. "</br>";
//                }break;
//            }
//exit;
//return true;
//            $ruta_eliminar = Rutas_Vehiculos::find($rutavehiculo[0].id);
            $empleadovehiculo->delete();
            
            $salida_respuesta = true;
        }
        
        
        
        // salida
        if ($salida_respuesta){
            echo 'ok';
            return;
        }else{
            echo "No se crea empleado: empleado_id: $id_empleado, vehiculo_id: $id_vehiculo";
            return;
        }
//        
//            $rutavehiculo->save();
//        return;
//        if ($rutavehiculo->save()){
//            echo 'ok';
//            return;
//        }else{
//            echo $salida . "No se crea vehiculo: vehiculo_id: $id_vehiculo, ruta_id: $id_ruta";
//            return;
//        }
    }
        /*
        $ruta = new Ruta();
        if ($ruta->save()){
        $ruta->name = $request->name;
            $salida = true;
     echo 'test123871';
     return ;
            }
        }else{
            $salida = false;      
        }
    
    if ($salida){
     return redirect()->back()->with('message', 'Ha creado la ruta correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
    return response(['admin.rutas.asignarutasvehiculo', 'rutas'=> $ruta]);*/
  }
//        $asignarutasvehiculo = new Rutas_Vehiculos($request->all());
//        
//        asignarutasvehiculo()->$asignarutasvehiculo;
//
//        $response = array(
//            'status' => 'success',
//            '' => 'Setting created successfully',
//        );
//        echo 'holaaaaa';
//        return \Response::json($response);
//    
//    
//    if($request->ajax()){
//        
//        return 'asasdasas';
////        $data = Ruta::all();
////       
////       return response(['asignarutasvehiculo'=> $data]);
////        return response()->json([
////            "mensaje" => "holaaaa"
////        ]);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
