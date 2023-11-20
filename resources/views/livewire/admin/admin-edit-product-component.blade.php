<div class="card">
    <div class="container" style="padding:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title">
                                    Edit Product
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All
                                    Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Product Name"
                                        wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Product Slug"
                                        wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4">
                                    <textarea type="text" class="form-control input-md" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4">
                                    <textarea type="text" class="form-control input-md" placeholder="Description" wire:model="description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Regular Price"
                                        wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Sale Price"
                                        wire:model="sale_price">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="SKU"
                                        wire:model="SKU">
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Kho </label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">Trong Kho</option>
                                        <option value="outofstock">Ngoài Kho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Nổi Bật</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">Không</option>
                                        <option value="1">Có</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Quantity"
                                        wire:model="quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Hình Ảnh Sản Phẩm</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control input-md" wire:model="newImage" />
                                    @error('newImage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if ($newImage)
                                        <img src="{{ $newImage->temporaryUrl() }}" width="120" />
                                    @else
                                        <img src="{{ asset('assets/images/products') }}/{{ $image }}"
                                            width="120" />
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Nhóm Hàng</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">

                                        <option value="">Chọn một nhóm hàng</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
