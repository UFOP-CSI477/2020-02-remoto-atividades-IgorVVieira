<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacinasTable extends Migration
{
    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('fabricante', 100);
            $table->tinyInteger('doses')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacinas');
    }
}
