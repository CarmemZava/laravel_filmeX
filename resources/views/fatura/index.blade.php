@extends('layouts.templateCZ')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card minha-navbar">
                    {{-- <div class="card-header">{{ __('Listagem de Clientes') }}</div> --}}
                    <h4 class="text-center my-4 fw-bold border-bottom pb-2">Faturas</h4>
                    <p><a href="{{ route('faturas.create') }}"><button type="button" class="btn btn-primary"
                                style="margin-left: 10px">Inserir Nova Fatura</button></a></p>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{dd($clientes)}}; --}}
                        {{-- tudo que é php fica entre 2 chavetas {{Xx}} --}}
                        {{-- Este abaixo mostra as páginas  --}}
                        {{-- <div class="pagination">{{$clientes->links('pagination::bootstrap-5')}}
                            </div> --}}
                        {{-- Para inserir mudança de página já que colocamos para aparecer só 10 clientes por página --}}

                        <nav class="navbar bg-body-tertiary">
                            <div class="container-fluid">
                              <form class="d-flex" role="search" method="GET" action="{{ route('faturas.index') }}">
                                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar" aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-light" style="border-color:purple; color:purple" type="submit">Pesquisar</button>
                              </form>
                            </div>
                          </nav>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">ID Cliente</th>
                                    <th scope="col">Total Líquido</th>
                                    <th scope="col">IVA</th>
                                    <th scope="col" colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($faturas as $fatura)
                                    <tr>
                                        <td>{{$fatura->id}}</td>
                                        <td>{{$fatura->data}}</td>
                                        <td>{{$fatura->clientes->nome}}</td>        {{-- $fatura->clientes --> variável fatura chama a função clientes no seu Modelo Faturas, quando chama a função, ela retorna um belongsTo, portanto espera um obejto cliente e em seguida acede o "nome" deste objeto--}}
                                        <td>{{$fatura->totalLiquido}}</td>
                                        <td>{{$fatura->iva}}</td>
                                        <td>{{$fatura->total}}</td>
                                        <td> <a href="{{route('faturas.edit', $fatura->id)}}"><button class="btn btn-outline-secondary">Editar</button></a></td>
                                    </tr>



                                    @endforeach ()

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
            </div>
        </div>
    </div>
    {{-- JAVA SCRIPT --}}
    <script>
        function confirmar(nome) {
            return confirm('tem certeza que deseja emilinar a fatura do ID Cliente  ' + idCliente + '?');
        }
    </script>
@endsection
