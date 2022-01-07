<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $inputs = request()->validate([
            'title'=>'required|max:255',
            'email'=>'required|max:255',
            'body'=>'required',
        ]);

        $contact = new Contact();
        $contact->title = $inputs['title'];
        $contact->email = $inputs['email'];
        $contact->body = $inputs['body'];
        $contact->save();

        return back()->with('message','メールを送信したのでご確認ください。');
    }
}
