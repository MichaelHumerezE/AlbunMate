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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descripcion')->nullable();
            $table->string('carpeta');
            $table->string('image');
            $table->string('direccion');
            $table->date('fecha');
            $table->time('hora');
            $table->string('codigo');
            $table->unsignedBigInteger('id_tipoEvento');
            $table->unsignedBigInteger('id_organizador');
            $table->foreign('id_tipoEvento')->references('id')->on('tipo_eventos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_organizador')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('eventos');
    }
};
