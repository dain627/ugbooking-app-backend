<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)// 밸러데이터 넣어주기(리퀘스트파일 생성해서 )
    {
        $credentials = $request->validated();
        //로그인 시도 Auth는 라라벨에서 제공되는 로그인 인증 함수
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


        // $attemptLogin = request()->only([
        //     'user_id',
        //     'password'
        // ]);

        // // Auth::attempt($attemptLogin)
        // return response()->json([
        //     'asdf' => true
        // ]);
    }
}
