<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Requests\Booking\CreateRequest;
use App\Models\DiningList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function createBooking(CreateRequest $request, DiningList $DiningList)
    {
        return response()->json(
            Auth::user()->bookings()->create(
                array_merge($request->validated(), ['dining_list_id'=> $DiningList->id])
            )
        );


    }
}
