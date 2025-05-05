@extends('layouts.templateCZ')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="card text-center minha-navbar">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="#">Eliminar</a> --}}

                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="nav-link"
                                            onclick="return confirmar('{{ $cliente->nome }}')">Eliminar</button>
                                        {{-- incluimos o type submit --}}
                                    </form>




                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" aria-disabled="true"
                                        href="{{ route('faturas.create', $cliente->id) }}">Fatura</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center my-4 border-bottom pb-2">Ficha do Cliente</h4>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <td>{{ $cliente->nome }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Data de Nascimento</th>
                                        <td>{{ $cliente->data_nascimento }}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Telefone</th>
                                        <td>{{ $cliente->telefone }}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $cliente->email }}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Morada</th>
                                        <td>{{ $cliente->morada }}</td>

                                    </tr>
                                </tbody>
                            </table>

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

                </div>
            </div>
        </div>

    </div>
@endsection
