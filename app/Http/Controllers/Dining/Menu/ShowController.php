<?php

namespace App\Http\Controllers\Dining\Menu;

use App\Http\Controllers\Controller;
use App\Models\ChefProfile;
use App\Models\DiningList;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    // http://localhost:8090/api/dining/menu/1
    public function showMenuInfo(DiningList $DiningList)
    {
        return response()->json([
            'menu' => $DiningList
        ]);
    }
    public function showAllMenus()
    {
        return response()->json([
            'memus' => DiningList::with(['creator'])->get(),

        ]);
    }
}
