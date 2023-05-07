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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidos')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('ci')->unique()->nullable();
            $table->char('sexo')->nullable();
            $table->integer('phone')->unique()->nullable();
            $table->string('domicilio')->nullable();
            $table->smallInteger('suscripcion')->nullable();
            $table->smallInteger('tipo_p');
            $table->smallInteger('tipo_o');
            $table->smallInteger('tipo_f');
            $table->smallInteger('tipo_i');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
