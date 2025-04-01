<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class CadastroCliente extends Component
{
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $password;

    protected $rules = [
        'nome' => 'required|min:3',
        'endereco' => 'required|min:5',
        'telefone' => 'required|numeric|digits:11',
        'cpf' => 'required|cpf',
        'email' => 'required|email|unique:clientes,email',
        'password' => 'required|min:6',
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
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Cliente cadastrado com sucesso!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.cadastro-cliente');
    }
}
