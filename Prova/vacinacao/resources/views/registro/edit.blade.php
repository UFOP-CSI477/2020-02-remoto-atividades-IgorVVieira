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
                            <h1 class="m-0">Editar de registro #{{ $registro->id }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('registro.index') }}">Home</a></li>
                                <li class="breadcrumb-item">Registro</li>
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
                                <form action="{{ route('registro.update', ['registro' => $registro]) }}" method="POST" id="formUpdateRegistro">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group col-8">
                                            <label for="pessoa_id">Pessoa</label>
                                            <select id="pessoa_id" name="pessoa_id" class="form-control select2" required>
                                                @foreach ($pessoas as $pessoa)
                                                    <option @if ($registro->pessoa_id == $pessoa->id) selected @endif value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-8">
                                            <label for="unidade_id">Unidade</label>
                                            <select id="unidade_id" name="unidade_id" class="form-control select2" required>
                                                @foreach ($unidades as $unidade)
                                                    <option @if($registro->unidade_id == $unidade->id) selected @endif value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-8">
                                            <label for="vacina_id">Vacina</label>
                                            <select id="vacina_id" name="vacina_id" class="form-control select2" required>
                                                <option value="" selected disabled>Selecione</option>
                                                @foreach ($vacinas as $vacina)
                                                    <option @if($registro->vacina_id == $vacina->id) selected @endif value="{{ $vacina->id }}">{{ $vacina->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="dose">Dose</label>
                                            <input type="number" value="{{ $registro->dose }}" name="dose" class="form-control" max="2" min="0" id="dose" placeholder="Quantidade de doses recomendadas para vacina." required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="data">Data</label>
                                            <input type="date" name="data" value="{{ $registro->data }}" class="form-control" max="4" min="1" id="data" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button id="btnUpdateRegistro" type="submit" class="btn btn-primary">Editar</button>
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
            $('#formUpdateRegistro').validate({
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
                    data_nascimento: {
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
                    data_nascimento: {
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

            $('#btnUpdateRegistro').click((event) => {
                event.preventDefault();
                $('#btnUpdateRegistro').prop('disabled', true);
                if ($('#formUpdateRegistro').valid()) {
                    $('#formUpdateRegistro').submit();
                } else {
                    $('#btnUpdateRegistro').prop('disabled', false);
                }
            })
        });
    </script>
@endsection
