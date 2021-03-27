<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Laravel's Illuminate\Http\Request class provides an object-oriented way to interact with the current
// HTTP request being handled by your application as well retrieve the input, cookies, and files that were submitted with the request.
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)// LoginRequest validatior instance
    {
        $credentials = $request->validated();
        //The Auth function returns an authenticator instance.
        if (Auth::attempt($credentials)) {
            $successfulLoginUser = Auth::user();
            $token = $successfulLoginUser->createToken('user_ugdining');
            return response()->json([
                'ok' => true,
                'loginedUser' => $successfulLoginUser,
                'token' => $token->plainTextToken
            ]);

        }
        else {
            return response()->json(
                ['ok' => false]
            );
        }
    }
}
