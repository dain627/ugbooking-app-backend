<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\UpdateRequest;

class UpdateController extends Controller
{
    public function updateUser(User $Id, UpdateRequest $request)
    {
        return response()->json([
            'user' => $Id->update($request->validated())
            // 'user' =>Auth::user()->admin-> $User->update($request->validated())
        ]);
    }
}
