<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria


class Ruta extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
          use SoftDeletes;

      protected $dates = ['deleted_at']; 
    protected $table = 'rutas';
    
    protected $fillable=['name', 'lat', 'lng'];
    
    
    public function ubicaciones(){
    return $this->belongToMany(Ubicacion::class);
    }

}
