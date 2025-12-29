<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;


Route::post('/auth/google', [GoogleController::class, 'googleLogin'])
    ->name('api.google.login');

Route::middleware('auth:sanctum')->group(function () {
    // Déconnexion API (supprime le token sanctum)
    Route::post('/logout', [GoogleController::class, 'logout'])
        ->name('api.logout');
});