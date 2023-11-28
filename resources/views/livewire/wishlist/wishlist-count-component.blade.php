<div class="wrap-icon-section wishlist">
    <a href="{{ route('product.wishlist') }}" class="link-direction">
        @if (Cart::instance('wishlist')->count() > 0)
        <i class="fa fa-heart" style="color: #ff2852" aria-hidden="true"></i>
        <div class="left-info">
            <span class="index">{{ Cart::instance('wishlist')->count() }} item</span>
            <span class="title">Wishlist</span>
        </div>
        @else
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            <span class="index">0 item</span>
            <span class="title">Wishlist</span>
        </div>
        @endif
    </a>
</div>