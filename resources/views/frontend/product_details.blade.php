@extends('frontend.mastaring')


@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Product Details | EcoGreen</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    </head>

    <body>

        <section class="product-details containers">



            <div class="details-wrapper">
                <div class="product-gallery">
                    <div class="main-img">
                        <img src="{{ asset('storage/' . $product->uploads->first()->path) }}" alt="{{ $product->name }}"
                            id="current-img">
                    </div>

                    <div class="thumb-list">
                        @foreach ($product->uploads as $upload)
                            <img src="{{ asset('storage/' . $upload->path) }}"
                                class="thumb {{ $loop->first ? 'active' : '' }}">
                        @endforeach
                    </div>
                </div>

                <div class="product-info">
                    <span class="category-tag">
                        {{ $product->category->name ?? 'No Category' }}
                    </span>

                    <h1 class="product-title">{{ $product->name }}</h1>
                    <div class="rating">
                        <span class="stars">★★★★☆</span>
                        <span class="reviews-count">(45 Customer Reviews)</span>
                    </div>
                    @php
                        $discountAmount = $product->discount > 0 ? ($product->price * $product->discount) / 100 : 0;

                        $finalPrice = $product->price - $discountAmount;
                    @endphp

                    <p class="price">
                        @if ($product->discount > 0)
                            <span class="old-price">BDT {{ number_format($product->price, 2) }}</span>
                            <span class="new-price">BDT {{ number_format($finalPrice, 2) }}</span>
                            <span class="discount-badge">{{ $product->discount }}% OFF</span>
                        @else
                            <span class="new-price">BDT {{ number_format($product->price, 2) }}</span>
                        @endif
                    </p>


                    <p class="description">
                        {{ $product->short_description }}
                    </p>

                    <div class="product-options">
                        <div class="option-group">
                            <label>Color:</label>
                            <div class="color-options">
                                <span class="color-dot green active"></span>
                                <span class="color-dot dark"></span>
                                <span class="color-dot silver"></span>
                            </div>
                        </div>
                        <div class="stock-status">
                            @if ($product->quantity > 0)
                                <span class="in-stock">✔ In Stock ({{ $product->quantity }} available)</span>
                            @else
                                <span class="out-stock">✖ Out of Stock</span>
                            @endif
                        </div>


                        <div class="option-group">
                            <label>Quantity:</label>
                            <div class="qty-selector">
                                <button class="qty-btn" onclick="updateQty(-1)">-</button>
                                <input type="number" value="1" id="qty-input" readonly>
                                <button class="qty-btn" onclick="updateQty(1)">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="action-btns">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" id="cart-qty" value="1">

                            <button type="submit" class="btn-add-cart" {{ $product->quantity < 1 ? 'disabled' : '' }}>
                                ADD TO CART
                            </button>
                        </form>
                        <form action="{{ route('buy.now') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" id="buy-qty" value="1">

                            <button type="submit" class="btn-buy-now" {{ $product->quantity < 1 ? 'disabled' : '' }}>
                                BUY IT NOW
                            </button>
                        </form>
                    </div>

                    <div class="extra-info">
                        <p>🚚 <strong>Delivery:</strong> {{ $product->delivery_policy }}</p>
                        <p>🚚 <strong>Return Policy:</strong> {{ $product->return_policy }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="tabs-section containers">
            <div class="tabs-header">
                <button class="tab-link active" data-tab="description">Description</button>
                <button class="tab-link" data-tab="specifications">Specifications</button>
                <button class="tab-link" data-tab="reviews">Reviews</button>
            </div>

            <div class="tabs-body">

                <!-- Description -->
                <div class="tab-content active" id="description">
                    {!! $product->description !!}
                </div>

                <!-- Specifications -->
                <div class="tab-content" id="specifications">
                    {!! $product->product_details !!}
                </div>

                <!-- Reviews -->
                <div class="tab-content" id="reviews">
                    <p>No reviews yet.</p>
                </div>

            </div>
        </section>

        <script>
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', () => {
                    // Remove active
                    tabLinks.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active
                    link.classList.add('active');
                    document.getElementById(link.dataset.tab).classList.add('active');
                });
            });
        </script>
        <script>
            function updateQty(change) {
                let input = document.getElementById('qty-input');
                let val = parseInt(input.value) + change;
                if (val < 1) val = 1;
                input.value = val;
            }

            // Simple thumbnail switcher
            const thumbs = document.querySelectorAll('.thumb');
            const mainImg = document.getElementById('current-img');

            thumbs.forEach(thumb => {
                thumb.addEventListener('click', () => {
                    mainImg.src = thumb.src;
                    thumbs.forEach(t => t.classList.remove('active'));
                    thumb.classList.add('active');
                });
            });
        </script>
        <script>
            function updateQty(change) {
                let input = document.getElementById('qty-input');
                let val = parseInt(input.value) + change;

                if (val < 1) val = 1;

                input.value = val;

                // Update hidden form quantity
                document.getElementById('cart-qty').value = val;
                document.getElementById('buy-qty').value = val;
            }
        </script>


    </body>

    </html>
@endsection
