<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Item;
use App\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::all();
        $items    = Item::all();
        $categories = Category::all();
        $dishes = Dish::all();
        return view('welcome',compact('sliders','items','categories','dishes'));
    }
}
