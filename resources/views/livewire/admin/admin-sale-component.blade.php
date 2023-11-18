@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"
        integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">

    <style>
        body {
            background-color: #f5f5f9
        }

        .btn-primary {
            color: #fff;
            background-color: #696cff;
            border-color: #696cff;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
        }
    </style>
@endpush

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3>Sale Setting </h3>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form class="form-horizontal" wire:submit.prevent="updateSale">
                    <div class="mb-3 row">
                        <label class="col-md-4">
                            Status
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" wire:model="status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4">
                            Sale Date
                        </label>
                        <div class="col-md-4">
                            <input type="text" placeholder="YYYY/MM/DD H:M:S" id="saleDate"
                                class="form-control input-md" wire:model="sale_date">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#saleDate').datetimepicker({
                    format: 'Y-MM-DD h:m:s',
                })
                .on('dp.change', function(ev) {
                    var data = $('#saleDate').val();
                    @this.set('sale_date', data);
                });
        });
    </script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js"
        integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
