<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('nome');
            $table->string('email');
            $table->string('matricula');
            $table->unsignedBigInteger('satisfaction_id')->nullable();
            $table->boolean('comunicacao');
            $table->boolean('comunicacao_professores')->nullable();
            $table->boolean('comunicacao_coordenadores')->nullable();
            $table->boolean('avaliacoes')->nullable();
            $table->longText('opiniao')->nullable();
            $table->timestamps();

            $table->foreign('satisfaction_id')->references('id')->on('satisfactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
