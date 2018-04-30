<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use SoftDeletes;

class AddColumnEmpleados extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table){
            
        $table->softdeletes(); //Nueva línea, para el borrado lógico
        });
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    }
    public function down()
    {
        Schema::dropColumn();
    }
}
