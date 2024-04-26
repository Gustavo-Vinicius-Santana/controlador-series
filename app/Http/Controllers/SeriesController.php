<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = Serie::all();

        return view('series.index')->with('series', $series);
    }
    public function create(Request $request){
        return view('series.create');
    }
    public function store(Request $request){
        // INSERÇÃO DE DADOS NO BANCO DE DADOS
        Serie::create($request->all());

        // REDICIONAMENTO DE ROTAS
        return to_route('series.index');

    }
}
