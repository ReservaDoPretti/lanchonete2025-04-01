<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class CadastroCliente extends Component
{
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:15',
        'cpf' => 'required|unique:clientes,cpf|cpf',
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|min:6|confirmed',
    ];

    public function cadastrar()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
        ]);

        session()->flash('message', 'Cliente cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.cadastro-cliente');
    }
}
