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
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id('id_suscrip');
            $table->string('nombre_plan');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_plan');
            $table->timestamps();

            $table->foreign('id_user')->on('users')->references('id')
            ->onDelete('cascade');
            $table->foreign('id_plan')->on('planes')->references('id_Plan')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscripciones');
    }
};
