<div>
    <div>
        <h2>Cadastro de Pedido</h2>
        <form wire:submit.prevent="{{ $pedido_id ? 'update' : 'store' }}">
            <select wire:model="cliente_id">
                <option value="">Selecione o Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
    
            <select wire:model="produto_ids" multiple>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
    
            <input type="number" wire:model="valor_total" placeholder="Valor Total" required>
            <input type="text" wire:model="forma_pagamento" placeholder="Forma de Pagamento" required>
            <input type="text" wire:model="status" placeholder="Status" required>
    
            <button type="submit">{{ $pedido_id ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>
    
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>
    
</div>
