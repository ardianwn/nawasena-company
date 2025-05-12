<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Debug log untuk memeriksa session
        $locale = session('locale', 'en');  // Menggunakan 'en' sebagai default

        // Debugging untuk memeriksa locale dari session
        Log::info('Current locale from session: ' . $locale);

        // Mengatur locale aplikasi
        App::setLocale($locale);

        return $next($request);
    }
}
