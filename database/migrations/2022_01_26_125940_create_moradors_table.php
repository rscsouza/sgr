<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moradors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membro_id');
            $table->foreign('membro_id')->references('id')->on('membros');
            $table->integer('hierarquia')->default(100);
            $table->boolean('decano')->default(0);
            $table->boolean('morando')->default(1);
            $table->boolean('abandonou')->default(0);
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
        Schema::dropIfExists('moradors');
    }
}
