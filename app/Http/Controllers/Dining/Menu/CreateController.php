<?php

namespace App\Http\Controllers\Dining\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiningList;
use App\Http\Requests\Dining\Menu\CreateRequest;
use App\Models\ChefProfile;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function createMenu(CreateRequest $request)
    {
        return response()->json(
            Auth::user()->chef->menus()->create($request->validated()
            )
        );
    }
}
// 토큰을 헤더로 프론트로 보내고 토큰으로 로그인한 유저의 정보(멤버타입)을 알 수 있다.
// 유저중 쉐프정보만 가져오기 'dd(Auth::user()->chef)'
