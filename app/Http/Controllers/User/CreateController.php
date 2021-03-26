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


        // $willCreateUserInfo = request()->only([
        //     'user_id', # required, unique, min8 ~ max:20
        //     'password', # required,  min8 ~ max:20
        //     'first_name', # required, string
        //     'last_name', # required, string
        //     'email', # required,email, string
        //     'contact_number', # required, number,ony_number,some pattern
        //     'user_type', # required,string, customer|chief
        // ]);

        // $validator = \Validator::make($willCreateUserInfo, [
        //     'user_id' => 'required|min:8'
        // ]);


        // User::find(1)->delete();

        // dd(
        //     $request->validated()
        // );

        // dd($validator->fails(), $validator->errors());

        // php artisan make:request "User\CreateRequest"

        // return response()->json([
        //     'isSuccess' => true
        // ]);
    }

}
