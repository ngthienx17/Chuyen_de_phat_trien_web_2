<div class="card">
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
            text-align: center
        }

        .flex.justify-between.flex-1 {
            display: none !important;
        }
    </style>
    <div class="container" style="padding:30px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title">All Products</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="aler">{{ Session::get('message') }}</div>
                        @else
                            <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td> <img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                alt="" width="60"> </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock_status }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" wire:click.prevent="deleteProduct({{ $product->id }})"
                                                wire:confirm="Bạn có chắc chắn?\n\nXóa dữ liệu: {{ $product->name }}"
                                                style="margin-left:10px;"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
