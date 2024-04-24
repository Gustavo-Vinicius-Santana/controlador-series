<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = DB::select('SELECT nome FROM series;');

        return view('series.index')->with('series', $series);
    }
    public function create(Request $request){
        return view('series.create');
    }
    public function store(Request $request){
        $nomeSerie = $request->input('nome');

        if(DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie])){
            return redirect('/series');
        }else{
            return "deu erro";
        }
    }
}
