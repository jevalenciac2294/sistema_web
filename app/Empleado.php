<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

use Hash;


class Empleado extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use SoftDeletes;
    
       
    protected $dates = ['deleted_at']; 
    protected $table = 'empleado';
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'apellidoS','documento','email','direccion','telefono','sueldo' ];
    
    
    public function empleadovehiculo(){
    return $this->belongToMany(EmpleadoVehiculo::class);
    }
    public function vehiculo(){
    return $this->belongToMany(Vehiculo::class);
    }
    public function evento(){
    return $this->belongsToMany(Evento::class);
    }

}
