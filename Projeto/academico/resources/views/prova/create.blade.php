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
                            <h1>Vincular disciplina</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('academico.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Vincular disciplina</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Vincular disciplinas</h3>
                                </div>

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
                                            <label for="data">Data</label>
                                            <input type="date" name="data" class="form-control" id="data" required>
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
                                    <div class="card-footer">
                                        <button id="btnNovaProva" type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">

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
            $('#formNovaProva').validate({
                rules: {
                    nome: {
                        required: true,
                    },
                    data: {
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
                    data: {
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
        });
    </script>
@endsection
