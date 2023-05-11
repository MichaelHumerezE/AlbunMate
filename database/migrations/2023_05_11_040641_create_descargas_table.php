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
        Schema::create('descargas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_fotografo');
            $table->unsignedBigInteger('id_invitado');
            $table->unsignedBigInteger('id_foto');
            $table->unsignedBigInteger('id_evento');
            $table->foreign('id_fotografo')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_invitado')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_foto')->references('id')->on('fotos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_evento')->references('id')->on('eventos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('descargas');
    }
};
