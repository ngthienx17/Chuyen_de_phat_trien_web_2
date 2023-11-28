<?php

namespace App\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SaveForLaterComponent extends Component
{
    protected $listeners = ['refreshComponent' =>'$refresh'];
    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->dispatch('refreshComponent')->to('cart.cart-count-component');
        $this->dispatch('refreshComponent')->to('cart.cart-component');
        session()->flash('s_success_message', 'Sản phẩm được chuyển sang giỏ hàng');
    }
    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveforlater')->remove($rowId);
        $this->dispatch('refreshComponent')->to('cart.save-for-later-component');
        session()->flash('s_success_message', 'Sản phẩm mua sau đã được xóa');
    }
    public function render()
    {
        return view('livewire.cart.save-for-later-component');
    }
}
