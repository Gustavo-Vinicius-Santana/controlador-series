<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Models\Season;
use App\Models\Serie;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use App\Repositories\EloquentSeriesRepository;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EpisodesController
{
    // PAGINA DE EPISODIOS
    public function index(Season $season){
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    // MARCAR OU DESMARCAR EPISODIO
    public function update(Request $request, Season $season){
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episodes $episode) use ($watchedEpisodes){
            $episode->watched = in_array($episode->id, $watchedEpisodes);
            $episode->save();
        });

        return to_route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episodios marcados como assistidos');

    }
}