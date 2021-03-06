@extends('layouts.app')

@section('content')
    <div class="aiz-main-content">
        <div class="px-15px px-lg-25px">
            <div class="aiz-titlebar text-left mt-2 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">All Sellers</h1>
                    </div>
                </div>
            </div>

            <div class="card">
                <form class="" id="sort_sellers" action="" method="GET">
                    <div class="card-header row gutters-5">
                        <div class="col">
                            <h5 class="mb-md-0 h6">All Sellers</h5>
                        </div>

                        {{--                        <div class="dropdown mb-2 mb-md-0">--}}
                        {{--                            <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">--}}
                        {{--                                Bulk Action--}}
                        {{--                            </button>--}}
                        {{--                            <div class="dropdown-menu dropdown-menu-right">--}}
                        {{--                                <a class="dropdown-item" href="#" onclick="bulk_delete()">Delete selection</a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="col-md-3 ml-auto">
                            <select class="form-control aiz-selectpicker" name="approved_status" id="approved_status"
                                    onchange="sort_sellers()">
                                <option value="">Filter by Approval</option>
                                <option value="1">Approved</option>
                                <option value="0">Non-Approved</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Type name or email & Enter">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table aiz-table mb-0">
                            <thead>
                            <tr>
                                <!--<th data-breakpoints="lg">#</th>-->
                                <th data-breakpoints="lg">#</th>
                                <th>Name</th>
                                {{--                                <th data-breakpoints="lg">Phone</th>--}}
                                <th data-breakpoints="lg">Email Address</th>
                                <th data-breakpoints="lg">Verification Info</th>
                                <th data-breakpoints="lg">Status</th>
                                <th data-breakpoints="lg">Num. of Products</th>
                                <th data-breakpoints="lg">Due to seller</th>
                                <th width="10%">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sellers as $key => $seller)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> {{$seller->user->name}}</td>
                                    {{--                                    <td>{{$seller->user->phone}}</td>--}}
                                    <td>{{$seller->user->email}}</td>
                                    <td>
                                        {{--                                            @if ($seller->verification_info != null)--}}
                                        <a href="#">
                                            <span
                                                class="badge badge-inline badge-{{ $seller->verification_status ? 'info' : 'danger' }}">{{ $seller->verification_status ? 'Verified' : 'Not verified' }}</span>
                                        </a>

                                    </td>
                                    <td>
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_status(this)" value="{{ $seller->id }}"
                                                   type="checkbox" <?php if ($seller->user->banned == 1) echo "checked";?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>10</td>
                                    <td>
                                        Due to Admin
                                    </td>
                                    <td>

                                        <a href="{{ route('seller_profile', $seller->id) }}" class="btn btn-soft-info btn-icon btn-circle btn-sm"
                                           title="Ban this Customer">
                                            <i class="las la-user"></i>
                                        </a>
                                        {{--                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/admin/customers/destroy/5" title="Delete">--}}
                                        {{--                                            <i class="las la-trash"></i>--}}
                                        {{--                                        </a>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="aiz-pagination">
                            {{ $sellers->appends(request()->input())->links() }}
                        </div>
                    </div>
                    </from>
            </div>

        @endsection

        @section('modal')
            <!-- Delete Modal -->
            {{--	@include('modals.delete_modal')--}}

            <!-- Seller Profile Modal -->
                <div class="modal fade" id="profile_modal">
                    <div class="modal-dialog">
                        <div class="modal-content" id="profile-modal-content">

                        </div>
                    </div>
                </div>

                <!-- Seller Payment Modal -->
                <div class="modal fade" id="payment_modal">
                    <div class="modal-dialog">
                        <div class="modal-content" id="payment-modal-content">

                        </div>
                    </div>
                </div>

                <!-- Ban Seller Modal -->
                <div class="modal fade" id="confirm-ban">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h6">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Do you really want to ban this seller?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" id="confirmation">Proceed!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unban Seller Modal -->
                <div class="modal fade" id="confirm-unban">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h6">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Do you really want to ban this seller?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" id="confirmationunban">Proceed!</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function () {
            if (this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function () {
                    this.checked = false;
                });
            }

        });

        {{--function show_seller_payment_modal(id){--}}
        {{--    $.post('{{ route('sellers.payment_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){--}}
        {{--        $('#payment_modal #payment-modal-content').html(data);--}}
        {{--        $('#payment_modal').modal('show', {backdrop: 'static'});--}}
        {{--        $('.demo-select2-placeholder').select2();--}}
        {{--    });--}}
        {{--}--}}

        {{--        function show_seller_profile(id){--}}
        {{--            $.post('{{ route('sellers.profile_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){--}}
        {{--                $('#profile_modal #profile-modal-content').html(data);--}}
        {{--                $('#profile_modal').modal('show', {backdrop: 'static'});--}}
        {{--            });--}}
        {{--        }--}}

        function update_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('seller_update_status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', 'Seller status updated successfully');
                } else {
                    AIZ.plugins.notify('danger', 'Something went wrong');
                }
            });
        }

        function sort_sellers(el) {
            $('#sort_sellers').submit();
        }

        // function confirm_ban(url) {
        //     $('#confirm-ban').modal('show', {backdrop: 'static'});
        //     document.getElementById('confirmation').setAttribute('href', url);
        // }

        // function confirm_unban(url) {
        //     $('#confirm-unban').modal('show', {backdrop: 'static'});
        //     document.getElementById('confirmationunban').setAttribute('href', url);
        // }

        function bulk_delete() {
            var data = new FormData($('#sort_sellers')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('seller')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        location.reload();
                    }
                }
            });
        }

        @if (session()->has('message'))
        AIZ.plugins.notify('success', '{{ Session::get('message') }}');
        @endif
    </script>
@endsection
