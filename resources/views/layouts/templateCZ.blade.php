<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <title>Document</title>

</head>

<body>

    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('filmeX.index') }}" style="font-size: 25px"><i>FilmeX</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 16px;">
                                Utilizador
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('filmes.index') }}"
                                        style="font-size: 18px;">Filmes</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 16px;">
                                Administrador
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('filmes.index2') }}"
                                        style="font-size: 18px;">Filmes</a></li>
                                <li><a class="dropdown-item" href="{{ route('clientes.index') }}"
                                        style="font-size: 18px;">Clientes</a></li>
                                <li><a class="dropdown-item" href="{{ route('vendedor.index') }}"
                                        style="font-size: 18px;">Vendedores</a></li>
                                <li><a class="dropdown-item" href="{{ route('aluguer.index') }}"
                                        style="font-size: 18px;">Algueres</a></li>
                                <li><a class="dropdown-item" href="{{ route('faturas.index') }}"
                                        style="font-size: 18px;">Faturas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <br>
        @yield('conteudo')
    </div>

</body>

</html>
