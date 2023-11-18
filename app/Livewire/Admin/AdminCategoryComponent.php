<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id){
        $categories = Category::find($id);
        $categories->delete();
        session()->flash('message', 'Xóa danh mục thành công!');
    }
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.admin-base');
    }
}
