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
                            <h1 class="m-0">Cadatro de vacina</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('registro.index') }}">Home</a></li>
                                <li class="breadcrumb-item">Vcina</li>
                                <li class="breadcrumb-item active">Registro</li>
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
                                    <h3 class="card-title">Nova vacina</small></h3>
                                </div>
                                <form action="{{ route('vacina.store') }}" method="POST" id="formStoreVacina">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-lg-4">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="nome" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="fabricante">Fabricante</label>
                                            <input type="text" name="fabricante" class="form-control" id="fabricante" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="doses">Doses</label>
                                            <input type="number" name="doses" class="form-control" id="doses" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnStoreVacina" type="submit" class="btn btn-primary">Cadastrar</button>
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
            $('#formStoreVacina').validate({
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

            $('#btnStoreVacina').click((event) => {
                event.preventDefault();
                $('#btnStoreVacina').prop('disabled', true);
                if ($('#formStoreVacina').valid()) {
                    $('#formStoreVacina').submit();
                } else {
                    $('#btnStoreVacina').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
