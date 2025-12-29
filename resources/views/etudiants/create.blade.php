@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-8">Ajouter un étudiant</h1>

    <div class="bg-white rounded-2xl shadow border p-8">

        <form method="POST" action="{{ route('etudiants.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <x-input name="prenom" placeholder="Prénom" />
                <x-input name="nom" placeholder="Nom" />
                <x-input type="email" name="email" placeholder="Email" />
                <x-input name="code_apogee" placeholder="Code Apogée" />

            </div>

            <div class="mt-10 flex justify-end gap-4">
                <a href="{{ route('etudiants.index') }}"
                   class="px-6 py-3 bg-gray-200 rounded-lg">
                    Annuler
                </a>
                <button class="px-8 py-3 bg-indigo-600 text-white rounded-lg">
                    Enregistrer
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
