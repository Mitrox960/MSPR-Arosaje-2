<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Services\PlanteService;
use Illuminate\Http\Request;
use App\Models\Utilisateur; 
use App\Models\Role;

class CreatePlanteController extends Controller
{
    protected PlanteService $plante;
    
    public function creationPlante(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'conseil_entretien' => 'required|string|max:255',
        ]);
        $this->plante->create($validatedData['nom'],$validatedData['image'],$validatedData['description'],$validatedData['conseil_entretien'],);
        return view('accueil');
    }

    public function plante()
    {
        return view('planteCreation');
    }
    

}
