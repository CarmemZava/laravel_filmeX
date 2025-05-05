@extends('layouts.templateCZ')
{{-- No extends colocamos o template utilizado, precisamos também incluir aqui embaixo na "section", conteudo correto correspondente ao template --}}

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 style="margin: 20px 10px 20px 10px; text-align: center;">Filmes</h4>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                         <nav class="navbar bg-body-tertiary">
                            <div class="container-fluid">
                              <form class="d-flex" role="search" method="GET" action="{{ route('filmes.index') }}">
                                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar" aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-light" style="border-color:purple; color:purple" type="submit">Pesquisar</button>
                              </form>
                            </div>
                          </nav>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Gênero</th>
                                    <th scope="col">Duração</th>
                                    <th scope="col"colspan=3></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($filmes as $filme)
                                    <tr>
                                        <th scope="row">{{ $filme->id }}</th>
                                        <td>{{ $filme->titulo }}</td>
                                        <td>{{ $filme->generos->genero }}</td>     {{-- generos aqui é a função que faz a relação entre filme e genero (Model Filme)  --}}
                                        <td>{{ $filme->duracao }}</td>
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
            </div>
        </div>
    </div>
    {{-- JAVA SCRIPT --}}
    <script>
        function confirmar(titulo){
            return confirm('tem certeza que deseja emilinar o filme ' + titulo + '?');
        }
    </script>
@endsection
