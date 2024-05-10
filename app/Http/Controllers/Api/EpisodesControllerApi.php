<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Serie;

class EpisodesControllerApi extends Controller
{
    // METODO DE MOSTRAR TODOS OS EPISODIOS
    public function index(Serie $series){
        return $series->episodes;
    }
}