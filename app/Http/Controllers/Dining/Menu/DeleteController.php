<?php

namespace App\Http\Controllers\Dining\Menu;

use App\Http\Controllers\Controller;
use App\Models\DiningList;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteMenu(DiningList $DiningList)
    {
        return response()->json([
            'menu' => $DiningList->delete()//$DiningList
        ]);
    }
}
