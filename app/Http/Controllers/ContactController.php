<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;   // Jika kita pakai Mailable
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Request Method:', ['method' => $request->method()]);
        Log::info('Request Data:', $request->all());
        // Validasi data form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Kirim email
        // (1) Menggunakan Mailable (opsional, tapi rapi)
        Mail::to('rempah.nawasena@gmail.com')->send(new ContactMail(
            $request->input('name'),
            $request->input('email'),
            $request->input('message')
        ));

        // (2) Atau langsung (tanpa Mailable), contoh singkat:
        /*
        Mail::raw("Name: {$request->name}\nEmail: {$request->email}\nMessage: {$request->message}", function($msg) {
            $msg->to('admin@yourdomain.com')
                ->subject('New Contact Message');
        });
        */

        // Setelah sukses mengirim, redirect dengan pesan
        return redirect()->back()->with('success', 'Thank you! Your message has been sent.');
    }
}
