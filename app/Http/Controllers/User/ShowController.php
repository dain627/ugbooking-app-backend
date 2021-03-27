<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ShowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function showInfo(ShowRequest $request)
    {
        return response()->json([
            'user' => Auth::user()
            // KEY 'user' => Value Auth::user()
            //키 'user'는 값으로 Auth::user()(로그인한유저:request에 정의된)을 갖는다.
        ]);
    }
}

