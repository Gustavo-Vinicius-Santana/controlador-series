<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

//GERENCIADOR DE ROTAS
Route::get('/', function () {
    return view('home');
});

// ROTAS E METODOS RELACIONADOS AS SERIES
Route::resource('/series', SeriesController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);

Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])
    ->name('series.destroy');
