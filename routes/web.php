<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizadorController;

//Pagina Inicial
Route::get('/', function () { return view('welcome'); });

//Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//Organizador
Route::get('/cadastroOrganizador', [OrganizadorController::class, 'index']);
Route::post('/cadastroOrganizador', [OrganizadorController::class, 'store']);