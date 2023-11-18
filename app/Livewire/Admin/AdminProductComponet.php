<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponet extends Component
{
    use WithPagination;
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Xóa sản phẩm thành công!');
    }
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-componet', ['products' => $products])->layout('layouts.admin-base');
    }
}
