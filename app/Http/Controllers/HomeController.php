<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\MiFormulario;
use Validator;
use App\Ruta;
use App\Comments;
use App\Ubicacion;
use App\Evento;
use App\Vehiculo;

use Illuminate\Http\name;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Http\Requests;

use App\Http\Controllers\Data;
use Session;
use Redirect;

use App\User;
use App\Empleado;
use Auth;
use Illuminate\Http\html;
use DB;
use App\EmpleadoVehiculo;
use App\Rutas_Vehiculos;
use DateTime;
use PDF;



class HomeController extends Controller{
    
//      public function home(){
//        return View('home.home');
//    }
    
    public function home(){
        return View('home');
    }
    
    public function get_events(){
        $events = Evento::select("id", "titulo as  title", "fecha_inicio as start", "fecha_final as end")->get()->toArray();
       
        return response()->json($events);
        
        
    }
    
    public function create_events2(Request $request){
        $titulo     = $request->titulo;
        $f_inicio   = $request->fecha_inicio . " " . $request->hora_inicio . ":00";
        $f_final    = $request->fecha_final . " " . $request->hora_final . ":00";
        $emp = $request->empleados;
        $selectv = $request->select_Vehiculo;
        $selectr = $request->select_Ruta;


        $input = new Evento();
        $input->titulo = $titulo;
        $input->fecha_inicio = $f_inicio;
        $input->fecha_final = $f_final;
        $input->empleados = $emp;
        $input->select_Vehiculo = $selectv;
        $input->select_Ruta = $selectr;

//$f_pp = new DateTime($f_inicio);
//$f_ppf = new DateTime($f_final);
//$fecha = $f_pp->diff($f_ppf);
//echo $fecha->format('%S');


/*$f_pp = strtotime($f_inicio);
$f_ppf = strtotime($f_final);
echo $f_ppf - $f_pp;
return;*/
        if($input->fecha_inicio<$input->fecha_final){


// Lo siguiente es por si quieres ponerlo ya en texto la diferencia
//  $elapsed = $interval->format('%y años %m meses %a dias %h horas %i minutos %S segundos');
//  return $elapsed;
    // echo '<script>alert("Evento guardado"+$fechaF);</script>';
    //return $fechaF; 

        $input->save();
        }else{
            echo '<script>alert("fecha final debe ser mayor a la fecha de inicio");</script>';
            Session::flash('message','fecha final debe ser mayor a la fecha de inicio');
            return redirect('home');
        }


        echo '<script>alert("Evento guardado");</script>';

        return redirect('home');
    
}

public function empleado(){

    /*$empleados = DB::table("empleado")->lists('name', 'id');
    return view('home', compact('empleados'));*/

$empleados = Empleado::all();
      return view('home', compact('empleados'));

    //return view('index',compact('states'));
}
public function empleadoVehiculo(Request $request){

    if($request->ajax()){
        $$empleado=Empleado::find($request->id);
        $empleadoVehiculo=$empleado->empleadoVehiculo;
        return response($empleadoVehiculo); 
    }

}


public function obtenerVehiculos($empleado_id){

        $obtenerVehiculos= EmpleadoVehiculo::where('empleado_id', '=', $empleado_id)->get();
        
        $vehiculoSalida = array();
        foreach ($obtenerVehiculos as $key) {
            $v = Vehiculo::find($key->vehiculo_id);
            $fila['id'] = $v->id;
            $fila['matricula'] = $v->matricula;
            $vehiculoSalida[]=$fila;

        }
        return json_encode($vehiculoSalida);
}
public function obtenerRutas($vehiculo_id){

        $obtenerRutas= Rutas_Vehiculos::where('vehiculo_id', '=', $vehiculo_id)->get();
        
        $rutasSalida = array();
        foreach ($obtenerRutas as $key) {
            $r = Ruta::find($key->ruta_id);
            $fila['id'] = $r->id;
            $fila['name'] = $r->name;
            $rutasSalida[]=$fila;

        }
        return json_encode($rutasSalida);
}

