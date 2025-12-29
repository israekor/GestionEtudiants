<!-- resources/views/layouts/navigation.blade.php -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo + Liens principaux -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="flex items-center space-x-2">
                            <span class="text-2xl font-bold text-indigo-600">🎓</span>
                            <span class="text-xl font-semibold text-gray-900">Gestion École</span>
                        </div>
                    </a>
                </div>

                <!-- Liens de navigation (visibles sur desktop) -->
                @auth
                <div class="hidden sm:ml-10 sm:flex sm:items-center sm:space-x-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Tableau de bord
                    </x-nav-link>

                    @if(auth()->user()->role === 'admin')
                    <x-nav-link :href="route('etudiants.index')" :active="request()->routeIs('etudiants.*')">
                        Étudiants
                    </x-nav-link>
                    @endif
                </div>
                @endauth
            </div>

            <!-- Menu utilisateur (desktop) -->
            @auth
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = ! open" class="flex items-center space-x-3 focus:outline-none">
                        <div class="flex items-center space-x-3">
                            @if(auth()->user()->photo)
                            <img class="h-8 w-8 rounded-full object-cover border-2 border-indigo-100"
                                 src="{{ Storage::url(auth()->user()->photo) }}"
                                 alt="{{ auth()->user()->prenom ?? 'Profil' }}">
                            @else
                            <div class="h-8 w-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-medium">
                                {{ strtoupper(substr(auth()->user()->prenom ?? 'U', 0, 1)) }}
                            </div>
                            @endif

                            <div class="text-sm font-medium text-gray-700 hidden md:block">
                                {{ auth()->user()->prenom ?? auth()->user()->nom ?? 'Utilisateur' }}
                            </div>

                            <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="open" @click.away="open = false"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95">

                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            Mon profil
                        </a>

                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('etudiants.index') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 md:hidden">
                            Gestion étudiants
                        </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth

            <!-- Bouton menu mobile -->
            @auth
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Ouvrir le menu</span>
                    <svg x-show="!open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endauth

        </div>
    </div>

    <!-- Menu mobile -->
    @auth
    <div x-show="open" class="sm:hidden" x-transition>
        <div class="pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Tableau de bord
            </x-responsive-nav-link>

            @if(auth()->user()->role === 'admin')
            <x-responsive-nav-link :href="route('etudiants.index')" :active="request()->routeIs('etudiants.*')">
                Gestion des étudiants
            </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="route('profile.edit')">
                Mon profil
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); this.closest('form').submit();"
                                       class="text-red-700 hover:bg-red-50">
                    Se déconnecter
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
    @endauth
</nav>