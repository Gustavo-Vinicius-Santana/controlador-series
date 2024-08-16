<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Models\Season;
use App\Models\Serie;
use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use App\Repositories\EloquentSeriesRepository;
use App\Http\Middleware\Autenticador;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SeriesCreated;
use Illuminate\Http\Request;


class SeriesController extends Controller{
    public function __construct(private SeriesRepository $repository){
        $this->middleware(Autenticador::class)->except('index');
    }

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
    public function store(SeriesFormRequest $request, SeriesRepository $repository)
    {
        if($request->file('cover') != null){
            $coverPath = $request->file('cover')
            ->store('series_cover', 'public');
            $request->coverPath = $coverPath;
        }

        $serie = $this->repository->add($request);

        \App\Events\SeriesCreated::dispatch(
            $serie->nome,
            $serie->id,
            $request->seasonQty,
            $request->episodesPerSeason
        );

        return to_route('series.index')
            ->with('mensagem.sucesso', "serie '{$serie->nome}' cadastrada com sucesso!");
    }

    // FUNÇÃO DE DELETE DE UMA SERIE
    public function destroy(Serie $serie, Request $request)
    {
        if($serie->cover_path != null){
            Storage::disk('public')->delete($serie->cover_path);
        }

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
