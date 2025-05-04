@extends('layouts.templateCZ')
{{-- No extends colocamos o template utilizado, precisamos também incluir aqui embaixo na "section", conteudo correto correspondente ao template --}}

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card minha-navbar">
                    {{-- <div class="card-header">{{ __('Listagem de Clientes') }}</div> --}}
                    <h4 class="text-center my-4 fw-bold border-bottom pb-2">👥 Clientes</h4>
                    <p><a href="{{ route('clientes.create') }}"><button type="button" class="btn btn-primary"
                                style="margin-left: 10px">Inserir Novo Cliente</button></a></p>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{dd($clientes)}}; --}}
                        {{-- tudo que é php fica entre 2 chavetas {{Xx}} --}}
                        {{-- Este abaixo mostra as páginas  --}}
                            <div class="pagination">{{$clientes->links('pagination::bootstrap-5')}}
                            </div>
                         {{-- Para inserir mudança de página já que colocamos para aparecer só 10 clientes por página --}}

                         <nav class="navbar bg-body-tertiary">
                            <div class="container-fluid">
                              <form class="d-flex" role="search" method="GET" action="{{ route('clientes.index') }}">
                                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar" aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-light" style="border-color:purple; color:purple" type="submit">Pesquisar</button>
                              </form>
                            </div>
                          </nav>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"colspan=3></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <th scope="row">{{ $cliente->id }}</th>
                                        <td class="td-fixo">{{ $cliente->nome }}</td>
                                        <td class="td-fixo">{{ $cliente->email }}</td>
                                        <td class="td-fixo"><a href="{{ route('clientes.show', $cliente->id) }}"><button
                                            class="btn btn-outline-secondary">Mostrar</button></a></td>
                                        {{-- a(link) para inserir o link da rota "mostrar" --}}
                                        <td class="td-fixo"><a href="{{ route('clientes.edit', $cliente->id) }}"><button class="btn btn-outline-secondary">Editar</button></a></td>
                                        <td class="td-fixo">
                                            {{-- Criamos um form para a parte do eliminar --}}
                                            {{-- Método post é para alterar a base de dados e get é para buscar --}}
                                        <form action="{{route('clientes.destroy', $cliente->id)}}" method="post">
                                            {{-- csrf para evitar eliminação em massa --}}
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-outline-secondary" onclick="return confirmar('{{$cliente->nome}}')" style="margin-left: -12px;">Eliminar</button> {{-- incluimos o type submit --}}
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (session('alert'))
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
                                @endif



                            </tbody>
                        </table>


                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    {{-- JAVA SCRIPT --}}
    <script>
        function confirmar(nome){
            return confirm('tem certeza que deseja emilinar o cliente ' + nome + '?');
        }
    </script>
@endsection
