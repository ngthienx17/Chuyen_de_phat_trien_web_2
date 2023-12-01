<?php

namespace App\Livewire\Cart;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $discount;
    public $couponCode;
    public $subTotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    
    protected $listeners = ['refreshComponent' => '$refresh'];

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
    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if (!$coupon) {
            session()->flash('count_message', 'Mã giảm giá không hợp lệ');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }
    public function caculateDiscounts() {
        if(session()->has('coupon')){
            if (session()->get('coupon')['type']=='fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
            }
            $this->subTotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;            
            $this->taxAfterDiscount = ($this->subTotalAfterDiscount *config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subTotalAfterDiscount + $this->taxAfterDiscount;

        }
    }
    #[Layout('layouts.base')]
    public function render()
    {
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal()<session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            }else{
                $this->caculateDiscounts();
            }
        }
        return view('livewire.cart.cart-component');
    }
}
