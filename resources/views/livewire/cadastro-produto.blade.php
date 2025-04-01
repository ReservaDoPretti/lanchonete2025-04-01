<div>
    <div>
        <h2>Cadastro de Produto</h2>
        <form wire:submit.prevent="{{ $produto_id ? 'update' : 'store' }}">
            <input type="text" wire:model="nome" placeholder="Nome do Produto" required>
            <input type="text" wire:model="ingredientes" placeholder="Ingredientes" required>
            <input type="number" wire:model="valor" placeholder="Valor" required>
            <button type="submit">{{ $produto_id ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>
    
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>
    
</div>
