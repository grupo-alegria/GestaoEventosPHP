<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

//Pagina Inicial
Route::get('/', function () {
    return view('welcome');
})->name('home');

//Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

//Login Organizador
Route::middleware('auth:organizador')->prefix('organizador')->group(function () {
    Route::get('/home', [OrganizadorController::class, 'home'])->name('organizador.home');
});

//Login Participante
Route::middleware('auth:participante')->prefix('participante')->group(function () {
    Route::get('/home', [ParticipanteController::class, 'home'])->name('participante.home');
});

//-----------ORGANIZADOR-----------
//Cadastro Organizador
Route::get('/auth/organizador', [OrganizadorController::class, 'index'])->name('organizador.auth.cadastroOrganizador');
Route::post('/auth/organizador', [OrganizadorController::class, 'store'])->name('organizador.store');

//Home Organizador
Route::middleware('auth:organizador')->prefix('organizador')->group(function () {
    Route::get('/home', [OrganizadorController::class, 'home'])->name('organizador.home');
});

//Edit Organizador
Route::middleware('auth:organizador')->group(function () {
    Route::get('/organizador/{id}/edit', [OrganizadorController::class, 'edit'])->name('organizador.edit');
    Route::put('/organizador/update/{id}', [OrganizadorController::class, 'update'])->name('organizador.update');
});

//Logout Organizador
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redireciona para a página inicial após logout
})->name('logout');

//Excluir Organizador
Route::delete('/organizador/{id}', [OrganizadorController::class, 'destroy'])->name('organizador.destroy');

//-----------PARTICIPANTE-----------
//Cadastro Participante
Route::get('/auth/participante', [ParticipanteController::class, 'index'])->name('participante.auth.cadastroParticipante');
Route::post('/auth/participante', [ParticipanteController::class, 'store'])->name('participante.store');

//Home Participante
Route::middleware('auth:participante')->group(function () {
    Route::get('/participante/home', [ParticipanteController::class, 'home'])->name('participante.home');
});

//Edit Participante
Route::middleware('auth:participante')->group(function () {
    Route::get('/participante/{id}/edit', [ParticipanteController::class, 'edit'])->name('participante.edit');
    Route::put('/participante/update/{id}', [ParticipanteController::class, 'update'])->name('participante.update');
});

//Logout Participante
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redireciona para a página inicial após logout
})->name('logout');

//Excluir participante
Route::delete('/participante/{id}', [ParticipanteController::class, 'destroy'])->name('participante.destroy');

//-----------EVENTOS-----------
//Cadastro Eventos
Route::get('/criar/participante', [EventoController::class, 'index'])->name('evento.create');
Route::resource('eventos', EventoController::class);

//Edit Evento
Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');

//Excluir Evento
Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');

//Listar Eventos
Route::get('/eventos/index/{id}', [EventoController::class, 'index'])->name('eventos.index');


//-----------INGRESSO-----------
//Cadastrar Participante no ingresso
Route::put('/comprar-ingresso/{eventoId}/{participanteId}', [ParticipanteController::class, 'comprarIngresso'])->name('participante.comprarIngresso');

//Excluir Participante do Ingresso
Route::put('/participante/cancelar-ingresso/{id}/{participanteId}', [ParticipanteController::class, 'cancelarIngresso'])
    ->name('participante.cancelarIngresso');

//Pagar Ingresso Participante
Route::post('/participante/pagar-ingresso/{id}', [ParticipanteController::class, 'pagarIngresso'])->name('participante.pagarIngresso');