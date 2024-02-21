<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserPlantesController extends Controller
{
    // UserPlantesController.php

    public function showPlantes()
    {
        // Récupérer l'utilisateur connecté
        $utilisateur = Auth::user();

        // Récupérer les plantes associées à l'utilisateur connecté
        $plantes = $utilisateur->plantes;

        // Retourner la vue avec les plantes
        return view('userPlantes', compact('plantes'));
    }
}
