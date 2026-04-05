<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('pages.contact');
    }

    public function send(ContactRequest $request)
    {
        $data = $request->validated();

        Mail::send([], [], function ($message) use ($data) {
            $message->to('djokicdusan03@gmail.com')
                ->subject('New message')
                ->html("
                    <h2>New message</h2>
                    <p><strong>First Name:</strong> {$data['first_name']}</p>
                    <p><strong>Last Name:</strong> {$data['last_name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$data['message']}</p>
                ");
        });

        return redirect()->route('contact');
    }
}
