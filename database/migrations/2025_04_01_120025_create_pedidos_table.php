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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade'); // Relacionamento com o Cliente
            $table->decimal('valor_total', 10, 2);
            $table->decimal('valor_com_desconto', 10, 2)->nullable(false);
            $table->string('forma_pagamento');
            $table->enum('status', ['em_aberto', 'aguardando_preparo', 'em_preparo', 'em_rota', 'entregue']);
            $table->timestamp('data_hora_pedido');  // Adicionando o campo data_hora_pedido
            $table->timestamps();  // Isso cria as colunas created_at e updated_at automaticamente
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
