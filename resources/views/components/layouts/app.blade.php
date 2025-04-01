<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>

    <!-- Importando os estilos do Livewire -->
    @livewireStyles

    <!-- Você pode incluir aqui o seu CSS customizado ou os frameworks como o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Outros estilos -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Aqui você pode incluir o seu cabeçalho, menu, etc. -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Minha Aplicação</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('cadastro-cliente') }}">Cadastro Cliente</a>
                </li>
                <!-- Adicione outros links aqui -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Aqui será inserido o conteúdo específico de cada página -->
        @yield('content')
    </div>

    <!-- Scripts -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
