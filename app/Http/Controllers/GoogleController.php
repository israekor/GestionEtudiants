<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;

class GoogleController extends Controller
{
    protected FirebaseAuth $firebaseAuth;

    public function __construct(FirebaseAuth $firebaseAuth)
    {
        $this->firebaseAuth = $firebaseAuth;
    }

    // Login / Signup Google via Firebase
    public function googleLogin(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        // 1️⃣ Vérifier le token Firebase
        $verifiedToken = $this->firebaseAuth->verifyIdToken($request->token);
        $uid = $verifiedToken->claims()->get('sub');

        $firebaseUser = $this->firebaseAuth->getUser($uid);

        // 2️⃣ Trouver ou créer l'utilisateur Laravel
        $user = User::updateOrCreate(
            ['email' => $firebaseUser->email],
            [
                'nom' => $firebaseUser->displayName ?? 'Nom',
                'prenom' => '',
                'photo' => $firebaseUser->photoUrl,
                'password' => null,
                'email_verified_at' => now(),
                'role' => 'etudiant', // par défaut
            ]
        );

        // 🔐 Authentifier l'utilisateur dans Laravel
        Auth::loginUsingId($user->id);

        // 🎯 REDIRECTION SELON RÔLE
        $redirect = match ($user->role) {
            'admin' => route('admin.dashboard'),
            'etudiant' => route('student.dashboard'),
            default => route('login'),
        };

        return response()->json([
            'redirect' => $redirect
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnexion réussie'
        ]);
    }
}
