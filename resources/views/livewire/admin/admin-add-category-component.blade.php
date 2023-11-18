<div class="card">
    <div class="container " style="padding:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All
                                    Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Category Name"
                                        wire:model="name" wire:keyup="generateslug">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Category Slug"
                                        wire:model="slug">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary  pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
