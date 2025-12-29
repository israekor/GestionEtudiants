<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Gestion École') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex items-center gap-2">
                    🎓
                    <span class="font-bold text-lg">Gestion École</span>
                </div>

                <!-- Menu droite -->
                @auth
                <div class="flex items-center gap-4 relative">

                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->role === 'admin' ? 'Administrateur' : 'Étudiant' }}
                    </span>

                    <!-- Avatar -->
                    <button id="profileBtn" class="focus:outline-none">
                        <img
                            src="{{ auth()->user()->photo ?? asset('images/default-avatar.png') }}"
                            class="h-9 w-9 rounded-full object-cover border"
                        >
                    </button>

                    <!-- Dropdown -->
                    <div id="profileMenu"
                         class="hidden absolute right-0 top-12 w-48 bg-white border rounded-lg shadow-lg z-50">

                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Mon profil
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="py-8">
        @yield('content')
    </main>

</body>
</html>
