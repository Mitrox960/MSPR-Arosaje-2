<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CGUController extends Controller
{
    public function afficherCGU()
    {
        return view('cgu');
    }
}
