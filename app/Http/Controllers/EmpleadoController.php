<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\name;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Data;
use Session;
use Redirect;

use App\User;
use App\Empleado;
use Validator;
use Auth;
use Illuminate\Http\html;


use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
/**
 * Description of EmpleadoController
 *
 * @author Jhon
 */
class EmpleadoController extends Controller{
    
     public function indexEmpleado(Request $request)
    {
        
        $empleado = Empleado::orderBy('name', 'ASC')->paginate(5);
//        return View('admin.empleado.indexEmpleado' )->with('empleado',$empleado);
        
        
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
        
        return View('admin.empleado.indexEmpleado' )->with('users',$users)->with('permisos',$permisos_asignados_llaves)->with('empleado',$empleado);//ó return View('admin.index', $users )
//        ('admin.empleado.indexEmpleado' )->with('empleado',$empleado);
        /*dd("test");
        $users = \App\User::All();
       //return $users->where('admin.index', Auth::user()->$users);
        return $users->where('admin.index', user()->$user);*/
    }  
    
    public function createEmpleado(Request $request){

  if ($request->isMethod('post'))
  {
   //Roles de validación
   $rules = [
    'name' => ['required', 'min:3', 'max:30',  'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,() ]+$/'],
    'apellidoS' => ['required', 'min:3', 'max:30', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,() ]+$/'],
    'documento' => ['required', 'min:3', 'max:16', 'unique:empleado,documento'],
    'email' => ['required', 'min:3', 'max:200', 'unique:empleado,email'],
    'direccion' => ['required', 'min:3', 'max:30',  'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/'],
    'telefono' => ['required', 'min:3', 'max:16',  'regex:/(^([0-9]+)(\d+)?$)/u'],
    'sueldo' => ['required', 'min:3', 'max:30',  'regex:/(^([0-9]+)(\d+)?$)/u'],
   ];
   
   //Posibles mensajes de error de validación
   $messages = [
    'name.required' => 'El campo es requerido',
    'name.min' => 'El mínimo de caracteres permitidos son 3',
    'name.max' => 'El máximo de caracteres permitidos son 30',
    'name.regex' => 'Sólo se aceptan letras',
    'apellidoS.min' => 'El mínimo de caracteres permitidos son 3',
    'apellidoS.max' => 'El máximo de caracteres permitidos son 30',
    'apellidoS.regex' => 'Sólo se aceptan letras',
    'documento.min' => 'mminimo 3 numeros',
    'documento.max' => 'El máximo de numeros permitidos son 10',
    'documento.regex' => 'Sólo se aceptan numeros', 
    'email.required' => 'El campo es requerido',
    'email.email' => 'El formato de email es incorrecto',
    'email.max' => 'El máximo de caracteres permitidos son 255',
    'email.unique' => 'El email ya existe',
    'direccion.min' => 'El mínimo de caracteres permitidos son 3',
    'direccion.max' => 'El máximo de caracteres permitidos son 16',
    'direccion.regex' => 'Sólo se aceptan numeros y letras',
    'telefono.min' => 'mminimo 3 numeros',
    'telefono.max' => 'El máximo de numeros permitidos son 10',
    'telefono.regex' => 'Sólo se aceptan numeros',
    'sueldo.min' => 'minimo 3 numeros',
    'sueldo.max' => 'El máximo de numeros permitidos son 10',
    'sueldo.regex' => 'Sólo se aceptan numeros' 
   ];
   
   $validator = Validator::make($request->all(), $rules, $messages);
   
   //Si la validación no es correcta redireccionar al formulario con los errores
   if ($validator->fails()){
       // TODO: hay que buscar una forma de mostrar los mensajes que salen mal
        return redirect()->back()->with('message', 'Problemas al crear el empleado:'.print_r($validator->messages(), 1));
   }
   else{ // De los contrario guardar al empleado
    $empleado = new Empleado();
    $empleado->name = $request->name;
    $empleado->apellidoS = $request->apellidoS;
    $empleado->documento = $request->documento;
    $empleado->email = $request->email;
    $empleado->direccion = $request->direccion;
    $empleado->telefono = $request->telefono;
    $empleado->sueldo = $request->sueldo;
    
    //Activar al administrador sin necesidad de enviar correo electrónico
    //$user->active = 1;
    //El valor 1 en la columna determina si el usuario es administrador o no
    //$user->user = 1;
    if ($empleado->save()){
     return redirect()->back()->with('message', 'Ha creado al empleado correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   }
  }else        if($request->get('name')){
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
        
        return View('admin.empleado.createEmpleado' )->with('users',$users)->with('permisos',$permisos_asignados_llaves);
//        return View('admin.empleado.createEmpleado');
  
}    
       public function destroyEmpleado($id)
    {
        $empleado = Empleado::find($id);
        $empleado ->delete();
//        $empleado->destroy($id);
        $empleado_all = Empleado::orderBy('name', 'ASC')->paginate(5);
        return redirect()->back()->with('message', 'Empleado Eliminado Correctamente');
        Session::flash('message','Empleado Eliminado Correctamente');
        return View('admin.empleado.indexEmpleado', ['empleado'=>$empleado_all]);
    }
    
    
    public function updateEmpleado(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        $empleado->fill($request->all());
//        $empleado = new Empleado();
        $empleado->name = $request->name;
        $empleado->apellidoS = $request->apellidoS;
        $empleado->documento = $request->documento;
        $empleado->email = $request->email;
        $empleado->direccion = $request->direccion;
        $empleado->telefono = $request->telefono;
        $empleado->sueldo = $request->sueldo;
//        echo 'Empleado: ' . print_r($empleado, 1);
//        echo '<p>id: ' . print_r($id, 1);
        $empleado->save();
//        
        $empleado_all = Empleado::orderBy('name', 'ASC')->paginate(5);
        Session::flash('message', 'Empleado modificado correctamente.');
        return View('admin.empleado.indexEmpleado', ['empleado'=>$empleado_all]);
        return redirect($to = 'admin/index');
    }
    public function editEmpleado($id){
        $empleado = Empleado::find($id);
        return View('admin.empleado.editEmpleado', ['empleado'=>$empleado]);
        /*$users = User::findOrFail($id);
        return View('admin.edit', compact('users'));*/
        //$users = User::find($id);
        //return View('admin.edit' )->with('users',$users);
        //return $id;
    }
    
      public function search($search){
//          return urldecode($search);

          $empleado = Empleado::select()
                ->where('name', 'LIKE', '%'.$search.'%')
                ->orderBy('id', 'desc')
                ->paginate(10);
        
        if (count($empleado) == 0){
            return View('admin.empleado.search', compact('empleado'), ['empleado' => $empleado])
            ->with('message', 'No hay resultados que mostrar')
            ->with('search', $search);
        } else{
            return View('admin.empleado.search', compact('emppleado'), ['empleado' => $empleado])
            ->with('name', $empleado)
            ->with('search', $search);
        }
        return View('admin.empleado.search', compact('empleado'), ['empleado' => $empleado]);
      }

}
