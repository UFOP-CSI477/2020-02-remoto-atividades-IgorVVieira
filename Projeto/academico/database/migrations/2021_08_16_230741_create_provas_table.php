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
            $table->text('observacao')->nullable();
            $table->date('data_inicio');
            $table->date('data_termino')->nullable();
            $table->decimal('valor', 5, 2)->default(0);
            $table->decimal('resultado', 5, 2)->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('disciplina_id')->constrained('disciplinas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provas');
    }
}
