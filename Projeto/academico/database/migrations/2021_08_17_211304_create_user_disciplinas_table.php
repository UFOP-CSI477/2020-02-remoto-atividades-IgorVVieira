<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDisciplinasTable extends Migration
{
    public function up()
    {
        Schema::create('user_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('disciplina_id')->constrained('disciplinas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_disciplinas');
    }
}
