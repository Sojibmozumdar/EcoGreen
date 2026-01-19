<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Steel Bottle - Product Details | EcoGreen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="main-header">
        <div class="logo">EcoGreen<span>.</span></div>
        <nav class="nav-links">
            <a href="index.html">Home</a>
            <a href="#">Shop</a>
            <a href="#">Categories</a>
            <a href="#">Contact</a>
        </nav>
        <div class="header-icons">
            <a href="#" class="btn-portal">Cart (1)</a>
        </div>
    </header>

    <section class="product-details container">
        <div class="details-wrapper">

            <div class="product-gallery">
                <div class="main-img">
                    <img src="https://images.unsplash.com/photo-1602143303493-914c79b65ee2?auto=format&fit=crop&w=600&q=80" alt="Eco Steel Bottle" id="current-img">
                </div>
                <div class="thumb-list">
                    <img src="https://images.unsplash.com/photo-1602143303493-914c79b65ee2?auto=format&fit=crop&w=150&q=80" class="thumb active">
                    <img src="https://images.unsplash.com/photo-1544003484-3ce18359b040?auto=format&fit=crop&w=150&q=80" class="thumb">
                    <img src="https://images.unsplash.com/photo-1523362628744-4cddf541aa44?auto=format&fit=crop&w=150&q=80" class="thumb">
                </div>
            </div>

            <div class="product-info">
                <span class="category-tag">Sustainable Home</span>
                <h1 class="product-title">Premium Eco Steel Bottle</h1>
                <div class="rating">
                    <span class="stars">★★★★☆</span>
                    <span class="reviews-count">(45 Customer Reviews)</span>
                </div>
                <p class="price">$35.00</p>

                <p class="description">
                    Stay hydrated and reduce plastic waste with our double-walled vacuum insulated steel bottle. It keeps drinks cold for 24 hours or hot for 12 hours. Made from 100% food-grade stainless steel.
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
                    <button class="btn-add-cart">ADD TO CART</button>
                    <button class="btn-buy-now">BUY IT NOW</button>
                </div>

                <div class="extra-info">
                    <p>🌱 <strong>Sustainability:</strong> 100% Recyclable</p>
                    <p>🚚 <strong>Delivery:</strong> Free shipping on orders over $50</p>
                </div>
            </div>
        </div>
    </section>

    <section class="tabs-section container">
        <div class="tabs-header">
            <button class="tab-link active">Description</button>
            <button class="tab-link">Specifications</button>
            <button class="tab-link">Reviews</button>
        </div>
        <div class="tab-content">
            <p>This Eco Steel Bottle is more than just a container; it's a statement. Designed for durability and aesthetics, it fits perfectly in your car holder or gym bag. The powder-coated finish ensures a sweat-free grip.</p>
        </div>
    </section>

    <footer class="main-footer">
        <p>&copy; 2026 EcoGreen Store. All rights reserved.</p>
    </footer>

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
</body>
</html>
