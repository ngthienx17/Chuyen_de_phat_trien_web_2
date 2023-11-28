<?php

namespace App\Livewire\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;
use Livewire\Component;

class WishlistComponent extends Component
{

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
    public function moveProductFormWishlistToCart($rowId)
    {
       
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->dispatch('refreshComponent')->to('wishlist-count-component');
        $this->dispatch('refreshComponent')->to('cart-count-component');
    }

    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.wishlist.wishlist-component');
    }
}
