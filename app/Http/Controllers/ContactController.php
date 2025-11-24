<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // <-- IMPOR MODELNYA

class ContactController extends Controller
{
    // ... method show() ...

    public function store(Request $request)
    {
        // 1. Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'required|string|min:10',
        ]);

        // 2. Simpan data ke database
        ContactMessage::create($validated);

        // 3. Kirim email (akan kita bahas di bawah)
        // ...

        // 4. Redirect kembali dengan pesan sukses
        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}