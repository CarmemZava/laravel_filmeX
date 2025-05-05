@extends('layouts.templateCZ1') {{-- ou o nome do seu layout, se for diferente --}}

@section('conteudo1')

<style>
    .fundo{
    background: linear-gradient(rgba(0, 0, 0, 0.767), rgba(0, 0, 0, 0.89)), url('{{ asset('imagem/FilmeX2.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;


    }
</style>


<body style="background: linear-gradient(to bottom, rgba(245, 240, 240, 0.274), rgba(0, 0, 0, 0)), url('{{ asset('imagem/FilmeX2.png') }}'); background-size: cover; background-position: center; background-repeat: auto; min-height: 100vh;">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">{{ __('Dashboard') }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-dark">
                            {{ __("You're logged in!") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
