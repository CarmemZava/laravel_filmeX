@extends('layouts.templateCZ')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card minha-navbar">
                    <h4 class="text-center my-4 fw-bold border-bottom pb-2">👨‍💼 Vendedores</h4>
                    <p><a href="{{ route('vendedor.create') }}"><button type="button" class="btn btn-primary"
                                style="margin-left: 10px">Inserir Novo Vendedor</button></a></p>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <nav class="navbar bg-body-tertiary">
                            <div class="container-fluid">
                              <form class="d-flex" role="search" method="GET" action="{{ route('vendedor.index') }}">
                                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar" aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-light" style="border-color:purple; color:purple" type="submit">Pesquisar</button>
                              </form>
                            </div>
                          </nav>

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

                                @foreach ($vendedores as $vendedor)
                                    <tr>
                                        <td class="td-fixo">{{ $vendedor->nome }}</td>
                                        <td class="td-fixo">{{ $vendedor->contato }}</td>
                                        <td class="td-fixo2">{{ $vendedor->morada }}</td>
                                        <td class="td-fixo3"><a href="{{ route('vendedor.show', $vendedor->nome) }}"><button
                                            class="btn btn-outline-secondary">Mostrar</button></a></td>
                                        {{-- a(link) para inserir o link da rota "mostrar" --}}
                                        <td class="td-fixo3"><a href="{{ route('vendedor.edit', $vendedor->nome) }}"><button class="btn btn-outline-secondary">Editar</button></a></td>
                                        <td class="td-fixo3">
                                            {{-- Criamos um form para a parte do eliminar --}}
                                            {{-- Método post é para alterar a base de dados e get é para buscar --}}
                                            <form action="{{route('vendedor.destroy', $vendedor->nome)}}" method="post" >
                                                {{-- csrf para evitar eliminação em massa --}}
                                                @method("DELETE")
                                                @csrf
                                                <a href="{{route('vendedor.destroy', $vendedor->nome)}}"><button type="submit" class="btn btn-outline-secondary" style="margin:0px 0px 0px -12px;" onclick="return confirmar('{{$vendedor->nome}}')">Eliminar</button></a>
                                                 {{-- incluimos o type submit --}}
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
            return confirm('tem certeza que deseja emilinar o vendedor ' + nome + '?');
        }
    </script>
@endsection
