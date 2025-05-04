@extends('layouts.templateCZ')

@section('conteudo')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- O ideal seria colocar o link laravel sweet alert nos layouts porque assim não precisamos colocar em todas as "blades" criados --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="background-color: #FFEDC7">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="post"
                        class="card text-center minha-navbar2">
                        @method('PUT')
                        @csrf

                        <div>
                            <div class="card-header">
                                <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item">
                                        <a class="nav-link"><button type="submit"
                                                class="nav-link active">Gravar</button></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"><button type="reset" class="nav-link">Reset</button></a>
                                        {{-- <a class="nav-link" href="#">Limpar</a> --}}
                                    </li>
                                    {{-- <li class="nav-item">
                                    <a class="nav-link disabled" aria-disabled="true"
                                        href="{{ route('faturas.create', $cliente->id) }}">Fatura</a>
                                </li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center my-4 border-bottom pb-2">Editar Cliente</h4>
                                <table class="table">
                                    <thead>
                                        <br>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <td><input type="text" class="input-fixo" name="nome"
                                                    value="{{ $cliente->nome }}"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Data de Nascimento</th>
                                            <td><input type="date" class="input-fixo" name="data_nascimento"
                                                    value="{{ $cliente->data_nascimento }}"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telefone</th>
                                            <td><input type="text" class="input-fixo" name="telefone"
                                                    value="{{ $cliente->telefone }}"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><input type="email" class="input-fixo" name="email"
                                                    value="{{ $cliente->email }}"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Morada</th>
                                            <td><input type="text" class="input-fixo" name="morada"
                                                    value="{{ $cliente->morada }}"></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="text-start">
                                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary"
                                        style="text-align: left">Voltar</a>
                                </div>
                                <script>
                                    function confirmar(nome) {
                                        return confirm('tem certeza que deseja emilinar o cliente ' + nome + '?');
                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
