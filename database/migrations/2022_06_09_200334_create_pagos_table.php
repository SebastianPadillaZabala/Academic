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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->float('monto');
            $table->string('owner');
            $table->string('card_number');
            $table->string('expiration_month');
            $table->string('expiration_year');
            $table->string('security_code');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_suscripcion');
            $table->timestamps();

            $table->foreign('id_user')->on('users')->references('id')
            ->onDelete('cascade');
            $table->foreign('id_suscripcion')->on('suscripciones')->references('id_suscrip')
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
        Schema::dropIfExists('pagos');
    }
};
