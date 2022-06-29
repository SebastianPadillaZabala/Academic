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
        Schema::create('cursos_alumnos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado',['activo','inactivo','pendiente'])->default('activo');
            $table->integer('progreso');

            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id_curso')->on('cursos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id_alum')->on('alumnos')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cursos_alumnos');
    }
};
