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
