<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('registro.index') }}" class="brand-link">
        <span class="brand-text font-weight-light text-center">Vacinações COVID-19</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user() ? Auth::user()->name : 'Convidado' }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('registro.index') }}" class="nav-link {{ menu_ativado('registro.index') }}">
                        <i class="fas fa-syringe"></i>
                        <p>
                            Área geral
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ menu_open('unidade.') }} {{ menu_open('vacina.') }} {{ menu_open('registro.') }} {{ menu_open('pessoa.') }}">
                    <a href="#" class="nav-link {{ menu_ativado('vacina.') }} {{ menu_ativado('pessoa.') }} {{ menu_ativado('unidade.') }} {{ menu_ativado('registro.') }}">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Área administrativa
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (!Auth::user())
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Login</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user())
                            <li class="nav-item {{ menu_open('vacina.') }}">
                                <a href="#" class="nav-link {{ menu_ativado('vacina.') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vacinas</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ml-3">
                                    <li class="nav-item">
                                        <a href="{{ route('vacina.index') }}" class="nav-link {{ menu_ativado('vacina.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Relatório</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('vacina.create') }}" class="nav-link {{ menu_ativado('vacina.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cadastro</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ menu_open('pessoa.') }}">
                                <a href="#" class="nav-link {{ menu_ativado('pessoa.') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pessoas</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ml-3">
                                    <li class="nav-item">
                                        <a href="{{ route('pessoa.index') }}" class="nav-link {{ menu_ativado('pessoa.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Relatório / Alteração</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pessoa.create') }}" class="nav-link {{ menu_ativado('pessoa.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cadastro</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ menu_open('unidade.') }}">
                                <a href="#" class="nav-link {{ menu_ativado('unidade.') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Unidades</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ml-3">
                                    <li class="nav-item">
                                        <a href="{{ route('unidade.index') }}" class="nav-link {{ menu_ativado('unidade.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Relatório / Exclusão</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('unidade.create') }}" class="nav-link {{ menu_ativado('unidade.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cadastro</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ menu_open('registro.') }}">
                                <a href="#" class="nav-link {{ menu_ativado('registro.') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registros</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ml-3">
                                    <li class="nav-item">
                                        <a href="{{ route('registro.relatorios') }}" class="nav-link {{ menu_ativado('registro.relatorios') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Relatório</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('registro.create') }}" class="nav-link {{ menu_ativado('registro.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cadastro</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
