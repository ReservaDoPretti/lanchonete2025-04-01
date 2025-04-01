<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Livewire\Component;

class CadastroPedido extends Component
{
    public $cliente_id, $produto_ids = [], $valor_total, $forma_pagamento, $status;
    public $pedido_id;

    // Método para armazenar novo pedido
    public function store()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_ids' => 'required|array',
            'produto_ids.*' => 'exists:produtos,id',
            'valor_total' => 'required|numeric',
            'forma_pagamento' => 'required|string',
            'status' => 'required|string',
        ]);

        $pedido = Pedido::create([
            'cliente_id' => $this->cliente_id,
            'valor_total' => $this->valor_total,
            'forma_pagamento' => $this->forma_pagamento,
            'status' => $this->status,
        ]);

        $pedido->produtos()->attach($this->produto_ids);

        session()->flash('message', 'Pedido criado com sucesso!');
        $this->resetInputFields();
    }

    // Método para editar pedido
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        $this->pedido_id = $pedido->id;
        $this->cliente_id = $pedido->cliente_id;
        $this->produto_ids = $pedido->produtos->pluck('id')->toArray();
        $this->valor_total = $pedido->valor_total;
        $this->forma_pagamento = $pedido->forma_pagamento;
        $this->status = $pedido->status;
    }

    // Método para atualizar pedido
    public function update()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_ids' => 'required|array',
            'produto_ids.*' => 'exists:produtos,id',
            'valor_total' => 'required|numeric',
            'forma_pagamento' => 'required|string',
            'status' => 'required|string',
        ]);

        $pedido = Pedido::find($this->pedido_id);
        $pedido->update([
            'cliente_id' => $this->cliente_id,
            'valor_total' => $this->valor_total,
            'forma_pagamento' => $this->forma_pagamento,
            'status' => $this->status,
        ]);

        $pedido->produtos()->sync($this->produto_ids);

        session()->flash('message', 'Pedido atualizado com sucesso!');
        $this->resetInputFields();
    }

    // Resetar os campos
    private function resetInputFields()
    {
        $this->cliente_id = null;
        $this->produto_ids = [];
        $this->valor_total = null;
        $this->forma_pagamento = '';
        $this->status = '';
        $this->pedido_id = null;
    }

    public function render()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('livewire.cadastro-pedido', compact('clientes', 'produtos'));
    }
}
