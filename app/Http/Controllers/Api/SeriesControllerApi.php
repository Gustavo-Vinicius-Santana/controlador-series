<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Serie; 

class SeriesControllerApi extends Controller
{
    public function index(){
        return Serie::all();
    }

    public function store(SeriesFormRequest $request){
        return response()->json($serie = Series::create($request->all()), 201);
    }
}