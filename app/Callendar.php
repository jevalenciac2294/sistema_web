<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callendar extends Model
{
    protected $table = 'callendars';
    protected $fillable = ['fechaIni','fechaFin','vehiculo_id','titulo', 'empleado_id', 'hora_inicio', 'hora_final'];
    protected $hidden = ['id'];
    
    public function vehiculo(){
    return $this->belongToMany(Vehiculo::class);
    }
    
    public function empleado(){
    return $this->belongToMany(Empleado::class);
    }
}
