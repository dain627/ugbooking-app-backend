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
            'ok' => Auth::user()->currentAccessToken()->delete()
        ]);
    }
}
