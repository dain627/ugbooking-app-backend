<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\ShowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;
use App\Models\DiningList;


class ShowController extends Controller
{
    // public function showBookingList(ShowRequest $request) // can access chef only
    // {
    //     return response()->json([
    //         'bookingList' =>  Auth::user()->bookings // call all booking lists user for admin
    //     ]);
    // }

    public function showAllBookingList(ShowRequest $request) // can access chef only
    {
        return response()->json([
            'bookingList' =>  Auth::user()->chef->bookings()->with(['diningLists:id,menu_title'])->get(), // call booking lists with menu_title in diningList table
        ]);
    }

}

