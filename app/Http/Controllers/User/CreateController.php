<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\CreateRequest;

class CreateController extends Controller
{
    public function createUserInfo(CreateRequest $request)
    {

        return response()->json(
            User::create($request->validated())
        );

    }

}
