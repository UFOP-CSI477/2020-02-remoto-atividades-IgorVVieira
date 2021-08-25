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
                            <h1 class="m-0">Relatórios de vacinas</h1>
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
                        <table id="relatorio_vacinas" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Fabricante</th>
                                    <th>Doses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacinas as $vacina)
                                    <tr>
                                        <td>{{ $vacina->id }}</td>
                                        <td>{{ $vacina->nome }}</td>
                                        <td>{{ $vacina->fabricante }}</td>
                                        <td>{{ $vacina->doses }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Fabricante</th>
                                    <th>Doses</th>
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
            $('#relatorio_vacinas').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["excel", "pdf", "print"],
                order: [
                    [1, "asc"]
                ],
            }).buttons().container().appendTo('#relatorio_vacinas_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
