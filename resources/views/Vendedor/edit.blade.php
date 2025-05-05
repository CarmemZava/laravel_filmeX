@extends('layouts.templateCZ')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <form action="{{ route('vendedor.update', $vendedor->nome) }}" method="post" class="card text-center minha-navbar2">
                        @method('PUT')
                        @csrf
                        <div>
                            <div class="card-header">
                                <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item">
                                        <a class="nav-link"><button type="submit" class="nav-link active">Gravar</button></a>
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
                                <h4 class="text-center my-4 border-bottom pb-2">Editar Vendedor</h4>
                                <table class="table">
                                    <thead>
                                        <br>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <td scope="col">{{ $vendedor->nome }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Contato</th>
                                            <td scope="col"><input type="text" name="contato" class="input-fixo" value="{{ $vendedor->contato }}"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Morada</th>
                                            <td scope="col"><input  type="text" name="morada" class="input-fixo" value="{{ $vendedor->morada }}"></td>
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
                                    <a href="{{ route('vendedor.index') }}" class="btn btn-outline-primary"
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
