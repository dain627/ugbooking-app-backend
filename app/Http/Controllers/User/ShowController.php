<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ShowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    //  로그인한 유저만 로그인정보를 불러올 수 있도록
    public function showInfo(ShowRequest $request)
    {
        return response()->json([
            'user' => Auth::user()
            // KEY 'user' => Value Auth::user()
            //키 'user'는 값으로 Auth::user()(로그인한유저:request에 정의된)을 갖는다.
        ]);
    }
}

