<?php

namespace App\Http\Controllers\Dining\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiningList;
use App\Http\Requests\Dining\Menu\UpdateRequest;

class UpdateController extends Controller
{
    public function updateMenu(DiningList $DiningList, UpdateRequest $request)
    {
        return response()->json([
            'memu' => $DiningList->update($request->validated())
        ]);
    }
}
