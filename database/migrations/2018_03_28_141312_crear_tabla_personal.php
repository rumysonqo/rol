<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dni')->unique();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->integer('id_profesion')->unsigned();
            $table->foreign('id_profesion')->references('id')->on('profesion');
            $table->integer('colegiatura');
            $table->integer('id_condicion')->unsigned();
            $table->foreign('id_condicion')->references('id')->on('condicion');
            $table->integer('id_establecimiento')->unsigned();
            $table->foreign('id_establecimiento')->references('id')->on('establecimiento');
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
        Schema::dropIfExists('personal');
    }
}
