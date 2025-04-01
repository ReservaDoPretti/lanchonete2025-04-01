<?php

namespace App\Http\Livewire;

use App\Models\Administrador;
use Livewire\Component;

class CadastroAdministrador extends Component
{
    public $nome, $cpf, $email, $senha, $administrador_id;

    public function store()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|unique:administradores,cpf',
            'email' => 'required|email|unique:administradores,email',
            'senha' => 'required|min:6|confirmed',
        ]);

        Administrador::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);

        session()->flash('message', 'Administrador criado com sucesso!');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nome = '';
        $this->cpf = '';
        $this->email = '';
        $this->senha = '';
        $this->administrador_id = null;
    }

    public function render()
    {
        return view('livewire.cadastro-administrador');
    }
}
