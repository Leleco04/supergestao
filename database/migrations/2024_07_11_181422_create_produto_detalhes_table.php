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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2); 
            $table->float('altura', 8, 2);
            $table->timestamps();

            // Definindo a chave estrangeira, referenciando a chave que recebe (produto_id), a chave que será usada (id), que está ON (produtos)
            $table->foreign('produto_id')->references('id')->on('produtos');
            // Declara que o relacionamento é 1 para 1, ou seja, os id's são únicos
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
