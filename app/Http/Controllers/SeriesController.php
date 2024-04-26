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
        $request->session()->flash('mensagem.sucesso', "serie '{$serie->nome}' cadastrada com sucesso!");

        return to_route('series.index');
    }

    // FUNÇÃO DE DELETE DE UMA SERIE
    public function destroy(Serie $serie, Request $request){
        $serie->delete();
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->nome}' removida com suscesso!");

        return to_route('series.index');
    }
}
