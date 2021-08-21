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
                            <h1>{{ $disciplina->nome }} - {{ $disciplina->codigo }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('academico.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('academico.disciplina.index') }}">Minhas disciplinas</a></li>
                                <li class="breadcrumb-item active">Minhas notas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <h3>Nota total: {{ $notaTotal->total }}/100
                        <button class="btn @if ($userDisciplina->status == 1) btn-success
                    @elseif($userDisciplina->status == 2) btn-danger @else btn-primary @endif">
                        @if ($userDisciplina->status == 1)
                            Aprovado
                        @elseif($userDisciplina->status == 2)
                            Reprovado
                        @else
                            Cursando
                        @endif
                    </button>
                </h3>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tableProvas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Observação</th>
                                            <th>Data de ínicio</th>
                                            <th>Data de término</th>
                                            <th>Valor</th>
                                            <th>Resultado</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($disciplina->provas as $prova)
                                            <tr>
                                                <td>{{ $prova->id }}</td>
                                                <td>{{ $prova->nome }}</td>
                                                <td>{{ $prova->observacao }}</td>
                                                <td>{{ data_br($prova->data_inicio) }}</td>
                                                <td>{{ data_br($prova->data_termino) }}</td>
                                                <td>{{ $prova->valor }}</td>
                                                <td>{{ $prova->resultado }}</td>
                                                <td>
                                                    @if ($prova->status)
                                                        Finalizada
                                                    @else
                                                        Aberta
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Observação</th>
                                            <th>Data de ínicio</th>
                                            <th>Data de término</th>
                                            <th>Valor</th>
                                            <th>Resultado</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Dashboard de notas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <p class="text-center text-primary bold">Total de 100</p>
                        </div>
                    </div>
                </div>
                <form id="formFinalizar" action="{{ route('academico.disciplina.finalizar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $disciplina->id }}">
                    <button id="btnFinalizar" type="submit" @if ($userDisciplina->status) disabled @endif class="btn btn-primary btn-lg btn-block">Finalizar disciplina</button>
                </form>
            </div>
        </section>
    </div>
    @include('layouts.footer')
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('#btnFinalziar').click((event) => {
            event.preventDefault();
            $('#btnFinalziar').prop('disabled', true);
            if ($('#formFinalizar').valid()) {
                $('#formFinalizar').submit();
            } else {
                $('#btnFinalziar').prop('disabled', false);
            }
        });

        $("#tableProvas").DataTable({
            responsive: true,
            lengthChange: false,
            language: {
                paginate: {
                    previous: "Anterior",
                    next: "Próximo"
                },
                search: 'Pesquisar',
            },
            autoWidth: false,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }).buttons().container().appendTo('#tableProvas_wrapper .col-md-6:eq(0)');
    });

    const dashData = {
        labels: [
            @foreach ($disciplina->provas as $prova)
                ['{{ $prova->nome }}'],
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach ($disciplina->provas as $prova)
                    ['{{ $prova->resultado }}'],
                @endforeach
            ],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
    }

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = dashData;
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }

    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions,
    });
</script>
@endsection
