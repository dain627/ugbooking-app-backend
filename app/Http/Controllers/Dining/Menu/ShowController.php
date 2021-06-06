<?php

namespace App\Http\Controllers\Dining\Menu;

use App\Http\Controllers\Controller;
use App\Models\ChefProfile;
use App\Models\DiningList;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    // http://localhost:8090/api/dining/menu/1
    // 해당 아이디값의 메뉴 테이블 리스트 불러오기
    public function showMenuInfo(DiningList $DiningList)
    {
        return response()->json([
            'menu' => $DiningList
        ]);
    }
    // all menu show up 모든 테이블의 리스트 화면에 불러오기
    public function showAllMenus()
    {
        return response()->json([
            'memus' => DiningList::with(['creator'])->get(),

        ]);
    }
}
