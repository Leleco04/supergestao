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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 50);
            $table->timestamps();
        });

        Schema::table('produtos', function(Blueprint $table) {
            // Cria a coluna "unidade_id"
            $table->unsignedBigInteger('unidade_id');
            // Transforma a coluna "unidade_id" em FK
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::table('produto_detalhes', function(Blueprint $table) {
            // Cria a coluna "unidade_id"
            $table->unsignedBigInteger('unidade_id');
            // Transforma a coluna "unidade_id" em FK
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_detalhes', function(Blueprint $table) {
            // Remove a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            // Remode a coluna FK (unidade_id)
            $table->dropColumn('unidade_id');
        });

        Schema::table('produtos', function(Blueprint $table) {
            // Remove a FK
            $table->dropForeign('produtos_unidade_id_foreign');
            // Remode a coluna FK (unidade_id) 
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
