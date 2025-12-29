@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-indigo-50 via-white to-indigo-100 overflow-hidden">

    <!-- Décor flou -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-300 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute top-1/2 -right-32 w-96 h-96 bg-purple-300 rounded-full blur-3xl opacity-30"></div>

    <div class="relative isolate px-6 pt-20 lg:px-8">
        <div class="mx-auto max-w-5xl py-24 text-center">

            <!-- Titre -->
            <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-6xl">
                Gestion Académique
                <span class="block text-indigo-600">Moderne & Sécurisée</span>
            </h1>

            <!-- Description -->
            <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto">
                Une plateforme professionnelle pour la gestion des étudiants,
                avec authentification sécurisée, rôles distincts et interface intuitive.
            </p>

            <!-- Boutons -->
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-10 py-4 text-lg font-semibold text-white shadow-lg hover:bg-indigo-500 hover:shadow-indigo-300/40 transition-all duration-300">
                    Se connecter
                </a>

                <a href="{{ route('register') }}"
                   class="inline-flex items-center justify-center rounded-xl bg-white px-10 py-4 text-lg font-semibold text-gray-900 ring-1 ring-gray-300 hover:bg-gray-50 hover:ring-indigo-300 transition-all duration-300">
                    Créer un compte
                </a>
            </div>

            <!-- Cards -->
            <div class="mt-24 grid grid-cols-1 gap-8 sm:grid-cols-3">

                <div class="group bg-white/70 backdrop-blur-lg border border-gray-200 rounded-3xl p-8 shadow-sm hover:shadow-xl transition">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">🔐</div>
                    <h3 class="text-lg font-semibold mb-2">Authentification sécurisée</h3>
                    <p class="text-gray-600 text-sm">
                        Connexion par email ou Google grâce à Firebase
                    </p>
                </div>

                <div class="group bg-white/70 backdrop-blur-lg border border-gray-200 rounded-3xl p-8 shadow-sm hover:shadow-xl transition">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">👨‍💻</div>
                    <h3 class="text-lg font-semibold mb-2">Espace Administrateur</h3>
                    <p class="text-gray-600 text-sm">
                        Gestion complète des étudiants et des données
                    </p>
                </div>

                <div class="group bg-white/70 backdrop-blur-lg border border-gray-200 rounded-3xl p-8 shadow-sm hover:shadow-xl transition">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">🎓</div>
                    <h3 class="text-lg font-semibold mb-2">Espace Étudiant</h3>
                    <p class="text-gray-600 text-sm">
                        Accès au profil personnel et aux informations académiques
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
