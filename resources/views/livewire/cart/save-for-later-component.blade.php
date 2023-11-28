<div class="wrap-iten-in-cart">

    <h3 class="title-box" style="border-bottom: 1px solid #cbcbcb; padding-bottom: 15px;"> {{
        Cart::instance('saveforlater')->count() }} sản phẩm mua sau</h3>
    @if(Session::has('s_success_message'))
    <div class="alert alert-success">
        <strong>Success</strong> {{ Session::get('s_success_message') }}
    </div>
    @endif
    @if(Cart::instance('saveforlater')->count() > 0)
    <h3 class="box-title">Products Name</h3>
    <ul class="products-cart">
        @foreach(Cart::instance('saveforlater')->content() as $item)
        <li class="pr-cart-item">
            <div class="product-image">
                <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                        alt="{{ $item->model->image }}"></figure>
            </div>
            <div class="product-name">
                <a class="link-to-product" href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{
                    $item->model->name }}</a>
            </div>
            <div class="price-field produtc-price">
                <p class="price">{{ $item->model->regular_price }}</p>
            </div>
   
            <div class="quantity">
                <a href="#" class="text-center" wire:click.prevent="moveToCart('{{ $item->rowId }}')" class="btn">Thêm vào giỏ hàng</a>
            </div>
            <div class="delete">
                <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete" title="">
                    <span>Delete from your cart</span>
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p class="text-center">Không có sản phẩm</p>
    @endif
</div>