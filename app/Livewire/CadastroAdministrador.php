<?php

namespace App\Http\Livewire;

use App\Models\Administrador;
use Livewire\Component;

class CadastroAdministrador extends Component
{
    public $nome, $cpf, $email, $password, $administrador_id;

    public function store()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|unique:administradores,cpf',
            'email' => 'required|email|unique:administradores,email',
            'password' => 'required|min:6|confirmed',
        ]);

        Administrador::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Administrador criado com sucesso!');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nome = '';
        $this->cpf = '';
        $this->email = '';
        $this->password = '';
        $this->administrador_id = null;
    }

    public function render()
    {
        return view('livewire.cadastro-administrador');
    }
}
