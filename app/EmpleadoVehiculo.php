<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

use Hash;


class EmpleadoVehiculo extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    
    protected $table = 'empleadovehiculo';
    
    protected $dates = ['deleted_at']; 
    
    protected $fillable=['empleado_id', 'vehiculo_id'];
    
    public function vehiculo(){
    return $this->belongToMany(Vehiculo::class);
    }
    
    public function empleado(){
    return $this->belongToMany(Empleado::class);
    }
    
}
