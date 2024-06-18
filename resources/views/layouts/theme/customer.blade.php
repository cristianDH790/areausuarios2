<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    {{-- @include('components.theme.style') --}}
    @livewireStyles
    <style>
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
</head>

<body class="pl-0 pt-0 bg-slate-50">

    <nav class="bg-white shadow fixed w-full z-10 ">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center max-w-7xl">
            <div class="flex items-center">
                <button id="menu-toggle" class="sm:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="hidden sm:flex space-x-4">
                    <a href="#" class="text-gray-700 hover:text-cyan-500"><svg data-slot="icon" class="h-6 w-6"
                            fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5">
                            </path>
                        </svg> </a>


                    <a href="{{ route('home.customer.index') }}"

                        {{ request()->routeIs('home.index') ? 'class=text-cyan-500' : '' }}
                        class="text-gray-700 hover:text-cyan-500">Inicio</a>

                    <a href="{{ route('service.customer.index') }}"
                        {{ request()->routeIs('service.customer.index', 'service.customer.view') ? 'class=text-cyan-500' : '' }}
                        class="text-gray-700 hover:text-cyan-500">Cursos</a>
                    <a href="{{ route('my.service.customer.index') }}"

                        {{ request()->routeIs('my.service.customer.index', 'my.service.customer.view', 'my.service.customer.video') ? 'class=text-cyan-500' : '' }}
                        class="text-gray-700 hover:text-cyan-500">Mis
                        Cursos</a>

                    @php
                        use App\Models\setting;
                        $settings = setting::first();

                        if ($settings != null) {
                            $contact = $settings->phone_contact;
                        } else {
                            $contact = '000000000';
                        }

                    @endphp

                    <a target="_blank"
                        href="https://api.whatsapp.com/send?phone=51{{ $contact }}&text=Hola%2CQuiero%20comunicarme%20con%20soporte"

                        class="text-gray-700 hover:text-cyan-500">Contactanos</a>
                </div>
            </div>
            <div class="relative">
                <button id="user-menu-toggle" class="text-gray-700 focus:outline-none">
                    <div class="flex items-center">
                        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="John Doe">

                        <span class="ml-2 hidden sm:block">{{ Auth::user()->name }}
                            {{ Auth::user()->last_name }}</span>

                        <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.084l3.71-3.854a.75.75 0 111.08 1.04l-4.25 4.417a.75.75 0 01-1.08 0l-4.25-4.417a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </button>
                <div id="user-dropdown-menu"
                    class="dropdown-menu absolute right-0 mt-3 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-20 ">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Mi
                        perfil</a>
                    <hr class="border-t border-gray-200">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Salir
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="sm:hidden py-2 space-y-1 hidden px-1">

            <a href="{{ route('home.customer.index') }}"

                class="block px-4 py-2 text-gray-700 hover:text-white hover:bg-cyan-500 rounded-md">Inicio</a>
            <a href="{{ route('service.customer.index') }}"
                class="block px-4 py-2 text-gray-700 hover:text-white hover:bg-cyan-500 rounded-md">Cursos</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:text-white hover:bg-cyan-500 rounded-md">Mis
                Cursos</a>
            <a href="#"
                class="block px-4 py-2 text-gray-700 hover:text-white hover:bg-cyan-500 rounded-md">Contactanos</a>
        </div>
    </nav>
    <div class="h-16">

    </div>
    {{-- <section class="is-hero-bar  bg-white  ">
        <div
            class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0 max-w-7xl mx-auto   py-5 px-5 sm:px-6 lg:px-8">
            <h2 class="title w-full">
                {{ $header }}
            </h2>
        </div>
    </section> --}}
    @livewireScripts
    <x-livewire-alert::scripts />
    <section class="section main-section">
        {{ $slot }}
    </section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        document.getElementById('user-menu-toggle').addEventListener('click', function(event) {
            var userMenu = document.getElementById('user-dropdown-menu');
            userMenu.classList.toggle('show');
            event.stopPropagation(); // Prevents the document click event from closing the menu immediately
        });

        // Close the user menu if clicked outside
        document.addEventListener('click', function(event) {
            var userMenu = document.getElementById('user-dropdown-menu');
            var userMenuButton = document.getElementById('user-menu-toggle');
            if (!userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
                userMenu.classList.remove('show');
            }
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>


</html>
