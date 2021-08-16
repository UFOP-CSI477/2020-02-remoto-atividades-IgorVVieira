<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvasTable extends Migration
{
    public function up()
    {
        Schema::create('provas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('observacao');
            $table->date('data');
            $table->decimal('valor', 5, 2)->default(0);
            $table->decimal('resultado', 5, 2)->nullable();
            $table->foreignId('user_id')->constrained('user')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('disciplina_id')->constrained('disciplinas')->onUpdate('cascade')->onDelete('cascade');
            $table->$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provas');
    }
}
