<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:1|max:1000'
        ]);

        $contact=new Contact();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->message=$request->input('message');
        $contact->save();

        if($contact->save()){
            return back()->with('success','Sent successfully');
        }else{
            return back()->withErrors('error','Failed to send');
        }

    }
   
}
