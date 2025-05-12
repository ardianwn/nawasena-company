<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ContactController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/lang/{locale}', function ($locale) {
    // Mengecek apakah locale valid
    if (in_array($locale, ['en', 'jp'])) {
        session(['locale' => $locale]);  // Menyimpan locale ke session
    }
    
    // Debug: Pastikan locale tersimpan di session
    Log::info('Locale after session put: ' . session('locale'));

    return redirect()->back();  // Kembali ke halaman sebelumnya
})->name('switch.lang');
