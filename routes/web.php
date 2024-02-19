<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/accountCreate', function () {
    return view('accountCreate');
});
Route::get('/accountLogin', function () {
    return view('accountLogin');
});


