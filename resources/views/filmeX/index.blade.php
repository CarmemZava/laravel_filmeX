@extends('layouts.templateCZ')


@section('conteudo')

    <div class="card mx-auto" style="max-width: 800px;">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('imagem/FilmeX2.png') }}" class="card-img-top" alt="filmeX2">
        </a>
        <div class="card-body">
            <a class="navbar-brand" style="font-size: 30px" href="{{ route('dashboard') }}">
                <i>Bem vindo a FilmeX!</i>
            </a>
            <p class="card-text" id="array"></p>
            <p class="card-text" id="posicao"></p>
        </div>
    </div>
    <br>


@endsection
