<?php

namespace App\Http\Controllers\Dining\Chef;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChefProfile;
use App\Http\Requests\Dining\Chef\CreateRequest;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function createChefProfile(CreateRequest $request)
    {
        return response()->json(
            ChefProfile::create(
                array_merge($request->validated(), ['user_id' => Auth::id()])
            )
        );
    }
}
