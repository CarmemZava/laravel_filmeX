@extends('layouts.templateCZ')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="background-color: #FFEDC7">
                    <form action="{{ route('vendedor.store') }}" method="post">
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
                                    <h5 class="card-title" style="color: rgb(26, 15, 15); font-size: 22px">Inserir Vendedor
                                    </h5>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <td><input type="text" name="nome"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Contato</th>
                                        <td><input type="text" name="contato"></td>
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
                                    <a href="{{ route('vendedor.index') }}" class="btn btn-outline-primary"
                                        style="text-align: left">Voltar</a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
