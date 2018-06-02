<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ruta;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Comments;
use App\Ubicacion;
use App\Vehiculo;
use App\Rutas_Vehiculos;

class RutasVehiculoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rutavehiculo(Request $request){            
    
    if ($request->isMethod('post'))
    { 
        $vehiculo = new Vehiculo();
        $ruta = new Ruta();
        $rutavehiculo = new Rutas_Vehiculo();
        
            $rutavehiculo->ruta_id=$vehiculo->id;
            $rutavehiculo->vehiculo_id=$ruta->id;
            
            console.log('holaaaa');
        
        if ($ruta->save()){
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
  
        return View('admin.rutas.rutacreate');
    
}
public function asignarutasvehiculo(Request $request){
    
    if ($request->isMethod('get')){
        $id_vehiculo = $request->vehiculo_id;
        $id_ruta = $request->ruta_id;
        $tipo_accion = $request->tipo_accion;
        
//    echo 'entra:'.$tipo_accion;exit;
        $salida_respuesta = 'error';
        // Dependiendo del tipo_accion se busca y se crea el objeto Rutas_Vehiculos o se elimina
        if($tipo_accion === 'agregar'){
//            $vehiculo = Vehiculo::find($id_vehiculo);
//            $ruta = Ruta::find($id_ruta);
            $rutavehiculo = new Rutas_Vehiculos();
            $rutavehiculo->ruta_id=$id_ruta;
            $rutavehiculo->vehiculo_id=$id_vehiculo;
            $salida_respuesta = $rutavehiculo->save();
        }else{
            $rutavehiculo = Rutas_Vehiculos::Where('ruta_id', '=', $id_ruta)->
                                            Where('vehiculo_id', '=', $id_vehiculo)->first();
//            foreach($rutavehiculo as $key => $rv){
//                    echo 'key: ' . $key . ", dato:" . $rv. "</br>";
//                foreach($rv as $key2 => $rv2){
//                    echo 'key: ' . $key2 . ", dato:" . $rv2. "</br>";
//                }break;
//            }
//exit;
//return true;
//            $ruta_eliminar = Rutas_Vehiculos::find($rutavehiculo[0].id);
            $rutavehiculo->delete();
            
            $salida_respuesta = true;
        }
        
        
        
        // salida
        if ($salida_respuesta){
            echo 'ok';
            return;
        }else{
            echo "No se crea vehiculo: vehiculo_id: $id_vehiculo, ruta_id: $id_ruta";
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
