<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Data dapat diambil dari database atau service lain.
        // Kirimkan ke view "landing"
        return view('pages.landing');
    }
}
