<?php
// App\Http\Controllers\AccountController.php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Importez les modèles au besoin
use App\Models\Utilisateur;
use App\Models\Adresse;
use App\Models\Role;
use Illuminate\Support\Str;

class CreateAccountController extends Controller
{
    public function showRegistrationForm()
    {
        return view('accountCreate');
    }

public function register(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:utilisateurs,adresse_mail',
        'password' => 'required|string|min:8|confirmed',
        'ville' => 'required|string|max:255',
        'code_postal' => 'required|string|max:10',
        'nom_voie' => 'required|string|max:255',
        'numero_voie' => 'required|string|max:20',
        'role' => 'required|in:botaniste,utilisateur',
        'date_de_naissance' => 'required|date',
        'telephone' => 'required|string|max:20',
    ]);

    try {
        $role = Role::firstOrCreate(['nom_role' => $validatedData['role']], ['identifiant' => Str::slug($validatedData['role'])]);

        // Créer l'adresse
        $adresse = Adresse::create([
            'ville' => $validatedData['ville'],
            'code_postal' => $validatedData['code_postal'],
            'nom_voie' => $validatedData['nom_voie'],
            'numero_voie' => $validatedData['numero_voie'],
        ]);

        // Créer un nouvel utilisateur avec les données validées
        $user = Utilisateur::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'adresse_mail' => $validatedData['email'],
            'mot_de_passe' => bcrypt($validatedData['password']),
            'date_de_naissance' => $validatedData['date_de_naissance'],
            'telephone' => $validatedData['telephone'],
            'id_role' => $role->id,
            'id_adresse' => $adresse->id,
        ]);

        return redirect('/login')->with('success', 'Compte créé avec succès!');
    } catch (\Exception $e) {
        return redirect()->back();
    }
}



}
