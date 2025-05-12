<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $msg;

    public function __construct($name, $email, $msg)
    {
        $this->name  = $name;
        $this->email = $email;
        $this->msg   = $msg;
    }

    public function build()
    {
        return $this->from($this->email, $this->name) // Menggunakan email dan nama dari pengguna
                    ->subject('Pesan Baru dari ' . $this->name) // Menambahkan nama pengirim ke subjek
                    ->view('emails.contact') // Menggunakan view untuk isi email
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'message' => $this->msg,
                    ]);
    }
}
