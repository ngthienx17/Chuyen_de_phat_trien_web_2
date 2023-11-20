<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class AdminEditProductComponent extends Component
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
    public $newImage;
    public $product_id;

    public function mount($product_slug)
    {
        $product_slug = Product::where('slug', $product_slug)->first();
        $this->name = $product_slug->name;
        $this->slug = $product_slug->slug;
        $this->short_description = $product_slug->short_description;
        $this->description = $product_slug->description;
        $this->regular_price = $product_slug->regular_price;
        $this->sale_price = $product_slug->sale_price;
        $this->SKU = $product_slug->SKU;
        $this->stock_status = $product_slug->stock_status;
        $this->featured = $product_slug->featured;
        $this->quantity = $product_slug->quantity;
        $this->image = $product_slug->image;
        $this->category_id = $product_slug->category_id;
        $this->product_id = $product_slug->id;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'numeric',
            'SKU' => 'required|string|max:255',
            'stock_status' => 'required',
            'quantity' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required'
        ]);
    }


    public function updateProduct()
    {
        // Validate the form data
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'numeric',
            'SKU' => 'required|string|max:255',
            'stock_status' => 'required',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required'
        ]);
        $product = Product::find($this->product_id);
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
        if ($this->newImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Sửa sản phẩm thành công!');
        return redirect()->to('/admin/products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories])->layout('layouts.admin-base');
    }
}
