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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');            
            $table->string('name');
            $table->string('image');
            $table->string('descripcion');
            $table->integer('cantidad_clases');
            $table->string('estado'); 
            $table->date('fecha'); 
            $table->unsignedBigInteger('id_prof');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();            

            $table->foreign('id_prof')->on('profesores')->references('id_profe')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_categoria')->on('categorias')->references('id_cat')
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
        Schema::dropIfExists('cursos');
    }
};
