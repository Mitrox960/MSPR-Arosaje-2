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
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ajout de règles pour l'upload d'image
            'description' => 'required|string|max:255',
            'conseil_entretien' => 'required|string|max:255',
        ]);

        // Récupérez l'utilisateur actuellement authentifié
        $utilisateur = Auth::user();

        // Gérez l'upload de l'image
        $image = base64_encode(file_get_contents($request->file('image')->path()));

        // Utilisez la relation pour créer une plante associée à cet utilisateur
        $plante = $utilisateur->plantes()->create([
            'nom' => $validatedData['nom'],
            'image' => $image,
            'description' => $validatedData['description'],
            'conseil_entretien' => $validatedData['conseil_entretien'],
        ]);

        // Rediriger vers la page d'accueil ou une autre page appropriée avec un message de succès
        return redirect('/accueil')->with('success', 'Plante créée avec succès!');
    }


    public function prendrePhoto(Request $request, Plante $plante)
{
    // Assurez-vous que l'utilisateur est propriétaire de la plante
    if (Auth::user()->id !== $plante->utilisateur->id) {
        abort(403, 'Vous n\'êtes pas autorisé à prendre une photo pour cette plante.');
    }

    // Récupérez la photo encodée en base64 depuis la requête
    $photoEncodée = $request->input('photo_encodée');

    // Enregistrez la photo pour la plante
    $plante->photo = $photoEncodée;
    $plante->save();

    // Redirigez l'utilisateur vers la page appropriée
    return redirect()->back()->with('success', 'Photo de la plante enregistrée avec succès.');
}
}
