<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;

class UserProfileController extends Controller
{
    public function showUserProfile()
    {
        // Chargez l'utilisateur avec les relations d'adresse et de rôle
        $utilisateur = Auth::user();
        $utilisateur->load('adresse'); // Correction ici, utiliser 'role' au lieu de 'roles'


        // Passez l'utilisateur à la vue
        return view('userProfile', ['utilisateur' => $utilisateur]);
    }
}
