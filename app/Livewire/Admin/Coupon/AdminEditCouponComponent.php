<?php

namespace App\Livewire\Admin\Coupon;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    #[Layout('layouts.admin-base')]
    public function render()
    {
        return view('livewire.admin.coupon.admin-edit-coupon-component');
    }
}
