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
            $table->foreignId('pessoa_id')->constrained('pessoas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained('unidades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vacina_id')->constrained('vacinas')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('dose')->default(0);
            $table->date('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
