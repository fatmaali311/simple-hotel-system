<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation; 


class ReservationController extends Controller
{
    

    //view reservation for approved clients
    public function clientReservations()
    {
        $reservations =Reservation::with('client', 'room')
        ->whereHas('client', function ($query) {
            $query->where('status', 'approved');
        })
        ->get();
        return response()->json($reservations);
    }
}
