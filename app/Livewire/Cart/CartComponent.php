<?php

namespace App\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;
use Livewire\Component;


class CartComponent extends Component
{
    protected $listeners = ['refreshComponent' =>'$refresh'];
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->dispatch('refreshComponent')->to('cart.cart-count-component');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->dispatch('refreshComponent')->to('cart.cart-count-component');
    }
    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveforlater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->dispatch('refreshComponent')->to('cart.save-for-later-component');
        $this->dispatch('refreshComponent')->to('cart.cart-count-component');
        session()->flash('success_message', 'Sản phẩm được chuyển sang mua sau');
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refreshComponent')->to('cart.cart-count-component');

        session()->flash('success_message', 'Sản phẩm đã được xóa');
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->dispatch('refreshComponent')->to('cart.cart-count-component');

        session()->flash('success_message', 'Giỏ hàng đã được xóa');
    }
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.cart.cart-component');
    }
}
