<div class="card">
    <div class="container" style="padding:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title">
                                    All Slider
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addhomeslider') }}"
                                    class="btn btn-success pull-right">Add New Slider</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}</div>
                        @elseif(Session::has('error-message'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error-message') }}</div>
                        @endif
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Price</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td><img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}"
                                                    alt="" width="120"></td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle }}</td>
                                            <td>{{ $slider->price }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('admin.edithomeslider', ['slider_id' => $slider->id]) }}"><i
                                                        class='bx bx-edit'></i> Edit</a>
                                                <button class="btn btn-sm btn-danger"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa?"
                                                    wire:click.prevent="selectItem({{ $slider->id }})">
                                                    <i class='bx bx-trash'></i>
                                                    Delete
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
