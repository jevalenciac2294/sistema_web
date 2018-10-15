<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = ['fecha_inicio start','fecha_final end','vehiculo_id','titulo', 'empleado_id', 'hora_inicio', 'hora_final', 'empleados', 'select_Vehiculo', 'select_Ruta'];
    protected $hidden = ['id'];
    
    public function vehiculo(){
    return $this->belongsToMany(Vehiculo::class);
    }
    
    public function empleado(){
    return $this->belongsToMany(Empleado::class);

    }
}
