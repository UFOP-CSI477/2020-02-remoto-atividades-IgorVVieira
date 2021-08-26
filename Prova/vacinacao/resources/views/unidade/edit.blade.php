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
                            <h1 class="m-0">Editar unidade #{{ $unidade->id }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('registro.index') }}">Home</a></li>
                                <li class="breadcrumb-item">Unidade</li>
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
                                <form action="{{ route('unidade.update', ['unidade'=> $unidade]) }}" method="POST" id="formUpdateUnidade">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group col-lg-4">
                                            <label for="nome">Nome</label>
                                            <input type="text" value="{{ $unidade->nome }}" name="nome" class="form-control" id="nome" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" value="{{ $unidade->bairro }}" name="bairro" class="form-control" id="bairro" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" value="{{ $unidade->cidade }}" name="cidade" class="form-control" id="cidade" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnUpdateUnidade" type="submit" class="btn btn-primary">Editar</button>
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
            $('#formUpdateUnidade').validate({
                rules: {
                    nome: {
                        required: true,
                    },
                    bairro: {
                        required: true,
                    },
                    cidade: {
                        required: true,
                    },
                },
                messages: {
                    nome: {
                        required: 'Por favor preencha este campo.',
                    },
                    bairro: {
                        required: 'Por favor preencha este campo.',
                    },
                    cidade: {
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

            $('#btnUpdateUnidade').click((event) => {
                event.preventDefault();
                $('#btnUpdateUnidade').prop('disabled', true);
                if ($('#formUpdateUnidade').valid()) {
                    $('#formUpdateUnidade').submit();
                } else {
                    $('#btnUpdateUnidade').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
