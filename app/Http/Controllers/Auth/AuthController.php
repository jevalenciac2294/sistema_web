<?php 
namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Mail;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $redirectPath = '/user';
    
    
    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'getLogout']);
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function postRegister(Request $request) {
        $rules = [
          'name'  => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'email'=> 'required|email|max:255|unique:users,email',
            'password'=> 'required|min:3|max:18|confirmed',
        ];
        $messages = [
            'name.required' => 'El campo es reuqerido',
            'name.min' => 'El minimo de caracter permitidos son 3',
            'name.max' => 'El maximo de caracter permitidos son 16',
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
            return redirect("auth/register")
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
            
            Mail::send('mails.register', ['data' => $data], function($mail) use($data){
                $mail->subject('Confirma tu cuenta');
                $mail->to($data['email'], $data['name']);   
                
                });
                
            return redirect("auth/register")
            ->with("message", "Hemos enviado un mensaje de confimacion a su cuenta");
            
            
        }
        
    }

    public function confirmRegister($email, $confirm_token){
        $user = new User();
        $the_user = $user->select()->where('email', '=', $email)
                ->where('confirm_token', '=', $confirm_token)->get();
        if(count($the_user) > 0){
            $active = 1;
            $confirm_token  = str_random(100);
            $user->where('email', '=', $email)
                    ->update(['active' => $active, 'confirm_token' => $confirm_token]);
                    return redirect('auth/register')
                    ->with('message', 'Que bien!!'.$the_user[0]['name'].'Ya puedes iniciar sesion');
        }else{
            return redirect('');
        }
        
    }
    public function postLogin(Request $request){
             if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                    'active' => 1
                ]
                , $request->has('remember')
                )){
            return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            
            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            return redirect('auth/login')
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Error al iniciar sesión');
        }
        
    }
        public function logout(Request $request) {
            Auth::logout();
            return redirect('auth/login');
        }
}