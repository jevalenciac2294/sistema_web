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
 
    public function store(Request $request){
        return View('');
    }
    
    public function show($id){
        
    }
    public  function edit($id){
        
    }
	
}
