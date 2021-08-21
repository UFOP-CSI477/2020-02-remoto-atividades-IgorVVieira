@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Minhas disciplinas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('academico.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Minhas disciplinas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="tableDisciplinas" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Código(s)</th>
                                                <th>Perído</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->disciplinas as $disciplina)
                                                <tr>
                                                    <td>{{ $disciplina->id }}</td>
                                                    <td>{{ $disciplina->nome }}</td>
                                                    <td>{{ $disciplina->codigo }}</td>
                                                    <td class="text-center">{{ $disciplina->periodo }}</td>
                                                    <td class="align-center text-center">
                                                        <a title="Fórum geral" href="{{ route('academico.disciplina.show', ['id' => $disciplina->id]) }}" class="btn btn-info btn-circle">
                                                            <i class="far fa-envelope"></i>
                                                        </a>
                                                        <a title="Minhas notas" href="{{ route('academico.disciplina.minhasNotas', ['id' => $disciplina->id]) }}" class="btn btn-info btn-circle">
                                                            <i class="far fa-clipboard"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Código(s)</th>
                                                <th>Perído</th>
                                                <th>Acessar</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
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
            $("#tableDisciplinas").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                language: {
                    paginate: {
                        previous: "Anterior",
                        next: "Próximo"
                    },
                    search: 'Pesquisar'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }).buttons().container().appendTo('#tableDisciplinas_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
