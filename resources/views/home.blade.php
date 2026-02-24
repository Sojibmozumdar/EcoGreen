@extends('frontend.mastaring')

@section('content')
    <section class="hero-section">
        <div class="hero-image-side">
            <div class="hero-overlay"></div>
            <div class="slider-wrapper">
                <div class="slide slide-1"></div>
                <div class="slide slide-2"></div>
                <div class="slide slide-3"></div>
            </div>
        </div>

        <div class="hero-cta-side">
            <h1 class="brand-name">Eco-Friendly <br>Lifestyle</h1>
            <p class="tagline">Sustainable products for a greener planet. Shop the best of nature.</p>
            <div class="hero-actions">
                <a href="#" class="btn btn-primary">SHOP NOW</a>
                <a href="#" class="btn btn-secondary">VIEW DEALS</a>
            </div>
        </div>
    </section>

    <section class="eco-products container">
        <div class="header-content">
            <span class="sub-title">Eco-Friendly Collection</span>
            <h2 class="section-title">Discover Sustainable Living</h2>
            <div class="category-tabs">
                <button class="tab-btn active" data-filter="all">All</button>
                @foreach ($categories as $category)
                    <button class="tab-btn" data-filter="cat-{{ $category->id }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="products-mesh-grid">
            @foreach ($products as $product)
                {{-- Discount Calculation --}}
                @php
                    $discountAmount = $product->discount > 0 ? ($product->price * $product->discount) / 100 : 0;
                    $finalPrice = $product->price - $discountAmount;

                    // Image logic fix
                    $imagePath = $product->uploads->first() ? asset('storage/' . $product->uploads->first()->path) : asset('no.png');
                @endphp

                <div class="glass-card" data-category="cat-{{ $product->category_id }}">
                    <div class="product-visual">
                        {{-- Discount Badge --}}
                        @if ($product->discount > 0)
                            <div class="discount-tag" style="position: absolute; top: 10px; right: 10px; background: #e74c3c; color: #fff; padding: 2px 8px; border-radius: 4px; font-size: 12px; z-index: 10;">
                                {{ $product->discount }}% OFF
                            </div>
                        @endif

                        <img src="{{ $imagePath }}" alt="{{ $product->name }}">
                    </div>

                    <div class="card-info">
                        <h3>{{ $product->name }}</h3>

                        <div class="price-row" style="margin-bottom: 15px;">
                            @if ($product->discount > 0)
                                <span class="old-price" style="text-decoration: line-through; color: #999; font-size: 14px; margin-right: 5px;">
                                    BDT {{ number_format($product->price, 0) }}
                                </span>
                                <span class="amount" style="color: #2ecc71; font-weight: bold; font-size: 18px;">
                                    BDT {{ number_format($finalPrice, 0) }}
                                </span>
                            @else
                                <span class="amount" style="font-weight: bold; font-size: 18px;">
                                    BDT {{ number_format($product->price, 0) }}
                                </span>
                            @endif
                        </div>

                        <a href="{{ route('product.details', $product->id) }}" class="modern-buy-btn">
                            <span>Show Details</span>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        const filterButtons = document.querySelectorAll('.tab-btn');
        const productCards = document.querySelectorAll('.glass-card');

        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                productCards.forEach(card => {
                    card.style.transform = "scale(0.8)";
                    card.style.opacity = "0";

                    setTimeout(() => {
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.transform = "scale(1)";
                                card.style.opacity = "1";
                            }, 50);
                        } else {
                            card.style.display = 'none';
                        }
                    }, 300);
                });
            });
        });
    </script>
@endsection
