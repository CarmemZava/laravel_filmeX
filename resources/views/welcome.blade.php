<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Laravel</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Bootstrap (caso não esteja no app.css) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navegação -->
    <header class="py-3 border-bottom bg-white shadow-sm">
        <div class="container d-flex justify-content-end" style="gap:20px">
            @if (Route::has('login'))
                @auth
                    <a class="btn btn-outline-primary me-2" href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 800px;">
            <a href="{{ route('filmes.index') }}">
                <img src="{{ asset('imagem/FilmeX2.png') }}" class="card-img-top" alt="filmeX2">
            </a>
            <div class="card-body text-center">
                <a class="navbar-brand mb-3 d-block fs-3" href="{{ route('filmes.index') }}"><i>Bem vindo a FilmeX!</i></a>
                <p class="card-text" id="array"></p>
                <p class="card-text" id="posicao"></p>
                {{-- Botões de exemplo --}}
                {{-- <a href="#" class="btn btn-primary me-2" onclick="carregarArray()">Carregar Array</a>
                <a href="#" class="btn btn-secondary" onclick="posicao()">Posição</a> --}}
            </div>
        </div>
    </main>

</body>
</html>
