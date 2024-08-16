<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Episodes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginControllerApi extends Controller
{
    public function index(Request $request){
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials) === false){
            return response()->json('Unauthorized', 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token');

        return response()->json($token->plainTextToken);
    }
}