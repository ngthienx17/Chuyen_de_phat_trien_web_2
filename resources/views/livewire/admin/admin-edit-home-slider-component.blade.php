<div class="card">
    <div class="container" style="padding:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title">
                                    Edit Slider
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">All
                                    Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data"
                            wire:submit.prevent = "updateSlider">
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable">
                                    Title
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Title" class="form-control input-md"
                                        wire:model = "title">
                                    @error('title')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable">
                                    Subtitle
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitle" class="form-control input-md"
                                        wire:model = "subtitle">
                                    @error('subtitle')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable">
                                    Price
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price" class="form-control input-md"
                                        wire:model = "price">
                                    @error('price')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable">
                                    Link
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Link" class="form-control input-md"
                                        wire:model = "link">
                                    @error('link')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable">
                                    Image
                                </label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model = "newImage">
                                    @error('newImage')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    @if ($newImage)
                                        <img src="{{ $newImage->temporaryUrl() }}" width="120" />
                                    @else
                                        <img src="{{ asset('assets/images/sliders') }}/{{ $image }}"
                                            width="120" />
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable">
                                    Status
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model = "status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-4 control-lable"></label>
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
