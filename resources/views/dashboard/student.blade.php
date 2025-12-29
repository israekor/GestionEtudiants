@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-gray-900 mb-6">Mon espace étudiant</h1>

    <div class="bg-white rounded-2xl shadow border p-8">
        <h2 class="text-lg font-semibold mb-6">Mes informations</h2>

        <div class="space-y-3 text-gray-700">
            <p><strong>Nom :</strong> {{ $user->prenom }} {{ $user->nom }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            @if($user->code_apogee)
            <p><strong>Code Apogée :</strong> {{ $user->code_apogee }}</p>
            @endif
        </div>

        <a href="{{ route('profile.edit') }}"
           class="inline-flex items-center mt-8 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Modifier mon profil
        </a>
    </div>

</div>
@endsection
