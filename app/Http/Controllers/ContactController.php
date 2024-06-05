<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|string|email',
            'content' => 'required|string',
        ]);

        $contact = new Contact();

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');

        $contact->save();

        return to_route('contact.thanks');
    }

    public function index_thanks()
    {
        return view('contact.thanks');
    }
}
