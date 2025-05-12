<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NAWASENA SPICES</title>
    <link rel="icon" href="{{ asset('images/Srilogo.svg') }}" type="image/svg+xml">
    <!-- Contoh penggunaan Bootstrap 5 (opsional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lobster&family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Kustom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid my-2">
        <a class="navbar-brand ms-lg-5 ms-md-3" href="{{ route('landing') }}" style="color: #fff;">
            <b>NAWASENA SPICES</b>
        </a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
            <span class="navbar-toggler-icon" style="color: #fff;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Profile Company -->
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#profile" style="color: #fff;">
                        {!! __('messages.navbar.profile') !!}
                    </a>
                </li>

                <!-- List Produk -->
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#products" style="color: #fff;">
                        {!! __('messages.navbar.products') !!}
                    </a>
                </li>

                <!-- Overview produksi -->
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#overview" style="color: #fff;">
                        {!! __('messages.navbar.overview') !!}
                    </a>
                </li>

                <!-- Contact -->
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#contact" style="color: #fff;">
                        {!! __('messages.navbar.contact') !!}
                    </a>
                </li>

                <!-- Language Switcher -->
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" href="#" role="button" data-bs-toggle="dropdown" style="color: #fff;" aria-expanded="false">
                        <img src="https://flagcdn.com/w20/{{ app()->getLocale() == 'en' ? 'us' : 'jp' }}.png" width="20" height="15" class="me-2">
                        {{ app()->getLocale() == 'en' ? 'EN' : 'JP' }}
                    </a>
                    <ul class="dropdown-menu text-center">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('switch.lang', 'en') }}">
                                <img src="https://flagcdn.com/w20/us.png" width="20" height="15" class="me-2">
                                EN - English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('switch.lang', 'jp') }}">
                                <img src="https://flagcdn.com/w20/jp.png" width="20" height="15" class="me-2">
                                JP - 日本語
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center p-4" style="background-color: #ab9f90; color: #fff;">
        <p>{{ __('messages.footer.copyright') }} &copy;  PT. Nawasena Bawika Insan Nusantara {{ date('Y') }}</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
