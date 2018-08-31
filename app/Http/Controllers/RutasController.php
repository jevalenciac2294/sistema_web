<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ruta;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Comments;
use App\Ubicacion;
use App\Rutas_Vehiculos;

use Auth;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class RutasController extends Controller
{
//    public function searchRutas(Request $request){
//        $lat=$request->lat;
//        $lng=$request->lng;
//        
//        $rutas=Rutas::whereBetween('lat',[lat-0.1, lat+0.1])->whereBetween('lng',[$lng-0.1, lng+0.1])-get();
//        return $rutas;
//    }
    public function rutacreate(Request $request){            
    
    if ($request->isMethod('post'))
    { 
        $ruta = new Ruta();
        $ruta->name = $request->name;
        if ($ruta->save()){
            $lat_array=explode('/', $request->lat);
            $lng_array=explode('/', $request->lng);
            $salida = true;

            for($i=0; $i<sizeof($lat_array); $i++){
                $ubicacion = new Ubicacion();

                $ubicacion->lat=$lat_array[$i];
                $ubicacion->lng=$lng_array[$i];
                $ubicacion->ruta_id=$ruta->id;
                if(!$ubicacion->save()){
                    $salida = false;
                    break;

                }

            }
        }else{
            $salida = false;
            
        }
    
    if ($salida){
     return redirect()->back()->with('message', 'Ha creado la ruta correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   
  }else        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $ruta = Ruta::orderBy('name', 'ASC')->paginate(5);
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
        
        return View('admin.rutas.rutacreate' )->with('ruta',$ruta)->with('permisos',$permisos_asignados_llaves);
  
//        return View('admin.rutas.rutacreate');
    
}
public function rutaindex(Request $request){
    
//    $ruta = Ruta::find('name', 'ASC');
//        return View('home.rutaindex.indexEmpleado' )->with('empleado',$empleado);

    
        $ruta = Ruta::orderBy('id', 'ASC')->paginate(10);
        
//            $lat_array=explode('/', $request->lat);
//            $lng_array=explode('/', $request->lng);
//    
//        $ruta = Ruta::orderBy('name', 'ASC')->Where('ruta_id', $request->ruta_id);
//
//        return View('admin.rutas.rutaindex')->with('$lat_array',$ruta, '$lng_array' ,$ruta);
        
        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $ruta = Ruta::orderBy('name', 'ASC')->paginate(5);
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
        
        return View('admin.rutas.rutaindex' )->with('permisos',$permisos_asignados_llaves)->with('ruta',$ruta);


        
        
        /*dd("test");
        $users = \App\User::All();
       //return $users->where('admin.index', Auth::user()->$users);
        return $users->where('admin.index', user()->$user);*/
      
    
//    if(!is_null($ruta)){
//   return redirect()->back()->with('error', 'En los datos');
//}    
//    
//        return View('home.rutaindex', ['ruta'=>$ruta]);
//    }
}
    public function indexubicacion(Request $request, $ruta_id)
    {
        
        $ubicaciones = Ubicacion::Where('ruta_id', '=', $ruta_id)->get();
        
        $json = "{";
        $i = 1;
        $coma = "";
        foreach($ubicaciones as $u){
            $json .= $coma;
            $json .= "\"$i\":"."{";
            $json .= "\"lat\":".$u->lat.",";
            $json .= "\"lng\":".$u->lng;
            $json .= "}";
            $coma = ",";
            $i++;
        }
        $json .= "}";
        $enviar = array($ubicaciones, $json);
        
        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $ubicaciones = Ubicacion::Where('ruta_id', '=', $ruta_id)->get();
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
        
        return View('admin.rutas.indexubicacion' )->with('permisos',$permisos_asignados_llaves)->with('parametro_test',$enviar);

//        $ubicacion_obj = \App\Ubicacion::All();
//        $ubicaciones = $ubicacion_obj->where('ruta_id',$ruta_id);
       //return $users->where('admin.index', Auth::user()->$users);
//        $ubicacion = Ubicacion::all()->where('ruta_id',$ruta_id);
//        return View('admin.rutas.indexubicacion' )->with('parametro_test',$enviar);
//        return View('admin.rutas.rutaindex' )->with('ubicacion',$ubicacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function obtenerRutas(Request $request){
        $id_vehiculo = $request->vehiculo_id;
        $ruta = Ruta::all();
        // Hay que traer las rutas que tiene asignado este vehiculo $id_vehiculo
        // Y agregarle un parametro a ruta que indique que ya esta asignado
        
        // recorrer todas las rutas buscando que se encuentren en rutas_vehiculo
        // cuando encuentra tiene estado '1' de lo contrario '0'
        
        $rutas_vehiculos = Rutas_Vehiculos::Where('vehiculo_id', '=', $id_vehiculo)->get();
        foreach($ruta as $key => $r){
            $estado = '0';
            foreach($rutas_vehiculos as $rv){
                if($r['id'] === $rv['ruta_id']){
                    $estado = '1';
                    break;
                }
            }
            $ruta[$key]['contiene_ruta'] = $estado;
        }
        
//        foreach($ruta as $key => $rv){
//            echo 'key: ' . $key . ", rv: " . $rv . "</br>";
//        }
//        exit;return;
        return response(['rutas'=> $ruta]);
   }
   
   
         public function search($search){
//          return urldecode($search);

          $ruta = Ruta::select()
                ->where('name', 'LIKE', '%'.$search.'%')
                ->orderBy('id', 'desc')
                ->paginate(10);
        
        if (count($ruta) == 0){
            return View('admin.rutas.search', compact('ruta'), ['ruta' => $ruta])
            ->with('message', 'No hay resultados que mostrar')
            ->with('search', $search);
        } else{
            return View('admin.rutas.search', compact('ruta'), ['ruta' => $ruta])
            ->with('name', $ruta)
            ->with('search', $search);
        }
        return View('admin.rutas.search', compact('ruta'), ['ruta' => $ruta]);
      }
   
}
