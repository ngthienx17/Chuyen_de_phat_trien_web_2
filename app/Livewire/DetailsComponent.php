<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;

class DetailsComponent extends Component
{

    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function increaseQunatity()
    {
        $this->qty++;
    }
    public function decreaseQunatity()
    {
        if ($this->qty > 1) {

            $this->qty--;
        }
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->dispatch('refreshComponent')->to('wishlist-count-component');
    }

    public function removeFromWishlist($productId)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $productId) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatch('refreshComponent')->to('wishlist-count-component');
                return;
            }
        }
    }

    #[Layout('layouts.base')]
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(7)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component', ['product' => $product, 'popular_products' => $popular_products, 'related_products' => $related_products, 'sale' => $sale]);
    }
}
