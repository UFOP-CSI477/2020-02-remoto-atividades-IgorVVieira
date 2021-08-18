<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('academico.dashboard') }}" class="brand-link">
        <i class="fas fa-graduation-cap fa-4x"></i>
        <span class="brand-text font-weight-light">Acadêmico</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} Teste</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar..." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('academico.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-book"></i>
                        <p>
                            Disciplinas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('academico.disciplina.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vincular</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academico.disciplina.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Minhas</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-book"></i>
                        <p>
                            Prova/Ativadade avaliativa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('academico.disciplina.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastrar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academico.disciplina.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Minhas</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
