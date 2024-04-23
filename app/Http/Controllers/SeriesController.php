<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = [
            'lost',
            'game of thrones',
            'vikings'
        ];

        return view('series.index')->with('series', $series);
    }
    public function create(Request $request){
        return view('series.create');
    }
}
