<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('filmes', function (Blueprint $table) {
        $table->id();
        $table->string('titulo'); // Campo string
        $table->text('sinopse'); // Campo text
        $table->integer('ano_lancamento'); // Campo numérico
        $table->date('data_assistido')->nullable(); // Campo data
        $table->boolean('ativo')->default(true); // Campo boolean
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
