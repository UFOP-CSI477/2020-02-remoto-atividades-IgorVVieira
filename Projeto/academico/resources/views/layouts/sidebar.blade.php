<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('academico.dashboard') }}" class="brand-link">
        <i class="fas fa-graduation-cap fa-4x"></i>
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            </div>
        </div>
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('academico.dashboard') }}" class="nav-link {{ menu_ativado('academico.dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ menu_open('academico.disciplina.') }}">
                    <a href="#" class="nav-link {{ menu_ativado('academico.disciplina.') }}">
                        <i class=" nav-icon fas fa-book"></i>
                        <p>
                            Disciplinas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('academico.disciplina.create') }}" class="nav-link {{ menu_ativado('academico.disciplina.create') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vincular</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academico.disciplina.index') }}" class="nav-link {{ menu_ativado('academico.disciplina.index') }}">
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
