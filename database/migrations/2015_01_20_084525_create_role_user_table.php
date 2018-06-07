<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoVehiculoTable extends Migration
{
    public function up()
    {
        
        Schema::create('empleadovehiculo', function (Blueprint $table) {
            	$table->increments('id');
			$table->integer('empleado_id')->unsigned()->index();
			$table->foreign('empleado_id')->references('id')->on('empleado')->onDelete('cascade');
			$table->integer('vehiculo_id')->unsigned()->index();
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
        Schema::drop('empleadovehiculo');
    }
}