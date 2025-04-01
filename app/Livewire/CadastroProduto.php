<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class CadastroProduto extends Component
{
    public $nome, $ingredientes, $valor, $produto_id;

    // Método para armazenar novo produto
    public function store()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'ingredientes' => 'required|string',
            'valor' => 'required|numeric',
        ]);

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
        ]);

        session()->flash('message', 'Produto criado com sucesso!');
        $this->resetInputFields();
    }

    // Método para editar produto
    public function edit($id)
    {
        $produto = Produto::find($id);
        $this->produto_id = $produto->id;
        $this->nome = $produto->nome;
        $this->ingredientes = $produto->ingredientes;
        $this->valor = $produto->valor;
    }

    // Método para atualizar produto
    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'ingredientes' => 'required|string',
            'valor' => 'required|numeric',
        ]);

        $produto = Produto::find($this->produto_id);
        $produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
        ]);

        session()->flash('message', 'Produto atualizado com sucesso!');
        $this->resetInputFields();
    }

    // Resetar os campos
    private function resetInputFields()
    {
        $this->nome = '';
        $this->ingredientes = '';
        $this->valor = '';
        $this->produto_id = null;
    }

    public function render()
    {
        return view('livewire.cadastro-produto');
    }
}
