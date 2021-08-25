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
                            <h1 class="m-0">Cadatro de registro</h1>
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
                                    <h3 class="card-title">Novo registro</small></h3>
                                </div>
                                <form action="{{ route('registro.store') }}" method="POST" id="formStoreRegistro">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-8">
                                            <label for="pessoa_id">Pessoa</label>
                                            <select id="pessoa_id" name="pessoa_id" class="form-control select2" required>
                                                <option value="" selected disabled>Selecione</option>
                                                @foreach ($pessoas as $pessoa)
                                                    <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-8">
                                            <label for="unidade_id">Unidade</label>
                                            <select id="unidade_id" name="unidade_id" class="form-control select2" required>
                                                <option value="" selected disabled>Selecione</option>
                                                @foreach ($unidades as $unidade)
                                                    <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-8">
                                            <label for="vacina_id">Vacina</label>
                                            <select id="vacina_id" name="vacina_id" class="form-control select2" required>
                                                <option value="" selected disabled>Selecione</option>
                                                @foreach ($vacinas as $vacina)
                                                    <option value="{{ $vacina->id }}">{{ $vacina->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="dose">Dose</label>
                                            <input type="number" name="dose" class="form-control" max="2" min="0" id="dose" placeholder="Quantidade de doses recomendadas para vacina." required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data">Data</label>
                                            <input type="date" name="data" class="form-control" max="4" min="1" id="data" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnStoreRegistro" type="submit" class="btn btn-primary">Cadastrar</button>
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
            $('#formStoreRegistro').validate({
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

            $('#btnStoraRegistro').click((event) => {
                event.preventDefault();
                $('#btnStoraRegistro').prop('disabled', true);
                if ($('#formStoreRegistro').valid()) {
                    $('#formStoreRegistro').submit();
                } else {
                    $('#btnStoraRegistro').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
