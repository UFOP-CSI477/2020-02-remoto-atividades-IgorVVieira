 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <i class="fas fa-tools fa-4x text-center"></i>
     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user() ? Auth::user()->name : 'Convidado' }}</a>
             </div>
         </div>

         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Áreas
                             <i class="fas fa-angle-left right"></i>
                             <span class="badge badge-info right">2</span>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Geral - Suporte</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Administrativa</p>
                                 <i class="fas fa-angle-left right"></i>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="{{ route('register') }}" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Novo usuário</p>
                                     </a>
                                 </li>
                                 @if (Auth::user())
                                     <li class="nav-item">
                                         <a href="{{ route('sistema.equipamento.index') }}" class="nav-link">
                                             <i class="far fa-circle nav-icon"></i>
                                             <p>Equipamentos</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{ route('sistema.registro.index') }}" class="nav-link">
                                             <i class="far fa-circle nav-icon"></i>
                                             <p>Manutenções</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{ route('sistema.users.relatorio') }}" class="nav-link">
                                             <i class="far fa-circle nav-icon"></i>
                                             <p>Relatório de usuários</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{ route('sistema.registro.relatorio') }}" class="nav-link">
                                             <i class="far fa-circle nav-icon"></i>
                                             <p>Relatório de manutenções</p>
                                         </a>
                                     </li>
                                 @endif
                             </ul>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
     </div>
 </aside>
