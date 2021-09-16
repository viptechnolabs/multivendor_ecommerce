@extends('layouts.app')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">Manage Profile</h1>
            </div>
        </div>
    </div>
    <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Basic Info-->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Basic Info</h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Your Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" value="{{ Auth::user()->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Your Phone</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Your Phone" name="phone" value="{{ Auth::user()->phone }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Photo</label>
                    <div class="col-md-10">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="photo" value="{{ Auth::user()->avatar_original }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Address -->
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h5 class="mb-0 h6">{{ translate('Address')}}</h5>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="row gutters-10">--}}
{{--                    @foreach (Auth::user()->addresses as $key => $address)--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="border p-3 pr-5 rounded mb-3 position-relative">--}}
{{--                                <div>--}}
{{--                                    <span class="w-50 fw-600">{{ translate('Address') }}:</span>--}}
{{--                                    <span class="ml-2">{{ $address->address }}</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="w-50 fw-600">{{ translate('Postal Code') }}:</span>--}}
{{--                                    <span class="ml-2">{{ $address->postal_code }}</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="w-50 fw-600">{{ translate('City') }}:</span>--}}
{{--                                    <span class="ml-2">{{ $address->city }}</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="w-50 fw-600">{{ translate('Country') }}:</span>--}}
{{--                                    <span class="ml-2">{{ $address->country }}</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="w-50 fw-600">{{ translate('Phone') }}:</span>--}}
{{--                                    <span class="ml-2">{{ $address->phone }}</span>--}}
{{--                                </div>--}}
{{--                                @if ($address->set_default)--}}
{{--                                    <div class="position-absolute right-0 bottom-0 pr-2 pb-3">--}}
{{--                                        <span class="badge badge-inline badge-primary">{{ translate('Default') }}</span>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <div class="dropdown position-absolute right-0 top-0">--}}
{{--                                    <button class="btn bg-gray px-2" type="button" data-toggle="dropdown">--}}
{{--                                        <i class="la la-ellipsis-v"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">--}}
{{--                                        <a class="dropdown-item" onclick="edit_address('{{$address->id}}')">--}}
{{--                                            {{ translate('Edit') }}--}}
{{--                                        </a>--}}
{{--                                        @if (!$address->set_default)--}}
{{--                                            <a class="dropdown-item" href="{{ route('addresses.set_default', $address->id) }}">{{ translate('Make This Default') }}</a>--}}
{{--                                        @endif--}}
{{--                                        <a class="dropdown-item" href="{{ route('addresses.destroy', $address->id) }}">{{ translate('Delete') }}</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    <div class="col-lg-6 mx-auto" onclick="add_new_address()">--}}
{{--                        <div class="border p-3 rounded mb-3 c-pointer text-center bg-light">--}}
{{--                            <i class="la la-plus la-2x"></i>--}}
{{--                            <div class="alpha-7">{{ translate('Add New Address') }}</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Payment System -->
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h5 class="mb-0 h6">{{ translate('Payment Setting')}}</h5>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <label class="col-md-3 col-form-label">{{ translate('Cash Payment') }}</label>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <label class="aiz-switch aiz-switch-success mb-3">--}}
{{--                            <input value="1" name="cash_on_delivery_status" type="checkbox" @if (Auth::user()->seller->cash_on_delivery_status == 1) checked @endif>--}}
{{--                            <span class="slider round"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <label class="col-md-3 col-form-label">{{ translate('Bank Payment') }}</label>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <label class="aiz-switch aiz-switch-success mb-3">--}}
{{--                            <input value="1" name="bank_payment_status" type="checkbox" @if (Auth::user()->seller->bank_payment_status == 1) checked @endif>--}}
{{--                            <span class="slider round"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <label class="col-md-3 col-form-label">{{ translate('Bank Name') }}</label>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Bank Name')}}" value="{{ Auth::user()->seller->bank_name }}" name="bank_name">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <label class="col-md-3 col-form-label">{{ translate('Bank Account Name') }}</label>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Bank Account Name')}}" value="{{ Auth::user()->seller->bank_acc_name }}" name="bank_acc_name">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <label class="col-md-3 col-form-label">{{ translate('Bank Account Number') }}</label>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Bank Account Number')}}" value="{{ Auth::user()->seller->bank_acc_no }}" name="bank_acc_no">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <label class="col-md-3 col-form-label">{{ translate('Bank Routing Number') }}</label>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <input type="number" lang="en" class="form-control mb-3" placeholder="{{ translate('Bank Routing Number')}}" value="{{ Auth::user()->seller->bank_routing_no }}" name="bank_routing_no">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group mb-0 text-right">
            <button type="submit" class="btn btn-primary">{{translate('Update Profile')}}</button>
        </div>
    </form>
    <br>

    <!-- Change Email -->
    <form action="{{ route('user.change.email') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Change your email')}}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <label>{{ translate('Your Email') }}</label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="{{ translate('Your Email')}}" name="email" value="{{ Auth::user()->email }}" />
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary new-email-verification">
                               <span class="d-none loading">
                                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>{{ translate('Sending Email...') }}
                               </span>
                                    <span class="default">{{ translate('Verify') }}</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Update Email')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('modal')

@endsection

@section('script')

@endsection
