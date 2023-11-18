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
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Thêm nhóm hàng mới thành công!');
    }
    public function render()
    {

        return view('livewire.admin.admin-add-category-component')->layout('layouts.admin-base');
    }
}
