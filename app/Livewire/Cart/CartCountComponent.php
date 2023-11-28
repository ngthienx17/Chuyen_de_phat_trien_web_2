<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' =>'$refresh'];

    public function render()
    {
        return view('livewire.cart.cart-count-component');
    }
}
