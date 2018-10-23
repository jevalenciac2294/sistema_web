<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

use Hash;


class Rutas_Vehiculos extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
      use SoftDeletes;


    
    protected $table = 'rutasvehiculos';
    
    protected $dates = ['deleted_at']; 
    
    protected $fillable=['ruta_id', 'vehiculo_id'];
    
    public function vehiculo(){
    return $this->belongToMany(Vehiculo::class);
    }
    
    public function rutas(){
    return $this->belongToMany(Ruta::class);
    }
        public function rutasVehiculos(){
        return EmpleadoVehiculo::where('ruta_id', '=', $id)->get();
    }
    
}
