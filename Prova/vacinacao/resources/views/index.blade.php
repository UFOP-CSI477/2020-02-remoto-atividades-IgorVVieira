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
                            <h1 class="m-0">Relatórios gerais</h1>
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
                    <div class="row">
                        <div class="card col-lg-6">
                            <div class="card-header">
                                <h3 class="card-title">Total geral de vacinas aplicadas</h3>
                            </div>
                            <div class="card-body">
                                <table id="vacinas_aplicadas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Aplicação</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dose única</td>
                                            <td>{{ $doseUnica }}</td>
                                        </tr>
                                        <tr>
                                            <td>Primeira Dose</td>
                                            <td>{{ $primeiraDose }}</td>
                                        </tr>
                                        <tr>
                                            <td>Segunda Dose</td>
                                            <td>{{ $segundaDose }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>TOTAL GERAL</th>
                                            <th class="text-center">{{ $quantidadeTotalRegistros }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card col-lg-6">
                            <div class="card-header">
                                <h3 class="card-title">Total de aplicações por vacina</h3>
                            </div>
                            <div class="card-body">
                                <table id="aplicacoes_vacina" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Vacina</th>
                                            <th>Quantidade</th>
                                            <th>Porcentagem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vacinas as $vacina)
                                            <tr>
                                                <td>{{ $vacina->nome }}</td>
                                                <td>{{ $vacina->registros->count() }}</td>
                                                <td>{{ ($vacina->registros->count() * 100) / $quantidadeTotalRegistros }}%</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>TOTAL GERAL</th>
                                            <th class="text-center">{{ $quantidadeTotalRegistros }}</th>
                                            <th class="text-center">100%</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
            $('#vacinas_aplicadas').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#vacinas_aplicadas_wrapper .col-md-6:eq(0)');

            $('#aplicacoes_vacina').DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>
@endsection
