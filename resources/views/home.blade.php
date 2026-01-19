<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGreen | sustainable Shopping</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <header class="main-header">
        <div class="logo">EcoGreen<span>.</span></div>

        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <nav class="nav-links">
            <a href="#">Home</a>
            <a href="#">Shop</a>
            <a href="#">Categories</a>
            <a href="#">Eco-Friendly</a>
            <a href="#">New Arrivals</a>
            <a href="#">Contact</a>
        </nav>

        <div class="header-icons">
            <a href="#" class="btn-portal">Cart (0)</a>
        </div>
    </header>

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

    <section class="products-section container">
        <h2 class="section-title">Featured Products</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="badge">Eco</div>
                <img src="https://via.placeholder.com/250x250?text=Bamboo+Brush" alt="Product">
                <h3>Bamboo Toothbrush</h3>
                <p class="price">$12.00</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250?text=Organic+Bag" alt="Product">
                <h3>Organic Cotton Bag</h3>
                <p class="price">$25.00</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250?text=Steel+Bottle" alt="Product">
                <h3>Eco Steel Bottle</h3>
                <p class="price">$35.00</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250?text=Recycled+Mat" alt="Product">
                <h3>Recycled Yoga Mat</h3>
                <p class="price">$45.00</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2026 EcoGreen Store. All rights reserved. | Better World, Better Future 🌱</p>
        </div>
    </footer>

    <script>
        const menu = document.querySelector('#mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        menu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>
