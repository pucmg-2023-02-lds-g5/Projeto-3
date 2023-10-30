<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            // Adicione outros campos conforme necessário
            $table->timestamps();
        });
        
        // Criação da tabela Vantagens
        Schema::create('vantagens', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->integer('custo_em_moedas');
            $table->string('imagem')->nullable(); // Adiciona o campo imagem
            $table->foreignId('id_empresa')->constrained('empresas');
            // Adicione outros campos conforme necessário
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
        Schema::dropIfExists('empresas');
    }
}
