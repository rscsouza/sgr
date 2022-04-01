<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->string('nome')->nullable();
            $table->string('apelido')->nullable();
            $table->string('email')->nullable();
            $table->boolean('falecido')->default(0);
            $table->text('observacoes')->nullable();
            $table->string('filiacao_pai')->nullable();
            $table->string('filiacao_mae')->nullable();
            $table->string('telefone_pai')->nullable();
            $table->string('telefone_mae')->nullable();
            $table->integer('perfil')->default(0);
            $table->boolean('ativo')->default(1);
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
        Schema::dropIfExists('membros');
    }
}
