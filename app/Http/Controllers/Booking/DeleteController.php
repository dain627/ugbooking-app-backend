<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteBooking(Booking $Id)
    {
        return response()->json([
            'booking' => $Id->delete()
        ]);
    }
}
