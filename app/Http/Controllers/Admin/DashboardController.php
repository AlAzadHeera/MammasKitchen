<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Item;
use App\Reservation;
use App\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $category = Category::count();
        $item = Item::count();
        $slider = slider::count();
        $reservations = Reservation::where('status',false)->get();
        $message = Contact::count();
        return view('admin.dashboard',compact('category','item','slider','reservations','message'));
    }
}
