@extends('layouts.templateCZ')

@section('conteudo')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- O ideal seria colocar o link laravel sweet alert nos layouts porque assim não precisamos colocar em todas as "blades" criados --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="background-color: #FFEDC7">
                    <form action="{{ route('faturas.store') }}" method="post">
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
                                    <h4 class="text-center my-4 border-bottom pb-2">Inserir Fatura</h4>
                                    <th colspan="4">ID :
                                        {{ $proximoId }}
                                    </th>
                                    <tr>
                                        <th scope="col">Data</th>
                                        <td><input type="date" name="data"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">ID Cliente</th>
                                        <td><select name="idCliente" id="''"> {{-- name é para dar nome ao objeto  --}}
                                                @foreach ($clientes as $cliente)
                                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                                    {{-- Vai apresenta o nome da variável cliente, mas o que GUARDA é o que está apresentado no value que no caso é o id do Cliente  --}}
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="col">Total Líquido</th>
                                        <td><input type="number" name="totalLiquido" step="0.01" min="0"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">IVA</th>
                                        <td><input type="number" name="iva" step="0.01" min="0" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Total</th>
                                        <td><input type="number" name="total" step="0.01" min="0" required>
                                        </td>
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
                                    <a href="{{ route('faturas.index') }}" class="btn btn-outline-primary"
                                        style="text-align: left">Voltar</a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
