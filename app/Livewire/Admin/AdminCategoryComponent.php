<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;


class AdminCategoryComponent extends Component
{
    use WithPagination;

    public $selectedItem;
    public function selectItem($itemId)
    {
        $this->selectedItem = $itemId;
        $categories = Category::find($this->selectedItem);
        if ($categories) {
            $categories->delete();
            session()->flash('message', 'Xóa danh mục thành công!');
        } else {
            session()->flash('error-message', 'Xóa danh mục thất bại');
        }
        
    }
    // public function deleteCategory()
    // {
    //     $categories = Category::find($this->selectedItem);
    //     if ($categories) {
    //         $categories->delete();
    //         session()->flash('message', 'Xóa danh mục thành công!');
    //     } else {
    //         session()->flash('error-message', 'Xóa danh mục thất bại');
    //     }
    // }
    #[Layout('layouts.admin-base')]

    public function render()
    {
        $categories = Category::orderBy('name','DESC')->paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories]);
    }
}
