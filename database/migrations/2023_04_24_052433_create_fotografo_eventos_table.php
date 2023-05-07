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
        Schema::create('fotografo_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fotografo');
            $table->unsignedBigInteger('id_evento');
            $table->foreign('id_fotografo')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('fotografo_eventos');
    }
};
