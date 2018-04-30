<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\name;
use App\Comments;
use Illuminate\Database\Query\Builder;
        
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Data;
use Session;
use Redirect;

use App\TipoUsuario;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\html;

class AdminController extends Controller
{
    
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
 public function __construct(){
        $this->middleware('auth', ['except' => 'createAdmin']);
    }
     private function isAdmin(){
        if (Auth::user()->user == 1) return true;
        else return false;
    }
    public function index(Request $request){
//        $users = User::Where('name', 'ilike ?', array($request->get('name')))->orderBy('name', 'ASC')->paginate(5)->get();
//        $users = User::Where('name', 'ilike %?%', array($request->get('name')))->get();
        if($request->get('name')){
            $users = User::Where('name', 'like', '%'.$request->get('name').'%')->get();
        }else{
            $users = User::orderBy('name', 'ASC')->paginate(5);
        }
//        if($request->get('name')){
//            echo 'nombre: ' .$request->get('name') ;
//            exit;
//        }
//        $users = \App\User::All();
//        $search = urldecode($search);
//        $users = User::select()
//                ->where('users', 'LIKE', '%' . $search . '%')
//                ->orderBy('id', 'desc')
//                ->get();
        //$users = User::with($request->get('name'))->orderBy('id','DESC')->paginate(2);
//        $posts = Post::where('title', 'like', '%'.Input::get('search').'%')
//                ->orWhere('body', 'like', '%'.Input::get('search').'%')
//                ->orderBy('id', 'desc')->paginate(6);
//  
//  return view('posts', ['posts' => $posts]);
//        $users = User::orderBy('name', 'ASC')->paginate(5);
        //$users = User::filterAndPaginate($request->get('name'));
        return View('admin.index' )->with('users',$users);//ó return View('admin.index', $users )
        
        /*dd("test");
        $users = \App\User::All();
       //return $users->where('admin.index', Auth::user()->$users);
        return $users->where('admin.index', user()->$user);*/
    }

//    public function search($search){
//        $search = urldecode($search);
//        $users = Users::select()
//                ->where('users', 'LIKE', '%'.$search.'%')
//                ->orderBy('id', 'desc')
//                ->get();
//        
//        if (count($users) == 0){
//            return View('admin.search')
//            ->with('message', 'No hay resultados que mostrar')
//            ->with('search', $search);
//        } else{
//            return View('admin.search')
//            ->with('users', $users)
//            ->with('search', $search);
//        }
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createuser(Request $request){
  
  if ($request->isMethod('post'))
  {
   //Roles de validación
   $rules = [
    'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
    'email' => 'required|email|max:255|unique:users,email',
    'password' => 'required|min:6|max:18|confirmed',
   ];
   
   //Posibles mensajes de error de validación
   $messages = [
    'name.required' => 'El campo es requerido',
    'name.min' => 'El mínimo de caracteres permitidos son 3',
    'name.max' => 'El máximo de caracteres permitidos son 16',
    'name.regex' => 'Sólo se aceptan letras',
    'email.required' => 'El campo es requerido',
    'email.email' => 'El formato de email es incorrecto',
    'email.max' => 'El máximo de caracteres permitidos son 255',
    'email.unique' => 'El email ya existe',
    'password.required' => 'El campo es requerido',
    'password.min' => 'El mínimo de caracteres permitidos son 6',
    'password.max' => 'El máximo de caracteres permitidos son 18',
    'password.confirmed' => 'Los passwords no coinciden',
   ];
   
   $validator = Validator::make($request->all(), $rules, $messages);
   
   //Si la validación no es correcta redireccionar al formulario con los errores
   if ($validator->fails()){
    return redirect()->back()->withErrors($validator);
   }
   else{ // De los contrario guardar al usuario
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->remember_token = str_random(100);
    $user->confirm_token = str_random(100);
    //Activar al administrador sin necesidad de enviar correo electrónico
    $user->active = 1;
    //El valor 1 en la columna determina si el usuario es administrador o no
    //$user->user = 1;
    if ($user->save()){
     return redirect()->back()->with('message', 'Enhorabuena nuevo administrador creado correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   }
  }
  
  return View('admin.createuser');
}
   public function adminuser(){
        if ($this->isAdmin()){
            return View('admin.adminuser');
        } else{
            return redirect()->back();
        }
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
    public function edit($id){
        $users = User::find($id);
        return View('admin.edit', ['users'=>$users]);
        /*$users = User::findOrFail($id);
        return View('admin.edit', compact('users'));*/
        //$users = User::find($id);
        //return View('admin.edit' )->with('users',$users);
        //return $id;
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
        $users = User::find($id);
        $users->fill($request->all());
        $users->password = bcrypt($request->password);
        $users->user = $request->user;
        $users->save();
        
        $users_all = User::orderBy('name', 'ASC')->paginate(5);
        Session::flash('message', 'Usuario modificado correctamente.');
        return View('admin.index', ['users'=>$users_all]);
//        return redirect($to = 'admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        $users_all = User::orderBy('name', 'ASC')->paginate(5);
        Session::flash('message','Usuario Eliminado Correctamente');
        return View('admin.index', ['users'=>$users_all]);
    }
    public function createAdmin(Request $request){
  
  if ($request->isMethod('post'))
  {
   //Roles de validación
   $rules = [
    'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
    'email' => 'required|email|max:255|unique:users,email',
    'password' => 'required|min:6|max:18|confirmed',
       'user' => 'required|min:1|max:1|regex:/^[1-1]+$/i',
   ];
   
   //Posibles mensajes de error de validación
   $messages = [
    'name.required' => 'El campo es requerido',
    'name.min' => 'El mínimo de caracteres permitidos son 3',
    'name.max' => 'El máximo de caracteres permitidos son 16',
    'name.regex' => 'Sólo se aceptan letras',
    'email.required' => 'El campo es requerido',
    'email.email' => 'El formato de email es incorrecto',
    'email.max' => 'El máximo de caracteres permitidos son 255',
    'email.unique' => 'El email ya existe',
    'password.required' => 'El campo es requerido',
    'password.min' => 'El mínimo de caracteres permitidos son 6',
    'password.max' => 'El máximo de caracteres permitidos son 18',
    'password.confirmed' => 'Los passwords no coinciden',
       'user.required' => 'el tipo de usuario es 1 o 0'
   ];
   
   $validator = Validator::make($request->all(), $rules, $messages);
   
   //Si la validación no es correcta redireccionar al formulario con los errores
   if ($validator->fails()){
    return redirect()->back()->withErrors($validator);
   }
   else{ // De los contrario guardar al usuario
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->remember_token = str_random(100);
    $user->confirm_token = str_random(100);
    $user->user=$request->user;
    //Activar al administrador sin necesidad de enviar correo electrónico
    $user->active = 1;
    //El valor 1 en la columna determina si el usuario es administrador o no
    //$user->user = 1;
    
    if ($user->save()){
     return redirect()->back()->with('message', 'Enhorabuena nuevo administrador creado correctamente');
    } else{
     return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
    }
   }
  }
  
  return View('admin.createadmin');
}
   public function admin(){
        if ($this->isAdmin()){
            return View('admin.admin');
        } else{
            return redirect()->back();
        }
    }
    
//    public function info_datos_usuario($id)
//	{
//		//funcion para cargar los datos de cada usuario en la ficha
//		$user=User::find($id);
//		$contador=count($user);
//		$tiposusuario=TipoUsuario::all();
//		
//		if($contador>0){          
//            return view("admin.index")
//                   ->with("user",$user)
//                   ->with("tiposusuario",$tiposusuario);
//		}
//		else
//		{            
//            Session::flash('message','El usuario no existe'); 
//		}
//	}
}