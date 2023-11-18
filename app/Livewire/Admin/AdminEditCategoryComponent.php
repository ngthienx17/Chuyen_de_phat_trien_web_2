<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public  $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public function mount($category_slug)
    {
        $this->$category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updateCategory()
    {
        // Thực hiện validation
        $this->validate([
            'name' => 'required|string|max:255|unique:categories', // Đảm bảo 'name' là một chuỗi không trùng lặp trong bảng 'categories'
            'slug' => 'required|string|max:255|unique:categories',
        ]);
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Cập nhật danh mục thành công!');
        return redirect()->to('/admin/categories');

        
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.admin-base');
    }
}
