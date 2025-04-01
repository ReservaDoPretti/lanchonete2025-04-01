<div>
    <h2>Cadastro de Cliente</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="cadastrar">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" wire:model="nome" required>
            @error('nome') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" wire:model="endereco" required>
            @error('endereco') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" wire:model="telefone" required>
            @error('telefone') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" wire:model="cpf" required>
            @error('cpf') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" wire:model="senha" required>
            @error('senha') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="senha_confirmation">Confirmar Senha:</label>
            <input type="password" id="senha_confirmation" wire:model="senha_confirmation" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>
