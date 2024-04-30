<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;

//GERENCIADOR DE ROTAS
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
