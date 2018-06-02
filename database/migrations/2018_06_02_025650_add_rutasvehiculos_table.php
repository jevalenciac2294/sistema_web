<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddRutasvehiculosTable extends Migration
{
    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rutasvehiculos', function (Blueprint $table) {
                    
                $table->softdeletes(); //Nueva línea, para el borrado lógico
    
//            $table->foreign('ruta_id')->references('id')->on('rutas')
//                    ->onUpdate('cascade')->onDelete('cascade');
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('rutasvehiculos');
    }
}