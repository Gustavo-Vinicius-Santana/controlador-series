<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Models\Season;
use App\Models\Serie;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeriesController extends Controller{

    // FUNÇÃO DE LISTAGEM
    public function index(Request $request)
    {
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    // FUNÇÃO DE DIRECIONAMENTO PARA CADASTRO
    public function create(Request $request)
    {
        return view('series.create');
    }

    // FUNÇÃO DE CADASTRO DE SERIE
    public function store(SeriesFormRequest $request)
    {
        // dd($request->all());
        $serie = Serie::create($request->all());
        $seasons = [];
        $episodes = [];

        for($i = 1; $i <= $request->seasonQty; $i ++){
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        foreach($serie->season as $season){
            for($j = 1; $j <= $request->episodesPerSeason; $j++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }
        Episodes::insert($episodes);

        return to_route('series.index')
            ->with('mensagem.sucesso', "serie '{$serie->nome}' cadastrada com sucesso!");
    }

    // FUNÇÃO DE DELETE DE UMA SERIE
    public function destroy(Serie $serie, Request $request)
    {
        $serie->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie '{$serie->nome}' removida com suscesso!");
    }

    // FUNÇÃO EDIT DE UMA SERIE
    public function edit(Serie $series)
    {
        return view('series.edit')
            ->with('series', $series);
    }

    // FUNÇÃO DE UPDATE
    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie {$series->nome} atualizada com sucesso!");
    }
}
