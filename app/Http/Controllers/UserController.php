<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Hash;

use App\Http\Requests;

use Validator;
use Auth;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller{
	
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function user(){
        return View('user.user');
    }

    public function adminuser(){
        return View('admin.user');
    }
        public function password(){
        return View('user.password');
        }
        
    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('user/password')->withErrors($validator);
        }
        else{
//            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('user')->with('status', 'Password cambiado con éxito');
//            }
//            else
//            {
//                return redirect('user/password')->with('message', 'Credenciales incorrectas');
//            }
        }
    }
    
    public function index()  {
        
    }
 
    public function create()
    {
        return view('usuario.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  $rules = [
             'name' => ['required', 'min:3', 'max:60',  'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,() ]+$/'],
    'email' => ['required|email|max:255|unique:users,email'],
    'password' => ['required|min:6|max:18|confirmed'],
        ];
        $messages = [
            'name.required' => 'El campo es reuqerido',
            'name.min' => 'El minimo de caracter permitidos son 3',
            'name.max' => 'El maximo de caracter permitidos son 60',
            'name.regex' => 'solo se aceptan letras',
            'email.required' => 'El campo es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'email.max' => 'El maximo de caracteres permitidos son 255',
            'email.unique' => 'El email ya existe',
            'password.required' => 'El campo es requerido',
            'password.min' => 'El minimo de caracteres permitidos son 3',
            'password.max' => 'El maximo de caracteres permitidos son 18',
            'password.confirmed' => 'La contraseña no coincide',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect("usuario/create")
            ->withErrors($validator)
            ->withInput();
        }else{
//            $user = new User;
//            $data['name'] = $user->name = $request->name;
//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->password = bcrypt($request->password);
//            $user->confirm_token = str_random(100);
//            $user->remember_token = str_random(100);
//            $data['confirm_token'] = str_random(100);//$user->confirm_token = str_random(100);
//            $user->save();
//            
//            Mail::send('mails.register', ['user' => $user], function ($mail) use ($user){
//                //$mail->subject('Confirma tu cuenta');
//                $mail->to($user['email'], $user['name'])->subject('Por favor confirmar tu cuenta');
//            });
//

$user = new User;
            $data['name'] = $user->name = $request->name;
            $data['email'] = $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = str_random(100);
            $data['confirm_token'] = $user->confirm_token = str_random(100);
            $user->save();
            
return redirect('admin/index');
        }
    }
    
    public function show($id){
        
    }
    public  function edit($id){
        
    }
	
}
