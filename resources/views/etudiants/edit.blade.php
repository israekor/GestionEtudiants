@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <h1 class="text-2xl font-bold text-gray-900 mb-8">Modifier l'étudiant</h1>

    <div class="bg-white shadow-sm rounded-xl p-8 border border-gray-200">

        <form method="POST" action="{{ route('etudiants.update', $student) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $student->prenom) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('prenom') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom', $student->nom) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('nom') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $student->email) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('email') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Code Apogée</label>
                    <input type="text" name="code_apogee" value="{{ old('code_apogee', $student->code_apogee) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('code_apogee') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Photo (laisser vide pour conserver l'actuelle)</label>
                    <input type="file" name="photo" accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('photo') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror

                    @if($student->photo)
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Photo actuelle :</p>
                        <img src="{{ Storage::url($student->photo) }}" alt="Photo actuelle" class="mt-1 h-24 w-24 object-cover rounded-md">
                    </div>
                    @endif
                </div>
            </div>

            <div class="mt-10 flex justify-end gap-4">
                <a href="{{ route('etudiants.index') }}"
                   class="px-6 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Annuler
                </a>
                <button type="submit"
                        class="px-8 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection