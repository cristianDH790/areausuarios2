<!DOCTYPE html>
<html lang="en" class="">

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
                            <div class="is-user-name"><span>John Doe</span></div>
                            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="navbar-dropdown">
                            <a href="{{ route('profile.show') }}" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>My Profile</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span>Settings</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-email"></i></span>
                                <span>Messages</span>
                            </a>
                            <hr class="navbar-divider">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="navbar-item">
                                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                                    <span>Log Out</span>
                                </button>
                            </form>

                        </div>
                    </div>
                    <a href="https://justboil.me/tailwind-admin-templates"
                        class="navbar-item has-divider desktop-icon-only">
                        <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                        <span>About</span>
                    </a>
                    <a href="https://github.com/justboil/admin-one-tailwind"
                        class="navbar-item has-divider desktop-icon-only">
                        <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                        <span>GitHub</span>
                    </a>
                    <a title="Log out" class="navbar-item desktop-icon-only">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log out</span>
                    </a>
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
                        <a href="#">
                            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                            <span class="menu-item-label">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Examples</p>
                <ul class="menu-list">
                    <li class="--set-active-tables-html">
                        <a href="tables.html">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Tables</span>
                        </a>
                    </li>
                    <li class="--set-active-forms-html">
                        <a href="forms.html">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label">Forms</span>
                        </a>
                    </li>
                    <li class="--set-active-profile-html">
                        <a href="#">
                            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                            <span class="menu-item-label">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="login.html">
                            <span class="icon"><i class="mdi mdi-lock"></i></span>
                            <span class="menu-item-label">Login</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown">
                            <span class="icon"><i class="mdi mdi-view-list"></i></span>
                            <span class="menu-item-label">Submenus</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="#void">
                                    <span>Sub-item One</span>
                                </a>
                            </li>
                            <li>
                                <a href="#void">
                                    <span>Sub-item Two</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <p class="menu-label">About</p>
                <ul class="menu-list">
                    <li>
                        <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank"
                            class="has-icon">
                            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                            <span class="menu-item-label">Premium Demo</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                            <span class="menu-item-label">About</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                            <span class="menu-item-label">GitHub</span>
                        </a>
                    </li>
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
                <h2 class="title">
                    {{ $header }}
                </h2>
            </div>
        </section>

        <section class="section main-section">
            {{ $slot }}
        </section>

        <footer class="footer">
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

</body>

</html>
