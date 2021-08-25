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
                            <h1 class="m-0">Editar pessoa #{{ $pessoa->id }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('registro.index') }}">Home</a></li>
                                <li class="breadcrumb-item">Registro</li>
                                <li class="breadcrumb-item active">Cadastro</li>
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
                                <form action="{{ route('pessoa.update', ['pessoa' => $pessoa]) }}" method="POST" id="formUpdatePessoa">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group col-lg-4">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="nome" value="{{ $pessoa->nome }}" class="form-control" id="nome" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" name="bairro" value="{{ $pessoa->bairro }}" class="form-control" id="bairro" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" name="cidade" value="{{ $pessoa->cidade }}" class="form-control" id="cidade" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data_nascimento">Data de nascimento</label>
                                            <input type="date" name="data_nascimento" value="{{ $pessoa->data_nascimento }}" class="form-control" max="4" min="1" id="data_nascimento" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnUpdatePessoa" type="submit" class="btn btn-primary">Editar</button>
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
            $('#formUpdatePessoa').validate({
                rules: {
                    pessoa_id: {
                        required: true,
                    },
                    unidade_id: {
                        required: true,
                    },
                    vacina_id: {
                        required: true,
                    },
                    dose: {
                        required: true,
                    },
                    data: {
                        required: true,
                    },
                },
                messages: {
                    pessoa_id: {
                        required: 'Por favor preencha este campo.',
                    },
                    unidade_id: {
                        required: 'Por favor preencha este campo.',
                    },
                    vacina_id: {
                        required: 'Por favor preencha este campo.',
                    },
                    dose: {
                        required: 'Por favor preencha este campo.',
                    },
                    data: {
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

            $('#btnUpdatePessoa').click((event) => {
                event.preventDefault();
                $('#btnUpdatePessoa').prop('disabled', true);
                if ($('#formUpdatePessoa').valid()) {
                    $('#formUpdatePessoa').submit();
                } else {
                    $('#btnUpdatePessoa').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
