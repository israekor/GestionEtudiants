<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'etudiant')->paginate(10);
        return view('etudiants.index', compact('students'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'code_apogee' => 'required|unique:users',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nom','prenom','email','code_apogee']);
        $data['role'] = 'etudiant';

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('students', 'public');
        }

        User::create($data);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté');
    }

    public function edit(User $etudiant)
    {
        abort_if($etudiant->role !== 'etudiant', 404);
        return view('etudiants.edit', ['student' => $etudiant]);
    }

    public function update(Request $request, User $student)
    {
        abort_if($student->role !== 'etudiant', 404);

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $student->id,
            'code_apogee' => 'required|unique:users,code_apogee,' . $student->id,
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nom','prenom','email','code_apogee']);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            $data['photo'] = $request->file('photo')
                ->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant modifié');
    }


    public function destroy(User $student)
    {
        abort_if($student->role !== 'etudiant', 404);

        $student->delete();

        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant supprimé');
    }
}