    public function getempleadoVehiculoList(Request $request)
    {        
$data = DB::table('empleado')->join('empleadoVehiculo', 'empleadoVehiculo.empleado_id', "=", 'empleado_id')->select('empleado.name')->get();
echo "<pre>";
print_r($data);
    return response()->json($data);
    /*    $empleadoVehiculo = DB::table("empleadoVehiculo")
                    ->where("empleado_id",$request->empleado_id)
                    ->lists("name","id");
*/
/*$empleadoVehiculo = DB::table('empleadoVehiculo')->join('vehiculo', 'empleadoVehiculo.vehiculo_id', '=', 'empleadoVehiculo.id')->select('empleadoVehiculo.*', 'vehiculo.matricula')->get();
                //->join('corregimiento', 'municipio.id', '=', 'corregimiento.municipio_id')
                //->join('barrio', 'corregimiento.id', '=', 'barrio.corregimiento_id')
                //->join('beneficiario', 'barrio.id', '=', 'beneficiario.barrio_id')
                //->get();
}
        return response()->json($empleadoVehiculo);*/

}


    
    public function create_events(Request $request){
   //     $input = Evento::all();
   //     $input->save($request);

       //   $input = $request->all();
       //   Evento::create($input);
/*
    $input = new Evento;
    $input["fecha_inicio"]= $input["fecha_inicio"]."".date("H:m:s", strtotime($input["hora_inicio"]));
    $input["fecha_final"] = $input["fecha_final"]."".date("H:m:s", strtotime($input["hora_final"]));


        return view ("home");
        return redirect('/home');*/
    $fecha_inicio=  $request->get("fecha_inicio"."".date("H:m:s", strtotime("hora_inicio")));
    $fecha_final= $request->get("fecha_final"."".date("H:m:s", strtotime("hora_final")));
   // $input["fecha_final"] = $input["fecha_final"]."".date("H:m:s", strtotime($input["hora_final"]));

//Echo "<pre>";print_r($request);
//echo '</br>request-: '. $input;
//Echo "<pre>";print_r($request);// este funciono cr
//var_dump($fecha_final);

return View ("home");
return redirect('/home');
          //      $input["fecha_inicio"]=$input["fecha_inicio"]."".date("H:m:s", strtotime($input["hora_inicio"]));
        //$input["fecha_final"]=$input["fecha_final"]."".date("H:m:s", strtotime($input["hora_final"]));

      //  return View ("home");
    //    return redirect('/home');
//        var_damp($_POST);
//        return alert( 'se ha creado el evento ejemplo');
//        return view('home');
    }
            
           
//        public function front(){
//          return View('home.front');
//    }
    

public function prueba(Request $request){
        
        $verAgenda = Evento::orderBy('fecha_inicio', 'fecha_final',  'ASC')->paginate(5);
//        return View('admin.empleado.indexEmpleado' )->with('empleado',$empleado);
        
        
        if($request->get('fecha_inicio', 'fecha_final')){
            $users = User::Where('fecha_inicio', 'fecha_final', 'like', '%'.$request->get('fecha_inicio', 'fecha_final').'%')->get()->search($request->fecha_inicio);
        }else{
            $users = User::orderBy('fecha_inicio', 'ASC')->paginate(5);
        }

        return View('prueba' )->with('users',$users)->with('verAgenda',$verAgenda);//ó return View('admin.index', $users )
//        ('admin.empleado.indexEmpleado' )->with('empleado',$empleado);
        /*dd("test");
        $users = \App\User::All();
       //return $users->where('admin.index', Auth::user()->$users);
        return $users->where('admin.index', user()->$user);*///return view('prueba');
    }  
    
    



//ejemplo generar pdf
    public function generarpdf(){
        /*
        
        $pdf = PDF::loadView('generarpdf', $details);
        return $pdf::download('Document portable.pdf');*/
        $data = ['title' => 'test'];
        $pdf = PDF::loadView('generarpdf', $data);
return $pdf->download('invoice.pdf');
    }

    public function hora(){

         return View('HorasExtras', compact('empleado'), ['datos' => array()]);
    }

