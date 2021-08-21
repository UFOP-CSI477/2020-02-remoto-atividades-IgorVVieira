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

                                <form id="formNovaDisciplina" method="POST" action="{{ route('academico.disciplina.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-8">
                                            <label for="disciplinas">Disciplinas</label>
                                            <select id="disciplinas" name="disciplinas[]" multiple class="form-control select2" required data-placeholder="Selecione as disciplinas">
                                                @foreach ($disciplinas as $disciplina)
                                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnNovaDisciplina" type="submit" class="btn btn-primary">Vincular</button>
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
            $('#formNovaDisciplina').validate({
                rules: {
                    disciplinas: {
                        required: true,
                    },
                },
                messages: {
                    disciplinas: {
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

            $('#btnNovaDisciplina').click((event) => {
                event.preventDefault();
                $('#btnNovaDisciplina').prop('disabled', true);
                if ($('#formNovaDisciplina').valid()) {
                    $('#formNovaDisciplina').submit();
                } else {
                    $('#btnNovaDisciplina').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
