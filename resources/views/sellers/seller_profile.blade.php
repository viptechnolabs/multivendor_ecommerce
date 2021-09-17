@extends('layouts.app')

@section('content')
    <div class="aiz-main-content">
        <div class="px-15px px-lg-25px">

            <div class="col-lg-6  mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Profile</h5>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="https://demo.activeitzone.com/ecommerce/admin/profile/9" method="POST" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PATCH">
                            <input type="hidden" name="_token" value="W6cRTUoVwNgnY88ytfzkMZXKPCvEjMGojV33To95">                    <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="name">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="admin" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="name">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="admin@example.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="new_password">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="New Password" name="new_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-from-label" for="confirm_password">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">Avatar <small>(90x90)</small></label>
                                <div class="col-md-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">1 File selected</div>
                                        <input type="hidden" name="avatar" class="selected-files" value="894">
                                    </div>
                                    <div class="file-preview box sm"><div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="894" title="admin .png"><div class="align-items-center align-self-stretch d-flex justify-content-center thumb"><img src="//demo.activeitzone.com/ecommerce/public/uploads/all/1IMsUL2g4XZ4n5LPYIKkOnIPifBoatKTrMyGKDn7.png" class="img-fit"></div><div class="col body"><h6 class="d-flex"><span class="text-truncate title">admin </span><span class="ext flex-shrink-0">.png</span></h6><p>6 KB</p></div><div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div></div></div>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
            <p class="mb-0">©  v5.2</p>
        </div>
    </div>
@endsection

@section('modal')

@endsection

@section('script')

@endsection
