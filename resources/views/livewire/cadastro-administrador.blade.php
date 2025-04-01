<div>
    <div>
        <h2>Cadastro de Administrador</h2>
    
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        <form wire:submit.prevent="store">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" wire:model="nome">
            </div>
    
            <div>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" wire:model="cpf">
            </div>
    
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" wire:model="email">
            </div>
    
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" wire:model="senha">
            </div>
    
            <div>
                <label for="senha_confirmation">Confirmar Senha:</label>
                <input type="password" id="senha_confirmation" wire:model="senha_confirmation">
            </div>
    
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    
</div>
