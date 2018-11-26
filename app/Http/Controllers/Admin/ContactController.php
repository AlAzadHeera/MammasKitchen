<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function index(){
        $messages = Contact::all();
        return view('admin.Contact.index',compact('messages'));
    }

    public function showmsg($id){
        $message = Contact::find($id);
        return view('admin.Contact.showmsg',compact('message'));
    }

    public function delete($id){
        $message = Contact::find($id);
        $message->delete();
        Toastr::success('Message Deleted Successfully!','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
