<div>
    <h2>Cadastro de Administrador</h2>
    <form wire:submit.prevent="{{ $administrador_id ? 'update' : 'store' }}">
        <input type="text" wire:model="nome" placeholder="Nome" required>
        <input type="text" wire:model="cpf" placeholder="CPF" required>
        <input type="email" wire:model="email" placeholder="Email" required>
        <input type="password" wire:model="senha" placeholder="Senha" required>
        <button type="submit">{{ $administrador_id ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>
