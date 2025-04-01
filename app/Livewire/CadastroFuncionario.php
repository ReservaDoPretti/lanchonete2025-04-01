<?php

namespace App\Http\Livewire;

use App\Models\Funcionario;
use Livewire\Component;

class CadastroFuncionario extends Component
{
    public $nome, $cpf, $email, $password, $funcionario_id;

    // Método para armazenar novo funcionário
    public function store()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|unique:funcionarios,cpf',
            'email' => 'required|email|unique:funcionarios,email',
            'password' => 'required|min:6|confirmed',
        ]);

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Funcionário criado com sucesso!');
        $this->resetInputFields();
    }

    // Método para editar funcionário
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        $this->funcionario_id = $funcionario->id;
        $this->nome = $funcionario->nome;
        $this->cpf = $funcionario->cpf;
        $this->email = $funcionario->email;
    }

    // Método para atualizar funcionário
    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|unique:funcionarios,cpf,' . $this->funcionario_id,
            'email' => 'required|email|unique:funcionarios,email,' . $this->funcionario_id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $funcionario = Funcionario::find($this->funcionario_id);
        $funcionario->update([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => $this->password ? bcrypt($this->password) : $funcionario->password,
        ]);

        session()->flash('message', 'Funcionário atualizado com sucesso!');
        $this->resetInputFields();
    }

    // Resetar os campos
    private function resetInputFields()
    {
        $this->nome = '';
        $this->cpf = '';
        $this->email = '';
        $this->password = '';
        $this->funcionario_id = null;
    }

    public function render()
    {
        return view('livewire.cadastro-funcionario');
    }
}
