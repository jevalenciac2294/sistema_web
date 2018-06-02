<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasvehiculosTable extends Migration
{
    public function up()
    {
        
        Schema::create('rutasvehiculos', function (Blueprint $table) {
            $table->increments('id')->unique();

            $table->Integer('ruta_id')->unsigned();
            $table->Integer('vehiculo_id')->unsigned();
            
//            $table->foreign('ruta_id')->references('id')->on('rutas')
//                    ->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('ruta_id')->references('id')->on('rutas');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo');
            
//            $table->foreign('vehiculo_id')->references('id')->on('vehiculo')
//                    ->onUpdate('cascade')->onDelete('cascade');
                    
            $table->timestamps();
            
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
        Schema::drop('rutasvehiculos');
    }
}