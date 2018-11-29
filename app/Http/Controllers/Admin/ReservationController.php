<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\ReservationConfirmedJob;
use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

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
        ReservationConfirmedJob::dispatch($reservation)
            ->delay(now()->addSeconds(5));
        Toastr::success('Reservation Confirmed!!','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }

    public function delete($id){
        $reservation = Reservation::find($id);
        $reservation->delete();
        Toastr::success('Deleted Successfully!!','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
