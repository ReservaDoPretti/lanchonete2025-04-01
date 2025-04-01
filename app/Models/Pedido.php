<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id', 
        'valor_total', 
        'valor_com_desconto',
        'forma_pagamento', 
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento muitos-para-muitos entre pedidos e produtos
    public function produtos()
    {
        return $this->belongsToMany(Produto::class)
                    ->withPivot('quantidade', 'preco')
                    ->withTimestamps();
    }
}
