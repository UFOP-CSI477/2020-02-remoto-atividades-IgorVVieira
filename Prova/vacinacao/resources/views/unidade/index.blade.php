@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Relatórios de unidades</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="{{ route('registro.index') }}">Área geral</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table id="relatorio_unidades" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unidades as $unidade)
                                    <tr>
                                        <td>{{ $unidade->id }}</td>
                                        <td>{{ $unidade->nome }}</td>
                                        <td>{{ $unidade->bairro }}</td>
                                        <td>{{ $unidade->cidade }}</td>
                                        <td class="align-center text-center">
                                            @if (!$unidade->registros->isEmpty())
                                                <button title="Editar" disabled class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @else
                                                <form action="{{ route('unidade.destroy', ['unidade' => $unidade]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Excluir" type="submit" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Data de nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        @include('layouts.footer')
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#relatorio_unidades').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["excel", "pdf", "print"],
                order: [
                    [1, "asc"]
                ]
            }).buttons().container().appendTo('#relatorio_unidades_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
