<nav class="bg-gray-800" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button x-on:click="open = true"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
                    Heroicon name: outline/menu

                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                        Heroicon name: outline/x

                        Menu open: "block", Menu closed: "hidden"
                        -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                {{-- Logotipo --}}
                <a href="/" class="flex-shrink-0 flex items-center">
                    <img src="{{ url('img/logo.jpg') }}" alt=""
                        style="width: 35px; border-radius: 10px; box-shadow: 1px 2px 18px #888888;">

                </a>

                {{-- Menu lg --}}

                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        {{-- @foreach ($restaurantes as $restaurante)
                            <a href="{{ route('platos.restaurante', $restaurante) }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                {{ $restaurante->nombre }}
                            </a>
                        @endforeach --}}

                        <a href="{{ route('platos.index') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Platos
                        </a>

                        <a href="{{ route('pedidos.index') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Pedidos
                        </a>

                        <a href="{{ route('acerca-de-nosotros') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Acerca De Nosotros
                        </a>
                    </div>
                </div>
            </div>

            @auth

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    {{-- Boton carro de compra --}}

                    <a href="{{ route('carro.ver') }}"
                        class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <img src="{{ url('img/carro-de-la-compra.svg') }}" style="width: 40px" alt="">
                    </a>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button x-on:click="open = true"
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            </button>
                        </div>
                        <!--
                                                                                Profile dropdown panel, show/hide based on dropdown state.

                                                                                Entering: "transition ease-out duration-100"
                                                                                    From: "transform opacity-0 scale-95"
                                                                                    To: "transform opacity-100 scale-100"
                                                                                Leaving: "transition ease-in duration-75"
                                                                                    From: "transform opacity-100 scale-100"
                                                                                    To: "transform opacity-0 scale-95"
                                                                                -->
                        <div x-show="open" x-on:click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Tu perfil
                            </a>

                            @can('admin.home')
                                <a href="{{ route('admin.home') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Dashboard
                                </a>
                            @endcan

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault()
                                                                                        this.closest('form').submit();">
                                    Cerrar sesión
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            @else
                <a href="{{ route('login') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Register
                </a>
            @endauth

        </div>

    </div>

    <!--Mobile menu-->
    <div class="sm:hidden" x-show="open" x-on:click.away="open = false">
        <div class="px-2 pt-2 pb-3 space-y-1">

            {{-- @foreach ($restaurantes as $restaurante)
                <a href="{{ route('platos.restaurante', $restaurante) }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    {{ $restaurante->nombre }}
                </a>
                <br>
            @endforeach --}}

            <a href="{{ route('platos.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-1 rounded-md text-sm font-medium">
                Platos
            </a>

            <br>

            <a href="{{ route('pedidos.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-1 rounded-md text-sm font-medium">
                Pedidos
            </a>

            <a href="{{ route('acerca-de-nosotros') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-1 rounded-md text-sm font-medium">
                Acerca De Nosotros
            </a>
        </div>
    </div>
</nav>
