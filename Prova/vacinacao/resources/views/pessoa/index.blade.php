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
                            <h1 class="m-0">Relatórios de pessoas</h1>
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
                        <table id="relatorio_pessoas" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Data de nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pessoas as $pessoa)
                                    <tr>
                                        <td>{{ $pessoa->id }}</td>
                                        <td>{{ $pessoa->nome }}</td>
                                        <td>{{ $pessoa->bairro }}</td>
                                        <td>{{ $pessoa->cidade }}</td>
                                        <td>{{ $pessoa->data_nascimento }}</td>
                                        <td class="align-center text-center">
                                            <a title="Editar" href="{{ route('pessoa.edit', ['pessoa' => $pessoa]) }}" class="btn btn-info btn-circle">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
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
            $('#relatorio_pessoas').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["excel", "pdf", "print"],
                order: [
                    [1, "asc"]
                ]
            }).buttons().container().appendTo('#relatorio_pessoas_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
