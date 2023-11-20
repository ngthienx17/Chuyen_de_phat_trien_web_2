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
                                    class="btn btn-success pull-right">Add New
                                    Slider</a>
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
                        <table class="table table-striped">
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
                            <tbody>
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
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalFormDelete"
                                                wire:click="selectItem({{ $slider->id }})">
                                                <i class='bx bx-trash'></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <!-- {{-- Delete --}} -->
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
                                        Bạn có chắc chắn muốn xóa slider
                                        @if ($slider = $sliders->firstWhere('id', $selectedItem))
                                            {{ $slider->title }}
                                        @else
                                        Không tìm thấy.
                                        @endif

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Đóng
                                        </button>
                                        <button type="button" class="btn btn-primary" wire:click.prevent="deleteSlider"
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
