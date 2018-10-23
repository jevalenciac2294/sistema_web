<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use Validator;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Http\Controllers\Data;
use Session;
use Redirect;

use App\User;
use App\Empleado;
use App\EmpleadoVehiculo;

use Auth;
use Illuminate\Http\html;

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


//index de vehiculos asignados
    public function indexVehiculo(Request $request, $id)
    {
        $vehiculo = Vehiculo::orderBy('matricula', 'ASC')->paginate(5);
        
        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $users = User::orderBy('name', 'ASC')->paginate(5);
            $vehiculo = Vehiculo::Where('id', '=', $id)->get();
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
           // $users = DB::table('users')->paginate(15);

        //return view('admin.vehiculo.indexVehiculo', ['vehiculo' => $vehiculo]);
        return View('admin.vehiculo.indexVehiculo' )->with('users',$users)->with('permisos',$permisos_asignados_llaves)->with('vehiculo',$vehiculo);
        //return View('admin.vehiculo.indexVehiculos' )->with('vehiculo',$vehiculo);
    }
  /*  public function indexVehiculos(Request $request, $id)
    {
        $vehiculo = Vehiculo::orderBy('matricula', 'ASC')->paginate(5);
        
        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $users = User::orderBy('name', 'ASC')->paginate(5);
            $vehiculo = Vehiculo::Where('id', '=', $id)->get();
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
           // $users = DB::table('users')->paginate(15);

       // return view('admin.vehiculo.indexVehiculos', ['vehiculo' => $vehiculo]);
        //return View('admin.vehiculo.indexVehiculo' )->with('users',$users)->with('permisos',$permisos_asignados_llaves)->with('vehiculo',$vehiculo);
        return View('admin.vehiculo.indexVehiculos' )->with('vehiculo',$vehiculo);
    }*/
