<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInfraestructura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infraestructura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_establecimiento')->unsigned();
            $table->foreign('id_establecimiento')->references('id')->on('establecimiento');
            $table->integer('consultorio_fisico');
            $table->integer('consultorio_funcional');
            $table->integer('camas_hospitalarias');
            $table->integer('camas_ups_medicina');
            $table->integer('camas_ups_obstetricia');
            $table->integer('cunas');
            $table->integer('ambulancias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infraestructura');
    }
}
