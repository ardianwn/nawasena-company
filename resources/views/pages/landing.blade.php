@extends('layouts.app')

@section('content')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faders = document.querySelectorAll('.fade-in-up');
    
    const options = { threshold: 0.1 };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    }, options);

    faders.forEach(fader => {
        observer.observe(fader);
    });
});
</script>

<!-- Hero / Banner Section -->
<section style="background-image: url('/images/image.jpeg'); background-size: cover; background-position: center center; min-height: 100vh; display: flex; align-items: center; justify-content: center; color: #E8ECD7;">
    <div class="text-center fade-in-up">
        <img class="hero-logo" src="/images/Srilogo.svg" alt="logo">
        <a href="#profile" class="btn btn-lg hero-button">{{ __('messages.hero.button') }}</a>
        <p class="mb-4 hero-slogan">{{ __('messages.hero.slogan') }}</p>
    </div>
</section>

<!-- Profile Section -->
<section id="profile" class="py-5" style="background-color: #7d7f54;">
    <div class="container fade-in-up">
        <h2 class="mb-4">{{ __('messages.profile.title') }}</h2>
        <p class="text-justify">{!! __('messages.profile.description') !!}</p>
        <div class="mt-4">
            <h5>{{ __('messages.sections.booklet') }}</h5>
            <p>{{ __('messages.profile.booklet') }} <a href="https://drive.google.com/file/d/1IQReX540yFqnh21YRRGc2UDYDU4xpE5x/view?usp=drive_link">here</a>.</p>
        </div>
    </div>
</section>

<!-- Product List Section -->
<section id="products" class="py-5" style="background-color: #d3cbc2;">
    <div class="container fade-in-up">
        <h2 class="text-start mb-4" style="color: #413528;">{{ __('messages.products.title') }}</h2>
        <div class="product-container">
            @php
                $products = [
                    ['image' => '/images/jahegajah.jpg', 'name' => 'Jahe Gajah / White Ginger', 'latin' => 'Zingiber officinale Rosc.'],
                    ['image' => '/images/jahemerah.jpg', 'name' => 'Jahe Merah / Red Ginger', 'latin' => 'Zingiber officinale var. Rubrum'],
                    ['image' => '/images/jahempu.jpg', 'name' => 'Jahe Emprit / Java Ginger', 'latin' => 'Zingiber officinale var. Amarum'],
                    ['image' => '/images/kunyit.jpg', 'name' => 'Kunyit / Turmeric', 'latin' => 'Curcuma longa'],
                    ['image' => '/images/kencur.jpg', 'name' => 'Kencur / Aromatic Ginger', 'latin' => 'Kaempferia galanga'],
                    ['image' => '/images/gulaaren.jpg', 'name' => 'Gula Aren / Palm Sugar', 'latin' => 'Arenga saccharifera'],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="product-card shadow-sm">
                    <img src="{{ $product['image'] }}" alt="Product Image">
                    <div class="card-body">
                        <h6 class="product-title">{{ $product['name'] }}</h6>
                        <p class="product-latin">{{ $product['latin'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Production Gallery Section -->
<section id="overview" class="py-5" style="background-color: #eeebe6;">
    <div class="container fade-in-up">
        <h2 class="text-start mb-4" style="color: #413528;">
        {{ __('messages.overview.title') }}
        </h2>
        <p class="text-justify mb-4" style="color: #625241;">
        {!! __('messages.sections.production_doc_text') !!}
        </p>

        <!-- Grid Gallery -->
        <div class="gallery-grid">
            <!-- Row 1 (3 Images) -->
            <div class="gallery-item"><img src="/images/produksi7.jpg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi4.jpg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi.jpg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi3.jpg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi1.jpg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi6.jpg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi5.jpeg" alt="Production Image"></div>
            <div class="gallery-item"><img src="/images/produksi2.jpg" alt="Production Image"></div>

        </div>
    </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5" style="background-color: #413528;">
        <div class="container fade-in-up">
            <h2 style="color: #fff;">{{ __('messages.contact.title') }}</h2>

            <div class="row">
                <div class="col-md-6">
                    <p>{{ __('messages.contact.description') }}</p>
                    <p><b>PT. NAWASENA BAWIKA INSAN NUSANTARA</b></p>
                    <p class="mb-1">{{ __('messages.contact.address') }}</p>
                    <p class="mb-1">{{ __('messages.contact.phone') }}</p>
                    <p>{{ __('messages.contact.email') }}</p>
                </div>
                <div class="col-md-6">
                    <h5 style="color: #fff;">{{ __('messages.sections.contact_form') }}</h5>
                    <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                {{ __('messages.contact.form.name_label') }}
                            </label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                {{ __('messages.contact.form.email_label') }}
                            </label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">
                                {{ __('messages.contact.form.message_label') }}
                            </label>
                            <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn" style="background-color: #ab9f90; color: #fff;">
                            {{ __('messages.contact.form.submit_button') }}
                        </button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
