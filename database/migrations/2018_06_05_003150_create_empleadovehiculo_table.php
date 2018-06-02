<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadovehiculoTable extends Migration
{
    public function up()
    {
        
        Schema::create('empleadovehiculo', function (Blueprint $table) {
            $table->increments('id')->unique();
            
            $table->Integer('empleado_id')->unsigned();

            $table->Integer('ruta_id')->unsigned();
            $table->Integer('vehiculo_id')->unsigned();
            
//            $table->foreign('ruta_id')->references('id')->on('rutas')
//                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('empleado');
            $table->foreign('ruta_id')->references('id')->on('rutas');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo');
            
//            $table->foreign('vehiculo_id')->references('id')->on('vehiculo')
//                    ->onUpdate('cascade')->onDelete('cascade');
                    
            $table->timestamps();
            $table->softdeletes(); //Nueva línea, para el borrado lógico

            //$table->primary('id');//quito esto?no
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleadovehiculo');
    }
}