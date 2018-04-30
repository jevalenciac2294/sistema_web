<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\TipoUsuario;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
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


    public static function filterAndPaginate($name)
     {
        //return $this->hasOne('admin\index');
        return User::name($name);
     }
    //course\profile
     public static function scopeName($query, $name)
    {
         
        if(trim($name) !="")
        {
            $query->where('name', 'LIKE', "%$name%");
        }
    }


  public function scopeBusqueda($query,$name)
     {

            if(trim($name) !=""){ 
            $query-> where('full_name','name',"LIKE","%$name%");
                               
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
