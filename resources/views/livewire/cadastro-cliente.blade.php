<div>
    <div class="d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="card shadow-sm p-4" style="width: 400px;">
            <h2 class="text-center mb-4">Cadastro de Cliente</h2>
    
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
    
            <form wire:submit.prevent="cadastrar">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" wire:model="nome" class="form-control" placeholder="Digite seu nome">
                    @error('nome') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" id="endereco" wire:model="endereco" class="form-control" placeholder="Digite seu endereço">
                    @error('endereco') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" id="telefone" wire:model="telefone" class="form-control" placeholder="Digite seu telefone">
                    @error('telefone') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" wire:model="cpf" class="form-control" placeholder="Digite seu CPF">
                    @error('cpf') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" wire:model="email" class="form-control" placeholder="Digite seu e-mail">
                    @error('email') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" wire:model="senha" class="form-control" placeholder="Digite sua senha">
                    @error('senha') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>
    
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
        </div>
    </div>
    
</div>
