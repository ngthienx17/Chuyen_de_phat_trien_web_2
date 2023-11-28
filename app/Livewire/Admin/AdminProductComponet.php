<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponet extends Component
{
    use WithPagination;
     public $selectedItem;
    public function selectItem($itemId)
    {
        $this->selectedItem = $itemId;
        $product = Product::find($this->selectedItem);
        if ($product) {
            # code...
            $product->delete();
            session()->flash('message', 'Xóa sản phẩm thành công!');
        }else{
            session()->flash('error-message', 'Sản phẩm không tồn tại!');

        }
    }
   
    public function deleteProduct()
    {
        $product = Product::find($this->selectedItem);
        if ($product) {
            # code...
            $product->delete();
            session()->flash('message', 'Xóa sản phẩm thành công!');
        }else{
            session()->flash('error-message', 'Sản phẩm không tồn tại!');

        }
    }
    #[Layout('layouts.admin-base')]
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-componet', ['products' => $products]);
    }
}
