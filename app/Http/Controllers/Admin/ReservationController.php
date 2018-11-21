<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return view('admin.Reservation.index',compact('reservations'));
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Toastr::success('Reservation Confirmed!!','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
