<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('descricao', 191);
            $table->date('data_limite');
            $table->integer('tipo', 11);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
