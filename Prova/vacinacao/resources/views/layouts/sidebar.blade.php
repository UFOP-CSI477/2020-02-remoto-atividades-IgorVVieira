<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('vacinacao.registro.index') }}" class="brand-link">
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
                    <a href="{{ route('vacinacao.registro.index') }}" class="nav-link">
                        <i class="fas fa-syringe"></i>
                        <p>
                            Área geral
                        </p>
                    </a>
                </li>

                @if (Auth::user())
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                Área administrativa
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/charts/chartjs.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vacinas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pessoas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Unidades</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/uplot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registros</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
