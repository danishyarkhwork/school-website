<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        $contactRecipient = Setting::get('contact_recipient_email');
        return view('admin.settings.edit', compact('contactRecipient'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contact_recipient_email' => ['required', 'email']
        ]);

        Setting::set('contact_recipient_email', $validated['contact_recipient_email']);

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated.');
    }
}
