<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Serie;

class SeriesControllerApi extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index(){
        return Serie::all();
    }

    public function store(SeriesFormRequest $request){
        return response()->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $serie){
        $serie = Serie::whereId($serie)
        ->with('seasons.episodes')
        ->get();
        return $serie;
    }

    public function update(int $serie, SeriesFormRequest $request){
        Serie::where('id', $serie)->update($request->all());

        return $serie;
    }

    public function destroy(int $serie){
        Serie::destroy($serie);

        return response()->noContent();
    }
}