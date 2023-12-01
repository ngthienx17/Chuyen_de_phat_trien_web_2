<?php

namespace App\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminCouponComponent extends Component
{

    public function deleteCoupon($coupon_id) {
        $coupon = Coupon::findOrFail($coupon_id);
        if (condition) {
            # code...
        } else {
            # code...
        }
        
        $coupon->delete();
        session()->flash('coupon_message','Mã giảm giá đã được xóa!');

    }
    #[Layout('layouts.admin-base')]
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.coupon.admin-coupon-component',['coupons'=>$coupons]);
    }
}
