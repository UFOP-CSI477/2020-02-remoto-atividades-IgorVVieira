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
                            <h1>{{ $disciplina->nome }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('academico.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item">Minhas disciplinas</li>
                                <li class="breadcrumb-item active">{{ $disciplina->nome }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Alunos cursando</span>
                                    <span class="info-box-number">
                                        {{ $quantidadeCursando }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Alunos aprovados</span>
                                    <span class="info-box-number">{{ $quantidadeCursou }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix hidden-md-up"></div>

                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-primary card-outline direct-chat direct-chat-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Fórum da disciplina</h3>

                                    <div class="card-tools">
                                        <span title="3 New Messages" class="badge bg-primary">3</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                            <i class="fas fa-comments"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="direct-chat-messages" id="mensagens">
                                        @foreach ($mensagens as $mensagem)
                                            <div class="direct-chat-msg @if ($mensagem->user_id == Auth::user()->id) right @endif">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name @if ($mensagem->user_id == Auth::user()->id) float-right @else float-left @endif">{{ $mensagem->user->name }}</span>
                                                    <span class="direct-chat-timestamp @if ($mensagem->user_id == Auth::user()->id) float-left @else float-right @endif">{{ data_hora($mensagem->created_at) }}</span>
                                                </div>
                                                <i class="direct-chat-img fas fa-user fa-2x"></i>
                                                <div class="direct-chat-text">
                                                    {{ $mensagem->mensagem }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="direct-chat-contacts">
                                        <ul class="contacts-list">
                                            <li>
                                                @foreach ($users as $user)
                                                    <a href="#">
                                                        <i class="direct-chat-img fas fa-user fa-2x"></i>
                                                        <div class="contacts-list-info">
                                                            <span class="contacts-list-name">
                                                                {{ $user->name }}
                                                            </span>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input id="mensagem" type="text" name="message" placeholder="Digite sua mensagem..." class="form-control" required>
                                            <span class="input-group-append">
                                                <button id="btnMensagem" type="button" class="btn btn-primary" onclick="enviarMensagem({{ $disciplina->id }})">Enviar</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <template>
            <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right" id="nomeUsuario"></span>
                    <span class="direct-chat-timestamp float-left" id="created_at"></span>
                </div>
                <i class="direct-chat-img fas fa-user fa-2x"></i>
                <div class="direct-chat-text" id="mensagemEscrita">
                </div>
            </div>
        </template>

        @include('layouts.footer')
    </div>
@endsection

@section('scripts')
    <script>
        function enviarMensagem(disciplina_id) {
            var data = {
                mensagem: $('#mensagem').val(),
                disciplina_id,
                _token: "{{ csrf_token() }}"
            }
            $('#btnEnviarMensagem').prop('disabled', true);
            $.ajax({
                url: "{{ route('academico.mensagem.store') }}",
                method: "POST",
                data: data,
                success: function(response) {
                    if (response['success']) {
                        toastr.success(response['success', '', {
                            timeOut: 2000,
                        }]);
                        $('#mensagem').val('');
                        criarMensagem(response['mensagem']);
                        const chat = document.getElementById('mensagens');
                        chat.scrollTop = chat.scrollHeight;
                    } else if (response['error']) {
                        toastr.error(response['error'], '', {
                            timeOut: 4000,
                        });
                    }
                    $('#btnMensagem').prop('disabled', false);
                },
            });
        }

        function criarMensagem(mensagem) {
            const template = document.getElementsByTagName('template')[0];
            const div = document.getElementById('mensagens');

            template.content.getElementById('nomeUsuario').innerHTML = "{{ Auth::user()->name }}";
            template.content.getElementById('created_at').innerHTML = 'agora';
            template.content.getElementById('mensagemEscrita').innerHTML = mensagem.mensagem;

            const clone = document.importNode(template.content, true);
            div.appendChild(clone);
        }
    </script>
@endsection
