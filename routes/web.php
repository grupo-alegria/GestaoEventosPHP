<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\ParticipanteController;

//Pagina Inicial
Route::get('/', function () { return view('welcome'); })->name('home');

//Login
Route::get('/login', function () { return view('welcome');})->name('login');

//Cadastro Organizador
Route::get('/auth/organizador', [OrganizadorController::class, 'index'])->name('organizador.auth.cadastroOrganizador');
Route::post('/auth/organizador', [OrganizadorController::class, 'store'])->name('organizador.store');

//Home Organizador
Route::middleware('auth')->prefix('organizador')->group(function () {
    Route::get('/home', [OrganizadorController::class, 'home'])->name('organizador.home');
});

//Cadastro Participante
Route::get('/auth/participante', [ParticipanteController::class, 'index'])->name('participante.auth.cadastroParticipante');
Route::post('/auth/participante', [ParticipanteController::class, 'store'])->name('participante.store');

//Home Participante
Route::middleware('auth:participante')->group(function () {
    Route::get('/participante/home', [ParticipanteController::class, 'home'])->name('participante.home');
});