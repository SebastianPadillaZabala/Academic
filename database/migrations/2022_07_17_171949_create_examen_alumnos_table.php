<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_alumnos', function (Blueprint $table) {
            $table->id('id_examen_alumno');
            $table->date('fecha');
            $table->string('estado_examen_alumno');
            $table->unsignedBigInteger('examen_id'); 
            $table->unsignedBigInteger('alumno_id'); 
            $table->timestamps();

            $table->foreign('examen_id')->on('examenes')->references('id_examen')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('alumno_id')->on('alumnos')->references('id_alum')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen__alumnos');
    }
};
