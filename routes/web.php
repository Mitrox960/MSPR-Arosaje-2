<?php

use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CreatePlanteController;
use App\Http\Controllers\UserPlantesController;
use App\Http\Controllers\AllPlantsController;
use App\Http\Controllers\PostPlantController;
use App\Http\Controllers\RemovePlantController;
use App\Http\Controllers\CGUController;
use App\Http\Controllers\UserController;

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

Route::get('/headerHome', function () {
    return view('headerHome');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout'); // Ajoutez cette ligne pour la connexion

Route::get('/accueil', function () {
    return view('accueil');
})->middleware(['auth']);


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

// récupère la dernière route en cas de route invalide A ACTIVER ET AMELIORER A LA FIN POUR EVITER DE SE COMPLIQUER NOTRE DEBOGAGE

Route::fallback(function () {
    $lastRoute = Session::get('last_route', '/');

    return redirect($lastRoute);
})->name('fallback');




//plantes

Route::post('/planteCreation', [CreatePlanteController::class, 'creationPlante'])->name('planteCreation');
Route::get('/plante', [CreatePlanteController::class, 'showPlanteCreationForm'])->name('showPlanteCreationForm')->middleware(['auth']);
Route::get('/user-plantes', [UserPlantesController::class, 'showPlantes'])->name('user.plantes')->middleware(['auth']);

Route::get('/allPlants', [AllPlantsController::class, 'allPlants'])->name('allPlants')->middleware(['auth']);





Route::put('/postPlant/{plante}', [PostPlantController::class, 'postPlant'])->name('postPlant');


Route::put('/removePlant/{plante}', [RemovePlantController::class, 'removePlant'])->name('removePlant');



Route::post('/plante/photo/{plante}', 'PlanteController@prendrePhoto')->name('prendrePhoto');


Route::put('/plante/photo/{plante}', [CreatePlanteController::class, 'plante/photo'])->name('plante/photo');
Route::get('/cgu', [CGUController::class, 'afficherCGU'])->name('cgu');

Route::get('/userProfile', [UserProfileController::class, 'showUserProfile'])->name('userProfile')->middleware(['auth']);