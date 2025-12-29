<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Afficher le dashboard étudiant
     */
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.student', compact('user'));
    }
}
