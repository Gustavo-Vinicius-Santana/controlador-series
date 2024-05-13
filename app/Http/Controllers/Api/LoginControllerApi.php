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

class LoginControllerApi extends Controller
{
    public function index(Request $request){
        $credentials = $request->only(['email', 'password']);

        $user = User::whereEmail($credentials['email'])->first();

        if($user === null || Hash::check($credentials['password'], $user->password) === false){
            return response()->json('Unauthorized', 401);
        }
        dd($user);
    }
}