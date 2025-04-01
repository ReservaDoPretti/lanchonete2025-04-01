<?php

namespace App\Http\Livewire;

use App\Models\Administrador;
use Livewire\Component;

class CadastroAdministrador extends Component
{
    public $nome, $cpf, $email, $senha, $administrador_id;

    // Método para armazenar novo administrador
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

    // Método para editar administrador
    public function edit($id)
    {
        $administrador = Administrador::find($id);
        $this->administrador_id = $administrador->id;
        $this->nome = $administrador->nome;
        $this->cpf = $administrador->cpf;
        $this->email = $administrador->email;
    }

    // Método para atualizar administrador
    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|unique:administradores,cpf,' . $this->administrador_id,
            'email' => 'required|email|unique:administradores,email,' . $this->administrador_id,
            'senha' => 'nullable|min:6|confirmed',
        ]);

        $administrador = Administrador::find($this->administrador_id);
        $administrador->update([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha ? bcrypt($this->senha) : $administrador->senha,
        ]);

        session()->flash('message', 'Administrador atualizado com sucesso!');
        $this->resetInputFields();
    }

    // Resetar os campos
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
