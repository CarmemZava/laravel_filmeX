@extends('layouts.templateCZ')

@section('conteudo')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- O ideal seria colocar o link laravel sweet alert nos layouts porque assim não precisamos colocar em todas as "blades" criados --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <form action="{{ route('clientes.store') }}" method="post">
                        <div class="card text-center minha-navbar2">
                            <div class="card-header">
                                <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item">
                                        <a class="nav-link"><button type="submit"
                                                class="nav-link active">Gravar</button></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"><button type="reset" class="nav-link">Reset</button></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                @csrf
                                <table class="table">
                                    <h4 class="text-center my-4 border-bottom pb-2">Inserir Cliente</h4>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <td><input type="text" name="nome"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Data de Nascimento</th>
                                        <td><input type="date" name="data_nascimento"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Telefone</th>
                                        <td><input type="text" name="telefone"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">e-mail</th>
                                        <td><input type="email" name="email"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Morada</th>
                                        <td><input type="text" name="morada"></td>
                                    </tr>
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

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
