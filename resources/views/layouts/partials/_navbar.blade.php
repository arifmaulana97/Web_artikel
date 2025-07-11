{{-- resources/views/layouts/partials/_navbar.blade.php --}}

<nav x-data="{ open: false }" class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}"
                        class="flex items-center text-2xl font-bold text-blue-600 hover:text-blue-700 transition duration-150 ease-in-out">
                        <i class="fas fa-newspaper mr-3 text-3xl"></i> Artikel
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                        {{ __('Artikel') }}
                    </x-nav-link>
                    {{-- Contoh link kategori, sesuaikan jika ada daftar kategori dinamis --}}
                    <x-nav-link :href="route('articles.category', 'teknologi')" :active="request()->routeIs('articles.category') &&
                        request()->route('categorySlug') == 'teknologi'">
                        {{ __('Kategori') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                        {{ __('Tentang Kami') }}
                    </x-nav-link>

                    {{-- Links hanya untuk user yang sudah login --}}
                    @auth
                        {{-- Link Profil di Navbar Utama --}}
                        <x-nav-link :href="route('articles.create')" :active="request()->routeIs('articles.create')">
                            <i class="fas fa-plus-square mr-2"></i> {{ __('Buat Artikel') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            {{-- Bagian Login/Register atau Dropdown Profil --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex items-center">
                                    <i class="fas fa-user-circle mr-2 text-lg text-gray-500"></i>
                                    {{ Auth::user()->name }} {{-- Nama Akun di samping icon --}}
                                </div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                <i class="fas fa-tachometer-alt mr-2 text-gray-500"></i> {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="fas fa-id-card mr-2 text-gray-500"></i> {{ __('Profil Saya') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('articles.create')">
                                <i class="fas fa-plus-square mr-2 text-gray-500"></i> {{ __('Buat Artikel Baru') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('articles.index')">
                                <i class="fas fa-book-open mr-2 text-gray-500"></i> {{ __('Kelola Artikel') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2 text-gray-500"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ms-4 inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-user-plus mr-2"></i> Daftar
                            </a>
                        @endif
                    </div>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                {{ __('Artikel') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.category', 'teknologi')" :active="request()->routeIs('articles.category') && request()->route('categorySlug') == 'teknologi'">
                {{ __('Kategori') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                {{ __('Tentang Kami') }}
            </x-responsive-nav-link>

            {{-- Links hanya untuk user yang sudah login (responsive) --}}
            @auth
                {{-- Link Profil di Responsive Navbar --}}
                <x-responsive-nav-link :href="route('articles.create')" :active="request()->routeIs('articles.create')">
                    <i class="fas fa-plus-square mr-3"></i> {{ __('Buat Artikel') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        {{-- Bagian Login/Register atau Dropdown Profil (Responsive) --}}
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')">
                        <i class="fas fa-tachometer-alt mr-3"></i> {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')">
                        <i class="fas fa-id-card mr-3"></i> {{ __('Profil') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('articles.create')">
                        <i class="fas fa-plus-square mr-3"></i> {{ __('Buat Artikel Baru') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('articles.index')">
                        <i class="fas fa-book-open mr-3"></i> {{ __('Kelola Artikel') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-3"></i> {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="flex flex-col items-start px-4">
                    <a href="{{ route('login') }}"
                        class="w-full text-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="w-full text-center mt-2 px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Daftar
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
