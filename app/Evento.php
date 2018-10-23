<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria


class Evento extends Model
{      use SoftDeletes;

      protected $dates = ['deleted_at']; 
    protected $table = 'eventos';
    protected $fillable = ['fecha_inicio start','fecha_final end','vehiculo_id','titulo', 'empleado_id', 'hora_inicio', 'hora_final', 'empleados', 'select_Vehiculo', 'select_Ruta'];
    protected $hidden = ['id'];
    
    public function vehiculo(){
    return $this->belongsToMany(Vehiculo::class);
    }
    
    public function empleado(){
    return $this->belongsToMany(Empleado::class);

    }
    public function rutas(){
    return $this->belongToMany(Ruta::class);
    }
}
