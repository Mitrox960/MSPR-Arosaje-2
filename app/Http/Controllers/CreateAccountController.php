<?php
// App\Http\Controllers\AccountController.php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur; // Assurez-vous d'importer le mod�le User
use App\Models\Role;

class CreateAccountController extends Controller
{
    public function showRegistrationForm()
    {
        return view('accountCreate');
    }

    public function register(Request $request)
    {


        // Valider les donn�es du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'nom_voie' => 'required|string|max:255',
            'numero_voie' => 'required|string|max:20',
            'role' => 'required|in:admin,utilisateur', // Assurez-vous que le r�le est l'un des choix autoris�s
            'date_de_naissance' => 'required|date', // Ajout de la date de naissance
            'telephone' => 'required|string|max:20', // Ajout du num�ro de t�l�phone
        ]);
        /*
        // Cr�er un nouvel utilisateur avec les donn�es valid�es
        $user = Utilisateur::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'date_de_naissance' => $validatedData['date_de_naissance'],
            'telephone' => $validatedData['telephone'],
        ]);

        // Ajouter les d�tails de l'adresse
        $user->adresse()->create([
            'ville' => $validatedData['ville'],
            'code_postal' => $validatedData['code_postal'],
            'nom_voie' => $validatedData['nom_voie'],
            'numero_voie' => $validatedData['numero_voie'],
        ]);

        $user->assignRole($validatedData['role']);*/

        return redirect('/confirmation')->with('success', 'Compte cr�� avec succ�s!');

        // Assigner le r�le


        // Rediriger l'utilisateur vers la page de confirmation, ou tout autre endroit souhait�

    }

    // ...
}
