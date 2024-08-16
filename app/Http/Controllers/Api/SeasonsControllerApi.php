<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Serie;

class SeasonsControllerApi extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index(Serie $series){
        // METODO DE MOSTRAR TODAS AS TEMPORADAS
        return $series->seasons;
    }

}