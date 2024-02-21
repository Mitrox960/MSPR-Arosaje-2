<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
{
    Auth::logout();

    // Rediriger l'utilisateur vers la page de connexion ou une autre page
    return redirect('/login');
}
}
