<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoVantagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('aluno_vantagem', function (Blueprint $table) {
        $table->id();
        $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
        $table->foreignId('vantagem_id')->constrained('vantagens')->onDelete('cascade');
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
        Schema::dropIfExists('aluno_vantagem');
    }
}
