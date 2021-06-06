<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LogoutRequest;

class LogoutController extends Controller
{
    public function logout()
    {
        return response()->json([
            'logout' => Auth::user()->currentAccessToken()->delete()
        ]);
    }
}
//It may "revoke" tokens by deleting them from database using the tokens relationship that is provided by the Laravel\Sanctum\HasApiTokens trait:
//Revoke the token that was used to authenticate the current request.
//https://laravel.kr/docs/8.x/sanctum#revoking-mobile-api-tokens
