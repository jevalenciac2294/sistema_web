<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
      



class Vehiculo extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    use SoftDeletes;

      protected $dates = ['deleted_at']; 
    protected $table = 'vehiculo';
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['matricula', 'marca','modelo','color'];
    
    public function rutasvehiculos(){
    return $this->belongToMany(Rutas_vehiculos::class);
    }
    public function empleado(){
    return $this->belongToMany(Empleado::class);
    }
}
