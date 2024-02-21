<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


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


/** --- When user is connected --- */
Route::get('/headerHome', function () {
    return view('headerHome');
});

// Utilisation du middleware 'auth' dans le groupe de routes

Route::get('/userProfile', function () {
    return view('userProfile');
});

/** --- When user is connected --- */
Route::get('/headerHome', function () {
    return view('headerHome');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout'); // Ajoutez cette ligne pour la connexion


Route::get('/accueil', function () {
    return view('accueil');
})->middleware(['auth']);


Route::get('/userProfile', function () {
    return view('userProfile');
});

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        echo "La connexion � la base de donn�es fonctionne.";
    } catch (\Exception $e) {
        die("Impossible de se connecter � la base de donn�es: " . $e->getMessage());
    }
});

// Afficher le formulaire
Route::get('/accountForm', [CreateAccountController::class, 'showRegistrationForm'])->name('accountForm');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/sendLogin', [LoginController::class, 'sendLogin'])->name('sendLogin'); // Ajoutez cette ligne pour la connexion
