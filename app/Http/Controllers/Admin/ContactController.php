<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $messages = Contact::all();
        return view('admin.Contact.index',compact('messages'));
    }
}
