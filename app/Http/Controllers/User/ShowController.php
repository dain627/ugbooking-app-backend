<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ShowRequest;
use App\Http\Requests\User\IsAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function showAllInfo(IsAdminRequest $request)
    {

        return response()->json([

            'users' => User::all()
        ]);
        // return response()->json([
        //     'users' => Auth::user()->admin-> DB::select('select * from users')
        //     // 로그인한 유저가 어드민일경우 모든 유저의 정보를 불러옴
        // ]);
    }
}
