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
        Schema::create('incisos', function (Blueprint $table) {
            $table->id('id_inciso');
            $table->string('inciso');
            $table->string('tipo_inciso');
            $table->unsignedBigInteger('pregunta_id');
            $table->timestamps();

            $table->foreign('pregunta_id')->on('preguntas')->references('id_pregunta')
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
        Schema::dropIfExists('incisos');
    }
};
