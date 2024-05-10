<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesControllerApi;
use App\Http\Controllers\Api\SeasonsControllerApi;
use App\Http\Controllers\Api\EpisodesControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ROTAS DO CRUD DA API
Route::apiResource('/series', SeriesControllerApi::class);

// ROTA PARA MOSTRAR TEMPORADAS
Route::get('/series/{series}/seasons', [SeasonsControllerApi::class, 'index']);

Route::get('/series/{series}/episodes', [EpisodesControllerApi::class, 'index']);