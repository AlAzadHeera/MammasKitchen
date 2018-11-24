<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function send(Request $request){
        $this->validate($request,[
            'name'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required ',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();
        Toastr::success('Your Message Has Been Successfully Sent.','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();

    }
}
