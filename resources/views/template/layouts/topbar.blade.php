<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ asset('template/assets/img/image(22).png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> Hidrobolívar</a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

            <li class="menu single-menu">
                <a href="{{ route('home') }}" data-toggle="" aria-expanded="" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Inicio</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>

                {{-- @if (Auth::user()->esGerente() || Auth::user()->esJefe()) --}}
                @if (Auth::user()->esAdmin())
                    <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                        <li>
                            <a href="{{ route('admin.categorias.index') }}"> Categorias </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.subcategorias.index') }}"> Subcategorias </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.estatus.index') }}"> Estatus </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.emergencias.index') }}"> Emergencia </a>
                        </li>
                    </ul>
                @endif

            </li>


            <li class="menu single-menu">
                <a href="javascript:void(0);" data-toggle="" aria-expanded="" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Incidencias</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="menu2" data-parent="#topAccordion">

                    <li>
                        <a href="{{ route('incidencias.index') }}"> Listar </a>
                    </li>

                    <li>
                        <a href="{{ route('incidencias.create') }}"> Crear </a>
                    </li>

                    @if (Auth::user()->perteceTecnologia())
                        <li>
                            <a href="{{ route('incidencias.mis-asignadas') }}"> Asigndas a mi </a>
                        </li>
                    @endif

                    {{-- <li class="sub-sub-submenu-list">
                            <a href="#sub-sub-category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Submenu 3 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="sub-sub-category" data-parent="#menu">
                                <li>
                                    <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                                </li>
                            </ul>
                        </li> --}}

                </ul>
            </li>

            {{-- <li class="menu single-menu active">
                        <a href="#starter-kit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                <span>Starter Kit</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="starter-kit" data-parent="#topAccordion">
                            <li class="active">
                                <a href="starter_kit_blank_page.html"> Blank Page </a>
                            </li>
                            <li>
                                <a href="starter_kit_breadcrumb.html"> Breadcrumb </a>
                            </li>
                        </ul>
                    </li> --}}
        </ul>
    </nav>
</div>
