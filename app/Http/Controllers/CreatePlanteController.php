<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur; 
use App\Models\Role;

class CreateAccountController extends Controller
{
    public function showRegistrationForm()
    {
        return view('accueil');
    }

    

}
