<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;

// ROTA INICIAL
Route::get('/', function () {
    return view('home');
});

// ROTAS E METODOS RELACIONADOS AS SERIES
Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])
    ->name('series.destroy');

// ROTAS E METODOS RELACIONADOS A TEMPORADA
Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

// ROTAS E METODOS RELACIONADOS A EPISODIOS
Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

Route::post('/seasons/{season}/episodes', function(\Illuminate\Http\Request $request){
    dd($request->all());
});
