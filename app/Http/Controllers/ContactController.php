<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        $contactMessage = ContactMessage::create($validated);

        // Kirim email notification
        try {
            Mail::to('natasupport@nataultimaenggal.com')->send(new ContactMessageNotification($contactMessage));
        } catch (\Exception $e) {
            // Log error tapi tetap return success ke user
            \Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        // Redirect ke home dengan hash #contact
        return redirect('/#contact')->with('success', 'Pesan Anda berhasil terkirim! Kami akan segera merespons.');
    }
}