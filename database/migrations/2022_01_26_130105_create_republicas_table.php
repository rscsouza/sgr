<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->text('historia')->nullable();
            $table->text('estrutura')->nullable();
            $table->text('localizacao')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->integer('vagas')->default(1);
            $table->boolean('anunciar_vagas')->default(0);
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
        Schema::dropIfExists('republicas');
    }
}
