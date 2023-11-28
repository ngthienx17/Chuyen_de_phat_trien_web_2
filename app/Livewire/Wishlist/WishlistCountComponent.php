<?php

namespace App\Livewire\Wishlist;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $listeners = ['refreshComponent' =>'$refresh'];


    public function render()
    {
        return view('livewire.wishlist.wishlist-count-component');
    }
}
