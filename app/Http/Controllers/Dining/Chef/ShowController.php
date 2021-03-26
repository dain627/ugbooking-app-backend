<?php

namespace App\Http\Controllers\Dining\Chef;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dining\Chef\ShowRequest;
use App\Models\ChefProfile;
use App\Models\User;

class ShowController extends Controller
{
    public function showChefProfile(ShowRequest $request)
    {

        // dd(Auth::user()->chef);
        return response()->json([
            'chef_profile' => Auth::user()->chef
        ]);
    }
}
