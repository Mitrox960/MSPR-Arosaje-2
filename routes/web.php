<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAccountController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accountCreateOrConnexion');
});
Route::get('/header', function () {
    return view('header');
});
Route::get('/footer', function () {
    return view('footer');
});

Route::post('/accountCreate', [CreateAccountController::class, 'register'])->name('accountCreate');



Route::get('/accountLogin', function () {
    return view('accountLogin');
});

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        echo "La connexion à la base de données fonctionne.";
    } catch (\Exception $e) {
        die("Impossible de se connecter à la base de données: " . $e->getMessage());
    }
});

// Afficher le formulaire
Route::get('/accountCreate', [CreateAccountController::class, 'showRegistrationForm'])->name('showRegistrationForm');
