<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('filmes', function (Blueprint $table) {
        // Adiciona a nova coluna depois da coluna 'titulo'
        $table->string('cover_url')->nullable()->after('titulo');
    });
}
};
