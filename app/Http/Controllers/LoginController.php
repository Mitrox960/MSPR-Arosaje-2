<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('accountLogin');
    }

     public function sendLogin(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'identifiant' => 'required',
            'mot_de_passe' => 'required',
        ]);

        // Tentative de connexion
        $credentials = [
            'adresse_mail' => $validatedData['identifiant'], // Assurez-vous d'ajuster cela en fonction de votre modèle utilisateur
            'password' => $validatedData['mot_de_passe'],
        ];

        if (Auth::attempt($credentials)) {
            // Authentification réussie, rediriger l'utilisateur vers la page souhaitée
            return redirect('/accueil')->with('success', 'Connexion réussie!');
        } else {
            // Authentification échouée, rediriger avec un message d'erreur
            return redirect()->back()->withErrors(['error' => 'Identifiants incorrects']);
        }
    }
}
