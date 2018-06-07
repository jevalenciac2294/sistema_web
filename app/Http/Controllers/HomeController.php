<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\MiFormulario;
use Validator;
use App\Ruta;
use App\Comments;
use App\Ubicacion;

use App\Comments;
class HomeController extends Controller{
    
      public function home(){
        return View('home.home');
    }
//        public function front(){
//          return View('home.front');
//    }
    
}
