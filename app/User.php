<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


use App\TipoUsuario;





class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    
    use ShinobiTrait;
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
     protected $dates = ['deleted_at'];
//
//    //course\profile
//     public static function scopeName($query, $name)
//    {
//         
//        if(trim($name) !="")
//        {
//            $query->where('name', 'LIKE', "%$name%");
//        }
//    }


//  public function scopeSearch($query,$name)
//     {
//
//            return $query->where('name',"LIKE","%$name%");
//            
//     }
//     
     public function scopeName($query, $name){
         if(trim($name) !=""){
             $query->where(DB::raw("CONCAT(name, '')"),"LIKE", "%name%" );
         }
     }

     
      public function tipo($idtipo)
      {
        $resul=TipoUsuario::find($idtipo);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "Estandar";
        }
        
      }





}
