<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\IsAdminRequest;

class DeleteControlloer extends Controller
{
    public function deleteUser(User $Id, IsAdminRequest $request)
    {
        //모델바인딩..
        // dd($Id);
        // auth::user()->admin;
        //삭제결과에대한 불어올 결과 값을 정의
        // $Id->delete();
        // return response()->json([
        //     'user' =>$Id

        return response()->json([
                // 'user' =>auth::user()->admin -> $Id->delete()
                'isSuccess' => $Id->delete(),
                // Auth::user()->ad$Id->delete()
                // 'user' => $Id->delete()
        ]);

    }
}

