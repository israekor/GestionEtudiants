<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(auth()->user()->role === 'admin')
                    <div class="prose max-w-none">
                        <h3 class="text-2xl font-bold mb-6">Bienvenue dans l'espace Administrateur</h3>
                        <p class="mb-6 text-lg">Vous pouvez gérer l'ensemble des étudiants depuis cette plateforme.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <a href="{{ route('etudiants.index') }}"
                               class="block p-6 bg-indigo-50 hover:bg-indigo-100 rounded-xl border border-indigo-200 transition">
                                <h4 class="text-lg font-semibold text-indigo-800 mb-2">Gestion des étudiants</h4>
                                <p class="text-gray-600">Ajouter, modifier, supprimer des comptes étudiants</p>
                            </a>

                            <a href="#"
                               class="block p-6 bg-gray-50 hover:bg-gray-100 rounded-xl border border-gray-200 transition opacity-50 cursor-not-allowed">
                                <h4 class="text-lg font-semibold text-gray-700 mb-2">Statistiques</h4>
                                <p class="text-gray-500">Bientôt disponible...</p>
                            </a>
                        </div>
                    </div>

                    @else
                    <div class="prose max-w-none">
                        <h3 class="text-2xl font-bold mb-6">Bienvenue {{ auth()->user()->prenom }} !</h3>

                        <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 mb-8">
                            <p class="text-lg mb-4">Vos informations actuelles :</p>
                            <ul class="space-y-3 text-gray-700">
                                <li><strong>Nom complet :</strong> {{ auth()->user()->prenom }} {{ auth()->user()->nom }}</li>
                                <li><strong>Email :</strong> {{ auth()->user()->email }}</li>
                                @if(auth()->user()->code_apogee)
                                <li><strong>Code Apogée :</strong> {{ auth()->user()->code_apogee }}</li>
                                @endif
                            </ul>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Modifier mon profil
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>