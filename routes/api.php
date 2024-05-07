<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ENDPOINT QUE RETORNA TODAS AS SERIES
Route::get('/series', [SeriesControllerApi::class, 'index']);