//            
//        $empleado = Empleado::orderBy('name', 'ASC')->paginate(5);
//        return View('admin.empleado.indexEmpleado' )->with('empleado',$empleado);
//        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVehiculo(Request $request)
    {

   //Roles de validación

  if ($request->isMethod('post'))
  {
 
   $rules = [
    'matricula' => 'required|min:6|max:6|regex:/^[a-záéíóúàèìòùäëïöüñ123456789\s]+$/i',
    'marca' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
    'modelo' => 'required|min:4|max:4|regex:/^[1-9]+$/i',
    'color' => 'required|min:3|max:20|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i'  
   ];
   
   //Posibles mensajes de error de validación
   $messages = [
    'matricula.required' => 'El campo es requerido',
    'matricula.min' => 'El mínimo de caracteres permitidos son 6',
    'matricula.max' => 'El máximo de caracteres permitidos son 6',
    'matricula.regex' => 'Sólo se aceptan letras y numeros','matricula.required' => 'El campo es requerido',
    'marca.min' => 'El mínimo de caracteres permitidos son 3',
    'marca.max' => 'El máximo de caracteres permitidos son 16',
    'marca.regex' => 'Sólo se aceptan letras','marca.required' => 'El campo es requerido',
    'modelo.min' => 'minimo 4 numeros',
    'modelo.max' => 'El máximo de numeros permitidos son 4',
    'modelo.regex' => 'Sólo se aceptan numeros',
    'color.min' => 'El mínimo de caracteres permitidos son 3',
    'color.max' => 'El máximo de caracteres permitidos son 16',
    'color.regex' => 'Sólo se aceptan letras y numeros','name.required' => 'El campo es requerido'
    ];
   
   $validator = Validator::make($request->all(), $rules, $messages);
   
   //Si la validación no es correcta redireccionar al formulario con los errores
   if ($validator->fails()){
       // TODO: hay que buscar una forma de mostrar los mensajes que salen mal
        return redirect()->back()->with('message', 'Problemas al crear el vehiculo:'.print_r($validator->messages(), 1));
   }
   else{ // De los contrario guardar al vehiculo
    $vehiculo = new Vehiculo();
    $vehiculo->matricula = $request->matricula;
    $vehiculo->marca = $request->marca;
    $vehiculo->modelo = $request->modelo;
    $vehiculo->color = $request->color;
    
    //Activar al administrador sin necesidad de enviar correo electrónico
    //$user->active = 1;
    //El valor 1 en la columna determina si el usuario es administrador o no
    //$user->user = 1;
          // echo '<script>alert("gggguardado");</script>';
    if ($vehiculo->save()){

     return redirect()->back()->with('message', 'Ha creado al vehiculo correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   }
  }else if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $users = User::orderBy('name', 'ASC')->paginate(5);
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
        
        return View('admin.vehiculo.createVehiculo' )->with('users',$users);//->with('permisos',$permisos_asignados_llaves);

//        return View('admin.vehiculo.createVehiculo');
  

}

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
       public function destroyVehiculo($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo ->delete();
        $vehiculo_all = Vehiculo::orderBy('matricula', 'ASC')->paginate(2);
        Session::flash('message','Vehiculo Eliminado Correctamente');
        return View('admin.vehiculo.indexVehiculo', ['vehiculo'=>$vehiculo_all]);

    }
    
    
    public function updateVehiculo(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->fill($request->all());
//        $empleado = new Empleado();
        $vehiculo->matricula = $request->matricula;
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->color = $request->color;
//        echo 'Empleado: ' . print_r($empleado, 1);
//        echo '<p>id: ' . print_r($id, 1);
        $vehiculo->save();
//        
        $vehiculo_all = Vehiculo::orderBy('matricula', 'ASC')->paginate(5);
        Session::flash('message', 'Vehiculo modificado correctamente.');
        return View('admin.vehiculo.indexVehiculo', ['vehiculo'=>$vehiculo_all]);
        return redirect($to = 'admin/index');
    }
    public function editVehiculo($id){
        $vehiculo = Vehiculo::find($id);
        return View('admin.vehiculo.editVehiculo', ['vehiculo'=>$vehiculo]);
        /*$users = User::findOrFail($id);
        return View('admin.edit', compact('users'));*/
        //$users = User::find($id);
        //return View('admin.edit' )->with('users',$users);
        //return $id;
    }
    
    
   public function obtenerVehiculo(Request $request){
        $id_empleado = $request->empleado_id;
        $vehiculo = Vehiculo::all();
        // Hay que traer las rutas que tiene asignado este vehiculo $id_vehiculo
        // Y agregarle un parametro a ruta que indique que ya esta asignado
        
        // recorrer todas las rutas buscando que se encuentren en rutas_vehiculo
        // cuando encuentra tiene estado '1' de lo contrario '0'
        /*        $rutas_vehiculos = Rutas_Vehiculos::Where('vehiculo_id', '=', $id_vehiculo)->get();
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
   }*/
        $empleadovehiculo = EmpleadoVehiculo::Where('empleado_id', '=', $id_empleado)->get();
        foreach($vehiculo as $key => $r){
            $estado = '0';
            foreach($empleadovehiculo as $rv){
                if($r['id'] === $rv['vehiculo_id']){
                    $estado = '1';
                    break;
                }
            }
            $vehiculo[$key]['contiene_vehiculo'] = $estado;
        }
        
//        foreach($ruta as $key => $rv){
//            echo 'key: ' . $key . ", rv: " . $rv . "</br>";
//        }
//        exit;return;
        return response(['vehiculo'=> $vehiculo]);
   }
  
         public function search($search){
//          return urldecode($search);

          $vehiculo = Vehiculo::select()
                ->where('matricula', 'LIKE', '%'.$search.'%')
                ->orderBy('id', 'desc')
                ->paginate(10);
        
        if (count($vehiculo) == 0){
            return View('admin.vehiculo.search', compact('vehiculo'), ['vehiculo' => $vehiculo])
            ->with('message', 'No hay resultados que mostrar')
            ->with('search', $search);
        } else{
            return View('admin.vehiculo.search', compact('vehiculo'), ['$vehiculo' => $vehiculo])
            ->with('matricula', $vehiculo)
            ->with('search', $search);
        }
        return View('admin.vehiculo.search', compact('vehiculo'), ['vehiculo' => $vehiculo]);
      }


      //index vehiculos



    public function indexVehiculos(Request $request)
    {
        $vehiculo = Vehiculo::orderBy('matricula', 'ASC')->paginate(5);
        
        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get()->search($request->name);
        }else{
            $users = User::orderBy('name', 'ASC')->paginate(5);
        }
        $permisos_asignados = Auth::user()->getPermissions();
        // Recorrer todos los permisos y crear un array con el nombre como llave del array
        $permisos_asignados_llaves = array();
        foreach($permisos_asignados as $nombre){
            $permisos_asignados_llaves[$nombre] = '1';
        }
        
        return View('admin.vehiculo.indexVehiculos' )->with('users',$users)->with('permisos',$permisos_asignados_llaves)->with('vehiculo',$vehiculo);
//        return View('admin.vehiculo.indexV
    }
}