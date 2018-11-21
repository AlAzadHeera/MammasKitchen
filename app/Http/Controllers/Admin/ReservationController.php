<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return view('admin.Reservation.index',compact('reservations'));
    }
}
