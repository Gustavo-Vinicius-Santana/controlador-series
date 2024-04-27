<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller{

    // FUNÇÃO DE LISTAGEM
    public function index(Request $request){
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    // FUNÇÃO DE CADASTRO DE SERIE
    public function create(Request $request){
        return view('series.create');
    }

    // FUNÇÃO DE INSERÇÃO DE SERIE
    public function store(Request $request){
        $serie = Serie::create($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "serie '{$serie->nome}' cadastrada com sucesso!");
    }

    // FUNÇÃO DE DELETE DE UMA SERIE
    public function destroy(Serie $serie, Request $request){
        $serie->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie '{$serie->nome}' removida com suscesso!");
    }

    // FUNÇÃO EDIT DE UMA SERIE
    public function edit(Serie $series){
        return view('series.edit')
            ->with('series', $series);
    }

    // FUNÇÃO DE UPDATE
    public function update(Serie $series, Request $request){
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie {$series->nome} atualizada com sucesso!");
    }
}
