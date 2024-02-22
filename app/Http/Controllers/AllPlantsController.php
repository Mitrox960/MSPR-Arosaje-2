<?php

namespace App\Http\Controllers;

use App\Models\Plante;
use Illuminate\Http\Request;

class AllPlantsController extends \Illuminate\Routing\Controller
{
    public function allPlants()
    {
        // Charger les plantes avec la relation utilisateur, mais exclure le champ "postee"
        $plantes = Plante::where('postee', true)->with(['utilisateur' => function ($query) {
            $query->select('id', 'nom', 'prenom', 'adresse_mail'); // Exclure le champ "postee"
        }])->get();


        return view('allPlants', compact('plantes'));
    }
}
