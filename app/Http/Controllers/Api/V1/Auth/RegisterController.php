<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\{
    Auth,
    DB
};
use App\Models\User;

class RegisterController extends Controller
{

    public function create(RegisterRequest $request)
    {
        return DB::transaction(function ()  use ($request) {
            $user = User::create($request->all());
            $token = $user->createToken('access_token')->plainTextToken;
            return response()->json([
                'message' => 'Register done.!',
                'access_token' => $token,
                'user' => $user
            ], 200);
        });
    }
}
