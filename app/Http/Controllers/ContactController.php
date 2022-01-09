<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

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

        // Mail::to(config('mail.admin'))->send(new ContactForm($contact));
        // Mail::to($contact['email'])->send(new ContactForm($contact));

        return back()->with('message','メールを送信しました。');
    }
}
