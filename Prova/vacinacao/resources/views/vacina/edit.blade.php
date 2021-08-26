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
                            <h1 class="m-0">Editar vacina #{{ $vacina->id }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('registro.index') }}">Home</a></li>
                                <li class="breadcrumb-item">Vacina</li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                </div>
                                <form action="{{ route('vacina.update', ['vacina' => $vacina]) }}" method="POST" id="formUpdateVacina">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group col-lg-4">
                                            <label for="nome">Nome</label>
                                            <input type="text" value="{{ $vacina->nome }}" name="nome" class="form-control" id="nome" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="fabricante">Fabricante</label>
                                            <input type="text" value="{{ $vacina->fabricante }}" name="fabricante" class="form-control" id="fabricante" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="doses">Doses</label>
                                            <input type="number" value="{{ $vacina->doses }}" name="doses" class="form-control" id="doses" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnUpdateVacina" type="submit" class="btn btn-primary">Editar</button>
                                    </div>
                                </form>
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
            $('.select2').select2();
            $('#formUpdateVacina').validate({
                rules: {
                    nome: {
                        required: true,
                    },
                    fabricante: {
                        required: true,
                    },
                    doses: {
                        required: true,
                    },
                },
                messages: {
                    nome: {
                        required: 'Por favor preencha este campo.',
                    },
                    fabricante: {
                        required: 'Por favor preencha este campo.',
                    },
                    doses: {
                        required: 'Por favor preencha este campo.',
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

            $('#btnUpdateVacina').click((event) => {
                event.preventDefault();
                $('#btnUpdateVacina').prop('disabled', true);
                if ($('#formUpdateVacina').valid()) {
                    $('#formUpdateVacina').submit();
                } else {
                    $('#btnUpdateVacina').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
