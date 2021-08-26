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
                            <h1 class="m-0">Cadastro de pessoa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('registro.index') }}">Home</a></li>
                                <li class="breadcrumb-item">Pessoa</li>
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
                                <form action="{{ route('pessoa.store') }}" method="POST" id="formStorePessoa">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-lg-4">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="nome" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" name="bairro" class="form-control" id="bairro" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" name="cidade" class="form-control" id="cidade" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data_nascimento">Data de nascimento</label>
                                            <input type="date" name="data_nascimento" class="form-control" max="4" min="1" id="data_nascimento" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnStorePessoa" type="submit" class="btn btn-primary">Cadastrar</button>
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
            $('#formStorePessoa').validate({
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

            $('#btnStorePessoa').click((event) => {
                event.preventDefault();
                $('#btnStorePessoa').prop('disabled', true);
                if ($('#formStorePessoa').valid()) {
                    $('#formStorePessoa').submit();
                } else {
                    $('#btnStorePessoa').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
