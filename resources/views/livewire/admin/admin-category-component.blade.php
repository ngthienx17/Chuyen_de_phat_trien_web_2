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
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="aler">{{ Session::get('message') }}</div>
                        @elseif (Session::has('error-message'))
                            <div class="alert alert-danger" role="aler">{{ Session::get('error-message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"><i
                                                    class='bx bx-edit'></i> Edit</a>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalFormDelete"
                                                wire:click="selectItem({{ $category->id }})">
                                                <i class='bx bx-trash'></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                    <!-- Modal -->
                    {{-- Delete --}}
                    <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Cảnh báo
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa danh mục ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Đóng
                                    </button>
                                    <button type="button" class="btn btn-primary" wire:click.prevent="deleteCategory"
                                        data-bs-dismiss="modal">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
