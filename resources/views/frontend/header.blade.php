<header class="main-header">
    <div class="logo">EcoGreen<span>.</span></div>

    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>

    <nav class="nav-links">
        <a href="/">Home</a>
        <a href="#">Shop</a>

        <!-- Categories Dropdown -->
        <!-- Categories Dropdown -->
        <div class="dropdown">
            <a href="#" class="drop-btn">Categories ▾</a>

            <div class="dropdown-menu">
                @foreach ($categories as $category)
                    <div class="dropdown-item">
                        <a href="{{ route('shop.category', $category->id) }}">
                            {{ $category->name }}
                        </a>

                        @if ($category->subCategories->count())
                            <div class="sub-dropdown">
                                @foreach ($category->subCategories as $sub)
                                    <a href="{{ route('shop.subcategory', $sub->id) }}">
                                        {{ $sub->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <a href="#">Eco-Friendly</a>
        <a href="#">New Arrivals</a>
        <a href="#">Contact</a>
    </nav>

    <div class="header-icons">
        <a href="#" class="btn-portal">Cart (0)</a>
    </div>
</header>
