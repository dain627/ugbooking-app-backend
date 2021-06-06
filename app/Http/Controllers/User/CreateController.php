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
        // response function will return as json
        //  Laravel includes a variety of global "helper" PHP functions.
        // response function is laravel helper function-> function response($content = '', $status = 200, array $headers = [])

        return response()->json(
            User::create($request->validated())
        );

    }

}
