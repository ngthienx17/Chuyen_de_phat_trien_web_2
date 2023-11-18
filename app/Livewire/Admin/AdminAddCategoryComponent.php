<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function storeCategory()
    {
        // Thực hiện validation
        $this->validate([
            'name' => 'required|string|max:255|unique:categories', // Đảm bảo 'name' là một chuỗi không trùng lặp trong bảng 'categories'
            'slug' => 'required|string|max:255|unique:categories',
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Thêm nhóm hàng mới thành công!');
        return redirect()->to('/admin/categories');
    }
    public function render()
    {

        return view('livewire.admin.admin-add-category-component')->layout('layouts.admin-base');
    }
}
