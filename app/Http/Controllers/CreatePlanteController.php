<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatePlanteController extends Controller
{
    public function showPlanteCreationForm()
    {
        return view('planteCreation');
    }

    public function creationPlante(Request $request)

    {
        dump($request);
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'conseil_entretien' => 'required|string|max:255',
        ]);

        // Récupérez l'utilisateur actuellement authentifié
        $utilisateur = Auth::user();

        // Utilisez la relation pour créer une plante associée à cet utilisateur
        $plante = $utilisateur->plantes()->create([
            'nom' => $validatedData['nom'],
            'image' => $validatedData['image'],
            'description' => $validatedData['description'],
            'conseil_entretien' => $validatedData['conseil_entretien'],
        ]);

        // Rediriger vers la page d'accueil ou une autre page appropriée avec un message de succès
        return redirect('/accueil')->with('success', 'Plante créée avec succès!');
    }
}
