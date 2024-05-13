<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesControllerApi;
use App\Http\Controllers\Api\SeasonsControllerApi;
use App\Http\Controllers\Api\EpisodesControllerApi;
use App\Http\Controllers\Api\LoginControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// OBRIGATORIEDADE DE AUTENTICAÇÃO
Route::middleware('auth:sanctum')->group(function () {
    // CRUD DA API
    Route::apiResource('/series', SeriesControllerApi::class);

    // MARCAR EPISODIO COMO MARCADO
    Route::patch('/episodes/{episode}', [EpisodesControllerApi::class, 'update']);

    // MOSTRAR TEMPORADAS
    Route::get('/series/{series}/seasons', [SeasonsControllerApi::class, 'index']);

    // MOSTRAR EPISODIOS
    Route::get('/series/{series}/episodes', [EpisodesControllerApi::class, 'index']);
});

// LOGIN DO USUARIO
Route::post('/login', [LoginControllerApi::class, 'index']);