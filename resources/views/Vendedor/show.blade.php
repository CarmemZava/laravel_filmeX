@extends('layouts.templateCZ')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="card text-center minha-navbar">
                        <h4 class="text-center my-4 border-bottom pb-2">Ficha do Vendedor</h4>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Contato</th>
                                    <th scope="col">Morada</th>
                                    <th scope="col"colspan=3></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">{{ $vendedor->nome }}</td>
                                    <td scope="col">{{ $vendedor->contato }}</td>
                                    <td scope="col">{{ $vendedor->morada }}</td>
                                    <td scope="col"colspan=3></td>
                                </tr>


                            </tbody>
                        </table>

                        <div class="text-start">
                            <a href="{{ route('vendedor.index') }}" class="btn btn-outline-primary"
                                style="text-align: left; margin: 0px 0px 10px 10px ">Voltar</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
