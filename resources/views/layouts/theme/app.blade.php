<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    @include('components.theme.style')
    @livewireStyles
</head>

<body>
    <div id="app">
        {{-- navbar --}}
        <nav id="navbar-main" class="navbar is-fixed-top ">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
                {{-- <div class="navbar-item">
                    <div class="control"><input placeholder="Search everywhere..." class="input"></div>
                </div> --}}
            </div>
            <div class="navbar-brand is-right">
                <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                    <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item dropdown has-divider has-user-avatar">
                        <a class="navbar-link">
                            <div class="user-avatar">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="John Doe" class="rounded-full">
                            </div>
                            <div class="is-user-name"><span>{{ Auth::user()->name }}
                                    {{ Auth::user()->last_name }}</span></div>
                            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="navbar-dropdown">
                            <a href="{{ route('profile.show') }}" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>Mi perfil</span>
                            </a>
                            {{-- <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span>Configuracion</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-email"></i></span>
                                <span>Mensajes</span>
                            </a> --}}
                            <hr class="navbar-divider">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="navbar-item">
                                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                                    <span>Salir</span>
                                </button>
                            </form>

                        </div>
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=51924912297&text=Hola%20%2C%20Tengo%20un%20problema%20con%20la%20plataforma%20Área%20Usuarios.%20"
                        class="navbar-item has-divider desktop-icon-only" target="_blank">
                        <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                        <span>Soporte</span>
                    </a>
                    {{-- <a href="https://github.com/justboil/admin-one-tailwind"
                        class="navbar-item has-divider desktop-icon-only">
                        <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                        <span>GitHub</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                    <a title="Log out" class="navbar-item desktop-icon-only">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log out</span>
                    </a> --}}
                </div>
            </div>
        </nav>
        {{-- aside --}}
        <aside class="aside is-placed-left is-expanded">
            <div class="aside-tools">
                <div>
                    {{ __(Auth::user()->getRoleNames()->first() . ' Dashboard') }}
                </div>
            </div>
            <div class="menu is-menu-main">
                <p class="menu-label">General</p>
                <ul class="menu-list">
                    <li class="active">
                        <a href="{{ route('home.index') }}">
                            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                            <span class="menu-item-label">Panel</span>
                        </a>
                    </li>
                    @if (Auth::user()->hasAnyPermission('roles', 'permissions'))
                        <li>
                            <a class="dropdown">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span class="menu-item-label">Configuracion</span>
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul>
                                @if (Auth::user()->hasAnyPermission('roles'))
                                    <li>
                                        <a href="{{ route('role.index') }}">
                                            <span>Roles</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyPermission('permissions'))
                                    <li>
                                        <a href="{{ route('permissions.index') }}">
                                            <span>Permisos</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
                <p class="menu-label">users</p>
                <ul class="menu-list">
                    @if (Auth::user()->hasAnyPermission('users'))
                        <li class="--set-active-tables-html">
                            <a href="{{ route('user.index') }}">
                                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                                <span class="menu-item-label">Users</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasAnyPermission('customers'))
                        <li class="--set-active-forms-html">
                            <a href="{{ route('customer.index') }}">
                                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                                <span class="menu-item-label">Customers</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasAnyPermission('exhibitors'))
                        <li>
                            <a href="{{ route('exhibitor.index') }}">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span class="menu-item-label">Exhibitors</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasAnyPermission('firms'))
                        <li>
                            <a href="{{ route('firm.index') }}">
                                <span class="icon"><i class="mdi mdi-signature"></i></span>
                                <span class="menu-item-label">Firms</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasAnyPermission('banks'))
                        <li>
                            <a href="{{ route('bank.index') }}">
                                <span class="icon"><i class="mdi mdi-bank"></i></span>
                                <span class="menu-item-label">Bank</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasAnyPermission('type_services', 'services'))
                        <li>
                            <a class="dropdown">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label">Service</span>
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul>
                                @if (Auth::user()->hasAnyPermission('type_services'))
                                    <li>
                                        <a href="{{ route('type_service.index') }}">
                                            <span>Type Service</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyPermission('services'))
                                    <li>
                                        <a href="{{ route('service.index') }}">
                                            <span>Service</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                    @endif
                    @if (Auth::user()->hasAnyPermission('type_certificates', 'certificates'))
                        <li>
                            <a class="dropdown">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label">Certificate</span>
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul>
                                @if (Auth::user()->hasAnyPermission('type_certificates'))
                                    <li>
                                        <a href="{{ route('type_certicate.index') }}">
                                            <span>Type certificate</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyPermission('certificates'))
                                    <li>
                                        <a href="{{ route('certificate.index') }}">
                                            <span>Certificate</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->hasAnyPermission('sale_users', 'sale_finances', 'validate_finances', 'validate_users'))

                        <li>
                            <a class="dropdown">
                                <span class="icon"><i class="mdi mdi-chart-bar"></i></span>
                                <span class="menu-item-label">Ventas</span>
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul>
                                @if (Auth::user()->hasAnyPermission('sale_users'))
                                    <li>
                                        <a href="{{ route('sale_user.index') }}">
                                            <span>Sale User</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyPermission('sale_finances'))
                                    <li>
                                        <a href="{{ route('finances.index') }}">
                                            <span>finances</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyPermission('validate_finances'))
                                    <li>
                                        <a href="{{ route('sale_user.validate.finance.index') }}">
                                            <span>Validate finances</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyPermission('validate_users'))
                                    <li>
                                        <a href="{{ route('sale_user.validate.index') }}">
                                            <span>Validate Users</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif



                </ul>
                <p class="menu-label">About</p>
                <ul class="menu-list">
                    {{-- <li>
                        <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank"
                            class="has-icon">
                            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                            <span class="menu-item-label">Premium Demo</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="https://api.whatsapp.com/send?phone=51924912297&text=Hola%20%2C%20Tengo%20un%20problema%20con%20la%20plataforma%20Área%20Usuarios.%20"
                            class="has-icon" target="_blank">
                            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                            <span class="menu-item-label">About</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                            <span class="menu-item-label">GitHub</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </aside>

        {{-- <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Dashboard</li>
                </ul>
                <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank"
                    class="button blue">
                    <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                    <span>Premium Demo</span>
                </a>
            </div>
        </section> --}}

        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h2 class="title w-full">
                    {{ $header }}
                </h2>
            </div>
        </section>

        <section class="section main-section">
            {{ $slot }}
        </section>

        <footer class="footer ">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div class="flex items-center justify-start space-x-3">
                    <div>
                        © 2021 Area de Usuarios V1.0
                    </div>
                    <div>
                        <p>Distributed By: <a href="#" target="_blank">CristianDH</a></p>
                    </div>
                    <a href="https://github.com/justboil/admin-one-tailwind" style="height: 20px">
                        <img src="https://img.shields.io/github/v/release/justboil/admin-one-tailwind?color=%23999">
                    </a>
                </div>


                <a href="https://justboil.me">

                </a>
            </div>
        </footer>

        <div id="sample-modal" class="modal">
            <div class="modal-background --jb-modal-close"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sample modal</p>
                </header>
                <section class="modal-card-body">
                    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                    <p>This is sample modal</p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Cancel</button>
                    <button class="button red --jb-modal-close">Confirm</button>
                </footer>
            </div>
        </div>

        <div id="sample-modal-2" class="modal">
            <div class="modal-background --jb-modal-close"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sample modal</p>
                </header>
                <section class="modal-card-body">
                    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                    <p>This is sample modal</p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Cancel</button>
                    <button class="button blue --jb-modal-close">Confirm</button>
                </footer>
            </div>
        </div>

    </div>
    @extends('components.theme.script')
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

</body>

</html>
