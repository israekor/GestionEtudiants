<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Dashboard Administrateur
     */
    public function index()
    {
        // Nombre total d'étudiants
        $totalEtudiants = User::where('role', 'etudiant')->count();

        // Nombre total d'administrateurs
        $totalAdmins = User::where('role', 'admin')->count();

        // Nouveaux étudiants ce mois
        $nouveauxEtudiants = User::where('role', 'etudiant')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Derniers étudiants ajoutés
        $derniersEtudiants = User::where('role', 'etudiant')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.admin', compact(
            'totalEtudiants',
            'totalAdmins',
            'nouveauxEtudiants',
            'derniersEtudiants'
        ));
    }
}
