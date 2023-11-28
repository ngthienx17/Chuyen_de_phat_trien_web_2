<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CheckoutComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.checkout-component');
    }
}
