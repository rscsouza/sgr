<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membro_id');
            $table->foreign('membro_id')->references('id')->on('membros');
            $table->timestamp('data_formatura')->nullable();
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
        Schema::dropIfExists('ex_alunos');
    }
}
