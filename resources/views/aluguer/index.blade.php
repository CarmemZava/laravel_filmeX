@extends('layouts.templateCZ')
{{-- No extends colocamos o template utilizado, precisamos também incluir aqui embaixo na "section", conteudo correto correspondente ao template --}}

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card minha-navbar">

                    <h4 class="text-center my-4 fw-bold border-bottom pb-2">Alugueres</h4>



                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Data Aluguer</th>
                                    <th scope="col">Data Devolução</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Filme</th>
                                    <th scope="col"colspan=3></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alugueres as $aluguer)
                                    <tr>
                                        <th scope="row">{{ $aluguer->id }}</th>
                                        <td>{{ $aluguer->data_aluguer }}</td>
                                        <td>{{ $aluguer->data_devolucao}}</td>
                                        <td>{{ $aluguer->clientes->nome}}</td>
                                        <td>{{ $aluguer->filmes->titulo}}</td>
                                        {{-- <td><a href="{{ route('clientes.show', $cliente->id) }}"><button
                                            class="btn btn-outline-success">Mostrar</button></a></td> --}}
                                        {{-- a(link) para inserir o link da rota "mostrar" --}}
                                        {{-- <td><a href="{{ route('clientes.edit', $cliente->id) }}"><button class="btn btn-outline-warning">Editar</button></a></td> --}}
                                        {{-- <td> --}}
                                            {{-- Criamos um form para a parte do eliminar --}}
                                            {{-- Método post é para alterar a base de dados e get é para buscar --}}
                                        {{-- <form action="{{route('clientes.destroy', $cliente->id)}}" method="post"> --}}
                                            {{-- csrf para evitar eliminação em massa --}}
                                            {{-- @method("DELETE")
                                            @csrf --}}
                                            {{-- <button type="submit" class="btn btn-outline-danger" onclick="return confirmar('{{$cliente->nome}}')">Eliminar</button> --}}
                                        {{-- </form>
                                        </td> --}}
                                    </tr>
                                @endforeach

                                {{-- @if (session('alert'))
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Sucesso!',
                                            text: '{{ session('alert') }}',
                                            timer: 3000,
                                            showConfirmButton: false
                                        });
                                    </script>
                                @endif --}}



                            </tbody>
                        </table>


                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    {{-- JAVA SCRIPT --}}
    {{-- <script>
        function confirmar(nome){
            return confirm('tem certeza que deseja emilinar o cliente ' + nome + '?');
        }
    </script> --}}
@endsection