    public function search(Request $request){

          $evento = Evento::select()
                ->where('fecha_inicio', '>=', $request->fecha_inicio)
                ->where('fecha_final', '<=', $request->fecha_final.' 23:59:59')
                ->orderBy('fecha_inicio', 'asc')
                ->paginate(10);
  //  echo '<pre>';print_r($request->fecha_inicio);die(); 

        $datos_salida = array();
        foreach ($evento as $e) {
            $empleado = Empleado::find($e->empleados);
            $empleado_nombre = $empleado->name.' '.$empleado->apellidoS;
            
              if (strpos($empleado_nombre, $request->empleado) !== false || empty($request->empleado)) { 
                $f_pp = strtotime($e->fecha_inicio);
                $f_ppf = strtotime($e->fecha_final);

                $horas_totales = $f_ppf-$f_pp;

                $salida = array();
                $fecha = explode(' ', $e->fecha_inicio);

                $salida['id'] = $empleado->id;
                $salida['fecha'] = $fecha[0];
                $salida['nombre'] = $empleado_nombre;
                $salida['horas'] = $horas_totales/3600;//3600 = 1 hora

                if ($horas_totales>28800) {//28800 = 8 horas
                    $salida['extras'] = ($horas_totales-28800)/3600;                   
                }else{
                    $salida['extras'] = 0;

                }

                $datos_salida[]=$salida;
            }
        }
        $datos_salida_suma = array();
        foreach ($datos_salida as $fila) {
            if(isset($datos_salida_suma[$fila['fecha']])){
                if(isset($datos_salida_suma[$fila['fecha']][$fila['id']])){

                    $datos_salida_suma[$fila['fecha']][$fila['id']]['horas'] += $fila['horas'];
                }else{
                    $datos_salida_suma[$fila['fecha']][$fila['id']]['horas'] = $fila['horas'];
                    $datos_salida_suma[$fila['fecha']][$fila['id']]['nombre'] = $fila['nombre'];
                    $datos_salida_suma[$fila['fecha']][$fila['id']]['extras'] = 0;
                    
                }
            }else{
                $datos_salida_suma[$fila['fecha']][$fila['id']]['horas'] = $fila['horas'];
                $datos_salida_suma[$fila['fecha']][$fila['id']]['nombre'] = $fila['nombre'];
                $datos_salida_suma[$fila['fecha']][$fila['id']]['extras'] = 0;

            }
        }
        foreach ($datos_salida_suma as $f_key => $salida_fechas) {
            foreach ($salida_fechas as $id_key => $salida_id) {
                if($salida_id['horas']>8){
                    $datos_salida_suma[$f_key][$id_key]['extras'] = $salida_id['horas'] - 8;
                    $datos_salida_suma[$f_key][$id_key]['horas'] = 8;
                }
            }
        }

//echo '<pre>';print_r($datos_salida_suma);die();

        return View('HorasExtras', ['datos' => $datos_salida_suma]);

/*

        if (count($empleado) == 0){
            return View('HorasExtras', compact('empleado'), ['empleado' => $empleado])
            ->with('message', 'No hay resultados que mostrar');
        } else{
            return View('HorasExtras', compact('empleado'), ['empleado' => $empleado])
            ->with('name', $empleado);
        }
        
        return View('HorasExtras', compact('empleado'), ['empleado' => $empleado], $datos_salida);*/
      }
/*
public function search(Request $req){
    if($req->HorasExtrasBuscar == ""){
        $empleados = Empleado::paginate(5);
        return View ('HorasExtras', compact('empleados'));

    }else{
        $empleados = Empleado::where('name', 'LIKE', '%'.$req->HorasExtrasBuscar.'%')->paginate(5);
        $empleados->appends($req->only('HorasExtrasBuscar'));
        return View('HorasExtras', compact('empleados'));
    }
}
*/


public function ruta_vehiculo(){

<<<<<<< HEAD
/*
    public function hora(){

         return View('HorasExtras', compact('empleado'), ['datos' => array()]);
    }
*/  

=======
>>>>>>> origin/master
        $ruta_conductor = DB::table('empleado')

        ->join('empleadoVehiculo', 'empleadoVehiculo.empleado_id', '=', 'empleado.id')

        ->join('vehiculo', 'vehiculo.id', '=', 'empleadoVehiculo.vehiculo_id')

        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')

        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')

        ->select('rutas.name','rutas.id',  'empleado.name as name_emp')
    
<<<<<<< HEAD
        ->get();           
        
      //  echo '<pre>';print_r($ruta_conductor);die();    

        return View('reporte_Ruta_Conductor',['datos' => array()])->with('ruta_conductor',$ruta_conductor); //['datos' => $ruta_conductor]);//)->with('ruta_conductor',$ruta_conductor);

    }
      /*public function reporte(){

         return View('reporte_Ruta_Conductor', compact('empleado'), ['datos' => array()]);
    }*/
public function search_ruta_vehiculo(Request $request){
         $ruta_conductor = Empleado::select()
        ->join('empleadoVehiculo', 'empleadoVehiculo.empleado_id', '=', 'empleado.id')
=======
        ->get();             
        
        //echo '<pre>';print_r($ruta_conductor);die();    

        return View('reporte_Ruta_Conductor' )->with('ruta_conductor',$ruta_conductor);

    }
public function search_ruta_vehiculo($search_ruta_vehiculo){
         


         $ruta_conductor = Empleado::join('empleadoVehiculo', 'empleadoVehiculo.empleado_id', '=', 'empleado.id')
>>>>>>> origin/master

        ->join('vehiculo', 'vehiculo.id', '=', 'empleadoVehiculo.vehiculo_id')

        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')

        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')

<<<<<<< HEAD

        ->where('empleado.name', "LIKE", $request->empleado)
        
        ->get();           
 //echo '<pre>';print_r($ruta_conductor);die(); 
// echo '<pre>';print_r($request->empleado);die(); 

        $datos_salida = array();
        foreach ($ruta_conductor as $rc) {
            $empleado = Empleado::find($rc->empleados);
            //$empleado_nombre = $empleado->name.' '.$empleado->apellidoS;
            
              if (strpos($empleado, $request->empleado) !== false || empty($request->empleado)) { 
                $salida = array();
                
                $salida['id'] = $empleado->id;
                $salida['name_emp'] = $empleado->name;
                $salida['name'] = $rutas->name;
               
                $datos_salida[]=$salida;
            }

        }
//echo '<pre>';print_r($ruta_conductor);die(); 

        return View('reporte_Ruta_Conductor',  ['datos' => $datos_salida]);//->with('ruta_conductor',$ruta_conductor)->with('search_ruta_vehiculo', $ruta_conductor);
=======
        ->select()
        ->where('rutas.name', 'LIKE', '%'.$search_ruta_vehiculo->name.'%')
        ->get();           

        
          if (count($ruta_conductor) == 0){
            return View('reporte', compact('ruta_conductor'), ['ruta_conductor' => $ruta_conductor])
            ->with('message', 'No hay resultados que mostrar')
            ->with('search_ruta_vehiculo', $search_ruta_vehiculo);
        } else{
            return View('reporte', compact('ruta_conductor'), ['ruta_conductor' => $ruta_conductor])
            ->with('name', $ruta_conductor)
            ->with('search_ruta_vehiculo', $search_ruta_vehiculo);
        }
        //echo '<pre>';print_r($ruta_conductor);die();    
        echo '<pre>';print_r($ruta_conductor);die();    

        return View('reporte_Ruta_Conductor' )->with('ruta_conductor',$ruta_conductor)->with('search_ruta_vehiculo', $search_ruta_vehiculo);

>>>>>>> origin/master
    }


public function vehiculo_ruta(){

        $vehiculo_ruta = DB::table('vehiculo')

        ->join('rutasvehiculos', 'rutasvehiculos.vehiculo_id', '=', 'vehiculo.id')

        ->join('rutas', 'rutas.id', '=', 'rutasvehiculos.ruta_id')

        ->select('rutas.name','rutas.id',  'vehiculo.matricula')
    
        ->get();             
        
        //echo '<pre>';print_r($vehiculo_ruta);die();    

        return View('reporte_vehiculo_ruta' )->with('vehiculo_ruta',$vehiculo_ruta);

    }



<<<<<<< HEAD





=======
>>>>>>> origin/master
}
