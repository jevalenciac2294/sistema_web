<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsignaEmpleadovehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
        Schema::create('empleadoVehiculo', function (Blueprint $table) {
                $table->increments('id')->unique();
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleado')->onDelete('cascade');
            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo')->onDelete('cascade');
            
            $table->timestamps();
            $table->softdeletes(); //Nueva línea, para el borrado lógico
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleadoVehiculo');
    }
}
