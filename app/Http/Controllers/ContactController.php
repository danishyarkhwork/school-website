<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $to = Setting::get('contact_recipient_email', config('mail.from.address'));

        Mail::send('emails.contact', ['data' => $validated], function ($m) use ($validated, $to) {
            $m->to($to)
                ->replyTo($validated['email'], $validated['first_name'] . ' ' . $validated['last_name'])
                ->subject('Contact Form: ' . ($validated['subject'] ?: 'New Message'));
        });

        return back()->with('success', 'Your message has been sent. Thank you!');
    }
}
