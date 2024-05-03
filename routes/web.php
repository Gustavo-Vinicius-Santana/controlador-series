<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;

// ROTA INICIAL
Route::get('/', function () {
    return view('home');
});

// ROTAS E METODOS RELACIONADOS AS SERIES
Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])
    ->name('series.destroy')
    ->middleware(Autenticador::class);




// ROTAS PROTEGIDAS
Route::middleware(Autenticador::class)->group(function (){
    // ROTAS E METODOS RELACIONADOS A TEMPORADA
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    // ROTAS E METODOS RELACIONADOS A EPISODIOS
    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});


// ROTAS E METODOS RELACIONADOS A LOGIN
route::get('/login', [LoginController::class, 'index'])->name('login');

route::post('/login', [LoginController::class, 'store'])->name('store');

route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

// ROTAS E METODOS RELACIONADOS Ao USUARIO
route::get('/users', [UsersController::class, 'index'])->name('users.index')
    ->middleware(Autenticador::class);

route::get('/register', [UsersController::class, 'create'])->name('users.create');

route::post('/register', [UsersController::class, 'store'])->name('users.store');