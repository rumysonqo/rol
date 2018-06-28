<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstablecimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',150);
            $table->integer('id_micro_red')->unsigned();
            $table->foreign('id_micro_red')->references('id')->on('micro_red');
            $table->integer('ugipress')->unsigned();
            $table->integer('ipress')->unsigned();
            $table->enum('tipo',['Puesto de Salud','Centro de Salud']);
            $table->enum('categoria',['I-1 Puesto de Salud','I-2 Puesto de Salud con Medico','I-3 Centro de Salud sin Internamiento','I-4 Centro de Salud con Internamiento']);
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
        Schema::dropIfExists('establecimiento');
    }
}
