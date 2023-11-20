<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponet extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;


    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function updated($fields) {  
        $this->validateOnly($fields,[
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'numeric',
            'SKU' => 'required|string|max:255|unique:products',
            'stock_status' => 'required',
            'quantity' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id'=>'required'
        ]);
        
    }
    public function addProduct()
    {
        // Validate the form data
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'numeric',
            'SKU' => 'required|string|max:255|unique:products',
            'stock_status' => 'required',
            'quantity' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id'=>'required'
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Thêm sản phẩm thành công!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-componet', ['categories' => $categories])->layout('layouts.admin-base');
    }
}
