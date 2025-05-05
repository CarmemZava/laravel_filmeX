@extends('layouts.templateCZ1')
{{-- No extends colocamos o template utilizado, precisamos também incluir aqui embaixo na "section", conteudo correto correspondente ao template --}}


@section('conteudo1')
    <style>

        div{
            /* justify-content: center; */
            /* background-color: #e4dde7 */
        }

        a{
            font-size: 60px
        }

    </style>

    <div class="card" style="width: 50rem; margin: 0 auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <a href="{{route('dashboard')}}"><img src="{{ asset('imagem/FilmeX2.png') }}" class="card-img-top" alt="filmeX2"></a>
        <div class="card-body">
        <a class="navbar-brand" style="font-size: 30px" href="{{route('dashboard')}}"><i>Bem vindo a FilmeX!</i></a>
          <p class="card-text" id="array"></p>
          <p class="card-text" id="posicao"></p>
          {{-- <a href="#" class="btn btn-primary" onclick="carregarArray()">Carregar Array</a>
          <a href="#" class="btn btn-primary" onclick="posicao()">Posição</a> --}}
        </div>
      </div>



    {{-- <img src="{{ asset('imagem/FilmeX2.png') }}" alt="filmeX"> --}}
@endsection
