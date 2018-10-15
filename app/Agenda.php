<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['fecha_inicio','fecha_final','vehiculo_id','titulo', 'empleado_id'];
    protected $hidden = ['id'];
    
    public function vehiculo(){
    return $this->belongToMany(Vehiculo::class);
    }
    
    public function empleado(){
    return $this->belongToMany(Empleado::class);
    }
}
