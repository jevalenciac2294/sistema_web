<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
/**
 * Description of EmpleadoController
 *
 * @author Jhon
 */
class EmpleadoController extends Controller{
    
    public function indexEmpleado(){
        return View('empleado.empleados');
    }    
    
    public function createEmpleado(Request $request){

  if ($request->isMethod('post'))
  {
   //Roles de validación
   $rules = [
    'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
    'apellidoS' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
    'documento' => 'required|min:3|max:10|regex:/^[1-9]+$/i',
    'email' => 'required|email|max:255|unique:empleado,email',
    'direccion' => 'required|min:3|max:20|regex:/^[a-záéíóúàèìòùäëïöüñ123456789\s]+$/i',
    'telefono' => 'required|min:3|max:10|regex:/^[1-9]+$/i',
    'sueldo' => 'required|min:3|max:16|regex:/^[1-9]+$/i'
   ];
   
   //Posibles mensajes de error de validación
   $messages = [
    'name.required' => 'El campo es requerido',
    'name.min' => 'El mínimo de caracteres permitidos son 3',
    'name.max' => 'El máximo de caracteres permitidos son 16',
    'name.regex' => 'Sólo se aceptan letras','name.required' => 'El campo es requerido',
    'apellidoS.min' => 'El mínimo de caracteres permitidos son 3',
    'apellidoS.max' => 'El máximo de caracteres permitidos son 16',
    'apellidoS.regex' => 'Sólo se aceptan letras','name.required' => 'El campo es requerido',
    'documento.min' => 'mminimo 3 numeros',
    'documento.max' => 'El máximo de numeros permitidos son 10',
    'documento.regex' => 'Sólo se aceptan numeros','documento.required' => 'El campo es requerido',
    'email.required' => 'El campo es requerido',
    'email.email' => 'El formato de email es incorrecto',
    'email.max' => 'El máximo de caracteres permitidos son 255',
    'email.unique' => 'El email ya existe',
    'direccion.min' => 'El mínimo de caracteres permitidos son 3',
    'direccion.max' => 'El máximo de caracteres permitidos son 16',
    'direccion.regex' => 'Sólo se aceptan letras y numeros','name.required' => 'El campo es requerido',
    'telefono.min' => 'mminimo 3 numeros',
    'telefono.max' => 'El máximo de numeros permitidos son 10',
    'telefono.regex' => 'Sólo se aceptan numeros','documento.required' => 'El campo es requerido',
    'sueldo.min' => 'mminimo 3 numeros',
    'sueldo.max' => 'El máximo de numeros permitidos son 10',
    'sueldo.regex' => 'Sólo se aceptan numeros','documento.required' => 'El campo es requerido'
   ];
   
   $validator = Validator::make($request->all(), $rules, $messages);
   
   //Si la validación no es correcta redireccionar al formulario con los errores
   if ($validator->fails()){
       // TODO: hay que buscar una forma de mostrar los mensajes que salen mal
        return redirect()->back()->with('message', 'Problemas al crear el empleado:'.print_r($validator->messages(), 1));
   }
   else{ // De los contrario guardar al usuario
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
  }
        return View('admin.empleado.createEmpleado');
  
}    
    public function destroyEmpleado(){
        return View('empleado');
    }

}
