@extends('app')

@section('content')
    <div class="wrapper">
        @include('layouts.navbar')

        @include('layouts.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Área administrativa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Área administrativa</li>
                                <li class="breadcrumb-item"><a href="{{ route('sistema.registro.index') }}">Registros</a>
                                </li>
                                <li class="breadcrumb-item active">Novo registro</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Novo registro</h3>
                                </div>
                                <form method="POST" action="{{ route('sistema.registro.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="equipamento_id">Equipamento</label>
                                            <select name="equipamento_id" class="custom-select form-control-border"
                                                id="equipamento_id" required>
                                                @foreach ($equipamentos as $equipamento)
                                                    <option value="{{ $equipamento->id }}">{{ $equipamento->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <textarea name="descricao" class="form-control" id="descricao"
                                                placeholder="Descrição da manutenção/problema" required> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="data_limite">Data limite</label>
                                            <input type="date" name="data_limite" class="form-control" id="data_limite"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo">Tipo</label>
                                            <select name="tipo" class="custom-select form-control-border" id="tipo"
                                                required>
                                                <option value="1">Preventiva</option>
                                                <option value="2">Corretiva</option>
                                                <option value="3">Urgente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
@endsection
