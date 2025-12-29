@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-8">Mon profil</h1>

    <div class="bg-white rounded-2xl shadow border p-8">

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="label">Nom</label>
                    <x-input name="nom" value="{{ old('nom', $user->nom) }}" />
                </div>

                <div>
                    <label class="label">Prénom</label>
                    <x-input name="prenom" value="{{ old('prenom', $user->prenom) }}" />
                </div>

                <div class="md:col-span-2">
                    <label class="label">Email</label>
                    <x-input type="email" name="email" value="{{ old('email', $user->email) }}" />
                </div>

                <div class="md:col-span-2">
                    <label class="label">Mot de passe (optionnel)</label>
                    <x-input type="password" name="password" placeholder="Laisser vide pour ne pas changer" />
                </div>

            </div>

            <div class="mt-10 flex justify-end gap-4">
                <a href="{{ route('dashboard') }}"
                   class="px-6 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Annuler
                </a>
                <button
                    class="px-8 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Enregistrer
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
