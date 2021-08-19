@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/fullcalendar/main.css') }}">
@endsection

@section('content')
    <div class="wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard geral</h1>
                            <a href="{{ route('academico.disciplina.prova.getJson') }}">JSON</a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('academico.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard geral</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Avaliações abertas</span>
                                    <span class="info-box-number">
                                        {{ $provasAbertas }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Avaliações finalizadas</span>
                                    <span class="info-box-number">{{ $provasFinalizadas }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Disciplinas cursando</span>
                                    <span class="info-box-number">{{ $disciplinasCursando }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Disciplinas cursadas</span>
                                    <span class="info-box-number">{{ $disciplinasCursadas }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Nova prova/atividade avaliativa</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNovaProva">
                                                    Abrir
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        @include('layouts.footer')
    </div>

    <div class="modal fade" id="modalNovaProva">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nova atividade avaliativa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <form id="formNovaProva" method="POST" action="{{ route('academico.disciplina.prova.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-lg-6">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input type="text" name="nome" class="form-control" id="nome" placeholder="e.g. Prova 1" required maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="observacao">Observação <small class="text-navy text-danger">Opcional</small></label>
                                            <textarea name="observacao" class="form-control" id="observacao" placeholder="Descrição da manutenção/problema" required maxlength="191"> </textarea>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data_inicio">Data de iníco</label>
                                            <input type="date" name="data_inicio" class="form-control" id="data_inicio" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data_termino">Data de término <small class="text-info">Opcional</small></label>
                                            <input type="date" name="data_termino" class="form-control" id="data_termino">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="valor">Valor</label>
                                            <input type="text" name="valor" class="form-control" id="valor" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="disciplina">Disciplina</label>
                                            <select id="disciplina" name="disciplina_id" class="form-control select2" required data-placeholder="Selecione a disciplina">
                                                @foreach ($disciplinas as $disciplina)
                                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button id="btnNovaProva" type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUpdateProva">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atualizar atividade avaliativa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <form id="formUpdateProva" method="POST" action="{{ route('academico.disciplina.prova.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="prova_id" name="id">
                                    <div class="card-body">
                                        <div class="form-group col-lg-6">
                                            <div class="form-group">
                                                <label for="nome_update">Nome</label>
                                                <input type="text" name="nome" class="form-control" id="nome_update" placeholder="e.g. Prova 1" required maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="observacao_update">Observação <small class="text-navy text-danger">Opcional</small></label>
                                            <textarea name="observacao" class="form-control" id="observacao_update" placeholder="Descrição da manutenção/problema" required maxlength="191"> </textarea>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data_inicio_update">Data de iníco</label>
                                            <input type="date" name="data_inicio" class="form-control" id="data_inicio_update" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data_termino_update">Data de término <small class="text-info">Opcional</small></label>
                                            <input type="date" name="data_termino" class="form-control" id="data_termino_update">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="valor_update">Valor</label>
                                            <input type="text" name="valor" class="form-control" id="valor_update" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="disciplina_update">Disciplina</label>
                                            <select id="disciplina_update" name="disciplina_id" class="form-control select2" required data-placeholder="Selecione a disciplina">
                                                @foreach ($disciplinas as $disciplina)
                                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button id="btnUpdateProva" type="submit" class="btn btn-primary">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/main.js') }}"></script>

    <script>
        $(function() {

            $('#formNovaProva').validate({
                rules: {
                    nome: {
                        required: true,
                    },
                    data_inicio: {
                        required: true,
                    },
                    disciplina: {
                        required: true,
                    },
                },
                messages: {
                    nome: {
                        required: 'Por favor, preencha este campo.',
                    },
                    data_inicio: {
                        required: 'Por favor, preencha este campo.',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
            $('.select2').select2();

            $('#btnNovaProva').click((event) => {
                event.preventDefault();
                $('#btnNovaProva').prop('disabled', true);
                if ($('#formNovaProva').valid()) {
                    $('#formNovaProva').submit();
                } else {
                    $('#btnNovaProva').prop('disabled', false);
                }
            });

            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)
                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            var calendar = new Calendar(calendarEl, {
                locale: 'pt-br',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',

                events: "{{ route('academico.disciplina.prova.getJson') }}",
                eventClick: function(info) {
                    console.log(moment(info.event.start).format('DD/MM/YYYY'))
                    var modal = $('#modalUpdateProva');
                    modal.find('input[name="id"]').val(info.event.id);
                    modal.find('input[name="nome"]').val(info.event.title);
                    modal.find('input[name="observacao"]').html(info.event.description);
                    modal.find('input[name="data_inicio"]').val(moment(info.event.start).format('DD/MM/YYYY'));
                    modal.find('input[name="data_termino"]').val(moment(info.event.end).format('DD/MM/YYYY'));
                    modal.find('input[name="valor"]').val(info.event.extendedProps.valor);
                    modal.find('input[name="resultado"]').val(info.event.extendedProps.resultado);
                    modal.find('select[id="disciplina_id"]').val(info.event.extendedProps.disciplina_id);
                    modal.find('select[id="disciplina_id"]').trigger('change');
                    modal.modal('show');
                },

                editable: true,
                droppable: false, // this allows things to be dropped onto the calendar !!!
            });
            calendar.render();
        });
    </script>
@endsection
