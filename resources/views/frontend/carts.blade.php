@extends('frontend.mastaring')

@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Premium Shopping Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
            rel="stylesheet">

        <style>
            :root {
                --primary-green: #1a5d42;
                --accent-green: #52b788;
                --soft-bg: #f8faf9;
                --white: #ffffff;
                --text-dark: #062c21;
                --card-shadow: 0 10px 30px rgba(26, 93, 66, 0.08);
                --radius: 18px;
            }

            body {
                background: var(--soft-bg);
                font-family: 'Plus Jakarta Sans', sans-serif;
                color: var(--text-dark);
            }

            .cart-wrapper {
                padding: 40px 0;
            }

            .cart-header-section {
                background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
                border-radius: var(--radius);
                padding: 40px;
                color: white;
                margin-bottom: 40px;
                box-shadow: 0 15px 35px rgba(26, 93, 66, 0.2);
            }

            .cart-item-card {
                background: var(--white);
                border-radius: var(--radius);
                box-shadow: var(--card-shadow);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, 0.02);
            }

            .product-img-wrapper {
                background: #f1f1f1;
                border-radius: 12px;
                padding: 5px;
            }

            .product-img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border-radius: 10px;
            }

            .qty-container {
                background: #f0f3f2;
                padding: 5px;
                border-radius: 12px;
                display: inline-flex;
                align-items: center;
            }

            .btn-qty {
                width: 32px;
                height: 32px;
                border-radius: 10px !important;
                border: none;
                background: white;
                color: var(--primary-green);
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }

            .btn-qty:hover {
                background: var(--primary-green);
                color: white;
            }

            .qty-input {
                background: transparent;
                border: none;
                width: 45px;
                font-weight: 700;
                text-align: center;
            }

            .summary-card {
                background: var(--white);
                border-radius: var(--radius);
                box-shadow: var(--card-shadow);
                position: sticky;
                top: 20px;
            }

            .checkout-btn {
                background: linear-gradient(to right, var(--primary-green), var(--accent-green));
                border: none;
                padding: 15px;
                border-radius: 12px;
                font-weight: 700;
                color: white;
                transition: 0.3s;
            }

            .checkout-btn:hover {
                box-shadow: 0 10px 20px rgba(26, 93, 66, 0.3);
                transform: scale(1.02);
                color: white;
            }

            .remove-link {
                color: #ff4d4d;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
            }

            .price-tag {
                font-size: 1.1rem;
                font-weight: 700;
                color: var(--primary-green);
            }

            .discount-badge {
                position: absolute;
                top: 15px;
                left: 15px;
                background: #ff4d4d;
                color: white;
                padding: 4px 10px;
                border-radius: 8px;
                font-size: 12px;
                font-weight: 700;
                z-index: 10;
            }
        </style>
    </head>

    <body>

        <div class="container cart-wrapper">
            <div class="cart-header-section text-center">
                <h2 class="fw-bold mb-1">Your Premium Cart</h2>
                <p class="opacity-75 mb-0">Check out with confidence and style</p>
            </div>

            @if ($cart_products->count() > 0)
                <form id="checkout-form" method="POST" action="{{ route('checkout') }}">
                    @csrf
                    <div class="row g-4">
                        <div class="col-lg-8">
                            @foreach ($cart_products as $cart)
                                @if ($cart->product)
                                    @php
                                        // Discount calculation
                                        $discountAmount =
                                            $cart->product->discount > 0
                                                ? ($cart->product->price * $cart->product->discount) / 100
                                                : 0;
                                        $finalPrice = $cart->product->price - $discountAmount;
                                        $subtotal = $finalPrice * $cart->quantity;
                                        $hasDiscount = $cart->product->discount > 0;
                                        $savings = $discountAmount * $cart->quantity;
                                    @endphp

                                    <div class="cart-item-card mb-4 p-3 p-md-4">
                                        @if ($hasDiscount)
                                            <div class="discount-badge">{{ $cart->product->discount }}% OFF</div>
                                        @endif

                                        <div class="row align-items-center">
                                            <!-- Select -->
                                            <div class="col-1">
                                                <input type="checkbox" name="selected_cart[]" value="{{ $cart->id }}"
                                                    class="form-check-input select-cart shadow-none"
                                                    data-price="{{ $subtotal }}" data-savings="{{ $savings }}"
                                                    onchange="calculateSelectedTotal()">
                                            </div>

                                            <!-- Image -->
                                            <div class="col-4 col-md-2 text-center">
                                                <div class="product-img-wrapper">
                                                    @if ($cart->product->uploads && $cart->product->uploads->count() > 0)
                                                        <img src="{{ asset('storage/' . $cart->product->uploads->first()->path) }}"
                                                            class="product-img" alt="{{ $cart->product->name }}">
                                                    @else
                                                        <img src="{{ asset('default-product.png') }}" class="product-img"
                                                            alt="{{ $cart->product->name }}">
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Name & Price -->
                                            <div class="col-7 col-md-4">
                                                <h5 class="fw-bold mb-1">{{ $cart->product->name }}</h5>

                                                <div class="mb-3">
                                                    @if ($hasDiscount)
                                                        <span class="text-muted text-decoration-line-through small me-2">BDT
                                                            {{ number_format($cart->product->price, 2) }}</span>
                                                        <span class="fw-bold text-success">BDT
                                                            {{ number_format($finalPrice, 2) }}</span>
                                                    @else
                                                        <span class="fw-bold text-dark">BDT
                                                            {{ number_format($cart->product->price, 2) }}</span>
                                                    @endif
                                                </div>

                                                <!-- Quantity -->
                                                <div class="qty-container">
                                                    <button type="button" class="btn-qty"
                                                        onclick="updateQty({{ $cart->id }}, -1)"><i
                                                            class="bi bi-dash"></i></button>
                                                    <input type="text" id="qty-{{ $cart->id }}"
                                                        value="{{ $cart->quantity }}" class="qty-input" readonly>
                                                    <button type="button" class="btn-qty"
                                                        onclick="updateQty({{ $cart->id }}, 1)"><i
                                                            class="bi bi-plus"></i></button>
                                                </div>
                                            </div>

                                            <!-- Subtotal & Savings -->
                                            <div class="col-6 col-md-3 mt-3 mt-md-0 text-md-end">
                                                <span class="text-muted small d-block">Subtotal</span>
                                                <span class="price-tag">BDT {{ number_format($subtotal, 2) }}</span>
                                                @if ($hasDiscount)
                                                    <small class="d-block text-danger" style="font-size: 11px;">Saved BDT
                                                        {{ number_format($savings, 2) }}</small>
                                                @endif
                                            </div>

                                            <!-- Remove -->
                                            <div class="col-6 col-md-2 mt-3 mt-md-0 text-end">
                                                <span class="remove-link" onclick="removeCart({{ $cart->id }})"><i
                                                        class="bi bi-trash3 me-1"></i>Remove</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Summary -->
                        <div class="col-lg-4">
                            <div class="summary-card p-4">
                                <h5 class="fw-bold mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="text-muted">Items Selected</span>
                                    <span id="selected-items" class="fw-bold">0</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3 text-danger small">
                                    <span>Total Savings</span>
                                    <span class="fw-bold">BDT <span id="total-savings">0.00</span></span>
                                </div>
                                <div class="d-flex justify-content-between mb-4 border-top pt-3">
                                    <span class="fw-bold">Payable Amount</span>
                                    <h4 class="fw-bold text-success mb-0">BDT <span id="selected-total">0.00</span></h4>
                                </div>
                                <button type="submit" class="btn checkout-btn w-100 mb-3">Proceed to Checkout <i
                                        class="bi bi-arrow-right ms-2"></i></button>
                                <a href="/" class="btn btn-link w-100 text-decoration-none text-muted small"><i
                                        class="bi bi-chevron-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-bag-heart mb-3 d-block opacity-25" style="font-size: 60px;"></i>
                    <h3 class="fw-bold">Your cart is empty</h3>
                    <a href="/" class="btn checkout-btn px-5 mt-3">Shop Now</a>
                </div>
            @endif
        </div>

        <script>
            function calculateSelectedTotal() {
                let checkboxes = document.querySelectorAll('.select-cart');
                let total = 0;
                let savings = 0;
                let count = 0;

                checkboxes.forEach(cb => {
                    if (cb.checked) {
                        total += parseFloat(cb.dataset.price);
                        savings += parseFloat(cb.dataset.savings);
                        count++;
                    }
                });

                document.getElementById('selected-total').innerText = total.toLocaleString(undefined, {
                    minimumFractionDigits: 2
                });
                document.getElementById('total-savings').innerText = savings.toLocaleString(undefined, {
                    minimumFractionDigits: 2
                });
                document.getElementById('selected-items').innerText = count;
            }

            function updateQty(id, change) {
                let qtyInput = document.getElementById('qty-' + id);
                let qty = parseInt(qtyInput.value) + change;
                if (qty < 1) return;
                fetch("{{ route('cart.update.ajax') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id: id,
                        quantity: qty
                    })
                }).then(() => location.reload());
            }

            function removeCart(id) {
                if (!confirm("Remove this item?")) return;
                fetch("{{ route('cart.delete.ajax') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id: id
                    })
                }).then(() => location.reload());
            }
        </script>

    </body>

    </html>
@endsection
