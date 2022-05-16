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
        Schema::create('clases', function (Blueprint $table) {
            $table->id('id_clase');
            $table->string('Titulo');
            $table->string('Url');
            $table->integer('Nro_clase');
            $table->string('descripcion');
            $table->string('tiempo'); 
            $table->unsignedBigInteger('id_curso');
            $table->timestamps();

            $table->foreign('id_curso')->on('cursos')->references('id_curso')
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
        Schema::dropIfExists('clases');
    }
};
