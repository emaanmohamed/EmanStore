<header>
    <div class="top-nav container">
        <div class="logo"><a href="{{ route('shop.index') }}">Eman Store</a></div>

            <ul>
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                <li><a href="{{ route('cart.index') }}">Cart
                        <span class="cart-count"><span>{{ (session('cart') != null ) ?  count(session('cart')) : 0 }}</span></span>
                    </a></li>
            </ul>

    </div> <!-- end top-nav -->
</header>
