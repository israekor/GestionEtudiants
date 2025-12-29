@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Titre -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard Administrateur</h1>
        <p class="text-gray-600 mt-1">Vue d’ensemble de la plateforme</p>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-2xl shadow-sm p-6 border">
            <p class="text-sm text-gray-500">Total étudiants</p>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalEtudiants }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border">
            <p class="text-sm text-gray-500">Nouveaux ce mois</p>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $nouveauxEtudiants }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border">
            <p class="text-sm text-gray-500">Administrateurs</p>
            <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalAdmins }}</p>
        </div>

        <div class="bg-indigo-600 text-white rounded-2xl shadow-sm p-6 flex flex-col justify-between">
            <p class="text-sm opacity-90">Action rapide</p>
            <a href="{{ route('etudiants.create') }}"
               class="mt-4 inline-flex justify-center px-4 py-2 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-indigo-50 transition">
                + Ajouter étudiant
            </a>
        </div>

    </div>

    <!-- Derniers étudiants -->
    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Derniers étudiants ajoutés</h2>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($derniersEtudiants as $student)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $student->prenom }} {{ $student->nom }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $student->email }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('etudiants.edit', $student) }}"
                           class="text-indigo-600 hover:underline">
                            Modifier
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                        Aucun étudiant récent
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
