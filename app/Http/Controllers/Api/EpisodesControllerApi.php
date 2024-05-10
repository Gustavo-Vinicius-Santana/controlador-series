<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Episodes;
use Illuminate\Http\Request;

class EpisodesControllerApi extends Controller
{
    // METODO DE MOSTRAR TODOS OS EPISODIOS
    public function index(Serie $series){
        return $series->episodes;
    }

    // METODO MARCAR EPISODIO COMO ASSISTIDO
    public function update(Episodes $episode, Request $request){
        $episode->watched = $request->watched;
        $episode->save();

        return $episode;
    }
}