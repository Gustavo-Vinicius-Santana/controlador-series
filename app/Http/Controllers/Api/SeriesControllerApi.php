<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesControllerApi extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index(Request $request){
        $query = Serie::query();
        if($request->has('nome')){
            $query->where('nome', $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(SeriesFormRequest $request){
        return response()->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $serie){
        $seriesModel = Serie::with('seasons.episodes')->find($serie);
        if($seriesModel === null){
            return response()->json(['message' => 'series not found'], 404);

        }
        return $seriesModel;
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