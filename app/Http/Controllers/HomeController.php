<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\MiFormulario;
use Validator;

class HomeController extends Controller{
    
    public function getId($id1, $id2){
        return "<p>id1 es igual a " . $id1 . "</p><p>id2 es igual a " . $id2 . "</p>";
    }
    
    public function showView(){
        $msg = "Aprendiendo Laravel 5";
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return View('home.showview', ['msg' => $msg, 'array' => $array]);
    }
    public function form(Request $request){
        
        if ($request->isMethod("post") && $request->has("name"))
        {
            $name = $request->input("name");
        }
        else
        {
            $name = "";
        }
        
        return View("home.form", ["name" => $name]);
    }
        public function miFormulario(){
        return View("home.miformulario");
    }

            public function validarMiFormulario(MiFormulario $formulario){
        $validator = Validator::make(
                $formulario->all(), 
                $formulario->rules(),
                $formulario->messages()
                );
        if ($validator->valid()){
            
            if ($formulario->ajax()){
                return response()->json(["valid" => true], 200);
            }
            else{
            return redirect('home/miformulario')
                    ->with('message', 'Enhorabuena formulario enviado correctamente');
            }
        }
    }
      public function home(){
        return View('home.home');
    }
}